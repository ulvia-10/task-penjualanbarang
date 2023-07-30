<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Barang/Barang_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Barang_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        public function dashboard()
        {
            $data["Barang"] = $this->Barang_Model->getLabaRugi();
            $data["Top5Barang"] = $this->Barang_Model->getLabaRugiTop5();
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Barang/Barang_dashboard', $data);
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $data["supplier"] = $this->Barang_Model->getSupplier();
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Barang/Barang_tambah', $data);
        }

        function sukses()
        {
            redirect(site_url('Barang/Barang_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Barang"] = $this->Barang_Model->getAll();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Barang/Barang_index', $data);
    	}

        //hapus data 
    	public function hapus()
    	{
            $id = $this->input->post('IdBarang');
            $this->Barang_Model->deleteById($id);
            redirect(site_url('Barang/Barang_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdBarang) {
            $data["supplier"] = $this->Barang_Model->getSupplier();
            $where = array('IdBarang' => $IdBarang);
            $data["Barang"] = $this->Barang_Model->edit($where,'Barang') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer', $data);
    		$this->load->view('Barang/Barang_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdBarang = $this->input->post('IdBarang');
            $NamaBarang = $this->input->post('NamaBarang');
            $Keterangan = $this->input->post('Keterangan');
            $Satuan = $this->input->post('Satuan'); 
            $IdSupplier = $this->input->post('IdSupplier'); 
            $IdPengguna = $this->session->userdata('IdPengguna');

            $Barang = array (
                'NamaBarang' => $NamaBarang,
                'Keterangan' => $Keterangan,
                'Satuan' => $Satuan,
                'IdSupplier' => $IdSupplier,
                'IdPengguna' => $IdPengguna
            );
            $where = array (
                'IdBarang' => $IdBarang
            );

            $this->Barang_Model->update($where,$Barang,'Barang');
            redirect(site_url('Barang/Barang_Controller'));
        }
    }
    ?>
