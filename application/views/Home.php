<?php if (isset($_SESSION['currentAdmin'])){ ?>
	
<!-- Admin page -->
		<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
</head>
<body >
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li class="#"><a href="<?= base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="<?= base_url();?>Login/about"  id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="<?= base_url();?>Login/Usersguide"><span class="fa fa-envelope"></span> Help Desk</a></li>
		<li><a href="<?php echo base_url();?>Login/admin_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
         	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<span class="fa fa-user" aria-hidden="true"></span><?php 
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
            <li>
            	<a style="color: #000;" href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);?>">
            	<span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
            </a>
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
		<img src="<?= base_url()?>assets/images/avatar_img.jpg" style="height:90px;width:90px" alt="avatar" >
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
		<button type="button" onclick="window.location='<?php echo base_url();?>Login/criteria';" class="btn btn-primary col-sm-2 btn-lg btnProfile"><span class="fa fa-bar-chart"></span> Criteria</button>
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
		<h1 class="hoverme"><span class="fa fa-users"></span> Administrator List  </h1>
	</div>
	<div style="margin-bottom: 10px;" class="">
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/profile_page'"><span class="fa fa-th-list"></span> Administrator Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/coordinator_lists'"><span class="fa fa-th-list"></span> Coordinator Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/others'"><span class="fa fa-th-list"></span> Course Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/agency_list'"><span class="fa fa-th-list"></span> Agency Lists</button>

		
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
					<th>Contact Number</th>
					<th>Birthday</th>
					<th>Current Address</th>
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
					<th>Contact Number</th>
					<th>Birthday</th>
					<th>Current Address</th>
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
					<td class="text-capitalize"><a href="tel:+63<?php echo $key['contactNum']; ?>">+63<?php echo $key['contactNum']; ?></a></td>
					<td class="text-capitalize"><?php echo $key['birthday']; ?></td>
					<td class="text-capitalize"><?php echo $key['address']; ?></td>
					
					<td ><?php echo $key['date_reg']; ?></td>
					<td>
						<button class="btn btn-info btn-xs btnCircle" type="button" onclick="window.location='<?= base_url();?>Login/update_admin/<?php echo $key['admin_id']; ?>';"><span class="fa fa-pencil"></span></button>
						<a href="<?php echo base_url();?>Control/delete_admin/<?php echo $key['admin_id']; ?>" class="btn btn-danger btn-xs btnCircle fa fa-trash" onclick="return confirm('Are you sure?')"></a>
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
										<label class="col-sm-3 control-label">Mobile Number</label>		
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">
											            <span class="">+63</span>
											    </span>
												<input type="text" name="reg_contact" class="form-control" placeholder="Contact Number" maxlength="10" minlength="10" required>		
											</div>
											<label><small>*eg. 90123456789</small></label>
										</div>
									</div>
									<div class="form-group date" data-provide="datepicker">	
										<label class="col-sm-3 control-label">Birthday</label>		
										<div class='col-sm-5 ' id='datetimepicker1'>
											<div class="input-group">
												<input type='text' name="reg_birthday" class="form-control" placeholder="Day-Month-Year" />
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
										<label class="col-sm-3 control-label">Current Address </label>		
										<div class="col-sm-8">
											<input type="text" name="reg_curaddress" class="form-control text-capitalize" placeholder="Brgy. St. City. Province" required>
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
												<option class="text-capitalize" value="<?= $key['course_id'] ?>"><?= $key['course_name'] ?>
												</option>

												<?php endforeach ?>
												<!--  -->
											</select>
										</div>
									</div>
									
									<div class="form-group">	
										<label class="col-sm-3 control-label">Mobile Number</label>		
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">
											            <span class="">+63</span>
											    </span>
												<input type="text" name="reg_contact" class="form-control" placeholder="Contact Number" minlength="10" maxlength="10" required>		
											</div>
											<label><small>*eg. 90123456789</small></label>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Email address</label>		
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">
											            <span class="">@</span>
											    </span>
												<input type="email" name="reg_email" class="form-control" placeholder="Email Address" required>		
											</div>
											<label><small>*eg. 90123456789</small></label>
										</div>
									</div>
									<div class="form-group date" data-provide="datepicker">	
										<label class="col-sm-3 control-label">Birthday</label>		
										<div class='col-sm-5 ' id='datetimepicker1'>
											<div class="input-group">
												<input type='text' name="reg_birthday" class="form-control" placeholder="Day-Month-Year" />
							                    <span class="input-group-addon">
							                        <span class="fa fa-calendar"></span>
							                    </span>
											</div>						                  
						                </div>
										<script type="text/javascript">
								            $('#datetimepicker').data("DateTimePicker").FUNCTION();
								        </script>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Current Address </label>		
										<div class="col-sm-8">
											<input type="text" name="reg_curaddress" class="form-control text-capitalize" placeholder="St. Brgy. City. Province" required>
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



<!-- Modal add agency-->
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

		</div>		
	</div>
</div>
</div>
 	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
 	<script type="text/javascript" src="<?php echo base_url();?>assets/js/af.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
	
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable({

        "iDisplayLength": 5,
        dom: 'Bfrtip',
    	buttons: [
    		'copy','csv','print','pdf', 'colvis',
    		]
        
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
		    $("input:checkbox").prop('checked', $(this).prop("checked"));
		});
	</script>
	
<div class="container">	
</div>





	



<!-- End Admin page -->









