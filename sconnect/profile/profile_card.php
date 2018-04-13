<span class="left_pane">
		<div class="card container">
			<?php
			if($_SESSION['profile_image_path']==null) {
				$_SESSION['profile_image_path'] = 'sample.jpg';
			}
			echo '<img src="../user_data/' .$_SESSION['profile_image_path'].'" alt="Display Image" style="width: 100%">'
			?>
			<form method="post" action="image_upload.php" enctype="multipart/form-data">
				Select profile image
				<input type="file" id="my_image" name="image_upload"/>
				<input type="button" value="Browse" id="get_image">
				<input type="submit" name="upload" value="Upload"/>
			</form>
			<?php 
			echo '<h1>'.$_SESSION['fname'].' '.$_SESSION['lname'].'</h1>'
			?>
			<p class="title"><?php echo $_SESSION['position'] ?><br> and <br><?php echo $_SESSION['degree'] ?> <br> <?php echo $_SESSION['major'] ?></p>
			<p><?php echo $_SESSION['university_domain'] ?></p>
			<img src="<?php echo '../university_data/logo/' . $_SESSION['university_domain'] . '.jpg'?>" alt="University Logo" style="width: 30%"> 
			<p><button>Connect</button></p>
			<?php
			if($_SESSION['resume_path']==null) {
				$_SESSION['resume_path'] = 'sample.pdf';
			}
			echo '<a href="../user_data/' .$_SESSION['resume_path'].'" target="_blank"><embed src="../user_data/' .$_SESSION['resume_path'].'" width="200px" height="295px" scale="tofit"></embed></a>'
			?>
			<form method="post" action="resume_upload.php" enctype="multipart/form-data">
				Select resume to upload:
				<input type="file" id="my_resume" name="resume_upload" onchange="startRead()"/>
				<input type="button" id="get_resume" value="Browse">
				<input type="submit" name="upload" value="Upload"/>
			</form>
		</div>
	</span>