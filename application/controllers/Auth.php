<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{

		public function __construct()
	{
		parent::__construct();
		$this->load->model('pelaporan_model');
	}
	
		function index()
		{
			if(isset($_POST['submit']))
			{
				$kode_unik = $this->input->post('kode_unik');
				$password = $this->input->post('password');
				$berhasil = $this->pelaporan_model->login ($kode_unik, $password);
				if($berhasil){

				if($berhasil==1) 
				{
					$data = array('kode_unik' => $kode_unik
				);
					$this->session->set_userdata($data);
					// $data = [
					// 		'kode_unik' => $data_laporan['kode_unik']
					// ];				
					// 		$this->session->set_userdata($data);

					// echo "test".$data_laporan['kode_unik'];
						redirect('user/laporanakhir');
				}
				 else 
				{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username &/ Password salah </div>');
						redirect('lihatLaporan');
				}

					}
			}

			else{
				$this->load->view('login');
			}

		}

	// function registrasi
		public function registration()
	{	
		$data['semua_pengguna'] = $this->pelaporan_model->registrasi();
			$this->load->view ('registration',$data);
	} 
		public function registrationAdmin(){
			$this->form_validation->set_rules('kode_unik','Kode_unik','required|trim');
			$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
			$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if ( $this->form_validation->run() == false) {
			$this->load->view ('registration',$data);
	
	} 
		else 
	{
		
		$data = array (
			'kode_unik' => htmlspecialchars($this->input->post('kode_unik',true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), 
			'role_id' => 1, 
			'date_created'=>time());

			$this->pelaporan_model->updatepassword($kode_unik,$password);
			redirect('auth');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congraturlation! your account has been Created. Please Login</div>');
	}

			$this->load->view('registrationAdmin');
	}



		public function logout()
	{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Log Out Successful</div>');
			redirect ('user');

	}

	public function blocked()
	{

		echo "access blocked";

		}
	}
		


