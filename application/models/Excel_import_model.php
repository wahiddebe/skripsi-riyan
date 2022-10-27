<?php
class Excel_import_model extends CI_Model
{
 function select()
 {
  $this->db->order_by('NIM', 'DESC');
  $query = $this->db->get('mahasiswa');
  return $query;
 }

 function import($data)
 {
  $this->db->insert_batch('mahasiswa', $data);
 }
}
?>