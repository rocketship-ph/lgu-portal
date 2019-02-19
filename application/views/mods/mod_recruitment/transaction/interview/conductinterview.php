<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 150px;
        border: 1px solid #d8d8d8;
    }

    table > thead > tr > th {
        text-align: center !important;
        vertical-align: middle !important;
    }

    #tblratingscale > th,td{
        padding: 3px;
    }

    input[type='number']{
        text-align: center !important;
    }
</style>
<style>input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/applicant_interview.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Applicant Interview Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border-left: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <?php if(in_array($GLOBALS['NAV_CREATEINTERVIEW'],$this->session->userdata('modules'))):?>
                <td>
                    <div class="panel" align="center" id="panel_create">
                        <a  href="<?php echo base_url();?>applicantinterview/createinterview" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                            <img src="<?php echo base_url();?>assets/img/icons/interview_create.png" height="40px">
                            <br>
                            Create Interview Question
                        </a>
                    </div>
                </td>
                <td align="center" width="20px">
                    &nbsp;&nbsp;
                </td>
            <?php endif;?>
            <td>
                <div class="panel" align="center" id="panel_conduct">
                    <a  href="<?php echo base_url();?>applicantinterview/conductinterview" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/interview_conduct.png" height="40px">
                        <br>
                        Conduct Interview
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
<!--            <td>-->
<!--                <div class="panel" align="center" id="panel_evaluate">-->
<!--                    <a  href="--><?php //echo base_url();?><!--applicantinterview/evaluateinterview" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">-->
<!--                        <img src="--><?php //echo base_url();?><!--assets/img/icons/interview_evaluate.png" height="40px">-->
<!--                        <br>-->
<!--                        Evaluate Interview-->
<!--                    </a>-->
<!--                </div>-->
<!--            </td>-->
<!--            <td align="center" width="20px">-->
<!--                &nbsp;&nbsp;-->
<!--            </td>-->
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-lg-12">
            <div class="form-horizontal">
                <fieldset>
                    <legend>Conduct Applicant Interview</legend>
                    <div class="col-md-6 form-group">
                        <label for="requestNumber" class="control-label">Request Number</label>
                        <select class="form-control clearField" id="requestNumber">
                            <option selected disabled>- Select Request Number -</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                            <label for="applicantCode" class="control-label">Applicant</label>
                            <select class="form-control clearField" id="applicantCode">
                                <option selected disabled>- Select Applicant Code -</option>
                            </select>
                    </div>
                    <div class="col-md-5" id="divRequestDetailsXXX" style="display: none">
                        <div class="form-group">
                            <label for="groupposition" class="col-lg-4 control-label">Position</label>
                            <div class="col-lg-8">
                                <b class="control-label" id="lblposition"></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groupposition" class="col-lg-4 control-label">Group Position</label>
                            <div class="col-lg-8">
                                <b class="control-label" id="lblgroupposition"></b>
                            </div>
                            <label id="grouppositiondescription" class="col-lg-12 control-label"></label>
                        </div>
                    </div>
                    <div class="col-md-12" style="display: none;" id="divQuestion">
                    <hr class="excludePrint">
                    <div class="col-md-12">
                    <div class="col-md-12 excludePrint" align="right">
                        <button class="btn btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;PRINT</button>
                    </div>
                    <div class="col-md-12" align="center">
                        <h3 style="font-weight: bold">PSYCHO-SOCIAL AND PERSONALITY TRAITS (PSPT)</h3>
                    </div>
                        <table style="font-size: 13pt">
                            <tbody>
                            <tr>
                                <td>Applicant Name</td>
                                <td>:</td>
                                <td><b id="lblappname"></b></td>
                            </tr>
                            <tr>
                                <td>Present Position</td>
                                <td>:</td>
                                <td><b id="lblpresentposition"></b></td>
                            </tr>
                            <tr>
                                <td>Desired Position</td>
                                <td>:</td>
                                <td><b id="lbldesiredposition"></b></td>
                            </tr>
                            </tbody>
                        </table>
                    <hr class="excludePrint">
                    <div class="row excludePrint">
                        <div class="col-lg-6">
                            <label id="">Interview Question</label>
                            <textarea rows="6" style="resize: none; " id="question1" class="form-control clearField" placeholder="" required="" disabled >This is a sample question</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label id="">Amendment Question</label>
                            <textarea rows="6" style="resize: none; " id="question2" class="form-control clearField" placeholder="" required="" disabled >This is a sample question</textarea>
                        </div>
                    </div>

                        <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                            <div class="col-md-12">
                            <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="2">
                            <thead>
                            <tr>
                                <th>Oral Communication 15%</th>
                                <th rowspan="2" valign="middle" width="80px">Rating</th>
                                <th colspan="4">PSPT</th>
                            </tr>
                            <tr>
                                <th>Behavior</th>
                                <th>Traits</th>
                                <th width="80px">Rating</th>
                                <th width="85px">% Weight</th>
                                <th width="80px">EPS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <p><b>1. CONTENT</b><br>
                                        (Substance, relevance of issues discussed)</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control behavior clearField" placeholder="Rating.." id="behavior-content" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td>
                                    <p>1. Oral Communication</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-oral" maxlength="5" oninput="maxLengthCheck(this)" readonly>
                                </td>
                                <td style="text-align: center">
                                    <p>15%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>2. MECHANICS</b><br>
                                        (Grammar, sentence construction, pronunciation, etc.)</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control behavior clearField" placeholder="Rating.." id="behavior-mechanics" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td>
                                    <p>2. Analytical Ability</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-analytical" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>20%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>3. ORGANIZATION</b><br>
                                        (Sequence of presentation of ideas/thought, clarity of presentation)</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control behavior clearField" placeholder="Rating.." id="behavior-organization" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td>
                                    <p>3. Judgment</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-judgment" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>15%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><b>4. DELIVERY</b><br>
                                        (Self-confidence, voice, gestures, body language, mannerisms, etc)</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control behavior clearField" placeholder="Rating.." id="behavior-delivery" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td>
                                    <p>4. Initiative</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-initiative" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>15%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right" align="right">
                                    <b>AVERAGE</b>
                                </td>
                                <td style="text-align: center">
                                    <b id="lblbehavioraverage"></b>
                                </td>
                                <td>
                                    <p>5. Stress Tolerance</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-stress" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>10%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3">
                                    <table id="tblratingscale" width="100%" border="1" cellpadding="2" cellspacing="5">
                                        <thead>
                                        <tr>
                                            <th align="center" colspan="2">
                                                <b>Rating Scale</b>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Excellent</td>
                                            <td>93 - 100</td>
                                        </tr>
                                        <tr>
                                            <td>More than acceptable</td>
                                            <td>85 - 92</td>
                                        </tr>
                                        <tr>
                                            <td>Acceptable</td>
                                            <td>75 - 84</td>
                                        </tr>
                                        <tr>
                                            <td>Less Acceptable</td>
                                            <td>64 - 74</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <p>6. Sensitivity</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-sensitivity" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>10%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <p>7. Service Orientation</p>
                                </td>
                                <td>
                                    <input type="number" class="form-control pspt clearField" placeholder="Rating.." id="pspt-service" maxlength="5" oninput="maxLengthCheck(this)">
                                </td>
                                <td style="text-align: center">
                                    <p>15%</p>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <b>TOTAL</b>
                                </td>
                                <td>

                                </td>
                                <td style="text-align: center">
                                    <p>100%</p>
                                </td>
                                <td style="text-align: center">
                                    <b id="lblpspt"></b>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 form-group">
                        <label class="control-label">COMMENTS</label>
                        <textarea class="form-control clearField" rows="4" style="resize: none" id="comments" placeholder="Enter comments here.."></textarea>
                    </div>
                    <div class="col-md-12" align="left">
                        <br>
                        <p>Rated by: <b><?php echo $this->session->userdata('name');?></b><br>
                            Date: <b id="lbltime"></b></p>
                    </div>
                    <div class="col-md-12 excludePrint">
                        <div class="col-md-12" style="margin-bottom: 50px;">
                            <hr>
                            <div align="right">
                                <button class="btn btn-default" id="btnAdd">ADD</button>
                                <button class="btn btn-danger" id="btnEdit">EDIT</button>
                                <button class="btn btn-primary" id="btnDelete">DELETE</button>
                                <button class="btn btn-success" id="btnSave">SAVE</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Confirmation</h4>
                <hr>
                <span>Are you sure you want to remove applicant interview answer for applicant <b id="delApplicantCode"></b> under request number <b id="delReqNum"></b>?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-primary" id="btnProceedDelete" value="DELETE">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
