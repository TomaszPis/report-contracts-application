<?

function tv_today($sfid, $curr_day){

	try{
		$sql = "SELECT COUNT(a.id_con_cp) FROM contracts_cp a
				INNER JOIN contracts_sfid_cp b
				ON a.id_con_cp = b.id_con_cp
				INNER JOIN sfid c
				ON b.id_sfid_cp = c.id_sfid
				INNER JOIN source_cp d
				ON a.id_con_cp = d.id_con_cp
				WHERE d.or_source_cp = TRUE AND a.date_con_cp  = '{$curr_day}' AND b.id_sfid_cp = {$sfid};";
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