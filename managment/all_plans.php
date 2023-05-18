
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
					<h3>Pozyskanie Voice</h3>
					<?php 
						if($v > 0){
							foreach ($v as $ve) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $ve['month'] . ' ' . $ve['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $ve['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $ve['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $ve['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Zatrzymanie Voice</h3>
					<?php 
						if($continuation_month_plan  > 0){
							foreach ($continuation_month_plan  as $c) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $c['month'] . ' ' . $c['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $c['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $c['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $c['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Pozyskanie TV</h3>
					<?php 
						if($tv_month_plan > 0){
							foreach ($tv_month_plan  as $tv) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $tv['month'] . ' ' . $tv['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $tv['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $tv['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $tv['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Zatrzymanue TV</h3>
					<?php 
						if($tv_continuation_month_plan> 0){
							foreach ($tv_continuation_month_plan as $tv) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $tv['month'] . ' ' . $tv['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $tv['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $tv['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $tv['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Pozyskanie DATA</h3>
					<?php 
						if($DATA_month_plan > 0){
							foreach ($DATA_month_plan   as $DATA) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $DATA['month'] . ' ' . $DATA['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $DATA['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $DATA['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $DATA['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Zatrzymanie DATA</h3>
					<?php 
						if($DATA_continuation_month_plan > 0){
							foreach ($DATA_continuation_month_plan   as $DATA_continuation) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $DATA_continuation['month'] . ' ' . $DATA_continuation['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $DATA_continuation['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $DATA_continuation['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $DATA_continuation['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
				<div class="contract-col">
					<h3>Telefony</h3>
					<?php 

						if($t > 0){
							foreach ($t as $te) { ?>					
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
					<?php }		
						}
						else{
							echo "<h2>Brak danych</h2>";
						} 
					?>
				</div>
				<div class="contract-col">
					<h3>NKSy</h3>
					<?php 
						if($n > 0){
							foreach ($n as $ne) { ?>					
							<div class="contract_row tables-plan">
								<div class="contract_col_data left-con">
									<p><?php echo $ne['month'] . ' ' . $ne['year']; ?></p>
								</div>
								<div class="contract_col_data rigt-con">
									<p>Ilość: <?php echo $ne['amount']; ?></p>
								</div>
								<div id="contract-buttons edit">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $ne['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Edytuj" class="edit-button">
									</form>
								</div>
								<div id="contract-buttons delete">
									<form action="?" method="post">	
										<input type="hidden" name="id_m_plan" value="<?php echo $ne['id_m_plan']; ?>" />
										<input type="submit" name="action" value="Usuń" class="edit-button delete-button">
									</form>
								</div>
							</div>
					<?php }
						}
						else{
							echo "<h2>Brak danych</h2>";
						}  
					?>
				</div>
			</div>		
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>