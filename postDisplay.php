
<head>
<title>Post Page</title>
<link href="postDisplay.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style.css">
<link href="boilerplate.css" rel="stylesheet" type="text/css">

<link href="portfolioResponsive.css" rel="stylesheet" type="text/css">

<link href="portfolioStyle.css" rel="stylesheet" type="text/css">
<script src="respond.min.js"></script>
</head>
<?php
include("topmenu.php");
error_reporting(1);
?>
<?php  
session_start();
$conn=new mysqli("localhost","root",null,"Crowdfunding_system");
if($conn->connect_error){
	die("reeor in database connectivity");
	}
	
	if(isset($_GET["post_id"])){
		$post_id=$_GET["post_id"];
		$sql = "SELECT * FROM `post` WHERE post_id=".$post_id;

		$result=$conn->query($sql);
		if($result->num_rows >0){
			while($row=$result->fetch_assoc()){
			$user=$row["user_id"];
			$title=$row["post_title"];
			$detail=$row["post_detail"];
			$target=$row["post_target"];
			$donated=$row["post_donated"];
			$time=$row["post_time"];
			$priority=$row["post_priority"];
			$status=$row["post_status"];
			$picture=$row["post_picture"];
			$category=$row["post_category"];
			$location=$row["post_location"];
			
			}
			}else{
				echo "Record Not Found.";
				}	
		}

?>
<body style="background:#DCDCDC">
<div class="modal" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
          <div class="modal-header" style="background-color:#708F1E;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="close">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">DONATE NOW</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" action="donatepost.php" method="post">

                        <h3 class="title-style-1 text-center" style="color:#708F1E;">Thank you for your donation <span class="title-under" style="background:#708F1E"></span>  </h3>

                        <div class="row">

                            <div class="form-group col-md-12 ">
                            <input type="number" class="form-control" name="cash" id="cash" placeholder="AMOUNT($)" maxlength="99999999999"" required>
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                                <input type="number" class="form-control" name="title" placeholder="Credit Card Number" maxlength="9999999999999999" required>
                            </div>

                        </div>


                        <div class="row">

                            <div class="form-group col-md-12">
                                <textarea cols="30" rows="4" class="form-control" name="textarea" placeholder="Any Comment (Optional)"></textarea>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">

        <td><input type="hidden" name="hidd" value="<?php echo $_GET['post_id']; ?>"/> </td>
                                <input type="submit" class="btn btn-primary pull-right" style="background-color:#708F1E" "name="donateNow" value="Donate Now">
                            </div>

                        </div>
                </form>
            
          </div>
        </div>
      </div>

    </div> <!-- /.modal -->
<div id="main">
<h1><?php echo $title; ?></h1>
	<div id="piccontent">	
		<div id="image"><img src='<?php echo $picture; ?>'width="100%" height="400px"  ></div>
	<p><?php echo $detail."<hr>"; ?></p>
	<div id="comments">
	<div  class='post_body'>	
		<form   action='savecomments.php' method='POST'>
				<table  >
		<tr height='20'>
		<td  colspan='2' ><h1>Give Feedback</h1></td>
		</tr>
		<tr>
			<td > </td>
			<td><input type='hidden'  name='userr' value="<?php echo $user;?>">
            <input type='hidden'  name='idd' value="<?php echo $post_id;?>"></td>
		</tr>	
		<!--for adding extra spaces between table lines-->
		<tr>
			<td >Message</td>
			<td><textarea  name='message'  cols='40' rows='10'></textarea><?php  if(isset($_SESSION["message"])){
					echo $_SESSION["message"];
				}?></td>
		</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
		<tr>
			<td></td>
			<td style='float:right'><input type='submit' name='sendcomments' value='Submit'></td>
		</tr>
		</table>
		</form>
		</div>
	<hr>	
	<?php
	  echo "<h1>Recent Comments</h1>";
		$post_id=$_GET["post_id"];
		$sql = "SELECT a.user_name,a.user_name,b.user_id,b.post_id,b.comments FROM `user` a,`comments` b
		WHERE a.user_id= b.user_id and post_id=".$post_id;
			//$sql="SELECT * FROM `donation` WHERE post_id=".$post_id;
		$result=$conn->query($sql);
		if($result->num_rows >0){
			while($row=$result->fetch_assoc()){
			$user=$row["user_name"];
			
			$comment=$row["comments"];
				
				echo "<h3>Person Name:".$user."</h3>";
				echo $comment."<br>";
				echo	"<hr>";	
		
		}
		}else{
				echo "Record Not Found.";
				}
		?>
	</div>
	</div>
		<div id="sidebar" >
		<h1>Target Amount is:</h1>
		<h2><?php  echo $target." $"?></h2>
		<h1>Achieved:</h1>
		<h2><?php $temp=($donated);echo $temp." of ".$target." goal";?></h2>
		<input type="button" value="Donate Now" id="donate">		
		<?php if($status==1){
			echo "<h1>Verified: </h1> <h2>Yes</h2>";
			}
		else
		{
		echo "<h1>Verified: </h1><h2>No</h2>";
			}?></h2>
		
			<div id="recentdonation">
			<h1>Recent Donation:</h1>
			<hr>
			<?php
			$post_id=$_GET["post_id"];
			$sql = "SELECT a.user_name,b.user_id,b.post_id,b.amount,b.comments FROM `user` a,`donation` b
			WHERE a.user_id= b.user_id and post_id=".$post_id;
				//$sql="SELECT * FROM `donation` WHERE post_id=".$post_id;
			$result=$conn->query($sql);
			if($result->num_rows >0){
				while($row=$result->fetch_assoc()){
				$user=$row["user_name"];
				$amount=$row["amount"];
				$comment=$row["comments"];
							
					echo "<h4>Person Name</h4><p>".$user."</p>";
					echo "<h4>Amount: </h4><p>".$amount."$</p>";
					echo "<h4>Comments</h4><p>".$comment."</p><hr>";
					
			
			}
			}else{
					echo "Record Not Found.";
					}				
		?>
			</div>
		</div>
		
			
	
</div>
<script language="javascript">
var modal = document.getElementById('donateModal');
var btn = document.getElementById("donate");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>