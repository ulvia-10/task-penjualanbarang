<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Barang_Model extends CI_Model
{
	private $_table = "barang";

	public function getAll()
	{
		return $this->db->query("SELECT * from barang, supplier where barang.IdSupplier = supplier.IdSupplier")->result();
	}

	public function deleteById($id)
	{
		$this->db->where('IdBarang', $id);
    	$this->db->delete($this->_table);
	}

	public function getSupplier()
    {
        $query = $this->db->query('SELECT * FROM supplier ORDER BY NamaSupplier asc');
        return $query->result();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->NamaBarang = $post["NamaBarang"];
		$this->Keterangan = $post["Keterangan"];
		$this->Satuan = $post["Satuan"];
		$this->IdSupplier = $post["IdSupplier"];
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
