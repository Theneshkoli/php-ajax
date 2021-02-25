<?php

	$conn = mysqli_connect('localhost','root','','codexworld') or die("Unable to Extablish Connection!!");

	$query = "SELECT * FROM tbperson";

	$sql = mysqli_query($conn, $query) or die("Unable to run query");

	$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

	$json_e = json_encode($result, JSON_PRETTY_PRINT);

	$file_name = "my ".date('d-m-Y').".json";

	if(file_put_contents("javascript/".$file_name, $json_e)){
		echo "<mark>Json file added in folder</mark>";
	}else{
		alert("Json file not added in folder");
	}
?>
