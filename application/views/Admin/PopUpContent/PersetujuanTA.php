<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="signup-form">
                        <?php
                            echo form_open('/admin/submitTugasAkhir',array('id' => 'register-form','class' => 'register-form'));
                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label>Transksrip</label>
                                        <?php
                                            echo "<a target='_blank' href='".base_url().$tugasAkhir->Transkrip."'>".$tugasAkhir->NIM."_Transksrip.pdf</a>";
                                        ?>       
                                    </div>                         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label>KRS</label>
                                        <?php
                                            echo "<a target='_blank' href='".base_url().$tugasAkhir->KRS."'>".$tugasAkhir->NIM."_KRS.pdf</a>";
                                        ?>       
                                    </div>                         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label>Lembar Pra Bimbingan</label>
                                        <?php
                                            echo "<a target='_blank' href='".base_url().$tugasAkhir->PraBimbingan."'>".$tugasAkhir->NIM."_PraBimbingan.pdf</a>";
                                        ?>       
                                    </div>                         
                                </div>  
                            </div>
                            <?php 
                                if($isApprove)
                                {
                            ?>
                             
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="NIM">Tema</label>
                                        <?php
                                            echo "<input type='text' name='tema' id='tema' value='".$tugasAkhir->Tema."' />";
                                        ?>       
                                    </div>                         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12">   
                                    <div class="form-input">
                                        <label for="tanggalLahir">Judul</label>
                                        <?php
                                            echo "<input type='text' name='judul' id='judul' value='".$tugasAkhir->Judul."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-select">
                                        <input type="hidden" name="idTA" id='idTA' value="<?php echo $tugasAkhir->IdTA ?>"/>
                                        <input type="hidden" name="isApprove" id='isApprove' value="<?php echo $isApprove ?>"/>
                                        <div class="label-flex">
                                            <label for="dosen1">Dosen Pembimbing 1</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="dosen1" id="dosen1">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($dosen1 == $item->KodeDosen)
                                                        {
                                                            $value = $value." selected='selected'>";
                                                        }
                                                        else
                                                        {
                                                            $value = $value.">";
                                                        }
                                                        echo $value.$item->Nama." (".$item->TotalBeban.")"."</option>";
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
                                            <label for="dosen2">Dosen Pembimbing 2</label>
                                        <!-- <a href="#" class="form-link">Lunch detail</a> -->
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="dosen2" id="dosen2">
                                                <?php
                                                    foreach($dosen as $item)
                                                    {
                                                        $value = "<option value='".$item->KodeDosen."'";
                                                        if($dosen2 == $item->KodeDosen)
                                                        {
                                                            $value = $value." selected='selected'>";
                                                        }
                                                        else
                                                        {
                                                            $value = $value.">";
                                                        }
                                                        echo $value.$item->Nama." (".$item->TotalBeban.")"."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!$isApprove)
                            {
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
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
                            <?php echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => $msgButton,'class' => 'btn btn-primary')); ?>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>