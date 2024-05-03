<!doctype html>
<html class="">
<meta charset="utf-8">
<head>
<title>Posts</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link href="boilerplate.css" rel="stylesheet" type="text/css">

<link href="portfolioResponsive.css" rel="stylesheet" type="text/css">

<link href="portfolioStyle.css" rel="stylesheet" type="text/css">
<script src="respond.min.js"></script>

<?PHP
$conn = mysqli_connect("localhost", "root","", "Crowdfunding_system");
?>

<script src="http://use.edgefonts.net/montserrat:n4:default;alice:n4:default.js" type="text/javascript"></script>

</head>
<body>
<?php
include("topmenu.php");
?>
<div class="gridContainer clearfix"> 

<h2 class="fluid showAreaH2 headingStyle">Be a Part of Better Society</h2>
 <article class="fluid gallery">
   <?PHP
$sql2 = "select post_picture, post_title, post_id from post where post_donated >= post_target "; 
$result2 = mysqli_query($conn, $sql2);
$Numrow = mysqli_num_rows($result2);

	while($row2= mysqli_fetch_array($result2))	
	{	
		?>
        
   <figure class="fluid tiles" >
   <a href="postDisplay.php?post_id=<?PHP echo $row2[2] ?>"> <img src="<?PHP echo $row2[0]; ?>" alt="placeholder"  height="300px" width="800px"/> 
   <figcaption class="textStyle"> <?PHP echo $row2[1]; ?></figcaption> </a>
   </figure> 
   <?PHP 
	}
	?>
  </article>
  
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
      <strong>Company name</strong><br>
      Ukraine<br>
      UA, 000000 <br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>

      <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">valeiia.marynchenko@example.com</a>
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
</html>

