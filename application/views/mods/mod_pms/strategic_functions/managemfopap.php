<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
    .addEmployees{
        font-size: 11px !important;
        text-align: center;
        line-height: 1.0;
        display: inline-block;
    }

    .divEmployees{
        padding-top: 10px !important;
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
                <div class="panel" align="center" id="panel_managemfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/managemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/manage_mfopap.png" height="40px">
                        <br>
                        Manage MFO/PAP
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createmfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/mfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_mfopap.png" height="40px">
                        <br>
                        Create MFO/PAP
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
            <legend style="margin-bottom: 5px">Manage MFO/PAP</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" id="li_availablemfopap" href="#availablemfopap">Assign MFO/PAP(s)</a></li>
                        <li><a data-toggle="pill" id="li_pendingmfopap" href="#pendingmfopap">Pending MFO/PAP(s)</a></li>
                        <li><a data-toggle="pill" id="li_specialtask" href="#specialtask">View Pending Special Task(s)</a></li>
                        <li><a data-toggle="pill" id="li_approvespecialtask" href="#approvespecialtask">Approve Pending Special Task(s)</a></li>
                    </ul>
                    <div class="tab-content">
                        <hr>
                        <div id="availablemfopap" class="tab-pane fade in active">
                            <h4><b>Assign MFO/PAP to Employees in the Department</b></h4>
                            <p style="font-size: 11px">Approved MFO/PAP can be assigned to personnel within or outside the department.</p>
                            <div class="row">
                                <br>
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
                                                <th align="center" style="text-align: center">DIVISION ACCOUNTABLE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-success btn-block saveBtnClass" id="btnSubmitAssignment">SUBMIT</button>
                                    <a class="btn btn-block btn-default" href="<?php echo base_url();?>strategicfunctions/approvemfopap">CANCEL</a>
                                </div>
                            </div>
                        </div>
                        <div id="pendingmfopap" class="tab-pane fade">
                            <h4><b>Pending MFO/PAP</b></h4>
                            <p style="font-size: 11px">Pending MFO/PAP requires approval first before it can be assigned to the personnel</p>
                            <div class="table-responsive">
                                <table id="tblpendingmfopap" class="display responsive compact" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr>
                                        <th>STRATEGIC OBJECTIVE</th>
                                        <th>CATEGORY</th>
                                        <th>MFO/PAP</th>
                                        <th>SUCCESS INDICATORS</th>
                                        <th>ALLOTTED BUDGET</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="specialtask" class="tab-pane fade">
                            <h4><b>View Pending Special Tasks</b></h4>
                            <p style="font-size: 11px">Special tasks must be approved by the personnel's respective department heads first before it appears in their IPCR.</p>
                            <div class="table-responsive">
                                <table id="tblspecialtask" class="display responsive compact" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr>
                                        <th>DATE REQUESTED</th>
                                        <th>STRATEGIC OBJECTIVE</th>
                                        <th>CATEGORY</th>
                                        <th>MFO/PAP</th>
                                        <th>SUCCESS INDICATORS</th>
                                        <th>ASSIGNED PERSONNEL</th>
                                        <th>DEPARTMENT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="approvespecialtask" class="tab-pane fade">
                            <h4><b>Approve Pending Special Tasks</b></h4>
                            <p style="font-size: 11px">Approve special task requests assigned by other departments to the personnel in your department before it appears in their IPCR</p>
                            <div class="table-responsive">
                                <table id="tblapprovespecialtask" class="display responsive compact" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr>
                                        <th>DATE REQUESTED</th>
                                        <th>BY</th>
                                        <th>STRATEGIC OBJECTIVE</th>
                                        <th>CATEGORY</th>
                                        <th>MFO/PAP</th>
                                        <th>SUCCESS INDICATORS</th>
                                        <th>ASSIGNED PERSONNEL</th>
                                        <th>Action</th>
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

<div class="modal fade " id="modaladdemployee" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body" >
                <legend>Assign MFO/PAP to Employee</legend>
                <p style="font-size: 11px;font-style: italic"><b>Note</b>: Adding employees from other departments will require approval from their respective department heads before the MFO/PAP reflects on their IPCR.</p>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="add_divid">
                        <input type="hidden" id="add_mfopapid">
                        <div class="form-group">
                            <label class="control-label">DESIGNATION</label>
                            <select class="form-control clearField" id="add_designation">
                                <option selected disabled>- Select Employee Designation -</option>
                                <option value="WITHIN">Within the Department</option>
                                <option value="OTHER">Other Departments</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">EMPLOYEE</label>
                            <select class="form-control clearField" id="add_employee">
                                <option selected disabled>- No Employee Available -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p id="add_empdetails" style="display: none">
                                <b>Name:</b>&nbsp;<span id="add_lblemployeename"></span><br>
                                <b>Department:</b>&nbsp;<span id="add_lblemployeedepartment"></span><br>
                                <b>Position:</b>&nbsp;<span id="add_lblemployeeposition"></span><br>
                                <b>Employment Type:</b>&nbsp;<span id="add_lblemploymenttype"></span><br>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12" align="right">
                        <hr>
                        <button id="btnAddEmployee" class="btn btn-success">Add Employee</button>
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


    $("#panel_managemfopap").addClass("selected_panel");

    $('#edit_budget').priceFormat({
        clearPrefix: true
    });
    $('#add_budget').priceFormat({
        clearPrefix: true
    });
    window.isUpdate = false;
    window.isUpdateApproval = false;
    loadData();
});

