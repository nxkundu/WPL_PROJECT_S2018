<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>Add New Course Interface</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script>
	//function to reset input and focus on first field on every page refrssh
    function  resetInput() {
		jQuery("#session").focus();
    }
	
	//function to disable form-elements on Create-Class button click
	function formDisable() {
		
		jQuery("#session").attr("disabled", true);
		jQuery("#session").addClass("btnDisable");
		
		jQuery("#CourseID").attr("disabled", true); 
		jQuery("#CourseID").addClass("btnDisable");
		jQuery("#otp_received").attr("disabled", true); 	
		jQuery("#otp_received").addClass("btnDisable");
		
		jQuery("#verifyCourse").attr("disabled", true); 	
		jQuery("#verifyCourse").addClass("btnDisable");
	}
    jQuery(document).ready(function () {
        resetInput();
		jQuery("table.container").hide(); //hide the table element displaying fetched course details based on OTP provided
		
		//function executed when (Verify Course) button clicked ----------------------------
        jQuery("#verifyCourse").click(function (event) {
			event.preventDefault();
			jQuery("#lblSuccess").text("");
            var session = jQuery("#session").val();
            var CourseID = jQuery("#CourseID").val();
			var otp = jQuery("#otp_received").val();
			//OTP validation failure routine----------------------------------------------------------------------------------
            if((!$('#session').val()) || (!$('#CourseID').val()) || (otp == "" || otp.length == 0 || otp.length > 4)) {
                jQuery("#lblSuccess").text("Provide correct values in above fields (OTP should be 4 digits only)");
                jQuery("#divSuccess").addClass("failure-msg");
                if(!$('#session').val()) {
                    jQuery("#session").focus();
                }
                else if(!$('#CourseID').val()) {
                    jQuery("#CourseID").focus();
                }
				else if(otp == "" || otp.length == 0) {
                    jQuery("#otp_received").focus();
                }
	
				return;
            }
			else if (otp != "0101") {   //OTP provided is not valid as per OTP present in database against the course detail
				jQuery("#lblSuccess").text("No courses found with provided OTP. Please recheck OTP from email!!");
                jQuery("#divSuccess").addClass("failure-msg");
				
				jQuery("#otp_received").val("");
				jQuery("#otp_received").focus();
				
				return;
			} 
			
			//OTP validation failure routine ends--------------------------------------------------------------------------------
            
			if(jQuery("#divSuccess").hasClass("failure-msg")) {
                jQuery("#divSuccess").removeClass("failure-msg");
            }
			
			formDisable(); //disable input section on successful OTP validation and submission
			
			//Show table element when OTP validated, with fetched course details//
			jQuery("table.container").show();
			
        });
		
		//Copy button click functionality ------------------------------------
		jQuery("##btnSubmit").click(function (e1) {
			e1.preventDefault();
			//form post......................//
			
			if(true) {  //student details not found//
                jQuery("#lblSuccess").text("Student detail could not be validated against Class roster uploaded");
                jQuery("#divSuccess").addClass("failure-msg");
				return;
            }
		});

		// $('#fade').on('click', function(event) {
		// 	$('#lightbox', '#fade').hide();
		// });

		// $( '#add_course').on('click', function(event) {
		// 	$("#lightbox, #fade").show();
		// });

		
    });
	</script>

	<style>
		.text-align-right {
			text-align: right;
		}
		.failure-msg {
			font-size: 24px;
			font-style: italic;
			color: red;
		}
	
		select:invalid { 
			color: gray; 
		}
		#verifyCourse, #btnSubmit {
			padding: 0px 4px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			border-radius: 8px;		
			cursor: pointer;
			margin: 0px 10px;
		}
	
		.btnDisable {
			color: gray;
			cursor: not-allowed;
		}
		
		/*.container table {
			border: 1px solid gray;
			width: 100%;
		}
		
		.container table tr {
			width: 100%;
			height: 60px;
		}*/
	
	</style>
</head>

<body>
	 
	<div class="container"> <!--Div element to enter the OTP provided by faculty and verify course detail -->
            <div class="row">
                <div class="col-lg-12 col-lg-12">
                    <h2><i>STUDENT - Add New Class</i></h2>
                </div>
            </div>
			
			<br>
			<div class="row">
				<h4><p id="instructions" class="col-lg-12">Select Session/Course-ID and enter correct OTP received in mail to verify course detail</p></h4>
				<div class="col-lg-12 col-lg-2">
					 <h3><select id="session" name="Session" required autocomplete="off">
						<option value="" disabled selected hidden>Session</option>
						<option value="Fall">Fall</option>
						<option value="Spring">Spring</option>
						<option value="Summer">Summer</option>
					</select></h3>
                </div>
				<div class="col-lg-12 col-lg-3">
                    <h3><select id="CourseID" name="Course ID" required autocomplete="off">
						<option value="" disabled selected hidden>Select Course-ID..</option>
						<option value="CS6301.001">CS6301.001</option>
						<option value="CS6305.002">CS6305.002</option>
					</select></h3>
                </div>
				<div class="col-lg-12 col-lg-2">
                    <h3><input type="text" id="otp_received" name="OTP" placeholder ="eg: 1234" class="col-lg-10" autocomplete="off"></h3>
                </div>
				<div class="col-lg-12 col-lg-3">
					<h3><button id="verifyCourse">Verify Course</button></h3>
                </div>
                <div>
                <button type="button" onclick="document.getElementById('lightbox').style.display='none';document.getElementById('fade').style.display='none'">Close</button>
            </div>
            </div>
    </div> 
	
	<div class="container"><!--Div element to show failure message for OTP validation -->
            <div class="row">
                <div id="divSuccess" class="col-lg-12 col-lg-9">
                    <p>
                        <label id="lblSuccess"></label>
                    </p>
                </div>
            </div>
    </div>
	 
	<br>
	<form id= "formData"> 
	 
		<table class="container">
            <tr class="row">
                <td class="col-lg-12 col-lg-3">
                    <h3>Course Name</h3>
                </td>
                <td class="col-lg-12 col-lg-9">
                    <h3><input type="text" id="CourseName" name="Course Name" class="col-lg-6" disabled="disabled" autocomplete="off"><h3>
                </td>
            </tr>

			<tr class="row">
                <td class="col-lg-12 col-lg-3">
                    <h3>Academic Session</h3>
                </td>
                <td class="col-lg-12 col-lg-9">
					 <h3><input type="text" id="session" name="Session" class="col-lg-6" disabled="disabled" autocomplete="off"></h3>
                </td>
            </tr>
			
			<tr class="row">
                <td class="col-lg-12 col-lg-3">
                    <h3>Academic Year</h3>
                </td>
                <td class="col-lg-12 col-lg-9">
                    <h3><input type="text" id="year" name="Year" class="col-lg-6" disabled="disabled" autocomplete="off"></h3>
                </td>
            </tr>

            <br>
            <tr class="row">
                <td class="col-lg-12 col-lg-3">
                </td>
                <td class="col-lg-12 col-lg-6">
                    <h3><input type="submit" value="Join the Class" id="btnSubmit" class="col-lg-4"></h3>
                </td>
            </tr>
		</table>
	</form> 
	
	<div class="container"><!--Div element to show failure message for student details validation in class roster -->
            <div class="row">
                <div id="divSuccess" class="col-lg-12 col-lg-9">
                    <p>
                        <label id="lblSuccess"></label>
                    </p>
                </div>
            </div>
    </div>


</body>
</html>