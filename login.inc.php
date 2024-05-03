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
<?php
include("topmenu.php");
?>
<form  class="basic-grey" style="max-width: 350px;"action="login.inc.php"  method='POST'>

	<table align='center' border='0px' width='350' height='320' style='border-color:grey ; margin-top:7%'>
	
			
		<tr>
			<td colspan='2'>
            <div style="HEIGHT:100PX;">
            <h1 align="center"><FONT align="center" style="color:#708F1E;">LOGIN</FONT></h1>
            </div>	
            </td>
            </tr>
            <tr>
            <td align="center">			
			Username &nbsp; &nbsp;<input type='text' placeholder='Your Username' name='username' size='25'>
            </td></tr>
			<tr>
            <td align="center">
			Password&nbsp;&nbsp;
            
            <input type='password' placeholder='Your Password' name='password' size='25' style="border: 1px solid #DADADA;color: #888;
height: 30px;margin-bottom: 16px; margin-right: 6px;margin-top: 2px;outline: 0 none;padding: 3px 3px 3px 5px; width: 70%;font-size: 12px;line-height:15px; box-shadow: inset 0px 1px 4px #ECECEC;-moz-box-shadow: inset 0px 1px 4px #ECECEC;-webkit-box-shadow: inset 0px 1px 4px #ECECEC;"></td></tr><tr><td align="center">
			<input align="center" type='submit' value="Login" id="submit" name='login' >
			<input type='reset' value="Cancel" style="background: #E27575;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;"></td></tr>
			<tr><td align="center">
						<input type='button' value="SignUp" name='signup' style="background: #E27575;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;" onclick="callsignup()">
    <input type="hidden" name="hidden" value="<?php if(isset($_GET['post_id'])){
		if($_GET['post_id']=="post"){
			echo $_GET['post_id'];}}
			?>">
                        </td></tr>
						
			</td>
		</tr>

	</table>
</form>
</body>
</html>

<script>
function callsignup(){
	window.location ="signup.php";
}
</script>
<?php
session_start();
if(!empty($_POST)){
$conn=new mysqli("localhost","root",null,"Crowdfunding_system");
if($conn->connect_error){
	die("error in database connectivity");
	}
if(isset($_POST['username'])&&isset($_POST['password'])){
	$username=htmlentities(mysqli_real_escape_string($conn, $_POST['username']));
	 $password=htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
	 //$password=htmlentities(mysqli_real_escape_string($conn,md5($_POST['password'])));
	if(!empty($username)&&!empty($password)){
		$sql = "SELECT * FROM user where user_name='$username' && user_password='$password'";
			$result = $conn->query($sql);
if ($result->num_rows ==1) {
    while($row = $result->fetch_assoc()) {
	@ob_start();
    $_SESSION["userlogged"]= $row["user_name"];
		if($_POST['hidden']=="post"){
			echo "into";
		header("location:newpost.php");
		die();
		}
	else {
	header("Location: mainPage.php");
	die();}
	}
} else {
	echo '<center><h1>Please Enter Correct Username And Password</h1></center>';

}
	}
	else{
		echo '<center><h1>Please fill all Fields.</h1></center>';
	}
}
}

?>