<?php
if(isset($_POST['submit'])){
$Day=$_POST['Day'];
$title=$_POST['Title'];
$body=$_POST['text'];


$conn=mysql_connect("localhost","root","");
mysql_select_db('ethiobus'); 
$query=mysql_query("select * from notice where Day='".$Day."' and title='".$title."' ") or die(mysql_error());
$duplicate=mysql_num_rows($query);
if($duplicate==0){

$sql="insert into notice values('$Day','$title','$body')";
                   $result=mysql_query($sql);
                                    echo "<script type = \"text/javascript\">
                                            alert(\"Notice successfully created\");
                                            window.location = (\"main.php\")
                                            </script>"; 
}
                                            
else 
 {
          echo'The day   <u>'.$Day.'</u> is already has this <u>'.$title.'</u> notice';


}
}
