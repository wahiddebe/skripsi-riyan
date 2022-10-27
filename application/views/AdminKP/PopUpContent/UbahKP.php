<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <div class="signup-form">
                        <?php
                            echo form_open('/adminKP/submitKP',array('id' => 'register-form','class' => 'register-form'));
                        ?>
                            <?php 
                                if($isApprove)
                                {
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-input">
                                        <label for="Kajian_KP">Bidang Kajian KP</label>
                                        <?php
                                            echo "<input type='text' name='tema' id='tema' value='".$KP->Kajian_KP."' />";
                                        ?>       
                                    </div>                         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12">   
                                    <div class="form-input">
                                        <label for="Nama_Perusahaan">Nama Perusahaan</label>
                                        <?php
                                            echo "<input type='text' name='judul' id='judul' value='".$KP->Nama_Perusahaan."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">   
                                    <div class="form-input">
                                        <label for="Tanggal_KP">Tanggal Pelaksanaan KP</label>
                                        <?php
                                            echo "<input type='text' name='judul' id='judul' value='".$KP->Tanggal_KP."' />";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="row">
                                <div class="col-lg-12 nopadding">
                                    <div class="form-select">
                                        <input type="hidden" name="IdKP" id='IdKP' value="<?php echo $KP->IdKP ?>"/>
                                        <input type="hidden" name="isApprove" id='isApprove' value="<?php echo $isApprove ?>"/>
                                        <div class="label-flex">
                                            <label for="dosen1">Dosen Pembimbing</label>
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
                                                        echo $value.$item->Nama." (".$item->BebanKP.")"."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                      
                            </div>
                            
                            
                                    <div class="form-select">
                                        <div class="label-flex">
                                            <label for="dosen1">Status Keaktifan</label>
                                        </div>
                                        <div class="select-list">
                                            <select class="selectData" name="StatusMahasiswa" id="StatusMahasiswa">
                                                <?php
                                                    $list = ['Tidak Lulus','Lulus'];
                                                    foreach($list as $item)
                                                    {
                                                        $value = "<option value='".$item."'";
                                                        if($KP->StatusMahasiswa == $item)
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
                            
                               
                            <?php echo form_submit(array('id'=> 'submit','name' => 'submit', 'value' => $msgButton,'class' => 'btn btn-primary')); ?>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>