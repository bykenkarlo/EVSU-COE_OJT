	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<style type="text/css">
	@media print
	{
		#non-printable { display: none; }
		#printable { display: block; }

	}
	#example_length{ display: none; }
	#example_info{  display: : none; }
	#example_filter{ display: none;	}
	#example_previous{ display: none; }
	#example_next{ display: none; }

	</style>
<body class="img-responsive" style="
background:url('<?php echo base_url();?>assets/images/background.png') no-repeat;
background-size: 100% 90%; padding: 0px 0px 0px 0px" >
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
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/student_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
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

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: 12px;">
		<?= $this->session->flashdata('message') ?>
<div class="">
<div style="margin: 30px 0px 20px 0px">
	<div class="" style="text-align: center;">
		<div id="non-printable">
			<button type="button" onclick="window.location='<?= base_url();?>Login/student_profile_page';" style=" margin:0px 30px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 50px;" class="fa fa-arrow-left fa-1x"></span>
			</button>
		</div>
		<div>
			<p class="" style="text-align: center; font-size: 18px;">
				Republic of the Philippines<br>
				EASTERN VISAYAS STATE UNIVERSITY<br>
				Tacloban City
			</p>
		</div>
		<div style="margin-top: 30px; font-size: 15px; " >
			<b>TRAINEE'S EVALUATION RECORD</b>
		</div>
	</div>
	<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>	
	<div class="row" style="margin-top: 60px;"> 
		<div  class="col-md-8" >
			<div class="form-group">
				<label class="control-label col-md-7 text-capitalize" style="font-weight: normal; text-align: center; font-size: 15px; margin-left: -30px;" ><?php echo $info['lname'].', '.$info['fname'];  ?>
			</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6" style="text-align: center; font-size: 15px; border-top: 1px solid #000;">Trainee's Name
				</label>
			</div>				
		</div>
		<div class="" style="float: right; margin: -20px 90px 0px 0px;">
			<label class="control-label" style="font-size: 15px; border-bottom: 1px solid #000; ">Rating Systems</label>
		</div>
	</div>
<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>
	<div class="row" style="font-size: 15px;margin:40px 0px 0px 10px;">
		<div class="form-group">
			<label class="control-label col-sm-7">Name of Agency:<span class="text-capitalize" style="border-bottom: : 1px solid #000; width: 50" > <?= $info['cname']?></span></label>			
		</div>
			
		<div>
			<label class="control-label col-sm-7">Agency Address: <span class="text-capitalize" style="border-bottom: : 1px solid #000; width: 50" >
			<?= $info['agency_address']?></span></label>
		</div>
		<div class="" style="float: right;margin:-100px 50px 0px 0px;">
			<p>
			<span style="margin-right: 50px;">1.0-1.5</span><span>Excellent</span><br>
			<span style="margin-right: 50px;">1.6-2.0</span><span>Very Good</span><br>
			<span style="margin-right: 50px;">2.1-2.5</span><span>Good</span><br>
			<span style="margin-right: 50px;">2.6-3.0</span><span>Fair</span><br>
			<span style="margin-right: 50px;">3.1-4.0</span><span>Poor</span><br>
			<span style="margin-right: 50px;">4.1-5.0</span><span>Very Poor</span><br>		
			</p>
		</div>
	</div>
</div>
	<?php $info = $this->Login_user_model->get_stud_data($stud_id); ?>	
	
	<div id="" class="table_grades">
	<form action="<?php echo base_url();?>Login/compute_grades_spv" method="post">
		
		<table id="example" class="table table-bordered table-hover "  class="table_grades">
			<thead style="color:#fff; background: SteelBlue; ">

				<tr>
					<th style="text-align: center; padding-bottom: 15px;">TRAINER'S CHARACTERISTICS</th>
					<th width="100" align="center">RATING<br>(1.0 - 5.0)</th>
					<!-- <th>Action</th> -->
				</tr>			
			</thead>
				<?php $data = $this->Login_user_model->get_grades($stud_id);?>
				<?php foreach ($this->Login_user_model->get_criteria() as $criteria) { ?>
			<tbody>
				<tr>
					<td>
						<p><?= $criteria['c1']?>.</p>
					</td>
						
					<td>	
						<input type="hidden" name="stud_id" value="<?= $data['stud_id'];?>">					
						<span><?=$data['answer_1']?></span>
					</td>
					
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c2']?></p>
					</td>
					<td>
						<span><?=$data['answer_2']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c3']?></p>
					</td>
					<td>
					<span><?=$data['answer_3']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c4']?></p>
					</td>
					<td>
						<span><?=$data['answer_4']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c5']?></p>
					</td>
					<td>
						<span><?=$data['answer_5']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c6']?></p>
					</td>
					<td>
						<span><?=$data['answer_6']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c8']?></p>
					</td>
					<td>
						<span><?=$data['answer_7']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c7']?></p>
					</td>
					<td>
						<span><?=$data['answer_8']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c9']?></p>
					</td>
					<td>
						<span><?=$data['answer_9']?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><i hidden="">9</i><?= $criteria['c10']?></p>
					</td>
					<td>
						<span><?=$data['answer_10']?></span>
					</td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
		<div>
				<?php $data = $this->Login_user_model->get_grades($stud_id);?>

			<div id="total" style="float: right;margin-top: 30px;">
				<label class="label-control">Total Grades:</label><br>
				<input type="text" class="col-sm-4 form-control" value="<?= $data['total_grades'] ?>">
			</div>
		</div>
	</form>


		<?php 
			if (isset($_SESSION['username'])) { ?>				    
			
		<div class="row">
		<div class="col-sm-6" style="margin-top: 35px;">
			<label >Evaluated by:</label>
			<div style="margin-top: 50px">
				<label style="font-weight: normal; border-bottom: 1px solid #000; width: 120;"></label><br>
				<label style="" style="border-top: 1px solid #000; text-align: center; ">Training Supervisor</label>
			</div>
		</div>
			<?php } ?>
		<div class="col-sm-6" style="float: right; clear:left; margin-top: -125px;">
			<label >Noted by:</label>
			<div style="margin-top: 70px">
				<label style="col-sm-7" style="border-top: 1px solid #000;width="";text-align: center; ">Follow-Up Instructor</label>
			</div>
		</div>
	</div>
	</div>

	<div style="margin-left: 10px; margin-top: 50px;" id="printable">
		<button id="printables" class="btn btn-primary" onClick="window.print()"><span class="glyphicon glyphicon-print"></span> Print this page</button>
	</div>
</div>
	
</div>

<div class="container">	</div>
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
        "iDisplayLength": 20,
        "bInfo" : false,
        dom: 'Bfrtip',
    	buttons: [
    		'copy','csv',
    		]
	    });
    $(".first.paginate_button, .last_paginate_button").remove();
	} );	
	</script>