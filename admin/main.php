<?php
	session_start();
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ethio Bus Online  Booking System</title>

<link rel="stylesheet" type="text/css" href="css/main_format.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>

<body>

 
<br /><br />
<div id="admin">
	
        <div id="lmain">
                <a href="#" title="logo" ><img src="picture/logo.jpg" height="75" width="170"/></a>
                <div id="leftmanu">
                	<div >
                        <a href="?tag=home" title="HOME (Shift+Ctrl+H)">HOME</a><br />
                	</div>
                    
                   <?php /*?> 
                    <?php 
						$sql_menu=mysql_query("SELECT * FROM  article_tbl WHERE loca_id=1");
						while($row=mysql_fetch_array($sql_menu)){
						?>
						 <div><a href="?tag=view&v_id=<?php echo $row['a_id'];?>"><?php echo $row['title'];?></a></div>
						<?php	
							}
						?>  <?php */?>
                    
                    
                    <div>
                    	<a href="main.php?tag=customer_entry" title="Shift+1">&nbsp;Managers Entry</a><br />
                    </div>
                    <div>
                    	<a href="main.php?tag=package_entry" class="customer" title="Shift+2">&nbsp;Clerks Entry</a>
                    </div>
                    <div>
                    	<a href="main.php?tag=admin_entry" class="customer" title="Shift+2">&nbsp;Admin Entry</a>
                    </div>

                    <div>
                    	<a href="logout.php" class="customer" title="Shift+Ctrl+C">&nbsp;Logout </a>
                    </div>
                    
                    
                    
                    
                </div><!-- end of leftmanu -->
        </div><!--end of lmaim -->
        
        <div>
        
        
        </div>
    <div id="rmain">
    	<div id="pic_manu">
	
             </div><!--end of pic_manu -->
        
         <div id="menu2">
                
                <div style="width:4px; height:37px; padding:0px; margin:0px; float:left;"></div>
                
                <li id="li_menu"><a href="#">Managers</a>
                    <ul>
                        <li id="li_submenu">
                        <a href="main.php?tag=customer_entry" class="sales">Managers Entry</a></li>
                        <li id="li_submenu"><a href="main.php?tag=view_customer" class="stocks">View Managers</a></li>
                    </ul>
                </li>
				
                <li id="li_menu"><a href="#">Clerks</a>
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="main.php?tag=package_entry" class="order">Clerks Entry</a></li>
                        <li id="li_submenu"><a href="main.php?tag=view_package" class="stocks">View Clerks</a></li>
                    </ul>
                
                </li>
								
                <li id="li_menu"><a href="#">Administrators</a>
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="main.php?tag=admin_entry" class="order">Admin Entry</a></li>
                        <li id="li_submenu"><a href="main.php?tag=view_admin" class="stocks">View Admin</a></li>
                    </ul>
                
                </li>
      </div><!--end of menu2--> 
            
			
			
            
            <div id="contents">
            
            	<div id="informations">
                	<div id="in_informations">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
						
                            elseif($tag=="customer_entry")
                            include("Customer_Entry.php");
							
							elseif($tag=="view_customer")
                            include("View_Customer.php");
                
							 elseif($tag=="view_package")
                            include("View_Package.php");
							
                            elseif($tag=="package_entry")
                            include("Package_Entry.php");
							 elseif($tag=="view_admin")
                            include("View_Admin.php");
							
                            elseif($tag=="admin_entry")
                            include("Admin_Entry.php");
                            elseif($tag=="printing")
                            include("Print.php");
							
							elseif($tag=="user_entry")
                            include("User_Entry.php");
                        	/*$tag= $_REQUEST['tag'];
							
							if(empty($tag)){
								include ("Customer_Entryphp");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div><!--end of in_informations -->
                </div><!--end of informations -->
    		</div><!--end of contens -->   
     </div><!--end of rmain -->
    	
    </div><!--end of admin -->

</body>
</html>