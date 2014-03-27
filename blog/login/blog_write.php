<?php
 require_once("session.php");
?><!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta's Blog - Edit::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link type="text/css" rel="stylesheet" href="../login_css/signup/lightbox-css.css">
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../login_css/forms.css" type="text/css">
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  	<script src="../includes/ckeditor.js"></script>
    <script>
  function validate()
   {
	var heading=document.new_blog.heading.value;
	var descrp=document.new_blog.descrp.value;
	if(heading.length<5)
	{
	  alert("Please Enter The Heading Of the  Blog....");
	  return false;	
	}
	if(descrp.length<10)
	{
	  alert("Please Enter The Short Description Of the  Blog....");
	  return false;	
	}
	   return true;
   }
	
	function save()
	{
		var data=document.getElementById("editable").innerHTML;  
		var filename=document.getElementById("filenamexxxx").value;
		//alert(filename);
		var url="write.php?F="+filename+"&D="+data;
		newwindow=window.open(url,'name','height=200,width=150');
		if (window.focus) {
		 newwindow.focus();
		 setTimeout(function() {newwindow.close();},1250); 
		 	
			}
		return false;
	}
	</script>
	
	<style>

		#editable
		{
			padding: 10px;
			float: left;
		}

	</style>
    <?php

		require_once("../includes/db.php");
		
		
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
    <script type="text/javascript">
	function conf(id)
	{
	 if(confirm("Delete Permanently?"))
	 {
	   	 document.location.href="blog_write.php?delete="+id
	 }
		
	}
	</script>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <?php require_once("header.php"); ?>
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
          <h4 class="select"><a href="blog_write.php?load_blog='.$id.'" >'.$all_heading.'</a>&nbsp;&nbsp;<a onclick="conf('.$id.');" title="Delete" ><img src="../images/cross.png" ></a></h4>
          <p>'.$all_description.'</p>';
		 else
		    echo '<div class="blog"><h2>'.date("M", strtotime($date)).'</h2><h3>'.date("d", strtotime($date)).date("S", strtotime($date)).'</h3></div>
          <h4><a href="blog_write.php?load_blog='.$id.'" >'.$all_heading.'</a>&nbsp;&nbsp;<a onclick="conf('.$id.');" title="Delete" ><img src="../images/cross.png" ></a></h4>
          <p>'.$all_description.'</p>';
		}
		?>
       <center><input type="button" name="save" value="Add New Blog" onClick="document.getElementById('shadowing').style.display='block';
	  document.getElementById('box').style.display='block';" style="background:#666; font-size:x-large"></center>
        </div>
      </div>
      <div id="right_content">
        <div id="blog_text"><div id="editable" contenteditable="true">
           <?php
		   $NAME = $filename;
		   if(file_exists($NAME))
		   {
		   $HANDLE = fopen($NAME,'r') or die ('CANT OPEN FILE');;
		   $DATA = fread($HANDLE,filesize($NAME));
		   fclose($HANDLE);
	        echo $DATA;
		   }
	
	?></div>
        </div><center><input type="button" name="save" value="Save" onClick="save();" style="background:#090; font-size:x-large"></center><?php echo '<input type="hidden" id="filenamexxxx" value="'.$filename.'">'; ?>
      </div>
    </div>
    <!-- end content -->

    <!-- begin footer -->
    <?php require_once("footer.php"); ?>
    <!-- end footer -->

  </div>
  <script>

		// We need to turn off the automatic editor creation first.
		CKEDITOR.disableAutoInline = true;

		var editor = CKEDITOR.inline( 'editable' );

	</script>
  <?php
	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
	
?>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../js/jquery.sooperfish.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
  <!--ADD BLOG-->
  <?php
  if(isset($_REQUEST['add_new']))
  {
	$new_heading=$_REQUEST['heading'];
	$new_desc=$_REQUEST['descrp'];
	$today=date("yy-m-d");
	$i=0;
	$FILENAME='abc'.$i.'.txt';
	while(file_exists($FILENAME))
	{
		$i++;
		$FILENAME='abc'.$i.'.txt';
	}
	//echo $FILENAME;
	$HANDLEXX = fopen($FILENAME, 'w') or die ('CANT OPEN FILE');
	if(fwrite($HANDLEXX,"  - ".$new_desc))
	{
	  $new_qry=mysql_query("INSERT INTO `blog` (`blogname`,`filename`,`description`,`date`) VALUES ('$new_heading','$FILENAME','$new_desc','$today')") or die($con);
	  if($new_qry)
	   header("location:blog_write.php?msg=New Blog Posted....");	
		
	}
	fclose($HANDLEXX);
  }
  
  if(isset($_REQUEST['delete']))
  {
	$blogid=$_REQUEST['delete'];
	 $del_row=mysql_fetch_assoc(mysql_query("SELECT * FROM `blog` WHERE `bliogid`='$blogid'"));
	 $FILE_TO_DEL=$del_row['filename']; 
	 if(unlink($FILE_TO_DEL))
	 {
    	$del_qry=mysql_query("DELETE FROM `blog` WHERE `bliogid`='$blogid'"); 
	     if($del_qry) 
	      header("location:blog_write.php?msg=Block Deleted...."); 
	 }
  }
  ?>
 <div id="shadowing"></div>
<div id="box" style="overflow:hidden;">
<div id="boxheader" style="height:30px; font-size:11px">
    <h1><a>Enter New Blog Details</a></h1>
   <span id="boxclose" onClick="document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none'"> </span>
</div>
<!--<div id="boxcontent"  onclick="closebox()">  </div>-->
 <div id="boxtitle"></div><br><br><br><br>
<form action="blog_write.php" method="post" name="new_blog" onSubmit="return validate();"><center><br>
 <table width="634" border="0">
  <tr align="left">
    <th width="263" colspan="2"> BLOG DEATILS</th>
  </tr>
  <tr>
    <td>Blog Heading:-</td>
    <td width="361"><input type="text" name="heading" size="25"/></td>
  </tr>
  <tr>
    <td>Blog Description:-</td>
    <td><textarea name="descrp"></textarea></td>
  </tr>
 </table><br><br>
       <input type="submit" name="add_new" id="button2" value="Submit" style="float:none"/>
</center></form>

</div>
</div>   
<!---->
</body>
</html>