<?php } elseif (isset($_SESSION['currentCdr'])){ ?>

	<!-- Coordinator page  -->
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	</head>
</body>
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
			<!-- <img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="50" height="50"> -->
      <a class="navbar-brand" href="#"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
              </ul>
      <ul class="nav navbar-nav navbar-right">
       	<li class="#"><a href="<?= base_url();?>"><span class="fa fa-home"></span> Home </a>
        </li>
        <li><a href="<?= base_url();?>Login/about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="<?= base_url();?>Login/Usersguide"><span class="fa fa-envelope"></span> Help Desk</a></li>
		<li><a href="<?= base_url(); ?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
				$course = $_SESSION['course_abbrv'];	    
				$cname = $_SESSION['cname'];
				$course_id = $_SESSION['course_id'];  
				$cdr_id =$_SESSION['cdr_id']; 
				}?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="<?= base_url(); ?>Member/logout/<?= md5($_SESSION['fname']);md5($_SESSION['lname']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
	<div class="side_nav">
		<span class="text-capitalize nav_span">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
		<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
		<span class="text-capitalize nav_span">Course: <?= $course; ?></span>
		<span class="text-capitalize nav_span">Agency Name: <?= $cname  ?></span>
	</div>	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary btnProfile col-sm-2" data-toggle="modal" data-target="#myModal_supervisor"><span class="fa fa-user-plus"></span> Add Supervisor</button>
		
		<button type="button" class="btn btn-primary btnProfile col-sm-2" data-toggle="modal" data-target="#myModal_student"><span class="fa fa-user-plus"></span> Add Student</button>
		
		<button onclick="window.location='<?php echo base_url();?>Login/uploads';" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-cloud-upload"></span> Upload Files</button>
	</div>
</div>

<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()" class="btn_nav btn btn-md btn-circle btn_circle">
		<span style="color: #fff" class="fa fa-tasks"></span>
	</span>


<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">	








<!-- Modal add student-->
  <div class="modal fade" id="myModal_student" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Student</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">	
							<form class="form-horizontal" action="<?php echo base_url();?>Control/register_official_stud_user" method="POST">	
									<div class="form-group">	
										<label class="col-sm-3 control-label">Student Number</label>
										<div class="col-sm-8">
											<input type="text" name="reg_stud_num" class="form-control text-capitalize" placeholder="Student number" autofocus required>
											
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
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label">Agency Name</label>
										<div class="col-sm-4">
											<select name="reg_comp_id" class="form-control text-capitalize">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_cname() as $key) : 
												?>
												<option class="text-capitalize" value="<?= $key['comp_id'] ?>"><?= $key['cname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div> -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Course</label>	
										<div class="col-sm-4">
											<select name="reg_course_id" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_course() as $key):?>
												<option class="text-capitalize" value="<?= $key['course_id'] ?>"><?= $key['course_name'] ?></option>
												<?php endforeach ?>
												<!--  -->
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Gender</label>						
										<div class="col-sm-4">
											<select name="reg_gender" class="input-xs form-control" required="" >
												<option value="-">Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Year</label>						
										<div class="col-sm-4">
											<select name="reg_year" class="input-xs form-control" required>
												<option value="-">Year</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Section</label>						
										<div class="col-sm-4">
											<select name="reg_section" class="input-xs form-control" required>
												<option value="-">Section</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
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
										<label class="col-sm-3 control-label">Mobile Number</label>		
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">
											            <span class="">+63</span>
											    </span>
												<input type="text" name="reg_contact" class="form-control" placeholder="Contact Number" minlength="10" maxlength="10" required>		
											</div>
											<label><small>*eg. 90123456789</small></label>
										</div>
									</div>
									<div class="form-group date" data-provide="datepicker">	
										<label class="col-sm-3 control-label">Birthday</label>		
										<div class='col-sm-5 ' id='datetimepicker1'>
											<div class="input-group">
												<input type='text' name="reg_birthday" class="form-control" placeholder="Day-Month-Year" />
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
										<label class="col-sm-3 control-label">Current Address </label>		
										<div class="col-sm-8">
											<input type="text" name="reg_curaddress" class="form-control text-capitalize" placeholder="Brgy. St. City. Province" required>
										</div>
									</div>																										
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: 5px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Student</button>
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

