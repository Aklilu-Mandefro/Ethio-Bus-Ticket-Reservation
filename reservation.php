<?php
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
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
	include("include/left.php");	
	
?>
</td>
<td width="500px">



<div id="center">
<div id="welcome">
<h2 align="center" style="padding-top:5px;">BOOK THE TICKETS HERE</h2>	
</div>




<form action="book1.php" method="post"  name="contactForm" target="iframe1" onSubmit = "return validate()">
        <table id="ttres" align  = "center" cellpadding = "3" cellspacing = "3">
        
        
        <input type='hidden' name='transfer' id='tra' value='skybus' />
        <tr><td colspan="2" align="center" style="color: white;"><b>PLEASE FILL YOUR DETAIL HERE !!!</b></td></tr>
        <tr>
	        <td align=right style="color:white"><label for="name">Departure City:</label></td>
            <td align=left><?php
						if(isset($_POST['depcity']))
						{
							
									echo "<input type='text' name='depcity' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=". $_POST['depcity'] ." readonly />";
								
						}
					?></td>
			</tr><tr>
	        <td align=right style="color:white"><label for="name">Destination City:</label></td>
            <td align=left><?php
						if(isset($_POST['descity']))
						{
							
									echo "<input type='text' name='descity' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=". $_POST['descity'] ." readonly />";
								
						}
					?></td>
			</tr><tr>
	        <td align=right style="color:white"><label for="name">Departure Date:</label></td>
            <td align=left><?php
						if(isset($_POST['doj']))
						{
							
									echo "<input type='text' name='date' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=". $_POST['doj'] ." readonly />";
								
						}
					?></td>
			</tr>
			<tr>
	        <td align=right style="color:white"><label for="name">Bus SNo.:</label></td>
            <td align=left><?php
								include('conection/connect.php');
								$depcity=$_POST['depcity'];
								$descity=$_POST['descity'];
								
								$user_query=mysql_query("select *  from route where depcity = '" . $depcity . "' and descity = '" . $descity . "'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								
								 {
							?>
							
								 <?php echo "<input type='text' name='busid' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=".$row['busid']." readonly />";?>
								
							
<?php } ?></td></tr>
			
			
			
			<tr>
	        <td align=right style="color:white"><label for="name">Seat No.:</label></td>
            <td align=left><?php 
						for($i=1; $i<61; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input type='text' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' class='span3' name=ch".$i." value=".$i." readonly/><br>";
							}
							
						}
					?></td>
			</tr><tr>
	        <td align=right style="color:white"><label for="name">Fare:</label></td>
            <td align=left><?php
								include('conection/connect.php');
								$depcity=$_POST['depcity'];
								$descity=$_POST['descity'];
								$user_query=mysql_query("select *  from route where depcity = '" . $depcity . "' and descity = '" . $descity . "'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								 {
								 	
							?>
							
								 <?php echo "<input type='text' name='fare' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=".$row['fare']." readonly />";?>
								
							
<?php } ?></td></tr>


<tr>
	        <td align=right style="color:white"><label for="name">Total:</label></td>
            <td align=left><?php
								include('conection/connect.php');
								$depcity=$_POST['depcity'];
								$descity=$_POST['descity'];
								$user_query=mysql_query("select *  from route where depcity = '" . $depcity . "' and descity = '" . $descity . "'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								 {
								 	
							?>
							
								 <?php echo "<input type='text' name='total' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=".$row['fare']* 2 ." readonly />";?>
								
							
<?php } ?></td></tr>
            <tr>
	        <td align=right style="color:white"><label for="name">First Name:</label></td>
            <td align=left><input type="text" name="fname" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your first name" pattern="[A-z ]{3,}" title="Please enter a valid name." required /></td>
			</tr>
			
			<tr>
			<td align=right style="color:white"><label for="name">Last Name:</label></td>
            <td align=left><input type="text" name="lname" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your last name" pattern="[A-z ]{3,}" title="Please enter a valid name." required /></td>
			</tr>
		    <tr>
	        <td align=right style="color:white"><label for="name">PhoneNo:</label></td>
            <td align=left><input type="text"  style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="10 digits only" pattern="[0-9]{10,}" title="Please enter 10 digit no." maxlength="10"  required name="telephone" /></td>
			</tr>



            <tr>
	        <td align=right style="color:white"><label>Age:</label></td>
            <td align=left><input type="text" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type Your Age" pattern="[0-9]{2,}" title="Please enter your age." maxlength="3" required name="age"/></td></tr>
            
            <tr>
	        <td align=right style="color:white"><label for="name">Account No.:</label></td>
            <td align=left><input type="password" name="account" id="txt_acc" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your Account No."  title="Please enter a valid account no.." required /></td>
			</tr>
			<tr>
	        <td align=right style="color:white"><label for="name">Pin No.:</label></td>
            <td align=left><input type="password" name="secu" id="txt_sec" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your Pin No."  title="Please enter a valid pin no.." required /></td>
			</tr>
			
            
            
			
			
	
		    
    



			
            <tr><td></td>
			<td ><button id="button1" class="submit" type="submit" name="submit"><b>Reserve</b></button>&nbsp;&nbsp;&nbsp;
			    <button id="button1" class="submit" type="reset"><b>Cancel</b></button>
                       </td>
			</tr>
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
</body>
</html>
