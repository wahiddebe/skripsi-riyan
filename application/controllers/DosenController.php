<?php

class DosenController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("Dosen");
        $this->load->model("User");
        $this->load->model("TugasAkhir");
        $this->load->model("Seminar");
        $this->load->model("Sidang");
        $this->load->model("Mahasiswa");
        $this->load->model("KP");
        $this->load->model("Magang");
    }

    public function showListDosen()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $dosenList = $this->Dosen->getAllData();
                $data['list'] = $dosenList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['KodeDosen'] = $submitData['KodeDosen'];
                }

                $this->load->view('Admin/adminDosenView', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $dosenList = $this->Dosen->getAllData();
                $data['list'] = $dosenList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['KodeDosen'] = $submitData['KodeDosen'];
                }

                $this->load->view('AdminKP/adminDosenView', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $dosenList = $this->Dosen->getAllData();
                $data['list'] = $dosenList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['KodeDosen'] = $submitData['KodeDosen'];
                }

                $this->load->view('AdminMagang/adminDosenView', $data);
            }
        }
    }

    public function getDosen()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "admin") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["dosen"] = $this->Dosen->getDataBy($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('Admin/PopUpContent/KelolaDosen', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminKP") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["dosen"] = $this->Dosen->getDataBy($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminKP/PopUpContent/KelolaDosen', $data, true);
                echo $htmlText;
            } elseif ($this->session->userdata['username'] == "adminMagang") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != -1) {
                    $data["dosen"] = $this->Dosen->getDataBy($id);
                }

                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminMagang/PopUpContent/KelolaDosen', $data, true);
                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitDosen()
    {
        $KodeDosen = $this->input->post('KodeDosenLama');
        if ($this->input->post('KodeDosenLama') != '') {
            $KodeDosenBaru = $this->input->post('KodeDosenBaru');
            $dosen = $this->Dosen->getDataBy($KodeDosen);
            if ($dosen != null) {
                $dosen->Nama = $this->input->post('Nama');

                //check jika kode dosen berubah
                if ($KodeDosen != $KodeDosenBaru) {
                    $dosen->KodeDosen = $KodeDosenBaru;

                    //get data user
                    $user = $this->User->getDataByUsername($KodeDosen);
                    if ($user != null) {
                        $user->Username = $KodeDosenBaru;
                        $this->User->Update($KodeDosen, $user);
                    }
                }

                //update
                $this->Dosen->update($KodeDosen, $dosen);

                //set response
                $data['event'] = "mengubah";
            }
        } else {
            //set data
            $KodeDosen = $this->input->post('KodeDosenBaru');
            $dosen = array(
                'KodeDosen' => $KodeDosen,
                'Nama' => $this->input->post('Nama'),
                'Beban' => 0
            );

            //buat akun baru
            $user = array(
                'Username' => $this->input->post('KodeDosenBaru'),
                'Password' => $this->input->post('KodeDosenBaru'),
                'Role' => 'dosen'
            );

            //simpan
            $this->Dosen->insert($dosen);
            $this->User->insert($user);

            //set response
            $data['event'] = "menambah";
        }

        //send data
        $data['success'] = true;

        $data['KodeDosen'] = $KodeDosen;
        $this->session->set_flashdata('message', $data);


        if ($this->session->userdata['username'] == "admin") {
            redirect('admin/dosen');
        } elseif ($this->session->userdata['username'] == "adminKP") {
            redirect('adminKP/dosen');
        } elseif ($this->session->userdata['username'] == "adminMagang") {
            redirect('adminMagang/dosen');
        }
    }

    public function hapusDosen()
    {
        if ($this->input->post('id') != null) {
            $KodeDosen = $this->input->post('id');
            $dosen = $this->Dosen->getDataBy($KodeDosen);
            if ($dosen != null) {
                //delete
                $this->Dosen->delete($KodeDosen);

                //get data user
                $user = $this->User->getDataByUsername($KodeDosen);
                if ($user != null) {
                    $this->User->delete($user->Username);
                }

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['KodeDosen'] = $KodeDosen;
                $this->session->set_flashdata('message', $data);

                if ($this->session->userdata['username'] == "admin") {
                    redirect('admin/dosen');
                } elseif ($this->session->userdata['username'] == "adminKP") {
                    redirect('adminKP/dosen');
                } elseif ($this->session->userdata['username'] == "adminMagang") {
                    redirect('adminMagang/dosen');
                }
            }
        }
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $id = $this->uri->segment('3');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'dosen';
                $data['kolom'] = 'kode dosen';
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $id = $this->uri->segment('3');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'dosen';
                $data['kolom'] = 'kode dosen';
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $id = $this->uri->segment('3');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'dosen';
                $data['kolom'] = 'kode dosen';
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function index()
    {
        $data = array(
            'title'        => 'Data Dosen',
            'list'    => $this->Dosen->get_all_dosen()
        );
        $this->load->view('Admin/adminDosenView', $data);
    }

    public function detailDosen()
    {

        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $id = $this->uri->segment('4');
                $dosenList = $this->TugasAkhir->getDataByDosenDetail($id);
                $data['list'] = $dosenList;
                $data['kode'] = $id;

                $this->load->view('Admin/adminDosenDetailView', $data);
            }
        }
    }
}
