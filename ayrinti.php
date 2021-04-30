<?php
session_start();
require_once "ayar.php" ;
require_once "fonksiyonlar.php" ;

if (isset($_GET['yazi_id'])) $_SESSION['yazi_id'] = $_GET['yazi_id'];

if(isset ($_POST['Kaydet'])) 
	{
				
	$yor = $_POST['yorum'];
	$uye = $_SESSION['kullanici_adi'];
	$yaz_id  = $_POST['yazi_id'];
	$tar = date("Y-m-d H:i:s");
	
	
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "INSERT INTO yorumlar(yorum,yazi_id,kullanici_adi,tarih) 
	VALUES ('$yor','$yaz_id','$uye','$tar')";

					
	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	 mysqli_close($baglanti);
	unset($_POST['Kaydet']);
	header("location:ayrinti.php?yazi_id=".$_SESSION['yazi_id']);	
	}


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
	
	
	if (isset($_GET['yazi_id']))
	{
		
	$sql_baglanti= "SELECT * FROM yazilar WHERE id=".$_SESSION['yazi_id'];

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
	echo "<h1>".$satir['baslik']."</h1>";
	echo "<p>".$satir['icerik']."</p>";	
	
	echo "<br>";
	
	echo "<p>Kategori: ".$satir['kategori']."</p>";
	echo "<p>Yazar: ".$satir['kullanici_adi']."</p>";
	echo "<p>Yazılma tarihi: ".$satir['tarih']."</p>";
	echo "<br>";
	
	echo "<hr/>";
	echo "<br/>";
	
	}	// while
	
	
	$sql_baglanti1= "SELECT * FROM yorumlar WHERE yazi_id=".$_SESSION['yazi_id'];
	
	$sorgu1 = mysqli_query($baglanti,$sql_baglanti1);

	while ($satir1 = mysqli_fetch_array($sorgu1))
	{
		echo "<p>Yorum: ".$satir1['yorum']."</p>";
		echo "<p>Yazan: ".$satir1['kullanici_adi']."     "."Yazılma tarihi: ".$satir1['tarih']."</p>";
		echo "<br>";
	}	
	
	} // if	

if(isset($_SESSION["login"]))
{
    echo "<form action='ayrinti.php' method='post'>";
	echo "<p> YORUM </p>";
	echo "<textarea name='yorum' cols='30' rows='10'></textarea><br>";
    echo "<input name='yazi_id' type='hidden' value=".$_SESSION['yazi_id'].">";
	echo "<input name='Kaydet' type='submit' value='Kaydet'>";
	
	echo "</form>";
}
    
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