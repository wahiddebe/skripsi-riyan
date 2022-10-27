<?php

class SidangController extends CI_Controller
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

    public function showFormDaftarSidang()
    {
        if (isset($this->session->userdata['logged_in'])) {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
            //ambil data tugas akhir
            $tugasAkhir = $this->TugasAkhir->getDataByNIM($mahasiswa->NIM);
            if ($tugasAkhir != null) {
                //ambil data seminar
                $seminar = $this->Seminar->getDataByTAandNIM($tugasAkhir->IdTA, $mahasiswa->NIM);

                //masukin ke variabel untuk dikirim ke view
                $data['mahasiswa'] = $mahasiswa;
                $data['statusSeminar'] = '';
                if ($tugasAkhir != null && $seminar != null) {
                    $data['tugasAkhir'] = $tugasAkhir;
                    $data['statusSeminar'] = $seminar->Status;
                }
            }
            $data['isSuccess'] = false;
            $this->load->view("form/formSidang", $data);
        } else {
            redirect('login');
        }
    }

    public function showListSidang()
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
                    $Sidangapprove = $this->Sidang->getAllApproved();
                    $data['list'] = $Sidangapprove;
                    $this->load->view('TU/TUSidangTAView', $data);
                } else {
                    $SidangNonApprove = $this->Sidang > getAllNonApproved();
                    $data['list'] = $SidangNonApprove;
                    $this->load->view('TU/TUView', $data);
                }
            }
        }
    }

    public function getListSidangNonApprove()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'TU') {
                $Sidang = $this->Sidang->getAllDataNonApprove();
                $data = [];
                if ($Sidang != null) {
                    foreach ($Sidang as $item) {
                        $tugasAkhir = $this->TugasAkhir->getDataByID($item->IdTA);
                        if ($tugasAkhir != null) {
                            $item->Judul = $tugasAkhir->Judul;
                        }
                    }
                    $data['list'] = $Sidang;
                }
                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                //send data
                $this->load->view('TU/TUSidangView', $data);
            }
        }
    }

    public function getSidang()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "TU") {
                $id = (int)$this->uri->segment('3');
                $status = $this->uri->segment('4');
                $data["sidang"] = $this->Sidang->getDataByID($id);
                $data["isSuccess"] = false;

                $htmlText = '';
                if ($status == 'ubah') {
                    $data['dosen'] = $this->Dosen->GetAllData();
                    $htmlText = $this->load->view('TU/PopUpContent/KelolaSidang', $data, true);
                } else {
                    $htmlText = $this->load->view('TU/PopUpContent/PersetujuanSidang', $data, true);
                }

                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitSidang()
    {
        if ($this->input->post('idSidang') != null) {
            $idSidang = (int)$this->input->post('idSidang');
            $Sidang = $this->Sidang->getDataByID($idSidang);
            if ($Sidang != null) {
                $status = $this->uri->segment('3');

                //get seminar jika tambah
                if ($status == 'tambah') {
                    $data['event'] = 'menyetujui';
                    $seminar = $this->Seminar->getDataByTAandNIM($Sidang->IdTA, $Sidang->NIM);
                    if ($seminar != null) {
                        $Sidang->DosenPenguji1 = $seminar->DosenPenguji1;
                        $Sidang->DosenPenguji2 = $seminar->DosenPenguji2;
                    }
                } else {
                    $data['event'] = 'mengubah';
                    $Sidang->DosenPenguji1 = $this->input->post('DosenPenguji1');
                    $Sidang->DosenPenguji2 = $this->input->post('DosenPenguji2');
                }

                $Sidang->Jam = $this->input->post('jam');
                $Sidang->Lokasi = $this->input->post('lokasi');
                $Sidang->Status = $this->input->post('status');

                //set tanggal
                $date = DateTime::createFromFormat('Y-m-d', $this->input->post('tanggal'));
                $newDate = $date->format('d/m/Y');
                $Sidang->TanggalSidang = $newDate;

                //cek jika status lulus
                if ($Sidang->Status == 'Lulus') {
                    $mahasiswa = $this->Mahasiswa->getDataByID($Sidang->NIM);
                    if ($mahasiswa != null) {
                        $mahasiswa->Status = 'Lulus';
                        $tugasAkhir = $this->TugasAkhir->getDataByNIM($Sidang->NIM);
                        if ($tugasAkhir != null) {
                            $dosen1 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing1);
                            if ($dosen1 != null) {
                                $dosen1->Beban = $dosen1->Beban - 1;
                                $dosen1->TotalBeban = $dosen1->TotalBeban - 1;
                                $this->Dosen->update($dosen1->KodeDosen, $dosen1);
                            }
                            $dosen2 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing2);
                            if ($dosen2 != null) {
                                $dosen2->Beban2 = $dosen2->Beban2 - 1;
                                $dosen2->TotalBeban = $dosen2->TotalBeban - 1;
                                $this->Dosen->update($dosen2->KodeDosen, $dosen2);
                            }
                        }
                        $this->Mahasiswa->update($mahasiswa->NIM, $mahasiswa);
                    }
                }

                //update
                $this->Sidang->update($idSidang, $Sidang);

                //send data
                $data['success'] = true;
                $data['NIM'] = $Sidang->NIM;
                $this->session->set_flashdata('data', $data);

                if ($status == 'tambah') {

                    redirect('TU/persetujuanSidang');
                } else {

                    redirect('TU/Sidang/approve');
                }
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
                $data['tabel'] = 'Sidang';
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            }
        }
    }

    public function hapusSidang()
    {
        if ($this->input->post('id') != null) {
            $idSidang = $this->input->post('id');
            $sidang = $this->Sidang->getDataByID($idSidang);
            if ($sidang != null) {
                //delete
                $this->Sidang->delete($idSidang);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $sidang->NIM;
                $this->session->set_flashdata('data', $data);

                redirect('TU/Sidang/approve');
            }
        }
    }

    public function saveSidang()
    {
        if ($this->input->post('NIM') != null && $this->input->post('IdTA') != null) {
            $NIM = $this->input->post('NIM');
            $IdTA = $this->input->post('IdTA');
            $path = './images/Sidang/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2000;

            //data Sidang
            $dataSidang = array(
                'IdTA' => $IdTA,
                'TanggalDaftar' => date("d/m/Y"),
                'NIM' => $NIM,
            );

            //data upload lembar transkrip
            $config['file_name'] = $NIM . "_Transkrip.pdf";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkrip')) {
                $dataSidang['Transkrip']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload lembar bebas pustaka
            $config['file_name'] = $NIM . "_BebasPustaka.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bebasPustaka')) {
                $dataSidang['BebasPustaka']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload lembar daftar sidang
            $config['file_name'] = $NIM . "_LembarDaftar.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('daftarSidang')) {
                $dataSidang['DaftarSidang']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload lembar kehadiran Seminar
            $config['file_name'] = $NIM . "_Kehadiran.pdf";
            $this->upload->initialize($config);;
            if ($this->upload->do_upload('kehadiran')) {
                $dataSidang['KehadiranSeminar']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload lembar toefl
            $config['file_name'] = $NIM . "_Toefl.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('toefl')) {
                $dataSidang['Toefl']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload lembar Draft
            $config['file_name'] = $NIM . "_Draft.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('draft')) {
                $dataSidang['Draft']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload lembar bimbingan
            $config['file_name'] = $NIM . "_Bimbingan.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bimbingan')) {
                $dataSidang['LembarBimbingan']  = $config['upload_path'] . $config['file_name'];
            }

            //data TA
            $tugasAkhir = $this->TugasAkhir->getDataByNIM($NIM);
            if ($tugasAkhir != null) {
                $tugasAkhir->Judul = $this->input->post('Judul');
            }

            //simpan data Sidang dan TA
            $this->Sidang->insert($dataSidang);
            $this->TugasAkhir->update($tugasAkhir->IdTA, $tugasAkhir);


            //send data
            $data['isSuccess'] = true;
            $data['event'] =  'Sidang';
            $this->session->set_flashdata('data', $data);

            redirect('mahasiswa');
        }
    }
    public function showJadwalSidangTA()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'dosen') {
                //get username dosen
                $idDosen = $this->session->userdata['username'];
                $data = [];
                //get data TA
                $listSidang = $this->Sidang->getDataByDosen($idDosen);
                if ($listSidang != null) {
                    $list = [];
                    foreach ($listSidang as $item) {
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
                            array_push($list, $item);
                        }
                    }

                    $data['list'] = $list;
                }

                $data['event'] = 'Sidang';
                $this->load->view('Dosen/DosenJadwalView', $data);
            }
        }
    }
}
