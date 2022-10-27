<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="signup-form">
                        <?php
                            echo form_open('/TU/submitSidang/ubah',array('id' => 'register-form','class' => 'register-form'));
                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <input type="hidden" name="idSidang" id='idSidang' value="<?php echo $sidang->IdSidang ?>"/>
                                        <label for="NIM">NIM</label>
                                        <?php
                                            echo "<input type='text' name='NIM' id='NIM' readonly  value='".$sidang->NIM."' />";
                                        ?>                                
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">       
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen2">Dosen Penguji 1</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="DosenPenguji1" id="DosenPenguji1">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($sidang->DosenPenguji1 == $item->KodeDosen)
                                                        {
                                                            $value = $value." selected='selected'>";
                                                        }
                                                        else
                                                        {
                                                            $value = $value.">";
                                                        }
                                                        echo $value.$item->Nama." (".$item->Beban2.")"."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen2">Dosen Penguji 2</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="DosenPenguji2" id="DosenPenguji2">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($sidang->DosenPenguji2 == $item->KodeDosen)
                                                        {
                                                            $value = $value." selected='selected'>";
                                                        }
                                                        else
                                                        {
                                                            $value = $value.">";
                                                        }
                                                        echo $value.$item->Nama." (".$item->Beban2.")"."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="TanggalSidang">Tanggal Sidang</label>
                                        <?php
                                            $date = DateTime::createFromFormat('d/m/Y',$sidang->TanggalSidang);
                                            $newDate = $date->format('Y-m-d');
                                            echo "<input type='date' name='tanggal' id='tanggal' value='".$newDate."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="Lokasi">Lokasi Sidang</label>
                                        <?php
                                            echo "<input type='text' name='lokasi' id='lokasi' value='".$sidang->Lokasi."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="Jam" class="required">Waktu Sidang</label>
                                        <?php
                                            echo "<input type='text' name='jam' id='jam' value='".$sidang->Jam."' />";
                                        ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen2">Status Sidang</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="status" id="status">
                                                <?php
                                                    $list = ['Lulus','Tidak Lulus'];
                                                    foreach($list as $item)
                                                    {
                                                        $value = "<option value='".$item."'";
                                                        if($seminar->Status == $item)
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