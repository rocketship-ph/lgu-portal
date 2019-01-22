<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelEmployeeLetterManagement extends CI_Model{
    function __construct() {
        $this->applicantTbl = 'tblapplicant';
        $this->examDetailsTbl = 'tblexamdetails';
        $this->notifTbl = 'tblnotification';
    }

    function insertDataTemp($reqnum,$username){
        try {
            $statement = "insert into tblapplicanttemp (username,requestnumber,status,applicantcode,ispds,isqualified,isbi,isrequirements,isboarding,permanentid,analyticsresult,specificaddress,province,city,brgy,email) select '".$username."' username,'".$reqnum."' requestnumber,'0' status,concat('Pro-','".$reqnum."','-',(select lpad(max(id+1),4,'0') from tblapplicant)) applicantcode,'YES' ispds, 'YES' isqualified,''isbi,''isrequirements,''isboarding,''permanentid,''analyticsresult,permanentaddress specificaddress,permanentprovince province,permanentcity city,permanentbrgy brgy,email from tblpdsdetails where username='".$username."';";
            log_message('debug', $statement);
            $query = $this->db->query($statement);
            if($query){
                $appcode = $this->db->query("SELECT applicantcode from tblapplicanttemp where id = (select max(id) from tblapplicanttemp);");
                if($appcode){
                    $result = $appcode->row();
                    return $result;
                }
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getLetter($type,$username){
        try {
            $statement = "select a.requestnumber,a.email,m.content as letter,concat(u.firstname, ' ',u.lastname) as applicantname,concat(pds.residentialaddress,', Brgy.',pds.residentialbrgy) as specificaddress, concat(pds.residentialcity,', ',pds.residentialprovince,' ',pds.residentialzipcode) as state, case when sex = 'male' then concat('MR ',UPPER(u.lastname)) when sex = 'female' then concat('MS ',UPPER(u.lastname)) END as salutation,p.name as position,r.department,'Carmona' as lgu,p.mineducbackground as education,r.experience,r.training,r.eligibility,a.analyticsresult from tblapplicanttemp a inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode inner join tblusers u on a.username=u.username inner join tblpdsdetails pds on a.username=pds.username join tblmessages m where a.username='".$username."' and m.type='employee';";
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


    function insertnotif($data = array()){
        try {
            $insert = $this->db->insert($this->notifTbl, $data);

            if($insert){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function insertExamDetails($data = array(),$reqnum,$appcode){
        try {
            $statement = "delete from tblexamdetails where applicantcode='".$appcode."' and requestnumber='".$reqnum."'";
            $query = $this->db->query($statement);

            $insert = $this->db->insert($this->examDetailsTbl, $data);

            if($insert){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

}