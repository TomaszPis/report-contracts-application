<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div id="container">
	<?php include 'admin/header_admin.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Panel administracyjny</h1>
		</div>
		<div id="content-box">
			<div id="add_and_search_users">
				<div class="admin-col data_user">
					<div class="add_user_title">
						<h2>Lista sprzedawców</h2>
					</div>
					<div class="sfid_users">
						<ul class="list_sfid_users">
							<?php foreach ($sfid_users as $user) { ?>
							<li>
								<div class="name_sfid_user">
										<?php echo $user['name'] . ' ' . $user['surname'] ?>
								</div>
								<div class="action_sfid_user">
										<a href="?user_profil&user_id=<?php echo $user['id'];?>">Profil</a>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>
					<div class="action_user_link">
						<a href="?users">
							Dodaj pracownika
						</a>
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Zmień mikrorynek:</h2>
					</div>
					<div class="add_user_title">
						<p>Mikrorynek: <?php echo $sfid_area['area_name']; ?></p>
					</div>

					<div class="form">
							<form action="?add_user" method="post" id="contact_form">
								<input type="hidden" name="id_sfid" value="<?php echo $id_sfid; ?>">
							<select id="" name="area">
								<?php foreach ($areas_list as $area) { ?>
									<option value="<?php echo $area['id_area']; ?>"><?php echo $area['area_name']; ?></option>
								<?php } ?>
			  				</select><br>
								<br>

								<input type="submit" name="action_area" value="Zmień">

						</form>	
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Akcje</h2>
					</div>
					<div class="sfid_actions">
						<div class="sfid_action_link">
							<a href="">Edytuj sfid</a>
						</div>
						<div class="sfid_action_link delete_sfid">
							<a href="">Usuń sfid</a>
						</div>
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Zmień hasło:</h2>
					</div>
					<div class="form">
							<form action="?add_user" method="post" id="contact_form">
								<input type="hidden" name="user_id">
								<input type="text" name="password">
								<br>

								<input type="submit" name="action_password" value="Aktualizuj">

						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>