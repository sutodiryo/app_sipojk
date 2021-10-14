<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
	{
        $this->load->view('auth/login');
    }

    public function login()
    {
        $email  = $this->security->xss_clean($this->input->post('email'));
        $sandi  = md5($this->security->xss_clean($this->input->post('sandi')));

        $query  = $this->db->query("SELECT (SELECT namabank FROM bpr WHERE bpr.email=pengguna.email) AS namabank,
                                           (SELECT idbank FROM bpr WHERE bpr.email=pengguna.email) AS idbank,
                                           email, sandi, status FROM pengguna WHERE email = '".$email."' AND sandi = '".$sandi."'");
        $total  = $query->num_rows();
        $field  = $query->row();

        if ($total == 1) {
            $data_login = array(
                'log_email'     => $field->email,
                'log_name'      => $field->namabank,
                'log_status'    => $field->status,
                'log_id'        => $field->idbank,
                
                'log_valid'     => true
                );
            $this->session->set_userdata($data_login);
            redirect(base_url('beranda'));
        } else {
            $this->session->set_flashdata("report", "<div class='alert  alert-danger alert-dismissible fade show' role='alert'>Username atau sandi yang anda masukan salah...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            redirect(base_url('auth'));
        }
    }

    public function profil()
    {
        $data['page']   = 'Profil';
        $this->load->view("auth/profil", $data);
    }

    public function resetpass($email)
    {
        $sandi = md5("password");
        $this->db->query("UPDATE pengguna SET sandi = '$sandi' WHERE email = '$email'");
        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Sandi telah berhasil direset <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        redirect(base_url('master/pengguna'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}