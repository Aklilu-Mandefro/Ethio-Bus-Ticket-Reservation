<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM reservation WHERE id=$id");
	if($del_sql){
		echo "<h3 style='color:#e01f3c' ><b>Reservation has been Deleted... !</b></h3>";
		
		}
	else{
		$msg="Could not Delete :".mysql_error();
		}	
			
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ethio bus transport system</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="210px" style="font-size:18px; color:#006; text-indent:30px;"><b>View Reservations</b></td>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter status for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search reservation" />
        </td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post" action="createnotice.php"bgcolor="#E0E0E0  ">
<br><br>
<table >
 
 <tr>
  <td>Day</td>
  <td><input type="text"required name="Day" size="20"/></td>
 </tr>
 <tr><td></td><td></td></tr>
 <tr>
  <td>Title</td>
  <td><input type="text" required  Pattern="[a-z A-Z]+" onInvalid=setCustomerValidity("Please Enter A Valid Email Address") name="Title" size="20"/></td>
 </tr>
 <tr>
  <td>body/notice<br></td>
  <td><textarea placeholder="Please Insert Your notice" type="text" name="text" rows="4" cols="15"/></textarea></td>
 </tr>
 <tr><td></td><td></td></tr><tr><td></td><td></td></tr>
 <tr>
  <td></td><td><input type="submit" name="submit" value ="Submit"/>&nbsp; &nbsp; &nbsp; 
  <input type="reset" name="reset" value="Clear"/></td>
 </tr>
</table
</div> 
</body>
</html>