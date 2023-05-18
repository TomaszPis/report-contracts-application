<?

function tv_whole_month($sfid, $start_mon, $end_mon){

	try{
		$sql =	"SELECT COUNT(a.id_con_cp) FROM contracts_cp a
				 INNER JOIN contracts_sfid_cp b
				 ON a.id_con_cp = b.id_con_cp
				 INNER JOIN sfid c
				 ON b.id_sfid_cp = c.id_sfid
				 INNER JOIN source_cp d
				 ON a.id_con_cp = d.id_con_cp
				 WHERE d.or_source_cp = TRUE AND a.date_con_cp >= '{$start_mon}' AND a.date_con_cp <= '{$end_mon}' AND c.id_sfid = {$sfid};";
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