<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Beranda</title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png" />

	<!-- Font Icon -->
	<link rel="stylesheet" href="./html/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="./html/vendors/nouislider/nouislider.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="./html/css/form-style.css">

	<?php $this->load->view('template/headerCSS'); ?>
</head>

<body>
	<div class="super_container">

		<!-- Header Section -->
		<?php $this->load->view('template/header'); ?>

		<div>
			<div class="container">
				<div class="row">
					<div class="register_section d-flex flex-column">

						<?php
						if (isset($success)) {
							if ($success) {
						?>
								<div class="row">
									<div class="col">
										<div class="alert alert-success">
											<strong>Data <?php echo $event ?> berhasil disimpan!</strong>
										</div>
									</div>
								</div>
						<?php
							}
						}
						?>

						<div class="row">
							<div class="col-lg-6">
								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Data Mahasiswa</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<table>
												<tbody>
													<tr>
														<th>NIM</th>
														<td><?php echo $mahasiswa->NIM ?></td>
													</tr>
													<tr>
														<th>Nama</th>
														<td><?php echo $mahasiswa->Nama ?></td>
													</tr>
													<tr>
														<th>Email</th>
														<td><?php
																if ($mahasiswa->Email != null) echo $mahasiswa->Email;
																else echo "-";
																?></td>
													</tr>
													<tr>
														<th>Tanggal Lahir</th>
														<td><?php echo $mahasiswa->TanggalLahir ?></td>
													</tr>
													<tr>
														<th>No Telepon</th>
														<td><?php
																if ($mahasiswa->NoTelepon != null) echo $mahasiswa->NoTelepon;
																else echo "-";
																?></td>
													</tr>
													<tr>
														<th>No Telepon Ortu</th>
														<td><?php
																if ($mahasiswa->NoTeleponOrtu != null) echo $mahasiswa->NoTeleponOrtu;
																else echo "-";
																?></td>
													</tr>
													<tr>
														<th>Alamat Ortu</th>
														<td><?php
																if ($mahasiswa->AlamatOrtu != null) echo $mahasiswa->AlamatOrtu;
																else echo "-";
																?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Informasi KP</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php
											if (isset($KP)) {
											?>
												<table>
													<tbody>
														<tr>
															<th>Bidang Kajian KP</th>
															<td><?php echo $KP->Kajian_KP ?></td>
														</tr>
														<tr>
															<th>Nama Perusahaan</th>
															<td><?php echo $KP->Nama_Perusahaan ?></td>
														</tr>
														<tr>
															<th>Tanggal Pelaksanaan KP</th>
															<td><?php echo $KP->Tanggal_KP ?></td>
														</tr>
														<tr>
															<th>Dosen Usulan 1</th>
															<td><?php echo $dosenKP[0]->Nama; ?></td>
														</tr>
														<tr>
															<th>Dosen Usulan 2</th>
															<td><?php
																	if (isset($dosenKP[1])) {
																		echo $dosenKP[1]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Dosen Pembimbing </th>
															<td><?php
																	if (sizeof($dosenKP) > 2) {
																		echo $dosenKP[2]->Nama;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
													</tbody>
												</table>
											<?php
											} else {
											?>
												<div class="section_title text-center">
													<h2>Data KP Belum Ada</h2>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Informasi Magang</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php
											if (isset($Magang)) {
											?>
												<table>
													<tbody>
														<tr>
															<th>Program Magang</th>
															<td><?php echo $Magang->Program_Magang ?></td>
														</tr>
														<tr>
															<th>Nama Perusahaan</th>
															<td><?php echo $Magang->Nama_Perusahaan ?></td>
														</tr>
														<tr>
															<th>Tanggal Pelaksanaan Magang</th>
															<td><?php echo $Magang->Tanggal_Magang ?></td>
														</tr>
														<tr>
															<th>Dosen Usulan</th>
															<td><?php echo $dosenMagang[0]->Nama; ?></td>
														</tr>
														<tr>
															<th>Dosen Pembimbing </th>
															<td><?php
																	if (sizeof($dosenMagang) > 1) {
																		echo $dosenMagang[1]->Nama;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
													</tbody>
												</table>
											<?php
											} else {
											?>
												<div class="section_title text-center">
													<h2>Data Magang Belum Ada</h2>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">

								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Informasi Tugas Akhir</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php
											if (isset($tugasAkhir)) {
											?>
												<table>
													<tbody>
														<tr>
															<th>Tema</th>
															<td><?php echo $tugasAkhir->Tema ?></td>
														</tr>
														<tr>
															<th>Judul</th>
															<td><?php
																	if ($tugasAkhir->Judul != null) {
																		echo $tugasAkhir->Judul;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Tanggal Daftar</th>
															<td><?php echo $tugasAkhir->TanggalDaftar ?></td>
														</tr>
														<tr>
															<th>Dosen Usulan 1</th>
															<td><?php echo $dosen[0]->Nama; ?></td>
														</tr>
														<tr>
															<th>Dosen Usulan 2</th>
															<td><?php
																	if (isset($dosen[1])) {
																		echo $dosen[1]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Dosen Pembimbing 1</th>
															<td><?php
																	if (sizeof($dosen) > 2) {
																		echo $dosen[2]->Nama;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Dosen Pembimbing 2</th>
															<td><?php
																	if (sizeof($dosen) > 3) {
																		echo $dosen[3]->Nama;
																	} else {
																		echo "-";
																	}
																	?>
															</td>
														</tr>
														<tr>
															<th>File KRS</th>
															<td><?php
																	if ($mahasiswa->KRS != null) {
																		echo "<a target='_blank' href='" . $mahasiswa->KRS . "'>" . $mahasiswa->NIM . "_KRS.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>File Transkrip</th>
															<td><?php
																	if ($mahasiswa->Transkrip != null) {
																		echo "<a target='_blank' href='" . $mahasiswa->Transkrip . "'>" . $mahasiswa->NIM . "_Transkrip.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>File Prabimbingan</th>
															<td><?php
																	if ($mahasiswa->PraBimbingan != null) {
																		echo "<a target='_blank' href='" . $mahasiswa->PraBimbingan . "'>" . $mahasiswa->NIM . "_Prabimbingan.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
													</tbody>
												</table>
											<?php
											} else {
											?>
												<div class="section_title text-center">
													<h2>Pelaksanaan Tugas Akhir bisa dilakukan setelah KP dinyatakan lulus</h2>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>

								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Informasi Seminar</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php
											if (isset($seminar)) {
											?>
												<table>
													<tbody>
														<tr>
															<th>Tanggal Seminar</th>
															<td><?php
																	if ($seminar->TanggalSeminar != null) {
																		echo $seminar->TanggalSeminar;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Jam Seminar</th>
															<td><?php
																	if ($seminar->Jam != null) {
																		echo $seminar->Jam;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Lokasi Seminar</th>
															<td><?php
																	if ($seminar->Lokasi != null) {
																		echo $seminar->Lokasi;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Tanggal Daftar</th>
															<td><?php echo $seminar->TanggalDaftar ?></td>
														</tr>
														<tr>
															<th>Dosen Penguji 1</th>
															<td><?php
																	if (isset($dosenPenguji[0])) {
																		echo $dosenPenguji[0]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Dosen Penguji 2</th>
															<td><?php
																	if (isset($dosenPenguji[1])) {
																		echo $dosenPenguji[1]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Lembar Pendaftaran</th>
															<td><?php
																	if ($seminar->LembarDaftar != null) {
																		echo "<a target='_blank' href='" . $seminar->LembarDaftar . "'>" . $mahasiswa->NIM . "_LembarDaftar.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Lembar Bimbingan</th>
															<td><?php
																	if ($seminar->LembarBimbingan != null) {
																		echo "<a target='_blank' href='" . $seminar->LembarBimbingan . "'>" . $mahasiswa->NIM . "_LembarBimbingan.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
													</tbody>
												</table>
											<?php
											} else {
											?>
												<div class="section_title text-center">
													<h2>Pelaksanaan Seminar Tugas Akhir bisa dilakukan setelah melalui persetujuan Tugas Akhir</h2>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>

								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Informasi Sidang</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<?php
											if (isset($sidang)) {
											?>
												<table>
													<tbody>
														<tr>
															<th>Tanggal Sidang</th>
															<td><?php
																	if ($sidang->TanggalSidang != null) {
																		echo $sidang->TanggalSidang;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Jam Sidang</th>
															<td><?php
																	if ($sidang->Jam != null) {
																		echo $sidang->Jam;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Lokasi Sidang</th>
															<td><?php
																	if ($sidang->Lokasi != null) {
																		echo $sidang->Lokasi;
																	} else {
																		echo "-";
																	}
																	?></td>
														</tr>
														<tr>
															<th>Tanggal Daftar</th>
															<td><?php echo $sidang->TanggalDaftar ?></td>
														</tr>
														<tr>
															<th>Dosen Penguji 1</th>
															<td><?php
																	if (isset($dosenPengujiSidang[0])) {
																		echo $dosenPengujiSidang[0]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Dosen Penguji 2</th>
															<td><?php
																	if (isset($dosenPengujiSidang[1])) {
																		echo $dosenPengujiSidang[1]->Nama;
																	} else {
																		echo  "-";
																	}  ?>
															</td>
														</tr>
														<tr>
															<th>Lembar Pendaftaran</th>
															<td><?php
																	if ($sidang->DaftarSidang != null) {
																		echo "<a target='_blank' href='" . $sidang->DaftarSidang . "'>" . $mahasiswa->NIM . "_LembarDaftar.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Lembar Bimbingan</th>
															<td><?php
																	if ($sidang->LembarBimbingan != null) {
																		echo "<a target='_blank' href='" . $sidang->LembarBimbingan . "'>" . $mahasiswa->NIM . "_LembarBimbingan.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Bebas Pustaka</th>
															<td><?php
																	if ($sidang->BebasPustaka != null) {
																		echo "<a target='_blank' href='" . $sidang->BebasPustaka . "'>" . $mahasiswa->NIM . "_BebasPustaka.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Transkrip</th>
															<td><?php
																	if ($sidang->Transkrip != null) {
																		echo "<a target='_blank' href='" . $sidang->Transkrip . "'>" . $mahasiswa->NIM . "_Transkrip.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Kehadiran Seminar</th>
															<td><?php
																	if ($sidang->KehadiranSeminar != null) {
																		echo "<a target='_blank' href='" . $sidang->KehadiranSeminar . "'>" . $mahasiswa->NIM . "_KehadiranSeminar.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
														<tr>
															<th>Toefl</th>
															<td><?php
																	if ($sidang->Toefl != null) {
																		echo "<a target='_blank' href='" . $sidang->Toefl . "'>" . $mahasiswa->NIM . "_Toefl.pdf" . "</a>";
																	} else echo "-";
																	?></td>
														</tr>
													</tbody>
												</table>
											<?php
											} else {
											?>
												<div class="section_title text-center">
													<h2>Pelaksanaan Sidang Tugas Akhir bisa dilakukan setelah seminar dinyatakan lulus</h2>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Section -->
		<?php $this->load->view('template/footer'); ?>
	</div>

	<!-- JS -->
	<script src="./html/vendors/jquery/jquery.min.js"></script>
	<script src="./html/vendors/nouislider/nouislider.min.js"></script>
	<script src="./html/vendors/wnumb/wNumb.js"></script>
	<script src="./html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="./html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
	<script src="./html/js/form-main.js"></script>
	<?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<!-- Header Section -->
< </html>