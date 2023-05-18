<?

function phones_today($sfid, $curr_day){

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
				WHERE d.id_cat = 1 AND a.date_con = '{$curr_day}' AND e.id_sfid = {$sfid};";
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