function maxLengthCheck(object) {
    if (object.value > 100){
       messageDialogModal("Input Error","Please provide a rating not exceeding 100%");
        object.value = "";
    }
    if (object.value.length > object.maxLength){
        object.value = object.value.slice(0, object.maxLength);
    }
}
$(document).ready(function(){
    $("#btnPrint").hide();
    $("#nav_recruitment_transaction").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_conduct").addClass("selected_panel");

    $("#btnAdd").prop("disabled",true);
    $("#btnEdit").prop("disabled",true);
    $("#btnDelete").prop("disabled",true);
    $("#btnSave").prop("disabled",true);

    loadRequestnumbers();
});

function loadRequestnumbers(){
    $("#loadingmodal").modal("show");
    var select = $("#requestNumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>conductinterviewmanagement/displayrequests",
        type: "GET",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                select.append('<option selected disabled>- Select Request Number -</option>');
                for(var keys in result.details){
                    select.append('<option value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                }
            } else {
                select.append('<option selected disabled>- No Request Number(s) Available -</option>');
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append('<option selected disabled>- No Request Number(s) Available -</option>');
            console.log(e);
        }
    });
}

$("#requestNumber").change(function(){
    var reqnum = $(this).val();
    var applicant = $("#applicantCode");
    $("#lbltime").text(moment().format("MMM DD, YYYY hh:mm A"));
    applicant.empty();
    applicant.append('<option selected disabled>- No Applicant Available -</option>');
    $("#loadingmodal").modal("show");
    $("#divQuestion").hide();

    $.ajax({
        url: "<?php echo base_url();?>conductinterviewmanagement/displayrequestdetails",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            for(var keys in result.details){
                $("#lblposition").text(result.details[keys].name);
                $("#lblgroupposition").text(result.details[keys].groupposition);
                $("#grouppositiondescription").text(atob(result.details[keys].groupdesc));
                $("#lbldesiredposition").text(result.details[keys].name);
            }
            $("#divRequestDetails").show();
            if(result.Code == "00"){
                var applicantcode = $("#applicantCode");
                applicantcode.empty();
                if(result.applicants){
                    applicantcode.append('<option selected disabled>- Select Applicant -</option>');
                    for(var i in result.applicants){
                        var disp = result.applicants[i].firstname + " " + result.applicants[i].lastname + " ["+result.applicants[i].applicantcode+"]";
                        var appname = result.applicants[i].firstname + " " + result.applicants[i].lastname;
                        var currpos = (result.applicants[i].currentposition == "" || result.applicants[i].currentposition == null || result.applicants[i].currentposition == undefined) ? "-" : result.applicants[i].currentposition;
                        applicantcode.append('<option present-position="'+currpos+'" applicant-name="'+appname+'" value="'+result.applicants[i].applicantcode+'" requestnumber="'+result.applicants[i].requestnumber+'">'+disp+'</option>')
                    }
                } else {
                    applicantcode.append('<option selected disabled>- No Applicant Available -</option>');
                    messageDialogModal("Server Message","No Applicant Available to conduct Interview");
                }
            } else if(result.Code == "05") {
                messageDialogModal("Server Message","It seems like the position request you are trying to access does not list you as one of the evaluators . Please select another position request.");
                $("#btnmessagedialogmodal").click(function(){
                    $("#divRequestDetails").hide();
                    clearField();
                });
                $("#question").prop("disabled",true);
            } else {
                messageDialogModal("Server Message","No Data Found for the Selected Position Request");
                $("#divRequestDetails").hide();
                $("#question").prop("disabled",true);
            }
        },
        error: function(e){
            console.log(e);
            $("#loadingmodal").modal("hide");

        }
    });
});


