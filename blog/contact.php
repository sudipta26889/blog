<!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta Dhara - Contact::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
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
  </script>
<?php

  
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com'); 
?>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <?php require_once('header.php'); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <div id="left_content">
        <h1>Contact</h1>
        <p>Say hello, using this contact form.</p>
        <?php
           //This PHP Contact Form is offered &quot;as is&quot; without warranty of any kind, either expressed or implied.
          // David Carter at www.css3templates.co.uk shall not be liable for any loss or damage arising from, or in any way
          // connected with, your use of, or inability to use, the website templates (even where David Carter has been advised
          // of the possibility of such loss or damage). This includes, without limitation, any damage for loss of profits,
          // loss of information, or any other monetary loss.

          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
		    require_once('../PHPMailer-master/PHPMailerAutoload.php');
   $mail = new PHPMailer; 
  $mail->Host = 'smtp.mandrillapp.com;smtp.mandrillapp.com';  // Specify main and backup server
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'sudiptai26.889@gmail.com';                            // SMTP username
  $mail->Password = 'LDxzcr6vRDBajjr4J02QKQ';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

          $to = 'sudiptai26.889@gmail.com';
          $subject = 'Enquiry from my Blog Site';
		  
          $contact_submitted = 'Your message has been sent.';
		  $youremail = "";
          $yourname = "";
          $yourmessage = "";
          
          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (isset($_REQUEST['contact_submitted'])) {
		  $youremail =$_REQUEST['your_email'];
          $yourname =$_REQUEST['your_name'];
          $yourmessage = $_REQUEST['your_message'];
		  $date=date("Y-m-d");
		  $status="new";
		  require_once("includes/db.php");
            $return = "<br>";
            $youremail = trim(htmlspecialchars($youremail));
            $yourname = stripslashes(strip_tags($yourname));
            $yourmessage = stripslashes(strip_tags($yourmessage));
            $contact_name = "<b>Name:</b> ".$yourname.$return."<b>Email:</b><i>".$youremail."</i>";
            $message_text = "<b>Message:</b> ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_REQUEST['user_answer']));
            $answer = trim(htmlspecialchars($_REQUEST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
			$mail->From = $youremail;
		    $mail->FromName = $yourname;
		    $mail->addAddress($to);               // Name is optional
		    $mail->addReplyTo($youremail, $yourname);
			$mail->WordWrap = 50;
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = "Name: ".$yourname."Email:".$youremail."Message".$yourmessage;
            if (email_is_valid($youremail) && $yourname != "" && $yourmessage != "")
			 {
             if(!$mail->send()) {
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			  }
			  else	
			  {
			  $rqy=mysql_query("INSERT INTO `contactme` (name,email,message,date,status) VALUES ('$yourname','$youremail','$yourmessage','$date','$status');") or die("Error!!! Please Try Again....");
		  
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
			  if($rqy)
               echo '<p style="color: blue;">'.$contact_submitted.'</p>';
             }
			}
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = $number_1+$number_2;
		  
        ?>
        <form id="contact" action="contact.php" name="fff" method="post" onSubmit="return validate()">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
            <p style="line-height: 1.7em;">To help prevent spam, please enter the answer to this question:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
      <div id="right_content">
        <img src="images/contact.jpg" width="450" height="450" title="contact" alt="contact" />
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
