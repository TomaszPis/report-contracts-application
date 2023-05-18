<?

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
				$a['plan_name'] = 'Telefony';
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
				 WHERE d.id_cat = 2 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND e.id_sfid = {$_SESSION['id_sfid']};";
				 $bks = pg_query($sql4);
				 $b   = pg_fetch_array($bks);
			}
			catch (Exception $e) {
				 $b = 0;
			}
			if($b == false){
				$b['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$b['plan_name'] = 'nks';
			}

			try{
				 $sql5 = "SELECT COUNT(a.id_con) FROM contracts a
							INNER JOIN contracts_sfid b
							ON a.id_con = b.id_con
							INNER JOIN sfid c
							ON b.id_sfid = c.id_sfid
							INNER JOIN contract_offer d
							ON a.id_con = d.id_con
							INNER JOIN offer e
							ON d.id_off = e.id_off
							INNER JOIN source f
							ON a.id_con = f.id_con
				 			WHERE f.or_source = TRUE AND e.id_off = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$_SESSION['id_sfid']};";
				 $dks = pg_query($sql5);
				 $d   = pg_fetch_array($dks);
			}
			catch (Exception $e) {
				 $d = 0;
			}
			if($d == false){
				$d['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$d['plan_name'] = 'Pozyskanie Voice';
			}

			break;

	}
	else{
			
	if(('0' . $i) == $curr_month){	
			 //dla pozostałych miesięcy
			 $start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca
			  
			  if($i < 10){
			  	$end_mon = $curr_year . '-' . '0' . $i . '-' . '30'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
			  }
			  else{
			  	$end_mon = $curr_year . '-' . $i . '-' . '30'; //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca
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
					$a['plan_name'] = 'Telefony';
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
				 WHERE d.id_cat = 2 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND e.id_sfid = {$_SESSION['id_sfid']};";
				 $bks = pg_query($sql4);
				 $b   = pg_fetch_array($bks);
				}
				catch (Exception $e) {
				 $b = 0;
				}
				if($b == false){
					$b['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
					$b['plan_name'] = 'nks';

			}

			try{
				 $sql5 = "SELECT COUNT(a.id_con) FROM contracts a
							INNER JOIN contracts_sfid b
							ON a.id_con = b.id_con
							INNER JOIN sfid c
							ON b.id_sfid = c.id_sfid
							INNER JOIN contract_offer d
							ON a.id_con = d.id_con
							INNER JOIN offer e
							ON d.id_off = e.id_off
							INNER JOIN source f
							ON a.id_con = f.id_con
				 			WHERE f.or_source = TRUE AND e.id_off = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$_SESSION['id_sfid']};";
				 $dks = pg_query($sql5);
				 $d   = pg_fetch_array($dks);
				}
				catch (Exception $e) {
				 $d = 0;
				}
				if($d == false){
					$d['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
					$d['plan_name'] = 'Pozyskanie Voice';

			}
			break;
		}
	}
}




//Oblicz procent sprzedanych umów w skali miesiąca
//1. Telefony


if($a[0] > 0 AND $t['amount'] > 0){
	$phones_pr =  round(($a[0]/$t['amount'])*100, 2);
	
}
else{
	$phones_pr = 0;
}

if($min_plan > 0){
	$to_min = $min_plan - $a[0];
}
else{
	$to_min = 'Brak danych';
}

if ($to_min < 1) {
	
	$to_min = 'Plan minimum wykonany';
}



//Oblicz procent sprzedanych umów w skali miesiąca
//2.nks
if($b[0] > 0){
	$nks_pr =  round(($b[0]/$n['amount'])*100, 2);
}
else{
	$nks_pr = 0;
}



//Oblicz procent sprzedanych umów w skali miesiąca
//2.Pozyskanie Voice
if($d[0] > 0){
	$voice_pr =  round(($d[0]/$v['amount'])*100, 2);
}
else{
	$voice_pr = 0;
}

/*
$sql9 = "SELECT * FROM users
		 WHERE email = '{$_SESSION['email']}' AND password = '{$_SESSION['password']}';";
$nam = pg_query($sql9);
$n  = pg_fetch_array($nam);
*/
include_once 'test.php';