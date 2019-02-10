<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 150px;
        border: 1px solid #d8d8d8;
    }
    .disabled-btn-add{
        pointer-events: none;
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
                    <legend>Applicant Interview</legend>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requestNumber" class="col-lg-4 control-label">Request Number</label>
                            <div class="col-lg-8">
                                <select class="form-control clearField" id="requestNumber">
                                    <option selected disabled>- Select Request Number -</option>
                                </select>
                            </div>
                        </div>
                        <div id="divRequestDetails" style="display: none">
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
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive" id="tblcompetencycontainer" style="/*display: none;">
                                        <table id="tblcompetency" class="display responsive compact" cellspacing="0" width="100%" >
                                            <thead>
                                            <tr>
                                                <th>TITLE</th>
                                                <th>DESCRIPTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="padding-top: 128px;display: none" id="divQuestions">
                        <legend>Interview Questions</legend>
                        <div style="text-align: right;">
                            <textarea rows="6" style="resize: none;" readonly id="question" class="form-control clearField" placeholder="Select from competency titles table to add question here.." required="" ></textarea>
                        </div>
                        <hr>
                        <div>
                            <label class="control-label"><b>Additional Question:</b></label>
                            <textarea rows="6" style="resize: none; " id="additionalquestion" class="form-control clearField" placeholder="Enter Additional Interview Question Here.." required="" ></textarea>
                        </div>
                        <hr>
                        <div class="col-md-12" style="margin-bottom: 20px;" align="right">

                            <button class="btn btn-default actionButtons" id="btnAdd">ADD</button>
                            <button class="btn btn-danger actionButtons" id="btnEdit">EDIT</button>
                            <button class="btn btn-primary actionButtons" id="btnDelete">DELETE</button>
                            <button class="btn btn-success actionButtons" id="btnSave">SAVE</button>
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
                <span>Are you sure you want to remove applicant interview question for this request number <b id="delReqNum"></b> ?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-primary" id="btnProceedDelete" value="DELETE">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modalConfirm" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Server Message</h4>
                <hr>
                <p>It seems like the selected position request <b>does not have</b> the required Technical competency included in its associated Position Group<br>
                <i><b>Would you like to load all the Technical competencies instead?</b></i></p>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-primary" id="btnProceedYes" value="YES">
                    <input type="button" class="btn btn-secondary" id="btnProceedNo"  value="NO">
                </div>
            </div>
        </div>
    </div>
</div>



<script type="application/javascript">
$(document).ready(function(){
    $("#nav_recruitment_transaction").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_create").addClass("selected_panel");
    $("#question").prop("disabled",true);

    $("#btnAdd").prop("disabled",true);
    $("#btnEdit").prop("disabled",true);
    $("#btnDelete").prop("disabled",true);
    $("#btnSave").prop("disabled",true);

    loadRequestnumbers();

    $("#tblcompetency").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Technical Competencies Available"
        },
        "columns":[
            {"data":"competencytitle"},
            {"data":function(data){
                return atob(data.description);
            }},
            {"data":function(data){
                function especialJSONStringify (data) {
                    return JSON.stringify(data).
                        replace(/&/g, "&amp;").
                        replace(/</g, "&lt;").
                        replace(/>/g, "&gt;").
                        replace(/"/g, "&quot;").
                        replace(/'/g, "&#039;");
                }
                return "<a class='btn btn-success btn-sm btn-add-question' title='Add Title' href='javascript:actionAdd("+especialJSONStringify(data)+");'>Add Question</a>";
            }}
        ]
    });
});

function actionAdd(data){
    $("#question").val(atob(data.description));
    $("#question").attr("competency-id",data.id);
}

function loadRequestnumbers(){
    $("#loadingmodal").modal("show");
    var select = $("#requestNumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>applicantinterviewmanagement/displayrequests",
        type: "GET",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                select.append('<option selected disabled>- Select Request Number -</option>');
                for(var keys in result.details){
                    var technical = "";
                    var crit = JSON.parse(result.details[keys].criteria);
                    for(var k in crit){
                        if(crit[k].type == "TECHNICAL"){
                            technical = crit[k].titles;
                        }
                    }
                    var t = technical != "" ? technical : "none";
                    select.append('<option technical-title="'+t+'" position-code="'+result.details[keys].positioncode+'" group-code="'+result.details[keys].groupcode+'" value="'+result.details[keys].requestnumber+'" position="'+result.details[keys].position+'" group-position="'+result.details[keys].groupposition+'" group-desc="'+result.details[keys].groupdesc+'">'+result.details[keys].requestnumber+'</option>');
                }
            } else {
                select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                messageDialogModal("No Request Available","There seems to be no available position requests at the moment to create interview question");
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
    var techtitle = $("#requestNumber option:selected").attr("technical-title");
    var reqnum = $(this).val();
    if(techtitle == "none"){
        $("#modalConfirm").modal("show");
    } else {
        loadTechnicalData(reqnum,techtitle);
    }
});

$("#btnProceedYes").click(function(){
    $("#modalConfirm").modal("hide");
    loadTechnicalData($("#requestNumber option:selected").val(),"ALL");
});

$("#btnProceedNo").click(function(){
    $("#modalConfirm").modal("hide");
   messageDialogModal("Server Message","Unable to create interview question for the selected position");
    $("#btnmessagedialogmodal").click(function(){
       location.reload();
    });
});

function loadTechnicalData(reqnum,title){
    $("#divRequestDetails").show();
    $("#lblposition").text($("#requestNumber option:selected").attr("position"));
    $("#lblgroupposition").text($("#requestNumber option:selected").attr("group-position"));
    $("#grouppositiondescription").text(atob($("#requestNumber option:selected").attr("group-desc")));
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>applicantinterviewmanagement/displayrequestdetails",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum,
            "TECHNICAL":title
        },
        success: function(result){
            console.log(result);
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $("#divQuestions").show();
                var tbl = $("#tblcompetency").dataTable();
                tbl.fnClearTable();
                tbl.fnAddData(result.details);
                if(result.existing){
                    $("#question").prop("disabled",true);
                    $("#additionalquestion").prop("disabled",true);
                    $(".btn-add-question").addClass("disabled-btn-add");
                    for(var keys in result.existing){
                        $("#question").attr("competencyid",result.existing[keys].competencyid);
                        $("#question").val(atob(result.existing[keys].question));
                        $("#additionalquestion").val(atob(result.existing[keys].amendment));
                        $("#question").attr("rowid",result.existing[keys].id);
                    }
                    $("#btnAdd").prop("disabled",true);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
                    $("#btnDelete").prop("disabled",false);
                } else {
                    $("#question").val("");
                    $("#additionalquestion").val("");
                    $("#question").prop("disabled",false);
                    $("#additionalquestion").prop("disabled",false);
                    $(".btn-add-question").removeClass("disabled-btn-add");

                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",true);
                    $("#btnSave").prop("disabled",true);
                    $("#btnDelete").prop("disabled",true);
                }
            } else {
                messageDialogModal("Server Message",result.Message);
                $("#divRequestDetails").hide();
                $("#divQuestions").hide();
                $("#question").prop("disabled",true);
            }
        },
        error: function(e){
            console.log(e);
            $("#loadingmodal").modal("hide");

        }
    });
}

$("#btnAdd").click(function(){
    if($("#question").val() == "" || $("#question").val() == null){
        messageDialogModal("Required","Please provide interview question")
    } else if($("#additionalquestion").val() == "" || $("#additionalquestion").val() == null){
        messageDialogModal("Required","Please provide additional interview question")
    } else {
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>applicantinterviewmanagement/newquestion",
            type: "POST",
            dataType: "json",
            data: {
                "QUESTION":$("#question").val(),
                "COMPETENCYID":$("#question").attr("competency-id"),
                "ADDITIONAL":$("#additionalquestion").val(),
                "REQUESTNUMBER": $("#requestNumber option:selected").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    $("#divRequestDetails").hide();
                    $("#divQuestions").hide();
                    $("#lblposition").text("");
                    $("#lblgroupposition").text("");
                    $("#grouppositiondescription").text("");
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

$("#btnEdit").click(function(){
    $("#loadingmodal").modal("show");
    console.log($("#requestNumber option:selected").val());
    $.ajax({
        url: "<?php echo base_url();?>applicantinterviewmanagement/inquirechanges",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);
                $("#question").prop("disabled",false);
                $("#additionalquestion").prop("disabled",false);
                $(".btn-add-question").removeClass("disabled-btn-add");
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

$("#btnSave").click(function(){
    if($("#question").val() == "" || $("#question").val() == null){
        messageDialogModal("Required","Please provide interview question")
    } else if($("#additionalquestion").val() == "" || $("#additionalquestion").val() == null){
        messageDialogModal("Required","Please provide additional interview question")
    } else {
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>applicantinterviewmanagement/editquestion",
            type: "POST",
            dataType: "json",
            data: {
                "QUESTION":$("#question").val(),
                "COMPETENCYID":$("#question").attr("competency-id"),
                "ADDITIONAL":$("#additionalquestion").val(),
                "ROWID": $("#question").attr("rowid"),
                "REQUESTNUMBER": $("#requestNumber option:selected").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    $(".actionButtons").each(function(){
                        $(this).prop("disabled",true);
                    });
                    $("#divRequestDetails").hide();
                    $("#divQuestions").hide();
                    $("#lblposition").text("");
                    $("#lblgroupposition").text("");
                    $("#grouppositiondescription").text("");
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

$("#btnDelete").click(function(){
    $("#loadingmodal").modal("show");
    console.log($("#requestNumber option:selected").val());
    $.ajax({
        url: "<?php echo base_url();?>applicantinterviewmanagement/inquirechanges",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",false);
                $("#btnSave").prop("disabled",true);
                $("#btnDelete").prop("disabled",false);
                $("#question").prop("disabled",false);
                $("#additionalquestion").prop("disabled",false);
                $("#delReqNum").text($("#requestNumber option:selected").val());
                $("#modaldelete").modal("show");
            } else {
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
    console.log($("#requestNumber option:selected").val());
    $.ajax({
        url: "<?php echo base_url();?>applicantinterviewmanagement/deletequestion",
        type: "POST",
        dataType: "json",
        data: {
            "ROWID": $("#question").attr("rowid"),
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Server Message",result.Message);
                clearField();
                $("#divRequestDetails").hide();
                $("#divQuestions").hide();
                $("#lblposition").text("");
                $("#lblgroupposition").text("");
                $("#grouppositiondescription").text("");
                $(".actionButtons").each(function(){
                    $(this).prop("disabled",true);
                });
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});
</script>