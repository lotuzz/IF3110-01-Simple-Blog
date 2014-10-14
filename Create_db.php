<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* Udah jadi
// Create database
$sql="CREATE DATABASE simple_blog";
if (mysqli_query($con,$sql)) {
  echo "Database my_db created successfully";
} else {
  echo "Error creating database: " . mysqli_error($con);
}
*/

$table_posts = 'CREATE TABLE `posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `judul` VARCHAR(255) NOT NULL,
  `konten` text NOT NULL,
  `num_comments` INT(11) NOT NULL DEFAULT '.'0'.',
  `tanggal` INT(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';

$table_comments = 'CREATE TABLE `comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `post_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `komentar` text NOT NULL,
  `date` INT(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';

if (mysqli_query($con,$table_posts)) {
	echo "Table post created successfully\n";
} else {
	echo "Error creating table: " . mysqli_error($con) . "\n";
}

if (mysqli_query($con,$table_comments)) {
	echo "Table comments created successfully\n";
} else {
	echo "Error creating table: " . mysqli_error($con) . "\n";
}
?>