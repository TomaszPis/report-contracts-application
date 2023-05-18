<?

function devices_yesterday($sfid, $day_before){

	try{
		$sql = "SELECT COUNT(b.id_dev) 
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
				WHERE d.id_cat = 2 AND a.date_con = '{$day_before}' AND e.id_sfid = {$sfid};";
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