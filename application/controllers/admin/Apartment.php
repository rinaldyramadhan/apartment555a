<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') == 'Admin') {
			# code...
		} else {
			redirect('home');
		}
	}

	public function index($page = 'admin/apartment/hal_apartment')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$this->load->view($this->template,$data);
	}

	public function tambah($page = 'admin/apartment/tambah_apartment')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$apartment->rules();

		if ($this->form_validation->run() == false ) {
			
			$this->load->view($this->template,$data);

		} else {

			$this->session->set_flashdata('pesan','<div class="alert alert-success">
				Berhasil menambahkan data
			</div>');

			$apartment->save();

			redirect('admin/apartment');
		}
	}

	public function edit($id='', $page = 'admin/apartment/edit_apartment')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoinById($id);

		$apartment->rules();
		if ($id) {
			if ($this->form_validation->run() == false ) {
				
				$this->load->view($this->template,$data);

			} else {

				$this->session->set_flashdata('pesan','<div class="alert alert-success">
					Berhasil mengubah apartment
				</div>');

				$apartment->update($id);

				redirect('admin/apartment');

			}
			
		} else {
			redirect('admin/apartment');
		}
	}

	public function hapus($id)
	{
		$apartment = $this->M_apartment;
		$apartment->delete($id);
		redirect('admin/apartment');
	}

	public function ubah_status($id,$id_apartment)
	{
		if ($id == 'Tersewa') {
			$data = [
				'status_apartment' => 'Tersedia'
			];
			$this->db->where('id_apartment', $id_apartment);
			$this->db->update('tb_apartment',$data);
			redirect('admin/apartment');

		} elseif ($id == 'Tersedia') {
			$data = [
				'status_apartment' => 'Proses'
			];
			$this->db->where('id_apartment', $id_apartment);
			$this->db->update('tb_apartment',$data);
			redirect('admin/apartment');

			
		} elseif ($id == 'Proses') {
			$data = [
				'status_apartment' => 'Tersewa'
			];
			$this->db->where('id_apartment', $id_apartment);
			$this->db->update('tb_apartment',$data);
			redirect('admin/apartment');

			
		}
	}


}