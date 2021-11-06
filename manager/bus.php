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
	$del_sql=mysql_query("DELETE FROM package_tbl WHERE package_id=$id");
	if($del_sql)
		echo "Record Deleted... !";
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>Ethio Bus Transportation</title>

<script type="text/javascript">

       function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=595,height=842,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>

</head>
<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">Search & Print </td>
		<td> <input type="button" value="Print" id="button-search" class="btn" onclick="PrintDoc()"/></td>
		<td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Package" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />
<div id="printarea">
<div id="content-input">
<h3 align="center">ETHIO BUS TRANSPORT SYSTEM SHARE COMPANY.</h3>
<p align="center"><strong>Contacts Gondar:</strong>+251921955135 +25195432344 +9251123456<br>
<br<strong><strong>Email:</strong>info@ethiobus.com</p>
<br<P align="center"><h2 align="center">BUS LISTS</h2></p>
	 <table border="1" width="800px" align="center" cellpadding="5" class="mytable" cellspacing="0" >
        <tr height="35px">
            <th>No</th>
			<th>ID</th>
            <th>Side No.</th>
            <th>No. Of Seats</th>
            <th>Date Added</th>
            
        </tr>
         <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM bus WHERE sideno  like '%$key%'");
	else
		 $sql_sel=mysql_query("SELECT * FROM bus");
	
		
       
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
			<td><?php echo $row['bus_id'];?></td>
            <td><?php echo $row['sideno'];?></td>
            <td><?php echo $row['nofseat'];?></td>
            <td><?php echo $row['date'];?></td>
            
            
        </tr>
    <?php	
    }
    ?>
    </table>

</div><!-- end of content-input -->
</div>
</body>
</html>