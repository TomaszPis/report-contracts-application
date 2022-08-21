
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
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
									<th><?php echo $c['nr_con']; ?></th><th><?php echo $c['date_con']; ?></th><th><?php echo $or; ?></th><th><a href="?contract&id_con=<?php echo $c['id_con']; ?>">Zobacz więcej</a>
								</tr>
						<?php } ?>
					</table>	
				</div>
			</div>
			<div class="col item-2">
				<div class="col-title">
					<h2>Plany na miesiąc <?php echo $m; ?></h2>
				</div>
				<div class="ann">
					<div class="announcement">
						<p>Telefony:</p>
                        <div class="month-plan">
                            <p><?php echo $a[0] . '(' . $phones_pr  . '%) / ' . $min_plan . ' / ' .$t['amount']; ?></p>
                            <div class="month-phase" style="width: <?php echo str_replace(',', '.', $phones_pr); ?>%;"></div>
                        </div>
					</div>
					<div class="announcement">
						<p>Telefony:</p>
                        <div class="month-plan">
                            <p>30/80/100</p>
                            <div class="month-phase" style="width: 30%;"></div>
                        </div>
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>