$("#li_availablemfopap").click(function(){
    window.isUpdate = false;
   loadData();
});
$("#li_pendingmfopap").click(function(){
   loadPendingMfoPap();
});

$("#li_specialtask").click(function(){
    loadSpecialTask();
});

$("#li_approvespecialtask").click(function(){
    loadApproveSpecialTask();
});

function loadData(){
    if(window.isUpdate == false){
        $('#loadingmodal').modal('show');
    }
    $("#tblmfopap").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No MFO/PAP(s) Available"
        },
        "ajax":{
            "url":"<?php  echo base_url(); ?>managemfopapmanagement/availablemfopap",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            "async": false,
            dataSrc: function(json){
                $('#loadingmodal').modal('hide');
                if(json.Code=="00"){
                    console.log(json.details);
                    return json.details;
                }else{
                    return 0;
                }
            }
        },
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
                var ret;
                if(data.employees == null){
                     ret = "<a class='btn btn-outline-info btn-block btn-sm' title='Add Employee' href='javascript:actionAddEmployee("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+">+ Add Employee</a><div class='divEmployees' align='center' id='divEmployees"+data.id+"'></div>";
                } else {
                    var employees = JSON.parse('['+data.employees+']');
                    var span = '';
                    for(var keys in employees){
                        span+= '<span class="addEmployees span'+employees[keys].username+'-'+data.id+'" ' +
                        'mfopap-id="'+data.id+'" ' +
                        'emp-username="'+employees[keys].username+'" ' +
                        'emp-name="'+employees[keys].name+'" ' +
                        'emp-position="'+employees[keys].currentposition+'" ' +
                        'emp-type="'+employees[keys].employmenttype+'" ' +
                        'emp-dept="'+employees[keys].department+'" ' +
                        'emp-designation="'+employees[keys].designation+'">' +
                        '<b style="color: red"><i class="fa fa-times-circle removeEmployee" sp-mfopapid="'+data.id+'" sp-del="span'+employees[keys].username+'"></i></b>&nbsp;' +
                        employees[keys].name+'<br>' +
                        employees[keys].currentposition+'<br>' +
                        '(' +employees[keys].employmenttype+')'+
                        '<hr style="margin-bottom: 2px;margin-top: 2px;"></span>';
                    }
                    ret = "<a class='btn btn-outline-info btn-block btn-sm' title='Add Employee' href='javascript:actionAddEmployee("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+">+ Add Employee</a><div class='divEmployees' align='center' id='divEmployees"+data.id+"'>"+span+"</div>";
                }
                return ret;
            }}
        ]
    });
}

