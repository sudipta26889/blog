<html>
<head>
<title>Login :: Using Jsp</title>

<link rel="stylesheet" href="../login_css/jquery-ui-1.8.18.custom.css" type="text/css" media="screen">
<link rel="stylesheet" href="../login_css/validationEngine.jquery.css" type="text/css">
<link rel="stylesheet" href="../login_css/icons.css" type="text/css">
<link rel="stylesheet" href="../login_css/forms.css" type="text/css">
<link rel="stylesheet" href="../login_css/tables.css" type="text/css">
<link rel="stylesheet" href="../login_css/ui.css" type="text/css">
<link rel="stylesheet" href="../login_css/style.css" type="text/css">
<link rel="stylesheet" href="../login_css/responsiveness.css" type="text/css">

<link type="text/css" rel="stylesheet" href="../login_css/signup/lightbox-css.css">

<!-- jQuery -->
<script src="../login_css/jquery.min.js"></script>
<script src="../login_css/jquery-ui.min.js"></script>
<!-- Validation engine -->
<script type="text/javascript" src="../login_css/jquery.validationEngine-en.js" charset="utf-8"></script>
<script type="text/javascript" src="../login_css/jquery.validationEngine.js"></script>
<!-- Knob -->
<script type="text/javascript" src="../login_css/jquery.knob.js"></script>

<!-- Caffeine custom JS -->
<script type="text/javascript" src="../login_css/custom.js"></script>

 </head>
<body id="index" class="home">
    <div id="loading-block" style="display: none;"></div> <!-- Loading block -->
    
    <section id="login-container">
        <div id="login_header"></div>
        <div id="login_wrapper">
				<div class="login_wrapper_container">
					<div class="float_center_box">
						
						<div class="one-half logo-box">
							<img src="../login_css/login-logo.png" alt="Caffeine">
						</div>
						
						<div class="clear"></div>
						<div class="box">
							<div class="inner">
							
								<div class="contents">
									<div class="one-half username-half">
										
										<div class="clear"></div>
									</div>
<?php
require_once("../includes/db.php");
?>

<center><h1>Successfully Registered.<br /><input type="button" onClick="history.go(-1);" value="Back" class="button green small"></h1></center>

<center><h1>Error!!! Can't Register <br /><input type="button" onClick="history.go(-1);" value="Back" class="button red small"></h1></center>


</div></div></div></div></div></div></section>
</body>
</html>
