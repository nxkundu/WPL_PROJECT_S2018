<!--
    @author: Abhishek Datta <abhi06548@yahoo.com>
    @page: Message one-on-one UI for all users
    @description: This page will display as lightbox when clicked on Messages button on profile header.
	              It handles the total list of sent/receipt messages for the user alongwith sending new message function
-->
<?php include('../header_footer/header.php'); ?>
		<script src="../static/js/message/message.js"></script>
		<link rel="stylesheet"  href="../static/css/message/message.css">
		
	<?php include('../data/connection_open.php') ?> 

	<div class="container col-lg-12" id="msgContainer"> <!--Div element to display all incoming and outgoing messages for the user -->
		<div class="row">
			<div class="col-lg-12 col-lg-3">
				<h3 style="color:#fff"><?php echo 'Welcome, '. $_SESSION['fname'] ?></h3> 
			</div>
			<div class="col-lg-12 col-lg-7">
				<h3><p>
					<label id="lblmessage"></label>
				</p></h3>
			</div>
			<div class="col-lg-12 col-lg-2">

					<!--<h3><input type=image src="add.png" width="45" height="35" title="Compose Message" alt="New Message" border="1" 
						id="btnNew" class="col-lg-6"></h3> -->
					<h3><button class="btn col-lg-8" id="btnNew" style="border-color:gray; border:1; font-size:23px">
							<i class="fa fa-pencil-square-o" style="color:black; font-size:36px"></i> New 
					</button></h3>
			</div>
		</div>
	
		<div class="row" >
		
			<div id="msgList" class="col-lg-5">   <!--Div element for message list -->
				<div id="fixed" class="col-lg-6"> <!--Div element for fixed header -->
					<table id="hdrFixed">
						<thead>
							<tr>
								<th id="msgHead" class="field1Size">Date</th>
								<th id="msgHead" class="field2Size">Subject</th>
							</tr>
						</thead>	
					</table>
				</div>
				
				<table id="messageList" >
					<!--<thead id="header">
						<tr>
							<th>Date</th>
							<th>Subject</th>
						</tr>
					</thead>-->
					
					<tbody> <!-- to be populated dynamically through AJAX call from database -->
					</tbody>
				</table>
			</div>
			
			<div class="col-lg-6">
			
				<div id="messageShow">
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>To</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailTo" name="Mail to" class="col-lg-11" disabled="disabled" autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>From</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailFrom" name="Mail from" class="col-lg-11" disabled="disabled" autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>Subject</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailSub" name="Mail Subject" class="col-lg-11" disabled="disabled"  autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-12">
							<h4><textarea id="input" rows="15" cols="20" class="col-lg-12" disabled="disabled" autocomplete="off"></textarea></h4>
						</div>
					</div>
				</div>
			
				<div id="messageNew">
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>To</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailTo" name="Mail to" class="col-lg-11" autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>From</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailFrom" name="Mail from" class="col-lg-11" disabled="disabled" autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-2">
							<h3>Subject</h3>
						</div>
						<div class="col-lg-12 col-lg-10">
							<h3><input type="text" id="mailSub" name="Mail Subject" class="col-lg-11" autocomplete="off"><h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-12">
							<h4><textarea id="input" rows="12" cols="20" class="col-lg-12" autocomplete="off"></textarea></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-9">
						</div>
						<div class="col-lg-12 col-lg-3">
							<h3><input type="submit" value="Send" class="col-lg-10" id="btnSubmit"></h3>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>

</html>