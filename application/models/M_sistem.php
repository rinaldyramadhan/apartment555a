<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sistem extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function timer()
	{
		$sewa = $this->db->get('sewa')->result_array();

		$datenow = date('Y-m-d');
 		
 		/*sistem durasi sewa auto delete jika habis waktu*/
 		foreach ($sewa as $s) :
 			$durasiJatuhTempo = (abs(strtotime($s['tgl_jatuhtempo'])-strtotime($datenow))/(60*60*24)) ;

 			if ($durasiJatuhTempo == 0) {

 				/*cek status sewa jika lunas tidak melakukan apa2*/
 				if ($s['status_sewa'] == 'Lunas') {
 					# Tidak melakukan apa2
 				} elseif ($s['status_sewa'] ==  'Menunggu Pembayaran' || $s['status_sewa'] ==  'Menunggu Pembayaran Lunas' ) {

	 				/*$data = [
	 					'status_apartment'	=>	'Tersedia'
	 				];
	 				$this->db->where('status_apartment','Tersewa');
	 				$this->db->update('tb_apartment',$data);*/

	 				/* menghapus field berdasarkan id sewa jika durasi sudah 0*/
	 				/*$this->db->where('id_sewa',$s['id_sewa']);
	 				$this->db->delete('detail_sewa');*/

	 				/* menghapus hapus field berdasarkan tgl jatuh tempo jika durasi sudah 0*/
	 				$data = [

	 					'status_sewa'		=>			'Dibatalkan'
	 				];
	 				$this->db->where('status_sewa','Menunggu Pembayaran');
	 				$this->db->update('sewa',$data);
	 				$this->db->where('status_sewa','Menunggu Pembayaran Lunas');
	 				$this->db->delete('sewa',$data);
 				}
 			} else {
 			}
 		endforeach;

	}

	/* TIMER SELESAI SEWA*/

	/* ERROR */

	/*public	function timerSewa()
	{
		$detailSewa = $this->db->get('detail_sewa')->result_array();

		$datenow = date('Y-m-d');
		$tgl = $this->db->get_where('detail_sewa',['tgl_selesai'=>$datenow])->row_array();
		$id = $tgl['id_apartment'];

		foreach ($detailSewa as $s) {
			$durasiSelesaiSewa = (abs(strtotime($s['tgl_selesai'])-strtotime($datenow))/(60*60*24)) ;

			if ( $durasiSelesaiSewa == 0 ) {

				$data = [
	 					'status_apartment'	=>	'Tersedia'
	 				];
	 				$this->db->where('id_apartment',$id);
	 				$this->db->update('tb_apartment',$data);
			} else {

			} 
		}
	}*/


}

