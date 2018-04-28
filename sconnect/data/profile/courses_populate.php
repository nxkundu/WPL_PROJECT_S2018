<!-- @author: Gunjan Tomer <gxt160930@utdallas.edu>
	@page: Populate courses table after courses fetched from DB
	Updated on: 04/25/2018 -->


<?php
	
		$user_hash = $_SESSION['userhash'];
		$courses_enrolled_query = "SELECT * FROM sconnect_courses_enrolled WHERE userhash = '$user_hash'";

		$result = mysqli_query($sql_connection, $courses_enrolled_query);

		while($row = mysqli_fetch_assoc($result)) {

			$course_hash = $row['coursehash'];

			$course_details_query = "SELECT * FROM sconnect_courses_offered WHERE coursehash = '$course_hash'";

			$result2 = mysqli_query($sql_connection, $course_details_query);

			while($row2 = mysqli_fetch_assoc($result2)) {

				echo"<tr>";
				echo "<td>".$row2['course_name']."</td>";
				echo "<td>".$row2['course_code']."</td>";
				echo "<td>".$row2['session']."</td>";
				echo "</tr>";
			}
		}

?>