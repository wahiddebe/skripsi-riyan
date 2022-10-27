<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran Sidang Tugas Akhir</title>
    <link rel="icon" type="image/png" href="html/images/logo_undip.png" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>html/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>html/vendors/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>html/css/form-style.css">

    <?php $this->load->view('template/headerCSS'); ?>
</head>

<body>
    <div class="super_container">

        <!-- Header Section -->
        <?php $this->load->view('template/header'); ?>

        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="signup-content">
                            <div class="signup-form">
                                <?php
                                if (isset($tugasAkhir) && $statusSeminar == 'Lulus') {
                                ?>
                                    <div class="section_title">
                                        <h1>Form Pendaftaran Sidang Tugas Akhir</h1>
                                    </div>
                                    <?php
                                    echo form_open_multipart('/mahasiswa/FormSidang', array('id' => 'register-form', 'class' => 'register-form'));
                                    ?>
                                    <input type="hidden" name="IdTA" id='IdTA' value="<?php echo $tugasAkhir->IdTA ?>" />
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="nama">Nama</label>
                                                <?php
                                                echo "<input type='text' name='nama' id='nama' readonly value='" . $mahasiswa->Nama . "' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="NIM">Judul Tugas Akhir</label>
                                                <?php
                                                echo "<input type='text' name='judul' id='judul' value='" . $tugasAkhir->Judul . "' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="bebasPustaka" class="required">Upload Bukti Bebas Pustaka Pusat(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="bebasPustaka" id="bebasPustaka" />
                                            </div>
                                            <div class="form-input">
                                                <label for="bimbingan" class="required">Upload Lembar Bimbingan(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="bimbingan" id="bimbingan" />
                                            </div>
                                            <div class="form-input">
                                                <label for="daftarSidang" class="required">Upload Lembar Pendaftaran Sidang(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="daftarSidang" id="daftarSidang" />
                                            </div>
                                            <!-- <div class="form-input">
                                                    <label for="tanggalLahir">Tanggal Lahir</label>
                                                    <?php
                                                    // $date = DateTime::createFromFormat('d/m/Y',$mahasiswa->TanggalLahir);
                                                    // $newDate = $date->format('Y-m-d');
                                                    // echo "<input type='date' name='tanggalLahir' id='tanggalLahir' readonly value='".$newDate."' />";
                                                    ?>
                                                </div> -->
                                        </div>
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="NIM">NIM</label>
                                                <?php
                                                echo "<input type='text' name='NIM' id='NIM' readonly value='" . $mahasiswa->NIM . "' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="transkrip" class="required">Upload Transkrip Terbaru(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="transkrip" id="transkrip" />
                                            </div>
                                            <div class="form-input">
                                                <label for="kehadiran" class="required">Upload Bukti Kehadiran Seminar(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="kehadiran" id="kehadiran" />
                                            </div>
                                            <div class="form-input">
                                                <label for="toefl" class="required">Upload Hasil Test Toefl(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="toefl" id="toefl" />
                                            </div>
                                            <div class="form-input">
                                                <label for="draft" class="required">Upload Draft(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="draft" id="draft" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-submit">
                                        <?php
                                        echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => 'Submit', 'class' => 'submit'));
                                        ?>
                                    </div>
                                    </form>
                                <?php
                                } else {
                                    echo "<h1 style='margin-top:20%;margin-bottom:20%;align:center;display: flex;justify-content: center;'>
                                    Pendaftaran Sidang bisa dilakukan setelah Seminar dinyatakan lulus</h1>";
                                }
                                ?>
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
    <script src="<?php echo base_url(); ?>html/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>html/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?php echo base_url(); ?>html/vendors/wnumb/wNumb.js"></script>
    <script src="<?php echo base_url(); ?>html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>html/js/form-main.js"></script>
    <?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>