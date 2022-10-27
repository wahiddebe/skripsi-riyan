<?php

class SuratKPController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("SuratKP");
        $this->load->model("Mahasiswa");
        $this->load->model("Dosen");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showformSuratKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
            //ambil data dosen
            $dosen = $this->Dosen->getAllData();
            //masukin ke variabel untuk dikirim ke view
            $data['mahasiswa'] = $mahasiswa;
            $data['dosen'] = $dosen;
            $data['isSuccess'] = false;
            $this->load->view("form/formSuratKP",$data);
        }
        else
        {
            redirect('login');
        }
    }

    public function hapusSuratKP()
    {
        if($this->input->post('id')!=null)
        {
            $idKP = $this->input->post('id');
            $SuratKP = $this->SuratKP->getDataByID($idKP);
            if($SuratKP!=null)
            {
                //delete
                $this->SuratKP->delete($idKP);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $NIM;
                $this->session->set_flashdata('data',$data);

                if($this->uri->segment('3') == 'surat')
                {
                    redirect('adminKP/SuratKP/approve');
                }
                else
                {
                    redirect('adminKP/PerusahaanKP/approve');
                }

                
            }
        }
    }

    public function showDataHapus()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'adminKP')
            {
                $id = $this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $jenis = $this->uri->segment('5');
                $data['event'] = 'menghapus';
                if($jenis == 'surat')
                {
                    $data['tabel'] = 'SuratKP';
                }
                else
                {
                    $data['tabel'] = 'Perusahaan KP';
                }
                
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20',' ',$nama);
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus',$data);
            }
        }
    }

    public function getSuratKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
          if($this->session->userdata['username'] == "adminKP")
          {
            $id = (int)$this->uri->segment('3');
            $data["SuratKP"] = $this->SuratKP>getDataByID($id);
            $data["dosen"] = $dosen = $this->Dosen->getAllData();
            $data['dosen1'] = $this->uri->segment('4');
            $data['dosen2'] = $this->uri->segment('5');
            if($this->uri->segment('6') == 'approve')
            {
                $data['isApprove']  = true;
                $data['msgButton'] = 'Ubah';
            }
            else
            {
                $data['isApprove']  = false;
                $data['msgButton'] = 'Setujui';
            }
            $data["isSuccess"] = false;
            $htmlText = $this->load->view('AdminKP/PopUpContent/PersetujuanKP',$data,true);
            echo $htmlText;
          }
          else{
            echo "<p>Data not found</p>";
          }
        }
        else{
            echo "<p>Please log in first</p>";
        }
    }

    public function showListSuratKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'adminKP')
            {
                $status = $this->uri->segment('3');
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if($approvalData!=null)
                {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                //cek status data yg mau diambil
                if($status ==  'approve')
                {
                    $SuratKPApprove = $this->SuratKP->getAllApproved();
                    $data['list'] = $SuratKPApprove ;
                    $this->load->view('AdminKP/adminSuratKPView',$data);
                }
                else
                {
                    $SuratKPNonApprove = $this->SuratKP->getAllNonApproved();
                    $data['list'] = $SuratKPNonApprove;
                    $this->load->view('AdminKP/index',$data);
                }
            }
            
        }
    }
    
    public function showListPerusahaanKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'adminKP')
            {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('data');
                if($approvalData!=null)
                {
                    $data['success'] = $approvalData['success'];
                    $data['NIM'] = $approvalData['NIM'];
                    $data['event'] = $approvalData['event'];
                }

                $SuratKPList = $this->SuratKP->GetAllData();
                $data['list'] = $SuratKPList;
                $this->load->view('AdminKP/adminPerusahaanKPView',$data);

            }
        }
    }

    public function submitSuratKP()
    {
        if($this->input->post('IdKP')!=null)
        {
            $IdKP = (int)$this->input->post('IdKP');
            $SuratKP= $this->SuratKP>getDataByID($IdKP);
            if($SuratKP!=null)
            {

                //update
                $this->SuratKP->update($IdKP,$SuratKP);

                //send data
                $data['success'] = true;
                $data['NIM'] = $SuratKP->NIM;
                $data['event'] = 'mengubah';
                $this->session->set_flashdata('data',$data);

                if($isApprove)
                {
                    redirect('adminKP/KP/approve');
                }
                else
                {
                    redirect('adminKP/KP/nonApprove');
                }

            }
        }
    }
  

    public function saveSuratKP()
    {
        if($this->input->post('NIM')!= null)
        {
            $NIM = $this->input->post('NIM');
            $path = './images/SuratKP/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|jpg|png';
            $config['max_size'] = 1000;           

            //data KP
            $dataSuratKP = array(
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
            $config['file_name'] = $NIM."_SuratKP1.pdf";
            $this->load->library('upload',$config);
            if($this->upload->do_upload('SuratKP1'))
            {
                $dataSuratKP['SuratKP1']  = $config['upload_path'].$config['file_name'];
            }

            //data upload surat KP 2
            $config['file_name'] = $NIM."_SuratKP2.pdf";
            $this->upload->initialize($config);
            if($this->upload->do_upload('SuratKP2'))
            {
                $dataSuratKP['SuratKP2']  = $config['upload_path'].$config['file_name'];
            }
 
            //data upload surat KP 3
            $config['file_name'] = $NIM."_SuratKP3.pdf";
            $this->upload->initialize($config);
            if($this->upload->do_upload('SuratKP3'))
            {
                $dataSuratKP['SuratKP3']  = $config['upload_path'].$config['file_name'];
            }

            //data upload surat KP 4
            $config['file_name'] = $NIM."_SuratKP4.pdf";
            $this->upload->initialize($config);
            if($this->upload->do_upload('SuratKP4'))
            {
                $dataSuratKP['SuratKP4']  = $config['upload_path'].$config['file_name'];
            }

            //data upload surat KP 5
            $config['file_name'] = $NIM."_SuratKP5.pdf";
            $this->upload->initialize($config);
            if($this->upload->do_upload('SuratKP5'))
            {
                $dataSuratKP['SuratKP5']  = $config['upload_path'].$config['file_name'];
            }

            //simpan data mahasiswa dan TA
            $this->SuratKP->insert($dataSuratKP);

            $data['isSuccess'] = true;
            $data['event'] = 'SuratKP';
            $this->session->set_flashdata('data',$data);

            redirect('mahasiswa');
        }
    }
}

?>