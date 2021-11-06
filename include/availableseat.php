

<!DOCTYPE HTML>

<?php
	
	
	$connection = mysql_connect("localhost","root","");
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysql_select_db('ethiobus');
?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ethio bus transport system</title>
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap-responsive.css">
	</HEAD>

	<BODY>
		
		
			<div id="welcome1"> <h1 align="center">CHECK SEAT AVAILABILITY</h1></div>
			<center>
						<table  border="0" cellspacing="15px" cellpadding="5">
						<tr><td colspan="3"><h1><b ">Journey from:</b><?php
								echo "<b style='color:red'>$depcity</b>";
								
							?> <b >To:</b><?php
								echo "<b style='color:red'>$descity</b>";
								
							?> </h1>
							
							
							<div><?php
							$date = strip_tags( utf8_decode( $_POST['doj'] ) );
							
							
							
							echo "<div align='right'><h2>Date=<b style='color:red'>$date</b></h2></div>";
								
							
							
							
							
							?></div>
							
							
						<div align="center"><button ><a href="reservation1.php"><b>Book Now</b></a></button></div>	
							
							
							</td>
						
							<td rowspan="4"> <table style="width: 100%; background:linear-gradient(white,royalblue,green,white); border-radius: 15px" border="0"><tr><td style="color: white"><b><h3>Available Seat:</h3></b></td><td></td><td></td><td></td><td><img width="60px" height="60px" src="img/available.png"/></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td style="color:white"><b><h3>Reserved Seat:</h3></b></td><td></td><td></td><td></td><td><img width="60px" height="60px" src="img/occupied.png"/></td></tr></table></td>
							</tr>
							
							
							</table>
						</center>
				<div class="span10">
					<form action="reservation.php" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							$date = strip_tags( utf8_decode( $_POST['doj'] ) );
							$depcity = strip_tags( utf8_decode( $_POST['depcity'] ) );
							$descity = strip_tags( utf8_decode( $_POST['descity'] ) );
							$query = "select * from seat1 where date = '" . $date . "' and depcity = '" . $depcity . "'and descity='".$descity."'";
							$result = mysql_query($query);
							if ( mysql_num_rows($result) == 0 )
							{
								for($i=1; $i<61; $i++)
								{
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";								
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysql_fetch_array($result))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<61; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}
						?>
						</ul>
						
					</form>
				</div>
			
		

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/js/jquery-latest.min.js">\x3C/script>')</script>
		
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