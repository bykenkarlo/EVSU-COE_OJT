	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	
</head>
<body>
<header"> 
	<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="" width="100%" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System">
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
      	<li class="#"><a href="<?= base_url(); ?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/admin_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?> </span>	
				<?php $user = $_SESSION['username'];	
				$email = $_SESSION['email_add'];
				$sex = $_SESSION['sex'];
				$user = $_SESSION['username'];	    
				$currentUser = $_SESSION['currentUser'];
				$adminID = $_SESSION['admin_id'];   
				$admin_image = 	$_SESSION['admin_image'];
				$course_id = $_SESSION['course_id'];  
				}?>
				<?php if ($sex == 'm') { 
					$sex = 'Male';
					}
					elseif ($sex == 'f') {
						$sex = 'Female';
					} ?>
				
			<span class="caret"></span>
          	<ul class="dropdown-menu">
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?= md5($_SESSION['username']) ;?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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
		<button type="button" onclick="window.location='<?php echo base_url();?>Login/criteria';" class="btn btn-primary col-sm-2 btn-lg btnProfile"><span class="fa fa-bar-chart"></span> Criteria</button>
		<button type="button" onclick="window.location='<?php echo base_url();?>Login/userlogs';" class="btn btn-primary col-sm-2 btn-lg btnProfile"><span class="fa fa-tasks"></span> User Logs</button>		
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
										<label class="col-sm-3 control-label">Contact Num</label>		
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
										<label class="col-sm-3 control-label">Agency Name</label>
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


			

<div class="container-fluid" >
<div class="table_list" >
	
<div id="" class="table-responsive"  style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);" >
	<div class="blockquote" style="margin-bottom: 30px;"> 
		<h1 align="left" class="hoverme"><span class="fa fa-users"></span> Coordinators List</h1>
	</div>
	
	<div style="margin-bottom: 10px;" class="">
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/profile_page'"><span class="fa fa-th-list"></span> Administrator Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/coordinator_lists'"><span class="fa fa-th-list"></span> Coordinator Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/others'"><span class="fa fa-th-list"></span> Course Lists</button>
		<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/agency_list'"><span class="fa fa-th-list"></span> Agency Lists</button>		
	</div>
	<form action="<?= base_url()?>Control/delete_cdr_list" method="POST"> 
		<table id="example" class=" table table-striped table-hover dt-responsive nowrap" cellspacing="0" style="margin-top: 10px; border-bottom: 1.5px solid SteelBlue;">
			<thead style="color: #fff; background-color: SteelBlue">
				<tr class="">
					<th><input class="fa fa-check-square" type="checkbox" name="select-all" id="select-all" /></th>	
					<th>Name</th>
					<th>Username </th>
					<th>Course </th>
					<th>Mobile Number </th>
					<th>Email Address</th>
					<th>Birthday </th>
					<th>Current Address </th>
					<th>Date Registered </th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr class="alert alert-info">
					<th><input  type="checkbox"></th>	
					<th>Name</th>
					<th>Username </th>
					<th>Course </th>
					<th>Mobile Number </th>
					<th>Email Address </th>
					<th>Birthday </th>
					<th>Current Address </th>
					<th>Date Registered </th>
					<th>Action</th>
			</tfoot>
			<tbody>
			<?php foreach ($this->Login_user_model->get_all_coordinator($course_id) as $key): ?>
				<tr>

					<td width="1"><input type="checkbox" name="delete_cdr[]" value="<?= $key['cdr_id'] ?>" id="selector"></input></td>
					<td class="text-capitalize"><a href="<?= base_url() ?>Login/coordinator_profile_adm/<?= $key['cdr_id'] ?>" style="color: #1565c0"><?php echo $key['fname']. ' ' .$key['lname'] ?></a></td>
					<td class="text-capitalize"><?php echo $key['username'] ?></td>
					<td class="text-capitalize"><?php echo $key['course_abbrv'] ?></td>
					<td class="text-capitalize"><a href="tel:+63<?php echo $key['contactNum']; ?>">+63<?php echo $key['contactNum']; ?></a></td>
					<td class=""><?php echo $key['email'] ?></td>
					<td class="text-capitalize"><?php echo $key['birthday'] ?></td>
					<td class="text-capitalize"><?php echo $key['address'] ?></td>
					<td class="text-capitalize"><?php echo $key['date_reg'] ?></td>
					<td>
						<a href="<?php echo base_url();?>Login/update_coordinator/<?php echo $key['cdr_id']; ?>" class="btn btn-info btn-xs btnCircle fa fa-pencil "></a>
						<a href="<?php echo base_url();?>control/delete_coordinator/<?php echo $key['cdr_id']; ?>" class="btn btn-danger btn-xs btnCircle fa fa-trash " onclick="return confirm('Are you sure?')"></a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div style="margin: 0px 0px 10px 0px; float: right;" class="btn-group" >
			<button data-toggle="modal" data-target="#myModal_cdr" type="button" class="btn btn-default"><span class="fa fa-user-plus"></span> New</button>
			<button type="submit" class="btn btn-default" onclick="return confirm('Are you sure to delete this?')"><span class="glyphicon glyphicon-trash"></span> Delete Multiple</button>
		</div>
	</form>
</div>	
				</div>
			</div>
		</div>
	</div>
</div>
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
		// Listen for click on toggle checkbox
		$('#select-all').click(function(event) {   
		    $("input:checkbox").prop('checked', $(this).prop("checked"));
		});
	</script>
<div class="container">	
</div>

