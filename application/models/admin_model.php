<?php

class Admin_Model extends CI_Model {
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function select_root_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_root_user_balance()
    {
        $data=array();
        $data['user_balance'] = $this->input->post('user_balance', true);
        $user_id = $this->input->post('user_id', true);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);
    }
    
    public function save_interest_rate_info()
    {
        $data=array();
        $data['interest_month_year'] = $this->input->post('interest_month_year', true);
        $data['interest_value'] = $this->input->post('interest_value', true);
        $this->db->insert('tbl_interest',$data);
    }
    
    public function select_all_revenue()
    {
        $sql = "SELECT * FROM tbl_interest";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_revenue_by_id($revenue_id)
    {
        $this->db->where('interest_id',$revenue_id);
        $this->db->delete('tbl_interest');
    }
    
    public function select_all_user()
    {
        $sql = "SELECT * FROM tbl_user";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_user_by_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id',$user_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_user_info()
    {
        $data=array();
        $data['user_creation_date'] = $this->input->post('user_creation_date');
        $data['user_name'] = $this->input->post('user_name');
        $data['user_email'] = $this->input->post('user_email');
        $data['user_password'] = $this->input->post('user_password');
        $data['user_mobile'] = $this->input->post('user_mobile');
        $data['bank_name'] = $this->input->post('bank_name');
        $data['branch_name'] = $this->input->post('branch_name');
        $data['account_name'] = $this->input->post('account_name');
        $data['account_number'] = $this->input->post('account_number');
        $data['card_number'] = $this->input->post('card_number');
        $data['nominee_name'] = $this->input->post('nominee_name');
        $data['nominee_mobile'] = $this->input->post('nominee_mobile');
        $data['nominee_email'] = $this->input->post('nominee_email');
        $data['nominee_present_address_line_1'] = $this->input->post('nominee_present_address_line_1');
        $data['nominee_present_address_line_2'] = $this->input->post('nominee_present_address_line_2');
        $data['nominee_present_city'] = $this->input->post('nominee_present_city');
        $data['nominee_present_postal_code'] = $this->input->post('nominee_present_postal_code');
        $data['nominee_present_country_id'] = $this->input->post('nominee_present_country_id');
        $data['present_address_line_1'] = $this->input->post('present_address_line_1');
        $data['present_address_line_2'] = $this->input->post('present_address_line_2');
        $data['present_city'] = $this->input->post('present_city');
        $data['present_postal_code'] = $this->input->post('present_postal_code');
        $data['present_country_id'] = $this->input->post('present_country_id');
        $data['security_number'] = $this->input->post('security_number');
        $data['permanent_address_line_1'] = $this->input->post('permanent_address_line_1');
        $data['permanent_address_line_2'] = $this->input->post('permanent_address_line_2');
        $data['permanent_city'] = $this->input->post('permanent_city');
        $data['permanent_postal_code'] = $this->input->post('permanent_postal_code');
        $data['permanent_country_id'] = $this->input->post('permanent_country_id');
        $data['nominee_permanent_address_line_1'] = $this->input->post('nominee_permanent_address_line_1');
        $data['nominee_permanent_address_line_2'] = $this->input->post('nominee_permanent_address_line_2');
        $data['nominee_permanent_city'] = $this->input->post('nominee_permanent_city');
        $data['nominee_permanent_postal_code'] = $this->input->post('nominee_permanent_postal_code');
        $data['nominee_permanent_country_id'] = $this->input->post('nominee_permanent_country_id');
        $data['verification_status'] = $this->input->post('verification_status', true); 
        $user_id = $this->input->post('user_id', true);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);
    }
    
    public function delete_user_by_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_user');
    }
}