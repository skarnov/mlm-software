<?php

class Agent_Model extends CI_Model {
    
    public function select_downline_id($agent_id)
    {
        $sql = "SELECT * FROM tbl_user WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_downline_info($downline_id)
    {
        $sql = "SELECT * FROM tbl_user WHERE downline_id='$downline_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_interest_info()
    {
        $sql = "SELECT * FROM tbl_interest ORDER BY interest_id DESC LIMIT 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }    
    
    public function select_transaction_info($agent_id,$interest_month)
    {
        $sql = "SELECT * FROM tbl_transaction WHERE user_id='$agent_id' AND interest_month_year='$interest_month'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_pin_info($agent_id)
    {
        $sql = "SELECT * FROM tbl_cv_creation WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_transaction_info($cv_creation_id,$rate_of_revenue,$cv_return,$return_cv_summary,$agent_id,$interest_month)
    {
        $data=array();
        $data['cv_creation_id'] = $cv_creation_id;
        $data['rate_of_revenue'] = $rate_of_revenue;
        $data['total_revenue'] = $cv_return;
        $data['total_amount'] = $return_cv_summary;
        $data['declare_date'] = date("d-m-Y");
        $data['user_id'] = $agent_id;
        $data['interest_month_year'] = $interest_month;
        $this->db->insert('tbl_transaction',$data);
        $update_bal = "UPDATE tbl_user SET user_balance = user_balance + $return_cv_summary WHERE user_id='$agent_id'";
        $this->db->query($update_bal);
    }
    
    public function select_user_info($agent_id)
    {
        $sql = "SELECT * FROM tbl_user WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function creating_pin($pin_time,$expiration_time,$cv_creation_id,$user_id)
    {
        function randomPassword()
        {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }
        $generated_password = randomPassword();
        $sql = "INSERT INTO tbl_pin (pin_code, date_of_purpose, date_of_expiration, cv_creation_id, user_id, used_status) VALUES ('$generated_password','$pin_time', '$expiration_time', '$cv_creation_id','$user_id','1')";
        $this->db->query($sql);
        $update_cv = "UPDATE tbl_cv_creation SET remaining_pin = remaining_pin - 1 WHERE cv_creation_id='$cv_creation_id'";
        $this->db->query($update_cv);
        $pin_charge = "UPDATE tbl_user SET user_balance = user_balance - 50 WHERE user_id = '$user_id'";
        $this->db->query($pin_charge);
        $transaction_time =  date("F d, Y");
        $pin_transaction = "INSERT INTO tbl_pin_transaction (user_id, cv_creation_id, transaction_amount, transaction_time) VALUES ('$user_id','$cv_creation_id', '50', '$transaction_time')";
        $this->db->query($pin_transaction);
    }
    
    public function check_agent($agent_unique_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_uniqueId', $agent_unique_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function check_password($user_id,$pin)
    {
        $sql = "SELECT * FROM tbl_pin WHERE user_id='$user_id' AND pin_code='$pin' AND used_status='1'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function check_agent_password($agent_id,$user_password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $agent_id);
        $this->db->where('user_password', $user_password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_cv_creation($cv_creation_id,$user_id)
    {
        $update_cv = "UPDATE tbl_cv_creation SET activation_status = 0, remaining_pin = 0 WHERE cv_creation_id='$cv_creation_id' AND user_id='$user_id'";
        $this->db->query($update_cv);
    }
    
    public function save_member_info($data)
    {
        $this->db->insert('tbl_user',$data);
        $downline_user_id=$this->db->insert_id();
        $user_id = $this->session->userdata('agent_id');
        $pin = $this->session->userdata('pin');
        $disable_pin = "UPDATE tbl_pin SET used_status = 0 WHERE user_id='$user_id' AND pin_code='$pin'";
        $this->db->query($disable_pin);
        $agent_id = $this->session->userdata('agent_id');
        $downline=array();
        $downline['user_id'] = $agent_id;
        $downline['downline_user_id'] = $downline_user_id;
        $this->db->insert('tbl_downline',$downline);
    }
    
    public function select_user_pin_info($agent_id)
    {
        $sql = "SELECT * FROM tbl_pin WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_fund_request()
    {
        $data=array();
        $data['user_id'] = $this->session->userdata('agent_id');
        $data['user_uniqueId'] = $this->input->post('agent_id', true);
        $data['request_amount'] = $this->input->post('request_amount', true); 
        $data['net_amount'] = $this->input->post('net_amount', true); 
        $data['charge'] = $data['request_amount'] - $data['net_amount'];
        $data['request_time'] = $this->input->post('time', true); 
        $this->db->insert('tbl_fundrequest',$data);
    }
    
    public function select_all_fund_request()
    {
        $sql = "SELECT * FROM tbl_fundrequest AS f, tbl_user AS u WHERE f.status = 0 AND f.user_id = u.user_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_fund_request_by_id($fundrequest_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_fundrequest');
        $this->db->where('fundrequest_id', $fundrequest_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function accept_fund($fundrequest_id,$fundrequest)
    {
        $sql = "UPDATE tbl_user, tbl_fundrequest
            SET tbl_user.user_balance = tbl_user.user_balance - tbl_fundrequest.net_amount, tbl_fundrequest.status='1' 
            WHERE tbl_user.user_uniqueId = tbl_fundrequest.user_uniqueId
            AND tbl_fundrequest.fundrequest_id = '$fundrequest_id'";
        $this->db->query($sql);
        $balance = "UPDATE tbl_user, tbl_fundrequest
            SET tbl_user.user_balance = tbl_user.user_balance + tbl_fundrequest.net_amount 
            WHERE tbl_user.user_id = tbl_fundrequest.user_id
            AND tbl_fundrequest.fundrequest_id = '$fundrequest_id'";
        $this->db->query($balance);
        $bonus=array();
        $bonus['agent_id'] = $fundrequest->user_uniqueId;
        $bonus['member_id'] = $fundrequest->user_id;
        $bonus['fundrequest_id'] = $fundrequest_id;
        $bonus['amount_withdrawn'] = $fundrequest->net_amount;
        $bonus['bonus_amount'] = $fundrequest->charge;
        $bonus['transaction_time'] = $fundrequest->request_time;
        $this->db->insert('tbl_fund_accept_bonus',$bonus);
        $agent_id = $bonus['agent_id'];
        $bonus_amount = $bonus['bonus_amount'];
        $bal = "UPDATE tbl_user SET user_balance = user_balance + '$bonus_amount' WHERE user_uniqueId = '$agent_id'";
        $this->db->query($bal);
    }
    
    public function delete_fundrequest_by_id($fundrequest_id)
    {
        $this->db->where('fundrequest_id',$fundrequest_id);
        $this->db->delete('tbl_fundrequest');
    }
    
    public function select_all_fund_request_history()
    {
        $sql = "SELECT * FROM tbl_fundrequest AS f, tbl_user AS u WHERE f.status = 1 AND f.user_id = u.user_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_asking_fund_request_history($agent_id)
    {
        $sql = "SELECT * FROM tbl_fundrequest WHERE user_id = '$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_cv()
    {
        $this->db->select('*');
        $this->db->from('tbl_cv');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function create_cv_info()
    {
        $cv_amount = $this->input->post('cv_amount', true);
        if($cv_amount == 200 || $cv_amount == 400)
        {
            $remaining_pin=1;
        }
        else
        {
            $remaining_pin=5;
        }
        $data=array();
        $data['user_id'] = $this->session->userdata('agent_id');
        $data['creation_time'] = $this->input->post('creation_time', true);
        $data['cv_amount'] = $cv_amount; 
        $data['remaining_pin'] = $remaining_pin; 
        $data['activation_status'] = 1; 
        $this->db->insert('tbl_cv_creation',$data);
        $user_id = $this->session->userdata('agent_id');
        $sql = "UPDATE tbl_user SET user_balance = user_balance - '$cv_amount' WHERE user_id = '$user_id'";
        $this->db->query($sql);
    }
    
    public function select_all_cv_creation()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_cv_creation WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_downline_user()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_user AS u, tbl_downline AS d WHERE d.user_id='$agent_id' AND u.user_id=d.downline_user_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_pin_transaction()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_pin_transaction WHERE user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_monthly_interest()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_transaction AS t, tbl_cv_creation AS c WHERE t.user_id='$agent_id' AND t.cv_creation_id=c.cv_creation_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_fund_accept_bonus()
    {
        $agent_id = $this->session->userdata('user_uniqueId');
        $sql = "SELECT * FROM tbl_fund_accept_bonus AS b, tbl_user AS u WHERE agent_id='$agent_id' AND b.member_id=u.user_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_agent_balance_withdrawal_info()
    {
        $data=array();
        $data['user_id'] = $this->session->userdata('agent_id');
        $data['agent_id'] = $this->input->post('agent_id');
        $data['date'] = $this->input->post('date');
        $data['withdrawal_method'] = 1;
        $data['withdrawal_amount'] = $this->input->post('withdrawal_amount', true);
        $data['net_amount'] = $this->input->post('net_amount', true); 
        $data['transaction_fee'] = $data['withdrawal_amount'] - $data['net_amount'];
        $this->db->insert('tbl_balance_withdrawal',$data);
        $withdrawal_id=$this->db->insert_id();
        $withdrawal=array();
        $withdrawal['user_id'] = $this->session->userdata('agent_id');
        $withdrawal['withdrawal_id'] = $withdrawal_id;
        $withdrawal['bonus_amount'] = $data['transaction_fee'];
        $withdrawal['date'] = $this->input->post('date', true);
        $this->db->insert('tbl_withdrawal_bonus',$withdrawal);
        $bonus = "UPDATE tbl_user, tbl_balance_withdrawal
            SET tbl_user.user_balance = tbl_user.user_balance - tbl_balance_withdrawal.withdrawal_amount 
            WHERE tbl_user.user_id = tbl_balance_withdrawal.user_id";
        $this->db->query($bonus);
        $bonus_amount = $data['transaction_fee'];
        $agent_id = $this->input->post('agent_id');
        $balance = "UPDATE tbl_user SET user_balance = user_balance + '$bonus_amount' WHERE user_uniqueId = '$agent_id'";
        $this->db->query($balance);
    }
    
    public function save_bank_balance_withdrawal_info()
    {
        $data=array();
        $data['user_id'] = $this->session->userdata('agent_id');
        $data['date'] = $this->input->post('date');
        $data['withdrawal_method'] = 2;
        $data['withdrawal_amount'] = $this->input->post('withdrawal_amount', true);
        $data['net_amount'] = $this->input->post('net_amount', true); 
        $data['transaction_fee'] = $data['withdrawal_amount'] - $data['net_amount'];
        $data['bank_name'] = $this->input->post('bank_name');
        $data['account_number'] = $this->input->post('account_number');
        $data['branch_name'] = $this->input->post('branch_name');
        $this->db->insert('tbl_balance_withdrawal',$data);
        $withdrawal_id=$this->db->insert_id();
        $withdrawal=array();
        $withdrawal['user_id'] = $this->session->userdata('agent_id');
        $withdrawal['withdrawal_id'] = $withdrawal_id;
        $withdrawal['bonus_amount'] = $data['transaction_fee'];
        $withdrawal['date'] = $this->input->post('date', true);
        $this->db->insert('tbl_withdrawal_bonus',$withdrawal);
        $bonus = "UPDATE tbl_user, tbl_balance_withdrawal
            SET tbl_user.user_balance = tbl_user.user_balance - tbl_balance_withdrawal.withdrawal_amount 
            WHERE tbl_user.user_id = tbl_balance_withdrawal.user_id";
        $this->db->query($bonus);
        $bonus_amount = $data['transaction_fee'];
        $balance = "UPDATE tbl_admin SET admin_balance = admin_balance + '$bonus_amount' WHERE admin_id = '1'";
        $this->db->query($balance);
    }
    
    public function select_all_bank_withdrawal_history()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_user AS u, tbl_balance_withdrawal AS b WHERE u.user_id=b.user_id AND b.withdrawal_method='2' AND b.user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_agent_withdrawal_history()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_user AS u, tbl_balance_withdrawal AS b WHERE u.user_id=b.user_id AND b.withdrawal_method='1' AND b.user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_ticket_info() 
    {
        $data=array();
        $data['user_id']=$this->session->userdata('agent_id');
        $data['subject']=$this->input->post('subject',true);
        $data['message']=$this->input->post('message',true);
        $this->db->insert('tbl_ticket',$data);
    }
    
    public function select_all_ticket()
    {
        $agent_id = $this->session->userdata('agent_id');
        $sql = "SELECT * FROM tbl_ticket AS t, tbl_user AS u WHERE t.user_id=u.user_id AND t.user_id='$agent_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_ticket_by_id($ticket_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_ticket');
        $this->db->where('ticket_id',$ticket_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_ticket_info()
    {
        $data=array();
        $data['user_id']=$this->session->userdata('agent_id');
        $data['subject']=$this->input->post('subject',true);
        $data['message']=$this->input->post('message',true);
        $data['status']=$this->input->post('status',true);
        $ticket_id=$this->input->post('ticket_id',true);
        $this->db->where('ticket_id',$ticket_id);
        $this->db->update('tbl_ticket',$data);
    }
    
    public function delete_ticket_by_id($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->delete('tbl_ticket');
    }
}