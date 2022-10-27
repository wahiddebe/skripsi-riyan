<div class="main">
  <div class="container">
    <?php
    echo form_open_multipart('/Dosen/submitPenilaian', array('id' => 'register-form', 'class' => 'register-form'));
    ?>
    <?php
    $nilaiButton = 'Tambah';

    ?>
    <input type="hidden" name="IdSidang" id='IdSidang' value="<?php echo $IdSidang ?>" />
    <div class="row">
      <div class="col-lg-12">
        <div class="form-input">
          <label for="NIM">Status</label>
          <div class="select-list">
            <select class="selectData" required name="Status" id="Status">
              <option value='Lulus'>Lulus</option>
              <option value='Perbaikan'>Perbaikan</option>
              <option value='Tidak Lulus'>Tidak Lulus</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-input">
          <label for="tanggalLahir">Nilai</label>
          <?php
          echo "<input type='text' required name='Nilai' id='Nilai' />";

          ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-input">
          <label for="tanggalLahir">TTD</label>
          <?php
          echo "<input type='file' accept='image/png, image/gif, image/jpeg' required name='TTD' id='TTD' />";

          ?>
        </div>
      </div>
    </div>
    <?php
    echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => $nilaiButton, 'class' => 'btn btn-primary'));
    ?>
    </form>
  </div>
</div>