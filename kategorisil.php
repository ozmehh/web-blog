<?php

    require_once "ayar.php" ;
	require_once "fonksiyonlar.php";
	
	session_start();
if(isset($_SESSION["login"]))
{
	if($_SESSION["login"]==2 )
	{
		
	}
	else
	{
		header("location:index.php");
	}
	
}

else
{
	header("location:index.php");
}
    
	


?>

<html>
<link href="yonetimstil.css" rel="stylesheet" type="text/css" />
<head

</head>

<body>
<div> <?php echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	?>  </div>
<div id="menu">
	<ul> Yazılar
	<li><a href="yaziekle.php">yazı ekle </a></li>
	<li><a href="yazilistele.php">yazı listele(değiştir - sil) </a></li>	
	</ul>
	
	<ul> Kategoriler
	<li><a href="kategoriekle.php">Kategori ekle </a> </li>
	<li><a href="kategorilistele.php">Kategori listele(değiştir - sil) </a></li>	
	</ul>
	
	<ul> Kullanıcılar
	<li><a href="kullaniciekle.php">Kullanıcı ekle </a> </li>
	<li><a href="kullanicilistele.php">kullanıcı listele(değiştir - sil) </a></li>	
	</ul>
    
    <ul> Yorumlar
	<li><a href="yorumlistele.php">yorum listele(değiştir - sil) </a></li>	
	</ul>
    
    <ul> Blog
	<li><a href="index.php">blog ana sayfa</a></li>	
	</ul>
</div>

<div id="icerik">


<?php
 if(isset ($_GET['kat_id'])) {
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	$sql_baglanti= "DELETE FROM kategoriler WHERE id=".$_GET['kat_id'];;

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	echo "<p> kayıt silindi </p>";
	unset($_GET['kat_id']);
	 }
	 ?>

</div>

</body>


</html>
