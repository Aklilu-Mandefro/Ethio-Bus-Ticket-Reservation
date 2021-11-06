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
<h2 align="center" style="padding-top:5px;">CHECK TICKET AVAILABILITY PAGE</h2>	
</div>
<h4 align="center" >By Selecting Departure And Destination City  You Can Check Availability of Ticket!!!</h4>


<?php

					// check for a successful form post
					if (isset($_GET['s'])) 
					{
						echo "<div class=\"alert alert-success\"><h3><b>".$_GET['s']."</b><h3></div>";
//						echo "You will be automatically redirected after 5 seconds.";
						
					}

					// check for a form error
					elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";

			?> 

<form  name="contact_form" method="post" action="availabiltyphp.php" target="iframe1">

<table id="ttavailable" align  ="center" cellpadding = "5" cellspacing = "10">
<tr><td></td></tr>
<tr><td align="left" style="color:white"><label for="Departure city">Departure city:</label></td>
            <td>
            <select name="depcity"style="width: 190px;  border: 3px double #CCCCCC; padding:5px 0px;color:green " required/>
            <option value="">Select Departure City</option>	
						<?php
						include('include/database.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['depcity'].'">';
								echo $row['depcity'];
								echo '</option>';
							}
						?>
						</select>
            </td></tr>
       <tr><td align="left" style="color:white"><label for="Destination city">Destination city:</label></td>
            <td>
            <select name="descity" style="width: 190px;  border: 3px double #CCCCCC; padding:5px 0px;color:green " required/>
            <option value="">Select Destination City</option>	
						<?php
						include('include/database.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['descity'].'">';
								echo $row['descity'];
								echo '</option>';
							}
						?>
						</select>
            </td></tr>
          <tr>
	        <td align=left style='color:white'><label for=Departure date>Departure date:</label></td>
            <td><div data-date-format="yyyy-mm-dd" data-date="document.write(date())" class="input-append date myDatepicker">
							    <input type="text" value="" name="doj" size="16" class="span2" placeholder="Date Of Journey" required>
							    <span class="add-on"><i class="icon-calendar"></i></span>
							</div></td>
<tr><td></td>
<td align="left"><input type="submit" name="check" value="Check Availlability" id="button123"  />
			<input type="reset" value="Cancel" id="button123"/></td></tr>
</table>
</form>

	

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





		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script>
			$('.myDatepicker').each(function() {
			    var minDate = new Date();
			    minDate.setHours(0);
			    minDate.setMinutes(0);
			    minDate.setSeconds(0,0);
			    
			    var $picker = $(this);
			    $picker.datepicker();
			    
			    var pickerObject = $picker.data('datepicker');
			    
			    $picker.on('changeDate', function(ev){
			        if (ev.date.valueOf() < minDate.valueOf()){
			            
			            // Handle previous date
			            alert('You can not select past date.');
			            pickerObject.setValue(minDate);
			            
			            // And this for later versions (in case)
			            ev.preventDefault();
			            return false;
			        }
			    });
			});					
		</script>







</body>
</html>