<!-- Modal add supervisor -->
  <div class="modal fade" id="myModal_supervisor" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Supervisor</h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">					
							<form class="form-horizontal" action="<?= base_url(); ?>Control/register_supervisor" method="POST">	
									<input type="hidden" name="cdr_id" value="<?= $cdr_id ?>">
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
										<label class="col-sm-3 control-label">Agency Name</label>
										<div class="col-sm-4">
											<select name="reg_comp_id" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_cname() as $key) : 
												?>
												<option value="<?= $key['comp_id'] ?>"><?= $key['cname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Email Address</label>						
										<div class="col-sm-8">
											<input type="email" name="reg_email" class="form-control " placeholder="Email Address" required>
											<label><small style="font-weight: normal;">*must be valid email address.</small></label>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Mobile Number</label>		
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">
											            <span class="">+63</span>
											    </span>
												<input type="text" name="reg_contact" class="form-control" placeholder="Contact Number" minlength="10" maxlength="10" required>		
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
												<input type="number" name="reg_telnum" class="form-control" placeholder="Telephone Number" required>		
											</div>
										</div>
									</div>
									<div class="form-group date" data-provide="datepicker">	
										<label class="col-sm-3 control-label">Birthday</label>		
										<div class='col-sm-5 ' id='datetimepicker1'>
											<div class="input-group">
												<input type='text' name="reg_birthday" class="form-control" placeholder="Day-Month-Year" />
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
										<label class="col-sm-3 control-label">Password</label>						
										<div class="col-sm-8">
											<input type="password" name="reg_pass" class="form-control text-capitalize" placeholder="Password"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Repeat Password</label>						
										<div class="col-sm-8">
											<input type="password" name="confirm_pass" class="form-control text-capitalize" placeholder="Repeat Password"  required>
										</div>
									</div>
											
																																				
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: 10px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add Supervisor</button>
									</div>
									
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 33px;">Close</button>
        </div>        		
        	</div>
      </div>     
    </div>
  </div> 
</div>
<!--Modal end -->
		<?php
			 if (isset($_SESSION['student_info']))
			 {
				 $stud_num = $_SESSION['stud_num'];
				 $lname = $_SESSION['lname'];
				 $fname = $_SESSION['fname'];			
		?>
		<?php echo $stud_num = $_SESSION['stud_num']; ?>
		

		<?php } ?>
<div>
	<div class="table_list" >
		<div class="panel-body table-responsive" style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
		<div class="" style="margin-bottom: 15px">
			<h1 align="left" class="hoverme"><span class="fa fa-users"></span> Training Supervisors List</h1>
		</div>
		<div style="margin-bottom: 10px;">
			<!-- <button onclick="window.location='<?= base_url()?>Login/coordinator_profile_page'" class="btn btn-primary btn-lg btnCdrSpv"><span class="fa fa-th-list"></span> Training Supervisor</button> -->
			<div class="dropdown">
				<button  class="btn btn-primary btn-lg dropdown-toggle btnCdrSpv" type="button" data-toggle="dropdown"><span class="fa fa-th-list"></span> Training Supervisor <span class="caret"></span></button>
				<ul class="dropdown-menu" style="margin-left: 30px;">
					<li><a href="<?= base_url()?>Login/coordinator_profile_page">Training Supervisor's List</a></li>
					<li><a href="<?= base_url()?>Login/inactive_accounts">Inactive Accounts</a></li>
				</ul>
			</div>	
			<div class="dropdown">
				<button  class="btn btn-primary btn-lg dropdown-toggle btnAdminCdr" type="button" data-toggle="dropdown"><span class="fa fa-th-list"></span> Students <span class="caret"></span></button>
				<ul class="dropdown-menu" style="margin-left: 30px;">
					<li><a href="<?= base_url()?>Login/student_list">Student's List</a></li>
					<li><a href="<?= base_url()?>Login/student_grade_list">Student's Grades</a></li>
				</ul>
			</div>
				
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/myAgency/<?= $cdr_id ?>'"><span class="fa fa-th-list"></span> My Agency Lists</button>

		</div>	
		<div class="">
		<form action="<?= base_url()?>Control/delete_spv_list" method="POST"> 
					<table id="example" class="table table-hover table-striped " style="margin-top: 10px; border-bottom: 1px solid SteelBlue">
					<thead style="color: #fff; background-color:SteelBlue">
						<tr>
							<th><input class="fa fa-check-square" type="checkbox" name="select-all" id="select-all" /></th>	
							<th>Name</th>
							<th>Username </th>
							<th>Agency Name </th>
							<th>Email Address </th>
							<th>Birthday </th>
							<th>Contact Number </th>
							<th>Agency Tel.Number </th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr class="alert alert-info">
							<th><input type="checkbox"  /></th>	
							<th>Name</th>
							<th>Username </th>
							<th>Agency Name </th>
							<th>Email Address </th>
							<th>Birthday </th>
							<th>Contact Number </th>
							<th>Agency Tel.Number </th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					<?php foreach ($this->Login_user_model->get_all_spv($cdr_id) as $key): ?>
						<tr>
							<td><input type="checkbox" name="delete_spv[]" value="<?= $key['spv_id']?>"></td>
							<td class="text-capitalize"><a href="<?= base_url()?>Login/supervisorPage/<?= $key['spv_id']?>" style="color: #1565c0" ><?php echo $key['fname'].' ' .$key['lname'] ?></a></td>
							<td class="text-capitalize"><?php echo $key['username'] ?></td>
							<td class="text-capitalize"><?php echo $key['cname'] ?></td>
							<td class=""><a href="emailto:<?php echo $key['email_address'] ?>"><?php echo $key['email_address'] ?></a></td>
							<td class="text-capitalize"><?php echo $key['birthday'] ?></td>
							<td class="text-capitalize"><a href="tel:+63<?php echo $key['contactNum'] ?>">+63<?php echo $key['contactNum'] ?></a></td>
							<td class="text-capitalize"><?php echo $key['telNum'] ?></td>
							<td>
							<a href="<?= base_url(); ?>Login/update_supervisor/<?php echo $key['spv_id']; ?>" class="btn btn-info btn-xs btnCircle fa fa-pencil"></a>
							<a href="<?= base_url(); ?>Control/delete_supervisor/<?php echo $key['spv_id']; ?>" class="btn btn-danger btnCircle fa fa-trash btn-xs" onclick="return confirm('Are you sure?')"></a></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<div class="btn-group" style="float: right;" style="margin: 10px 0px 10px 0px ;">
					<button data-toggle="modal" data-target="#myModal_supervisor" type="button" class="btn btn-default"><span class="fa fa-user-plus"></span> New</button>
					<button type="submit" class="btn btn-default" onclick="return confirm('Are you sure to delete this?')"><span class="fa fa-trash"></span> Delete Multiple</button>
				</div>
		</form>			
				</div>
			</div>								
		</div>
	</div>		
</div>
		</div>
	</div>
</div>
<div class="container"></div>
 	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
	
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable({

        "iDisplayLength": 10,
        dom: 'Bfrtip',
    	buttons: [
    		'copy','csv','print','pdf', 'colvis',
    		]
        
    	});

	} );	
	</script>
