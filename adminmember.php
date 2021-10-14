<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Adminmember extends CI_Controller {



    function __construct() {

 

        parent::__construct();

        $this->load->model(array('auth', 'member_model', 'utils_model'));

    }



    function index() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $data = '';

        $subdata = '';

        $data['title'] = "Member - Admin - Raihan";

        $data['header_title'] = "Member";

        $data['tools'] = '

        <form style="float:right;" name="newForm" action="' . base_url() . 'adminmember/add_new" method="post">

        <input class="btn1" type="submit" value="Tambah Member" name="newMember"/>

        </form>

        ';

        $subdata['list_level'] = $this->member_model->getListLevel();

        $data['body'] = $this->load->view('member/list', $subdata, TRUE);

        $this->load->view('output', $data);

    }



    function add_new() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $subdata['list_level'] = $this->member_model->getListLevel();

        $subdata['list_bank'] = $this->utils_model->getBankAccount();
        
        $subdata['province'] = $this->Generic->get_grouped('tb_province');

        $data['title'] = "Tambah Member - Admin - Raihan";

        $data['header_title'] = "Tambah Member";

        $data['tree_map']['href_parrent'] = base_url() . "adminmember";

        $data['tree_map']['parrent'] = "List Member";

        $data['tree_map']['sub_header'] = "Tambah Member";

        $data['tools'] = '';

        $data['body'] = $this->load->view('member/new', $subdata, TRUE);

        $this->load->view('output', $data);

    }



    function submit_new() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        if ($this->input->post('submit_new')) {

            $this->member_model->addNew();

        }

        redirect('adminmember');

    }



    function edit() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $subdata['list_level'] = $this->member_model->getListLevel();

        $subdata['list_bank'] = $this->utils_model->getBankAccount();

        $id = $this->input->get('id');

        $subdata['member_data'] = $this->member_model->getPersonalData($id);

        $subdata['referal'] = '';

        if (!empty($subdata['member_data'][0]['referal'])) {

            $referal_id = $subdata['member_data'][0]['referal'];

            if ($referal_id != NULL)

                $subdata['referal'] = $this->member_model->getNameById($referal_id);

        }

        $subdata['member_downline'] = $this->member_model->getMemberDownline($id);

        $subdata['sales_media'] = $this->member_model->getSalesMedia($id);

        $data['title'] = "Edit Member - Admin - Raihan";

        $data['header_title'] = "Edit Member";

        $data['tree_map']['href_parrent'] = base_url() . "adminmember";

        $data['tree_map']['parrent'] = "List Member";

        $data['tree_map']['sub_header'] = "Edit Member";

        $data['tools'] = '';

        $data['body'] = $this->load->view('member/edit', $subdata, TRUE);

        $this->load->view('output', $data);

    }



    function detail() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $id = $this->input->get('id');

        $subdata['member_data'] = $this->member_model->getPersonalData($id);
        
        $subdata['months'] = $this->member_model->getOrderMonths($id);

        $subdata['referal'] = '';

        if (!empty($subdata['member_data'][0]['referal'])) {

            $referal_id = $subdata['member_data'][0]['referal'];

            if ($referal_id != NULL)

                $subdata['referal'] = $this->member_model->getNameById($referal_id);

        }

        if (!empty($subdata['member_data'][0]['id_bank']) && $subdata['member_data'][0]['id_bank'] != NULL && $subdata['member_data'][0]['id_bank'] > 0) {

            $subdata['member_data'][0]['bank_name'] = $this->utils_model->getBankNameById($subdata['member_data'][0]['id_bank']);

        }

        $subdata['member_downline'] = $this->member_model->getMemberDownline($id);

        $subdata['sales_media'] = $this->member_model->getSalesMedia($id);

        $this->load->model('report_model');

        $year = date('Y');

        $month = (date('m') * 1);

        $subdata['performance'] = $this->report_model->getPerformanceSummary($id, $month, $year);

        $data['title'] = "Detail Member - Admin - Raihan";

        $data['header_title'] = "Detail Member";

        $data['tree_map']['href_parrent'] = base_url() . "adminmember";

        $data['tree_map']['parrent'] = "List Member";

        $data['tree_map']['sub_header'] = "Detail Member";

        $data['tools'] = '';

        $data['body'] = $this->load->view('member/detail', $subdata, TRUE);

        $this->load->view('output', $data);

        //$this->load->view('member/detail', $subdata);

    }



    function checkemail() {

 

        $email = $this->input->get('email');

        $id = $this->input->get('id');

        if ($this->auth->checkEmailAvailable($email, $id) == TRUE)

            echo 'true';

        else

            echo 'false';

    }



    function submit_edit() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $this->member_model->editMember();

        redirect('adminmember');

    }



    function action() {

 

        if ($this->auth->check_logged() != 'logged_admin') {

            redirect(base_url());

        }

        $action = $this->input->post('action');

        if ($action == "delete"){

            $this->member_model->delete();

        }elseif ($action == "approve"){

            $ids = $this->input->post('cek');

            $this->member_model->approve($ids);

        }           

        redirect('adminmember');

    }



    function getListMember() {

 

        $output = $this->member_model->getListMember();

        echo json_encode($output);

    }



    function getList() {

 

        $output = $this->member_model->getList();

        echo json_encode($output);

    }

    

    function refreshTotalSales(){

 

		$this->member_model->refreshTotalSales();

	}



    function printSales(){

 
        if($this->input->post('is_mobile'))
            $this->session->set_userdata('logged_admin', 1);
        if($this->auth->check_logged() != 'logged_admin')

        {

            redirect(base_url());

        }

        $this->load->model("order_model");

        $this->load->model("utils_model");
        
        $month_year = explode('-', $this->input->post('month'));
        
        $month = $month_year[0];

        $year = $this->input->post('year');

        if(!$year)
            $year =$month_year[1];
        
        $month_name = $this->utils_model->getMonthInIndonesia($month);

        $data['periode'] = $month_name . " " . $year;

        $data['type'] = $this->input->post('type');

        if($this->input->post('type')==1){

            $data['sales'] = $this->order_model->getMemberSalesPrint($this->input->post('id_member'), $month, $year);

            $title = 'Member';

        }elseif ($this->input->post('type')==2) {

            $data['sales'] = $this->order_model->getTeamSalesPrint($this->input->post('id_member'), $month, $year);

            $title = 'Team';

        }

        

        $doctype = $this->input->post('doctype');
        if(!$doctype) $doctype="pdf";


        if($doctype == "xls"){

            $header = array('Tanggal', 'No Order', 'Reseller', 'Pembeli', 'Total', 'Ongkir', 'Komisi', 'Fee', 'Vol', 'Bank');

            $this->get_excel($title, $header, $data['sales'],  $data['periode']);

        } else if($doctype == "pdf"){

            write_pdf($this->load->view('report/sales', $data, TRUE), $title);
            // echo json_encode($data);

        } 



        //$this->load->view('report/sales', $data);

    }



      public function get_excel($title, $header = array(), $data = array(), $periode='', $total_member=''){

 

        $title = ucwords($title). " Report";



        $this->load->library('excel');

        //$this->load->library('pdf');



        $this->excel->setActiveSheetIndex(0);

        $ws = $this->excel->getActiveSheet();



        $ws->setTitle("Raihan - ".$title);

        $ws->getStyle('A1')->getFont()->setBold(true);

        $ws->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //$ws->setCellValue('A1', strtoupper($title));



        $col = 'A';

        $row = '12';

        $numcol = 0;



        $ws->fromArray($header, NULL, $col.$row);

        $ws->fromArray($data, NULL, 'A13');



        foreach ($header as $h) {

            if($h!='No')$ws->getColumnDimension($col)->setWidth(30);

            $ws->getStyle($col.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $ws->getStyle($col.$row)->getFont()->setBold(true);

            $ws->getStyle($col.'1:'.$col.$ws->getHighestRow())->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

            $ws->getStyle($col.'1:'.$col.$ws->getHighestRow())->getAlignment()->setWrapText(true); 

            $col++;

            $numcol++;

        }



        $ws->mergeCells('A1:'.$ws->getHighestColumn().'10');   

        $pos = floor( ($numcol-1)/2 );

        $char = 'A';

        for($i=1; $i<$pos; $i++){

            $char++;

        }



        $objDrawing = new PHPExcel_Worksheet_Drawing();

        $objDrawing->setWorksheet($ws);

        $objDrawing->setName("name");

        $objDrawing->setDescription("Description");

        $objDrawing->setPath("images/report_header.png");

        $objDrawing->setCoordinates($char.'1');

        $objDrawing->setHeight(100);

        $objDrawing->setWidth(600);





        $filename='Raihan - '.$title.'.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type

        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  

        $objWriter->save('php://output');

    }





}



/* End of file adminmember.php */

/* Location: ./application/controllers/adminmember.php */