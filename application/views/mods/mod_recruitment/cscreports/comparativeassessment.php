<style>
    .panel-menu{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    .font-weight-bold{
        font-weight: 700 !important;
        color: #444444 !important;
    }

    .tblrating th {
        background-color: #c6c6c6 !important;
        border-color: black;
        color: black;
        text-align: center;
    }
    .tblrating tr {
        border-color: black;
        color: black;
    }
    .tblrating td {
        border-color: black;
        color: black;
    }

    .tblrating td, th{
        padding: 3px;
    }

    .center-text{
        text-align: center !important;
        width: 60px !important;
    }
    .remarks-area{
        width: 130px !important;
    }
    .name-area{
        min-width: 160px !important;
    }

    table.tbldetails{
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        border-collapse: collapse !important;
        border: 0 !important;
        margin: 0 !important;
    }
    small{
        font-size: 80% !important;
    }
    .additionaldata{
        font-size: 90% !important;
    }

    @media print{
        input,textarea {
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #divPrint {
            -webkit-print-color-adjust: exact;
            height: 100%!important;
        }
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>CSC Required Reports Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>cscreports/comparativeassessment" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Comparative Assessment
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>main/cscreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        CSC Required Reports Menu
                    </a>
                </div>
            </td>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12" id="container">
            <legend class="excludePrint">Comparative Assessment</legend>
            <div class="form-group excludePrint">
                <label class="control-label">Request Number</label>
                <select class="form-control" id="requestnumber"></select>
            </div>
            <div class="row">
                <div class="col-md-12 excludePrint tblcont1" style="display: none" align="right">
                    <button id="exportPDF" class="btn btn-success btn-xs">Export as PDF</button><br>
                </div>
                <div id="divPrint">
                    <div class="col-md-12 tblcont1" style="display:none">
                        <h5 style="font-weight: bold">COMPARATIVE ASSESSMENT<br>Assessment Summary</h5>
                        <table class="tbldetails" style="width: 100%;font-size: 85% !important;">
                            <tr>
                                <td>Position</td>
                                <td width="30px" align="center">:</td>
                                <td><b id="lblposition"></b></td>
                                <td width="60px" align="center">&nbsp;</td>
                                <td>Education</td>
                                <td width="30px" align="center">:</td>
                                <td width="500px"><input id="lbleducation" class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                            </tr>
                            <tr>
                                <td>Item No.</td>
                                <td width="30px" align="center">:</td>
                                <td><input class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                                <td width="60px" align="center">&nbsp;</td>
                                <td>Experience</td>
                                <td width="30px" align="center">:</td>
                                <td width="500px"><input id="lblexperience" class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                            </tr>
                            <tr>
                                <td>Salary Grade</td>
                                <td width="30px" align="center">:</td>
                                <td><b id="lblsalarygrade"></b></td>
                                <td width="60px" align="center">&nbsp;</td>
                                <td>Training</td>
                                <td width="30px" align="center">:</td>
                                <td width="500px"><input id="lbltraining" class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td width="30px" align="center">:</td>
                                <td><input class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                                <td width="60px" align="center">&nbsp;</td>
                                <td>Eligibility</td>
                                <td width="30px" align="center">:</td>
                                <td width="500px"><input id="lbleligibility" class="form-control additionaldata" style="font-weight: bold" type="text"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <h5 id="tblmsg1" style="display:none"></h5>
                        <div class="table-responsive tblcont1" style="display: none">
                            <table class="tblrating" id="comparativetbl" style="width: 100%;font-size: 90% !important;" border="2px" cellpadding="10">
                                <thead>
                                <tr>
                                    <th rowspan="2">CANDIDATE</th>
                                    <th colspan="2">Performance (40%)</th>
                                    <th colspan="2">ETE (10%)</th>
                                    <th colspan="2">Written Exam (20%)</th>
                                    <th colspan="2">PSPT (20%)</th>
                                    <th colspan="2">Potential Rating (10%)</th>
                                    <th rowspan="2">TOTAL</th>
                                    <th rowspan="2">RANK</th>
                                    <th rowspan="2">REMARKS</th>
                                </tr>
                                <tr>
                                    <th>Total Rating</th>
                                    <th>EPS</th>
                                    <th>Total Rating</th>
                                    <th>EPS</th>
                                    <th>Total Score</th>
                                    <th>EPS</th>
                                    <th>Total Score</th>
                                    <th>EPS</th>
                                    <th>Total</th>
                                    <th>EPS</th>
                                </tr>
                                </thead>
                                <tbody id="tbodyinternal">
                                </tbody>
                                <thead>
                                <tr>
                                    <th rowspan="2">CANDIDATE</th>
                                    <th colspan="2" rowspan="2"></th>
                                    <th colspan="2">ETE (40%)</th>
                                    <th colspan="2">Written Exam (20%)</th>
                                    <th colspan="2">PSPT (40%)</th>
                                    <th colspan="2" rowspan="2"></th>
                                    <th rowspan="2">TOTAL</th>
                                    <th rowspan="2">RANK</th>
                                    <th rowspan="2">REMARKS</th>
                                </tr>
                                <tr>
                                    <th>Total Rating</th>
                                    <th>EPS</th>
                                    <th>Total Score</th>
                                    <th>EPS</th>
                                    <th>Total Score</th>
                                    <th>EPS</th>
                                </tr>
                                </thead>
                                <tbody id="tbodyexternal">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <br>
                        <table style="width: 100%;text-align: center !important;">
                            <tr>
                                <td style="max-width: 350px !important;">
                                    <p style="max-width: 350px !important;word-wrap: break-word" id="signatory0"></p>
                                </td>
                                <td width="100px">&nbsp;</td>
                                <td style="max-width: 350px !important;">
                                    <p style="max-width: 350px !important;word-wrap: break-word" id="signatory1"></p>
                                </td>
                                <td width="100px">&nbsp;</td>
                                <td style="max-width: 350px !important;">
                                    <p style="max-width: 350px !important;word-wrap: break-word" id="signatory2"></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td width="100px">&nbsp;</td>
                                <td style="max-width: 350px !important;">
                                    <p style="max-width: 350px !important;word-wrap: break-word" id="signatory3"></p>
                                </td>
                                <td width="100px">&nbsp;</td>
                                <td style="max-width: 350px !important;">
                                    <p style="max-width: 350px !important;word-wrap: break-word" id="signatory4"></p>
                                </td>
                                <td width="100px">&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modalConfirm" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <legend>Confirmation</legend>

                <div class="form-group">
                    <input type="hidden" id="appcode">
                    <input type="hidden" id="reqnum">
                    <label class="control-label">Are you sure you want to subject applicant <b id="appname"></b> for background investigation?</label>
                </div>
                <div align="right">
                    <input type="button" class="btn btn-success" id="btnProceedBi" value="YES, PROCEED">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
$(document).ready(function(){
    $("#nav_recruitment_reports").removeClass().addClass("active");
    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();
    $("#panel_requestpersonnelreports").addClass("selected_panel");
    loadRequestnumbers();
});

function loadRequestnumbers(){
    $("#loadingmodal").modal("show");
    var select = $("#requestnumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>comparativeassessmentmanagement/getrequests",
        type: "POST",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log("ff");
            console.log(result);
            if(result.Code == "00"){
                select.append('<option selected disabled>- Select Request Number -</option>');
                for(var keys in result.details){
                    select.append('<option position="'+result.details[keys].position+'" groupposition="'+result.details[keys].groupposition+'" desc="'+result.details[keys].groupdesc+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                }
            } else {
                select.append('<option selected disabled>- No Position Request(s) Available -</option>');
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append('<option selected disabled>- No Position Request(s) Available -</option>');
            console.log(e);
        }
    });
}

$("#requestnumber").change(function(){
    $("#loadingmodal").modal("show");
    $("#tblmsg1").hide();
    $(".tblcont1").hide();
    $.ajax({
        url: "<?php echo base_url();?>comparativeassessmentmanagement/summary",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":$("#requestnumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
               console.log(result);
                var internal='',external='';
                var tbodyext = $("#tbodyexternal");
                var tbodyint = $("#tbodyinternal");
                tbodyext.empty();
                tbodyint.empty();
                var isinternal = true;
                var isexternal = true;
                var hasinternal = false;
                var hasexternal = false;
                for(var keys in result.details){

                    $("#lblposition").text(result.details[keys].position);
                    $("#lbleducation").val(result.details[keys].education+" Level");
                    $("#lblsalarygrade").text(result.details[keys].salarygrade);
                    $("#lbleligibility").val(result.details[keys].eligibility == "NO" ? "None Required" : result.details[keys].eligibility );
                    $("#lbltraining").val(result.details[keys].training == "" || result.details[keys].null == "" || result.details[keys].training == undefined || result.details[keys].training == "0" ? "No Required" : (result.details[keys].training+" hour(s)"));
                    $("#lblexperience").val(result.details[keys].experience+" year(s) experience");
                    var name = result.details[keys].lastname+", "+result.details[keys].firstname+" "+result.details[keys].middlename;
                    if(result.details[keys].applicanttype == "INTERNAL"){
                        hasinternal = true;
                        var label = '';
                        if(isinternal){
                            label ='<b>INTERNAL APPLICANT(s)</b><br>';
                            isinternal= false;
                        }
                        internal +='<tr>' +
                        '<td class="name-area">'+label+'<a class="clickhandler" applicantname="'+name+'" requestnumber="'+result.details[keys].requestnumber+'" applicantcode="'+result.details[keys].applicantcode+'">'+name+'</a></td>' +
                        '<td class="center-text">'+result.details[keys].performancerating+'</td>' +
                        '<td class="center-text">'+result.details[keys].performanceeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].eterating+'</td>' +
                        '<td class="center-text">'+result.details[keys].eteeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].exrating+'</td>' +
                        '<td class="center-text">'+result.details[keys].exeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].psptrating+'</td>' +
                        '<td class="center-text">'+result.details[keys].pspteps+'</td>' +
                        '<td class="center-text">'+result.details[keys].potentialrating+'</td>' +
                        '<td class="center-text">'+result.details[keys].potentialratingeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].overallrating+'</td>' +
                        '<td class="center-text"></td>' +
                        '<td class="remarks-area"><textarea rows="3" style="resize: none;font-size: 8pt" class="form-control"></textarea></td>' +
                        '</tr>';
                    } else {
                        console.log("may external");
                        hasexternal = true;
                        var label = '';
                        if(isexternal){
                            label ='<b>EXTERNAL APPLICANT(s)</b><br>';
                            isexternal=false;
                        }
                        external +='<tr>' +
                        '<td class="name-area">'+label+'<a class="clickhandler" applicantname="'+name+'" requestnumber="'+result.details[keys].requestnumber+'" applicantcode="'+result.details[keys].applicantcode+'">'+name+'</a></td>' +
                        '<td colspan="2"></td>' +
                        '<td class="center-text">'+result.details[keys].eterating+'</td>' +
                        '<td class="center-text">'+result.details[keys].eteeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].exrating+'</td>' +
                        '<td class="center-text">'+result.details[keys].exeps+'</td>' +
                        '<td class="center-text">'+result.details[keys].psptrating+'</td>' +
                        '<td class="center-text">'+result.details[keys].pspteps+'</td>' +
                        '<td colspan="2"></td>' +
                        '<td class="center-text">'+result.details[keys].overallrating+'</td>' +
                        '<td></td>' +
                        '<td class="remarks-area"><textarea rows="3" style="resize: none;font-size: 8pt" class="form-control"></textarea></td>' +
                        '</tr>';
                    }
                }
                if(!hasinternal){
                    console.log("no internal");
                    internal = '<tr>' +
                    '<td>NO INTERNAL APPLICANTS</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '</tr>';
                }

                if(!hasexternal){
                    console.log("no external");
                    external = '<tr>' +
                    '<td>NO EXTERNAL APPLICANTS</td>' +
                    '<td colspan="2"></td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td colspan="2"></td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '<td class="center-text">-</td>' +
                    '</tr>';
                }
                tbodyint.append(internal);
                tbodyext.append(external);
                $(".tblcont1").show();


                if(result.signatories){
                    console.log(result.signatories);
                    var json = JSON.parse(result.signatories[0].signatories);
                    for(var keys in json){
                        $("#signatory"+keys).html('<b>'+json[keys].name+'</b><br><small>'+json[keys].position+', '+json[keys].department+'</small>')
                    }
                }

            } else {
                $("#tblmsg1").text("No Comparative Assessment Data Available");
                $("#tblmsg1").show();
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            $("#tblmsg1").text("No Comparative Assessment Data Available");
            $("#tblmsg1").show();
            console.log(e);
        }
    });
});

