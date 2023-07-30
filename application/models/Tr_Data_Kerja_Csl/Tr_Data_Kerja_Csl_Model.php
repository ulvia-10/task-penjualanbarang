<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tr_Data_Kerja_Csl_Model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	private $_table = "tr_data_kerja_csl";

	public function getAll()
	{
		return $this->db->query("SELECT csl.id, csl.sales_date, csl.nama_pemilik, csl.type_motor, csl.pekerjaan, csl.no_hp, csl.kode_md, csl.kode_dealer, csl.nama_dealer, csl.keterangan_survey, user.name as NAMA_AGENT FROM tr_data_kerja_csl csl, ms_pengguna user where csl.PENELPON = user.nrp and MONTH(csl.upload_date) = MONTH(NOW())")->result();
	}

	public function getAllByAgent($nrp)
	{
		return $this->db->query("SELECT csl.id, csl.sales_date, csl.nama_pemilik, csl.type_motor, csl.pekerjaan, csl.no_hp, csl.kode_md, csl.kode_dealer, csl.nama_dealer, csl.keterangan_survey, csl.upload_date, user.name as NAMA_AGENT FROM tr_data_kerja_csl csl, ms_pengguna user where csl.PENELPON = user.nrp and MONTH(csl.upload_date) = MONTH(NOW()) and csl.PENELPON = '". $nrp ."'")->result();
	}

	public function getAllToExport()
	{
		return $this->db->query("SELECT csl.*, agent.name as NAMA_AGENT FROM tr_data_kerja_csl csl, ms_pengguna agent WHERE csl.PENELPON = agent.nrp and csl.status_telepon != '' and MONTH(csl.tanggal) = MONTH(NOW())")->result();
	}

	public function insert($data) {
		$res = $this->db->insert_batch('tr_data_kerja_csl',$data);
		if($res){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deleteDuplicateRow()
	{
		$res= $this->db->query("DELETE t1 FROM tr_data_kerja_csl t1 INNER JOIN tr_data_kerja_csl t2 ON t1.upload_date > t2.upload_date AND t1.id = t2.id");
		if($res){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getByFilter($md, $dealer_code, $limit)
	{
		if($md == ''){
			return $this->db->query("SELECT * FROM tr_data_kerja_cdb")->result();
		} else {
		return $this->db->query("SELECT * FROM `tr_data_kerja_cdb` WHERE MD = '". $md ."' and DEALER_CODE = '". $dealer_code ."' and STATUS_AKHIR IS NULL limit $limit ")->result();
		}
	}

	public function getCSLByFilterDate($start_date, $finish_date)
	{
		return $this->db->query("SELECT csl.*, agent.name as NAMA_AGENT FROM tr_data_kerja_csl csl, ms_pengguna agent WHERE csl.PENELPON = agent.nrp and csl.status_telepon != '' and csl.upload_date BETWEEN '$start_date' AND '$finish_date'")->result();
	}

	public function getCSLByFilterDateImport($start_date, $finish_date)
	{
		return $this->db->query("SELECT csl.*, agent.name as NAMA_AGENT FROM tr_data_kerja_csl csl, ms_pengguna agent WHERE csl.PENELPON = agent.nrp and csl.upload_date BETWEEN '$start_date' AND '$finish_date'")->result();
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