<?

function phones_all_month($sfid, $start_mon, $end_mon){

	try{
		$sql =	"SELECT COUNT(b.id_dev) 
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
				 WHERE d.id_cat = 1 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND e.id_sfid = {$sfid};";
		$count_whole_month_query = pg_query($sql);
		return $count_whole_month   = pg_fetch_array($count_whole_month_query);
	}
	catch (Exception $e) {
		return $count_whole_month = 0;
	}
	if($count_whole_month == false){
		return $count_whole_month['amount'] = '0';
		return $count_whole_month['plan_name'] = 'Pozyskanie Voice';
	}
}