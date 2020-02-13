<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sewa extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function rules(){

		$this->form_validation->set_rules('tgl_mulai','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Check In Wajib Di Isi'
		]);
		/*$this->form_validation->set_rules('alamat_apartment','Alamat Apartment', 'required|trim',[

			'required'	=>	'Perhatian Alamat Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('harga_apartment','Harga Apartment', 'required|trim',[

			'required'	=>	'Perhatian Harga Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);
*/

	}

	public function get()
	{
		return $this->db->get('sewa');

	}
	public function get2()
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('konfirmasi','konfirmasi.id_sewa=sewa.id_sewa');
		return $this->db->get();

	}

	public function getLaporan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$tgl = $tahun.'-'.$bulan;

		$this->db->like('tgl_sewa', $tgl);
		return $this->db->get('sewa');

	}

	public function getJoin()
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa','detail_sewa.id_sewa=sewa.id_sewa');
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

	public function getById($id)
	{
		return $this->db->get_where('tb_apartment',['id_apartment'=>$id]);
	}

	public function save()
	{
		$idSewa = uniqid();
		$harga_apartment = $this->input->post('harga_apartment');
		$lama_sewa	=	$this->input->post('lama_sewa');
		$total_harga	=	$lama_sewa*$harga_apartment;
		$tgl_mulai	=	$this->input->post('tgl_mulai');
		$tgl_sekarang = date('Y-m-d');

		/* batas waktu atau jatuh tempo*/
		$jatuhtempo_DP  = date('Y-m-d', strtotime("+".'1'." day",strtotime($tgl_sekarang)));
		$jatuhtempo_BP  = date('Y-m-d', strtotime("+".'3'." day",strtotime($tgl_sekarang)));
		/*=============================*/
		$payment = $this->input->post('payment');
		if ($payment == 'Bayar Penuh') {
			$dp = 0;
		} else {
			$dp = $total_harga*0.10;
		}
		$tgl_selesai	=	date('Y-m-d', strtotime("+".$lama_sewa."month",strtotime($tgl_mulai)));

		$ses_id_sewa	=	$this->session->userdata('id_sewa');

		/* UNTUK KERANJANG SEWA CEK SESSION TERLEBIH DAHULU, jika session ada masukan data2*/
		if ($ses_id_sewa) {
			

			$data2 = [
				'id_sewa'	=>	$ses_id_sewa,
				'id_apartment'	=>	$this->input->post('id_apartment'),
				'nama_apartment'	=>	$this->input->post('nama_apartment'),
				'alamat_apartment'	=>	$this->input->post('alamat_apartment'),
				'harga_apartment'	=>	$harga_apartment,
				'lama_sewa'	=>	$this->input->post('lama_sewa'),
				'tgl_mulai'	=>	$this->input->post('tgl_mulai'),
				'tgl_selesai'	=>	$tgl_selesai,
				'dp'	=>	$dp,
				'total_harga' => ($total_harga)
			];

			$this->db->insert('detail_sewa',$data2);

		} else {
		

			/*DATA 3 BERISIKAN SESSION UNTUK DIPANGGIL KE HALAMAN TRANSAKSI*/
			$data3 = [

				'id_sewa'	=>	$idSewa,
				'payment'	=>	$payment

			];

			$this->session->set_userdata($data3);

			if ($payment == 'Bayar DP') {

				$data1 = [
					'id_sewa'	=>	$idSewa,
					'id_penyewa'	=>	$this->input->post('id_penyewa'),
					'nama_penyewa'	=>	$this->input->post('nama_penyewa'),
					'alamat'	=>	$this->input->post('alamat'),
					'no_hp'	=>	$this->input->post('no_hp'),
					'tgl_sewa'	=>	date('Y-m-d'),
					'status_sewa'	=>	'Menunggu Pembayaran',
					'tgl_jatuhtempo'	=> $jatuhtempo_DP,
					'payment'	=>	$payment

				];

				$dataDP = [
					'id_sewa'	=>	$idSewa,
					'id_apartment'	=>	$this->input->post('id_apartment'),
					'nama_apartment'	=>	$this->input->post('nama_apartment'),
					'alamat_apartment'	=>	$this->input->post('alamat_apartment'),
					'harga_apartment'	=>	$harga_apartment,
					'lama_sewa'	=>	$this->input->post('lama_sewa'),
					'tgl_mulai'	=>	$this->input->post('tgl_mulai'),
					'tgl_selesai'	=>	$tgl_selesai,
					'dp'	=>	$dp,
					

					
					'total_harga' => ($total_harga)
				];

				$data3 = [

					'id_sewa'	=>	$idSewa,
					'payment'	=>	$payment

				];


				$this->session->set_userdata($data3);
				$this->db->insert('sewa',$data1);
				$this->db->insert('detail_sewa',$dataDP);

			} else {

				$data1 = [
					'id_sewa'	=>	$idSewa,
					'id_penyewa'	=>	$this->input->post('id_penyewa'),
					'nama_penyewa'	=>	$this->input->post('nama_penyewa'),
					'alamat'	=>	$this->input->post('alamat'),
					'no_hp'	=>	$this->input->post('no_hp'),
					'tgl_sewa'	=>	date('Y-m-d'),
					'status_sewa'	=>	'Menunggu Pembayaran',
					'tgl_jatuhtempo'	=> $jatuhtempo_BP,
					'payment'	=>	$payment

				];

				$dataBP = [
					'id_sewa'	=>	$idSewa,
					'id_apartment'	=>	$this->input->post('id_apartment'),
					'nama_apartment'	=>	$this->input->post('nama_apartment'),
					'alamat_apartment'	=>	$this->input->post('alamat_apartment'),
					'harga_apartment'	=>	$harga_apartment,
					'lama_sewa'	=>	$this->input->post('lama_sewa'),
					'tgl_mulai'	=>	$this->input->post('tgl_mulai'),
					'tgl_selesai'	=>	$tgl_selesai,
					'dp'	=>	$dp,
					

					
					'total_harga' => ($total_harga-$dp)
				];

				$this->session->set_userdata($data3);
				$this->db->insert('sewa',$data1);
				$this->db->insert('detail_sewa',$dataBP);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">
					Berhasil Silahkan melakukan pembayaran Penuh, Batas Waktu pembayaran 1-3 Hari
				</div>');
			}

		}
	}

	public function delete($id)
	{
		$this->db->where('id_apartment',$id);
		$this->db->delete('tb_apartment');
	}


		public function getTotalDP($id)
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
	public	function getTotalHarga()
	{
		$this->db->select_sum('jumlah_total');
		$query = $this->db->get('sewa');

		if ($query->num_rows()>0) {
			return $query->row()->jumlah_total;
		} else {
			return;
		}
	}

	/* total detail_sewa*/
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

	public function getTotalDetail()
	{
		$this->db->select_sum('total_harga');
		$query = $this->db->get('detail_sewa');
		if ($query->num_rows()>0) {
			return $query->row()->total_harga;

		} else {
			return 0;
		}

	}

	public function getByTgl()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$tgl = $tahun.'-'.$bulan;

		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('detail_sewa', 'detail_sewa.id_sewa = sewa.id_sewa');
		$this->db->like('tgl_sewa', $tgl);
		$this->db->or_like('tgl_mulai', $tgl);
		return $this->db->get();
	}

	public	function getTotalHargaByTgl()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$tgl = $tahun.'-'.$bulan;
		$this->db->select_sum('jumlah_total');
		$this->db->like('tgl_sewa', $tgl);
		$this->db->like('status_sewa', 'Lunas');
		$query = $this->db->get('sewa');

		if ($query->num_rows()>0) {
			return $query->row()->jumlah_total;
		} else {
			return;
		}
	}

}
