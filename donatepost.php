<?php
session_start();
$post=$_POST['hidd'];
if(!isset($_SESSION['userlogged'])){
	header("location:postDisplay.php?post_id=$post");
}
$name=$_SESSION['userlogged'];
$conn=mysqli_connect("localhost","root","","Crowdfunding_system");$sql="Select `user_id` from `user` where `user_name`='$name'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$user=$row[0];
echo $row[0];
$cash=$_POST['cash'];
$credit=$_POST['title'];
$comment=$_POST['textarea'];
$conn=mysqli_connect("localhost","root","","Crowdfunding_system");
$sql="INSERT INTO `donation` (`post_id`,`user_id`,`amount`,`comments`,`credit_card`) VALUES ('$post','$user','$cash','$comment','$credit')";
$res=mysqli_query($conn,$sql);
$sql="Select `post_donated` from `post` where `post_id`='$post'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$av=$row[0];
$new=$av+$cash;
$sql="UPDATE `post` SET `post_donated` = '$new' WHERE `post`.`post_id` = '$post'";
$res=mysqli_query($conn,$sql);
header("location:postDisplay.php?post_id=$post");
?>