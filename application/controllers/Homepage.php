<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('NewSession');
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelLogoFetcher');
        $this->load->model('ModelAnnouncementsManagement');
        $this->load->model('ModelNotificationManagement');
        $this->load->model('ModelApplicationManagement');
        $this->load->model('ModelApplicantLetterManagement');
        $this->load->model('CheckExistingRecord');
    }

    public function index()
    {
        if($this->session->isUserLoggedIn){
            redirect(base_url().'main');
        } else {
            $logo = $this->ModelLogoFetcher->hasRows();
            if($logo){
                $GLOBALS['logohandler'] = $logo[0]['logo'];
            } else {
                $GLOBALS['logohandler'] = base_url().'assets/img/logo.png';
            }
            $data = array('content'=>'mods/mod_session/login');
            $this->load->view('templates/LoginTemplate',$data);
        }
    }

    function getimages(){
        $files=glob("uploads/carousel_photos/*.*");
        foreach($files as $file){
            $obj = json_encode((object)[
                'src' => $files
            ]);
        }
        echo $obj;
    }

    public function login(){
        $username = $_REQUEST['USERNAME'];
        $password = $_REQUEST['PASSWORD'];

        $checkLogin = $this->NewSession->getRows($username);
        $getlogo = $this->ModelLogoFetcher->hasRows();
        $requestnumber = $this->NewSession->getRequestnumber($checkLogin['username']);
        if($requestnumber){
           $reqnum = $requestnumber[0]['requestnumber'];
           $applicantcode = $requestnumber[0]['applicantcode'];
        } else {
            $reqnum = "";
            $applicantcode = "";
        }
        if($getlogo){
            $logo = $getlogo[0]['logo'];
        } else {
            $logo = base_url().'assets/img/logo.png';
        }
        if($checkLogin){
            if($checkLogin['password'] == md5(base64_encode($password.$GLOBALS['crypt'].$username))){
                $modules = $this->NewSession->getmodules($username,$checkLogin['userlevel']);
                $pmt = $this->NewSession->getPmt($username);
                if($modules){
                    $this->session->set_userdata(array(
                        'isUserLoggedIn' => TRUE,
                        'id' => $checkLogin['id'],
                        'username' => $checkLogin['username'],
                        'name' => $checkLogin['firstname'].' '.$checkLogin['middlename'].' '.$checkLogin['lastname'],
                        'firstname' => $checkLogin['firstname'],
                        'middlename' => $checkLogin['middlename'],
                        'lastname' => $checkLogin['lastname'],
                        'status' => $checkLogin['status'],
                        'userlevel' => $checkLogin['userlevel'],
                        'filename'=>$checkLogin['filename'],
                        'filepath'=>$checkLogin['filepath'],
                        'department'=>$checkLogin['department'],
                        'position'=>$checkLogin['currentposition'],
                        'modules'=>$modules,
                        'requestnumber'=>$reqnum,
                        'applicantcode'=>$applicantcode,
                        'logo'=> $logo,
                        'lguid'=> '1',
                        'schema'=> $this->db->database,
                        'pmt'=> ($pmt) ?  $pmt[0]['role'] : "1"
                    ));

                    $auditdata = array(
                        'modulename'=>'Session Module',
                        'action'=>'User Log In ['.$checkLogin["username"].']',
                        'user'=>$this->session->userdata('username'),
                        'ipaddress'=> $_SERVER['REMOTE_ADDR']
                    );
                    $audit = $this->ModelAuditTrail->insert($auditdata);
                }
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Success'
                ));
                echo $result;
            } else {
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Incorrect Username and/or Password'
                ));
                echo $result;
            }

        }else{
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'Account not found. Please enter a valid username and password'
            ));
            echo $result;
        }
    }

    public function announcements(){
        $ann = $this->ModelAnnouncementsManagement->get();
        if($ann){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully fetched data',
                'details' => $ann
            ));
            echo $result;
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'No Announcements Available'
            ));
            echo $result;
        }
    }

    public function logout(){
        if($this->session->userdata('username') !== null){
            $auditdata = array(
                'modulename'=>'Session Module',
                'action'=>'User Log Out ['.$this->session->userdata('username').']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }
        $this->session->sess_destroy();
        header("Location:".base_url().'homepage');
    }


    //for job applications

    public function updateapplicant(){

        $username = $this->session->userdata('username');
        $q = $_REQUEST['STATUS'];
        $appnum = $this->ModelApplicationManagement->getApplicantNumber();
        if($appnum){
            foreach($appnum as $key=>$value){
                $appnumber = $value['appnumber'];
            }
            $appcode = 'App-'.$this->session->userdata('requestnumber').'-'.$appnumber;

            if($q == "qualified"){
                $updatedata = array(
                    'ispds'=>'YES',
                    'isqualified'=>'YES',
                    'applicantcode'=>$appcode
                );
            } else {
                $updatedata = array(
                    'ispds'=>'YES',
                    'isqualified'=>'NO',
                    'applicantcode'=>''
                );
            }

            $update = $this->ModelApplicationManagement->updateApplicant($updatedata);
            if($update){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Updated Applicant'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'Update applicant failed'
                ));
            }
            echo $result;
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Request of app number failed'
            ));
            echo $result;
        }
    }

    public function displayApprovedRequestDetails(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $details = $this->ModelNotificationManagement->getApprovedReqDetails($reqnum);

        if($details){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $details
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function requestAccess(){
        $applicantno = $this->ModelApplicationManagement->getApplicantRowNumber();
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $firstname = $_REQUEST['FIRSTNAME'];
        $lastname = $_REQUEST['LASTNAME'];
        $middlename = $_REQUEST['MIDDLENAME'];
        $msisdn = $_REQUEST['MSISDN'];
        $email = $_REQUEST['EMAIL'];
        $province = $_REQUEST['PROVINCE'];
        $city = $_REQUEST['CITY'];
        $brgy = $_REQUEST['BARANGAY'];
        $address = $_REQUEST['SPECIFICADDRESS'];
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


        foreach($applicantno as $key=>$value){
            $approw = $value['approw'];
        }
        $tempacc = strtoupper(substr($firstname,0,3).substr($lastname,0,3).$reqnum.'-'.$approw);

        $resumename = '';
        $dir_resume ="uploads/applicant_resume/";
        if(isset($_FILES["RESUMEFILES"]["name"])){
            $temp = explode(".", $_FILES["RESUMEFILES"]["name"]);
            $newresumefilename = $tempacc.'-'.round(microtime(true)) . '.' . end($temp);
            $_SESSION['getresumefilename'] = $newresumefilename;
            move_uploaded_file($_FILES["RESUMEFILES"]["tmp_name"],
                $dir_resume . $newresumefilename);
            $resumename = $_SESSION['getresumefilename'];
        }

        $existing = $this->CheckExistingRecord->checkApplicants($tempacc,$reqnum);
        if($existing){
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'An access has already been granted to "'.$tempacc.'". Please login using the given credentials to continue with the application'
            ));
            echo $result;
        } else {
            $applicant = array(
                "username"=>$tempacc,
                "requestnumber"=>$reqnum,
                "province"=>$province,
                "city"=>$city,
                "brgy"=>$brgy,
                "specificaddress"=>$address,
                "email"=>$email,
                "status"=>"0",
                "filename" => $resumename,
                "filepath" => $dir_resume
            );
            $password = $this->genPass("12345",$tempacc);
            $userdata = array(
                "username"=>$tempacc,
                "password"=>md5($password),
                "firstname"=>strtoupper($firstname),
                "middlename"=>strtoupper($middlename),
                "lastname"=>strtoupper($lastname),
                "userlevel"=>strtoupper("TEMPORARY"),
                "status"=>"0",
            );

            $userdetails = array(
                "username"=>$tempacc,
                "filename" => $imagename,
                "filepath" => $dir,
                "contactnumber"=>$msisdn,
                "birthday"=>"",
                "gender"=>""
            );

            $userconfig = array(
                "username"=>$tempacc,
                "moduleid"=>"1002"
            );

            $apply = $this->ModelApplicationManagement->insertApplicant($applicant,$userdata,$userdetails,$userconfig);
            if($apply){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Success',
                    'tempaccess'=>$tempacc
                ));
                $hremail = $this->ModelApplicantLetterManagement->getHrdEmail();
                if($hremail){
                    $emailaddress = '';
                    $letter = '';
                    foreach($hremail as $key=>$value){
                        $emailaddress = $value['email'];
                        $letter = $value['content'];
                    }
                    $applicantname = strtoupper($firstname).' '.strtoupper($middlename).' '.strtoupper($lastname);
                    $applicantaddress = strtoupper($address).' '.strtoupper($brgy).' '.strtoupper($city).' '.strtoupper($province);
                    $find = ["<request_number>","<applicant_name>","<address>","<contact_number>","<email_address>","<curr_year>"];
                    $replace = [$reqnum,$applicantname,$applicantaddress,$msisdn,$email,date("Y")];
                    $message = str_replace($find,$replace,$letter);

                    $from_email = "recruitment@prime-hrd.info";
                    $to_email = $emailaddress;
                    $subject = 'Applicant Resume ['.$reqnum.']';

                    $this->load->library('email');
                    $this->email->from($from_email, 'LGU Carmona');
                    $this->email->to($to_email);
                    $this->email->subject(utf8_encode(strtoupper($subject)));
                    $this->email->message($message);
                    $this->email->attach(base_url().$dir_resume.$resumename,'attachment');

                    if($this->email->send()){
                        log_message('debug', 'email sent to: '.$emailaddress);
                        log_message('debug', 'attachment: '.base_url().$dir_resume.$resumename);
                    } else {
                        log_message('debug', 'email not sent to: '.$emailaddress);
                        log_message('debug', 'attachment: '.base_url().$dir_resume.$resumename);
                    }


                }
            } else {
                $deletefailedinsert = $this->ModelApplicationManagement->deleteFailedApplication($tempacc);
                $result = json_encode(array(
                    'Code' => '02',
                    'Message' => 'Application failed'
                ));
                @unlink($dir_resume.$resumename);
                @unlink($dir.$imagename);
            }
            echo $result;
        }
    }


    function genPass($val,$val2){
        return base64_encode($val.$GLOBALS['crypt'].$val2);
    }

    public function getProvince(){
        $myfile = fopen("assets/libraries/addresses/refprovince.json", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("assets/libraries/addresses/refprovince.json"));
        fclose($myfile);
    }

    public function getCity(){
        $myfile = fopen("assets/libraries/addresses/refcitymun.json", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("assets/libraries/addresses/refcitymun.json"));
        fclose($myfile);
    }

    public function getBrgy(){
        $myfile = fopen("assets/libraries/addresses/refbrgy.json", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("assets/libraries/addresses/refbrgy.json"));
        fclose($myfile);
    }

}
