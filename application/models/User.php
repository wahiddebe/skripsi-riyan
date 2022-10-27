<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model {

	public function getCountUser()
	{
		return $this->db->count_all_results('user', FALSE);
	}

	public function login($data)
	{
		$query = $this->db->get_where('user', array("username" => $data['username'],"password" => $data['password']));
		return $query->first_row();
	}

	public function insert($data)
	{
	  if($this->db->insert("user",$data))
	  {
		return true;
	  }
	}

	public function deleteUser($Id_user)
	{
		$val = array(
		'Id_user' => $Id_user
		);
		$this->db->delete('user', $val);
	}

	public function delete($id)
	{
	  $this->db->where('Username',$id);
	  $this->db->delete('user');
	}

	public function getDataByUsername($id)
	{
	  $query = $this->db->get_where("user",array("Username"=>$id));
	  return $query->first_row();
	}

	public function update($id,$data)
	{
		$this->db->where('Username',$id);
		$this->db->update('user',$data);
	}
	function import($data)
 {
  $this->db->insert_batch('user', $data);
 }
}
?>