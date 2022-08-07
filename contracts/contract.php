
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
			<h1>Dane umowy</h1>
		</div>
		<div id="content-box">
			<div id="contract">
				<div class="contract_row">
					<div class="contract_col_data">
						<p>Numer Umowy</p>
					</div>
					<div class="contract_col_data">
						<p><?php echo $number; ?></p>
					</div>
				</div>
				<div class="contract_row">
					<div class="contract_col_data">
						<p>Data podpisania umowy</p>
					</div>
					<div class="contract_col_data">
						<p><?php echo $date; ?></p>
					</div>
				</div>
				<div class="contract_row">
					<div class="contract_col_data">
						<p>Rodzaj Umowy</p>
					</div>
					<div class="contract_col_data">
						<p><?php echo $type; ?></p>
					</div>
				</div>
				<div class="contract_row">
					<div class="contract_col_data">
						<p>Urządzenie</p>
					</div>
					<div class="contract_col_data">
						<p><?php echo $name_dev; ?></p>
					</div>
				</div>
				<div class="contract_row">
					<div class="contract_col_data">
						<p>IMEI</p>
					</div>
					<div class="contract_col_data">
						<p><?php echo $imei; ?></p>
					</div>
				</div>
				<div id="contract-buttons">
					<form action="?" method="post">	
						<input type="hidden" name="id_con" value="<?php echo $id_con; ?>" />
						<input type="submit" name="action" value="Usuń umowę">
					</form>
				</div>
			</div>
		</div>
	</div>		
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>