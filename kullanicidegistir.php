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

// kullanıcıyı veritabanından getirme
    if(isset ($_GET['uye_id'])) {
		
	echo "<p> kullanıcı güncelleme </p>";
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	$sql_baglanti= "SELECT * FROM uyeler WHERE id=".$_GET['uye_id'];

	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	
	
	while ($satir =mysqli_fetch_array($sorgu))
    {
		$a=$satir['kullanici_adi']	;
		$b =$satir['sifre']	;
		$c =$satir['ad']	;
		$d =$satir['soyad']	;
		$e =$satir['email']	;	
		$f =$satir['telefon']	;
		$g =$satir['tur']	;	
		$h =$_GET['uye_id'];
	}
	unset($_GET['yaz_id']);
	 }  // if

// güncelleme

	if(isset ($_POST['kaydet'])) 
	{
		$a=$_POST['kullanici_adi']	;
		$b =$_POST['sifre']	;
		$c =$_POST['ad']	;
		$d =$_POST['soyad']	;
		$e =$_POST['email']	;	
		$f =$_POST['telefon']	;
		$g =$_POST['tur']	;	
		$h =$_POST['uye_id'];
	    
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "UPDATE uyeler SET kullanici_adi = '$a', sifre = '$b', ad = '$c', soyad= '$d', email='$e', telefon='$f', tur='$g' WHERE id= '$h'";

					
	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	mysqli_close($baglanti);
	
	    
	
	echo "<p>kullanıcı güncellendi</p>";
	

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
<?php echo "Hoş geldiniz"." ".$_SESSION["ad"]."           ";	?>
 <form action="kullanicidegistir.php" method="post">
	<p> kullanıcı adı  <br> <input type="text" name ="kullanici_adi" value=<?php echo $a;?> /> </p>
	<p> şifre   <br> <input type="text" name="sifre" value=<?php echo $b;?> /> </p>
    <p> ad  <br> <input type="text" name ="ad" value=<?php echo $c;?> /> </p>
	<p> soyad  <br> <input type="text" name ="soyad" value=<?php echo $d; ?> /> </p>  
    <p> email   <br> <input type="text" name="email" value=<?php echo $e; ?> /> </p>
    <p> telefon <br> <input type="text" name ="telefon" value=<?php echo $f; ?> /> </p>
   <p> tür  <br> <input type="text" name ="tur" value=<?php echo $g; ?> /> </p>
   
   <input name="uye_id" type="hidden" value=<?php echo $h; ?> >
    <p> <input type="submit" name="kaydet" value ="KAYDET"/>
     
       <input type="reset" name="button" id="button" value="Temizle">
    </p>
 </form>
</div>
 
</body>


</html>