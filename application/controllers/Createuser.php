<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateUser extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelUserManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        if(in_array($GLOBALS['NAV_CREATEUSER'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/utilities/createuser');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function register(){
        $firstname = $_REQUEST['FIRSTNAME'];
        $middlename = $_REQUEST['MIDDLENAME'];
        $lastname = $_REQUEST['LASTNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];
        $gender = $_REQUEST['GENDER'];
        $birthday = $_REQUEST['BIRTHDAY'];
        $department = $_REQUEST['DEPARTMENT'];
        $msisdn = $_REQUEST['MSISDN'];
        $string = str_replace(' ', '', $lastname);
        $pass = $firstname[0].$middlename[0].$string;
        $username = $_REQUEST['IDNUMBER'];
        $existing = $this->CheckExistingRecord->checkUsers($username);


        $dir ="uploads/profile_pictures/";
        $imagename = "NOIMAGE.jpg";
        if(isset($_FILES["FILES"]["name"])){
            $temp = explode(".", $_FILES["FILES"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $_SESSION['getfilename'] = $newfilename;
            move_uploaded_file($_FILES["FILES"]["tmp_name"],
                $dir . $newfilename);
            $imagename = $_SESSION['getfilename'];
        }

        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Employee ID Number Already Exists'
            ));
            echo $result;
        } else {
            if($userlevel == "MUNICIPALHEAD" || $userlevel == "HRMANAGER"){
                $existingMayorManager = $this->CheckExistingRecord->checkMayorManagerUsers($userlevel);
                if($existingMayorManager){
                    $result = json_encode(array(
                        'Code' => '02',
                        'Message' => $userlevel.' User Already Exists'
                    ));
                } else {
                    $password = $this->genPass(strtoupper($pass),$username);
                    $userData = array(
                        'username' => $username,
                        'firstname' => strtoupper($firstname),
                        'middlename' => strtoupper($middlename),
                        'lastname' => strtoupper($lastname),
                        'userlevel' => strtoupper($userlevel),
                        'password' => md5($password),
                        'status' => '0'
                    );

                    $userDetails = array(
                        'gender' => strtoupper($gender),
                        'birthday' => strtoupper($birthday),
                        'contactnumber' => '63'.$msisdn,
                        'username'=> $username,
                        'filename' => $imagename,
                        'filepath' => $dir,
                        'department' => $department
                    );

                    $insert = $this->ModelUserManagement->insert($userData,$userDetails);
                    if($insert){
                        $auditdata = array(
                            'modulename'=>'Account Module',
                            'action'=>'Create User Account ['.$username.']',
                            'user'=>$this->session->userdata('username'),
                            'ipaddress'=> $_SERVER['REMOTE_ADDR']
                        );
                        $audit = $this->ModelAuditTrail->insert($auditdata);
                        $result = json_encode(array(
                            'Code' => '00',
                            'Message' => 'User Account Successfully Created'
                        ));
                    }else{
                        $result = json_encode(array(
                            'Code' => '01',
                            'Message' => 'User Account Registration Failed'
                        ));
                    }
                }
            } else {
                $password = $this->genPass(strtoupper($pass),$username);
                $userData = array(
                    'username' => $username,
                    'firstname' => strtoupper($firstname),
                    'middlename' => strtoupper($middlename),
                    'lastname' => strtoupper($lastname),
                    'userlevel' => strtoupper($userlevel),
                    'password' => md5($password),
                    'status' => '0'
                );

                $userDetails = array(
                    'gender' => strtoupper($gender),
                    'birthday' => strtoupper($birthday),
                    'contactnumber' => '63'.$msisdn,
                    'username'=> $username,
                    'filename' => $imagename,
                    'filepath' => $dir,
                    'department' => $department
                );

                $insert = $this->ModelUserManagement->insert($userData,$userDetails);
                if($insert){
                    $auditdata = array(
                        'modulename'=>'Account Module',
                        'action'=>'Create User Account ['.$username.']',
                        'user'=>$this->session->userdata('username'),
                        'ipaddress'=> $_SERVER['REMOTE_ADDR']
                    );
                    $audit = $this->ModelAuditTrail->insert($auditdata);
                    $result = json_encode(array(
                        'Code' => '00',
                        'Message' => 'User Account Successfully Created'
                    ));
                }else{
                    $result = json_encode(array(
                        'Code' => '01',
                        'Message' => 'User Account Registration Failed'
                    ));
                }
            }
            echo $result;
        }
    }

    public function departments(){
        $getAll = $this->ModelUserManagement->getDepartments();

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





    function genPass($val,$val2){
        return base64_encode($val.$GLOBALS['crypt'].$val2);
    }


}
