<?php
session_start(); 
include("Baglanti.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kitap Sorgula</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<center>

		<h1>Kitap Sorgula</h1>
		<hr>
		|<a href="Index.php">Ana Sayfa</a> | <a href="KitapEkle.php">Kitap Ekle</a>|
		<hr>
		<br>
		<br>
		<br>

		<form action="KitapSorgula.php" method="POST">

			<table>

				<tr>
					<td><label for="kSorgu">Kitap Sorgula: </label></td>
					<td><input type="text" name="kSorgu" id="kSorgu"></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="submit" value="Ara" name="ara" style="width:250%"></td>
				</tr>


			</table>

		</form>
		<br>
		<br>

		<?php 

		if (isset($_POST['ara'])) {

			$kitaplar = $_POST['kSorgu'];

			if ($kitaplar) {

				$sql = "SELECT kitapAdi, telefonlar FROM bilgiler WHERE kitapAdi='$kitaplar'";
				$result = mysqli_query($baglanti, $sql);

				if (mysqli_num_rows($result) > 0) {

				// mysqli_fetch_assoc() fonksiyonu SQL sorgusunda etkilenen satırı dizi şeklinde geri döndürür. Dönüş değeri olarak dizi(array) döndürür.
					while($row = mysqli_fetch_assoc($result)) {

						echo $row["kitapAdi"]." adlı kitap sistemimizde mevcuttur, detaylar için ".$row["telefonlar"]." no'lu numarayı arayaınız". "<br>";
						header("Refresh: 5; url=http://localhost/Kitap%20Payla%c5%9f%c4%b1m%20Projesi/KitapSorgula.php");
					}
				} 
				else {

					echo $kitaplar. " adlı kitap sistemimizde mevcuttur değildir";
					header("Refresh: 5; url=http://localhost/Kitap%20Payla%c5%9f%c4%b1m%20Projesi/KitapSorgula.php");
				}
			}
		}
		?>
		
	</center>
</body>
</html>
