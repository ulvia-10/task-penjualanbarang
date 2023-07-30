<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("Login/Login_Model");
		$this->load->library('session');
    }
    
	public function index()
	{
		$this->load->view('login/login');
	}
	//autentikasi
	function aksi_login()
	{
		$post = $this->input->post();
		if(isset($post["NamaPengguna"]) && isset($post["Password"]))
		{
			//cek user
			$user = $this->Login_Model;
			$data = $user->getByNamaPengguna();

			if($data != null)
			{
				$IdPengguna = $data->IdPengguna;
				$NamaPengguna = $data->NamaPengguna;
				$IdAkses = $data->IdAkses;
				$NoHp = $data->NoHp;
				$Password = $data->Password;

				//adding data to session
				$newdata = array(
					'IdPengguna' => $IdPengguna,
					'NamaPengguna' => $NamaPengguna,
					'IdAkses' => $IdAkses,
					'NoHp' => $NoHp,
					'Password' => $Password
					);
				$this->session->set_userdata($newdata);

				if($IdAkses == "1"){
					redirect(site_url('Barang/Barang_Controller'));
				}else if ($IdAkses == "2"){
					redirect(site_url('Pelanggan/Pelanggan_Controller'));
				}else if ($IdAkses == "3"){
					redirect(site_url('Pelanggan/Pelanggan_Controller'));
				}else if ($IdAkses == "7"){
					redirect(site_url('Pelanggan/Pelanggan_Controller'));
				}
			} else {
				echo "<script>alert('IdPengguna atau Password salah');</script>";
				$this->load->view('login/login', $data);
			}
		} else {
			$this->load->view("login/login");
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('Login/Login_Controller'));
	}
}