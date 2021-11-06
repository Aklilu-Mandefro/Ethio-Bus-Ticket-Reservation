<?php
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ethio bus transport system</title>
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
<td width="300px">









<div id="content-input">
<div id="center">
<div id="welcome" align="center">
<h2 align="center" style="padding-top:5px;">VIEW ROUTE</h2>	
</div>

<br><br>
<form method="post">

    <table border="1" width="700px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
          <th>No</th>
			<th>Route ID</th>
            <th>Departure City</th>
            <th>Destination City</th>            
            <th>Bus ID</th>
			<!--th>sideno</th-->            
            <!--th>nofseat</th-->
            <th>Fare</th>
     
      
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM route WHERE depcity  like '%$key%' or descity like '%$key%'");
	else
		 $sql_sel=mysql_query("SELECT * FROM route");
	
		
       
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
        <td><?php echo $i;?></td>
			<td><?php echo $row['route_id'];?></td>
            <td><?php echo $row['depcity'];?></td>
            <td><?php echo $row['descity'];?></td>
            <td><?php echo $row['busid'];?></td>
			<!--td><?php echo $row['sideno'];?></td-->
            <!--td><?php echo $row['nofseat'];?></td-->
            <td><?php echo $row['fare'];?></td>
 
            
             
        </tr>
    <?php	
    }
	// ----- for search route------	
		
	
    ?>
    </table>
</form>
</div>
</td>
<td width="290px">


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
</div>
</body>
</html>