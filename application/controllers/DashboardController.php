<?php

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("Form1");
        $this->load->model("Form_PeminjamanAlat");
        
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        if(!isset($this->session->userdata['logged_in']))
        {
            redirect('login');
        }
    }

    public function logout()
    {
        //remove session data
        $this->session->set_userdata('logged_in',false);
        $this->session->unset_userdata('username','');
        redirect('/');
    }

    //fungsi untuk memunculkan tampilan dashboard form 1
    public function load_dashboard()
    {
        $dataForm = $this->Form1->getdata(10);
        $data["dataForm"] = $dataForm;
        $this->load->view("dashboard/dashboard",$data);
    }

    //fungsi untuk memunculkan tampilan dashboard form peminjaman alat
    public function load_dashboard_formPeminjamanAlat()
    {
        $dataForm = $this->Form_PeminjamanAlat->getdata(10);
        $data["dataForm"] = $dataForm;
        $this->load->view("dashboard/dashboardFormPeminjamanAlat",$data);
    }

}

?>