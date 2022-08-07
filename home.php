
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
			<div class="col item-2">
				<div class="col-title">
					<h2>Plany na miesiąc <?php echo $m; ?></h2>
				</div>
				<div class="table ann">
					<div class="announcement">
						<p><?php echo $t['plan_name'] . ':' ?> </p>
						<p><?php echo $t['amount']; ?></p>
					</div>
					<div class="announcement">
						<p>Plan minimum telefonów: </p>
						<p><?php echo $min_plan; ?></p>
					</div>
					<div class="announcement">
						<p>Sprzedano:</p>
						<p> <?php echo $a[0]; ?> </p>
					</div>
					<div class="announcement">
						<p><?php echo $n['plan_name'] . ':' ?></p>
						<p><?php echo $n['amount']; ?></p>
					</div>
				</div>
			</div>
			<div class="col links item-3">
				<div class="col-title">
					<h2>Przydatne linki</h2>
				</div>
				<div class="col-box flex-row">
					<a href="" class="col-box-link">Link 1</a>
					<a href="" class="col-box-link">Link 2</a>
					<a href="" class="col-box-link">Link 3</a>
					<a href="" class="col-box-link">Link 4</a>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>