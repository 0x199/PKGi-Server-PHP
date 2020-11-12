<?php
require_once 'PKGi.class.php';

$PKGi = new PKGi();

if($PKGi->isRequestFromHomebrew()) {
	header('Content-type: application/json');

	$PKGi->addHomebrew('Homebrew 1', 'https://example.com/download/homebrew.pkg');
	$PKGi->addHomebrew('Homebrew 2', 'https://example.com/download/homebrew.pkg');
	$PKGi->addHomebrew('Homebrew 3', 'https://example.com/download/homebrew.pkg');
	$PKGi->addHomebrew('Homebrew 4', 'https://example.com/download/homebrew.pkg');
	$PKGi->addHomebrew('Homebrew 5', 'https://example.com/download/homebrew.pkg');
	$PKGi->addHomebrew('Homebrew 6', 'https://example.com/download/homebrew.pkg');

	$PKGi->render();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Homebrew Repo</title>
	</head>
	<body>
		<h1>Install PKGi to use this repo</h1>
		<p>You are visiting this repo from a browser. Please install PKGi to use this repo.</p>
	</body>
</html>