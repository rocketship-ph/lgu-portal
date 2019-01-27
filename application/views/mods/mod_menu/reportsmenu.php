<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

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
            <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
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
            <div class="panel panel-menu" align="center" >
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
            <div class="panel panel-menu" align="center" >
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
<?php if(in_array($GLOBALS['NAV_POSITIONLISTREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>reports/listofposition">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    List of Positions Report
                </a>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(in_array($GLOBALS['NAV_CORECOMPETENCYREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>reports/corecompetencybaseindex">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    List of Core Competency Based Index Report
                </a>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(in_array($GLOBALS['NAV_BEHAVIORALCOMPETENCYREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>reports/behavorialcompetencybaseindex">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    List of Behavioral Competency Based Index Report
                </a>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(in_array($GLOBALS['NAV_COMPETENCYPERPOSITIONREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>reports/competencyperposition">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    List of Competency Per Position Report
                </a>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(array_intersect($GLOBALS['NAVAPPLICANTREPORTSMGT'],$this->session->userdata('modules'))):?>
    <div class="col-md-12">
        <legend>Applicant Reports</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_QUALIFIEDAPPLICANTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/applicantqualified">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Qualified Applicants Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array($GLOBALS['NAV_NONQUALIFIEDAPPLICANTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/applicantnotqualified">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Non-Qualified Applicants Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array($GLOBALS['NAV_APPLICANTPERPOSITIONREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/applicantper">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Applicants - Per Address and Position
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array($GLOBALS['NAV_APPLICANTLOCALREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/applicantlocalnonlocal">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Local and Non-Local Applicants Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array($GLOBALS['NAV_JOBAPPLICANTSREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/applicantrecords">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Job Applicant Records
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_QUALIFIEDEMPLOYEESREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/qualifiedemployees">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Qualified Employees Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>

<?php if(array_intersect($GLOBALS['NAVPDSREPORTSMGT'],$this->session->userdata('modules'))):?>
    <div class="col-md-12">
        <legend>Personnel Data Sheet Reports</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEELISTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelist">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEEEDUCBACKGROUNDREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelisteducational">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Educational Background
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEEELIGIBILITYREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelisteligibility">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Eligibility
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEECOMMUNITYSERVICEREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelistcommunityservice">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Community Service Done
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEERATINGREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelisttraining">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Training
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEESEMINARSREPORT'],$this->session->userdata('modules'))):?>
        <!--        <div class="form-group col-md-3">-->
        <!--            <div class="panel">-->
        <!--                <div class="panel-body" align="center">-->
        <!--                    <a style="text-align: center" href="--><?php //echo base_url();?><!--reports/employeelistseminar">-->
        <!--                        <img src="--><?php //echo base_url();?><!--assets/img/icons/generic_report.png" height="100px">-->
        <!--                        <br><br>-->
        <!--                        Employee List - Seminars Attended-->
        <!--                    </a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEEDATEENTEREDREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelistenterlgu">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Date Entered the LGU
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EMPLOYEEDEPARTMENTASSIGNED'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/employeelistdepartmentassigned">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Employee List - Department Assigned
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_DEPARTMENTHEADREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/departmenthead">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Department Head
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_CASUALEMPLOYEEREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/casualemployee">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Casual Employee
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_PLANTILLAEMPLOYEEREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/plantillaemployee">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Plantilla Employee
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_JOEMPLOYEEREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/joborderemployee">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Job Order Employee
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_COTERMINOUSEMPLOYEEREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/coterminousemployee">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Co-Terminous Employee
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>

<?php if(array_intersect($GLOBALS['NAVBIREPORTSMGT'],$this->session->userdata('modules'))):?>
    <div class="col-md-12">
        <legend>Background Investigation Reports</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_BIEXAMREPORT'],$this->session->userdata('modules'))):?>

        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/backgroundinvestigationexam">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Background Investigation Exam
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_BIINVESTIGATORREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/backgroundinvestigator">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Background Investigation Investigator
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_BIRESULTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/backgroundinvestigationresult">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Result of Background Investigation
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>

<?php if(array_intersect($GLOBALS['NAVPERSONNELREQUESTREPORTSMGT'],$this->session->userdata('modules'))):?>
    <div class="col-md-12">
        <legend>Personnel Request Reports</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_NEWPERSONNELREQUESTREPORT'],$this->session->userdata('modules'))):?>

        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/personnelrequestnew">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        New Personnel Request Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_APPROVEDPERSONNELREQUESTREPORT'],$this->session->userdata('modules'))):?>


        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/personnelrequestapproved">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Approved Personnel Request Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_REJECTEDPERSONNELREQUESTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/personnelrequestrejected">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Rejected Personnel Request Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_PERSONNELREQUESTLISTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/personnelrequests">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Personnel Requests
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>


<?php if(array_intersect($GLOBALS['NAVEXAMREPORTSMGT'],$this->session->userdata('modules'))):?>
    <div class="col-md-12">
        <legend>Examination Reports</legend>
    </div>
    <?php if(in_array($GLOBALS['NAV_EXAMINEESREPORT'],$this->session->userdata('modules'))):?>

        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/examinees">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Examinees Report
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EXAMRATINGHIGHLOWREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/examrating">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Examination Rating - Highest to Lowest
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EXAMINEERANKINGREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/examrankingcompetency">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Examination Ranking per Competency - Highest to Lowest
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EXAMSUMMARYREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/examratingsummary">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        Summary of Rating
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EVALUATORSREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/evaluatorlist">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Evaluators
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EVALUATORSEXAMENCODEDREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/evaluatorlistexamencoded">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Evaluators Exam Encoded
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EVALUATORSASSESSMENTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/evaluatorapplicantassessment">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Evaluators Assessment to Applicant
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php if(in_array($GLOBALS['NAV_EVALUATORSPERREQUESTREPORT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>reports/evaluatorperpositionrequest">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                        <br><br>
                        List of Evaluators per Position Request
                    </a>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>


</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");
        $("#panel_requestpersonnelreports").addClass("selected_panel");
    });
</script>