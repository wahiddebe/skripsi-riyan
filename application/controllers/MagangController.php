<?php

class MagangController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //load model
    $this->load->model("Magang");
    $this->load->model("Mahasiswa");
    $this->load->model("Dosen");
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('session');
    date_default_timezone_set("Asia/Jakarta");
  }

  public function showFormDaftarMagang()
  {
    if (isset($this->session->userdata['logged_in'])) {
      //ambil data mahasiswa
      $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
      //ambil data dosen
      $dosen = $this->Dosen->getAllData();
      //masukin ke variabel untuk dikirim ke view
      $data['mahasiswa'] = $mahasiswa;
      $data['dosen'] = $dosen;
      $data['isSuccess'] = false;
      $this->load->view("form/formMagang", $data);
    } else {
      redirect('login');
    }
  }

  public function getMagang()
  {

    if (isset($this->session->userdata['logged_in'])) {
      if ($this->session->userdata['username'] == "adminMagang") {
        $id = (int)$this->uri->segment('3');
        $data["Magang"] = $this->Magang->getDataByID($id);
        $data["dosen"] = $dosen = $this->Dosen->getAllData();
        $totalSegment = count($this->uri->segment_array());
        $data['dosen1'] = $this->uri->segment('4');
        if ($totalSegment == 4) {
          $data['dosen2'] = $this->uri->segment('5');
          $data['isApprove']  = true;
          $data['msgButton'] = 'Ubah';
        } else {
          $data['isApprove']  = false;
          $data['msgButton'] = 'Simpan';
        }

        $data["isSuccess"] = false;
        $htmlText = $this->load->view('AdminMagang/PopUpContent/PersetujuanMagang', $data, true);
        echo $htmlText;
      } else {
        echo "<p>Data not found</p>";
      }
    } else {
      echo "<p>Please log in first</p>";
    }
  }

  public function showListMagang()
  {
    if (isset($this->session->userdata['logged_in'])) {
      if ($this->session->userdata['role'] == 'adminMagang') {
        $status = $this->uri->segment('3');
        $data = [];

        //jika ada notifikasi
        $approvalData = $this->session->flashdata('data');
        if ($approvalData != null) {
          $data['success'] = $approvalData['success'];
          $data['NIM'] = $approvalData['NIM'];
          $data['event'] = $approvalData['event'];
        }

        //cek status data yg mau diambil
        if ($status ==  'approve') {
          $MagangApprove = $this->Magang->getAllApproved();
          foreach ($MagangApprove as $item) {
            $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
            if ($mahasiswa != null) {
              $item->StatusMagang = $mahasiswa->StatusMagang;
            } else {
              $item->StatusMagang = "";
            }
          }
          $data['list'] = $MagangApprove;
          $this->load->view('AdminMagang/adminMagangView', $data);
        } else {
          $MagangNonApprove = $this->Magang->getAllNonApproved();
          $data['list'] = $MagangNonApprove;
          $this->load->view('AdminMagang/index', $data);
        }
      }
    }
  }

  public function showDataHapus()
  {
    if (isset($this->session->userdata['logged_in'])) {
      if ($this->session->userdata['role'] == 'adminMagang') {
        $id = (int)$this->uri->segment('3');
        $nama = $this->uri->segment('4');
        $data['event'] = 'menghapus';
        $data['tabel'] = 'Magang';
        $data['kolom'] = 'NIM';
        $data['nama'] = str_replace('%20', ' ', $nama);
        $data['id'] = $id;

        $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
      }
    }
  }

  public function hapusMagang()
  {
    if ($this->input->post('id') != null) {
      $idMagang = $this->input->post('id');
      $Magang = $this->Magang->getDataByID($idMagang);
      if ($Magang != null) {
        //delete
        $this->Magang->delete($idMagang);

        //send data
        $data['success'] = true;
        $data['event'] = "menghapus";
        $data['NIM'] = $Magang->NIM;
        $this->session->set_flashdata('data', $data);

        redirect('adminMagang/Magang/approve');
      }
    }
  }

  public function submitMagang()
  {
    if ($this->input->post('IdMagang') != null) {
      $IdMagang = (int)$this->input->post('IdMagang');
      $Magang = $this->Magang->getDataByID($IdMagang);
      $isApprove = false;
      if ($Magang != null) {
        if ($Magang->DosenPembimbing != $this->input->post('dosen1') && $Magang->DosenPembimbing != "") {
          $isApprove = true;
          $dosenLama = $this->Dosen->getDataBy($Magang->DosenPembimbing);
          $dosenLama->BebanMagang = $dosenLama->BebanMagang - 1;

          $dosenBaru = $this->Dosen->getDataBy($this->input->post('dosen1'));
          $dosenBaru->BebanMagang = $dosenBaru->BebanMagang + 1;

          //update
          $this->Dosen->update($dosenLama->KodeDosen, $dosenLama);
          $this->Dosen->update($dosenBaru->KodeDosen, $dosenBaru);
        }

        $Magang->DosenPembimbing = $this->input->post('dosen1');
        $Magang->Program_Magang = $this->input->post('Program_Magang');

        if ($this->input->post('persetujuan') != "") {
          $Magang->Status = $this->input->post('persetujuan');
          $dosen1 = $this->Dosen->getDataBy($Magang->DosenPembimbing);

          $dosen1->BebanMagang = $dosen1->BebanMagang + 1;

          //update
          $this->Dosen->update($Magang->DosenPembimbing, $dosen1);
        }

        //update
        $this->Magang->update($IdMagang, $Magang);

        //send data
        $data['success'] = true;
        $data['NIM'] = $Magang->NIM;
        $data['event'] = 'mengubah';
        $this->session->set_flashdata('data', $data);

        if ($isApprove) {
          redirect('adminMagang/Magang/approve');
        } else {
          redirect('adminMagang/Magang/nonApprove');
        }
      }
    }
  }


  public function saveMagang()
  {
    if ($this->input->post('NIM') != null) {
      $NIM = $this->input->post('NIM');
      $path = './images/Magang/';
      //inisialisasi fungsi upload
      //mkdir($path,0755,true);
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'pdf|jpg|png';
      $config['max_size'] = 1000;

      //data Magang
      $dataMagang = array(
        'NIM' => $NIM,
        'Email' => $this->input->post('Email'),
        'Program_Magang' => $this->input->post('Program_Magang'),
        'Nama_Perusahaan' => $this->input->post('Nama_Perusahaan'),
        'Tanggal_Magang' => $this->input->post('Tanggal_Magang'),
        'UsulDosen' => $this->input->post('dosen1'),
      );
      //data Mahasiswa
      $mahasiswa = $this->Mahasiswa->getDataByID($NIM);
      if ($mahasiswa != null) {
        $mahasiswa->StatusMagang = "Aktif";
      }


      //data upload transkip
      $config['file_name'] = $NIM . "_Transkip.pdf";
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('Transkip')) {
        $dataMagang['Transkip']  = $config['upload_path'] . $config['file_name'];
      }

      //data upload surat penerimaan perusahaan
      $config['file_name'] = $NIM . "_SuratPenerimaanPerusahaan.pdf";
      $this->upload->initialize($config);
      if ($this->upload->do_upload('SuratPenerimaanPerusahaan')) {
        $dataMagang['SuratPenerimaanPerusahaan']  = $config['upload_path'] . $config['file_name'];
      }

      //data upload SuratRekomendasiFakultas
      $config['file_name'] = $NIM . "_SuratRekomendasiFakultas.pdf";
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('SuratRekomendasiFakultas')) {
        $dataMagang['SuratRekomendasiFakultas']  = $config['upload_path'] . $config['file_name'];
      }
      //data upload SPTJM
      $config['file_name'] = $NIM . "_SPTJM.pdf";
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('SPTJM')) {
        $dataMagang['SPTJM']  = $config['upload_path'] . $config['file_name'];
      }
      //simpan data mahasiswa dan TA
      $this->Magang->insert($dataMagang);

      $data['isSuccess'] = true;
      $data['event'] = 'Magang';
      $this->session->set_flashdata('data', $data);

      redirect('mahasiswa');
    }
  }
  public function showBimbinganMagang()
  {
    if (isset($this->session->userdata['logged_in'])) {
      if ($this->session->userdata['role'] == 'dosen') {
        //get username dosen
        $idDosen = $this->session->userdata['username'];
        //get data TA
        $listMagang = $this->Magang->getDataByDosen($idDosen);
        if ($listMagang != null) {
          foreach ($listMagang as $item) {
            $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
            if ($mahasiswa != null) {
              $item->Nama = $mahasiswa->Nama;
              $item->Foto = $mahasiswa->Foto;
              $item->StatusMagang = $mahasiswa->StatusMagang;
            }
          }

          $data['list'] = $listMagang;
          $this->load->view('Dosen/DosenBimbinganMagangView', $data);
        } else {
          $this->load->view('Dosen/DosenBimbinganMagangView');
        }
      }
    }
  }
}
