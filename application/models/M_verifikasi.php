<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_verifikasi extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function verifikasi()
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('konfirmasi','konfirmasi.id_sewa = sewa.id_sewa');
		$this->db->like('status_sewa', 'Menunggu');
		return $this->db->get();
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from('konfirmasi');
		$this->db->join('sewa','sewa.id_sewa = konfirmasi.id_sewa');
		$this->db->join('detail_sewa','detail_sewa.id_sewa = konfirmasi.id_sewa');
		return $this->db->get();
	}

	public function getId($id)
	{
		$this->db->select('*');
		$this->db->from('konfirmasi');
		$this->db->where('konfirmasi.id_konfirmasi',$id);
		return $this->db->get();
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('konfirmasi');
		$this->db->join('sewa','sewa.id_sewa = konfirmasi.id_sewa');
		$this->db->join('detail_sewa','detail_sewa.id_sewa = konfirmasi.id_sewa');
		$this->db->where('konfirmasi.id_konfirmasi',$id);
		return $this->db->get();
	}

	public function getJoinById($id)
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa','detail_sewa.id_sewa=sewa.id_sewa');
		/*return $this->db->get_where('sewa',['detail_sewa.id_sewa'=>$id]);*/
		$this->db->where('detail_sewa.id_sewa',$id);
		return $this->db->get();
	}

	public function act_update($id_konfirmasi, $id_sewa,$id_apartment)
	{	
		$id_konfirmasi = $this->input->post('id_konfirmasi');
		$status = $this->input->post('status_konfirmasi');
		$nominal_bayar = $this->input->post('nominal_bayar');

		if ($status == 'Lunas') {
			$datasewa = [
				'status_sewa'	=>		$this->input->post('status_konfirmasi'),
				'total_bayar'	=>		$nominal_bayar
			];

			$datakonfirmasi = [
				'status_konfirmasi'	=>		$this->input->post('status_konfirmasi'),
				'id_admin'	=>		$this->input->post('id_admin')
			];

			$dataapartment = [
				'status_apartment'	=>		'Tersewa'
			];

			$this->db->where('id_sewa', $id_sewa);
			$this->db->update('sewa',$datasewa);
			$this->db->where('id_konfirmasi', $id_konfirmasi);
			$this->db->update('konfirmasi',$datakonfirmasi);
			$this->db->where('id_apartment', $id_apartment);
			$this->db->update('tb_apartment',$dataapartment);

		} elseif ($status == 'Menunggu Pembayaran Lunas') {
			$data1 = [
				'status_sewa'	=>		$this->input->post('status_konfirmasi'),
				'total_bayar'	=>		$nominal_bayar
			];

			$data2 = [
				'status_konfirmasi'	=>		$this->input->post('status_konfirmasi')
			];

			$dataapartment = [
				'status_apartment'	=>		'Proses'
			];


			$this->db->where('id_apartment', $id_apartment);
			$this->db->update('tb_apartment',$dataapartment);

			$this->db->where('id_sewa', $id_sewa);
			$this->db->update('sewa',$data1);
			$this->db->where('id_konfirmasi', $id_konfirmasi);
			$this->db->update('konfirmasi',$data2);
		}

	}
}