<?
//Wszytskie plany dla sfid
	$sql = "SELECT * FROM month_plan a
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
				WHERE b.plan_name = 'telefony' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$tel = pg_query($sql);
	$t   = pg_fetch_all($tel);

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
				WHERE b.plan_name = 'nks' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$nks = pg_query($sql2);
	$n   = pg_fetch_all($nks);

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
				WHERE b.plan_name = 'pozyskanie voice' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$voi = pg_query($sql3);
	$v   = pg_fetch_all($voi);

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
				WHERE b.plan_name = 'zatrzymanie voice' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$continuation_month_plan_query = pg_query($sql4);
	$continuation_month_plan   = pg_fetch_all($continuation_month_plan_query);

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
				WHERE b.plan_name = 'Pozyskanie DATA' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$DATA_plan_query = pg_query($sql5);
	$DATA_month_plan   = pg_fetch_all($DATA_plan_query);

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
				WHERE b.plan_name = 'Zatrzymanie DATA' AND e.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY d.year, c.month DESC;";
	$DATA_continuation_plan_query = pg_query($sql6);
	$DATA_continuation_month_plan   = pg_fetch_all($DATA_continuation_plan_query);


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
	$tv_month_plan   = pg_fetch_all($tv_plan_query);

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
	$tv_continuation_month_plan   = pg_fetch_all($tv_continuation_plan_query);
