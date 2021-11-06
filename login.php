
<?php
 session_start();
include('conection/connect.php');
if (isset($_POST['Login'])){ 
$username=$_POST['username'];
$password=$_POST['password'];
$utype=$_POST['usertype'];
//$ee=hash("sha256",$password);
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'  AND type='$utype'";
$result = mysql_query($sql); 
// TO check that at least one row was returned 
$rowCheck = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$_SESSION['user'] = $row['username'];
$status=$row['Status'];
if($row['type']=="admin"){ 
if($status==1)
{

echo "<script>alert('Successfully Login!'); window.location='admin/main.php'</script>";
} 
else
{
echo "<script>alert('Your Account is not active Please contact the system Admin !!');</script>"; 
echo '<script>window.location=\'login2.php\';</script>';                              	
}
}	
else if($row['type']=="manager"){
if($status==1)
{	
echo '<script >alert("You are successfully login!!");window.location=\'manager/main.php\';</script>';
}
else
{   echo "<script>alert('Your Account is not active Please contact the system Admin !!');</script>";                                
echo '<script type="text/javascript">window.location=\'login2.php\';</script>';	

}
}

else if($row['type']=="clerk"){
if($status==1)
{	
echo '<script type="text/javascript">alert("You are successfully login!!");window.location=\'clerk/main.php\';</script>';
}
else
{echo "<script>alert('Your Account is not active Please contact the system Admin !!');</script>";                                
echo '<script type="text/javascript">window.location=\'login2.php\';</script>';	
}}
else {
echo "<script>alert('incorect username or Password !!');</script>";

echo' <meta content="0;login2.php" http-equiv="refresh" />';	
}
}
//mysql_close($conn);
?>