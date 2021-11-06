

<?php
include("include/see1.php");
	require("conection/connect.php");
session_start();
$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');
?>

<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ticket Cancelation</title>
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap-responsive.css">
	</HEAD>

	<BODY>
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="span10">
					<?php
					
				$x=1;
if(isset($_POST['formSubmit'])){

$status='Cancelled';
$total=$_POST['fare'];

	$confirmation=$_POST['cancelled']  ;
	mysql_query("UPDATE reservation SET status='$status' WHERE transaction_no='$confirmation'");
$a=$_POST['account'];
 $query = "SELECT * FROM bank where accountnumber='$a'";

$result_set=mysql_query($query,$conn1);

$count=mysql_num_rows($result_set);
     
 if(!$result_set){
   die("query is failed".mysql_error());

}

if($count==0)

{

echo '<div align="center"><strong><font color="#FF0000">Incorrect Account</Strong></div>';

echo'<meta content="5;cancel.php" http-equiv="refresh" />';

}
else
{
 
 $value = mysql_query("UPDATE  bank set amountbirr=amountbirr-'{$total}' where accountnumber= '10000665690' AND security='skybus';",$conn1);
  $value = mysql_query("UPDATE  bank set amountbirr=amountbirr +'{$total}' where accountnumber='$a';",$conn1);
  if(isset($_POST['formSeat']))
$aSeat = $_POST['formSeat'];
							
if(empty($aSeat)) 
{
echo("<div class='alert alert-error'>You didn't select any ticket.</div>\n");
} 
else 
{
$N = count($aSeat);
for($i=0; $i < $N; $i++)
{
$query = "delete from seat1 where PNR = '" . $aSeat[$i] . "'";
$result = mysql_query($query);
}}
echo "<div class='alert alert-success'>Your ticket(s) is(are) cancelled. You will be automatically redirected after 5 seconds.</div>";
 header("refresh: 5;cancel.php");
}
	
					
					
						}
					?>
				</div>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
</HTML>
