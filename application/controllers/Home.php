<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = 'home')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;
		$user	=	$this->M_user;
		$sewa = $this->M_sewa;

		$data['sewa'] = $sewa->get()->result_array();

		/*$datenow = date('Y-m-d');
		$tgl = $this->db->get_where('detail_sewa',['tgl_selesai'=>$datenow])->row_array();
		$id = $tgl['id_apartment'];

		echo $id;*/

		$sistem = $this->M_sistem;
		echo $sistem->timer();
		/*echo $sistem->timerSewa();*/

		$data['content'] = $apartment->getJoin();


		$this->load->view($this->template,$data);
	}

	public function detail($id,$page = 'user/home/detail_apartment')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$berita	=	$this->M_apartment;

		$data['content'] = $berita->getJoinById($id);
		$c = $this->db->get_where('tb_apartment',['id_apartment'=>$id])->row();

		/*var_dump($c);*/

		if ($c == '') {
			redirect('');
		} else {

			$this->load->view($this->template,$data);
		}
	}

	public function contact($page = 'user/home/contact')
	{
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$this->load->view($this->template,$data);
	}


}
