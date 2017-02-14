	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
<style type="text/css">
	#example_length{
		display: none;
	}
	#example_info{
	    float: left;

	}

</style>
</head>
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
      	<li class="#"><a href="<?php echo base_url();?>Student/student_profile_page"><span class="fa fa-home"></span> Home </a></li>
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
            <li><a style="color: #000;"  href="<?php echo base_url();?>Student/logout/<?= md5($user)?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
<?php 
	foreach ($this->Login_user_model->getStudentData($stud_id) as $studentData) {
	if ($stud_id == $studentData['stud_id']) {
		$comp_id = $studentData['comp_id'];
		$cname = $studentData['cname'];
 ?>
<div id="non-printable" style="z-index: 1;">
	<button type="button" data-toggle="modal" data-target="#myModal_journal" style=" margin:0px 40px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 2; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 30px;" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
		<?php  $compData = $this->Login_user_model->getCompanyData($comp_id); ?>
	<span class="text-capitalize nav_span col-sm-12">Student Number: <?php echo $stud_num;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Name: <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></span>
	<span class="text-capitalize nav_span col-sm-12">Course: <?php echo $course;  ?></span>
	<span class="text-capitalize nav_span col-sm-12">Username: <?php echo $user;  ?></span>		
	<span class=" nav_span col-sm-12">Agency Assigned: <?php echo $cname  ?></span>	
		<?php }
		} ?>	
	<div class="add_admin_cdr">
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_edit"><span class="fa fa-user-plus"></span> Edit Profile</button>
		<button type="button" class="btn btn-primary col-sm-2 btnProfile" data-toggle="modal" data-target="#myModal_cdr"><span class="fa fa-cloud-upload"></span> Upload File</button>
		<!-- <button onclick="window.location='<?php echo base_url();?>Student/journal';" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-newspaper-o"></span> Journal</button> -->
		<button onclick="window.location='<?php echo base_url();?>Student/grades';" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-calculator"></span> Grades</button>
		<button style="font-size: 14px;" onclick="window.location='<?= base_url(); ?>Login/PTPgrades?studID=null'" type="button" class="btn btn-primary col-sm-2 btnProfile"><span class="fa fa-thumbs-up"></span> Peer to Peer Evaluation</button>
	</div>
</div>
<div id="main">
	<span  style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()"  class="btn_nav btn btn-md btn-circle btn_circle">
		<span id="#non-printable" style="color: #fff" class="fa fa-tasks"></span>
	</span>
<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message', 2) ?>
</div>

<div class="container">



<div  class="col-sm-12 table-responsive" align="center" >
	<div style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow:  1px 2px 1px rgba(0, 0, 0, 0.2), 0px 1px 2px 1px rgba(0, 0, 0, 0.1);">
			<div id="non-printable" class="col-sm-12 well-custom" style="padding: 10px 10px 10px 20px;margin-bottom: 20px; border-radius: 5px;" >
			<h3 ><span class="fa fa-newspaper-o"></span> PRACTICUM LEARNING JOURNAL</h3>
		</div>
		<table id="example" class="table table-hover table-bordered" class="w">
			<thead style="background: Steelblue; color: #fff;">
				<th class="text-align">Task/s</th>
				<th class="text-align">How the Task/s was/were Accomplished</th>
				<th class="text-align">Lessons Learned</th>
				<th class="text-align">Acceptance needed to improve Performance</th>
			</thead>
				<?php foreach ($this->Login_user_model->get_journal_data($stud_id) as $datatable): ?>		
			<tbody>
				<tr>
					<td><p><?= $datatable['tasks1']?></p></td>
					<td><p><?= $datatable['tasks2']?></p></td>
					<td><p><?= $datatable['tasks3']?></p></td>
					<td><p><?= $datatable['tasks4']?></p></td>
				</tr>

				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
		<div style="margin: 10px 0px 20px -10px;" class="col-sm-12">
			<button id="non-printable" class="btn btn-primary btnPrint" onClick="window.print()">
				<span class="glyphicon glyphicon-print"></span> Print this page
			</button>
		</div>
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

								<div class="form-group" id="non-printable">
									<p><textarea name="tasks1" rows="5" cols="70" class="form-control col-sm-8" placeholder="Task/s..." required></textarea></p>
								</div>
								<div class="form-group" id="non-printable">
									<p><textarea name="tasks2" rows="5" cols="70" class="form-control col-sm-8" placeholder="How the Task/s was/were Accomplishede..." required></textarea></p>
								</div>
								<div class="form-group" id="non-printable">
									<p><textarea name="tasks3" rows="5" cols="70" class="form-control col-sm-8" placeholder="Lessons Learned..." required></textarea></p>
								</div>
								<div class="form-group" id="non-printable">
									<p><textarea name="tasks4" rows="5" cols="70" class="form-control col-sm-8" placeholder="Acceptance needed to improve Performance..." required></textarea></p>
								</div>		
								<div id="non-printable" class="" style="margin-left: -15px;" >								
									<button id=" " type="submit" class="btn btn-primary btnPost"><span class="glyphicon glyphicon-share"></span> Post</button>
							        <label class="">			            	
							            <span class="btn btn-info btnPost1">
							              <span class="fa fa-image"></span> Add Image <input type="file" style="display: none;" name="fileToUpload" >
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

<script>	
	$(document).ready(function() {
    $('#example').DataTable({
        "aLengthMenu": [[1, 5, 10, 20, 50, -1], [1, 5, 10, 20, 50, "All"]],
        "iDisplayLength": 5,
        dom: 'Bfrtip',
    	buttons: [
    		'copy','csv','print',
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



<div class="container">
	
</div>
</div>