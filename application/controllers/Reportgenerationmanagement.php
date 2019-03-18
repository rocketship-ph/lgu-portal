<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportGenerationManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelReportGenerationManagement');
    }

    public function listofposition()
    {
        $report = $this->ModelReportGenerationManagement->listofposition();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function corecompetencybaseindex()
    {
        $report = $this->ModelReportGenerationManagement->corecompetencybaseindex();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function behavorialcompetencybaseindex()
    {
        $report = $this->ModelReportGenerationManagement->behavorialcompetencybaseindex();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function competencyperposition()
    {
        $report = $this->ModelReportGenerationManagement->competencyperposition($_REQUEST['POSITIONCODE']);
        if($report){
            $competencies = $this->ModelReportGenerationManagement->getCompetencies();
            if($competencies){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $report,
                    'competencies'=>$competencies
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $report
                ));
            }
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }
    }

    public function qualifiedapplicants()
    {
        $report = $this->ModelReportGenerationManagement->getQualifiedApplicants($_REQUEST['ISQUALIFIED']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function localnonlocalapplicants()
    {
        $report = $this->ModelReportGenerationManagement->getLocalNonLocalApplicants($_REQUEST['TYPE']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function applicantsper()
    {
        $report = $this->ModelReportGenerationManagement->getApplicantsPer();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function employeelist()
    {
        $report = $this->ModelReportGenerationManagement->getEmployeeList();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function employeelisttype()
    {
        $report = $this->ModelReportGenerationManagement->getEmployeeListType($_REQUEST['TYPE']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function departmenthead()
    {
        $report = $this->ModelReportGenerationManagement->getDepartmentHeads();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function biexam()
    {
        $report = $this->ModelReportGenerationManagement->getBiExam();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function biinvestigator()
    {
        $report = $this->ModelReportGenerationManagement->getBiInvestigators();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function personnelrequests()
    {
        $report = $this->ModelReportGenerationManagement->getPersonnelRequests($_REQUEST['STATUS']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function evaluatorperpositionrequest()
    {
        $report = $this->ModelReportGenerationManagement->getevaluatorperpositionrequest($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function evaluatorlist()
    {
        $report = $this->ModelReportGenerationManagement->getEvaluatorList();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function examratingsummaryreport()
    {
        $data = $this->ModelReportGenerationManagement->getexamratingsummaryreport($_REQUEST['REQUESTNUMBER'],$_REQUEST['EVALUATOR'],$_REQUEST['APPLICANTCODE']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function competencyrankingreport()
    {
        $data = $this->ModelReportGenerationManagement->getcompetencyrankingreport($_REQUEST['REQUESTNUMBER'],$_REQUEST['COMPETENCY']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function employeelisteducational()
    {
        $data = $this->ModelReportGenerationManagement->getemployeelisteducational(strtolower($_REQUEST['EDUCATION']));
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function employeelisteligibility()
    {
        $data = $this->ModelReportGenerationManagement->getemployeelisteligibility($_REQUEST['ELIGIBILITY']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function employeelisttraining()
    {
        $data = $this->ModelReportGenerationManagement->getemployeelisttraining();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
 public function employeelistcommunityservice()
    {
        $data = $this->ModelReportGenerationManagement->getemployeelistcommunityservice();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function employeelistdepartmentassigned()
    {
        $report = $this->ModelReportGenerationManagement->getemployeelistdepartmentassigned($_REQUEST['DEPARTMENT']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function evaluatorlistexamencoded()
    {
        $report = $this->ModelReportGenerationManagement->getevaluatorlistexamencoded($_REQUEST['REQUESTNUMBER'],$_REQUEST['EVALUATOR']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function examinees()
    {
        $report = $this->ModelReportGenerationManagement->getexaminees($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function examrating()
    {
        $report = $this->ModelReportGenerationManagement->getexamrating($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

    public function backgroundinvestigationresult()
    {
        $report = $this->ModelReportGenerationManagement->getbackgroundinvestigationresult($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }

public function employeelistenterlgu()
    {
        $report = $this->ModelReportGenerationManagement->getemployeelistenterlgu();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
            echo $result;
        }

    }






    //for dropdowns etc.
    public function getpositions()
    {
        $data = $this->ModelReportGenerationManagement->getpositions();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function evaluatorrequestnumbers()
    {
        $data = $this->ModelReportGenerationManagement->getevaluatorrequestnumbers();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function allrequestnumbers()
    {
        $data = $this->ModelReportGenerationManagement->getallrequestnumber();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

public function examcompetencyrequestnumbers()
    {
        $data = $this->ModelReportGenerationManagement->getexamcompetencyrequestnumbers();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function biassessmentrequestnumbers()
    {
        $data = $this->ModelReportGenerationManagement->getbiassessmentrequestnumbers();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function examcompetencies()
    {
        $data = $this->ModelReportGenerationManagement->getexamcompetencies($_REQUEST['REQUESTNUMBER']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function examrequestnumbers()
    {
        $data = $this->ModelReportGenerationManagement->getexamrequestnumbers();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function examevaluators()
    {
        $data = $this->ModelReportGenerationManagement->getexamevaluators($_REQUEST['REQUESTNUMBER']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function examapplicantcodes()
    {
        $data = $this->ModelReportGenerationManagement->getexamapplicantcodes($_REQUEST['REQUESTNUMBER'],$_REQUEST['EVALUATOR']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function evaluatorsexamencoded()
    {
        $data = $this->ModelReportGenerationManagement->getevaluatorsexamencoded($_REQUEST['REQUESTNUMBER']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
    
    
    
    public function qualifiedemployees()
    {
        $data = $this->ModelReportGenerationManagement->getqualifiedemployees($_REQUEST['REQNUM'],$_REQUEST['ISQUALIFIED']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

	public function applicantrecords()
    {
        $data = $this->ModelReportGenerationManagement->getApplicantRecords();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function employeenopds()
    {
        $data = $this->ModelReportGenerationManagement->getEmployeenopds();
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
}
