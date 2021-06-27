<?php 
	$id = $_GET['id'];
?>
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
			<table id="wybor">
				<tr>
					<td style="padding-right: 15px;"><a href="wypozyczenie.php?id=<?php echo $id; ?>">Istniejący klient</a></td>
					<td style="padding-left: 15px;"><a href="rejestracja.php?id=<?php echo $id; ?>">Nowy klient</a></td>
				</tr>
			</table>
		</div>
	</body>
</html>