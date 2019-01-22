<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelCompetencies');
        $this->load->model('ModelPosition');
        $this->load->model('ModelPersonnelManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = '';
        if(array_intersect($GLOBALS['NAVRSPMANAGEMENT'], $this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_rsp/mod_recruitment/viewrecruitments');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personnel()
    {
        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personnelrequest()
    {
        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_rsp/mod_recruitment/personnelrequest');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function getpersonnelrequest(){
        $requestNumber = $_POST['REQUESTNUMBER'];
        $get = $this->ModelPersonnelManagement->getPersonnelRequest($requestNumber);

        if($get){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $get
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function requestapprovallevel(){
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $rowid = $_REQUEST['ROWID'];
        $ispositive = $_REQUEST['ISPOSITIVE'];
        if ($this->session->userdata('userlevel')=='HRMANAGER'){
            if($ispositive==0){
                $action='Recommend Personnel Request  ['.$requestnumber.']';
                $message="Personnel Request No. : ".$requestnumber." recommendation successful";
                $lvl=1;
            } else {
                $action='Reject Personnel Request  ['.$requestnumber.']';
                $message="Personnel Request No. : ".$requestnumber." has been rejected";
                $lvl=3;
            }
        }else if ($this->session->userdata('userlevel')=='MUNICIPALHEAD'){
            if ($ispositive==0){
                $action='Approve Recommended Personnel Request  ['.$requestnumber.']';
                $message="Personnel Request No. : ".$requestnumber." approval successful";
                $lvl=2;
            } else {
                $action='Reject Personnel Request  ['.$requestnumber.']';
                $message="Personnel Request No. : ".$requestnumber." has been rejected";
                $lvl=3;
            }
        }
        $request = $this->ModelPersonnelManagement->updateApprovalLevel($rowid,$lvl);
        if($request){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>$action,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => $message
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function getannouncements(){
        $getAll = $this->ModelPersonnelManagement->getAnnouncements();

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function viewcreateposition()
    {
        $this->load->view('mods/mod_rsp/mod_recruitment/createposition');
    }

    public function viewlistofposition()
    {
        $this->load->view('mods/mod_rsp/mod_recruitment/listofposition');
    }

    public function viewcreatecompetencyindex()
    {
        $this->load->view('mods/mod_rsp/mod_recruitment/createcompetencyindex');
    }

    public function viewcompetencyindex()
    {
        $this->load->view('mods/mod_rsp/mod_recruitment/competencyindex');
    }

    public function viewcompetencytable()
    {
        $this->load->view('mods/mod_rsp/mod_recruitment/competencytable');
    }




    public function competencyindices(){
        $getAll = $this->ModelCompetencies->getCompetencyIndex();

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function newcompetencyindex(){
        $competencytitle = $_REQUEST['COMPETENCYTITLE'];
        $competencyarea = $_REQUEST['COMPETENCYAREA'];
        $competencydescription = $_REQUEST['COMPETENCYDESCRIPTION'];
        $levels = $_REQUEST['LEVELS'];
        $creator = $this->session->userdata('username');

        $userdata = array(
            "competencytitle"=>$competencytitle,
            "competencyarea"=>$competencyarea,
            "competencydescription"=>$competencydescription,
            "levels"=>$levels,
            "createdby"=>$creator
        );

        $insert = $this->ModelCompetencies->insertNewCompetencyIndex($userdata);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Create New Competency Index',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Added Competency Index'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
    public function newcompetency(){
        $title = $_REQUEST['TITLE'];
        $description = $_REQUEST['DESCRIPTION'];
        $creator = $this->session->userdata('username');

        $userdata = array(
            "title"=>$title,
            "description"=>base64_encode($description),
            "createdby"=>$creator
        );

        $insert = $this->ModelCompetencies->insertNewCompetency($userdata);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Create New Competency Title',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Added Competency Title'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function editcompetency(){
        $rowid = $_REQUEST['ROWID'];
        $title = $_REQUEST['TITLE'];
        $description = $_REQUEST['DESCRIPTION'];
        $creator = $this->session->userdata('username');

        $userdata = array(
            "title"=>$title,
            "description"=>base64_encode($description),
            "createdby"=>$creator
        );

        $update = $this->ModelCompetencies->editCompetency($userdata,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Edit Competency Title',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated Competency Title'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function updatecompetencyindex(){
        $rowid = $_REQUEST['INDEXROWID'];
        $competencyarea = $_REQUEST['COMPETENCYAREA'];
        $competencydescription = $_REQUEST['COMPETENCYDESCRIPTION'];
        $levels = $_REQUEST['LEVELS'];
        $creator = $this->session->userdata('username');

        $userdata = array(
            "competencyarea"=>$competencyarea,
            "competencydescription"=>$competencydescription,
            "levels"=>$levels,
            "createdby"=>$creator
        );

        $update = $this->ModelCompetencies->editCompetencyIndex($userdata,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Edit Competency Index',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated Competency Index'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function deleteposition(){
        $rowid = $_REQUEST['ROWID'];
        $positioncode = $_REQUEST['POSITIONCODE'];

        $delete = $this->ModelPosition->deletePosition($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Delete Position ['.$positioncode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Deleted Position'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function deletecompetency(){
        $rowid = $_REQUEST['ROWID'];

        $delete = $this->ModelCompetencies->deleteCompetency($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Delete Competency Title',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Delete Competency Title'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function deletecompetencyindex(){
        $rowid = $_REQUEST['ROWID'];

        $delete = $this->ModelCompetencies->deleteCompetencyIndex($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Delete Competency Index',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Delete Competency Index'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    //FOR POSITION CREATE

    public function listofpositions(){
        $getAll = $this->ModelPosition->getPositions();

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function createposition(){

        $positionname = $_REQUEST['POSITIONNAME'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $positiondesc = $_REQUEST['POSITIONDESC'];
        $positiontype = $_REQUEST['POSITIONTYPE'];

        $createdby = $this->session->userdata('username');

        $userdata = array(
            "positioncode"=>strtoupper($positioncode),
            "positionname"=>$positionname,
            "positiondesc"=>$positiondesc,
            "positiontype"=>strtoupper($positiontype),
            "createdby"=>$createdby,
            "status"=>"0"
        );

        $insert = $this->ModelPosition->insertPosition($userdata);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Create New Position ['.strtoupper($positioncode).']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Created New Position'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function editposition(){
        $rowid = $_REQUEST['ROWID'];
        $positiontype = strtoupper($_REQUEST['POSITIONTYPE']);
        $description = $_REQUEST['DESCRIPTION'];

        $userdata = array(
            "positiontype"=>$positiontype,
            "positiondesc"=>base64_encode($description)
        );

        $update = $this->ModelPosition->editPosition($userdata,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Edit Position',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated Position'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    function positiondescription(){
//        $getAll = $this->ModelCompetencies->getCompetencyIndex();
        $getAll = true;
        $get = json_decode('[{"Description":"This is a description for the Position"}]');
        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $get
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    function qualificationdetails(){
//        $getAll = $this->ModelCompetencies->getCompetencyIndex();
        $getAll = true;
        $get = json_decode('[{"Description":"This is a description for the Qualification"}]');
        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $get
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function createpersonnelrequest(){

        $requestor = $_REQUEST['REQUESTOR'];
        $department = $_REQUEST['DEPARTMENT'];
        $reason = $_REQUEST['REASON'];
        $positionname = $_REQUEST['POSITIONNAME'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $createdby = $this->session->userdata('username');
        $qualification = $_REQUEST['QUALIFICATION'];

        $userdata = array(
            "positioncode"=>strtoupper($positioncode),
            "positionname"=>$positionname,
            "createdby"=>$createdby,
            "reason"=>$reason,
            "department"=>$department,
            "requestorname"=>$requestor,
            "levelofapproval"=>"0",
            "status"=>"0",
            "positionqualification"=>$qualification,
            "requestnumber"=>$requestnumber
        );

        $insert = $this->ModelPersonnelManagement->createPersonnelRequest($userdata);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Create Personnel Request ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Created Request for Personnel'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function editpersonnelrequest(){

        $requestor = $_REQUEST['REQUESTOR'];
        $department = $_REQUEST['DEPARTMENT'];
        $reason = $_REQUEST['REASON'];
        $positionname = $_REQUEST['POSITIONNAME'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $rowid = $_REQUEST['ROWID'];
        $createdby = $this->session->userdata('username');

        $userdata = array(
            "positioncode"=>strtoupper($positioncode),
            "positionname"=>$positionname,
            "createdby"=>$createdby,
            "reason"=>$reason,
            "department"=>$department,
            "requestorname"=>$requestor,
            "requestnumber"=>$requestnumber
        );

        $insert = $this->ModelPersonnelManagement->updatePersonnelRequest($userdata,$rowid);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Edit Personnel Request ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated Request for Personnel'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function listofpersonnelrequest(){
        $getAll = $this->ModelPersonnelManagement->getPersonnelRequests();

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function deletepersonnelrequest(){
        $rowid = $_REQUEST['ROWID'];
        $requestnumber = $_REQUEST['REQUESTNUMBER'];

        $delete = $this->ModelPersonnelManagement->deletePersonnelRequest($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Delete Personnel Request ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Deleted Personnel Request'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
}
