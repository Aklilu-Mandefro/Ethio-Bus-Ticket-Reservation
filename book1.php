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


// check for form submission - if it doesn't exist then send back to contact form

function createRandomPassword()
{
$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	
srand((double)microtime()*1000000);
	
$i = 0;
	
$pass = '' ;
	
while ($i <= 7) 
{
		
$num = rand() % 33;
		
$tmp = substr($chars, $num, 1);
		
$pass = $pass . $tmp;
		
$i++;
	
}

	
return $pass;

}

$confirmation = createRandomPassword();
$depcity = strip_tags( utf8_decode( $_POST['depcity'] ) );
$descity = strip_tags( utf8_decode( $_POST['descity'] ) );

$doj = strip_tags( utf8_decode( $_POST['date'] ) );


$fare = strip_tags( utf8_decode( $_POST['fare'] ) );

$fname = strip_tags( utf8_decode( $_POST['fname'] ) );

$lname= strip_tags( utf8_decode( $_POST['lname'] ) );

$telephone = strip_tags( utf8_decode( $_POST['telephone'] ) );

$age = strip_tags( utf8_decode( $_POST['age'] ) );

$busid = strip_tags( utf8_decode( $_POST['busid'] ) );

$total = strip_tags( utf8_decode( $_POST['total'] ) );



$x=1;

if(isset($_POST['submit'])){

$a=$_POST['account'];

$card=$_POST['secu'];

$total=$_POST['total'];

$fname=$_POST['fname'];

$lname=$_POST['lname'];

$telephone=$_POST['telephone'];

$query = "SELECT * FROM bank where accountnumber= '{$a}'  AND security='{$card}' AND fname='{$fname}' AND lname='{$lname}' AND phonenum='{$telephone}';";

$result_set=mysql_query($query,$conn1);

$count=mysql_num_rows($result_set);
     
 if(!$result_set){
   die("query is failed".mysql_error());

}

if($count==0)

{

echo '<div align="center"><strong><font color="#FF0000">Incorrect Account No and securitynum.Or fname and lname</Strong></div>';

echo'<meta content="5;reservation1.php" http-equiv="refresh" />';

}

else
{


if(mysql_num_rows($result_set))

{


$result ="SELECT * FROM bank where accountnumber= '{$a}' AND security='{$card}';";

$re=mysql_query($result,$conn1);


while($row = mysql_fetch_array($re))
 
 {
  
if($row['amountbirr']<=$total)
{
  
 echo '<div align="center"><strong><font color="#FF0000">Dear Passenger your current account balance is not sufficient</Strong></div>';

echo'<meta content="5;reservation1.php" http-equiv="refresh" />';
  
}
  
else
{
 
 $value = mysql_query("UPDATE  bank set amountbirr='{$row['amountbirr']}'-'{$total}' where accountnumber= '{$a}';",$conn1);


                
 $query = "SELECT * FROM bank where accountnumber='10000665690' AND security='ethiobus' ";
$result_set=mysql_query($query,$conn1);

  $value = mysql_query("UPDATE  bank set amountbirr=amountbirr +'{$total}' where accountnumber='10000665690';",$conn1);
               
              
               
  
                
                
  
 

echo '<div align="center"><strong><font color="green">Dear Passenger your  account successfully dedacted</Strong></div>';

// Success
$query = "INSERT INTO reservation (fname, lname, telephone,age,depcity,descity,date,fare,transaction_no, busid, total) VALUES ('" . $fname . "','" . $lname . "','" . $telephone . "','" . $age . "','" . $depcity . "','" . $descity . "','" . $doj . "','" . $fare . "','" . $confirmation ."','" . $busid ."','" . $total."')";


//$insert = mysql_real_escape_string($query);


$results = mysql_query($query);


if (!$results)
{
	die ("Could not insert to the reservation: <br />". mysql_error());

}


$seatNumber = NULL;


for($i=1;$i<61; $i++)

{
	
$chparam = "ch" . strval($i);
	
$calcPNR = $doj . "-" . strval($i);
	
if( !empty($_POST[$chparam]) )
	
{

$query = "INSERT INTO seat1(transaction_no, number, PNR, date, depcity, descity, fare, busid) VALUES ('". $confirmation ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."','". $depcity ."','". $descity ."','". $fare ."','". $busid ."')";

//$results = mysql_real_escape_string($query);
		
$results = mysql_query($query);
		
if (!$results)
		
{
			
die ("Could not update seat: <br />". mysql_error());
		
}
		
$seatNumber = $seatNumber .", ". "$i";
	
}
}






			


if(!empty($message))

{
	
$message = "A new user '". $name ."' has booked seat number: '". $seatNumber ."'." . "His message is as below." . $message;	

}

else

{
	
$message = "A new user '". $name ."' has booked seat number: '". $seatNumber;	

}

		

// write the email content


$messageUser = "Your ticket is booked. The seat number is: " . $seatNumber;


// send the email to admin
//Please replace below email to email of your website admin, so that admin will receive email on every seat book.
mail ("openingknots@gmail.com", "New ticket booked", $email_content);


//send email to user
mail ($email, "Ticket booked", $messageUser);


mysql_close($connection);	

// send the user back to the form

header("location: print.php?id=$confirmation&date=$doj");




 
}}}}}
mysql_close($conn1);

mysql_close($conn2);



?>
