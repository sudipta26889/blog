<?php
require_once("../includes/header.php");
session_start();
 ?>
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



<center><h1>Welcome <?php echo $_SESSION["name"]; ?><br><br>
 <form action="../image_upload.php" method="POST" enctype="multipart/form-data">
Upload Photo	<input type="file" name="files[]" multiple/>
	<input type="submit"/>
</form>

</h1><a href="logout.php">Logout</a></center>

<?php
require_once("../includes/footer.php"); ?>