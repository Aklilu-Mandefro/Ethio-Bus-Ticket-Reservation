<?php 
session_start();
include('conection/connect.php');?>
<html>
 
</td></tr></table></td></tr></table><td>
<table  width="600" Height="530" align=center bgcolor="#191970">
<tr><td rowspan="1" bgcolor=#8FBC8F align=top>
 <center><h2> <b> User Login Form</h2></b>
 <img src="images/key1.png" width="200" height="150"/>
	<form method="POST" action="login.php">
	<table  width="50" Height="30" align=center bgcolor="#20B2AA" >
    </tr><tr><td><br><td></tr>
	<tr><td><font color="#000000"><b>Usertype:</font>&nbsp;&nbsp;</td><td><select class="span2" name="usertype" id ="user" required>
                                        <option>select...</option>
										<option>admin</option>
										<option>manager</option>	
										<option>clerk</option>
										
                                    </select></td></tr>
    
    <tr><td><font color="#000000"><b>UserName:</font>&nbsp;&nbsp;</td><td><input type="text"  name="username" class="UserName_hover"></td></tr>
	<tr><td><br><td></tr>
    <tr><td><font color="#000000"><b>Password:</font>&nbsp;&nbsp;</td><td><input type="Password" name="password" class="Password_hover"></td></tr>
	<tr><td><br><td></tr>
    <tr><td><button class="btn btn-primary btn-large" name="Login"><i class="icon-ok-sign icon-large"></i>&nbsp;Login</button></td>
	<td></td><td><input type="reset"  value="Reset" class="btn btn-primary btn-large" /> </td>
	
	</td><tr><td>
	<td><center><a class="btn btn-success" href="forget.php">Forget Your Password?</a></td></center></tr>
	</table>
	</form></center> 
</td></tr>
</td></tr>	

 </div>
</body>
</html>