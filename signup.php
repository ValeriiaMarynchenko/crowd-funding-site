<html>
<head>
<link href="newpost.css" rel="stylesheet" type="text/css">
<link href="boilerplate.css" rel="stylesheet" type="text/css">

<link href="portfolioResponsive.css" rel="stylesheet" type="text/css">

<link href="portfolioStyle.css" rel="stylesheet" type="text/css">
<script src="respond.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
include("topmenu.php");
?>
<form class="basic-grey" style="max-width: 350px;" action='signup.php' method='POST'>
<table align='center'  width='350' height='400' style='border-color:grey ; margin-top:6%'>
	
		<tr>
			<td colspan='2' align='center' >
			<div style="HEIGHT:100PX;">
            <h1 align="center"><FONT align="center" style="color:#708F1E;">SIGNUP</FONT></h1>
            </div>	
            </td>
            </tr>	
            	<tr>
                <td>		
			First Name&nbsp;<input type='text' name='firstnamee' placeholder='first name' maxlength='30' size='25' required><br><br>
			Last Name&nbsp;&nbsp;<input type='text' name='lastname' placeholder='last name' maxlength='30' size='25' required><br><br>
			Phone No&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='username' placeholder='user phone no' maxlength='13' size='25' required><br><br>
			Password&nbsp;&nbsp; &nbsp;&nbsp;<input type='password' placeholder='your password' name='password'  size='25' style="border: 1px solid #DADADA;color: #888;
height: 30px;margin-bottom: 16px; margin-right: 6px;margin-top: 2px;outline: 0 none;padding: 3px 3px 3px 5px; width: 70%;font-size: 12px;line-height:15px; box-shadow: inset 0px 1px 4px #ECECEC;-moz-box-shadow: inset 0px 1px 4px #ECECEC;-webkit-box-shadow: inset 0px 1px 4px #ECECEC;" REQUIRED><br><br>
			Password&nbsp;&nbsp; &nbsp;&nbsp;<input type='password' placeholder='confirn password' name='cpassword'  size='25' style="border: 1px solid #DADADA;color: #888;
height: 30px;margin-bottom: 16px; margin-right: 6px;margin-top: 2px;outline: 0 none;padding: 3px 3px 3px 5px; width: 70%;font-size: 12px;line-height:15px; box-shadow: inset 0px 1px 4px #ECECEC;-moz-box-shadow: inset 0px 1px 4px #ECECEC;-webkit-box-shadow: inset 0px 1px 4px #ECECEC;" required><br><br>
			&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='email' placeholder='your email' name='email' maxlength='30' size='25' style="border: 1px solid #DADADA;color: #888;
height: 30px;margin-bottom: 16px; margin-right: 6px;margin-top: 2px;outline: 0 none;padding: 3px 3px 3px 5px; width: 70%;font-size: 12px;line-height:15px; box-shadow: inset 0px 1px 4px #ECECEC;-moz-box-shadow: inset 0px 1px 4px #ECECEC;-webkit-box-shadow: inset 0px 1px 4px #ECECEC;" required><br><br>


			<input type='submit' value='Submit' id="submit" name="savedata">
			<input type='reset' value="Cancle"  style="background: #E27575;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;" name=''>
			</td>
            </tr>
	</table>
</form>


<?php
if(isset($_POST['savedata'])){
	@ob_start();
	
$conn=new mysqli("localhost","root",null,"Crowdfunding_system");
if($conn->connect_error){
	die("reeor in database connectivity");
	}
@session_start();

if(isset($_POST['firstnamee']) && isset($_POST['lastname']) &&isset($_POST['username']) &&isset($_POST['password'])&&isset($_POST['email'])&&isset($_POST['cpassword'])){
	$cpassword=htmlentities(mysqli_real_escape_string($conn,$_POST['cpassword']));
	$firstnamee=htmlentities(mysqli_real_escape_string($conn,$_POST['firstnamee']));
	$lastname=htmlentities(mysqli_real_escape_string($conn,$_POST['lastname']));
	$username=htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
	$password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
		$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));

	//its better to use md5 encryption for passwords
	if(!empty($firstnamee)&&!empty($lastname)&&!empty($username)&&!empty($password)&&!empty($cpassword)&&!empty($email)){
		if($cpassword==$password){
		if(strlen($firstnamee)<=30 && strlen($lastname)<=30 && strlen($username)<=30 && strlen($password)<=30){
			//echo $password=$password;
			$count=0;
		$sql = "SELECT * FROM user where user_name='$firstnamee' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$count++;
    // output data of each row
    while($row = $result->fetch_assoc()) {
			echo '<center><h1>User Name Already Exist.Please Change it!</h1></center>';
	}
}
$sql = "SELECT * FROM user where user_email='$email' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$count++;
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
			echo '<center><h1>User Email Already Exist.Please Change it!</h1></center>';
	}
}
	
	
	
	
if($count==0) {
    		
$myquery="INSERT INTO `user` (`user_id`, `user_name`, `user_lastname`, `user_email`, `user_password`, `user_phone`) VALUES (NULL, '$firstnamee', '$lastname', '$email', '$password', '$username')";
if ($conn->query($myquery) === TRUE) {
$last_id = $conn->insert_id;
   @ob_start();
   $post_id=$_SESSION["post_id"];
	unset($_SESSION["post_id"]);
	
	
						if($post_id=="main"){
$_SESSION["userlogged"]= $row["user_name"];
	header("Location: mainPage.html");	
	}else if($post_id=="post"){
$_SESSION["userlogged"]= $row["user_name"];
	header("Location: newpost.php");	
	}else{
							$_SESSION["userlogged"]= $row["user_name"];
						header("Location: postDisplay.php?post_id=".$post_id);	
						}
	
	
	
	} else {
    echo "Error: " . $myquery . "<br>" . $conn->error;
}
//$conn->close();

}	
					
		}
		else{
			echo '<center><h1>ERROR:Length Too Long</h1></center>';
		}
		}else{
			echo '<center><h1>Both password does not match</h1></center>';
		}
	}
	else{
		
	echo '<center><h1>Please Fill All Fields</h1></center>';
	}
	
	
	}
	
}
?>



