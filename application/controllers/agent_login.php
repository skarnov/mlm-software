<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Agent_Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $agent_id = $this->session->userdata('agent_id');
        if ($agent_id != NULL)
        {
            redirect('agent', 'refresh');
        }
    }
    
    public function index()
    {
        $this->load->view('agent/agent_login');
    }

    public function check_agent_login()
    {
        $data = array();
        $data['user_uniqueId'] = $this->input->post('user_uniqueId', true);
        $data['agent_password'] = $this->input->post('password', true);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        if($this->form_validation->run() == False)
        {
            $this->load->view('agent/agent_login');
        }
        else
        {
            $result = $this->admin_login_model->agent_login_check($data);
            $sdata = array();
            if ($result)
            {
                $sdata['agent_id'] = $result->user_id;
                $sdata['user_uniqueId'] = $result->user_uniqueId;
                $sdata['agent_name'] = $result->user_name;
                $this->session->set_userdata($sdata);
                redirect('agent');
            } 
            else
            {
                $sdata['exception'] = 'Your User ID / Password Invalide !';
                $this->session->set_userdata($sdata);
                redirect('agent_login');
            }
        }
    }
    
    public function forgot_password() 
    {
        $this->load->view('agent/forgot_password');
    }
    
    public function reset_password()
    {
        $this->load->library('email');
        $this->load->model('mailer_model');
        $data = $this->input->post('agent_email', true);
        $result = $this->evis_app_model->check_password($data);
        $password = $result->agent_password;
        if ($password) {
            $mdata = array();
            $mdata['from_address'] = '';
            $mdata['agent_full_name'] = '';
            $mdata['to_address'] = $data;
            $mdata['subject'] = '';
            $mdata['agent_password'] = $password;
            $this->mailer_model->forget_password($mdata, 'forget_password_email');
            redirect('agent_login/forgot_password');
        } else {
            echo 'Your password is not exists our Database';
            redirect('agent_login/forgot_password');
        }
    }
}