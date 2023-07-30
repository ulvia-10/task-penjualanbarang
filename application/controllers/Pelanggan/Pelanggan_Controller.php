<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pelanggan_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Pelanggan/Pelanggan_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Pelanggan_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Pelanggan/Pelanggan_tambah');
        }

        function sukses()
        {
            redirect(site_url('Pelanggan/Pelanggan_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Pelanggan"] = $this->Pelanggan_Model->getAll();
            $IdAkses = $this->session->userdata('IdAkses');
            if ($IdAkses == "1" || $IdAkses == "2" || $IdAkses == "3") {
                $this->load->view('admin_header', $data);
            } else if ($IdAkses == "7"){
                $this->load->view('kasir_header', $data);
            }
            $this->load->view('admin_footer');
    		$this->load->view('Pelanggan/Pelanggan_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id = $this->input->post('IdPelanggan');
            $this->Pelanggan_Model->deleteById($id);
            redirect(site_url('Pelanggan/Pelanggan_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdPelanggan) {
            $where = array('IdPelanggan' => $IdPelanggan);
            $data["Pelanggan"] = $this->Pelanggan_Model->edit($where,'Pelanggan') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Pelanggan/Pelanggan_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdPelanggan = $this->input->post('IdPelanggan');
            $NamaPelanggan = $this->input->post('NamaPelanggan');
            $NoHp = $this->input->post('NoHp');
            $Email = $this->input->post('Email'); 
            $Alamat = $this->input->post('Alamat'); 

            $Pelanggan = array (
                'NamaPelanggan' => $NamaPelanggan,
                'NoHp' => $NoHp,
                'Email' => $Email,
                'Alamat' => $Alamat
            );
            $where = array (
                'IdPelanggan' => $IdPelanggan
            );

            $this->Pelanggan_Model->update($where,$Pelanggan,'Pelanggan');
            redirect(site_url('Pelanggan/Pelanggan_Controller'));
        }
    }
    ?>
