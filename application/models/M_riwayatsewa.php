<?php

class M_riwayatsewa extends CI_Model{

	public function get()
	{
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$id = $penyewa['id_penyewa'];

		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->where('id_penyewa',$id);
		return $this->db->get();
	}

	public function getJoin()
	{
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$id = $penyewa['id_penyewa'];

		$this->db->select('*');
		$this->db->from('detail_sewa');
		$this->db->join('sewa','sewa.id_sewa=detail_sewa.id_sewa');
		$this->db->where('id_penyewa',$id);
		return $this->db->get();
	}

	public function getDetail($id)
	{
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa','detail_sewa.id_sewa=sewa.id_sewa');
		$this->db->where('detail_sewa.id_sewa',$id);
		return $this->db->get();
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

	public function getTotalById($id)
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

	public function getTotalDPById($id)
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
	
}