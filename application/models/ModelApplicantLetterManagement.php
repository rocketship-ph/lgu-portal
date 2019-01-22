<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelApplicantLetterManagement extends CI_Model{
    function __construct() {
        $this->applicantTbl = 'tblapplicant';
    }

    function getLetter($type,$username){
        try {
            $statement = "select a.requestnumber,a.email,m.content as letter,concat(u.firstname, ' ',u.lastname) as applicantname,concat(pds.residentialaddress,', Brgy.',pds.residentialbrgy) as specificaddress, concat(pds.residentialcity,', ',pds.residentialprovince,' ',pds.residentialzipcode) as state, case when sex = 'male' then concat('MR ',UPPER(u.lastname)) when sex = 'female' then concat('MS ',UPPER(u.lastname)) END as salutation,p.name as position,r.department,'Carmona' as lgu,p.mineducbackground as education,r.experience,r.training,r.eligibility,a.analyticsresult from tblapplicant a inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode inner join tblusers u on a.username=u.username inner join tblpdsdetails pds on a.username=pds.username join tblmessages m where a.username='".$username."' and m.type='".$type."';";
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

    function getHrdEmail(){
        try {
            $statement = "select p.email,l.content from tblpdsdetails p join tblmessages l where p.username in (select username from tblusers where userlevel='HRMANAGER' and status='0') and l.category='resume' and l.type='autogen';";
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