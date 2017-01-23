	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	<style type="text/css">
		@media screen and (min-width: 319px) {
			#mobile-view {
				display: none;
			}
		}
		@media only screen and (max-width: 768px) {
			#bigScreen-view {
				display: none;
			}
		}
	</style>
</head>
<body style="background: #f5f5f5;">
<header id="bigScreen-view"> 
	<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="" width="100%" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System">
</header>
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
        <li class="#"><a href="<?= base_url();?>Login/profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/admin_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user" aria-hidden="true"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></span>
				<?php 
				$email = $_SESSION['email_add'];
				$sex = $_SESSION['sex'];
				$user = $_SESSION['username'];	    
				$currentUser = $_SESSION['currentUser'];
				$adminID = $_SESSION['admin_id'];   
				$admin_image = 	$_SESSION['admin_image'];
				} ?>
				
				<?php if ($sex == 'm') { 
					$sex = 'Male';
					}
					elseif ($sex == 'f') {
						$sex = 'Female';
				} ?>
		<span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;" href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li></a>
          </ul>      
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- sidenav -->
<?php $admin_Info = $this->Login_user_model->get_admin_info($adminID)?>
	
<div id="mySidenav" class="sidenav " >
	<a href="javascript:void(0)" class="closebtn avatarBody" onclick="closeNav()"
	 style="position: absolute; float: left;">×</a>
	<div class="panel-heading avatar1" style="padding-bottom: 25px">
		<h3 style="color: #000; font-weight: bold;">Welcome!</h3>
		<!-- <span class="fa fa-user-circle  fa-5x" style="color: #000;"></span> -->
		<img src="<?= base_url()?>assets/images/avatar_img.jpg" data-toggle="modal" data-target="#myModal_image"  style="height:90px;width:90px" alt="avatar" >
	</div>
	<span class="text-capitalize nav_span col-sm-12">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
	<span class="nav_email">Email: <?= $email; ?></span>
	<span class="text-capitalize nav_span">Gender: <?= $sex; ?></span>
	<div class="add_admin_cdr" style="text-align: left;">
		<button type="button" class="btn btn-primary col-sm-2 btn-lg btnProfile" data-toggle="modal" data-target="#myModal_add_admin"><span class="fa fa-user-plus"></span> Add Administrator</button>		
		<button type="button" class="btn btn-primary col-sm-2 btn-lg btnProfile" data-toggle="modal" data-target="#myModal_cdr"><span class="fa fa-user-plus"></span> Add Coordinator</button>
		<button type="button" class="btn btn-primary col-sm-2 btn-lg btnProfile" data-toggle="modal" data-target="#myModal_comp"><span class="fa fa-plus-circle"></span> Add Agency</button>
		<button type="button" class="btn btn-primary col-sm-2 btn-lg btnProfile" data-toggle="modal" data-target="#myModal_course"><span class="fa fa-plus-circle"></span> Add Course</button>
		<button type="button" class="btn btn-primary col-sm-2 btn-lg btnProfile" onclick="window.location='<?= base_url()?>Login/others';"><span class="fa fa-list"></span> Others</button>
		<button type="button" onclick="window.location='<?php echo base_url();?>Login/userlogs';" class="btn btn-primary col-sm-2 btn-lg btnProfile"><span class="fa fa-tasks"></span> User Logs</button>		
	</div>

<!-- <a href="#" class="text-capitalize">Logout</a> -->
</div>
<!-- end side nav-->

<div class="clearfix">
	
<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()" class="btn_nav btn btn-md btn-circle btn_circle">
		<span style="color: #fff" class="fa fa-tasks"></span>
	</span>

<div class="container" >
<div style="font-size:16pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message') ?>
</div>

<!-- end profile holder-->


