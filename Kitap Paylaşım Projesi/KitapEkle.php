<?php 
session_start(); 
include("Baglanti.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kitap Ekle</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body >

	<center>

		<h1>Kitap Ekle</h1>
		<hr>
		|<a href="Index.php">Ana Sayfa</a> | <a href="KitapSorgula.php">Kitap Sorgula</a>|	
		<hr>
		<br>
		<br>
		<form action="KitapEkle.php" method="post">

			<table >
				<tr>
					<td><label for="kAdi">Ad:</label></td>
					<td><input type="text" name="ad" id="ad" required></td>
				</tr>
				<tr>
					<td><label for="kSoyadi">Soyad:</label></td>
					<td><input type="text" name="soyad" id="soyad" required></td>
				</tr>
				<tr>
					<td><label for="kTelefon">Telefon Numarası:</label></td>
					<td><input type="tel" name="telefon" id="telefon" placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></td>
				</tr>
				<tr>
					<td><label for="kAdi">Kitap Adı:</label></td>
					<td><input type="text" name="kitapAdi" id="kitapAdi" required></td>
				</tr>
				<tr>
					<td><input type="submit" value="Ekle" name="ekle" style="width:50%"></td>
				</tr>
			</table>

		</form>
		<br>
		<br>

		<?php 

		if (isset($_POST['ekle'])) {

			$isimler  = $_POST['ad'];  
			$soyisimler = $_POST['soyad'];    
			$telefonlar = $_POST['telefon'];  
			$kitaplar = $_POST['kitapAdi'];   

			if ($kitaplar) {

				$kitap = "SELECT * FROM bilgiler WHERE kitapAdi='$kitaplar'";

				$calistir = mysqli_query($baglanti, $kitap);

				$kayitsayisi = mysqli_num_rows($calistir); 

				if ($kayitsayisi!=0) {

					echo $kitaplar." adlı kitap daha önce eklenmiştir";
					header("Refresh: 5; url=http://localhost/Kitap%20Payla%C5%9F%C4%B1m%20Projesi/KitapEkle.php");
					mysqli_close($baglanti);
					exit();
				}
			}

			$vEkle = "INSERT INTO bilgiler (isimler, soyisimler, telefonlar, kitapAdi) VALUES ('$isimler', '$soyisimler', '$telefonlar', '$kitaplar')";

			// calistirEkle değişkenimizin içine true yani 1 değerinin gelmesini bekliyoruz

			$calistirEkle = mysqli_query($baglanti, $vEkle);


			if ($calistirEkle) {

				echo $kitaplar." adlı kitap başarılı bir şekilde eklendi";
				header("Refresh: 5; url=http://localhost/Kitap%20Payla%C5%9F%C4%B1m%20Projesi/KitapEkle.php");
			}
			else{

				echo "Kitap eklenemedi, lütfen tekrar deneyiniz";
				header("Refresh: 5; url=http://localhost/Kitap%20Payla%C5%9F%C4%B1m%20Projesi/KitapEkle.php");

			}

			mysqli_close($baglanti);
		}
		?>

	</center>
</body>
</html>
