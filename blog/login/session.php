<?PHP
session_start();
	if(!isset($_SESSION['type']))
	{
		header("location:../admin_login.php?msg=Login fail ");
	}
	else
	{
	  if($_SESSION["type"]!='admin')	
       header("location:../admin_login.php?msg=Login fail ");     		
		
	}
	echo '<div id="logo" style="float:right; width:200px; position:fixed; right:15px; top:20px; z-index:5000;">Welcome '.$_SESSION["name"].'&nbsp;<a href="" onclick="chng_pass()"><img src="../img/key.jpg" height="10px;" width="10px;" /></a>&nbsp;<a href="logout.php">Logout</a></div>';
?>
<script type="text/javascript">
function chng_pass()
{
		// alert("hi"); 
		var old=prompt("Enter Old Password ","");
		
		if(old!="" && old!=null){
			var newpassword=prompt("Enter New Password ","");
		
		if(newpassword!="" && newpassword!=null){
			var newpassword=prompt("Enter Confirm Password ","");
		
		if(newpassword!="" && newpassword!=null){
		 document.location.href="index.php?chng_pass=1";
		}}}else {}
		  
}
</script>
