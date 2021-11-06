

<?php

session_start();
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
	$error = 'You are not registered.';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: cancel.php?e='.urlencode($error)); exit;
}


?>

<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ticket Cancelation</title>
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap-responsive.css">
	</HEAD>

	<BODY>
	
				<div class="span10">
					<?php
						$query = "select * from seat1 where transaction_no = '" . $confirmation . "'";
						$result = mysql_query($query);
						if ( mysql_num_rows($result) == 0 )
						{
							echo "You have not booked any tickets.<a style='color:red' href='cancel.php'>back</a>";
						}
						else
						{
							echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();'>";
								echo "<table align='center' class='table table-hover table-bordered table-striped span6' align='center'>";
									echo "<thead>";
										echo "<tr>";
											echo "<th>Select</th>";
											echo "<th>Seat Number</th>";
											echo "<th>PNR</th>";
											echo "<th>Date</th>";
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
										echo "</tr>";				
									}
									echo "<tr>";
										echo "<td>";
										echo "</td>";
										echo "<td>";
											echo '<button type="submit" name="formSubmit" class="btn btn-info">';
												echo '<i class="icon-ok icon-white"></i> Submit';
											echo '</button>';
										echo "</td>";
										echo "<td>";
											echo '<button type="reset" class="btn">';
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
	</BODY>
</HTML>
