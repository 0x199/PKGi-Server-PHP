<?php
require_once 'PKGi.class.php';

$PKGi = new PKGi();

if($PKGi->isRequestFromHomebrew()) {
	header('Content-type: application/json');

	// addHomebrew(name, download id)
	$PKGi->addHomebrew('Homebrew 1', 1);
	$PKGi->addHomebrew('Homebrew 2', 2);
	$PKGi->addHomebrew('Homebrew 3', 3);
	$PKGi->addHomebrew('Homebrew 4', 4);
	$PKGi->addHomebrew('Homebrew 5', 5);
	$PKGi->addHomebrew('Homebrew 6', 6);

	$PKGi->render();
}
