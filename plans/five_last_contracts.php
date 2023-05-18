<?
//5 ostatnich umów
$sql = "SELECT * FROM contracts a
		INNER JOIN source b
		ON a.id_con = b.id_con
		INNER JOIN contracts_sfid c
		ON a.id_con = c.id_con
		INNER JOIN sfid d
		ON c.id_sfid = d.id_sfid
		WHERE c.id_sfid = {$_SESSION['id_sfid']}
		ORDER BY a.date_con DESC
		LIMIT 5";
$con = pg_query($sql);
$co= pg_fetch_all($con);
