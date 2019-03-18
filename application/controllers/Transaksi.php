<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_transaksi','trans');
		$this->load->model('m_barang','barang');
	}

	public function index()
	{
		$data['tampil_barang']=$this->barang->tampil();
		$data['judul']="Transaksi";
		$data['konten']="v_transaksi";
		$this->load->view('template', $data);
	}
	public function addcart($id)
	{
		$detail = $this->barang->detail($id);

		$data = array(
			'id' => $detail->id_barang, 
			'qty' => 1, 
			'price' => $detail->harga, 
			'name' => $detail->nama_barang,
			'options' => array('genre' => $detail->nama_kategori)
		);

		$this->cart->insert($data);
		redirect('transaksi','refresh');
	}
	public function simpan()
	{
		if ($this->input->post('update')) {
			for ($i=0;$i<count($this->input->post('rowid'));$i++) { 
				$data = array(
					'rowid' => $this->input->post('rowid')[$i],
					 'qty' => $this->input->post('qty')[$i]
				);
				$this->cart->update($data);
			}
				redirect('transaksi','refresh');
		}elseif ($this->input->post('bayar')) {
			$cek_nota =$this->trans->check();
			if ($cek_nota == 1) {
				$id=$this->trans->simpan_cart_db();
				if ($id) {
					$bayar = $this->input->post('uang_bayar');
					$total = $this->cart->total();

					$kembalian = $bayar - $total;

					$this->session->set_flashdata('pesan', 'sukses simpan');
					$this->session->set_flashdata('kembalian', $kembalian);
					$this->session->set_flashdata('bayar', $bayar);
					$data['transaksi']=$this->trans->detail_nota($id);
					$this->cart->destroy();
					$this->load->view('cetak_nota', $data);
				}
			}else{
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('transaksi','refresh');
			}
		}
	}
	public function hapus_cart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('transaksi','refresh');
	}
	public function clearcart()
	{
		$this->cart->destroy();
		redirect('transaksi','refresh');
	}


}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */