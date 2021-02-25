<?php

	$conn = mysqli_connect('localhost','root','','codexworld') or die('connection failed');

	$sql = "SELECT * FROM tbperson";
	//$sql = "SELECT * FROM tbperson WHERE id =".$_POST['id'];

	$result = mysqli_query($conn,$sql) or die('SQL Query Failed');

	//$output = mysqli_fetch_all($result);  //is used to convert all data into index array. 

	$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // to get data into mutidimentional associative array. 

	//echo '<pre>';
	// print_r($output);		// To print above associative array.

	echo json_encode($output);		//Chome plugin is available to display proper JSON data in readable format.
	

?>
