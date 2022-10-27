<input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
<div>Apakah anda yakin untuk <?php echo $event; ?> data <?php echo $tabel; ?> dengan
    <?php
    if (isset($nama)) {
        echo $kolom . ' "' . $nama . '"';
    } else {
        echo $kolom . ' ' . $id;
    }
    ?>?</div>