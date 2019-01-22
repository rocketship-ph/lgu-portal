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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Performance Management Menu</h4>
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
            <legend style="margin-bottom: 5px">Approve MFO/PAP</legend>
            <p style="font-size: 11px">All pending for approval MFO/PAP(s) by each department will be displayed on this page. No department available indicates that there is no pending MFO/PAP that needs to be approved at the moment.</p>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="control-label">DEPARTMENT: <span class="req">*</span></label>
                        <select class="form-control clearField" id="department" required="">
                        </select>
                        <hr>
                    </div>
                    <div class="col-md-10">
                        <div class="table-responsive" id="tblmfopapcontainer">
                            <table id="tblmfopap" class="display responsive compact" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th>STRATEGIC OBJECTIVE</th>
                                    <th>CATEGORY</th>
                                    <th>MFO/PAP</th>
                                    <th>SUCCESS INDICATORS</th>
                                    <th>ALLOTTED BUDGET</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-danger btn-block addBtnClass" id="btnAddModal">ADD</button>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnApprove">APPROVE</button>
                        <a class="btn btn-block btn-default" href="<?php echo base_url();?>strategicfunctions/approvemfopap">CANCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalsuccess" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <b>Server Message</b>
            </div>
            <div class="modal-body" >
                <label id="successmsg"></label>
            </div>
            <div class="modal-footer" align="center">
                <a href="<?php echo base_url();?>strategicfunctions/assignobjectives" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalupdate" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" >
                <legend>Update MFO/PAP - <span id="edit_lbldeptname"></span> Department</legend>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="edit_rowid">
                        <input type="hidden" id="edit_soid">
                        <div class="form-group">
                            <label class="control-label">STRATEGIC OBJECTIVE</label>
                            <input type="text" class="form-control clearField" id="edit_so" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CATEGORY</label>
                            <input type="text" class="form-control clearField" id="edit_category" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">MFO/PAP</label>
                            <textarea rows="3" class="form-control clearField" placeholder="Major Final Output / Projects/Activities/Plans.." id="edit_mfopap" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">SUCCESS INDICATORS</label>
                            <textarea rows="3" class="form-control clearField" placeholder="Success Indicators (Target + Measures).." id="edit_successindicator" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ALLOTTED BUDGET</label>
                            <input type="text" class="form-control clearField" id="edit_budget" placeholder="Enter Alloted Budget">
                        </div>
                    </div>
                    <div class="col-md-12" align="right">
                        <hr>
                        <button id="btnUpdate" class="btn btn-success">Update</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modaladd" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" >
                <legend>Add MFO/PAP - <span id="add_lbldeptname"></span> Department</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">STRATEGIC OBJECTIVE</label>
                            <select class="form-control clearField" id="add_so"></select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CATEGORY</label>
                            <select class="form-control clearField" id="add_category">
                                <option selected disabled>- Select Category -</option>
                                <option value="STRATEGIC PRIORITIES">Strategic Priorities</option>
                                <option value="CORE FUNCTION">Core Functions</option>
                                <option value="SUPPORT FUNCTION">Support Functions</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">MFO/PAP</label>
                            <textarea rows="3" class="form-control clearField" placeholder="Major Final Output / Projects/Activities/Plans.." id="add_mfopap" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">SUCCESS INDICATORS</label>
                            <textarea rows="3" class="form-control clearField" placeholder="Success Indicators (Target + Measures).." id="add_successindicator" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ALLOTTED BUDGET</label>
                            <input type="text" class="form-control clearField" id="add_budget" placeholder="Enter Alloted Budget">
                        </div>
                    </div>
                    <div class="col-md-12" align="right">
                        <hr>
                        <button id="btnAdd" class="btn btn-success">Add</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" >
                <legend>Reject MFO/PAP - <span id="del_lbldeptname"></span> Department</legend>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="del_rowid">
                        <p>
                            <b>Strategic Objective:</b>&nbsp;<span id="del_so"></span><br>
                            <b>Category:</b>&nbsp;<span id="del_category"></span><br>
                            <b>MFO/PAP:</b><br><span id="del_mfopap"></span><br>
                            <b>Success Indicators:</b><br><span id="del_successindicator"></span><br>
                            <b>Allotted Budget:</b>&nbsp;<span id="del_budget"></span>
                        </p>
                        <hr style="border: 2px dashed #e3e3e3">
                        <label>Are you sure you want to reject this MFO/PAP?</label>
                    </div>
                    <div class="col-md-12" align="right">
                        <hr>
                        <button id="btnDelete" class="btn btn-primary">Delete</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
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


        $("#panel_approvemfopap").addClass("selected_panel");

        $('#edit_budget').priceFormat({
            clearPrefix: true
        });
        $('#add_budget').priceFormat({
            clearPrefix: true
        });
        window.isUpdate = false;
        loadData();
        loadDepartments();
    });

    function loadData(){
        $("#tblmfopap").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No MFO/PAP(s) Available"
            },
            "data" : [],
            "columns":[
                {"data":"strategicobjective"},
                {"data":"category"},
                {"data":function(data){
                    return atob(data.mfopap);
                }},
                {"data":function(data){
                    return atob(data.successindicator);
                }},
                {"data":function(data){
                    var budget = '';
                    if(data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") {
                        budget = '--';
                    } else {
                        budget = "Php "+formatCurrency(data.allottedbudget);
                    }
                    return budget;
                }},
                {"data":function(data){
                    return "<a class='btn btn-success btn-sm' title='Edit MFO/PAP' href='javascript:actionEdit("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-pencil'></i></a> | <a class='btn btn-primary btn-sm' title='Reject MFO/PAP' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
                }}
            ]
        });
    }

    function loadDepartments(){
        $.ajax({
            url: "<?php echo base_url();?>approvemfopapmanagement/departments",
            type: "GET",
            dataType: "json",
            success: function(result){
                var dept = $("#department");
                dept.empty();
                dept.append('<option selected disabled>- Select Department -</option>');
                if(result.Code == "00"){
                    for(var keys in result.details){
                        dept.append('<option value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>');
                    }
                } else {
                    dept.append('<option selected disabled>- No Department Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#btnAddModal").click(function(){
        if($("#department option:selected").val() == "- Select Department -" || $("#department option:selected").val() == "- No Department Available -"){
            messageDialogModal("Required","No Department Selected");
        } else {
            $("#add_so").prop('selectedIndex',0);
            $("#add_category").prop('selectedIndex',0);
            $("#add_mfopap").val("");
            $("#add_successindicator").val("");
            $("#add_budget").val("");
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>approvemfopapmanagement/strategicobjectives",
                type: "POST",
                dataType: "json",
                data: {
                    "DEPARTMENT":$("#department option:selected").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    var dept = $("#add_so");
                    dept.empty();
                    dept.append('<option selected disabled>- Select Strategic Objective -</option>');
                    if(result.Code == "00"){
                        for(var keys in result.details){
                            dept.append('<option so="'+result.details[keys].soid+'" value="'+result.details[keys].strategicobjective+'" so-desc="'+result.details[keys].description+'" >'+result.details[keys].strategicobjective+'</option>');
                        }
                    } else {
                        dept.append('<option selected disabled>- No Strategic Objective(s) Available -</option>');
                        messageDialogModal("Server Message",result.Message);
                    }
                    $("#modaladd").modal("show");
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");

                }
            });
        }
    });

    $("#department").change(function(){
        window.isUpdate = false;
        loadMfoPap($(this).val());
    });

    function loadMfoPap(dept){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        var table  = $("#tblmfopap").dataTable();
        table.fnClearTable();
        $.ajax({
            url:"<?php  echo base_url(); ?>approvemfopapmanagement/mfopap",
            data: {
                "DEPARTMENT":dept
            },
            type:"POST",
            dataType: "json",
            success: function(result){
                $('#loadingmodal').modal('hide');
                if(result.Code=="00"){
                    table.fnAddData(result.details);
                }else{
                    table.fnClearTable();
                }
            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    }

    function actionEdit(data){
        $("#edit_lbldeptname").text(data.department);
        $("#edit_rowid").val(data.id);
        $("#edit_soid").val(data.soid);
        $("#edit_so").val(data.strategicobjective);
        $("#edit_category").val(data.category);
        $("#edit_mfopap").val(atob(data.mfopap));
        $("#edit_successindicator").val(atob(data.successindicator));
        $("#edit_budget").val((data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") ? "" : formatCurrency(data.allottedbudget));
        $("#modalupdate").modal("show");
    }

    function actionDelete(data){
        $("#del_lbldeptname").text(data.department);
        $("#del_rowid").val(data.id);
        $("#del_so").text(data.strategicobjective);
        $("#del_category").text(data.category);
        $("#del_mfopap").text(atob(data.mfopap));
        $("#del_successindicator").text(atob(data.successindicator));
        $("#del_budget").text((data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") ? "" : formatCurrency(data.allottedbudget));
        $("#modaldelete").modal("show");
    }

    $("#btnUpdate").click(function(){
        if($("#department option:selected").val() == "- Select Department -" || $("#department option:selected").val() == "- No Department Available -"){
            messageDialogModal("Required","No Department Selected");
        } else if($("#edit_mfopap").val() == "" || $("#edit_mfopap").val() == null){
            messageDialogModal("Required","Please enter MFO/PAP");
        } else if($("#edit_successindicator").val() == "" || $("#edit_successindicator").val() == null){
            messageDialogModal("Required","Please enter Success Indicator");
        } else {
            $("#modalupdate").modal("hide");
            $('#loadingmodal').modal('show');
            $.ajax({
                url:"<?php  echo base_url(); ?>approvemfopapmanagement/editmfopap",
                type:"POST",
                dataType: "json",
                data: {
                    "ROWID":$("#edit_rowid").val(),
                    "DEPARTMENT":$("#department option:selected").val(),
                    "MFOPAP":$("#edit_mfopap").val(),
                    "SUCCESSINDICATOR":$("#edit_successindicator").val(),
                    "BUDGET":$("#edit_budget").val()
                },
                success: function(result){
                    $('#loadingmodal').modal('hide');
                    if(result.Code=="00"){
//                    messageDialogModal("Server Message",result.Message);
                        window.isUpdate = true;
                        loadMfoPap($("#department option:selected").val());
                    }else{
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    $('#loadingmodal').modal('hide');
                    console.log(e);
                }
            });
        }
    });

    $("#btnAdd").click(function(){
        if($("#add_so option:selected").val() == "- Select Strategic Objective -" || $("#add_so option:selected").val() == "- No Strategic Objective(s) Available -"){
            messageDialogModal("Required","No Strategic Objective Selected");
        } else if($("#add_category option:selected").val() == "- Select Category -"){
            messageDialogModal("Required","No Category Selected");
        } else if($("#add_mfopap").val() == "" || $("#add_mfopap").val() == null){
            messageDialogModal("Required","Please enter MFO/PAP");
        } else if($("#add_successindicator").val() == "" || $("#add_successindicator").val() == null){
            messageDialogModal("Required","Please enter Success Indicator");
        } else {
            $("#modaladd").modal("hide");
            $('#loadingmodal').modal('show');
            $.ajax({
                url:"<?php  echo base_url(); ?>approvemfopapmanagement/addmfopap",
                type:"POST",
                dataType: "json",
                data: {
                    "STRATEGICOBJECTIVE":$("#add_so option:selected").val(),
                    "SOID":$("#add_so option:selected").attr("so"),
                    "CATEGORY":$("#add_category option:selected").val(),
                    "DEPARTMENT":$("#department option:selected").val(),
                    "MFOPAP":$("#add_mfopap").val(),
                    "SUCCESSINDICATOR":$("#add_successindicator").val(),
                    "BUDGET":$("#add_budget").val()
                },
                success: function(result){
                    $('#loadingmodal').modal('hide');
                    if(result.Code=="00"){
//                    messageDialogModal("Server Message",result.Message);
                        window.isUpdate = true;
                        loadMfoPap($("#department option:selected").val());
                    }else{
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    $('#loadingmodal').modal('hide');
                    console.log(e);
                }
            });
        }

    });

    $("#btnDelete").click(function(){
        $("#modaldelete").modal("hide");
        $('#loadingmodal').modal('show');
        $.ajax({
            url:"<?php  echo base_url(); ?>approvemfopapmanagement/deletemfopap",
            type:"POST",
            dataType: "json",
            data: {
                "ROWID":$("#del_rowid").val(),
                "DEPARTMENT":$("#department option:selected").val()
            },
            success: function(result){
                $('#loadingmodal').modal('hide');
                if(result.Code=="00"){
                    window.isUpdate = true;
                    loadMfoPap($("#department option:selected").val());
                }else{
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    });



    $("#btnApprove").click(function(){
        var table = $('#tblmfopap').dataTable();
        var data = table.fnGetData();
        if(data.length<=0) {
            messageDialogModal("Server Message","No MFO/PAP Data to be approved");
        } else {
            var ids = [];
            for(var keys in data){
                ids.push(data[keys].id);
            }
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>approvemfopapmanagement/approvemfopap",
                type: "POST",
                dataType: "json",
                data: {
                    "IDS":ids,
                    "DEPARTMENT":$("#department option:selected").val()
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    if(data.Code == "00"){
                        var table  = $("#tblmfopap").dataTable();
                        table.fnClearTable();
                        messageDialogModal("Server Message",data.Message);
                        loadDepartments();
                        clearField();
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
    });

    function formatCurrency(amt){
        var a = formatter.format(amt);
        return a.replace("PHP","");
    }

    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
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