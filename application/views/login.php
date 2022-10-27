<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="icon" type="image/png" href="html/images/logo_undip.png" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Course Project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="./html/styles/bootstrap4/bootstrap.min.css">
  <link href="./html/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="./html/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="./html/styles/responsive.css">
</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="post" action="<?php echo base_url() . "/login"; ?>">
        <img src="<?php echo base_url(); ?>/html/images/logo_undip.png" alt="">
        <h2 style='color:black'>
          <center>Layanan SIPRITAMA UNDIP
        </h2>
        <h3 style='color:black'>
          <center>(SISTEM INFORMASI PRAKTIK INDUSTRI, TUGAS AKHIR, DAN MAGANG)
        </h3>
        <input type="text" id="username" name="username" placeholder="username" />
        <input type="password" id="password" name="password" placeholder="password" />
        <?php echo form_submit(array('id' => 'submit', 'value' => 'LOGIN', 'class' => 'login-button')) ?>
      </form>
    </div>
  </div>
</body>


</html>