
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
			<h1>Pozyskania TV na miesiąca: <?php echo $m; ?></h1>
		</div>
		<div id="content-box">
			
		<div id="sfid-month-table">		
			<table>
				<tr>
					<td>SFID</td>
					
					<?php										

					for($day = 1; $day <= Date('t'); $day++){ 
						
						if($day == Date('d')){
							
							$background = 'background: #80b918';
							}
							
							else{
								$background = '';
							}?>
							
							<td style="<?php echo $background; ?>"><?php echo $day; ?></td>
					<?php } ?>
							<td style="<?php echo $background; ?>">Razem</td>
					</tr>
						<?php	foreach ($sfid as $s) { ?>
							<?php $total_sfid = 0; ?>
								<tr>
									<td><?php echo $s['sfid']; ?></td>
									
									<?php
									
									for($day = 1; $day <= Date('t'); $day++){
										
										$data = $curr_year . '-' . $curr_month . '-' . $day;


										if($day == Date('d')){

											$background = 'background: #80b918';
										}
										else{
											$background = '';
										}
										$sql3 = "SELECT COUNT(a.id_con_cp) FROM contracts_cp a
												 INNER JOIN contracts_sfid_cp b
												 ON a.id_con_cp = b.id_con_cp
												 INNER JOIN sfid c
												 ON b.id_sfid_cp = c.id_sfid
												 INNER JOIN source_cp d
												 ON a.id_con_cp = d.id_con_cp
												 WHERE d.or_source_cp = TRUE AND a.date_con_cp  = '{$data}' AND b.id_sfid_cp = {$s['id_sfid']};";
										$tks = pg_query($sql3);
										$today = pg_fetch_array($tks);

										if($today == false){
											$today['0'] = '0';
											$total_sfid += $today[0];
										}
										else{
											$total_sfid += $today[0];
										}


										if ($day > Date('d')) {
											$today[0] = '';
											$total_sfid += 0;
										}
								?>
									<td style="<?php echo $background; ?>"><?php echo $today[0]; ?></td>
						<?php } ?>
						<td><?php echo $total_sfid; ?></td>
					</tr>
					<?php
			}						
		?>
			</table>
	</div>
		
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>