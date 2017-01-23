<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.bootstrap-dropdown-hover.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #f5f5f5">
<header>
<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System"> 
	<!-- <div class="header">
		<div class="IMG_logo">
			<img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="100" height="100">
		</div>
		<div class="EVSU_system_title">
			On the Job Training Monitoring and Grading System
		</div>
		<div class="EVSU_system_sub_title">
			BUILDING GLOBALLY COMPETITIVE PROFESSIONALS
		</div>
	</div> -->		
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
        <li class="#"><a href="<?php echo base_url();?>Student/student_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Student/student_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
       <!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
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

<div class="container" style="padding: 0px 50px 0px 50px">
	<div class="panel" id="group_chat" style="border: .5px solid #ddd; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<div class="panel-heading panel_head ">
			<h2><span class="fa fa-comments"></span> Chat Message</h2>
		</div>
		<div class="panel-body">
			<table class="table table-responsive table-hover borderless">
			<?php foreach ($this->Login_user_model->get_gmessage() as $key): ?>
				<tbody>
					<tr>
						<td class="chat_td borderless" id="setDefault" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="<?= $key['username']; ?> <?= date('h:i A', strtotime($key['date_posted']));?>"
						<?php if (isset($_SESSION['currentAdmin'])){ ?>
								style="text-align: left; font-weight: bold; color: #b71c1c;"
						<?php } elseif (isset($_SESSION['currentCdr'])){ ?>
							style="text-align: left;font-weight: bold; color: #0288d1;"
						
						<?php } elseif (isset($_SESSION['currentSpv'])){ ?>
							style="text-align: left;d; color: #b71c1c;"
						
						<?php } else{ ?>
							style="text-align: left; color: #0288d1;"
						<?php } ?>
						

							><a href="#" class="text-capitalize"><?= $key['username']; ?></a>:
						</td>
						<td style="text-align: left;" class="borderless" id="setDefault" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title=" <?= date('h:i A', strtotime($key['date_posted'])).' '.date('F d, Y', strtotime($key['date_posted']));?>" >
						<p><?= $key['message']; ?></p></td>
						<td></td>
					</tr>
					<script>
						$(document).ready(function(){
						    $('[data-toggle="popover"]').popover();
						});
					</script>
				</tbody>
			<?php endforeach ?>
			</table>
			<div class="form-group">
				<label class="control-label col-sm-6"></label>
			</div>
			<form action="<?php echo base_url();?>Login/insert_stud_chat" method="post">
				<div class="row">
					<div class="form-group col-md-10">
						<textarea name="chat_message" placeholder="Write your messsge here" class="form-control" required=""></textarea>
						<small>*Don't use foul words here be friendly to everyone!</small>

					</div>
					<div class="col-sm-2">
						<button style="float: right;" type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-send"></span> Send</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	 $('[data-toggle="tooltip"]').tooltip({container: 'body'});

            $('#setSticky').on('click', function () {
                $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'sticky');
            });

            $('#setDefault').on('click', function () {
                $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'default');
            });
</script>


<div class="container">	
</div>

