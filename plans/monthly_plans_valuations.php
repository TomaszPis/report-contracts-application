<?
//Ilość telefonów w danym miesiącu

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

			try{
				 $sql6 = "SELECT COUNT(a.id_con) FROM contracts a
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
				 			WHERE f.or_source = FALSE AND e.id_off = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$_SESSION['id_sfid']};";
				 $continuation_sql = pg_query($sql6);
				 $continuation     = pg_fetch_array($continuation_sql);
			}
			catch (Exception $e) {
				 $continuation = 0;
			}
			if($continuation == false){
				$continuation_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$continuation_plan['plan_name'] = 'Zatrzymanie Voice';
			}
			//Ile jest pozyskań DATA w danym miesiący
			try{
				 $sql7 = "SELECT COUNT(a.id_con) FROM contracts a
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
				 			WHERE f.or_source = TRUE AND e.id_off = 2 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$_SESSION['id_sfid']};";
				 $DATA_count = pg_query($sql7);
				 $DATA   = pg_fetch_array($DATA_count);
			}
			catch (Exception $e) {
				 $DATA = 0;
			}
			if($DATA == false){
				$DATA_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$DATA_month_plan['plan_name'] = 'Pozyskanie DATA';
			}
			//Ile jest zatrzymań DATA w danym miesiącu
			try{
				 $sql8 = "SELECT COUNT(a.id_con) FROM contracts a
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
				 			WHERE f.or_source = FALSE AND e.id_off = 2 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$_SESSION['id_sfid']};";
				 $DATA_count_continuation_sql = pg_query($sql8);
				 $DATA_continuation     = pg_fetch_array($DATA_count_continuation_sql);
			}
			catch (Exception $e) {
				 $DATA_continuation = 0;
			}
			if($DATA_continuation == false){
				$DATA_continuation_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$DATA_continuation_month_plan['plan_name'] = 'Zatrzymanie DATA';
			}

			try{
				$sql9 = "SELECT COUNT(a.id_con_cp) FROM contracts_cp a
							INNER JOIN contracts_sfid_cp b
							ON a.id_con_cp = b.id_con_cp
							INNER JOIN sfid c
							ON b.id_sfid_cp = c.id_sfid
							INNER JOIN source_cp d
							ON a.id_con_cp = d.id_con_cp
				 			WHERE d.or_source_cp = TRUE AND a.date_con_cp >= '{$start_mon}' AND a.date_con_cp <= '{$end_mon}' AND c.id_sfid = {$_SESSION['id_sfid']};";
				 $TV_count = pg_query($sql9);
				 $TV   = pg_fetch_array($TV_count);
			}
			catch (Exception $e) {
				 $TV = 0;
			}
			if($TV == false){
				$tv_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$tv_month_plan['plan_name'] = 'Pozyskanie TV';
			}


						try{
				$sql9 = "SELECT COUNT(a.id_con_cp) FROM contracts_cp a
							INNER JOIN contracts_sfid_cp b
							ON a.id_con_cp = b.id_con_cp
							INNER JOIN sfid c
							ON b.id_sfid_cp = c.id_sfid
							INNER JOIN source_cp d
							ON a.id_con_cp = d.id_con_cp
				 			WHERE d.or_source_cp = FALSE AND a.date_con_cp >= '{$start_mon}' AND a.date_con_cp <= '{$end_mon}' AND c.id_sfid = {$_SESSION['id_sfid']};";
				 $TV_count_2 = pg_query($sql9);
				 $tv_continuation  = pg_fetch_array($TV_count_2);
			}
			catch (Exception $e) {
				 $tv_continuation = 0;
			}
			if($TV == false){
				$tv_continuation_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
				$tv_continuation_month_plan['plan_name'] = 'Zatrzymanie TV';
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
if(($b[0] > 0) AND ($n['amount'] > 0)){
	$nks_pr =  round(($b[0]/$n['amount'])*100, 2);
}
else{
	$nks_pr = 0;
}



//Oblicz procent sprzedanych umów w skali miesiąca
//2.Pozyskanie Voice
if(($d[0] > 0) AND ($v['amount'] > 0)){
	$voice_pr =  round(($d[0]/$v['amount'])*100, 2);
}
else{
	$voice_pr = 0;
}



//Oblicz procent sprzedanych umów w skali miesiąca
//2.Zatrzymanie Voice
if(($continuation[0] > 0) AND ($continuation_plan['amount'] > 0)){
	$continuation_pr =  round(($continuation[0]/$continuation_plan['amount'])*100, 2);
}
else{
	$continuation_pr = 0;
}

//Oblicz procent sprzedanych umów w skali miesiąca
//2.Zatrzymanie Voice
if(($DATA[0] > 0) AND ($DATA_month_plan['amount'] > 0)){
	$DATA_pr =  round(($DATA[0]/$DATA_month_plan['amount'])*100, 2);
}
else{
	$DATA_pr = 0;
}

//Oblicz procent sprzedanych umów w skali miesiąca
//2.Zatrzymanie Voice
if(($DATA_continuation[0] > 0) AND ($DATA_continuation_month_plan['amount'] > 0)){
	$DATA_continuation_pr =  round(($DATA_continuation[0]/$DATA_continuation_month_plan['amount'])*100, 2);
}
else{
	$DATA_continuation_pr = 0;
}

if(($TV[0] > 0) AND ($tv_month_plan['amount'] > 0)){
	$TV_pr =  round(($TV[0]/$tv_month_plan['amount'])*100, 2);
}
else{
	$TV_pr = 0;
}

if(($tv_continuation[0] > 0) AND ($tv_continuation_month_plan['amount'] > 0)){
	$tv_continuation_pr =  round(($TV[0]/$tv_continuation_month_plan['amount'])*100, 2);
}
else{
	$tv_continuation_pr = 0;
}
