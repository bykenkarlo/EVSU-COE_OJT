	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
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
       	<li class="#"><a href="<?= base_url(); ?>"><span class="fa fa-home"></span> Home </a>
        </li>
        <li><a href="<?= base_url();?>Login/about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
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
		<!-- <span class="text-capitalize nav_span">Agency Name: <?= $cname  ?></span> -->
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

<div class="table_list" >
		<div class="panel-body table-responsive" style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
		<div class="" style="margin-bottom: 15px">
			<h1 align="left" class="hoverme"><span class="fa fa-users"></span> My Agency Lists</h1>
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
							<th>Agency Name</th>
							<th>Supervisor's Name </th>
							<th>Agency Address </th>
							<th>Agency Tel.Number </th>

							<!-- <th>Email Address </th>
							<th>Birthday </th>
							<th>Contact Number </th>
							<th>Agency Tel.Number </th> -->
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr class="alert alert-info">
							<th><input type="checkbox"  /></th>	
							<th>Agency Name</th>
							<th>Supervisor's Name </th>
							<th>Agency Address </th>
							<th>Agency Tel.Number </th>

							<!-- <th>Agency Name </th>
							<th>Email Address </th>
							<th>Birthday </th>
							<th>Contact Number </th>
							<th>Agency Tel.Number </th> -->
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					<?php foreach ($this->Login_user_model->get_cdr_spv_agency_stud($cdr_id) as $key) { ?>
						<tr>
							<td><input type="checkbox" name="delete_spv[]" value="<?= $key['spv_id']?>"></td>
							<td class="text-capitalize"><a href="<?= base_url()?>Login/supervisorPage/<?= $key['spv_id']?>" style="color: #1565c0" ><?php echo $key['cname'] ?></a></td>
							<td class="text-capitalize"><?php echo $key['fname'].' '.$key['lname'] ?></td>
							<td class="text-capitalize"><?php echo $key['agency_address'] ?></td>
							<td class="text-capitalize"><?php echo $key['telNum'] ?></td>
							<td>
							<a href="<?= base_url(); ?>Control/delete_supervisor/<?php echo $key['spv_id']; ?>" class="btn btn-danger btnCircle fa fa-trash btn-xs" onclick="return confirm('Are you sure?')"></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="btn-group" style="float: right;" style="margin: 10px 0px 10px 0px ;">
					<button data-toggle="modal" data-target="#myModal_add_OJT" type="button" class="btn btn-default"><span class="fa fa-user-plus"></span> New Trainee</button>
					<button type="submit" class="btn btn-default" onclick="return confirm('Are you sure to delete this?')"><span class="fa fa-trash"></span> Delete Multiple</button>
				</div>
		</form>			
				</div>
			</div>								
		</div>






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
										<label class="col-sm-3 control-label">Contact Num</label>		
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
										<label class="col-sm-3 control-label">Contact Num</label>		
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


<!-- Modal add_agency_spv_stud -->
  <div class="modal fade" id="myModal_add_OJT" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" id="">
        <div class="modal-header panel_head">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         	<div class="">
				<h2><span class="fa fa-user-plus"></span> Add Trainee </h2>
			</div>
        </div>
        <div class="modal-body" id="">
			<div class="container">
				<div class="col-sm-6 " id="=">
					<div id="" class="">
						<div class="">					
							<form class="form-horizontal" action="<?= base_url(); ?>Control/add_agency_spv_stud" method="POST">
							<input type="hidden" name="cdr_id" value="<?= $cdr_id ?>">	
							<input type="hidden" name="course_id" value="<?= $course_id ?>">	
								
									<div class="form-group">
										<label class="col-sm-3 control-label">Agency Name</label>
										<div class="col-sm-6">
											<select name="comp_id" class="form-control">
												<option value="-">--Choose Agency--</option>
												<?php foreach ($this->Login_user_model->get_all_spv($cdr_id)  as $key) : 
												?>
												<option value="<?= $key['comp_id'] ?>"><?= $key['cname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Trainee Supervisor</label>
										<div class="col-sm-6">
											<select name="spv_id" class="form-control" >
												<option value="-">--Choose Trainee Supervisor--</option>
												<?php foreach ($this->Login_user_model->get_all_spv($cdr_id) as $key): ?> 
												?>
												<option value="<?= $key['spv_id'] ?>"><?= $key['fname'].' '.$key['lname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Students</label>
										<div class="col-sm-6 text-capitalize">
											<select name="stud_id[]" class="text-capitalize form-control selectpicker" multiple>
												<option class="text-capitalize" value="-">--Choose Students--</option>
												<?php foreach ($this->Login_user_model->get_all_student1($course_id) as $key){ 
												?>
												<option class="text-capitalize" value="<?= $key['stud_id'] ?>">
												<?= $key['lname'].' '.$key['fname'] ?></option>

												<?php } ?>
											</select>
										</div>	
									</div>	
																																				
									<div class="pull-right" style="margin-right: 50px; margin-bottom: 10px; margin-top: 10px;">
										<button type="submit" class="btn btn-info reg_button"><span class="glyphicon glyphicon-cloud"></span> Add </button>
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
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
	
	
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

