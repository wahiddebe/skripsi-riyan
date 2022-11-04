<!-- Header -->

<header class="header d-flex flex-row">
  <div class="header_content d-flex flex-row align-items-center">
    <!-- Logo -->
    <div class="logo_container d-flex flex-row">
      <div class="logo">
        <img src="<?php echo base_url(); ?>/html/images/logo_undip.png" alt="">
      </div>
      <div class="logo_title">
        <h2>Universitas Diponegoro<br />Departemen Teknik Industri<h2>
      </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main_nav_container">
      <div class="main_nav">
        <ul class="main_nav_list">
          <?php
          if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'mahasiswa') {
            echo "<li class='main_nav_item'><a href='" . base_url() . "mahasiswa" . "'>Beranda</a></li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Pendaftaran</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "mahasiswa/FormKP" . "'>KP</a>";
            echo "<a href='" . base_url() . "mahasiswa/FormSeminarKP" . "'>Seminar KP</a>";
            echo "<a href='" . base_url() . "mahasiswa/FormMagang" . "'>Magang</a>";
            echo "<a href='" . base_url() . "mahasiswa/FormTA" . "'>Tugas Akhir</a>";
            echo "<a href='" . base_url() . "mahasiswa/FormSeminar" . "'>Seminar Tugas Akhir</a>";
            echo "<a href='" . base_url() . "mahasiswa/FormSidang" . "'>Sidang Tugas Akhir</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Pengajuan</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "mahasiswa/formSuratKP" . "'>Surat KP</a>";
            echo "<a href='" . base_url() . "mahasiswa/formSuratMagang" . "'>Surat Kerja Magang</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Informasi</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "mahasiswa/SOP" . "'>SOP</a>";
            echo "<a href='" . base_url() . "mahasiswa/InstruksiKerja" . "'>Instruksi Kerja</a>";
            echo "<a href='" . base_url() . "mahasiswa/BerkasKP" . "'>Dokumen KP</a>";
            echo "<a href='" . base_url() . "mahasiswa/BerkasTA" . "'>Dokumen TA</a>";
            echo "<a href='" . base_url() . "mahasiswa/BerkasMagang" . "'>Dokumen Magang</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "ubahPassword" . "'>Ubah Password</a></li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "mahasiswa/Note" . "'>Note</a></li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'TU') {
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Persetujuan</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "TU/KP" . "'>Persetujuan Seminar KP</a>";
            echo "<a href='" . base_url() . "TU" . "'>Persetujuan Seminar TA</a>";
            echo "<a href='" . base_url() . "TU/persetujuanSidang" . "'>Persetujuan Sidang TA</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Kelola Data</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "TU/SeminarKP/approve" . "'>Seminar KP</a>";
            echo "<a href='" . base_url() . "TU/Seminar/approve" . "'>Seminar TA</a>";
            echo "<a href='" . base_url() . "TU/Sidang/approve" . "'>Sidang TA</a>";
            // echo "<a href='".base_url()."form/formPeminjamanAlat"."'>TU</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "ubahPassword" . "'>Ubah Password</a></li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'dosen') {
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Bimbingan</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "Dosen/BimbinganTA" . "'>Bimbingan TA</a>";
            echo "<a href='" . base_url() . "Dosen/BimbinganMagang" . "'>Bimbingan Magang</a>";
            echo "<a href='" . base_url() . "Dosen/BimbinganKP" . "'>Bimbingan KP</a>";
            // echo "<a href='".base_url()."form/formPeminjamanAlat"."'>Seminar</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Jadwal</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "Dosen/jadwalSeminarTA" . "'>Seminar TA</a>";
            echo "<a href='" . base_url() . "Dosen/jadwalSidangTA" . "'>Sidang TA</a>";
            echo "<a href='" . base_url() . "Dosen/jadwalSeminarKP" . "'>Seminar KP</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "ubahPassword" . "'>Ubah Password</a></li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'admin') {
            echo "<li class='main_nav_item'><a href='" . base_url() . "admin/tugasAkhir/nonApprove" . "'>Beranda</a></li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Persetujuan</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "admin/persetujuan" . "'>Persetujuan Seminar TA</a>";
            echo "<a href='" . base_url() . "admin/persetujuan/persetujuanSidang" . "'>Persetujuan Sidang TA</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Kelola Data</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "admin/mahasiswa" . "'>Mahasiswa</a>";
            echo "<a href='" . base_url() . "admin/dosen" . "'>Dosen</a>";
            echo "<a href='" . base_url() . "admin/tugasAkhir/approve" . "'>Tugas Akhir</a>";
            echo "<a href='" . base_url() . "admin/persetujuan/Seminar/approve" . "'>Seminar TA</a>";
            echo "<a href='" . base_url() . "admin/persetujuan/Sidang/approve" . "'>Sidang TA</a>";
            echo "<a href='" . base_url() . "admin/SOP" . "'>SOP</a>";
            echo "<a href='" . base_url() . "admin/InstruksiKerja" . "'>Instruksi Kerja</a>";
            echo "<a href='" . base_url() . "admin/BerkasTA" . "'>Dokumen TA</a>";
            // echo "<a href='".base_url()."form/formPeminjamanAlat"."'>Seminar</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'adminKP') {
            echo "<li class='main_nav_item'><a href='" . base_url() . "adminKP/KP/nonApprove" . "'>Beranda</a></li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Persetujuan</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "adminKP/persetujuan/KP" . "'>Persetujuan Seminar KP</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Kelola Data</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "adminKP/mahasiswa" . "'>Mahasiswa</a>";
            echo "<a href='" . base_url() . "adminKP/dosen" . "'>Dosen</a>";
            echo "<a href='" . base_url() . "adminKP/KP/approve" . "'>KP</a>";
            echo "<a href='" . base_url() . "adminKP/SuratKP/approve" . "'>Surat KP</a>";
            echo "<a href='" . base_url() . "adminKP/persetujuan/SeminarKP/approve" . "'>Seminar KP</a>";
            echo "<a href='" . base_url() . "adminKP/SOP" . "'>SOP</a>";
            echo "<a href='" . base_url() . "adminKP/InstruksiKerja" . "'>Instruksi Kerja</a>";
            echo "<a href='" . base_url() . "adminKP/BerkasKP" . "'>Dokumen KP</a>";
            // echo "<a href='".base_url()."form/formPeminjamanAlat"."'>Seminar</a>";
            echo "</div>";

            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Informasi</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "adminKP/PerusahaanKP/approve" . "'>Perusahaan KP</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else if (isset($_SESSION['logged_in']) && $_SESSION['role'] == 'adminMagang') {
            echo "<li class='main_nav_item'><a href='" . base_url() . "adminMagang/Magang/nonApprove" . "'>Beranda</a></li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Kelola Data</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "adminMagang/mahasiswa" . "'>Mahasiswa</a>";
            echo "<a href='" . base_url() . "adminMagang/dosen" . "'>Dosen</a>";
            echo "<a href='" . base_url() . "adminMagang/Magang/approve" . "'>Magang</a>";
            echo "<a href='" . base_url() . "adminMagang/SuratMagang/approve" . "'>Surat Magang</a>";
            echo "<a href='" . base_url() . "adminMagang/SOP" . "'>SOP</a>";
            echo "<a href='" . base_url() . "adminMagang/InstruksiKerja" . "'>Instruksi Kerja</a>";
            echo "<a href='" . base_url() . "adminMagang/BerkasMagang" . "'>Dokumen Magang</a>";
            // echo "<a href='".base_url()."form/formPeminjamanAlat"."'>Seminar</a>";
            echo "</div>";

            echo "</li>";
            echo "<li class='main_nav_item'>";
            echo "<a href='#'>Informasi</a>";
            echo "<div class='main_nav_sub'>";
            echo "<a href='" . base_url() . "adminMagang/PerusahaanMagang/approve" . "'>Perusahaan Magang</a>";
            echo "</div>";
            echo "</li>";
            echo "<li class='main_nav_item'><a href='" . base_url() . "logout" . "'>Logout</a></li>";
          } else {
            echo "<li class='main_nav_item'><a href='" . base_url() . "login" . "'>Login</a></li>";
          }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</header>

<!-- Menu -->
<div class="menu_container menu_mm">

  <!-- Menu Close Button -->
  <div class="menu_close_container">
    <div class="menu_close"></div>
  </div>

  <!-- Menu Items -->
  <div class="menu_inner menu_mm">
    <div class="menu menu_mm">
      <ul class="menu_list menu_mm">
        <li class="menu_item menu_mm"><a href="#">Home</a></li>
        <li class="menu_item menu_mm"><a href="#">About us</a></li>
        <li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
        <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
        <li class="menu_item menu_mm"><a href="news.html">News</a></li>
        <li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
      </ul>

      <!-- Menu Social -->

      <div class="menu_social_container menu_mm">
        <ul class="menu_social menu_mm">
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
        </ul>
      </div>

      <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
    </div>
  </div>
</div>