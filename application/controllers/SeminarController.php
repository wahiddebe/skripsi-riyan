<?php

class SeminarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("Seminar");
        $this->load->model("Mahasiswa");
        $this->load->model("TugasAkhir");
        $this->load->model("Dosen");
        $this->load->model("User");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function showFormDaftarSeminar()
    {
        if (isset($this->session->userdata['logged_in'])) {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
            //ambil data tugas akhir
            $tugasAkhir = $this->TugasAkhir->getDataByNIM($mahasiswa->NIM);

            //masukin ke variabel untuk dikirim ke view
            $data['mahasiswa'] = $mahasiswa;
            if ($tugasAkhir != null) {
                $data['tugasAkhir'] = $tugasAkhir;
                $data['Status'] = '';
                if ($tugasAkhir->Status != '') {
                    $data['Status'] = $tugasAkhir->Status;
                }
            }
            $data['isSuccess'] = false;
            $this->load->view("form/formSeminar", $data);
        } else {
            redirect('login');
        }
    }

    public function showListSeminar()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'TU') {
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
                    $Seminarapprove = $this->Seminar->getAllApproved();
                    $data['list'] = $Seminarapprove;
                    $this->load->view('TU/TUSeminarView', $data);
                } else {
                    $SeminarNonApprove = $this->Seminar > getAllNonApprove();
                    $data['list'] = $SeminarNonApprove;
                    $this->load->view('TU/TUView', $data);
                }
            }
        }
    }

    public function getListSeminarNonApprove()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'TU') {
                $seminar = $this->Seminar->getAllDataNonApprove();
                $data = [];
                if ($seminar != null) {
                    $data['list'] = $seminar;
                }
                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                //send data
                $this->load->view('TU/TUView', $data);
            }
        }
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'TU') {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'Seminar';
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusSeminar()
    {
        if ($this->input->post('id') != null) {
            $idSeminar = $this->input->post('id');
            $Seminar = $this->Seminar->getDataByID($idSeminar);
            if ($Seminar != null) {
                //delete
                $this->Seminar->delete($idSeminar);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $Seminar->NIM;
                $this->session->set_flashdata('data', $data);

                redirect('TU/Seminar/approve');
            }
        }
    }

    public function getSeminar()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "TU") {
                $id = (int)$this->uri->segment('3');
                $data["seminar"] = $this->Seminar->getDataByID($id);
                $data["dosen"] = $dosen = $this->Dosen->getAllData();
                $data["isSuccess"] = false;
                if ($this->uri->segment('4') == 'ubah') {
                    $htmlText = $this->load->view('TU/PopUpContent/KelolaSeminar', $data, true);
                } else {
                    $htmlText = $this->load->view('TU/PopUpContent/PersetujuanSeminar', $data, true);
                }

                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitSeminar()
    {
        if ($this->input->post('idSeminar') != null) {
            $idSeminar = (int)$this->input->post('idSeminar');
            $seminar = $this->Seminar->getDataByID($idSeminar);
            if ($seminar != null) {
                $seminar->DosenPenguji1 = $this->input->post('dosen1');
                $seminar->DosenPenguji2 = $this->input->post('dosen2');
                $seminar->Jam = $this->input->post('jam');
                $seminar->Lokasi = $this->input->post('lokasi');
                $seminar->Status = $this->input->post('status');
                //set tanggal
                $date = DateTime::createFromFormat('Y-m-d', $this->input->post('tanggal'));
                $newDate = $date->format('d/m/Y');
                $seminar->TanggalSeminar = $newDate;

                //update
                $this->Seminar->update($idSeminar, $seminar);

                //send data
                $data['success'] = true;
                $data['NIM'] = $seminar->NIM;
                $data['event'] = 'menyetujui';
                $this->session->set_flashdata('data', $data);

                if ($this->uri->segment('3') == 'ubah') {
                    redirect('TU/Seminar/approve');
                } else {
                    redirect('TU');
                }
            }
        }
    }

    public function saveSeminar()
    {

        if ($this->input->post('NIM') != null && $this->input->post('IdTA') != null) {
            $NIM = $this->input->post('NIM');
            $IdTA = $this->input->post('IdTA');
            $path = './images/Seminar/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;

            //data Seminar
            $dataSeminar = array(
                'IdTA' => $IdTA,
                'TanggalDaftar' => date("d/m/Y"),
                'NIM' => $NIM,
            );

            //data upload lembar daftar
            $config['file_name'] = $NIM . "_LembarDaftar.pdf";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('pendaftaran')) {
                $dataSeminar['LembarDaftar']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload lembar bimbingan
            $config['file_name'] = $NIM . "_Bimbingan.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bimbingan')) {
                $dataSeminar['LembarBimbingan']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload lembar draft
            $config['file_name'] = $NIM . "_Draft.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('draft')) {
                $dataSeminar['LembarDraft']  = $config['upload_path'] . $config['file_name'];
            }
            //data TA
            $tugasAkhir = $this->TugasAkhir->getDataByNIM($NIM);
            if ($tugasAkhir != null) {
                $tugasAkhir->Judul = $this->input->post('Judul');
            }

            //simpan data seminar dan TA
            $this->Seminar->insert($dataSeminar);
            $this->TugasAkhir->update($tugasAkhir->IdTA, $tugasAkhir);

            //send data
            $data['isSuccess'] = true;
            $data['event'] =  'seminar';
            $this->session->set_flashdata('data', $data);

            redirect('mahasiswa');
        }
    }

    public function showJadwalSeminarTA()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'dosen') {
                //get username dosen
                $idDosen = $this->session->userdata['username'];
                $data = [];
                //get data TA
                $listSeminar = $this->Seminar->getDataByDosen($idDosen);
                if ($listSeminar != null) {
                    foreach ($listSeminar as $item) {
                        //mahasiswa
                        $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
                        if ($mahasiswa != null) {
                            $item->Nama = $mahasiswa->Nama;
                            $item->Foto = $mahasiswa->Foto;
                        }
                        //ambil data tugas akhir
                        $tugasAkhir = $this->TugasAkhir->getDataByNIM($item->NIM);
                        if ($tugasAkhir != null) {
                            $item->Judul = $tugasAkhir->Judul;
                        }
                    }

                    $data['list'] = $listSeminar;
                }

                $data['event'] = 'Seminar';
                $this->load->view('Dosen/DosenJadwalView', $data);
            }
        }
    }
}
