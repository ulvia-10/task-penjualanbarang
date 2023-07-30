<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_Model extends CI_Model{		
        
		function cek_login($table,$where){		
            return $this->db->get_where($table,$where);
        }

        private $_table = "pengguna";

        public function getByNamaPengguna()
		{
			$post = $this->input->post();
			$NamaPengguna = $post["NamaPengguna"];
			$Password = $post["Password"];
			$array = array('NamaPengguna' => $NamaPengguna, 'Password' => $Password);
			$query = $this->db->get_where($this->_table,$array);
			return $query->row();
		}
	}
?>