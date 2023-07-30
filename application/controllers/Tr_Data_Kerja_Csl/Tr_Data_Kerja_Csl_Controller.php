<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tr_Data_Kerja_Csl_Controller extends CI_Controller {
// construct
	public function __construct() {
		parent::__construct();
		if(!is_logged_in())  // if you add in constructor no need write each function in above controller. 
        {
            echo "<script>alert('Anda harus login terlebih dahulu');</script>";
            redirect(site_url('Login/Login_controller'));
        }
// load model
		$this->load->model('Tr_Data_Kerja_Csl/Tr_Data_Kerja_Csl_Model', 'tr_data_kerja_csl');
		$this->load->model('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Model', 'tr_data_kerja_cdb');
		$this->load->helper(array('url','html','form'));
	}    
	public function index() {
		$data["date"] = '';
		$data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getAll();
        $this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_import', $data);
	}

	public function importFile(){
		if ($this->input->post('submit')) {
			$path = 'uploads/';
			require_once APPPATH . "/third_party/PHPExcel.php";
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls|csv';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if(empty($error)){
				if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i=0;
					foreach ($allDataInSheet as $value) {
						if($flag){
							$flag =false;
							continue;
						}
						$inserdata[$i]['id'] = $value['A'];
						$inserdata[$i]['sales_date'] = $value['B'];
						$inserdata[$i]['type_motor'] = $value['C'];
						$inserdata[$i]['nama_pemilik'] = $value['D'];
						$inserdata[$i]['pekerjaan'] = $value['E'];
						$inserdata[$i]['no_hp'] = $value['F'];
						$inserdata[$i]['kode_md'] = $value['G'];
						$inserdata[$i]['kode_dealer'] = $value['H'];
						$inserdata[$i]['nama_dealer'] = $value['I'];
						$inserdata[$i]['jawaban_1'] = $value['J'];
						$inserdata[$i]['jawaban_2'] = $value['K'];
						$inserdata[$i]['jawaban_2a'] = $value['L'];
						$inserdata[$i]['jawaban_3'] = $value['M'];
						$inserdata[$i]['jawaban_3a'] = $value['N'];
						$inserdata[$i]['jawaban_4'] = $value['O'];
						$inserdata[$i]['jawaban_5'] = $value['P'];
						$inserdata[$i]['jawaban_6'] = $value['S'];
						$inserdata[$i]['jawaban_7'] = $value['T'];
						$inserdata[$i]['jawaban_8'] = $value['W'];
						$inserdata[$i]['jawaban_9'] = $value['X'];
						$inserdata[$i]['status_telepon'] = $value['AA'];
						$inserdata[$i]['keterangan_telepon'] = $value['AB'];
						$inserdata[$i]['waktu_telepon'] = $value['AC'];
						$inserdata[$i]['tanggal'] = $value['AD'];
						$inserdata[$i]['penelpon'] = $value['AE'];
						$inserdata[$i]['keterangan_survey'] = $value['AF'];
						date_default_timezone_set('Asia/Jakarta');
						$inserdata[$i]['upload_date'] = date("Y/m/d H:i:s");
						$i++;
					}               
					$result = $this->tr_data_kerja_csl->insert($inserdata);   
					if($result){
						echo "<script>alert('Data berhasil ditambah')</script>";
					} else {
						echo "<script>alert('Data gagal ditambah')</script>";
					}           
				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
						. '": ' .$e->getMessage());
				}
			}else{
				$msg_error= $error['error'];
				echo "<script>alert('" . $msg_error ."')</script>";
			}
		}
		$this->tr_data_kerja_csl->deleteDuplicateRow();
		$data["date"] = '';   
		$data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getAll();
		$this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_import', $data);
		// redirect(site_url('Tr_Data_Kerja_Csl/Tr_Data_Kerja_Csl_Controller'));
	}

	public function filter(){
	 	$start_date = $this->input->post('start_date');
        $finish_date = $this->input->post('finish_date');
        $date1 = date_create($start_date);
    	$date2 = date_create($finish_date);	

        $data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getCSLByFilterDate($start_date, $finish_date);
        $data["date"] = "Data Survey CSL Periode ". date_format($date1, "d/m/Y") ." sampai ". date_format($date2, "d/m/Y") .".";
		$this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_export', $data);   
	}

	public function filterDateImport(){
	 	$start_date = $this->input->post('start_date');
        $finish_date = $this->input->post('finish_date');
        $date1 = date_create($start_date);
    	$date2 = date_create($finish_date);	

        $data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getCSLByFilterDateImport($start_date, $finish_date);
        $data["date"] = "Data Customer Condition Periode ". date_format($date1, "d/m/Y") ." sampai ". date_format($date2, "d/m/Y") .".";
		$this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_import', $data);
	}

	//untuk get data ke page edit
	public function edit($id) {
        $where = array('id' => $id);
        $data["status_telepon"] = $this->tr_data_kerja_cdb->getStatusTelepon();
        $data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->edit($where,'tr_data_kerja_csl') -> result();
        $this->load->view($this->session->userdata('id_role') == 3 ? 'agent_header' : 'admin_header', $data);
        $this->load->view('admin_footer');
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_edit', $data);
    }

    //update data ke database
    public function update() {
        $id = $this->input->post('id');
        $sales_date = $this->input->post('sales_date');
        $type_motor = $this->input->post('type_motor');
        $nama_pemilik = $this->input->post('nama_pemilik');
        $pekerjaan = $this->input->post('pekerjaan');
        $no_hp = $this->input->post('no_hp');
        $kode_md = $this->input->post('kode_md');
        $kode_dealer = $this->input->post('kode_dealer');
        $nama_dealer = $this->input->post('nama_dealer');
        $jawaban_1 = $this->input->post('jawaban_1');
        $jawaban_2 = $this->input->post('jawaban_2');
        $jawaban_2a = $this->input->post('jawaban_2a');
        $jawaban_3 = $this->input->post('jawaban_3');
        $jawaban_3a = $this->input->post('jawaban_3a');
        $jawaban_4 = $this->input->post('jawaban_4');
        $jawaban_5 = $this->input->post('jawaban_5');
        $jawaban_6 = $this->input->post('jawaban_6');
        $jawaban_7 = $this->input->post('jawaban_7');
        $jawaban_8 = $this->input->post('jawaban_8');
        $jawaban_9 = $this->input->post('jawaban_9');
        $keterangan_telepon = $this->input->post('keterangan_telepon');
        $keterangan_survey = $this->input->post('keterangan_survey');
        $upload_date = $this->input->post('upload_date');
        $penelpon = $this->input->post('penelpon');
        
		$STATUS_1_1 = $this->tr_data_kerja_cdb->getStatusTeleponByDeskripsi($keterangan_telepon);
		foreach ($STATUS_1_1 as $value) {
	        $status_telepon1 = $value->status_telepon;
    	} 
		$status_telepon = $status_telepon1;
		date_default_timezone_set('Asia/Jakarta');
		$waktu_telepon = date("h:i:s");
		$tanggal = date("Y/m/d");

        $tr_data_kerja_csl = array (
	        'sales_date' => $sales_date,
	        'pekerjaan' => $pekerjaan,
	        'nama_pemilik' => $nama_pemilik,
	        'type_motor' => $type_motor,
	        'no_hp' => $no_hp,
	        'kode_md' => $kode_md,
	        'kode_dealer' => $kode_dealer,
	        'nama_dealer' => $nama_dealer,
	        'jawaban_1' => $jawaban_1,
	        'jawaban_2' => $jawaban_2,
	        'jawaban_2a' => $jawaban_2a,
	        'jawaban_3' => $jawaban_3,
	        'jawaban_3a' => $jawaban_3a,
	        'jawaban_4' => $jawaban_4,
	        'jawaban_5' => $jawaban_5,
	        'jawaban_6' => $jawaban_6,
	        'jawaban_7' => $jawaban_7,
	        'jawaban_8' => $jawaban_8,
	        'jawaban_9' => $jawaban_9,
	        'keterangan_telepon' => $keterangan_telepon,
	        'keterangan_survey' => $keterangan_survey,
	        'upload_date' => $upload_date,
	        'penelpon' => $penelpon,
	        'status_telepon' => $status_telepon,
	        'tanggal' => $tanggal,
	        'waktu_telepon' => $waktu_telepon
        );
        $where = array (
            'id' => $id
        );

        $this->tr_data_kerja_csl->update($where,$tr_data_kerja_csl,'tr_data_kerja_csl');
        $this->session->userdata('id_role') == 3 ? redirect(site_url('Tr_Data_Kerja_Csl/Tr_Data_Kerja_Csl_Controller/indexAgent')) : redirect(site_url('Tr_Data_Kerja_Csl/Tr_Data_Kerja_Csl_Controller'));
    }

    public function indexAgent() {
    	$nrp = $this->session->userdata('nrp');
		$data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getAllByAgent($nrp);
        $this->load->view('agent_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_agent', $data);
	}

	public function export() {
		$data["tr_data_kerja_csl"] = $this->tr_data_kerja_csl->getAllToExport();
		$data["date"] = '';
        $this->load->view('admin_header', $data);
        $this->load->view('admin_footer', $data);
		$this->load->view('tr_data_kerja_csl/tr_data_kerja_csl_export', $data);
	}
}
?>
