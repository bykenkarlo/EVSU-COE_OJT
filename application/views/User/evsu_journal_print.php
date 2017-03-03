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
<body>
<header>
<img id="non-printable" src="<?php echo base_url();?>assets/images/EVSU_banner.png" class="img-responsive" alt="EVSU | College of Engineering | On the Job Training Monitoring and Grading System"> 
	
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
				$journal_id = $_SESSION['journal_id']; 


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
</div>
<div class="container">
<div id="non-printable" style="z-index: 1;">
	<button type="button" onclick="print()" style=" margin:0px 40px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 2; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 30px; padding: 3px 0px 3px 0px" class="fa fa-print" aria-hidden="true"></span>
	</button>
</div>	

<?php $dataqwe = $this->Login_user_model->getcnameqwe($stud_id) ?>
<?php $printer = $this->Login_user_model->get_journal_data123($journal_id) ?>		


<div id="" class="col-sm-12 table-responsive" align="center" >
	<div  style="background: #fff; border-radius: 2px; padding: 5px 15px 15px 15px; box-shadow:  1px 2px 1px rgba(0, 0, 0, 0.2), 0px 1px 2px 1px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
			<div id="" class="col-sm-12 well-custom" style="padding: 10px 10px 10px 20px;margin-bottom: 20px; border-radius: 5px;" >
			<h3 class="hoverme">PRACTICUM LEARNING JOURNAL</h3>
		
		</div>
		<br>
		<div class="text-left">
			<span class="text-capitalize">Name:<span style="margin-right: 100px;"></span><?php echo $_SESSION['lname'].', '.$_SESSION['fname']; ?></span>	<br>
			<span>School:<span style="margin-right: 92px;"></span> Eastern Visayas State University</span>	<br>
			<span class="text-capitalize">Address:<span style="margin-right: 89px;"></span><?= $dataqwe['agency_address'] ?></span>	<br>
			<span class="text-capitalize">Office/Agency:<span style="margin-right: 40px;"></span><?= $dataqwe['cname'] ?></span>	<br>
			<span>Inclusive Dates: <span style="margin-right: 38px;"></span> 
				<?php $infoDate = (date('F d' , strtotime($printer['dateto'])) + 5);
						$year = (date('Y' , strtotime($printer['datefrom'])))
				 ?>

				<?= (date('F d - ', strtotime($printer['datefrom'])));
				echo (date('F d, ', strtotime($printer['dateto'])));
				echo  $year  ?>
				
			</span>
		</div>

		<table id="" class="table table-hover table-bordered" style="margin-top: 20px; ">
			<thead style="background: Steelblue; color: #fff;">
				<th class="text-align">Task/s</th>
				<th class="text-align">How the Task/s was/were Accomplished</th>
				<th class="text-align">Lessons Learned</th>
				<th class="text-align">Acceptance needed to improve Performance</th>
			</thead>
				<?php $printer = $this->Login_user_model->get_journal_data123($journal_id) ?>		
			<tbody>
				<tr>
					<td><?= $printer['tasks1'] ?></td>
					<td><?= $printer['tasks2'] ?></td>
					<td><?= $printer['tasks3'] ?></td>
					<td><?= $printer['tasks4'] ?></td>					
				</tr>
			</tbody>

		</table>
		<div style="margin-top: 40px;">
			<span>Prepared By: <br></span>
			<span class="text-capitalize"><?= $_SESSION['lname'].', '.$_SESSION['fname']; ?><br></span>
			<span style="border-top: 1px solid #000;">Signature of Student-Trainee <br></span>
		</div>
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