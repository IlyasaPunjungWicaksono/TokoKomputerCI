<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_barang','barang');
	}

	public function index()
	{
		$data['tampil_barang']=$this->barang->tampil();
		$data['kategori']=$this->barang->data_kategori();
		$data['konten']="v_barang";
		$data['judul']="Daftar Barang";
		$this->load->view('template', $data);
	}
	public function toko()
	{
		$data['tampil_barang']=$this->barang->tampil();
		$data['kategori']=$this->barang->data_kategori();
		$data['konten']="toko";
		$data['judul']="Toko Komputer";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'merk', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['foto_cover']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto_cover')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->barang->simpan_barang($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}else{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('barang','refresh');
				}
			}else{
				if ($this->barang->simpan_barang('')) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('barang','refresh');
			}
			
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('barang','refresh');
		}
	}
	public function edit_barang($id)
	{
		$data=$this->barang->detail($id);
		echo json_encode($data);
	}
	public function barang_update()
	{
		if($this->input->post('edit')){
			if($_FILES['foto_cover']['name']==""){
				if($this->barang->edit_barang()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('barang');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('barang');
				}
			} else {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto_cover')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('barang');
				}
				else{
					if($this->barang->edit_barang_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('barang');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('barang');
					}
				}
			}
			
		}

	}
	public function hapus($id_barang='')
	{
		if ($this->barang->hapus_barang($id_barang)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Barang');
			redirect('barang','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Hapus Barang');
			redirect('barang','refresh');
		}
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */