<?php

class Admin_Login_Model extends CI_Model {
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', $data['admin_password']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function agent_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_uniqueId', $data['user_uniqueId']);
        $this->db->where('user_password', $data['agent_password']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}