<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_importController extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('excel_import_model');
  $this->load->library('Excel');
 }

 function index()
 {
  $this->load->view('Admin/adminMahasiswaView');
 }

 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $Nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $NIM = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $TanggalLahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $data['mahasiswa'] = array(
      'Nama'  => $Nama,
      'NIM'   => $NIM,
      'TanggalLahir'    => $TanggalLahir
     );
    }
   }
   $this->excel_import_model->insert($data);
   echo 'Data Imported successfully';
  } 
 }
}

?>
