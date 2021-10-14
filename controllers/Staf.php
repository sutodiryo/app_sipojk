<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE) {
            redirect(base_url('auth'));
        }
    }

    public function penegasan()
    {
        $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan WHERE statuspengajuan='2'")->result();
        $data['page']       = 'Upload Surat Penegasan';
        $this->load->view("staf/penegasan", $data);
    }

    public function uploadp()
    {
        $config = array(
            'upload_path'   => './download/',
            'allowed_types' => 'pdf|PDF',
            'max_size'      => '102400'
        );
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('suratpenegasan'))
        {
          $this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
          redirect(site_url('staf/penegasan'));
        } else {
            $file   = $this->upload->data();
            $sp     = $file['file_name'];
            $ns     = $this->input->post('nosurat');
            $tgl    = $this->input->post('tglpenegasan');
        }
        $this->db->query("UPDATE pengajuan SET suratpenegasan = '$sp', tglpenegasan = '$tgl', statuspengajuan = '3' WHERE nosurat = '$ns'");

        $this->db->query("UPDATE notifikasi SET notifbpr = '2', notifstaf='2' WHERE nosurat = '$ns'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Surat penegasan berhasil diupload & status berubah jadi DITEGASKAN <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
        redirect(base_url('staf/penegasan'));
    }

    
}