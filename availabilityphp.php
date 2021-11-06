<?php

session_start();
$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');



	
// get the posted data
$depcity= strip_tags( utf8_decode( $_POST['depcity'] ) );
$descity = strip_tags( utf8_decode( $_POST['descity'] ) );
	

// check that user id was entered
if (empty($depcity))
    $error = 'You must enter Departure City.';

	
// check that a message was entered
if (empty($descity))
    $error = 'You must enter Destination City.';



//Check whether the passenger is already registered.
$select = mysql_query("select * from route where depcity= '" . $depcity. "' and descity = '" . $descity . "'", $connection);

//$query = mysql_real_escape_string($select);

$num_rows = mysql_num_rows($select);

if ( $num_rows ==FALSE)
	$error = 'No Such Route.!!!';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: reservation1.php?e='.urlencode($error)); exit;
}


?>


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

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		
		<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
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
	include("include/seat.php");	
	
?>
</td>
</tr>
<tr>
<td >
	
	
<?php
	include("include/footer.php");	
	
?>	
	
</td>	
</tr>
</table>





		







</body>
</html>