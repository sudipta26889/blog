 <?php $url = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"blog/")+5); ?>
   <header>
      <div id="logo"><h1><a href="../blog">Sudipta Dhara</a></h1></div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li <?php if($url=="index.php" || $url=="") echo "class='selected'"; ?>><a href="index.php">home</a></li>
          <li <?php if($url=="about.php") echo "class='selected'"; ?>><a href="about.php">about me</a></li>
          <li <?php if($url=="portfolio_one.php") echo "class='selected'"; ?>><a href="portfolio_one.php">my portfolio</a></li>
          <li <?php if($url=="blog.php") echo "class='selected'"; ?>><a href="blog.php">blog</a></li>
          <li <?php if($url=="contact.php") echo "class='selected'"; ?>><a href="contact.php">contact</a></li>
        </ul>
      </nav>
    </header>