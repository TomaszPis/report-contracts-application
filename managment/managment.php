
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
							<select name="id_month"> 
								<?php foreach ($p as $pl) { ?>
									<option value="<?php echo $pl['id_month']; ?>"><?php echo $pl['month']; ?></option>
								<?php } ?>
							</select>
							<select name="id_plan">
								<?php foreach ($mo as $mon) { ?>
									<option value="<?php echo $mon['id_plan']; ?>"><?php echo $mon['plan_name']; ?></option>
								<?php } ?>
							</select>
						<input type="submit" name="action" value="Dodaj plan">
					</form>
					<div class="check">
						<p><?php echo $m; ?> pozyskanie voice: <b><?php echo $v['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $v['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  zatrzymanie voice: <b><?php echo $continuation_plan['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $continuation_plan['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?> pozyskanie tv: <b><?php echo $tv_month_plan['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $tv_month_plan['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  zatrzymanie tv: <b><?php echo $tv_continuation_month_plan['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $tv_continuation_month_plan['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  pozyskanie DATA: <b><?php echo $DATA_month_plan['amount']; ?> </b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $DATA_month_plan['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  zatrzymanie DATA: <b><?php echo $DATA_continuation_month_plan['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $DATA_continuation_month_plan['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  telefony: <b><?php echo $t['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $t['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<p><?php echo $m; ?>  nks: <b> <?php echo $n['amount']; ?></b></p>
						<form action="?" method="post" class="add-content-form">
							<input type="hidden" name="id_m_plan" value="<?php echo $n['id_m_plan']; ?>">
							<input type="submit" name="action" value="Edytuj">
						</form>
					</div>
					<div class="check">
						<a href="?all_plans" class="link-to">Zobacz wszytskie plany</a>
					</div>
				</div>
				<div class="add-content">
					<h3>Dodaj urządzenie:</h3>
					<form action="?" method="post" class="add-content-form">
						<input type="text" name="name_dev">
						<select name="id_cat">
							<?php foreach ($c as $co) { ?>
									<option value="<?php echo $co['id_cat']; ?>"><?php echo $co['name_cat']; ?></option>
							<?php } ?>
						</select>
						<input type="submit" name="action" value="Dodaj urządzenie">
					</form>
					<div class="check">
						<a href="?all_devices" class="link-to">Zobacz wszytskie urządzenia</a>
					</div>
				</div>
			</div>

		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>