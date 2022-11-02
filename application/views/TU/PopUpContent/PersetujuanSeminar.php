<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signup-form">
                    <?php
                    echo form_open('/TU/submitSeminar/tambah', array('id' => 'register-form', 'class' => 'register-form'));
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Daftar</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $seminar->LembarDaftar . "'>" . $seminar->NIM . "_LembarDaftar.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Bimbingan</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $seminar->LembarBimbingan . "'>" . $seminar->NIM . "_LembarBimbingan.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Draft</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $seminar->LembarDraft . "'>" . $seminar->NIM . "_Draft.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="tamgga;">Tanggal Pelaksanaan Seminar</label>
                                <?php
                                echo "<input type='date' name='tanggal' id='tanggal'/>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="jam">Jam Pelaksanaan Seminar</label>
                                <?php
                                echo "<input type='text' name='jam' id='jam' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="lokasi">Lokasi Pelaksanaan Seminar</label>
                                <?php
                                echo "<input type='text' name='lokasi' id='lokasi' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 nopadding">
                            <div class="form-select">
                                <input type="hidden" name="idSeminar" id='idSeminar' value="<?php echo $seminar->IdSeminar ?>" />
                                <div class="label-flex">
                                    <label for="dosen1">Dosen Penguji 1</label>
                                    <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                </div>
                                <div class="select-list">
                                    <select class="selectData" name="dosen1" id="dosen1">
                                        <?php
                                        foreach ($dosen as $item) {
                                            $value = "<option value='" . $item->KodeDosen . "'>";
                                            echo $value . $item->Nama . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 nopadding">
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="dosen2">Dosen Penguji 2</label>
                                    <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                </div>
                                <div class="select-list">
                                    <select class="selectData" name="dosen2" id="dosen2">
                                        <?php
                                        foreach ($dosen as $item) {
                                            $value = "<option value='" . $item->KodeDosen . "'>";
                                            echo $value . $item->Nama . "</option>";
                                        }
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