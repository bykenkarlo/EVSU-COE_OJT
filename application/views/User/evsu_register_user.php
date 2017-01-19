<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<header style="background: url('/EVSU_OJT/assets/images/EVSU_banner.png'); height: 120px;" class=""> 
		
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
        <li class="#"><a href="<?php echo base_url(); ?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body class="img-responsive" style="
background:url('<?php echo base_url();?>assets/images/evsu_bg.jpg') no-repeat;
background-size: 100% 85%; margin: 0px 0px 0px 0px" >
<div class="container">
	<?php 
		if (isset($_SESSION['stud_id'])) {
			echo $stud_id = $_SESSION['stud_id']; 
			$lname = $_SESSION['lname'];
			$fname = $_SESSION['fname'];
			$sex = $_SESSION ['sex'];
			$cname = $_SESSION['cname'];
			$year = $_SESSION['year'];
			$course = $_SESSION['course'];
			$section = $_SESSION['section'] ;
		}
	 ?>
	<div class="col-sm-7 col-md-offset-3 " id="reg_user">
		<div id="reg_form" class="panel">
			<div class="panel-heading panel_head">
				<h2>Register Form</h2>
			</div>
			<div class="panel-body">
			<?= $this->session->flashdata('message') ?>
				<form class="form-horizontal" action="<?php echo base_url();?>control/register_stud_user" method="POST">
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Student Number</label>						
						<div class="col-sm-9 form_lname">
							<input type="text" name="reg_stud_num" class="form-control text-capitalize" value="<?= $stud_id ?>" readonly   >
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Last Name</label>						
						<div class="col-sm-9 form_lname">
							<input type="text" name="reg_lname" class="form-control text-capitalize" value="<?= $lname ?>" readonly   >
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">First Name</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_fname" class="form-control text-capitalize" value="<?= $fname ?>" readonly  >
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Sex</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_sex" class="form-control text-capitalize" value="<?= $sex ?>" readonly  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Agency Name</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_cname" class="form-control text-capitalize" value="<?= $cname ?>" readonly  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Course</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_course" class="form-control text-capitalize" value="<?= $course ?>"  readonly >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Year</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_year" class="form-control text-capitalize" value="<?= $year ?>"  readonly >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Section</label>						
						<div class="col-sm-9 form_fname">
							<input type="text" name="reg_section" class="form-control text-capitalize" value="<?= $section ?>"   readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">UserName</label>						
						<div class="col-sm-9 form_username">
							<input type="text" name="reg_username" class="form-control" autofocus required>
							<label><small style="font-weight: normal;">*as your(lastname)&(firstname) ex.delacruzjuan</small></label>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input type="password" name="reg_pass" class="form-control" placeholder="Password" required >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label"> Repeat Password</label>
						<div class="col-sm-9">
							<input type="password" name="confirm_pass" class="form-control" placeholder="Repeat Password" required>
						</div>
					</div>
					<div class="pull-right">
						<input type="submit" class="btn btn-danger btn-xm" value="Register">
					</div>	
							
				</form>
				<div class="pull-right" style="margin-right: 10px;">
						<a href="<?php base_url();?>/EVSU_OJT"><button class="btn btn-primary">Cancel</button></a>
						
					</div>
			</div>
		</div>
	</div>
</div>
</body>