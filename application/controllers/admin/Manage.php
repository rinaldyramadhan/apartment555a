<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role')=='Admin') {
		} else {
			redirect('home');
		}
	}

	public function index($page = 'admin/manage/v_manage')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
		$admin	=	$this->M_manage;

		$data['content'] = $admin->getAdmin();

		$this->load->view($this->template,$data);
	}

	public function admin($page = 'admin/manage/v_manage')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
			
		$adm	=	$this->M_manage;
		$data['content'] = $adm->getAdmin();


		$this->load->view($this->template,$data);
	}




	public function updateAdmin($id='', $page = 'admin/manage/update_admin')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$cekadmin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();


		$data['kontenDinamis']	=	$page;
			
		$admin	=	$this->M_manage;
		$data['content'] = $admin->getAdmin();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email tidak boleh kosong'
		]);

		$this->form_validation->set_rules('role', 'Role', 'required|trim', [
			'required' => 'Role tidak boleh kosong'
		]);

		if ($cekadmin == true) {
			
			if ($this->form_validation->run() == false) {
				
				$this->load->view($this->template,$data);
				
			} else {

				$admin->updateAdmin($id);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					Berhasil mengupdate!
				</div>');

				redirect('admin/manage/admin','refresh');

			}

				
		} else {

			redirect('logout','refresh');

		}
	}

	public function tambahAdmin($page = 'admin/manage/tambah_admin')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$cekadmin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();


		$data['kontenDinamis']	=	$page;
			
		$admin	=	$this->M_manage;
		$data['content'] = $admin->getAdmin();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email tidak boleh kosong'
		]);

		$this->form_validation->set_rules('role', 'Role', 'required|trim', [
			'required' => 'Role tidak boleh kosong'
		]);

		if ($cekadmin == true) {
			
			if ($this->form_validation->run() == false) {
				
				$this->load->view($this->template,$data);
				
			} else {

				$admin->tambahAdmin();

				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					Berhasil menambahkan admin!
				</div>');

				redirect('admin/manage/admin','refresh');

			}

				
		} else {

			redirect('logout','refresh');

		}
	}

	public function deleteAdmin($id='')
	{
		$delete = $this->M_manage;

		$delete->deleteAdmin($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus!
		</div>');

		redirect('admin/manage/');
	}

	public function user($page = 'admin/manage/v_manageUser')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
			
		$penyewa	=	$this->M_manage;
		$data['content'] = $penyewa->getPenyewa();


		$this->load->view($this->template,$data);
	}

	public function deleteUser($id='')
	{
		$delete = $this->M_manage;

		$delete->deleteUser($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			Berhasil menghapus!
		</div>');

		redirect('admin/manage/user');
	}

}