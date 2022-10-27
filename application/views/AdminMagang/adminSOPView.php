<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola SOP</title>
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
																	<h1 >Data SOP</h1>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-1.5">
														<?php echo form_open("PageController/cariSOP"); ?>
															<select name="cariberdasarkan">
																<option value =""> Cari Berdasarkan</option>
																<option value="Judul">Judul</option>
																<option value="TanggalPembuatan">Tanggal Pembuatan</option>
																<option value="File">File</option>
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
													<div class="row">
														<div class="col-lg-2 offset-md-10">
																<button type='button' style='margin-bottom:5px' class='btn btn-success'
																	data-toggle='modal' data-target='#myModal'data-form='/adminKP/getSOP/-1'>
																	Tambah
																</button>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<div class="list-data">
																<table class="table table-responsive-sm table-hover table-outline mb-0"> 
																	<thead>
																		<tr>
																			<!-- <td>No</td> -->
                                      <td>Judul</td>
																			<td>Tanggal Pembuatan</td>
																			<td>File</td>
																			<td>Aksi</td>
																		</tr>	
																	</thead>
																	<tbody>
																	<?php
																		//fungsi tampil list mahasiswa
																		$no = 1;
																		foreach($list as $SOP)
																		{
																			echo "<tr>";
																			echo "	<td>";
																			echo $SOP->Judul;
																			echo "	</td>";
																			echo "	<td>";
																			echo $SOP->TanggalPembuatan;
																			echo "	</td>";
																			echo "	<td>";
																			if($SOP->File != '')
																			{
																				echo "<a target='_blank' href='".base_url().$SOP->File."'>".$SOP->Judul.".pdf</a>";
																			}
																			else
																			{
																				echo "-";
																			}
																			echo "	</td>";							
																			echo "  <td>";
																			echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal' 
																						data-form='/adminKP/getSOP/".$SOP->IdSOP."'>
																						Ubah
																						</button>";
																			echo "    <button type='button' class='btn btn-danger' 
																						data-toggle='modal' data-target='#myModal2' data-form='/adminKP/hapusSOP/".$SOP->IdSOP."/".$SOP->Judul."'>
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
                <h4 class="modal-title" id="myModalLabel">Kelola Data SOP</h4>
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
                <h4 class="modal-title" id="myModalLabel">Hapus Data SOP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
								<form id='hapusForm' method='POST' action='<?php echo base_url(); ?>adminKP/hapusSOP'>
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