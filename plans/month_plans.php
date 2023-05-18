<?

//Plan na telefony
try{
	$sql2 = "SELECT * FROM month_plan a
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
			WHERE b.plan_name = 'telefony' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
	$tel = pg_query($sql2);
	$t   = pg_fetch_array($tel);
	if($t == false){
		$t['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$t['plan_name'] = 'Telefony';
	}
}
catch (Exception $e) {
	
}

//Policz minimum do wypłaty premii
if($t['amount']  > 0){
	$min_plan = ceil($t['amount'] * 0.8);
}
else{
	$min_plan = 'Jeszce nie wprowadzono planu na telefony';
}

//Plan na nks-y

$sql3 = "SELECT * FROM month_plan a
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
		WHERE b.plan_name = 'nks' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
$nks = pg_query($sql3);
$n   = pg_fetch_array($nks);
if($n == false){
		$n['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$n['plan_name'] = 'NKS';
}

//Plan na pozyskanie voice

$sql3 = "SELECT * FROM month_plan a
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
		WHERE b.plan_name = 'pozyskanie voice' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
$vks = pg_query($sql3);
$v   = pg_fetch_array($vks);
if($v == false){
		$v['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$v['plan_name'] = 'Pozyskanie Voice';
}

//Plan na zatrzymanie voice

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
		WHERE b.plan_name = 'zatrzymanie voice' and c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']};";
$continuation_plan_sql = pg_query($sql4);
$continuation_plan   = pg_fetch_array($continuation_plan_sql);
if($continuation_plan == false){
		$continuation_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$continuation_plan['plan_name'] = 'Zatrzymanie Voice';
}

//Plany na pozyskanie DATA
$sql5 = "SELECT * FROM month_plan a
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
				WHERE b.plan_name = 'Pozyskanie DATA' AND c.month = '{$m}' AND d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
$DATA_plan_query = pg_query($sql5);
$DATA_month_plan   = pg_fetch_array($DATA_plan_query); 

if($DATA_month_plan == false){
		$DATA_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$DATA_month_plan['plan_name'] = 'Pozyskanie DATA';
}

//Plany na zatrzymanie DATA
$sql6 = "SELECT * FROM month_plan a
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
				WHERE b.plan_name = 'Zatrzymanie DATA' AND c.month = '{$m}' and d.year = '{$curr_year}' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
$DATA_continuation_plan_query = pg_query($sql6);
$DATA_continuation_month_plan   = pg_fetch_array($DATA_continuation_plan_query);

if($DATA_continuation_month_plan == false){
		$DATA_continuation_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$DATA_continuation_month_plan['plan_name'] = 'Zatrzymanie DATA';
}


	$sql7 = "SELECT * FROM month_plan a
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
				WHERE b.plan_name = 'Pozyskanie TV' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$tv_plan_query = pg_query($sql7);
	$tv_month_plan   = pg_fetch_array($tv_plan_query);

	if($tv_month_plan == false){
		$tv_month_plan['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$tv_month_plan['plan_name'] = 'Pozyskanie TV';
	}

	$sql8 = "SELECT * FROM month_plan a
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
				WHERE b.plan_name = 'Zatrzymanie TV' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$tv_continuation_plan_query = pg_query($sql8);
	$tv_continuation_month_plan   = pg_fetch_array($tv_continuation_plan_query);

	if($tv_continuation_month_plan  == false){
		$tv_continuation_month_plan ['amount'] = 'Dla miesiąca ' . $m . ' nie wprowadzono jeszcze planów';
		$tv_continuation_month_plan ['plan_name'] = 'Zatrzymanie TV';
	}
