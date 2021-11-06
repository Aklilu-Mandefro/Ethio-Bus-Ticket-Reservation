<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];	
if(isset($_POST['btn_sub'])){
	$stu_id=$_POST['cust'];
	$pack=$_POST['packtxt'];
	$plength=$_POST['legtxt'];
	$pwidth=$_POST['widtxt'];
    $pheight=$_POST['hetxt'];
	$section=$_POST['sectxt'];
	$detail=$_POST['detxt'];	
	
$sql_ins=mysql_query("INSERT INTO package_tbl 
						VALUES(
							NULL,
							'$stu_id',
							'$pack' ,
							'$plength',
							'$pwidth',
						    '$pheight' ,
							'$section',
							'$detail'
							)
					");
if($sql_ins==true)
	echo "<fz>Package stored successfully</fz>";
else
	echo "<ft>Invalid Customer ID</ft>";
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['cust'];
	$pack=$_POST['packtxt'];
	$plength=$_POST['legtxt'];
	$pwidth=$_POST['widtxt'];
    $pheight=$_POST['hetxt'];
	$psection=$_POST['sectxt'];
	$detail=$_POST['detxt'];
	
	$sql_update=mysql_query("UPDATE package_tbl SET 
								stu_id='$stu_id' ,
								pack='$pack' , 
							    plength='$plength' , 
								pwidth='$pwidth' , 
								pheight='$pheight' , 
								psection='$psection' , 
								detail='$detail' , 
							
							WHERE
								package_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_package");
	else
		echo "<ft>Update Failed</ft>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ethio Bus Transportation</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
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
	$sql_upd=mysql_query("SELECT * FROM package_tbl WHERE package_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
	<div id="top_style">
        <div id="top_style_text">
        Package Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_package"><input type="button" name="btn_view" value="Back"  title="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td>Customer ID</td>
            	<td>
                	<input type="text" name="cust" id="textbox" value="<?php echo $rs_upd['stu_id'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Package Number</td>
            	<td>
                	<input type="text" name="packtxt" id="textbox" value="<?php echo $rs_upd['pack'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Package Length</td>
            	<td>
                	<input type="text" name="legtxt" id="textbox" value="<?php echo $rs_upd['plength'];?>" />
                </td>
            </tr>
			<tr>
            	<td>Package Width</td>
            	<td>
                	<input type="text" name="widtxt" id="textbox" value="<?php echo $rs_upd['pwidth'];?>" />
                </td>
            </tr>
			<tr>
            	<td>Package Height</td>
            	<td>
                	<input type="text" name="hetxt" id="textbox" value="<?php echo $rs_upd['pheight'];?>" />
                </td>
            </tr>
            
			<tr>
            	<td>WH-Section</td>
            	<td>
                	<input type="text" name="sectxt" id="textbox" value="<?php echo $rs_upd['psection'];?>" />
                </td>
            </tr>
			
            <tr>
            	<td>Details</td>
                <td>
                	<textarea name="detxt" cols="23" rows="5"><?php echo $rs_upd['detail'];?> </textarea>
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
        Package Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_package"><input type="button" name="btn_view" value="View_Package"  title="View Package" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td>Customer ID</td>
            	<td>
                	<input type="text" name="cust" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Package Number</td>
            	<td>
                	<input type="text" name="packtxt" id="textbox" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td>Package Length</td>
            	<td>
                	<input type="text" name="legtxt" id="textbox" required="required"/>
                </td>
            </tr>
			<tr>
            	<td>Package Width</td>
            	<td>
                	<input type="text" name="widtxt" id="textbox" required="required"/>
                </td>
            </tr>
			<tr>
            	<td>Package Height</td>
            	<td>
                	<input type="text" name="hetxt" id="textbox" required="required"/>
                </td>
            </tr>
            
			<tr>
            	<td>WH-Section</td>
            	<td>
                	<input type="text" name="sectxt" id="textbox" required="required"/>
                </td>
            </tr>
			
            <tr>
            	<td>Details</td>
                <td>
                	<textarea name="detxt" cols="23" rows="5" required="required"></textarea>
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