<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan Surat Kerja Praktek</title>
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
                                    <h1>Form Pengajuan Surat Kerja Praktek</h1>
                                </div>
                                <?php
                                    echo form_open_multipart('/mahasiswa/formSuratKP',array('id' => 'register-form','class' => 'register-form'));
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
                                                <label for="Perusahaan_1" class="required">Nama Perusahaan 1</label>
                                                <input required class="form-control-input-sm" type="text" name="Perusahaan_1" id="Perusahaan_1" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Bidang_Perusahaan1" class="required">Bidang Perusahaan 1</label>
                                                <input required class="form-control-input-sm" type="text" name="Bidang_Perusahaan1" id="Bidang_Perusahaan1" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratKP1" class="required">Upload Surat KP 1 (pdf)</label>
                                                <input required class="form-control-input-sm" type="file" name="SuratKP1" id="SuratKP1" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Perusahaan_2" class="required">Nama Perusahaan 2</label>
                                                <input type="text" name="Perusahaan_2" id="Perusahaan_2" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Bidang_Perusahaan2" class="required">Bidang Perusahaan 2</label>
                                                <input type="text" name="Bidang_Perusahaan2" id="Bidang_Perusahaan2" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratKP2" class="required">Upload Surat KP 2 (pdf)</label>
                                                <input type="file" name="SuratKP2" id="SuratKP2" />
                                            </div>  
                                        </div>
                                        <div class="form-group">
                                            <div class="form-input">
                                                <label for="Perusahaan_3" class="required">Nama Perusahaan 3</label>
                                                <input type="text" name="Perusahaan_3" id="Perusahaan_3" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Bidang_Perusahaan3" class="required">Bidang Perusahaan 3</label>
                                                <input type="text" name="Bidang_Perusahaan3" id="Bidang_Perusahaan3" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratKP3" class="required">Upload Surat KP 3 (pdf)</label>
                                                <input type="file" name="SuratKP3" id="SuratKP3" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Perusahaan_4" class="required">Nama Perusahaan 4</label>
                                                <input type="text" name="Perusahaan_4" id="Perusahaan_4" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Bidang_Perusahaan4" class="required">Bidang Perusahaan </label>
                                                <input type="text" name="Bidang_Perusahaan4" id="Bidang_Perusahaan4" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratKP4" class="required">Upload Surat KP 4 (pdf)</label>
                                                <input type="file" name="SuratKP4" id="SuratKP4" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Perusahaan_5" class="required">Nama Perusahaan 5</label>
                                                <input type="text" name="Perusahaan_5" id="Perusahaan_5" />
                                            </div>
                                            <div class="form-input">
                                                <label for="Bidang_Perusahaan5" class="required">Bidang Perusahaan 5</label>
                                                <input type="text" name="Bidang_Perusahaan5" id="Bidang_Perusahaan5" />
                                            </div>
                                            <div class="form-input">
                                                <label for="SuratKP5" class="required">Upload Surat KP 5 (pdf)</label>
                                                <input type="file" name="SuratKP5" id="SuratKP5" />
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