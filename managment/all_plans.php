
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
				<div class="contract-col">
					<h3>Telefony</h3>
					<?php foreach ($t as $te) { ?>					
						<div class="contract_row tables-plan">
							<div class="contract_col_data left-con">
								<p><?php echo $te['month'] . ' ' . $te['year']; ?></p>
							</div>
							<div class="contract_col_data rigt-con">
								<p>Ilość: <?php echo $te['amount']; ?></p>
							</div>
							<div id="contract-buttons edit">
								<form action="?" method="post">	
									<input type="hidden" name="id_m_plan" value="<?php echo $te['id_m_plan']; ?>" />
									<input type="submit" name="action" value="Edytuj" class="edit-button">
								</form>
							</div>
							<div id="contract-buttons delete">
								<form action="?" method="post">	
									<input type="hidden" name="id_m_plan" value="<?php echo $te['id_m_plan']; ?>" />
									<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
								</form>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="contract-col">
					<h3>NKSy</h3>
					<div class="contract_row tables-plan">
						<div class="contract_col_data left-con">
							<p>Sierpień 2022</p>
						</div>
						<div class="contract_col_data rigt-con">
							<p>Ilość: 45</p>
						</div>
						<div id="">
							<form action="?" method="post">	
								<input type="hidden" name="id_m_plan" value="<?php echo $id_m_plan; ?>" />
								<input type="submit" name="action" value="Edytuj" class="edit-button">
							</form>
						</div>
						<div id="">
							<form action="?" method="post">	
								<input type="hidden" name="id_m_plan" value="<?php echo $id_m_plan; ?>" />
								<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
							</form>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>