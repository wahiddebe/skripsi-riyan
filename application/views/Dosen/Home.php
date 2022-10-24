<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mahasiswa Bimbingan Tugas Akhir</title>
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
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Bimbingan KP</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
                            <tr>
                              <!-- <td>No</td> -->
                              <td>
                                <center>NIM
                              </td>
                              <td>
                                <center>Nama
                              </td>
                              <td>
                                <center>Status
                              </td>
                              </td>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              //fungsi tampil list mahasiswa
                              $no = 1;
                              if ($listKP != '') {
                                $nob = 0;
                                foreach ($listKP as $kp) {
                                  echo "<tr>";
                                  echo "	<td>";
                                  echo $kp->NIM;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo $kp->Nama;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo "Pembimbing";
                                  echo "	</td>";
                                  echo "</tr>";
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/BimbinganKP" ?>">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="register_content ">
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Bimbingan Tugas Akhir</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
                            <tr>
                              <!-- <td>No</td> -->
                              <td>NIM</td>
                              <td>Nama</td>
                              <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              //fungsi tampil list mahasiswa
                              $no = 1;
                              if ($list != '') {
                                $nob = 0;
                                foreach ($list as $tugasAkhir) {
                                  echo "<tr>";
                                  echo "	<td>";
                                  echo $tugasAkhir->NIM;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo $tugasAkhir->Nama;
                                  echo "	</td>";
                                  echo "	<td>";
                                  $idDosen = $this->session->userdata['username'];
                                  if ($tugasAkhir->Pembimbing1 == $idDosen) {
                                    echo "Pembimbing 1";
                                  }
                                  if ($tugasAkhir->Pembimbing2 == $idDosen) {
                                    echo "Pembimbing 2";
                                  }
                                  echo "	</td>";

                                  echo "</tr>";
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/BimbinganTA" ?>">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="register_content ">
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Bimbingan Magang</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
                            <tr>
                              <!-- <td>No</td> -->
                              <td>NIM</td>
                              <td>Nama</td>
                              <td>
                                <center>Status
                              </td>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              //fungsi tampil list mahasiswa
                              $no = 1;
                              if ($listMagang != '') {
                                $nob = 0;
                                foreach ($listMagang as $magang) {
                                  echo "<tr>";
                                  echo "	<td>";
                                  echo $magang->NIM;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo $magang->Nama;
                                  echo "	</td>";

                                  echo "	<td>";
                                  echo 'Pembimbing';
                                  echo "	</td>";

                                  echo "</tr>";
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/BimbinganMagang" ?>">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="register_content ">
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Jadwal Seminar KP</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
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
                              if ($listseminarKP) {
                                $nob = 0;
                                foreach ($listseminarKP as $jadwal) {
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
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/jadwalSeminarKP" ?>">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="register_content ">
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Jadwal Seminar TA</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
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
                              if ($listseminarta) {
                                $nob = 0;
                                foreach ($listseminarta as $jadwal) {
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
                                  echo $jadwal->TanggalSeminar;
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
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/jadwalSeminarTA" ?>">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="register_content ">
                  <div class="row">
                    <div class="col">
                      <div class="section_title text-center">
                        <h1>Mahasiswa Jadwal Sidang TA</h1>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12">
                          <table id="bimbinganta_data" class="table  table-bordered" cellspacing="0" width="100%">
                            <tr>
                              <!-- <td>No</td> -->
                              <td>NIM</td>
                              <td>Nama</td>
                              <td>Judul</td>
                              <td>Tanggal</td>
                              <td>Jam</td>
                              <td>Lokasi</td>
                              <td>Draft</td>
                              <td>Penilaian</td>

                              <td>Form Penilaian</td>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              //fungsi tampil list mahasiswa
                              $no = 1;
                              if ($listsidang) {
                                $nob = 0;
                                foreach ($listsidang as $jadwal) {
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
                                  echo $jadwal->TanggalSidang;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo $jadwal->Jam;
                                  echo "	</td>";
                                  echo "	<td>";
                                  echo $jadwal->Lokasi;
                                  echo "	</td>";
                                  echo "	<td>";
                                  if ($jadwal->Draft != '') {
                                    echo "<a target='_blank' href='" . base_url() . $jadwal->Draft . "'> Draft.pdf</a>";
                                  } else {
                                    echo "-";
                                  }

                                  echo "	</td>";
                                  echo "	<td>";
                                  if ($this->Penilaian->getDataBySidang($jadwal->IdSidang) != null) {
                                    echo "<a target='_blank' href='" . base_url() . "/Dosen/showPenilaian/" . $jadwal->IdSidang . "'> Penilaian.pdf</a>";
                                  } else {
                                    echo "-";
                                  }
                                  echo "	</td>";
                                  echo "  <td>";
                                  echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal' 
																						data-form='/Dosen/getPenilaian/" . $jadwal->IdSidang . "'>
																						Penilaian
																						</button>";
                                  echo "  </td>";
                                  echo "</tr>";
                                  $nob++;
                                  if ($nob == 3) {
                                    break;
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
                  <div class="row">
                    <div class="col">
                      <div class="list-data">
                        <div class="col-md-12 text-center py-5">
                          <a class="btn btn bg-primary text-center" href="<?= base_url() . "Dosen/jadwalSidangTA" ?>">Lihat Selengkapnya</a>
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
        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 	aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-data" id="form-data">
                </div>
            </div>
          </div>
				</div>      -->

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
      $('#bimbinganta_data').DataTable();
    });
  </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>