<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signup-form">
                    <?php
                    echo form_open('/TU/submitSidang/tambah', array('id' => 'register-form', 'class' => 'register-form'));
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <input type="hidden" name="idSidang" id='idSidang' value="<?php echo $sidang->IdSidang ?>" />
                                <label>Transksrip</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->Transkrip . "'>" . $sidang->NIM . "_Transksrip.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Bebas Pustaka</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->BebasPustaka . "'>" . $sidang->NIM . "_BebasPustaka.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Bimbingan</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->LembarBimbingan . "'>" . $sidang->NIM . "_Bimbingan.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Daftar Sidang</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->DaftarSidang . "'>" . $sidang->NIM . "_LembarDaftar.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Lembar Kehadiran Seminar</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->KehadiranSeminar . "'>" . $sidang->NIM . "_KehadiranSeminar.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Toefl</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->Toefl . "'>" . $sidang->NIM . "_Toefl.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label>Draft</label>
                                <?php
                                echo "<a target='_blank' href='" . base_url() . $sidang->Draft . "'>" . $sidang->NIM . "_Draft.pdf</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="tanggal">Tanggal Pelaksanaan Sidang</label>
                                <?php
                                echo "<input type='date' name='tanggal' id='tanggal'/>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="jam">Jam Pelaksanaan Sidang</label>
                                <?php
                                echo "<input type='text' name='jam' id='jam' />";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <label for="lokasi">Lokasi Pelaksanaan Sidang</label>
                                <?php
                                echo "<input type='text' name='lokasi' id='lokasi' />";
                                ?>
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