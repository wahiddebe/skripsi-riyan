<?php

class BerkasMagangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("BerkasMagang");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showListBerkasMagang()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'adminMagang') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $BerkasMagangList = $this->BerkasMagang->GetAllData();
                $data['list'] = $BerkasMagangList;
                $this->load->view('AdminMagang/adminBerkasMagangView', $data);
            } elseif ($this->session->userdata['role'] == 'mahasiswa') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $BerkasMagangList = $this->BerkasMagang->GetAllData();
                $data['list'] = $BerkasMagangList;
                $this->load->view('Mahasiswa/mahasiswaBerkasMagangView', $data);
            }
        }
    }

    public function getBerkasMagang()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "adminMagang") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["BerkasMagang"] = $this->BerkasMagang->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminMagang/PopUpContent/KelolaBerkasMagang', $data, true);
                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitBerkasMagang()
    {
        $data = [];
        if ($this->input->post('IdBerkas') != '') {
            $IdBerkas = $this->input->post('IdBerkas');
            $BerkasMagang = $this->BerkasMagang->getDataByID($IdBerkas);
            if ($BerkasMagang != null) {
                $BerkasMagang->Judul = $this->input->post('judul');
                $oldLink = $BerkasMagang->File;
                $BerkasMagang->File = $this->uploadFile($this->input->post('judul'));
                if ($BerkasMagang->File == '') {
                    $BerkasMagang->File = $oldLink;
                }

                //update
                $this->BerkasMagang->update($IdBerkas, $BerkasMagang);

                //set data
                $data['event'] = 'mengubah';
                $data['Judul'] = $BerkasMagang->Judul;
            }
        } else {
            //data BerkasMagang
            $BerkasMagang = array(
                'Judul' => $this->input->post('judul'),
                'TanggalPembuatan' => date("d/m/Y"),
                'File' => $this->uploadFile($this->input->post('judul'))
            );

            //simpan
            $this->BerkasMagang->insert($BerkasMagang);

            //set data
            $data['event'] = "menambah";
            $data['Judul'] = $BerkasMagang['Judul'];
        }

        //send data
        $data['success'] = true;
        $this->session->set_flashdata('message', $data);
        redirect('adminMagang/BerkasMagang');
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'adminMagang') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'BerkasMagang';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusBerkasMagang()
    {
        if ($this->input->post('id') != null) {
            $IdBerkas = $this->input->post('id');
            $BerkasMagang = $this->BerkasMagang->getDataByID($IdBerkas);
            if ($BerkasMagang != null) {
                //delete
                $this->BerkasMagang->delete($IdBerkas);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['Judul'] = $BerkasMagang->Judul;
                $this->session->set_flashdata('message', $data);

                redirect('adminMagang/BerkasMagang');
            }
        }
    }

    private function uploadFile($judul)
    {
        //inisialisasi fungsi upload
        $path = './images/BerkasMagang/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 25000;
        $config['file_name'] = date("d-m-Y") . time() . $judul . ".pdf";
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $fileName = str_replace(" ", "_", $config['file_name']);
            return $config['upload_path'] . $fileName;
        } else {
            return '';
        }

        return '';
    }
}
