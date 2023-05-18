<?php

if (isset($_GET['sfidandarea'])) {


	include 'add_sfid_and_area.php';
	exit();
}


if (isset($_POST['action']) and $_POST['action'] == 'Dodaj SFID') {

	$sfid = $_POST['sfid'];
	$area = $_POST['area'];

	if($sfid != ''){

		$sql = "INSERT INTO sfid
				VALUES(DEFAULT, '{$sfid}');";
		pg_query($sql);


		$sql2 = "SELECT * FROM sfid
				 WHERE sfid = '{$sfid}';";
		$id_sfid_query = pg_query($sql2);
		$id_sfid = pg_fetch_array($id_sfid_query);

		$sql3 = "INSERT INTO sfid_area 
				 VALUES('{$area}', '{$id_sfid['id_sfid']}');";
		pg_query($sql3);

	}

	header('Location: ?sfidandarea');
	exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Dodaj mikrorynek') {

	$area = pg_escape_string($_POST['area']);

	if($area != ''){

		$sql = "INSERT INTO area
				VALUES(DEFAULT, '{$area}');";
		pg_query($sql);

	}

	header('Location: ?sfidandarea');
	exit();
}


if(isset($_GET['sfid_profil'])){

	$id_sfid = $_GET['id_sfid'];

	$sql = "SELECT * FROM users a
			INNER JOIN sfid_users b
			ON a.id = b.id_user
			INNER JOIN sfid c
			ON b.id_sfid = c.id_sfid
			WHERE b.id_sfid = '{$id_sfid}';";
	$sfid_users_query = pg_query($sql);
	$sfid_users = pg_fetch_all($sfid_users_query);

	$sql2 = "SELECT * FROM area a
			INNER JOIN sfid_area b
			ON a.id_area = b.id_area
			WHERE b.id_sfid = '{$id_sfid}';";
	$sfid_area_query = pg_query($sql2);
	$sfid_area = pg_fetch_array($sfid_area_query);

	include 'data_sfid.php';
	exit();
}

if (isset($_POST['action_area']) and $_POST['action_area'] == 'Zmień') {

	$area = $_POST['area'];
	$id_sfid = $_POST['id_sfid'];
	
	//sprawdź czy sfid jest przydzielony do mikrorynku
	$sql = "SELECT * FROM sfid_area
			WHERE id_sfid = '{$id_sfid}';";
	$chceck_sfid_query = pg_query($sql);
	$chceck_sfid = pg_fetch_array($chceck_sfid_query);

	//Jeżeli sfid jest przydzielony do mikrynku to aktualizuj na nowy, jeżeli nie to przydziel sfid do nowego mikrorynku 
	if($chceck_sfid > 0){
		$sql = "UPDATE sfid_area
			SET  id_area = '{$area}'
			WHERE id_sfid = '{$id_sfid}'";
		pg_query($sql);
	}
	else{
		$sql = "INSERT INTO sfid_area
				VALUES('{$area}', '{$id_sfid}');";
		pg_query($sql);
	}

	header('Location: ?sfidandarea');
	exit();
}

