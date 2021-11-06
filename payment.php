<?php

include("include/see1.php");
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title> Ethio bus transport system</title>
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
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />


</head>
<body >
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
<td width="500px">



<div id="center">
<div id="welcome">
<h2 align="center" style="padding-top:5px;">MAKE PAYMENT HERE</h2>	
</div>




<form action="" method="post"  name="contactForm" target="iframe1" onSubmit = "return validate()">

        <table id="ttres" align  = "center" cellpadding = "3" cellspacing = "3">
        <tr><td colspan="2" align="center" style="color: white;"><b>PLEASE FILL YOUR DETAIL HERE !!!</b></td></tr>
        
        <input type='hidden' name='transfer' id='tra' value='masiyas' />
        
        
			<tr>
	        <td align=right style="color:white"><label for="name">Account No.:</label></td>
            <td align=left><input type="password" name="account" id="txt_acc" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your Account No."  title="Please enter a valid account no.." required /></td>
			</tr>
			<tr>
	        <td align=right style="color:white"><label for="name">Pin No.:</label></td>
            <td align=left><input type="password" name="secu" id="txt_sec" style="width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;" placeholder="Type your Pin No."  title="Please enter a valid pin no.." required /></td>
			</tr>
			
			<tr>
	        <td align=right style="color:white"><label for="name">Fare:</label></td>
            <td align=left><input type="text" name="fare"  value="<?php echo 900; ?>" readonly /></td>
			</tr>
			
            <tr><td></td>
			<td ><button id="button1" class="submit" type="submit" name="submit"><b>Reserve</b></button>&nbsp;&nbsp;&nbsp;
			    <button id="button1" class="submit" type="reset"><b>Cancel</b></button>
                       </td>
			</tr>
			
<?php
$x=1;
if(isset($_POST['submit'])){

$status='Pending';



$tra=$_POST['transfer'];
$a=$_POST['account'];
$amount=$_POST['fare'];
$card=$_POST['secu'];

 $query = "SELECT * FROM bank where accountnumber= '{$a}'  AND security='{$card}';";
$result_set=mysql_query($query,$conn1);
$count=mysql_num_rows($result_set);
      if(!$result_set){
   die("query is failed".mysql_error());
}
if($count==0)
{
echo '<div align="center"><strong><font color="#FF0000">Please Fill the form correctly</Strong></div>';
echo'<meta content="5;payment.php" http-equiv="refresh" />';
}
else{

if(mysql_num_rows($result_set))
{

$result ="SELECT * FROM bank where accountnumber= '{$a}' AND security='{$card}';";
$re=mysql_query($result,$conn1);

while($row = mysql_fetch_array($re))
  {
  if($row['amountbirr']<=$amount){


   echo'<strong><center><font color="#FF0000">Dear customer your current account balance is not sufficient</font></center></Strong>';
   echo'<meta content="10;payment.php" http-equiv="refresh" />';

  }
  else{
  $value = mysql_query("UPDATE  bank set amountbirr='{$row['amountbirr']}'-'{$amount}' where accountnumber= '{$a}';",$conn1);

  header("location: print.php?id=$confirmation&date=$doj");
  

 

  
 
if($x==1)  {
$query1 = "SELECT * FROM bank where fname= '{$tra}';";
 $result_set=mysql_query($query1,$conn1);
      if(!$result_set){
   die("query is failed".mysql_error());
}
if(mysql_num_rows($result_set)>0)
{
$result1 = mysql_query("SELECT * FROM bank where fname= '{$tra}';",$conn1);
while($row1 = mysql_fetch_array($result1))
  {
   $value = mysql_query("UPDATE  bank set amountbirr='{$row1['amountbirr']}'+'{$amount}' where fname= '{$tra}';",$conn1);
}  	
}
}


}
}
}	   
else
   {
     
	  echo'<strong><center><font color="#FF0000">Error in account number or security number!!</font></center></Strong>';
   }
   }
mysql_close($conn1);
mysql_close($conn2);
}


?>			
			
	</table>
	
	



</form>
	

</div>



</td>


<td width="290px">
<?php
	include("include/right.php");	
	
?>

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
</body>
</html>
