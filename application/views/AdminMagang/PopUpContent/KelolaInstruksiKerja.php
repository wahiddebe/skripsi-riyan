<div class="main">
    <div class="container">
        <?php
            echo form_open_multipart('/adminKP/submitInstruksiKerja',array('id' => 'register-form','class' => 'register-form'));
        ?>
            <?php 
                $data = [];
                $nilaiButton = 'Tambah';
                if(isset($InstruksiKerja))
                {
                    $data['IdInstruksi'] = $InstruksiKerja->IdInstruksi;
                    $data['judul'] = $InstruksiKerja->Judul;
                    $data['file'] = $InstruksiKerja->File;
                    $nilaiButton = 'Ubah';
                }
                else
                {
                    $data['IdInstruksi'] = '';
                    $data['judul'] = '';
                    $data['file'] = '';
                }
            ?>
            <input type="hidden" name="IdInstruksi" id='IdInstruksi' value="<?php echo $data['IdInstruksi'] ?>"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-input">
                        <label for="NIM">Judul</label>
                        <?php
                            echo "<input type='text' name='judul' id='judul' value='".$data['judul']."' />";
                        ?>       
                    </div>                         
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-12">   
                    <div class="form-input">
                        <label for="tanggalLahir">File</label>
                        <?php
                            if($data['file'] == '')
                            {
                                echo "<input type='file' name='file' id='file' />";
                            }
                            else
                            {
                                echo "<a target='_blank' id='namaFile' href='".base_url().$data['file']."'>".$data['judul'].".pdf</a>";
                                echo "<input type='file' name='file' id='file' style='display:none;' />";
                        ?>
                                <input type="button"id='btn_changeFile' class="btn-x" value='X' 
                                onclick="
                                    document.getElementById('file').style.display='initial';
                                    document.getElementById('namaFile').style.display='none';
                                    document.getElementById('btn_changeFile').style.display='none';
                                " />
                        <?php
                            }

  
                        ?>
                    </div>
                </div>
            </div>
            <?php 
                echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => $nilaiButton,'class' => 'btn btn-primary')); 
            ?>
        </form>
    </div>
</div>