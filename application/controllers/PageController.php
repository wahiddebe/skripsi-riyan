<?php

class PageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("My_Model");
        $this->load->model("Model_TA");
        $this->load->model("Model_KP");
        $this->load->model("Model_Magang");
        $this->load->model("Model_Dosen");
        $this->load->model("Model_DosenKP");
        $this->load->model("Model_DosenMagang");
        $this->load->model("Model_PerusahaanKP");
        $this->load->model("Model_PerusahaanMagang");
        $this->load->model("Model_seminar");
        $this->load->model("Model_SeminarTA");
        $this->load->model("Model_SidangTA");
        $this->load->model("Model_TAView");
        $this->load->model("Model_JadwalSeminar");
        $this->load->model("Mahasiswa");
        $this->load->model("SOP");
        $this->load->model("InstruksiKerja");
        $this->load->model("BerkasTA");
        $this->load->model("BerkasKP");
        $this->load->model("BerkasMagang");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    function index()
    {
        $data['list'] = $this->My_Model->ambil_data('list')->result();
        $this->load->view('Admin/adminMahasiswaView', $data);
        $data['list'] = $this->Model_TA->ambil_data('list')->result();
        $this->load->view('Admin/adminTugasAkhirView', $data);
        $data['list'] = $this->Model_KP->ambil_data('list')->result();
        $this->load->view('AdminKP/adminKPView', $data);
        $data['list'] = $this->Model_Dosen->ambil_data('list')->result();
        $this->load->view('Admin/adminDosenView', $data);
        $data['list'] = $this->Model_DosenKP->ambil_data('list')->result();
        $this->load->view('AdminKP/adminDosenView', $data);
        $data['list'] = $this->Model_PerusahaanKP->ambil_data('list')->result();
        $this->load->view('AdminKP/adminPerusahaanKPView', $data);
        $data['list'] = $this->Model_SeminarTA->ambil_data('list')->result();
        $this->load->view('TU/TUSeminarView', $data);
        $data['list'] = $this->Model_SidangTA->ambil_data('list')->result();
        $this->load->view('TU/TUSidangTAView', $data);
        $data['list'] = $this->Model_TAView->ambil_data('list')->result();
        $this->load->view('Dosen/DosenBimbinganTAView', $data);
        $data['list'] = $this->Model_JadwalSeminar->ambil_data('list')->result();
        $this->load->view('Dosen/DosenJadwalView', $data);
        $data['list'] = $this->SOP->ambil_data('list')->result();
        $this->load->view('Admin/adminSOPView', $data);
        $data['list'] = $this->InstruksiKerja->ambil_data('list')->result();
        $this->load->view('Admin/adminInstruksiKerjaView', $data);
        $data['list'] = $this->BerkasTA->ambil_data('list')->result();
        $this->load->view('Admin/adminBerkasTAView', $data);
        $data['list'] = $this->BerkasKP->ambil_data('list')->result();
        $this->load->view('Admin/adminBerkasKPView', $data);
    }

    function cari()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->My_Model->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminMahasiswaView", $data);
    }

    function cariBimbinganTA()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_TAView > cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Dosen/DosenBimbinganTAView", $data);
    }

    function cariJadwalSeminar()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_JadwalSeminar->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Dosen/DosenJadwalView", $data);
    }

    function cariSOP()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->SOP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminSOPView", $data);
    }

    function cariSOPMahasiswa()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->SOP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Mahasiswa/mahasiswaSOPView", $data);
    }
    function cariInstruksiKerja()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->InstruksiKerja->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminInstruksiKerjaView", $data);
    }
    function cariInstruksiKerjaMahasiswa()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->InstruksiKerja->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Mahasiswa/mahasiswaInstruksiKerjaView", $data);
    }

    function cariDokumenTA()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasTA->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminBerkasTAView", $data);
    }
    function cariDokumenTAMahasiswa()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasTA->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Mahasiswa/mahasiswaBerkasTAView", $data);
    }

    function cariDokumenKP()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasKP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminBerkasKPView", $data);
    }
    function cariDokumenMagang()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasMagang->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminMagang/adminBerkasMagangView", $data);
    }
    function cariDokumenKPMahasiswa()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasKP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Mahasiswa/mahasiswaBerkasKPView", $data);
    }
    function cariDokumenMagangMahasiswa()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->BerkasMagang->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Mahasiswa/mahasiswaBerkasMagangView", $data);
    }

    function cariTA()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_TA->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminTugasAkhirView", $data);
    }

    function cariKP()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_KP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminKP/adminKPView", $data);
    }
    function cariMagang()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_Magang->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminMagang/adminMagangView", $data);
    }
    function cariDosen()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_Dosen->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("Admin/adminDosenView", $data);
    }

    function cariDosenKP()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_DosenKP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminKP/adminDosenView", $data);
    }
    function cariDosenMagang()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_DosenMagang->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminMagang/adminDosenView", $data);
    }
    function cariPerusahaanKP()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_PerusahaanKP->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminKP/adminPerusahaanKPView", $data);
    }
    function cariPerusahaanMagang()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_PerusahaanMagang->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("AdminMagang/adminPerusahaanMagangView", $data);
    }
    function cariSeminarTA()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_SeminarTA->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("TU/TUSeminarView", $data);
    }

    function cariSidangTA()
    {
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");

        $data["list"] = $this->Model_SidangTA->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data["jumlah"] = count($data["list"]);
        $this->load->view("TU/TUSidangTAView", $data);
    }

    function export_excel()
    {
        $data['mahasiswa'] = $this->My_Model->ambil_data('mahasiswa')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data Mahasiswa");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'TanggalLahir');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'NoTelepon');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'NoTeleponOrtu');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'AlamatOrtu');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'StatusKP');

        $baris = 2;
        $x = 1;

        foreach ($data['mahasiswa'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->Nama);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Email);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->TanggalLahir);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->NoTelepon);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->NoTeleponOrtu);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->AlamatOrtu);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->Status);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $data->StatusKP);


            $x++;
            $baris++;
        }

        $filename = "Data-Mahasiswa" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Mahasiswa");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    function export_excelTA()
    {
        $data['tugasakhir'] = $this->My_Model->ambil_data('tugasakhir')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data TugasAkhir");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Tema');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Judul');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'TanggalDaftar');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'DosenUsul1');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'DosenUsul2');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Pembimbing1');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Pembimbing2');

        $baris = 2;
        $x = 1;

        foreach ($data['tugasakhir'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->Tema);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Judul);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->TanggalDaftar);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->DosenUsul1);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->DosenUsul2);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->Pembimbing1);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->Pembimbing2);

            $x++;
            $baris++;
        }

        $filename = "Data-TugasAkhir" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data TugasAkhir");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    function export_excelKP()
    {
        $data['KP'] = $this->My_Model->ambil_data('KP')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data KP");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Kajian_KP');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nama_Perusahaan');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Tanggal_KP');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'UsulDosen1');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'UsulDosen2');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'DosenPembimbing');


        $baris = 2;
        $x = 1;

        foreach ($data['KP'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->Email);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Kajian_KP);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->Nama_Perusahaan);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->Tanggal_KP);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->UsulDosen1);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->UsulDosen2);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->DosenPembimbing);


            $x++;
            $baris++;
        }

        $filename = "Data-KP" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data KP");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    function export_excelMagang()
    {
        $data['Magang'] = $this->My_Model->ambil_data('Magang')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data Magang");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Program_Magang');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nama_Perusahaan');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Tanggal_Magang');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'UsulDosen');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'DosenPembimbing');


        $baris = 2;
        $x = 1;

        foreach ($data['Magang'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->Email);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Program_Magang);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->Nama_Perusahaan);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->Tanggal_Magang);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->UsulDosen);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->DosenPembimbing);


            $x++;
            $baris++;
        }

        $filename = "Data-Magang" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Magang");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    function export_excelDosen()
    {
        $data['dosen'] = $this->Model_Dosen->ambil_data('dosen')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data Dosen");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'KodeDosen');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'BebanPB1');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'BebanPB2');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'TotalBeban');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'BebanKP');

        $baris = 2;
        $x = 1;

        foreach ($data['dosen'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->KodeDosen);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->Nama);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Beban);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->Beban2);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->TotalBeban);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->BebanKP);

            $x++;
            $baris++;
        }

        $filename = "Data-Dosen" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data Dosen");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    function export_excelPerusahaanKP()
    {
        $data['SuratKP'] = $this->My_Model->ambil_data('SuratKP')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data PerusahaanKP");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Perusahaan_1');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Bidang_Perusahaan1');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Perusahaan_2');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Bidang_Perusahaan2');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Perusahaan_3');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Bidang_Perusahaan3');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Perusahaan_4');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Bidang_Perusahaan4');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Perusahaan_5');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Bidang_Perusahaan5');

        $baris = 2;
        $x = 1;

        foreach ($data['SuratKP'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->Perusahaan_1);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->Bidang_Perusahaan1);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->Perusahaan_2);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->Bidang_Perusahaan2);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->Perusahaan_3);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->Bidang_Perusahaan3);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->Perusahaan_4);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $baris, $data->Bidang_Perusahaan4);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $baris, $data->Perusahaan_5);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $baris, $data->Bidang_Perusahaan5);

            $x++;
            $baris++;
        }

        $filename = "Data-PerusahaanKP" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data PerusahaanKP");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    function export_excelseminar()
    {
        $data['seminar'] = $this->Model_seminar->ambil_data('seminar')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data seminar");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'TanggalDaftar');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TanggalSeminar');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'DosenPenguji1');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'DosenPenguji2');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Jam');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');

        $baris = 2;
        $x = 1;

        foreach ($data['seminar'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->TanggalDaftar);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->TanggalSeminar);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->DosenPenguji1);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->DosenPenguji2);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->Jam);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->Lokasi);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->Status);

            $x++;
            $baris++;
        }

        $filename = "Data-seminar" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data seminar");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    function export_excelsidang()
    {
        $data['sidang'] = $this->Model_SidangTA->ambil_data('sidang')->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("idr corner");
        $objPHPExcel->getProperties()->setLastModifiedBy("idr corner");
        $objPHPExcel->getProperties()->setTitle("Data sidang");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'TanggalDaftar');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TanggalSidang');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'DosenPenguji1');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'DosenPenguji2');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Jam');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Lokasi');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Status');

        $baris = 2;
        $x = 1;

        foreach ($data['sidang'] as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->NIM);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->TanggalDaftar);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->TanggalSidang);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->DosenPenguji1);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $data->DosenPenguji2);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $baris, $data->Jam);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $baris, $data->Lokasi);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $baris, $data->Status);

            $x++;
            $baris++;
        }

        $filename = "Data-sidang" . date("d-m-Y-H-i-s") . '.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Data sidang");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