$("#applicantCode").change(function(){
    var reqnum = $("#applicantCode option:selected").attr("requestnumber");
    $("#lblappname").text($("#applicantCode option:selected").attr("applicant-name"));
    $("#lblpresentposition").text($("#applicantCode option:selected").attr("present-position"));
    $("#loadingmodal").modal("show");



    $(".behavior").each(function(){
        $(this).prop("disabled",false);
        $(this).val("");
    });
    $(".pspt").each(function(){
        $(this).prop("disabled",false);
        $(this).val("");
    });
    $("#comments").prop("disabled",false);
    $("#comments").val("");
    $("#lblpspt").text("");
    $("#lblbehavioraverage").text("");
    $("#btnPrint").hide();
    $.ajax({
        url: "<?php echo base_url();?>conductinterviewmanagement/displayquestion",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum,
            "APPLICANTCODE":$("#applicantCode option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                if(result.answered){
                    $("#btnPrint").show();
                    console.log(result.answered);
                    for(var i in result.answered){
                        $("#question1").val(atob(result.answered[i].question1));
                        $("#question2").val(atob(result.answered[i].question2));
                        $("#comments").val(atob(result.answered[i].comments));
                        $("#question1").attr("rowid",result.answered[i].id);
                        $("#behavior-content").val(result.answered[i].content);
                        $("#behavior-mechanics").val(result.answered[i].mechanics);
                        $("#behavior-organization").val(result.answered[i].organization);
                        $("#behavior-delivery").val(result.answered[i].delivery);
                        $("#pspt-oral").val(result.answered[i].psptoral);
                        $("#pspt-analytical").val(result.answered[i].psptanalytical);
                        $("#pspt-judgment").val(result.answered[i].psptjudgment);
                        $("#pspt-initiative").val(result.answered[i].psptinitiative);
                        $("#pspt-stress").val(result.answered[i].psptstress);
                        $("#pspt-sensitivity").val(result.answered[i].psptsensitivity);
                        $("#pspt-service").val(result.answered[i].psptservice);

                        $("#lblbehavioraverage").text(result.answered[i].oralaverage);
                        $("#lblpspt").text(result.answered[i].overalltotal);

                        $("#lbltime").text(moment(result.answered[i].timestamp).format("MMM DD, YYYY hh:mm A"));
                    }
                    $(".behavior").each(function(){
                       $(this).prop("disabled",true);
                    });
                    $(".pspt").each(function(){
                        $(this).prop("disabled",true);
                    });
                    $("#comments").prop("disabled",true);

                    $("#divQuestion").show();
                    $("#btnAdd").prop("disabled",true);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
                } else {
                    for(var keys in result.details){
                        $("#question1").val(atob(result.details[keys].question));
                        $("#question2").val(atob(result.details[keys].amendment));
                    }
                    $("#divQuestion").show();
                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",true);
                    $("#btnDelete").prop("disabled",true);
                    $("#btnSave").prop("disabled",true);
                }
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
            $("#loadingmodal").modal("hide");


        }
    });
});

