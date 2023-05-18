<header>
			<div id="logout">
				<h1 class="name"><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></h1>
						<input type="hidden" name="goto" value="../"> 
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
							<i class="fa-solid fa-circle-user"></i>
						</div>
						<div class="link-box">
							<a href="?users">
								Użytkownicy
							</a>
						</div>
						<div class="link-box hover">
							<a href="?users">
								Użytkownicy
							</a>
						</div>
					</li>
					<li>
						<div class="icon-box">
							<i class="fa-light fa-building-circle-arrow-right"></i>
						</div>
						<div class="link-box">
							<a href="?sfidandarea">
								SFIDy i mikrorynki
							</a>
						</div>
						<div class="link-box hover">
							<a href="?sfidandarea">
								SFIDy i mikrorynki
							</a>
						</div>
					</li>
				</ul>
	</header>