<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>LGU</title>
<!--    <link rel="shortcut icon" type="image/png" href="--><?php //echo base_url();?><!--assets/img/seal.png"/>-->
    <!-- attach CSS styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datetimepicker/datetimepicker.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/dataTables.responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/stickyfooter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fullcalendar-3.9.0/fullcalendar.min.css" />


    <!-- attach JavaScripts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/messagedialog.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/qr/qrcode.min.js"></script>


    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/datatable-1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/datatable-1.10.12/js/dataTables.responsive.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/js/buttons.print.min.js"></script>

    <script defer src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/price_format.2.0.min.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/printthis/printThis.js"></script>
    <script defer src="<?php echo base_url()?>assets/fullcalendar-3.9.0/fullcalendar.min.js"></script>

    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jsPDF-1.2.60/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jsPDF-1.2.60/dist/jspdf.plugin.autotable.js"></script>
    <style>
        /*.modal{*/
            /*top: 40px !important;*/
        /*}*/
        a,
        a label {
            cursor: pointer;
        }

        .bootstrap-datetimepicker-widget .timepicker-picker table td,
        .bootstrap-datetimepicker-widget .timepicker-picker table td span,
        .bootstrap-datetimepicker-widget .timepicker-picker table td a span
        {
            height: 30px;
            line-height: 30px;
            width: 30px;
            padding:0px;
            margin:0px;
        }
        .bootstrap-datetimepicker-widget.dropdown-menu
        {
            width: 245px !important;
        }

        .req{
            font-weight: bold !important;
            color: red !important;
        }
    </style>
</head>
<body>
<div style="background:#e9ebee">
    <div id="logoDiv" class="container-fluid" style="margin-left: 10px;margin-right: 10px !important;">
        <div class="row">
            <div class="col-lg-12 col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                <table width="100%">
                    <tr>
                        <td align="center" width="150px">
                            <a href="<?php echo base_url(); ?>homepage"><img style="height: 100px;" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></a>
                        </td>
                        <td align="center" width="580px">
                            <h2 style="color:#525252;font-size:26.5px;text-align: center;">Program to Institutionalize Meritocracy and <br>Excellence in Human Resource Management</h2>
                        </td>
                        <td align="center" width="150px">
                            <a href="http://www.csc.gov.ph/" target="_blank"><img style="height: 100px;" src="<?php echo base_url(); ?>assets/img/csc.png" ></a>
                        </td>
                        <td align="left" width="130px">
                            Date: <span id="nav_date"></span><br>
                            Time: <span id="nav_time"></span>
                        </td>
                        <td rowspan="2" align="center">
                            <img src="<?php echo base_url().$this->session->userdata('filepath').$this->session->userdata('filename');?>" style="height: 85px;background-color: #ffffff;padding: 5px;border-radius: 4px;border: 2px solid #6d6d6d">
                        </td>
                        <td rowspan="2" style="padding-left: 15px;" align="left">
                            <span><?php echo $this->session->userdata('firstname');?></span><br>
                            <span><?php echo ($this->session->userdata('username') == "EliMap2018-001") ? "TempUser" : $this->session->userdata('userlevel');?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="sticky-anchor"></div>
