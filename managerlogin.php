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



<div id="adlog">
<div id="welcome">
<h4 align="center" style="padding-top:5px;">MANAGER LOGIN FORM</h4>	
</div>


<form action="loginmanager.php" method="post" name="login_form" class="contact_form" onSubmit="return (go());">
	    <table id="ttp" align="center" border="0"cellpadding = "5" cellspacing = "10">
	    
             <tr><td colspan="2">  <img height="45" width="67px" src="image/LoginRed.jpg"/>  </td>   </tr>    
	        <tr><td align="center" style="color:white"><label for="username"><b>User Name:</b></label></td>
			<td><input type="text" name="username" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
			
            <tr><td align="center" style="color:white"><label for="Password"><b>Password:</b></label>
			<td><input  type="password" name="password" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
            
                         <tr>
                         <td></td>
			<td align="left"><button id="button12"  type="submit" name="login"><b>LogIn</b></button>&nbsp;&nbsp;&nbsp;
			    <button id="button12"  class="submit" type="reset"><b>Cancel</b></button><br /></td>
                <td><center><a class="btn btn-success" href="forgett.php"><font color="white">Forget Your Password?</font></a></td></center></tr>             
			<script language="javascript">
 	function go(){
 //var username=document.getElementById("input01");
 var username=document.getElementById("username");
 //var lname=document.getElementById("lname");
 //var email=document.getElementById("email");
 //var type=document.getElementById("type");
 var password=document.getElementById("password");
 var mail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 var numbe = /^[0-9a-zA-Z]+$/;  
 var number = /^[0-9]+$/; 
 var str = /^[A-Za-z]+$/; 
 //var emal="<?php echo $row['email']; ?>";
   if(username.value.match(str))  
          {  
            
           }  
          else  
          {  
          alert('UserName Name must not be empty and allows characters only');  
          username.focus();  
          return false;  
          }
		  if(password.value.length >5)  
          {  
          
		  }
	      else  
          {
alert('Password must not less than six characters');  
          password.focus();  
          return false;  
           

	}}
         </script>
		
			</tr>
            
                      <tr ><td></td></tr>
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
