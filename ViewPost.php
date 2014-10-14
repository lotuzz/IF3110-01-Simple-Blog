<?php
	// Create connection
	$con=mysqli_connect("localhost","root","","simple_blog");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = 'SELECT * FROM posts WHERE id='.$_GET['id'];
	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);

echo<<<TEST
<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
TEST;

echo "<title>Simple Blog | ".$row['judul']."</title>";

echo<<<TEST
<div class="wrapper">
<nav class="nav">
    <a style="border:none;" id="logo" href="ListPost.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>
TEST;

echo '<article class="art simple post">';
	echo '<header class="art-header">';
        echo '<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">';
            echo "<time class=\"art-time\">".$row['tanggal']."</time>";
            echo "<h2 class=\"art-title\">".$row['judul']."</h2>";
            echo "<p class=\"art-subtitle\"></p>";
        echo '</div>';
    echo '</header>';

echo<<<TEST
    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
TEST;
            echo '<p>'.$row['konten'].'</p>';
			
	mysqli_close($con);
?>
            <hr/>
            <h2>Komentar</h2>
		
            <div id="contact-area">
                <form method="post" action="ViewPost.php?id=<?php echo($_GET['id']);?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
					<br>
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    <br>
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
			<hr/>

<?php
$con=mysqli_connect("localhost","root","","simple_blog");
// Check connection

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM comments WHERE post_id=\"".$_GET['id']."\"ORDER BY id ASC");

			echo '<ul class="art-list-body">';
while($row = mysqli_fetch_array($result)) {
	echo '<li class="art-list-item">';
		echo '<div class="art-list-item-title-and-time">';
			echo "<h2 class=\"art-list-title\">".$row['nama']."</h2>";
			echo "<div class=\"art-list-time\">".$row['tanggal']."</div>";
		echo '</div>';
		echo '<p>'.$row['komentar'].'</p>';
	echo '</li>';
}
            echo '</ul>';
        echo '</div>';
    echo '</div>';

echo '</article>';
?>

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
</script>

<?php
if(!empty($_POST)) {
	// Create connection
	$con = mysqli_connect("localhost","root","","simple_blog");

	$query='INSERT INTO comments (`post_id`, `nama`, `email`, `komentar`, `tanggal`) VALUES ("'.$_GET['id'].'","'.$_POST['Nama'].'","'.$_POST['Email'].'","'.$_POST['Komentar'].'","'.date("d-m-Y",time()).'")';

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(mysqli_query($con,$query)) {
		header('location: ListPost.php');
	} else {
		die('Error: ' . mysql_error());
	}

	mysqli_close($con);
}
?>