<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pelanggan_Model extends CI_Model
{
	private $_table = "Pelanggan";

	public function getAll()
	{
		return $this->db->query("SELECT * from Pelanggan")->result();
	}

	public function deleteById($id)
	{
		$this->db->where('IdPelanggan', $id);
    	$this->db->delete($this->_table);
	}

	public function save()
	{
		$post = $this->input->post();
		$this->NamaPelanggan = $post["NamaPelanggan"];
		$this->NoHp = $post["NoHp"];
		$this->Email = $post["Email"];
		$this->Alamat = $post["Alamat"];

		return $this->db->insert($this->_table, $this);
	}

	public function edit($where, $_table) {
        return $this->db->get_where($_table,$where);
    }
    
    public function update($where,$data,$_table) {
        $this->db->where($where);
        $this->db->update($_table,$data);
    }

}
?>
