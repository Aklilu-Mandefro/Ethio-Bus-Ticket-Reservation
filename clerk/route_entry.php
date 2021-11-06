<?php
error_reporting(0);
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];


//--------------Add data-----------------

function formatDate($val)
   {
        $arr = explode('-', $val);
        return date('d M Y', mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
    }
	
if(isset($_POST['btn_sub'])){
	$dep_city=$_POST['depcity'];
	$des_city=$_POST['descity'];
	$bus_id=$_POST['busid'];
	$fare=$_POST['fare'];
		

$sql_ins=mysql_query("INSERT INTO route 
						VALUES(
							NULL,
							'$dep_city',
							'$des_city' ,
							'$bus_id',
							'$fare',
							NOW()
							)
					");
if($sql_ins==true)
	echo "<fz>Route Added successfully</fz>";
else
	$msg="<ft>Not inserted try again</ft>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$dep_city=$_POST['depcity'];
	$des_city=$_POST['descity'];
	$bus_id=$_POST['busid'];
	$fare=$_POST['fare'];
	
	$sql_update=mysql_query("UPDATE route SET 
								dep_city='$dep_city',
								des_city='$des_city' ,
								bus_id='$bus_id',
								fare='$fare',
								
							WHERE
								route_id=$id
							");
	if($sql_update==true)
		echo "<fz>Route has been Updated Successfully</fz>";
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
	$sql_upd=mysql_query("SELECT * FROM route WHERE route_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
       <b> Route Update Form</b></div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_route"><input type="button" name="btn_view" title="View Route" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 
<div id="style_informations">
	<form method="post" >
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td>Departure City:</td>
            	<td>
                	<input type="text" name="depcity" id="textbox" value="<?php echo $rs_upd['depcity'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Destination City:</td>
            	<td>
                	<input type="text" name="descity" id="textbox" value="<?php echo $rs_upd['descity'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Bus ID:</td>
                <td>
                	<input type="text" name="busid" id="textbox" value="<?php echo $rs_upd['busid'];?>"/>
                </td>
            </tr>
        
            <tr>
            	<td>Fare:</td>
            	<td>
                	<input type="text" name="fare" id="textbox" value="<?php echo $rs_upd['fare'];?>"/>
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
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">
       <b> Route Entry Form </b>
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_route"><input type="button" name="btn_view" title="View Route" value="View_Route" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" >
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td style="color: green;"><b>Departure City:</b></td>
            	<td>
                	<select  name="depcity" style="color:blue;width: 200px;height:35px; border: 3px double #09bbf7; padding:0px 0px;" required>
			
            <option value="">Select Departure City</option>			
            <option value="Addis Ababa">Addis Ababa</option>
	    <option value="Bahir-Dar">Bahir-Dar</option>
	    <option value="Dessie">Dessie</option>			
            <option value="Diredawa">Diredawa</option>
            <option value="Gondor">Gondor</option>
            <option value="Harar">Harar</option>			
            <option value="Hawassa">Hawassa</option>			
            <option value="Jimma">Jimma</option>
            <option value="Mekelle">Mekelle</option>

            </select>
                </td>
            </tr>
            
            <tr>
            	<td style="color: green;"><b>Destination City:</b></td>
            	<td>
                	<select  name="descity" style="color:blue;width: 200px;height:35px; border: 3px double #09bbf7; padding:0px 0px;" required>
			
            <option value="">Select Destination City</option>			
            <option value="Addis Ababa">Addis Ababa</option>
	    <option value="Bahir-Dar">Bahir-Dar</option>
	    <option value="Dessie">Dessie</option>			
            <option value="Diredawa">Diredawa</option>
            <option value="Gondor">Gondor</option>
            <option value="Harar">Harar</option>			
            <option value="Hawassa">Hawassa</option>			
            <option value="Jimma">Jimma</option>
            <option value="Mekelle">Mekelle</option>

            </select>
                </td>
            </tr>
            
          
            
            
            
         
            <tr>
            	<td style="color: green;"><b>Bus ID:</b></td>
            	<td>
                	<input type="text" name="busid" style="color:blue;width: 200px;height:35px; border: 3px double #09bbf7; padding:0px 0px;"  id="textbox" required="required"/>
    			</td>
        	</tr>
        	
        	<tr>
            	<td style="color: green;"><b>Fare:</b></td>
            	<td>
                	<input type="text" name="fare" style="color:blue;width: 200px;height:35px; border: 3px double #09bbf7; padding:0px 0px;"  id="textbox" required="required"/>
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
 
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>