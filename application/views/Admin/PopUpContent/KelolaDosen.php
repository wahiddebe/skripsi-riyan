<div class="main">
    <div class="container">
        <?php
            echo form_open('/admin/submitDosen',array('id' => 'register-form','class' => 'register-form'));
        ?>
            <?php 
                $data = [];
                $nilaiButton = 'Tambah';
                if(isset($dosen))
                {
                    $data['KodeDosen'] = $dosen->KodeDosen;
                    $data['nama'] = $dosen->Nama;
                    $nilaiButton = 'Ubah';
                }
                else
                {
                    $data['KodeDosen'] = '';
                    $data['nama'] = '';
                }
            ?>
            <input type="hidden" name="KodeDosenLama" id='KodeDosenLama' value="<?php echo $data['KodeDosen'] ?>"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-input">
                        <label for="NIM">KodeDosen</label>
                        <?php
                            echo "<input type='text' name='KodeDosenBaru' id='KodeDosenBaru' value='".$data['KodeDosen']."' />";
                        ?>       
                    </div>                         
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-12">   
                    <div class="form-input">
                        <label for="tanggalLahir">Nama</label>
                        <?php
                            echo "<input type='text' name='Nama' id='Nama' value='".$data['nama']."' />";
                        ?>
                    </div>
                </div>
            </div>
            <?php echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => $nilaiButton,'class' => 'btn btn-primary')); ?>
        </form>
    </div>
</div>