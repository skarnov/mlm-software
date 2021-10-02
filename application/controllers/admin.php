<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('admin_login', 'refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('admin_login');
    }
    
    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->admin_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('admin/edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }
    
    public function update_admin() 
    {
        $this->admin_model->update_admin_info();
        redirect('admin');
    }
    
    public function root_user_balance()
    {
        $data = array();
        $data['title'] = 'Root User Balance';
        $data['root_user'] = $this->admin_model->select_root_user();
        $data['dashboard'] = $this->load->view('admin/root_user_balance', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function update_root_user_balance()
    {
        $this->admin_model->update_root_user_balance();
        $sdata = array();
        $sdata['update_root_user_balance'] = 'Done!';
        $this->session->set_userdata($sdata);
        redirect('admin/root_user_balance');
    }
    
    public function monthly_revenue_rate()
    {
        $data = array();
        $data['title'] = 'Monthly Revenue Rate';
        $data['dashboard'] = $this->load->view('admin/monthly_revenue_rate', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_interest_rate()
    {
        $this->admin_model->save_interest_rate_info();
        $sdata = array();
        $sdata['save_interest_rate'] = 'Saved';
        $this->session->set_userdata($sdata);
        redirect('admin/monthly_revenue_rate');
    }
    
    public function previous_revenue()
    {
        $data = array();
        $data['title'] = 'Previous Revenue';
        $data['all_revenue'] = $this->admin_model->select_all_revenue();
        $data['dashboard'] = $this->load->view('admin/previous_revenue', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function delete_revenue($revenue_id) 
    {        
        $this->admin_model->delete_revenue_by_id($revenue_id);
        redirect('admin/member_verification');
    }
        
    public function member_verification()
    {
        $data = array();
        $data['title'] = 'Member Verification';
        $data['all_user'] = $this->admin_model->select_all_user();
        $data['dashboard'] = $this->load->view('admin/member_verification', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_user($user_id) 
    {
        $data = array();
        $data['title'] = 'Edit User';
        $data['user_info'] = $this->admin_model->select_user_by_id($user_id);
        $data['dashboard'] = $this->load->view('admin/edit_user', $data, true);
        $sdata = array();
        $sdata['edit_user'] = 'Update User Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_user()
    {
        $this->admin_model->update_user_info();
        $sdata = array();
        $sdata['update_user'] = 'Done';
        $this->session->set_userdata($sdata);
        redirect('admin/member_verification');
    }

    public function delete_user($user_id) 
    {        
        $this->admin_model->delete_user_by_id($user_id);
        redirect('admin/member_verification');
    }
   
    public function about()
    {
        $data = array();
        $data['title'] = 'LabTrio';
        $data['dashboard'] = $this->load->view('admin/about', $data, true);
        $this->load->view('admin/master', $data);
    }
}