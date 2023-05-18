<?

function voice_today($sfid, $curr_day){

	try{
		$sql = "SELECT COUNT(a.id_con) FROM contracts a
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
				WHERE f.or_source = TRUE AND e.id_off = 1 AND a.date_con = '{$curr_day}' AND b.id_sfid = {$sfid};";
		$today_query = pg_query($sql);
		 $today = pg_fetch_array($today_query);
	}
	catch (Exception $e) {
		return $today = 0;
	}
	if($today == false){
		return $today[0] = '0';
	}

	return $today[0];
}