<?php
declare(strict_types = 1);
use hexydec\agentzero\versions;

/**
 * versions::$versions is cached statically for the lifetime of the PHP process, so without a
 * reset, whichever fixture (or the real cache/versions.json, via lib::parse() in other test
 * files) loads first would silently be reused by every test after it. setUp() clears it via
 * reflection so each test here always loads its own fixture.
 */
final class versionsTest extends \PHPUnit\Framework\TestCase {

	protected string $dir;

	protected function setUp() : void {
		(new \ReflectionProperty(versions::class, 'versions'))->setValue(null, null);
		$this->dir = \sys_get_temp_dir().'/agentzero-versions-test-'.\bin2hex(\random_bytes(8));
		\mkdir($this->dir);
	}

	protected function tearDown() : void {
		foreach (\glob($this->dir.'/*') AS $file) {
			\unlink($file);
		}
		\rmdir($this->dir);
	}

	protected function cache(array $data) : string {
		$path = $this->dir.'/cache.json';
		\file_put_contents($path, \json_encode($data));
		return $path;
	}

	protected function config(string $cache, array $overrides = []) : array {
		return \array_replace([
			'versionssource' => 'no-such-source',
			'versionscache' => $cache,
			'versionscachelife' => 604800,
			'currentdate' => null
		], $overrides);
	}

	protected function ymd(string $modify) : int {
		return (int) (new \DateTime())->modify($modify)->format('Ymd');
	}

	public function testUnknownBrowserReturnsEmpty() : void {
		$cache = $this->cache(['chrome' => ['1.0.0' => $this->ymd('-1 month')]]);
		$this->assertEquals([], versions::get('nosuchbrowser', '1.0.0', $this->config($cache)));
	}

	public function testNullCacheReturnsEmptyWithoutTouchingSource() : void {
		$config = $this->config('/should/not/be/read.json');
		$config['versionscache'] = null;
		$config['versionssource'] = '/should/not/be/read/either.json';
		$this->assertEquals([], versions::get('chrome', '1.0.0', $config));
	}

	public function testMalformedCacheJsonReturnsEmpty() : void {
		$path = $this->dir.'/cache.json';
		\file_put_contents($path, 'not json{{{');
		$this->assertEquals([], versions::get('chrome', '1.0.0', $this->config($path)));
	}

	public function testUnreachableSourceAndMissingCacheReturnsEmptyWithoutCrashing() : void {
		$config = $this->config($this->dir.'/does-not-exist.json');
		$this->assertEquals([], @versions::get('chrome', '1.0.0', $config));
	}

	public function testUnreachableSourceFallsBackToStaleCache() : void {
		$cache = $this->cache(['chrome' => ['10.0.0' => $this->ymd('-1 month')]]);
		\touch($cache, \time() - 1000000); // older than the default cache life, so a refetch would normally be attempted
		$config = $this->config($cache, ['versionssource' => '/definitely/not/a/real/path.json']);
		$this->assertEquals([
			'browserlatest' => '10.0.0',
			'browserreleased' => (new \DateTime())->modify('-1 month')->format('Y-m-d'),
			'browserstatus' => 'current'
		], @versions::get('chrome', '10.0.0', $config));
	}

	public function testStaleCacheIsRefetchedFromSourceAndRewritten() : void {
		$cache = $this->cache(['chrome' => ['1.0.0' => $this->ymd('-5 years')]]);
		\touch($cache, \time() - 1000000);
		$source = $this->dir.'/source.json';
		\file_put_contents($source, \json_encode(['chrome' => ['20.0.0' => $this->ymd('-1 month')]]));
		$config = $this->config($cache, ['versionssource' => $source]);

		$result = versions::get('chrome', '20.0.0', $config);

		$this->assertEquals('20.0.0', $result['browserlatest']);
		$this->assertEquals(['chrome' => ['20.0.0' => $this->ymd('-1 month')]], \json_decode(\file_get_contents($cache), true));
	}

	public function testVersionAboveLatestStatusBoundaries() : void {
		$cache = $this->cache(['chrome' => ['10.0.0' => $this->ymd('-1 month')]]);
		$config = $this->config($cache);

		$this->assertEquals('beta', versions::get('chrome', '11.0.0', $config)['browserstatus']);
		$this->assertEquals('canary', versions::get('chrome', '12.0.0', $config)['browserstatus']);
		$this->assertEquals('nightly', versions::get('chrome', '13.0.0', $config)['browserstatus']);
		$this->assertEquals([], versions::get('chrome', '14.0.0', $config));
	}

	public function testCurrentStatusByRecentReleaseDate() : void {
		$cache = $this->cache(['chrome' => [
			'11.1.0' => $this->ymd('-3 months'),
			'11.0.5' => $this->ymd('-6 months')
		]]);
		$result = versions::get('chrome', '11.0.5', $this->config($cache));
		$this->assertEquals('current', $result['browserstatus']);
	}

	public function testCurrentStatusWhenExactlyLatestEvenIfReleasedOverAYearAgo() : void {
		$cache = $this->cache(['chrome' => [
			'10.5.0' => $this->ymd('-18 months'),
			'10.3.0' => $this->ymd('-18 months')
		]]);

		// the latest version itself is always "current", even though it's older than a year
		$this->assertEquals('current', versions::get('chrome', '10.5.0', $this->config($cache))['browserstatus']);

		// a different version from the same major, at the same age, is merely "previous"
		$this->assertEquals('previous', versions::get('chrome', '10.3.0', $this->config($cache))['browserstatus']);
	}

	public function testOutdatedStatusBetweenTwoAndFiveYearsOld() : void {
		$cache = $this->cache(['chrome' => ['1.0.0' => $this->ymd('-3 years')]]);
		$this->assertEquals('outdated', versions::get('chrome', '1.0.0', $this->config($cache))['browserstatus']);
	}

	public function testLegacyStatusByReleaseDateOverFiveYearsOld() : void {
		$cache = $this->cache(['chrome' => ['1.0.0' => $this->ymd('-6 years')]]);
		$this->assertEquals('legacy', versions::get('chrome', '1.0.0', $this->config($cache))['browserstatus']);
	}

	public function testLegacyStatusForVersionOlderThanEarliestRecorded() : void {
		$cache = $this->cache(['chrome' => [
			'2.0.0' => $this->ymd('-1 month'),
			'1.0.0' => $this->ymd('-2 months')
		]]);

		// older (by major version) than every recorded version - short-circuits to legacy without a browserreleased date
		$result = versions::get('chrome', '0.5.0', $this->config($cache));
		$this->assertEquals('legacy', $result['browserstatus']);
		$this->assertArrayNotHasKey('browserreleased', $result);

		// exactly equal to the earliest recorded version is NOT legacy by itself - status falls through to the date-based checks
		$result = versions::get('chrome', '1.0.0', $this->config($cache));
		$this->assertEquals('previous', $result['browserstatus']);
	}

	public function testReleasedVersionMatchDisambiguatesSimilarPrefixes() : void {

		// "12.10.2" shares a naive "12.1" text prefix with the queried "12.1.0", but the correct
		// match is "12.1.5", which shares more actual version segments with the queried version
		$cache = $this->cache(['chrome' => [
			'12.10.2' => $this->ymd('-1 month'),
			'12.1.5' => $this->ymd('-2 months'),
			'9.0.0' => $this->ymd('-5 years')
		]]);
		$result = versions::get('chrome', '12.1.0', $this->config($cache));
		$this->assertEquals((new \DateTime())->modify('-2 months')->format('Y-m-d'), $result['browserreleased']);
	}
}
