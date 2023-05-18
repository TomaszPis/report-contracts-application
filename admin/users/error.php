<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
	<?php include 'admin/header_admin.php'; ?>
<div id="container">
	<div id="content">
		<div id="page-title">
			<h1>Panel administracyjny</h1>
		</div>
		<div id="content-box">
			<div id="add_and_search_users">
					<div class="admin-col new_user">
						<div class="new_user_add">
							<form action="?" method="post" id="contact_form">
								<div class="add_user_title">
									<h1>Dodawanie nowego sprzedawcy:</h1>
								</div>
								<div class="error_add_user">
									<p style="color: red"><?php echo $message_one; ?></p>
								</div>
								Imie: <br>
								<input type="text" name="name" value="<?php echo $name; ?>"><br>
								Nazwisko:<br>
								<input type="text" name="surname" value="<?php echo $surname; ?>">
								<br>
								Hasło:<br>
								<input type="text" name="password" value="<?php echo $password; ?>">
								<br>
								E-mail:<br>
								<input type="email" name="email" value="<?php echo $email; ?>">
								<select id="" name="sfid">
									<?php foreach ($sfid_list as $sfid) { ?>
										<option value="<?php echo $sfid['id_sfid']; ?>"><?php echo $sfid['sfid']; ?></option>
									<?php } ?>
			  					</select><br>
								<br>

								<input type="submit" name="action" value="Dodaj pracownika">

						</form>
					</div>
				</div>
				<div class="admin-col new_user_rks">
					<div class="new_user_add_rks">
						<form action="?" method="post" id="contact_form">
							<div class="add_user_title">
								<h1>Dodawanie nowego rks:</h1>
						    </div>
						    <div class="error_add_user">
									<p style="color: red"><?php echo $message_two; ?></p>
							</div>
								Imie: <br>
								<input type="text" name="name_rks" value="<?php echo $name_rks; ?>"><br>
								Nazwisko:<br>
								<input type="text" name="surname_rks" value="<?php echo $surname_rks; ?>">
								<br>
								Hasło:<br>
								<input type="text" name="password_rks" value="<?php echo $password_rks; ?>">
								<br>
								E-mail:<br>
								<input type="email" name="email_rks" value="<?php echo $email_rks; ?>">
							<select id="" name="area">
								<?php foreach ($areas_list as $area) { ?>
									<option value="<?php echo $area['id_area']; ?>"><?php echo $area['area_name']; ?></option>
								<?php } ?>
			  				</select><br>
							<br>

							<input type="submit" name="action_rks" value="Dodaj rks">

					</form>
				</div>
					
			</div>
			<div class="admin-col users">
				<div class="new_user_add_rks">
						<form action="?add_user" method="post" id="contact_form">
							<div class="add_user_title">
								<h1>Wyszukaj pracownika:</h1>
							</div>
							<div class="error_add_user">
									<p style="color: red"><?php echo $message_three; ?></p>
							</div>
							Imie: <br>
							<input type="text" name="name_search" placeholder=""><br>
							Nazwisko:<br>
							<input type="text" name="surname_search" placeholder="">

							<input type="submit" name="action" value="Szukaj">

						</form>
					</div>
			</div>
			<div class="admin-col users">
			</div>
		</div>
		<div id="all_users">
			<div class="user_table">	
				<table >
					<tr class="head_table">
						<td>Imie</td>
						<td>Nazwisko</td>
						<td>E-mail</td>
						<td>SFID</td>
						<td>Akcja</td>
					</tr>
					<?php foreach ($users_list as $user) { ?>
						<tr>
							<td><?php echo $user['name']; ?></td>
							<td><?php echo $user['surname']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['sfid']; ?></td>
							<td><a href="https://onet.pl">Zobacz profil</a></td>
						</tr>
					<?php } ?>	
				</table>
			</div>
			<div class="user_table">
				<table >
					<tr class="head_table">
						<td>Imie</td>
						<td>Nazwisko</td>
						<td>E-mail</td>
						<td>SFID</td>
						<td>Akcja</td>
					</tr>
					<?php foreach ($managers_list as $manager) { ?>
						<tr>
							<td><?php echo $manager['name']; ?></td>
							<td><?php echo $manager['surname']; ?></td>
							<td><?php echo $manager['email']; ?></td>
							<td><?php echo $manager['area_name']; ?></td>
							<td><a href="https://onet.pl">Zobacz profil</a></td>
						</tr>
					<?php } ?>	
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>