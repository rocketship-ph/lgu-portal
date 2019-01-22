<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelUtilities');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        if(array_intersect($GLOBALS['NAV_UTILITIES'], $this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_utility/utility');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function displayaudittrail()
    {
        if(in_array($GLOBALS['NAV_AUDITTRAIL'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/utilities/audittrail');
            $this->load->view('templates/MasterTemplate',$data);
        } else {
            $this->load->view('mods/unauthorizedpage');
        }
    }

    public function displaybackup()
    {
        if(in_array($GLOBALS['NAV_DATABASEBACKUP'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/utilities/databasebackup');
            $this->load->view('templates/MasterTemplate',$data);
        } else {
            $this->load->view('mods/unauthorizedpage');
        }
    }

    public function assignroles()
    {
        if($this->session->userdata('userlevel') == "ADMINISTRATOR"){
            $data = array('content'=>'mods/mod_recruitment/utilities/assignroles');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function audittrail(){
        $datefrom = $_REQUEST['DATEFROM'];
        $dateto = $_REQUEST['DATETO'];
        $getAll = $this->ModelAuditTrail->getAuditTrail($datefrom,$dateto);

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

    public function getbackups(){
        $getAll = $this->ModelUtilities->getDatabaseBackups();

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

    public function databasebackup(){
        $this->load->dbutil();
        $backupname = 'db-backup'.date("Y-m-d-H-i-s");
        $creator = $this->session->userdata('username');

        $dir ="uploads/backups/";

        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'lgudb.sql'
        );

        @$backup =& $this->dbutil->backup($prefs);

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = $dir.$db_name;

        $this->load->helper('file');
        write_file($save, $backup);


//        $this->load->helper('download');
//        force_download($db_name, $backup);
        $userdata = array(
            'createdby'=>$creator,
            'backupname'=>$backupname,
            'filename'=>$db_name,
            'path'=>$save,
            'status'=>'0'
        );
        $create = $this->ModelUtilities->createBackup($userdata);

        if($create){
            $auditdata = array(
                'modulename'=>'Utilities Module',
                'action'=>'Create Database Backup',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Created Database Backup'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function deletebackup(){
        $id = $_REQUEST['ID'];
        $filename = $_REQUEST['FILENAME'];
        $dir ="uploads/backups/";
        $delete = $this->ModelUtilities->deleteBackup($id);
        if($delete){
            @unlink($dir.$filename);
            $auditdata = array(
                'modulename'=>'Utilities Module',
                'action'=>'Delete Database Backup',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Backup Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    function download(){
        $auditdata = array(
            'modulename'=>'Utilities Module',
            'action'=>'Download Database Backup',
            'user'=>$this->session->userdata('username'),
            'ipaddress'=> $_SERVER['REMOTE_ADDR']
        );
        $audit = $this->ModelAuditTrail->insert($auditdata);
        if($audit){
            $this->load->helper('download');
            $data = file_get_contents(base_url().'uploads/backups/'.$this->uri->segment(3));
            $name = $this->uri->segment(3);
            force_download($name, $data);
        }


    }
}
