<?php


function userIsLoggedIn()
{
	$e =pg_escape_string($_POST['email']);
	$p = pg_escape_string($_POST['password']);

	if(isset($_POST['action']) and $_POST['action'] == 'login')
	{
		if (!isset($e) or $e == '' or !isset($p) or $p == '')
		{
			$GLOBALS['loginError'] = 'Oba pola formularza muszą być wypełnione';
			return FALSE;
		}
		
		if (databaseContainsUser($e, $p))
		{
			$sql = "SELECT * FROM users a
					 INNER JOIN sfid_users b
					 ON a.id = b.id_user
					 INNER JOIN sfid c
					 ON b.id_sfid = c.id_sfid
					 WHERE email = '{$e}' AND password = '{$p}';";
					 $nam = pg_query($sql);
					 $n  = pg_fetch_array($nam);
			
			session_start();
			$_SESSION['loggedIn'] = TRUE;
			$_SESSION['email'] = $e;
			$_SESSION['password'] = $p;
			$_SESSION['name'] = $n['name'];
			$_SESSION['surname'] = $n['surname'];
			$_SESSION['id'] = $n['id'];
			$_SESSION['id_sifd'] = $n['id_sfid'];
			$_SESSION['sfid'] = $n['sfid'];
			
			
			return TRUE;
		}
		else
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			unset($_SESSION['name']);
			unset($_SESSION['surname']);
			unset($_SESSION['id']); 
			unset($_SESSION['id_sifd']); 
			unset($_SESSION['sfid']); 
			$GLOBALS['loginError'];
			return FALSE;
		}
	}


		
	if (isset($_POST['action']) and $_POST['action'] == 'logout')
	{
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['name']);
		unset($_SESSION['surname']);
		unset($_SESSION['id']);
		unset($_SESSION['id_sifd']);
		unset($_SESSION['sfid']);
		header('Location: .');
		exit();
	}

	session_start();
	if (isset($_SESSION['loggedIn']))
	{
		return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
		
	}
	
	
}


function databaseContainsUser($email, $password)
{
	$conn = pg_connect("host='pgsql14.server169512.nazwa.pl' dbname='server169512_Testowa' user='server169512_Testowa' password='Testowa1991!' ");

	$sql = "SELECT * FROM users
			WHERE email = '{$email}'  AND password = '{$password}'; ";
	$user = pg_query($sql);
	
	$row = pg_fetch_array($user); 
	
	if($row > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


