<?php
	require_once "ayar.php" ;
	require_once "fonksiyonlar.php";

	if(isset ($_POST['kaydet'])) 
	{
	$ka = $_POST['kullanici_adi'];
	$sif = $_POST['sifre'];	
	$ad = $_POST['ad'];
	$soy = $_POST['soyad'];
	$em = $_POST['email'];
	$tel = $_POST['telefon'];
	$tur = "ABONE";
	
	$baglanti= baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	
	
	$sql_baglanti= "INSERT INTO uyeler(kullanici_adi,sifre,ad,soyad,email,telefon,tur) 
	VALUES ('$ka','$sif','$ad','$soy', '$em', '$tel', '$tur')";

					
	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	mysqli_close($baglanti);
	
	echo "<p>kullanıcı eklendi</p>";
	
	header("location:giris.php");

	}
?>

<html>

<style type="text/css">
#uye{
    height: 450px;
	width: 300px;
	position: fixed;
	top:50%;
	left:50%;
	background-color: #CCC;
	padding: 10px;
	margin-top: -225px;
	margin-left: -150px;
	
}

body{
	background-color: #06F;
	}


</style>


<head>

</head>


<body>

<div id="uye">


<p> Uye Kaydı </p>

 <form action="kullaniciekle.php" method="post">
	<p> kullanıcı adı <br> <input type="text" name ="kullanici_adi"/> </p>
	<p> şifre  <br><input type="text" name="sifre" /> </p>
    <p> ad <br><input type="text" name ="ad"/> </p>
	<p> soyad <br> <input type="text" name ="soyad"/> </p>  
    <p> email <br> <input type="text" name="email" /> </p>
    <p> telefon <br><input type="text" name ="telefon"/> </p>
    <p> <input type="submit" name="kaydet" value ="KAYDET"/>
     
       <input type="reset" name="button" id="button" value="Temizle">
    </p>
 </form>
 </div>
</body>


</html>