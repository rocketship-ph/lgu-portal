<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdsManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPdsManagement');
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelAnalyticsManagement');
        $this->load->model('ModelApplicationManagement');
        $this->load->model('ModelRolesConfig');
    }

    public function getPdsData(){
        $getAll = $this->ModelPdsManagement->getData($this->session->userdata('username'));

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

    public function insert(){
        $username = $this->session->userdata('username');
        $pdsdetails = array(
            'username' => $this->session->userdata('username'),
            'firstname' => strtoupper($_REQUEST['FIRSTNAME']),
            'middlename' => strtoupper($_REQUEST['MIDDLENAME']),
            'lastname' => strtoupper($_REQUEST['SURNAME']),
            'nameextension' => strtoupper($_REQUEST['NAMEEXTENSION']),
            'dateofbirth' => $_REQUEST['DOB'],
            'placeofbirth' => strtoupper($_REQUEST['PLACEOFBIRTH']),
            'sex' => strtoupper($_REQUEST['SEX']),
            'civilstatus' => strtoupper($_REQUEST['CIVILSTATUS']),
            'citizenship' => strtoupper($_REQUEST['CITIZENSHIP']),
            'height' => $_REQUEST['HEIGHT'],
            'weight' => $_REQUEST['WEIGHT'],
            'bloodtype' => strtoupper($_REQUEST['BLOODTYPE']),
            'gsisidno' => $_REQUEST['GSISNO'],
            'pagibigidno' => $_REQUEST['PAGIBIGNO'],
            'philhealthidno' => $_REQUEST['PHILHEALTHNO'],
            'sssidno' => $_REQUEST['SSSNO'],
            'tin' => $_REQUEST['TIN'],
            'residentialzipcode' => $_REQUEST['RESIDENTIALZIP'],
            'residentialtelno' => $_REQUEST['RESIDENTIALTELNO'],
            'residentialaddress' => $_REQUEST['RESIDENTIALADDRESS'],
            'residentialprovince' => $_REQUEST['RESIDENTIALPROVINCE'],
            'residentialcity' => $_REQUEST['RESIDENTIALCITY'],
            'residentialbrgy' => $_REQUEST['RESIDENTIALBRGY'],
            'permanentaddress' => $_REQUEST['PERMANENTADDRESS'],
            'permanentzipcode' => $_REQUEST['PERMANENTZIP'],
            'permanenttelno' => $_REQUEST['PERMANENTTELNO'],
            'permanentprovince' => $_REQUEST['PERMANENTPROVINCE'],
            'permanentcity' => $_REQUEST['PERMANENTCITY'],
            'permanentbrgy' => $_REQUEST['PERMANENTBRGY'],
            'email' => $_REQUEST['EMAIL'],
            'cellphoneno' => $_REQUEST['CELLPHONENO'],
            'agencyemployeeno' => $_REQUEST['AGENCYNO'],
            'spouselastname' => strtoupper($_REQUEST['SPOUSELNAME']),
            'spousefirstname' => strtoupper($_REQUEST['SPOUSEFNAME']),
            'spousemiddlename' => strtoupper($_REQUEST['SPOUSEMNAME']),
            'occupation' => strtoupper($_REQUEST['SPOUSEOCCUPATION']),
            'employer' => strtoupper($_REQUEST['SPOUSEEMPLOYER']),
            'businessaddress' => $_REQUEST['SPOUSEBUSINESSADDRESS'],
            'telno' => $_REQUEST['SPOUSETELNO'],
            'fatherlastname' => strtoupper($_REQUEST['FATHERLNAME']),
            'fatherfirstname' => strtoupper($_REQUEST['FATHERFNAME']),
            'fathermiddlename' => strtoupper($_REQUEST['FATHERMNAME']),
            'motherlastname' => strtoupper($_REQUEST['MOTHERLNAME']),
            'motherfirstname' => strtoupper($_REQUEST['MOTHERFNAME']),
            'mothermiddlename' => strtoupper($_REQUEST['MOTHERMNAME']),
            'currentemploymenttype' => $_REQUEST['EMPLOYMENTTYPE'],
            'currentposition' => strtoupper($_REQUEST['CURRENTPOSITION']),
            'dateenteredlgu' => $_REQUEST['DATEENTEREDLGU'],
            'salarygrade' => $_REQUEST['SALARYGRADE'],
            'childrendetails' => @($_REQUEST['CHILDREN'] == "" || $_REQUEST['CHILDREN'] == null) ? "" : json_encode($_REQUEST['CHILDREN']),
            'elementary' => @($_REQUEST['ELEMENTARY'] == "" || $_REQUEST['ELEMENTARY'] == null) ? "" : json_encode($_REQUEST['ELEMENTARY']),
            'highschool' => @($_REQUEST['HIGHSCHOOL'] == "" || $_REQUEST['HIGHSCHOOL'] == null) ? "" : json_encode($_REQUEST['HIGHSCHOOL']),
            'vocational' => @($_REQUEST['VOCATIONAL'] == "" || $_REQUEST['VOCATIONAL'] == null) ? "" : json_encode($_REQUEST['VOCATIONAL']),
            'college' => @($_REQUEST['COLLEGE'] == "" || $_REQUEST['COLLEGE'] == null) ? "" : json_encode($_REQUEST['COLLEGE']),
            'graduate' => @($_REQUEST['GRADUATE'] == "" || $_REQUEST['GRADUATE'] == null) ? "" : json_encode($_REQUEST['GRADUATE']),
            'civilservice' => @($_REQUEST['CIVILSERVICE'] == "" || $_REQUEST['CIVILSERVICE'] == null) ? "" : json_encode($_REQUEST['CIVILSERVICE']),
            'workexperience' => @($_REQUEST['WORKEXPERIENCE'] == "" || $_REQUEST['WORKEXPERIENCE'] == null) ? "" : json_encode($_REQUEST['WORKEXPERIENCE']),
            'voluntarywork' => @($_REQUEST['VOLUNTARYWORK'] == "" || $_REQUEST['VOLUNTARYWORK'] == null) ? "" : json_encode($_REQUEST['VOLUNTARYWORK']),
            'training' => @($_REQUEST['TRAININGPROGRAMS'] == "" || $_REQUEST['TRAININGPROGRAMS'] == null) ? "" : json_encode($_REQUEST['TRAININGPROGRAMS']),
            'others1' => @($_REQUEST['OTHER1'] == "" || $_REQUEST['OTHER1'] == null) ? "" : json_encode($_REQUEST['OTHER1']),
            'qas' => @($_REQUEST['QAS'] == "" || $_REQUEST['QAS'] == null) ? "" : json_encode($_REQUEST['QAS']),
            'characterref' => @($_REQUEST['CHARACTERREF'] == "" || $_REQUEST['CHARACTERREF'] == null) ? "" : json_encode($_REQUEST['CHARACTERREF'])
        );

        $insert = $this->ModelPdsManagement->insert($username,$pdsdetails);
        if($insert){
            $auditdata = array(
                'modulename'=>'PDS Module',
                'action'=>'Create Personal Data Sheet ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);

            if($this->session->userdata('userlevel') == "TEMPORARY"){
                $analyticdata = $this->ModelAnalyticsManagement->getReq($this->session->userdata('requestnumber'));
                if($analyticdata){
                    $elem =  @($_REQUEST['ELEMENTARY'] == "" || $_REQUEST['ELEMENTARY'] == null) ? "" : $_REQUEST['ELEMENTARY'];
                    $highschool = @($_REQUEST['HIGHSCHOOL'] == "" || $_REQUEST['HIGHSCHOOL'] == null) ? "" : $_REQUEST['HIGHSCHOOL'];
                    $vocationaal = @($_REQUEST['VOCATIONAL'] == "" || $_REQUEST['VOCATIONAL'] == null) ? "" : $_REQUEST['VOCATIONAL'];
                    $college = @($_REQUEST['COLLEGE'] == "" || $_REQUEST['COLLEGE'] == null) ? "" : $_REQUEST['COLLEGE'];
                    $graduate = @($_REQUEST['GRADUATE'] == "" || $_REQUEST['GRADUATE'] == null) ? "" : $_REQUEST['GRADUATE'];
                    $civilservice = @($_REQUEST['CIVILSERVICE'] == "" || $_REQUEST['CIVILSERVICE'] == null) ? "" : $_REQUEST['CIVILSERVICE'];
                    $workexperience = @($_REQUEST['WORKEXPERIENCE'] == "" || $_REQUEST['WORKEXPERIENCE'] == null) ? "" : $_REQUEST['WORKEXPERIENCE'];
                    $training = @($_REQUEST['TRAININGPROGRAMS'] == "" || $_REQUEST['TRAININGPROGRAMS'] == null) ? "" : $_REQUEST['TRAININGPROGRAMS'];

                    $qualified = 0;
                    $reqeduc = "";
                    $reqcsc = "";
                    $reqwork = "";
                    $reqtraining = "";
                    $positionname = "";
                    $reqnum = "";
                    $failedreqs = array();
                    $proofreqs = array();

                    foreach($analyticdata as $key=>$value){
                        $reqeduc = $value['mineducbackground'];
                        $reqcsc = $value['eligibility'];
                        $reqwork = $value['experience'];
                        $reqtraining = $value['training'];
                        $positionname = $value['positionname'];
                        $reqnum = $value['requestnumber'];
                    }

                    //EDUCATIONAL BACKGROUND
                    if(strtoupper($reqeduc) == "ELEMENTARY"){
                        if($elem == "" || $elem == null){
                            $qualified += 0;
                            array_push($failedreqs,'education');
                            array_push($proofreqs,'school attended');
                        } else {
                            $qualified += 1;
                        }
                    } else if(strtoupper($reqeduc) == "HIGHSCHOOL"){
                        if($highschool == "" || $highschool == null){
                            $qualified += 0;
                            array_push($failedreqs,'education');
                            array_push($proofreqs,'school attended');
                        } else {
                            $qualified += 1;
                        }
                    } else if(strtoupper($reqeduc) == "COLLEGE"){
                        if($college == "" || $college == null){
                            $qualified += 0;
                            array_push($failedreqs,'education');
                            array_push($proofreqs,'school attended');
                        } else {
                            $qualified += 1;
                        }
                    } else if(strtoupper($reqeduc) == "VOCATIONAL"){
                        if(!($college == null || $college == "")) {
                            $qualified += 1;
                        } else {
                            if(!($vocationaal == "" || $vocationaal == null)){
                                $qualified += 1;
                            } else {
                                $qualified += 0;
                                array_push($failedreqs,'education');
                                array_push($proofreqs,'school attended');
                            }
                        }
                    } else if(strtoupper($reqeduc) == "GRADUATE"){
                        if($graduate == "" || $graduate == null){
                            $qualified += 0;
                            array_push($failedreqs,'education');
                            array_push($proofreqs,'school attended');
                        } else {
                            $qualified += 1;
                        }
                    } else {
                        $qualified += 0;
                    }

                    //CIVIL SERVICE ELIGIBILITY
                    if(strtoupper($reqcsc) == "YES" || strtoupper($reqcsc) == "ELIGIBLE"){
                        if($civilservice == "" || $civilservice == null){
                            $qualified += 0;
                            array_push($failedreqs,'civil service eligibility');
                            array_push($proofreqs,'civil service card or certificate');
                        } else {
                            $ret = 0;
                            foreach($civilservice as $key=>$value){
                                if($value['careerservice'] == "" || $value['careerservice'] == null){
                                    $ret += 1;
                                } else if($value['rating'] == "" || $value['rating'] == null){
                                    $ret += 1;
                                } else if($value['examdate'] == "" || $value['examdate'] == null){
                                    $ret += 1;
                                } else {
                                    $ret += 0;
                                }
                            }

                            if($ret == 0){
                                $qualified += 1;
                            } else {
                                array_push($failedreqs,'civil service eligibility');
                                array_push($proofreqs,'civil service card or certificate');
                                $qualified += 0;
                            }
                        }
                    } else {
                        $qualified += 1;
                    }

                    //TRAININGS
                    if($reqtraining == "0" || $reqtraining == 0){
                        $qualified += 1;
                    } else {
                        if($training == "" || $training == null){
                            $qualified += 0;
                            array_push($failedreqs,'training');
                            array_push($proofreqs,'proof of trainings you have attended');
                        } else {
                            $total = 0;
                            foreach($training as $key=>$value){
                                $total += (int)$value['hours'];
                            }

                            if($total >= (int)$reqtraining){
                                $qualified += 1;
                            } else {
                                $qualified += 0;
                                array_push($failedreqs,'training');
                                array_push($proofreqs,'proof of trainings you have attended');
                            }
                        }
                    }

                    //work exp
                    if($reqwork == "0" || $reqwork == 0){
                        $qualified += 1;
                    } else {
                        $totaldays = 0;
                        foreach($workexperience as $key=>$value){
                            $from = new DateTime($value['fromdate']);
                            $to = new DateTime($value['todate']);
                            $diff = $from->diff($to)->days;
                            $totaldays += $diff;
                        }

                        $total = $totaldays/364;
                        if($total >= (int)$reqwork){
                            $qualified += 1;
                        } else {
                            $qualified += 0;
                            array_push($failedreqs,'work experience');
                            array_push($proofreqs,'proof of work experience');
                        }
                    }

                    if((int)$qualified == 4 || $qualified == "4"){
                        $result = json_encode(array(
                            'Code' => '100',
                            'Message' => 'Personal Data Sheet Created',
                            'Qualified' => 'YES',
                            'Position'=>$positionname,
                            'RequestNumber'=>$reqnum
                        ));
                        $this->assignTakeExamModule();
                    } else {
                        $result = json_encode(array(
                            'Code' => '100',
                            'Message' => 'Personal Data Sheet Created',
                            'Qualified' => 'NO',
                            'Position'=>$positionname,
                            'RequestNumber'=>$reqnum
                        ));
                    }
                    $this->submitAnalytics($qualified,$failedreqs,$proofreqs);
                    echo $result;
                }
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Personal Data Sheet Created'
                ));
                echo $result;
            }
        }else{
            $deleteinserted = $this->ModelPdsManagement->deletepds($username);
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Record Failed'
            ));
            echo $result;
        }

    }


    public function deletepds(){
        $username = $this->session->userdata('username');
        $delete = $this->ModelPdsManagement->deletepds($username);
        if($delete){
            $auditdata = array(
                'modulename'=>'PDS Module',
                'action'=>'Delete Personal Data Sheet Record',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personal Data Sheet Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'PDS Delete Failed'
            ));
        }
        echo $result;
    }

    public function submitAnalytics($qualified,$failedreqs=array(),$proofreqs=array()){
        $username = $this->session->userdata('username');
        $appnum = $this->ModelApplicationManagement->getApplicantNumber();
        $reqs = implode(', ', $failedreqs);
        $proofs = implode(', ', $proofreqs);
        $analyticsres = array(
            'requirements'=>$reqs,
            'proofs'=>$proofs
        );
        if($appnum){
            foreach($appnum as $key=>$value){
                $appnumber = $value['appnumber'];
            }
            $appcode = 'App-'.$this->session->userdata('requestnumber').'-'.$appnumber;

            if($qualified == 4){
                $updatedata = array(
                    'ispds'=>'YES',
                    'isqualified'=>'YES',
                    'applicantcode'=>$appcode,
                    'analyticsresult'=>''
                );
            } else {
                $updatedata = array(
                    'ispds'=>'YES',
                    'isqualified'=>'NO',
                    'applicantcode'=>'',
                    'analyticsresult'=>json_encode($analyticsres)
                );
            }

            $update = $this->ModelApplicationManagement->updateApplicant($updatedata);
            if($update){
                log_message('debug', 'PDS Analytics: Successfully Updated Applicant');
            }else{
                log_message('debug', 'PDS Analytics: Failed Updating Applicant');
            }
        } else {
            log_message('debug', 'PDS Analytics: Request App Number Failed');

        }
    }

    public function assignTakeExamModule(){
        $data = "('".$this->session->userdata("username")."','".$this->session->userdata("userlevel")."','3005')";
        $assign = $this->ModelRolesConfig->assign($data,$this->session->userdata("username"),$this->session->userdata("userlevel"));
        if($assign){
            log_message('debug', 'Roles Config: Successfully Assigned Take Exam Module');
        }else{
            log_message('debug', 'Roles Config: Failed Assigning Take Exam Module');
        }
    }
}
