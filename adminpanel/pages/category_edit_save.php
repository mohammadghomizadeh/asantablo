<?php
$title=$_POST["title"];
$id=$_POST["id"];
if (!empty($_FILES["image"]["name"];)){
$image=time().$_FILES["image"]["name"];
$url="../upload/".basename(time().$_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"],$url);}
else{
$image=$_post["imageold"];}
$s=$conn->prepare(UPDATE `category` SET `title` = '".$title."'  `image` = '".$image."'  WHERE `id` = '".$id."'");
$s->execute();



echo "<script>location.replace ('index.php?page=category');</script>";


?>