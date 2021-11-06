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
a:hover{
color:white;

text-decoration:none;
}

a:link{
color:#25ba29;
text-decoration:none;
}
</style>

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



<div id="adlog">
<div id="welcome">
<h3 align="center" style="padding-top:5px;">Forget Password Form</h3>	
</div>

<?php
include("include/see1.php");
	require("conection/connect.php");
session_start();
$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');
?>
<div class="modal-header">
		
    </div>
<div class="navbar-inner">


						<?php
  	
if (isset($_POST['change_password'])) 
  	{
		$username = $_POST['username'];	
		$firstname = $_POST['email'];
		$priv_password = $_POST['priv_password'];	
		$new_password = $_POST['new_password'];
		
	$resulsasst = mysql_query("SELECT * FROM manageracc WHERE username = '$username'  and email='$firstname' and   password='$priv_password' ");
	$counssst=mysql_num_rows($resulsasst);
		if($counssst == 0){
		echo '<div class="alert alert-dismissable alert-error"><strong>';
			echo "Opration Faild Please Insert Your Information Correctly ! ";
			echo '</strong></div>';
		} else{
		
		$passw=$_POST['new_password'];
	if(strlen($passw) <=2 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Grater Than Or Equal To 3 Characters !".'</strong>');
		echo '</div>';
	} 
	if (substr($new_password,0,5) == substr($username,0,5)){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Password Must Have A Big Defferent From Your Your Username, Try Other Password !");
		echo '</strong></div>';
	}
		
		if($new_password == $username){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Pasword Must Not Be The Same With Your Username,Try Other Password");
		echo '</strong></div>';
	}
		
		$chack = mysql_query("UPDATE manageracc SET password='$new_password' WHERE username = '$username' and email='$firstname'   ");
		echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo '<font color="red" size="3">'."Successfully Changed!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$new_password."&nbsp;".'</font>'."&nbsp;&nbsp;Is your new password".'<br>'.'</font>';
		
		echo "".'<a href="managerlogin.php?selam_User=">'."Login Here".'</a>';
		echo '</strong></div>';
		}
		
			
	}
		?>
		

			<?php
  	
if (isset($_POST['forget'])) 
  	{	
	
		$username = $_POST['username'];	
		$firstname = $_POST['email'];

	$result = mysql_query("SELECT * FROM manageracc WHERE username = '$username' and email='$firstname' ");
	$count=mysql_num_rows($result);
	if($count == 0){
echo '<div class="alert alert-dismissable alert-error"><strong>';	
echo '<font color="red" size="3">'."Username:&nbsp;Not Found".'</font>';
	echo '</strong></div>';
	}
	else {
	while($row=mysql_fetch_array($result))
	{
echo '<div class="alert alert-dismissable alert-success"><strong>';
echo '<font color="red" size="3">'."Successfully Found!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$row["password"]."&nbsp;".'</font>'."&nbsp;&nbsp;Is your password".'<br>'.'</font>';				
echo'<meta content="3;managerlogin.php" http-equiv="refresh" />';
echo '</strong></div>';	
	}
	
	?>
	<!--table border="0" cellpadding="15" cellspacing="0">
	<form method="POST" action="">
	<tr><td>User Name</td><td><input type="text" title="Enter Your user Name" name="username" id="kl" placeholder="User name" required></td></tr>
	<tr><td>Email</td><td><input type="text" title="Enter Your email" name="email" id="kl" placeholder="email" required></td></tr>

	<tr><td>Previous Password</td><td><input type="password" title="Enter Your Password" name="priv_password" id="kl" placeholder="Previous password" required></td></tr>
	<tr><td>New Password</td><td><input type="password" title="Enter Your Password" name="new_password" id="kl" placeholder="New password" required></td></tr>
	<tr><td></td><td><input type="submit" name="change_password"  value="Chang Password"  class="btn" id="kl"  ></td></tr>
	</form>
	</table-->
	
	
	
	<?php
	
	}
	

	}			

?>

		

<!--form method="POST" action="" ><center-->
<form id="form1" name="forgett" method="POST" action="forgett.php" onsubmit="return validateForm()">
				 <table id="ttp" align="center" border="0"cellpadding = "5" cellspacing = "10">
	    <tr><td colspan="2">  <img height="67" width="100px" src="image/admin.png"/>  </td>   </tr>    
				
			 <tr><td align="center" style="color:white"><label for="username"><b>Email Name:</b></label></td>
			<td><input type="text" name="email" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
  
	        <tr><td align="center" style="color:white"><label for="username"><b>User Name:</b></label></td>
			<td><input type="text" name="username" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
			
            
                         <tr>
                         <td></td>
			<td align="left"><button id="button12"  type="submit" name="forget"><b>Reset</b></button>&nbsp;&nbsp;&nbsp;
			    <button id="button12"  class="submit" type="reset"><b>Cancel</b></button><br /></td>
                       
			</tr>
				   <!--tr>
				   <td></td>
            <td colspan="2">
                	<input type="submit" name="search"  value="Search" class="btn" id="kl">
                </td>
            </tr-->
				   <tr>
				   <td></td>
            <td colspan="2">
                	<a href="managerlogin.php?Ha_User="><font color='white'>Back to Login?</a>
                </td>
            </tr>
			</table>
		</form>

	</center>		


</div>	

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
