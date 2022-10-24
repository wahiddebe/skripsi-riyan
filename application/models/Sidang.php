<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidang extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function insert($data)
    {
      if($this->db->insert("sidang",$data))
      {
        return true;
      }
    }

    public function delete($id)
    {
      $this->db->where('IdSidang',$id);
      $this->db->delete('sidang');
    }

    public function update($id,$data)
    {
      $this->db->where('IdSidang',$id);
      $this->db->update('sidang',$data);
    }

    public function getDataByNIM($NIM)
    {
      $query = $this->db->get_where("sidang",array("NIM" => $NIM));
      return $query->first_row();
    }

    public function getDataByDosen($ID)
    {
      $this->db->select('*');
      $this->db->from('sidang');
      $this->db->where('TanggalSidang >=',date("d/m/Y"));
      $where = "(DosenPengunji1=".$ID." OR DosenPenguji2=".$ID.")";
      $this->db->order_by('TanggalSidang','asc');
 
      $query = $this->db->get();
      return $query->result();
    }

    public function getDataByTAandNIM($IdTA,$NIM)
    {
      $query = $this->db->get_where("sidang",array("NIM" => $NIM, "IdTA" => $IdTA));
      return $query->first_row();
    }

    public function getAllDataNonApprove()
    {
      $this->db->order_by("TanggalDaftar","desc");
      $query = $this->db->get_where("sidang",array("DosenPenguji1" => ''));
      return $query->result();
    }

    public function getDataByID($ID)
    {
      $query = $this->db->get_where("sidang",array("IdSidang" => $ID));
      return $query->first_row();
    }

    public function getAllApproved()
    {
      $this->db->order_by("TanggalDaftar","desc");
      $query = $this->db->get_where("sidang",array("DosenPenguji1 <>" => ''));
      return $query->result();
    }
}
