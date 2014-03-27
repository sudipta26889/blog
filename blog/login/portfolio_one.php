<?php
 require_once("session.php");
?><!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta's Blog's Portfolio - Edit::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/portfolio_one.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../login_css/forms.css" type="text/css">

  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript">
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
 function change(old,id)
 {
	// alert("hi"); 
	var data=prompt("Enter Description for Photo Id: "+id,old);
	if(data=="" || data==null){} else
	  document.location.href="portfolio_one.php?edit_des=1&id="+id+"&d="+data;
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
	   $updateqry=mysql_query("UPDATE `portfolio_one` SET `description`='$updatedata' WHERE `id`='$updateid'") or die($con);
	   if($updateqry)
	    header("location:portfolio_one.php?msg=Photo Description Successully Updated");
	 }
  }
  if(isset($_REQUEST['delete']))
  {
	$picid=$_REQUEST['delete'];
	 $del_row=mysql_fetch_assoc(mysql_query("SELECT * FROM `portfolio_one` WHERE `id`='$picid'"));
	 $FILE_TO_DEL=$del_row['photo']; 
	 $del_qry=mysql_query("DELETE FROM `portfolio_one` WHERE `id`='$picid'") or die($con); 
	 if($del_qry) 
	 {
    	  unlink("../Portfolio/".$FILE_TO_DEL);
	      header("location:portfolio_one.php?msg=Photo Deleted...."); 
	 }
  }
  
  ?>
   <script type="text/javascript">
	function conf(id)
	{
	 if(confirm("Delete Permanently?"))
	 {
	   	 document.location.href="portfolio_one.php?delete="+id
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
      <!-- start gallery HTML containers -->
      <div id="gallery" class="content">
        <div class="slideshow-container">
          <div id="loading" class="loader"></div>
          <div id="slideshow" class="slideshow"></div>
        </div>
      </div>
      <div id="thumb-container">
        <div id="thumbs" class="navigation">
          <h1>Portfolio One</h1>
          <ul class="thumbs noscript">
          <?php
		  	
		  $portfolio_img_qry=mysql_query("SELECT * FROM `portfolio_one`;");
		  while($portfolio_img_row=mysql_fetch_array($portfolio_img_qry,MYSQL_BOTH))
		  {
			 $id=$portfolio_img_row['id'];
		    $old_description=$portfolio_img_row['description'];
			$photoid=$portfolio_img_row['id'];
			echo '<li>
              <a class="thumb" href="../Portfolio/'.$portfolio_img_row['photo'].'"><img src="../Portfolio/'.$portfolio_img_row['photo'].'" alt="one" title="Photo Id: '.$photoid.'" style="width:75px; height:75px;"/><a href="#" style="float:right" onclick="conf('.$id.');" title="Delete" ><img src="../images/cross.png" ></a></a>
              <div class="caption">
                <div class="image-title portfolio_one"><a style="color:white" title="Photo Id: '.$photoid.'"  onClick="change(\''.$old_description.'\',\''.$photoid.'\')">&quot;'.$portfolio_img_row['description'].'...&quot;</a></div>
              </div>
            </li>';
		  }
		  ?>
     
          </ul>
        </div> <form action="../image_upload.php" method="POST" enctype="multipart/form-data" name="fff" onSubmit="return validate()">
Upload Photo	<input type="file" id="input" name="files[]" multiple/><input type="submit" value="Upload"/>
</form>
        <div id="controls" class="controls portfolio_one"></div>
        <div id="caption" class="caption-container"></div>
        <div style="clear: both;"></div>
        <!-- end gallery HTML containers -->
      </div>
    </div>
    <!-- end content -->

    <!-- begin footer -->
    <?php require_once("footer.php"); ?>
    <!-- end footer -->

  </div>
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
  <script type="text/javascript" src="../js/jquery.galleriffic.js"></script>
  <script type="text/javascript" src="../js/jquery.opacityrollover.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      // we only want these styles applied when javascript is enabled
      $('div.navigation').css({'width' : '450px', 'float' : 'left', 'height' : '400px'});
      $('div.content').css('display', 'block');
      // initially set opacity on thumbs and add additional styling for hover effect on thumbs
      var onMouseOutOpacity = 0.67;
      $('#thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity:   onMouseOutOpacity,
        mouseOverOpacity:  1.0,
        fadeSpeed:         'fast',
        exemptionSelector: '.selected'
      });
      // initialize advanced galleriffic gallery
      var gallery = $('#thumbs').galleriffic({
        delay:                     3500,
        numThumbs:                 10,
        preloadAhead:              10,
        enableTopPager:            false,
        enableBottomPager:         true,
        maxPagesToShow:            7,
        imageContainerSel:         '#slideshow',
        controlsContainerSel:      '#controls',
        captionContainerSel:       '#caption',
        loadingContainerSel:       '#loading',
        renderSSControls:          true,
        renderNavControls:         true,
        playLinkText:              'Play Slideshow',
        pauseLinkText:             'Pause Slideshow',
        prevLinkText:              '&lsaquo; Previous Photo',
        nextLinkText:              'Next Photo &rsaquo;',
        nextPageLinkText:          'Next &rsaquo;',
        prevPageLinkText:          '&lsaquo; Prev',
        enableHistory:             false,
        autoStart:                 false,
        syncTransitions:           true,
        defaultTransitionDuration: 900,
        onSlideChange:             function(prevIndex, nextIndex) {
          // 'this' refers to the gallery, which is an extension of $('#thumbs')
          this.find('ul.thumbs').children()
            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
            .eq(nextIndex).fadeTo('fast', 1.0);
        }
      });
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
	
?>
</body>
</html>
