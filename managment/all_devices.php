
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
			<h1>Wszystkie urządzenia</h1>
		</div>
		<div id="content-box">
			<div id="contract">
				<div class="contract-col">
					<h3>Telefony</h3>
					<?php foreach ($t as $te) { ?>					
						<div class="contract_row all-phones">
							<div class="contract_col_data left-con">
								<p><?php echo $te['name_dev']; ?></p>
							</div>
							<div id="contract-buttons edit">
								<form action="?" method="post">	
									<input type="hidden" name="id_dev" value="<?php echo $te['id_dev']; ?>" />
									<input type="submit" name="action_dev" value="Edytuj" class="edit-button">
								</form>
							</div>
							<div id="contract-buttons delete">
								<form action="?" method="post">	
									<input type="hidden" name="id_dev" value="<?php echo $te['id_dev']; ?>" />
									<input type="submit" name="action_dev" value="Usuń" class="edit-button delete-button">
								</form>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="contract-col">
					<h3>NKSy</h3>
					<?php foreach ($n as $ne) { ?>					
						<div class="contract_row all-phones">
							<div class="contract_col_data left-con">
								<p><?php echo $ne['name_dev']; ?></p>
							</div>
							<div id="contract-buttons edit">
								<form action="?" method="post">	
									<input type="hidden" name="id_dev" value="<?php echo $ne['id_dev']; ?>" />
									<input type="submit" name="action_dev" value="Edytuj" class="edit-button">
								</form>
							</div>
							<div id="contract-buttons delete">
								<form action="?" method="post">	
									<input type="hidden" name="id_dev" value="<?php echo $ne['id_dev']; ?>" />
									<input type="submit" name="action_dev" value="Usuń" class="edit-button delete-button">
								</form>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>		
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>