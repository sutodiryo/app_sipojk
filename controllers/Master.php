<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE) {
            redirect(base_url('auth'));
        }
    }

    public function bpr()
    {
        $data['bpr']    = $this->db->query("SELECT * FROM bpr")->result();
        $data['page']   = 'Master Data BPR';
        $this->load->view("master/bpr", $data);
    }

    public function getbpr($idbank){
        $data = $this->db->query("SELECT * FROM bpr WHERE idbank='$idbank'")->row();
        echo json_encode($data);
    }

    function edtbpr($idbank)
    {
        $data['bpr']    = $this->db->query("SELECT * FROM bpr WHERE idbank='$idbank'")->result();
        $data['page']   = 'Edit Data BPR';
        $this->load->view("master/edtbpr", $data);
    }

    public function actaddbpr()
    {
        $idbank     = $this->input->post('idbank');
        $namabank   = $this->input->post('namabank');
        $email      = $this->input->post('email');
        $this->db->query("INSERT INTO bpr (idbank, namabank, email) VALUES ('$idbank', '$namabank', '$email')");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert alert-success alert-dismissible fade show' role='alert'>BPR Baru berhasil ditambahkan <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        redirect(base_url('master/bpr'));
    }

    public function actedtbpr()
    {
        $idbank     = $this->input->post('idbank');
        $namabank   = $this->input->post('namabank');
        $email      = $this->input->post('email');
        $this->db->query("UPDATE bpr SET namabank = '$namabank', email = '$email' WHERE idbank = '$idbank'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Data BPR telah diubah <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        redirect(base_url('master/bpr'));
    }

    public function delb($idbank)
    {
        $this->db->query("DELETE FROM bpr WHERE idbank = '$idbank'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-danger alert-dismissible fade show' role='alert'>Data BPR berhasil dihapus <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
        
        redirect(base_url('master/bpr'));
    }
    
    public function pengguna()
    {
        $data['pengguna']   = $this->db->query("SELECT * FROM pengguna ORDER BY status DESC")->result();
        $data['email']      = $this->db->query("SELECT email FROM bpr WHERE email NOT IN (SELECT email FROM pengguna)")->result();
        $data['page']       = 'Master Data Pengguna';
        $this->load->view("master/pengguna", $data);
    }

    public function actaddpengguna()
    {
        $email  = $this->input->post('email');
        $sandi  = md5($this->input->post('sandi'));
        $status = $this->input->post('status');
        $this->db->query("INSERT INTO pengguna (email, sandi, status) VALUES ('$email', '$sandi', '1')");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert alert-success alert-dismissible fade show' role='alert'>Data Pengguna berhasil ditambahkan <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        redirect(base_url('master/pengguna'));
    }

    public function delp($email)
    {
        $this->db->query("DELETE FROM pengguna WHERE email = '$email'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-danger alert-dismissible fade show' role='alert'>Pengguna berhasil dihapus <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
        
        redirect(base_url('master/pengguna'));
    }


}