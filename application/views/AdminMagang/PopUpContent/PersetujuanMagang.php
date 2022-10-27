<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signup-form">
                    <?php
                    echo form_open('/adminMagang/submitMagang', array('id' => 'register-form', 'class' => 'register-form'));
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="Program_Magang">Bidang Program Magang</label>
                                <?php
                                echo "<input type='text' name='Program_Magang' id='Program_Magang' value='" . $Magang->Program_Magang . "' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="Nama_Perusahaan">Nama Perusahaan</label>
                                <?php
                                echo "<input type='text' name='judul' id='judul' value='" . $Magang->Nama_Perusahaan . "' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="Tanggal_Magang">Tanggal Pelaksanaan Magang</label>
                                <?php
                                echo "<input type='text' name='judul' id='judul' value='" . $Magang->Tanggal_Magang . "' />";
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 nopadding">
                            <div class="form-select">
                                <input type="hidden" name="IdMagang" id='IdMagang' value="<?php echo $Magang->IdMagang ?>" />
                                <input type="hidden" name="isApprove" id='isApprove' value="<?php echo $isApprove ?>" />
                                <div class="label-flex">
                                    <label for="dosen1">Dosen Pembimbing</label>
                                    <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                </div>
                                <div class="select-list">
                                    <select class="selectData" name="dosen1" id="dosen1">
                                        <?php
                                        foreach ($dosen as $item) {
                                            $value = "<option value='" . $item->KodeDosen . "'";
                                            if ($dosen1 == $item->KodeDosen) {
                                                $value = $value . " selected='selected'>";
                                            } else {
                                                $value = $value . ">";
                                            }
                                            echo $value . $item->Nama . " (" . $item->BebanMagang . ")" . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!$isApprove) {
                    ?>
                        <div class="row">
                            <div class="col-lg-12 nopadding">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <label for="dosen2">Persetujuan</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                    </div>
                                    <div class="select-list">
                                        <select class="selectData" name="persetujuan" id="persetujuan">
                                            <option value='setuju'>Setujui</option>
                                            <option value='tolak'>Tolak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php echo form_submit(array('id' => 'submit', 'name' => 'submit', 'value' => $msgButton, 'class' => 'btn btn-primary')); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>