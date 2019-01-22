<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelChangePassword extends CI_Model{
    function __construct() {
        $this->userTbl = 'tblusers';
    }

    public function change($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $change = $this->db->update($this->userTbl);

            if($change){

                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function check($pass,$id){
        $this->db->select('*');
        $this->db->from($this->userTbl);

        $this->db->where('id',$id);
        $this->db->where('password',$pass);

        $query = $this->db->get();
        $result = $query->row_array();

        if($result){
            return true;
        } else {
            return false;
        }
    }
}