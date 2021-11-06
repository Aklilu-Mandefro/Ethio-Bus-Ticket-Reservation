
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Ethio bus transport system</title>


<link rel="stylesheet" href="css/ticket.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		
		<link rel="stylesheet" type="text/css" href="../css/datepicker.css" />
</head>
<body>

<style>
ft{
	color: red;
	font-size: 20px;
}
fz{
	color: green;
	font-size: 20px;
}
</style>


 
	
<div id="top_style">
        <div id="top_style_text">
       <b >PRINT TICKET</b>
        </div><!-- end of top_style_text-->
</div><!-- end of top_style-->

<div id="style_informations">


<?php
					// check for a successful form post
					if (isset($_GET['e'])) echo "<div class=\"alert alert-error\"><h3>".$_GET['e']."<a href='main.php?tag=printt'>Back</a></h3></div>";
			?> 

<form action="printt1.php" method="post"  name="contact_form" target="iframe1">


<table style="padding-top: 10px;margin-top: 20px;" border="0" id="ttcancel" align  ="center" cellpadding = "5" cellspacing = "10">
			<tr>
	        <td align="left" style="color:white"><label for="reservation id"><b>Transaction No.:</b></label></td>
			<td><input type="text" style="width:190px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" pattern="[A-z0-9 ]{3,}" title="Please enter a valid transaction No." placeholder="example: uejuy2s4" required name="transaction_no"/></td></tr>
			
			<tr>
	        <td align="left" style="color:white"><label for="reservation id"><b>Departure Date:</b></label></td>
			<td><div data-date-format="yyyy-mm-dd" data-date="document.write(date())" class="input-append date myDatepicker">
							    <input type="text"  style=" height: 24px;" value="" name="date" size="16" class="span2" placeholder="Date Of Journey" required>
							    <span class="add-on"><i class="icon-calendar"></i></span>
							</div></td></tr>
			<tr><td></td><td>
			<button id="button1" class="submit" name="submit" value="signin" type="submit"><b>Submit</b></button>&nbsp;&nbsp;&nbsp;
			<button id="button1" class="submit" type="reset"><b>cancel</b></button></td></tr>
</table>
		
</form>

</div><!-- end of style_informatios -->


<script>window.jQuery || document.write('<script src="../js/jquery-latest.min.js">\x3C/script>')</script>
		
		<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
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