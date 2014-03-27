<!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta Dhara Portfolio::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/portfolio_one.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <?php
   require_once("includes/db.php");
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
      <!-- start gallery HTML containers -->
      <div id="gallery" class="content">
        <div class="slideshow-container">
          <div id="loading" class="loader"></div>
          <div id="slideshow" class="slideshow"></div>
        </div>
      </div>
      <div id="thumb-container">
        <div id="thumbs" class="navigation">
          <h1>Portfolio</h1>
          <ul class="thumbs noscript">
          <?php
		  	
		  $portfolio_img_qry=mysql_query("SELECT * FROM `portfolio_one`;");
		  while($portfolio_img_row=mysql_fetch_array($portfolio_img_qry,MYSQL_BOTH))
		  {
			 
		    echo '<li>
              <a class="thumb" href="Portfolio/'.$portfolio_img_row['photo'].'"><img src="Portfolio/'.$portfolio_img_row['photo'].'" alt="one" style="width:75px; height:75px;" width=450px, height=450px /></a>
              <div class="caption">
                <div class="image-title portfolio_one">&quot;'.$portfolio_img_row['description'].'...&quot;</div>
              </div>
            </li>';
		  }
		  ?>
     
          </ul>
        </div>
        <div id="controls" class="controls portfolio_one"></div>
        <div id="caption" class="caption-container"></div>
        <div style="clear: both;"></div>
        <!-- end gallery HTML containers -->
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
  <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
  <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
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
</body>
</html>