$(document).on("click",".clickhandler",function(){
    $("#reqnum").val($(this).attr("requestnumber"));
    $("#appcode").val($(this).attr("applicantcode"));
    $("#appname").text($(this).attr("applicantname"));
    $("#modalConfirm").modal("show");

});

$("#btnProceedBi").click(function(){
    $("#modalConfirm").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>comparativeassessmentmanagement/forbi",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":$("#reqnum").val(),
            "APPLICANTCODE":$("#appcode").val(),
            "APPLICANTNAME":$("#appname").text()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Server Message",result.Message);
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$('#exportPDF').click(function(){
    $("#divPrint").print({
        prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 90px;width: 90px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="70%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h5 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h5></p></td><td width="20%"></td></tr></table><hr><span style="float:right;font-size: 9pt;">'+moment().format("MMM DD YYYY hh:mm:ss A")+'</span>',
        noPrintSelector: ".excludePrint"
    });
});
</script>
<style type="text/css">
    table.tblanalytics td{
        padding: 5px;
        color: black;
    }
    @media print {
        /*body * {*/
        /*display:: none;*/
        /*visibility: hidden;*/
        /*top: 0;*/
        /*}*/

        /*#container, #container * {*/
        /*visibility: visible;*/
        /*}*/

        /*#container {*/
        /*position: absolute;*/
        /*left: 0;*/
        /*top: 0;*/
        /*margin-top: -650px;*/
        /*}*/

        #exportPDF {
            visibility: hidden;
        }
    }
</style>