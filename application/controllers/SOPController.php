<?php

class SOPController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("SOP");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showListSOP()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $SOPList = $this->SOP->GetAllData();
                $data['list'] = $SOPList;
                $this->load->view('Admin/adminSOPView', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $SOPList = $this->SOP->GetAllData();
                $data['list'] = $SOPList;
                $this->load->view('AdminKP/adminSOPView', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $SOPList = $this->SOP->GetAllData();
                $data['list'] = $SOPList;
                $this->load->view('AdminMagang/adminSOPView', $data);
            } elseif ($this->session->userdata['role'] == 'mahasiswa') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $SOPList = $this->SOP->GetAllData();
                $data['list'] = $SOPList;
                $this->load->view('Mahasiswa/mahasiswaSOPView', $data);
            }
        }
    }

    public function getSOP()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "admin") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["SOP"] = $this->SOP->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('Admin/PopUpContent/KelolaSOP', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminKP") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["SOP"] = $this->SOP->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminKP/PopUpContent/KelolaSOP', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminMagang") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["SOP"] = $this->SOP->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminMagang/PopUpContent/KelolaSOP', $data, true);
                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitSOP()
    {
        $data = [];
        if ($this->input->post('idSOP') != '') {
            $IdSOP = $this->input->post('idSOP');
            $SOP = $this->SOP->getDataByID($IdSOP);
            if ($SOP != null) {
                $SOP->Judul = $this->input->post('judul');
                $oldLink = $SOP->File;
                $SOP->File = $this->uploadFile($this->input->post('judul'));
                if ($SOP->File == '') {
                    $SOP->File = $oldLink;
                }

                //update
                $this->SOP->update($IdSOP, $SOP);

                //set data
                $data['event'] = 'mengubah';
                $data['Judul'] = $SOP->Judul;
            }
        } else {
            //data SOP
            $SOP = array(
                'Judul' => $this->input->post('judul'),
                'TanggalPembuatan' => date("d/m/Y"),
                'File' => $this->uploadFile($this->input->post('judul'))
            );

            //simpan
            $this->SOP->insert($SOP);

            //set data
            $data['event'] = "menambah";
            $data['Judul'] = $SOP['Judul'];
        }

        //send data
        $data['success'] = true;
        $this->session->set_flashdata('message', $data);
        if ($this->session->userdata['username'] == "admin") {
            redirect('admin/SOP');
        } elseif ($this->session->userdata['username'] == "adminKP") {
            redirect('adminKP/SOP');
        } elseif ($this->session->userdata['username'] == "adminMagang") {
            redirect('adminMagang/SOP');
        }
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'SOP';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'SOP';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'SOP';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusSOP()
    {
        if ($this->input->post('id') != null) {
            $idSOP = $this->input->post('id');
            $SOP = $this->SOP->getDataByID($idSOP);
            if ($SOP != null) {
                //delete
                $this->SOP->delete($idSOP);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['Judul'] = $SOP->Judul;
                $this->session->set_flashdata('message', $data);

                if ($this->session->userdata['username'] == "admin") {
                    redirect('admin/SOP');
                } elseif ($this->session->userdata['username'] == "adminKP") {
                    redirect('adminKP/SOP');
                } elseif ($this->session->userdata['username'] == "adminMagang") {
                    redirect('adminMagang/SOP');
                }
            }
        }
    }

    private function uploadFile($judul)
    {
        //inisialisasi fungsi upload
        $path = './images/SOP/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 1000;
        $config['file_name'] = date("d-m-Y") . time() . $judul .  ".pdf";
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