<script>
		// Listen for click on toggle checkbox
		$('#select-all').click(function(event) {   
		    $("input:checkbox").prop('checked', $(this).prop("checked"));
		});
</script>




	<!-- End Coordinator Page -->


















<?php }elseif (isset($_SESSION['currentSpv'])){ ?>
	
	<!-- Supervisor page -->

</head>
<body class="body">

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
			<!-- <img src="/EVSU_OJT/assets/images/EVSU_logo.png" width="50" height="50"> -->
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	 <li class="#"><a href="<?php echo base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="<?= base_url();?>Login/about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="<?= base_url();?>Login/Usersguide"><span class="fa fa-envelope"></span> Help Desk</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	
				$comp_id = $_SESSION['comp_id'];   
				$cname = $_SESSION['cname']; 
				}?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="#"><span class="fa fa-cog"></span> Settings</a></li>
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']);md5($_SESSION['fname']);md5($_SESSION['lname']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
		<img data-toggle="modal" data-target="#myModal_add_admin" src="<?php echo base_url();?>assets/images/img.svg" style="height:90px;width:90px" alt="avatar" >
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
<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()" class="btn_nav btn btn-md btn-circle btn_circle">
		<span style="color: #fff" class="fa fa-tasks"></span>
	</span>

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">


<div class="wells">
	<div class=" table-responsive" id="table_list" style="background: #fff; border-radius: 2px; padding: 0px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);" >
		<div class="panel-body">
		<div style="margin-bottom: 20px; margin-top: -10px">
			<h1 class="hoverme"><span class="fa fa-users"></span> Trainee's List</h1>
		</div>					
				<table id="example" class="table table-hover table-striped " style="margin-top: 10px; font-size: 13px; border-bottom: 1.5px solid SteelBlue;">
					<thead style="text-align: center; color: #fff; background: SteelBlue" >
						<tr class="">
							<th><span class="fa fa-user"></span> Name </th>
							<th><span class="fa fa-user"></span> Gender </th>
							<th><span class="fa fa-calculator"></span> Grades</th>
							<th><span class="fa fa-calendar"></span> Attendance Record</th>
							<th><span class="fa fa-list"></span> Performance/Feedback</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($this->Login_user_model->get_all_student_spv($comp_id) as $key): ?>
						<tr class="spv_td_list">
							<td  style="text-align: left;" class="text-capitalize"><a href="<?php echo base_url();?>Login/student_profile/<?php echo $key['stud_id'] ?>" style="" > <?php echo $key['lname'].' ' .$key['fname'] ?></a></td>
							<td class="text-capitalize"><?php echo $key['sex']; ?></td>
							<td class="text-capitalize"><a href="<?php echo base_url();?>Control/grades/<?php echo $key['stud_id'] ?>" style="color: #1565c0">View</a></td>
							<td class="text-capitalize"><a href="<?php echo base_url();?>Control/attendance/<?php echo $key['stud_id'] ?>" style="color: #1565c0"> View</a></td>
							<td class="text-capitalize" ><a href="<?php echo base_url();?>Control/performance/<?php echo $key['stud_id'] ?>" style="color: #1565c0">View</a></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>		
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


	<!-- End Supervisor page -->












<?php }elseif (isset($_SESSION['currentStud'])){ ?>
	
	<!-- Student Page -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-timepicker.min.css">
	<style type="text/css">
		#example_length{
			display: none;
		}
		#example_info{
		    float: left;
		    display: none;	
		}
		#example_filter{ display: none;	}
	@media print
	{
		
	}
</style>
</head>
<header>
<img id="" src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" width="100%" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System">

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
        <li><a href="<?= base_url();?>Login/about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="<?= base_url();?>Login/Usersguide"><span class="fa fa-envelope"></span> Help Desk</a></li>
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
            <li><a style="color: #000;"  href="<?php echo base_url();?>Student/logout/<?= md5($user)?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>

<div id="" style="z-index: 1;">
	<button type="button" data-toggle="modal" data-target="#myModal_journal" style=" margin:0px 40px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 2; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 30px; padding: 3px 0px 3px 0px" class="fa fa-pencil" aria-hidden="true"></span>
	</button>
</div>	

<div id="mySidenav" class="sidenav " >
	<a href="javascript:void(0)" class="closebtn avatarBody" onclick="closeNav()"
	 style="position: absolute; float: left;">×</a>
	<div class="panel-heading avatar1" style="padding-bottom: 
	25px">
		<h3 style="color: #000; font-weight: bold;">Welcome!</h3>
		<!-- <span class="fa fa-user-circle  fa-5x" style="color: #000;"></span> -->
		<img data-toggle="modal" data-target="#myModal_add_admin" src="<?php echo base_url();?>assets/images/avatar_img.jpg" style="height:90px;width:90px" alt="avatar" >
		
	</div>
	<?php $dataqwe = $this->Login_user_model->getcnameqwe($stud_id)

	 ?>
	 
	<span class="text-capitalize nav_span col-sm-12">Student Number: <?php echo $stud_num;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span col-sm-12">Course: <?php echo $course;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Username: <?php echo $user;  ?></span>		
	<span class=" nav_span col-sm-12">Agency Assigned: <?php echo $dataqwe['cname']  ?></span>	
		
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_edit"><span class="fa fa-user-plus"></span> Edit Profile</button>
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_cdr"><span class="fa fa-cloud-upload"></span> Upload File</button>
		<!-- <button onclick="window.location='<?php echo base_url();?>Student/journal';" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-newspaper-o"></span> Journal</button> -->
		<button onclick="window.location='<?php echo base_url();?>Student/grades';" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-calculator"></span> Grades</button>
		<button style="font-size: 14px;" onclick="window.location='<?= base_url(); ?>Login/PTPgrades?studID=<?= $stud_id ?>'" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-thumbs-up"></span> Rate Your Self</button>
	</div>
