<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cscreports extends CI_Controller {
    public function employmentstatus() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/employmentstatus');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function salarygrades() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/salarygrades');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function agerange() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/agerange');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function educationalattainment() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/educationalattainment');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function fieldofexpertise() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/fieldofexpertise');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function positionlevel() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/positionlevel');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function yearsincurrentposition() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/yearsincurrentposition');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function yearsinservice() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/yearsinservice');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function criteriaforvacantposition() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/criteriaforvacantposition');
        $this->load->view('templates/MasterTemplate',$data);
    }
}