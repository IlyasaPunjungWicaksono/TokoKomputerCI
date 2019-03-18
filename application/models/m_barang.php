<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_barang extends CI_Model {
    public function tampil()
    {
        $tm_barang=$this->db
                      ->join('kategori','kategori.id_kategori=barang.id_kategori')
                      ->get('barang')
                      ->result();
        return $tm_barang;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_barang($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'id_barang' => $this->input->post('id_barang'), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'merk' => $this->input->post('merk'),  
                'stok' => $this->input->post('stok')
             );
        }else{
            $object = array(
                'id_barang' => $this->input->post('id_barang'), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'merk' => $this->input->post('merk'),  
                'stok' => $this->input->post('stok'),
                'foto_cover' => $file_cover
             );
        }
        return $this->db->insert('barang', $object);
    }
    public function detail($a)
    {
        $tm_barang=$this->db
                      ->join('kategori', 'kategori.id_kategori=barang.id_kategori')
                      ->where('id_barang', $a)
                      ->get('barang')
                      ->row();
        return $tm_barang;
    }
    public function edit_barang()
    {
        $data = array(
            'id_barang' => $this->input->post('id_barang'), 
            'nama_barang' => $this->input->post('nama_barang'), 
            'id_kategori' => $this->input->post('id_kategori'), 
            'harga' => $this->input->post('harga'),
            'merk' => $this->input->post('merk'),  
            'stok' => $this->input->post('stok')
            );

        return $this->db->where('id_barang', $this->input->post('id_barang_lama'))
                        ->update('barang', $data);
    }
    public function edit_barang_dengan_foto($file_cover)
    {
        $data = array(
            'id_barang' => $this->input->post('id_barang'), 
            'nama_barang' => $this->input->post('nama_barang'), 
            'id_kategori' => $this->input->post('id_kategori'), 
            'harga' => $this->input->post('harga'),
            'merk' => $this->input->post('merk'),  
            'stok' => $this->input->post('stok'),
                'foto_cover' => $file_cover

            );

        return $this->db->where('id_barang', $this->input->post('id_barang_lama'))
                        ->update('barang', $data);
    }
    public function hapus_barang($id_barang='')
    {
        return $this->db->where('id_barang', $id_barang)
                    ->delete('barang');
    }
    

}

/* End of file m_barang.php */
/* Location: ./application/models/m_barang.php */