<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ethio bus ticket reservation system</title>
<style type="text/css">
body{
    font-family:"Times New Roman", Times, serif;
	color:#000000;
	}
	#correct{
	color:#47ce2b;
	
	
	}
</style>
</head>
<body>
<?php
   function formatDate($val)
   {
        $arr = explode('-', $val);
        return date('d M Y', mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
    }
    include('include/database.php');
	if (isset($_POST['submit'])){
	$name= $_POST['name'];
	$email= $_POST['email'];
	$content= $_POST['content'];
	
	if (!get_magic_quotes_gpc()); {
 		$_POST['content'] = addslashes($_POST['content']);
 	}
	$test= mysql_query("INSERT INTO comment VALUES('comment_id','$name','$email','$content', NOW())");
	if($test==TRUE){  
	               echo "<br/><h3 align='center' id='correct'><b>Thank you for your comment!!!</b></h3><br/>";
				   
				   
	               }
	else{
         echo "<br/>You don't send your comment!!<br/>". mysql_error();
	     include("comment.php");
	    }
	    }
?>

</body>
</html>