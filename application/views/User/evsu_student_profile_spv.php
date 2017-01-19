
</head>

</body>
<header >
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
        <li class="#"><a href="<?php echo base_url();?>Login/supervisor_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	
				$cname = $_SESSION['cname'];    
				// $stud_id = $_SESSION['stud_id'];    
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
<div id="mySidenav" class="sidenav" style="
    background:url('<?php echo base_url();?>assets/images/sidenav.png')  no-repeat;background-size: 225%; padding: 20px 0px 0px 0px;  
">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<div class="panel-heading avatar1">
		<h3>My Profile</h3>
		<img src="<?php echo base_url();?>assets/images/img_avatar.png" style="height:106px;width:106px" alt="avatar">
		
	</div>
	<span class="text-capitalize nav_span col-sm-12">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
	<span class="text-capitalize nav_span">Agency Name: <?= $cname; ?></span>
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#myModal_add_admin"><span class="fa fa-user-plus"></span> Update Profile</button>
		
		<a class="btn" href="<?php echo base_url();?>Login/supervisor_profile_page"><button href="<?php echo base_url();?>Login/userlogs" type="button" class="btn btn-primary col-sm-2"><span class="fa fa-cloud-upload"></span> Upload Files</button></a>
	</div>

<!-- <a href="#" class="text-capitalize">Logout</a> -->
</div>
<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()" class="btn_nav btn btn-md btn-circle btn_circle">
		<span style="color: #fff" class="fa fa-tasks"></span>
	</span>

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">

	<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>	

<div class="well well-sm">
	<h2 class="text-capitalize"><span class="fa fa-user"></span> <?= $info['fname'].' '.$info['lname']?>'s Profile</h2>
</div>	

<div>
	<form class="form-horizontal" action="" method="">	
	<div class="form-group">	
		<label class="col-sm-3 control-label">Student Number: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control text-capitalize" value="<?= $info['stud_id']?>">
		</div>
	</div>
	<div class="form-group">	
		<label class="col-sm-3 control-label">Agency Name: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control text-capitalize" value="<?= $info['cname']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Name</label>						
		<div class="col-sm-8">
			<input type="text" class="form-control text-capitalize" value="<?= $info['fname'].' '.$info['lname']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Gender</label>						
		<div class="col-sm-8">
			<input type="text" class="form-control text-capitalize" value="<?= $info['sex']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Course</label>						
		<div class="col-sm-8">
			<input type="text"  class="form-control text-capitalize" value="<?= $info['course_name']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Year</label>						
		<div class="col-sm-8">
			<input type="text"  class="form-control text-capitalize" value="<?= $info['year']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Section</label>						
		<div class="col-sm-8">
			<input type="text"  class="form-control text-capitalize" value="<?= $info['section']?>" >
		</div>
	</div>
</form>
</div>






	</div>
</div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script>
		
		$(document).ready(function() {
	    $('#example').DataTable({
	        "aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
	        "iDisplayLength": 5
	    });
	} );	
	</script>

	





<div class="container">	
</div>

