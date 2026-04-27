<?php
declare(strict_types = 1);
use hexydec\agentzero\agentzero;

final class agentzeroTest extends \PHPUnit\Framework\TestCase {

	public function testEmptyStringReturnsFalse() : void {
		$this->assertFalse(agentzero::parse(''), 'Empty string should return false');
	}

	public function testStringTooLongReturnsFalse() : void {
		$this->assertFalse(agentzero::parse(\str_repeat('a', 2001)), 'UA strings over 2000 chars should return false');
	}

	public function testNonPrintableCharactersStripped() : void {
		// Null bytes and other non-printable chars should be stripped before parsing
		$ua = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)\x00";
		$result = agentzero::parse($ua);
		$this->assertInstanceOf(agentzero::class, $result, 'UA with non-printable characters should still parse after stripping');
		$this->assertSame('Googlebot', $result->appname);
	}

	public function testGetHintsFromHeaders() : void {
		// getHints() should extract known hint headers case-insensitively and ignore unknown ones
		$headers = [
			'Sec-Ch-Ua-Mobile'   => '?0',
			'Sec-Ch-Ua-Platform' => '"Linux"',
			'Device-Memory'      => '2',
			'X-Custom-Header'    => 'ignored',
		];
		$result = agentzero::getHints($headers);
		$this->assertEquals([
			'sec-ch-ua-mobile'   => '?0',
			'sec-ch-ua-platform' => '"Linux"',
			'device-memory'      => '2',
		], $result, 'getHints should return recognised hint keys normalised to lowercase');
		$this->assertArrayNotHasKey('x-custom-header', $result, 'Unknown headers should be excluded');
	}

	public function testCalculatedHost() : void {
		// www. prefix should be stripped from the host
		$googlebot = agentzero::parse('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
		$this->assertSame('google.com', $googlebot->host, '__get(host) should strip the www. prefix');

		// no www. prefix — host returned as-is
		$duckduckbot = agentzero::parse('DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)');
		$this->assertSame('duckduckgo.com', $duckduckbot->host, '__get(host) should return the hostname unchanged when no www. prefix');

		// UA with no URL should return null
		$chrome = agentzero::parse('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');
		$this->assertNull($chrome->host, '__get(host) should return null when no URL is present');
	}

	public function testCalculatedMajorVersions() : void {
		// Firefox/AmigaOS: platform=AmigaOS 4.1, engine=Gecko 89, browser=Firefox 89
		$obj = agentzero::parse('Mozilla/5.0 (AmigaOS; U; AmigaOS 4.1; en-US; rv:89) Gecko/20100101 Firefox/89');
		$this->assertSame(89, $obj->browsermajorversion, 'browsermajorversion should be the integer major part of browserversion');
		$this->assertSame(89, $obj->enginemajorversion, 'enginemajorversion should be the integer major part of engineversion');
		$this->assertSame(4, $obj->platformmajorversion, 'platformmajorversion should be the integer major part of platformversion');

		// Googlebot: appversion=2.1
		$googlebot = agentzero::parse('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
		$this->assertSame(2, $googlebot->appmajorversion, 'appmajorversion should be the integer major part of appversion');
	}
}
