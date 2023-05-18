
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>

</body>
</html>
<div id="container">
	<?php include 'header.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Strona główna</h1>
		</div>
		<div id="content-box">
			<div class="col item-1">
				<div class="col-title">
					<h2>Plany na miesiąc <?php echo $m; ?></h2>
				</div>
				<div class="ann">
					<!-- Pozyskanie voice -->
					<div class="announcement">
						<p><?php echo $v['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $d[0] . ' (' . $voice_pr  . '%) / '  . $v['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $voice_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- Zatrzymanie voice -->
					<div class="announcement">
						<p><?php echo $continuation_plan['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $continuation[0] . ' (' . $continuation_pr  . '%) / '  . $continuation_plan['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.',$continuation_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- Pozyskanie TV -->
					<div class="announcement">
						<p><?php echo $tv_month_plan['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $TV[0] . ' (' . $TV_pr  . '%) / '  . $tv_month_plan['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.',$TV_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- Zatrzymanie TV -->
					<div class="announcement">
						<p><?php echo $tv_continuation_month_plan['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $tv_continuation[0] . ' (' . $continuation_pr  . '%) / '  . $tv_continuation_month_plan['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.',$tv_continuation_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- telefony -->
					<div class="announcement">
						<p><?php echo $t['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $a[0] . ' (' . $phones_pr  . '%) / ' . $min_plan . ' / ' . $t['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $phones_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- nksy -->
					<div class="announcement">
						<p><?php echo $n['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $b[0] . ' (' . $nks_pr  . '%) / '  . $n['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $nks_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- Pozyskanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_month_plan['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $DATA[0] . ' (' . $DATA_pr  . '%) / '  . $DATA_month_plan['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $DATA_pr); ?>%;"></div>
                        </div>
					</div>
					<!-- Zatrzymanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_continuation_month_plan['plan_name']; ?>:</p>
                        <div class="month-plan">
                            <p><?php echo $DATA_continuation [0] . ' (' . $DATA_continuation_pr  . '%) / '  . $DATA_continuation_month_plan['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $DATA_continuation_pr); ?>%;"></div>
                        </div>
					</div>
				</div>
			</div>
			<div class="col links item-2">
				<div class="col-title">
					<h2>Dzisiaj</h2>
				</div>
				<div class="">
					<!-- Pozyskanie voice -->
					<div class="announcement">
						<p class="longer-plan-name"><?php echo $v['plan_name']; ?>:</p>
                        <p><?php echo $voice_today; ?></p>
					</div>
					<!-- Zatrzymanie voice -->
					<div class="announcement">
						<p><?php echo $continuation_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Pozyskanie TV -->
					<div class="announcement">
						<p><?php echo $tv_month_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Zatrzymanie TV -->
					<div class="announcement">
						<p><?php echo $tv_continuation_month_plan['plan_name']; ?>:</p>
                        <p></p>

					</div>
					<!-- telefony -->
					<div class="announcement">
						<p><?php echo $t['plan_name']; ?>:</p>
                         <p></p>

					</div>
					<!-- nksy -->
					<div class="announcement">
						<p><?php echo $n['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Pozyskanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_month_plan['plan_name']; ?>:</p>
                         <p></p>
					</div>
					<!-- Zatrzymanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_continuation_month_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
				</div>
			</div>
			<div class="col links item-2">
				<div class="col-title">
					<h2>Wczoraj</h2>
				</div>
				<div class="">
					<!-- Pozyskanie voice -->
					<div class="announcement">
						<p class="longer-plan-name"><?php echo $v['plan_name']; ?>:</p>
                        <p>0</p>
					</div>
					<!-- Zatrzymanie voice -->
					<div class="announcement">
						<p><?php echo $continuation_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Pozyskanie TV -->
					<div class="announcement">
						<p><?php echo $tv_month_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Zatrzymanie TV -->
					<div class="announcement">
						<p><?php echo $tv_continuation_month_plan['plan_name']; ?>:</p>
                        <p></p>

					</div>
					<!-- telefony -->
					<div class="announcement">
						<p><?php echo $t['plan_name']; ?>:</p>
                         <p></p>

					</div>
					<!-- nksy -->
					<div class="announcement">
						<p><?php echo $n['plan_name']; ?>:</p>
                        <p></p>
					</div>
					<!-- Pozyskanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_month_plan['plan_name']; ?>:</p>
                         <p></p>
					</div>
					<!-- Zatrzymanie DATA -->
					<div class="announcement">
						<p><?php echo $DATA_continuation_month_plan['plan_name']; ?>:</p>
                        <p></p>
					</div>
				</div>
			</div>
			<div class="col item-3">
				<div class="col-title">
					<h2>Ostatnie umowy</h2>
				</div>
				<div class="table">
					<table>
						
						<tr class="table-header">
							<th>Nr umowy</th><th>Data</th><th>Rodzaj</th>
						</tr>
						<?php foreach ($co as $c) {
								if($c['or_source'] == 't'){
									$or = 'Pozyskanie';
								}
								else{
									$or = 'Zatrzymanie';
								}
							?>
							
								<tr class="table-content">
									<th><?php echo $c['nr_con']; ?></th><th><?php echo $c['date_con']; ?></th><th><?php echo $or; ?></th><th><a href="?contract&id_con=<?php echo $c['id_con']; ?>" class="table-link">Zobacz więcej</a></th>
								</tr>
						<?php } ?>
					</table>	
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>