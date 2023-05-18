<?php


//Przygotowanie wszystkich danych z bazy potrzebnych do administrowania systemem
//Pobierz listę sfid

$sql = 'SELECT * FROM sfid';
$sfid_query = pg_query($sql);
$sfid_list = pg_fetch_all($sfid_query);

//Pobierz listę mikrorynkrów

$sql2 = 'SELECT * FROM area';
$areas_query = pg_query($sql2);
$areas_list = pg_fetch_all($areas_query);

//Pobierz listę sprzedawców przypisanych do sfid
$sql3 = 'SELECT * FROM users a
		 INNER JOIN sfid_users b
		 ON a.id = b.id_user 
		 INNER JOIN sfid c
		 ON b.id_sfid = c.id_sfid';
$users_query = pg_query($sql3);
$users_list = pg_fetch_all($users_query);

//Pobierz listę kierowników regionalnych

$sql4 = 'SELECT * FROM managers a
		 INNER JOIN users b
		 ON b.id = a.id 
		 INNER JOIN manager_area c
		 ON a.id_manager = c.id_manager
		 INNER JOIN area d
		 ON c.id_area = d.id_area';
$managers_query = pg_query($sql4);
$managers_list = pg_fetch_all($managers_query);

//Pobierz role użytkowników

$sql5 = "SELECT * FROM role
		 WHERE role = 'RKS' OR role = 'Sprzedawca';" ;
$role_query = pg_query($sql5);
$role_list = pg_fetch_all($role_query);

//Zarządzanie użytkownikami

include 'users/index6.php';


//zarządzanie sfidami i mikrorynkami

include 'areas/index7.php';

include 'home_admin.php';