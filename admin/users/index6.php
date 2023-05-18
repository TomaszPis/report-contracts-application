<?php

if (isset($_GET['users'])) {


	include 'add_new_user.php';
	exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Dodaj pracownika') {

	$name = 	pg_escape_string($_POST['name']);
	$surname = 	pg_escape_string($_POST['surname']);
	$password = pg_escape_string($_POST['password']);
	$email =	pg_escape_string($_POST['email']);
	$sfid =		pg_escape_string($_POST['sfid']);

	if ($name == '' OR $surname == '' OR $password == '' OR $email == '') {
		
		$message_one = 'Wszystkie pola muszą być wypełnione';
		include 'error.php';
		exit;
	}

	//Dodaj użytkownika
	$sql = "INSERT INTO users
			VALUES (DEFAULT, '{$name}', '{$surname}', '{$email}', '{$password}');";
	pg_query($sql);

	//Znajdź id nowego użytkownika i przypisz go do sfid
	$sql2 = "SELECT * FROM users 
			 WHERE name = '{$name}' AND surname = '{$surname}';";
	$id_user_query = pg_query($sql2);
	$id_user = pg_fetch_array($id_user_query);

	$sql3 = "INSERT INTO sfid_users
			 VALUES('{$id_user['id']}', '{$sfid}');";
	pg_query($sql3);

	//przypisz rolę użytkownikowi - w ty przypadku jest to sprzedawca(id_role 4)
	$sql4 = "INSERT INTO user_role
			 VALUES('{$id_user['id']}', 4);";
	pg_query($sql4);

	header('Location: ?users');
	exit();

}

if (isset($_POST['action_rks']) and $_POST['action_rks'] == 'Dodaj rks') {

	$name_rks = 	pg_escape_string($_POST['name_rks']);
	$surname_rks = 	pg_escape_string($_POST['surname_rks']);
	$password_rks = pg_escape_string($_POST['password_rks']);
	$email_rks =	pg_escape_string($_POST['email_rks']);
	$area =			pg_escape_string($_POST['area']);

	if ($name_rks == '' OR $surname_rks == '' OR $password_rks == '' OR $email_rks == '') {
		
		$message_two = 'Wszystkie pola muszą być wypełnione';
		include 'error.php';
		exit();
	}

	//Dodaj użytkownika
	$sql = "INSERT INTO users
			VALUES (DEFAULT, '{$name_rks}', '{$surname_rks}', '{$email_rks}', '{$password_rks}');";
	pg_query($sql);

	//Znajdź id nowego użytkownika 
	$sql2 = "SELECT * FROM users 
			 WHERE name = '{$name_rks}' AND surname = '{$surname_rks}';";
	$id_user_query = pg_query($sql2);
	$id_user = pg_fetch_array($id_user_query);

	//przypisz rolę użytkownikowi - w ty przypadku jest to sprzedawca(id_role 2)
	$sql3 = "INSERT INTO user_role
			 VALUES('{$id_user['id']}', 2);";
	pg_query($sql3);

	//Dodaj nowego managera w tabeli managers
	$sql4 = "INSERT INTO managers
			 VALUES(DEFAULT, '{$id_user['id']}');";
	pg_query($sql4);

	//znajdz id managera i przypisz go do regionu
	$sql5 = "SELECT * FROM managers 
			 WHERE id = '{$id_user['id']}';";
	$id_manager_quey = pg_query($sql5);
	$id_manager = pg_fetch_array($id_manager_quey);


	$sql6 = "INSERT INTO manager_area
			VALUES('{$area}', '{$id_manager['id_manager']}');";
	pg_query($sql6);

	header('Location: ?users');
	exit();

}


if (isset($_POST['action']) and $_POST['action'] == 'Szukaj') {

	$name_search = 	pg_escape_string($_POST['name_search']);
	$surname_search = 	pg_escape_string($_POST['surname_search']);


	if ($name_search == '' AND $surname_search == '') {
		
		$message_three = 'Musi być wypełnione przynajmniej jedno pole.';
		include 'error.php';
		exit();
	}

	$sql = "SELECT * FROM users
		 	WHERE name = '{$name_search}' OR surname = '{$surname_search}';";
	$user_search_query = pg_query($sql);
	$user_search = pg_fetch_all($user_search_query);

	if ($user_search == FALSE) {
		$message_three = 'Nie znaleziono pracownika';
		include 'error.php';
		exit();
	}

	include 'search_user.php';
	exit();
}