function actionAddEmployee(data){
    $("#add_lblemployeename").text("");
    $("#add_lblemployeedepartment").text("");
    $("#add_lblemployeeposition").text("");
    $("#add_lblemploymenttype").text("");
    $("#add_empdetails").hide();
    $("#add_designation").prop('selectedIndex',0);
    $("#add_employee").empty();
    $("#add_employee").append('<option selected disabled>- No Employee Available -</option>');
    $("#add_divid").val("divEmployees"+data.id);
    $("#add_mfopapid").val(data.id);
    $("#modaladdemployee").modal("show");
}

$("#add_designation").change(function(){
    $.ajax({
        url: "<?php echo base_url();?>managemfopapmanagement/employees",
        type: "POST",
        dataType: "json",
        data: {
            "DESIGNATION":$(this).val()
        },
        success: function(result){
            var employee = $("#add_employee");
            employee.empty();
            if(result.Code == "00"){
                employee.append('<option selected disabled>- Select Employee -</option>');
                for(var keys in result.details){
                    employee.append('<option department="'+result.details[keys].department+'" position="'+result.details[keys].currentposition+'"  empname="'+result.details[keys].name+'" emptype="'+result.details[keys].employmenttype+'" value="'+result.details[keys].username+'" >'+result.details[keys].name+'</option>');
                }
            } else {
                employee.append('<option selected disabled>- No Employee Available -</option>');
            }
        },
        error: function(e){
            console.log(e);
            $("#loadingmodal").modal("hide");

        }
    });
});

$("#add_employee").change(function(){
   $("#add_lblemployeename").text($("#add_employee option:selected").attr("empname"));
   $("#add_lblemployeedepartment").text($("#add_employee option:selected").attr("department"));
   $("#add_lblemployeeposition").text($("#add_employee option:selected").attr("position"));
   $("#add_lblemploymenttype").text($("#add_employee option:selected").attr("emptype"));

    $("#add_empdetails").show();
});

$("#btnAddEmployee").click(function(){
    var div = $("#"+$("#add_divid").val());
    var emp = '<span class="addEmployees span'+$("#add_employee option:selected").val()+'-'+$("#add_mfopapid").val()+'" ' +
        'mfopap-id="'+$("#add_mfopapid").val()+'" ' +
        'emp-username="'+$("#add_employee option:selected").val()+'" ' +
        'emp-name="'+$("#add_employee option:selected").attr("empname")+'" ' +
        'emp-position="'+$("#add_employee option:selected").attr("position")+'" ' +
        'emp-type="'+$("#add_employee option:selected").attr("emptype")+'" ' +
        'emp-dept="'+$("#add_employee option:selected").attr("department")+'" ' +
        'emp-designation="'+$("#add_designation option:selected").val()+'">' +
        '<b style="color: red"><i class="fa fa-times-circle removeEmployee" sp-mfopapid="'+$("#add_mfopapid").val()+'" sp-del="span'+$("#add_employee option:selected").val()+'"></i></b>&nbsp;' +
        $("#add_employee option:selected").attr("empname")+'<br>' +
        $("#add_employee option:selected").attr("position")+'<br>' +
        '(' +$("#add_employee option:selected").attr("emptype")+')'+
        '<hr style="margin-bottom: 2px;margin-top: 2px;"></span>';

    div.prepend(emp);
    $("#modaladdemployee").modal("hide");
});

$(document).on('click','.removeEmployee',function(){
   var span = $(this).attr("sp-del");
    var mfopapid = $(this).attr("sp-mfopapid");
    $("."+span+"-"+mfopapid).remove();
});


