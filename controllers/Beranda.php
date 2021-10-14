<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {    
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE) {
            redirect(base_url('auth'));
        }
    }

    function index()
	{
        if ($this->session->userdata('log_status') == '1'){
            $id = $this->session->userdata('log_id');
            $data['buka']       = $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id' AND tipe='1'")->num_rows();
            $data['relokasi']   = $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id' AND tipe='2'")->num_rows();
            $data['tutup']      = $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id' AND tipe='3'")->num_rows();
            $data['ditegaskan'] = $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id' AND statuspengajuan='3'")->num_rows();

            $this->session->set_flashdata("report", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Selamat datang <span class='badge badge-pill badge-success'> ".$this->session->userdata('log_name')."</span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        }
        elseif ($this->session->userdata('log_status') == '2'){
            $data['buka']       = $this->db->query("SELECT * FROM pengajuan WHERE tipe='1'")->num_rows();
            $data['relokasi']   = $this->db->query("SELECT * FROM pengajuan WHERE tipe='2'")->num_rows();
            $data['tutup']      = $this->db->query("SELECT * FROM pengajuan WHERE tipe='3'")->num_rows();
            $data['ditegaskan'] = $this->db->query("SELECT * FROM pengajuan WHERE statuspengajuan='3'")->num_rows();
            $this->session->set_flashdata("report", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'><span class='badge badge-pill badge-success'>Selamat datang di SIPOJK...</span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        }
        elseif ($this->session->userdata('log_status') == '3'){
            $data['buka']       = $this->db->query("SELECT * FROM pengajuan WHERE tipe='1'")->num_rows();
            $data['relokasi']   = $this->db->query("SELECT * FROM pengajuan WHERE tipe='2'")->num_rows();
            $data['tutup']      = $this->db->query("SELECT * FROM pengajuan WHERE tipe='3'")->num_rows();
            $data['ditegaskan'] = $this->db->query("SELECT * FROM pengajuan WHERE statuspengajuan='3'")->num_rows();
            $this->session->set_flashdata("report", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'><span class='badge badge-pill badge-success'>Selamat datang di SIPOJK...</span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        }

        $data['page']  = 'Beranda';
        $this->load->view("beranda", $data);

    }

    public function akses_ditolak()
    {
        $this->session->set_flashdata("akses_ditolak", "<div class='col-sm-12'><div class='alert  alert-warning alert-dismissible fade show' role='alert'>Akses anda ditolak...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>");
        redirect('beranda');
    }

    
}