function validatePspt(){
    var b = true;
    var p = true;
   $(".behavior").each(function(){
       if($(this).val() == "" || $(this).val() == null){
           b = false;
       }
   });
    $(".pspt").each(function(){
        if($(this).val() == "" || $(this).val() == null){
            p = false;
        }
    });

    if(b == false){
        messageDialogModal("Required","Please rate all the criteria in Oral Communication Behavior");
        return false;
    }
    if(p == false){
        messageDialogModal("Required","Please rate all the traits under PSPT");
        return false;
    }
    return true;
}

$("#btnAdd").click(function(){
    if(!validatePspt()){
       return;
    } else {
        $("#loadingmodal").modal("show");
        var json = new Object();
        json['question1'] = btoa($("#question1").val());
        json['question2'] = btoa($("#question2").val());
        json['comments'] = btoa($("#comments").val());
        var behavior = new Object();
        behavior['content'] = $("#behavior-content").val();
        behavior['mechanics'] = $("#behavior-mechanics").val();
        behavior['organization'] = $("#behavior-organization").val();
        behavior['delivery'] = $("#behavior-delivery").val();
        json['behavior'] = behavior;
        var pspt = new Object();
        pspt['oral'] = $("#pspt-oral").val();
        pspt['analytical'] = $("#pspt-analytical").val();
        pspt['judgment'] = $("#pspt-judgment").val();
        pspt['initiative'] = $("#pspt-initiative").val();
        pspt['stress'] = $("#pspt-stress").val();
        pspt['sensitivity'] = $("#pspt-sensitivity").val();
        pspt['service'] = $("#pspt-service").val();
        json['pspt'] = pspt;
        json['behavioralaverage'] = $("#lblbehavioraverage").text();
        json['pspttotal'] = $("#lblpspt").text();

        $.ajax({
            url : "<?php echo base_url();?>conductinterviewmanagement/conduct",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "APPLICANTCODE":$("#applicantCode option:selected").val(),
                "CONTENT":$("#behavior-content").val(),
                "MECHANICS":$("#behavior-mechanics").val(),
                "ORGANIZATION":$("#behavior-organization").val(),
                "DELIVERY":$("#behavior-delivery").val(),
                "ORAL":$("#pspt-oral").val(),
                "ANALYTICAL":$("#pspt-analytical").val(),
                "JUDGMENT":$("#pspt-judgment").val(),
                "INITIATIVE":$("#pspt-initiative").val(),
                "STRESS":$("#pspt-stress").val(),
                "SENSITIVITY":$("#pspt-sensitivity").val(),
                "SERVICE":$("#pspt-service").val(),
                "BEHAVIORALAVE":$("#lblbehavioraverage").text(),
                "PSPTTOTAL":$("#lblpspt").text(),
                "COMMENTS":btoa($("#comments").val()),
                "Q1":btoa($("#question1").val()),
                "Q2":btoa($("#question2").val()),
                "JSON":btoa(JSON.stringify(json))
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    $("#divQuestion").hide();
                    $("#divRequestDetails").hide();
                    $("#lblbehavioraverage").text("");
                    $("#lblpspt").text("");
                    clearField();
		    $("#applicantCode").empty();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");

            }
        });

    }
});

