<?php
	include("Include/db_con.php");	
	
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
<script src="js/comment.js" type="text/javascript"></script>
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
<h2 align="center" style="padding-top:5px;">COMMENT FORM</h2>	
</div>






<form onsubmit='return formValidator()' action="" method="post" target="iframe1"  name="contact_form" target="iframe1">

        <table id="ttcomment" align  ="center" cellpadding = "5" cellspacing = "5">
        <tr><td colspan="2">
        	<?php
	include("commentphp.php");	
	
?>
        </td></tr>
        <tr><td colspan="2" style="color: white" align="center">
        	<b>You Can Give Your Comment Here !!!</b>
        </td></tr>
             <tr>
	        <td align=right style="color:white"><label for="name">Name:</label></td>
            <td align=left><input style="width: 190px;height:35; color: blue; font-size: 15px; border-radius: 5px;" type="text" placeholder="Type Your Name"  id='name' pattern="[A-z ]{3,}" title="Please enter a valid name." required name="name"/></td>
			</tr>
              <tr>
	        <td align=right style="color:white"><label for="name">Email:</label></td>
            <td align=left><input style="width: 190px;height:35; color: blue;font-size: 15px; border-radius: 5px;" type="text" placeholder="sample@example.com" id="email" pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" title="Please enter a valid email id." required name="email"/></td>
			</tr>
		 <tr>
		       <td style="color:white" align="right" valign="top"><label>Your Comment:</label></td>
		       <td align="left" valign="bottom">
		       <textarea style="color: blue;border-radius: 5px;font-size: 15px;" cols="25" rows="5" required name="content" maxlength="50000" title="Please Type Your Comment" placeholder="Type Your Comment Here"></textarea>
			   </td>
		 </tr>
		 <tr>
		 <td></td>
		 <td><button id="button1" class="submit"name='submit' type="submit"><b>Send</b></button>&nbsp;&nbsp;&nbsp;
			<button  id="button1" class="submit" type="reset"><b>Cancel</b></button><br />
			
			</td>
			
		 </tr>
			
	</table>
</fieldset>	
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
