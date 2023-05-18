<?php

	include 'functions_manager/month_plan_count_function/voice_all_month.php';

	include 'functions_manager/today_plan_count_function/voice_today.php';

	include 'functions_manager/yesterday_plan_count_function/voice_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/voice_month_plan.php';


	include 'functions_manager/month_plan_count_function/voice_extension_month.php';

	include 'functions_manager/today_plan_count_function/voice_extension_today.php';

	include 'functions_manager/yesterday_plan_count_function/voice_extension_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/voice_extension_plan.php';


	include 'functions_manager/month_plan_count_function/tv_all_month.php';

	include 'functions_manager/today_plan_count_function/tv_today.php';

	include 'functions_manager/yesterday_plan_count_function/tv_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/tv_month_plan.php';


	include 'functions_manager/month_plan_count_function/tv_extension_month.php';

	include 'functions_manager/today_plan_count_function/tv_extension_today.php';

	include 'functions_manager/yesterday_plan_count_function/tv_extension_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/tv_extension_plan.php';


	include 'functions_manager/month_plan_count_function/data_all_month.php';

	include 'functions_manager/today_plan_count_function/data_today.php';

	include 'functions_manager/yesterday_plan_count_function/data_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/data_month_plan.php';


	include 'functions_manager/month_plan_count_function/data_extension_month.php';

	include 'functions_manager/today_plan_count_function/data_extension_today.php';

	include 'functions_manager/yesterday_plan_count_function/data_extension_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/data_extension_plan.php';



	include 'functions_manager/month_plan_count_function/phones_all_month.php';

	include 'functions_manager/today_plan_count_function/phones_today.php';

	include 'functions_manager/yesterday_plan_count_function/phones_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/phones_month_plan.php';	
	

	include 'functions_manager/month_plan_count_function/devices_all_month.php';

	include 'functions_manager/today_plan_count_function/devices_today.php';

	include 'functions_manager/yesterday_plan_count_function/devices_yesterday.php';

	include 'functions_manager/month_plan_for_sfid/devices_month_plan.php';


$date = $curr_year . '-' . $curr_month;
$start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca
$end_mon = $curr_year . '-' . $curr_month . '-' . date('t'); //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca


//przypisz sfidy do managera
$sql = "SELECT a.id_sfid, a.sfid FROM sfid a
		INNER JOIN sfid_area b
		ON a.id_sfid = b.id_sfid
		INNER JOIN manager_area c
		ON b.id_area = c.id_area
		INNER JOIN managers d
		ON c.id_manager = d.id_manager
		INNER JOIN users e
		ON d.id = e.id
		WHERE d.id = {$_SESSION['id']};";
$sfids = pg_query($sql);
$sfid  = pg_fetch_all($sfids);

$total = 0;
$total_sfid = 0;
$total_contracts  = 0;
$yesterday_contracts = 0;
$today_contracts = 0;


if (isset($_GET['raports'])) {
	

	$title_plan = 'Pozyskanie Voice';

	include_once 'raports/voice_raport.php'; 
	exit();
}


//Zatrzymanie voice
if (isset($_GET['contract_extension'])) {


	$title_plan = 'Zatrzymanie Voice';
	
	include 'raports/extension_raport.php';
	exit();
}

//Pozyskanie Tv
if (isset($_GET['contract_tv'])) {


	$title_plan = 'Pozyskanie TV';	
	include 'raports/tv_raport.php';
	exit();
}

//Zatrzymanie TV

if (isset($_GET['contract_extension_tv'])) {


	$title_plan = 'Zatrzymanie TV';	
	include 'raports/tv_extension_raport.php';
	exit();
}

//pozyskanie data
if (isset($_GET['contract_data'])) {


	$title_plan = 'Pozyskanie DATA';
	
	include 'raports/data_raport.php';
	exit();
}

//zatrzymanie data
if (isset($_GET['contract_extension_data'])) {


	$title_plan = 'Zatrzymanie DATA';
	
	include 'raports/data_extension_raport.php';
	exit();
}

//telefony
if (isset($_GET['phones_raport'])) {


	$title_plan = 'Telefony';
	
	include 'raports/phones_raport.php';
	exit();
}

//nks-y
if (isset($_GET['devices_raport'])) {

	$title_plan = 'NKS-y';	
	include 'raports/devices_raport.php';
	exit();
}

