<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Agent extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $agent_id = $this->session->userdata('agent_id');
        if ($agent_id == NULL) 
        {
            redirect('agent_login', 'refresh');
        }
    }
    
    public function index()
    {
        $agent_id = $this->session->userdata('agent_id');
        /* Return CV Summary */
        $interest_info = $this->agent_model->select_interest_info();
        $interest_month = date('m-Y', strtotime('last month'));
        if($interest_month == $interest_info->interest_month_year)
        {
            $duplicate = $this->agent_model->select_transaction_info($agent_id,$interest_month);
            if($duplicate == NULL)
            {
                $cv_info = $this->agent_model->select_pin_info($agent_id);
                foreach ($cv_info as $value)
                {
                    $cv_creation_id = $value->cv_creation_id;
                    $rate_of_revenue = $interest_info->interest_value;
                    $cv_return = ($interest_info->interest_value/100) * $value->cv_amount;
                    $cv_value = $value->cv_amount/10;
                    $return_cv_summary = $cv_return + $cv_value;
                    $this->agent_model->save_transaction_info($cv_creation_id,$rate_of_revenue,$cv_return,$return_cv_summary,$agent_id,$interest_month);
                }
            }
        }
        $data = array();
        $data['title'] = 'Dashboard';
        $data['interest_info'] = $interest_info;
        $data['user_info'] = $this->agent_model->select_user_info($agent_id);
        $downline_id = $this->agent_model->select_downline_id($agent_id);        
        $data['downline_info'] = $this->agent_model->select_downline_info($downline_id->downline_id);
        $data['all_cv_creation'] = $this->agent_model->select_all_cv_creation();
        /* PIN Cration */
        $pin_info = $this->agent_model->select_pin_info($agent_id);
        foreach ($pin_info as $p_value)
        {
            /* IF CV is Active */
            date_default_timezone_set("Asia/Dhaka");
            $today_time = date("d-m-Y");
            $today = strtotime($today_time);
            $activation_status = $p_value->activation_status;
            if($activation_status)
            {
                /* IF CV is Valid */
                $cv_open_date = $p_value->creation_time;
                $cv_expiry_date = date('d-m-Y', strtotime('+10 month', strtotime($cv_open_date)));
                $cv_expaired_date = strtotime($cv_expiry_date);
                $cv_creation_id = $p_value->cv_creation_id; 
                $user_id = $p_value->user_id;        
                if ($cv_expaired_date > $today)
                {
                    /* IF CV has remaining PIN */
                    $remaining_pin = $p_value->remaining_pin;
                    if($remaining_pin)
                    {
                        /* Create PIN */
                        $cv_amount = $p_value->cv_amount;
                        if($cv_amount == 200 || $cv_amount == 400)
                        {
                            $creation_time = $p_value->creation_time;
                            $pin_time = date('d-m-Y', strtotime('+4 month', strtotime($creation_time)));
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $pin = strtotime($pin_time);
                            if ($pin < $today)
                            {
                                $this->agent_model->creating_pin($pin_time,$expiration_time,$cv_creation_id,$user_id);
                            }
                        }
                        if($cv_amount == 800)
                        {
                            $creation_time = $p_value->creation_time;
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $remaining_pin = $p_value->remaining_pin;
                            $pin_time_1 = date('d-m-Y', strtotime('+0 day', strtotime($creation_time)));
                            $pin_time_2 = date('d-m-Y', strtotime('+1 month', strtotime($creation_time)));
                            $pin_time_3 = date('d-m-Y', strtotime('+2 month', strtotime($creation_time)));
                            $pin_time_4 = date('d-m-Y', strtotime('+3 month', strtotime($creation_time)));
                            $pin_time_5 = date('d-m-Y', strtotime('+4 month', strtotime($creation_time)));
                            $pin_1 = strtotime($pin_time_1);
                            $pin_2 = strtotime($pin_time_2);
                            $pin_3 = strtotime($pin_time_3);
                            $pin_4 = strtotime($pin_time_4);
                            $pin_5 = strtotime($pin_time_5);
                            if ($remaining_pin == 5 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 4 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 3 && $pin_3 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_3,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 2 && $pin_4 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_4,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 1 && $pin_5 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_5,$expiration_time,$cv_creation_id,$user_id);
                            }
                        }
                        if($cv_amount == 1500)
                        {
                            $creation_time = $p_value->creation_time;
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $remaining_pin = $p_value->remaining_pin;
                            $pin_time_1 = date('d-m-Y', strtotime('+0 day', strtotime($creation_time)));
                            $pin_time_2 = date('d-m-Y', strtotime('+1 month', strtotime($creation_time)));
                            $pin_time_3 = date('d-m-Y', strtotime('+2 month', strtotime($creation_time)));
                            $pin_1 = strtotime($pin_time_1);
                            $pin_2 = strtotime($pin_time_2);
                            $pin_3 = strtotime($pin_time_3);
                            if ($remaining_pin == 5 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 4 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 3 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 2 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 1 && $pin_3 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_3,$expiration_time,$cv_creation_id,$user_id);
                            }
                        }
                        if($cv_amount == 2500)
                        {
                            $creation_time = $p_value->creation_time;
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $remaining_pin = $p_value->remaining_pin;
                            $pin_time_1 = date('d-m-Y', strtotime('+0 day', strtotime($creation_time)));
                            $pin_time_2 = date('d-m-Y', strtotime('+1 month', strtotime($creation_time)));
                            $pin_1 = strtotime($pin_time_1);
                            $pin_2 = strtotime($pin_time_2);
                            if ($remaining_pin == 5 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 4 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 3 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 2 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 1 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                        }
                        if($cv_amount == 3000)
                        {
                            $creation_time = $p_value->creation_time;
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $remaining_pin = $p_value->remaining_pin;
                            $pin_time_1 = date('d-m-Y', strtotime('+0 day', strtotime($creation_time)));
                            $pin_time_2 = date('d-m-Y', strtotime('+1 month', strtotime($creation_time)));
                            $pin_1 = strtotime($pin_time_1);
                            $pin_2 = strtotime($pin_time_2);
                            if ($remaining_pin == 5 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 4 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 3 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 2 && $pin_1 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_1,$expiration_time,$cv_creation_id,$user_id);
                            }
                            if ($remaining_pin == 1 && $pin_2 <= $today)
                            {
                                $this->agent_model->creating_pin($pin_time_2,$expiration_time,$cv_creation_id,$user_id);
                            }
                        }
                        if($cv_amount == 4000)
                        {
                            $creation_time = $p_value->creation_time;
                            $pin_time = date('d-m-Y', strtotime('+0 day', strtotime($creation_time)));
                            $expiration_time = date('d-m-Y', strtotime('+10 month', strtotime($creation_time)));
                            $this->agent_model->creating_pin($pin_time,$expiration_time,$cv_creation_id,$user_id);
                        }
                        /* End PIN Creation */
                    }
                }
                else
                {
                    $this->agent_model->update_cv_creation($cv_creation_id,$user_id);
                }
            }
        }
        $data['dashboard'] = $this->load->view('agent/agent_summary', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('agent_id');
        $this->session->unset_userdata('agent_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('agent_login');
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
        $this->load->view('agent/master', $data);
    }

    public function update_user()
    {
        $this->admin_model->update_user_info();
        $sdata = array();
        $sdata['update_user'] = 'Done';
        $this->session->set_userdata($sdata);
        redirect('agent');
    }

    public function create_new_member()
    {
        $data = array();
        $data['title'] = 'Add Member';
        $data['dashboard'] = $this->load->view('agent/create_new_member', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function create_new_member_check()
    {       
        $user_id = $this->session->userdata('agent_id');
        $agent_id = $this->input->post('agent_id', true);
        $pin = $this->input->post('pin', true);   
        $password = $this->input->post('password', true);
        $checked_agent =  $this->agent_model->check_agent($agent_id);
        $checked_pin =  $this->agent_model->check_password($user_id,$pin);
        $checked_password =  $this->agent_model->check_agent_password($user_id,$password);
        $sdata = array();
        if($checked_agent == NULL)
        {
            $sdata['create_new_member_check'] = 'Invalide Agent!';
            $this->session->set_userdata($sdata);
            redirect('agent/create_new_member');
        }
        if($checked_pin == NULL)
        {
            $sdata['create_new_member_check'] = 'Invalide PIN';
            $this->session->set_userdata($sdata);
            redirect('agent/create_new_member');
        }
        if($checked_password == NULL)
        {
            $sdata['create_new_member_check'] = 'Check Your Password';
            $this->session->set_userdata($sdata);
            redirect('agent/create_new_member');
        }
        $sdata['pin'] = $pin;
        $this->session->set_userdata($sdata);
        redirect('agent/add_member');
    }
    
    public function add_member()
    {
        $data = array();
        $data['title'] = 'Add Member';
        $data['dashboard'] = $this->load->view('agent/add_member', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function save_member()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/user_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('user_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'user_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/user_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '320';
                $config['height'] = '240';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'user_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
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
        $this->agent_model->save_member_info($data);
        $sdata['create_new_member_check'] = '<span style="color:green">Done!</span>';
        $this->session->set_userdata($sdata);
        redirect('agent/create_new_member');
    }
    
    public function pin_manager()
    {
        $agent_id = $this->session->userdata('agent_id');
        $data = array();
        $data['title'] = 'Pin Manager';
        $data['pin_info'] = $this->agent_model->select_user_pin_info($agent_id);
        $data['dashboard'] = $this->load->view('agent/pin_manager', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function fund_request()
    {
        $agent_id = $this->session->userdata('agent_id');
        $data = array();
        $data['title'] = 'Fund Request';
        $data['user_info'] = $this->agent_model->select_user_info($agent_id);
        $data['dashboard'] = $this->load->view('agent/fund_request', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function check_fund_request()
    {
        $agent_id = $this->session->userdata('agent_id');
        $user_password = $this->input->post('password', true);
        $done_agent_password =  $this->agent_model->check_agent_password($agent_id,$user_password);
        if($done_agent_password)
        {
            $agent_unique_id = $this->input->post('agent_id', true);
            $done_agent =  $this->agent_model->check_agent($agent_unique_id);
            if($done_agent)
            {
                $this->agent_model->save_fund_request();
                $sdata['check_fund_request'] = '<span style="color:green">Done!</span>';
                $this->session->set_userdata($sdata);
                redirect('agent/fund_request');
            }
            else
            {
                $sdata['check_fund_request'] = 'Wrong Agent!';
                $this->session->set_userdata($sdata);
                redirect('agent/fund_request');
            }
        }
        else
        {
            $sdata['check_fund_request'] = 'Wrong Password!';
            $this->session->set_userdata($sdata);
            redirect('agent/fund_request');
        }
    }
    
    public function manage_fund_request()
    {
        $data = array();
        $data['title'] = 'Manage Fund Request';
        $data['all_fund_request'] = $this->agent_model->select_all_fund_request();
        $agent_id = $this->session->userdata('agent_id');
        $data['user_info'] = $this->agent_model->select_user_info($agent_id);
        if($data['user_info']->user_type == '2')
        {
            $data['dashboard'] = $this->load->view('agent/manage_fund_request', $data, true);
        }
        else
        {
            $data['dashboard'] = $this->load->view('agent/manage_fund_member', $data, true);
        }
        $this->load->view('agent/master', $data);
    }
    
    public function accept_fund_request($fundrequest_id)
    {
        $agent_id = $this->session->userdata('agent_id');
        $user_info = $this->agent_model->select_user_info($agent_id);
        $user_balance = $user_info->user_balance;
        $fundrequest = $this->agent_model->select_fund_request_by_id($fundrequest_id); 
        if($user_balance >= $fundrequest->request_amount)
        {
            $this->agent_model->accept_fund($fundrequest_id,$fundrequest);
            $sdata['check_fund_request'] = 'Fund Request Accepted';
            $this->session->set_userdata($sdata);
            redirect('agent/manage_fund_request');
        }
        else
        {
            $sdata['check_fund_request'] = 'You have insufficient funds to accept this fund request';
            $this->session->set_userdata($sdata);
            redirect('agent/manage_fund_request');
        }
    }
    
    public function delete_fund_request($fundrequest_id) 
    {        
        $this->agent_model->delete_fundrequest_by_id($fundrequest_id);
        redirect('agent/manage_fund_request');
    }
    
    public function fund_request_history()
    {
        $data = array();
        $data['title'] = 'Manage Fund History';
        $data['all_fund_request_history'] = $this->agent_model->select_all_fund_request_history();
        $data['dashboard'] = $this->load->view('agent/fund_request_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function asking_fund_history()
    {
        $agent_id = $this->session->userdata('agent_id');
        $data = array();
        $data['title'] = 'Asking Fund History';
        $data['all_fund_request_history'] = $this->agent_model->select_asking_fund_request_history($agent_id);
        $data['dashboard'] = $this->load->view('agent/asking_fund_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function create_cv()
    {
        $data = array();
        $data['title'] = 'Create CV';
        $data['all_cv'] = $this->agent_model->select_all_cv();
        $data['dashboard'] = $this->load->view('agent/create_cv', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function save_cv_creation()
    {
        $agent_id = $this->session->userdata('agent_id');
        $user_password = $this->input->post('password', true);
        $done_agent_password =  $this->agent_model->check_agent_password($agent_id,$user_password);
        if($done_agent_password)
        {
            $request_cv_amount = $this->input->post('cv_amount', true);
            $user = $this->agent_model->select_user_info($agent_id);
            $user_info = $user->user_balance;
            if($user_info > $request_cv_amount)
            {
                $this->agent_model->create_cv_info();
                $sdata['save_cv_creation'] = '<span style="color:green;">CV Create Success</span>';
                $this->session->set_userdata($sdata);
                redirect('agent/create_cv');
            } 
            else
            {
                $sdata['save_cv_creation'] = 'You have insufficient funds to create this CV.';
                $this->session->set_userdata($sdata);
                redirect('agent/create_cv');
            }
        }
        else
        {
            $sdata['save_cv_creation'] = 'Wrong Password!';
            $this->session->set_userdata($sdata);
            redirect('agent/create_cv');
        }
    }
    
    public function cv_creation_history()
    {
        $data = array();
        $data['title'] = 'CV Creation History';
        $data['all_cv_creation'] = $this->agent_model->select_all_cv_creation();
        $data['dashboard'] = $this->load->view('agent/cv_creation_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function downline_manager()
    {
        $data = array();
        $data['title'] = 'Downline Manager';
        $data['all_downline'] = $this->agent_model->select_all_downline_user();
        $agent_id = $this->session->userdata('agent_id');
        $data['user_info'] = $this->agent_model->select_user_info($agent_id);
        if($data['user_info']->user_type == '2')
        {
            $data['dashboard'] = $this->load->view('agent/downline_manager', $data, true);
        }
        else
        {
            $data['dashboard'] = $this->load->view('agent/manage_fund_member', $data, true);
        }
        $this->load->view('agent/master', $data);
    }
    
    public function pin_transaction()
    {
        $data = array();
        $data['title'] = 'PIN Transaction History';
        $data['all_pin_transaction'] = $this->agent_model->select_all_pin_transaction();
        $data['dashboard'] = $this->load->view('agent/pin_transaction_history', $data, true);
        $this->load->view('agent/master', $data);
    }

    public function monthly_interest()
    {
        $data = array();
        $data['title'] = 'Monthly Interest History';
        $data['all_monthly_interest'] = $this->agent_model->select_all_monthly_interest();
        $data['dashboard'] = $this->load->view('agent/monthly_interest_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function fund_accept_bonus()
    {
        $data = array();
        $data['title'] = 'Monthly Interest History';
        $data['all_fund_accept_bonus'] = $this->agent_model->select_all_fund_accept_bonus();
        $data['dashboard'] = $this->load->view('agent/fund_accept_bonus_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function new_balance_withdrawal()
    {
        $agent_id = $this->session->userdata('agent_id');
        $data = array();
        $data['title'] = 'Balance Withdrawal';
        $data['user_info'] = $this->agent_model->select_user_info($agent_id);
        $data['dashboard'] = $this->load->view('agent/new_balance_withdrawal', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function save_balance_withdrawal()
    {
        $withdrawal_method = $this->input->post('method', true);
        if($withdrawal_method == 1)
        {
            $data = array();
            $data['title'] = 'Agent Withdrawal';
            $data['dashboard'] = $this->load->view('agent/agent_balance_withdrawal', $data, true);
            $this->load->view('agent/master', $data);
        }
        if($withdrawal_method == 2)
        {
            $data = array();
            $data['title'] = 'Bank Withdrawal';
            $data['dashboard'] = $this->load->view('agent/bank_balance_withdrawal', $data, true);
            $this->load->view('agent/master', $data);
        }
    }
    
    public function save_agent_balance_withdrawal()
    {
        $agent_id = $this->session->userdata('agent_id');
        $user_balance = $this->agent_model->select_user_info($agent_id);
        if($user_balance->user_balance > 299)
        {
            $user_password = $this->input->post('password', true);
            $done_agent_password =  $this->agent_model->check_agent_password($agent_id,$user_password);
            if($done_agent_password)
            {
                $this->agent_model->save_agent_balance_withdrawal_info();
                $sdata['balance_withdrawal'] = 'Done!';
                $this->session->set_userdata($sdata);
                redirect('agent/new_balance_withdrawal');
            }
            else
            {
                $sdata['balance_withdrawal'] = 'Wrong Password!';
                $this->session->set_userdata($sdata);
                redirect('agent/new_balance_withdrawal');
            }
        }
        else
        {
            $sdata['balance_withdrawal'] = 'Insufficient Balance';
            $this->session->set_userdata($sdata);
            redirect('agent/new_balance_withdrawal');
        }
    }
    
    public function save_bank_balance_withdrawal()
    {
        $agent_id = $this->session->userdata('agent_id');
        $user_balance = $this->agent_model->select_user_info($agent_id);
        if($user_balance->user_balance > 299)
        {
            $user_password = $this->input->post('password', true);
            $done_agent_password =  $this->agent_model->check_agent_password($agent_id,$user_password);
            if($done_agent_password)
            {
                $this->agent_model->save_bank_balance_withdrawal_info();
                $sdata['balance_withdrawal'] = 'Done!';
                $this->session->set_userdata($sdata);
                redirect('agent/new_balance_withdrawal');
            }
            else
            {
                $sdata['balance_withdrawal'] = 'Wrong Password!';
                $this->session->set_userdata($sdata);
                redirect('agent/new_balance_withdrawal');
            }
        }
        else
        {
            $sdata['balance_withdrawal'] = 'Insufficient Balance';
            $this->session->set_userdata($sdata);
            redirect('agent/new_balance_withdrawal');
        }
    }
    
    public function bank_withdrawal_history()
    {
        $data = array();
        $data['title'] = 'Bank Withdrawal History';
        $data['all_bank_withdrawal_history'] = $this->agent_model->select_all_bank_withdrawal_history();
        $data['dashboard'] = $this->load->view('agent/bank_withdrawal_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function agent_withdrawal_history()
    {
        $data = array();
        $data['title'] = 'Agent Withdrawal History';
        $data['all_agent_withdrawal_history'] = $this->agent_model->select_all_agent_withdrawal_history();
        $data['dashboard'] = $this->load->view('agent/agent_withdrawal_history', $data, true);
        $this->load->view('agent/master', $data);
    }
    
    public function add_ticket()
    {
        $data = array();
        $data['dashboard'] = $this->load->view('agent/add_ticket', '', true);
        $data['title'] = 'Add Ticket';
        $this->load->view('agent/master', $data);
    }

    public function save_ticket()
    {
        $this->agent_model->save_ticket_info();
        $sdata = array();
        $sdata['save_ticket'] = 'Ticket Has Been Submitted';
        $this->session->set_userdata($sdata);
        redirect('agent/add_ticket');
    }

    public function manage_ticket()
    {
        $data = array();
        $data['title'] = 'Manage Ticket';
        $data['all_ticket'] = $this->agent_model->select_all_ticket();
        $data['dashboard'] = $this->load->view('agent/manage_ticket', $data, true);
        $this->load->view('agent/master', $data);
    }

    public function about()
    {
        $data = array();
        $data['title'] = 'LabTrio';
        $data['dashboard'] = $this->load->view('admin/about', $data, true);
        $this->load->view('admin/master', $data);
    }
}