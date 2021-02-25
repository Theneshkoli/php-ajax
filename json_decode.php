<?php

	$json_string = 'javascript/my.json';

	$jsondata = file_get_contents($json_string);

	$arr = json_decode($jsondata, true);

	// echo "<pre>";
	// print_r($arr);

	//to print data in table format
	echo "<table width='100%' border='1' cellpadding='10px'>";
		foreach($arr as list("userId" => $userid, "id" => $id, "title" => $title, "body" => $body)){
			//inside list function we are using keys used in associative array
			//list function is used to avoid using two foreach loops
			echo "<tr><td>".$userid."</td><td>".$id."</td><td>".$title."</td><td>".$body."</td></tr>";
		}
	echo "</table>";

?>