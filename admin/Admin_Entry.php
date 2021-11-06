<?php
error_reporting(0);
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];


//--------------Add data-----------------	
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$country=$_POST['un'];
	$address=$_POST['pass'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];


$sql_ins=mysql_query("INSERT INTO admin
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$country',
							'$address',
							'$phone',
							'$mail'
						
							)
					");
if($sql_ins==true)
	echo "<fz>Admin Added successfully</fz>";
else
	$msg="<ft>Not inserted try again</ft>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$country=$_POST['un'];
	$address=$_POST['pass'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	
	
	$sql_update=mysql_query("UPDATE admin SET 
								fname='$f_name',
								lname='$l_name' ,
								sex='$gender',
								username='$country',
								password='$address',
								phone='$phone',
								email='$mail'
						
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_admin");
	else
		echo "<ft>Update Failed</ft>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />

<title>Ethio Bus Online Ticket Booking System</title>
</head>
<body>

<style>
ft{
	color: red;
}
fz{
	color: green;
}
</style>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM admin WHERE u_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        Administrators Update </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_admin"><input type="button" name="btn_view" title="View Admin" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 
<div id="style_informations">
	<form method="post" >
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td>First Name:</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['fname'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox" value="<?php echo $rs_upd['lname'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Gender:</td>
                <td>
                	<input type="radio" name="gender" value="Male" <?php if($rs_upd['sex']=="Male") echo "checked";?> />Male
                    <input type="radio" name="gender" value="Female" <?php if($rs_upd['sex']=="Female") echo "checked";?>/>Female
                </td>
            </tr>
         <tr>
            	<td>User Name:</td>
                <td>
                	<input type="text" name="un" id="textbox" value="<?php echo $rs_upd['username'];?> "/>
                
                </td>
            </tr>
          <tr>
            	<td>password:</td>
                <td>
                	<input type="password" name="pass" id="textbox" value="<?php echo $rs_upd['password'];?> "/>
                
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in"  />
                </td>
            </tr>
		</table>
   </div>
 
	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Phone:</td>
            	<td>
                	<input type="text" name="phonetxt" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>E-mail:</td>
                <td>
                	<input type="text" name="emailtxt"  id="textbox" value="<?php echo $rs_upd['email'];?> "/>
                </td>
            </tr>
            
    	</table>
  </div>
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">
        Administrators Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_admin"><input type="button" name="btn_view" title="View Customer" value="View Administrators" id="button_view" style="width:165px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" >
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td>First Name:</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Gender:</td>
                <td>
                	<input type="radio" name="gender" value="Male" checked="checked" />Male
                    <input type="radio" name="gender" value="Female"/>Female
                </td>
            </tr>
            
            
            
 
    	    <tr>
	      <td>User Name:</td>
	      <td><input type="text" name="un" id="textbox" required="required"/></td>
        </tr>
            	  	    <tr>
	      <td>Password:</td>
	      <td><input type="password" name="pass" id="textbox" required="required"/></td>
        </tr>
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Register" id="button-in"  />
                </td>
            </tr>
	  </table>
    </div>
 
	<div>
	  <table border="0" cellpadding="4" cellspacing="0">
	    <tr>
	      <td>Phone:</td>
	      <td><input type="text" name="phonetxt" id="textbox" maxlength=10 required="required"/></td>
        </tr>
	    <tr>
	      <td>E-mail:</td>
	      <td><input type="text" name="emailtxt"  id="textbox" required="required"/></td>
        </tr>
 
      </table>
      
	</div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>