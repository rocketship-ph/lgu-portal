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
                <div style="height: 70px;width:70px;background-color: #00C853;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Strategic Functions Menu</h4>
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
                <div class="panel" align="center" id="panel_strategicobjectives">
                    <a href="<?php echo base_url();?>strategicfunctions/strategicobjective" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assignso">
                    <a  href="<?php echo base_url();?>strategicfunctions/assignobjectives" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Assign Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_approvemfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/approvemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/approve_mfopap.png" height="40px">
                        <br>
                        Approve MFO/PAP
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
                    <legend>Strategic Objective</legend>
                    <div class="form-group col-lg-10">
                        <label for="departmentTitle" class="col-lg-2 control-label">Strategic Objective</label>
                        <div class="col-lg-10">
                            <select class="form-control clearField" id="dropdownSO">
                                <option selected disabled>- Select Strategic Objective -</option>
                            </select>
                            <input style="display: none" type="text" id="editSO" class="form-control clearField" placeholder="Enter Strategic Objective" required="">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <label for="departmentTitle" class="col-lg-2 control-label">Period</label>
                        <div class="col-lg-10">
                            <select class="form-control clearField" id="editPeriod" disabled>
                                <option selected disabled>- Select Period -</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <label class="col-lg-2 control-label">Description:</label>
                        <div class="col-lg-10">
                            <textarea disabled rows="6" style="resize: none" id="editDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <button class="btn btn-default btn-block addBtnClass" id="btnAdd">ADD</button>
                        <button class="btn btn-danger btn-block editBtnClass" id="btnEdit">EDIT</button>
                        <button class="btn btn-primary btn-block deleteBtnClass" id="btnDelete">DELETE</button>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnSave">SAVE</button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addSOModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Add New Strategic Objective</legend>
                <div>
                    <div class="form-group">
                        <label class="control-label">Period:<span style="color:red;font-weight: bold">*</span></label>
                        <select class="form-control clearField" id="soPeriod"></select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Strategic Objective:<span style="color:red;font-weight: bold">*</span></label>
                        <input type="text" id="inputStrategicObjective" class="form-control clearField" placeholder="Enter Strategic Objective" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description:<span style="color:red;font-weight: bold">*</span></label>
                        <textarea rows="3" style="resize: none" id="soDescription" class="form-control clearField" placeholder="Enter Strategic Objective Description" required=""></textarea>
                    </div>
                    <div style="text-align: right">
                        <br>
                        <button type="button" class="btn btn-success" id="btnSubmitNewSO">ADD</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteSOModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                <div>
                    <div class="form-group">
                        <label class="control-label">Are you sure you want to delete this strategic objective?</label>
                    </div>
                    <div style="text-align: right">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnDeleteSO">DELETE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms_strategic").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_strategicobjectives").addClass("selected_panel");

          $(".saveBtnClass").prop("disabled",true);
        window.isUpdate = false;
        loadStrategicObjectives();
        loadEditPeriod();
    });

    $("#btnEdit").click(function(){
        if($("#dropdownSO option:selected").val() == "- Select Strategic Objective -"){
            messageDialogModal("Required","Select Strategic Objective to Edit");
        } else {
            $("#dropdownSO").hide();
            $("#editSO").show();
            $("#editDescription").prop("disabled",false);
            $("#editPeriod").prop("disabled",false);
            $(".saveBtnClass").prop("disabled",false);
            $(".deleteBtnClass").prop("disabled",true);
        }
    });

    function loadEditPeriod(){
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
            type: "POST",
            dataType: "json",
            success: function(result){
                var select = $("#editPeriod");
                select.empty();
                if(result.Code =="00"){
                    select.append("<option selected disabled>- Select Period -</option>");

                    var freq = result.details[0].frequency;
                    var slices = 12/parseInt(freq);
                    var start = 0;
                    var end = slices;

                    for(var x=0;x<freq;x++){
                        select.append("<option " +
                        "value='"+moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                        moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+ "' " +
                        "period-from='"+moment().startOf('year').add(start, 'months').format("MM-YYYY")+ "' " +
                        "period-to='"+moment().startOf('year').add((end-1), 'months').format("MM-YYYY")+"'>"+
                        moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                        moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+
                        "</option>");
                        start += end;
                        end += slices;
                    }
                } else {
                    select.append("<option selected disabled>- No Period Available -</option>");
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#btnAdd").click(function(){
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
            type: "POST",
            dataType: "json",
            success: function(result){
                var select = $("#soPeriod");
                select.empty();
                if(result.Code =="00"){
                    select.append("<option selected disabled>- Select Period -</option>");

                    var freq = result.details[0].frequency;
                    var slices = 12/parseInt(freq);
                    var start = 0;
                    var end = slices;

                    for(var x=0;x<freq;x++){
                        select.append("<option " +
                        "value='"+moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                        moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+ "' " +
                        "period-from='"+moment().startOf('year').add(start, 'months').format("MM-YYYY")+ "' " +
                        "period-to='"+moment().startOf('year').add((end-1), 'months').format("MM-YYYY")+"'>"+
                        moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                        moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+
                        "</option>");
                        start += end;
                        end += slices;
                    }
                    $("#addSOModal").modal("show");
                } else {
                    select.append("<option selected disabled>- No Period Available -</option>");
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });

    $("#btnDelete").click(function(){
        if($("#dropdownSO option:selected").val() == "- Select Strategic Objective -"){
            messageDialogModal("Required","Select Strategic Objective to Delete");
        } else {
            $("#deleteSOModal").modal("show");
        }
    });

    $("#btnDeleteSO").click(function(){
        $("#deleteSOModal").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/deleteStrategicObjective",
            type:"POST",
            dataType:"json",
            data: {
                "ROWID":$("#dropdownSO option:selected").attr("deptid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    window.isUpdate = true;
                    loadStrategicObjectives();
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

    $("#btnSave").click(function(){
        if($("#editSO").val() == "" || $("#editSO").val() == null){
            messageDialogModal("Required","Please Enter Strategic Objective");
        } else if($("#editPeriod option:selected").val() == "- Select Period -" || $("#editPeriod option:selected").val() == null){
            messageDialogModal("Required","Please Select Period");
        } else if($("#editDescription").val() == "" || $("#editDescription").val() == null){
            messageDialogModal("Required","Please Enter Strategic Objective Description");
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
               url: "<?php echo base_url();?>strategicobjectivemanagement/updateStrategicObjective",
                type:"POST",
                dataType:"json",
                data: {
                    "ROWID":$("#dropdownSO option:selected").attr("deptid"),
                    "STRATEGICOBJECTIVE": $("#editSO").val(),
                    "DESCRIPTION": $("#editDescription").val(),
                    "PERIOD":$("#editPeriod option:selected").val(),
                    "PERIODFROM":$("#editPeriod option:selected").attr("period-from"),
                    "PERIODTO":$("#editPeriod option:selected").attr("period-to")
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        clearField();
                        $("#editSO").hide();
                        $("#dropdownSO").show();
                        window.isUpdate = true;
                        loadStrategicObjectives();
                        $("#btnSave").prop("disabled",true);
                        $("#btnDelete").prop("disabled",false);
                        $("#editDescription").prop("disabled",true);
                        messageDialogModal("Server Message",result.Message);
                    } else {
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
    });

    $("#btnSubmitNewSO").click(function(){
       if(!validate()){
           return;
       } else {
           $("#addSOModal").modal("hide");
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>strategicobjectivemanagement/newStrategicObjectives",
               type:"POST",
               dataType:"json",
               data: {
                   "STRATEGICOBJECTIVE": $("#inputStrategicObjective").val(),
                   "DESCRIPTION": $("#soDescription").val(),
                   "PERIOD":$("#soPeriod option:selected").val(),
                   "PERIODFROM":$("#soPeriod option:selected").attr("period-from"),
                   "PERIODTO":$("#soPeriod option:selected").attr("period-to")
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       clearField();
                       $("#editSO").hide();
                       $("#dropdownSO").show();
                       window.isUpdate = true;
                       loadStrategicObjectives();
                       $("#editDescription").prop("disabled",true);
                       messageDialogModal("Server Message",result.Message);
                   } else {
                       messageDialogModal("Server Message",result.Message);
                   }
               },
               error: function(e){
                   console.log(e);
               }
           });
       }
    });

    function validate(){
        if($("#soPeriod option:selected").val() == "- Select Period -" || $("#soPeriod option:selected").val() == null){
            messageDialogModal("Required","Please Select Evaluation Period");
            return false;
        }

        if($("#inputStrategicObjective").val() == "" || $("#inputStrategicObjective").val() == null){
            messageDialogModal("Required","Please Enter Strategic Objective Name");
            return false;
        }
        if($("#soDescription").val() == "" || $("#soDescription").val() == null){
            messageDialogModal("Required","Please Enter Strategic Objective Description");
            return false;
        }
        return true;
    }

    function loadStrategicObjectives(){
        var select = $("#dropdownSO");
        select.empty();
        select.append("<option selected disabled>- Select Strategic Objective -</option>");
        if(window.isUpdate == false){
            $("#loadingmodal").modal("show");
        }
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/displayStrategicObjectives",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");

                if(result.Code == "00"){
                    for(var keys in result.details){
                        var option = '<option period="'+result.details[keys].period+'" deptid="'+result.details[keys].id+'" desc="'+result.details[keys].description+'" value="'+result.details[keys].strategicobjective+'">'+result.details[keys].strategicobjective+'</option>';
                        select.append(option);
                    }
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#dropdownSO").change(function(){
      $("#editDescription").val($("#dropdownSO option:selected").attr("desc"));
      $("#editPeriod").val($("#dropdownSO option:selected").attr("period"));
      $("#editPeriod").prop('disabled',true);
      $("#editSO").val($(this).val());
        console.log($(this).val());
    });


</script>
<style>
    .s_o{
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3); /* IE */
        -moz-transform: scale(1.3); /* FF */
        -webkit-transform: scale(1.3); /* Safari and Chrome */
        -o-transform: scale(1.3); /* Opera */
        padding: 10px;
    }
</style>