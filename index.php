<?php

use hexydec\agentzero\agentzero;

require(__DIR__.'/src/autoload.php');

// fetch UA string
$ua = $_POST['ua'] ?? $_SERVER['HTTP_USER_AGENT'] ?? '';

// client hints
$hints = agentzero::getHints();
$keys = [
	'sec-ch-ua-mobile',
	'sec-ch-ua-full-version-list',
	'sec-ch-ua-platform',
	'sec-ch-ua-platform-version',
	'sec-ch-ua-model',
	'device-memory',
	'width',
	'ect'
];
foreach ($keys AS $item) {
	if (!empty($_POST[$item])) {
		$hints[$item] = $_POST[$item];
	}
}
$memsizes = [
	'0.25' => '256Mb',
	'0.5' => '512Mb',
	'1' => '1Gb',
	'2' => '2Gb',
	'4' => '4Gb',
	'8' => '8Gb'
];
$conns = [
	'slow-2g' => 'Slow 2G',
	'2g' => '2G',
	'3g' => '3G',
	'4g' => '4G'
];
$devices = [
	'?1' => 'Yes',
	'?0' => 'No'
];

// request client hints
\header('Accept-CH: Width, ECT, Device-Memory, Sec-CH-UA-Platform-Version, Sec-CH-UA-Model, Sec-CH-UA-Full-Version-List');

// timing variables
$time = \microtime(true);
$output = \hexydec\agentzero\agentzero::parse($ua, \array_filter($hints), ['versionscache' => __DIR__.'/cache/versions.json']);
$total = \microtime(true) - $time;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>AgentZero - User Agent Information Test Page</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="shortcut icon" type="image/svg" href="docs/agentzero.svg" />
		<style>
			body, input {
				font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
			}
			.content {
				max-width: 1280px;
				margin: 0 auto;
			}

			.form__heading {
				margin: 10px 10px 0 10px;
				flex: 0 0 auto;
				display: flex;
				align-items: center;
				gap: 0 10px;
			}

			.form__control {
				display: flex;
				padding: 5px 0;
			}

			.form__label {
				flex: 0 0 15%;
				box-sizing: border-box;
				padding-right: 10px;
				text-align: right;
			}

			.form__input {
				flex: 1 1 auto;
			}
			.form__input {
				flex: 1 0 30%;
			}

			.form__submit {
				margin-left: 15%;
				width: 40%;
			}
		</style>
	</head>
	<body>
		<main class="content">
			<form accept-charset="<?= \htmlspecialchars(\strval(\mb_internal_encoding())); ?>" method="post">
				<h1 class="form__heading">
					<img src="docs/agentzero.svg" alt="AgentZero" height="50" />
					AgentZero User Agent Parser
				</h1>
				<div class="form__control">
					<label class="form__label">User Agent:</label>
					<input type="text" class="form__input" name="ua" value="<?= \htmlspecialchars($ua); ?>" />
				</div>
				<h3>Client Hints</h3>
				<div class="form__control">
					<label class="form__label">Mobile:</label>
					<select name="sec-ch-ua-mobile">
						<option value="">-- Select Mobile --</option>
						<?php foreach ($devices AS $key => $item) { ?>
							<option value="<?= \htmlspecialchars($key); ?>"<?= ($hints['sec-ch-ua-mobile'] ?? null) === $key ? ' selected="selected"' : ''; ?>><?= \htmlspecialchars($item); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form__control">
					<label class="form__label">Browser:</label>
					<input type="text" class="form__input" name="sec-ch-ua-full-version-list" value="<?= \htmlspecialchars($hints['sec-ch-ua-full-version-list'] ?? ''); ?>" />	
				</div>
				<div class="form__control">
					<label class="form__label">Platform:</label>
					<input type="text" class="form__input--short" name="sec-ch-ua-platform" value="<?= \htmlspecialchars($hints['sec-ch-ua-platform'] ?? ''); ?>" />	
				</div>
				<div class="form__control">
					<label class="form__label">Platform Version:</label>
					<input type="text" class="form__input--short" name="sec-ch-ua-platform-version" value="<?= \htmlspecialchars($hints['sec-ch-ua-platform-version'] ?? ''); ?>" />
				</div>
				<div class="form__control">
					<label class="form__label">Model:</label>
					<input type="text" class="form__input--short" name="sec-ch-ua-model" value="<?= \htmlspecialchars($hints['sec-ch-ua-model'] ?? ''); ?>" />
				</div>
				<div class="form__control">
					<label class="form__label">Memory:</label>
					<select name="device-memory">
						<option value="">-- Select Memory --</option>
						<?php foreach ($memsizes AS $key => $item) { ?>
							<option value="<?= \htmlspecialchars($key); ?>"<?= ($hints['device-memory'] ?? null) == $key ? ' selected="selected"' : ''; ?>><?= \htmlspecialchars($item); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form__control">
					<label class="form__label">Width:</label>
					<input type="number" class="form__input--short" name="width" value="<?= \htmlspecialchars($hints['width'] ?? ''); ?>" />
				</div>
				<div class="form__control">
					<label class="form__label">Connection:</label>
					<select name="ect">
						<option value="">-- Select Connection --</option>
						<?php foreach ($conns AS $key => $item) { ?>
							<option value="<?= \htmlspecialchars($key); ?>"<?= ($hints['ect'] ?? null) === $key ? ' selected="selected"' : ''; ?>><?= \htmlspecialchars($item); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form__control">
					<input type="submit" class="form__submit" value="Parse User Agent String" />
				</div>
			</form>
			<?php if ($output !== false) { ?>
				<pre><?= htmlspecialchars(\strval(\print_r(\array_filter((array) $output, fn(mixed $value) => $value !== null), true))); ?></pre>
				<p>Generated in <?= \number_format($total, 5); ?></p>
			<?php } ?>
		</main>
	</body>
</html>