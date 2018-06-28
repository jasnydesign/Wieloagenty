<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<title>BookAgents</title>
</head>
	<body>
<?php 
require 'connection.php';
// require 'functions.php';
include 'Classes.php';

@$price_min = $_POST['price_min'];
@$price_max = $_POST['price_max'];

@$forwho = $_POST['forwho'];
@$waga_forwho = $_POST['waga_forwho'];

@$peryferia = $_POST['peryferia'];
@$waga_peryferia = $_POST['waga_peryferia'];

@$where_work = $_POST['where_work'];
@$waga_where_work = $_POST['waga_where_work'];


$_SESSION['price_min']= $price_min ;
$_SESSION['price_max']= $price_max ;

$_SESSION['forwho']= $forwho ;
$_SESSION['waga_forwho']= $waga_forwho ;

$_SESSION['peryferia']= $peryferia ;
$_SESSION['waga_peryferia']= $waga_peryferia ;

$_SESSION['where_work']= $where_work ;
$_SESSION['waga_where_work']= $waga_where_work ;

// echo 'cena od'.$price_min.'do:'.$price_max.'   dla kogo?'.$forwho.'  peryferia?:'.$peryferia.' gdzie pracujesz?'.$where_work;

if (isset($_POST['Przesyl'])) {
	$agent = new AgentSeller();
	$agent->getoffer($price_min,$price_max,$forwho,$peryferia,$where_work,$waga_forwho,$waga_peryferia,$waga_where_work);
	$agent->zwroc();
}



// zakup produktu
if (isset($_POST['name'])) {
	@$name = $_POST['name'];
	@$procesor = $_POST['procesor'];
	@$ram = $_POST['ram'];
	@$karta_graficzna = $_POST['karta_graficzna'];
	@$dysk = $_POST['dysk'];
	@$bateria = $_POST['bateria'];
	@$cena = $_POST['cena'];
	@$id_product = $_POST['id_product'];
	$str = "INSERT INTO sold_real (id,name,cena, procesor, ram, karta_graficzna, dysk, bateria, id_product) VALUES (NULL,'$name','$cena', '$procesor', '$ram', '$karta_graficzna', '$dysk', '$bateria', '$id_product')";
	$query=mysql_query($str);
}


 ?>

<section class="formularz">
	<div class="container">
			<div class="row">


				<form action="" style=" width: 100%;" method="post">



						<div class="form-group">
						<h3>Wpisz zakres cenowy</h3>
							<div class="row">
									<div class="col-md-6">

									<label for="price_min">Od:</label>
									<input type="text" class="form-control" id="price_min" name="price_min">

								</div>
								<div class="col-md-6">

									<label for="price_max">Do:</label>
									<input type="text" class="form-control" id="price_max" name="price_max">
									
								</div>
							</div>
						</div>

						  <div class="form-group">

							<div class="row">
								<div class="col-md-6">
									<label for="forwho">Dla kogo? Do czego?</label>
									<select class="form-control" id="forwho" name="forwho">
									  <option value="1">Do przeglądania internetu</option>
									  <option value="2">Dla graczy</option>
									  <option value="3">Dla grafików</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="waga_forwho">Waga</label>
									<input type="range" min="1" max="3" class="form-control-range" id="waga_forwho" name="waga_forwho">
								</div>
							</div>


						  </div>



						  <div class="form-group">
						  	<div class="row">
						  		<div class="col-md-6">
								    <label for="peryferia">Urządzenia peryferyjne w zestawie?</label>
								    <select class="form-control" id="segment" name="peryferia">
								      <option value="tak">tak</option>
								      <option value="nie">nie</option>
								    </select>
						  		</div>
						  		<div class="col-md-6">
								    <label for="waga_peryferia">Waga</label>
								    <input type="range" min="1" max="3" class="form-control-range" id="waga_peryferia" name="waga_peryferia">
						  		</div>
						  	</div>

						  </div>

						  <div class="form-group">
						  	<div class="row">
						  		<div class="col-md-6">
								    <label for="where_work">Więcej czasu przy komputerze spędzam:</label>
								    <select class="form-control" id="where_work" name="where_work">
								      <option value="stacjonarnie">w domu</option>
								      <option value="mobilnie">na zewnątrz</option>
								    </select>
						  		</div>
						  		<div class="col-md-6">
								    <label for="waga_where_work">Waga</label>
								    <input type="range" min="1" max="3" class="form-control-range" id="waga_where_work" name="waga_where_work">
						  		</div>
						  	</div>

						  </div>

						  <input type="submit" class="btn" name="Przesyl">
	<a href="kupione.php" class="btn btn-light right">Zobacz kupione produkty</a>



				</form>

			</div>
	</div>



</section>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>