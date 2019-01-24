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
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Analytics Menu</h4>
            <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
        </td>
    </tr>
</table>
<div class="row">
<div class="col-md-12">
    <hr>
</div>
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



</div>
</div>