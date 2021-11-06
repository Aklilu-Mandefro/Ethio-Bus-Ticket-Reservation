
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="clerk/css/style_view.css" />
<title>Ethio bus transport system</title>

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
<style>
body{
	background:linear-gradient(green,yellow,white,silver,royalblue,black);
}	
	
	
</style>
</head>
<body>
<div id="style_div" >

<form method="post">
<table  style="background:linear-gradient(green,yellow,red); margin-top: -10px;" border="0" align="center" width="500">
<tr><td style="color: white; font-size:25px " colspan="2" align="center"><b> Your seat is Booked!!! </b></td></tr>
	<tr><td style="color:red; font-size:20px " colspan="2" align="center"><b>Your Transaction No. is </b><?php
								include('conection/connect.php');
								$id=$_GET['id'];
                                
								$user_query=mysql_query("select *  from reservation where transaction_no = '" . $id . "'");
								while($row = mysql_fetch_array($user_query)) {
							?>

	
	<?php echo '<b style="color:red;">&nbsp; '.$row['transaction_no'].'&nbsp;</b>'; ?>
	<?php } ?>(Register it)</td></tr>
	<tr><td style="color: white; font-size:20px " colspan="2" align="center"><b>Print and present this details upon boarding the bus</b></td></tr>
	<tr>
	<td align="right">  <a href="#" style="text-decoration: none;color: blue; text-align: center;" onclick="PrintDoc()"><b>PRINT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>	 </td>
		<td align="left">  <a style="text-decoration: none;color: blue; text-align: center;" href="index.php"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</b></a>          </td>
    </tr>
</table>
</form>
</div><!--end of style_div -->

<div  id="printarea">
<div style="width: 100%;">
<div id="ticket" ><!--start of ticket -->

<?php
								include('conection/connect.php');
								$id=$_GET['id'];
$doj=$_GET['date'];
								$user_query=mysql_query("select *  from reservation where transaction_no = '" . $id . "'");
								$row=mysql_fetch_array($user_query); {
							?>
							
								 
								
							

								 
<table border="0" align="center" width="500px"   style="border: 1px solid #06C;border-radius:0px; background:white "   >
<tr>
<td align="right"><img src="clerk/picture/cap.jpg" /></td>
<td>
<h3 align="center">ኢትዮ ባስ ትራንስፖርት ሲስተም አ.ማ<br>
 ETHIO BUS TRANSPORT SYSTEM SC.</h3>
</td>
</tr>
<tr >
<td  align="center"><b><br><br>1ኛ ደረጃ</b></td>	
	
</tr>
<tr>
<td colspan="2" align="center" style="font-size: 20px"><u><b> የመንገደኛ ትኬት</b></u></h3></td>		
</tr>
<tr>
<td colspan="2">
<table border="0" cellpadding="5" width="100%">
<tr>
<td>
<b>Date:</b><?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
</td>
<td>
	
	<b>Dep.Time:</b><b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12:00 AM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>
</td>	
</tr>
<tr>
<td colspan="2">

<b>Passenger's Name:</b><?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['fname'].'&nbsp;'.$row['lname'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
</td>	
</tr>
<tr>
<td>

<b>Passenger's Phone:</b><?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['telephone'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
</td>	
</tr>
<tr>
<td>

<b>Dep.City:</b><?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['depcity'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
</td>
<td>

<b>Des.City:</b><?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['descity'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
</td>	
</tr>
<tr>
<td>

<b>Bus Phone:</b><b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;251923456778&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>
</td>
</tr>
<td>

<b>Side No:<?php
								include('conection/connect.php');
								$id=$_GET['id'];
                                
								$user_query=mysql_query("select *  from reservation where transaction_no = '" . $id . "'");
								while($row = mysql_fetch_array($user_query)) {
							?>

	
	<?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$row['busid'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
	<?php } ?>
</td>	
</tr>
<tr>
<td colspan="2">
<b>Seat No:</b>

<?php
								include('conection/connect.php');
								$id=$_GET['id'];
                                
								$user_query=mysql_query("select *  from seat1 where transaction_no = '" . $id . "'");
								while($row = mysql_fetch_array($user_query)) {
							?>

	
	<?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$row['number'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
	<?php } ?> 	 
</td>	
</tr>

<tr>
<td colspan="2">
	
	<b>Fare:</b> <?php
								include('conection/connect.php');
								$id=$_GET['id'];
                                
								$user_query=mysql_query("select *  from reservation where transaction_no = '" . $id . "'");
								while($row = mysql_fetch_array($user_query)) {
							?>

	
	<?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$row['fare'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
	<?php } ?> 
</td>	
</tr>

<tr>
<td colspan="2">
	
	<b>Total:</b> <?php
								include('conection/connect.php');
								$id=$_GET['id'];
                                
								$user_query=mysql_query("select *  from reservation where transaction_no = '" . $id . "'");
								while($row = mysql_fetch_array($user_query)) {
							?>

	
	<?php echo '<b style="color:green"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$row['total'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>'; ?>
	<?php } ?> 
</td>	
</tr>
<tr>
<td colspan="2">
	<p align="center"><b>ማሳሰቢያዉን ከጀርባ ይመልከቱ !!</b></p>
</td>	
</tr>	 
<tr>
<td align="right">
<img width="70px" height="50px" src="clerk/picture/pic/phone.jpg"/>		 
</td>
<td align="left">
<b> 251947909090</b><br />
<b>251947929292 </b>	 
</td>	
</tr>	 
</table>
</td>
</tr>	 
    </table>
    
  <?php } ?>  
    
    
    </div>

</div><!-- end of content-input -->
</div>
</body>
</html>