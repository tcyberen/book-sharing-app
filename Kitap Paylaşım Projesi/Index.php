<?php 
session_start(); 
?> 

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giriş Yap</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
	<?php

	if (!isset ($_SESSION['kAdi'])) { ?>

		<center>
			<br>

			<h1>Kitap Paylaşım ve Soruglama</h1>
			<br>

			<hr>

			<h2>Giriş Yap</h2>

			<form action="Index.php" method="POST">

				<label for="kAdi">Kullanıcı Adı:</label>
				<input type="text" name="kAdi" id="kAdi">

				<br>
				<br>

				<label for="kParola">Parola:</label>
				<input type="password" name="kParola" id="kParola">

				<br>
				<br>

				<input type="submit" value="Giriş Yap" name="kGiris" style="width:10%">

			</form>
			<hr>
			<br>

			<?php 
			if (isset($_POST['kGiris'])) {


				if ($_POST['kAdi']=="ada" && $_POST['kParola']=="123456") {

        			//Giriş bilgileri doğruysa session atama işlemleri yapıyoruz
					$_SESSION['kAdi']=$_POST['kAdi'];
					$_SESSION['kParola']=$_POST['kParola'];


					header("Location:Index.php?sonuc=#");
					exit;
				}
				else{

					header("Location:Index.php?sonuc=no");
					exit;
				}
			}

			if ($_GET['sonuc']=="no") {
				echo "<br>";

				echo "Giriş işlemi başarısız, lütfen tekrar deneyiniz.";

				header("Refresh: 5; url=http://localhost/Kitap%20Payla%C5%9F%C4%B1m%20Projesi/index.php");
			}
			else if ($_GET['sonuc']=="cikis") {
				echo "<br>";

				echo "Çıkış işlemi başarıyla yapıldı.";

				header("Refresh: 3; url=http://localhost/Kitap%20Payla%C5%9F%C4%B1m%20Projesi/index.php");
			}
		}
		else{
			?>
			<center>
				<br>

				
				<h1>Kullancı Paneli</h1>
				<br>
				<hr>
				<br>


				<p>Sayın <?php echo $_SESSION['kAdi'] ?>, hoşgeldiniz</p>

				<p>Kitap eklemek için <a href="KitapEkle.php">tıklayınız</a></p>
				<p>Kitap sorgulatmak için <a href="KitapSorgula.php">tıklayınız</a></p>

				<a href="Cikis.php"><button style="width:10%">Çıkış Yap</button></a>
				
				<br>
				<br>

				<hr>
				<br>
				<br>
				<footer>&copy; Copyright 2023 tcyberen</footer>

			</center>


			<?php 
		}
		?>

	</center>
</body>
</html>