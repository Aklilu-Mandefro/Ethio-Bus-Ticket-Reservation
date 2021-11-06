<?php
$conn1=mysql_connect('localhost','root',"");
mysql_select_db("cbe",$conn1);
$conn2=mysql_connect('localhost','root',"",true);
mysql_select_db("ethiobus",$conn2);
?>