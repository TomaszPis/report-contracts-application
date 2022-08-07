

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
	<header>
			<div id="hover-menu">
				<div id="p1"></div>
				<div id="p2"></div>
				<div id="p3"></div>
			</div>
			
			<div id="site-menu">
					<div id="close"></div>
				<ul>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-house"></i>
						</div>
						<div class="link-box">
							<a href="">
								Strona główna
							</a>
						</div>
						<div class="link-box hover">
							<a href="">
								Strona główna
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-circle-user"></i>
						</div>
						<div class="link-box">
							<a href="">
								O nas
							</a>
						</div>
						<div class="link-box hover">
							<a href="">
								O nas
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-images"></i>
						</div>
						<div class="link-box">
							<a href="">
								Galeria
							</a>
						</div>
						<div class="link-box hover">
							<a href="">
								Galeria
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-comment"></i>
						</div>
						<div class="link-box">
							<a href="">
								Forum
							</a>
						</div>
						<div class="link-box hover">
							<a href="">
								Forum
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-address-book"></i>
						</div>
						<div class="link-box">
							<a href="">
								Kontakt
							</a>
						</div>
						<div class="link-box hover">
							<a href="">
								Kontakt
							</a>
						</div>
					</li>
				</ul>
	</header>
	<div id="content">
		<div id="page-title">
			<h1>Strona główna</h1>
		</div>
		<div id="content-box">
			<div class="col">
				<div class="col-title">
					<h2>Lista pracowników</h2>
				</div>
				<div class="table">
					<table>
						
						<tr class="table-header">
							<th>SFID</th><th>Imię i nazwisko</th><th>Adres e-mail</th><th>Numer telefonu</th>
						</tr>
						<?php foreach ($u as $z){ ?>	
						<tr class="table-content">
							<th>20001741</th><th><?php echo $z['imie']?> <?php echo $z['nazwisko']?></th><th><?php echo $z['mail']?></th><th>000-000-000</th>
						</tr>
						<?php } ?>
						<tr class="table-content">
							<th>20001741</th><th>Użytkownika Testowy 2</th><th>u.testowy2@biuroraj.com.pl</th><th>000-000-111</th>
						</tr>
					</table>	
				</div>
			</div>
		</div>	
	</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>