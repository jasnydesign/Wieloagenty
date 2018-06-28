<?php
require 'connection.php';

function generate(){
	$array = array("Dell", "Lenovo", "Toshiba", "Asus","Acer","Apple","Samsung","HP");
	$array1 = array("Andrzej", "Bazylek", "Krzysztof", "Agent","Zbyszek","Krystian","Grażyna","Rafał","Krzysztof","Daniel");
	for ($i=0; $i <9 ; $i++) {
		$sql = "INSERT INTO agents (name) VALUES('$array1[$i]')";
if ($sql = mysql_query($sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
		for ($i=0; $i <3000 ; $i++) {
			$ManufacturerNumber=rand(0,7);
            $agents_id=rand(1,10);
            $procesor=rand(500,5000);
            $ram=rand(0,64);
            $kartagraf=rand(2,8);
            $dysk=rand(0,3000);
            $peryferia=rand(0,1);
            $bateria=rand(500,20000);
            $MinPrice=rand(2500,3000);
            $MaxPrice=rand(3000,3500);
			$myszka=rand(0,1);
			$klawiatura=rand(0,1);
			$monitor=rand(0,1);
            $shop=rand(1,20);

	$sql = "INSERT INTO products (procesor,ram,karta_graficzna,dysk,peryferia,bateria,price_min,price_max,shop,name,myszka,klawiatura,monitor) VALUES('$procesor','$ram','$kartagraf','$dysk','$peryferia','$bateria','$MinPrice','$MaxPrice','$shop','$array[$ManufacturerNumber]','$myszka','$klawiatura','$monitor') ";
	$result = mysql_query($sql) or die(mysql_error());
	var_dump($result);
	// if ($con->query($sql) === TRUE) {
	// 	echo "New record created successfully";
	// } else {
	// 	echo "Error: " . $sql . "<br>" . $con->error;
	// }
	}
	// $con->close();
}
  generate();