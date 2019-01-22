<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelLogoFetcher extends CI_Model{
    function __construct() {
        $this->inventoryTbl = 'TBLINVENTORY';
    }

    function hasRows(){
        $admindb = $this->load->database('dbadmin', TRUE);

        try {
            $lguid = $GLOBALS['lguid'];
            $statement = "select logo from tbllogo where lguid='".$lguid."'";
            $query = $admindb->query($statement);
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