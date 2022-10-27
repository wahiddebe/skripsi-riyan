<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran Tugas Akhir</title>
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
                            <?php 
                                if(isset($mahasiswa) && $StatusKP == 'Lulus')
                                {
                                ?>
                                <div class="section_title">
                                    <h1>Form Pendaftaran Tugas Akhir</h1>
                                </div>
                                <?php
                                    echo form_open_multipart('/mahasiswa/FormTA',array('id' => 'register-form','class' => 'register-form'));
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
                                                <label for="email" class="required">Email</label>
                                                <input required class="form-control-input-sm" type="text" name="email" id="email" />
                                            </div>
                                            <div class="form-input">
                                                <label for="telepon" class="required">Nomor Telepon</label>
                                                <input required class="form-control-input-sm" type="text" name="telepon" id="telepon" />
                                            </div>
                                            <div class="form-input">
                                                <label for="telepon_ortu" class="required">Nomor Telepon Orang Tua</label>
                                                <input required class="form-control-input-sm" type="text" name="telepon_ortu" id="telepon_ortu" />
                                            </div>
                                            <div class="form-input">
                                                <label for="alamat_ortu" class="required">Alamat Orang Tua</label>
                                                <input required class="form-control-input-sm" type="text" name="alamat_ortu" id="alamat_ortu" />
                                            </div>
                                            <div class="form-input">
                                                <label for="tanggal" class="required">Tanggal Daftar</label>
                                                <input required class="form-control-input-sm" type="date" name="tanggal" id="tanggal" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="tema" class="required">Tema Tugas Akhir</label>
                                                <input required class="form-control-input-sm" type="text" name="tema" id="tema" />
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
                                                <label for="krs" class="required">Upload KRS(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="krs" id="krs" />
                                            </div>
                                            <div class="form-input">
                                                <label for="transkrip" class="required">Upload Transkrip(pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="transkrip" id="transkrip" />
                                            </div>
                                            <div class="form-input">
                                                <label for="foto" class="required">Upload Foto 3x4</label>
                                                <input  required class="form-control-input-sm" type="file" name="foto" id="foto" />
                                            </div>
                                            <div class="form-input">
                                                <label for="prabimbingan">Upload Pra Bimbingan</label>
                                                <input  class="form-control-input" type="file" name="prabimbingan" id="prabimbingan" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-submit">
                                        <?php 
                                            echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => 'Submit','class' => 'submit'));
                                        ?>
                                    </div>
                                </form>
                                <?php
                                }
                                else
                                {
                                    echo "<h1 style='margin-top:20%;margin-bottom:20%;align:center;display: flex;justify-content: center;'>
                                    Pendaftaran Tugas Akhir bisa dilakukan setelah KP dinyatakan lulus</h1>";
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