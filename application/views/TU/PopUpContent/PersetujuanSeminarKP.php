<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signup-form">
                    <?php
                    echo form_open('/TU/submitSeminarKP/tambah', array('id' => 'register-form', 'class' => 'register-form'));
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Bimbingan</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $seminarKP->LembarBimbingan . "'>" . $seminarKP->NIM . "_LembarBimbingan.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Draft</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $seminarKP->LembarDraft . "'>" . $seminarKP->NIM . "_Draft.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="tamgga;">Tanggal Pelaksanaan Seminar KP</label>
                                <?php
                                echo "<input required type='date' name='tanggal' id='tanggal'/>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="jam">Jam Pelaksanaan Seminar KP</label>
                                <?php
                                echo "<input required type='text' name='jam' id='jam' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="lokasi">Lokasi Pelaksanaan Seminar KP</label>
                                <?php
                                echo "<input required type='text' name='lokasi' id='lokasi' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 nopadding">
                            <div class="form-select">
                                <input type="hidden" name="idSeminar" id='idSeminar' value="<?php echo $seminarKP->IdSeminarKP ?>" />
                                <div class="label-flex">
                                    <label for="dosen1">Dosen Pembimbing</label>
                                    <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                </div>

                                <div class="select-list">
                                    <select class="selectData" name="dosen1" id="dosen1">
                                        <?php
                                        $value = "<option readonly selected value='" . $dosen->KodeDosen . "'>";
                                        echo $value . $dosen->Nama . "</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => 'Setujui', 'class' => 'btn btn-primary')); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>