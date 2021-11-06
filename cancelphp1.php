<?php

include("include/see1.php");
	require("conection/connect.php");
$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');

// check for form submission - if it doesn't exist then send back to signin form
if (!isset($_POST['submit']) || $_POST['submit'] != 'signin') {
    header('Location:cancel.php'); exit;
}

	
// get the posted data
$confirmation= strip_tags( utf8_decode( $_POST['transaction_no'] ) );
$doj = strip_tags( utf8_decode( $_POST['date'] ) );
	

// check that user id was entered
if (empty($confirmation))
    $error = 'You must enter Transaction No.';

	
// check that a message was entered
if (empty($doj))
    $error = 'You must enter Date.';



//Check whether the passenger is already registered.
$select = mysql_query("select * from reservation where transaction_no = '" . $confirmation. "' and date = '" . $doj . "'", $connection);

//$query = mysql_real_escape_string($select);

$num_rows = mysql_num_rows($select);

if ( $num_rows == 0)
	$error = 'You are not registered.!!!';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: cancel.php?e='.urlencode($error)); exit;
}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ticket Cancelation</title>
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
<body>
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
<h2 align="center" style="padding-top:5px;">CANCEL YOUR TICKET HERE</h2>	
</div>
<h4 align="center" style="color: green">SELECT AND CANCEL</h4>


					<?php
						$query = "select * from seat1 where transaction_no = '" . $confirmation . "'";
						$result = mysql_query($query);
						if ( mysql_num_rows($result) == 0 )
						{
							echo "<h2 style='color:red'> You have not booked any tickets !!!.</h2>";
							echo'<meta content="5;cancelphp1.php" http-equiv="refresh" />';
						}
						else
						{
							echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();'>";
							
								include('conection/connect.php');
								
								
								$user_query=mysql_query("select * from seat1 where transaction_no = '" . $confirmation . "'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								
							echo "<input type='text' name='account' placeholder='Please enter your bank account to get fare'/>";	 
							echo "<input type='hidden' name='cancelled' id='fare' value=".$row['transaction_no']." />";
							echo "<input type='hidden' name='fare' id='fare' value=".$row['fare']." />";
								echo "<table bordr='1' style=' background:linear-gradient(royalblue,green, #030507);' id='tablecancel'  class='table table-hover table-bordered table-striped ' align='center' '>";
									echo "<thead>";
										echo "<tr>";
											echo "<th style='color:white; background:linear-gradient(royalblue,green, #030507);'>Select</th>";
											echo "<th style='color:white; background:linear-gradient(royalblue,green, #030507);'>Seat Number</th>";
											echo "<th style='color:white; background:linear-gradient(royalblue,green, #030507);'>PNR</th>";
											echo "<th style='color:white; background:linear-gradient(royalblue,green, #030507);'>Date</th>";
											echo "<th style='color:white; background:linear-gradient(royalblue,green, #030507);'>Fare</th>";
										echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
								
									while($row = mysql_fetch_array($result))
									{
										echo "<tr>";
											echo "<td><input type='checkbox' name='formSeat[]' value='".$row['PNR']."'/></td>";
											echo "<td>". $row['number'] ."</td>";
											echo "<td>". $row['PNR'] ."</td>";
											echo "<td>". $row['date'] ."</td>";
											echo "<td>". $row['fare'] ."</td>";
											
										echo "</tr>";				
									}
									echo "<tr>";
										echo "<td>";
										echo "</td>";
										echo "<td>";
											echo '<button type="submit" name="formSubmit" id="button1">';
												echo '<i class="icon-ok icon-white"></i> Submit';
											echo '</button>';
										echo "</td>";
										echo "<td>";
											echo '<button type="reset" id="button1">';
												echo '<i class="icon-refresh icon-black"></i> Clear';
											echo '</button>';
										echo "</td>";
										echo "<td>";
										echo "</td>";
									echo "</tr>";
									echo "</tbody>";
								echo "</table>";
							echo "</form>";
						}
					?>
				
			

	

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





		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>







</body>
</html>