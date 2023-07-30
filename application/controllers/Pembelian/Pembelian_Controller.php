<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pembelian_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Pembelian/Pembelian_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Pembelian_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $data["Barang"] = $this->Pembelian_Model->getBarang();
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Pembelian/Pembelian_tambah', $data);
        }

        function sukses()
        {
            redirect(site_url('Pembelian/Pembelian_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Pembelian"] = $this->Pembelian_Model->getAll();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Pembelian/Pembelian_index', $data);
    	}

        //hapus data 
    	public function hapus()
    	{
            $id = $this->input->post('IdPembelian');
            $this->Pembelian_Model->deleteById($id);
            redirect(site_url('Pembelian/Pembelian_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdPembelian) {
            $data["Barang"] = $this->Pembelian_Model->getBarang();
            $where = array('IdPembelian' => $IdPembelian);
            $data["Pembelian"] = $this->Pembelian_Model->edit($where,'Pembelian') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer', $data);
    		$this->load->view('Pembelian/Pembelian_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdPembelian = $this->input->post('IdPembelian');
            $JumlahPembelian = $this->input->post('JumlahPembelian');
            $HargaBeli = $this->input->post('HargaBeli');
            $IdBarang = $this->input->post('IdBarang'); 
            $IdPengguna = $this->session->userdata('IdPengguna');

            $Pembelian = array (
                'JumlahPembelian' => $JumlahPembelian,
                'HargaBeli' => $HargaBeli,
                'IdBarang' => $IdBarang,
                'IdPengguna' => $IdPengguna
            );
            $where = array (
                'IdPembelian' => $IdPembelian
            );

            $this->Pembelian_Model->update($where,$Pembelian,'Pembelian');
            redirect(site_url('Pembelian/Pembelian_Controller'));
        }
    }
    ?>
