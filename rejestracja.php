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
				<li id="aktywny"><a href="rejestracja.php">Rejestracja</a></li>
				<li><a href="oferta_samochodow.php">Oferta samochodów</a></li>
				<li><a href="aktywne_wypozyczenia.php">Wypożyczenia</a></li>
				<li><a href="zwroc_pojazd.php">Zwróć pojazd</a></li>
			</ul>
		</div>
		<div id="main">
			<form action="" method="post">
				<table>
					<tr>
						<td class="napis"><span style="font-size: 25px;">I</span>mię:</td>
						<td><input type="text" name="imie" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">N</span>azwisko:</td>
						<td><input type="text" name="nazwisko" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">P</span>esel:</td>
						<td><input type="number" name="PESEL" class="rejestracja" onKeyDown="if(this.value.length==11) return false;"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">U</span>lica:</td>
						<td><input type="text" name="ulica" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">N</span>umer domu:</td>
						<td><input type="text" name="numer_domu" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">N</span>umer mieszkania:</td>
						<td><input type="text" name="numer_mieszkania" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">K</span>od pocztowy:</td>
						<td><input type="text" name="kod_pocztowy" class="rejestracja"></td>
					</tr>
					<tr>
						<td class="napis"><span style="font-size: 25px;">M</span>iejscowość:</td>
						<td><input type="text" name="miejscowosc" class="rejestracja"></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><input type='submit' value='Zarejestruj' name='klient' class="przycisk"></td>
					</tr>
				</table>
				<?php 
					if (isset($_POST['klient'])) {
						 wprowadzanie_klienta();
					}
				?>
			</form>	
				<?php 
				function wprowadzanie_klienta() {
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "wypozyczalnia";
					$connection = mysqli_connect($hostname, $username, $password, $dbname);
					if (!$connection){
						die("Błąd połączenia: ".mysqli_connect_error());
					}
					$imie = $_POST['imie'];
					$nazwisko = $_POST['nazwisko'];
					$pesel = $_POST['PESEL'];
					$ulica = $_POST['ulica'];
					$numer_domu = $_POST['numer_domu'];
					$numer_mieszkania = $_POST['numer_mieszkania'];
					$kod_pocztowy =$_POST['kod_pocztowy'];
					$miejscowosc = $_POST['miejscowosc'];
					if(!empty($imie AND $nazwisko AND $pesel AND $ulica AND $kod_pocztowy AND $miejscowosc)) {
					$zapytanie = "INSERT INTO klient (imie, nazwisko, PESEL, ulica, numer_domu, numer_mieszkania, kod_pocztowy, miejscowosc) VALUES ('$imie', '$nazwisko', '$pesel', '$ulica', '$numer_domu', '$numer_mieszkania', '$kod_pocztowy', '$miejscowosc')";
					$wypisanie = mysqli_query($connection, $zapytanie);
					}
					mysqli_close($connection);
				}	
				?>
		</div>
	</body>
</html>