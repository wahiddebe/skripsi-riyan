<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="signup-form">
                        <?php
                            echo form_open('/TU/submitSeminar/ubah',array('id' => 'register-form','class' => 'register-form'));
                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <input type="hidden" name="idSeminar" id='idSeminar' value="<?php echo $seminar->IdSeminar ?>"/>
                                        <label for="NIM">NIM</label>
                                        <?php
                                            echo "<input type='text' name='NIM' id='NIM' readonly  value='".$seminar->NIM."' />";
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
                                            <select class="selectData" name="dosen1" id="dosen1">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($seminar->DosenPenguji1 == $item->KodeDosen)
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
                                            <select class="selectData" name="dosen2" id="dosen2">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($seminar->DosenPenguji2 == $item->KodeDosen)
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
                                        <label for="TanggalSidang">Tanggal Seminar</label>
                                        <?php
                                            $date = DateTime::createFromFormat('d/m/Y',$seminar->TanggalSeminar);
                                            $newDate = $date->format('Y-m-d');
                                            echo "<input type='date' name='tanggal' id='tanggal' value='".$newDate."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="Lokasi">Lokasi Seminar</label>
                                        <?php
                                            echo "<input type='text' name='lokasi' id='lokasi' value='".$seminar->Lokasi."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="Jam" class="required">Waktu Seminar</label>
                                        <?php
                                            echo "<input type='text' name='jam' id='jam' value='".$seminar->Jam."' />";
                                        ?> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen2">Status Seminar</label>
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