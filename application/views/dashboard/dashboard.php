<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Admin Dashboard</title>
    <!-- Main styles for this application-->
    <link href="./html/css/style.css" rel="stylesheet">
    <link href="./html/css/bootstrap.min.css" rel="stylesheet">
    <link href="./html/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./html/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="./html/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="./html/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="./html/styles/contact_responsive.css">
  </head>

  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    
    <!-- Header menu -->
    <?php $this->load->view('template/dashboardHeader'); ?>

    <div class="app-body">
      
      <!-- Dashboard sideBar -->
      <?php $this->load->view('template/dashboardSideBar') ?>

      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Form1</li>
          <!-- Breadcrumb Menu-->
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <!-- /.row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Form 1</div>
                  <div class="card-body">
                    <!-- /.row-->
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th>No</th>
                          <th>Pengisi Data</th>
                          <th>Tanggal Pengumpulan</th>
                          <th>Jam Pengumpulan</th>
                          <th>Detail Form</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                        $index = 1; 
                        foreach($dataForm as $item)
                        {
                          echo "<tr>";
                          echo "  <td>";
                          echo "    <div>".$index."</div>";
                          echo "  </td>";
                          echo "  <td>";
                          echo "    <div>".$item->pengisi."</div>";
                          echo "  </td>";

                          //set tanggal dan jam
                          $currentDate = DateTime::createFromFormat('m-d-Y H:i:s',$item->tanggal_form);
                          $newDateString = $currentDate->format('d M Y');
                          $newTimeString = $currentDate->format('H:i');

                          echo "  <td>";
                          echo "    <div>".$newDateString."</div>";
                          echo "  </td>";
                          echo "  <td>";
                          echo "    <div>".$newTimeString."</div>";
                          echo "  </td>";
                          echo "  <td>";
                          echo "    <button type='button' class='btn btn-primary btn-lg' 
                                    data-toggle='modal' data-target='#myModal' data-form='getForm1/". $item->id_form1."'>
                                      Lihat Detail
                                    </button>";
                          echo "  </td>";
                          echo "</tr>";
                          $index++;
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="form-data" id="form-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>                  

      </main>
    </div>
    
    <!-- dashboard footer -->
    <footer class="app-footer">
    <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
    </div>
    </footer>
    
    <script src="./html/js/jquery-3.2.1.min.js"></script>
    <script src="./html/js/bootstrap.min.js"></script>
    <script src="./html/js/main.js"></script>
  </body>
</html>
