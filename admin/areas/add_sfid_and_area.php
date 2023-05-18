
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div id="container">
	<?php include 'admin/header_admin.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Panel zarządzania SFIDami i mikrorynkami</h1>
		</div>
		<div id="content-box">
			<div id="add_and_search_users">
					<div class="admin-col new_user">
						<div class="new_user_add">
							<form action="?add_user" method="post" id="contact_form">
								<div class="add_user_title">
									<h1>Dodawanie nowego SFID:</h1>
								</div>
								Nowy SFID: <br>
								<input type="text" name="sfid" placeholder=""><br>
								Wybierz mikrorynek: <br>
								<select id="" name="area">
									<?php foreach ($areas_list as $area) { ?>
										<option value="<?php echo $area['id_area']; ?>"><?php echo $area['area_name']; ?></option>
									<?php } ?>
				  				</select><br>
								<br>

								<input type="submit" name="action" value="Dodaj SFID">

						</form>
					</div>
				</div>
				<div class="admin-col new_user_rks">
					<div class="new_user_add_rks">
						<form action="?add_user" method="post" id="contact_form">
							<div class="add_user_title">
								<h1>Dodawanie nowego mikrorynku:</h1>
						    </div>
							Nowy region: <br>
							<input type="text" name="area" placeholder=""><br>

							<br>

							<input type="submit" name="action" value="Dodaj mikrorynek">

					</form>
				</div>	
			</div>
		</div>
		<div id="all_sfid_and_users">
			<div class="user_table">	
				<table >
					<tr class="head_table">
						<td>SFID</td>
						<td>Akcja</td>
					</tr>
					<?php foreach ($sfid_list as $sfid) { ?>				
					<tr>
						<td><?php echo $sfid['sfid']; ?></td>
						<td><a href="?sfid_profil&id_sfid=<?php echo $sfid['id_sfid']; ?>">Zobacz profil</a></td>
					</tr>
					<?php } ?>	
				</table>
			</div>
			<div class="user_table">
				<table >
					<tr class="head_table">
						<td>Region</td>
						<td>Akcja</td>
					</tr>
					<?php foreach ($areas_list as $area) { ?>
					<tr>
						<td><?php echo $area['area_name']; ?></td>
						<td><a href="?sfid_prifl&id_area=<?php echo $area['id_area']; ?>">Zobacz profil</a></td>
					</tr>
					<?php } ?>	
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>