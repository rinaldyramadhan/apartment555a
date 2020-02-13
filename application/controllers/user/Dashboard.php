<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = 'user/dashboard/dashboard')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		
		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		/* fungsi durasi sewa auto delete */
		$sistem = $this->M_sistem;
		echo $sistem->timer();

		/*cek user apakah ada didalam database*/
		if ($penyewa) {
			$this->load->view($this->template,$data);
		} else {

			/* Pesan cek user jika email tidak terdaftar*/
			$this->session->sess_destroy();
			redirect('');
		}
	}

	public function setting($id= '', $page = 'user/dashboard/setting')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
		
		$user = $this->M_user;

		$user->rules();

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view($this->template,$data);


		} else {

			$user->act_edit($id);

			$this->session->set_flashdata('pesan','<div class="alert alert-success">
				Berhasil melakukan pembaruan
			</div>');

			redirect('user/dashboard');

		}

	}

}