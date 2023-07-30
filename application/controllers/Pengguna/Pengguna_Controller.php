<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengguna_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Pengguna/Pengguna_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Pengguna_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $data["HakAkses"] = $this->Pengguna_Model->getHakAkses();
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Pengguna/Pengguna_tambah', $data);
        }

        function sukses()
        {
            redirect(site_url('Pengguna/Pengguna_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Pengguna"] = $this->Pengguna_Model->getAll();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Pengguna/Pengguna_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id = $this->input->post('IdPengguna');
            $this->Pengguna_Model->deleteById($id);
            redirect(site_url('Pengguna/Pengguna_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdPengguna) {
            $data["HakAkses"] = $this->Pengguna_Model->getHakAkses();
            $where = array('IdPengguna' => $IdPengguna);
            $data["Pengguna"] = $this->Pengguna_Model->edit($where,'Pengguna') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Pengguna/Pengguna_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdPengguna = $this->input->post('IdPengguna');
            $NamaPengguna = $this->input->post('NamaPengguna');
            $Password = $this->input->post('Password');
            $NamaDepan = $this->input->post('NamaDepan'); 
            $NamaBelakang = $this->input->post('NamaBelakang'); 
            $NoHp = $this->input->post('NoHp'); 
            $Alamat = $this->input->post('Alamat'); 
            $IdAkses = $this->input->post('IdAkses'); 

            $Pengguna = array (
                'NamaPengguna' => $NamaPengguna,
                'Password' => $Password,
                'NamaDepan' => $NamaDepan,
                'NamaBelakang' => $NamaBelakang,
                'NoHp' => $NoHp,
                'Alamat' => $Alamat,
                'IdAkses' => $IdAkses
            );
            $where = array (
                'IdPengguna' => $IdPengguna
            );

            $this->Pengguna_Model->update($where,$Pengguna,'Pengguna');
            redirect(site_url('Pengguna/Pengguna_Controller'));
        }
    }
    ?>
