<?php
session_start();
if(isset($_SESSION["login"]))
{
	if($_SESSION["login"]==2 )
	{
		echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	
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

</head>

<body>

<div >
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
</div>

<div>
<a href="index.php">günlük ana sayfa</a>
</div>


</body>

</html>