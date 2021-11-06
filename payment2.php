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

  
  echo " <script language='javascript'>
                                alert('Item Successfully Reserved!!!!');
                      </script>";
echo "<br>";
 

  
 echo "<script>window.location='payment.php?id=$transnum';</script>";
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



header("location: print.php?id=$confirmation&date=$doj");