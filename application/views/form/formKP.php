<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran Kerja Praktek</title>
    <link rel="icon" type="image/png" href="html/images/logo_undip.png"/>

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
                           
                                <div class="section_title">
                                    <h1>Form Pendaftaran Kerja Praktek</h1>
                                </div>
                                <?php
                                    echo form_open_multipart('/mahasiswa/FormKP',array('id' => 'register-form','class' => 'register-form'));
                                ?>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="nama">Nama</label>
                                                <?php
                                                    echo "<input type='text' name='nama' id='nama' readonly value='".$mahasiswa->Nama."' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="NIM">NIM</label>
                                                <?php
                                                    echo "<input type='text' name='NIM' id='NIM' readonly value='".$mahasiswa->NIM."' />";
                                                ?>                                
                                            </div>
                                            <div class="form-input">
                                                <label for="tanggalLahir">Tanggal Lahir</label>
                                                <?php
                                                    $date = DateTime::createFromFormat('d/m/Y',$mahasiswa->TanggalLahir);
                                                    $newDate = $date->format('Y-m-d');
                                                    echo "<input type='date' name='tanggalLahir' id='tanggalLahir' readonly value='".$newDate."' />";
                                                ?>
                                            </div>
                                            <div class="form-input">
                                                <label for="Email" class="required">Email</label>
                                                <input required class="form-control-input-sm" type="text" name="Email" id="Email" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Kajian_KP" class="required">Bidang Kajian KP</label>
                                                <input required class="form-control-input-sm" type="text" name="Kajian_KP" id="Kajian_KP" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Nama_Perusahaan" class="required">Nama Perusahaan</label>
                                                <input required class="form-control-input-sm" type="text" name="Nama_Perusahaan" id="Nama_Perusahaan" />
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="Tanggal_KP" class="required">Tanggal Pelaksanaan KP (contoh: 03-05-2015 sampai 10-07-2015)</label>
                                                <input required class="form-control-input-sm" type="text" name="Tanggal_KP" id="Tanggal_KP" />
                                            </div>
                                            <div class="form-select">
                                                <div class="label-flex">
                                                    <label for="dosen1">Dosen Pembimbing 1</label>
                                                <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                                </div>
                                                <div class="select-list">
                                                    <select class="selectData" name="dosen1" id="dosen1">
                                                        <?php
                                                            foreach($dosen as $item)
                                                            {
                                                                echo "<option value='".$item->KodeDosen."'>".$item->Nama."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-select">
                                                <div class="label-flex">
                                                    <label for="dosen1">Dosen Pembimbing 2</label>
                                                </div>
                                                <div class="select-list">
                                                    <select class="selectData" name="dosen2" id="dosen2">
                                                        <?php
                                                            foreach($dosen as $item)
                                                            {
                                                                echo "<option value='".$item->KodeDosen."'>".$item->Nama."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-input">
                                                <label for="Transkip" class="required">Upload Transkip KHS (pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="Transkip" id="Transkip" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratPenerimaanPerusahaan" class="required">Upload Surat Penerimaan Perusahaan (pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="SuratPenerimaanPerusahaan" id="SuratPenerimaanPerusahaan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-submit">
                                        <?php 
                                            echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => 'Submit','class' => 'submit'));
                                        ?>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <!-- Header Section -->
         <?php $this->load->view('template/footer'); ?>
    </div>
     <!-- Header Section -->

    

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
