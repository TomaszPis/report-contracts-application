
<!DOCTYPE html>
<html>
<head>
	<title>Szablon No.1</title>

	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href='http://fonts.googleapis.com/css?family=Arsenal&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>

</body>
</html>
<div id="container">
	<?php include 'header.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Zarządzanie danymi</h1>
		</div>
		<div id="content-box">
			<div class="col item-1">
				<div class="add-content">
					<h3>Dodaj plan:</h3>
					<form action="?" method="post" class="add-content-form">
						<input type="text" name="plan">
							<select>
								<?php foreach ($p as $pl) { ?>
									<option value="<?php echo $pl['month']; ?>"><?php echo $pl['month']; ?></option>
								<?php } ?>
							</select>
							<select name="plan_name">
								<?php foreach ($mo as $mon) { ?>
									<option value="<?php echo $mon['plan_name']; ?>"><?php echo $mon['plan_name']; ?></option>
								<?php } ?>
							</select>
						<input type="submit" name="" value="Dodaj plan">
					</form>
					<div class="check">
						<p>Plan na miesiąc <?php echo $m; ?> dla telefonów: <?php echo $t['amount']; ?></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" value="">
							<input type="submit" name="" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p>Plan na miesiąc <?php echo $m; ?> dla nks: <?php echo $n['amount']; ?></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" value="">
							<input type="submit" name="" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<a href="../" class="link-to">Zobacz wszytskie plany</a>
					</div>
				</div>
				<div class="add-content">
					<h3>Dodaj urządzenie:</h3>
					<form action="?" method="post" class="add-content-form">
						<input type="text" name="name_dev">
						<select>
							<?php foreach ($mo as $mon) { ?>
									<option value="<?php echo $mon['plan_name']; ?>"><?php echo $mon['plan_name']; ?></option>
								<?php } ?>
						</select>
						<input type="submit" name="" value="Dodaj urządzenie">
					</form>
					<div class="check">
						<a href="../" class="link-to">Zobacz wszytskie urządzenia</a>
					</div>
				</div>
			</div>

		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>