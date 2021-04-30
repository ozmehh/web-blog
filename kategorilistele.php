<?php

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
<?php
   
    require_once "ayar.php" ;
	require_once "fonksiyonlar.php";
    
	 echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	$sql_baglanti= "SELECT id,kategori,aciklama FROM kategoriler";

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>Kategori</th><th> Açıklama</th><th>SİL</th> <th> DEGİŞTİR</th></tr>";
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
		
	echo "<tr><td>".$satir['id']."</td><td>".$satir['kategori']."</td><td>".$satir['aciklama']."</td><td>"."<a href='kategorisil.php?kat_id=".$satir['id']."'>"."SİL</a>"."</td><td>"."<a href='kategoridegistir.php?kat_id=".$satir['id']."'>"."DEĞİŞTİR</a></td></tr>";
	
	}
	echo "</table>";

?>
</div>

 </body>
 
 </html>