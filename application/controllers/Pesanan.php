<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pesanan','psn');
	}
	public function index()
	{
		$data['judul']="Histori Pesanan";
		$data['tampil_pesanan']=$this->psn->tm_pesanan();
		$data['konten']="v_pesanan";
		$this->load->view('template', $data);
	}
	public function detail_pesan($id)
	{
		$data=$this->psn->detail_pesanan($id);
	}

}

/* End of file Pesanan.php */
/* Location: ./application/controllers/Pesanan.php */