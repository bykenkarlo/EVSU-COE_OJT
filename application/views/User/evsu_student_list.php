	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<style type="text/css">
		
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
      <ul class="nav navbar-nav navbar-right">
      	<li class="#"><a href="<?php echo base_url();?>Login/coordinator_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a class="text-capitalize" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
				$course = $_SESSION['course_abbrv'];	    
				$course_id = $_SESSION['course_id'];	    
				$cname = $_SESSION['cname'];  
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

<!-- sidenav -->

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
		<span class="text-capitalize nav_span col-sm-12 font">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
		<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
		<span class="text-capitalize nav_span">Course: <?= $course; ?></span>
		<span class="text-capitalize nav_span">Agency Name: <?= $cname; ?></span>
	</div>	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_supervisor"><span class="fa fa-user-plus"></span> Add Supervisor</button>
		
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_student"><span class="fa fa-user-plus"></span> Add Student</button>
		
		<a class="btn" href="<?php echo base_url();?>Login/uploads"><button type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-cloud-upload"></span> Upload Files</button></a>
	</div>

<!-- <a href="#" class="text-capitalize">Logout</a> -->
</div>

<!-- end side nav-->

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
									<div class="form-group">
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
		<div id="profile_details" class="panel-body container" style="font-size: 10pt;" >		
			<div class="form-group">
				<label class="col-sm-11 control-label"><span class="details">Student No:</span> <span class="underline_detail"></span></label>
				<div class="col-sm-9">
					<label class="control-label"></label>
				</div>

			</div>

			<div class="form-group">
				<label class="col-sm-11 control-label"><span class="details">Name:</span> <span class="underline_detail"></span></label>
				<div class="col-sm-9">
					<label class="control-label"></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-9 control-label"><span class="details">Course:</span> <span class="underline_detail"></span></label>
				<div class="col-sm-9">
					<label class="control-label"></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-9 control-label"><span class="details">Year & Section:</span> <span class="underline_detail"></span></label>
				<div class="col-sm-9">
					<label class="control-label"></label>
				</div>
			</div>
		</div>

		<?php } ?>
	
</div>

<div class="container">


<div class="table_list table-responsive" style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
	<div class="blockquote" style="margin-bottom: 30px">
	
	<div id="" class="">
	<div class="">
		<h1 align="left"><span class="fa fa-users"></span> List of Registered Students</h1>
	</div>
	<div style="margin-bottom: 20px;">
		<button onclick="window.location='<?= base_url()?>Login/coordinator_profile_page'" class="btn btn-primary btn-lg btnCdrSpv"><span class="fa fa-th-list"></span> Training Supervisor Lists</button>	
			<button onclick="window.location='<?= base_url()?>Login/student_list'" class="btn btn-primary btn-lg btnAdminCdr"><span class="fa fa-th-list"></span> Student Lists</button>
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/others'"><span class="fa fa-th-list"></span> Course Lists</button>
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/agency_list'"><span class="fa fa-th-list"></span> Agency Lists</button>
	</div>
	<form action="<?= base_url()?>Control/delete_stud_list" method="POST"> 
		<table id="example" class="table table-striped table-hover" cellspacing="0" style="margin-top: 10px;border-bottom: 1.5px solid SteelBlue;">
			<thead>
				<tr style="color: #fff; background: SteelBlue">
					<th><input class="fa fa-check-square" type="checkbox" name="select-all" id="select-all" /></th>
					<th>Student Number </th>
					<th>Last Name </th>
					<th>First Name</th>
					<th>Sex </th>
					<th>Agency Name </th>
					<th>Course </th>
					<th>Year & Section </th>
					<th>Date Registered </th>
					<th>Action </th>
				</tr>
			</thead>
			<tfoot>
				<tr style="" class="alert alert-info">
					<th><input type="checkbox"/></th>
					<th>Student Number </th>
					<th>Last Name </th>
					<th>First Name</th>
					<th>Sex </th>
					<th>Agency Name </th>
					<th>Course </th>
					<th>Year & Section </th>
					<th>Date Registered </th>
					<th>Action </th>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->Login_user_model->get_all_student($course_id) as $key): ?>
				<tr>
					<td>
						<input type="checkbox" name="delete_stud_list[]" value="<?= $key['stud_id']; ?>">
					</td>
					<td>
						<a href="<?php echo base_url();?>Login/student_profiles/<?php echo $key['stud_id'] ?>" style="color: #1565c0"> <?= $key['stud_id']; ?></a>
					</td>
					<td class="text-capitalize"><?php echo $key['lname'] ?></td>
					<td class="text-capitalize"><?php echo $key['fname']; ?></td>
					<td class="text-capitalize"><?php echo $key['sex']; ?></td>
					<td class="text-capitalize"><?php echo $key['cname']; ?></td>
					<td class="text-capitalize"><?php echo $key['course_abbrv']; ?></td>
					<td class="text-capitalize" ><?php echo $key['year']. ' - ' .$key['section']; ?></td>
					<td class="text-capitalize" ><?php echo $key['date_reg']; ?></td>					
					<td>
						<a href="<?php echo base_url();?>Login/update_student_page/<?php echo $key['stud_id']; ?>" class="btn btn-info btn-xs btnCircle glyphicon glyphicon-pencil btn-sm"></a>
						<a href="<?php echo base_url();?>Control/delete_student/<?php echo $key['stud_id']; ?>" class="btn btn-danger btn-xs btnCircle glyphicon glyphicon-trash btn-sm" onclick="return confirm('Are you sure?')"></a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div class="btn-group" style="float: right;" style="margin: 10px 0px 10px 0px ;">
			<button data-toggle="modal" data-target="#myModal_student" type="button" class="btn btn-default"><span class="fa fa-user-plus"></span> New</button>
			<button type="submit" class="btn btn-default" onclick="return confirm('Are you sure to delete this?')"><span class="glyphicon glyphicon-trash"></span> Delete Multiple</button>
		</div>
	</form>
		
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>



<div class="container">	
</div>
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
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable({

        // "aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
        "iDisplayLength": 10,
        dom: 'Bfrtip',
    	
        buttons: [ 'copy', 'csv', 'pdf', 'colvis']
    	});

	} );	
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


