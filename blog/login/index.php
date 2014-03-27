<?php
 require_once("session.php");
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>:: Sudipta's Blog ::Home</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="../css/portfolio_one.css" rel="stylesheet" type="text/css" />  
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="../login_css/forms.css" type="text/css">  
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript">

   function change(old,id)
	 {
		// alert("hi"); 
		var data=prompt("Enter Description for Photo Id: "+id,old);
		//alert(data);
		if(data=="" || data==null){} else
		  document.location.href="index.php?edit_des=1&id="+id+"&d="+data;
	 }
	 function conf(id)
	{
	 if(confirm("Delete Photo Id: "+id+" Permanently?"))
	 {
	   	 document.location.href="index.php?delete="+id;
	 }	
	}
 function validate()
   {
	var files=document.getElementById('input').value;
	if(files.length<1)
	{
	  alert("Please Select the photo(s) to upload....");
	  return false;	
	}
	   return true;
   }
  </script>
  <?php

	require_once("../includes/db.php");
	if(isset($_REQUEST['edit_des']))
	  {
		 if($_REQUEST['edit_des']==1)
		 {
		   $updateid=$_REQUEST['id'];
		   $updatedata=$_REQUEST['d'];
		   $updateqry=mysql_query("UPDATE `homepage` SET `description`='$updatedata' WHERE `id`='$updateid'") or die($con);
		   if($updateqry)
			header("location:index.php?msg=Photo Description Successully Updated");
		 }
	  }
   if(isset($_REQUEST['delete']))
	  {
		$picid=$_REQUEST['delete'];
		 $del_row=mysql_fetch_assoc(mysql_query("SELECT * FROM `homepage` WHERE `id`='$picid'"));
		 $FILE_TO_DEL=$del_row['photo']; 
		 if(file_exists("../images/".$FILE_TO_DEL)){
		 $del_qry=mysql_query("DELETE FROM `homepage` WHERE `id`='$picid'") or die($con); 
		 if($del_qry) 
		 {
			 if(unlink("../images/".$FILE_TO_DEL))
			  header("location:index.php?msg=Photo Deleted...."); 
		 }}else
		 $del_qry=mysql_query("DELETE FROM `homepage` WHERE `id`='$picid'") or die($con);
	  }
  if(isset($_REQUEST['add_pic']))
  {
	$photo=$_FILES["files"];
	  $pname=$photo['name'];
	  $desired_dir="../images";
		 $query="INSERT into `homepage`(`photo`,`description`) VALUES('$pname','Click to edit....'); ";
		 $qry=mysql_query($query) or die($con);			
         if($qry)
	     {
		   copy($photo['tmp_name'],"../images/".$photo['name']);
		   header("location:index.php?msg=Picture Successfully Added to Homepage");
		 }  
  }
?>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <?php require_once("header.php"); ?>
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
	  echo '<li class="show"><img width="950" height="450" src="../images/'.$photo.'" alt="<a onClick=&quot;change(\''.$description.'\',\''.$homerow['id'].'\')&quot;>&quot;'.$description.'&quot;</a>" /></li>';
	      }else
	  echo '<li><img width="950" height="450" src="../images/'.$photo.'" alt="<a onClick=&quot;change(\''.$description.'\',\''.$homerow['id'].'\')&quot;>&quot;'.$description.'&quot;</a>" /></li>';
		  
	  }
	  ?>
      
      </ul>
    </div>
    <!-- end content -->
<div id="thumb-container" style="float:left;">
        <div id="thumbs" class="navigation">
          <h1>Homepage Images</h1>
          <ul class="thumbs noscript">
          <?php
		  	
		  $portfolio_img_qry=mysql_query("SELECT * FROM `homepage`;");
		  while($portfolio_img_row=mysql_fetch_array($portfolio_img_qry,MYSQL_BOTH))
		  {
			 $id=$portfolio_img_row['id'];
		    $old_description=$portfolio_img_row['description'];
			$photoid=$portfolio_img_row['id'];
			echo '<li>
              <a class="thumb" href=""><img src="../images/'.$portfolio_img_row['photo'].'" alt="one" title="Photo Id: '.$photoid.'" style="width:75px; height:75px;"/><a href="#" style="float:right" onclick="conf('.$id.');" title="Delete" ><img src="../images/cross.png" ></a></a>
            </li>';
		  }
		  ?>
     
          </ul>
        </div></div> 
        <div id="thumb-container" style="float:right;">
        <div id="thumbs" class="navigation">
          <h1>Add Homepage Photo</h1>
        <form action="index.php" method="POST" enctype="multipart/form-data" name="fff" onSubmit="return validate()">
	<input type="file" id="input" name="files"/><input type="submit" name="add_pic" value="Upload"/>
</form></div></div>
        
    <!-- begin footer -->
    <?php require_once("footer.php"); ?>
    <!-- end footer -->

  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="../js/image_fade.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
  <?php
  	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
		
	if(isset($_REQUEST['chng_pass']))
	{
	  $chng_pass=$_REQUEST["chng_pass"];
			echo "<script language='javascript'	>";
				echo "alert('$chng_pass')";
			echo "</script>";	
	}


  ?>
</body>
</html>
