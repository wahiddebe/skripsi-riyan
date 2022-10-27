<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signup-form">
                    <?php
                    echo form_open('/TU/submitSeminarKP/ubah', array('id' => 'register-form', 'class' => 'register-form'));
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <input type="hidden" name="idSeminar" id='idSeminar' value="<?php echo $seminarKP->IdSeminarKP ?>" />
                                <label for="NIM">NIM</label>
                                <?php
                                echo "<input type='text' name='NIM' id='NIM' readonly  value='" . $seminarKP->NIM . "' />";
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="TanggalSidang">Tanggal Seminar</label>
                                <?php
                                $date = DateTime::createFromFormat('d/m/Y', $seminarKP->TanggalSeminarKP);
                                $newDate = $date->format('Y-m-d');
                                echo "<input required type='date' name='tanggal' id='tanggal' value='" . $newDate . "' />";
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="Lokasi">Lokasi Seminar</label>
                                <?php
                                echo "<input type='text' name='lokasi' id='lokasi' value='" . $seminarKP->Lokasi . "' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="Jam" class="required">Waktu Seminar</label>
                                <?php
                                echo "<input type='text' name='jam' id='jam' value='" . $seminarKP->Jam . "' />";
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
                                        $list = ['Lulus', 'Tidak Lulus'];
                                        foreach ($list as $item) {
                                            $value = "<option value='" . $item . "'";
                                            if ($seminarKP->Status == $item) {
                                                $value = $value . " selected='selected'>";
                                            } else {
                                                $value = $value . ">";
                                            }
                                            echo $value . $item . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => 'Ubah', 'class' => 'btn btn-primary')); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>