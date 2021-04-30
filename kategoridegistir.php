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
	
	// yazıyı veritabanından getirme
    if(isset ($_GET['kat_id'])) {
		
	
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	$sql_baglanti= "SELECT * FROM kategoriler WHERE id=".$_GET['kat_id'];

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
		$a=$satir['kategori']	;
		$b =$satir['aciklama']	;
		$c =$_GET['kat_id']	;
	}
	unset($_GET['kat_id']);
	 }  // if

	
	
	// güncelleme
	
	
	if(isset ($_POST['kaydet'])) 
	{
		$a=$_POST['kategori']	;
		$b =$_POST['aciklama']	;
		$c =$_POST['kat_id']	;

	$baglanti = baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "UPDATE kategoriler SET kategori='$a' , aciklama ='$b' WHERE id ='$c';" ;
				
	$sorgu= sorgu($baglanti,$sql_baglanti);
	
	mysqli_close($baglanti);
	
	echo "<p>güncelleme gerçekleşti</p>";
	
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
<?php echo "Hoş geldiniz"." ".$_SESSION["ad"]."           "; ?>
<p> kategori güncelleme </p>

 <form action="kategoridegistir.php" method="post">
	<p> Kategori <input type="text" name ="kategori" value="<?php echo $a?>"/> </p>
	<p> Açıkma<input type="text" name ="aciklama" value="<?php echo $a?>"/> </p>
	<input name="kat_id" type="hidden" value="<?php echo $c?>">
    <p> <input type="submit" name="kaydet" value ="kaydet"/> </p>
 
 </form>
 
 </div>

</body>


</html>