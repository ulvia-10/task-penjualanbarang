<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pengguna_Model extends CI_Model
{
	private $_table = "Pengguna";

	public function getAll()
	{
		return $this->db->query("SELECT * from pengguna p, hakakses h where p.IdAkses = h.IdAkses")->result();
	}

	public function getHakAkses()
    {
        $query = $this->db->query('SELECT * FROM hakakses ORDER BY NamaAkses asc');
        return $query->result();
    }

	public function deleteById($id)
	{
		$this->db->where('IdPengguna', $id);
    	$this->db->delete($this->_table);
	}

	public function save()
	{
		$post = $this->input->post();
		$this->NamaPengguna = $post["NamaPengguna"];
		$this->Password = $post["Password"];
		$this->NamaDepan = $post["NamaDepan"];
		$this->NamaBelakang = $post["NamaBelakang"];
		$this->NoHp = $post["NoHp"];
		$this->Alamat = $post["Alamat"];
		$this->IdAkses = $post["IdAkses"];

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
