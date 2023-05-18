<?php

include_once 'functions/db.ini.php';

include 'functions/access.php';

include 'functions/role.php';

 if (!userIsLoggedIn())
{
	include 'login.php';
	exit();
}

//Przypisanie liczb do miesięcy w tablicy asocjacyjnej
$months = array(1 => 'styczeń', 
			   2 => 'luty',
			   3 => 'marzec', 
			   4 => 'kwiecień', 
			   5 => 'maj', 
			   6 => 'czerwiec', 
			   7 => 'lipiec',
			   8 => 'sierpień', 
			   9 => 'wrzesień', 
			   10 => 'październik',
			   11 => 'listopad',
			   12 => 'grudzień');
//Obecny miesiąc
$curr_month =  Date('m');
//Obcny miesiąc
$curr_year = Date('Y');

$curr_day = Date('Y-m-d');

$day_before = date( 'Y-m-d', strtotime( $curr_day . ' -1 day' ));

//Znajdź obecny miesiąc i przypisz do niego nazwę
for ($i=1; $i < 13 ; $i++) { 

	if($i == $curr_month){
		 $m = $months[$i]; //Przypisz nazwę miesiąca
	}
}


//użycie funkcji user role do weryfikacji roli użytkownika
if(user_role($_SESSION['id']) == 'Sprzedawca'){

	include 'sellers/index2.php';
	exit();
}
else if(user_role($_SESSION['id']) == 'RKS'){
	include 'managers/index4.php';
	exit();
}
else if(user_role($_SESSION['id']) == 'Administrator'){
	include 'admin/index5.php';
	exit();
}
else{
	echo 'Nie masz uprawnień do sytemu';
}

