
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div id="container">
	<?php include 'admin/header_admin.php'; ?>
	<div id="content">
		<div id="page-title">
			<h1>Panel zarządzania użytkownikami</h1>
		</div>
		<div id="content-box">
			<div id="all_users">
				<div class="user_table">	
					<table >
						<tr class="head_table">
							<td>Imie</td>
							<td>Nazwisko</td>
							<td>E-mail</td>
							<td>Akcja</td>
						</tr>
						<?php foreach ($user_search as $user) { ?>
							<tr>
								<td><?php echo $user['name']; ?></td>
								<td><?php echo $user['surname']; ?></td>
								<td><?php echo $user['email']; ?></td>
								<td><a href="?user_profil&user_id=<?php echo $user['id'];?>">Zobacz profil</a></td>
							</tr>
						<?php } ?>	
					</table>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>