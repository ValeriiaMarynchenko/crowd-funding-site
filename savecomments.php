<?php
echo "<style>
 h1{
    color:#708F1E;
}
</style>";


@session_start();
if(isset($_SESSION["userlogged"])){
					
	
	if(isset($_POST['sendcomments'])){
		

		unset($_SESSION["message"]);
		@session_start();
		$conn=new mysqli("localhost","root",null,"Crowdfunding_system");
if($conn->connect_error){
	die("reeor in database connectivity");
	}
	  $subject=htmlentities(mysqli_real_escape_string($conn,$_POST['idd']));
	 $message=htmlentities(mysqli_real_escape_string($conn,$_POST['message']));
	 $source=htmlentities(mysqli_real_escape_string($conn,$_POST['userr']));
	
	
	 $count=0;
	
	
		//// 1:checking all fields are not empty
	if(!empty($subject)&&!empty($message)&&!empty($source)){
		
		
			$count++;
		$count++;
		if(strlen($message)<1000){
			
			$count++;
		}else{
			echo '<center><h1>Message length must be less than 1000 characters</h1></center><br>';
		}
		///2;checking that all the above conditions are true
		$count++;
		
///2 end			
		}
		///3:after checking that all the fields are corretly filled
		if($count==4){
			
			$myquery = "INSERT INTO `comments` (`comment_id`, `post_id`, `comments`, `user_id`) VALUES (NULL, '$subject', '$message', '$source')";

		if ($conn->query($myquery) === TRUE) {
			
$_SESSION["message"]="Comment Saved";
    ob_start();
	header("Location: postDisplay.php?post_id=".$subject);
	} else {
    echo "Error : " . $myquery . "<br>" . $conn->error;

$conn->close();
		
		
		
		
		}//3 end
	//1 end
	}else{
		$_SESSION["message"]="Please write a comments";
		    ob_start();
	header("Location: postDisplay.php?post_id=".$subject);
		
	}
		
	}//isset sendmail end
//userlogged
}else{
	ob_start();
	@session_start();
	$_SESSION["post_id"]=$_POST['idd'];
	
	header("Location: login.inc.php");
	
}
