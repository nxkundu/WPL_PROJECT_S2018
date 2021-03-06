<?php

	/*
    @author: Koulick Sankar Paul <koulick89@gmail.com>
    @page: Feed
    @description: This is the main landing page when the user login
                  Need to Update
	*/

	include('../connection_open.php');

	session_start();

 	//Validation error flag
    $errflag = false;

	//Get the SESSION values
	$userhash_from = $_SESSION['userhash'];
	$university_domain = $_SESSION['university_domain'];

	//Get the POST values
	$text_data = isset($_POST['text']) ? $_POST['text'] : NULL;
	$date_time_yyyy_mm_dd_hh_mm = $_POST['currentDateTime'];
	$privacy = $_POST['privacyType'];
	$userhash_to = $_POST['viewedUserHash'];
	
	$feedhash = uniqid();
	$status = "2";

	//Input Validations
	if($userhash_from == '') {
		$errmsg_arr[] = 'userhash missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {

		$returnObject = new stdClass();
		$returnObject->success = "false";
		$returnObject->message = "userhash missing";
		echo json_encode($returnObject);

		exit();
	}

	$userhash_from_escape = mysqli_real_escape_string($sql_connection, $userhash_from);
	$target_image_file = NULL;
	$target_video_file = NULL;
	$target_image_file_db = "";
	$target_video_file_db = "";

	if ($_FILES["image"] != NULL) {
		$target_image_dir = "../../feed_data/image/";
		$target_image_file = $target_image_dir. $feedhash.'.jpg';
		$target_image_file_db = $feedhash.'.jpg';
	}

	if ($_FILES["video"] != NULL) {
		$target_video_dir = "../../feed_data/video/";
		$target_video_file = $target_video_dir.$feedhash.'.mp4';
		$target_video_file_db = $feedhash.'.mp4';
	}

	if ($text_data != NULL && $target_image_file == NULL && $target_video_file == NULL) {
		$query = "INSERT INTO sconnect_feed VALUES('$feedhash','$text_data',NULL,NULL,'$privacy','$university_domain','$userhash_to','$userhash_from','$date_time_yyyy_mm_dd_hh_mm','$status')";
	}
	elseif ($text_data != NULL && $target_image_file == NULL && $target_video_file != NULL) {
		move_uploaded_file($_FILES["video"]["tmp_name"], $target_video_file);
		$query = "INSERT INTO sconnect_feed VALUES('$feedhash','$text_data',NULL,'$target_video_file_db','$privacy','$university_domain','$userhash_to','$userhash_from','$date_time_yyyy_mm_dd_hh_mm','$status')";
	}
	elseif ($text_data != NULL && $target_image_file != NULL && $target_video_file == NULL) {
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_image_file);
		$query = "INSERT INTO sconnect_feed VALUES('$feedhash','$text_data','$target_image_file_db',NULL,'$privacy','$university_domain','$userhash_to','$userhash_from','$date_time_yyyy_mm_dd_hh_mm','$status')";
	}
	else {
		move_uploaded_file($_FILES["video"]["tmp_name"], $target_video_file); 
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_image_file);
		$query = "INSERT INTO sconnect_feed VALUES('$feedhash','$text_data','$target_image_file_db','$target_video_file_db','$privacy','$university_domain','$userhash_to','$userhash_from','$date_time_yyyy_mm_dd_hh_mm','$status')";
	}

	if (mysqli_query($sql_connection, $query)) {

		$returnObject = new stdClass();
		$returnObject->success = "true";
		$returnObject->message = "Successfully inserted the data in the table sconnect_feed";	
		echo json_encode($returnObject);

		exit();
	} 
	else {

		$returnObject = new stdClass();
		$returnObject->success = "false";
		$returnObject->message = "Error in MySQL Query: " . mysqli_error($sql_connection);
		echo json_encode($returnObject);

		exit();
	}
	
	include('../connection_close.php');
?>