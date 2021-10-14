<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpr extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE){
            redirect(base_url('auth'));
        }
    }
    
    public function penutupan()
	{
		$data['page']	= 'Penutupan';
		$this->load->view("bpr/penutupan", $data);
    }
    
	public function pemantauan()
	{
		$id = $this->session->userdata('log_id');
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id'")->result();
		$data['page']		= 'Pemantauan';
		$this->load->view("bpr/pemantauan", $data);
    }
    
	public function penegasan()
	{	
		$id = $this->session->userdata('log_id');
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE idbank='$id' AND statuspengajuan='3'")->result();
		$data['page']	= 'Daftar Surat Penegasan';
		$this->load->view("bpr/penegasan", $data);
    }

    public function lihatpenegasan($suratpenegasan)
	{	
		$this->db->query("UPDATE pengajuan SET notif = '0' WHERE suratpenegasan = '$suratpenegasan'");
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE suratpenegasan='$suratpenegasan'")->result();
		$data['page']		= 'Daftar Surat Penegasan';
		$this->load->view("bpr/penegasan", $data);
    }

    public function lihatstatus($nosurat)
	{	
		$this->db->query("UPDATE notifikasi SET notifbpr = '0' WHERE nosurat LIKE '$nosurat%'");
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE nosurat LIKE '$nosurat%'")->result();
		$data['page']		= 'Daftar Surat Penegasan';
		$this->load->view("bpr/pemantauan", $data);
    }

    public function add_tutup()
    {
    	$config = array(

    		'upload_path'   => './upload/',
    		'allowed_types' => 'pdf|PDF',
    		'max_size'      => '102400'
    	);
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('surat')) {
	      $this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
	      redirect(site_url('bpr/penutupan'));
	    }

	     else {
	      $file = $this->upload->data();
	      $data = array(
	          'nosurat'         => $this->input->post('nosurat'),
	          'idbank'          => $this->input->post('idbank'),
	          'judul'   		=> $this->input->post('judul'),
	          'tipe'       		=> $this->input->post('tipe'),
	          'tglsubmit'      	=> $this->input->post('tglsubmit'),
	          
	          'alasan'          => $this->input->post('alasan'),
	          'ketpenyelesaian' => $this->input->post('ketpenyelesaian'),
	          'surat'           => $file['file_name']
	      );

	      $this->pengajuan_model->add($data);

	      $no = $this->input->post('nosurat');
	      $this->db->query("INSERT INTO notifikasi (idnotif, nosurat, notifbpr, notifstaf, notifkasubag) VALUES (NULL, '$no', '0', '1', '1')");
	    }
	    $this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data Berhasil dikirim ! Silahkan tunggu pemberitahuan selanjutnya...</div>");           
	    redirect(site_url('bpr/penutupan'));
	  }


	//PEMBUKAAN
	public function pembukaan()
	{
		$data['page']	= 'Pembukaan';
		$this->load->view("bpr/pembukaan", $data);
    }

	public function pembukaan_baru()
    {
    	$config = array(

    		'upload_path'   => './upload/',
    		'allowed_types' => 'pdf|PDF',
    		'max_size'      => '102400'
    	);
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('surat')) {
	      $this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
	      redirect(site_url('bpr/pembukaan'));
	    }

	     else {
	      $file = $this->upload->data();
	      $data = array(
	          'nosurat'         => $this->input->post('nosurat'),
	          'idbank'          => $this->input->post('idbank'),
	          'judul'   		=> $this->input->post('judul'),
	          'tipe'       		=> $this->input->post('tipe'),
	          'tglsubmit'      	=> $this->input->post('tglsubmit'),
	          
	          'surat'           => $file['file_name']
	      );

	      $this->pengajuan_model->add($data);

	      $no = $this->input->post('nosurat');
	    }
	    $surat 	= $file['file_name'];
	    $url 	= "".base_url()."bpr/pembukaan_dokumen/$surat"; 
	    $this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Pengajuan berhasil ditambahkan... selanjutnya silahkan upload kelengkapan dokumen...</div>");           
	    redirect($url);
	}

	public function pembukaan_dokumen($surat)
	{	

		$data['page']		= 'Form Pengajuan Izin Pembukaan Kantor';
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE surat='$surat'")->result();
		$this->load->view("bpr/pembukaan_file", $data);
    }

	public function pembukaan_upload_file()
    {
    	$nosurat = $this->input->post('nosurat');

    	$config = array(
    		'upload_path'   => './upload/',
    		'allowed_types' => 'pdf|PDF',
    		'max_size'      => '102400'
    	);
	    $this->load->library('upload', $config);
	    
	    if ($this->input->post('aktasewa_cek'))
	    {
	    	if (!$this->upload->do_upload('aktasewa')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET aktasewa = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('strukturorg_cek')))
	    {
	    	if (!$this->upload->do_upload('strukturorg')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET strukturorg = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('skdomisili_cek')))
	    {
	    	if (!$this->upload->do_upload('skdomisili')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET skdomisili = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('aktiva_cek')))
	    {
	    	if (!$this->upload->do_upload('aktiva')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET aktiva = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('doksiap_cek')))
	    {
	    	if (!$this->upload->do_upload('doksiap')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET doksiap = '$data' WHERE nosurat='$nosurat'");
		    }
	    }

	    $this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> File berhasil Diupload</div>");           
	    $referred_from = $this->session->userdata('referred_pembukaan_file');
	    redirect($referred_from);
	}

	public function kirim_pembukaan($surat)
	{	
		$this->db->query("INSERT INTO notifikasi (idnotif, nosurat, notifbpr, notifstaf, notifkasubag) VALUES (NULL, (SELECT nosurat FROM pengajuan WHERE surat='$surat'), '0', '1', '1')");

		$this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Pengajuan Perizinan Berhasil dikirim !<br>Silahkan tunggu pemberitahuan selanjutnya...<br>Untuk melihat perkembangan proses pengajuan, silahkan cek menu <a href=\"".base_url()."bpr/pemantauan\">pemantauan</a></div>");

	    $referred_from = $this->session->userdata('referred_pembukaan_file');
	    redirect($referred_from);
	}
    //END PEMBUKAAN



    //RELOKASI
    public function relokasi()
	{
		$data['page']	= 'relokasi';
		$this->load->view("bpr/relokasi", $data);
    }

	public function relokasi_baru()
    {
    	$config = array(

    		'upload_path'   => './upload/',
    		'allowed_types' => 'pdf|PDF',
    		'max_size'      => '102400'
    	);
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('surat')) {
	      $this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
	      redirect(site_url('bpr/relokasi'));
	    }

	     else {
	      $file = $this->upload->data();
	      $data = array(
	          'nosurat'         => $this->input->post('nosurat'),
	          'idbank'          => $this->input->post('idbank'),
	          'judul'   		=> $this->input->post('judul'),
	          'tipe'       		=> $this->input->post('tipe'),
	          'tglsubmit'      	=> $this->input->post('tglsubmit'),
	          
	          'surat'           => $file['file_name']
	      );

	      $this->pengajuan_model->add($data);

	      $no = $this->input->post('nosurat');
	    }
	    $surat 	= $file['file_name'];
	    $url 	= "".base_url()."bpr/relokasi_dokumen/$surat"; 
	    $this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Pengajuan berhasil ditambahkan... selanjutnya silahkan upload kelengkapan dokumen...</div>");           
	    redirect($url);
	}

	public function relokasi_dokumen($surat)
	{	

		$data['page']		= 'Form Pengajuan Izin relokasi Kantor';
		$data['pengajuan']	= $this->db->query("SELECT * FROM pengajuan WHERE surat='$surat'")->result();
		$this->load->view("bpr/relokasi_file", $data);
    }

	public function relokasi_upload_file()
    {
    	$nosurat = $this->input->post('nosurat');

    	$config = array(
    		'upload_path'   => './upload/',
    		'allowed_types' => 'pdf|PDF',
    		'max_size'      => '102400'
    	);
	    $this->load->library('upload', $config);

	    if ($this->input->post('aktasewa_cek'))
	    {
	    	if (!$this->upload->do_upload('aktasewa')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET aktasewa = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('strukturorg_cek')))
	    {
	    	if (!$this->upload->do_upload('strukturorg')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET strukturorg = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('skdomisili_cek')))
	    {
	    	if (!$this->upload->do_upload('skdomisili')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET skdomisili = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('aktiva_cek')))
	    {
	    	if (!$this->upload->do_upload('aktiva')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET aktiva = '$data' WHERE nosurat='$nosurat'");
		    }
	    }
	    elseif (!empty($this->input->post('doksiap_cek')))
	    {
	    	if (!$this->upload->do_upload('doksiap')){
		    	$this->session->set_flashdata('notif', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
		    	redirect($referred_from);
		    } else {
		    	$file = $this->upload->data();
		    	$data = $file['file_name'];
		    	$this->db->query("UPDATE pengajuan SET doksiap = '$data' WHERE nosurat='$nosurat'");
		    }
	    }

	    $this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> File berhasil Diupload</div>");           
	    $referred_from = $this->session->userdata('referred_relokasi_file');
	    redirect($referred_from);
	}

	public function kirim_relokasi($surat)
	{	
		$this->db->query("INSERT INTO notifikasi (idnotif, nosurat, notifbpr, notifstaf, notifkasubag) VALUES (NULL, (SELECT nosurat FROM pengajuan WHERE surat='$surat'), '0', '1', '1')");

		$this->session->set_flashdata("notif", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Pengajuan Perizinan Berhasil dikirim !<br>Silahkan tunggu pemberitahuan selanjutnya...<br>Untuk melihat perkembangan proses pengajuan, silahkan cek menu <a href=\"".base_url()."bpr/pemantauan\">pemantauan</a></div>");

	    $referred_from = $this->session->userdata('referred_relokasi_file');
	    redirect($referred_from);
	}
    //END RELOKASI



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

}