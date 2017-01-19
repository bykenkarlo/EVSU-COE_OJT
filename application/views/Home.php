<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EVSU - College of Engineering | On the Job Training Monitoring and Online Grading System </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="EVSU - College of Engineering | On the Job Training Monitoring and Online Grading System - This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University

Our goal has its goal to make the work of our professors easier and for the students to be more aware of their grades." />
	<meta name="keywords" content="" />
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo-icon.png">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/EVSU_logo.png">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>


</head>

<header class="header_home">
<nav class="navbar navbar-inverse navbar-fixed-top" id="nav2">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only" >Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<!-- <img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="50" height="50"> -->
      <a class="navbar-brand" href="#"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      		<?php if (isset($_SESSION['currentStud'])) { ?>    
        <li class="#"><a href="<?= base_url()?>Login/student_profile_page"><span class="fa fa-home"></span> Home </a></li>
      		<?php } elseif (isset($_SESSION['currentAdmin'])) { ?>	
        <li class="#"><a href="<?= base_url()?>Login/profile_page"><span class="fa fa-home"></span> Home </a></li>
        	<?php } elseif (isset($_SESSION['currentCdr'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/coordinator_profile_page"><span class="fa fa-home"></span> Home </a></li>
			<?php } elseif (isset($_SESSION['currentSpv'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/supervisor_profile_page"><span class="fa fa-home"></span> Home </a></li>
			<?php } elseif (!isset($_SESSION['username'])) { ?>
        <li class="#"><a href="#"><span class="fa fa-home"></span> Home </a></li>
		<?php } ?>
		<li><a href="#about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>	    
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <?php 
			if (isset($_SESSION['username'])) { ?>
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span>
        	
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?> </span>

			<span class="caret"></span>
          	<ul class="dropdown-menu">
            	<li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']) ;?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        	</ul>
        <?php } ?>	
        </li>
      </ul>   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<body class="img-responsive" style="
background:url('<?php echo base_url();?>assets/images/evsu_bg.jpg') no-repeat;
background-size: 100% 29%; margin: 0px 0px 10px 0px">
<div class="container pageTitle" style="text-align: center;">
  <h3>Eastern Visayas State University</h3>
  <h2>College of Engineering</h2>
  <h1>On the Job Training</h1>
  <h1> Monitoring and Online<br> Grading System</h1z> 
  <p>Building Globally Competitive Professionals</p>
</div>
<div class="container"></div>
<div id="login_button" 
	style="  
	">
 		<a href="#" class=""
		 	> <button type="button" class="w3-btn w3-white w3-border w3-border-black w3-round-xlarge" data-toggle="modal" data-target="#myModal_login" style="
		 	background-color: #000; 
		    border: none;
		    color: white;
		    padding: 6px 42px;
		    text-decoration: none;
		    font-size: 16px;
		    margin-top: 20px;
		    border-radius: 40px;
		    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		    "><span class="glyphicon glyphicon-share"></span> Login </button>
		</a>
  <!-- Modal login-->
  <div class="modal fade" id="myModal_login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="modal-content">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h1>Login Form</h1>
				<!-- <span class="fa fa-get-pocket fa-4x"></span> -->
			</div>
        </div>
        <div class="modal-body">
			<div class="container">
				<div class="col-sm-6 " id="login_user">
					<div id="" class="">
						<div class="">
							<div class="message_alert">
								<?= $this->session->flashdata('message') ?>
							</div>	
							<form class="form-horizontal" action="<?php echo base_url();?>Login/Login_user" method="POST">
									<div class="form-group">
										<label class="col-sm-3 control-label">Username</label>						
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
										</div>
									</div>	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px;">
										<?php if (isset($_SESSION['username'])) { ?>
											<button disabled="disabled" type="submit" class="btn btn-info btn-xm signin_button"><span class="glyphicon glyphicon-share"></span> You're already login! Logout first!</button>
										<?php } elseif (!isset($_SESSION['username'])) { ?>
											<button type="submit" class="btn btn-info btn-xm signin_button"><span class="glyphicon glyphicon-share"></span> Signin</button>
										<?php } ?>
										<!-- <a href="<?php echo base_url();?>control/register_form" class="btn btn-primary reg_button"><span class="glyphicon glyphicon-cloud"></span> Register Here</a> -->
									</div>
									<div class="col-sm-7 remem_for" style="float: left;">
										<a href="#" class="forget_pass">Forget Password</a>
									</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer" style="margin-right: 30px;">
          <button type="button" class="btn btn-primary" data-dismiss="modal" ><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->

 <!-- Modal register student-->
  <div class="modal fade" id="myModal_signup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="modal-content">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2>Enter Your Student Number</h2>
			</div>
        </div>
        <div class="modal-body" id="login_reg">
			<div class="container">
				<div class="col-sm-6 " id="">
					<div id="" class="">
						<div class="enter_your_id">	
							<form class="form-horizontal" action="<?php echo base_url();?>control/check_student" method="POST">
									<div class="message_alert">
										<?= $this->session->flashdata('message') ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"><span>Student Number</span></label>	

										<div class="col-sm-8">
											<input type="text" name="reg_stud_num" class="form-control" placeholder="Student Number" autofocus required>
											<label><small style="font-weight: normal; float: right;">*ex.2013-02261</small></label>
										</div>
									</div>	
																														
									<?php if (isset($_SESSION['username'])) { ?>
										<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
											<button disabled="disabled" type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> You're currently Login! Logout first!</button>
										</div>
									
									<?php } elseif (!isset($_SESSION['username'])) { ?>
										<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
											<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Enter</button>
										</div>
									<?php  } ?>
									
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->

<div id="first_footer" class="">
		<div class="" style="margin-top: 45px; display: inline-block;">
			Don't have an account yet? Register here    
		</div>
		
			<a href="" class="btn waves-light signup" data-toggle="modal" data-target="#myModal_signup" 
		 	style="background-color: #d50000; 
		    border: none;
		    color: white;
		    padding: 6px 35px;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin-top: 5px;
		   	margin-left: 5px;
		    border-radius: 40px;
		    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<span class="glyphicon glyphicon-cloud "></span>
		    Signup
		 </a>	
</div>
<div class="container" style="background-color: #f5f5f5">
<div id="about"></div>
<div class="container">
<div class="container">
	<div id="about">
		<h2><b>On the Job Training Monitoring and Online Grading System</b></h2>
		<h4>Eastern Visayas State University</h4>
		<h5>College Of Engineering</h5>
	</div>	
		<div class="container">
			<div class="row ">
						<div class="col-sm-8">
							<h3 class="text-justify oph3" style="text-align: center;"><b>
							Objective of the Project</b></h3>
						<b class="col-sm-8 opb">General Objective:</b>
							<div class="col-sm-12" style="text-align: center;">
							<p>This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University</p>
							<p>Our goal has its goal to make the work of our professors easier and for the students to be more aware of their grades.</p>
							</div>
						<b class="col-sm-8 opb">Specific Objectives:</b>
						<ul class="col-sm-10 ">
							<li>To design a more organized way of submitting the grades of the OJT's.</li>
							<li>To help the industry partners of EVSU to submit the grades of the of the OJT's in their agency in a faster and more effecient way.</li>
							<li>To allow the OJT Coordinators to manage and monitor the OJT status and grades of the students more conveniently.</li>
							<li>To create a module that will compute intern's grades based on inputted data.</li>
							<li>To create a system that will secure and maintain the integrity of data.</li>
							<li>To create a module that will keep the records of every intern in different agencies or companies.</li>
						</ul>
						</div>
			</div>
		</div>	
</div>
	
</div>

<div class="" style="margin-left: 25px; margin-top: 30px;">
	<div class="row">`
		<div class="col-sm-8 col-sm-offset-2 ">
			<p class="text-justify">
				<h2 class="evsu_vm"><b>EVSU VISION</b></h2>
				<p style="padding-left: 3em;">A Leading State University in Technological and Professional Education.</p>
			</p><br>
			<p class="text-justify">	
				<h2 class="evsu_vm"><b>EVSU MISSION</b></h2>
				<p style="padding-left: 3em;">Develop a Strong Technologically and Professionally Competent Productive Human Resource Imbued with Positive Values Needed to Propel Sustainable Development.</p>
			</p>
		</div>
	</div>	
</div>
<div class="container ">
	<div id="contact_us">
<div class="col-sm-8 contact_mess container ">
	<div class="row">
		<div align="left" class=" col-sm-16 contact_left">
			<h2 class=""><b class="con"><span class="fa fa-envelope"></span> CONTACT US</b></h2>
			
			<p>Do you have questions, comments, inquiries or anything you want us to know?</p>
			
			<div style="margin-top: 1.5em; ">
				<h4 ><span class="fa fa-phone-square"></span> Hot line:<a href="tel:+639056738634" style="color: #d50000"> +63 905 673 8634</a> </h4>
				<h4><span class="fa fa-envelope"></span> Email:<a href="emailto:kenkarlo.padal@evsu.edu.ph" style="color: #d50000"> kenkarlo.padal@evsu.edu.ph</a></h4>
			</div>
		</div>
	</div>	
</div>			
</div>
</div>
</div>
