<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>LGU - CARMONA</title>
<!--    <link rel="shortcut icon" type="image/png" href="--><?php //echo base_url();?><!--assets/img/seal.png"/>-->
    <!-- attach CSS styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/dataTables.responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/datatable-1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/stickyfooter.css" />

    <!-- attach JavaScripts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/messagedialog.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery.print.min"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/qr/qrcode.min.js"></script>

    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/datatable-1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/datatable-1.10.12/js/dataTables.responsive.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/datatable/Buttons-1.2.2/js/buttons.html5.min.js"></script>

    <script defer src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script defer src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>

    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <style>
        /*.modal{*/
            /*top: 40px !important;*/
        /*}*/
    </style>

    <style type="text/css">
        .panel-footer{
            min-height: 120px !important;
            height: auto;
            font-size: 15pt;
        }

        .panel-body > img{
            height: 100px !important;
        }

        .panel:hover{
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        }

        a {
            color: #6d6d6d;
        }

        a:hover{
            color: #0d913e;
        }
    </style>
</head>

<body>
<div style="background:#e9ebee">
    <div id="logoDiv" class="container" style="margin-left: 10px;">
        <div class="row">
            <div class="col-lg-2 col-md-2" style="padding:20px;" align="center">
                <a href="<?php echo base_url(); ?>homepage"><img style="height: 100px;" src="data:image/png;base64,<?php echo $GLOBALS['logohandler']; ?>"></a>
            </div>
            <div class="col-lg-6 col-md-6">
                <h2 style="color:#525252;padding-top:20px;font-size:26.5px;text-align: center;">Program to Institutionalize Meritocracy and <br>Excellence in Human Resource Management</h2>
            </div>
            <div class="col-lg-2 col-md-2" style="padding-top:20px;" align="center">
                <a href="http://www.csc.gov.ph/" target="_blank"><img style="height: 100px;" src="<?php echo base_url(); ?>assets/img/csc.png" ></a>
            </div>
            <div class="col-lg-2 col-md-2" style="padding-top:50px;" align="left">
                <table style="color: #2a2a2a">
                    <tr><td>Date</td><td width="10px" align="center"> : </td><td align="left"><span id="nav_date"></span></td></tr>
                    <tr><td>Time</td><td width="10px" align="center"> : </td><td align="left"><span id="nav_time"></span></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div align="center" class="col-md-8">
            <h3 style="margin-top: 5px;">Welcome to Municipality of Carmona, Cavite!</h3>
        </div>
        <div class="col-md-4" align="right">
            <a class="btn btn-outline-success btn-lg btn-block" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group col-md-3">
                <div class="panel panel-default" id="panelRecruitment">
                    <div class="panel-body" align="center" style="background-color: #42A5F5">
                        <img class="home_img" id="recruitment_img" src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="60px">
                    </div>
                    <div class="panel-footer"><a id="link_recruitment" href="#" onclick="displayDescription('Recruitment, Selection and Placement','link_recruitment','recruitment_img')">Recruitment, Selection and Placement</a></div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="panel panel-default" id="panelPms">
                    <div class="panel-body" align="center" style="background-color: #00C853">
                        <img class="home_img" id="pms_img" src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="60px">
                    </div>
                    <div class="panel-footer"><a id="link_pms" href="#" onclick="displayDescription('Performance Management System','link_pms','pms_img')">Performance Management System</a></div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="panel panel-default" id="panelLearningDev">
                    <div class="panel-body" align="center" style="background-color: #F44336">
                        <img class="home_img" id="learningdevelopment_img" src="<?php echo base_url();?>assets/img/icons/learningdevelopment.png" height="60px">
                    </div>
                    <div class="panel-footer"><a id="link_learning" href="#" onclick="displayDescription('Learning and Development','link_learning','learningdevelopment_img')">Learning and Development</a></div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="panel panel-default" id="panelRewards">
                    <div class="panel-body" align="center" style="background-color: #FFCA28">
                        <img class="home_img" id="rewards_img" src="<?php echo base_url();?>assets/img/icons/awards.png" height="60px">
                    </div>
                    <div class="panel-footer"><a id="link_rewards" href="#" onclick="displayDescription('Rewards and Recognition','link_rewards','rewards_img')">Rewards and Recognition</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="main-content">
                <?php $this->load->view($content); ?>
            </div>
            <div id="divMoreJobs">
                <a id="btnMoreJobs" class="btn btn-outline-danger btn-block">View More</a>
            </div>
            <hr>
            <div>
                 <button id="btnSealOfTransparency" class="btn btn-success btn-block" >Seal of Transparency</button>
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
<!--MESSAGE DIALOG MODAL-->
<div class="modal fade bs-example-modal-sm" id="messagedialogmodal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header" >
                <span id="messagealertmodaltitle"></span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <span id="messagealertmodalmsg"></span>
            </div>
            <div class="modal-footer">
                <input type="button" id="btnmessagedialogmodal" class="btn btn-success" data-dismiss="modal"  onclick="$('#messagedialogmodal').modal('hide');" value="Ok">
            </div>
        </div>
    </div>
