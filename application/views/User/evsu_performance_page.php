<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/date_picker/jquery.simple-dtpicker.css">
    <link href='<?php echo base_url();?>assets/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>assets/fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="<?php echo base_url();?>assets/fullcalendar/css/bootstrapValidator.min.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/combodate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker/jquery.simple-dtpicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<style type="text/css">
	thead{
	text-align: center;
	background: SteelBlue;
	color: white;
	</style>
    
</head>
</body>
<header>
<img id="non-printable" src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System"> 	
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
        

      </ul>
      <ul class="nav navbar-nav navbar-right">	<li class="#"><a href="<?php echo base_url();?>Login/supervisor_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
					    
				}?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="#"><span class="fa fa-cog"></span> Settings</a></li>
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?=md5($_SESSION['username']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>

<?php $info = $this->Login_user_model->get_stud_data($stud_id); ?>	

<div class="container">
	<div class="clearfix" style="text-align: left; margin-top: 10px; margin-bottom: 15px;">
		

<div class="container">
<div id="non-printable">
	<div id="non-printable">
		<button type="button" onclick="window.location='<?= base_url();?>Login/supervisor_profile_page';" style=" margin:0px 30px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 50px;" class="fa fa-arrow-left fa-1x"></span>
		</button>
	</div>
<div class="col-sm-12">
	<div class="well well-custom" style="box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 4px 0 rgba(0, 0, 0, 0.19);">
		<h1><span class="fa fa-calendar"></span> Feedback Form</h1><br>
	</div>
	<form class="form-horizontal" action="<?php echo base_url();?>Login/insert_attendance" method="POST" style="background: #fff; margin:-15px 0px 30px 0px;box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.21), 0 3px 6px 0 rgba(0, 0, 0, 0.19); padding: 20px 10px 15px 10px; " >
			<input type="hidden" name="stud_num" value="">
			<div style="padding: 10px 30px 10px 30px;">
				<div class="form-group col-sm-7" style="margin: .1em 0px .5em -2.2em;">
					<label class="control-label">To:</label>
					<input  type="text" name="title" class="form-control col-sm-6 text-capitalize" value="<?= $info['fname'].' '.$info['lname']?>"   >	
				</div>

				<div class="form-group">
					<p><textarea name="message" rows="8" cols="70" class="form-control col-sm-8" placeholder="Write your feedback here..." required></textarea></p>
				</div>			
				<div id="non-printable" class="" style="margin-left: -15px;" >								
						<button type="submit" class="btn btn-primary btnStudent"><span class="glyphicon glyphicon-check"></span> Submit</button>						        
				</div>
			</div>			
	</form>	
</div>
	
	
</div>	

</div>
</div>
</div>	


<!-- 	<label>Time Consumed:<?= $output; ?> hrs</label>
 -->
	
	</div>	
</div>

<div class="container">	
</div>

