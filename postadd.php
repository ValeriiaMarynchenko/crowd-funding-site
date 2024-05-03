<?php
session_start();
$name=$_SESSION['userlogged'];
$conn=mysqli_connect("localhost","root","","Crowdfunding_system");$sql="Select `user_id` from `user` where `user_name`='$name'";
  $res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
echo  $user=$row[0];
 echo $cash=$_POST['cash'];
echo  $title=$_POST['title'];
echo  $cats=$_POST['select'];
echo $loc=$_POST['loc'];
echo $text=$_POST['textarea'];
$name=$_FILES['file']['name'];
$tmp=$_FILES['file']['tmp_name'];
echo $dest="images/".$name;
  $detail=$_POST['textarea'];
$year=date("Y");
$month=date("M");
echo  $date=date("d-m-Y");
if($cats=='Emergency'){
	$priority='1';
	}
else if($cats=='Volunteer'){
	$priority='4';
}
else if($cats=='Medical'){
	$priority='2';
}
else if($cats=='Education'){
	$priority='3';
}
else if($cats=='Memorials'){
    $priority='5';
}
else{
	$priority='6';
	}
move_uploaded_file($tmp,$dest);
$conn=mysqli_connect("localhost","root","","Crowdfunding_system") or die("Connection Failure");
$sql = "INSERT INTO `post` (`user_id`, `post_title`, `post_detail`, `post_target`, `post_donated`, `post_priority`, `post_picture`, `post_category`, `post_location`) 
VALUES 
('$user', '$title', '$text', '$cash', 0, '$priority', '$dest', '$cats', '$loc')";
/*$sql="INSERT INTO post ('post_id', 'user_id','post_title','post_detail','post_target','post_donated','post_time','post_priority','post_status','post_picture','post_category','post_location')
VALUES (null, '$user','$title','$detail','$cash','null','$date','$priority','0','$dest','$cats','$loc')";*/
$res=mysqli_query($conn,$sql);
if($conn->query($sql)===TRUE){
	echo "DONE";}
	else{echo "waro";}
$sql="Select `post_id` from `post` where `user_id`='$user' and `post_title`='$title'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
	$ress=$row[0];	
}
header("location:postDisplay.php?post_id=$ress");
?>