
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ethio bus transport system</title>
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


		
</head>
<body >
<table id="t"  align="center" >
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



<div id="center">
<div id="welcome">
<h2 align="center" style="padding-top:5px;">VIEW SCHEDULE PAGE</h2>	
</div>

<?php
								include('conection/connect.php');
								$user_query=mysql_query("select *  from schedule")or die(mysql_error());
								$i=0;
    while($row=mysql_fetch_array($user_query)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
<table cellpadding="10px" border="1" width="100%">
<tr bgcolor="<?php echo $color?>">
<td colspan="3" align="center">
<h2  style="color:red;padding-top: 10px;"> <?php echo $row['depcity']; ?>&nbsp;&nbsp;To&nbsp;&nbsp; <?php echo $row['descity']; ?></h2>	
</td>	
</tr>	
<tr bgcolor="<?php echo $color?>" ><th align="center">Departure Time</th><th align="center">Arrival Time</th><th align="center">Weekly Programs</th>	
	
</tr>
<tr bgcolor="<?php echo $color?>">
	<td align="center"><?php echo $row['deptime']; ?></td><td align="center"><?php echo $row['arrivaltime']; ?></td><td align="center"><?php echo $row['wprogram']; ?></td>
</tr>	
</table>
<?php } ?>
					
				
			

	

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