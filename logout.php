<style>
 h1{
	color:#708F1E;
}

</style>
<?php
@session_start();
///for checking
///require 'core.inc.php';
//echo $http_referer;

unset($_SESSION['userlogged']);
ob_start();
header("Location: mainPage.php");	

?>
