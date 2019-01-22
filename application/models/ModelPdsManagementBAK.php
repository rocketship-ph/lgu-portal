<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPdsManagementbak extends CI_Model{
    function __construct() {
        $this->detailsTbl = 'tblpdsdetails';
        $this->cseTbl = 'tblpdscivilservice';
        $this->other1Tbl = 'tblpdsothers1';
        $this->other2Tbl = 'tblpdsothers2';
        $this->trainingTbl = 'tblpdstraining';
        $this->volworkTbl = 'tblpdsvoluntarywork';
        $this->workTbl = 'tblpdsworkexperience';
    }

    public function insert($username,$pdsdetails=array(),$pdscse,$pdsothers,$pdsothers2=array(),$pdstraining,$pdsvolwork,$pdswork) {
        try {
            $delpdsdetails = $this->db->query("delete t1,t2,t3,t4,t5,t6,t7 from tblpdsdetails t1 inner join tblpdscivilservice t2 on t1.username=t2.username inner join tblpdsothers1 t3 on t1.username=t3.username inner join tblpdsothers2 t4 on t1.username=t4.username inner join tblpdstraining t5 on t1.username=t5.username inner join tblpdsvoluntarywork t6 on t1.username=t6.username inner join tblpdsworkexperience t7 on t1.username=t7.username where t1.username='".$username."'");
            if($delpdsdetails){
                $insertdetails = $this->db->insert($this->detailsTbl, $pdsdetails);
                if($insertdetails){
                    $insertcse = $this->db->query("insert into ".$this->cseTbl." (username,careerservice,rating,dateofexam,placeofexam,licensenumber,licensedate) values ".$pdscse);
                    if($insertcse){
                        $insertother1 = $this->db->query("insert into ".$this->other1Tbl." (username,hobbies,recognition,membership) values ".$pdsothers);
                        if($insertother1){
                            $insertother2 = $this->db->insert($this->other2Tbl, $pdsothers2);
                            if($insertother2){
                                $inserttraining = $this->db->query("insert into ".$this->trainingTbl." (username,title,datefrom,dateto,hours,conductedby) values ".$pdstraining);
                                if($inserttraining){
                                    $insertvolwork = $this->db->query("insert into ".$this->volworkTbl." (username,organization,fromdate,todate,hours,position) values ".$pdsvolwork);
                                    if($insertvolwork){
                                        $insertwork = $this->db->query("insert into ".$this->workTbl." (username,fromdate,todate,position,company,salary,salarygrade,status,government) values ".$pdswork);
                                        if($insertwork){
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getConf($username){
        try {
            $query = $this->db->query("select moduleid from tbluserconfiguration where username='".$username."'");

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

    public function deletefailed($username) {

        try {
            $delpdsdetails = $this->db->query("delete t1,t2,t3,t4,t5,t6,t7 from tblpdsdetails t1 inner join tblpdscivilservice t2 on t1.username=t2.username inner join tblpdsothers1 t3 on t1.username=t3.username inner join tblpdsothers2 t4 on t1.username=t4.username inner join tblpdstraining t5 on t1.username=t5.username inner join tblpdsvoluntarywork t6 on t1.username=t6.username inner join tblpdsworkexperience t7 on t1.username=t7.username where t1.username='".$username."'");

            if($delpdsdetails){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function deleteSubject($data,$id) {

        try {
            $this->db->set($data);
            $this->db->where('ID', $id);
            $delete = $this->db->update($this->subjectsTbl);

            if($delete){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getRows(){
        try {
            $query = $this->db->query("select * from tblmodules where isallowed='0'");

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