<div class="col-sm-12 " >
	<div class="panel-body table-responsive" style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
	<div class="blockquote" style="margin-bottom: 30px">
		<h1><span class="fa fa-users"></span> Administrator List  </h1>
	</div>
	<div style="margin-bottom: 10px;">
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/profile_page'"><span class="fa fa-th-list"></span> Administrator Lists</button>

		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/coordinator_lists'"><span class="fa fa-th-list"></span> Coordinator Lists</button>
			
	</div>
	<div class="">
		<table id="example" class="table table-hover table-striped " style="margin-top: 20px; border-bottom: 1px solid Steelblue">
			<thead style="background: Steelblue ; color: #fff;">
				<tr>
					<th><input class="fa fa-check-square" type="checkbox" name="select-all" id="select-all" /></th>	
					<th>Name</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Email Address</th>
					<th>Date Registered</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr class="alert alert-info">
					<th><input class="fa fa-check-square" type="checkbox" name="select-all" id="select-all" /></th>	
					<th>Name</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Email Address</th>
					<th>Date Registered</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody >
				<?php foreach ($this->Login_user_model->get_all_admin() as $key): ?>			
				<tr>
					<td width="1"><input type="checkbox" name="delete_cdr[]" value="<?= $key['admin_id'] ?>" id="selector"></td>
					<td class="text-capitalize"><a href="#"><?= $key['fname'].' '.$key['lname']?></a></td>
					<td class="text-capitalize"><?php echo $key['username']; ?></td>
					<td class="text-capitalize"><?php echo $key['sex']; ?></td>
					<td ><a href="emailto:<?php echo $key['email_add']; ?>"><?php echo $key['email_add']; ?></a></td>
					<td ><?php echo $key['date_reg']; ?></td>
					<td>
						<button class="btn btn-info btn-xs btnCircle" type="button" onclick="window.location='<?= base_url();?>Login/update_admin/<?php echo $key['admin_id']; ?>';"><span class="glyphicon glyphicon-pencil"></span></button>
						<a href="<?php echo base_url();?>Control/delete_admin/<?php echo $key['admin_id']; ?>" class="btn btn-danger btn-xs btnCircle glyphicon glyphicon-trash" onclick="return confirm('Are you sure?')"></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
		
	</div>
</div>
<!-- end userlist -->




<!-- Modal add admin-->
  <div class="modal fade" id="myModal_about" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-info-circle"></span> About</h2>
			</div>
        </div>
        <div class="modal-body">
			<div class="container">

				<div class="col-sm-6 " id="">
					<div id="" class="">
						<div class="">
							<div id="modal_about"></div>
	<div id="modal_about">
		<h2><b>On the Job Training Monitoring and Online Grading System</b></h2>
		<h4>Eastern Visayas State University</h4>
		<h5>College Of Engineering</h5>
	</div>	
	<div class="container">

					<div class=" " style="margin-right: 50px;">
						<div class="col-sm-6">
							<h3 class="text-left text-justify oph3" style="margin-right: 50px;"><b>
							Objective of the Project</b></h3>
						<b class="opb" style="margin-right: 50px;">General Objective:</b>
							<p>This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University</p>
							<p>Our goal has its goal to make the work of our professors easier and for the students to be more aware of their grades.</p>
						<b class="opb">Specific Objectives:</b>
						<ul style="margin-right: 50px;">
							<li>To design a more organized way of submitting the grades of the OJT's.</li>
							<li>To help the industry partners of EVSU to submit the grades of the OJT's in their agency in a faster and more effecient way.</li>
							<li>To allow the OJT Coordinators to manage and monitor the OJT status
							 and grades of the students more conveniently.</li>
							<li>To create a module that will compute intern's grades based on inputted data.</li>
							<li>To create a system that will secure and maintain the integrity of data.</li>
							<li>To create a module that will keep the records of every intern in different agencies or companies.</li>
						</ul>
						</div>
			</div>	
	</div>
						</div>
					</div>
				</div>

        	</div>

        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->




<!-- Modal add admin-->
  <div class="modal fade" id="myModal_add_admin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Administrator</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">
								
							<form class="form-horizontal" action="<?php echo base_url();?>Control/register_admin" method="POST">	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Username</label>
										<div class="col-sm-8">
											<input type="text" name="reg_username" class="form-control text-capitalize" placeholder="Username" autofocus required>
											<label><small style="font-weight: normal;">*as your(lastname)&(firstname) ex.delacruzjuan</small></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>						
										<div class="col-sm-8">
											<input type="text" name="reg_lname" class="form-control text-capitalize" placeholder="Last Name"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">First Name</label>						
										<div class="col-sm-8">
											<input type="text" name="reg_fname" class="form-control text-capitalize" placeholder="First Name" "" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Gender</label>						
										<div class="col-sm-4">
											<select name="reg_sex" class="form-control">
												<option value="-">Choose</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Email Address</label>						
										<div class="col-sm-8">
											<input type="email" name="reg_email" class="form-control " placeholder="Email Address" required>
											<label><small style="font-weight: normal;">*must be valid email address this will be use in case password is lost</small></label>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Password</label>		
										<div class="col-sm-8">
											<input type="password" name="reg_pass" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Repeat Password</label>		
										<div class="col-sm-8">
											<input type="password" name="confirm_pass" class="form-control" placeholder="Repeat Password"  required>
										</div>
									</div>																											
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Admin</button>
									</div>
									
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->


