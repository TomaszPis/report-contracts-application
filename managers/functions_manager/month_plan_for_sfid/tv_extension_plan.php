<?

function tv_extension_plan($sfid, $month, $curr_year){


		$sql4 = "SELECT * FROM month_plan a
				 INNER JOIN plans b
				 ON a.id_plan = b.id_plan
				 INNER JOIN months c
				 ON a.id_month = c.id_month
				 INNER JOIN years d
				 ON a.id_year = d.id_year
				 INNER JOIN plans_sfid e
				 ON a.id_m_plan = e.id_m_plan
				 INNER JOIN sfid f
				 ON e.id_sfid = f.id_sfid 
				 WHERE b.plan_name = 'Zatrzymanie TV' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$sfid};";
		$vks = pg_query($sql4);
		$plan   = pg_fetch_array($vks);
									
		if($plan == false){
			return $plan['amount'] = '0';
			return $plan['plan_name'] = 'Zatrzymanue TV';
		}

		return $plan['amount'];
}

