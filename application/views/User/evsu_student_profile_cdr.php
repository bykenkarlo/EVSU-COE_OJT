
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

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
        <li class="#"><a href="<?php echo base_url();?>Login/student_list"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$course = $_SESSION['course_abbrv'];
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

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">

	<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>	

<div class="well well-sm well-custom">
	<h2 class="text-capitalize"><span class="fa fa-user"></span> <?= $info['fname'].' '.$info['lname']?>'s Profile</h2>
</div>	

<div class="col-sm-4" style="background: #fff; border-radius: 2px; padding: 1px 10px 15px 10px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1); margin: 5px 5px 5px">
	<div class="row">

		<div class="panel-heading">
			<h3 clas="studentInfo" style=" border-bottom: .8px dashed #ddd;cursor: pointer; margin-top: 0px;">
				<img data-toggle="modal" data-target="#myModal_add_admin" src="<?php echo base_url();?>assets/images/avatar_img.jpg" style="height:80px;width:80px; border-radius: 5px;" alt="avatar" > 
				<span class="fa fa-info-circle"></span><b> Student's Information</b>
			</h3>
		</div>
	</div>

	<div class="form-group">	
		<label class="col-sm-12 control-label studentInfo"><b>Student Number:</b> <?= $info['stud_id']?></label>
		<label class="col-sm-12 control-label text-capitalize studentInfo"><b>Agency Name:</b> <?= $info['cname']?></label>
		<label class="col-sm-12 control-label text-capitalize studentInfo"><b>Name:</b> <?= $info['fname'].' '.$info['lname']?></label>
		<label class="col-sm-12 control-label text-capitalize studentInfo"><b>Course:</b> <?= $info['course_abbrv']?></label>
		<label class="col-sm-12 control-label studentInfo"><b>Year:</b> <?= $info['year']?></label>
		<label class="col-sm-12 control-label text-capitalize studentInfo"><b>Section:</b> <?= $info['section']?></label>
	</div>
	
</div>
<?php $grades = $this->Login_user_model->get_grades($stud_id); ?>

<div class="col-sm-7" style="background: #fff; border-radius: 2px; padding: 10px 10px 15px 10px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1); margin: 5px 5px 5px">
	<button class="btn btn-primary btnUpdateAdmin" type="button" data-toggle="collapse" data-target="#gradesCollapse" aria-expanded="false" aria-controls="gradesCollapse">
		 <span class="fa fa-calculator"></span> Grades <span class="caret"></span>
	</button>
	<button class="btn btn-primary btnAttendance " type="button" data-toggle="collapse" data-target="#AttendanceCollapse" aria-expanded="false" aria-controls="AttendanceCollapse">
		<span class="fa fa-calendar"></span> Attendance Sheet <span class="caret"></span>
	</button>
	<button class="btn btn-primary btnPTP " type="button" data-toggle="collapse" data-target="#PTPCollapse" aria-expanded="false" aria-controls="PTPCollapse">
		<span class="fa fa-users"></span> Peer To Peer Evaluation <span class="caret"></span>
	</button>

	<div class="collapse" id="gradesCollapse" style="margin: 10px;">
		<div class="well well-custom">
			<span class="fa fa-calculator"></span><span> <b>Total Grades:</b> <?= $grades['total_grades']; ?></span>
		    
		    <button align="center" class="btn btn-primary btnShowGrades" onclick="window.location='<?= base_url()?>Control/studentGrades/<?= $info['stud_id']?>' " >
		    <span class="fa fa-angle-double-right"></span> <b>SHOW TRAINEE'S EVALUATION RECORD</b>
		    </button>
		</div>
	</div>

	<div class="collapse" id="AttendanceCollapse" style="margin: 10px;">
		<div class="well well-custom">
	    	<span class="fa fa-calendar"></span> <b>Attendance Sheet</b>
			<table class="table table-striped table-bordered table-hover" style="margin-top: 10px;" >
				<thead>			
					<tr>
						<!-- <th>Name</th> -->
						<th>Date</th>
						<th>Day</th>
						<th>Time in</th>
						<th>Time out</th>
					</tr>
				</thead>
					<?php foreach ($this->Login_user_model->get_attendance($stud_id) as $key) :
						$output = 	$key['time_in_hour'] ;
					 ?>
				<tbody>
					<tr>
						<!-- <td class="text-capitalize"><?= $key['name']?></td> -->
						<td><?= $key['month'].'-'.$key['date'].'-'.$key['year']?></td>
						<td><?= $key['day']?></td>
						<td><?= $key['time_in_hour'].':'.$key['time_in_min'].' '.$key['time_in_ap']?></td>
						<td><?= $key['time_out_hour'].':'.$key['time_out_min'].' '.$key['time_out_ap']?></td>
								
					</tr>
				</tbody>
				<?php endforeach ?>		
			</table>
		</div>
	</div>


	<div class="collapse" id="PTPCollapse" style="margin: 10px;">
		<div class="well well-custom">
			<span class="fa fa-thumbs-o-up"></span><span> <b>Peer to Peer Evaluations</b></span>
			<table class="table table-hover table-striped table-bordered" style="margin-top: 10px;"">
				<thead>
					<tr>
						<th>Student's Name</th>
						<th>Rate</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

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
										<label class="col-sm-3 control-label">Agency Name</label>
										<div class="col-sm-4">
											<select name="reg_cname" class="form-control">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_cname() as $key) : 
												?>
												<option value="<?= $key['cname'] ?>"><?= $key['cname'] ?></option>
												<?php endforeach ?>
											</select>
										</div>	
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Course</label>	
										<div class="col-sm-4">
											<select name="reg_course_id" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_course() as $key):?>
												<option value="<?= $key['course_id'] ?>"><?= $key['course_name'] ?></option>
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

	





<div class="container">	
</div>

