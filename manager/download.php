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
<!--table width="755">
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
<?php

include('conection/connect.php');?>
<table bgcolor=#E0FFFF cellpadding="0" cellspacing="0" border=0 class="display" id="log" class="jtable">
                    <thead>
                            <th>File name</th>
                            <th>File size(KB)</th>
							<th>Action</th>
							</thead>
                        </tr>
      
                  
<tbody>
                     <?php
	$sql="SELECT * FROM uploads";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		 $id=$row['id']; 
		?>
        <tr>
        <td><?php echo $row['file'] ?></td> 
        <td><?php echo $row['size'] ?></td>
        <td align="center"> 
<a class="btn btn-success" href="<?php echo $row['file'] ?>"><i class="icon-folder-open icon-large"></i>&nbsp;Download</a>&nbsp;	
\
<a class="btn btn-danger1"  data-toggle="modal" href="#d<?php echo $id; ?>">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
        
									       </td> </tr>
									<?php
	}
	?>
                                </td>

                            </tr>
                            <?php ?>
              </tbody>
            </table> 

</div> 
</body>
</html>