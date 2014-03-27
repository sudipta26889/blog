<!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta Dhara's Blog::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">

    <!-- begin header -->
   <?php require_once('header.php'); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <div id="left_content">
        <h1>About Me</h1>
        <p><?php
      require_once("includes/db.php");  
		$about_qry=mysql_query("select * from aboutme");
		$about_qry_row=mysql_fetch_array($about_qry,MYSQL_BOTH);
		echo $about_qry_row["about_me"];
		
		
	echo	'</p>
      </div>
      <div id="right_content">
        <img style="float: left; height:450px; width:450px;" src="images/'.$about_qry_row["photo"].'" title="about me" alt="about me"/>
      </div>
    </div>';
	
	?>
    <!-- end content -->

    <!-- begin footer -->
	<?php require_once('footer.php'); ?>
    <!-- end footer -->

  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
