<?php
//Simple HTML DATA Sending

// $output = '	<tr>
// 				<td>1</td>
// 				<td>DK</td>
// 			</tr>
// 			<tr>
// 				<td>12</td>
// 				<td>HK</td>
// 			</tr>';

// echo $output;
//---------------------x----------x---------------x--------------x--------------

//load data from database using PHP mysqli
	$conn = mysqli_connect('localhost','root','','codexworld') or die("connection Failed.");

	$limit_per_page = 15;
	$page = '';
	if(isset($_POST['page_no'])){
		$page = $_POST['page_no'];
	}
	else{
		$page = 1;
	}

	$offset = ($page - 1) * $limit_per_page;

	if(isset($_POST['ser_val'])){
		$search_v = $_POST['ser_val'];

		$sql = "SELECT * from tbperson WHERE name LIKE '%$search_v%' OR salary LIKE '%$search_v%' OR age LIKE '%$search_v%' LIMIT ".$offset.",".$limit_per_page."";
	}
	else{
		$sql = "SELECT * from tbperson LIMIT ".$offset.",".$limit_per_page."";
	}

	$result = mysqli_query($conn, $sql) or die('SQL Failed.');

	$output = '';

	if(mysqli_num_rows($result) > 0){
		$i = 1;

		$output .= '<table border="1" width="100%">
					<thead>
						<th>Sr Number</th>
						<th>Name</th>
						<th>Salary</th>
						<th>Age</th>
						<th>Delete Record</th>
						<th>Edit</th>
					</thead>
					<tbody >';
		while( $row = mysqli_fetch_assoc($result)){
			$output .= '<tr>
							<td>'.$i++ .'</td>
							<td>'. $row['name'].'</td>
							<td>'. $row['salary'].'</td>
							<td>'. $row['age'].'</td>
							<td><button class="delete_me" data-did="'. $row['id'].'"">Delete This Record</button></td>
							<td><button class="edit_this" data-eid="'. $row['id'].'"">Edit</button></td>
						</tr>';
		}
		$output .= '</tbody>
					</table>';

		$sql_num_rows = 'SELECT * FROM tbperson';
		$result_rows  = mysqli_query($conn,$sql_num_rows)or die('total rows not counted');
		$total_records = mysqli_num_rows($result_rows);
		$total_pages = ceil($total_records/$limit_per_page) ;
		
		$output .= '<div id="pagination">';
			for($j=1; $j <= $total_pages ; $j++ ){
				if($j == $page){
					$output .= '<mark><a href="#" id="'.$j.'">&nbsp;&nbsp;'.$j.'&nbsp;&nbsp;</a></mark>'; 
				}
				else{
					$output .= '<a href="#" id="'.$j.'"><button>'.$j.'</button></a>'; 
				}
			}

		$output .= '</div>';

		
		echo $output;
	}
	else{
		echo $output = '<td colspan="5">No Data found</td>'; 
	}

	

?>