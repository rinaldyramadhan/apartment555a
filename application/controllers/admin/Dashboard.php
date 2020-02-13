<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role')=='Admin') {
		} else {
			redirect('home');
		}
	}

	public function index($page = 'admin/dashboard')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$this->load->view($this->template,$data);
		
		$sistem = $this->M_sistem;
		echo $sistem->timer();
		/*echo $sistem->timerSewa();*/

	}


	public function setting($page = 'admin/dashboard/setting')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$this->load->view($this->template,$data);
	}


}