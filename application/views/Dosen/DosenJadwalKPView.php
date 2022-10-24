<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Jadwal <?php echo $event ?> </title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png" />

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/html/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

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
									<?php
									if (isset($successp)) {
										if ($successp) {
									?>
											<div class="row">
												<div class="col">
													<div class="alert alert-success">
														<strong>Sukses, <?php echo $eventp ?> Telah Ditambahkan </strong>
													</div>
												</div>
											</div>
									<?php
										}
									} ?>
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Jadwal <?php echo $event ?> </h1>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col">
											<div class="list-data">
												<div class="col-md-12">
													<table id="jadwal_data" class="table  table-bordered" cellspacing="0" width="100%">
														<thead>
															<tr>
																<!-- <td>No</td> -->
																<td>NIM</td>
																<td>Nama</td>
																<td>Judul</td>
																<td>Tanggal</td>
																<td>Jam</td>
																<td>Lokasi</td>
																<td>Draft</td>

															</tr>
														</thead>
														<tbody>
															<?php
															//fungsi tampil list mahasiswa
															$no = 1;
															if (isset($list)) {
																foreach ($list as $jadwal) {
																	if ($iddosen == $jadwal->DosenPembimbing) {
																		# code...
																		echo "<tr>";
																		echo "	<td>";
																		echo $jadwal->NIM;
																		echo "	</td>";
																		echo "	<td>";
																		echo $jadwal->Nama;
																		echo "	</td>";
																		echo "	<td>";
																		echo $jadwal->Judul;
																		echo "	</td>";
																		echo "	<td>";
																		echo $jadwal->TanggalSeminarKP;
																		echo "	</td>";
																		echo "	<td>";
																		echo $jadwal->Jam;
																		echo "	</td>";
																		echo "	<td>";
																		echo $jadwal->Lokasi;
																		echo "	</td>";
																		echo "	<td>";
																		if ($jadwal->LembarDraft != '') {
																			echo "<a target='_blank' href='" . base_url() . $jadwal->LembarDraft . "'> Draft.pdf</a>";
																		} else {
																			echo "-";
																		}


																		echo "	</td>";

																		echo "</tr>";
																	}
																}
															} else {
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

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Penilaian</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="form-data" id="form-data">
								</div>
							</div>
							<!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div> -->
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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#jadwal_data').DataTable();
		});
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>