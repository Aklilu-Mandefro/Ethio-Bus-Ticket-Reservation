<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title> Ethio bus transport system</title>
<meta name="robots" content="index, follow">
  <meta name="keywords" content="ethiobus">
  <meta name="description" content="ethiobus">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/header.css" type="text/css" />
<link href="themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/new.css" rel="stylesheet" />
<script src="js/new.js" type="text/javascript"></script>
<script src="themes/2/js-image-slider.js" type="text/javascript"></script>
<link type="text/css" href="css/menu1.css" rel="stylesheet" />
<link type="text/css" href="css/dropdown_menu.css" rel="stylesheet" />
<style>
.fling-minislide {width:100%; height:0px; padding-bottom: 50%; overflow:hidden; position:relative; }
.fling-minislide img{ position:absolute; animation:fling-minislide 20s infinite; opacity:0; width: 100%; height: auto;}

@keyframes fling-minislide {25%{opacity:1;} 40%{opacity:0;}} 
.fling-minislide img:nth-child(4){animation-delay:0s;}
.fling-minislide img:nth-child(3){animation-delay:5s;}
.fling-minislide img:nth-child(2){animation-delay:10s;}
.fling-minislide img:nth-child(1){animation-delay:15s;}
</style>
</head>
<body>
<table id="t"   align="center" >
<tr>
	<td colspan="3">

<?php
	include("include/header.php");	
	
?>

</td>
</tr>
<tr valign="top">
<td >

<?php
	include("include/left.php");	
	
?>
</td>
<td width="500px">

 
<div class="fling-minislide">
  <img src="a.jpg" alt="Slide 4" />
  <img src="b.jpg" alt="Slide 3" />
  <img src="c.jpg" alt="Slide 2" />
  <img src="d.jpg" alt="Slide 1" />
</div>


</td>


<td width="290px">
<?php
	include("include/right.php");	
	
?>

</td>
</tr>
<tr>
<td colspan="3">
	
	
<?php
	include("include/footer.php");	
	
?>	
	
</td>	
</tr>
</table>
</body>
</html>
