
<!--
    @author: Nirmallya Kundu <nxkundu@gmail.com>
    @page: Account Verification UI
    @description: This page verifies the user with the email and OTP
-->
<?php include('../data/message/getNewMessageCount.php'); ?>
<div class="row" style="text-align: center;">
	<img src="<?php echo "../user_data/" .  $_SESSION['profile_image_path'] ?>"  style="width:100; height: 300px;">
	<br>
	<br>
	<span class="sconnect-profile-header"><h3><?php echo " " . $_SESSION['fname'] . " " . $_SESSION['lname'] ?> </h3></span>
	<br>
	<br>
	<span class="sconnect-profile-header">
		<h4><a href="../profile/"><u>Profile</u></a></h4>
	</span>

	<span class="sconnect-profile-header">
		<h4><a href="../message/"><u>Message <?php echo " (" . $getNewMessageCount . " )" ?></u></a></h4>
	</span>

	<span class="sconnect-profile-header">
		<h4><a href="../myFeed/"><u>My Posts</u></a></h4>
	</span>

	<span class="sconnect-profile-header">
		<h4><a href="../<?php echo ($_SESSION['position'] == 'faculty')? "attendance" : "attendancee" ?> "><u>Class Attendance</u></a></h4>
	</span>

	<span class="sconnect-profile-header">
		<h4><a href="../approveUser/"><u>Approve Pending User</u></a></h4>
	</span>

	<span class="sconnect-profile-header">
		<h4><a href="../approveFeed/"><u>Approve Pending Feed</u></a></h4>
	</span>

	</h4></span>
</div>