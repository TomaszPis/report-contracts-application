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
			<h1>Raportowanie umów</h1>
		</div>
		<div id="content-box">
			<div class="col">
				<div class="col-title">
					<a href="?plk_with"><h2>PLK ze sprzętem</h2></a>
				</div>
			</div>
			<div class="col">
				<div class="col-title">
					<a href="?plk_self"><h2>PLK bez sprzętu</h2></a>
				</div>
			</div>
			<div class="col">
				<div class="col-title">
					<a href="?pb"><h2>Polsat Box</h2></a>
				</div>	
		</div>
		<div id="contact">
			<form action="?plk_with" method="post" id="contact_form">
				<h1>Raportowanie umowy ze sprzętem:</h1>
					
					Data podpisania umowy <br>
					<input type="date" name="date" placeholder=""><br>
					Numer umowy:<br>
					<input type="text" name="number_con" placeholder="">
					<br>
					<select id="" name="source">
							<option value="Pozyskanie">Pozyskanie</option>
							<option value="Zatrzymanie">Zatrzymanie</option>
			  		</select><br>
					Oferta<br>
					<select id="" name="offer">
						<?php foreach ($of as $o) { ?>
							<option value="<?php echo $o['name_off'] ?>"><?php echo $o['name_off'] ?></option>
						<?php } ?>
			  		</select><br>
					Urządzenie<br>
					<select id="" name="device">
						<?php foreach ($de as $d) { ?>
							<option value="<?php echo $d['name_dev'] ?>"><?php echo $d['name_dev'] ?></option>
						<?php } ?>
			  		</select><br>

					IMEI urządzenia<br>
					<input type="text" name="imei" placeholder="">
					<br>
					
					<br>

					<input type="submit" name="action" value="Raportuj">

			</form>
		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>