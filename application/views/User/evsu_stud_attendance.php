	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">   
<style type="text/css">
		#example_length{
			display: none;
		}
		#example_info{
		    float: left;
		    display: none;	
		}
		#example_filter{ display: none;	}
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
      	<li class="#"><a href="<?php echo base_url();?>"><span class="fa fa-home"></span> Home </a></li>
        <li><a href="#about" data-toggle="modal" data-target="#myModal_about" id="#about"><span class="fa fa-info-circle"></span> About</a></li>
		<li><a href="#contact_us"><span class="fa fa-envelope"></span> Contact Us</a></li>
		<li><a href="<?php echo base_url();?>Login/supervisor_chat_message"><span class="fa fa-comments"></span> Chat Us</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span><?php 
				if (isset($_SESSION['username'])) { ?>
				<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];	
				$user = $_SESSION['username'];	    
					    
				}?><span class="caret"></span>
          <ul class="dropdown-menu">
            <li><a style="color: #000;"  href="#"><span class="fa fa-cog"></span> Settings</a></li>
            <li><a style="color: #000;"  href="<?php echo base_url();?>Member/logout/<?=md5($_SESSION['username']);?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container" style="font-size:14pt; margin-top: 10px; margin-bottom: -10px;">
		<?= $this->session->flashdata('message') ?>
</div>

<?php $info = $this->Login_user_model->get_stud_data($stud_id); ?>	

<div class="container">
	<div class="clearfix" style="text-align: left; margin-top: 10px; margin-bottom: 15px;">
		

<div class="container">
<div id="non-printable">
	<div id="non-printable">
		<button type="button" onclick="window.location='<?= base_url();?>Login/supervisor_profile_page';" style=" margin:0px 30px 50px 0px; border-radius: 100px; box-shadow: 0 9px 18px 0 rgba(0, 0, 0, 0.21), 0 3px 10px 0 rgba(0, 0, 0, 0.19); float: right; position: fixed; z-index: 1; right: 0; bottom: 0;background: #db4437" class="btn btn-lg"><span style="color: #fff; font-size: 50px;" class="fa fa-arrow-left fa-1x"></span>
		</button>
	</div>
<div class="col-sm-12">
	<div class="well well-custom">
		<h1><span class="fa fa-calendar"></span> Attendance Form</h1><br>
	</div>
	<form class="form-horizontal" action="<?php echo base_url();?>Login/insert_attendance" method="POST" style="background: #fff; margin:-15px 0px 30px 0px;box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.21), 0 3px 6px 0 rgba(0, 0, 0, 0.19); padding: 20px 10px 15px 10px; " >

	<div class="form-group">
		<input type="hidden" name="stud_id" value="<?= $stud_id?>">
		<label class="col-sm-2 control-label">Name:</label>						
		<div class="col-sm-5">
			<input name="name" style="margin-right: -50px;" class="form-control text-capitalize" value="<?= $info['fname'].' '.$info['lname']?>" ></input>
		</div>
	</div>	
	<div class="form-group date" data-provide="datepicker">	
		<label class="col-sm-2 control-label">Date</label>		
		<div class='col-sm-5 ' id='datetimepicker1'>
			<div class="input-group">
				<input type='text' name="date" class="form-control" placeholder="Month/Day/Year" required />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
				 	</span>
			</div>						                  
		</div>
		<script type="text/javascript">
			$('#datetimepicker').data("DateTimePicker").FUNCTION();
		</script>
	</div>
		


	<div class="form-group bootstrap-timepicker timepicker" data-provide="datetimepicker">	
		<label class="col-sm-2 control-label">Time in:</label>
        <div class='col-sm-5' id=''>
            <div class="input-group date" id="datetimepicker3">
                <input type='text' name="time_in" id="timepicker1" class="form-control" placeholder="HH:MM:AM/PM" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
            </div>
        </div>
        
	</div>
	<div class="form-group bootstrap-timepicker timepicker" data-provide="datetimepicker">	
		<label class="col-sm-2 control-label">Time out:</label>
        <div class='col-sm-5' id=''>
            <div class="input-group date" id="datetimepicker">
                <input type='text' name="time_out" id="timepicker1" class="form-control" placeholder="HH:MM:AM/PM" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
            </div>
        </div>
        
	</div>
	<div class="form-group">		
	<div class="col-sm-offset-2" style="">
		<button type="submit" class="btnSubmitAttend btn btn-primary btn-lg col-sm-6"><span class="glyphicon glyphicon-check"></span> Submit</button>

	</div>
</div>
	
</form>	
</div>	

</div>
</div>
</div>	



<div class="col-sm-12" style="margin-left: 15px;">
	<div class="well well-custom">
		<h1 id=""><span class="fa fa-calendar"></span> Attendance Sheet</h1>
	</div>
	<table id="example" class="table table-striped table-bordered table-hover" style="margin-top: -18px;">
		<thead style="background: Steelblue; color: #fff;">
		
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Time in</th>
				<th>Time out</th>
			</tr>
		</thead>
			<?php foreach ($this->Login_user_model->get_attendance($stud_id) as $key) :			
			 ?>
		<tbody>
			<tr>
				<td class="text-capitalize"><?= $key['name']?></td>
				<td><?= $key['date']?></td>
				<td><?= $key['time_in']?></td>
				<td><?= $key['time_out']?></td>		
			</tr>
		</tbody>
		<?php endforeach ?>		
	</table>
</div>
	
<div style="float: right; margin-bottom: 20px;" class="">
	<button id="non-printable" class="btn btn-primary btnPrint" onClick="window.print()">
		<span class="glyphicon glyphicon-print"></span> Print this page
	</button>
</div>

<!-- 	<label>Time Consumed:<?= $output; ?> hrs</label>
 -->
	
	</div>	
</div>

<div class="container">	
</div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
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

