<?php

$valid_passwords = array ("rnwa" => "sifra");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// If arrives here, is a valid user.
echo "<p>Pozdrav $user.</p>";
echo "<p>Dobrodošli!</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Birt</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<script src="produkti.js"></script>
</head>
<body>
	<label>
		<input type="checkbox">
		<span class="menu"> <span class="hamburger"></span> </span>
		<ul>
			<li> <a href="index.php">HOME</a> </li>
			<li> <a href="uredi.php">UREDI</a> </li>
			<li> <a href="produkti.php">PRODUKTI</a> </li>
		</ul>
	</label>
	<div class="zaglavlje">
		<h1>PROJEKT BIRT</h1>
		<h2>Razvoj naprednih web aplikacija</h2>
	</div>

	<div class="all">
		<div class="row">
			<div class="column"><img src="img/classic.png" style="width:100%"></div>
			<div class="column"><img src="img/bus.jpg" style="width:100%"></div>
			<div class="column"><img src="img/vintage.jpg" style="width:100%"></div>
		</div>
		
		<div class="row">
			<div class="column"><img src="img/ships.jpg" style="width:100%"></div>
			<div class="column"><img src="img/trains.jpg" style="width:100%"></div>
			<div class="column"><img src="img/motorcycle.png" style="width:100%"></div>
		</div>

		<div class="trazilica">  
			<h3><b>Pretraga:</b></h3>
			<form> 
			Ime zaposlenika: <input id="target"  type="text">
			</form>
			<p><br> <span id="txtHint" ></span><span id="tableAll"></span></p>
		</div>

		<div class="men">
			<a href="https://fsre.sum.ba/">FSRE</a>
			<a href="https://github.com/Lana2021">Github</a>
			<a href="https://eclipse.github.io/birt-website/docs/what-is-birt/">BIRT</a>
		</div>

		<div class="main">
			<h2>BIRT</h2>
			<p>BIRT means Business Intelligence Reporting Tool, and that sums it up quite nicely. BIRT can pull and combine data from many different data sources (Databases, files, Java, Javascript, web services, etc..) and use this data for reporting (textual) and charting (visual).</p>
		</div>

		<div class="desno">
			<h2>TIM 3</h2>
			<p>Naša imena su Matej i Lana. Studenti smo 4. godine Računarstva na Sveučilištu u Mostaru. Studiramo smjer Programskog inženjerstva i informacijskih sustava.</p>
		</div>
	</div>


	<div class="dno"> © copyright Matej i Lana</div>

</body>
</html>                                		                            