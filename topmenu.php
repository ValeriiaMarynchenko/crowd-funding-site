<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="mainPage.php">Crowdfunding system</a> </div>
    <div class="collapse navbar-collapse" id="myInverseNavbar2">
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="login.inc.php"><?php session_start();
		error_reporting(0);
		if($_SESSION['userlogged']!=null){
			$name=$_SESSION['userlogged'];
			echo "Signed In as ";
			echo $name."<br>";
			}
			else{
				echo "Sign In";
			}?></a></li>
        <li><a href="posts.php">Donate Now</a></li>
        <li><a href="posts.php">All Posts</a></li>
        <li><a href="newpost.php">Upload Cause</a></li>
        <li><a href="successStory.php">Success Stories</a></li>
        <li><a href="searchCause.php">Search Cause</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <?php
            if($_SESSION['userlogged']!=null){
				echo "<li><a href='logout.php'>Sign Out</a></li>";
				}
			?>
        
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>	