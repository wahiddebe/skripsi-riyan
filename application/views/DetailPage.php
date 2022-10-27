<!DOCTYPE html>
<html lang="en">
<head>
<title>Course - News Post</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../html/styles/bootstrap4/bootstrap.min.css">
<link href="../html/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../html/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../html/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../html/styles/news_post_styles.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->
	<?php $this->load->view('template/header'); ?>

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo "../".$berita->gambar_berita?>)"></div>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">

				<!-- News Post Column -->

				<div class="col-lg-12">

					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                    <?php
                      $hari = substr($berita->tanggal_berita,0,2);
                      $bulan = (int)substr($berita->tanggal_berita,4,2);
                      $bulan_kalimat = date("M",mktime(0,0,0, $bulan, 10));

                      echo "<div>".$hari."</div>";
                      echo "<div>".$bulan_kalimat."</div>";
                     ?>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
                    <?php
  										echo "<a href='#'>".$berita->judul_berita."</a>";
                    ?>
									</div>
								</div>
							</div>
              <?php
                //content section
                echo $berita->deskripsi_berita;
              ?>
					  </div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php $this->load->view('template/footer'); ?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="../html/styles/bootstrap4/popper.js"></script>
<script src="../html/styles/bootstrap4/bootstrap.min.js"></script>
<script src="../html/plugins/greensock/TweenMax.min.js"></script>
<script src="../html/plugins/greensock/TimelineMax.min.js"></script>
<script src="../html/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../html/plugins/greensock/animation.gsap.min.js"></script>
<script src="../html/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../html/plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="../html/plugins/easing/easing.js"></script>
<script src="js/news_post_custom.js"></script>

</body>
</html>
