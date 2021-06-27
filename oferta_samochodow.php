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
				<li id="aktywny"><a href="oferta_samochodow.php">Oferta samochodów</a></li>
				<li><a href="aktywne_wypozyczenia.php">Wypożyczenia</a></li>
				<li><a href="zwroc_pojazd.php">Zwróć pojazd</a></li>
			</ul>
		</div>
		<div id="filtr">
			<table>
					<tr>
						<form action="" method="post">
							<td>
								<span class="napis"><span style="font-size: 25px;">R</span>odzaj napędu:</span>
								<select name="naped" class="rejestracja">
									<option value=""></option>
									<option value="Tylne koła">Tylne koła</option>
									<option value="Przednie koła">Przednie koła</option>
									<option value="4x4">4x4</option>
								</select>
							</td>
							<td>
								<span class="napis" style="margin-left: 10px;"><span style="font-size: 25px;">R</span>odzaj paliwa:</span>
								<select name="paliwo" class="rejestracja">
									<option value=""></option>
									<option value="Benzyna">Benzyna</option>
									<option value="Diesel">Diesel</option>
									<option value="Elektryczny">Elektryczny</option>
								</select>
							</td>
							<td>
								<span class="napis" style="margin-left: 10px;"><span style="font-size: 25px;">R</span>odzaj skrzyni biegów:</span>
								<select name="skrzynia" class="rejestracja">
									<option value=""></option>
									<option value="Automatyczna">Automatyczna</option>
									<option value="Manualna">Manualna</option>
								</select>
							</td>
							<td>
								<input type="reset" class="przycisk" style="margin-left: 40px;">
								<input type="submit" name="filtr" class="przycisk">
							</td>
						</form>
					</tr>
				</table>
		</div>
		<div id="main">
			<?php 
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "wypozyczalnia";
				$connection = mysqli_connect($hostname, $username, $password, $dbname);
				if (!$connection){
					die("Błąd połączenia: ".mysqli_connect_error());
				}
				$zapytanie = "SELECT * FROM pojazd JOIN model ON pojazd.model = model.model_id JOIN marka ON model.marka_id = marka.marka_id WHERE pojazd.wypozyczony = 0";
				if(isset($_POST['filtr'])){
				    if(!empty($_POST['naped'])) {
				        $wybrany_naped = $_POST['naped'];
				        $zapytanie .= " AND rodzaj_napedu = '$wybrany_naped'";
				    }
				    if(!empty($_POST['paliwo'])) {
				        $wybrane_paliwo = $_POST['paliwo'];
				        $zapytanie .= " AND rodzaj_paliwa = '$wybrane_paliwo'";
				    }
				    if(!empty($_POST['skrzynia'])) {
				        $wybrana_skrzynia = $_POST['skrzynia'];
				        $zapytanie .= " AND rodzaj_skrzyni_biegow = '$wybrana_skrzynia'";
				    }
    			}
				$wypisanie = mysqli_query($connection, $zapytanie);
				while ($wiersz = mysqli_fetch_assoc($wypisanie)){
					$sciezka = $wiersz['zdjecie'];
					$id = $wiersz['pojazd_id'];
					$model_marka = $wiersz['nazwa_marki']." ".$wiersz['nazwa_modelu'];
					$rok = $wiersz['rok_produkcji'];
					$pozostale = "Moc silnika: ".$wiersz['moc_silnika']." KM<br />Paliwo: ".$wiersz['rodzaj_paliwa']."<br />Napęd: ".$wiersz['rodzaj_napedu']."<br />Skrzynia: ".$wiersz['rodzaj_skrzyni_biegow'];
					
					echo "<div class='pojazd'><img src='zdjecia/$sciezka'><br/><h1>$model_marka</h1><h2>$rok</h2><h3 style='margin-bottom: 20px;'>$pozostale</h3><a href='wybor.php?id=$id'>Wypożycz</a></div>";
				}
				mysqli_close($connection);
			?>
		</div>
	</body>
</html>