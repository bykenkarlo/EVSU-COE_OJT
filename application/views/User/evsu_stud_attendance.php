<!DOCTYPE html>
<html>
<head>
	<title>EVSU | College of Engineering | On the Job Training Monitoring and Grading System< </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/date_picker/jquery.simple-dtpicker.css">
    <link href='<?php echo base_url();?>assets/fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>assets/fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="<?php echo base_url();?>assets/fullcalendar/css/bootstrapValidator.min.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/combodate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker/jquery.simple-dtpicker.js"></script>
	<style type="text/css">
	thead{
	text-align: center;
	background: SteelBlue;
	color: white;
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
      	<li class="#"><a href="<?php echo base_url();?>Login/supervisor_profile_page"><span class="fa fa-home"></span> Home </a></li>
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
		<div class="col-sm-6">
			<input name="name" style="margin-right: -50px;" class="form-control text-capitalize" value="<?= $info['fname'].' '.$info['lname']?>" ></input>
		</div>
	</div>	
	<div class="form-group">	
		<label class="col-sm-2 control-label">Date:</label>
		<div class="col-sm-2">
			<select name="month" class="input-xs form-control col-sm-3" >
				<option value="<?= date("M")?>"><?= date("M")?></option>
				<option value="Jan">January</option>
				<option value="Feb">February</option>
				<option value="Mar">March</option>
				<option value="Apr">April</option>
				<option value="May">May</option>
				<option value="Jun">June</option>
				<option value="Jul">July</option>
				<option value="Aug">August</option>
				<option value="Sept">September</option>
				<option value="Oct">October</option>
				<option value="Nov">November</option>
				<option value="Dec">December</option>
			</select>
		</div>
		<div class="col-sm-2">
			
			<select name="date" class="input-xs form-control col-sm-3" >
				<option value="<?= date("d")?>"><?= date("d")?></option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="12">13</option>
				<option value="12">14</option>
				<option value="12">15</option>
				<option value="12">16</option>
				<option value="12">17</option>
				<option value="12">18</option>
				<option value="12">19</option>
				<option value="12">20</option>
				<option value="12">21</option>
				<option value="12">22</option>
				<option value="12">23</option>
				<option value="12">24</option>
				<option value="12">25</option>
				<option value="12">26</option>
				<option value="12">27</option>
				<option value="12">28</option>
				<option value="12">29</option>
				<option value="12">30</option>
				<option value="12">31</option>
			</select>
		</div>		
		
		<div class="col-sm-2">
			<select name="year" class="input-xs form-control"  >
				<option value="<?= date("Y")?>"><?= date("Y")?></option>
				<option value="PM">2017</option>
				<option value="PM">2018</option>
				<option value="PM">2019</option>
				<option value="PM">2020</option>
				<option value="PM">2021</option>
				<option value="PM">2022</option>
				<option value="PM">2023</option>
			</select>
		</div>
	</div>
	<div class="form-group">	
		<label class="col-sm-2 control-label">Day:</label>
		<div class="col-sm-2">
			<select name="day" class="form-control" >
				<option value="<?= date("D")?>"><?= date("D")?></option>
				<option value="Mon">Monday</option>
				<option value="Tues">Tuesday</option>
				<option value="Wed">Wednesday</option>
				<option value="Thu">Thursday</option>
				<option value="Fri">Friday</option>
				<option value="Sat">Saturday</option>
				<option value="Sun">Sunday</option>
			</select>
		</div>
	</div>
	<div class="form-group">	
		<label class="col-sm-2 control-label">Time in:</label>
		<div class="col-sm-2">
			<select name="time_in_hour" class="input-xs form-control" required>
				<option value=" ">Hour</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
		</div>
		<!-- <div class="col-sm-2">
			<input name="time_in_min" type="number" class="col-sm-4 input-xs form-control" placeholder="Minutes" value="<?= date("i") ?>"></input>
			
		</div> -->
		<div class="col-sm-2">			
			<select name="time_in_min" class="input-xs form-control" >
				<option value=" ">Minutes</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
				<option value="46">46</option>
				<option value="47">47</option>
				<option value="48">48</option>
				<option value="49">49</option>
				<option value="50">50</option>
				<option value="51">51</option>
				<option value="52">52</option>
				<option value="53">53</option>
				<option value="54">54</option>
				<option value="55">55</option>
				<option value="56">56</option>
				<option value="57">57</option>
				<option value="58">58</option>
				<option value="59">59</option>
			</select>
		</div>
		<div class="col-sm-2">
			<select name="time_in_ap" class="input-xs form-control col-sm-5" placeholder="AM/PM"  >
				<option value="<?= date("A") ?>">AM/PM</option>
				<option value="AM">AM</option>
				<option value="PM">PM</option>
			</select>
		</div>
	</div>
	<div class="form-group">	
		<label class="col-sm-2 control-label">Time out:</label>
		<div class="col-sm-2">
			<select name="time_out_hour" class="input-xs form-control col-sm-3" required >
				<option value=" ">Hour</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
		</div>
		<!-- <div class="col-sm-2">
			<input name="time_out_min" type="number" class="col-sm-4 input-xs form-control" placeholder="Minutes" value="<?= date("i") ?>"></input>
			
		</div> -->
		<div class="col-sm-2">			
			<select name="time_out_min" class="input-xs form-control" >
				<option value=" ">Minute</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
				<option value="46">46</option>
				<option value="47">47</option>
				<option value="48">48</option>
				<option value="49">49</option>
				<option value="50">50</option>
				<option value="51">51</option>
				<option value="52">52</option>
				<option value="53">53</option>
				<option value="54">54</option>
				<option value="55">55</option>
				<option value="56">56</option>
				<option value="57">57</option>
				<option value="58">58</option>
				<option value="59">59</option>
			</select>
		</div>
		<div class="col-sm-2">
			<select name="time_out_ap" class="input-xs form-control col-sm-5"  >
				<option value="">AM/PM</option>
				<option value="AM">AM</option>
				<option value="PM">PM</option>
			</select>
		</div>
	
	<div class="col-sm-8">
		<div class="pull-right" style="margin-top: 10px;">
			<button type="submit" class="btn btn-info btn-lg signin_button btnSubmit"><span class="glyphicon glyphicon-check"></span> Submit</button>
		</div>
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
	<table class="table table-striped table-bordered table-hover" style="margin-top: -18px;">
		<thead>
		
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Day</th>
				<th>Time in</th>
				<th>Time out</th>
			</tr>
		</thead>
			<?php foreach ($this->Login_user_model->get_attendance($stud_id) as $key) :
				$output = 	$key['time_in_hour'] ;

			 ?>

		<tbody>
			<tr>
				<td class="text-capitalize"><?= $key['name']?></td>
				<td><?= $key['month'].'-'.$key['date'].'-'.$key['year']?></td>
				<td><?= $key['day']?></td>
				<td><?= $key['time_in_hour'].':'.$key['time_in_min'].' '.$key['time_in_ap']?></td>
				<td><?= $key['time_out_hour'].':'.$key['time_out_min'].' '.$key['time_out_ap']?></td>
						
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

