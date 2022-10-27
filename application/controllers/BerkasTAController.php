<?php

class BerkasTAController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("BerkasTA");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showListBerkasTA()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'admin')
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

                $BerkasTAList = $this->BerkasTA->GetAllData();
                $data['list'] = $BerkasTAList;
                $this->load->view('Admin/adminBerkasTAView',$data);

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

                $BerkasTAList = $this->BerkasTA->GetAllData();
                $data['list'] = $BerkasTAList;
                $this->load->view('Mahasiswa/mahasiswaBerkasTAView',$data);

            }
        }
    }

    public function getBerkasTA()
    {
        if(isset($this->session->userdata['logged_in']))
        {
          if($this->session->userdata['username'] == "admin")
          {
            $id = (int)$this->uri->segment('3');
            $data = [];
            if($id!=-1)
            {
                $data["BerkasTA"] = $this->BerkasTA->getDataByID($id);
            }

            $data["isSuccess"] = false;
            $htmlText = $this->load->view('Admin/PopUpContent/KelolaBerkasTA',$data,true);
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

    public function submitBerkasTA()
    {
        $data = [];
        if($this->input->post('IdBerkas')!='')
        {
            $IdBerkas = $this->input->post('IdBerkas');
            $BerkasTA = $this->BerkasTA->getDataByID($IdBerkas);
            if($BerkasTA!=null)
            {
                $BerkasTA->Judul = $this->input->post('judul');
                $oldLink = $BerkasTA->File ;
                $BerkasTA->File = $this->uploadFile($this->input->post('judul'));
                if($BerkasTA->File == '')
                {
                    $BerkasTA->File = $oldLink;
                }

                //update
                $this->BerkasTA->update($IdBerkas,$BerkasTA);
                
                //set data
                $data['event'] = 'mengubah';
                $data['Judul'] = $BerkasTA->Judul;      
            }
        }
        else
        {
            //data BerkasTA
            $BerkasTA = array(
                'Judul' => $this->input->post('judul'),
                'TanggalPembuatan' => date("d/m/Y"),
                'File' => $this->uploadFile($this->input->post('judul'))
            );

            //simpan
            $this->BerkasTA->insert($BerkasTA);

            //set data
            $data['event'] = "menambah";
            $data['Judul'] = $BerkasTA['Judul'];
        }
        
        //send data
        $data['success'] = true;
        $this->session->set_flashdata('message',$data);
        redirect('admin/BerkasTA');
    }

    public function showDataHapus()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'admin')
            {
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'BerkasTA';
                $data['kolom'] = 'Judul';
                $data['nama'] = str_replace('%20',' ',$nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus',$data);
            }
        }
    }

    public function hapusBerkasTA()
    {
        if($this->input->post('id')!=null)
        {
            $IdBerkas = $this->input->post('id');
            $BerkasTA = $this->BerkasTA->getDataByID($IdBerkas);
            if($BerkasTA!=null)
            {
                //delete
                $this->BerkasTA->delete($IdBerkas);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['Judul'] = $BerkasTA->Judul;
                $this->session->set_flashdata('message',$data);

                redirect('admin/BerkasTA');
            }
        }
    }

    private function uploadFile($judul)
    {
        //inisialisasi fungsi upload
        $path = './images/BerkasTA/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 10000;    

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
