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
                    <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Background Investigation Menu</h4>
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
                <div class="panel" align="center" id="panel_create">
                    <a  href="<?php echo base_url();?>backgroundinvestigation/createbi" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_create.png" height="40px">
                        <br>
                        Create Background Investigation
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_conduct">
                    <a  href="<?php echo base_url();?>backgroundinvestigation/conductbi" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_conduct.png" height="40px">
                        <br>
                        Conduct Background Investigation
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_evaluate">
                    <a  href="<?php echo base_url();?>backgroundinvestigation/evaluatebi" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_evaluate.png" height="40px">
                        <br>
                        Evaluate Background Investigation
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
                    <legend>Conduct Background Investigation</legend>
                    <div class="col-md-7">
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
                                <label for="evaluator" class="col-lg-3 control-label">Evaluator</label>
                                <div class="col-lg-9">
                                    <select class="form-control clearField" id="evaluator">
                                        <option selected disabled>- Select Evaluator -</option>
                                    </select>
                                </div>
                            </div>
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
                    <div class="col-md-5" id="divRequestDetails" style="display: none">
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
                            </div>
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
                <span>Are you sure you want to remove background investigation answer for applicant <b id="delApplicantCode"></b> under request number <b id="delReqNum"></b>?</span>
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
    $(document).ready(function(){
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
            url: "<?php echo base_url();?>conductbimanagement/displayrequests",
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
        applicant.append('<option selected disabled>- No Applicant Available -</option>');
        $("#loadingmodal").modal("show");
        $("#divQuestion").hide();
        $("#answer").val("");

        $.ajax({
            url: "<?php echo base_url();?>conductbimanagement/displayrequestdetails",
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

                    var evaluator = $("#evaluator");
                    evaluator.empty();
                    if(result.evaluators){
                        evaluator.append('<option selected disabled>- Select Evaluator -</option>');
                        for(var i in result.evaluators){
                            var disp = result.evaluators[i].firstname + " " + result.evaluators[i].lastname + " ["+result.evaluators[i].username+"]";
                            evaluator.append('<option value="'+result.evaluators[i].username+'">'+disp+'</option>')
                        }
                    } else {
                        evaluator.append('<option selected disabled>- No Evaluator Available -</option>');
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

    $("#evaluator").change(function(){
       var reqnum = $("#requestNumber option:selected").val();
        $("#loadingmodal").modal("show");
        $("#divQuestion").hide();
        $("#answer").val("");
        var applicant = $("#applicantCode");
        applicant.empty();
        $.ajax({
            url: "<?php echo base_url();?>conductbimanagement/displayapplicants",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":reqnum
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    applicant.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var i in result.details){
                        var disp = result.details[i].firstname + " " + result.details[i].lastname + " ["+result.details[i].applicantcode+"]";
                        applicant.append('<option requestnumber="'+result.details[i].requestnumber+'" value="'+result.details[i].applicantcode+'">'+disp+'</option>')
                    }
                } else {
                    messageDialogModal("Server Message",result.Message);
                    applicant.append('<option selected disabled>- No Applicant Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
                applicant.append('<option selected disabled>- No Applicant Available -</option>');


            }
        });
    });

    $("#applicantCode").change(function(){
        var username = $("#evaluator option:selected").val();
        var reqnum = $("#applicantCode option:selected").attr("requestnumber");
        $("#answer").val("");
        console.log(reqnum);
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>conductbimanagement/displayquestion",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":reqnum,
                "USERNAME":username,
                "APPLICANTCODE":$("#applicantCode option:selected").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    if(result.answered){
                        for(var i in result.answered){
                            $("#answer").val(atob(result.answered[i].answer));
                            $("#answer").attr("rowid",result.answered[i].id);
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

    $("#btnAdd").click(function(){
        if($("#answer").val() == "" || $("#answer").val()== null){
            messageDialogModal("Required","Please provide answer for background investigation");
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
               url : "<?php echo base_url();?>conductbimanagement/conduct",
                type: "POST",
                dataType: "json",
                data: {
                    "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                    "EVALUATOR":$("#evaluator option:selected").val(),
                    "QUESTION":$("#question").val(),
                    "ANSWER": $("#answer").val(),
                    "APPLICANTCODE":$("#applicantCode option:selected").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        $("#divQuestion").hide();
                        $("#divRequestDetails").hide();
                        clearField();

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
            url: "<?php echo base_url();?>conductbimanagement/inquirechanges",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                "EVALUATOR":$("#evaluator option:selected").val(),
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
                    $("#answer").prop("disabled",false);
                } else {
                    $("#question").prop("disabled",true);
                    $("#answer").prop("disabled",true);
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
            url: "<?php echo base_url();?>conductbimanagement/inquirechanges",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                "EVALUATOR":$("#evaluator option:selected").val(),
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
                    $("#answer").prop("disabled",false);

                    $("#delReqNum").text($("#requestNumber option:selected").val());
                    $("#delApplicantCode").text($("#applicantCode option:selected").val());
                    $("#modaldelete").modal("show");
                } else {
                    $("#question").prop("disabled",true);
                    $("#answer").prop("disabled",true);
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
           url:"<?php echo base_url();?>conductbimanagement/delete",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                "ROWID":$("#answer").attr("rowid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    $("#divQuestion").hide();
                    $("#divRequestDetails").hide();
                    clearField();
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
        if($("#answer").val() == "" || $("#answer").val() == null){
            messageDialogModal("Required","Please provide background investigation answer before saving changes");
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>conductbimanagement/edit",
                type: "POST",
                dataType: "json",
                data: {
                    "ANSWER":$("#answer").val(),
                    "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                    "ROWID": $("#answer").attr("rowid")
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        clearField();
                        $(".actionButtons").each(function(){
                            $(this).prop("disabled",true);
                        });
                        $("#divQuestion").hide();
                        $("#divRequestDetails").hide();
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
</script>