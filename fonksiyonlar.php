<?php

function baglanti($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name){
	
	$baglanti =mysqli_connect($blog_vt_host,$blog_vt_username,$blog_vt_sifre,$blog_vt_name);
	if(mysqli_connect_errno()) {
	echo "bağlantı hatası";
	exit;}	
	return $baglanti;

}

function sorgu ($baglanti, $sql_baglanti){
	$sorgu=mysqli_query($baglanti, $sql_baglanti);
	return $sorgu;
	}


?>