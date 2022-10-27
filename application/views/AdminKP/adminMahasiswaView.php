<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Mahasiswa</title>
		<link rel="icon" type="image/png" href="html/images/logo_undip.png"/>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/html/vendors/nouislider/nouislider.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    
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
																			<strong>Sukses <?php echo $event ?> data mahasiswa NIM <?php echo $NIM ?></strong>
																	</div>
																</div>
															</div>
													<?php
														}
													}?>
													<div class="row">
														<div class="col">
															<div class="section_title text-center">
																<h1>Data Mahasiswa</h1>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-10 offset-md-0.5">
													<form method="post" id="import_form" enctype="multipart/form-data">
  											 <p><label>Select Excel File</label></p>
												 <div class="row">
												 <div class="col-lg-4 offset-md-0.5">
   											<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
												 </div>
												 <div class="col=2">
   <input type="submit" name="import" value="Import" class="btn btn-primary" />
	 </div>
	 </div>

	 <br>
  </form>
	</div>
	 </div>
													
													<a class="btn btn-success"href="<?php echo base_url().'PageController/export_excel' ?>">Export Excel</a>
													<br>
													<div class="row">
													<div class="col-lg-10 offset-md-11">
																<button type='button' style='margin-bottom:5px' class='btn btn-success'
																	data-toggle='modal' data-target='#myModal3' data-form='/adminKP/getMahasiswa/-1'>
																	Tambah
																</button>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<div class="list-data">
															<div class="col-md-12">
															<table id="mahasiswa_data" class="table table-bordered" cellspacing="0" width="100%">
																	<thead>
																		<tr>
																			<!-- <td>No</td> -->
																			<td><center>Nama</td>
																			<td><center>NIM</td>
																			<td><center>Tanggal Lahir</td>
																			<td><center>Email</td>
																			<td><center>Status KP</td>
																			<td><center>Aksi</td>
																		</tr>	
																	</thead>
																	<tbody>
																	<?php
																		//fungsi tampil list mahasiswa
																		$no = 1;
																		foreach($list as $mahasiswa)
																		{
																			echo "<tr>";
																			echo "	<td>";
																			echo $mahasiswa->Nama;
																			echo "	</td>";
																			echo "	<td>";
																			echo $mahasiswa->NIM;
                                      echo "	</td>";
																			echo "	<td>";
																			echo $mahasiswa->TanggalLahir;
																			echo "	</td>";
																			echo "	<td>";
																			if($mahasiswa->Email!='')
																			{
																				echo $mahasiswa->Email;
																			}
																			else
																			{
																				echo "-";
																			}
																			
																			echo "	</td>";
																			echo "	<td>";
																			echo $mahasiswa->StatusKP;
																			echo "	</td>";
																			echo "  <td>";
																			echo "    <button type='button' class='btn btn-primary' 
																						data-toggle='modal' data-target='#myModal' data-form='/adminKP/getMahasiswa/".$mahasiswa->NIM."'>
																						Ubah
																						</button>";
																			echo "    <button type='button' class='btn btn-danger' 
																						data-toggle='modal' data-target='#myModal2' data-form='/adminKP/resetMahasiswa/".$mahasiswa->NIM."'>
																						Reset
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
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Data Mahasiswa</h4>
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
                <h4 class="modal-title" id="myModalLabel">Reset Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
								<form id='hapusForm' method='POST' action='<?php echo base_url(); ?>adminKP/resetMahasiswa'>
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
				
				<!-- Modal  3-->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" 	aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-data" id="form-data3">
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div> -->
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
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
		 $(document).ready( function () {
      $('#mahasiswa_data').DataTable();
  } );
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<script>
$(document).ready(function(){

 load_data();
 function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>MahasiswaController/fetch",
			method:"POST",
			success:function(data){
				$('#mahasiswa_data').html(data);
			}
		})
	}

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  	$.ajax({
   url:"<?php echo base_url(); ?>MahasiswaController/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    load_data();
    alert(data);
   }
  })
 });

});
</script>