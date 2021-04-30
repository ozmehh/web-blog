<?php
		session_start();
		require_once "ayar.php" ;
		require_once "fonksiyonlar.php";		
		
		if (isset($_POST["giris"]))
		{
			$bag = baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
			$ka = $_POST["kullanici_adi"];
			$sif = $_POST["sifre"];
			$sql = "SELECT * FROM uyeler WHERE ((kullanici_adi='".$ka."') and (sifre = '".$sif."'))";
			
			$sor = sorgu($bag,$sql );
			if (mysqli_num_rows($sor) ==1)
			{
				while($satir=mysqli_fetch_array($sor))
				{
					$kullanici_turu = $satir["tur"];
					$_SESSION["ad"]= $satir["ad"]." ".$satir["soyad"];
					$_SESSION["login"] = 1;
					$_SESSION["kullanici_adi"] = $satir["kullanici_adi"];
					
					if($kullanici_turu == "ABONE")
					{
						header("location:index.php");
					}
					else if($kullanici_turu == "YAZAR")
					{
						$_SESSION["login"] = 2;
						header("location:yonetim.php");
					}
					
				}
			}
			else
			{
				echo "<p> Yanlış kullanıcı adı ve/veya şifre. Tekrar deneyiniz.</p>";
			}
			
		}


?>


<html>
<head>


<style type="text/css">
.login {
	height: 150px;
	width: 300px;
	position: fixed;
	top:50%;
	left:50%;
	background-color: #CCC;
	padding: 10px;
	margin-top: -75px;
	margin-left: -150px;
	
}

body{
	background-color: #06F;
	}
</style>
</head>

<body>
<div class="login">
  <form name="form1" method="post" action="giris.php">
    <label>Kullanıcı Adı<br>
      <input type="text" name="kullanici_adi" id="kullanici_adi">
      <br>
      Şifre<br>
      <input type="password" name="sifre" id="sifre">
      <br>
      <br>
    </label>
    <input type="submit" name="giris" id="giris" value="Giriş">
    <input type="reset" name="sil" id="sil" value="Sil">
  </form>

  <p><a href="index.php">Günlük Ana Sayfa</a></p>
</div>

</body>
</html>