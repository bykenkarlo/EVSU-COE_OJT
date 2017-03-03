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
       	<li class="#"><a href="<?= base_url(); ?>"><span class="fa fa-home"></span> Home </a>
        </li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?= base_url(); ?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				
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
				$cdr_id = $_SESSION['cdr_id'];
				$spv_id = $_SESSION['spv_id']; 
				}?>
				<?php if ($sex == 'm') { 
					$sex = 'Male';
					}
					elseif ($sex == 'f') {
						$sex = 'Female';
					} ?>
				<span class="caret"></span>
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
<button type="button" onclick="window.location='<?= base_url();?>Login/coordinator_profile_adm/<?= $cdr_id ?>';" style=" margin:0px 30px 50px 0px; border-radius: 120px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-sm"><span style="color: #fff; font-size: 40px; padding-top: 5px; padding-bottom: 5px;" class="fa fa-hand-o-left"></span>
</button>
<div id="main">
	<span style="font-size:30px;cursor:pointer;float: left; z-index: 1; background: #c9302c;" onclick="openNav()" class="btn_nav btn btn-md btn-circle btn_circle">
		<span style="color: #fff" class="fa fa-tasks"></span>
	</span>


<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message') ?>
</div>
<div class="container">	





		<?php
			 if (isset($_SESSION['student_info']))
			 {
				 $stud_num = $_SESSION['stud_num'];
				 $lname = $_SESSION['lname'];
				 $fname = $_SESSION['fname'];			
		?>
		<?php echo $stud_num = $_SESSION['stud_num']; ?>
		

		<?php } ?>
<div class="container">
<?php $dataspv = $this->Login_user_model->get_spv_info($spv_id) ?>
<?php $comp_id = $dataspv['comp_id'] ?>

	<div class="table_list" >
		<div class="panel-body table-responsive" style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
		<?php $datacomp = $this->Login_user_model->get_cname($comp_id) ?>
		<div class="" style="margin-bottom: 15px">
			<h1 align="left" class="hoverme"><span class="fa fa-users"></span> Trainee's Lists  <?= $datacomp['cname']?>  </h1>
		</div>
		<div style="margin-bottom: 10px;" class="">
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/profile_page'"><span class="fa fa-th-list"></span> Administrator Lists</button>
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/coordinator_lists'"><span class="fa fa-th-list"></span> Coordinator Lists</button>
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/others'"><span class="fa fa-th-list"></span> Course Lists</button>
			<button type="button" class="btn btn-primary btn-lg btnAdminCdr" onclick="window.location='<?= base_url();?>Login/agency_list'"><span class="fa fa-th-list"></span> Agency Lists</button>		
		</div>	
		<div class="">
		<form action="<?= base_url()?>Control/delete_stud_list_cdr" method="POST"> 
		<table id="example" class="table table-striped table-hover" cellspacing="0" style="margin-top: 10px;border-bottom: 1.5px solid SteelBlue;">
			<thead >
				<tr style="color: #fff; background: SteelBlue">
					<th>Student Number </th>
					<th>Full Name </th>
					<th>Email Address </th>
					<th>Contact Number</th>
					<th>Sex </th>
					<!-- <th>Agency Name </th> -->
					<th>Course </th>
					<th>Year & Section </th>
					<th>Birthday</th>
					<th>Current Address </th>
				</tr>
			</thead>
			<tfoot>
				<tr style="" class="alert alert-info" align="center">
					<th>Student Number </th>
					<th>Full Name </th>
					<th>Email Address </th>
					<th>Contact Number</th>
					<th>Sex </th>
					<!-- <th>Agency Name </th> -->
					<th>Course </th>
					<th>Year & Section </th>
					<th>Birthday</th>
					<th>Current Address </th>
				</tr>
			</tfoot>
			<tbody>
			<?php 
			 foreach ($this->Login_user_model->get_all_student2($comp_id,$cdr_id) as $key): ?>
				<tr>
					
					<td>
						<a href="#<?php echo base_url();?>Login/student_profiles/<?php echo $key['stud_id'] ?>" style="color: #1565c0"> <?= $key['stud_id']; ?></a>
					</td>
					<td class="text-capitalize"><?php echo $key['lname'].' '.$key['fname']; ?></td>
					<td><a href="emailto:<?= $key['email']?>"><?= $key['email']?></a></td>					
					<td class="text-capitalize"><a href="tel:+63<?php echo $key['contactNum']; ?>">+63<?php echo $key['contactNum']; ?></a></td>
					<td class="text-capitalize"><?php echo $key['sex']; ?></td>
					<!-- <td class="text-capitalize"><?php echo $key['cname']; ?></td> -->
					<td class="text-capitalize"><?php echo $key['course_abbrv']; ?></td>
					<td class="text-capitalize" ><?php echo $key['year']. ' - ' .$key['section']; ?></td>
					<td class="text-capitalize" ><?php echo $key['birthday']; ?></td>					
					<td class="text-capitalize" ><?php echo $key['address']; ?></td>					
					
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>	
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

2