<?php
require(__DIR__.'/src/autoload.php');

if (!empty($_POST['ua'])) {
	$ua = $_POST['ua'];
} else {
	$ua = $_SERVER['HTTP_USER_AGENT'];
}
$time = \microtime(true);
$output = \hexydec\agentzero\agentzero::parse($ua);
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
				<div class="form__control">
					<input type="submit" class="form__submit" value="Parse User Agent String" />
				</div>
			</form>
			<?php if ($output !== null) { ?>
				<pre><?= htmlspecialchars(\strval(\print_r(\array_filter((array) $output, fn(mixed $value) => $value !== null), true))); ?></pre>
				<p>Generated in <?= \number_format($total, 5); ?></p>
			<?php } ?>
		</main>
	</body>
</html>