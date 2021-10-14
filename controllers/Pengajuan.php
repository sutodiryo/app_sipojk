<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE)
        {
            redirect(base_url('auth'));
        }
    }
    
	public function index($tipe)
	{   
        $data['tipe'] = $tipe;

        //KASUBAG
        if ($tipe == 'kasub')
        {
            if ($this->session->userdata('log_status') == 3)
            {
                $data['page']       = 'Pengajuan Perizinan';
                $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan")->result();
                $this->load->view("kasub/kasub", $data);
            } else {
                redirect('beranda/akses_ditolak');
            }
        }

        elseif ($tipe == 'status')
        {
            if ($this->session->userdata('log_status') == 3)
            {
                $data['page']       = 'Pengelolaan Status';
                $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan")->result();
                $this->load->view("kasub/status", $data);
            } else {
                redirect('beranda/akses_ditolak');
            }
        }
        //KASUBAG
        
        //STAF
        elseif ($tipe == 'kelola')
        {
            if ($this->session->userdata('log_status') == 2)
            {
                $data['page']       = 'Pengelolaan Perizinan';
                $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan ORDER BY statuspengajuan ASC")->result();

                $this->load->view("staf/kelola", $data);
            } else {
                redirect('beranda/akses_ditolak');
            }

        }

        elseif ($tipe == 'ditegaskan')
        {
            if ($this->session->userdata('log_status') == 2)
            {
                $data['page']       = 'Pengajuan Perizinan Ditegaskan';
                $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan WHERE statuspengajuan='3'")->result();
                $this->load->view("staf/ditegaskan", $data);
            } else {
                redirect('beranda/akses_ditolak');
            }
        }
        //STAF

    }

    //STAF
    public function penegasan()
    {
        $data['pengajuan']  = $this->db->query("SELECT * FROM pengajuan WHERE statuspengajuan='2'")->result();
        $data['page']       = 'Upload Surat Penegasan';
        $this->load->view("staf/penegasan", $data);
    }

    public function penegasan_upload()
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
    //STAF


    //KASUBAG
    public function proses_update($st,$sr)
    {   
        $ns = $this->input->post('nosurat'); 
        $this->db->query("UPDATE pengajuan SET statuspengajuan = '$st' WHERE surat = '$sr'");
        
        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Status Pengajuan diubah <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
         
         redirect(base_url('pengajuan/index/status'));
    }
    //KASUBAG


    public function detail($s)
    {
        $data['pengajuan']  = $this->db->query("SELECT 	nosurat,idbank,judul,surat,aktasewa,
        												strukturorg,skdomisili,aktiva,doksiap,
        												ketpenyelesaian,alasan,tipe,tglsubmit,tglditerima,
        												suratpenegasan,tglpenegasan,statuspengajuan,
        												(SELECT namabank FROM bpr WHERE bpr.idbank=pengajuan.idbank) as namabank
        												FROM pengajuan WHERE surat='$s'")->result();
        $data['page']       = 'Detail Pengajuan';
        $this->load->view("pengajuan/detail", $data);
    }

    public function ceknotif($s)
    {   
        if ($this->session->userdata('log_status') == 1) {
            $this->db->query("UPDATE notifikasi SET notifbpr = '0' WHERE nosurat=(SELECT nosurat FROM pengajuan WHERE surat='$s')");
        } elseif($this->session->userdata('log_status') == 2) {
            $this->db->query("UPDATE notifikasi SET notifstaf = '0' WHERE nosurat=(SELECT nosurat FROM pengajuan WHERE surat='$s')");
        } elseif ($this->session->userdata('log_status') == 3) {
            $this->db->query("UPDATE notifikasi SET notifkasubag = '0' WHERE nosurat=(SELECT nosurat FROM pengajuan WHERE surat='$s')");
        }
        
        $data['pengajuan']  = $this->db->query("SELECT  nosurat,idbank,judul,surat,aktasewa,
                                                        strukturorg,skdomisili,aktiva,doksiap,
                                                        ketpenyelesaian,alasan,tipe,tglsubmit,tglditerima,
                                                        suratpenegasan,tglpenegasan,statuspengajuan,
                                                        (SELECT namabank FROM bpr WHERE bpr.idbank=pengajuan.idbank) as namabank
                                                        FROM pengajuan WHERE surat='$s'")->result();
        $data['page']       = 'Detail Pengajuan';
        $this->load->view("pengajuan/detail", $data);
    }

    //CHECKLIST DOKUMEN
    public function dok_cek($dok)
    {
        $this->db->query("INSERT INTO dokvalid (dok, valid) VALUES ('$dok', '1')");
        redirect($this->session->userdata('referred_detail'));
    }

    public function dok_uncek($dok)
    {
        $this->db->query("DELETE FROM dokvalid WHERE dok='$dok'");
         redirect($this->session->userdata('referred_detail'));
    }


    public function dok_lengkap($surat)
    {   
        $this->db->query("UPDATE pengajuan SET statuspengajuan = '1', tglditerima=NOW() WHERE surat = '$surat'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-success alert-dismissible fade show' role='alert'>Status Pengajuan diubah menjadi Dokumen Lengkap<span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
        
        redirect($this->session->userdata('referred_detail'));
    }

    //CHECKLIST DOKUMEN
    
    public function hapus($s)
    {
        $this->db->query("DELETE FROM pengajuan WHERE surat = '$s'");

        $this->session->set_flashdata("notif", "<div class='col-sm-12'><div class='alert  alert-danger alert-dismissible fade show' role='alert'>Data Pengajuan berhasil dihapus <span class='badge badge-pill badge-success'></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button></div></div>");
        
        redirect(base_url('pengajuan/index/kelola'));
    }


}