<?php
// file originally coded by theorywrong
// changes made by 0x199

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	
	if(ctype_digit($id)) {
		if(file_exists("pkgs/".$id.".pkg")) {
			$filesize = filesize("pkgs/".$id.".pkg");

			$handle = fopen("pkgs/".$id.".pkg", "r");
			fseek($handle, 0xFE0);
			$digest = bin2hex(fread ($handle , 0x20 ));
			fclose($handle);

			$pieces = [ 
				array(
					"url" => "http://" . $_SERVER["HTTP_HOST"].dirname($_SERVER["REQUEST_URI"])."/pkgs/".$id.".pkg",
					"fileOffset" => 0,
					"fileSize" => $filesize,
					"hashValue" => "0000000000000000000000000000000000000000"
				)
			];

			$data = array(
				"originalFileSize" => $filesize,
				"packageDigest" => strtoupper($digest),
				"numberOfSplitFiles" => 1,
				"pieces" => $pieces
			);

			file_put_contents("refs/".$id.".json", json_encode($data));

			echo "Generated, file placed in the refs/ dir";
		} else {
			echo "Please add your homebrew to pkgs/ dir and rename it to $id.pkg";
		}
	} else {
		echo "ID must be a number, not a string";
	}
} else {
	echo "You must provide an ID - add the id parameter to the URL";
}
