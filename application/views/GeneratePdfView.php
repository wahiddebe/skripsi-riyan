<!DOCTYPE html>
<html>

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta charset="utf-8">
  <title>Form Penilaian Sidang Tugas Akhir</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h3 class="text-left">Form Penilaian Sidang Tugas Akhir</h3>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>Nama <?= $StatusDosen ?> : <?= $Penguji ?> </p>
        <p>Nama Mahasiswa : <?= $Nama ?> </p>
        <p>NIM : <?= $NIM ?> </p>
        <p>Judul : <?= $Judul ?> </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-7">
      </div>
      <div class="col-xs-5">
        <p>Semarang, <?= $TanggalSidang ?></p>
        <?php
        $TTD = ltrim($TTD, './');
        ?>
        <img src="<?= $TTD ?>" alt="" class="img-responsive">
        <p><?= $Penguji ?></p>
        <p><?= $NIP ?></p>
      </div>
    </div>
  </div>
</body>

</html>