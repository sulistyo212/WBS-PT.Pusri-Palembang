<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

 public function __construct()
     {
          parent::__construct();

          $this->load->model('pelaporan_model');
          $this->load->helper(array('url','download'));   
           is_logged_in();

    }
     
	public function index()
     {
    	$data['semua_pengguna'] = $this->pelaporan_model->semua();
  		$data['adminlogin'] = $this->db->get_where('adminlogin', ['email' => 
  		$this->session->userdata('email')])->row_array();
      $this->load->view('viewadmin',$data);
     }

	   public function lihatdetailadm($kode_unik)
     {
      $data['semua_penggunaa'] = $this->pelaporan_model->detaillaporan($kode_unik);
      $data['data_laporan'] = $this->pelaporan_model->detaillaporan($this->uri->segment(3));
      $this->load->view('detailaduanAdm', $data);
     }

      public function editstatus()
      {
      $kode_unik= $this->input->post('kode_unik');
      $statuspelaporan= $this->input->post('statuspelaporan');
        
      $data = array(
        'kode_unik' => $kode_unik,
        'statuspelaporan' => $statuspelaporan
        );
      $this->pelaporan_model->updatestatus($kode_unik,$statuspelaporan);
      redirect('admin');
      }

      public function editkomentar()
      {
      $kode_unik= $this->input->post('kode_unik');
      $komentar= $this->input->post('komentar');    
      $data = array(
        'kode_unik' => $kode_unik,
        'komentar' => $komentar
        );
      $this->pelaporan_model->masukkankomentar($kode_unik,$komentar);
      redirect('admin');
      }

    
}