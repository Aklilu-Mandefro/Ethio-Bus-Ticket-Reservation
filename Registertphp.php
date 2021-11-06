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
    include("include/database.php");

    
    if (isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phoneno=$_POST['phoneno'];
    $age=$_POST['age'];
    $city=$_POST['city'];	
	$username=$_POST['username'];
    $password=$_POST['password'];
    $verify=$_POST['verify'];
if ($_POST['password'] != $_POST['verify']) {
		echo "<ft><b>Your passwords did not match!!!.</b></ft>";
 	}	
else{	 
$test= mysql_query("INSERT INTO passenger VALUES('id','$fname','$lname','$phoneno','$age','$city','$username','$password', NOW())");
       if($test==TRUE){
                 echo "<fz><b>Your Account is Created successfully!</b></fz>";
                 echo "<h href=Registertphp.php>"; 
}
 	
else{
		
$select = mysql_query("select * from passenger where phoneno = '" . $phoneno . "' or username='".$username."' ");

//$query = mysql_real_escape_string($select);

$num_rows = mysql_num_rows($select);

if ( $num_rows ){
	echo "<ft><b>You are already registered !!!.</b><ft>";	
	}	

						 
          else{
              include("createaccount.php");
              echo "<br/><font size=4px font-family=times color=red> <blink>Account is not created!<br/>". mysql_error() ."</font>";
              }
              }
}
}
?>

</body>
</html>