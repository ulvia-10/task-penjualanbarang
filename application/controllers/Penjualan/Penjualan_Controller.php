<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penjualan_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Penjualan/Penjualan_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Penjualan_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $data["Barang"] = $this->Penjualan_Model->getBarang();
            $dataStok = $this->Penjualan_Model->getStokBarang();
            foreach ($dataStok as $value) {
                $data["StokBarang"] = $value->stok;
            }
            $data["Pelanggan"] = $this->Penjualan_Model->getPelanggan();
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Penjualan/Penjualan_tambah', $data);
        }

        function sukses()
        {
            redirect(site_url('Penjualan/Penjualan_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Penjualan"] = $this->Penjualan_Model->getAll();
            if ($this->session->userdata('IdAkses') == "1") {
                $this->load->view('admin_header', $data);
            } else if ($this->session->userdata('IdAkses') == "7"){
                $this->load->view('kasir_header', $data);
            }
            $this->load->view('admin_footer');
    		$this->load->view('Penjualan/Penjualan_index', $data);
    	}

        //hapus data 
    	public function hapus()
    	{
            $id = $this->input->post('IdPenjualan');
            $this->Penjualan_Model->deleteById($id);
            redirect(site_url('Penjualan/Penjualan_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdPenjualan) {
            $data["Barang"] = $this->Penjualan_Model->getBarang();
            $dataStok = $this->Penjualan_Model->getStokBarang();
            foreach ($dataStok as $value) {
                $data["StokBarang"] = $value->stok;
            }
            $data["Pelanggan"] = $this->Penjualan_Model->getPelanggan();
            $where = array('IdPenjualan' => $IdPenjualan);
            $data["Penjualan"] = $this->Penjualan_Model->edit($where,'Penjualan') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer', $data);
    		$this->load->view('Penjualan/Penjualan_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdPenjualan = $this->input->post('IdPenjualan');
            $JumlahPenjualan = $this->input->post('JumlahPenjualan');
            $HargaJual = $this->input->post('HargaJual');
            $IdBarang = $this->input->post('IdBarang'); 
            $IdPelanggan = $this->input->post('IdPelanggan'); 
            $IdPengguna = $this->session->userdata('IdPengguna');

            $Penjualan = array (
                'JumlahPenjualan' => $JumlahPenjualan,
                'HargaJual' => $HargaJual,
                'IdBarang' => $IdBarang,
                'IdPelanggan' => $IdPelanggan,
                'IdPengguna' => $IdPengguna
            );
            $where = array (
                'IdPenjualan' => $IdPenjualan
            );

            $this->Penjualan_Model->update($where,$Penjualan,'Penjualan');
            redirect(site_url('Penjualan/Penjualan_Controller'));
        }
    }
    ?>
