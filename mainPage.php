<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Real Estate Website Template</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
include("topmenu.php");
?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
        <div id="carousel-299058" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel-299058" data-slide-to="0" class=""> </li>
            <li data-target="#carousel-299058" data-slide-to="1" class="active"> </li>
            <li data-target="#carousel-299058" data-slide-to="2" class=""> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item"> <a href="mainPage.php"><img class="slideShow"  src="images/logo.jpg" alt="thumb"> </a>
              <div class="carousel-caption"> </div>
            </div>
            <div class="item"> <a href="posts.php"> <img class="slideShow" src="images/donatenow.jpg" alt="thumb"></a>
              <div class="carousel-caption">  </div>
            </div>
            <div class="item"> <a href= "newpost.php"> <img class="slideShow" src="images/uploadcause.png" alt="thumb"> </a>
              <div class="carousel-caption">  </div>
            </div>
          </div>
          <script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("item");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
          <a class="left carousel-control" href="#carousel-299058" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel-299058" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
    </div>
    <hr>
  </div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
        <div class="media-object-default">
          <div class="media">
            <div class="media-left"> <a href="Category.php?post_category=Emergency"> <img class="media-object img-circle" src="images/emergency.PNG" alt="placeholder image"> </a> </div>
            <div class="media-body">
             </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <div class="media">
          <div class="media-left"> <a href="Category.php?post_category=Medical"> <img class="media-object img-circle" src="images/med.PNG" alt="placeholder image"></a></div>
          <div class="media-body">
            </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 hidden-sm hidden-xs">
        <div class="media">
          <div class="media-left"> <a href="Category.php?post_category=Education"> <img class="media-object img-circle" src="images/edu.PNG" alt="placeholder image"></a></div>
          <div class="media-body">
            </div>
        </div>     
      </div>
       <div class="col-lg-2 col-md-2 col-sm-4 hidden-sm hidden-xs">
        <div class="media">
          <div class="media-left"> <a href="Category.php?post_category=Memorials"> <img class="media-object img-circle" src="images/memo.PNG" alt="placeholder image"></a></div>
          <div class="media-body">
         </div>
        </div>
    </div>
       <div class="col-lg-2 col-md-2 col-sm-4 hidden-sm hidden-xs">
        <div class="media">
          <div class="media-left"> <a href="Category.php?post_category=Sports"> <img class="media-object img-circle" src="images/sport.PNG" alt="placeholder image"></a></div>
          <div class="media-body">
           </div>
        </div>
    </div>
       <div class="col-lg-2 col-md-2 col-sm-4 hidden-sm hidden-xs">
        <div class="media">
          <div class="media-left"> <a href="Category.php?post_category=Voluteer"> <img class="media-object img-circle" src="images/voluteer.PNG" alt="placeholder image"></a></div>
          <div class="media-body">
            </div>
        </div>
    </div>
  </div>
</section>
<hr>
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-12">
<div class="row">
<?php
$conn=mysqli_connect("localhost","root","","Crowdfunding_system");
$sql="Select * from post";
$res=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($res)){
if($i==4){
		  echo "</div></div><div class='row'>";
		  }
?>
<?php if($i==4){$i=1;}
	   if($i==1){ echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'>";
	   }
	   else if($i==2){ echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'>";}
	   else if($i==3){ echo "<div class='col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs";}?>
       <div>
          <div class="thumbnail"> <img src="<?php echo $row[9];?>" alt="Thumbnail Image 1" class="img-responsive">
            <div class="caption">
              <h3><?php echo $row[1];?></h3>
              <hr>
              <p class="text-center"><a href="postDisplay.php?<?php $row[0];?>" class="btn btn-success" role="button" value=1>Donate Now</a></p>
            
            </div>
          </div>
        </div>
        <?php 
		if($i==3){echo "</div></div>";
			}
		  	++$i;
}
if($row==null){echo "</div></div>"; }
	  ?>
    </div>
    <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
      <div class="well">
        <h3 class="text-center">Find a Cause</h3>
        <form class="form-horizontal" method="post" action="searchCause.php">
          <div class="form-group">
            <label for="location1" class="control-label">Location</label>
            <select class="form-control" name="loc" id="location1">
              <option >Pakistan</option>
              <option>USA</option>
              <option >China</option>
            </select>
          </div>
          <div class="form-group">
            <label for="type1" class="control-label">Category</label>
            <select class="form-control" name="cat" id="type1">
              <option >Emergency</option>
              <option >Medical</option>
              <option >Education</option>
              <option >Memorial</option>
              <option >Sports</option>
              <option >Volunteer</option>

            </select>
          </div>
        <input class="btn btn-danger" type="submit" value="Search" >
        </form>
      </div>
      <hr>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>