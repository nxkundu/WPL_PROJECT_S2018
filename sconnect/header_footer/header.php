<!--
    @author: Nirmallya Kundu <nxkundu@gmail.com>
    @page: Header
    @description: This page handles the header with opening HTML Tag and body tag
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SConnect</title>
    <link rel="shortcut icon" href="../static/img/sconnect-logo-3.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="../static/css/home-page.css">
    <script src="../static/js/home-page-loggedin.js"></script>
</head>
<body>
	<?php include('../data/connection_open.php'); ?>
	<?php include('../session_verify.php'); ?>

	<span id="session-variable">
		<input type="hidden" id="session-userhash" value="<?php echo $_SESSION['userhash'] ?>">
		<input type="hidden" id="session-email" value="<?php echo $_SESSION['email'] ?>">
		<input type="hidden" id="session-status" value="<?php echo $_SESSION['status'] ?>">
		<input type="hidden" id="session-position" value="<?php echo $_SESSION['position'] ?>">
		<input type="hidden" id="session-fname" value="<?php echo $_SESSION['fname'] ?>">
		<input type="hidden" id="session-mname" value="<?php echo $_SESSION['mname'] ?>">
		<input type="hidden" id="session-lname" value="<?php echo $_SESSION['lname'] ?>">
		<input type="hidden" id="session-profile_image_path" value="<?php echo $_SESSION['profile_image_path'] ?>">
		<input type="hidden" id="session-resume_path" value="<?php echo $_SESSION['resume_path'] ?>">
		<input type="hidden" id="session-dob_mm" value="<?php echo $_SESSION['dob_mm'] ?>">
		<input type="hidden" id="session-dob_dd" value="<?php echo $_SESSION['dob_dd'] ?>">
		<input type="hidden" id="session-dob_yyyy" value="<?php echo $_SESSION['dob_yyyy'] ?>">
		<input type="hidden" id="session-degree" value="<?php echo $_SESSION['degree'] ?>">
		<input type="hidden" id="session-major" value="<?php echo $_SESSION['major'] ?>">
		<input type="hidden" id="session-university_domain" value="<?php echo $_SESSION['university_domain'] ?>">
	</span>

	<div class="row marketing">
		<div class="row header header-fixed ">
		  <div class="col-sm-12 col-md-12 col-lg-3">
		     <table class="table-responsive cursor-pointer">
		        <tbody>
		           <tr onclick="javascript:location.href='../feed'">
		              <td><img class="img-responsive sconnect-logo-img" src="../static/img/sconnect-logo-3.jpg" alt="sconnect-logo"></td>
		              <td><span class="sconnect-header-logo">SConnect</span></td>
		           </tr>
		        </tbody>
		     </table>
		  </div>
		  <div class="col-sm-12 col-md-12 col-lg-6">
		     <div>
	           <table class="table-responsive login-table">
	              <tbody class="align-right">
	                 <tr>
	                    <td>
	                       <div class="input-group">
						      <input type="text" class="form-control" placeholder="Search" name="search" id="searchQuery" style="width: 500px">
						      <div class="input-group-btn">
						        <button class="btn btn-default" id="searchQueryButton"><i class="glyphicon glyphicon-search"></i></button>
						      </div>
						    </div>
	                    </td>
	                 </tr>
	              </tbody>
	           </table>
		     </div>
		  </div>
		  <div class="col-sm-12 col-md-12 col-lg-3">
		  	<div>
				<a class="a-header-href" href="../message" title="Message">M</a>
				<a class="a-header-href" href="<?php echo $_SESSION['position'] == 'faculty'? '../attendance' : '../attendancee' ?>" title="Attendance">A</a>
				<a class="a-header-href" href="../profile" title="Profile">P</a>
				<a class="a-header-href" href="../help" title="Help Me">?</a>
				&nbsp;&nbsp;
				<a class="a-header-logout" href="../session_logout.php">Logout</a>
			</div>
			</div>
		  </div>
		</div>
	</div>

	<div class="after-header-fixed"></div>
	<style type="text/css">
		.a-header-href {
		    background-color: white;
		    border: none;
		    color: black;
		    padding: 15px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    /*font-size: 16px;*/
		    margin: 4px 2px;
		    border-radius: 50%;
		    cursor: pointer;
		}

		.a-header-logout {
		    background-color: white;
		    border: none;
		    color: black;
		    padding: 5px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    /*font-size: 16px;*/
		    margin: 4px 2px;
		    cursor: pointer;
		    text-align: right;
		}
		.header-fixed {
			position: fixed;
		    width: 100%;
		    top: 0;
		    left: 0;
		    right: 0;
		    z-index:9999;
		}

		.after-header-fixed {

			margin-top:80px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {

			$("#searchQueryButton").click(function() {

				if($("#searchQuery").val() == '') {
					return;
				}
      			self.location = "../searchProfile/?q=" +  $("#searchQuery").val();
    		});
	    

		    $("#searchQuery").keypress(function(e) {
		      if(e.keyCode == 13) {
		        
		        if($("#searchQuery").val() == '') {
					return;
				}
      			self.location = "../searchProfile/?q=" +  $("#searchQuery").val();
		      }
		    });
		});

		function viewUserProfilePage(userhash) {

			if($("#session-position").val() == "admin" || $("#session-position").val() == "faculty") {
				location.href = "../adminViewProfile/?q=" + userhash;
			}
			else {

				location.href = "../viewProfile/?q=" + userhash;
			}
		}
	</script>

