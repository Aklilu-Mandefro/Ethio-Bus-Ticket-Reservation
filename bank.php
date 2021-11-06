<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
ft{
	color: red;
	font-size: 20px;
}
fz{
	color: #39e31c;
	font-size: 20px;
}
</style>



</head>
<body>
<?php
$userName='root'; //or define('userName','root')
$passWord="";//or define('password','')

$conn = mysql_connect("localhost", $userName, $passWord);
mysql_select_db("banking",$conn);
  if (isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phoneno=$_POST['an'];
    
	$username=$_POST['ab'];
    $password=$_POST['sc'];
 $inser="INSERT  INTO bank 
VALUES ( '$fname','$lname','$phoneno','$username','$password')";
mysql_query($inser);
echo"registerd Successfully ";
echo'<meta content="5;createbank.php" http-equiv="refresh" />';
}
?>

</body>
</html>