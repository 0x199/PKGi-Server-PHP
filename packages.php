<?php
require_once 'PKGi.class.php';

$PKGi = new PKGi();

if($PKGi->isRequestFromHomebrew()) {
	header('Content-type: application/json');

	$PKGi->addHomebrew('Homebrew 1', 1);
	$PKGi->addHomebrew('Homebrew 2', 2);
	$PKGi->addHomebrew('Homebrew 3', 3);
	$PKGi->addHomebrew('Homebrew 4', 4);
	$PKGi->addHomebrew('Homebrew 5', 5);
	$PKGi->addHomebrew('Homebrew 6', 6);

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
