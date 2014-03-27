<!DOCTYPE HTML>
<html>

<head>
  <title>:: Sudipta Dhara's Blog</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <?php
  require_once("includes/db.php");
		
		
	$rowx=mysql_fetch_assoc(mysql_query("SELECT * FROM `blog` WHERE `bliogid`=(SELECT min(`bliogid`) FROM `blog`)"));
	$filename=$rowx['filename'];
	$load_blog=$rowx['bliogid'];
	if(isset($_REQUEST["load_blog"]))
	{
		$load_blog=$_REQUEST["load_blog"];
		$qry=mysql_query("SELECT * FROM `blog` WHERE `bliogid`='$load_blog'") or die($con);
		if($row=mysql_fetch_array($qry,MYSQL_BOTH))
		{
			$heading=$row['blogname'];
			$filename=$row['filename'];
			$description=$row['description'];
			
			//echo $DATA;
			
		}
	}
    
	?>
</head>

<body>
<?php include_once("../analyticstracking.php") ?>
  <div id="main">

    <!-- begin header -->
    <?php require_once('header.php'); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <div id="left_content">
        <div id="blog_container">
        <?php
		$all_qry=mysql_query("SELECT * from `blog`;");
		while($all_row=mysql_fetch_array($all_qry,MYSQL_BOTH))
		{
		$all_heading=$all_row['blogname'];
		$all_description=$all_row['description'];
		$date=$all_row['date'];
		$id=$all_row['bliogid'];
		//echo $id;
	
		if($load_blog==$id)
          echo '<div class="blog"><h2>'.date("M", strtotime($date)).'</h2><h3>'.date("d", strtotime($date)).date("S", strtotime($date)).'</h3></div>
          <h4 class="select"><a href="blog.php?load_blog='.$id.'" >'.$all_heading.'</a></h4>
          <p>'.$all_description.'</p>';
		 else
		    echo '<div class="blog"><h2>'.date("M", strtotime($date)).'</h2><h3>'.date("d", strtotime($date)).date("S", strtotime($date)).'</h3></div>
          <h4><a href="blog.php?load_blog='.$id.'" >'.$all_heading.'</a></h4>
          <p>'.$all_description.'</p>';
		}
		?>
        </div>
      </div>
      <div id="right_content">
        <div id="blog_text">
         <?php
		   $NAME = "login/".$filename;
		   $HANDLE = fopen($NAME,'r') or die ('CANT OPEN FILE');;
		   $DATA = fread($HANDLE,filesize($NAME));
		   fclose($HANDLE);
	        echo $DATA;
			echo '<input type="hidden" id="filename" value="'.$filename.'">';
	
	?>
        </div>
      </div>
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
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