if (isset($_GET['month_plan_voice'])) {
	
	include 'monthly_voice.php';
	exit();
}

if (isset($_GET['month_plan_extension_voice'])) {
	
	include 'monthly_extension_voice.php';
	exit();
}

if (isset($_GET['month_plan_tv'])) {
	
	include 'monthly_tv.php';
	exit();
}

if (isset($_GET['month_plan_data'])) {
	
	include 'monthly_data.php';
	exit();
}

if (isset($_GET['month_plan_extension_data'])) {
	
	include 'monthly_extension_data.php';
	exit();
}

if (isset($_GET['month_plan_devices'])) {
	
	include 'monthly_devices.php';
	exit();
}

if (isset($_GET['month_plan_phones'])) {
	
	include 'monthly_phones.php';
	exit();
}

if (isset($_GET['contracts_for_sfid'])) {
	

	$id_sfid = pg_escape_string($_GET['id_sfid']);

	$sql = "SELECT id_sfid, sfid FROM sfid 
			WHERE  id_sfid = {$id_sfid}";
	$sfids = pg_query($sql);
	$sfid_name  = pg_fetch_array($sfids);

	$date = $curr_year . '-' . $curr_month;

	$start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca

	$end_mon = $curr_year . '-' . $curr_month . '-' . date('t'); //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca


	//znajdź i oblicz plany

	$total_voice = voice_whole_month($id_sfid, $start_mon, $end_mon)[0] ; // pozyskanie voice total - dopisek '[0]' ponieważ funkcja zwraca tablicę 
	$plan_voice = voice_month_plan($id_sfid, $m, $curr_year); //plan na voice
	if($plan_voice != 0){
		$pr_voice = round(($total_voice/$plan_voice)*100, 2);//realizacha plany
	}
	else{

		$pr_voice = 0;
	}

    $total_voice_extension = voice_extension_month($id_sfid, $start_mon, $end_mon)[0];//Zatrzymanie voice total - dopisek '[0]' ponieważ funkcja zwraca tablicę
	$plan_voice_extension = voice_extension_plan($id_sfid, $m, $curr_year);//Zatrztmanie voice
	if($plan_vocie_extension != 0){
		$pr_voice_extension = round(($total_voice_extension/$plan_voice_extension)*100,2);//realizacja planu
	}
	else{
		$pr_voice_extension = 0;
	}


	$total_tv = tv_whole_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_tv = tv_month_plan($id_sfid, $m, $curr_year);
	if($plan_tv != 0){
		$pr_tv = round(($total_tv/$plan_tv)*100,2);
	}
	else{
		$pr_tv = 0;
	}


	$total_tv_extenison = tv_extension_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_tv_extension = tv_extension_plan($id_sfid, $m, $curr_year);
	if($plan_tv_extension != 0){
		$pr_tv_extension = round(($total_tv_extension/$plan_tv_extension)*100,2);
	}
	else{
		$pr_tv_extension = 0;
	}

	$total_data = data_all_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_data = data_month_plan($id_sfid, $m, $curr_year);
	if($plan_data != 0){
		$pr_data = round(($total_data/$plan_data)*100,2);
	}
	else{
		$pr_data = 0;
	}

	$total_data_extension = data_extension_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_data_extension = data_extension_plan($id_sfid, $m, $curr_year);
	if($plan_data_extension != 0){
		$pr_data_extension = round(($total_data_extension/$plan_data_extension)*100,2);
	}
	else{
		$pr_data_extension = 0;
	}

	$total_phones = phones_all_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_phones = phones_month_plan($id_sfid, $m, $curr_year);
	if($plan_phones != 0){
		$pr_phones = round(($total_phones/$plan_phones)*100,2);
	}
	else{
		$pr_phones = 0;
	}

	$total_devices = devices_all_month($id_sfid, $start_mon, $end_mon)[0];
	$plan_devices = devices_month_plan($id_sfid, $m, $curr_year);
	if($plan_devices != 0){
		$pr_devices = round(($total_devices/$plan_devices)*100,2);
	}
	else{
		$pr_devices = 0;
	}

	include 'sfid_datas/sfid_datas.php';
	exit();
}





