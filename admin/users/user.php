
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
						<h2>Podstawowe dane:</h2>
					</div>
					<div class="user">
						<ul>
							<li>Imię: <?php echo $name;?></li>
							<li>Nazwisko: <?php echo $surname;?></li>
							<li><?php echo $area . ': ' . $name_area;?></li>
							<li>E-mail: <?php echo $email; ?></li>
						</ul>
					</div>
					<div class="action_user_link">
						<a href="?edit_user&user_id=<?php echo $user_id?>">
							Edytuj dane
						</a>
					</div>
					<div class="action_user_link">
						<a href="?delete_user&user_id=<?php echo $user_id?>">
							Usuń użytkownika
						</a>
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Zmień <?php echo $area; ?></h2>
					</div>
					<div class="form">
							<form action="?add_user" method="post" id="contact_form">
								<input type="hidden" name="user_id" value="<?php echo $user_id?>">
								<select id="" name="sfid">
									<?php foreach ($sfid_list as $sfid) { 

										if (user_role($user_id) == 'RKS') {
											$area_name = $sfid['area_name'];
											$area_id = $sfid['id_area'];
										}
										if (user_role($user_id) == 'Sprzedawca') {
											$area_name = $sfid['sfid'];
											$area_id = $sfid['id_sfid'];
										}


										?>
										<option value="<?php echo $area_id; ?>"><?php echo $area_name; ?></option>
									<?php } ?>
			  					</select><br>
								<br>

								<input type="submit" name="action_area" value="Aktualizuj">

						</form>	
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Zmień Rolę:</h2>
					</div>
					<div class="form">
							<form action="?add_user" method="post" id="contact_form">
								<input type="hidden" name="user_id" value="<?php echo $user_id?>">
								<select id="" name="role">
									<?php foreach ($role_list as $role) { ?>
										<option value="<?php echo $role['id_role']; ?>"><?php echo $role['role']; ?></option>
									<?php } ?>
			  					</select><br>
								<br>

								<input type="submit" name="action_role" value="Aktualizuj">

						</form>	
					</div>
				</div>
				<div class="admin-col action_user">
					<div class="add_user_title">
						<h2>Zmień hasło:</h2>
					</div>
					<div class="form">
							<form action="?add_user" method="post" id="contact_form">
								<input type="hidden" name="user_id" value="<?php $user_id?>">
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