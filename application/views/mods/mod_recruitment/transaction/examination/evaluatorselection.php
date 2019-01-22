<style>
    .panel{
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
                    <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Examination Menu</h4>
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
                <div class="panel" align="center" id="panel_evaluatorselection">
                    <a  href="<?php echo base_url();?>examination/evaluatorselection" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/evaluator_selection.png" height="40px">
                        <br>
                        Evaluator Selection
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createexam">
                    <a  href="<?php echo base_url();?>examination/createexam" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_exam.png" height="40px">
                        <br>
                        Create Examination
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assessmentcheck">
                    <a href="<?php echo base_url();?>examination/assessmentcheck" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="40px">
                        <br>
                        Assessment Check
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_examresults">
                    <a  href="<?php echo base_url();?>examination/examresults" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/exam_result.png" height="40px">
                        <br>
                        Examination Results
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
        <div class="col-lg-12">
            <div class="form-horizontal">
                <fieldset>
                    <legend>Personnel Selection Board</legend>
                    <div class="form-group">
                        <label for="requestNumber" class="col-lg-2 control-label">Request Number</label>
                        <div class="col-lg-4">
                            <select class="form-control clearField" id="requestNumber">
                                <option selected disabled>- Select Request Number -</option>
                            </select>
                        </div>
                        <label style="display: none;padding-top: 5px" id="position" class="col-lg-6 control-label"></label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-lg-6">
                                <ol>
                                    <li><h4 style="margin-bottom: 0px !important;" id="eval1"></h4><label>City/Municipal Mayor</label></li>
                                    <li><h4 style="margin-bottom: 0px !important;" id="eval2"></h4><span>HR Manager</span></li>
                                    <li><h4 style="margin-bottom: 0px !important;" id="eval3"></h4><span>Requestor</span></li>
                                    <li style="margin-top: 9px !important;">
                                        <select order="4" class="form-control clearField" id="eval4">
                                            <option selected disabled>- Select Evaluator -</option>
                                        </select>
                                    </li>
                                    <li style="margin-top: 9px !important;">
                                        <select order="5" class="form-control clearField" id="eval5">
                                            <option selected disabled>- Select Evaluator -</option>
                                        </select>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-default btn-block" id="btnAdd">ADD</button>
                                <button class="btn btn-danger btn-block" id="btnEdit">EDIT</button>
                                <button class="btn btn-primary btn-block" id="btnDelete">DELETE</button>
                                <button class="btn btn-success btn-block" id="btnSave">SAVE</button>
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
                <span>Are you sure you want to remove evaluators from this request number <b id="delReqNum"></b> ?</span>
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

        $("#panel_evaluatorselection").addClass("selected_panel");
        loadRequests();

        $("#btnAdd").prop("disabled",false);
        $("#btnEdit").prop("disabled",true);
        $("#btnDelete").prop("disabled",true);
        $("#btnSave").prop("disabled",true);
        window.arrevaluators = [];
        window.isUpdate = false;
    });

    function loadRequests(){
        if(window.isUpdate == false){
            $("#loadingmodal").modal("show");
        }
        var select = $("#requestNumber");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>evaluatorselectionmanagement/getrequests",
            type: "POST",
            dataType: "json",
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    console.log(data);
                    select.append("<option selected disabled>- Select Request Number -</option>");
                    for(var keys in data.details){
                        select.append("<option value='"+data.details[keys].requestnumber+"' rowid='"+data.details[keys].id+"' department='"+data.details[keys].department+"' position='"+data.details[keys].name+"'>"+data.details[keys].requestnumber+"</option>");
                    }
                } else {
                    select.append("<option selected disabled>- No Request(s) Available -</option>");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- No Request(s) Available -</option>");
                console.log(e);
            }
        });
    }

    $("#requestNumber").change(function(){
        window.arrevaluators = [];
        $("#position").text($("#requestNumber option:selected").attr("position") + ", " + $("#requestNumber option:selected").attr("department") + " Department");
        $("#position").show();
        var reqnum = $("#requestNumber option:selected").val();
        loadOtherEvals(reqnum);
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>evaluatorselectionmanagement/displayconstantevals",
            type: "POST",
            dataType: "json",
            data: {
              "REQUESTNUMBER":$(this).val()
            },
            success: function(data){
                if(data.Code == "00"){
                    $("#loadingmodal").modal("hide");
                    console.log(data);
                    if(data.details.length > 3){
                        $("#btnAdd").prop("disabled",true);
                        $("#btnEdit").prop("disabled",false);
                        $("#btnDelete").prop("disabled",false);
                        $("#btnSave").prop("disabled",true);
                        for(var keys in data.details){
                            var dt = data.details[keys];
                            if(parseInt(dt.evalorder) == (parseInt(keys)+ 1)){
                                if(parseInt(keys)+1 == 4 || parseInt(keys)+1 == 5){
                                    $("#eval"+(parseInt(keys)+1)).prop("disabled",true);
                                    $("#eval"+(parseInt(keys)+1)).val(""+dt.username);
                                } else {
                                    $("#eval"+(parseInt(keys)+1)).text(dt.firstname + " " +dt.lastname);
                                }
                            }
                            if(parseInt(keys) < 3){
                                (window.arrevaluators).push({
                                    username: dt.username,
                                    userlevel:dt.userlevel,
                                    name: dt.firstname + " " + dt.lastname,
                                    order: dt.evalorder
                                });
                            }
                        }
                    } else {
                        $("#btnAdd").prop("disabled",false);
                        $("#btnEdit").prop("disabled",true);
                        $("#btnDelete").prop("disabled",true);
                        $("#btnSave").prop("disabled",true);

                        $("#eval4").prop("disabled",false);
                        $("#eval5").prop("disabled",false);
                        for(var keys in data.details){
                            var dt = data.details[keys];
                            (window.arrevaluators).push({
                                username: dt.username,
                                userlevel:dt.userlevel,
                                name: dt.firstname + " " + dt.lastname,
                                order: dt.evalorder
                            });
                            if(parseInt(dt.evalorder) == (parseInt(keys)+ 1)){
                                $("#eval"+(parseInt(keys)+1)).text(dt.firstname + " " + dt.lastname);
                            }
                        }
                    }
                } else {
                    $("#loadingmodal").modal("hide");

                    console.log(data);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });

    function loadOtherEvals(reqnum){
        var select = $("#eval4");
        var select2 = $("#eval5");
        select.empty();
        select2.empty();
        $.ajax({
            url: "<?php echo base_url();?>evaluatorselectionmanagement/displayevals",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":reqnum
            },
            success: function(result){
                if(result.Code == "00"){
                    select.append("<option selected disabled>- Select Evaluator -</option>");
                    select2.append("<option selected disabled>- Select Evaluator -</option>");
                    window.arrselection = result.details;
                    for(var keys in result.details){
                        var name = result.details[keys].firstname + " " + result.details[keys].lastname;
                        select.append('<option userlevel="'+result.details[keys].userlevel+'" value="'+result.details[keys].username+'">'+name+'</option>');
                        select2.append('<option userlevel="'+result.details[keys].userlevel+'" value="'+result.details[keys].username+'">'+name+'</option>');
                    }
                    $("#loadingmodal").modal("hide");
                } else {
                    console.log(result);
                    select.append("<option selected disabled>- Select Evaluator -</option>");
                    select2.append("<option selected disabled>- Select Evaluator -</option>");

                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- Select Evaluator -</option>");
                select2.append("<option selected disabled>- Select Evaluator -</option>");

                console.log(e);
            }
        });
    }

    $("#eval4").change(function(){
       var username = $(this).val();
        var col = window.arrselection;
        col = (col).filter(arr => arr.username != username);

        var select = $("#eval5");
        select.empty().append("<option selected disabled>- Select Evaluator -</option>");
        for(var keys in col){
            var name = col[keys].firstname + " " + col[keys].lastname;
            select.append('<option userlevel="'+col[keys].userlevel+'" value="'+col[keys].username+'">'+name+'</option>');
        }
    });

    $("#btnAdd").click(function(){
        if($("#requestNumber option:selected").val() == "- Select Request Number -" || $("#requestNumber option:selected").val() == null){
            messageDialogModal("Required","Please Select Request Number");
        } else if($("#eval4 option:selected").val() == "- Select Evaluator -" || $("#eval4 option:selected").val() == null){
            messageDialogModal("Required","Please select fourth evaluator");
        } else if($("#eval5 option:selected").val() == "- Select Evaluator -" || $("#eval5 option:selected").val() == null){
            messageDialogModal("Required","Please select fifth evaluator");
        } else {
            if(!submitData()){
                messageDialogModal("Server Message","Failed to Assign Evaluators");
            } else {
                messageDialogModal("Server Message","Successfully Assigned Evaluators");

                $("#btnAdd").prop("disabled",false);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",true);
                $("#btnDelete").prop("disabled",true);
                window.isUpdate = true;
                loadRequests();

            }
        }

    });

    $("#btnEdit").click(function(){
       $("#eval4").prop("disabled",false);
       $("#eval5").prop("disabled",false);

        $("#btnAdd").prop("disabled",true);
        $("#btnEdit").prop("disabled",true);
        $("#btnSave").prop("disabled",false);
        $("#btnDelete").prop("disabled",false);
    });

    $("#btnSave").click(function(){
        if($("#requestNumber option:selected").val() == "- Select Request Number -" || $("#requestNumber option:selected").val() == null){
            messageDialogModal("Required","Please Select Request Number");
        } else if($("#eval4 option:selected").val() == "- Select Evaluator -" || $("#eval4 option:selected").val() == null){
            messageDialogModal("Required","Please select fourth evaluator");
        } else if($("#eval5 option:selected").val() == "- Select Evaluator -" || $("#eval5 option:selected").val() == null){
            messageDialogModal("Required","Please select fifth evaluator");
        } else {
            if(!submitData()){
                messageDialogModal("Server Message","Failed to Edit Evaluators");
            } else {
                messageDialogModal("Server Message","Successfully Edited Evaluators");

                $("#btnAdd").prop("disabled",false);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",true);
                $("#btnDelete").prop("disabled",true);
                window.isUpdate = true;
                loadRequests();

            }
        }

    });

    function submitData(){
                    for(var i=0;i<2;i++){
                var eval = "#eval"+(i+4)+" option:selected";
                (window.arrevaluators).push({
                    username: $(eval).val(),
                    userlevel: $(eval).attr("userlevel"),
                    name: $(eval).text(),
                    order: $("#eval"+(i+4)).attr("order")
                });
            }
            console.log(window.arrevaluators);
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>evaluatorselectionmanagement/insert",
                type: "POST",
                dataType: "json",
                data: {
                    "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                    "EVALUATORS": window.arrevaluators
                },
                success: function(result) {
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        clearField();
                        window.arrevaluators = [];
                        window.arrselection = [];

                        $("#eval1").text("");
                        $("#eval2").text("");
                        $("#eval3").text("");
                        $("#position").hide();
                        return true;
                    } else {
                        return false;
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");
                    return false;
                }
            });
        return true;
    }

    $("#btnDelete").click(function(){
        $("#delReqNum").text($("#requestNumber option:selected").val());
        $("#modaldelete").modal("show");
    });

    $("#btnProceedDelete").click(function(){
        $("#modaldelete").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
           url: "<?php echo base_url();?>evaluatorselectionmanagement/delete" ,
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    window.arrevaluators = [];
                    window.arrselection = [];

                    $("#eval1").text("");
                    $("#eval2").text("");
                    $("#eval3").text("");
                    $("#position").hide();

                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",true);
                    $("#btnSave").prop("disabled",true);
                    $("#btnDelete").prop("disabled",true);

                    window.isUpdate = true;
                    loadRequests();
                } else {
                    messageDialogModal("Server Message",result.Message);

                }
            },
            error:function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });

</script>