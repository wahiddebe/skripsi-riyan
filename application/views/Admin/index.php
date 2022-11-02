<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Beranda</title>
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
									if (isset($success)) {
										if ($success) {
									?>
											<div class="row">
												<div class="col">
													<div class="alert alert-success">
														<strong>Pengajuan Tugas Akhir <?php echo $NIM ?> berhasil disimpan!</strong>
													</div>
												</div>
											</div>
									<?php
										}
									} ?>
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Data Pengajuan Tugas Akhir </h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="list-data">
												<div class="col-md-12">
													<table id="PengajuanTA_data" class="table table-bordered" cellspacing="0" width="100%">
														<thead>
															<tr>
																<!-- <td>No</td> -->
																<td>
																	<center>NIM
																</td>
																<td>
																	<center>Tanggal Daftar
																</td>
																<td>
																	<center>Tema
																</td>
																<td>
																	<center>Dosen Usul 1
																</td>
																<td>
																	<center>Dosen Usul 2
																</td>
																<td>
																	<center>Aksi
																</td>
															</tr>
														</thead>
														<tbody>
															<?php
															//fungsi tampil list mahasiswa
															$no = 1;
															foreach ($list as $tugasAkhir) {
																echo "<tr>";
																// echo "	<td>";
																// echo $no;
																// echo "	</td>"; 
																echo "	<td>";
																echo $tugasAkhir->NIM;
																echo "	</td>";
																echo "	<td>";
																echo $tugasAkhir->TanggalDaftar;
																echo "	</td>";
																echo "	<td>";
																echo $tugasAkhir->Tema;
																echo "	</td>";
																echo "	<td><center>";
																echo $tugasAkhir->DosenUsul1;
																echo "	</td>";
																echo "	<td><center>";
																echo $tugasAkhir->DosenUsul2;
																echo "	</td>";
																echo "  <td><center>";
																echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal' 
																						data-form='/admin/getTugasAkhir/" . $tugasAkhir->IdTA . "/" . $tugasAkhir->DosenUsul1 . "/" . $tugasAkhir->DosenUsul2 . "/nonApprove'>
																						Penyetujuan
																						</button>";
																echo "  </td>";
																echo "</tr>";
																//no diinkremen
																$no += 1;
															}
															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="register_content ">
									<?php
									if (isset($success)) {
										if ($success) {
									?>
											<div class="row">
												<div class="col">
													<div class="alert alert-success">
														<?php
														if (isset($KodeDosen)) { ?>
															<strong>Sukses <?php echo $event ?> data dosen dengan Kode <?php echo $KodeDosen ?></strong>
														<?php } else {
															echo '';
														}
														?>

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
									<a class="btn btn-success" href="<?php echo base_url() . 'PageController/export_excelDosen' ?>">Export Excel</a>
									<br>
									<div class="row">
										<div class="col-lg-10 offset-md-11">
											<button type='button' style='margin-bottom:5px' class='btn btn-success' data-toggle='modal' data-target='#myModal' data-form='/admin/getDosen/-1'>
												Tambah
											</button>
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
																<td>Kode Dosen</td>
																<td>Nama</td>
																<td>
																	<center>Beban PB1
																</td>
																<td>
																	<center>Beban PB2
																</td>
																<td>
																	<center>Total Beban
																</td>
																<td style="width: 125px;">
																	<center> Aksi</p>
																</td>
															</tr>
														</thead>
														<tbody>
															<?php
															//fungsi tampil list mahasiswa
															$no = 1;
															foreach ($listdosen as $dosen) {
																echo "<tr>";
																echo "	<td>";
																echo "<a href='" . base_url() . "admin/dosen/detail/" . $dosen->KodeDosen . "'>" . $dosen->KodeDosen . "</a>";
																echo "	</td>";
																echo "	<td>";
																echo $dosen->Nama;
																echo "	</td>";
																echo "	<td><center>";
																echo $dosen->Beban;
																echo "	</td>";
																echo "	<td><center>";
																echo $dosen->Beban2;
																echo "	</td>";
																echo "	<td><center>";
																echo $dosen->TotalBeban;
																echo "	</td>";
																echo "  <td><center>";
																echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal' data-form='/admin/getDosen/" . $dosen->KodeDosen . "'>
																						Ubah
																						</button>";
																echo "    <button type='button' class='btn btn-danger' 
																						data-toggle='modal' data-target='#myModal2' data-form='/admin/hapusDosen/" . $dosen->KodeDosen . "'>
																						Hapus
																						</button>";
																echo "  </td>";
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
								<h4 class="modal-title" id="myModalLabel">Penyetujuan Tugas Akhir</h4>
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
			$('#PengajuanTA_data').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table_id').DataTable();
		});
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>