$("#btnEdit").click(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>conductinterviewmanagement/inquirechanges",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val(),
            "APPLICANTCODE":$("#applicantCode option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);
                $("#question1").prop("disabled",true);
                $("#question2").prop("disabled",true);
                $(".behavior").each(function(){
                    $(this).prop("disabled",false);
                });
                $(".pspt").each(function(){
                    $(this).prop("disabled",false);
                });
                $("#pspt-oral").prop("disabled",false);
                $("#comments").prop("disabled",false);

            } else {
                $("#question1").prop("disabled",true);
                $("#question2").prop("disabled",true);
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

$("#btnDelete").click(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>conductinterviewmanagement/inquirechanges",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val(),
            "APPLICANTCODE":$("#applicantCode option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);
                $("#question").prop("disabled",true);
                $("#question2").prop("disabled",true);

                $("#delReqNum").text($("#requestNumber option:selected").val());
                $("#delApplicantCode").text($("#applicantCode option:selected").val());
                $("#modaldelete").modal("show");
            } else {
                $("#question").prop("disabled",true);
                $("#question2").prop("disabled",true);
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

$("#btnProceedDelete").click(function(){
    $("#modaldelete").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url:"<?php echo base_url();?>conductinterviewmanagement/delete",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val(),
            "APPLICANTCODE": $("#applicantCode option:selected").val(),
            "ROWID":$("#question1").attr("rowid")
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Server Message",result.Message);
                $("#divQuestion").hide();
                $("#divRequestDetails").hide();
                $("#pspt-oral").prop("disabled",false);
                $("#comments").prop("disabled",false);
                $("#lblbehavioraverage").text("");
                $("#lblpspt").text("");

                $(".behavior").each(function(){
                    $(this).prop("disabled",false);
                    $(this).val("");
                });
                $(".pspt").each(function(){
                    $(this).prop("disabled",false);
                    $(this).val("");
                });
                $("#comments").val("");
                $("#btnPrint").hide();
                clearField();
		$("#applicantCode").empty();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
            $("#loadingmodal").modal("hide");

        }
    });
});

$("#btnSave").click(function(){
    if(!validatePspt()){
        return;
    } else {
        $("#loadingmodal").modal("show");
        var json = new Object();
        json['question1'] = btoa($("#question1").val());
        json['question2'] = btoa($("#question2").val());
        json['comments'] = btoa($("#comments").val());
        var behavior = new Object();
        behavior['content'] = $("#behavior-content").val();
        behavior['mechanics'] = $("#behavior-mechanics").val();
        behavior['organization'] = $("#behavior-organization").val();
        behavior['delivery'] = $("#behavior-delivery").val();
        json['behavior'] = behavior;
        var pspt = new Object();
        pspt['oral'] = $("#pspt-oral").val();
        pspt['analytical'] = $("#pspt-analytical").val();
        pspt['judgment'] = $("#pspt-judgment").val();
        pspt['initiative'] = $("#pspt-initiative").val();
        pspt['stress'] = $("#pspt-stress").val();
        pspt['sensitivity'] = $("#pspt-sensitivity").val();
        pspt['service'] = $("#pspt-service").val();
        json['pspt'] = pspt;
        json['behavioralaverage'] = $("#lblbehavioraverage").text();
        json['pspttotal'] = $("#lblpspt").text();
        $.ajax({
            url: "<?php echo base_url();?>conductinterviewmanagement/edit",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "APPLICANTCODE":$("#applicantCode option:selected").val(),
                "CONTENT":$("#behavior-content").val(),
                "MECHANICS":$("#behavior-mechanics").val(),
                "ORGANIZATION":$("#behavior-organization").val(),
                "DELIVERY":$("#behavior-delivery").val(),
                "ORAL":$("#pspt-oral").val(),
                "ANALYTICAL":$("#pspt-analytical").val(),
                "JUDGMENT":$("#pspt-judgment").val(),
                "INITIATIVE":$("#pspt-initiative").val(),
                "STRESS":$("#pspt-stress").val(),
                "SENSITIVITY":$("#pspt-sensitivity").val(),
                "SERVICE":$("#pspt-service").val(),
                "BEHAVIORALAVE":$("#lblbehavioraverage").text(),
                "PSPTTOTAL":$("#lblpspt").text(),
                "COMMENTS":btoa($("#comments").val()),
                "JSON":btoa(JSON.stringify(json)),
                "ROWID": $("#question1").attr("rowid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    $("#divQuestion").hide();
                    $("#divRequestDetails").hide();
                    $("#lblbehavioraverage").text("");
                    $("#lblpspt").text("");
                    clearField();
			$("#applicantCode").empty();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e)
            }
        });
    }
});

