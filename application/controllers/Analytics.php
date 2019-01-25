<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {
    public function agerangeanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/agerangeanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function educationalattainmentanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/educationalattainmentanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function yearsincurrentpositionanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/yearsincurrentpositionanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function yearsinserviceanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/yearsinserviceanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function employmentstatusanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/employmentstatusanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function salarygradesanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/salarygradesanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function fieldofexpertiseanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/fieldofexpertiseanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function departmentanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/departmentanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function positionlevelanalytics() {
        $data = array('content'=>'mods/mod_recruitment/analytics/positionlevelanalytics');
        $this->load->view('templates/MasterTemplate',$data);
    }
}