<?

function voice_extension_yesterday($sfid, $day_before){

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
				WHERE f.or_source = FALSE AND e.id_off = 1 AND a.date_con = '{$day_before}' AND b.id_sfid = {$sfid};";
		$yesterday_query = pg_query($sql);
		$yesterday = pg_fetch_array($yesterday_query);
	}
	catch (Exception $e) {
		return $yesterday = 0;
	}
	if($yesterday == false){
		return $yesterday['0'] = '0';
	}

	return $yesterday;
}