<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Perusahaan KP</title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png"/>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/css/form-style.css">

    <?php $this->load->view('template/headerCSS'); ?>
</head>

<body>
    <div class="super_container"> 
        
        <!-- Header Section -->
        <?php $this->load->view('template/header'); ?>

				<main>
					<div>
							<div class="container">
									<div class="row">
										<div class="col-lg-12 nopadding">
											<div class="register_section d-flex flex-column">
												<div class="register_content ">
													<?php 
													if(isset($success))
													{
														if($success)
														{
														?>
														<div class="row">
																<div class="col">
																	<div class="alert alert-success">
																			<strong>Sukses <?php echo $event ?> data SOP  "<?php echo $Judul ?>"</strong>
																	</div>
																</div>
															</div>
													<?php
														}
													}?>
													<div class="row">
														<div class="col-lg-12 nopadding">
															<div class="section_title text-center">
																	<h1 >Data Perusahaan KP</h1>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col=4">
														<?php echo form_open("PageController/cariPerusahaanKP"); ?>
															<select name="cariberdasarkan">
																<option value =""> Cari Berdasarkan</option>
																<option value="NIM">NIM</option>
																<option value="Perusahaan_1">Perusahaan 1</option>
																<option value="Bidang_Perusahaan1">Bidang Perusahaan</option>
																<option value="Perusahaan_2">Perusahaan 2</option>
																<option value="Bidang_Perusahaan2">Bidang Perusahaan 2</option>
																<option value="Perusahaan_3">Perusahaan 3</option>
																<option value="Bidang_Perusahaan3">Bidang Perusahaan 3</option>
															</select>
															</div>
															<div class="col=4">
															<input type="text" name="yangdicari" id="">
															</div>
															<div class="col=4">
															<input type="submit" value ="Cari">
												
														<?php echo form_close(); ?>
														</div>
													</div>	
													<div class="row">
														<div class="col">
														<?php
														    if(isset($jumlah)){
																	if($cariberdasarkan==""){
																		echo "Jumlah pencarian " . $yangdicari ." : " . $jumlah;
																	}else{
																		echo "Jumlah pencarian " . $cariberdasarkan . "=" . $yangdicari . " : " . $jumlah;
																	}
																}
														?>		
														</div>
													</div>	
													<br>
													<a class="btn btn-success"href="<?php echo base_url().'PageController/export_excelPerusahaanKP' ?>">Export Excel</a>
													<br>
													<div class="row">
														<div class="col">
															<div class="list-data">
																<table class="table table-responsive-sm table-hover table-outline mb-0"> 
																	<thead>
																		<tr>
																			<!-- <td>No</td> -->
                                      <td><center>NIM</td>
																			<td><center>Perusahaan 1</td>
																			<td><center>Bidang Perusahaan 1</td>
																			<td><center>Perusahaan 2</td>
																			<td><center>Bidang Perusahaan 2</td>
																			<td><center>Perusahaan 3</td>
																			<td><center>Bidang Perusahaan 3</td>
																			<td><center>Aksi</td>
																		</tr>	
																	</thead>
																	<tbody>
																	<?php
																		//fungsi tampil list mahasiswa
																		$no = 1;
																		foreach($list as $PerusahaanKP)
																		{
																			echo "<tr>";
																			echo "	<td>";
																			echo $PerusahaanKP->NIM;
																			echo "	</td>";
																			echo "	<td>";
																			echo $PerusahaanKP->Perusahaan_1;
																			echo "	</td>";
																			echo "	<td>";
																			echo $PerusahaanKP->Bidang_Perusahaan1;
																			echo "	</td>";
																			echo "	<td>";
																			if($PerusahaanKP->Perusahaan_2=='')
																			{
																				echo $PerusahaanKP->Perusahaan_2;
																			}
																			else
																			{
																				echo "-";
																			}
																			echo "  </td>";
																			echo "	<td>";
																			if($PerusahaanKP->Bidang_Perusahaan2=='')
																			{
																				echo $PerusahaanKP->Bidang_Perusahaan2;
																			}
																			else
																			{
																				echo "-";
																			}
																			echo "  </td>";		
																			echo "	<td>";
																			if($PerusahaanKP->Perusahaan_2=='')
																			{
																				echo $PerusahaanKP->Perusahaan_2;
																			}
																			else
																			{
																				echo "-";
																			}
																			echo "  </td>";
																			echo "	<td>";
																			if($PerusahaanKP->Bidang_Perusahaan3=='')
																			{
																				echo $PerusahaanKP->Bidang_Perusahaan3;
																			}
																			else
																			{
																				echo "-";
																			}
																			echo "  </td>";
																			echo "  <td>";
																			echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal2' 
																						data-form='/adminKP/hapusSuratKP/".$PerusahaanKP->IdKP."/".$PerusahaanKP->NIM."/perusahaan'>
																						Hapus
																						</button>";
																			echo "  </td>";
																			echo "</tr>"; 

																		}
																	?>
																	</tbody>
																</table> 
															</div>
														</div>	
													</div>
												</div>
											</div>
										</div>
									</div>

							</div>
					</div>

				<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 	aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Kelola Data Perusahaan KP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-data" id="form-data">
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div> -->
            </div>
          </div>
				</div>    

				<!-- Modal 2 -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" 	aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Data Perusahaan KP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
								<form id='hapusForm' method='POST' action='<?php echo base_url(); ?>adminKP/hapusSuratKP/perusahaan'>
									<div class="form-data" id="form-data2"></div>
								</form>
              </div>
              <div class="modal-footer">
								<input type="submit" form="hapusForm" value="Ya" class="btn btn-primary"/>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              </div>
            </div>
          </div>
        </div>      
				
			</main>	
			 <!-- Header Section -->
			 <?php $this->load->view('template/footer'); ?>								
    </div>

    <!-- JS -->
    <script src="<?php echo base_url(); ?>/html/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/wnumb/wNumb.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/form-main.js"></script>
    <script src="<?php echo base_url(); ?>/html/js/main.js"></script>
    <?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>