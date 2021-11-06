

<?php

session_start();
$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('ethiobus');

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: book.php'); exit;
}

	
// get the posted data
$depcity = strip_tags( utf8_decode( $_POST['depcity'] ) );
$descity = strip_tags( utf8_decode( $_POST['descity'] ) );
$doj = strip_tags( utf8_decode( $_POST['journey_date'] ) );
$name = strip_tags( utf8_decode( $_POST['user_name'] ) );
$address = strip_tags( utf8_decode( $_POST['address'] ) );
$mobile = strip_tags( utf8_decode( $_POST['mobile'] ) );
$userid = strip_tags( utf8_decode( $_POST['userid'] ) );
$email = strip_tags( utf8_decode( $_POST['email'] ) );
$password = strip_tags( utf8_decode( $_POST['password'] ) );
$message = strip_tags( utf8_decode( $_POST['message'] ) );
	
// check that name was entered
if (empty($name))
    $error = 'You must enter your name.';

// check that address was entered
if (empty($address))
    $error = 'You must enter your address.';

// check that mobile number was entered
if (empty($mobile))
    $error = 'You must enter your mobile number.';

// check that user id was entered
if (empty($userid))
    $error = 'You must enter your user id.';

// check that an email address was entered
elseif (empty($email)) 
    $error = 'You must enter your email address.';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
    $error = 'You must enter a valid email address.';
	
// check that a message was entered
if (empty($password))
    $error = 'You must enter password.';



//Check whether the student is already registered.
$select = mysql_query("select * from register where userid = '" . $userid . "'", $connection);

//$query = mysql_real_escape_string($select);

$num_rows = mysql_num_rows($select);

if ( $num_rows )
	$error = 'You are already registered.';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}



// Success
$query = "INSERT INTO register (userid, name, email, password, address, contact, message) VALUES ('" . $userid . "','" . $name . "','" . $email . "','" . $password . "','" . $address . "','" . $mobile . "','" . $message . "')";

//$insert = mysql_real_escape_string($query);

$results = mysql_query($query);

if (!$results)
{
	die ("Could not insert to the register: <br />". mysql_error());
}

$seatNumber = NULL;

for($i=1; $i<61; $i++)
{
	$chparam = "ch" . strval($i);
	$calcPNR = $doj . "-" . strval($i);
	if( !empty($_POST[$chparam]) )
	{
		$query = "INSERT INTO seat(userid, number, PNR, date, depcity, descity) VALUES ('". $userid ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."','". $depcity ."','". $descity ."')";
//		$results = mysql_real_escape_string($query);
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
$email_content = "Name: $name\n";
$email_content .= "Email Address: $email\n";
$email_content .= "Message:\n\n$message";

$messageUser = "Your ticket is booked. The seat number is: " . $seatNumber;
	
// send the email to admin
//Please replace below email to email of your website admin, so that admin will receive email on every seat book.
mail ("openingknots@gmail.com", "New ticket booked", $email_content);

//send email to user
mail ($email, "Ticket booked", $messageUser);

mysql_close($connection);	
// send the user back to the form

header('Location: book.php?s='.urlencode('Your seat is booked.')); exit;

?>