</div>
<div id="main">
	<span  style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()"  class="btn_nav btn btn-md btn-circle btn_circle">
		<span id="" style="color: #fff" class="fa fa-tasks"></span>
	</span>
<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message', 2) ?>
</div>

<div class="container">



<div id="" class="col-sm-12 table-responsive" align="center" >
	<div  style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow:  1px 2px 1px rgba(0, 0, 0, 0.2), 0px 1px 2px 1px rgba(0, 0, 0, 0.1);">
			<div id="" class="col-sm-12 well-custom" style="padding: 10px 10px 10px 20px;margin-bottom: 20px; border-radius: 5px;" >
			<h3 class="hoverme"><span class="fa fa-newspaper-o"></span> PRACTICUM LEARNING JOURNAL</h3>
		
		</div>
		<br>
		<div class="text-left">
			<span class="text-capitalize">Name:<span style="margin-right: 100px;"></span><?php echo $_SESSION['lname'].', '.$_SESSION['fname']; ?></span>	<br>
			<span>School:<span style="margin-right: 92px;"></span> Eastern Visayas State University</span>	<br>
			<span class="text-capitalize">Address:<span style="margin-right: 89px;"></span><?= $dataqwe['agency_address'] ?></span>	<br>
			<span class="text-capitalize">Office/Agency:<span style="margin-right: 40px;"></span><?= $dataqwe['cname'] ?></span>	<br>
			
		</div>
		<table id="example" class="table table-hover table-bordered" class="w">
			<thead style="background: Steelblue; color: #fff;">
				<th class="text-align">Task/s</th>
				<th class="text-align">How the Task/s was/were Accomplished</th>
				<th class="text-align">Lessons Learned</th>
				<th class="text-align">Acceptance needed to improve Performance</th>
				<th class="text-align">Action</th>
			</thead>
				<?php foreach ($this->Login_user_model->get_journal_data($stud_id) as $datatable): ?>		
			<tbody>
				<tr>
					<td><?= $datatable['tasks1'] ?></td>
					<td><?= $datatable['tasks2'] ?></td>
					<td><?= $datatable['tasks3'] ?></td>
					<td><?= $datatable['tasks4'] ?></td>
					<td align="center">
						<a href="<?php echo base_url() ?>Login/journalPrint/<?= $datatable['journal_id']?>" class="btn btn-info btn-xs btnCircle fa fa-print btn-sm"></a>
					</td>
					
				</tr>

				

				<?php endforeach ?>

			</tbody>

		</table>
		<span>Prepared By: <br></span>
		<span class="text-capitalize"><?= $_SESSION['lname'].', '.$_SESSION['fname']; ?><br></span>
		<span style="border-top: 1px solid #000;">Signature of Student-Trainee <br></span>
	</div>
</div>

		<!-- <div style="margin: 10px 0px 20px -10px;" class="col-sm-12">
			<button id="" class="btn btn-primary btnPrint" onClick="window.print()">
				<span class="glyphicon glyphicon-print"></span> Print this page
			</button>
		</div> -->

	</div>

	
<!-- Modal Journal -->
  <div class="modal fade" id="myModal_journal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header edit_profile_modal">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-newspaper-o"></span> Daily Journal</h2>
			</div>
        </div>

        <div class="modal-body" id="login_reg">
			<div class="container">
				<div class="col-sm-6 " id="login_user">
					<div id="" class="">
						<div class="" style="padding: 0px 60px 0px 0px">
							<form action="<?php echo base_url();?>Login/insert_journal" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
								<input type="hidden" name="stud_num" value="<?php echo $_SESSION['stud_num']; ?>">
								
								<div class="form-group date" data-provide="datepicker" style="margin-left: -50px">	
									<label class="col-sm-2 control-label">Date:</label>		
									<div class='col-sm-5 ' id='datetimepicker1'>
										<div class="input-group">
											<input type='text' name="datefrom" class="form-control" value="<?php echo date('F d, Y') ?>" required />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
											 	</span>
										</div>						                  
									</div>
									<script type="text/javascript">
										$('#datetimepicker').data("DateTimePicker").FUNCTION();
									</script>
								</div>

								<div class="form-group date" data-provide="datepicker" style="margin-left: -50px;">	
									<label class="col-sm-2 control-label">To:</label>		
									<div class='col-sm-5 ' id='datetimepicker1'>
										<div class="input-group">
											<input type='text' name="dateto" class="form-control" value="<?php echo date('F d, Y') ?>" required />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
											 	</span>
										</div>						                  
									</div>
									<script type="text/javascript">
										$('#datetimepicker').data("DateTimePicker").FUNCTION();
									</script>
								</div>
								
								<div class="form-group" id="">
									<p><textarea name="tasks1" rows="5" cols="70" class="form-control col-sm-8"  placeholder="Task/s..." required>Week #</textarea></p>
								</div>
								<div class="form-group" id="">
									<p><textarea name="tasks2" rows="5" cols="70" class="form-control col-sm-8" placeholder="How the Task/s was/were Accomplishede..." required></textarea></p>
								</div>
								<div class="form-group" id="">
									<p><textarea name="tasks3" rows="5" cols="70" class="form-control col-sm-8" placeholder="Lessons Learned..." required></textarea></p>
								</div>
								<div class="form-group" id="">
									<p><textarea name="tasks4" rows="5" cols="70" class="form-control col-sm-8" placeholder="Acceptance needed to improve Performance..." required></textarea></p>
								</div>		
								<div id="" class="" style="margin-left: -15px;" >								
									<button id=" " type="submit" class="btn btn-primary btnPost"><span class="glyphicon glyphicon-share"></span> Post</button>
							        <label class="">			            	
							            <span class="btn btn-info btnPost1">
							              <span class="fa fa-image"></span> Add Image <input type="file" style="display: none;" name="fileToUpload" required >
							            </span>
							        </label>							        
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