<nav  id="sticky" class="navbar navbar-default">
    <div class="" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class=" collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>main">Home</a></li>
                <li><a href="<?php echo base_url(); ?>main/recruitment">Recruitment, Selection and Placement</a></li>
                <?php if(!($this->session->userdata('userlevel') == "TEMPORARY")): ?>
                <li><a href="<?php echo base_url(); ?>main/pms">Performance Management</a></li>
                <li><a href="<?php echo base_url(); ?>main/learning">Learning and Development</a></li>
                <li><a href="<?php echo base_url(); ?>main/rewards">Rewards and Recognition</a></li>
                <?php if($this->session->userdata('userlevel') == "ADMINISTRATOR"):?>
                    <li><a href="<?php echo base_url();?>logorequests">Logo Requests</a></li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a> Welcome, <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname');?>!</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url();?>changepassword">Change Password</a></li>
                        <li><a href="<?php echo base_url();?>homepage/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="main-content">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked" id="ul_mainmenu">
                        <li id="nav_recruitment">
                            <a class="classMainMenu" id="pill_recruitment" href="<?php echo base_url();?>main/recruitment" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
                                <br>Recruitment, Selection and Placement</a>
                        </li>
                        <?php if($this->session->userdata('userlevel') != 'TEMPORARY'):?>
                        <li id="nav_pms">
                            <a class="classMainMenu" id="pill_pms" href="<?php echo base_url();?>main/pms" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
                                <br>Performance Management</a></li>
                        <li id="nav_learning">
                            <a class="classMainMenu" id="pill_learning" href="<?php echo base_url();?>main/learning" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/learningdevelopment.png" height="50px">
                                <br>Learning and Development</a></li>
                        <li id="nav_rewards">
                            <a class="classMainMenu" id="pill_rewards" href="<?php echo base_url();?>main/rewards" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/awards.png" height="50px">
                                <br>Rewards and Recognition</a></li>
                        <?php endif?>
                    </ul>
                    <ul class="nav nav-pills nav-stacked" id="ul_recruitmentmenu" style="display: none">
                        <li id="li_homepage">
                            <a id="pill_homepage"  href="<?php echo base_url();?>main" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/homepage.png" height="50px">
                                <br>Home</a>
                        </li>
                        <hr>
                        <li id="nav_recruitment_filemanager">
                            <a id="pill_filemanager" href="<?php echo base_url();?>main/filemanager"  style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/file_manager.png" height="50px">
                                <br>File Maintenance</a>
                        </li>
                        <li id="nav_recruitment_transaction">
                            <a id="pill_transaction" href="<?php echo base_url();?>main/transaction" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/transaction.png" height="50px">
                                <br>Transaction</a></li>
                        <?php if($this->session->userdata('userlevel') != 'TEMPORARY'):?>
                        <li id="nav_recruitment_reports">
                            <a id="pill_reports" href="<?php echo base_url();?>main/reports" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="50px">
                                <br>Report Generation</a></li>
                         <li id="nav_analytics_reports" style="display:none">
                            <a id="pill_reports" href="<?php echo base_url();?>main/analytics" style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="50px">
                                <br>Analytics</a></li>

                        <?php if($this->session->userdata('userlevel') == 'ADMINISTRATOR'):?>
                            <li id="nav_recruitment_utilities">
                                <a id="pill_utilities" href="<?php echo base_url();?>main/utilities" style="text-align: center">
                                    <img src="<?php echo base_url();?>assets/img/icons/utilities.png" height="50px">
                                    <br>Utilities</a></li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                <ul class="nav nav-pills nav-stacked" id="ul_pmsmenu" style="display: none">
                    <li id="li_homepage">
                        <a id="pill_homepage"  href="<?php echo base_url();?>main" style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/homepage.png" height="50px">
                            <br>Home</a>
                    </li>
                    <hr>
                    <li id="nav_pms_strategic">
                        <a id="pill_strategic" href="<?php echo base_url();?>main/strategicfunctions"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/management.png" height="50px">
                            <br>Management</a>
                    </li>
                    <li id="nav_pms_pmtselection">
                        <a id="pill_strategic" href="<?php echo base_url();?>main/pmtselection"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="50px">
                            <br>PMT Selection</a>
                    </li>
                    <li id="nav_pms_opcr">
                        <a id="pill_opcr" href="<?php echo base_url();?>main/opcr"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/opcr.png" height="50px">
                            <br>OPCR</a>
                    </li>
                    <li id="nav_pms_ipcr">
                        <a id="pill_ipcr" href="<?php echo base_url();?>main/ipcr"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/ipcr.png" height="50px">
                            <br>IPCR</a>
                    </li>
                    <?php if ($this->session->userdata('pmt') != '1'):?>
                        <li id="nav_pms_evaluate">
                            <a id="pill_evaluatepms" href="<?php echo base_url();?>pmsevaluation"  style="text-align: center">
                                <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="50px">
                                <br>PMS Evaluation</a>
                        </li>
                    <?php endif;?>
                    <li id="nav_pms_reports">
                        <a id="pill_pmsreports" href="<?php echo base_url();?>main/pmsreports"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/strategic_function.png" height="50px">
                            <br>PMS Reports</a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-stacked" id="ul_rrmenu" style="display: none">
                    <li id="li_homepage">
                        <a id="pill_homepage"  href="<?php echo base_url();?>main" style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/homepage.png" height="50px">
                            <br>Home</a>
                    </li>
                    <hr>
                    <li id="nav_rr_loyalty">
                        <a id="pill_loyalty" href="<?php echo base_url();?>main/loyaltyaward"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/loyalty.png" height="50px">
                            <br>Loyalty Awards</a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-stacked" id="ul_ldmenu" style="display: none">
                    <li id="li_homepage">
                        <a id="pill_homepage"  href="<?php echo base_url();?>main" style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/homepage.png" height="50px">
                            <br>Home</a>
                    </li>
                    <hr>
                    <li id="nav_ld_events">
                        <a id="pill_events" href="<?php echo base_url();?>main/events"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/event.png" height="50px">
                            <br>Manage Events</a>
                    </li>
                    <li id="nav_ld_calendar">
                        <a id="pill_calendar" href="<?php echo base_url();?>main/calendar"  style="text-align: center">
                            <img src="<?php echo base_url();?>assets/img/icons/calendar.png" height="50px">
                            <br>Calendar of Events</a>
                    </li>
                </ul>

                <div class="form-group">
                    <hr>
                    <a class="btn btn-outline-success btn-block" href="<?php echo base_url();?>homepage/logout">Logout</a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-md-10">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="main_welcome">
                        <?php $this->load->view($content); ?>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<footer class="footer">
    <div class="container">
        <h6 style="padding-top:10px;">Copyright &copy; <?php echo date("Y"); ?> | Local Government Unit of Carmona Cavite | All Rights Reserved</h6>
    </div>
</footer>
</body>
<!-- Modal -->

