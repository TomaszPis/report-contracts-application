<?php

include_once 'functions/db.ini.php';

include 'functions/access.php';


 if (!userIsLoggedIn())
{
	include 'login.php';
	exit();
}

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


include 'index2.php';

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

	$sql9 = "DELETE FROM contracts_sfid 
			 WHERE id_con = '{$id_con}';";
	$sfid = pg_query($sql9);

	$sql10 = "DELETE FROM contracts_user 
			  WHERE id_con = '{$id_con}';";
	$user = pg_query($sql10);

	$message = 'Umowa nr ' . $number_con . ' została usunięta';
	include_once 'accepted.php';
	exit();
}



if (isset($_GET['contract'])) {


	//Pobierz paramtetr id umowy wybranego elementu
	$id_con = $_GET['id_con'];


	//Pobieranie podstawowych danych umowy
	$sql = "SELECT a.id_con, a.nr_con, a.date_con, b.or_source, d.name_off, d.name_off, g.name, g.surname, h.sfid FROM contracts a
			 INNER JOIN source b
			 ON a.id_con = b.id_con
			 INNER JOIN contract_offer c
			 ON a.id_con = c.id_con
			 INNER JOIN offer d
			 ON c.id_off = d.id_off
			 INNER JOIN contracts_sfid e
			 ON a.id_con = e.id_con
		   	 INNER JOIN contracts_user f
			 ON a.id_con = f.id_con
			 INNER JOIN users g
			 ON f.id_user = g.id
			 INNER JOIN sfid h
             ON e.id_sfid = h.id_sfid
			 WHERE a.id_con = '{$id_con}'";
		$con = pg_query($sql);
		$c = pg_fetch_array($con);

		$number = $c['nr_con'];
		$name   = $c['name'] . ' ' . $c['surname'];
		$sfid   = $c['sfid'];	
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

		$sql9 = "INSERT INTO contracts_sfid VALUES
				({$c['id_con']}, {$_SESSION['id_sfid']});";
		pg_query($sql9);

		$sql10 = "INSERT INTO contracts_user VALUES
				({$c['id_con']}, {$_SESSION['id']});";
		pg_query($sql10);

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
				({$c['id_con']}, {$o['id_off']});";
		pg_query($sql8);

		$sql9 = "INSERT INTO contracts_sfid VALUES 
				({$c['id_con']}, {$_SESSION['id_sfid']});";
		pg_query($sql9);

		$sql10 = "INSERT INTO contracts_user VALUES
				({$c['id_con']}, {$_SESSION['id']});";
		pg_query($sql10);

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




if (isset($_POST['action']) and $_POST['action'] == 'Dodaj plan'){

		$plan = $_POST['plan'];			//przesłana wartość planu
		$id_month = $_POST['id_month'];	//id miesiąca
		$id_plan = $_POST['id_plan'];	//id nazwy planu

		//Pobierz id obecnego roku
		$sql = "SELECT id_year FROM years
				WHERE year = '{$curr_year}';";
		$yea = pg_query($sql);
		$y = pg_fetch_array($yea);

		//Wprowadź wartość planu
		$sql2 = "INSERT INTO month_plan VALUES
				(DEFAULT, {$id_plan}, {$id_month}, {$y['id_year']}, {$plan});";
		pg_query($sql2);

		//Pobierz id dodanego planu i przypisz go do sfid
		$sql3 = "SELECT * FROM month_plan 
				 ORDER by id_m_plan DESC
				 LIMIT 1;";
		$id = pg_query($sql3);
		$i  = pg_fetch_array($id);

		$sql4 = "INSERT INTO plans_sfid VALUES
				({$i['id_m_plan']}, {$_SESSION['id_sfid']});";
		pg_query($sql4);
		
		header('Location: ?managment');
		exit();


}


if (isset($_POST['action']) and $_POST['action'] == 'Dodaj urządzenie'){

		$name_dev = $_POST['name_dev'];			//przesłana wartość planu
		$category = $_POST['id_cat'];	//id nazwy planu


		//Wprowadź urządzenie
		$sql = "INSERT INTO devices VALUES
				(DEFAULT, '{$name_dev}');";
		pg_query($sql);

		$sql2 = "SELECT * FROM devices
				WHERE name_dev = '{$name_dev}';";
		$dev = pg_query($sql2);
		$d = pg_fetch_array($dev);

		$id_dev = $d['id_dev'];

		$sql3 = "INSERT INTO category_dev VALUES
				({$id_dev}, {$category});";
		pg_query($sql3);


		
		header('Location: ?managment');
		exit();


}

if (isset($_GET['all_devices'])) {

	$sql = "SELECT * FROM DEVICES a
			INNER JOIN category_dev b
			ON a.id_dev = b.id_dev
			INNER JOIN categories c
			ON b.id_cat = c.id_cat
			WHERE c.id_cat = 1
			ORDER BY a.name_dev;";
	$tel = pg_query($sql);
	$t   = pg_fetch_all($tel);

	$sql2 = "SELECT * FROM DEVICES a
			INNER JOIN category_dev b
			ON a.id_dev = b.id_dev
			INNER JOIN categories c
			ON b.id_cat = c.id_cat
			WHERE c.id_cat = 2
			ORDER BY a.name_dev;";
	$nks = pg_query($sql2);
	$n   = pg_fetch_all($nks);

	include_once 'managment/all_devices.php';
	exit();

}





//Edutyj plan
if (isset($_POST['action']) and $_POST['action'] == 'Edytuj'){

	$id_m_plan = $_POST['id_m_plan'];

	$sql = "SELECT b.plan_name, c.month, d.year, a.amount FROM month_plan a
				INNER JOIN plans b
				ON a.id_plan = b.id_plan
				INNER JOIN months c
				ON a.id_month = c.id_month
				INNER JOIN years d
				ON a.id_year = d.id_year
				WHERE a.id_m_plan = {$id_m_plan} and c.month = '{$m}' and d.year = '{$curr_year}';";
	$mon = pg_query($sql);
	$mo = pg_fetch_array($mon);

	$text = $mo['plan_name'] . ' na miesiąc ' . $m . '.';
	include_once 'managment/edit.php';
	exit();

}

if (isset($_POST['action']) and $_POST['action'] == 'Usuń'){

	$id_m_plan = $_POST['id_m_plan'];

	$sql = "DELETE FROM month_plan
			WHERE id_m_plan = {$id_m_plan};";
	pg_query($sql);
	
	$sql2 = "DELETE FROM plans_sfid
			 WHERE id_m_plan = {$id_m_plan};";
	pg_query($sql2);
	
	$message = 'Operacja usunięcia planu przebiegła pomyślnie';
	header('Location: ?all_plans');
	exit();

}



if (isset($_POST['action']) and $_POST['action'] == 'Zapisz'){

	$id_m_plan = $_POST['id_m_plan'];
	$plan = (int)$_POST['plan'];

	if ($plan == 0) { //Ilość planu musi być liczbą
		$message = 'Plany podajemy tylko w liczbach';
		include 'managment/edit.php';
		exit();
	}

	$sql = "UPDATE month_plan
			SET amount = {$plan}
			WHERE id_m_plan = {$id_m_plan};";
	$sql = pg_query($sql);
	

	header('Location: ?managment');
	exit();

}


//Wszystkie plany

if (isset($_GET['all_plans'])) {

	$sql = "SELECT * FROM month_plan a
				INNER JOIN plans b
				ON a.id_plan = b.id_plan
				INNER JOIN months c
				ON a.id_month = c.id_month
				INNER JOIN years d
				ON a.id_year = d.id_year
				INNER JOIN plans_sfid e
				ON a.id_m_plan = e.id_m_plan
				INNER JOIN sfid f
				ON e.id_sfid = f.id_sfid
				WHERE b.plan_name = 'telefony' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$tel = pg_query($sql);
	$t   = pg_fetch_all($tel);

	$sql2 = "SELECT * FROM month_plan a
				INNER JOIN plans b
				ON a.id_plan = b.id_plan
				INNER JOIN months c
				ON a.id_month = c.id_month
				INNER JOIN years d
				ON a.id_year = d.id_year
				INNER JOIN plans_sfid e
				ON a.id_m_plan = e.id_m_plan
				INNER JOIN sfid f
				ON e.id_sfid = f.id_sfid
				WHERE b.plan_name = 'nks' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$nks = pg_query($sql2);
	$n   = pg_fetch_all($nks);

	include_once 'managment/all_plans.php';
	exit();

}


if (isset($_GET['managment'])) {
	


	//pobranie nazw planów
	try{
	$sql = "SELECT * FROM plans ;";
	$mon = pg_query($sql);
	$mo   = pg_fetch_all($mon);
	}
	catch (Exception $e) {
	}

	//pobranie miesięcy
	try{
	$sql2 = "SELECT * FROM months ;";
	$pla = pg_query($sql2);
	$p   = pg_fetch_all($pla);
	}
	catch (Exception $e) {
	}

	try{
		$sql3 = "SELECT a.id_m_plan, b.plan_name, c.month, d.year, a.amount FROM month_plan a
				INNER JOIN plans b
				ON a.id_plan = b.id_plan
				INNER JOIN months c
				ON a.id_month = c.id_month
				INNER JOIN years d
				ON a.id_year = d.id_year
				INNER JOIN plans_sfid e
				ON a.id_m_plan = e.id_m_plan
				INNER JOIN sfid f
				ON e.id_sfid = f.id_sfid
				WHERE b.plan_name = 'telefony' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
		$tel = pg_query($sql3);
		$t   = pg_fetch_array($tel);
		if($t == false){
			$t['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		}
	}
	catch (Exception $e) {
		
	}

	try{
		$sql4 = "SELECT a.id_m_plan, b.plan_name, c.month, d.year, a.amount FROM month_plan a
				INNER JOIN plans b
				ON a.id_plan = b.id_plan
				INNER JOIN months c
				ON a.id_month = c.id_month
				INNER JOIN years d
				ON a.id_year = d.id_year
				INNER JOIN plans_sfid e
				ON a.id_m_plan = e.id_m_plan
				INNER JOIN sfid f
				ON e.id_sfid = f.id_sfid
				WHERE b.plan_name = 'nks' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
		$nks = pg_query($sql4);
		$n   = pg_fetch_array($nks);
		if($n == false){
			$n['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		}
	}
	catch (Exception $e) {
		
	}

	try{
	$sql5 = "SELECT * FROM categories;";
	$cat = pg_query($sql5);
	$c   = pg_fetch_all($cat);
	}
	catch (Exception $e) {
	}

	include_once 'managment/managment.php';
	exit();

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
		INNER JOIN source b
		ON a.id_con = b.id_con
		INNER JOIN contracts_sfid c
		ON a.id_con = c.id_con
		INNER JOIN sfid d
		ON c.id_sfid = d.id_sfid
		WHERE c.id_sfid = {$_SESSION['id_sfid']}
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
			INNER JOIN plans_sfid e
			ON a.id_m_plan = e.id_m_plan
			INNER JOIN sfid f
			ON e.id_sfid = f.id_sfid 
			WHERE b.plan_name = 'telefony' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
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
if($t['amount']  > 0){
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
		INNER JOIN plans_sfid e
		ON a.id_m_plan = e.id_m_plan
		INNER JOIN sfid f
		ON e.id_sfid = f.id_sfid 
		WHERE b.plan_name = 'nks' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
$nks = pg_query($sql3);
$n   = pg_fetch_array($nks);
if($n == false){
		$n['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$n['plan_name'] = 'nks';
	}

//Ilość telefonów w danym miesiącu


$date = $curr_year . '-' . $curr_month;

for ($i=1; $i < 13; $i++) { 										
	if((($i%2 == 1) AND ($i < 8 ) OR ($i%2 == 0) AND ($i > 8 )) AND ('0' . $i) == $curr_month){		 //Wybierz miesiące, które mają 31 dni


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
				 INNER JOIN contracts_sfid e
				 ON a.id_con = e.id_con
				 INNER JOIN sfid f
				 ON e.id_sfid = f.id_sfid
				 WHERE d.id_cat = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND e.id_sfid = {$_SESSION['id_sfid']};";
				 $amo = pg_query($sql4);
				 $a   = pg_fetch_array($amo);
			}
			catch (Exception $e) {
				 $a = 0;
			}
			if($a == false){
				$a['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$a['plan_name'] = 'nks';
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
				 INNER JOIN contracts_sfid e
				 ON a.id_con = e.id_con
				 INNER JOIN sfid f
				 ON e.id_sfid = f.id_sfid
				 WHERE d.id_cat = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND e.id_sfid = {$_SESSION['id_sfid']};";
				 $amo = pg_query($sql4);
				 $a   = pg_fetch_array($amo);
				}
				catch (Exception $e) {
				 $a = 0;
				}
				if($a == false){
					$a['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
					$a['plan_name'] = 'nks';
			}
		}
	}

}


/*
$sql9 = "SELECT * FROM users
		 WHERE email = '{$_SESSION['email']}' AND password = '{$_SESSION['password']}';";
$nam = pg_query($sql9);
$n  = pg_fetch_array($nam);
*/
include_once 'home.php';