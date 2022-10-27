<?php

class KPController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("KP");
        $this->load->model("Mahasiswa");
        $this->load->model("Dosen");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showFormDaftarKP()
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
            $this->load->view("form/formKP",$data);
        }
        else
        {
            redirect('login');
        }
    }

    public function getKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
          if($this->session->userdata['username'] == "adminKP")
          {
            $id = (int)$this->uri->segment('3');
            $data["KP"] = $this->KP->getDataByID($id);
            $data["dosen"] = $dosen = $this->Dosen->getAllData();
            $totalSegment = count($this->uri->segment_array());
            $data['dosen1'] = $this->uri->segment('4');
            if($totalSegment == 4)
            {
                $data['dosen2'] = $this->uri->segment('5');
                $data['isApprove']  = true;
                $data['msgButton'] = 'Ubah';
            }
            else
            {
                $data['isApprove']  = false;
                $data['msgButton'] = 'Simpan';
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

    public function showListKP()
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
                    $KPApprove = $this->KP->getAllApproved();
                    foreach($KPApprove as $item)
                    {
                        $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
                        if($mahasiswa!=null)
                        {
                            $item->StatusKP = $mahasiswa->StatusKP;
                        }
                        else
                        {
                            $item->StatusKP = "";
                        }
                    }
                    $data['list'] = $KPApprove ;
                    $this->load->view('AdminKP/adminKPView',$data);
                    
                }
                else
                {
                    $KPNonApprove = $this->KP->getAllNonApproved();
                    $data['list'] = $KPNonApprove;
                    $this->load->view('AdminKP/index',$data);
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
                $id = (int)$this->uri->segment('3');
                $nama = $this->uri->segment('4');
                $data['event'] = 'menghapus';
                $data['tabel'] = 'KP';
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20',' ',$nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus',$data);
            }
        }
    }

    public function hapusKP()
    {
        if($this->input->post('id')!=null)
        {
            $idKP = $this->input->post('id');
            $KP = $this->KP->getDataByID($idKP);
            if($KP!=null)
            {
                //delete
                $this->KP->delete($idKP);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $KP->NIM;
                $this->session->set_flashdata('data',$data);

                redirect('adminKP/KP/approve');
            }
        }
    }

    public function submitKP()
    {
        if($this->input->post('IdKP')!=null)
        {
            $IdKP = (int)$this->input->post('IdKP');
            $KP = $this->KP->getDataByID($IdKP);
            $isApprove = false;
            if($KP!=null)
            {
                if($KP->DosenPembimbing != $this->input->post('dosen1') && $KP->DosenPembimbing!="")
                {
                    $isApprove = true;
                    $dosenLama = $this->Dosen->getDataBy($KP->DosenPembimbing);
                    $dosenLama->BebanKP = $dosenLama->BebanKP - 1;

                    $dosenBaru = $this->Dosen->getDataBy($this->input->post('dosen1'));
                    $dosenBaru->BebanKP = $dosenBaru->BebanKP + 1;

                    //update
                    $this->Dosen->update($dosenLama->KodeDosen,$dosenLama);
                    $this->Dosen->update($dosenBaru->KodeDosen,$dosenBaru);
                }
                
                $KP->DosenPembimbing = $this->input->post('dosen1');
                $KP->Kajian_KP = $this->input->post('Kajian_KP');

                if($this->input->post('persetujuan') !="")
                {
                    $KP->Status = $this->input->post('persetujuan');
                    $dosen1 = $this->Dosen->getDataBy($KP->DosenPembimbing);

                    $dosen1->BebanKP = $dosen1->BebanKP + 1;

                    //update
                    $this->Dosen->update($KP->DosenPembimbing,$dosen1);
                }

                //update
                $this->KP->update($IdKP,$KP);

                //send data
                $data['success'] = true;
                $data['NIM'] = $KP->NIM;
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
  

    public function saveKP()
    {
        if($this->input->post('NIM')!= null)
        {
            $NIM = $this->input->post('NIM');
            $path = './images/KP/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|jpg|png';
            $config['max_size'] = 1000;           

            //data KP
            $dataKP = array(
                'NIM' => $NIM,
                'Email' => $this->input->post('Email'),
                'Kajian_KP' => $this->input->post('Kajian_KP'),
                'Nama_Perusahaan' => $this->input->post('Nama_Perusahaan'),
                'Tanggal_KP' => $this->input->post('Tanggal_KP'),
                'UsulDosen1' => $this->input->post('dosen1'),
                'UsulDosen2' => $this->input->post('dosen2'),
            );
            //data Mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($NIM);
            if($mahasiswa!=null)
            {
                $mahasiswa->StatusKP = "Aktif";
            }


            //data upload transkip
            $config['file_name'] = $NIM."_Transkip.pdf";
            $this->load->library('upload',$config);
            if($this->upload->do_upload('Transkip'))
            {
                $dataKP['Transkip']  = $config['upload_path'].$config['file_name'];
            }

            //data upload surat penerimaan perusahaan
            $config['file_name'] = $NIM."_SuratPenerimaanPerusahaan.pdf";
            $this->upload->initialize($config);
            if($this->upload->do_upload('SuratPenerimaanPerusahaan'))
            {
                $dataKP['SuratPenerimaanPerusahaan']  = $config['upload_path'].$config['file_name'];
            }
 
            //simpan data mahasiswa dan TA
            $this->KP->insert($dataKP);

            $data['isSuccess'] = true;
            $data['event'] = 'KP';
            $this->session->set_flashdata('data',$data);

            redirect('mahasiswa');
        }
    }
    public function showBimbinganKP()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'dosen')
            {
                //get username dosen
                $idDosen = $this->session->userdata['username'];
                //get data TA
                $listKP = $this->KP->getDataByDosen($idDosen);
                if($listKP!=null)
                {
                    foreach($listKP as $item)
                    {
                        $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
                        if($mahasiswa!=null)
                        {
                            $item->Nama = $mahasiswa->Nama;
                            $item->Foto = $mahasiswa->Foto;
                        }
                    }

                    $data['list'] = $listKP;

                    $this->load->view('Dosen/DosenBimbinganKPView',$data);
                }
                else
                {
                    $this->load->view('Dosen/DosenBimbinganKPView');
                }
            }
        }
    }
}

?>