<!DOCTYPE html>
<html>
<head>
    <link href="newpost.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="boilerplate.css" rel="stylesheet" type="text/css">
    <link href="portfolioResponsive.css" rel="stylesheet" type="text/css">
    <link href="portfolioStyle.css" rel="stylesheet" type="text/css">
    <script src="respond.min.js"></script>
</head>
<body>
<!--This Is Body-->
<?php include("topmenu.php"); ?>
<div class='post_body'>
    <form class="basic-grey" action='contactus.php' method='POST'>
        <table style='margin-left:30%;margin-top:10px;'>
            <tr height='20'>
                <td colspan='2'><center><img src='images/contactus.jpg' width='390' height='150'></center></td>
            </tr>
            <tr><td colspan='2'></td></tr>
            <tr>
                <td align='right'>Your Email</td>
                <td>
                    <input type='email' size='38' name='email' style="border: 1px solid #DADADA;
                                color: #888;
                                height: 30px;
                                margin-bottom: 16px;
                                margin-right: 6px;
                                margin-top: 2px;
                                outline: 0 none;
                                padding: 3px 3px 3px 5px;
                                width: 70%;
                                font-size: 12px;
                                line-height:15px;
                                box-shadow: inset 0px 1px 4px #ECECEC;
                                -moz-box-shadow: inset 0px 1px 4px #ECECEC;
                                -webkit-box-shadow: inset 0px 1px 4px #ECECEC;">
                </td>
            </tr>
            <tr><td colspan='2'></td></tr>
            <tr>
                <td align='right'>Subject</td>
                <td><input type='text' name='subject' size='38'></td>
            </tr>
            <tr><td colspan='2'></td></tr>
            <tr>
                <td align='right'>Message</td>
                <td><textarea name='message' cols='40' rows='10'></textarea></td>
            </tr>
            <tr><td colspan='2'></td></tr>
            <tr>
                <td align='right'></td>
                <td>
                    <img src='generate.php' >
                    <textarea name='source' cols='10' rows='2' placeholder='write number here' maxlength='4'></textarea>
                    <!--<a ><img src='images/refresh.jpg' width='25' height='25'></a>-->
                </td>
            </tr>
            <tr><td colspan='2'></td></tr>
            <tr>
                <td></td>
                <td style='float:right'><input type='submit' name='sendemail' id="submit" value='Submit'></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>



<?php
	if(isset($_POST['sendemail'])){
		$conn=new mysqli("localhost","root",null,"Crowdfunding_system");
if($conn->connect_error){
	die("reeor in database connectivity");
	}
	$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
	$subject=htmlentities(mysqli_real_escape_string($conn,$_POST['subject']));
	$message=htmlentities(mysqli_real_escape_string($conn,$_POST['message']));
	$source=htmlentities(mysqli_real_escape_string($conn,$_POST['source']));
	$count=0;
		//// 1:checking all fields are not empty
	if(!empty($email)&&!empty($subject)&&!empty($message)&&!empty($source)){
		if(strlen($email)<30){
			$count++;
		}else{
			echo '<center><h1>Email length must be less than 30 characters</h1></center><br>';
		}
		if(strlen($subject)<100){
			$count++;
		}else{
			echo '<center><h1>Subject length must be less than 100 characters</h1></center><br>';
		}
		if(strlen($message)<1000){
			
			$count++;
		}else{
			echo '<center><h1>Message length must be less than 1000 characters</h1></center><br>';
		}
		///2;checking that all the above conditions are true
		if($count==3){
		@session_start();
		if($source==$_SESSION['secure']){
			$count++;
		}else{
		echo '<center><h1>Code  Not Match.</h1></center><br>';

		}
///2 end			
		}
		///3:after checking that all the fields are corretly filled
		if($count==4){


            $sql = "INSERT INTO comments (`post_id`, `comments`, `user_id`) VALUES ('1', '$email, $subject, $message', '1')";

        }//3 end
	//1 end
	}else{
		echo '<h1><center>All Fields Must Be filled.</h1></center>';
	}
		
	}//isset sendmail end
	
	?>