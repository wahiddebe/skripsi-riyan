<?php

class TugasAkhirController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("TugasAkhir");
        $this->load->model("KP");
        $this->load->model("Mahasiswa");
        $this->load->model("Dosen");
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function showFormDaftarTA()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            //ambil data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($this->session->userdata['username']);
            //ambil data dosen
            $dosen = $this->Dosen->getAllData();
            //masukin ke variabel untuk dikirim ke view
            if($mahasiswa!=null)
                {
                    $data['mahasiswa'] = $mahasiswa;
                     $data['StatusKP'] = '';
                    $data['dosen'] = $dosen;
                   
                    if($mahasiswa!=null)
                    {
                        $data['StatusKP'] = $mahasiswa->StatusKP;
                    }
                }
    
            $data['isSuccess'] = false;
            $this->load->view("form/formTA",$data);
        }
        else
        {
            redirect('login');
        }
    }

    public function getTugasAkhir()
    {
        if(isset($this->session->userdata['logged_in']))
        {
          if($this->session->userdata['username'] == "admin")
          {
            $id = (int)$this->uri->segment('3');
            $tugasAkhir = $this->TugasAkhir->getDataByID($id);
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
                $data['msgButton'] = 'Simpan';
            }

            //get data mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($tugasAkhir->NIM);
            if($mahasiswa!=null)
            {
                $tugasAkhir->Transkrip = $mahasiswa->Transkrip;
                $tugasAkhir->KRS = $mahasiswa->KRS;
                $tugasAkhir->PraBimbingan = $mahasiswa->PraBimbingan;
            }

            $data['tugasAkhir'] = $tugasAkhir;
            $data["isSuccess"] = false;
            $htmlText = $this->load->view('Admin/PopUpContent/PersetujuanTA',$data,true);
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

    public function showListTA()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'admin')
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
                    $tugasAkhirApprove = $this->TugasAkhir->getAllApproved();
                    foreach($tugasAkhirApprove as $item)
                    {
                        $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
                        if($mahasiswa!=null)
                        {
                            $item->StatusMahasiswa = $mahasiswa->Status;
                        }
                        else
                        {
                            $item->StatusMahasiswa = "";
                        }
                    }
                    $data['list'] = $tugasAkhirApprove ;
                    $this->load->view('Admin/adminTugasAkhirView',$data);
                }
                else
                {
                    $tugasAkhirNonApprove = $this->TugasAkhir->getAllNonApproved();
                    $data['list'] = $tugasAkhirNonApprove;
                    $this->load->view('Admin/index',$data);
                }
            }
        }
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
                $data['tabel'] = 'Tugas Akhir';
                $data['kolom'] = 'NIM';
                $data['nama'] = str_replace('%20',' ',$nama);
                $data['id'] = $id;

                $this->load->view('Admin/PopUpContent/Hapus',$data);
            }
        }
    }

    public function hapusTA()
    {
        if($this->input->post('id')!=null)
        {
            $idTA = $this->input->post('id');
            $tugasAkhir = $this->TugasAkhir->getDataByID($idTA);
            if($tugasAkhir!=null)
            {
                //delete
                $this->TugasAkhir->delete($idTA);

                //send data
                $data['success'] = true;
                $data['event'] = "menghapus";
                $data['NIM'] = $tugasAkhir->NIM;
                $this->session->set_flashdata('data',$data);

                redirect('admin/tugasAkhir/approve');
            }
        }
    }

    public function submitTugasAkhir()
    {
        if($this->input->post('idTA')!=null)
        {
            $idTA = (int)$this->input->post('idTA');
            $tugasAkhir = $this->TugasAkhir->getDataByID($idTA);
            if($tugasAkhir!=null)
            {
                //cek jika nama sama judul diubah
                $isApprove = (bool)$this->input->post('isApprove');
                if($isApprove)
                {
                    $tugasAkhir->Tema = $this->input->post('tema');
                    $tugasAkhir->Judul = $this->input->post('judul');
                    if($tugasAkhir->Pembimbing1 != $this->input->post('dosen1'))
                    {
                        $dosenLama = $this->Dosen->getDataBy($tugasAkhir->Pembimbing1);
                        $dosenLama->Beban = $dosenLama->Beban - 1;
                        $dosenLama->TotalBeban = $dosenLama->TotalBeban - 1;

                        $dosenBaru = $this->Dosen->getDataBy($this->input->post('dosen1'));
                        $dosenBaru->Beban = $dosenBaru->Beban + 1;
                        $dosenBaru->TotalBeban = $dosenBaru->TotalBeban + 1;

                        //update
                        $this->Dosen->update($dosenLama->KodeDosen,$dosenLama);
                        $this->Dosen->update($dosenBaru->KodeDosen,$dosenBaru);
                    }

                    //cek jika dosen2 berubah
                    if($tugasAkhir->Pembimbing2 != $this->input->post('dosen2'))
                    {
                        $dosenLama = $this->Dosen->getDataBy($tugasAkhir->Pembimbing2);
                        $dosenLama->Beban2 = $dosenLama->Beban2 - 1;
                        $dosenLama->TotalBeban = $dosenLama->TotalBeban - 1;

                        $dosenBaru = $this->Dosen->getDataBy($this->input->post('dosen2'));
                        $dosenBaru->Beban2 = $dosenBaru->Beban2 + 1;
                        $dosenBaru->TotalBeban = $dosenBaru->TotalBeban + 1;

                        //update
                        $this->Dosen->update($dosenLama->KodeDosen,$dosenLama);
                        $this->Dosen->update($dosenBaru->KodeDosen,$dosenBaru);
                    }
                    $tugasAkhir->Pembimbing1 = $this->input->post('dosen1');
                    $tugasAkhir->Pembimbing2 = $this->input->post('dosen2');
                }
                else
                {
                    $tugasAkhir->Status = $this->input->post('persetujuan');
                    //jika disetujui
                    if($tugasAkhir->Status == 'setuju')
                    {
                        $tugasAkhir->Pembimbing1 = $this->input->post('dosen1');
                        $tugasAkhir->Pembimbing2 = $this->input->post('dosen2');

                        $dosen1 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing1);
                        $dosen2 = $this->Dosen->getDataBy($tugasAkhir->Pembimbing2);
                        
                        $dosen1->Beban = $dosen1->Beban + 1;
                        $dosen2->Beban2 = $dosen2->Beban2 + 1;
                        $dosen1->TotalBeban = $dosen1->TotalBeban + 1;
                        $dosen2->TotalBeban = $dosen2->TotalBeban + 1;
    
                        //update
                        $this->Dosen->update($tugasAkhir->Pembimbing1,$dosen1);
                        $this->Dosen->update($tugasAkhir->Pembimbing2,$dosen2);
                    }
                }

                //update
                $this->TugasAkhir->update($idTA,$tugasAkhir);

                //send data
                $data['success'] = true;
                $data['NIM'] = $tugasAkhir->NIM;
                $data['event'] = 'mengubah';
                $this->session->set_flashdata('data',$data);

                if($isApprove)
                {
                    redirect('admin/tugasAkhir/approve');
                }
                else
                {
                    redirect('admin/tugasAkhir/nonApprove');
                }

            }
        }
    }
  

    public function saveTA()
    {
        if($this->input->post('NIM')!= null)
        {
            $NIM = $this->input->post('NIM');
            $path = './images/TA/';
            //inisialisasi fungsi upload
            //mkdir($path,0755,true);
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|jpg|png';
            $config['max_size'] = 500;           

            //data TA
            $dataTA = array(
                'NIM' => $NIM,
                'TanggalDaftar' => $this->input->post('tanggal'),
                'Tema' => $this->input->post('tema'),
                'DosenUsul1' => $this->input->post('dosen1'),
                'DosenUsul2' => $this->input->post('dosen2'),
            );


            //data Mahasiswa
            $mahasiswa = $this->Mahasiswa->getDataByID($NIM);
            if($mahasiswa!=null)
            {
                $mahasiswa->Email = $this->input->post('email');
                $mahasiswa->NoTelepon = $this->input->post('telepon');
                $mahasiswa->NoTeleponOrtu = $this->input->post('telepon_ortu');
                $mahasiswa->AlamatOrtu = $this->input->post('alamat_ortu');
                $mahasiswa->Status = "Aktif";
                //data upload KRS
                $config['file_name'] = $NIM."_KRS.pdf";
                $this->load->library('upload',$config);
                if($this->upload->do_upload('krs'))
                {
                    $mahasiswa->KRS = $config['upload_path'].$config['file_name'];
                }
                //data upload foto
                $config['file_name'] = $NIM."_Foto.jpg";
                $this->upload->initialize($config);
                if($this->upload->do_upload('foto'))
                {
                    $mahasiswa->Foto = $config['upload_path'].$config['file_name'];
                }
                //data upload transkrip
                $config['file_name'] = $NIM."_Transkrip.pdf";
                $this->upload->initialize($config);
                if($this->upload->do_upload('transkrip'))
                {
                    $mahasiswa->Transkrip = $config['upload_path'].$config['file_name'];
                }
                //data upload prabimbingan
                $config['file_name'] = $NIM."_Prabimbingan.pdf";
                $this->upload->initialize($config);
                if($this->upload->do_upload('prabimbingan'))
                {
                    $mahasiswa->PraBimbingan = $config['upload_path'].$config['file_name'];
                }
            }

            //simpan data mahasiswa dan TA
            $this->Mahasiswa->update($NIM,$mahasiswa);
            $this->TugasAkhir->insert($dataTA);

            $data['isSuccess'] = true;
            $data['event'] = 'tugas akhir';
            $this->session->set_flashdata('data',$data);

            redirect('mahasiswa');
        }
    }

    public function showBimbinganTA()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            if($this->session->userdata['role'] == 'dosen')
            {
                //get username dosen
            $idDosen = $this->session->userdata['username'];
                //get data TA
                $listTA = $this->TugasAkhir->getDataByDosen($idDosen);
                if($listTA!=null)
                {
                    foreach($listTA as $item)
                    {
                        $mahasiswa = $this->Mahasiswa->getDataByID($item->NIM);
                        if($mahasiswa!=null)
                        {
                            $item->Nama = $mahasiswa->Nama;
                            $item->Foto = $mahasiswa->Foto;
                            $item->Status = $mahasiswa->Status;
                        }
                    }

                    $data['list'] = $listTA;

                    $this->load->view('Dosen/DosenBimbinganTAView',$data);
                }
                else
                {
                    $this->load->view('Dosen/DosenBimbinganTAView');
                }
            }
        }
    }
}
