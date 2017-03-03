<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<header>
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
      	<li class="#"><a href="<?php echo base_url(); ?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body class="img-responsive" style="
background:url('<?php echo base_url();?>assets/images/evsu_bg.jpg') no-repeat;
background-size: 100% 85%; margin: 0px 0px 0px 0px" >
<div class="container">
	<div class="col-sm-7 col-md-offset-3 " id="reg_user">
		<div id="reg_form" class="panel">
			<div class="panel-heading panel_head">
				<h2><span class="fa fa-key"></span> Reset Password</h2>
			</div>
			<div class="panel-body">
			<?= $this->session->flashdata('message') ?>
			<?php $info = $this->Login_user_model->get_admin_info($admin_id); ?>	

				<form class="form-horizontal" action="<?php echo base_url();?>Login/update_admin_password" method="POST">
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Password</label>						
						<div class="col-sm-9 form_lname">
							<input type="hidden" name="admin_id" value="<?= $info['admin_id']?>">
							<input type="password" name="password" class="form-control " placeholder="Password" required >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label text-capitalize">Confirm Password</label>						
						<div class="col-sm-9 form_lname">
							<input type="password" name="confirmpass" class="form-control " placeholder="Confirm Password"  required >
						</div>
					</div>	
					
					<div class="pull-right">
						<input type="submit" class="btn btn-primary btn-xm" value="Submit">
					</div>	
							
				</form>
				<div class="pull-right" style="margin-right: 10px;">
						<a href="<?php base_url();?>/EVSU_OJT"><button class="btn btn-danger">Cancel</button></a>
						
					</div>
			</div>
		</div>
	</div>
</div>
</body>