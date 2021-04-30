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
	$uye = $_POST['kullanici_adi'];
	$tar = $_POST['tarih'];
	$bas = $_POST['baslik'];
	$ic = $_POST['icerik'];
	
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "INSERT INTO yazilar(baslik,icerik,kategori,tarih,kullanici_adi) 
	VALUES ('$bas','$ic','$kat','$tar', '$uye')";

					
	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	mysqli_close($baglanti);
	
	echo "<p>yazı günlüğe eklendi</p>";
	
	

	}
?>

<html>

<head>
<link rel ="stylesheet" type="text/css" href="yonetimstil.css">
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

<?php echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	?>
<p> yazı ekleme </p>
 <form action="yaziekle.php" method="post">
	<p> Kategori  <br><input type="text" name ="kategori"/> </p>
	<p> kullanıcı adı  <br><input type="text" name="kullanici_adi" /> </p>
    <p> Tarih <br><input type="text" name ="tarih"/> </p>
	<p> Baslik<br><input type="text" name ="baslik"/> </p>
    <p> içerik  <br><textarea cols="50" rows="25" name="icerik"> </textarea> </p>
    <p> <input type="submit" name="kaydet" value ="KAYDET"/> </p>
 
 </form>
 </div>
 
</body>


</html>