
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
	<div id="content">
		
		<div id="page-title">
			<h1>Edutyjesz sprzęt:</h1>
		</div>
		<div id="content-box">
			<div class="col item-1">
				<div class="add-content">
					
					<form action="?" method="post" class="add-content-form">
						<input type="text" name="edit_dev" value="<?php echo $d['name_dev']; ?>">
						<select name="id_cat">
							<?php foreach ($c as $co) { ?>
									<option value="<?php echo $co['id_cat']; ?>"><?php echo $co['name_cat']; ?></option>
							<?php } ?>
						</select>
						<input type="hidden" name="id_dev" value="<?php echo $id_dev; ?>">
						<input type="submit" name="action_dev" value="Zapisz">
					</form>
					<div class="error">
						<p style="color: red;"><?php echo $message; ?></p>
					</div>		
				</div>
			</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>