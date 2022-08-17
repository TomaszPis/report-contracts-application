
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>

</body>
</html>
<div id="container">
	<?php include 'header.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Dane umowy</h1>
		</div>
		<div id="content-box">
			<div id="contract">
				<div class="search-box">
					<div class="title">
						<h2>Przeglądaj umowy</h2>
					</div>
					<form class="search-form" action="?" method="post">
						<label>Od: </label>
						<input type="date" name="date-1">
						<label>Do:</label>
						<input type="date" name="date-2">
						<div class="checkboxs">	
							<div class="checkbox">
								<input type="hidden" name="type-1" value="0">
								<label>PLK </label>
								<input type="checkbox" name="type-1" value="plk">
							</div>
							<div class="checkbox">
								<input type="hidden" name="type-2" value="0">
								<label>PB</label>
								<input type="checkbox" name="type-2" value="pb" disabled="disabled">
							</div>
						</div>
						<div class="submit">
							<input type="submit" name="action" value="Szukaj">
						</div>
					</form>
				</div>
				<div class="col item-1 for-reports">
					<div class="col-title">
					<h2>Umowy w przedziale: <?php echo $start_mon . ' - ' . $end_mon;; ?></h2>
						</div>
				<div class="table">
					<table>
						<?php echo $message; ?>
						<tr class="table-header">
							<th>Nr umowy</th><th>Data</th><th>Rodzaj</th>
						</tr>
						<?php 


						if($co != null){
							foreach ($co as $c) {	
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
						<?php }} ?>
					</table>	
				</div>
				</div>		
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>