<?php 
$id=$_GET["id"];
$count=$conn->exec("DELETE FROM `category` WHERE `id` = '".$id."'");
echo $id;
echo "<script>location.replace ('index.php?pages=category');</script>";
?>
