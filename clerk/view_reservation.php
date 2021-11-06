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
	$del_sql=mysql_query("DELETE FROM reservation WHERE id=$id");
	if($del_sql)
		echo "<h3 style='color:#e01f3c'>Reservation has been Deleted... !</h3>";
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




<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="210px" style="font-size:18px; color:#006; text-indent:30px;"><b>View Reservations</b></td>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter status for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search reservation" />
        </td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post">

    <table border="1" width="1050px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th>No</th>
			<th>R_ID</th>
            <th>F_Name</th>
            <th>L_Name</th>
            <th>Phone No.</th>
            <th>Age</th>            
            <th>Depcity</th>
            <th>Descity</th>
            <th>Date</th>
            <th>Fare</th>
            <th>Transaction_No</th>
            <th>Bus SNo.</th>
            <th>Status</th>
            <th colspan="2">Operation</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM reservation WHERE status  like '%$key%'");
	else
		 $sql_sel=mysql_query("SELECT * FROM reservation");
	
		
       
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
			<td><?php echo $row['id'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['telephone'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['depcity'];?></td>
            <td><?php echo $row['descity'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['fare'];?></td>
            <td><?php echo $row['transaction_no'];?></td>
            <td><?php echo $row['busid'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a rel="facebox" href=editstatus.php?rs_id=<?php echo $row['id'];?>" title="Update"><img src="picture/update.png" /></a></td>
            <td><a href="?tag=view_reservation&opr=del&rs_id=<?php echo $row['id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
             
        </tr>
    <?php	
    }
	
		
	
    ?>
    </table>
</form>
</div>
</body>
</html>