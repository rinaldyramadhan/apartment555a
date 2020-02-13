<?php
	class Cek extends CI_Controller {
		function halaman_cek () {
			$this->load->view('test/halaman_cek');

		}
		function formlogin () {
			$this->load->view ('test/formlogin');
		}
	} 

?>