<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>

</body>
</html>
<div id="container">
	<?php include 'managers/header_2.php'; ?>
		<div id="content">
			<div id="page-title">
				<h1><?php echo $sfid_name['sfid']; ?></h1>
			</div>
		<div id="content-box">
			<?php include 'managers/menu_menagers.php'; ?>
			<div class="col item-sfid-datas">

				<div class="sfid-plans-datas">
						<div class="sfid-datas">
							<div class="sfid-data-display">
								<div class="amount-data"><b>Rodzaj planu</b></div>
								<div class="amount-data"><b>Total</b></div>
								<div class="amount-data"><b>Plan</b></div>
								<div class="amount-data"><b>Realizacja</b></div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Pozyskanie Voice</div>
								<div class="amount-data"> 
									<?php echo $total_voice  ?>
								</div>
								<div class="amount-data">
									<?php echo $plan_voice ?>
								</div>
								<div class="amount-data">
									<?php echo $pr_voice . '%'; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Zatrzymanie Voice</div>
								<div class="amount-data">
									<?php echo $total_voice_extension  ?>
								</div>
								<div class="amount-data">
									<?php echo $plan_voice_extension ?>
								</div>
								<div class="amount-data">
									<?php echo $pr_voice_extension . '%'; ?>
								</div class="amount-data">
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Pozyskanie TV</div>
								<div class="amount-data">
									<?php  echo $total_tv; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_tv; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_tv . '%'; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Zatrzymanie TV</div>
								<div class="amount-data">
									<?php echo $total_tv_extenison; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_tv_extension; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_tv_extension . '%' ; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Pozsykanie DATA</div>
								<div class="amount-data">
									<?php  echo $total_data; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_data; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_data . '%' ; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Zatrzyamnie DATA</div>
								<div class="amount-data">
									<?php  echo $total_data_extension; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_data_extension; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_data_extension . '%' ; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">Telefony</div>
								<div class="amount-data">
									<?php  echo $total_phones; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_phones; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_phones . '%'; ?>
								</div>
							</div>
							<div class="sfid-data-display">
								<div class="amount-data">NKS</div>
								<div class="amount-data">
									<?php  echo $total_devices; ?>
								</div>
								<div class="amount-data">
									<?php  echo $plan_devices; ?>
								</div>
								<div class="amount-data">
									<?php  echo $pr_devices . '%'; ?>
								</div>
							</div>							
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="index.js"></script>
<script src="https://kit.fontawesome.com/329576dfc5.js" crossorigin="anonymous"></script>


