<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Blog sederhana untuk tugas WBD">
<meta name="author" content="Reinaldo Michael Hasian 13512092">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />

<title>Simple Blog</title>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="ListPost.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="AddPost.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">

<?php
	// Create connection
	$con=mysqli_connect("localhost","root","","simple_blog");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con,"SELECT * FROM posts ORDER BY id ASC");

	while($row = mysqli_fetch_array($result)) {
		echo '<li class="art-list-item">';
            echo '<div class="art-list-item-title-and-time">';
						echo '<h2 class="art-list-title"><a href="ViewPost.php?id='.$row['id'].'">'.$row['judul'].'</a></h2>';
						echo '<div class="art-list-time">'. $row['tanggal'] .'</div>';
						echo '<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>';
			echo '</div>';
			echo '<p>' . substr($row['konten'],0,50) . '</p>';
			if($row['konten'] > 50) {
				echo '... ' . '<p><a href="#"> Lihat Selengkapnya </a></p>';
			}
			echo '<p><a href="EditPost.php?id='.$row['id'].'">Edit</a> | <a href="DeletePost.php?id='.$row['id'].'" onclick="javascript:return confirm(\'Apakah Anda yakin menghapus post ini?\')">Hapus</a></p>';
		echo '</li>';
	}
	
	mysqli_close($con);
?>
          </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');

function(
</script>

</body>
</html>