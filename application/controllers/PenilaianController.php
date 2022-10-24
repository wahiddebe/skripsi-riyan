<?php

class PenilaianController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //load model
    $this->load->model("Sidang");
    $this->load->model("Seminar");
    $this->load->model("Mahasiswa");
    $this->load->model("TugasAkhir");
    $this->load->model("Penilaian");
    $this->load->model("Dosen");
    $this->load->model("User");
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function insert()
  {


    $Penguji = $this->session->userdata['username'];
    $IdSidang = $this->input->post('IdSidang');
    $Nilai = $this->input->post('Nilai');
    $Status = $this->input->post('Status');
    $path = './images/Sidang/';
    //inisialisasi fungsi upload
    //mkdir($path,0755,true);
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 5000;

    //data Sidang
    $datapenilaian = array(
      'IdSidang' => $IdSidang,
      'Penguji' => $Penguji,
      'Nilai' => $Nilai,
      'Status' => $Status,
    );

    //data upload TTD
    $TTD = $_FILES["TTD"]["name"];
    $file_ext = pathinfo($TTD, PATHINFO_EXTENSION);
    $config['file_name'] = $Penguji . "_TTD";
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('TTD')) {
      $datapenilaian['TTD']  = $config['upload_path'] . $config['file_name'] . "." . $file_ext;
    }

    //simpan data Penilaian
    $this->Penilaian->insert($datapenilaian);


    //send data
    $data['successp'] = true;
    $data['eventp'] =  'Penilaian';
    $this->session->set_flashdata('data', $data);

    redirect('Dosen/jadwalSidangTA');
  }

  public function getPenilaian()
  {
    if (isset($this->session->userdata['logged_in'])) {
      if ($this->session->userdata['role'] == "dosen") {
        $id = (int)$this->uri->segment('3');
        $data = [];
        $data["IdSidang"] = $id;

        $data["isSuccess"] = false;
        $htmlText = $this->load->view('Dosen/FormPenilaian', $data, true);
        echo $htmlText;
      }
    } else {
      echo "<p>Please log in first</p>";
    }
  }

  public function showPenilaian()
  {
    $IdSidang =
      (int)$this->uri->segment('3');
    $sidang = $this->Sidang->getDataById($IdSidang);
    $IdTA = $sidang->IdTA;
    $TA = $this->TugasAkhir->getDataById($IdTA);
    $mahasiswa = $this->Mahasiswa->getDataByID($TA->NIM);
    $penilaian = $this->Penilaian->getDataBySidang($IdSidang);
    $dosen = $this->Dosen->getDataBy($penilaian->Penguji);

    $data['NIM'] = $sidang->NIM;
    $data['Judul'] = $TA->Judul;
    $data['Nama'] = $mahasiswa->Nama;
    $data['Penguji'] = $dosen->Nama;
    $data['NIP'] = $dosen->NIP;
    $data['Status'] = $penilaian->Status;
    $data['Nilai'] = $penilaian->Nilai;
    $data['TTD'] = $penilaian->TTD;
    $tanggalsidang = $this->tgl_indo($sidang->TanggalSidang);
    $data['TanggalSidang'] = $tanggalsidang;
    $this->load->library('pdf');
    $html = $this->load->view('GeneratePdfView', $data, true);
    $this->pdf->createPDF($html, 'mypdf', false);
  }

  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('/', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' .
      $pecahkan[2];
  }
}
