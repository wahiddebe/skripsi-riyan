<div class="main">
    <div class="container">
        <?php
        echo form_open('/admin/submitMahasiswa', array('id' => 'register-form', 'class' => 'register-form'));
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-input">
                    <label for="NIM">NIM</label>
                    <?php
                    echo "<input type='text' name='NIM' id='NIM' />";
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-input">
                    <label for="Nama">Nama</label>
                    <?php
                    echo "<input type='text' name='Nama' id='Nama' />";
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-input">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <?php
                    echo "<input required type='date' name='TanggalLahir' id='TanggalLahir' />";
                    ?>
                </div>
            </div>
        </div>
        <?php echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => 'Tambah', 'class' => 'btn btn-primary')); ?>
        </form>
    </div>
</div>