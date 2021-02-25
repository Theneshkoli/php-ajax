<?php 

	$conn = mysqli_connect('localhost','root','','codexworld') or die("connection Failed.");

	if(isset($_POST['per_name'])){
		$a_val = $_POST["per_name"];
		$b_val = $_POST["per_sal"];
		$c_val = $_POST["per_age"];

		$sql = "INSERT INTO tbperson (name, salary, age) VALUES('$a_val','$b_val','$c_val')";
	}

	else if(isset($_POST['delete_id'])){
		$dele = $_POST['delete_id'];

		$sql = "DELETE from tbperson where id = '$dele'" ;
	}

	else if(isset($_POST['ep_name'])){
		$a_val = $_POST["ep_name"];
		$b_val = $_POST["ep_sal"];
		$c_val = $_POST["ep_age"];
		$d_val = $_POST["ep_id"];

		$sql = "UPDATE tbperson SET name =' $a_val', salary = '$b_val', age = '$c_val' WHERE id = '$d_val'";
	}

	if(mysqli_query($conn,$sql)){
		echo 1;
	}
	else{
		echo 0;
	}

?>