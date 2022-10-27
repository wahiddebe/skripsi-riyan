<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi KP</title>
	<link rel="icon" type="image/png" href="html/images/logo_undip.png"/>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./html/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./html/vendors/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./html/css/form-style.css">

    <?php $this->load->view('template/headerCSS'); ?>
</head>

<body>
    <div class="super_container"> 
        
        <!-- Header Section -->
        <?php $this->load->view('template/header'); ?>

        <div>
            <div class="container">
                <div class="row">
					<div class="register_section d-flex flex-column">

						<?php 
							if(isset($success))
							{
								if($success)
								{
								?>
									<div class="row">
										<div class="col">
											<div class="alert alert-success">
													<strong>Data <?php echo $event ?> berhasil disimpan!</strong>
											</div>
										</div>
									</div>
							<?php
								}
							}
						?>

						<div class="row">
							<div class="col-lg-6">
								<div class="register_content ">
									<div class="row">
										<div class="col">
											<div class="section_title text-center">
												<h1>Data SOP KP</h1>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<table>
												<tbody>
													<tr>
														<th>SOP Pendaftaran KP</th>
														<td><?php 
															if($sop->File != null)
															{
																echo "<a target='_blank' href='".$sop->File."'>".$sop->file."_SOP.pdf"."</a>";
															} 
															else echo "-"; 
														?></td>
													</tr>
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
 <!-- Header Section -->
 <?php $this->load->view('template/footer'); ?>
    </div>

    <!-- JS -->
    <script src="./html/vendors/jquery/jquery.min.js"></script>
    <script src="./html/vendors/nouislider/nouislider.min.js"></script>
    <script src="./html/vendors/wnumb/wNumb.js"></script>
    <script src="./html/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./html/vendors/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="./html/js/form-main.js"></script>
    <?php $this->load->view('template/footerCSS'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>