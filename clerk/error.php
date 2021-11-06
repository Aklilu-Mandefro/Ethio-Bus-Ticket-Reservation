<?php
if (isset($_GET['e'])) echo "<b style='backgroun:red;color:red'><div  class=\"alert alert-error\"><h3>".$_GET['e']."You are automatically redirected After 5 second </b>";
header("refresh: 5;main.php?tag=printt");
?>