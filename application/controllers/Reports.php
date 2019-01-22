<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function listofposition()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/listofposition');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function corecompetencybaseindex()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/corecompetencybaseindex');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function behavorialcompetencybaseindex()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/behavorialcompetencybaseindex');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function competencyperposition()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/competencyperposition');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personaldatasheet()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/personaldatasheet');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function backgroundinvestigation()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/backgroundinvestigation');
        $this->load->view('templates/MasterTemplate',$data);
    }

    //APPLICANT REPORTS
    public function applicantqualified()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/applicantqualified');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function applicantnotqualified()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/applicantnotqualified');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function applicantper()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/applicantper');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function applicantlocalnonlocal()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/applicantlocalnonlocal');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function applicantrecords()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/applicantrecords');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelist()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelist');
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function employeelisteducational()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelisteducational');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelisteligibility()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelisteligibility');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelistcommunityservice()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelistcommunityservice');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelisttraining()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelisttraining');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelistseminar()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelistseminar');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelistenterlgu()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelistenterlgu');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function employeelistdepartmentassigned()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/employeelistdepartmentassigned');
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function departmenthead()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/departmenthead');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function casualemployee()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/casualemployee');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function plantillaemployee()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/plantillaemployee');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function joborderemployee()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/joborderemployee');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function coterminousemployee()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/pds/coterminousemployee');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function backgroundinvestigationexam()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/bi/backgroundinvestigationexam');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function backgroundinvestigator()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/bi/backgroundinvestigator');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function backgroundinvestigationresult()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/bi/backgroundinvestigationresult');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personnelrequestnew()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/request_personnel/personnelrequestnew');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personnelrequestapproved()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/request_personnel/personnelrequestapproved');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function personnelrequestrejected()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/request_personnel/personnelrequestrejected');
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function personnelrequests()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/request_personnel/personnelrequests');
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function examinees()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/examinees');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function examrating()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/examrating');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function examrankingcompetency()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/examrankingcompetency');
        $this->load->view('templates/MasterTemplate',$data);
    }

public function examratingsummary()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/examratingsummary');
        $this->load->view('templates/MasterTemplate',$data);
    }


public function evaluatorlist()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/evaluatorlist');
        $this->load->view('templates/MasterTemplate',$data);
    }


public function evaluatorlistexamencoded()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/evaluatorlistexamencoded');
        $this->load->view('templates/MasterTemplate',$data);
    }

public function evaluatorapplicantassessment()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/evaluatorapplicantassessment');
        $this->load->view('templates/MasterTemplate',$data);
    }


public function evaluatorperpositionrequest()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/exam/evaluatorperpositionrequest');
        $this->load->view('templates/MasterTemplate',$data);
    }

public function qualifiedemployees()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_recruitment/report_generation/applicant/qualifiedemployees');
        $this->load->view('templates/MasterTemplate',$data);
    }


}
