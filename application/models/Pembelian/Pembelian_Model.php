<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pembelian_Model extends CI_Model
{
	private $_table = "Pembelian";

	public function getAll()
	{
		return $this->db->query("SELECT * from pembelian p, barang b, pengguna peng where p.IdBarang = b.IdBarang and p.IdPengguna=peng.IdPengguna order by p.IdPembelian desc")->result();
	}

	public function deleteById($id)
	{
		$this->db->where('IdPembelian', $id);
    	$this->db->delete($this->_table);
	}

	public function getBarang()
    {
        $query = $this->db->query('SELECT * FROM barang ORDER BY NamaBarang asc');
        return $query->result();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->JumlahPembelian = $post["JumlahPembelian"];
		$this->HargaBeli = $post["HargaBeli"];
		$this->IdBarang = $post["IdBarang"];
		$this->IdPengguna = $this->session->userdata('IdPengguna');

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
