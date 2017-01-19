<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #f5f5f5">
<header>
<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System"> 	
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
			<!-- <img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="50" height="50"> -->
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="#"><a href="<?php echo base_url();?>Login/coordinator_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></span>	
				<?php $user = $_SESSION['username'];	    
				}?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="#"><span class="fa fa-cog"></span> Settings</a></li>
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message', 2) ?>
</div>
<div class="container">



<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>	

<div class="" id="table_list" style="margin: 10px 0px 10px 0px; background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);" >
	<div>
		<h1 style="font-weight: ; padding: 20px 40px 10px 50px; margin-top: 10px; "><span class="glyphicon glyphicon-share"></span> Update Profile</h1>
	</div>	<div class="panel-body">
			<form  class="form-horizontal" action="<?php echo base_url();?>Login/update_student" method="POST">									 
					<input type="hidden" name="stud_id" value="<?= $info['stud_id']?>"></input>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Student Number</label>
						<div class="col-sm-8">
							<input type="text"  class="form-control text-capitalize" value="<?= $info['stud_id'];?>"readonly  >
						</div>
					</div><div class="form-group">	
						<label class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-8">
							<input type="text" name="fname" class="form-control text-capitalize" value="<?= $info['fname'];?>"  >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-8">
							<input type="text" name="lname" class="form-control text-capitalize" value="<?= $info['lname']?>"  >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Company Assign</label>
						<div class="col-sm-4">
							<input type="text" name="cname" class="form-control text-capitalize" value="<?= $info['cname']?>"  >
						</div>
					</div>	
					
					<div class="form-group">	
						<label class="col-sm-3 control-label">Sex</label>
						<div class="col-sm-4">
							<input type="text" name="sex" class="form-control text-capitalize" value="<?= $info['sex']?>"  >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Course</label>
						<div class="col-sm-4">
							<input type="text" name="course" class="form-control text-capitalize" value="<?= $info['course_abbrv']?>"  >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Year</label>
						<div class="col-sm-4">
							<input type="text" name="year" class="form-control text-capitalize" value="<?= $info['year']?>"  >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Section</label>
						<div class="col-sm-4">
							<input type="text" name="section" class="form-control text-capitalize" value="<?= $info['section']?>"  >
						</div>
					</div>	
					
					
					<div class="pull-right" style="margin-right: 95px; margin-bottom: 20px; ">
						<a href=""><button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-share"></span> Update</button></a>
						<a href="<?php echo base_url();?>Login/student_list"><button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button></td></a>
					</div>	
		</form>	
	</div>
</div>

</div>






<div class="container">	
</div>

