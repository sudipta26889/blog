<?php
 require_once("session.php");
?><!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta's - Contact::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript">
    function validate()
	{
		var name=document.fff.your_name.value;
		var msg=document.fff.your_message.value;
		var email=document.fff.your_email.value;  
		var answer=document.fff.answer.value;
		var answerx=document.fff.user_answer.value;
		if(name.length=="")
		{
			alert("Please enter your name");
			return false;
		}
		if(email.length=="")
		{
			alert("Please enter your Email");
			return false;
		}
		if(msg.length=="")
		{
			alert("Please enter your Message");
			return false;
		}
		if(answer!=answerx)
		{
			alert("Please enter correct answer");
			return false;
		}
		return true;
	// alert("In");	
	}
	function del(id)
	{
	 if(confirm("Delete contact id: "+id+" Permanently?"))
	  document.location="contact.php?del_rqst="+id;
	}
  </script>
  <script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
      if (highLight)
       {
         tableRow.style.backgroundColor = '#000000';
       }
      else
       {
         tableRow.style.backgroundColor = 'transparent';
       }
    }

  function DoNav(theUrl)
  {
  //alert("theUrl");
  //alert(theUrl);
  document.location.href = theUrl;
  }
function displayDiv(){
    var link = document.getElementById('js');
     link.style.display = 'block';
     }
</script>	 
<noscript><center><br><br><br><br><br><br><font color="red"><h1>
You need Javascript enabled to view all of the content on this page.
</h1></font></center></noscript>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <?php require_once("header.php"); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <div id="left_content">
        <h1>Contact Id: <?php 
		if(isset($_REQUEST['showid']))
		 echo $_REQUEST['showid']; ?></h1>
        
        <?php
		  require_once("../includes/db.php");
          if(isset($_REQUEST['showid']))
		  {
           $id=$_REQUEST['showid'];
		 $rqy=mysql_query("SELECT * FROM `contactme` WHERE `id`='$id'") or die("Error!!! Please Try Again....");
		 
		  if($row=mysql_fetch_assoc($rqy))
		   $yourname=$row['name'];
		   $youremail=$row['email'];
		   $yourmessage=$row['message'];
		   $status=$row['status'];
		   if($status="new")
		   {
			mysql_query("UPDATE `contactme` SET `status`='viewed' WHERE `id`='$id'") or die($con);   
		   }
          }
         if(isset($_REQUEST['del_rqst']))
		  {
			$delid=$_REQUEST['del_rqst'];
			$del_qry=mysql_query("DELETE FROM `contactme` WHERE `id`='$delid'");
			if($del_qry)
			 header("location:contact.php");  
		  }
        ?>
        <?php
		 if(isset($_REQUEST['showid']))
		 { 
		 echo '
        <form id="contact" action="contact.php" name="fff" method="post" onSubmit="return validate()">
          <div class="form_settings">
		  <p><span>Date</span><input class="contact" type="text" name="your_name" value="'.date("d-M-Y l",strtotime($row['date'])).'" readonly/></p>
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="'.$yourname.'" readonly/></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="'.$youremail.'" readonly/></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message" readonly>'.$yourmessage.'</textarea></p>
           
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="button" value="Delete" onclick="del(\''.$id.'\')" /></p><p align="center"><input class="submit" type="button" value="Back" onclick="javascript:document.location=&quot;contact.php&quot;;" /></p>
          </div>
        </form>';
		 }else{
			 echo '<table border="0" width="450px;">
			        <tr bgcolor="#222222"><th align=center><u><a><h3>Name</h3></th><th align=center><u><a><h3>Email</h3></th><th align=center><u><a><h3>Date</h3></th></tr>';
			 $all_contact_qry=mysql_query("SELECT * FROM `contactme`;");
			 while($all_row=mysql_fetch_array($all_contact_qry,MYSQL_BOTH))
			 {
			$abcd='contact.php?showid='.$all_row['id'];
  echo '<tr align="center" onmouseover="ChangeColor(this, true);" onmouseout="ChangeColor(this, false);" onclick="DoNav(&quot;'.$abcd.'&quot;);">';
             if($all_row['status']=="viewed")
				echo '<td><font color="#757575"><i>'.$all_row['name'].'</i></font></td><td><font color="#757575"><i>'.$all_row['email'].'</i></font></td><td><font color="#757575"><i>'.date("d-M-Y",strtotime($all_row['date'])).'</i></font></td></tr>';	 
			 else
			 	echo '<td><font color="#D8FEC5">'.$all_row['name'].'</font></td><td><font color="#D8FEC5">'.$all_row['email'].'</font></td><td><font color="#D8FEC5">'.date("d-M-Y",strtotime($all_row['date'])).'</font></td></tr>';	 
 
			 }
			 echo '</table>';
		 }
	  ?>
      </div>
      <div id="right_content"><font color="#757575"></font>
        <img src="../images/contact.jpg" width="450" height="450" title="contact" alt="contact" />
      </div>
    </div>
    <!-- end content -->

    <!-- begin footer -->
    <?php require_once("footer.php"); ?>
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