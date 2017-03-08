	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
</head>
<body >
<header id="mobile-view"> 
	<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" width="100%" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System">
</header>
<nav class="navbar navbar-inverse" id="nav2">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only" >Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<!-- <img src="/EVSU_OJT/assets/images/brand-logo-icon.png" width="50" height="50">
      <a class="navbar-brand" href="/EVSU_OJT/login/profile_page "></a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li class="#"><a href="<?= base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="<?= base_url();?>Login/Usersguide"><span class="fa fa-envelope"></span> Help Desk</a></li>
		<li><a href="<?php echo base_url();?>Login/admin_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
         	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<span class="fa fa-user" aria-hidden="true"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; }?></span>
				
		<span class="caret"></span>
          <ul class="dropdown-menu">
            <li>
            	<a style="color: #000;" href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);?>">
            	<span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
            </a>
          </ul>      
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- sidenav -->
<body class="img-responsive" style="background:url('<?php echo base_url();?>assets/images/EVSU.jpg') no-repeat center center fixed;
	background-size: 100% 29%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: 'Century Gothic';
	">

<div class="aboutUs" style="
	font-family: 'Century Gothic';
	background-color: rgba(255,255,255,1);
	background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 14%, rgba(222,222,222,0.95) 68%, rgba(226,226,226,0.93) 90%, rgba(226,226,226,0.92) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(14%, rgba(255,255,255,0.99)), color-stop(68%, rgba(222,222,222,0.95)), color-stop(90%, rgba(226,226,226,0.93)), color-stop(100%, rgba(226,226,226,0.92)));
	background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 14%, rgba(222,222,222,0.95) 68%, rgba(226,226,226,0.93) 90%, rgba(226,226,226,0.92) 100%);
	background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 14%, rgba(222,222,222,0.95) 68%, rgba(226,226,226,0.93) 90%, rgba(226,226,226,0.92) 100%);
	background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 14%, rgba(222,222,222,0.95) 68%, rgba(226,226,226,0.93) 90%, rgba(226,226,226,0.92) 100%);
	background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,0.99) 14%, rgba(222,222,222,0.95) 68%, rgba(226,226,226,0.93) 90%, rgba(226,226,226,0.92) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e2e2e2', GradientType=0 );">
	<div id="about">
		<h2><b>On the Job Training Monitoring and Online Grading System</b></h2>
		<h4>Eastern Visayas State University</h4>
		<h5>College Of Engineering</h5>
	</div>	
		<div class="container">
			<div class="row font-size text-left">
						<div class="col-sm-10">
							<h3 class="oph3 text-indent"><b>
							Objective of the Project</b></h3>
						<b class="col-sm-8 opb">General Objective:</b>
							<div class="col-sm-12">
							<p class="text-indent">This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University</p>
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
			<div style="margin-left: 45px; margin-bottom: 60px; font-size: 16px;">
				<span class="fa fa-codepen"></span><span> By:<a href="https://www.linkedin.com/in/kenkarlopadal"> Ken Karlo Padal</a></span>
				<div class="row" style="margin-left: 20px; margin-top: 10px;">
					<span class="">
						<a href="https://www.linkedin.com/in/kenkarlopadal/"><span class="fa fa-linkedin-square fa-2x"></span></a>
					</span>
					<span >
						<a style="color: #000;" href="https://github.com/blankcode01"><span class="fa fa-github fa-2x"></span></a>	
					</span>
					<span>
						<a style="color: #d50000;" href="https://plus.google.com/"><span class="fa fa-google-plus-square fa-2x"></span></a>	
					</span>
					<span>
						<a style="color: #000;" href="mailto: kenkarlopadal@gmail.com"><span class="fa fa-envelope fa-2x"></span></a>	
					</span>	
				</div>
				
			</div>
		</div>	
		
</div>
	

	
<div class="container">	
</div>


