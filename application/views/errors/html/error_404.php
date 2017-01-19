<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="shortcut icon" href="/EVSU_OJT/assets/images/logo-icon.png">
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #fff;
	background-color: transparent;
	font-weight: bolder;
	margin: 6em 0 18px 0;
	padding: 14px 15px 10px 15px;
	text-shadow: 4px 4px 5px rgba(0, 0, 0, 2);
	font-size: 45px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 15px;
}

p {
	margin: 15px 18px 15px 18px;
}
.message
{
	color: #fff;
	font-size: 27px;
	text-shadow: 4px 4px 5px rgba(0, 0, 0, 2);


}
</style>
</head>
<body style="background: url('/assets/images/error_404.jpeg') repeat; background-size: 37%; text-align: center;">
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<div class="message"><?php echo 'Wazzap madafaka!'; ?></div>
	</div>
</body>
</html>