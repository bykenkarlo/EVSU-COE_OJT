<!DOCTYPE html>
<html>
<head>
	<title>EVSU-OJT-COE | Contact Us</title>
</head>
<header>
<header style="background: url('/EVSU_OJT/assets/images/EVSU_banner.png'); height: 120px;" class=""> 

		<<!-- div class="">
			<div class="IMG_logo">
				<img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="100" height="100">
			</div>
			<div class="EVSU_system_title">
				On the Job Training Monitoring and Grading System
			</div>
			<div class="EVSU_system_sub_title">
				BUILDING GLOBALLY COMPETITIVE PROFESSIONALS
			</div>
		</div>	 -->	
</header>
<nav id="nav">
	<div class="btn-group">
		<ul class="nav nav-pills ">
			<li class=""><a href="<?= base_url(); ?>">Home</a></li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Matias</a></li>
						<li><a href="#">Padal</a></li>
						<li><a href="#">Rondina</a></li>
					</ul>
			</li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>	
</nav>
<!-- <div id="cf" class="container">
	<img class="bottom" src="/EVSU_OJT/assets/images/EVSU_bg.png" />
	<img class="top" src="/EVSU_OJT/assets/images/EVSU_bg2.jpg" />
</div>
 -->
<div class="container">
	<div class="col-sm-7 col-md-offset-3 " id="contact_admin">
		<div id="contact" class="panel">
			<div class="panel-heading panel_head">
				<h2>Contact Us Here</h2>
			</div>
			<div class="panel-body">
			<?= $this->session->flashdata('message') ?>
				<form class="form-horizontal" action="/" method="POST">
					<div class="form-group">
						<label class="col-sm-3 control-label">Email address</label>						
						<div class="col-sm-9">
							<input type="email" name="username" class="form-control" required>
						</div>
					</div>	
					<div class="form-group">	
						<label class="col-sm-3 control-label">Your Message</label>
						<div class="col-sm-9">
							<textarea cols="5" rows="8" type="message" name="pass" class="form-control" required ></textarea>
						</div>
					</div>
					<div class="pull-right">
						<input type="submit" class="btn btn-info btn-xm signin_button" value="Send">
						<a href="/EVSU_OJT" class="btn btn-primary reg_button">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
