<?php
$con = mysqli_connect("localhost","root","","simple_blog");

$query1='DELETE FROM posts WHERE id="'.$_GET['id'].'" LIMIT 1';
$query2='DELETE FROM comments WHERE post_id="'.$_GET['id'].'" LIMIT 1';

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(!mysqli_query($con,$query1)) {
	die('Error. Gagal Hapus Post');
	if(!mysqli_query($con,$query2)) {
		die('Error. Gagal Hapus Komen');
	}
}

header('location:ListPost.php');
die();
?>