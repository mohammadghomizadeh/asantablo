<?php
$title=$_POST["title"];
$image=time().$_FILES["image"]["name"];
$url="../upload/".basename(time().$_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"],$url);
$s=$conn->prepare("INSERT INTO `category` (`title`, `image`) VALUES (:title,:img)");

$s->bindparam(':title', $title);
$s->bindparam(':img', $image);
$s->execute();
header('Location: index.php?page=category');
echo "<script>location.replace ('index.php?pages=category');</script>";


?>