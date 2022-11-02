<?php

class MahasiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("Mahasiswa");
        $this->load->model("TugasAkhir");
        $this->load->model("KP");
        $this->load->model("Magang");
        $this->load->model("Seminar");
        $this->load->model("SeminarKP");
        $this->load->model("Sidang");
        $this->load->model("Dosen");
        $this->load->model("User");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('excel');
        $this->load->library('pagination');
    }

    public function showBeranda()
    {
        if (isset($this->session->userdata['logged_in'])) {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);

            //ambil data tugas akhir
            $tugasAkhir = $this->TugasAkhir->getDataByNIM($mahasiswa->NIM);
            if ($tugasAkhir != null) {
                //ambil data dosen
                $dosen = array();
                $dosenUsul1 = $this->Dosen->getDataBy($tugasAkhir->DosenUsul1);
                $dosenUsul2 = $this->Dosen->getDataBy($tugasAkhir->DosenUsul2);
                //masukin data ke array
                array_push($dosen, $dosenUsul1);
                array_push($dosen, $dosenUsul2);
                if ($tugasAkhir->Pembimbing1 != null) {
                    $dosenPembimbing1 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing1);
                    array_push($dosen, $dosenPembimbing1);
                }
                if ($tugasAkhir->Pembimbing2 != null) {
                    $dosenPembimbing2 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing2);
                    array_push($dosen, $dosenPembimbing2);
                }
                $data['tugasAkhir'] = $tugasAkhir;
                $data['dosen'] = $dosen;
            }

            //ambil data kp
            $KP = $this->KP->getDataByNIM($mahasiswa->NIM);
            if ($KP != null) {
                //ambil data dosen
                $dosen = array();
                $UsulDosen1 = $this->Dosen->getDataBy($KP->UsulDosen1);
                $UsulDosen2 = $this->Dosen->getDataBy($KP->UsulDosen2);
                //masukin data ke array
                array_push($dosen, $UsulDosen1);
                array_push($dosen, $UsulDosen2);
                if ($KP->DosenPembimbing != null) {
                    $DosenPembimbing = $this->Dosen->getDataBy($KP->DosenPembimbing);
                    array_push($dosen, $DosenPembimbing);
                }
                $data['KP'] = $KP;
                $data['dosenKP'] = $dosen;
            }
            //ambil data magang
            $Magang = $this->Magang->getDataByNIM($mahasiswa->NIM);
            if ($Magang != null) {
                //ambil data dosen
                $dosen = array();
                $UsulDosen = $this->Dosen->getDataBy($Magang->UsulDosen);
                //masukin data ke array
                array_push($dosen, $UsulDosen);
                if ($Magang->DosenPembimbing != null) {
                    $DosenPembimbing = $this->Dosen->getDataBy($Magang->DosenPembimbing);
                    array_push($dosen, $DosenPembimbing);
                }
                $data['Magang'] = $Magang;
                $data['dosenMagang'] = $dosen;
            }
            //ambil data seminar
            $seminar = $this->Seminar->getDataByNIM($mahasiswa->NIM);
            if ($seminar != null) {
                $dosen = array();
                $dosenPenguji1 = $this->Dosen->getDataBy($seminar->DosenPenguji1);
                $dosenPenguji2 = $this->Dosen->getDataBy($seminar->DosenPenguji2);
                //masukin data ke array
                array_push($dosen, $dosenPenguji1);
                array_push($dosen, $dosenPenguji2);

                $data['seminar'] = $seminar;
                $data['dosenPenguji'] = $dosen;
            }
            //ambil data seminar KP
            $seminarKP = $this->SeminarKP->getDataByNIM($mahasiswa->NIM);
            if ($seminarKP != null) {
                $dosenkp = array();
                $KP = $this->KP->getDataByNIM($mahasiswa->NIM);
                $dosenPengujikp1 = $this->Dosen->getDataBy($KP->DosenPembimbing);
                //masukin data ke array
                array_push($dosenkp, $dosenPengujikp1);

                $data['seminarKP'] = $seminarKP;
                $data['dosenPengujikp'] = $dosenkp;
            }
            //ambil data sidang
            $sidang = $this->Sidang->getDataByNIM($mahasiswa->NIM);
            if ($sidang != null) {
                $dosen = array();
                $dosenPenguji1 = $this->Dosen->getDataBy($sidang->DosenPenguji1);
                $dosenPenguji2 = $this->Dosen->getDataBy($sidang->DosenPenguji2);
                //masukin data ke array
                array_push($dosen, $dosenPenguji1);
                array_push($dosen, $dosenPenguji2);

                $data['sidang'] = $sidang;
                $data['dosenPengujiSidang'] = $dosen;
            }

            $approvalData = $this->session->flashdata('data');
            if ($approvalData != null) {
                $data['success'] = $approvalData['isSuccess'];
                $data['event'] = $approvalData['event'];
            }


            //masukin ke variabel untuk dikirim ke view
            $data['mahasiswa'] = $mahasiswa;
            $this->load->view("index", $data);
        } else {
            redirect('login');
        }
    }

    public function showListMahasiswa()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $mahasiswaList = $this->Mahasiswa->getAllData();
                $data['list'] = $mahasiswaList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['NIM'] = $submitData['NIM'];
                }

                $this->load->view('Admin/adminMahasiswaView', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $mahasiswaList = $this->Mahasiswa->getAllData();
                $data['list'] = $mahasiswaList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['NIM'] = $submitData['NIM'];
                }

                $this->load->view('AdminKP/adminMahasiswaView', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $mahasiswaList = $this->Mahasiswa->getAllData();
                $data['list'] = $mahasiswaList;
                $submitData = $this->session->flashdata('message');
                if ($submitData != null) {
                    $data['success'] = $submitData['success'];
                    $data['event'] = $submitData['event'];
                    $data['NIM'] = $submitData['NIM'];
                }

                $this->load->view('AdminMagang/adminMahasiswaView', $data);
            }
        }
    }

    public function getMahasiswa()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['username'] == "admin") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != '-1') {
                    $data["mahasiswa"] = $this->Mahasiswa->getDataByID($id);
                    $data["isSuccess"] = false;
                    $htmlText = $this->load->view('Admin/PopUpContent/KelolaMahasiswa', $data, true);
                    echo $htmlText;
                } else {
                    $htmlText = $this->load->view('Admin/PopUpContent/TambahMahasiswa', $data, true);
                    echo $htmlText;
                }
            } elseif ($this->session->userdata['username'] == "adminKP") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != '-1') {
                    $data["mahasiswa"] = $this->Mahasiswa->getDataByID($id);
                    $data["isSuccess"] = false;
                    $htmlText = $this->load->view('AdminKP/PopUpContent/KelolaMahasiswa', $data, true);
                    echo $htmlText;
                } else {
                    $htmlText = $this->load->view('AdminKP/PopUpContent/TambahMahasiswa', $data, true);
                    echo $htmlText;
                }
            } elseif ($this->session->userdata['username'] == "adminMagang") {
                $id = $this->uri->segment('3');
                $data = [];
                if ($id != '-1') {
                    $data["mahasiswa"] = $this->Mahasiswa->getDataByID($id);
                    $data["isSuccess"] = false;
                    $htmlText = $this->load->view('AdminMagang/PopUpContent/KelolaMahasiswa', $data, true);
                    echo $htmlText;
                } else {
                    $htmlText = $this->load->view('AdminMagang/PopUpContent/TambahMahasiswa', $data, true);
                    echo $htmlText;
                }
            } else {
                echo "<p>Data not found</p>";
            }
        } else {
            echo "<p>Please log in first</p>";
        }
    }

    public function submitMahasiswa()
    {
        if ($this->input->post('NIM') != null) {
            $NIM = $this->input->post('NIM');
            $mahasiswa = $this->Mahasiswa->getDataByID($NIM);
            if ($mahasiswa != null) {
                $mahasiswa->Nama = $this->input->post('Nama');
                $date = DateTime::createFromFormat('Y-m-d', $this->input->post('TanggalLahir'));
                $newDate = $date->format('d/m/Y');
                $mahasiswa->TanggalLahir = $newDate;
                $mahasiswa->Email = $this->input->post('Email');
                $mahasiswa->NoTelepon = $this->input->post('NoTelepon');
                if ($this->input->post('NoTeleponOrtu') != null) {
                    $mahasiswa->NoTeleponOrtu = $this->input->post('NoTeleponOrtu');
                }
                if ($this->input->post('AlamatOrtu') != null) {
                    $mahasiswa->AlamatOrtu = $this->input->post('AlamatOrtu');
                }

                //status



                if ($this->session->userdata['username'] == "admin") {
                    if ($this->input->post('Status') == 'Lulus') {
                        $this->ubahBebanDosen($mahasiswa, -1);
                    } else if ($mahasiswa->Status == 'Lulus' && $this->input->post('Status') != $mahasiswa->Status) {
                        $this->ubahBebanDosen($mahasiswa, 1);
                    }

                    $mahasiswa->Status = $this->input->post('Status');
                } elseif ($this->session->userdata['username'] == "adminKP") {
                    if ($this->input->post('StatusKP') == 'Lulus') {
                        $this->ubahBebanDosenKP($mahasiswa, -1);
                    } else if ($mahasiswa->StatusKP == 'Lulus' && $this->input->post('StatusKP') != $mahasiswa->StatusKP) {
                        $this->ubahBebanDosenKP($mahasiswa, 1);
                    }
                    $mahasiswa->StatusKP = $this->input->post('StatusKP');
                } elseif ($this->session->userdata['username'] == "adminMagang") {
                    if ($this->input->post('StatusMagang') == 'Lulus') {
                        $this->ubahBebanDosenMagang($mahasiswa, -1);
                    } else if ($mahasiswa->StatusMagang == 'Lulus' && $this->input->post('StatusMagang') != $mahasiswa->StatusMagang) {
                        $this->ubahBebanDosenMagang($mahasiswa, 1);
                    }
                    $mahasiswa->StatusMagang = $this->input->post('StatusMagang');
                }
                //update
                $this->Mahasiswa->update($NIM, $mahasiswa);

                //set data
                $data['event'] = "mengubah";
            } else //data baru
            {
                $date = DateTime::createFromFormat('Y-m-d', $this->input->post('TanggalLahir'));
                $newDate = $date->format('d/m/Y');
                $mahasiswa = array(
                    'NIM' => $NIM,
                    'Nama' => $this->input->post('Nama'),
                    'TanggalLahir' => $newDate,
                    'Status' => '',
                    'StatusKP' => '',
                    'StatusMagang' => '',
                );

                //buat akun mahasiswa
                $user = array(
                    'Username' => $NIM,
                    'Password' => $NIM,
                    'Role' => 'mahasiswa'
                );

                //simpan
                $this->Mahasiswa->insert($mahasiswa);
                $this->User->insert($user);

                //set  data
                $data['event'] = "menambah";
            }

            //send data
            $data['success'] = true;

            $data['NIM'] = $NIM;
            $this->session->set_flashdata('message', $data);


            if ($this->session->userdata['username'] == "admin") {
                redirect('admin/mahasiswa');
            } elseif ($this->session->userdata['username'] == "adminKP") {
                redirect('adminKP/mahasiswa');
            } elseif ($this->session->userdata['username'] == "adminMagang") {
                redirect('adminMagang/mahasiswa');
            }
        }
    }

    public function showDataReset()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if ($this->session->userdata['role'] == 'admin') {
                $id = (int)$this->uri->segment('3');
                $data['event'] = 'mereset';
                $data['tabel'] = 'mahasiswa';
                $data['kolom'] = 'NIM';
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminKP') {
                $id = (int)$this->uri->segment('3');
                $data['event'] = 'mereset';
                $data['tabel'] = 'mahasiswa';
                $data['kolom'] = 'NIM';
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus', $data);
            } elseif ($this->session->userdata['role'] == 'adminMagang') {
                $id = (int)$this->uri->segment('3');
                $data['event'] = 'mereset';
                $data['tabel'] = 'mahasiswa';
                $data['kolom'] = 'NIM';
                $data['id'] = $id;

                $this->load->view('AdminMagang/PopUpContent/Hapus', $data);
            }
        }
    }

    public function resetMahasiswa()
    {
        if ($this->input->post('id') != null) {
            $NIM = $this->input->post('id');
            $mahasiswa = $this->Mahasiswa->getDataByID($NIM);
            if ($mahasiswa != null) {
                $mahasiswa->Email = '';
                $mahasiswa->NoTelepon = '';
                if ($mahasiswa->NoTeleponOrtu != '') {
                    $mahasiswa->NoTeleponOrtu = '';
                }
                if ($mahasiswa->AlamatOrtu != '') {
                    $mahasiswa->AlamatOrtu = '';
                }
                if ($mahasiswa->Foto != '') {
                    $mahasiswa->Foto = '';
                }
                if ($mahasiswa->KRS != '') {
                    $mahasiswa->KRS = '';
                }
                if ($mahasiswa->Transkrip != '') {
                    $mahasiswa->Transkrip = '';
                }
                if ($mahasiswa->PraBimbingan != '') {
                    $mahasiswa->PraBimbingan = '';
                }

                //hapus pengajuan TA
                $tugasAkhir = $this->TugasAkhir->getDataByNIM($NIM);
                if ($tugasAkhir != null) {
                    $this->TugasAkhir->delete($tugasAkhir->IdTA);
                }

                //hapus pengajuan KP
                $kp = $this->KP->getDataByNIM($NIM);
                if ($kp != null) {
                    $this->KP->delete($kp->IdKP);
                }


                //hapus pengajuan Magang
                $magang = $this->Magang->getDataByNIM($NIM);
                if ($magang != null) {
                    $this->Magang->delete($magang->IdMagang);
                }

                //update
                $this->Mahasiswa->update($NIM, $mahasiswa);


                //send data
                $data['success'] = true;
                $data['event'] = "mereset";
                $data['NIM'] = $mahasiswa->NIM;
                $this->session->set_flashdata('message', $data);


                if ($this->session->userdata['username'] == "admin") {
                    redirect('admin/mahasiswa');
                } elseif ($this->session->userdata['username'] == "adminKP") {
                    redirect('adminKP/mahasiswa');
                } elseif ($this->session->userdata['username'] == "adminMagang") {
                    redirect('adminMagang/mahasiswa');
                }
            }
        }
    }


    public function ubahBebanDosen($mahasiswa, $nilai)
    {
        $tugasAkhir = $this->TugasAkhir->getDataByNIM($mahasiswa->NIM);
        if ($tugasAkhir != null) {
            if ($tugasAkhir->Pembimbing1 != "" && $tugasAkhir->Pembimbing2 != "") {
                $dosen1 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing1);
                if ($dosen1 != null) {
                    $dosen1->Beban = $dosen1->Beban + $nilai;
                    $dosen1->TotalBeban = $dosen1->TotalBeban + $nilai;
                    $this->Dosen->update($dosen1->KodeDosen, $dosen1);
                }
                $dosen2 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing2);
                if ($dosen2 != null) {
                    $dosen2->Beban2 = $dosen2->Beban2 + $nilai;
                    $dosen2->TotalBeban = $dosen2->TotalBeban + $nilai;
                    $this->Dosen->update($dosen2->KodeDosen, $dosen2);
                }
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
    public function ubahBebanDosenMagang($mahasiswa, $nilai)
    {
        $magang = $this->Magang->getDataByNIM($mahasiswa->NIM);
        if ($magang != null) {
            if ($magang->DosenPembimbing != "") {
                $dosen1 = $this->Dosen->getDataBy($magang->DosenPembimbing);
                if ($dosen1 != null) {
                    $dosen1->BebanMagang = $dosen1->BebanMagang + $nilai;
                    $this->Dosen->update($dosen1->KodeDosen, $dosen1);
                }
            }
        }
    }





    function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $Nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $NIM = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $TanggalLahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $data[] = array(
                        'Nama'  => $Nama,
                        'NIM'   => $NIM,
                        'TanggalLahir'    => $TanggalLahir
                    );
                    //buat akun mahasiswa

                }
            }
            $this->Mahasiswa->import($data);
            echo 'Data Imported successfully';
        }
    }

    function importUser()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $Nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $NIM = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $TanggalLahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $Role = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $data[] = array(
                        'Username'  => $NIM,
                        'Password'   => $TanggalLahir,
                        'Role'    => $Role
                    );
                    //buat akun mahasiswa

                }
            }
            $this->User->import($data);
            echo 'Data Imported successfully';
        }
    }

    public function index()
    {
        $this->load->database();
        $jumlah_data = $this->Mahasiswa->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/MahasiswaController/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['mahasiswa'] = $this->Mahasiswa->data($config['per_page'], $from);
        $this->load->view('Admin/adminMahasiswaView', $data);
    }

    public function note()
    {
        $id =  $this->session->userdata['username'];
        $mahasiswa = $this->Mahasiswa->getDataByID($id);
        $kp = $this->KP->getDataByNIM($id);
        if ($kp != null) {
            $idkp = $kp->IdKP;
        } else {
            $idkp = null;
        }
        $seminarkp = $this->SeminarKP->getDataByTAandNIM($idkp, $id);
        $magang = $this->Magang->getDataByNIM($id);
        $ta = $this->TugasAkhir->getDataByNIM($id);
        if ($ta != null) {
            $seminarta = $this->Seminar->getDataByTAandNIM($ta->IdTA, $id);
            $sidang = $this->Sidang->getDataByTAandNIM($ta->IdTA, $id);
        } else {
            $seminarta = null;
            $sidang = null;
        }

        //kp
        if ($kp != null) {
            $statuskp = $kp->Status;
        } else {
            $statuskp = null;
        }
        if ($statuskp == "setuju") {
            $data['statuskp'] = "Anda terdaftar aktif melaksanakan kegiatan Kerja Praktek";
        } else {
            $data['statuskp'] = '';
        }

        if ($seminarkp != null) {
            $statusseminarkp = $seminarkp->TanggalSeminarKP;
        } else {
            $statusseminarkp = null;
        }

        if ($statusseminarkp != '') {
            $data['statusseminarkp'] = "Jadwal Seminar KP anda telah keluar dan dapat dilihat pada sistem";
        } else {
            $data['statusseminarkp'] = '';
        }
        if ($mahasiswa != null) {
            $statusluluskp = $mahasiswa->StatusKP;
        } else {
            $statusluluskp = null;
        }
        if ($statusluluskp == 'Lulus' && $seminarkp->Status == "Lulus") {
            $data['statusluluskp'] = "Anda telah menyelesaikan kegiatan Kerja Praktek";
        } else {
            $data['statusluluskp'] = '';
        }

        //magang
        if ($magang != null) {
            $statusmagang = $magang->Status;
        } else {
            $statusmagang = null;
        }
        if ($statusmagang == "setuju") {
            $data['statusmagang'] = "Anda terdaftar aktif melaksanakan kegiatan kerja Magang";
        } else {
            $data['statusmagang'] = '';
        }
        if ($mahasiswa != null) {
            $statuslulusmagang = $mahasiswa->StatusMagang;
        } else {
            $statuslulusmagang = null;
        }
        if ($statuslulusmagang == 'Lulus') {
            $data['statuslulusmagang'] = "Anda telah menyelesaikan kegiatan kerja Magang";
        } else {
            $data['statuslulusmagang'] = '';
        }

        //ta
        if ($ta != null) {
            $statusta = $ta->Status;
        } else {
            $statusta = null;
        }
        if ($statusta == "setuju") {
            $data['statusta'] = "Anda terdaftar aktif melaksanakan kegiatan Tugas Akhir ";
        } else {
            $data['statusta'] = '';
        }
        if (
            $seminarta != null
        ) {
            $statusseminarta = $seminarta->TanggalSeminar;
        } else {
            $statusseminarta = null;
        }
        if ($statusseminarta != '') {
            $data['statusseminarta'] = "Jadwal Seminar TA anda telah keluar dan dapat dilihat pada sistem";
        } else {
            $data['statusseminarta'] = '';
        }
        if (
            $sidang != null
        ) {
            $statussidangta = $sidang->TanggalSidang;
        } else {
            $statussidangta = null;
        }
        if ($statussidangta != '') {
            $data['statussidangta'] = "Jadwal Sidang TA anda telah keluar dan dapat dilihat pada sistem";
        } else {
            $data['statussidangta'] = '';
        }
        if (
            $mahasiswa != null
        ) {
            $statuslulusta = $mahasiswa->Status;
        } else {
            $statuslulusta = null;
        }
        if ($statuslulusta == 'Lulus' && $sidang->Status == "Lulus") {
            $data['statuslulusta'] = "Anda telah menyelesaikan kegiatan Tugas Akhir";
        } else {
            $data['statuslulusta'] = '';
        }

        $this->load->view('Mahasiswa/mahasiswaDetailView', $data);
    }
}
