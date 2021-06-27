<html>
	<head>
		<meta charset="utf-8">
		<title>Blueberry</title>
		<link rel="stylesheet" href="style.css">

	</head>
	<body>
		<div id="baner">
			<h1>BLUEBERRY</h1>
			<h2>Wypożyczalnia samochodów</h2>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html">Strona główna</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
				<li><a href="oferta_samochodow.php">Oferta samochodów</a></li>
				<li id="aktywny"><a href="aktywne_wypozyczenia.php">Wypożyczenia</a></li>
				<li><a href="zwroc_pojazd.php">Zwróć pojazd</a></li>
			</ul>
		</div>
		<div id="main">
			<form action="" method="post">
				<table>
					<tr>
						<td class="napis" style="padding-right: 20px;"><span style="font-size: 25px;">P</span>ESEL: </td>
						<td><input type="number" name="pesel" class="rejestracja" onKeyDown="if(this.value.length==11) return false;"></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><input type="submit" value="Wyszukaj" name="wypozyczenie" class="przycisk"></td>
					</tr>
				</table>
				<?php 
					if (isset($_POST['wypozyczenie'])) {
						 zwrot();
					}
				?>
			</form>	
				<?php 
				function zwrot() {
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "wypozyczalnia";
					$connection = mysqli_connect($hostname, $username, $password, $dbname);
					if (!$connection){
						die("Błąd połączenia: ".mysqli_connect_error());
					}
					$pesel = $_POST['pesel'];
					if(!empty($pesel)) {
					$zapytanie = "SELECT * FROM wypozyczenie JOIN klient ON wypozyczenie.klient_id = klient.klient_id JOIN pojazd ON pojazd.pojazd_id = wypozyczenie.pojazd_id JOIN model ON pojazd.model = model.model_id WHERE klient.PESEL = $pesel AND wypozyczenie.data_do IS NULL";
					$wypisanie = mysqli_query($connection, $zapytanie);
					echo "<br /><div id='aktywne_wypozyczenia'><h2><span style='font-size: 25px;'>A</span>ktywne wypożyczenia:</h2>";
					while ($wiersz = mysqli_fetch_assoc($wypisanie)){
					$id_wypozyczenie = $wiersz['wypozyczenie_id'];
					$id_pojazdu = $wiersz['pojazd_id'];
					$klient = $wiersz['klient_id'];
					$pojazd = $wiersz['nazwa_modelu'];
					$data_od = $wiersz['data_od'];
					echo "<div class='wypozyczenie_jeden'>ID pojazdu: $id_pojazdu; Nazwa modelu: $pojazd; Data wypożyczenia: $data_od</div>";
					}
					echo "</div><br /><div id='historia_wypozyczenia'><h2><span style='font-size: 25px;'>H</span>istoria wypożyczeń:</h2>";
					$zapytanie = "SELECT * FROM wypozyczenie JOIN klient ON wypozyczenie.klient_id = klient.klient_id JOIN pojazd ON pojazd.pojazd_id = wypozyczenie.pojazd_id JOIN model ON pojazd.model = model.model_id WHERE klient.PESEL = $pesel AND wypozyczenie.data_do IS NOT NULL";
					$wypisanie = mysqli_query($connection, $zapytanie);
					while ($wiersz = mysqli_fetch_assoc($wypisanie)){
					$id_wypozyczenie = $wiersz['wypozyczenie_id'];
					$klient = $wiersz['klient_id'];
					$pojazd = $wiersz['nazwa_modelu'];
					$data_od = $wiersz['data_od'];
					$data_do = $wiersz['data_do'];
					echo "<div class='wypozyczenie_jeden'>Nazwa modelu: $pojazd; Data wypożyczenia: $data_od; Data zwrotu: $data_do</div>";
					}
					echo "</div>";
					}
					else {
						echo "<p class='napis' style='text-align: center; padding-top: 20px;'><span style='font-size: 25px;'>P</span>roszę wpisać numer PESEL!</p>";
					}
					mysqli_close($connection);
				}
				?>
		</div>
	</body>
</html>