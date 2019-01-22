<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('NewSession');
    }

    public function index()
    {
        $data = array('content'=>'mods/mod_session/login');
        $this->load->view('templates/LoginTemplate',$data);
    }


    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->NewSession->getRows(array('id'=>$this->session->userdata('id')));
            //load the view
            $this->load->view('welcome', $data);
        }else{
            redirect('users/login');
        }
    }




    /*
     * User logout
     */


    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
