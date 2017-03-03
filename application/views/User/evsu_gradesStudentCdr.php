	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<style type="text/css">
	#printable { display: none; }

	@media print
	{
		#non-printable { display: none; }
		#printable { display: block; }
		#printables { display:none; }
		#title { display: none; }		
		#print_header { display: none; }
		#nav { display: none; }
		#footer { display: none; }
		#grades { display: none; }
		input type['number'] { display: none; }
		#total { display: none; }

	}
	#example_length{ display: none; }
	#example_info{  display: : none; }
	#example_filter{ display: none;	}
	#example_previous{ display: none; }
	#example_next{ display: none; }

	#container
	{
		display: table;
		border-radius: 4px;
		border: .5px solid #ddd;
	}
	#row
	{
		display: table-row;
		
	}
	#left, #right, #middle
	{
		border: .5px solid #ddd;
		border-radius: 2px;
		display: table-cell;
		padding: 5px 10px 5px 10px;
	}
	.span
	{
		font-weight: bold;
		text-align: center;
	}
	</style>
</head>

<header>
<header id="mobile-view"> 
	<img src="<?php echo base_url();?>assets/images/EVSU_banner.png" height="100" width="100%" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System">
</header>
<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>
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
      	<li class="#"><a href="<?php echo base_url();?>Login/student_profiles/<?= $info['stud_id'];?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	
				$stud_id = $_SESSION['stud_id'];

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

<body class="img-responsive" style="
background:url('<?php echo base_url();?>assets/images/background.png') no-repeat;
background-size: 100% 100%; padding: 0px 0px 0px 0px" >


<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: 12px;">
		<?= $this->session->flashdata('message') ?>
<div class="container">
<div style="margin-left: 10px; margin-top: 50px;">
	<button id="printables" class="btn btn-primary btnPrint" onClick="window.print()"><span class="glyphicon glyphicon-print"></span> Print this page</button>
</div>
<div style="margin: 30px 0px 20px 0px">
	<div class="" style="text-align: center;">
		<div id="non-printable">
			
			<button type="button" onclick="window.location='<?= base_url();?>Login/student_profiles/<?= $info['stud_id'];?>';" style=" margin:0px 30px 50px 0px; border-radius: 120px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-sm"><span style="color: #fff; font-size: 40px; padding-top: 5px; padding-bottom: 5px;" class="fa fa-hand-o-left"></span>
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
				<label class="control-label col-md-7 text-capitalize" style="font-weight: normal; text-align: center; font-size: 15px; margin-left: -10px;" ><?php echo $info['lname'].', '.$info['fname'];  ?>
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
	<div class="row" style="font-size: 15px;margin:40px 0px 0px 10px;">
		<div class="form-group">
			<label class="control-label col-sm-7">Name of Agency: <?= $info['cname']?></label>
			
				
		</div>
		<div>
			<label class="control-label col-sm-7 text-capitalize">Agency Address: <?= $info['agency_address']?><span style="border-top: 1px solid #000; width: 20" ></span></label>
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
	<?php $info = $this->Login_user_model->get_stud_data($stud_id)  ?>	
	<div style="font-" class="table_grades">
	<form action="<?php echo base_url();?>Login/compute_grades_spv" method="post">
		
		<table id="example" class="table table-hover table-bordered"  class="table_grades" style="	border-bottom: 1px solid Steelblue;
">
				<?php $data = $this->Login_user_model->get_grades($stud_id);?>
			<thead>
				<tr>
					<th style="padding-bottom: 15px;text-align: center;">TRAINER'S CHARACTERISTICS</th>
					<th width="100">RATING<br>(1.0 - 5.0)</th>
					<!-- <th>Action</th> -->
				</tr>			
			</thead>

						
			<tbody>
				<tr>
					<td>
						<p>1. <b>KNOWLEDGE OF JOB.</b> Understand what needs to be true and knows how to do it. Follows directions carefully and uses the proper materials.</p>
					</td>
						
					<td>	
						<input type="hidden" name="stud_id" value="<?= $info['stud_id'];?>">					
						<span><?= $data['answer_1']; ?></span>
					</td>
					
				</tr>
				<tr>
					<td>
						<p>2. <b>QUALITY OF  WORK.</b> Turns out work that meets industry standards of neatness and accuracy.</p>
					</td>
					<td>
						<span><?= $data['answer_2']; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>3. <b>QUANTITY OF  WORK.</b> Works steadily and turns out a quantity of work that meets industry standards of production.</p>
					</td>
					<td>
						<span><?= $data['answer_3']; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>4. <b>DEPENDABILITY.</b> Is present and on time each day. Can be counted on to finish the hob assigned to him/her</p>
					</td>
					<td>
						<?= $data['answer_4']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p>5. <b>WORK ORGANIZATION.</b> Thinks through each training assignment and assembles the needed materials before stating. Handles the work in order of priority.</p>
					</td>
					<td>
						<?= $data['answer_5']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p>6. <b>JUDGEMENT ON SEEKING HELP.</b> Knows when to ask questions on training procedures so as to avoid making mistakes or wasting time. Also knows wen to seek in-service training to build needed skills.</p>
					</td>
					<td>
						<?= $data['answer_6']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p>7. <b>ATTITUDE.</b> Is enthusiastic about mastering the job. Accepts constructive criticism gracefully Works smoothly and cooperatively with fellow trainees. Is friendly and helplful to visitors.</p>
					</td>
					<td>
						<?= $data['answer_7']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p>8. <b>APPEARANCE OF WORK STATION.</b> training materials, supplies and equipment are kept in good order while work is on progress. Everything is left in good condition or put neatly away at the end of each rtaining session. </p>
					</td>
					<td>
						<?= $data['answer_8']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p>9. <b>PERSONAL APPEARANCE.</b> Always looks neat and clean. Meets the industry standards of grooming.</p>
					</td>
					<td>
						<?= $data['answer_9']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><i hidden="">`</i>10. <b>ATTENDANCE AND PUNCTIONALTY.</b> Consider frequency of absences as tardiness and exerts effort to avoid or keep them minimal.</p>
					</td>
					<td>
						<?= $data['answer_10']; ?>
					</td>
				</tr>
				
			</tbody>
		</table>
		<div>
			<?php $data = $this->Login_user_model->get_grades($stud_id);?>
			<div id="total" style="float: right; margin-right: 0px; margin-top: 30px;">
				<label class="control-label">Total Grades:</label><br>
				<input type="text" class="form-control" value="<?= $data['total_grades'] ?>">
			</div>
		</div>
	</form>


		<?php 
			if (isset($_SESSION['username'])) { ?>				    
			
		<div class="row">
		<div class="col-sm-6" style="margin-top: 35px;">
			<label >Evaluated by:</label>
			<div style="margin-top: 50px">
				<label style="font-weight: normal; border-bottom: 1px solid #000; width: 120;">
					
				</label><br>
				<label style="border-top: 1px solid #000; text-align: center; ">Training Supervisor</label>
			</div>
		</div>
			<?php } ?>
		<div class="col-sm-6" style="float: right; clear:left; margin-top: -125px;">
			<label >Noted by:</label>
			<div style="margin-top: 50px">
			<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?><br>
				<label style="border-top: 1px solid #000;text-align: center; ">Follow-Up Instructor</label>

			</div>
		</div>
	</div>
	</div>
</div>
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
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable({

        "iDisplayLength": 10,
        dom: 'Bfrtip',
        "bInfo" : false,
    	buttons: [
    		'copy','csv','pdf'
    		]
        
    	});

	} );	
	</script>
<div class="container">	</div>






	
	
