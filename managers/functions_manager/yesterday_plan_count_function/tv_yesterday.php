<?

function tv_yesterday($sfid, $day_before){

	try{
		$sql = "SELECT COUNT(a.id_con_cp) FROM contracts_cp a
				INNER JOIN contracts_sfid_cp b
				ON a.id_con_cp = b.id_con_cp
				INNER JOIN sfid c
				ON b.id_sfid_cp = c.id_sfid
				INNER JOIN source_cp d
				ON a.id_con_cp = d.id_con_cp
				WHERE d.or_source_cp = TRUE AND a.date_con_cp = '{$day_before}' AND b.id_sfid_cp = {$sfid};";
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