<?php

include_once 'functions/db.ini.php';

//usuwanie umówy
if (isset($_POST['action']) and $_POST['action'] == 'Usuń umowę') {

	//Pobierz paramtetr id umowy wybranego elementu
	$id_con = $_POST['id_con'];

	//Pobieranie podstawowych danych umowy
	$sql = "DELETE FROM source
					 WHERE id_con = '{$id_con}';";
	$sou = pg_query($sql);
			

	$sql2 = "DELETE FROM with_dev
			 WHERE id_con = '{$id_con}';";
	$dev = pg_query($sql2);


	try {
		$sql3 = "DELETE FROM contract_offer
			 WHERE id_con = '{$id_con}';";
		$con = pg_query($sql3);

	} catch (Exception $e) {
		
	}

	$sql4 = "SELECT * FROM contracts
			 WHERE id_con = '{$id_con}'";
	$number = pg_query($sql4);
	$n      = pg_fetch_array($number);
	$number_con = $n['nr_con'];

	$sql5 = "DELETE FROM contracts
			 WHERE id_con = '{$id_con}';";
	$cont = pg_query($sql5);

	$message = 'Umowa nr ' . $number_con . ' została usunięta';
	include_once 'accepted.php';
	exit();
}



if (isset($_GET['contract'])) {


	//Pobierz paramtetr id umowy wybranego elementu
	$id_con = $_GET['id_con'];


	//Pobieranie podstawowych danych umowy
	$sql = "SELECT a.id_con, a.nr_con, a.date_con, b.or_source, d.name_off FROM contracts a
			 INNER JOIN source b
			 ON a.id_con = b.id_con
			 INNER JOIN contract_offer c
			 ON a.id_con = c.id_con
			 INNER JOIN offer d
			 ON c.id_off = d.id_off
			 WHERE a.id_con = '{$id_con}'";
		$con = pg_query($sql);
		$c = pg_fetch_array($con);

		$number = $c['nr_con'];
		$date   = $c['date_con'];

		if($c['or_source'] === 't'){
			$poz = 'Pozyskanie';
		}
		else{
			$poz = 'Zatrzymanie';
		}

		$type = $c['name_off'];

	//Wyszukiwanie czy umowa z telefone
	$sql2 = "SELECT * FROM contracts a
			 LEFT JOIN with_dev b
			 ON a.id_con = b.id_con
			 WHERE a.id_con = {$id_con}";
		$with = pg_query($sql2);
		$w = pg_fetch_array($with);

		$imei = $w['imei'];

	//Jeżeli umowa z telefonem to pobierz dane urządzenia
		if ($imei != NULL) {
			$sql2 = "SELECT * FROM contracts a
			 INNER JOIN with_dev b
			 ON a.id_con = b.id_con
			 INNER JOIN devices c
			 ON b.id_dev = c.id_dev
			 WHERE a.id_con = '{$id_con}'";
			$dev = pg_query($sql2);
			$d = pg_fetch_array($dev);
		}
		else {
			//Jeżeli umowa jest bez telefonu, w tabeli pojawi się poniższy komunikat
			$mess = 'Umowa bez urządzenia';
		}

		$name_dev = $d['name_dev'];

		


	include_once 'contracts/contract.php';
	exit();
}


//Raportowanie
if (isset($_GET['raport'])) {
	include_once 'raports/raport.php';
	exit();
}


