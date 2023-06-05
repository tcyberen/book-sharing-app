<?php 
session_start();

$host = "localhost";
$kullanici = "root";
$parola = "rootroot";
$vt = "kitapkayit";

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);

mysqli_set_charset($baglanti, "utf8");



// if ($baglanti){

// 	echo "Veritabanı ile etkileşime geçildi";
// }

 ?>