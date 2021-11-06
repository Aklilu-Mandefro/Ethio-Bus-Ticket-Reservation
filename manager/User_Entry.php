<?php
error_reporting(0);
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
	
	
	
function formatDate($val)
   {
        $arr = explode('-', $val);
        return date('d M Y', mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
    }	
	
if(isset($_POST['btn_sub'])){
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO admin 
						VALUES(
							NULL,
							'$username',
							'$pwd' ,
							'$type',
							'$note',
							NOW()
							)
					");
if($sql_ins==true)
		echo "<fz>User Added successfully</fz>";
else
	$msg="<ft>Not inserted try again</ft>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE admin SET 
								username='$username' ,
								password='$pwd' , 
								type='$note' ,
								note='$note'
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		echo "<fz>User has been Updated Successfully</fz>";
	else
		$msg="Update Fail".mysql_error();
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
	font-size: 20px;
}
fz{
	color: green;
	font-size: 20px;
}
</style>
<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM admin WHERE u_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
	<div id="top_style">
        <div id="top_style_text">
        Admins Entry Form
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_user"><input type="button" name="btn_view" value="Back"  title="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td style="color: green"><b>User name:</b></td>
            	<td>
                	<input type="text" style="color: blue" name="usertxt" id="textbox" value="<?php echo $rs_upd['username'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Password:</b></td>
            	<td>
                	<input type="password" style="color: blue" name="pwdtxt" id="textbox" value="<?php  echo $rs_upd['password'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Type:</b></td>
            	<td>
                	<input type="text" style="color: blue" name="typetxt" id="textbox"  value="<?php echo $rs_upd['type'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Note:</b></td>
                <td>
                	<textarea  style="color: blue" name="notetxt" cols="23" rows="5"><?php echo $rs_upd['note'];?></textarea>
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
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
	<div id="top_style">
        <div id="top_style_text">
       <b> Admins Entry Form</b>
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_user"><input type="button" name="btn_view" title="View Users" value="View_Users" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td style="color: green"><b>User Name:</b> </td>
            	<td>
                	<input style="color: #00F;" type="text" name="usertxt" pattern="[A-z0-9./,\@#; ]{5,}" title="User name minimum 5 character" id="textbox" required="required" />
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Password:</b></td>
            	<td>
                	<input style="color: #00F;" type="password" name="pwdtxt" pattern="[A-z0-9./,\@#; ]{5,}" title="Password minimum 5 character" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Type:</b></td>
            	<td>
                	<input style="color: #00F;" type="text" name="typetxt" pattern="[A-z0-9./,\@#; ]{5,}" title="please enter user type" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td style="color: green"><b>Note:</b></td>
                <td>
                	<textarea style="color: #00F;" name="notetxt" cols="23" rows="5" pattern="[A-z0-9./,\@#; ]{5,}" title="Type note" required="required"></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
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