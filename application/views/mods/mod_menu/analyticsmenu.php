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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Report Generation Menu</h4>
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
                <div class="panel panel-menu" align="center"  id="panel_requestpersonnelreports">
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
<!--            <td>-->
<!--                <div class="panel panel-menu" align="center" >-->
<!--                    <a href="--><?php //echo base_url();?><!--main/cscreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">-->
<!--                        <img src="--><?php //echo base_url();?><!--assets/img/icons/report_generation.png" height="40px">-->
<!--                        <br>-->
<!--                        CSC Required Reports-->
<!--                    </a>-->
<!--                </div>-->
<!--            </td>-->
        </tr>
    </table>
<div class="row">
<div class="col-md-12">
    <hr>
</div>
    <?php if(in_array($GLOBALS['NAV_AGERANGEANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/agerangeanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Age Range Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EDUCATIONALATTAINMENTANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/educationalattainmentanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Highest Educational Attainment Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_YEARSINCURRENTPOSITIONANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/yearsincurrentpositionanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Years in Current Position Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_YEARSINPUBLICSERVICEANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/yearsinserviceanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Years in Public Service Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYMENTSTATUSANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/employmentstatusanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Employment Status Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_SALARYGRADEANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/salarygradesanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Salary Grades Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_FIELDOFEXPERTISEANALYTICS'],$this->session->userdata('modules'))):?>
<div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/fieldofexpertiseanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Field of Expertise Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_COMPLEMENTBYDEPARTMENTANALYTICS'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/departmentanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Complement by Department Analytics
                </a>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_LEVELSOFPOSITIONANALYTICS'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>analytics/positionlevelanalytics">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Levels of Position Analytics
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