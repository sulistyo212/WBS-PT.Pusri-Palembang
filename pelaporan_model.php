<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class pelaporan_model extends CI_Model {

  public $kode_unik;

     public function __construct()
     {
          parent::__construct();

          $this->load->database();
     }


      public function semua()
     {
          $this->db->select('*');
          $this->db->from('data_laporan');
          $this->db->order_by('id_laporan', 'DESC');
          return $this->db->get();

     }

     public function detaillaporan($kode_unik)
     {
      $this->db->select('*');
      $this->db->from('data_laporan');
      $this->db->where('data_laporan.kode_unik',$kode_unik);
      $result= $this->db->get();
      return $result;
     
      // $data = array();
      // $options = array('kode_unik' => $kode_unik);
      // $Q = $this->db->get_where('data_laporan',$options,1);
      // if ($Q->num_rows() > 0){
      // $data = $Q->row_array();
      //  }
      // $Q->free_result();
      // return $data;

     }


     public function tambah($data)
    {
      $this->db->insert('data_laporan', $data);
     return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
	public function jenislaporan($data)
	{
		$this->db->insert('data_laporan', $data);
		return ($this->db->affected_rows()>0)? TRUE : FALSE;

	}


      public function lihat_laporan()
     {
          $this->db->select('*');
          $this->db->from('data_laporan');
          $this->db->order_by('id_laporan', 'DESC');
          $this->db->limit(1);
          return $this->db->get();

     }

     public function cek_kode_unik()
    
     {
     $query = $this->db->query("SELECT MAX(kode_unik) as kodeunik from data_laporan");
     $hasil = $query->row();
     return $hasil->kodeunik;
     }


   }