<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function save()
	{
		$kode = $this->kode();
		$data = [
			'id_penyewa'	=>	$kode,
			'nama'	=>	$this->input->post('nama'),
			'foto_profil'	=>	'default.jpg',
			'no_hp'	=>	$this->input->post('no_hp'),
			'alamat'	=>	$this->input->post('alamat'),
			'email'	=>	$this->input->post('email',true),
			'password'	=>	password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
			'role'	=>	'Penyewa'
		];

		 return $this->db->insert('penyewa',$data);
	}



	public function kode(){
	  $this->db->select('RIGHT(penyewa.id_penyewa,2) as a', FALSE);
	  $this->db->order_by('id_penyewa','DESC');    
	  $this->db->limit(1);    
	  $query = $this->db->get('penyewa');  //cek dulu apakah ada sudah ada kode di tabel.    
	  if($query->num_rows() <> 0){      
		   //cek kode jika telah tersedia    
		   $data = $query->row();      
		   $kode = intval($data->a) + 1; 
	  }
	  else{      
		   $kode = 1;  //cek jika kode belum terdapat pada table
	  }
		  /*$tgl=date('my'); */
		  $urut = str_pad($kode, 4, "0", STR_PAD_LEFT);    /*4 ADALAH JUMLAH ANGKA NOL DIBELAKANG*/
		  $kodetampil = "IDP".$urut;  //format kode
		  return $kodetampil;  
	}

}