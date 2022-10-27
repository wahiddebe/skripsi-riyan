<?php

class InstruksiKerjaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("InstruksiKerja");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showListInstruksiKerja()
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

                $InstruksiKerjaList = $this->InstruksiKerja->GetAllData();
                $data['list'] = $InstruksiKerjaList;
                $this->load->view('Admin/adminInstruksiKerjaView', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $InstruksiKerjaList = $this->InstruksiKerja->GetAllData();
                $data['list'] = $InstruksiKerjaList;
                $this->load->view('AdminKP/adminInstruksiKerjaView', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $InstruksiKerjaList = $this->InstruksiKerja->GetAllData();
                $data['list'] = $InstruksiKerjaList;
                $this->load->view('AdminMagang/adminInstruksiKerjaView', $data);
            } elseif ($this->session->userdata['role'] == 'mahasiswa') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $InstruksiKerjaList = $this->InstruksiKerja->GetAllData();
                $data['list'] = $InstruksiKerjaList;
                $this->load->view('Mahasiswa/mahasiswaInstruksiKerjaView', $data);
            }
        }
    }

    public function getInstruksiKerja()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "admin") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["InstruksiKerja"] = $this->InstruksiKerja->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('Admin/PopUpContent/KelolaInstruksiKerja', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminKP") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["InstruksiKerja"] = $this->InstruksiKerja->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminKP/PopUpContent/KelolaInstruksiKerja', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminMagang") {
                $id = (int)$this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["InstruksiKerja"] = $this->InstruksiKerja->getDataByID($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminMagang/PopUpContent/KelolaInstruksiKerja', $data, true);
                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitInstruksiKerja()
    {
        $data = [];
        if ($this->input->post('IdInstruksi') != '') {
            $IdInstruksi = $this->input->post('IdInstruksi');
            $InstruksiKerja = $this->InstruksiKerja->getDataByID($IdInstruksi);
            if ($InstruksiKerja != null) {
                $InstruksiKerja->Judul = $this->input->post('judul');
                $oldLink = $InstruksiKerja->File;
                $InstruksiKerja->File = $this->uploadFile($this->input->post('judul'));
                if ($InstruksiKerja->File == '') {
                    $InstruksiKerja->File = $oldLink;
                }

                //update
                $this->InstruksiKerja->update($IdInstruksi, $InstruksiKerja);

                //set data
                $data['event'] = 'mengubah';
                $data['Judul'] = $InstruksiKerja->Judul;
            }
        } else {
            //data SOP
            $InstruksiKerja = array(
                'Judul' => $this->input->post('judul'),
                'TanggalPembuatan' => date("d/m/Y"),
                'File' => $this->uploadFile($this->input->post('judul'))
            );

            //simpan
            $this->InstruksiKerja->insert($InstruksiKerja);

            //set data
            $data['event'] = "menambah";
            $data['Judul'] = $InstruksiKerja['Judul'];
        }

        //send data
        $data['success'] = true;
        $this->session->set_flashdata('message', $data);
        if ($this->session->userdata['username'] == "admin") {
            redirect('admin/InstruksiKerja');
        } elseif ($this->session->userdata['username'] == "adminKP") {
            redirect('adminKP/InstruksiKerja');
        } elseif ($this->session->userdata['username'] == "adminMagang") {
            redirect('adminMagang/InstruksiKerja');
        }
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'InstruksiKerja';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'InstruksiKerja';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'InstruksiKerja';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusInstruksiKerja()
    {
        if ($this->input->post('id') != null) {
            $IdInstruksi = $this->input->post('id');
            $InstruksiKerja = $this->InstruksiKerja->getDataByID($IdInstruksi);
            if ($InstruksiKerja != null) {
                //delete
                $this->InstruksiKerja->delete($IdInstruksi);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['Judul'] = $InstruksiKerja->Judul;
                $this->session->set_flashdata('message', $data);

                if ($this->session->userdata['username'] == "admin") {
                    redirect('admin/InstruksiKerja');
                } elseif ($this->session->userdata['username'] == "adminKP") {
                    redirect('adminKP/InstruksiKerja');
                } elseif ($this->session->userdata['username'] == "adminMagang") {
                    redirect('adminMagang/InstruksiKerja');
                }
            }
        }
    }

    private function uploadFile($judul)
    {
        //inisialisasi fungsi upload
        $path = './images/InstruksiKerja/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 1000;
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
