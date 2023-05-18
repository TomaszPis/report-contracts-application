
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>

</body>
</html>
<div id="container">
	<?php include 'managers/header_2.php'; ?>
		<div id="content">
		<div id="page-title">
			<h1>Raport miesięczny</h1>
		</div>
		<div id="content-box">
			<?php include 'managers/menu_menagers.php'; ?>
			<div class="col item-sfid">
				<div class="sfid-name">
					<h2><?php echo $title_plan ?></h2>
				</div>
				<div class="sfid-plans">
						<table class="sfid-table">
							<tr>
								<td class="sfid-column"><b>Sfid<b></td>
								<td class="amount"><b>Wczoraj</b></td>
								<td class="amount"><b>Dzisiaj</b></td>
								<td class="amount"><b>Total</b></td>
								<td class="amount"><b>Realizacja</b></td>
								<td class="amount"><b>Plan</b></td>
							</tr>
							<?php

								foreach ($sfid as $s) {

									$date = $curr_year . '-' . $curr_month;

									$start_mon = $curr_year . '-' . $curr_month . '-' . '01';  // Ustaw początek bierzącego miesiąca

																				
									$end_mon = $curr_year . '-' . $curr_month . '-' . date('t'); //Ustaw koniec miesiąca i dopisz zero przed liczbą miesiąca


									//Ilość telefonów w danym miesiącu
 
									//Ile podpisanow umów przez cały miesiąc
									$count_whole_month = tv_whole_month($s['id_sfid'], $start_mon, $end_mon);


									//Ile dziś podpisano pozyskań
									$today = tv_today($s['id_sfid'], $curr_day);

									//Ile podpisano pozyskań dzien wcześniej
									$yesterday = tv_yesterday($s['id_sfid'], $day_before);


									//Plany na pozyskanie tv dla sifd, na bierzący miesiąc
									$plan = tv_month_plan($s['id_sfid'], $m, $curr_year);



									//Oblicz procent sprzedanych umów w skali miesiąca
									//2.Pozyskanie Voice
									if($count_whole_month[0] > 0){

										if($plan != 0){
										 $plan_pr =  round(($count_whole_month[0]/$plan)*100, 2);
										}
										else{
											$plan_pr = 0;
										}

									}
									else{
										$plan_pr = 0;
									}	

									 									
									$total_contracts  += $count_whole_month[0];  //total umów w miesiącu
									$yesterday_contracts += $yesterday[0]; //total umów z dnia poprzedniego
									$today_contracts += $today[0];
									$total_plans += $plan;

									if($total_plans != 0){	
										$total_pr =  round(($total_contracts/$total_plans)*100, 2);
									}
									else
									{
									   $total_pr = 0;
									}
								
								?>
								<tr>
									<td class="plan-name"><a href="index.html" class="sfid-link"><?php echo $s['sfid']; ?></a></td>
									<td class="amount"><?php echo $yesterday[0];?></td>
									<td class="amount"><?php echo $today[0]; ?></td>
									<td class="amount"><?php echo $count_whole_month[0]; ?></td>
									<td class="amount"><?php echo $plan_pr . '%'; ?></td>
									<td class="amount"><?php echo $plan; ?></td>
								</tr>
							<?php } ?>
								<tr>
									<td class="plan-name">Razem</td>
									<td class="amount"><?php echo $yesterday_contracts; ?></td>
									<td class="amount"><?php echo $today_contracts; ?></td>
									<td class="amount"><?php echo $total_contracts;  ?></td>
									<td class="amount"><?php echo $total_pr . '%'; ?></td>
									<td class="amount"><?php echo $total_plans; ?></td>
								</tr>
						</table>
				</div>
				<div class="month-link">
					<a href="?month_plan_voice" >Cały miesiąc</a>
				</div>
			</div>
		</div>
		
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>