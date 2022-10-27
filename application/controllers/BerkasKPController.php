<?php

class BerkasKPController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("BerkasKP");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showListBerkasKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'adminKP')
            {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if($approvalData!=null)
                {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $BerkasKPList = $this->BerkasKP->GetAllData();
                $data['list'] = $BerkasKPList;
                $this->load->view('AdminKP/adminBerkasKPView',$data);

            }
            
            elseif($this->session->userdata['role'] == 'mahasiswa')
            {
                $data = [];

                //jika ada notifikasi
                $approvalData = $this->session->flashdata('message');
                if($approvalData!=null)
                {
                    $data['success'] = $approvalData['success'];
                    $data['Judul'] = $approvalData['Judul'];
                    $data['event'] = $approvalData['event'];
                }

                $BerkasKPList = $this->BerkasKP->GetAllData();
                $data['list'] = $BerkasKPList;
                $this->load->view('Mahasiswa/mahasiswaBerkasKPView',$data);

            }
        }
    }

    public function getBerkasKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
          if($this->session->userdata['username'] == "adminKP")
          {
            $id = (int)$this->uri->segment('3');
            $data = [];
            if($id!=-1)
            {
                $data["BerkasKP"] = $this->BerkasKP->getDataByID($id);
            }

            $data["isSuccess"] = false;
            $htmlText = $this->load->view('AdminKP/PopUpContent/KelolaBerkasKP',$data,true);
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

    public function submitBerkasKP()
    {
        $data = [];
        if($this->input->post('IdBerkas')!='')
        {
            $IdBerkas = $this->input->post('IdBerkas');
            $BerkasKP = $this->BerkasKP->getDataByID($IdBerkas);
            if($BerkasKP!=null)
            {
                $BerkasKP->Judul = $this->input->post('judul');
                $oldLink = $BerkasKP->File ;
                $BerkasKP->File = $this->uploadFile($this->input->post('judul'));
                if($BerkasKP->File == '')
                {
                    $BerkasKP->File = $oldLink;
                }

                //update
                $this->BerkasKP->update($IdBerkas,$BerkasKP);
                
                //set data
                $data['event'] = 'mengubah';
                $data['Judul'] = $BerkasKP->Judul;      
            }
        }
        else
        {
            //data BerkasKP
            $BerkasKP = array(
                'Judul' => $this->input->post('judul'),
                'TanggalPembuatan' => date("d/m/Y"),
                'File' => $this->uploadFile($this->input->post('judul'))
            );

            //simpan
            $this->BerkasKP->insert($BerkasKP);

            //set data
            $data['event'] = "menambah";
            $data['Judul'] = $BerkasKP['Judul'];
        }
        
        //send data
        $data['success'] = true;
        $this->session->set_flashdata('message',$data);
        redirect('adminKP/BerkasKP');
    }

    public function showDataHapus()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'adminKP')
            {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'BerkasKP';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20',' ',$nama);
                $data['id'] = $id;

                $this->load->view('AdminKP/PopUpContent/Hapus',$data);
            }
        }
    }

    public function hapusBerkasKP()
    {
        if($this->input->post('id')!=null)
        {
            $IdBerkas = $this->input->post('id');
            $BerkasKP = $this->BerkasKP->getDataByID($IdBerkas);
            if($BerkasKP!=null)
            {
                //delete
                $this->BerkasKP->delete($IdBerkas);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['Judul'] = $BerkasKP->Judul;
                $this->session->set_flashdata('message',$data);

                redirect('adminKP/BerkasKP');
            }
        }
    }

    private function uploadFile($judul)
    {
        //inisialisasi fungsi upload
        $path = './images/BerkasKP/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 1000;    

        $config['file_name'] = $judul.".pdf";
        $this->load->library('upload',$config);
        if($this->upload->do_upload('file'))
        {
            $fileName = str_replace(" ","_",$config['file_name']);
            return $config['upload_path'].$fileName;
        }
        else
        {
            return '';
        }

        return '';
      
    }
}

?>