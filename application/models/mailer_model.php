<?php

class Mailer_model extends CI_Model {

    public function sendEmail($data, $templateName)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }  
}