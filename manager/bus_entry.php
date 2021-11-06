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
	$sideno=$_POST['sideno'];
	$nofseat=$_POST['nofseat'];
	$route_id=$_POST['route_id'];	

$sql_ins=mysql_query("INSERT INTO bus 
						VALUES(
							NULL,
							'$sideno',
							'$nofseat',
	                        '$route_id',
							NOW()
							)
					");
if($sql_ins==true)
	echo "<fz>Bus Added successfully</fz>";
else
	$msg="<ft>Not inserted try again</ft>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$sideno=$_POST['sideno'];
	$nofseat=$_POST['nofseat'];
	$route_id=$_POST['route_id'];	
	
	$sql_update=mysql_query("UPDATE bus SET 
								sideno='$sideno',
								nofseat='$nofseat',
								route_id='$route_id'
							WHERE
								bus_id=$id
							");
	if($sql_update==true)
		echo "<fz>Bus has been Updated Successfully</fz>";
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
	$sql_upd=mysql_query("SELECT * FROM bus WHERE bus_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
       <b> Bus Update Form </b> </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_bus"><input type="button" name="btn_view" title="View Buses" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 
<div id="style_informations">
	<form method="post" >
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td>Side No:</td>
            	<td>
                	<input type="text" name="sideno" id="textbox" value="<?php echo $rs_upd['sideno'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>No OF Seats:</td>
            	<td>
                	<input type="text" name="nofseat" id="textbox" value="<?php echo $rs_upd['nofseat'];?>"/>
                </td>
            </tr>
            
            <tr>
			<td heigth="40"align="center" style="color: green;"><b>Route ID<span class="red"></b></span</td>
            	<td ><select id="sex" required="required" name="route_id" value="<?php echo $rs_upd['route_id'];?>">
				<option value ="" selected>select route_id</option>
				<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('ethiobus');
 $msql = mysql_query("SELECT * FROM route");
 while($m_row = mysql_fetch_array($msql))        
        echo("<option value = '" . $m_row['route_id'] . "'>" . $m_row['route_id'] . "</option>");
    ?>
            	</select><br></td>
                
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
       <b> Bus Entry Form</b>
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_bus"><input type="button" name="btn_view" title="View Buses" value="View_Buses" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" >
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td style="color: green;"><b>Side No:</b></td>
            	<td>
                	<input type="text" name="sideno" pattern="[0-9]{2,}" title="Please enter bus side No." maxlength="5" id="textbox" style="color: blue" required="required"/>
                </td>
            </tr>
            
            <tr>
            	<td style="color: green;"><b>No OF Seats:</b></td>
            	<td>
                	<input type="text" name="nofseat" pattern="[0-9]{2,}" title="Please enter No of Seats." maxlength=" 5" id="textbox" style="color: blue" required="required"/>
                </td>
            </tr>
            <tr>
			<td heigth="40"align="center" style="color: green;"><b>Route ID<span class="red"></b></span</td>
            	<td ><select id="sex" required="required" name="route_id">
				<option value ="" selected>please select...</option>
				<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('ethiobus');
 $msql = mysql_query("SELECT * FROM route");
 while($m_row = mysql_fetch_array($msql))        
        echo("<option value = '" . $m_row['route_id'] . "'>" . $m_row['route_id'] . "</option>");
    ?></option>
            	</select><br></td>
                
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