<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Blog sederhana untuk tugas WBD">
<meta name="author" content="Reinaldo Michael Hasian 13512092">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />

<title>Simple Blog | Tambah Post</title>

</head>

<body class="default">

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="ListPost.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="AddPost.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" action="AddPost.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

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
  function checkDate(form)
  {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	
    // regular expression to match required date format
    re = /^(\d{1,2})(\d{1,2})(\d{4})$/;

    if(form.startdate.value != '') {
		if(regs = form.startdate.value.match(re)) {
		//cek tahun
		if(regs[3] < yyyy) {
			return false;
		}
		// cek bulan
		if(regs[2] > 12 || regs[2] < mm || regs[2] < 1) {
			return false;
		}
		// cek tanggal
		if(regs[1] < 1 || regs[1] > 31 || regs[1] < dd) {
			return false;
		}
    }
    return true;
  }
</script>

<?php
if(!empty($_POST)) {
	// Create connection
	$con = mysqli_connect("localhost","root","","simple_blog");

	$query='INSERT INTO posts (`judul`, `konten`, `tanggal`) VALUES ("'.$_POST['Judul'].'","'.$_POST['Konten'].'","'.date("d-m-Y",time()).'")';

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

</body>
</html>