<!-- LOADING MODAL -->
<div class="modal fade bs-example-modal-sm" id="loadingmodal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-load ">
            <div class="modalbody">
                <span id="messagealertmodal"> <div id="loadingCB" align="center" style="padding-top:30px;"><img src="<?php echo base_url();?>assets/img/loading.svg" style="margin:0 auto;padding:10px;" width="140px" height="140px" /></div></span>
            </div>
        </div>
    </div>
</div>

<!--MESSAGE DIALOG MODAL-->
<div class="modal fade bs-example-modal-sm" id="messagedialogmodal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header" >
                <span id="messagealertmodaltitle"></span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p id="messagealertmodalmsg"></p>
            </div>
            <div class="modal-footer">
                <input type="button" id="btnmessagedialogmodal" class="btn btn-success" data-dismiss="modal"  onclick="$('#messagedialogmodal').modal('hide');" value="Ok">
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
//    function sticky_relocate() {
//        var window_top = $(window).scrollTop();
//        var div_top = $('#sticky-anchor').offset().top;
//        if (window_top > div_top) {
//            $('#sticky').addClass('stick');
//            $('#sticky-anchor').height($('#sticky').outerHeight());
//        } else {
//            $('#sticky').removeClass('stick');
//            $('#sticky-anchor').height(0);
//        }
//    }

    $(".classMainMenu").click(function(){
       $("#ul_mainmenu").hide();
       $("#ul_recruitmentmenu").show();
    });

    $("#li_homepage").click(function(){
       $("#ul_mainmenu").show();
       $("#ul_recruitmentmenu").hide();
    });




//    $(function() {
//        $(window).scroll(sticky_relocate);
//        sticky_relocate();
//    });
//
//    var dir = 1;
//    var MIN_TOP = 200;
//    var MAX_TOP = 350;

    $(document).on('hide.bs.modal,hidden.bs.modal', function () {
        $('body').css('padding','0');
    });

//    function autoscroll() {
//        var window_top = $(window).scrollTop() + dir;
//        if (window_top >= MAX_TOP) {
//            window_top = MAX_TOP;
//            dir = -1;
//        } else if (window_top <= MIN_TOP) {
//            window_top = MIN_TOP;
//            dir = 1;
//        }
//        $(window).scrollTop(window_top);
//        window.setTimeout(autoscroll, 100);
//    }





    $(document).ready(function(){
        <?php if($this->session->userdata('username') == "EliMap2018-001"):?>
            $("#pill_homepage").find("*").prop("disabled",true);
            $("#pill_transaction").find("*").prop("disabled",true);
            $("#pill_utilities").find("*").prop("disabled",true);
            $("#panel_competencyindex").find("*").prop("disabled",true);
            $("#panel_positionprofile").find("*").prop("disabled",true);
            $("#panel_departmentprofile").find("*").prop("disabled",true);
        <?php endif;?>
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy"
        });


        $('.timepick').datetimepicker({
            format: 'LT',
            showClear: true,
            showClose: true,
            toolbarPlacement: 'bottom',
            ignoreReadonly: true
        });

        getCurrentTime();
        setInterval(function() {
            getCurrentTime();
        }, 1000);

    });

    function getCurrentTime(){
        var currDate = moment().format("MMM DD YYYY");
        var currTime = moment().format("hh:mm:ss A");
        $("#nav_date").text(currDate);
        $("#nav_time").text(currTime);
    }
    function clearField()
    {
        $('.clearField').each(function(){
            if($(this).is('input[type=text], input[type=number], input[type=email], input[type=password], input[type=hidden], textarea')){
                $(this).val("");
            } else if($(this).is('select')){
                $(this).prop('selectedIndex',0);
            }
        });
    }

</script>
<style type="text/css">
    .selected_panel{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        background-color: #C8E6C9;
        color: white !important;
    }


    .panel:hover{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }

    .nav-pills > li.active > a#pill_recruitment,
    .nav-pills > li > a#pill_recruitment:hover{
        color: #ffffff;
        background-color: #42A5F5;
    }

    .nav-pills > li.active > a#pill_learning,
    .nav-pills > li > a#pill_learning:hover{
        color: #ffffff;
        background-color: #F44336;
    }

    .nav-pills > li.active > a#pill_rewards,
    .nav-pills > li > a#pill_rewards:hover{
        color: #ffffff;
        background-color: #FFCA28;
    }

    .nav-pills > li.active > a#pill_pms,
    .nav-pills > li > a#pill_pms:hover{
        color: #ffffff;
        background-color: #00C853;
    }


    .nav-pills > li > a#pill_homepage:hover,
    .nav-pills > li > a#pill_filemanager:hover,
    .nav-pills > li > a#pill_transaction:hover,
    .nav-pills > li > a#pill_utilities:hover,
    .nav-pills > li > a#pill_reports:hover,
    .nav-pills > li > a#pill_takeexam_applicant:hover,
    .nav-pills > li > a#pill_pds_applicant:hover,
    {
        color: #ffffff;
        background-color: #0d913e;
    }

    .nav-pills > li > a{
        background-color: #d9d9d9;
    }
</style>
</html>
