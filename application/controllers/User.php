<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index(){
        $data['konten']="login";
        $data['judul']="Login Toko";
        $this->load->view('login',$data);
        
    }
    
    public function register(){
       $data['konten']="login";
        $data['judul']="Login Toko";
        $this->load->view('register',$data);
    }
    public function simpan(){
        if($this->input->post('daftar')){
            $this->form_validation->set_rules('nama_user','Nama lengkap', 'trim|required');
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            $this->form_validation->set_rules('level','Level', 'trim|required');
            
            if($this->form_validation->run() ==TRUE){
                $this->load->model('m_user');
                if($this->m_user->masuk()==TRUE){
                    $this->session->set_flashdata('pesan','Sukses Mendaftarkan Diri');
                    redirect('user','refresh');
                }else{
                    $this->session->set_flashdata('pesan','Gagal Mendaftarkan Diri');
                    redirect('user/register','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('user/register','refresh');
            }
            
        }
    }
    public function proses_login(){
        if($this->input->post('login')){
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
                 $this->load->model('m_user');
                if($this->m_user->get_login()->num_rows()>0){
                    $data=$this->m_user->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'nama_user'=>$data->nama_user,
                        'username'=>$data->username,
                        'password'=>$data->password,
                        'level'=>$data->level,
                        'id_user'=>$data->id_user,
                    );
                    $this->session->set_userdata($array);
                    redirect('barang','refresh');
                }else{
                    $this->session->set_flashdata('pesan','Username atau Password salah');
                    redirect('user','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('user','refresh');
            }
    }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user','refresh');
    }
}
?>