<!-- Modal Edit -->
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header edit_profile_modal">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-edit"></span> Edit Profile</h2>
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
											<input type="password" name="password" class="form-control" placeholder="New Password" required autofocus>
										</div>
									</div>
									<div class="form-group">	
										<label class="col-sm-3 control-label">Confirm Password</label>
										<div class="col-sm-8">
											<input type="password" name="confirm" class="form-control" placeholder="Comfirm Password" required>
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
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js"></script>

<script>	
	$(document).ready(function() {
    $('#example').DataTable({
        "aLengthMenu": [[1, 5, 10, 20, 50, -1], [1, 5, 10, 20, 50, "All"]],
        "iDisplayLength": 5,
       
    	
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



<div class="container">
	
</div>
</div>























	<!-- End student page -->







<?php }else { ?>
	
<!-- Homepage -->
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EVSU - College of Engineering | On the Job Training Monitoring and Online Grading System </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="EVSU - College of Engineering | On the Job Training Monitoring and Online Grading System - This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University

Our goal has its goal to make the work of our professors easier and for the students to be more aware of their grades." />
	<meta name="keywords" content="" />
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo-icon.png">
	<!-- css -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/mdb/css/mdb.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/mdb/css/mdb.css"> -->
	<!-- script -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
 	<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/mdb/js/mdb.js"></script> -->
 	<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/mdb/js/mdb.min.js"></script> -->


</head>

<header class="header_home">
<nav class="navbar navbar-inverse navbar-fixed-top" id="nav2">
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
        <?php if (isset($_SESSION['currentUser'])) { ?>    
		<li class="#"><a href="<?= base_url()?>Login/student_profile_page"><span class="fa fa-bars"></span> EVSU-COE </a></li>
      		<?php } elseif (isset($_SESSION['currentAdmin'])) { ?>	
        <li class="#"><a href="<?= base_url()?>Login/profile_page"><span class="fa fa-bars"></span> EVSU-COE </a></li>
        	<?php } elseif (isset($_SESSION['currentCdr'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/coordinator_profile_page"><span class="fa fa-bars"></span> EVSU-COE </a></li>
			<?php } elseif (isset($_SESSION['currentSpv'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/supervisor_profile_page"><span class="fa fa-bars"></span> EVSU-COE </a></li>
			<?php } elseif (!isset($_SESSION['username'])) { ?>
        <li class="#"><a href="#"><span class="fa fa-bars"></span> EVSU-COE </a></li>
		<?php } ?>    
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['currentUser'])) { ?>    
        <li class="#"><a href="<?= base_url()?>Login/student_profile_page"><span class="fa fa-home"></span> Home </a></li>
      		<?php } elseif (isset($_SESSION['currentAdmin'])) { ?>	
        <li class="#"><a href="<?= base_url()?>Login/profile_page"><span class="fa fa-home"></span> Home </a></li>
        	<?php } elseif (isset($_SESSION['currentCdr'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/coordinator_profile_page"><span class="fa fa-home"></span> Home </a></li>
			<?php } elseif (isset($_SESSION['currentSpv'])) { ?>
        <li class="#"><a href="<?= base_url()?>Login/supervisor_profile_page"><span class="fa fa-home"></span> Home </a></li>
			<?php } elseif (!isset($_SESSION['username'])) { ?>
        <li class="#"><a href="#"><span class="fa fa-home"></span> Home </a></li>
		<?php } ?>
		<li><a href="#about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
        <li class="dropdown">
        <?php 
			if (isset($_SESSION['username'])) { ?>
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span>
        	
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?> </span>

			<span class="caret"></span>
          	<ul class="dropdown-menu">
            	<li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']) ;?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        	</ul>
        <?php } ?>	
        </li>
      </ul>   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>




<body class="img-responsive" style="background:url('<?php echo base_url();?>assets/images/evsu_bg.jpg') no-repeat center center fixed;
	background-size: 100% 29%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	">

<div class="container pageTitle" style="text-align: center;">
<div class="message_alert" style="z-index: 1;">
	<?= $this->session->flashdata('message') ?>
</div>

  <h3>Eastern Visayas State University</h3>
  <h2>College of Engineering</h2>
  <h1>On the Job Training</h1>
  <h1> Monitoring and Online<br> Grading System</h1z> 
  <p>Building Globally Competitive Professionals</p>
</div>

<div class="container"></div>
<div id="login_button" 
	style="  
	">
 		<a href="#" class=""
		 	> <button type="button" class="w3-btn w3-white w3-border w3-border-black w3-round-xlarge" data-toggle="modal" data-target="#myModal_login" style="
		 	background-color: #000; 
		    border: none;
		    color: white;
		    padding: 6px 42px;
		    text-decoration: none;
		    font-size: 16px;
		    margin-top: 20px;
		    border-radius: 40px;
		    "><span class="fa fa-share-square-o"></span> Login </button>
		</a>
  <!-- Modal login-->
  <div class="modal fade" id="myModal_login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="modal-content">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h1><span class="fa fa-key"></span> Login Form</h1>
				<!-- <span class="fa fa-get-pocket fa-4x"></span> -->
			</div>
        </div>
        <div class="modal-body">
			<div class="container">
				<div class="col-sm-6 " id="login_user">
					<div id="" class="">
						<div class="">
							<div class="message_alert">
								<?= $this->session->flashdata('message') ?>
							</div>	
							<form class="form-horizontal" action="<?php echo base_url();?>Login/login_user" method="POST" id="login_form">
									<div class="form-group">
										<label class="col-sm-3 control-label"><span class="fa fa-user"></span> Username</label>						
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
										</div>
									</div>	
									<div class="form-group">	
										<label class="col-sm-3 control-label"><span class="fa fa-lock"></span> Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px;">
										<?php if (isset($_SESSION['username'])) { ?>
											<button disabled="disabled" type="submit" class="btn btn-info btn-xm signin_button"><span class="glyphicon glyphicon-share"></span> You're already login! Logout first!</button>
										<?php } elseif (!isset($_SESSION['username'])) { ?>
											<button type="submit" class="btn btn-info btn-xm signin_button"><span class="fa fa-share-square-o"></span> Signin</button>
										<?php } ?>
										<!-- <a href="<?php echo base_url();?>control/register_form" class="btn btn-primary reg_button"><span class="glyphicon glyphicon-cloud"></span> Register Here</a> -->
									</div>
									<div class="col-sm-8 remem_for" style="float: left;">
										<a href="<?= base_url() ?>Control/forgotPassword" class="forget_pass">Forget Password</a>
									</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        	<div >
        <div class="modal-footer" style="margin-right: 30px;">
          <button type="button" class="btn btn-primary" data-dismiss="modal" ><span class="fa fa-close"></span> Close</button>
        </div>        		
        	</div>
      </div> 
      <script type="text/javascript">
	    $('#login_form').submit(function() {
	    $('#gif').css('visibility', 'visible');
		});
      </script>    
    </div>
  </div> 
</div>
<!--Modal end -->

 <!-- Modal forgot password-->
  <div class="modal fade" id="myModal_forgot" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="modal-content">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2>Enter Your email</h2>
			</div>
        </div>
        <div class="modal-body" id="login_reg">
			<div class="container">
				<div class="col-sm-6 " id="">
					<div id="" class="">
						<div class="enter_your_id">	
							<form class="form-horizontal" action="<?php echo base_url();?>control/check_student" method="POST">
									<div class="message_alert">
										<?= $this->session->flashdata('message') ?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"><span>Email Address</span></label>	

										<div class="col-sm-8">
											<input type="email" name="reg_stud_num" class="form-control" placeholder="Email address" autofocus required>
											<label><small style="font-weight: normal; float: right;">*must be valid email address</small></label>
										</div>
									</div>	
						
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: -15px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Enter</button>
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


 <!-- Modal register student-->
  <div class="modal fade" id="myModal_signup" role="dialog">
    <div class="modal-dialog">
   
      <!-- Modal content-->
      <div class="modal-content" id="modal-content">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-key"></span> Registration Form</h2>
			</div>
        </div>
        <div class="modal-body" id="login_reg">
			<div class="container">
				<div class="col-sm-6 " id="">
					<div id="" class="">
						<div class="enter_your_id  " >

							<button class="btn btn-primary btnTSa" type="button" data-toggle="collapse" data-target="#studentCollapse" aria-expanded="false" aria-controls="studentCollapse">
								 <span class="fa fa-user"></span> Signup as Student <span class="caret"></span>
							</button>
							<button class="btn btn-primary btnTSa " type="button" data-toggle="collapse" data-target="#spvCollapse" aria-expanded="false" aria-controls="spvCollapse">
								<span class="fa fa-user"></span> Signup as Trainee Supervisor <span class="caret"></span>
							</button>
							<div class="collapse" id="studentCollapse" style="margin: 10px;">
								<div class="well well-custom1 modal-content ">
									<form class="form-horizontal" action="<?php echo base_url();?>Control/check_student" method="POST">
										<div class="message_alert">
											<?= $this->session->flashdata('message') ?>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label"><span>Student Number</span></label>	

											<div class="col-sm-8">
												<input type="text" name="reg_stud_num" class="form-control" placeholder="0000-00000" maxlength="10"  autofocus required>
											</div>
												<label><small style="font-weight: normal; margin-left: -50px;">*ex.2013-02261</small></label>

										</div>	
																															
										<?php if (isset($_SESSION['username'])) { ?>
											<div class="pull-right" style="margin-right: 50px; margin-bottom: 20px; margin-top: -15px; padding-bottom: 10px">
												<button disabled="disabled" type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> You're currently Login! Logout first!</button>
											</div>
										
										<?php } elseif (!isset($_SESSION['username'])) { ?>
											<div class="pull-right" style="margin-right: 50px; margin-bottom: 20px; margin-top: -15px; padding-bottom: 10px">
												<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Enter</button>
											</div>
										<?php  } ?>
										
									</form>
								</div>
							</div>	

							<div class="collapse" id="spvCollapse" style="margin: 10px;">
								<div class="well well-custom1 modal-content">
									<form class="form-horizontal" action="<?php echo base_url();?>Control/confirmSupervisor" method="POST">
										<div class="message_alert">
											<?= $this->session->flashdata('message') ?>
										</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label"><span>Email Address</span></label>	
												<div class="col-sm-8">
													<input type="email" name="email" class="form-control" placeholder="Email Address" autofocus required>
													<label><small style="font-weight: normal; ">*Must be valid email</small></label>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label"><span>First Name</span></label>	
												<div class="col-sm-8">
													<input type="text" name="fname" class="form-control" placeholder="First Name"  required>
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label"><span>Last Name</span></label>	
												<div class="col-sm-8">
													<input type="text" name="lname" class="form-control" placeholder="Last Name"  required>
													
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Agency Name</label>
												<div class="col-sm-4">
													<select name="cname" class="form-control" >
														<option value="-">Choose</option>
														<?php foreach ($this->Login_user_model->get_all_cname() as $key) : 
														?>
														<option value="<?= $key['comp_id'] ?>"><?= $key['cname'] ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label"><span>Mobile Number</span></label>	
												<div class="col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">
															<span class="">+63</span>
														</span>
														<input type="text" name="contact" class="form-control" placeholder="Contact Number" maxlength="10" minlength="10" required>
													</div>
													<label><small style="font-weight: normal; ">*eg. 90123456789</small></label>
												</div>
												</div>
											<div class="form-group">
												<label class="col-sm-3 control-label"><span>Password</span></label>	
												<div class="col-sm-8">
													<input type="password" name="password" class="form-control" placeholder="Password"  required>
												</div>
											</div>	
											<div class="form-group">
												<label class="col-sm-3 control-label"><span>Confirm Password</span></label>	
												<div class="col-sm-8">
													<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password"  required>
												</div>
											</div>
																																										
										<?php if (isset($_SESSION['username'])) { ?>
											<div class="pull-right" style="margin-right: 50px; margin-bottom: 20px; margin-top: -15px; padding-bottom: 10px">
												<button disabled="disabled" type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> You're currently Login! Logout first!</button>
											</div>
										
										<?php } elseif (!isset($_SESSION['username'])) { ?>
											<div class="pull-right" style="margin-right: 50px; margin-bottom: 20px; margin-top: -15px; padding-bottom: 10px">
												<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Enter</button>
											</div>
										<?php  } ?>
										
									</form>
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

<div id="first_footer" class="">
		<div class="" style="margin-top: 45px; display: inline-block;">
			Don't have an account yet? Register here    
		</div>
		
			<a href="" class="btn waves-light signup" data-toggle="modal" data-target="#myModal_signup" 
		 	style="background-color: #d50000; 
		    border: none;
		    color: white;
		    padding: 6px 35px;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin-top: 5px;
		   	margin-left: 5px;
		    border-radius: 40px;
		    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<span class="glyphicon glyphicon-cloud "></span>
		    Signup
		 </a>	
</div>
<!-- <img src="<?= base_url()?>assets/images/spin.gif" id="gif" style="display: block; margin: 0 auto; width: 200px; visibility: hidden;"> -->
<div class="container-body">
<div id="about"></div>
<div class="">
<div class="container">
	<div id="about">
		<h2><b>On the Job Training Monitoring and Online Grading System</b></h2>
		<h4>Eastern Visayas State University</h4>
		<h5>College Of Engineering</h5>
	</div>	
		<div class="container">
			<div class="row font-size text-left">
						<div class="col-sm-10">
							<h3 class="oph3 text-indent"><b>
							Objective of the Project</b></h3>
						<b class="col-sm-8 opb">General Objective:</b>
							<div class="col-sm-12">
							<p class="text-indent">This project will eliminate common problems caused by the traditional way of managing the grades, performance of the OJT's. To create an online grading system primarily for the Enginnering Department of the Eastern Visayas State University</p>
							<p>Our goal has its goal to make the work of our professors easier and for the students to be more aware of their grades.</p>
							</div>
						<b class="col-sm-8 opb">Specific Objectives:</b>
						<ul class="col-sm-10 ">
							<li>To design a more organized way of submitting the grades of the OJT's.</li>
							<li>To help the industry partners of EVSU to submit the grades of the of the OJT's in their agency in a faster and more effecient way.</li>
							<li>To allow the OJT Coordinators to manage and monitor the OJT status and grades of the students more conveniently.</li>
							<li>To create a module that will compute intern's grades based on inputted data.</li>
							<li>To create a system that will secure and maintain the integrity of data.</li>
							<li>To create a module that will keep the records of every intern in different agencies or companies.</li>
						</ul>
						</div>
			</div>
		</div>	
</div>
	
</div>

<!-- <div class="container ">
	<div id="contact_us">
<div class="col-sm-8 contact_mess container ">
	<div class="row">
		<div align="left" class=" col-sm-16 contact_left">
			<h2 class=""><b class="con"><span class="fa fa-envelope"></span> CONTACT US</b></h2>
			
			<p>Do you have questions, comments, inquiries or anything you want us to know?</p>
			
			<div style="margin-top: 1.5em; ">
				<h4 ><span class="fa fa-phone-square"></span> Hot line:<a href="tel:+639056738634" style="color: #d50000"> +63 905 673 8634</a> </h4>
				<h4><span class="fa fa-envelope"></span> Email:<a href="emailto:kenkarlo.padal@evsu.edu.ph" style="color: #d50000"> kenkarlo.padal@evsu.edu.ph</a></h4>
			</div>
		</div>
	</div>	
</div>			
</div>
</div> -->
</div>
<!-- End Homepage -->

<?php } ?>
