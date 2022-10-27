<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="signup-form">
                        <?php
                            echo form_open('/admin/submitMahasiswa',array('id' => 'register-form','class' => 'register-form'));
                        ?>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-input">
                                        <label for="NIM">NIM</label>
                                        <?php
                                            echo "<input type='text' name='NIM' id='NIM' readonly  value='".$mahasiswa->NIM."' />";
                                        ?>                                
                                    </div>
                                    <div class="form-input">
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <?php
                                            $date = DateTime::createFromFormat('d/m/Y',$mahasiswa->TanggalLahir);
                                            $newDate = $date->format('Y-m-d');
                                            echo "<input type='date' name='TanggalLahir' id='TanggalLahir' value='".$newDate."' />";
                                        ?>
                                    </div>
                                    <div class="form-input">
                                        <label for="telepon" class="required">Nomor Telepon</label>
                                        <?php
                                            echo "<input type='text' name='NoTelepon' id='NoTelepon' value='".$mahasiswa->NoTelepon."' />";
                                        ?> 
                                    </div>
                                    <?php if($mahasiswa->AlamatOrtu != '')
                                    { ?>
                                    <div class="form-input">
                                        <label for="alamat_ortu" class="required">Alamat Orang Tua</label>
                                        <?php
                                            echo "<input type='text' name='AlamatOrtu' id='AlamatOrtu' value='".$mahasiswa->AlamatOrtu."' />";
                                        ?> 
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <div class="form-input">
                                        <label for="nama">Nama</label>
                                        <?php
                                            echo "<input type='text' name='Nama' id='Nama' value='".$mahasiswa->Nama."' />";
                                        ?>
                                    </div>
                                    <div class="form-input">
                                        <label for="email" class="required">Email</label>
                                        <?php
                                            echo "<input type='text' name='Email' id='Email' value='".$mahasiswa->Email."' />";
                                        ?> 
                                    </div>
                                    <?php if($mahasiswa->NoTeleponOrtu != '')
                                    { ?>
                                    <div class="form-input">
                                        <label for="telepon_ortu" class="required">Nomor Telepon Orang Tua</label>
                                        <?php
                                            echo "<input type='text' name='NoTeleponOrtu' id='NoTeleponOrtu' value='".$mahasiswa->NoTeleponOrtu."' />";
                                        ?> 
                                    </div>
                                    <?php } ?>
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen1">Status Keaktifan</label>
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="Status" id="Status">
                                                <?php
                                                    $list = ['Aktif','Pasif','Lulus'];
                                                    foreach($list as $item)
                                                    {
                                                        $value = "<option value='".$item."'";
                                                        if($mahasiswa->Status == $item)
                                                        {
                                                            $value = $value." selected='selected'>";
                                                        }
                                                        else
                                                        {
                                                            $value = $value.">";
                                                        }
                                                        echo $value.$item."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => 'Ubah','class' => 'btn btn-primary')); ?>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>