$total_source = 0;
$total_extension = 0;
//policz ilość realizacji planu total dla mikrorynku
foreach ($sfid as $s){

	$voice_for_area = voice_whole_month($s['id_sfid'], $start_mon, $end_mon)[0];
	$tv_for_area = tv_whole_month($s['id_sfid'], $start_mon, $end_mon)[0];
	$data_for_area =  data_all_month($s['id_sfid'], $start_mon, $end_mon)[0];

	$count_whole_month = $voice_for_area + $tv_for_area + $data_for_area;
	$total_source += $count_whole_month;
}



foreach ($sfid as $s){

	$voice_extension_for_area = voice_extension_month($s['id_sfid'], $start_mon, $end_mon)[0];
	$tv_extension_for_area = tv_extension_month($s['id_sfid'], $start_mon, $end_mon)[0];
	$data_extension_for_area = data_extension_month($s['id_sfid'], $start_mon, $end_mon)[0];

	$count_extension_whole_month  = $voice_extension_for_area + $tv_extension_for_area + $data_extension_for_area;
	$total_extension += $count_extension_whole_month;
}

//total sprzedanaych umów dziś
foreach ($sfid as $s){
	$total_voice_today = voice_today($s['id_sfid'], $curr_day)[0];
	$total_tv_today = tv_today($s['id_sfid'], $curr_day)[0];
	$total_data_today = data_today($s['id_sfid'], $curr_day)[0];

	$count_total_today = $total_voice_today + $total_tv_today + $total_data_today;
	$total_today += $count_total_today;

}

foreach ($sfid as $s){
	$total_extension_voice_today = voice_extension_today($s['id_sfid'], $curr_day)[0];
	$total_extension_tv_today = tv_extension_today($s['id_sfid'], $curr_day)[0];
	$total_extension_data_today = data_extension_today($s['id_sfid'], $curr_day)[0];

	$count_total_extension_today = $total_extension_voice_today + $total_extension_tv_today + $total_extension_data_today;
	$total_extension_today += $count_total_extension_today;

}
//total sprzedanych umów wczoraj

foreach ($sfid as $s){
	$total_voice_yesterday = voice_yesterday($s['id_sfid'], $day_before)[0];
	$total_tv_yesterday = tv_yesterday($s['id_sfid'], $day_before)[0];
	$total_data_yesterday = data_yesterday($s['id_sfid'],$day_before)[0];

	$count_total_yesterday = $total_voice_yesterday + $total_tv_yesterday + $total_data_yesterday;
	$total_yesterday += $count_total_yesterday;
}

foreach ($sfid as $s){
	$total_extension_voice_yesterday = voice_extension_yesterday($s['id_sfid'], $day_before)[0];
	$total_extension_tv_yesterday = tv_extension_yesterday($s['id_sfid'], $day_before)[0];
	$total_extension_data_yesterday = data_extension_yesterday($s['id_sfid'],$day_before)[0];

	$count_total_extension_yesterday = $total_extension_voice_yesterday + $total_extension_tv_yesterday + $total_extension_data_yesterday;
	$total_extension_yesterday += $count_total_extension_yesterday;


}
//total plan
foreach ($sfid as $s){
	$total_voice_plan_area = voice_month_plan($s['id_sfid'], $m, $curr_year);
	$total_tv_plan_area = tv_month_plan($s['id_sfid'], $m, $curr_year);
	$total_data_plan_area = data_month_plan($s['id_sfid'], $m, $curr_year);

	$count_total_plan_area = $total_voice_plan_area + $total_tv_plan_area + $total_data_plan_area;
	$total_plan_area += $count_total_plan_area;
}

foreach ($sfid as $s){
	$total_extension_voice_plan_area = voice_extension_plan($s['id_sfid'], $m, $curr_year);
	$total_extension_tv_plan_area = tv_extension_plan($s['id_sfid'], $m, $curr_year);
	$total_extension_data_plan_area = data_extension_plan($s['id_sfid'], $m, $curr_year);

	$count_total_extension_plan_area = $total_extension_voice_plan_area + $total_extension_tv_plan_area + $total_extension_data_plan_area;
	$total_extension_plan_area += $count_total_extension_plan_area;
}

//oblicz procen realizacji planu pozyskań
if($total_source > 0){
	$total_plan_area_pr = round(($total_source/$total_plan_area)*100,2);
}
else{
	$total_plan_area_pr = 0;
}

if($total_extension > 0){
	$total_extension_plan_area_pr = round(($total_extension/$total_extension_plan_area)*100,2);
}
else{
	$total_extension_plan_area_pr = 0;
}

include_once 'home_managers.php';
exit();
