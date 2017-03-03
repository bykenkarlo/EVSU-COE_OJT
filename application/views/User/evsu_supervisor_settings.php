	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
</head>
<body class="body">

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
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	 <li class="#"><a href="<?php echo base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	
				$comp_id = $_SESSION['comp_id'];   
				$cname = $_SESSION['cname']; 
				}?>
				<?php if (isset($_SESSION['spv_id'])) {
					$spv_id = $_SESSION['spv_id'];
				} ?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="#"><span class="fa fa-cog"></span> Settings</a></li>
            <?php if (isset($_SESSION['username'])) { ?>
            	<li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);md5($_SESSION['fname']);md5($_SESSION['lname']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php }else ?>
            <li><a style="color: #000;"  href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="mySidenav" class="sidenav " >
	<a href="javascript:void(0)" class="closebtn avatarBody" onclick="closeNav()"
	 style="position: absolute; float: left;">×</a>
	<div class="panel-heading avatar1" style="padding-bottom: 
	25px">
		<h3 style="color: #000; font-weight: bold;">Welcome!</h3>
		<!-- <span class="fa fa-user-circle  fa-5x" style="color: #000;"></span> -->
		<img data-toggle="modal" data-target="#myModal_add_admin" src="<?php echo base_url();?>assets/images/avatar_img.jpg" style="height:90px;width:90px" alt="avatar" >
	</div>
		<?php  ?>
	<span class="text-capitalize nav_span col-sm-12">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
	<span class="text-capitalize nav_span">Agency Name: <?= $cname; ?></span>
	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_edit"><span class="fa fa-user-plus"></span> Update Profile</button>
		
		<button onclick="window.location='<?php echo base_url();?>Login/supervisor_profile_page';" href="<?php echo base_url();?>Login/userlogs" type="button" class="btn btn-primary col-sm-2 btnProfile btn-"><span class="fa fa-cloud-upload"></span> Upload Files</button>
	</div>
</div>


<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">

<?php $info = $this->Login_user_model->get_spv_info($spv_id); ?>	
<div class="wells">
	<div class=" table-responsive" id="table_list" style="background: #fff; border-radius: 2px; padding: 0px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);" >
		<div class="panel-body">
		<div style="margin-bottom: 20px; margin-top: -10px">
			<h1><span class="fa fa-user"></span> Your Profile Page</h1>
		</div>					
				<form  class="form-horizontal" action="<?php echo base_url();?>Login/updateSuccess" method="POST">							
					<input type="hidden" name="spv_id" value="<?php echo $spv_id ?>">
					<div class="form-group">	
						<label class="col-sm-3 control-label">Username</label>
						<div class="col-sm-8">
							<input type="text" name="username" class="form-control text-capitalize" value="<?= $info['username'];?>" placeholder="Username" autofocus>
						</div>
					</div>		 
					<div class="form-group">	
						<label class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-8">
							<input type="text" name="fname" class="form-control text-capitalize" value="<?= $info['fname'];?>"  required>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-8">
							<input type="text" name="lname" class="form-control text-capitalize" value="<?= $info['lname']?>" required >
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Agency Name</label>
						<div class="col-sm-8">
							<input type="text" name="cname" class="form-control text-capitalize" value="<?= $info['cname'] ?>" readonly >
						</div>
					</div>				
					<div class="form-group">
						<label class="col-sm-3 control-label">Email Address</label>						
							<div class="col-sm-8">
								<input type="email" name="email" class="form-control" value="<?= $info['email_address'];?>" readonly>
								<label><small style="font-weight: normal;">*must be valid email address.</small></label>
							</div>
									</div>
							<div class="form-group">	
								<label class="col-sm-3 control-label">Contact Num</label>		
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">
											<span class="">+63</span>
										</span>
									<input type="number" name="contact" class="form-control" value="<?= $info['contactNum'];?>" required>		
									</div>
									<label><small>*eg. 90123456789</small></label>
								</div>
							</div>
							<div class="form-group">	
								<label class="col-sm-3 control-label">Telephone Num</label>		
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">
											<span class="fa fa-phone"></span>
										</span>
										<input type="text" name="telnum" class="form-control" value="<?= $info['telNum'];?>" placeholder="Telephone Number" required>		
									</div>
								</div>
							</div>
							<div class="form-group date" data-provide="datepicker">	
								<label class="col-sm-3 control-label">Birthday</label>		
								<div class='col-sm-5 ' id='datetimepicker1'>
									<div class="input-group">
										<input type='text' name="birthday" class="form-control" value="<?= $info['birthday'];?>" placeholder="DD-MM-YY" />
							            <span class="input-group-addon">
							                <span class="glyphicon glyphicon-calendar"></span>
							          	</span>
									</div>						                  
						              </div>
								<script type="text/javascript">
								    $('#datetimepicker').data("DateTimePicker").FUNCTION();
								</script>
							</div>					
					<div class="form-group">	
						<label class="col-sm-3 control-label">New Password</label>
						<div class="col-sm-8">
							<input type="password" name="password" class="form-control" placeholder="New Password" required>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-8">
							<input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
						</div>
					</div>
					<div class="pull-right" style="margin-right: 95px; margin-bottom: 20px; ">
						<a href=""><button type="submit" class="btn btn-primary btn-lg btnUpdateAdmin"><span class="glyphicon glyphicon-share"></span> Update</button></a>
						<a href="<?php echo base_url();?>Login/coordinator_profile_page "><button type="button" class="btn btn-danger btn-lg btnCancel"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button></td></a>
					</div>	
		</form>	
		</div>
	</div>		
</div> 
</div>	
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
									<input type="hidden" name="stud_id" value="<?= $_SESSION['spv_id']; ?>">
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
 	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script>
		$(document).ready(function() {
	    $('#example').DataTable({
	        "aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
	        "iDisplayLength": 5
	    });
	} );		
	</script>

	
</div>



</div>
<div class="container">	
</div>