if (isset($_GET['user_profil']) and is_numeric($_GET['user_id']) == TRUE ){

	$user_id = $_GET['user_id'];


	//Znajdź role uzytkownika, później pobierz jego dane wg jego roli
	if(user_role($user_id) == 'Sprzedawca'){

		$sql = "SELECT * FROM users a
				INNER JOIN sfid_users b
				ON a.id = b.id_user
				INNER JOIN sfid c
				ON b.id_sfid = c.id_sfid
				WHERE a.id = '{$user_id}';";
		$user_query = pg_query($sql);
		$user = pg_fetch_array($user_query);

		$name = $user['name'];
		$surname = $user['surname'];
		$name_area = $user['sfid'];
		$area = 'SFID';
		$email = $user['email'];

		include 'user.php';
		exit();
	}

	if(user_role($user_id) == 'RKS'){

		$sql = "SELECT * FROM users a
				INNER JOIN managers b
				ON a.id = b.id
				INNER JOIN manager_area c
				ON b.id_manager = c.id_manager
				INNER JOIN area d
				ON c.id_area = d.id_area
				WHERE a.id = '{$user_id}';";
		$user_query = pg_query($sql);
		$user = pg_fetch_array($user_query);

		$name = $user['name'];
		$surname = $user['surname'];
		$name_area = $user['area_name'];
		$area = 'Rejon';
		$email = $user['email'];

		$sfid_list = $areas_list;

		include 'user.php';
		exit();
	}
	
}

if (isset($_POST['action_area']) and $_POST['action_area'] == 'Aktualizuj'){

	$user_id = $_POST['user_id'];
	$sfid = $_POST['sfid'];

	if(user_role($user_id) == 'Sprzedawca'){

		$sql = "UPDATE sfid_users
				SET id_sfid = '{$sfid}'
				WHERE id_user ='{$user_id}';";
		pg_query($sql);
		
		header("Location: ?user_profil&user_id={$user_id}");
		exit();
	}

	if(user_role($user_id) == 'RKS'){

		$sql = "UPDATE manager_area
				SET id_area = '{$sfid}'
				WHERE id_manager ='{$user_id}';";
		pg_query($sql);
		
		header("Location: ?user_profil&user_id={$user_id}");
		exit();
	}

}

if (isset($_POST['action_role']) and $_POST['action_role'] == 'Aktualizuj'){

	$user_id = $_POST['user_id'];
	$new_role = $_POST['role'];

	$sql = "SELECT * FROM user_role a
			INNER JOIN role b
			ON a.user_role = b.id_role
			WHERE user_id = '{$user_id}';";
	$role_query = pg_query($sql);
	$role = pg_fetch_array($role_query);


	if($role['id_role'] == $new_role) {
		echo 'Fatal error - nie możesz zmienić roli użytkoniwka na taką samą. Wybierz poprawną rolę' . '<br>';

		exit();
	}

	//Zmiana roli na RKS
	if(user_role($user_id) == 'Sprzedawca'){

		//usuń sprzedawcę z jego sfid
		$sql = "DELETE FROM sfid_users
				WHERE id_user ='{$user_id}';";
		pg_query($sql);


		//Dodaj sprzedawcę jako RKS
		$sql2 = "INSERT INTO managers
				 VALUES(DEFAULT, '{$user_id}');";
		pg_query($sql2);

		//Znajdź id nowego RKS
		$sql3 = "SELECT * FROM managers
				 WHERE id = '{$user_id}'";
		$manager_id_query =  pg_query($sql3);
		$manager_id = pg_fetch_array($manager_id_query);
		$manager = $manager_id['id_manager'];

		//Przypisz RKS do technicznego regionu
		$sql4 = "INSERT INTO manager_area
				 VALUES(1, '{$manager}');";
		pg_query($sql4);

		//Ustal nową rolę w systemie
		$sql5 = "UPDATE user_role
				SET user_role = '{$new_role}'
				WHERE user_id ='{$user_id}';";
		pg_query($sql5);
		
		header("Location: ?user_profil&user_id={$user_id}");
		exit();
	}

	//Zmiana roli na sprzedawcę
	if(user_role($user_id) == 'RKS'){

		$sql = "SELECT * FROM managers
				WHERE id = '{$user_id}'";
		$manager_id_query =  pg_query($sql);
		$manager_id = pg_fetch_array($manager_id_query);
		$manager = $manager_id['id_manager'];


		$sql2 = "DELETE FROM manager_area
				 WHERE id_manager ='{$manager}';";
		pg_query($sql2);

		$sql3 = "DELETE FROM managers
				 WHERE id ='{$user_id}';";
		pg_query($sql3);

		$sql4 = "INSERT INTO sfid_users
				 VALUES('{$user_id}', 1);";
		pg_query($sql4);

		$sql5 = "UPDATE user_role
		SET user_role = '{$new_role}'
		WHERE user_id ='{$user_id}';";
		pg_query($sql5);
		
		header("Location: ?user_profil&user_id={$user_id}");
		exit();
	}

}