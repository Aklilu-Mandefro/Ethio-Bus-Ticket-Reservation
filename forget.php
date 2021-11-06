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
<h3 align="center" style="padding-top:5px;">CLERK RESET FORM</h3>	
</div>
<?php
 session_start();
include('conection/connect.php');
 if(isset($_POST['forget']))
  {
  
   $email=$_POST['eml'];
    $username=$_POST['username'];
   $sql="SELECT * FROM  clerkacc where  email='$email' AND username='$username' ;"; 
   $result_set=mysql_query($sql);
   if(!$result_set)
   {
   die("Query faill".mysql_error());
   }
if(mysql_num_rows($result_set)>0)
{

//$num=mysql_num_rows($result_set);
while($row=mysql_fetch_array($result_set))
{
$manager_id=$row[0];
$username=$row[1];
$password=$row[8];
echo"<font color='red'>"."Hi"."&nbsp; &nbsp;".$username."&nbsp; &nbsp;"."your password is:".$password."</font>";
echo'<meta content="3;clerklogin.php" http-equiv="refresh" />';
}}
else
{
echo"<p class='wrong'>&nbsp;&nbsp;Incorrect Input</p>";
echo'<meta content="10;forget.php" http-equiv="refresh" />';
}
}

?>

<form id="form1" name="forget" method="POST" action="forget.php" onsubmit="return validateForm()">
	    <table id="ttp" align="center" border="0"cellpadding = "5" cellspacing = "10">
	    
             <tr><td colspan="2">  <img height="67" width="100px" src="image/admin.png"/>  </td>   </tr>    
	        <tr><td align="center" style="color:white"><label for="username"><b>Email Name:</b></label></td>
			<td><input type="text" name="eml" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
  
	        <tr><td align="center" style="color:white"><label for="username"><b>User Name:</b></label></td>
			<td><input type="text" name="username" style="height:30px; border-radius: 5px; color: blue; font-size: 15px;" placeholder="" required /></td></tr>
			
            
                         <tr>
                         <td></td>
			<td align="left"><button id="button12"  type="submit" name="forget"><b>Reset</b></button>&nbsp;&nbsp;&nbsp;
			    <button id="button12"  class="submit" type="reset"><b>Cancel</b></button><br /></td>
                       
			</tr>
            <td colspan="2">
                	<a href="clerklogin.php?Ha_User="><font color='white'>Back to Login?</a>
                </td>
                      
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
