<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function getTransaksi()
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa', 'detail_sewa.id_sewa = sewa.id_sewa');
		$this->db->where('sewa.id_sewa',$this->session->userdata('id_sewa'));
		return $this->db->get();
	}

	public function getTransaksi2($id)
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa', 'detail_sewa.id_sewa = sewa.id_sewa');
		$this->db->where('sewa.id_sewa',$id);
		return $this->db->get();
	}

	public function batal($id_sewa)
	{
		$this->db->where('id_sewa',$id_sewa);
		$this->db->delete('sewa');
		$this->db->where('id_sewa',$id_sewa);
		$this->db->delete('detail_sewa');

		$this->session->unset_userdata('id_sewa');

		/* membuat session pesan */
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil membatalkan sewa</div>');

		redirect('');
	}

	public function batalById($id_apartment)
	{
		$this->db->where('id_apartment',$id_apartment);
		$this->db->delete('detail_sewa');


		/* membuat session pesan */
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil membatalkan sewa</div>');

		redirect('user');

	}


	/* menghitung total */
	public function getTotal()
	{
		$this->db->select_sum('total_harga');
		$this->db->where('id_sewa',$this->session->userdata('id_sewa'));
		$query = $this->db->get('detail_sewa');
		if ($query->num_rows()>0) {
			return $query->row()->total_harga;

		} else {
			return 0;
		}

	}

		public function getTotalDP()
	{
		$this->db->select_sum('dp');
		$this->db->where('id_sewa',$this->session->userdata('id_sewa'));
		$query = $this->db->get('detail_sewa');
		if ($query->num_rows()>0) {
			return $query->row()->dp;

		} else {
			return 0;
		}

	}

		public function getTotalDPbyId($id)
	{
		$this->db->select_sum('dp');
		$this->db->where('id_sewa',$id);
		$query = $this->db->get('detail_sewa');
		if ($query->num_rows()>0) {
			return $query->row()->dp;

		} else {
			return 0;
		}

	}

	/* menghitung total */
	public function getTotal2($id)
	{
		$this->db->select_sum('total_harga');
		$this->db->where('id_sewa',$id);
		$query = $this->db->get('detail_sewa');
		if ($query->num_rows()>0) {
			return $query->row()->total_harga;

		} else {
			return 0;
		}

	}





}