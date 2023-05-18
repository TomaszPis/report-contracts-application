<?php

if (isset($_POST['action']) and $_POST['action'] == 'Szukaj'){

		$date1 = $_POST['date-1'];
		$date2 = $_POST['date-2'];

		if($_POST['type-1'] != '0'){
			if($date1 != '' AND $date2 != ''){
				try{
					$sql = "SELECT * FROM contracts a
							LEFT JOIN source b
							ON a.id_con = b.id_con
							INNER JOIN contracts_sfid c
							ON a.id_con = c.id_con
							INNER JOIN sfid d
							ON c.id_sfid = d.id_sfid
					  		WHERE a.date_con >= '{$date1}' AND a.date_con <= '{$date2}' AND c.id_sfid = {$_SESSION['id_sfid']}
					  		ORDER BY a.date_con DESC;";
					 $con = pg_query($sql);
					 

					 if ($con != null ) {
					 	$co   = pg_fetch_all($con);
					 }
					 else{
					 	$message = 'Nie znaleziono danych';
					 }


				}
				catch (Exception $e) {
					 $co = 'Brak danych';
				}	

				$start_mon = $date1;
				$end_mon   = $date2;
			}
			else{
				$message = 'Nie prowadziłeś daty. Spróbuj jeszcze raz.';
				include 'search-contracts.php';
				exit();

			}

			include 'search-contracts.php';
			exit();
		}
		else{
			$message = 'Musisz zaznaczyć rodzaj umowy.';
			include 'search-contracts.php';
			exit();
		}
}


if (isset($_GET['search'])) {


	$start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca

												
	$end_mon = $curr_year . '-' . $curr_month . '-' . date('t'); //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca


	try{
		$sql = "SELECT * FROM contracts a
				LEFT JOIN source b
				ON a.id_con = b.id_con
				INNER JOIN contracts_sfid c
				ON a.id_con = c.id_con
				INNER JOIN sfid d
				ON c.id_sfid = d.id_sfid
				WHERE a.date_con >= '{$start_mon}' AND a.date_con <= '{$end_mon}' AND c.id_sfid = {$_SESSION['id_sfid']}
				ORDER BY a.date_con DESC;";
		$con = pg_query($sql);
		$co   = pg_fetch_all($con);
	}
	catch (Exception $e) {
		$co = 'Brak danych';
	}



	include 'search-contracts.php';
	exit();
}