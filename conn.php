<?php
error_reporting(0);
		$link=mysql_connect("localhost","root","") or die("Not found");
		if(!$link)
		{
			echo "Error :- Server is not found !".mysql_error();
		}
		$db=mysql_select_db("ethiobus",$link);
		if(!$db)
		{
			echo "Error :- Database is not found !".mysql_error();
		}
			
?>
