<?php
session_start();
?>
<html>

<head>
<link rel ="stylesheet" type="text/css" href="mainstil.css">
<meta charset="utf-8">
<title>
blogum
</title>

</head>
<body>
<div  class ="tasiyici">

<div class="ustbolum">   

<img src="ust.jpg">

</div>

<div class="ust1">

<span>
<?php
if(isset($_SESSION["login"]))
{
	if(($_SESSION["login"]==1 )|| ($_SESSION["login"]==2 ))
	{
		echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	
	}
	
	
}
?>
</span>
<a href="index.php">Ana Sayfa</a> || <a href="iletisim.php">İletişim</a> || 
<?php
if(isset($_SESSION["login"]))
{
	echo "<a href='cikis.php'>Çıkış</a> ";
	
}

else
{
	echo "<a href='giris.php'>Günlüğe Giriş</a> ";
}

?>

|| <a href="uyekayit.php">Yeni üye ol!</a>
</div>

<div class="solbolum">  
	
<?php


	
require_once "ayar.php" ;
require_once "fonksiyonlar.php" ;



$baglanti =mysqli_connect($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
if(mysqli_connect_errno()) {
	echo "bağlantı hatası";
	exit;} 

	
$sql_baglanti= "SELECT * FROM kategoriler";

$sorgu=mysqli_query($baglanti, $sql_baglanti);
 echo "<h3> Kategoriler </h3>";
while ($satir =mysqli_fetch_array($sorgu))
{
	$kategori = $satir["kategori"];
	echo "<p><a href='index.php?kategori=".$kategori."'>".$kategori."</a></p>";
}
?>

</div>  <!-- solbolum -->
	
<div class="sagbolum"> 

<?php	

	$baglanti =mysqli_connect($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	if(mysqli_connect_errno()) {
	echo "bağlantı hatası";
	exit;} 
	
	
	if (isset($_GET['kategori']))
	{
		
	$sql_baglanti= "SELECT * FROM yazilar WHERE kategori='".$_GET['kategori']."' ORDER BY tarih DESC";

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
	echo "<h1>".$satir['baslik']."</h1>";
	echo "<p>".$satir['icerik']."</p>";	
	
	echo "<br>";
	
	echo "<p>Kategori: ".$satir['kategori']."</p>";
	echo "<p>Yazar: ".$satir['kullanici_adi']."</p>";
	echo "<p>Yazılma tarihi: ".$satir['tarih']."</p>";
	echo "<p>Yorumları görmek için<a href='ayrinti.php?yazi_id=".$satir['id']."'> tıklayınız</a> </p>";
	echo "<br>";
	
	echo "<hr/>";
	echo "<br/>";
	echo "<br/>";
	}	
	 unset($_GET['kategori']);	
	}
	
	else
	{
  
	$sql_baglanti= "SELECT * FROM yazilar ORDER BY tarih DESC";

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
	echo "<h1>".$satir['baslik']."</h1>";
	echo "<p>".$satir['icerik']."</p>";
	
	echo "<br>";
	
	echo "<p>Kategori: ".$satir['kategori']."</p>";
	echo "<p>Yazar: ".$satir['kullanici_adi']."</p>";
	echo "<p>Yazılma tarihi: ".$satir['tarih']."</p>";
	echo "<p>Yorumları görmek için<a href='ayrinti.php?yazi_id=".$satir['id']."'> tıklayınız</a> </p>";
	echo "<br>";
	echo "<hr/>";
	echo "<br>";
	echo "<br>";
	}
	
	} //else

?>	

</div> <!-- sağ bölüm-->
	
<div class="clear"> </div>
    
<div class="altbolum"> 
	<br>
    <br>
	<p> Her hakkı mahfuzdur. Kaynak gösterilerek çoğatılabilir</p>
    
</div> <!-- altbolum -->
	
	
	
	

</div>  <!-- taşıyıcı-->
</body>
</html>