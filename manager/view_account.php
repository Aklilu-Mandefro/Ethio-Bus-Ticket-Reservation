<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM route WHERE route_id=$id");
	if($del_sql)
		echo "<h3 style='color:#e01f3c'>Route has been Deleted... !</h3>";
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ethio bus transport system</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<!--table width="755">
	<tr>
    	<td  width="190px" style="font-size:18px; color:#006; text-indent:30px;"><b>View Routes</b></td>
        <td>
        	<a href="?tag=route_entry"><input type="button" title="Add new route" name="butAdd" value="Add New" id="button-search" /></a>
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter departure_city for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search route" />
        </td>
    </tr>
</table-->
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post">

    <table border="1" width="1050px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
           
			<th>companyaccount</th>
        </tr>
        
        <?php
	

$connection = mysql_connect("localhost","root","");

if (!$connection)

{

die ("Could not connect to the database: <br />". mysql_error());

}

mysql_select_db('cbe');
	$sql_sel=mysql_query("SELECT * FROM bank where accountnumber='10000665690' AND security='ethiobus'");
	
		
       

    while($row=mysql_fetch_array($sql_sel)){
  
   
    ?>
      <tr bgcolor="<?php echo $color?>">
   
			<td><?php echo $row['amountbirr'];?></td>
            
             
        </tr>
    <?php	
    }
	// ----- for search route------	
		
	
    ?>
    </table>
</form>
</div>
</body>
</html>