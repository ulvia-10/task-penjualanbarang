<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Penjualan_Model extends CI_Model
{
	private $_table = "Penjualan";

	public function getAll()
	{
		return $this->db->query("SELECT * from Penjualan p, barang b, pengguna peng, pelanggan pel where p.IdBarang = b.IdBarang and p.IdPengguna=peng.IdPengguna and p.IdPelanggan = pel.IdPelanggan order by p.IdPenjualan desc")->result();
	}

	public function deleteById($id)
	{
		$this->db->where('IdPenjualan', $id);
    	$this->db->delete($this->_table);
	}

	public function getBarang()
    {
        $query = $this->db->query('SELECT *, (SELECT SUM(jumlahpembelian) FROM pembelian WHERE idbarang = barang.idbarang) - (SELECT SUM(jumlahpenjualan) FROM penjualan WHERE idbarang = barang.idbarang) AS stok FROM barang ORDER BY NamaBarang asc');
        return $query->result();
    }

    public function getStokBarang()
    {
        $query = $this->db->query('SELECT idbarang, namabarang, (SELECT SUM(jumlahpembelian) FROM pembelian WHERE idbarang = barang.idbarang) - (SELECT SUM(jumlahpenjualan) FROM penjualan WHERE idbarang = barang.idbarang) AS stok FROM barang');
        return $query->result();
    }

    public function getPelanggan()
    {
        $query = $this->db->query('SELECT * FROM pelanggan ORDER BY NamaPelanggan asc');
        return $query->result();
    }

	public function save()
	{
		$post = $this->input->post();
		$this->JumlahPenjualan = $post["JumlahPenjualan"];
		$this->HargaJual = $post["HargaJual"];
		$this->IdBarang = $post["IdBarang"];
		$this->IdPelanggan = $post["IdPelanggan"];
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
