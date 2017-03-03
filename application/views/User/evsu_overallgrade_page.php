<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
</head>

<body>
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
		<li><a href="<?php echo base_url();?>Login/coordinator_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<span class="text-capitalize"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></span>	
				<?php $user = $_SESSION['username'];
					$cdr_id = $_SESSION['cdr_id'];	    
					$course_id = $_SESSION['course_id'];
					$course = $_SESSION['course_abbrv'];	    

						    
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
<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -12px;">
		<?= $this->session->flashdata('message', 2) ?>
</div>
<div class="container">


<div class="well well-sm well-custom" style="margin-bottom: 1px; margin-top: 20px; padding: 0px 0px 10px 20px;">
	<h1 class="text-capitalize hoverme"><span class="fa fa-calculator"></span> Evaluation</h1>
</div>

<div style="margin-top: 20px;">
	<button class="btn btn-primary btnTSq" type="button" data-toggle="collapse" data-target="#gradesCollapse" aria-expanded="false" aria-controls="gradesCollapse">
			 <span class="fa fa-calculator"></span> Grades From Trainee Supervisor <span class="caret"></span>
	</button>
	<button class="btn btn-primary btnTSq" type="button" data-toggle="collapse" data-target="#gradesPTPCollapse" aria-expanded="false" aria-controls="gradesCollapse">
			 <span class="fa fa-calculator"></span> Grades for Peer to Peer <span class="caret"></span>
	</button>
	<button class="btn btn-primary btnTSq" type="button" data-toggle="collapse" data-target="#selfPTPCollapse" aria-expanded="false" aria-controls="selfPTPCollapse">
			 <span class="fa fa-calculator"></span> Grade from Self Evaluation <span class="caret"></span>
	</button>
	<button class="btn btn-primary btnTSq1" type="button" data-toggle="collapse" data-target="#feedbackCollapse" aria-expanded="false" aria-controls="selfPTPCollapse">
			 <span class="fa fa-calculator"></span> Feedback From Trainee Supervisor <span class="caret"></span>
	</button>
</div>



<div class="collapse" id="gradesCollapse" style="margin: 10px;padding-bottom: 50px;">
	<div class="well well-custom">
			<!-- Criteria -->
