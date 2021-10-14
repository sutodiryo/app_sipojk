<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
    {
        $this->db->insert('pengajuan',$data);
    }

    function upload_process($config, $file){
        $status = "";
        $msg    = "";
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $status = 'success';
            $msg = $this->upload->data();
        }
        //
        $result = array(
            'status' => $status,
            'msg' => $msg
        );
        return $result;
    }

}