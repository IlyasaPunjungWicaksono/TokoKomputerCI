<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Kategori extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori','kat');
	}
	public function index()
	{
		$data['tampil_kategori']=$this->kat->menampilkan();
		$data['konten']="v_kategori";
		$data['judul']= "Laman Kategori";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		if ($this->input->post('simpan')) {
			if ($this->kat->simpan_kat()) {
				$this->session->set_flashdata('pesan','Sukses Menambah Kategori');
				redirect('kategori','refresh');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal Menambah Kategori');
				redirect('kategori','refresh');
			}
		}
	}
	public function hapus($id_kategori)
	{
		if ($this->kat->hapus($id_kategori)) {
			$this->session->set_flashdata('pesan', 'Sukses Menghapus');
			redirect('kategori','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Menghapus');
			redirect('kategori','refresh');
		}
	}
	
	public function edit_kategori($id)
	{
		$data=$this->kat->detail($id);
		echo json_encode($data);
	}
	public function kategori_update()
	{
		if ($this->input->post('edit')) {
			if ($this->kat->edit_kat()) {
				$this->session->set_flashdata('pesan', 'Sukses Update Kategori');
				redirect('kategori','refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Gagal Update Kategori');
			redirect('kategori','refresh');
		}
		
	}
}

/* End of file Kategori.php */
?>