//Raportowanie
if (isset($_GET['plk_with'])) {

	//Raportowanie umowy z telefonem

	if (isset($_POST['action']) and $_POST['action'] == 'Raportuj') {
		

		$date = $_POST['date'];
		$number_con= $_POST['number_con'];
		$source = $_POST['source'];
		$offer = $_POST['offer'];
		$device = $_POST['device'];
		$imei = $_POST['imei'];

		//Krok 1 -Wprowadź nr umowy i datę
		$sql = "INSERT INTO contracts VALUES
				(DEFAULT, '{$number_con}', '{$date}');";
		pg_query($sql);



		//Krok 2 -Znajdz dodany kontrakt i dopisz czy pozyskanie
		$sql2 = "SELECT * FROM contracts
				 WHERE nr_con = '{$number_con}';";
		$con = pg_query($sql2);
		$c = pg_fetch_array($con);

		
		if($source == 'Pozyskanie'){
			$sql3 = "INSERT INTO source VALUES
				({$c['id_con']}, TRUE);";
			pg_query($sql3);
			
		}
		else{
			$sql4= "INSERT INTO source VALUES
				({$c['id_con']}, FALSE);";
			pg_query($sql4);
		}

		//Krok 3 - Wyszukaj dodawane urządzenie do kontraktu
		$sql5 = "SELECT * FROM devices
				 WHERE name_dev = '{$device}';";
		$dev = pg_query($sql5);
		$d = pg_fetch_array($dev);

		//Krok 5 - Dodaj imei do kontraktu

		$sql6 = "INSERT INTO with_dev VALUES
				({$c['id_con']}, {$d['id_dev']}, '{$imei}');";
		pg_query($sql6);


		//Jaki typ oferty
		$sql7 = "SELECT * FROM offer
				 WHERE name_off = '{$offer}';";
		$off = pg_query($sql7);
		$o = pg_fetch_array($off);


		$sql8 = "INSERT INTO contract_offer VALUES
				({$c['id_con']}, {$o['id_off']});";
		pg_query($sql8);



		$message = 'Umowa nr ' . $number_con . ' została zaraportowana';
		include_once 'accepted.php';
		exit();

	}


	$sql = "SELECT * FROM devices";
	$dev = pg_query($sql);
	$de = pg_fetch_all($dev);

	$sql2 = "SELECT * FROM offer";
	$off = pg_query($sql2);
	$of = pg_fetch_all($off);

	include_once 'raports/raport_tel.php';
	exit();
}

//Raportowanie
if (isset($_GET['plk_self'])) {

	//Raportowanie umowy z telefonem

	if (isset($_POST['action']) and $_POST['action'] == 'Raportuj') {
		

		$date = $_POST['date'];
		$number_con= $_POST['number_con'];
		$source = $_POST['source'];
		$offer = $_POST['offer'];

		//Krok 1 -Wprowadź nr umowy i datę
		$sql = "INSERT INTO contracts VALUES
				(DEFAULT, '{$number_con}', '{$date}');";
		pg_query($sql);



		//Krok 2 -Znajdz dodany kontrakt i dopisz czy pozyskanie
		$sql2 = "SELECT * FROM contracts
				 WHERE nr_con = '{$number_con}';";
		$con = pg_query($sql2);
		$c = pg_fetch_array($con);

		
		if($source == 'Pozyskanie'){
			$sql3 = "INSERT INTO source VALUES
				({$c['id_con']}, TRUE);";
			pg_query($sql3);
			
		}
		else{
			$sql4= "INSERT INTO source VALUES
				({$c['id_con']}, FALSE);";
			pg_query($sql4);
		}

		//Jaki typ oferty
		$sql7 = "SELECT * FROM offer
				 WHERE name_off = '{$offer}';";
		$off = pg_query($sql7);
		$o = pg_fetch_array($off);


		$sql8 = "INSERT INTO contract_offer VALUES
				({$c['id_con']}, {$o['id_off']};";
		pg_query($sql8);

		$message = 'Umowa nr ' . $number_con . ' została zaraportowana';
		include_once 'accepted.php';
		exit();

	}


	$sql2 = "SELECT * FROM offer";
	$off = pg_query($sql2);
	$of = pg_fetch_all($off);

	include_once 'raports/raport_beztel.php';
	exit();
}

//Zarządzanie danymi

//Przypisanie liczb do miesięcy w tablicy asocjacyjnej
$months = array(1 => 'Styczeń', 
			   2 => 'luty',
			   3 => 'marzec', 
			   4 => 'kwiecień', 
			   5 => 'maj', 
			   6 => 'czerwiec', 
			   7 => 'lipiec',
			   8 => 'sierpień', 
			   9 => 'wrzesień', 
			   10 => 'październik',
			   11 => 'listopad',
			   12 => 'grudzień');
//Obecny miesiąc
$curr_month =  Date('m');
//Obcny miesiąc
$curr_year = Date('Y');


//Znajdź obecny miesiąc i przypisz do niego nazwę
for ($i=1; $i < 13 ; $i++) { 

	if($i == $curr_month){
		 $m = $months[$i]; //Przypisz nazwę miesiąca
	}
}


//Pracownicy
if (isset($_GET['workers'])) {
	include_once 'workers.php';
	exit();


/*SELECT a.name, a.surname, a.email, c.sfid, e.phone FROM users a
INNER JOIN sfid_users b
ON a.id = b.id_user
INNER JOIN sfid c
ON b.id_user = c.id_sfid
INNER JOIN user_phone d
ON a.id = d.id_user
INNER JOIN phones e
ON d.id_user = e.id_phone
ORDER BY sfid DESC;
*/
}

$sql = "SELECT * FROM contracts a
		LEFT JOIN source b
		ON a.id_con = b.id_con
		ORDER BY a.date_con DESC
		LIMIT 5";
$con = pg_query($sql);
$co= pg_fetch_all($con);

//var_dump($co);


//Plany na aktualny miesiąc



try{
	$sql2 = "SELECT b.plan_name, c.month, d.year, a.amount FROM month_plan a
			INNER JOIN plans b
			ON a.id_plan = b.id_plan
			INNER JOIN months c
			ON a.id_month = c.id_month
			INNER JOIN years d
			ON a.id_year = d.id_year
			WHERE b.plan_name = 'telefony' and c.month = '{$m}' and d.year = '{$curr_year}';";
	$tel = pg_query($sql2);
	$t   = pg_fetch_array($tel);
	if($t == false){
		$t['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$t['plan_name'] = 'Telefony';
	}
}
catch (Exception $e) {
	
}

//Policz minimum do wypłaty premii
if(is_string($t['amoumnt']) != false){
	$min_plan = ceil($t['amount'] * 0.8);
}
else{
	$min_plan = 'Jeszce nie wprowadzono planu na telefony';
}

$sql3 = "SELECT b.plan_name, c.month, d.year, a.amount FROM month_plan a
		INNER JOIN plans b
		ON a.id_plan = b.id_plan
		INNER JOIN months c
		ON a.id_month = c.id_month
		INNER JOIN years d
		ON a.id_year = d.id_year
		WHERE b.plan_name = 'nks' and c.month = '{$m}' and d.year = '{$curr_year}';";
$nks = pg_query($sql3);
$n   = pg_fetch_array($nks);
if($n == false){
		$n['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$n['plan_name'] = 'nks';
	}

//Ilość telefonów w danym miesiącu

$date = $curr_year . '-' . $curr_month;

for ($i=1; $i < 13; $i++) { 										
	if((($i%2 == 1) AND ($i < 8 ) OR ($i%2 == 0) AND ($i > 7 )) AND ('0' . $i) == $curr_month){		 //Wybierz miesiące, które mają 31 dni


			  $start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca
			 
			  if($i < 10){
			  	$end_mon = $curr_year . '-' . '0' . $i . '-' . '31'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
			  }
			  else{
			  	$end_mon = $curr_year . '-' . $i . '-' . '31'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
			  }


			 try{
				 $sql4 = "SELECT COUNT(b.id_dev) 
				 FROM contracts a
				 INNER JOIN with_dev b
				 ON a.id_con = b.id_con	
				 INNER JOIN devices c
				 ON b.id_dev = c.id_dev
				 INNER JOIN category_dev d
				 ON c.id_dev = d.id_dev
				 WHERE d.id_dev = 1 AND date_con >= '{$start_mon}' AND date_con <= '{$end_mon}';";
				 $amo = pg_query($sql4);
				 $a   = pg_fetch_array($amo);
			}
			catch (Exception $e) {
				 $a = 0;
			}
	}
	else{
			
		if(('0' . $i) == $curr_month){	
			 //dla pozostałych miesięcy
			 $start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca
			  
			  if($i < 10){
			  	$end_mon = $curr_year . '-' . '0' . $i . '-' . '31'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
			  }
			  else{
			  	$end_mon = $curr_year . '-' . $i . '-' . '31'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
			  }

			 try{
				 $sql4 = "SELECT COUNT(b.id_dev) 
				 FROM contracts a
				 INNER JOIN with_dev b
				 ON a.id_con = b.id_con	
				 INNER JOIN devices c
				 ON b.id_dev = c.id_dev
				 INNER JOIN category_dev d
				 ON c.id_dev = d.id_dev
				 WHERE d.id_dev = 1 AND date_con >= '{$start_mon}' AND date_con <= '{$end_mon}';";
				 $amo = pg_query($sql4);
				 $a   = pg_fetch_array($amo);
				}
				catch (Exception $e) {
				 $a = 0;
			}
		}
	}

}




include_once 'home.php';