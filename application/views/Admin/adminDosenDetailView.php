<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kelola Dosen</title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png" />

	<!-- Font Icon -->
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
									if (isset($success)) {
										if ($success) {
									?>
											<div class="row">
												<div class="col">
													<div class="alert alert-success">
														<strong>Sukses <?php echo $event ?> data dosen dengan Kode <?php echo $KodeDosen ?></strong>
													</div>
												</div>
											</div>
									<?php
										}
									} ?>
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Data Dosen</h1>
											</div>
										</div>
									</div>
									<!-- <a class="btn btn-success" href="<?php echo base_url() . 'PageController/export_excelDosen' ?>">Export Excel</a> -->
									<br>
									<div class="row">
										<div class="col-lg-10 offset-md-11">
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="list-data">
												<div class="col-md-12">
													<table id="table_id" class="table  table-bordered" cellspacing="0" width="100%">

														<thead>
															<tr>
																<!-- <td>No</td> -->
																<td>Nama</td>
																<td>NIM</td>
																<td>
																	<center>Status
																</td>
																<td>
																	<center>Seminar
																</td>
																<td>
																	<center>Sidang
																</td>
																<td>
																	<center>Daftar TA
																</td>
																<td>
																	<center>Ke Seminar
																</td>
																<td>
																	<center>Sem-Sid
																</td>
																<td>
																	<center>D-Sid
																</td>
																<td>
																	<center>Durasi TA
																</td>
															</tr>
														</thead>
														<tbody>
															<?php
															//fungsi tampil list mahasiswa
															$no = 1;
															foreach ($list as $dosen) {
																$mahasiswa = $this->Mahasiswa->getDataByID($dosen->NIM);
																$seminar = $this->Seminar->getDataByNIM($dosen->NIM);
																$sidang = $this->Sidang->getDataByNIM($dosen->NIM);
																echo "<tr>";
																echo "	<td>";
																echo $mahasiswa->Nama;
																echo "	</td>";
																echo "	<td>";
																echo $dosen->NIM;
																echo "	</td>";
																echo "	<td><center>";
																if ($dosen->Pembimbing1 != $kode && $dosen->Pembimbing2 != $kode) {
																	echo "";
																} else {
																	if ($dosen->Pembimbing1 == $kode) {
																		echo "Pembimbing 1";
																	} else {
																		echo "Pembimbing 2";
																	}
																}
																echo "	</td>";
																echo "	<td><center>";
																if ($seminar != null) {
																	if ($seminar->Status == "Lulus" && $seminar->TanggalSeminar != "") {
																		echo $seminar->TanggalSeminar;
																	} else {
																		echo "";
																	}
																} else {
																	echo "";
																}

																echo "	</td>";
																echo "	<td><center>";
																if ($sidang != null) {
																	if ($sidang->Status == "Lulus" && $sidang->TanggalSidang != "") {
																		echo $sidang->TanggalSidang;
																	} else {
																		echo "";
																	}
																} else {
																	echo "";
																}

																echo "	</td>";
																echo "	<td><center>";
																$tgldaftar = $dosen->TanggalDaftar;
																$tgldaftar = DateTime::createFromFormat('Y-m-d', $tgldaftar);
																echo $tgldaftar->format('d/m/Y');
																echo "	</td>";
																echo "	<td><center>";
																if ($seminar != null) {
																	if ($seminar->Status == "Lulus" && $seminar->TanggalSeminar != "") {
																		$tglseminar = str_replace('/', '-', $seminar->TanggalSeminar);
																		$tglseminar = date("Y-m-d", strtotime($tglseminar));
																		$tgl1 = new DateTime($dosen->TanggalDaftar);
																		$tgl2 = new DateTime($tglseminar);
																		$jarak = $tgl2->diff($tgl1);
																		echo $jarak->days . " Hari";
																	} else {
																		echo "Belum Seminar";
																	}
																} else {
																	echo "Belum Seminar";
																}
																echo "	</td>";
																echo "	<td><center>";
																if ($sidang != null && $seminar != null) {
																	if ($sidang->Status == "Lulus" && $sidang->TanggalSidang != "") {
																		$tglseminar = str_replace('/', '-', $seminar->TanggalSeminar);
																		$tglseminar = date("Y-m-d", strtotime($tglseminar));
																		$tglsidang = str_replace('/', '-', $sidang->TanggalSidang);
																		$tglsidang = date("Y-m-d", strtotime($tglsidang));
																		$tgl1 = new DateTime($tglseminar);
																		$tgl2 = new DateTime($tglsidang);
																		$jarak = $tgl2->diff($tgl1);
																		echo $jarak->days . " Hari";
																	} else {
																		echo "Belum Seminar";
																	}
																} else {
																	echo "Belum Seminar";
																}
																echo "	</td>";
																echo "	<td><center>";
																if ($sidang != null) {
																	if ($sidang->Status == "Lulus" && $sidang->TanggalSidang != "") {
																		$tglsidang = str_replace('/', '-', $sidang->TanggalSidang);
																		$tglsidang = date("Y-m-d", strtotime($tglsidang));
																		$tgl1 = new DateTime($dosen->TanggalDaftar);
																		$tgl2 = new DateTime($tglsidang);
																		$jarak = $tgl2->diff($tgl1);
																		echo $jarak->days . " Hari";
																	} else {
																		echo "Belum Sidang";
																	}
																} else {
																	echo "Belum Sidang";
																}
																echo "	</td>";
																echo "	<td><center>";

																if ($sidang != null) {
																	if ($sidang->Status == "Lulus" && $sidang->TanggalSidang != "") {
																		$tglsidang = str_replace('/', '-', $sidang->TanggalSidang);
																		$tglsidang = date("Y-m-d", strtotime($tglsidang));
																		$tgl1 = new DateTime($dosen->TanggalDaftar);
																		$tgl2 = new DateTime($tglsidang);
																		$jarak = $tgl2->diff($tgl1);
																		echo $jarak->days . " Hari";
																	} else {
																		echo "Belum Sidang";
																	}
																} else {
																	echo "Belum Sidang";
																}
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

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Kelola Data Dosen</h4>
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

				<!-- Modal 2 -->
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Hapus Data Dosen</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<form id='hapusForm' method='POST' action='<?php echo base_url(); ?>admin/hapusDosen'>
									<div class="form-data" id="form-data2"></div>
								</form>
							</div>
							<div class="modal-footer">
								<input type="submit" form="hapusForm" value="Ya" class="btn btn-primary" />
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table_id').DataTable({
				scrollX: true,
			});
		});
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>