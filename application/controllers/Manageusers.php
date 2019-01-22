<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUsers extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelUserManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('NewSession');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = '';
        if(in_array($GLOBALS['NAV_MANAGEUSERS'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/utilities/manageuser');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function users(){
        $userlevel = $_REQUEST['USERLEVEL'];
        $getuser = $this->ModelUserManagement->getRows($userlevel);

        if($getuser){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getuser
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }


    public function update(){
        $userid = $_REQUEST['USERNAME'];
        $firstname = strtoupper($_REQUEST['FIRSTNAME']);
        $middlename = strtoupper($_REQUEST['MIDDLENAME']);
        $lastname = strtoupper($_REQUEST['LASTNAME']);
        $gender = $_REQUEST['GENDER'];
        $birthday = $_REQUEST['BIRTHDAY'];
        $msisdn = $_REQUEST['MSISDN'];
        $changed = $_REQUEST['ISCHANGED'];
        $oldimagename = $_REQUEST['OLDIMAGENAME'];
        $editimgname = $_REQUEST['IMAGENAME'];
        $editimgpath = $_REQUEST['IMAGEPATH'];
        $department = $_REQUEST['DEPARTMENT'];

        $dir ="uploads/profile_pictures/";
        $imagepath = "uploads/profile_pictures/";
        $imagename = $editimgname;
        if($changed == "YES"){
            if(isset($_FILES["FILES"]["name"])){
                $temp = explode(".", $_FILES["FILES"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $_SESSION['getfilename'] = $newfilename;
                move_uploaded_file($_FILES["FILES"]["tmp_name"],
                    $dir . $newfilename);
                $imagename = $_SESSION['getfilename'];
                $imagepath = $dir;

                @unlink($dir.$oldimagename);
            }
        } else {
            $imagename = $editimgname;
            $imagepath = $editimgpath;
        }

        $userData = array(
            'firstname' => strtoupper($firstname),
            'middlename' => strtoupper($middlename),
            'lastname' => strtoupper($lastname)
        );

        $userDetails = array(
            'gender' => strtoupper($gender),
            'birthday' => strtoupper($birthday),
            'contactnumber' => '63'.$msisdn,
            'filename'=>$imagename,
            'filepath'=>$imagepath,
            'department'=>$department
        );

        $update = $this->ModelUserManagement->updateUser($userData,$userDetails,$userid);
        if($update){
            $auditdata = array(
                'modulename'=>'Account Module',
                'action'=>'Update User Account ['.$userid.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated User Account Details'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'User Account Details Update Failed'
            ));
        }
        echo $result;
    }

    public function delete(){
        $username = $_REQUEST['USERNAME'];
        $filename = $_REQUEST['FILENAME'];
        $userData = array(
            'status' => '1'
        );
        $delete = $this->ModelUserManagement->deleteUser($username,$userData);
        if($delete){
            $auditdata = array(
                'modulename'=>'Account Module',
                'action'=>'Delete User Account ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Deleted User'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function resetpassword(){
        $userid = $_REQUEST['USERNAME'];
        $firstname = $_REQUEST['FIRSTNAME'];
        $middlename = $_REQUEST['MIDDLENAME'];
        $lastname = $_REQUEST['LASTNAME'];
        $string = str_replace(' ', '', $lastname);
        $pass = $firstname[0].$middlename[0].$string;
        $userData = array(
            'password' => md5($this->genPass(strtoupper($pass),$userid))
        );

        $update = $this->ModelUserManagement->resetPassword($userData,$userid);
        if($update){
            $auditdata = array(
                'modulename'=>'Account Module',
                'action'=>'Reset User Password ['.$userid.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Reset Password'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Reset Password Failed'
            ));
        }
        echo $result;
    }

    function genPass($val,$val2){
        return base64_encode($val.$GLOBALS['crypt'].$val2);
    }
}
