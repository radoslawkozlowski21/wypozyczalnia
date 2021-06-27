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
				<li id="aktywny"><a href="zwroc_pojazd.php">Zwróć pojazd</a></li>
			</ul>
		</div>
		<div id="main">
			<form action="" method="post">
				<table>
					<tr>
						<td class="napis"><span style="font-size: 25px;">P</span>ESEL:</td>
						<td><input type="number" name="pesel" class="rejestracja" onKeyDown="if(this.value.length==11) return false;"></td>
					</tr>
					<tr>
						<td class="napis" style="padding-right: 20px;"><span style="font-size: 25px;">I</span>D zwracanego pojazdu:</td>
						<td><input type="number" name="pojazd" class="rejestracja"></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><input type="submit" value="Zwróć" name="wypozyczenie" class="przycisk"></td>
					</tr>
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
				$pojazd = $_POST['pojazd'];
				$today = date("Y-n-j");
				if(!empty($pesel AND $pojazd)) {
				$zapytanie = "UPDATE wypozyczenie, pojazd SET wypozyczenie.data_do = '$today', pojazd.wypozyczony = 0 WHERE wypozyczenie.pojazd_id = $pojazd AND klient_id = (SELECT klient_id FROM klient WHERE PESEL=$pesel) AND wypozyczenie.data_do IS NULL;";
				$zapytanie_dwa = "SELECT (ROUND((DATEDIFF (data_do, data_od) + 1)*(pojazd.wartosc_katalogowa * 0.0001), 2)) AS `Koszt` FROM wypozyczenie JOIN klient ON wypozyczenie.klient_id = klient.klient_id JOIN pojazd ON wypozyczenie.pojazd_id = pojazd.pojazd_id WHERE PESEL=$pesel AND wypozyczenie.data_do = '$today' AND wypozyczenie.pojazd_id = $pojazd ORDER BY wypozyczenie_id DESC LIMIT 1";
				if (isset($_POST['wypozyczenie'])) {
					$wypisanie = mysqli_query($connection, $zapytanie);	
					$wypisaniee = mysqli_query($connection, $zapytanie_dwa);
					while ($wierszz = mysqli_fetch_assoc($wypisaniee)){
						$koszt = $wierszz['Koszt'];
						echo '<tr><td colspan="2" align="middle" class="napis" style="padding-top: 20px;"><span style="font-size: 25px;">K</span>oszt wypożyczenia wynosi: '.$koszt.' zł.</td></tr>';
					}
				}
				}
				else {
					echo '<tr><td colspan="2" align="middle" class="napis" style="padding-top: 20px;"><span style="font-size: 25px;">P</span>roszę wpisać brakujące wartości!</td></tr>';
				}
				mysqli_close($connection);
			}
			echo '</table>';
			?>
		</div>
	</body>
</html>