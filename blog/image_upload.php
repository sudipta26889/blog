
<?php
require_once("includes/db.php");
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $query="INSERT into `portfolio_one`(`photo`,`description`) VALUES('$file_name','New'); ";
        $desired_dir="Portfolio";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysql_query($query) or die($con);			
        }else{
                print_r($errors);
        }
    
	if(empty($error)){
		include("includes/resize-class.php");
		 
			    $resizeObj = new resize('Portfolio/'.$file_name);
  		    	$resizeObj -> resizeImage(450, 450, 'crop');
				$resizeObj -> saveImage('Portfolio/'.$file_name, 100);
		
	}
	
	}
	header("location:login/portfolio_one.php?msg=Succesfully Uploaded");
}
?>



