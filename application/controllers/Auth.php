<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		
		$this->form_validation->set_rules('email','Email','required|trim|valid_email',[
			'required'	=>	'Email tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password','Password','required|trim',[
			'required'	=>	'Password tidak boleh kosong'
		]);

		if ($this->form_validation->run() == FALSE ) {

		$this->template('login');

		} else {

			$this->_login();
		}

	}
	public function template($page,$data='')
	{
		
		
			$this->load->view('templates/head');
			$this->load->view('auth/'.$page,$data);
			$this->load->view('templates/footer');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
			
		
	} 

	function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$penyewa = $this->db->get_where('penyewa',['email'=>$email])->row_array();
		$admin = $this->db->get_where('admin',['email'=>$email])->row_array();

		if ($admin || $penyewa) {

			if ( password_verify($password,$penyewa['password']) || ($password == $admin['password']) || password_verify($password,$admin['password']) ) {
				
				if ($admin['role'] == 'Admin') {
					
					$data 	=	[
						'email'		=>	$admin['email'],
						'role'		=>	$admin['role'],
					];

					$this->session->set_userdata($data);

					redirect('admin/dashboard');

				} elseif ($penyewa['role'] == 'Penyewa') {

					$data =		[

						'email'		=>	$penyewa['email'],
						'role'		=>	$penyewa['role'],
						'role'		=>	$penyewa['role'],
					];	

					$this->session->set_userdata($data);

					redirect('user/dashboard');

				}
			
			} else {

				$this->session->set_flashdata('pesan','<div class="alert alert-danger">
					Anda salah memasukan password !
				</div>');

				redirect('login');
			}
		} else {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger">
				Email tidak terdaftar / salah email !
			</div>');

			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_sewa');

		$this->session->set_flashdata('pesan','<div class="alert alert-success">
				Berhasil melakukan logout
			</div>');

		redirect('login');
	}

	public function register()
	{

		$register = $this->M_auth;

		$this->form_validation->set_rules('nama','Nama', 'required|trim|min_length[3]',[
			'required'	=>	'Nama lengkap tidak boleh kosong',
			'min_length'	=>	'Nama lengkap minimal 3 Karakter'
		]);
		$this->form_validation->set_rules('no_hp','no_hp', 'required|trim|min_length[13]|numeric',[
			'required'	=>	'Nomor HP / Telpon tidak boleh kosong',
			'min_length'	=>	'Nomor HP / Telpon minimal 13 Karakter',
			'numeric'	=>	'Nomor HP / Telpon hanya boleh dengan angka'
		]);
		$this->form_validation->set_rules('alamat','Alamat', 'required|trim|min_length[3]',[
			'required'	=>	'Alamat tidak boleh kosong'
		]);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[penyewa.email]',[
			'required'	=>	'Email tidak boleh kosong',
			'is_unique'	=>	'Email Sudah digunakan'
		]);
		$this->form_validation->set_rules('password','Password', 'required|trim|min_length[3]|matches[konfirmasi_password]',[
			'required'	=>	'Password tidak boleh kosong',
			'matches'	=>	'Password tidak sama silahkan cek lagi'
		]);
		$this->form_validation->set_rules('konfirmasi_password','Password', 'required|trim|min_length[3]',[
			'required'	=>	'Konfirmasi password tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->template('register');

		} else {


			$register->save();

			$this->session->set_flashdata('pesan','<div class="alert alert-success">
				Berhasil melakukan register
			</div>');

			redirect('login');

		}
	}




}