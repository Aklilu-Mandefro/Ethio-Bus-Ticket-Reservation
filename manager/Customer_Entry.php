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
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$officename=$_POST['officename'];
	$address=$_POST['addr'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];	

$sql_ins=mysql_query("INSERT INTO clerk 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$officename',
							'$address',
							'$phone',
							'$username',
							'$password'
							)
					");
if($sql_ins==true)
	echo "<fz>Clerk Added successfully</fz>";
else
	$msg="<ft>Not inserted, try again!</ft>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$officename=$_POST['officename'];
	$address=$_POST['addr'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];	
	
	$sql_update=mysql_query("UPDATE clerk SET 
								f_name='$f_name',
								l_name='$l_name' ,
								officename='$gender',
								address='$address',
								phone='$phone',
								username='$username',
								password='$password'
							WHERE
								clerk_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_customer");
	else
		echo "<ft>Update Failed</ft>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />

<title>Ethio bus transport system</title>
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
	$sql_upd=mysql_query("SELECT * FROM clerk WHERE clerk_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        Clerk Update </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_customer"><input type="button" name="btn_view" title="View Clerk" value="Back" id="button_view" style="width:70px;"  /></a>
             
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
                	<input type="text" name="fname" id="textbox" value="<?php echo $rs_upd['f_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lname" id="textbox" value="<?php echo $rs_upd['l_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Office Name:</td>
                <td>
                	<input type="text" name="officename" id="textbox" value="<?php echo $rs_upd['officename'];?>"/>
                </td>
            </tr>
        
            <tr>
            	<td>Address:</td>
            	<td>
                	<textarea name="addr" cols="22" rows="3"> <?php echo $rs_upd['address'];?></textarea>
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
                	<input type="text" name="phone" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>User Name:</td>
                <td>
                	<input type="text" name="username"  id="textbox" value="<?php echo $rs_upd['username'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>Password:</td>
                <td>
                	<input type="text" name="password" id="textbox" value="<?php echo $rs_upd['password'];?> "/>
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
        Clerk Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_customer"><input type="button" name="btn_view" title="View Clerk" value="View_Clerk" id="button_view" style="width:120px;"  /></a>
             
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
                	<input type="text" name="fname" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lname" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Office Name:</td>
                <td>
                	<input type="text" name="officename" id="textbox" required="required"/>
                </td>
            </tr>
       
            <tr>
            	<td>Address:</td>
            	<td>
                	<textarea name="addr" cols="22" rows="3" required="required"></textarea>
    			</td>
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
	      <td><input type="text" name="phone" id="textbox" required="required"/></td>
        </tr>
	    <tr>
	      <td>User Name:</td>
	      <td><input type="text" name="username"  id="textbox" required="required"/></td>
        </tr>
	    <tr>
	      <td>Password:</td>
	     <td><input type="text" name="password"  id="textbox" required="required"/></td>
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