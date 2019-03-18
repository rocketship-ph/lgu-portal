<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelReportGenerationManagement extends CI_Model{
    function __construct() {
        $this->positionTbl = 'tblposition';
        $this->salaryTbl = 'tblsalary';
        $this->competencyIndexTbl = 'tblcompetencyindex';
        $this->groupPositionTbl = 'tblgroupposition';
    }

    function getallrequestnumber(){
        try {
            $statement = "select r.requestnumber,p.name as position from tblpersonnelrequest r left join tblposition p on r.positioncode=p.positioncode where r.levelofapproval=4 order by r.requestnumber asc;";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function listofposition(){
        try {
            $statement = "select * from tblposition";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function corecompetencybaseindex(){
        try {
            $statement = "select * from tblcompetencyindex where type='CORE';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function behavorialcompetencybaseindex(){
        try {
            $statement = "select * from tblcompetencyindex where type='BEHAVIORAL';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function competencyperposition($poscode){
        try {
            $statement = "select cbiskills from tblposition where positioncode='".$poscode."';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getpositions(){
        try {
            $statement = "select name,positioncode from tblposition order by name asc";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getCompetencies(){
        try {
            $statement = "select title,type from tblcompetency";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getQualifiedApplicants($isqualified){
        try {
            $statement = "select * from report_applicant where isqualified='".$isqualified."';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getApplicantsPer(){
        try {
            $statement = "select * from report_applicant";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getLocalNonLocalApplicants($type){
        try {
            $statement = "";
            if($type == 'ALL'){
                $statement = "select * from report_applicant";
            } else {
                $statement = "select * from report_applicant where type='".$type."';";
            }

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getEmployeeList(){
        try {
            $statement = "select * from report_pds";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getEmployeeListType($type){
        try {
            $statement = "select * from report_pds where upper(currentemploymenttype)=upper('".$type."')";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getDepartmentHeads(){
        try {
            $statement = "select * from report_departmenthead";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getBiExam(){
        try {
            $statement = "select * from report_bi";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getBiInvestigators(){
        try {
            $statement = "select * from report_biinvestigator";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }


    function getPersonnelRequests($status){
        try {
            if($status == "ALL"){
                $statement = "select * from report_personnelrequest";
            } else {
                $statement = "select * from report_personnelrequest where requeststatus='".$status."'";
            }


            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getEvaluatorList(){
        try {
            $statement = "select distinct evaluatorname,count(evaluatorname) as assigncount,userlevel,evaluatorusername from tblevaluators group by evaluatorname,userlevel,evaluatorusername;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getevaluatorrequestnumbers(){
        try {
            $statement = "select r.requestnumber,p.name as position from tblpersonnelrequest r left join tblposition p on r.positioncode=p.positioncode where r.requestnumber in (select distinct requestnumber from tblevaluators) order by r.requestnumber asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getevaluatorperpositionrequest($reqnum){
        try {
            $statement = "select e.*,p.name as position from tblevaluators e left join tblpersonnelrequest r on e.requestnumber=r.requestnumber left join tblposition p on r.positioncode=p.positioncode where e.requestnumber='".$reqnum."' order by e.dateassigned desc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }


    function getexamrequestnumbers(){
        try {
            $statement = "select distinct requestnumber from tblcompetencyscores;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getexamcompetencyrequestnumbers(){
        try {
            $statement = "select distinct e.requestnumber,p.name as position,p.groupposition,p.groupdesc from tblcompetencyscores e inner join tblpersonnelrequest r on e.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode order by requestnumber asc";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }
    function getbiassessmentrequestnumbers(){
        try {
            $statement = "select distinct e.requestnumber,p.name as position,p.groupposition,p.groupdesc from tblbiassessment e inner join tblpersonnelrequest r on e.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode order by requestnumber desc";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }
    function getexamcompetencies($reqnum){
        try {
            $statement = "select distinct competency from tblcompetencyscores where requestnumber ='".$reqnum."';";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getexamevaluators($reqnum){
        try {
            $statement = "select concat(firstname, ' ',lastname) as evaluator, username from tblusers where username in (select distinct evaluator from tblcompetencyscores where requestnumber='".$reqnum."') order by lastname asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getexamapplicantcodes($reqnum,$eval){
        try {
            $statement = "select distinct applicantcode from tblcompetencyscores where requestnumber='".$reqnum."' and evaluator='".$eval."' order by applicantcode asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getexamratingsummaryreport($reqnum,$eval,$appcode){
        try {
            $statement = "select c.*,concat(u.firstname,' ',u.lastname) as applicantname from tblcompetencyscores c inner join tblapplicant a on c.applicantcode=a.applicantcode inner join tblusers u on a.username=u.username where c.requestnumber='".$reqnum."' and c.evaluator='".$eval."' and c.applicantcode='".$appcode."' order by type asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getcompetencyrankingreport($reqnum,$comp){
        try {
            $statement = "select * from report_examrankingpercompetency where competency='".$comp."' and requestnumber='".$reqnum."' order by totalscore desc";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getemployeelisteducational($educ){
        try {
            if($educ == 'all'){
                $statement = "select * from report_pds;";
            } else {
                $statement = "select * from report_pds WHERE JSON_EXTRACT(".$educ.", '$.school') != '';";
            }

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getemployeelisteligibility($eligibility){
        try {
            if($eligibility == 'NO'){
                $statement = "select * from report_pds order by lastname asc;";
            } else {
                $statement = "select * from report_pds WHERE civilservice != '' order by lastname asc;";
            }

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getemployeelisttraining(){
        try {
            $statement = "select * from report_pds WHERE training != '' order by lastname asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getemployeelistcommunityservice(){
        try {
            $statement = "select * from report_pds WHERE voluntarywork != '' order by lastname asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }



    function getemployeelistdepartmentassigned($dept){
        try {
            if($dept == "ALL"){
                $statement = "select * from report_pds WHERE department != '' order by department asc;";
            } else {
                $statement = "select * from report_pds where upper(department) = '".$dept."' order by department asc;";
            }


            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }


    function getevaluatorsexamencoded($reqnum){
        try {
            $statement = "select concat(firstname, ' ',lastname) as evaluatorname, username from tblusers where username in (select distinct createdby from tblexamination where requestnumber='".$reqnum."') order by lastname asc;";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getevaluatorlistexamencoded($reqnum,$eval){
        try {
            $statement = "select * from tblexamination where requestnumber='".$reqnum."' and createdby='".$eval."';";

            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

function getexaminees($reqnum){
        try {
            if($reqnum == "ALL"){
                $statement = "select a.applicantcode,a.requestnumber,concat(u.firstname,' ',u.middlename, ' ',u.lastname) as applicantname,p.name as position,r.department from tblapplicant a inner join tblusers u on a.username=u.username inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode where a.applicantcode in (select distinct applicantcode from tblexamanswers);";
            } else {
                $statement = "select a.applicantcode,a.requestnumber,concat(u.firstname,' ',u.middlename, ' ',u.lastname) as applicantname,p.name as position,r.department from tblapplicant a inner join tblusers u on a.username=u.username inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode where a.applicantcode in (select distinct applicantcode from tblexamanswers) and a.requestnumber='".$reqnum."';";
            }


            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getexamrating($reqnum){
        try {
            $statement="select * from report_examresults_consolidated where requestnumber='".$reqnum."';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getemployeelistenterlgu(){
        try {
            $statement="select * from report_pds where dateenteredlgu != '';";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getbackgroundinvestigationresult($reqnum){
        try {
            $statement="select * from report_biassessment where requestnumber='".$reqnum."' order by totalrating desc;";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }
    
    function getqualifiedemployees($reqnum,$isqualified){
        try {
            if($reqnum == 'ALL'){
                $statement = "select * from report_qualifiedemployees where isqualified = 'YES';";
            } else {
            $statement="select * from report_qualifiedemployees where requestnumber='".$reqnum."' and isqualified ='YES';";
            }
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

	function getApplicantRecords(){
        try {
            $statement="select * from report_applicantrecords order by requestnumber desc;";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }


    function getEmployeenopds(){
        try {
            $statement="select u.username,u.firstname,u.middlename,u.lastname,u.userlevel,d.contactnumber,case when (d.department = '' or d.department is null) then 'UNSPECIFIED DEPARTMENT' else d.department end as department,d.address,d.birthday,d.gender from tblusers u inner join tbluserdetails d on u.username=d.username where d.username not in (select username from tblpdsdetails) and u.status=0 and u.userlevel not in ('TEMPORARY','ADMINISTRATOR') order by u.lastname asc;";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

}