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

      public function tampil_userid()
      {
        $query= $this->db->query("SELECT * FROM data_laporan where kode_unik='kode_unik'");
        return $query->result();
      }

      public function lihatlaporan($kode_unik)
      {
        $this->db->select('*');
        $this->db->from('data_laporan');
        $this->db->where('data_laporan.kode_unik',$kode_unik);
        $result= $this->db->get();
        return $result;    
      }


     public function detaillaporan($kode_unik)
     {
      $this->db->select('*');
      $this->db->from('data_laporan');
      $this->db->where('data_laporan.kode_unik',$kode_unik);
      $result= $this->db->get();
      return $result;
     }

       public function registrasi()
     {
      $this->db->select('*');
      $this->db->from('data_laporan');
      $this->db->order_by('id_laporan', 'DESC');
      $this->db->limit(1);
      $result= $this->db->get();
      return $result;
     }

         public function liatdata()
     { 
        $this->db->select('*');
        $this->db->where('kode_unik','$kode_unik');
        $result = $this->db->get('data_laporan')->row();
        return $result;
     }
       //   function daftar($data)
       // {
       //    $this->db->insert('userlogin',$data);
       //    $id_user = $this->db->get_where('userlogin', $data)->row();
       //    $= array(
       //      'id_user' =>$id_user->id);
       //       return ($this->db->update('data_laporan',$dat_laporan) >0) ;

       // }




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


     // fungsi buat kode unik

     public function cek_kode_unik()
     {
        $query = $this->db->query("SELECT MAX(RIGHT(kode_unik,4)) AS kd_max from data_laporan where date(tanggal)=CURDATE()");
        $kd = "";
        if ($query->num_rows()>0) {
          foreach ($query->result() as $k) {
            $tmp = ((int)$k->kd_max)+9;
          }
        }else {
          $kd = "0011";
        }
          date_default_timezone_set('asia/jakarta');
        return date ('sish').$kd;


     // $query = $this->db->query("SELECT MAX(kode_unik) as kodeunik from data_laporan");
     // $hasil = $query->row();
     // return $hasil->kodeunik;
     }





     public function buatuserid()
     {
     $query = $this->db->query("SELECT MAX(id_user) as iduser from data_laporan");
     $hasil = $query->row();
     return $hasil->iduser;
     }

      public function updatestatus($kode_unik,$statuspelaporan){
      $hasil=$this->db->query("UPDATE data_laporan SET statuspelaporan='$statuspelaporan' WHERE kode_unik='$kode_unik'");
      return $hasil;
     }
      public function masukkankomentar($kode_unik,$komentar){
      $hasil=$this->db->query("UPDATE data_laporan SET komentar='$komentar' WHERE kode_unik='$kode_unik'");
      return $hasil; 
     }

      public function updatepassword($data){
      $hasil=$this->db->query("UPDATE data_laporan SET password='$password' WHERE id_laporan='$id_laporan'");
      return $hasil; 
     }

     public function regisAdmin(){
      $this->db->insert('adminlogin');
     }

     public function login($kode_unik,$password){
      $periksa = $this->db->get_where('data_laporan', array('kode_unik'=>$kode_unik,'password'=>$password));
      if ($periksa->num_rows()>0) {
       return 1;
      }
      else
      {
        return 0;
      }

     }


     public function cekData($kode_unik){
 $hsl=$this->db->query("SELECT * FROM data_laporan WHERE kode_unik='$kode_unik'");
        if($hsl->num_rows()>0)
        {
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kode_unik' => $data->kode_unik,
                    'aduan_pelapor' => $data->aduan_pelapor,
                    'date_created' => $data->date_created,
                    'uraian_pelapor' => $data->uraian_pelapor,
                    'statuspelaporan' => $data->statuspelaporan,
                );
            }
        }
        return $hasil;
    }



     public function download(){
        $query = $this->db->get_where('data_laporan',
                array('id_laporan'=>'id_laporan'));
        return $query->row_array();
 }

      // return $this->db->get_where('data_laporan',$data);

     }


         // public function ambil_data_laporan(){
         //   $this->db->select('*');
         //   $this->db->from('data_laporan');
         //   $this->db->where('data_laporan.useremail',$useremail);
         //   $result= $this->db->get();
         //   return $result;}

      