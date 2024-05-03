
<head>
<title>Post Page</title>
<link href="css/postDisplay.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<?php  
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
				echo "No Comments";
				}	
		}

?>
<body style="background:#DCDCDC">

<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="mainPage.html">Crowdfunding system</a> </div>
    <div class="collapse navbar-collapse" id="myInverseNavbar2">
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="#">Sign In</a></li>
        <li><a href="posts.php">Donate Now</a></li>
        <li><a href="#">Success Stroies</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">How It Works</a></li>
        <li><a href="#">Sign Up</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<div id="main">
<h1><?php echo $title; ?></h1>

	<div id="piccontent">
	
		<div id="image"><img src="<?php echo $picture; ?>" width="100%" height="400px"  ></div>
	<p><?php echo $detail; ?></p>
	
	<div id="comments">
	
	
	
	<?php
	  echo "<h1>Recent Comments</h1>";
		$post_id=$_GET["post_id"];
		$sql = "SELECT a.user_name,b.user_id,b.post_id,b.comments FROM `user` a,`comments` b
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
	
		<h2><?php $temp=($target-$donated);echo $temp." of ".$target." goal";?></h2>
		
		<input type="button" value="Donate Now" onclick="">
		
		
		
		<?php if($status==1){echo "<h1>Verified: </h1> <h2>Yes</h2>";}else{echo "<h1>Verified: </h1><h2>No</h2>";}?></h2>
		
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

<hr>
<hr>
<div class="container well">
  <div class="row">
<div class="col-xs-6 col-sm-6 col-lg-4 col-md-4"> <span class="text-right">
      </span>
  <h3>About Us</h3>
  <hr>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, consequatur neque exercitationem distinctio esse! Cupiditate doloribus a consequatur iusto illum eos facere vel iste iure maxime. Velit, rem, sunt obcaecati eveniet id nemo molestiae. In.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, consequatur neque exercitationem distinctio esse! Cupiditate doloribus a consequatur iusto illum eos facere vel iste iure maxime. Velit, rem, sunt obcaecati eveniet id nemo molestiae. In.</p>
</div>
<div class="col-xs-6 col-sm-6 col-lg-4 col-md-4 hidden-sm hidden-xs"> <span class="text-right"> </span>
  <h3>Latest News</h3>
  <hr>
  <div class="media-object-default">
  <div class="media">
  <div class="media-body">
        <h4 class="media-heading">Heading 1</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quod temporibus veniam deserunt deleniti accusamus voluptatibus at illo sunt quisquam. </div>
      <div class="media-right"> <a href="#"> <img class="media-object" src="images/64X64.gif" alt="placeholder image"></a></div>
</div>
<div class="media">
  <div class="media-body">
    <h4 class="media-heading">Heading 2</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, iure nemo earum quae aliquid animi eligendi rerum rem porro facilis.</div>
  <div class="media-right"> <a href="#"> <img class="media-object" src="images/64X64.gif" alt="placeholder image"></a></div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-lg-4 col-md-4"> <span class="text-right"> </span>
  <h3>Contact Us</h3>
  <hr>

    <address>
      <strong>MyStoreFront, Inc.</strong><br>
      Indian Treasure Link<br>
      Quitman, WA, 99110-0219<br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>

      <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@example.com</a>
      </address>
</div>
  </div>
</div>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyWebsite. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
</body>