$(".behavior").on('input', function(){
    var t = 0;
   $(".behavior").each(function(){
       t += parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
   });
    $("#lblbehavioraverage").text((t/4).toFixed(2));
    $("#pspt-oral").val((t/4).toFixed(2));
    $("#pspt-oral").trigger('change');
});

$(".pspt").on('change input', function(){
    var t = 0;
    $(".pspt").each(function(){
        var v = 0;
        if($(this).attr("id") == "pspt-oral"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.15));
        }
        if($(this).attr("id") == "pspt-analytical"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.20));
        }
        if($(this).attr("id") == "pspt-judgment"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.15));
        }
        if($(this).attr("id") == "pspt-initiative"){
            v += parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.15));
        }
        if($(this).attr("id") == "pspt-stress"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.10));
        }
        if($(this).attr("id") == "pspt-sensitivity"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.10));
        }
        if($(this).attr("id") == "pspt-service"){
            v = parseFloat(($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) ? 0.0 : $(this).val());
            t+=(v* (.15));
        }
    });
    $("#lblpspt").text(t.toFixed(2));
});

$("#btnPrint").click(function(){
    $("#divQuestion").print({
        prepend: '<table align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="100px"></td></tr></table><hr>',
        noPrintSelector: ".excludePrint"
    });
});


</script>