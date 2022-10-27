<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/css/form-style.css">

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
                                    echo form_open('/ubahPassword',array('id' => 'register-form','class' => 'register-form'));
                                ?>
                                    <?php
                                    if(isset($success))
                                    {
                                        if($success)
                                        {
                                    ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="alert alert-success">
                                                        <strong>Sukses mengubah password !</strong>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="alert alert-danger">
                                                        <strong><?php echo $message ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    }?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="section_title text-center">
                                                <h1>Ubah Password</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 offset-md-3">
                                            <div class="form-input">
                                                <label for="passwordLama" class="required">Password Lama</label>
                                                <input type='password' name='passwordLama' id='passwordLama'/>   
                                            </div>                         
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 offset-md-3">
                                            <div class="form-input">
                                                <label for="passwordBaru" class="required">Password Baru</label>
                                                <input type='password' name='passwordBaru' id='passwordBaru'/>   
                                            </div>                         
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 offset-md-3">
                                            <div class="form-input">
                                                <label for="passwordBaru2" class="required">Konfirmasi Password Baru</label>
                                                <input type='password' name='passwordBaru2' id='passwordBaru2'/>   
                                            </div>                         
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 offset-md-3">
                                    <?php 
                                        echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => 'Ubah','class' => 'btn btn-primary')); 
                                    ?>
                                        </div>  
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
    <script src="<?php echo base_url(); ?>/html/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/wnumb/wNumb.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/form-main.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/main.js"></script>
    <?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>