	
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
        <li class="#"><a href="<?= base_url() ?>Login/coordinator_profile_page"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?= base_url() ?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
				$course = $_SESSION['course_abbrv'];	    
				$cname = $_SESSION['cname'];	
				$cdr_id = $_SESSION['cdr_id'];    
				}?>
				<span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="<?= base_url() ?>Control/logout/<?= md5($_SESSION['username']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div id="mySidenav" class="sidenav" style="color: #fff;">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<div class="panel-heading avatar1">
		<h3>My Profile</h3>
		<img src="<?php echo base_url();?>assets/images/img_avatar.png" style="height:106px;width:106px" alt="avatar">
		
	</div>
	<div class="side_nav" style="color: #fff;">
		<span class="text-capitalize nav_span col-sm-12 font">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
		<span class="text-capitalize nav_span">Username: <?= $user; ?></span>
		<span class="text-capitalize nav_span">Course: <?= $course; ?></span>
		<span class="text-capitalize nav_span">Agency Name: <?= $cname; ?></span>
	</div>	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#myModal_supervisor"><span class="fa fa-user-plus"></span> Add Supervisor</button>
		
		<button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#myModal_student"><span class="fa fa-user-plus"></span> Add Student</button>
		<button onclick="window.location='<?php echo base_url();?>Login/uploads';" type="button" class="btn btn-primary col-sm-2"><span class="fa fa-cloud-upload"></span> Upload Files</button>
	</div>

<!-- <a href="#" class="text-capitalize">Logout</a> -->
</div>

<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1;" onclick="openNav()" class="btn_nav btn btn-danger btn-md btn-circle">
		<span class="fa fa-tasks"></span>
	</span>
<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message') ?>
</div>

<div class="container">
<div id="non-printable">
	<button type="button" onclick="window.location='<?= base_url();?>Login/coordinator_profile_page';" style=" margin:0px 30px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 50px;" class="fa fa-arrow-left fa-1x"></span>
	</button>
</div>	

<!-- Upload files -->
<div class="row">
	<div class="col-sm-offset-2" style="margin: 30px 0px 0px 0px;">
		<form class="form-horizontal" method="POST" action="<?= base_url(); ?>UploadController/upload_file" enctype="multipart/form-data" role="form">
			<h2>Upload Files Here</h2>
				<input type="hidden" name="cdr_id" value="<?= $cdr_id?>">
		        <div class="input-group">
		            <label class="input-group-btn">
		               	<span class="btn btn-info">
		               		 Browse&hellip; <input type="file" style="display: none;" name="fileToUpload" required>
		                </span>
		            </label>
		            <div class="col-sm-6">
		                <input type="text" class="form-control " readonly>
		            </div>              
		        </div>
		        <div class="input-group pull" style="margin-top: 10px;"">
		        	<button type="submit" class="btn btn-primary"><span class="fa fa-cloud-upload"></span> Upload</button>
		        </div>
		</form>
	</div>
	<div class="col-sm-10">
		
	</div>
</div>
<div>
	<table class="table table-striped table-hover" style="margin: 20px 0px 20px 0px; border-bottom: 1px solid Steelblue;">
		<thead style="color: #fff; background: Steelblue">
			<tr>
				<th>File ID</th>
				<th>File Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php foreach ($this->Login_user_model->get_file($cdr_id) as $key) :?>
		<tbody>
			<tr>
				<td><?= 'FID-0000'.$key['file_id']?></td>
				<td><a href="#"><?= $key['pdf_file']?></a></td>
				<td>
					<a href="<?= base_url(); ?>Control/delete_file/<?= $key['file_id']; ?>" class="btn btn-danger glyphicon glyphicon-trash btn-xs" onclick="return confirm('Are you sure?')"></a>
					<a href="<?= base_url()?><?= $key['pdf_file']; ?>" class="btn btn-success btn-xs"><span class="fa fa-cloud-download"></span></a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>
	</table>
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
							<form class="form-horizontal" action="<?= base_url() ?>Control/register_official_stud_user" method="POST">	
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
										<div class="col-sm-8">
											<input type="text" name="reg_cname" class="form-control text-capitalize" placeholder="Agency Name"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Gender</label>						
										<div class="col-sm-4">
											<select name="reg_gender" class="input-xs form-control" >
												<option value="-">Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label">Course</label>						
										<div class="col-sm-4">
											<select name="reg_course" class="form-control" value="Course">
												<option value="-">Choose</option>
												<?php foreach ($this->Login_user_model->get_all_course($course) as $key) : 	
												?>
												<option value="<?= $key['course_name'] ?>"><?= $key['course_name'] ?></option>
												<?php endforeach ?>
												<!--  -->
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Year</label>						
										<div class="col-sm-4">
											<select name="reg_year" class="input-xs form-control" >
												<option value="-">Section</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Section</label>						
										<div class="col-sm-4">
											<select name="reg_section" class="input-xs form-control" >
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
								
							<form class="form-horizontal" action="<?= base_url() ?>Control/register_supervisor" method="POST">	
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
										<div class="col-sm-8">
											<input type="text" name="reg_cname" class="form-control text-capitalize" placeholder="Agency Name"  required>
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
		
	</div>
</div>
<div class="container"></div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable({
        "aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
        "iDisplayLength": 5
    });

	} );	
</script>
<script>
	$(function() {

	  // We can attach the `fileselect` event to all file inputs on the page
	  $(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	  });

	  // We can watch for our custom `fileselect` event like this
	  $(document).ready( function() {
	      $(':file').on('fileselect', function(event, numFiles, label) {

	          var input = $(this).parents('.input-group').find(':text'),
	              log = numFiles > 1 ? numFiles + ' files selected' : label;

	          if( input.length ) {
	              input.val(log);
	          } else {
	              if( log ) alert(log);
	          }

	      });
	  });
	  
	});
</script>

