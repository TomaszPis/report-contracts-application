
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
			<h1 class="welcom-intro">Cześć <?php echo ' ' . $_SESSION['name']; ?></h1>
		</div>
		<div id="content-box">
			<div class="flexbox-aling-right advancemnet-box">
					<div class="advancemnet-item">
						<div class="advancemnet-title">
							<h1>Pozyskanie TOTAL</h1>
						</div>
						<div class="advancemnet-values">
							<div class="values-item">
								<div class="value-percent">
									<p> <?php echo $total_plan_area_pr . '%';?> </p>
								</div>
							</div>
							<div class="values-item item-grid-3-columns">
								<div class="value">
									<p>Dzisiaj:</p>
									<p><?php echo $total_today; ?></p>
								</div>
								<div class="value">
									<p>Wczoraj: </p>
									<p><?php echo $total_yesterday; ?></p>
								</div>
								<div class="value">
									<p>Total: </p>
									<p><?php echo $total_source; ?></p>
								</div>
								<div class="value">
									<p>Plan: </p>
									<p><?php echo $total_plan_area; ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="advancemnet-item">
						<div class="advancemnet-title">
							<h1>Zatrzymanie TOTAL</h1>
						</div>
						<div class="advancemnet-values">
							<div class="values-item">
								<div class="value-percent">
									<p><?php echo $total_extension_plan_area_pr . '%'; ?> </p>
								</div>
							</div>
							<div class="values-item item-grid-3-columns">
								<div class="value">
									<p>Dzisiaj:</p>
									<p><?php echo $total_extension_today; ?></p>
								</div>
								<div class="value">
									<p>Wczoraj: </p>
									<p><?php echo $total_extension_yesterday; ?></p>
								</div>
								<div class="value">
									<p>Total: </p>
									<p><?php echo $total_extension; ?></p>
								</div>
								<div class="value">
									<p>Plan: </p>
									<p><?php echo $total_extension_plan_area; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>