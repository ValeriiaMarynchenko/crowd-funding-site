<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="newpost.css" rel="stylesheet" type="text/css">
<link href="boilerplate.css" rel="stylesheet" type="text/css">

<link href="portfolioResponsive.css" rel="stylesheet" type="text/css">

<link href="portfolioStyle.css" rel="stylesheet" type="text/css">
<script src="respond.min.js"></script>
<title>ADD new Post</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
include("topmenu.php");
session_start();
if(!isset($_SESSION['userlogged'])){
	header("location:login.inc.php?post_id=post");
	die();
	}
?>
<form method="post" class="basic-grey" enctype="multipart/form-data" name="form1" id="form1" action="postadd.php">
  <table width="377" border="0" align="center">
    <tbody>
      <tr>
        <td colspan="2" class="Text">Hi User, Enter Your Goal</td>
      </tr>
      <tr>
        <td width="88"><span id="dollar">$:</span></td>
        <td width="525"><input type="number" name="cash" id="cash" style="height:100px; width:300px;font-size: 95px;color: #5F7E19;    line-height: 110px;" maxlength="999999999" required></td>
      </tr>
      <tr>
        <td colspan="2" class="Text">My Campaign Title <br><br></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="title" id="title" placeholder="Example: Susie's Medical Fund or My Volunteer Trip"  required pattern="{5-20}"><br></td>
      </tr>
      <tr>
        <td colspan="2" class="Text">Category<br><br></td>
      </tr>
      <tr>
        <td colspan="2"><select align="center" name="select" id="select" default="Choose One">
        <option value="Emergency" disabled selected>SELECT ONE</option>
          <option value="Emergency">Emergency</option>
          <option value="Medical">Medical</option>
          <option value="Volunteer">Volunteer</option>
          <option value="Education">Education</option>
          <option value="Sports">Sports</option>
          <option value="Memorials">Memorials</option>
        </select><br></td>
      </tr>
      <tr>
        <td colspan="2" class="Text">Country<br><br></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="loc" id="loc" placeholder="Enter your country..." pattern="[\Da-zA-z]{5-20}" required><br></td>
      </tr>
      <tr>
        <td colspan="2"  class="Text">Upload Image<br><br></td>
      </tr>
      <tr>
        <td height="27" colspan="2"><input type="file" name="file" id="file"  required><br><br><br></td>
      </tr>
      <tr>
        <td colspan="2"  class="Text">Description<br><br></td>
      </tr>
      <tr>
        <td colspan="2"><textarea name="textarea" id="textarea" cols="100" rows="30"  required placeholder="Enter your complete description here"></textarea><br></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input align="center" type="submit" name="submit" id="submit" value="Submit" width="50px"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </form>
</body>
</html>
