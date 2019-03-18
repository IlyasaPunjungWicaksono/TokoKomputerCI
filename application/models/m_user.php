<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {
    public function masuk(){
        $nama_user=$this->input->post('nama_user');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $level=$this->input->post('level');
        $datasimpan=array(
        'nama_user'=>$nama_user,
        'username'=>$username,
        'password'=>$password,
        'level'=>$level
        );
        $this->db->insert('user',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_login(){
        return $this->db->where('username',$this->input->post('username'))
            ->where('password',$this->input->post('password'))
            ->get('user');
    }
}
?>