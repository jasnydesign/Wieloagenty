<?php

class AgentShop{
    
public function OffertList($price_min,$price_max,$forwho,$peryferia,$where_work){
if ($forwho == '1') {
	
	if ($where_work == 'mobilnie') {

		if ($peryferia == 'tak') {

			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 1000 and ram >= 1 and karta_graficzna >=1 and bateria >=8000 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
			
		}elseif ($peryferia == 'nie') {

			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 1000 and ram >= 1 and karta_graficzna >=1 and bateria >=8000 ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());

		}

	}elseif ($where_work == 'stacjonarnie') {
		if ($peryferia == 'tak') {

			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 1000 and ram >= 1 and karta_graficzna >=1 and bateria >=5000 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";

			$result = mysql_query($query) or die(mysql_error());
		}elseif ($peryferia == 'nie') {

			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 1000 and ram >= 1 and karta_graficzna >=1 and bateria >=5000 ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());

		}
	}

}elseif ($forwho == '2') {
	if ($where_work == 'mobilnie') {

		if ($peryferia == 'tak') {
			
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 3000 and ram >= 6 and karta_graficzna >=2 and bateria >=8000 and dysk >=1000 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());

		}elseif ($peryferia == 'nie') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 3000 and ram >= 6 and karta_graficzna >=2 and bateria >=8000 and dysk >=1000 ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}

	}elseif ($where_work == 'stacjonarnie') {
		if ($peryferia == 'tak') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 3000 and ram >= 6 and karta_graficzna >=2 and bateria >=7000 and dysk >=1000 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}elseif ($peryferia == 'nie') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 3000 and ram >= 6 and karta_graficzna >=2 and bateria >=7000 and dysk >=1000 ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}
	}
}elseif ($forwho == '3') {
	if ($where_work == 'mobilnie') {

		if ($peryferia == 'tak') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 4000 and ram >=12 and karta_graficzna >=4 and bateria >=8000 and dysk >=500 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}elseif ($peryferia == 'nie') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 4000 and ram >=12 and karta_graficzna >=4 and bateria >=8000 and dysk >=500 ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}

	}elseif ($where_work == 'stacjonarnie') {
		if ($peryferia == 'tak') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 4000 and ram >=12 and karta_graficzna >=4 and bateria >=7500 and dysk >=500 and (myszka = '1' OR klawiatura = '1' OR monitor = '1') ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}elseif ($peryferia == 'nie') {
			$query="select * from products where price_min >= '$price_min' and price_max <= '$price_max' and procesor >= 4000 and ram >=12 and karta_graficzna >=4 and bateria >=7500 and dysk >=500  ORDER BY price_min DESC";
			$result = mysql_query($query) or die(mysql_error());
		}
	}
}

return @$result;
}

}

class Negocjator{

	public function negotiations($price_min,$price_max){
		$cena;
		$num1=rand($price_min,$price_max);
		$num2=rand($price_min,$num1);
		$num3=rand($price_min,$num2);
		if ($price_min<=$num1 && $price_max>=$num1) {
			$cena=$num1;
			return $cena;
		} elseif (($price_min<=$num2) && ($price_max>=$num2)){
			$cena=$num2;
	
			return $cena;
		} elseif ($price_min<=$num3 && $price_max>=$num3){
			$cena=$num3;
			return $cena;
		} else{
			$_SESSION['Shop']=$mas['agent_id'];
			descPrice($mas);
			return $cena;
		}
	}

}

class AgentSeller{

	public $id;
	public $procesor;
	public $ram;
	public $kartagraficzna;
	public $dysk;
	public $cena;

	public function getoffer($price_min,$price_max,$forwho,$peryferia,$where_work,$waga_forwho,$waga_peryferia,$waga_where_work)
	{
		$agentShop = new AgentShop();
		$negocjator = new Negocjator();
        $result = $agentShop->OffertList($price_min,$price_max,$forwho,$peryferia,$where_work); 
		$result2 = mysql_fetch_array($result); 
        do{
			if($waga_peryferia == 3)
			{
                if($result2["myszka"] == '1' && $result2["klawiatura"] == '1' && $result2["monitor"] && '1'){
					$cena = $negocjator->negotiations($result2["price_min"],$result2["price_max"]);
					$this->id = $result2["Id"];
					$this->procesor = $result2["procesor"];
					$this->ram = $result2["ram"];
					$this->kartagraficzna = $result2["karta_graficzna"];
					$this->dysk = $result2["dysk"];
					$this->cena = $cena;
			}
			}elseif($waga_peryferia == 2){
				if($result2["myszka"] == '1' && $result2["klawiatura"] == '1' || $result2["monitor"] && '1'){
					$cena = $negocjator->negotiations($result2["price_min"],$result2["price_max"]);
					 $this->id = $result2["Id"];
					 $this->procesor = $result2["procesor"];
					 $this->ram = $result2["ram"];
					 $this->kartagraficzna = $result2["karta_graficzna"];
					 $this->dysk = $result2["dysk"];
					 $this->cena = $cena;
			 }
			}elseif($waga_peryferia == 1){
				if($result2["myszka"] == '1' || $result2["klawiatura"] == '1' || $result2["monitor"] || '1'){	
					$cena = $negocjator->negotiations($result2["price_min"],$result2["price_max"]);
				$this->id = $result2["Id"];
				$this->procesor = $result2["procesor"];
				$this->ram = $result2["ram"];
				$this->kartagraficzna = $result2["karta_graficzna"];
				$this->dysk = $result2["dysk"];
				$this->cena = $cena;

			 }
			 }
		 	} while($result2 = mysql_fetch_array($result) );    	
			}


		public function zwroc()
		{
				public $id;
				public $procesor;
				public $ram;
				public $kartagraficzna;
				public $dysk;
				public $cena;
				if($this->id == null){
				echo "Nie znaleziono produktu";
				}else
				{?>
					<form action="index.php" method="POST">
					<div class="card-body"> <input type="hidden" name="cena" value="<?php echo $this->id;?>"><input type="hidden" name="id_product" value="<?php echo $result2["id_item"];?>">
					<h5 class="card-title">Przedmiot : <?php echo $this->procesor; ?></h5> <input type="hidden" value="<?php echo $result2["name"]; ?>" name="name">
					<p class="card-text">Taktowanie procesora :<?php echo $this->ram; ?></p> <input type="hidden" value="<?php echo $result2["procesor"]; ?>" name="procesor">
					<p class="card-text">Ilość Pamięci RAM :<?php echo $this->kartagraficzna; ?></p> <input type="hidden" value="<?php echo $result2["ram"]; ?>" name="ram">
					<p class="card-text">Karta Graficzna pamięć VRAM : <?php echo $this->dysk; ?></p> <input type="hidden" value="<?php echo $result2["karta_graficzna"]; ?>" name="karta_graficzna">
					<p class="card-text">Pojemność dysku : <?php echo $this->cena; ?></p> <input type="hidden" value="<?php echo $result2["dysk"]; ?>" name="dysk">
					</div>
				<div class="card-footer text-muted">
				<input Type="submit" name="submit2" class="btn btn-success" value="Kup Teraz">
				</div>
				</form>
				<?php}
		}


	}
	