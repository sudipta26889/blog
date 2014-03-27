<!DOCTYPE HTML>
<html>

<head>
  <title>:: Sudipta's Blog ::Home</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <?php
	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
	require_once("includes/db.php");
?>
</head>

<body >
<?php include_once("../analyticstracking.php") ?>
  <div id="main">

    <!-- begin header -->
    <?php require_once('header.php'); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <ul class="slideshow">
      <?php
	  $flag=0;
	  $homeqry=mysql_query("select * from `homepage`;");
	  while($homerow=mysql_fetch_array($homeqry,MYSQL_BOTH))
	  {
		  $photo=$homerow['photo'];
		  $description=$homerow['description'];
		  if($flag==0)
		  {
			  $flag=1;
	  echo '<li class="show"><img width="950" height="450" src="images/'.$photo.'" alt="&quot;'.$description.'&quot;" /></li>';
	      }else
	  echo '<li><img width="950" height="450" src="images/'.$photo.'" alt="&quot;'.$description.'&quot;" /></li>';
		  
	  }
	  ?>
      
      </ul>
    </div>
    <!-- end content -->

    <!-- begin footer -->
    <?php require_once('footer.php'); ?>
    <!-- end footer -->

  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
	 $(document).keydown(function(e){
            if (e.keyCode == 65) { 
               document.location="admin_login.php";
            }
        });
  </script>
  <!--Admin Login Panel Start-->
  
  <!--Admin Login Panel End-->
</body>
</html>
