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
	
	$sql_baglanti= "SELECT id,yorum,yazi_id, kullanici_adi FROM yorumlar";

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>Yorum</th><th> Yazı ID</th><th>Kullanıcı Adı</th><th>SİL</th></tr>";
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
		
	echo "<tr><td>".$satir['id']."</td><td>".$satir['yorum']."</td><td>".$satir['yazi_id']."</td><td>".$satir['kullanici_adi']."</td><td>"."<a href='yorumsil.php?yor_id=".$satir['id']."'>SİL</a></td></tr>";
	
	
	}
	echo "<table>";
?>
</div>


</body>
 
 </html>