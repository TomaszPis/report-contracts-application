<header>

			<div id="logout">
				<h1 class="name"><i class="fa-solid fa-user"></i><?php echo ' ' . $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></h1>
				<h2 class="sfid"><?php echo $_SESSION['sfid']; ?>
						<input type="hidden" name="goto" value="../"> </h2>
				<form action="" method="post">
					<div class="link-form-box">
						<input type="hidden" name="action" value="logout">
						<input type="submit" class="logout-button" value="Wyloguj">
					</div>
				</form>
			</div>

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
							<a href="?">
								Strona główna
							</a>
						</div>
						<div class="link-box hover">
							<a href="?">
								Strona główna
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-chart-simple"></i>
						</div>
						<div class="link-box">
							<a href="?raports">
								Raporty
							</a>
						</div>
						<div class="link-box hover">
							<a href="?raports">
								Raporty
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-solid fa-gears"></i>
						</div>
						<div class="link-box">
							<a href="?settings">
								Ustawienia
							</a>
						</div>
						<div class="link-box hover">
							<a href="?settings">
								Ustawienia
							</a>
						</div>
					</li>
				</ul>
	</header>