<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // load helper dan library
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
 
    public function index($error = NULL)
    {
        $data = array(
            'action' => site_url('upload/proses'),
            'judul' => set_value('judul'),
            'error' => $error['error'] // ambil parameter error
        );
 
        $this->load->view('Admin/adminMahasiswaView', $data);
    }
 
    public function proses()
    {
        // validasi judul
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
 
        if ($this->form_validation->run() == FALSE) {
            // jika validasi judul gagal
            $this->index();
        } else {
            // config upload
            $config['upload_path'] = './temp_upload/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('gambar')) {
                // jika validasi file gagal, kirim parameter error ke index
                $error = array('error' => $this->upload->display_errors());
                $this->index($error);
            } else {
                // jika berhasil upload ambil data dan masukkan ke database
                $upload_data = $this->upload->data();
 
                // pada contoh ini kita hanya menampilkan dataupload
                echo '<pre>';
                print_r($upload_data);
                echo '</pre>';
                echo anchor(site_url('upload'), 'Upload Lagi');
 
                // delete image (for demo purpose only)
                $this->load->helper('file');
                delete_files('./temp_upload/');
            }
        }
    }
 
}
?>