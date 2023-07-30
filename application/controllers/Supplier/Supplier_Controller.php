<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Supplier_Controller extends CI_Controller
    {
    	
    	public function __construct()
    	{
    		parent::__construct();
            if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
            {
                echo "<script>alert('Anda harus login terlebih dahulu');</script>";
                redirect(site_url('Login/Login_Controller'));
            }
    		$this->load->model("Supplier/Supplier_Model");
    		//loading session library
            $this->load->library('session');
            
        }

        //tambah data
        public function tambah()
        {
            $data = $this->Supplier_Model;
            $result = $data->save();
            if($result > 0) $this->sukses();
            else $this->gagal();
        }

        //fungsi untuk meload page penulis tambah
        public function pageTambah()
        {
            $this->load->view('admin_header');
            $this->load->view('admin_footer');
            $this->load->view('Supplier/Supplier_tambah');
        }

        function sukses()
        {
            redirect(site_url('Supplier/Supplier_Controller'));
        }

        function gagal()
        {
            echo "<script>alert('Tambah data gagal')</script>";
        }

    	public function index()
    	{
    		$data["Supplier"] = $this->Supplier_Model->getAll();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Supplier/Supplier_index', $data);
    	}

        //hapus data dengan mengubah nilai is_active
    	public function hapus()
    	{
            $id = $this->input->post('IdSupplier');
            $this->Supplier_Model->deleteById($id);
            redirect(site_url('Supplier/Supplier_Controller'));
    	}

        //untuk get data ke page edit
    	public function edit($IdSupplier) {
            $where = array('IdSupplier' => $IdSupplier);
            $data["Supplier"] = $this->Supplier_Model->edit($where,'Supplier') -> result();
            $this->load->view('admin_header', $data);
            $this->load->view('admin_footer');
    		$this->load->view('Supplier/Supplier_edit', $data);
        }

        //update data ke database
        public function update() {
            $IdSupplier = $this->input->post('IdSupplier');
            $NamaSupplier = $this->input->post('NamaSupplier');
            $NoHp = $this->input->post('NoHp');
            $Email = $this->input->post('Email'); 
            $Alamat = $this->input->post('Alamat'); 

            $Supplier = array (
                'NamaSupplier' => $NamaSupplier,
                'NoHp' => $NoHp,
                'Email' => $Email,
                'Alamat' => $Alamat
            );
            $where = array (
                'IdSupplier' => $IdSupplier
            );

            $this->Supplier_Model->update($where,$Supplier,'Supplier');
            redirect(site_url('Supplier/Supplier_Controller'));
        }
    }
    ?>
