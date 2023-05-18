<?

function data_extension_month($sfid, $start_mon, $end_mon){

	try{
		$sql =	"SELECT COUNT(a.id_con) FROM contracts a
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
				 WHERE f.or_source = FALSE AND e.id_off = 2 AND a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND b.id_sfid = {$sfid};";
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