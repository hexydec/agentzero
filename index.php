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
		<style>
			.content {
				max-width: 1280px;
				margin: 0 auto;
			}

			.form__control {
				display: flex;
				padding: 5px 0;
			}

			.form__label {
				flex: 0 0 25%;
				box-sizing: border-box;
				padding-right: 10px;
				text-align: right;
			}

			.form__input {
				flex: 1 1 auto;
			}

			.form__submit {
				margin-left: 25%;
				width: 40%;
			}
		</style>
	</head>
	<body>
		<main class="content">
			<h1>AgentZero User Agent Information</h1>
			<form accept-charset="<?= \htmlspecialchars(\strval(\mb_internal_encoding())); ?>" method="post">
				<div class="form__control">
					<label class="form__label">User Agent:</label>
					<input type="text" class="form__input" name="ua" value="<?= \htmlspecialchars($ua); ?>" />
				</div>
				<div class="form__control">
					<input type="submit" class="form__submit" value="Get Info" />
				</div>
			</form>
			<?php if ($output !== null) { ?>
				<pre><?= htmlspecialchars(\strval(\print_r(\array_filter((array) $output), true))); ?></pre>
				<p>Generated in <?= \number_format($total, 5); ?></p>
			<?php } ?>
		</main>
	</body>
</html>