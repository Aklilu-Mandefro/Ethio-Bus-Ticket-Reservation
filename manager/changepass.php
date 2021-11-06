<?php


$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');
?>
<div class="modal-header">
		<center><font  class="" id="inde_admin_signup">Change Password</font></center>
    </div>
<div class="navbar-inner">


						<?php
  	
if (isset($_POST['change_password'])) 
  	{	
	
		$username = $_POST['username'];	
		$priv_password = $_POST['priv_password'];	
		$new_password = $_POST['new_password'];
		$compsswd = $_POST['compsswd'];
		
	$resulsasst = mysql_query("SELECT * FROM manageracc WHERE username = '$username'  and   password='$priv_password' ");
	$counssst=mysql_num_rows($resulsasst);
		if($counssst == 0){
		echo '<div class="alert alert-dismissable alert-error"><strong>';
			echo "Opration Faild, Please Insert Your Information Correctly ! ";
			echo '</strong></div>';
		} else{
		
		$passw=$_POST['new_password'];
	if(strlen($passw) >=10 ) {
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."Password Must Be Less Than Or Equal To 10 Characters !".'</strong>');
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
		
		$chack = mysql_query("UPDATE manageracc SET password='$new_password' WHERE username = '$username'    ");
		echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo '<font color="red" size="3">'."Your password has been successfully Changed!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$new_password."&nbsp;".'</font>'."&nbsp;&nbsp;Is your new password".'<br>'.'</font>';
		echo "".'<a href="managerlogin.php?selam_User="></a>';
		echo '</strong></div>';
		}
		
			
	}
		?>
		
<!--table border="0" cellpadding="10" cellspacing="0"-->
<table  id="ttp" align="center" border="0"cellpadding = "5" cellspacing = "10">
	    
             <tr><td colspan="2">  <img height="67" width="100px" src="picture/admin.png"/>  </td>   </tr>    
	<form method="POST" action="">
	<table style="border:1px solid #336699;border-radius:15px" width="350" height="200" align="center">
		<tr><td>User Name</td><td><input type="text" title="Enter Your user Name" name="username" id="kl" placeholder="User name" required></td></tr>
<tr><td>Previous Password</td><td><input type="password" title="Enter Your Password" name="priv_password" id="kl" placeholder="Previous password" required></td></tr>
	<tr><td>New Password</td><td><input type="password" title="Enter Your Password" name="new_password" id="kl" placeholder="New password" required></td></tr>
	<tr><td>Confirm Password</td><td><input type="password" title="Confirm Your Password" name="compsswd" id="kl" placeholder="Confirm password" required></td></tr>
	<tr><td></td><td><input type="submit" name="change_password"  value="Chang Password"  class="btn" id="kl"  ></td></tr>
	
	</table></form>
	</table>