</div>
<div id="modal_description" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding-top: 5px;padding-bottom: 0;height:410px">
                <div class="row">
                    <div class="col-md-4" id="divModalImage" style="margin-top: 0px;border-radius: 5px;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <img src="" id="modal_img" height="150px" class="img-responsive">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <h4 style="font-weight: 700" id="modal_title"></h4>
                            </div>
                            <div class="col-md-12">
                                <p id="modal_text"></p>
                            </div>
                            <div class="col-md-12" align="right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
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
<script type="application/javascript">

    $(document).ready(function(){
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy"
        });
        getCurrentTime();
        setInterval(function() {
            getCurrentTime();
        }, 1000);
    });

    function clearField()
    {
        $('.clearField').each(function(){
            if($(this).is('input[type=text], input[type=number], input[type=email], input[type=password], textarea')){
                $(this).val("");
            } else if($(this).is('select')){
                $(this).prop('selectedIndex',0);
            }
        });
    }

    function getCurrentTime(){
        var currDate = moment().format("MMMM DD, YYYY");
        var currTime = moment().format("hh:mm:ss A");
        $("#nav_time").text(currTime);
        $("#nav_date").text(currDate);
    }
    function clearField()
    {
        $('.clearField').each(function(){
            if($(this).is('input[type=text], input[type=number], input[type=email], input[type=password]')){
                $(this).val("");
            } else if($(this).is('select')){
                $(this).prop('selectedIndex',0);
            }
        });
    }

    function displayDescription(title,id,img){
        console.log(title);
        console.log(id);
        console.log(img);
        var arrDesc = ['Recruitment Selection and Placement. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, consectetur sed lacus non, ultricies semper leo. Vestibulum volutpat, neque et fermentum commodo, mi libero eleifend felis, a malesuada justo lacus sit amet erat. Vivamus hendrerit arcu sed accumsan pharetra. Aenean sit amet leo velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec blandit placerat lorem facilisis placerat. Aliquam ultricies quam ut faucibus convallis. Praesent aliquam, nulla vel ullamcorper cursus, odio tortor bibendum sem, malesuada mollis orci eros ac massa. Donec ornare urna lectus, in lobortis est ornare eu. Proin malesuada pulvinar metus, nec volutpat ante feugiat nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor est et quam lobortis, non consequat erat dictum. Curabitur quis semper dui. Nunc sagittis justo libero, at ullamcorper enim tempor eget. Aliquam eu augue non libero sodales faucibus.',
        'Performance Management System. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, consectetur sed lacus non, ultricies semper leo. Vestibulum volutpat, neque et fermentum commodo, mi libero eleifend felis, a malesuada justo lacus sit amet erat. Vivamus hendrerit arcu sed accumsan pharetra. Aenean sit amet leo velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec blandit placerat lorem facilisis placerat. Aliquam ultricies quam ut faucibus convallis. Praesent aliquam, nulla vel ullamcorper cursus, odio tortor bibendum sem, malesuada mollis orci eros ac massa. Donec ornare urna lectus, in lobortis est ornare eu. Proin malesuada pulvinar metus, nec volutpat ante feugiat nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor est et quam lobortis, non consequat erat dictum. Curabitur quis semper dui. Nunc sagittis justo libero, at ullamcorper enim tempor eget. Aliquam eu augue non libero sodales faucibus.',
        'Learning and Development. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, consectetur sed lacus non, ultricies semper leo. Vestibulum volutpat, neque et fermentum commodo, mi libero eleifend felis, a malesuada justo lacus sit amet erat. Vivamus hendrerit arcu sed accumsan pharetra. Aenean sit amet leo velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec blandit placerat lorem facilisis placerat. Aliquam ultricies quam ut faucibus convallis. Praesent aliquam, nulla vel ullamcorper cursus, odio tortor bibendum sem, malesuada mollis orci eros ac massa. Donec ornare urna lectus, in lobortis est ornare eu. Proin malesuada pulvinar metus, nec volutpat ante feugiat nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor est et quam lobortis, non consequat erat dictum. Curabitur quis semper dui. Nunc sagittis justo libero, at ullamcorper enim tempor eget. Aliquam eu augue non libero sodales faucibus.',
        'Awards and Recognition. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ante erat, consectetur sed lacus non, ultricies semper leo. Vestibulum volutpat, neque et fermentum commodo, mi libero eleifend felis, a malesuada justo lacus sit amet erat. Vivamus hendrerit arcu sed accumsan pharetra. Aenean sit amet leo velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec blandit placerat lorem facilisis placerat. Aliquam ultricies quam ut faucibus convallis. Praesent aliquam, nulla vel ullamcorper cursus, odio tortor bibendum sem, malesuada mollis orci eros ac massa. Donec ornare urna lectus, in lobortis est ornare eu. Proin malesuada pulvinar metus, nec volutpat ante feugiat nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras auctor est et quam lobortis, non consequat erat dictum. Curabitur quis semper dui. Nunc sagittis justo libero, at ullamcorper enim tempor eget. Aliquam eu augue non libero sodales faucibus.'];
        if(id == 'link_recruitment'){
            $("#modal_title").text(title);
            $("#modal_img").attr("src",$("#"+img).attr("src"));
            $("#divModalImage").css("background-color","#42A5F5");
            $("#modal_text").text(arrDesc[0]);
        } else if (id == "link_learning"){
            $("#modal_title").text(title);
            $("#modal_img").attr("src",$("#"+img).attr("src"));
            $("#divModalImage").css("background-color","#F44336");
            $("#modal_text").text(arrDesc[1]);
        } else if (id == "link_pms"){
            $("#modal_title").text(title);
            $("#modal_img").attr("src",$("#"+img).attr("src"));
            $("#divModalImage").css("background-color","#00C853");
            $("#modal_text").text(arrDesc[1]);
        } else if (id == "link_rewards"){
            $("#modal_title").text(title);
            $("#modal_img").attr("src",$("#"+img).attr("src"));
            $("#divModalImage").css("background-color","#FFCA28");
            $("#modal_text").text(arrDesc[2]);
        } else {

        }
       // $("#modal_description").modal("show");
    }

    $(document).on('hidden.bs.modal', function (e) {
        // do something when this modal window is closed...

        $("body").css("padding","0");
    });
</script>
</html>
