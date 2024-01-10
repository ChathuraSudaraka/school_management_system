<?php 

	$grade = $_POST['grade'];
	$class = $_POST['class'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$searched = $conn->query("SELECT a.grade,class,subject, su.* ,s.initial_name AS name FROM submitted su
INNER JOIN assignments a ON a.code = su.code
INNER JOIN student s ON s.index_number = su.student_index
WHERE a.class = '$class' AND a.grade = '$grade'
ORDER BY su.time asc");
	
	if($searched->num_rows == 0) {
		echo "noData";
	}
	else {

		for ($i=1; $i <= $searched->num_rows; $i++) { 

			$data = $searched->fetch_assoc();

			if($data["marks"] == NULL) {
           		$markRow = '<td><input type="text" class="form-control bg-secondary text-dark"
	                   placeholder="Add Marks" id="marks'. $i .'"></td>';
           	}
           	else {
                $markRow = '<td><input type="text" class="form-control bg-secondary text-dark"
	                   placeholder="Add Marks" id="marks'. $i .'" disabled value="'. $data["marks"] .'"></td>';
           	}

			echo '<tr>
	               <th scope="row">'. $i .'</th>
	               <td>'. $data["name"] .'</td>
	               <td>'. $data["subject"] .'</td>
	               <td>'. $data["time"] .'</td>
	               <td>'. $data["code"] .'</td>
	               <td><a href="submitted/' . $data["path"] . '"><button type="button" class="btn btn-primary">Download</button></td>
	               '. $markRow .'
	               <td><button type="button" class="btn btn-primary" data-dbid="'. $data["id"] .'" data-marks="'. $i .'" onclick="addAssignmentMarks(event);">Submit</button></td>
	           </tr>';
           }
	}


 ?>