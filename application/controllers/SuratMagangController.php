<?php

class SuratMagangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("SuratMagang");
        $this->load->model("Mahasiswa");
        $this->load->model("Dosen");
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showformSuratMagang()
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
            $this->load->view("form/formSuratMagang", $data);
        } else {
            redirect('login');
        }
    }

    public function hapusSuratMagang()
    {

        if ($this->input->post('id') != null) {
            $idMagang = $this->input->post('id');
            $SuratMagang = $this->SuratMagang->getDataByID($idMagang);
            $NIM = $SuratMagang->NIM;
            if ($SuratMagang != null) {
                //delete
                if ($SuratMagang->SuratMagang1 != "" || $SuratMagang->SuratMagang1 != null) {
                    unlink($SuratMagang->SuratMagang1);
                }
                if ($SuratMagang->SuratPersetujuan1 != "" || $SuratMagang->SuratPersetujuan1 != null) {
                    unlink($SuratMagang->SuratPersetujuan1);
                }
                if ($SuratMagang->SuratMagang2 != "" || $SuratMagang->SuratMagang2 != null) {
                    unlink($SuratMagang->SuratMagang2);
                }
                if ($SuratMagang->SuratPersetujuan2 != "" || $SuratMagang->SuratPersetujuan2 != null) {
                    unlink($SuratMagang->SuratPersetujuan2);
                }
                if ($SuratMagang->SuratMagang3 != "" || $SuratMagang->SuratMagang3 != null) {
                    unlink($SuratMagang->SuratMagang3);
                }
                if ($SuratMagang->SuratPersetujuan3 != "" || $SuratMagang->SuratPersetujuan3 != null) {
                    unlink($SuratMagang->SuratPersetujuan3);
                }
                if ($SuratMagang->SuratMagang4 != "" || $SuratMagang->SuratMagang4 != null) {
                    unlink($SuratMagang->SuratMagang4);
                }
                if ($SuratMagang->SuratPersetujuan4 != "" || $SuratMagang->SuratPersetujuan4 != null) {
                    unlink($SuratMagang->SuratPersetujuan4);
                }
                if ($SuratMagang->SuratMagang5 != "" || $SuratMagang->SuratMagang5 != null) {
                    unlink($SuratMagang->SuratMagang5);
                }
                if ($SuratMagang->SuratPersetujuan5 != "" || $SuratMagang->SuratPersetujuan5 != null) {
                    unlink($SuratMagang->SuratPersetujuan5);
                }
                $this->SuratMagang->delete($idMagang);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $NIM;
                $this->session->set_flashdata('data', $data);

                if ($this->uri->segment('3') == 'surat') {
                    redirect('adminMagang/SuratMagang/approve');
                } else {
                    redirect('adminMagang/PerusahaanMagang/approve');
                }
            }
        }
    }

    public function showDataHapus()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'adminMagang') {
                $id = $this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $jenis = $this->uri->segment('5');
                $data['event'] = 'menghapus';
                if ($jenis == 'surat') {
                    $data['tabel'] = 'SuratMagang';
                } else {
                    $data['tabel'] = 'Perusahaan Magang';
                }

                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20', ' ', $nama);
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function getSuratKP()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "adminKP") {
                $id = (int)$this->uri->segment('3');
                $data["SuratKP"] = $this->SuratKP > getDataByID($id);
                $data["dosen"] = $dosen = $this->Dosen->getAllData();
                $data['dosen1'] = $this->uri->segment('4');
                $data['dosen2'] = $this->uri->segment('5');
                if ($this->uri->segment('6') == 'approve') {
                    $data['isApprove']  = true;
                    $data['msgButton'] = 'Ubah';
                } else {
                    $data['isApprove']  = false;
                    $data['msgButton'] = 'Setujui';
                }
                $data["isSuccess"] = false;
                $htmlText = $this->load->view('AdminKP/PopUpContent/PersetujuanKP', $data, true);
                echo $htmlText;
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function showListSuratMagang()
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
                    $SuratMagangApprove = $this->SuratMagang->getAllApproved();
                    $data['list'] = $SuratMagangApprove;
                    $this->load->view('AdminMagang/adminSuratMagangView', $data);
                } else {
                    $SuratMagangNonApprove = $this->SuratMagang->getAllNonApproved();
                    $data['list'] = $SuratMagangNonApprove;
                    $this->load->view('AdminMagang/index', $data);
                }
            }
        }
    }

    public function showListPerusahaanMagang()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'adminMagang') {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if ($approvalData != null) {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                $SuratMagangList = $this->SuratMagang->GetAllData();
                $data['list'] = $SuratMagangList;
                $this->load->view('AdminMagang/adminPerusahaanMagangView', $data);
            }
        }
    }

    public function submitSuratKP()
    {
        if ($this->input->post('IdKP') != null) {
            $IdKP = (int)$this->input->post('IdKP');
            $SuratKP = $this->SuratKP->getDataByID($IdKP);
            if ($SuratKP != null) {

                //update
                $this->SuratKP->update($IdKP, $SuratKP);

                //send data
                $data['success'] = true;
                $data['NIM'] = $SuratKP->NIM;
                $data['event'] = 'mengubah';
                $this->session->set_flashdata('data', $data);

                if ($isApprove) {
                    redirect('adminKP/KP/approve');
                } else {
                    redirect('adminKP/KP/nonApprove');
                }
            }
        }
    }


    public function saveSuratMagang()
    {
        if ($this->input->post('NIM') != null) {
            $NIM = $this->input->post('NIM');
            $path = './images/SuratMagang/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|jpg|png';
            $config['max_size'] = 1000;

            //data KP
            $dataSuratMagang = array(
                'NIM' => $NIM,
                'Perusahaan_1' => $this->input->post('Perusahaan_1'),
                'Bidang_Perusahaan1' => $this->input->post('Bidang_Perusahaan1'),
                'Perusahaan_2' => $this->input->post('Perusahaan_2'),
                'Bidang_Perusahaan2' => $this->input->post('Bidang_Perusahaan2'),
                'Perusahaan_3' => $this->input->post('Perusahaan_3'),
                'Bidang_Perusahaan3' => $this->input->post('Bidang_Perusahaan3'),
                'Perusahaan_4' => $this->input->post('Perusahaan_4'),
                'Bidang_Perusahaan4' => $this->input->post('Bidang_Perusahaan4'),
                'Perusahaan_5' => $this->input->post('Perusahaan_5'),
                'Bidang_Perusahaan5' => $this->input->post('Bidang_Perusahaan5'),
            );

            //data upload Surat KP 1
            $config['file_name'] = $NIM . "_ProposalMagang1.pdf";
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('SuratMagang1')) {
                $dataSuratMagang['SuratMagang1']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload surat KP 2
            $config['file_name'] = $NIM . "_ProposalMagang2.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratMagang2')) {
                $dataSuratMagang['SuratMagang2']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload surat KP 3
            $config['file_name'] = $NIM . "_ProposalMagang3.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratMagang3')) {
                $dataSuratMagang['SuratMagang3']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload surat KP 4
            $config['file_name'] = $NIM . "_ProposalMagang4.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratMagang4')) {
                $dataSuratMagang['SuratMagang4']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload surat KP 5
            $config['file_name'] = $NIM . "_ProposalMagang5.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratMagang5')) {
                $dataSuratMagang['SuratMagang5']  = $config['upload_path'] . $config['file_name'];
            }

            //data upload SuratPersetujuan1

            //data upload SuratPersetujuan1
            $config['file_name'] = $NIM . "_SuratPersetujuanMagang1.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratPersetujuan1')) {
                $dataSuratMagang['SuratPersetujuan1']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload SuratPersetujuan2
            $config['file_name'] = $NIM . "_SuratPersetujuanMagang2.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratPersetujuan2')) {
                $dataSuratMagang['SuratPersetujuan2']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload SuratPersetujuan3
            $config['file_name'] = $NIM . "_SuratPersetujuanMagang3.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratPersetujuan3')) {
                $dataSuratMagang['SuratPersetujuan3']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload SuratPersetujuan4
            $config['file_name'] = $NIM . "_SuratPersetujuanMagang4.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratPersetujuan4')) {
                $dataSuratMagang['SuratPersetujuan4']  = $config['upload_path'] . $config['file_name'];
            }
            //data upload SuratPersetujuan5
            $config['file_name'] = $NIM . "_SuratPersetujuanMagang5.pdf";
            $this->upload->initialize($config);
            if ($this->upload->do_upload('SuratPersetujuan5')) {
                $dataSuratMagang['SuratPersetujuan5']  = $config['upload_path'] . $config['file_name'];
            }
            //simpan data mahasiswa dan TA
            $this->SuratMagang->insert($dataSuratMagang);

            $data['isSuccess'] = true;
            $data['event'] = 'SuratMagang';
            $this->session->set_flashdata('data', $data);

            redirect('mahasiswa');
        }
    }
}
