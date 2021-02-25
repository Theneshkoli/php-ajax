<?php

	$e_id = $_POST['emp_i'];

	$conn = mysqli_connect('localhost','root','','codexworld') or die("connection Failed.");

	$sql = 'SELECT * from tbperson where id = '.$e_id;

	$result = mysqli_query($conn, $sql) or die('SQL Failed.');

	$output = '';
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$output .= '
				<tr>
					<td><label>Employee Name</label></td>
					<td><input type="text" id="e_name" value="'.$row['name'].'"></td>
				</tr>
				<tr>
					<td><label>Employee Salary</label></td>
					<td><input type="text" id="e_salary" value="'.$row['salary'].'"></td>
				</tr>
				<tr>
					<td><label>Employee Age</label></td>
					<td><input type="text" id="e_age" value="'.$row['age'].'"></td>
				</tr>
				<tr>
					<td><input type="hidden" id="e_eid" value="'.$row['id'].'"></td>
					<td colspan="2" align="center"><input type="submit" class="submit_update" name="submit_update"></td>
				</tr>
			';
		}
		echo $output;
	}
	
?>