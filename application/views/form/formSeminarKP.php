<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran Seminar KP</title>
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
                                if (isset($kp)) {
                                ?>
                                    <div class="section_title">
                                        <h1>Form Pendaftaran Seminar KP</h1>
                                    </div>
                                    <?php
                                    echo form_open_multipart('/mahasiswa/FormSeminarKP', array('id' => 'register-form', 'class' => 'register-form'));
                                    ?>
                                    <input type="hidden" name="IdKP" id='IdKP' value="<?php echo $kp->IdKP ?>" />
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="nama">Nama</label>
                                                <?php
                                                echo "<input type='text' name='nama' id='nama' readonly value='" . $mahasiswa->Nama . "' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="NIM">NIM</label>
                                                <?php
                                                echo "<input type='text' name='NIM' id='NIM' readonly value='" . $mahasiswa->NIM . "' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="NIM">Kajian KP</label>
                                                <?php
                                                echo "<input type='text' name='Kajian_KP' id='Kajian_KP' readonly value='" . $kp->Kajian_KP . "' />";
                                                ?>
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
                                                <label for="email" class="required">Judul KP</label>
                                                <input required class="form-control-input-sm" type="text" name="Judul" id="Judul" />
                                            </div>
                                            <div class="form-input">
                                                <label for="bimbingan" class="required">Upload Lembar Bimbingan(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="bimbingan" id="bimbingan" />
                                            </div>
                                            <div class="form-input">
                                                <label for="draft" class="required">Upload Draft KP(pdf)</label>
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
                                    Pendaftaran Seminar harus menunggu persetujuan KP</h1>";
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