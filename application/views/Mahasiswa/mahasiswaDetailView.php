<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Note</title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png" />

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/html/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/html/css/form-style.css">

	<?php $this->load->view('template/headerCSS'); ?>
</head>

<body>
	<div class="super_container">

		<!-- Header Section -->
		<?php $this->load->view('template/header'); ?>

		<main>
			<div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 nopadding">
							<div class="register_section d-flex flex-column">
								<div class="register_content ">
									<div class="row">
										<div class="col-lg-12 nopadding">
											<div class="section_title text-center">
												<h1>Note</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="list-data">
												<table class="table table-responsive-sm table-hover table-outline mb-0">
													<thead>
														<tr>
															<!-- <td>No</td> -->
															<td>
																<center><strong>Informasi KP</strong></center>

															</td>
														</tr>
													</thead>
													<tbody>
														<?php
														//fungsi tampil list mahasiswa

														if ($statuskp != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statuskp;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statusseminarkp != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statusseminarkp;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statusluluskp != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statusluluskp;
															echo "	</td>";
															echo "</tr>";
														}

														?>
													</tbody>
												</table>
												<table class="table table-responsive-sm table-hover table-outline mb-0">
													<thead>
														<tr>
															<!-- <td>No</td> -->
															<td>
																<center><strong>Informasi Magang</strong></center>
															</td>
														</tr>
													</thead>
													<tbody>
														<?php
														//fungsi tampil list mahasiswa

														if ($statusmagang != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statusmagang;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statuslulusmagang != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statuslulusmagang;
															echo "	</td>";
															echo "</tr>";
														}

														?>
													</tbody>
												</table>
												<table class="table table-responsive-sm table-hover table-outline mb-0">
													<thead>
														<tr>
															<!-- <td>No</td> -->
															<td>
																<center><strong>Informasi KP</strong></center>

															</td>
														</tr>
													</thead>
													<tbody>
														<?php
														//fungsi tampil list mahasiswa

														if ($statusta != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statusta;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statusseminarta != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statusseminarta;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statussidangta != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statussidangta;
															echo "	</td>";
															echo "</tr>";
														}
														if ($statuslulusta != '') {
															echo "<tr>";
															echo "	<td>";
															echo "- " . $statuslulusta;
															echo "	</td>";
															echo "</tr>";
														}

														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</main>
		<!-- Header Section -->
		<?php $this->load->view('template/footer'); ?>
	</div>


	<!-- JS -->
	<script src="<?php echo base_url(); ?>/html/vendors/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.js"></script>
	<script src="<?php echo base_url(); ?>/html/vendors/wnumb/wNumb.js"></script>
	<script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>/html/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/html/js/form-main.js"></script>
	<script src="<?php echo base_url(); ?>/html/js/main.js"></script>
	<?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>