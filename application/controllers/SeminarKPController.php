<?php

class SeminarKPController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("SeminarKP");
        $this->load->model("Mahasiswa");
        $this->load->model("KP");
        $this->load->model("Dosen");
        $this->load->model("User");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function showFormDaftarSeminarKP()
    {
        if (isset($this->session->userdata['logged_in'])) {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
            //ambil data tugas akhir
            $kp = $this->KP->getDataByNIM($mahasiswa->NIM);

            //masukin ke variabel untuk dikirim ke view
            $data['mahasiswa'] = $mahasiswa;
            if ($kp != null) {
                $data['kp'] = $kp;
                $data['Status'] = '';
                if ($kp->Status != '') {
                    $data['Status'] = $kp->Status;
                }
            }
            $data['isSuccess'] = false;
            $this->load->view("form/formSeminarKP", $data);
        } else {
            redirect('login');
        }
    }

    public function showListSeminarKP()
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
                    $SeminarKPapprove = $this->SeminarKP->getAllApproved();
                    $data['list'] = $SeminarKPapprove;
                    $this->load->view('TU/TUSeminarKPView', $data);
                } else {
                    $SeminarKPNonApprove = $this->SeminarKP > getAllNonApprove();
                    $data['list'] = $SeminarKPNonApprove;
                    $this->load->view('TU/TUView', $data);
                }
            }
        }
    }

    public function getListSeminarKPNonApprove()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'TU') {
                $seminarKP = $this->SeminarKP->getAllDataNonApprove();
                $data = [];
                if ($seminarKP != null) {
                    $data['list'] = $seminarKP;
                }
                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                //send data
                $this->load->view('TU/TUKPView', $data);
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
                $data['tabel'] = 'SeminarKP';
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusSeminarKP()
    {
        if ($this->input->post('id') != null) {
            $idSeminarKP = $this->input->post('id');
            $SeminarKP = $this->SeminarKP->getDataByID($idSeminarKP);
            if ($SeminarKP != null) {
                //delete
                $this->SeminarKP->delete($idSeminarKP);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $SeminarKP->NIM;
                $this->session->set_flashdata('data', $data);

                redirect('TU/SeminarKP/approve');
            }
        }
    }

    public function getSeminarKP()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "TU") {
                $id = (int)$this->uri->segment('3');
                $data["seminarKP"] = $this->SeminarKP->getDataByID($id);
                $kp = $this->KP->getDataByID($data["seminarKP"]->IdKP);
                $data["dosen"] = $this->Dosen->getDataBy($kp->DosenPembimbing);
                $data["isSuccess"] = false;
                $data['test'] = $this->uri->segment('4');
                if ($this->uri->segment('4') == 'ubah') {
                    $htmlText = $this->load->view('TU/PopUpContent/KelolaSeminarKP', $data, true);
                } else {
                    $htmlText = $this->load->view('TU/PopUpContent/PersetujuanSeminarKP', $data, true);
                }

                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitSeminarKP()
    {
        if ($this->input->post('idSeminar') != null) {
            $idSeminarKP = (int)$this->input->post('idSeminar');
            $seminarKP = $this->SeminarKP->getDataByID($idSeminarKP);
            if ($seminarKP != null) {
                // $seminarKP->DosenPenguji1 = $this->input->post('dosen1');
                $seminarKP->Jam = $this->input->post('jam');
                $seminarKP->Lokasi = $this->input->post('lokasi');
                $seminarKP->Status = $this->input->post('status');
                //set tanggal
                $date = DateTime::createFromFormat('Y-m-d', $this->input->post('tanggal'));
                $newDate = $date->format('d/m/Y');
                $seminarKP->TanggalSeminarKP = $newDate;

                //update
                $this->SeminarKP->update($idSeminarKP, $seminarKP);

                //update status
                $mahasiswa = $this->Mahasiswa->getDataByID($seminarKP->NIM);
                if ($this->input->post('status') == 'Lulus') {
                    $this->ubahBebanDosenKP($mahasiswa, -1);
                    $mahasiswa->StatusKP = 'Lulus';
                } else if ($mahasiswa->StatusKP == 'Lulus' && $this->input->post('status') != $mahasiswa->StatusKP) {
                    $this->ubahBebanDosenKP($mahasiswa, 1);
                    $mahasiswa->StatusKP = 'Aktif';
                }
                $this->Mahasiswa->update($seminarKP->NIM, $mahasiswa);


                //send data
                $data['success'] = true;
                $data['NIM'] = $seminarKP->NIM;
                $data['event'] = 'menyetujui';
                $this->session->set_flashdata('data', $data);

                if ($this->uri->segment('3') == 'ubah') {
                    redirect('TU/SeminarKP/approve');
                } else {
                    redirect('TU/KP');
                }
            }
        }
    }

    public function saveSeminarKP()
    {

        if ($this->input->post('NIM') != null && $this->input->post('IdKP') != null) {
            $NIM = $this->input->post('NIM');
            $IdKP = $this->input->post('IdKP');
            $path = './images/SeminarKP/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;

            //data SeminarKP
            $dataSeminarKP = array(
                'IdKP' => $IdKP,
                'TanggalDaftar' => date("d/m/Y"),
                'NIM' => $NIM,
            );

            //data upload lembar bimbingan
            $config['file_name'] = $NIM . "_Bimbingan.pdf";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bimbingan')) {
                $dataSeminarKP['LembarBimbingan']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload lembar draft
            $config['file_name'] = $NIM . "_Draft.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('draft')) {
                $dataSeminarKP['LembarDraft']  = $config['upload_path'] . $config['file_name'];
            }
            //data KP
            $kp = $this->KP->getDataByNIM($NIM);
            if ($kp != null) {
                $kp->Judul = $this->input->post('Judul');
            }

            //simpan data seminarKP dan KP
            $this->SeminarKP->insert($dataSeminarKP);
            $this->KP->update($kp->IdKP, $kp);

            //send data
            $data['isSuccess'] = true;
            $data['event'] =  'seminarKP';
            $this->session->set_flashdata('data', $data);

            redirect('mahasiswa');
        }
    }

    public function showJadwalSeminarKPTA()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'dosen') {
                //get username dosen
                $idDosen = $this->session->userdata['username'];
                $data = [];
                //get data TA
                $listSeminarKP = $this->SeminarKP->getDataByDosen($idDosen);
                if ($listSeminarKP != null) {
                    foreach ($listSeminarKP as $item) {
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

                    $data['list'] = $listSeminarKP;
                }

                $data['event'] = 'SeminarKP';
                $this->load->view('Dosen/DosenJadwalView', $data);
            }
        }
    }
    public function ubahBebanDosenKP($mahasiswa, $nilai)
    {
        $kp = $this->KP->getDataByNIM($mahasiswa->NIM);
        if ($kp != null) {
            if ($kp->DosenPembimbing != "") {
                $dosen1 = $this->Dosen->getDataBy($kp->DosenPembimbing);
                if ($dosen1 != null) {
                    $dosen1->BebanKP = $dosen1->BebanKP + $nilai;
                    $this->Dosen->update($dosen1->KodeDosen, $dosen1);
                }
            }
        }
    }
}