<!-- Modal add coordinator-->
  <div class="modal fade" id="myModal_cdr" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Coordinator</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">
								
							<form class="form-horizontal" action="<?php echo base_url();?>Control/register_coordinator" method="POST">	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Username</label>
										<div class="col-sm-8">
											<input type="text" name="reg_username" class="form-control text-capitalize" placeholder="Username" autofocus required>
											<label><small style="font-weight: normal;">*as your(lastname)&(firstname) ex.delacruzjuan</small></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Last Name</label>						
										<div class="col-sm-8">
											<input type="text" name="reg_lname" class="form-control text-capitalize" placeholder="Last Name"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">First Name</label>						
										<div class="col-sm-8">
											<input type="text" name="reg_fname" class="form-control text-capitalize" placeholder="First Name" "" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Course</label>
										<div class="col-sm-4">
											<select name="reg_course_id" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_course() as $key):?>
												<option value="<?= $key['course_id'] ?>"><?= $key['course_name'] ?>
												</option>

												<?php endforeach ?>
												<!--  -->
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Agency Name</label>
										<div class="col-sm-4">
											<select name="reg_cname" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_cname() as $key) : 
												?>
												<option value="<?= $key['cname'] ?>"><?= $key['cname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Password</label>		
										<div class="col-sm-8">
											<input type="password" name="reg_pass" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Repeat Password</label>		
										<div class="col-sm-8">
											<input type="password" name="confirm_pass" class="form-control" placeholder="Repeat Password"  required>
										</div>
									</div>																											
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Coordinator</button>
									</div>
									
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->

<!-- Modal add course-->
  <div class="modal fade" id="myModal_course" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Course</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">
								
							<form class="form-horizontal" action="<?php echo base_url();?>Control/add_course" method="POST">	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Course Abbreviation</label>
										<div class="col-sm-8">
											<input type="text" name="reg_course_abbrv" class="form-control text-capitalize" placeholder="Course Abbreviation" autofocus required>
											<label><small style="font-weight: normal;">*BSCE</small></label>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Course Name</label>
										<div class="col-sm-8">
											<input type="text" name="reg_course_name" class="form-control text-capitalize" placeholder="Course Name" required>
											<label><small style="font-weight: normal;">*Bachelor of Science in Civil Engineering</small></label>
										</div>
									</div>
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Course</button>
									</div>	
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->

<!-- Modal add coordinator-->
  <div class="modal fade" id="myModal_comp" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Agency</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">
								
							<form class="form-horizontal" action="<?php echo base_url();?>Control/add_company" method="POST">	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Agency name</label>
										<div class="col-sm-8">
											<input type="text" name="reg_cname" class="form-control text-capitalize" placeholder="Agency Name" autofocus required>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Agency Supervisor</label>
										<div class="col-sm-8">
											<input type="text" name="reg_spv" class="form-control text-capitalize" placeholder="Agency Supervisor"  required>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Agency Address</label>
										<div class="col-sm-8">
											<input type="text" name="reg_caddress" class="form-control text-capitalize" placeholder="Agency Address"  required>
										</div>
									</div>						
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Agency</button>
									</div>	
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->
<!-- Modal add coordinator-->
<div class="modal fade" id="myModal_image" role="dialog" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="panel-heading">
				<h2><span class="fa fa-image"></span> Update Image</h2>
			</div>
        </div>
        <div class="modal-body">
			<img data-toggle="modal" data-target="#myModal_image" src="<?php echo base_url();?><?php echo base_url();?>$adminInfo['admin_image']" style="height:400px;width:550px" alt="avatar" >
        <div>
	        <div class="modal-footer">
	        	<form action="<?= base_url()?>Login/insertImage" method="POST" enctype="multipart/form-data">
	        		<input type="hidden" name="admin_id" value="<?= $adminID?>">
	        		<label class="">            	
		            <span class="btn btn-info btnStudent">
		               	<span class="fa fa-image"></span> Add Image <input type="file" style="display: none;" name="fileToUpload" >
		            </span>
		        </label>
		        <button type="submit" class="btn">Upload</button>
	        	</form>
	          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;"><span class="fa fa-close"></span> Close</button>
	        </div>        		
        </div>
      	</div>     
    </div>
  </div> 
</div>
<!--Modal end -->
		</div>		
	</div>
</div>
</div>
	<script>	
		$(document).ready(function() {
	    $('#example').DataTable({
	        "aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
	        "iDisplayLength": 5
	    });
	} );	
	</script>
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
	<script>
		window.setTimeout(function) {
			$(".alert")..fadeTo(500.0).slideUp(500,
		function() {
			$(this).remove();
		});
		}, 4000);
	</script>
	<script>
		// Listen for click on toggle checkbox
		$('#select-all').click(function(event) {   
		    if(this.checked) {
		        // Iterate each checkbox
		        $(':checkbox').each(function() {
		            this.checked = true;                        
		        });
		    }
		});
	</script>
	
<div class="container">	
</div>


