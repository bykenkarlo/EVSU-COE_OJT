
<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.css">
	
		
	
</head>

</body>
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
       

      </ul>
      <ul class="nav navbar-nav navbar-right">
      	 <li class="#"><a href="<?php echo base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Student/student_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['stud_num'])) { ?>
				<?php echo '<span class="text-capitalize">'.$_SESSION['lname'].' '.$_SESSION['fname'].'</span>';	
				$user = $_SESSION['username'];	 
				$course = $_SESSION['course']; 
				$fname = $_SESSION['fname']; 
				$lname = $_SESSION['lname'];  
				$stud_num = $_SESSION['stud_num']; 
				$stud_id = $_SESSION['stud_num']; 
				}?><span class="caret"></span>
          	<ul class="dropdown-menu">
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($user)?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




</style>
<body>

<div id="mySidenav" class="sidenav " >
	<a href="javascript:void(0)" class="closebtn avatarBody" onclick="closeNav()"
	 style="position: absolute; float: left;">×</a>
	<div class="panel-heading avatar1" style="padding-bottom: 
	25px">
		<h3 style="color: #000; font-weight: bold;">Welcome!</h3>
		<!-- <span class="fa fa-user-circle  fa-5x" style="color: #000;"></span> -->
		<img data-toggle="modal" data-target="#myModal_add_admin" src="<?php echo base_url();?>assets/images/avatar_img.jpg" style="height:90px;width:90px" alt="avatar" >
		
	</div>
	<span class="text-capitalize nav_span col-sm-12">Student Number:<?php echo $stud_num;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Name:<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span col-sm-12">Course: <?php echo $course;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Username: <?php echo $user;  ?></span>

	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-danger col-sm-2 btnProfileStudent" data-toggle="modal" data-target="#myModal_edit"><span class="fa fa-user-plus"></span> Edit Profile</button>
		<button type="button" class="btn btn-danger col-sm-2 btnProfileStudent" data-toggle="modal" data-target="#myModal_cdr"><span class="fa fa-cloud-upload"></span> Upload File</button>
		<button onclick="window.location='<?php echo base_url();?>Student/journal';" type="button" class="btn btn-danger col-sm-2 btnProfileStudent"><span class="fa fa-newspaper-o"></span> Journal</button>
		<button onclick="window.location='<?php echo base_url();?>Student/grades';" type="button" class="btn btn-danger col-sm-2 btnProfileStudent"><span class="fa fa-calculator"></span> Grades</button>
		<button style="font-size: 14px;" onclick="window.location='<?= base_url(); ?>Login/PTPgrades?studID=null'" type="button" class="btn btn-danger col-sm-2 btnProfileStudent"><span class="fa fa-thumbs-up"></span> Peer to Peer Evaluation</button>
	</div>

<!-- <a href="#" class="text-capitalize">Logout</a> -->
</div>

<div id="main">
	<span  style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()"  class="btn_nav btn btn-md btn-circle btn_circle">
		<span id="#non-printable" style="color: #fff" class="fa fa-tasks"></span>
	</span>




<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">



		
<!-- Modal Edit -->
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header edit_profile_modal">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-edit"></span>Edit Profile</h2>
			</div>
        </div>
        <div class="modal-body" id="login_reg">
			<div class="container">
				<div class="col-sm-6 " id="login_user">
					<div id="" class="">
						<div class="">
							<form class="form-horizontal" action="<?php echo base_url();?>Login/update_student_pass" method="POST">	
									<input type="hidden" name="stud_id" value="<?= $_SESSION['stud_num']; ?>">
									<div class="form-group">	
										<label class="col-sm-3 control-label">New Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" placeholder="New Password" required>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Confirm Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" placeholder="Comfirm Password" required>
										</div>
									</div>
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 20px; ">
										<button type="submit" class="btn btn-info btn-xm signin_button"><span class="glyphicon glyphicon-share"></span> Update</button>
									</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer" style="margin-right: 30px;">
          <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal  -->


	<?php if (isset($_SESSION['stud_id'])) {
		$stud_data = $_SESSION['stud_id'];
	}?>
	<div class="well col-sm-10" >
		<h2 ><span class="fa fa-newspaper-o"></span> Daily Journal</h2>
	</div>
<div class="_journal_list"  style="margin-bottom: 10px;">	
		<?php foreach ($this->Login_user_model->get_journal_data($stud_id) as $key): ?>	
	<div class="panel-body" style="margin-bottom: 10px;">
		<form action="#" method="post" class="form-horizontal" role="form" >
			<input type="hidden" name="journal_id" value="<?= $key['journal_id'];  ?>">
			<div class="form-group" style="margin-top: .5em">
				<input type="hidden" name="journal_id" value="<?= $key['journal_id']?>">
				<b>
					<input type="text" name="title" class="form-control col-sm-4 text-capitalize" value="<?= $key['journal_title']?>" readonly  style="background-color: #fff">
					</input>
				</b>
				<div>
					<img style="box-shadow: 5px 5px 3px grey; border-radius: 5px; margin: 5px 0px 5px 0px" src="<?= base_url(), $key['image']?>" width="500" height="220" alt="Image">
				</div>
				<small style="font-weight: normal; font-size: 10px;">
					<span style=" margin: 1px 1px 0px 0px;">
					<label>
						Posted: <?= date('h:i A', strtotime($key['date_posted'])).' '.date('F d, Y', strtotime($key['date_posted']));?>
					</label> 						
					</span>
				</small>
			</div>
			<div class="form-group">
				<textarea name="message" rows="10" cols="60" class="form-control" value="" readonly style="background-color: #fff"><?= $key['journal_post']?>
				</textarea>
			</div>
			<div class="pull-right" style="">
				<button type="submit" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span> Update</button>
			</div>		
		</form>
	</div>
	<?php  endforeach?>	
</div>

		</div>
	</div>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<div class="container">	
</div>

