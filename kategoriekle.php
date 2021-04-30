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
	
	if(isset ($_POST['kaydet'])) 
	{
	$kat = $_POST['kategori'];
	$ac = $_POST['aciklama'];

	$baglanti = baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "INSERT INTO kategoriler(kategori,aciklama) 
	VALUES ('$kat','$ac')";
				
	$sorgu= sorgu($baglanti,$sql_baglanti);
	
	mysqli_close($baglanti);
	
	echo "<p>kayıt gerçekleşti</p>";
	
	}
?>

<html>

<head>

<link href="yonetimstil.css" rel="stylesheet" type="text/css">
</head>


<body>

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
<?php echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	 ?>

<p> kategori ekleme </p>

<form action="kategoriekle.php" method="post">
	<p> Kategori <br> <input type="text" name ="kategori"/> </p>
	<p> Açıkma <br> <input type="text" name ="aciklama"/> </p>
	
    <p> <input type="submit" name="kaydet" value ="kaydet"/> </p>
 
 </form>
 
 
 </div>

</body>


</html>