$("#btnSubmitAssignment").click(function(){
    var arrDt = [];
    $(".addEmployees").each(function(){
        arrDt.push({
            username: $(this).attr("emp-username"),
            department: $(this).attr("emp-dept"),
            designation: $(this).attr("emp-designation"),
            mfopapid:$(this).attr("mfopap-id")
        });
    });
    if(arrDt.length<=0) {
        messageDialogModal("Server Message","No Employee Assigned to MFO/PAP");
    } else {
        $('#loadingmodal').modal('show');
        $.ajax({
            url: "<?php echo base_url();?>managemfopapmanagement/assignemployees",
            type: "POST",
            dataType: "json",
            data: {
                "EMPLOYEES":arrDt
            },
            success: function(data){
                $('#loadingmodal').modal('hide');
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                    window.isUpdate = true;
                    loadData();
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



//FOR PENDING MFO/PAP:
function loadPendingMfoPap(){
    $('#loadingmodal').modal('show');
    $("#tblpendingmfopap").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Pending MFO/PAP(s) Available"
        },
        "ajax":{
            "url":"<?php  echo base_url(); ?>managemfopapmanagement/pendingmfopap",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            "async": false,
            dataSrc: function(json){
                $('#loadingmodal').modal('hide');
                if(json.Code=="00"){
                    console.log(json.details);
                    return json.details;
                }else{
                    return 0;
                }
            }
        },
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
            }}
        ]
    });


}

function loadSpecialTask(){
    $('#loadingmodal').modal('show');
    $("#tblspecialtask").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Pending Special Task(s) Available"
        },
        "ajax":{
            "url":"<?php  echo base_url(); ?>managemfopapmanagement/pendingspecialtask",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            "async": false,
            dataSrc: function(json){
                $('#loadingmodal').modal('hide');
                if(json.Code=="00"){
                    console.log(json.details);
                    return json.details;
                }else{
                    return 0;
                }
            }
        },
        "columns":[
            {"data":"dateassigned"},
            {"data":"strategicobjective"},
            {"data":"category"},
            {"data":function(data){
                return atob(data.mfopap);
            }},
            {"data":function(data){
                return atob(data.successindicator);
            }},
            {"data":"name"},
            {"data":"department"}

        ]
    });
}

function loadApproveSpecialTask(){
    if(window.isUpdateApproval == false){
        $('#loadingmodal').modal('show');
    }
    $("#tblapprovespecialtask").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Special Task(s) Available"
        },
        "ajax":{
            "url":"<?php  echo base_url(); ?>managemfopapmanagement/approvalspecialtask",
            "data" : {},
            "type" : "POST",
            "dataType" : "json",
            "async": false,
            dataSrc: function(json){
                $('#loadingmodal').modal('hide');
                if(json.Code=="00"){
                    console.log(json.details);
                    return json.details;
                }else{
                    return 0;
                }
            }
        },
        "columns":[
            {"data":function(data){
                return moment(data.dateassigned).format("MMM DD YYYY hh:mm A");
            }},
            {"data":"assigned"},
            {"data":"strategicobjective"},
            {"data":"category"},
            {"data":function(data){
                return atob(data.mfopap);
            }},
            {"data":function(data){
                return atob(data.successindicator);
            }},
            {"data":"name"},
            {"data":function(data){
                return "<a class='btn btn-success btn-sm' title='Approve Special Task' href='javascript:actionApprove("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-check'></i></a> | <a class='btn btn-primary btn-sm' title='Reject Special Task' href='javascript:actionReject("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-times'></i></a>";
            }}
        ]
    });
}

function actionApprove(data){
    $('#loadingmodal').modal('show');

    $.ajax({
        url:"<?php  echo base_url(); ?>managemfopapmanagement/approvespecialtask",
        type:"POST",
        dataType: "json",
        data: {
            "ROWID":data.id,
            "DEPARTMENT":data.department
        },
        success: function(result){
            $('#loadingmodal').modal('hide');
            if(result.Code=="00"){
                messageDialogModal("Server Message",result.Message);
                window.isUpdateApproval = true;
                loadApproveSpecialTask();
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


function actionReject(data){
    $('#loadingmodal').modal('show');

    $.ajax({
        url:"<?php  echo base_url(); ?>managemfopapmanagement/rejectspecialtask",
        type:"POST",
        dataType: "json",
        data: {
            "ROWID":data.id,
            "DEPARTMENT":data.department
        },
        success: function(result){
            $('#loadingmodal').modal('hide');
            if(result.Code=="00"){
                messageDialogModal("Server Message",result.Message);
                window.isUpdateApproval = true;
                loadApproveSpecialTask();
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