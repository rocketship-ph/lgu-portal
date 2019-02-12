<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 150px;
        border: 1px solid #d8d8d8;
    }
</style>
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
            <td style="border: 1px solid #d1d1d1">
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
            <td>
                <div class="panel" align="center" id="panel_evaluate">
                    <a  href="<?php echo base_url();?>applicantinterview/evaluateinterview" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/interview_evaluate.png" height="40px">
                        <br>
                        Evaluate Interview
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
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
                    <legend>Evaluate Background Investigation</legend>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requestNumber" class="col-lg-3 control-label">Request Number</label>
                            <div class="col-lg-9">
                                <select class="form-control clearField" id="requestNumber">
                                    <option selected disabled>- Select Request Number -</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <hr>
                            <div class="form-group">
                                <label for="applicantCode" class="col-lg-3 control-label">Applicant</label>
                                <div class="col-lg-9">
                                    <select class="form-control clearField" id="applicantCode">
                                        <option selected disabled>- Select Applicant Code -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="divRequestDetails" style="display: none">
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
                    <div class="col-md-12" style=" display: none;" id="divQuestion">

                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label id="">Question</label>
                            <textarea rows="6" style="resize: none; " id="question" class="form-control clearField" placeholder="" required="" disabled >This is a sample question</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label id="">Answer</label>
                            <textarea rows="6" style="resize: none; " id="answer" class="form-control clearField" placeholder="Enter Answer Here.." required=""     ></textarea>
                            <br>
                            <div style="" class="well" style="padding: 1px; font-size: 10px;">
                                <b>
                                    <p style="font-size: 10px;">5 - Shows Strength - demonstrate 95% - 100% of the behavioral indicators</p>
                                    <p style="font-size: 10px;">4 - Very Proficient - demonstrate 85% - 94% of the behavioral indicators</p>
                                    <p style="font-size: 10px;">3 - Proficient - demonstrate 75% - 84% of the behavioral indicators</p>
                                    <p style="font-size: 10px;">2 - Minimal Development Needed - demonstrate 50% - 74% of the behavioral indicators</p>
                                    <p style="font-size: 10px;">1 - Much Development Needed - demonstrate less than 50% of the behavioral indicators</p>
                                </b>
                                <ul class="pagination pagination-lg">
                                    <li class="liRatings" score="1"><a class="btnRatings" score="1">1</a></li>
                                    <li class="liRatings" score="2"><a class="btnRatings" score="2">2</a></li>
                                    <li class="liRatings" score="3"><a class="btnRatings" score="3">3</a></li>
                                    <li class="liRatings" score="4"><a class="btnRatings" score="4">4</a></li>
                                    <li class="liRatings" score="5"><a class="btnRatings" score="5">5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 50px;">
                            <hr>
                            <div align="right">
                                <button class="btn btn-success btnActions" id="btnSubmit">SUBMIT</button>
                                <button class="btn btn-default btnActions" id="btnCancel">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
$(document).ready(function(){
    $("#nav_recruitment_transaction").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_evaluate").addClass("selected_panel");
    loadRequestnumbers();
});

function loadRequestnumbers(){
    $("#loadingmodal").modal("show");
    var select = $("#requestNumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>assessbimanagement/displayrequests",
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
    applicant.empty();
    $("#loadingmodal").modal("show");
    $("#divQuestion").hide();
    $("#answer").val("");
    $(".btnActions").prop("disabled",false);
    $.ajax({
        url: "<?php echo base_url();?>assessbimanagement/displayrequestdetails",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                for(var keys in result.details){
                    $("#lblposition").text(result.details[keys].name);
                    $("#lblgroupposition").text(result.details[keys].groupposition);
                    $("#grouppositiondescription").text(atob(result.details[keys].groupdesc));
                }

                if(result.applicants){
                    applicant.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var i in result.applicants){
                        var disp = result.applicants[i].firstname + " " + result.applicants[i].lastname + " ["+result.applicants[i].applicantcode+"]";
                        applicant.append('<option requestnumber="'+result.applicants[i].requestnumber+'" value="'+result.applicants[i].applicantcode+'">'+disp+'</option>')
                    }
                } else {
                    applicant.append('<option selected disabled>- No Applicant Available -</option>');
                }
                $("#divRequestDetails").show();
            } else {
                messageDialogModal("Server Message",result.Message);
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
    $("#answer").val("");
    console.log(reqnum);
    $("#loadingmodal").modal("show");
    $(".btnActions").prop("disabled",false);

    $.ajax({
        url: "<?php echo base_url();?>assessbimanagement/displayquestion",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum,
            "APPLICANTCODE":$("#applicantCode option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                console.log(result);
                if(result.answered){
                    for(var i in result.answered){
                        $("#answer").val(atob(result.answered[i].answer));
                        $("#answer").attr("rowid",result.answered[i].id);
                        $("#answer").attr("conductedby",result.answered[i].conductedby);
                        $("#answer").attr("encodedby",result.answered[i].encodedby);
                    }
                    for(var keys in result.details){
                        $("#question").val(atob(result.details[keys].question));
                    }
                    $("#divQuestion").show();
                    $("#btnAdd").prop("disabled",true);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
                    $("#answer").prop("disabled",true);
                } else {
                    for(var keys in result.details){
                        $("#question").val(atob(result.details[keys].question));
                    }
                    $("#divQuestion").show();
                    $("#answer").prop("disabled",false);
                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",true);
                    $("#btnDelete").prop("disabled",true);
                    $("#btnSave").prop("disabled",true);
                }

                if(result.assessed){
                    $(".btnActions").each(function(){
                        $(this).prop("disabled",true);
                        $(".liRatings").each(function(){
                            $(this).removeClass("active");
                            $(this).addClass("disabled");
                        });
                        $(".liRatings[score='"+result.assessed[0].rating+"']").removeClass("disabled");
                        $(".liRatings[score='"+result.assessed[0].rating+"']").addClass("active");
                    });
                } else {
                    $(this).prop("disabled",false);
                    $(".liRatings").each(function(){
                        $(this).removeClass("active");
                        $(this).removeClass("disabled");
                    });
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

$(".liRatings").click(function(){
    if(!($(this).hasClass("disabled"))){
        window.rating = $(this).attr("score");
        $(".liRatings").each(function(){
            $(this).removeClass("active");
        });
        $(".liRatings[score='"+window.rating+"']").addClass("active");
    }
});

$("#btnSubmit").click(function(){
    if(window.rating == undefined || window.rating == null || window.rating == 0){
        messageDialogModal("Required","Please provide rating to the background investigation before submitting")
    } else {
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>assessbimanagement/assess",
            type: "POST",
            dataType: "json",
            data: {
                "APPLICANTCODE":$("#applicantCode option:selected").val(),
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "CONDUCTEDBY":$("#answer").attr("conductedby"),
                "ENCODEDBY":$("#answer").attr("encodedby"),
                "QUESTION":$("#question").val(),
                "ANSWER":$("#answer").val(),
                "RATING":window.rating
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    $("#divRequestDetails").hide();
                    var applicant = $("#applicantCode");
                    applicant.append('<option selected disabled>- Select Applicant Code -</option>');
                    $("#divQuestion").hide();
                    window.rating = 0;
                    messageDialogModal("Server Message",result.Message);
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

</script>