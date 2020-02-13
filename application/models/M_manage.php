<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manage extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}

	public function rules(){

		$this->form_validation->set_rules('nama_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Nama Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('alamat_apartment','Alamat Apartment', 'required|trim',[

			'required'	=>	'Perhatian Alamat Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('harga_apartment','Harga Apartment', 'required|trim',[

			'required'	=>	'Perhatian Harga Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);


	}

	public function getAdmin()
	{
		return $this->db->get('admin');
	}

	public function updateAdmin($id)
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'role'	=> ucfirst($this->input->post('role'))
		];

		$this->db->where('id_admin', $id);
		$this->db->update('admin', $data);
	}

	public function tambahAdmin()
	{
		$role = $this->input->post('role');

		if ($role == 'Admin') {
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role'	=> $role
			];

			$this->db->insert('admin', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role'	=> $role
			];

			$this->db->insert('penyewa', $data);
		}
	}

	public function getPenyewa()
	{
		return $this->db->get('penyewa');
	}

	public function deleteUser($id)
	{
		$this->db->where('id_penyewa',$id);
		$this->db->delete('penyewa');
	}
	public function deleteAdmin($id)
	{
		$this->db->where('id_admin',$id);
		$this->db->delete('admin');
	}

}