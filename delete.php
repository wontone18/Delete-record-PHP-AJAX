<?php

include ("connection.php");




$id=trim($_REQUEST['id']);

mysqli_query($con,"delete from product where id='".$id."'");


?>