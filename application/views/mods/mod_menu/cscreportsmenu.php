<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_analytics_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>
<style>
    .panel{
        border: 2px solid #dddddd;
    }

    .panel-body{
        min-height: 185px;
        height: auto;
    }
    .panel-menu{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
                </div>
            </td>
            <td width="15px">
                &nbsp;
            </td>
            <td>
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to CSC Required Reports Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <?php if(array_intersect($GLOBALS['NAVREPORTS_MGT'],$this->session->userdata('modules'))):?>
            <td>
                <div class="panel panel-menu" align="center">
                    <a href="<?php echo base_url();?>main/reports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        Report Generation
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <?php endif;?>
            <?php if(array_intersect($GLOBALS['NAVPDSANALYTICSMGT'],$this->session->userdata('modules'))):?>
            <td>
                <div class="panel panel-menu" align="center">
                    <a href="<?php echo base_url();?>main/analytics" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        Analytics
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <?php endif;?>
            <?php if(array_intersect($GLOBALS['NAVCSCREPORTSMGT'],$this->session->userdata('modules'))):?>
            <td>
                <div class="panel panel-menu" align="center"   id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>main/cscreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        CSC Required Reports
                    </a>
                </div>
            </td>
            <?php endif;?>
        </tr>
    </table>
<div class="row">
<div class="col-md-12">
    <hr>
</div>
    <div class="col-md-12">
        <legend>Workforce Profile</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_CSCEMPLOYMENTSTATUS'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/employmentstatus">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Employment Status
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCSALARYGRADE'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/salarygrades">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Salary Grades
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCAGERANGE'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/agerange">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Age Range
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCEDUCATIONALATTAINMENT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/educationalattainment">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Educational Attainment
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCFIELDOFEXPERTISE'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/fieldofexpertise">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Field of Expertise
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCLEVELOFPOSITION'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/positionlevel">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Levels of Position
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCYEARSINCURRENTPOSITION'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/yearsincurrentposition">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Years in Current Position
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCYEARSINPUBLICSERVICE'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/yearsinservice">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Years in Public Service
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>

    <div class="col-md-12">
        <hr>
    </div>
    <?php if(in_array($GLOBALS['NAV_CSCSELECTIONCRITERIAFORVACANTPOSITION'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/criteriaforvacantposition">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Selection Criteria for the Vacant Position
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCPROFILEOFAPPLICANTS'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/applicantprofile">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Profile of Applicants
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCINDIVIDUALPROFILEOFAPPLICANTS'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/individualapplicantprofile">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Individual Applicant's Profile
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCCOMPETENCYREQUIREMENTPERPOSITION'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/competencyrequirement">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Competency Requirement Per Position
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CSCREQUESTFORVACANTPOSITION'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>cscreports/requestforvacantposition">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Request for Vacant Position
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>

</div>

</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");
        $("#panel_requestpersonnelreports").addClass("selected_panel");
    });
</script>