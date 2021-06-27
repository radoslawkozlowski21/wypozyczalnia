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
				<li><a href="aktywne_wypozyczenia.php">Wypożyczenia</a></li>
				<li><a href="zwroc_pojazd.php">Zwróć pojazd</a></li>
			</ul>
		</div>
		<div id="main">
			<?php 
				if (isset($_GET['wypozyczony'])) {
					echo "Samochód został wypożyczony!";
				} else {
					if(isset($_GET['pesel'])){
					 	wypozyczenie();
					} else {
			?>
			<form>
				<table>
					<tr>
						<td class="napis" style="padding-right: 20px;"><span style="font-size: 25px;">P</span>ESEL:</td>
						<td><input type="number" name="pesel" class="rejestracja"></td>
					</tr>
					<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
					<tr>
						<td colspan="2" align="right"><input type="submit" name="wypozyczenie" class="przycisk" value="Wypożycz"></td>
					</tr>
				</table>
			</form>
			<?php 
					}
				}
				function wypozyczenie() {
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "wypozyczalnia";
					$connection = mysqli_connect($hostname, $username, $password, $dbname);
					if (!$connection){
						die("Błąd połączenia: ".mysqli_connect_error());
					}
					$pesel = $_GET['pesel'];
					$zapytanie = "SELECT klient_id FROM klient WHERE PESEL=$pesel";
					if(!empty($pesel)) {
						$wypisanie = mysqli_query($connection, $zapytanie);
						$wiersz = mysqli_fetch_assoc($wypisanie);
						if ($wiersz == NULL) {
							echo "<div class='napis'><span style='font-size: 25px;'>B</span>łąd wypożyczenia. <span style='font-size: 25px;'>K</span>lient o podanym numerze PESEL nie istnieje";
						}
						else {
							$id = $wiersz['klient_id'];	
							$id_pojazd = $_GET['id'];
							$today = date("Y-n-j"); 
							$zapytanie_dwa = "INSERT INTO wypozyczenie (klient_id, pojazd_id, data_od) VALUES ($id, $id_pojazd, '$today')";
							$wypisanie = mysqli_query($connection, $zapytanie_dwa);
							$zapytanie_trzy = "UPDATE pojazd SET wypozyczony = 1 WHERE pojazd_id = $id_pojazd";
							$wypisanie = mysqli_query($connection, $zapytanie_trzy);
							echo "<div class='napis'><span style='font-size: 25px;'>P</span>ojazd został wypożyczony pomyślnie!</div>";
						}
					}
					else {
						echo "<div class='napis'><span style='font-size: 25px;'>P</span>roszę wpisać numer PESEL!";
					}
					mysqli_close($connection);
				}	
			?>
		</div>
	</body>
</html>