<div style="padding: 0px 0px 0px 40px">
	<div class="" style="text-align: center;">
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

				<?php foreach ($this->Login_user_model->get_criteria() as $criteria) { ?>						
			<tbody>
				<tr>
					<td>
						<p><?= $criteria['c1']?></p>
					</td>
						
					<td>	
						<input type="hidden" name="stud_id" value="<?= $info['stud_id'];?>">					
						<span><?= $data['answer_1']; ?></span>
					</td>
					
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c2']?></p>
					</td>
					<td>
						<span><?= $data['answer_2']; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c3']?></p>
					</td>
					<td>
						<span><?= $data['answer_3']; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p><<?= $criteria['c4']?></p>
					</td>
					<td>
						<?= $data['answer_4']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c5']?></p>
					</td>
					<td>
						<?= $data['answer_5']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c6']?></p>
					</td>
					<td>
						<?= $data['answer_6']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c7']?></p>
					</td>
					<td>
						<?= $data['answer_7']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c8']?></p>
					</td>
					<td>
						<?= $data['answer_8']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?= $criteria['c9']?></p>
					</td>
					<td>
						<?= $data['answer_9']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><i hidden="">`</i><?= $criteria['c10']?></p>
					</td>
					<td>
						<?= $data['answer_10']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<b>11. FINAL GRADE (TOTAL)</b>
					</td>
					<td>
						<?= $data['total_grades'] ?>
					</td>
				</tr>
				
			</tbody>
			<?php } ?>
		</table>

	</form>
</div>
<!-- End Criteria -->
		    </button>
		</div>
	</div>

<div class="collapse" id="selfPTPCollapse" style="margin: 10px;">
		<div class="well well-custom">
			<span class="fa fa-thumbs-o-up"></span><span> <b>Peer to Peer Evaluations</b></span>
			<table class="table table-hover table-striped table-bordered" style="margin-top: 10px;"">
				<thead style="background: Steelblue; color: #fff;">			
					<tr>
						<th class="Tcenter"><span class="fa fa-users"></span> Student's Name</th>
						<th class="Tcenter">Rate 
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						</th>
					</tr>
				</thead>
					<?php foreach($this->Login_user_model->getPTPInfoself($stud_id) as $key ) 
						$graded_by = $key['graded_by'];

						if (isset($graded_by)) { 
							$gradedBy = $this->Login_user_model->getStudName($graded_by);
							$fullname = $gradedBy['lname'].', '.$gradedBy['fname'];
					?>
				<tbody>
						<tr>
							<td style="font-size: 15px;"><span class="fa  fa-angle-double-right"></span><a href="<?php echo base_url();?>Login/student_profiles/<?php echo $graded_by ?>" class="text-capitalize"> <?= $fullname ?></a>  </td>
							<td style="text-align: center;"><button class="btn btn-primary btnStudGrade"><span class="fa fa-calculator"></span> Grade: <?= $key['total_grades']?></button></td>
						</tr>
				</tbody>
					<?php }
					elseif (!isset($graded_by)) { ?>						 
				<tbody>
						<tr>
							<td style="font-size: 15px;"><span class="fa  fa-angle-double-right"></span><span> No Record!</span>  </td>
							<td style="text-align: center;"><button class="btn btn-primary btnStudGrade"><span class="fa fa-calculator"></span> Grade: 0</button></td>
						</tr>
				</tbody>		
											
					<?php } ?>
					
			</table>
		</div>
	</div>

	<div class="collapse" id="feedbackCollapse" style="margin: 10px;">
		<div class="well well-custom">
			<span class="fa fa-thumbs-o-up"></span><span> <b>Peer to Peer Evaluations</b></span>
			<table class="table table-hover table-striped table-bordered" style="margin-top: 10px;"">
				<thead style="background: Steelblue; color: #fff;">			
					<tr>
						<th class="Tcenter"><span class="fa fa-users"></span> Supervisor's Name</th>
						<th class="Tcenter">Feedback 
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						</th>
					</tr>
				</thead>
					<?php $feedback = ($this->Login_user_model->getfeedback($stud_id) ) ?>
					<?php $spv_id = $feedback['spv_id'] ?>
					<?php $spvData = $this->Login_user_model->get_spv1($spv_id) ?>	
					
				<tbody>
						<tr>
							<td style="font-size: 15px; width: 180px"><span class="fa  fa-angle-double-right"></span> <span class="text-capitalize"><?php echo $spvData['fname'].' '.$spvData['lname'] ?></span>  </td>
							<td style="text-align: center;"> <p><?= $feedback['feedback']?></p></td>
						</tr>
				</tbody>
					
					
					
			</table>
		</div>
	</div>

	<div class="collapse" id="gradesPTPCollapse" style="margin: 10px;">
		<div class="well well-custom">
			<span class="fa fa-thumbs-o-up"></span><span> <b>Peer to Peer Evaluations</b></span>
			<table class="table table-hover table-striped table-bordered" style="margin-top: 0px;"">
				<thead style="background: Steelblue; color: #fff;">			
					<tr>
						<th class="Tcenter"><span class="fa fa-users"></span> Student's Number</th>
						<th class="Tcenter">Rate 
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						</th>
					</tr>
				</thead>
						<?php foreach ($this->Login_user_model->getPTPInfocdr($stud_id) as $key ) { ?>					
				<tbody>
						<tr>						
						<td style="font-size: 15px;"><input type="hidden" name="graded_by" value="<?php echo $key['graded_by'] ?>"><span class="fa  fa-angle-double-right"></span><a href="<?php echo base_url();?>Login/student_profiles/<?php echo $key['graded_by'] ?>" class="text-capitalize"> <?= $key['graded_by'] ?></a>  </td>
							<td style="text-align: center;"><button class="btn btn-primary btnStudGrade1"><span class="fa fa-calculator"></span> Grade: <?= $key['total_grades']?><input type="hidden" name="grades" value="<?= $key['total_grades']?>"></button></td>
						</tr>
						<?php } 
						?>
				</tbody>

					
			</table>
				
				<!-- <span >Record: <input type="hidden" name="record" value="<?php $dataInfo = $this->Login_user_model->getPTPInfocdrqw($stud_id) ?>"><?php $dataInfo = $this->Login_user_model->getPTPInfocdrqw($stud_id) ?></span> -->
		</div>
	</div>




































<!-- gegt info -->
<?php $info = $this->Login_user_model->get_stud_info($stud_id); ?>	


<!-- Supervisor grade -->
<?php $grades = $this->Login_user_model->get_grades($stud_id); ?>

<!-- PTP Evaluation -->
<?php $key = $this->Login_user_model->getPTPInfocdr123($stud_id)  ?>

<!-- Self Evaluation -->
<?php $info2 = $this->Login_user_model->getPTPInfoself1($stud_id); ?>

<!-- Overall grade -->
<?php $overallgrade = $this->Login_user_model->getOverallGrades($stud_id); ?>
<div class="col-sm-12" id="table_list" style="margin: 20px 0px 10px 0px; background: #fff; border-radius: 2px; padding: 5px 10px 10px 10px; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.1);" >

		<div class="panel-body">
			<form  class="form-horizontal" id="form" action="<?php echo base_url();?>Login/compute_grades_for_student" method="POST">									 
					<input type="hidden" name="stud_id" id="stud_id" value="<?= $stud_id?>"></input>
					<input type="hidden" name="cdr_id" id="cdr_id" value="<?= $cdr_id?>"></input>
					<input type="hidden" name="course" id="course" value="<?= $course?>"></input>
					<input type="hidden" name="course_id" id="course_id" value="<?= $course_id?>"></input>
					<input type="hidden"  id="total_grade" name="total_grade">	
					<input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>">

					
					<!-- <div class="form-group">	
						<label class="col-sm-3 control-label">Full Name</label>
						<div class="col-sm-6">
							<input type="text" name="fullname" id="fullname" class="form-control text-capitalize" value="<?= $info['fname'].' '.$info['lname'];?>"  >
						</div>
					</div>
					
					

					<div class="form-group">
						<label class="col-sm-3 control-label">Coordinator's Grade</label>						
						<div class="col-sm-2">
							<input type="number" id="cdr_grade" name="cdr_grade" class="form-control" max="5" min="1" step=".1" value="<?= $overallgrade['cdr_grade']?>" required>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label">Supervisor's Grade</label>
						<div class="col-sm-2">
							<input type="text" id="spv_grade" name="spv_grade" class="form-control text-capitalize" value="<?= $grades['total_grades']; ?>" readonly required >
						</div>
					</div>
					
					
					<div class="form-group">	
						<label class="col-sm-3 control-label">Peer to Peer's Grade(Average)</label>
						<div class="col-sm-2">
							<input type="text" id="PTP_grade" name="PTP_grade" class="form-control text-capitalize" value="<?= $key['total_grades']?>" readonly required > 
						</div>
						
					</div>


					<div class="form-group">	
						<label class="col-sm-3 control-label">Self's Evaluation</label>
						<div class="col-sm-2">
							<input type="text" id="self_grade" name="self_grade" class="form-control text-capitalize" value="<?= $info2['total_grades']; ?>" required readonly  >
						</div>
					</div>	
					<div class="form-group">	
						<label class="col-sm-3 control-label">Total Grades:</label>
						<div class="col-sm-2">
							<button type="button" class="btn btn-primary btnStudGrade1"><span class="fa fa-calculator"></span> <span id="total"></span>  </button>
						</div>
					</div>	 -->


					<table id="example" class="table table-hover " align="center" style="border-bottom: 1.5px solid SteelBlue;" >
						<thead>
							<tr style="color: #fff; background: SteelBlue">
								<th>Full Name</th>
								<th>Coordinator's Grade</th>
								<th>Supervisors's Grade</th>
								<th>PTP's Grade</th>
								<th>Self's Evaluation</th>
								<th>Total Grade</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<input type="text" name="fullname" id="fullname" class="form-control text-capitalize" value="<?= $info['fname'].' '.$info['lname'];?>"  >
								</td>
								<td>
									<input type="number" id="cdr_grade" name="cdr_grade" class="form-control" max="5" min="1" step=".1" value="<?= $overallgrade['cdr_grade']?>" required>
								</td>
								<td>
									<input type="text" id="spv_grade" name="spv_grade" class="form-control text-capitalize" value="<?= $grades['total_grades']; ?>" readonly required >
								</td>
								<td>
									<input type="text" id="PTP_grade" name="PTP_grade" class="form-control text-capitalize" value="<?= $key['total_grades']?>" readonly required >
								</td>
								<td>
									<input type="text" id="self_grade" name="self_grade" class="form-control text-capitalize" value="<?= $info2['total_grades']; ?>" required readonly  >
								</td>
								<td>
									<button type="button" class="btn btn-primary btnStudGrade1"><span class="fa fa-calculator"></span>  <span id="total"></span>  </button>
								</td>
							</tr>
							
						</tbody>
					</table>
					

					<div class="pull-right" style="margin-right: : 0em; margin-bottom: 10px; ">
						<a href=""><button type="submit"  class="submit btn btn-primary btn-lg btnUpdateqwe"> Save</button></a>
						<a href="<?php echo base_url();?>Login/myAgency/<?= $cdr_id ?>"><button type="button" class="btn btn-danger btn-lg btnCancel">Cancel</button></td></a>
					</div>	
		</form>	
	</div>
</div>
</div>
<div class="container">	
</div>
<input type="hidden" id="base" value="<?= base_url() ?>" name="">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.1.12.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script>
	$(document).ready(function() {
		$('#cdr_grade').keyup(function(){
			var stud_id = $('#stud_id').val();
			var cdr_id = $('#cdr_id').val();
			var course = $('#course').val();
			var fullname = $('#fullname').val();
			var course_id = $('#course_id').val();
			var cdr_grade = $('#cdr_grade').val();
			var spv_grade = $('#spv_grade').val();
			var PTP_grade = $('#PTP_grade').val();
			var self_grade = $('#self_grade').val();
			var base_url = $('#base_url').val();

			$.post('/EVSU_OJT/Login/compute_grades_student',{stud_id:stud_id, cdr_id:cdr_id, course:course, fullname:fullname, course_id:course_id, cdr_grade:cdr_grade, spv_grade:spv_grade, PTP_grade:PTP_grade, self_grade:self_grade },
				function(total_grade){
					$('#total').text(total_grade);
				});
		});	
	});
</script>
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
	$(document).ready(function(){
			$("span").click(function(){
			$(this).hide();
		});
	});
</script>

