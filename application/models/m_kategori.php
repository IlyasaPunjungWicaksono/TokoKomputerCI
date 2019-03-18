<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class m_kategori extends CI_Model
{

	public function menampilkan()
		{
			$tampil= $this->db->get('kategori')->result();
			return $tampil;
		}	
		public function simpan_kat()
		{
			$object=array(
				'id_kategori'=>$this->input->post('id_kategori'),
				'nama_kategori'=>$this->input->post('nama_kategori'),
				);
			return $this->db->insert('kategori', $object);
		}

	public function hapus($id_kategori)
	{
		return $this->db->where('id_kategori',$id_kategori)->delete('kategori');
	}
	
	public function detail($a)
	{
		return $this->db->where('id_kategori', $a)->get('kategori')->row();
	}
	public function edit_kat()
	{
		$object=array(
			'id_kategori'=>$this->input->post('id_kategori'),
			'nama_kategori'=>$this->input->post('nama_kategori')
		);
		return $this->db->where('id_kategori',$this->input->post('id_kategori_lama'))->update('kategori',$object);
	}
}

/* End of file m_kategori.php */
?>