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
                    <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Transaction Menu</h4>
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
                <div class="panel" align="center" id="panel_requestpersonnel">
                    <a href="<?php echo base_url();?>transaction/requestpersonnel" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="40px">
                        <br>
                        Request Personnel
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_examination">
                    <a  href="<?php echo base_url();?>transaction/examinationmenu" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="40px">
                        <br>
                        Examination
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_backgroundinvestigation">
                    <a  href="<?php echo base_url();?>transaction/backgroundinvestigation" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation.png" height="40px">
                        <br>
                        Background Investigation
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_boarding">
                    <a  href="<?php echo base_url();?>transaction/boarding" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/boarding.png" height="40px">
                        <br>
                        Boarding
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
                    <legend>Request for New Personnel</legend>
                    <div class="form-group col-md-12">
                        <label id="lblreqnum" class="control-label" style="font-weight: bold">Request Number: <span id="requestnumber"></span></label>
                    </div>

                        <div class="row">
                            <div class="form-group col-md-12" id="divRequestNumber" style="display: none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="positionTitle" class="col-lg-2 control-label">Request Number</label>
                                        <div class="col-lg-10">
                                            <select class="form-control clearField" id="dropdownrequest">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="positionTitle" class="col-lg-2 control-label">Position</label>
                                <div class="col-lg-10">
                                    <select class="form-control clearField analyticsField" id="position">
                                    </select>
                                    <p id="positiondesc">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="positionTitle" class="col-lg-2 control-label">Department</label>
                                <div class="col-lg-10">
                                    <select class="form-control clearField analyticsField" id="department">
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                       <div class="col-md-10">
                           <br>
                           <div class="form-group col-md-6">
                               <label class="control-label">BASIC QUALIFICATION</label>
                               <div class="well">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Experience</label>
                                               <div class="input-group">
                                                   <input class="form-control clearField analyticsField" id="experience" type="number" placeholder="Work Experience..">
                                                   <span class="input-group-addon">Year(s) of Experience</span>
                                               </div>

                                           </div>
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Training</label>
                                               <div class="input-group">
                                                   <input class="form-control clearField analyticsField" id="training" type="number" placeholder="Training..">
                                                   <span class="input-group-addon">Hour(s) of Training</span>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Civil Service Eligibility&nbsp;<a href="http://www.officialgazette.gov.ph/services/civil-service-eligibility/eligibilities-granted-under-special-laws-and-csc-issuances/" target="_blank"><i class="fa fa-lg fa-question-circle" aria-hidden="true"></i></a></label>
                                               <select class="form-control clearField analyticsField" id="eligibility">
                                                   <option selected disabled>- Select Option -</option>
                                                   <option value="YES">YES</option>
                                                   <option value="NO">NO</option>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Minimum Educational Background</label>
                                               <input class="form-control clearField analyticsField" type="text" placeholder="Minimum Educational Background.." id="education" readonly>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group col-md-6">
                               <label class="control-label">POSITION DETAILS</label>
                               <div class="well" style="min-height: 298px !important;height: auto">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Group Position</label>
                                               <input class="form-control clearField" type="text" placeholder="Group Position.." id="groupposition" readonly>
                                               <p id="groupdesc"></p>
                                           </div>
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Salary Grade</label>
                                               <input class="form-control clearField" type="text" placeholder="Salary Grade.." id="salarygrade" readonly>
                                           </div>
                                           <div class="form-group">
                                               <label for="positionTitle" class="control-label">Salary Equivalent</label>
                                               <input class="form-control clearField" type="text" placeholder="Salary Equivalent.." id="salaryequivalent" readonly>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group col-md-12">
                               <label class="control-label">SKILLS</label>
                               <div class="well" style="min-height: 206px;">
                                   <ul id="skillset">

                                   </ul>
                               </div>
                           </div>
                       </div>
                        <div class="col-lg-2">
                            <br>
                            <br>
                            <br>
                            <button class="btn btn-default btn-block" id="btnAdd">ADD</button>
                            <button class="btn btn-danger btn-block" id="btnEdit">EDIT</button>
                            <button class="btn btn-primary btn-block" id="btnDelete">DELETE</button>
                            <button class="btn btn-success btn-block" id="btnSave">SAVE</button>
                            <button class="btn btn-warning btn-block" id="btnQualified">Qualified Employees</button>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-12" style="display: none" id="divAnalytics">
                    <div class="col-md-12" align="center">
                        <h3 style="color: #0d913e"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Qualified Employees <b>Analytics</b></h3>
                        <hr>
                    </div>
                    <div class="col-md-12" align="center">
                        <h4 style="text-align: left">Count of Department by <b>EDUCATIONAL ATTAINMENT</b></h4>
                        <div id="bar_educational" style="border: 1px solid #ccc"></div>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-6" align="center">
                        <h4 style="text-align: left">Count of Department by <b>POSITION</b></h4>
                        <div id="bar_position" style="border: 1px solid #ccc"></div>
                    </div>
                    <div class="col-md-6" align="center">
                        <h4 style="text-align: left"><b>Departments With Qualified Employees</b></h4>
                        <div id="bar_department" style="border: 1px solid #ccc"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalSentRequest" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request Sent</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <p>Your request has been sent to HR Manager<br>Your Request Code is: <b id="reqNum"></b>
                        <br>
                            Notification will be sent once it is APPROVED
                        </p>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalDeleteRequest" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                <input type="hidden" id="deleterowid">
                <div class="form-group">
                    <p>Continue to delete this Request?<br><span style="font-weight: bold" id="deletereqnum"></span></p>
                </div>

                <div style="text-align: right">
                    <button type="button" class="btn btn-primary" id="btnProceedDelete">DELETE</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelDelete();">CANCEL</button>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="<?php echo $GLOBALS['googlecharts'];?>"></script>
<script type="application/javascript">
    $(document).ready(function(){
        window.arrPosition = [];
        window.arrRequest = [];
        window.btnClicked = '';
        $("#nav_recruitment_transaction").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
        $("#divAnalytics").hide();

        $("#panel_requestpersonnel").addClass("selected_panel");
        getRequestNumber();
        loadPositions();

        $("#btnAdd").prop("disabled",false);
        $("#btnSave").prop("disabled",true);
        $("#btnEdit").prop("disabled",false);
        $("#btnDelete").prop("disabled",false);
        $("#btnQualified").prop("disabled",true);
    });

    function getRequestNumber(){
        $.ajax({
            url: "<?php echo base_url();?>personnelrequestmanagement/getrequestnumber",
            type: "POST",
            dataType: "json",
            success: function(data){
                console.log(data);
                if(data.Code == "00"){
                    for(var keys in data.details){
                        $("#requestnumber").text(moment().format("YYYY")+"-"+data.details[keys].reqnumber);
                    }
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    function loadPositions(){
        $("#loadingmodal").modal("show");
        var select = $("#position");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>positionmanagement/getpositions",
            type: "POST",
            dataType: "json",
            success: function(data){
                if(data.Code == "00"){
                    window.arrPosition = data.details;
                    select.append("<option selected disabled>- Select Position -</option>");
                    for(var keys in data.details){
                        select.append("<option positioncode-code='"+data.details[keys].positioncode+"' rowid='"+data.details[keys].id+"' value='"+data.details[keys].id+"'>"+data.details[keys].name+"</option>");
                    }
                } else {
                    select.append("<option selected disabled>- No Position(s) Available -</option>");
                }

                loadDepartments();
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- No Position(s) Available -</option>");
                console.log(e);
            }
        });
    }

    function loadDepartments(){
        var select = $("#department");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>departmentmanagement/displaydepartments",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append("<option selected disabled>- Select Department -</option>");
                    for(var keys in result.details){
                        var option = '<option deptid="'+result.details[keys].id+'" desc="'+result.details[keys].description+'" value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>';
                        select.append(option);
                    }
                    select.val("<?php echo $this->session->userdata('department')?>");
                    if(select.val() == "<?php echo $this->session->userdata('department')?>"){
                        select.prop("disabled",false);
                    } else {
                        select.prop("disabled",false);

                    }
                } else {
                    select.append("<option selected disabled>- No Department(s) Available -</option>");
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#position").change(function(){
        var rowid =  $("#position option:selected").attr("rowid");
        var arr = window.arrPosition;
        var ul = $("#skillset");
        ul.empty();
        for(var keys in arr){
            if(arr[keys].id == rowid){
                console.log(arr[keys]);
                $("#positiondesc").text(atob(arr[keys].description));
                $("#groupposition").val(arr[keys].groupposition);
                $("#groupdesc").text(atob(arr[keys].groupdesc));
                $("#salarygrade").val(arr[keys].salarygrade);
                $("#salaryequivalent").val(arr[keys].salaryequivalent);
                $("#education").val(arr[keys].mineducbackground);

                var skills = JSON.parse(atob(arr[keys].cbiskills));
                for(var i=0;i<skills.length;i++){

                    var li = '<li class="skillItem" id="'+skills[i].skillid+'"><span skillsetid="'+skills[i].skillid+'" class="skillsetitem">'+skills[i].desc+'</span></li>';
                    ul.append(li);
                }
            }
        }
    });


    $("#btnAdd").click(function(){
        if(!validate()){
            return;
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
               url: "<?php echo base_url();?>personnelrequestmanagement/newrequest",
                type: "POST",
                dataType:"json",
                data: {
                    "REQUESTNUMBER":$("#requestnumber").text(),
                    "POSITIONID":$("#position option:selected").attr("rowid"),
                    "POSITIONCODE":$("#position option:selected").attr("positioncode-code"),
                    "DEPARTMENTID":$("#department option:selected").attr("deptid"),
                    "DEPARTMENT":$("#department option:selected").val(),
                    "EXPERIENCE":$("#experience").val(),
                    "TRAINING":$("#training").val(),
                    "ELIGIBILITY":$("#eligibility option:selected").val()
                },
                success:function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        $("#reqNum").text($("#requestnumber").text());
                        $("#modalSentRequest").modal("show");
                        clearField();
                        $("#groupdesc").text("");
                        $("#positiondesc").text("");
                        $("#skillset").empty();
                        $("#divAnalytics").hide();
                        $("#btnQualified").prop("disabled",true);
                        getRequestNumber();
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
        if($("#position option:selected").val() == "- Select Position -" || $("#position option:selected").val() == null){
            messageDialogModal("Required","Please Select Position");
            return false;
        }
        if($("#department option:selected").val() == "- Select Department -" || $("#department option:selected").val() == null){
            messageDialogModal("Required","Please Select Department");
            return false;
        }

        if($("#experience").val() == "" || $("#experience").val() == null){
            messageDialogModal("Required","Please Enter Work Experience");
            return false;
        }

        if($("#training").val() == "" || $("#training").val() == null){
            messageDialogModal("Required","Please Enter Training");
            return false;
        }

        if($("#eligibility").val() == "" || $("#eligibility").val() == null){
            messageDialogModal("Required","Please Enter Civil Service Eligibility");
            return false;
        }

        return true;
    }



    //for edit request
    $("#btnEdit").click(function(){
        window.btnClicked = "EDIT";
        $("#lblreqnum").hide();
        var select = $("#dropdownrequest");
        select.empty();
        $("#divRequestNumber").show();
        $("#loadingmodal").modal("show");
        $("#position").prop("disabled",true);
        $("#department").prop("disabled",true);

        clearField();
        $("#groupdesc").text("");
        $("#positiondesc").text("");
        $("#skillset").empty();
        $.ajax({
            url: "<?php echo base_url();?>personnelrequestmanagement/getrequests",
            type: "POST",
            dataType: "json",
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    window.arrRequest = data.details;
                    select.append("<option selected disabled>- Select Request Number -</option>");
                    for(var keys in data.details){
                        select.append("<option value='"+data.details[keys].requestnumber+"' rowid='"+data.details[keys].id+"' dept-name='"+data.details[keys].department+"' position-id='"+data.details[keys].positionid+"'>"+data.details[keys].requestnumber+"</option>");
                    }
                    messageDialogModal("Server Message","Select Request Number to Edit");

                    $("#btnAdd").prop("disabled",true);
                    $("#btnSave").prop("disabled",false);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",true);
                } else {
                    select.append("<option selected disabled>- No Request(s) Available -</option>");
                }

                loadDepartments();
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- No Request(s) Available -</option>");
                console.log(e);
            }
        });
    });

    $("#dropdownrequest").change(function(){
        var pos = $("#dropdownrequest option:selected").attr("position-id");
        var rowid = $("#dropdownrequest option:selected").attr("rowid");
        var reqnum = $("#dropdownrequest option:selected").val();

        console.log(pos);
        var dept = $("#dropdownrequest option:selected").attr("dept-name");
        $('#position').val(pos).change();
        $('#department').val(dept).change();

        var arr = window.arrRequest;
        for(var keys in arr){
            if(arr[keys].id == rowid){
                $("#experience").val(arr[keys].experience);
                $("#training").val(arr[keys].training);
                $("#eligibility").val(arr[keys].eligibility);
            }
        }

        $("#position").prop("disabled",false);
        $("#department").prop("disabled",false);
        if(window.btnClicked == "DELETE"){
            $("#deleterowid").val(rowid);
            $("#deletereqnum").text(reqnum);

            $("#modalDeleteRequest").modal("show");
        }

    });

    $("#btnSave").click(function(){
        if(!validateEdit()){
            return;
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>personnelrequestmanagement/updaterequest",
                type: "POST",
                dataType:"json",
                data: {
                    "REQUESTNUMBER":$("#dropdownrequest option:selected").val(),
                    "POSITIONID":$("#position option:selected").attr("rowid"),
                    "POSITIONCODE":$("#position option:selected").attr("positioncode-code"),
                    "DEPARTMENTID":$("#department option:selected").attr("deptid"),
                    "DEPARTMENT":$("#department option:selected").val(),
                    "EXPERIENCE":$("#experience").val(),
                    "TRAINING":$("#training").val(),
                    "ELIGIBILITY":$("#eligibility").val()
                },
                success:function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        window.btnClicked = "";
                        clearField();
                        $("#groupdesc").text("");
                        $("#positiondesc").text("");
                        $("#skillset").empty();
                        $("#divRequestNumber").hide();
                        $("#lblreqnum").show();
                        getRequestNumber();
                        messageDialogModal("Server Message",result.Message);

                        $("#btnAdd").prop("disabled",false);
                        $("#btnSave").prop("disabled",true);
                        $("#btnEdit").prop("disabled",false);
                        $("#btnDelete").prop("disabled",false);
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

function validateEdit(){
    if($("#experience").val() == "" || $("#experience").val() == null){
        messageDialogModal("Required","Please Enter Work Experience");
        return false;
    }

    if($("#training").val() == "" || $("#training").val() == null){
        messageDialogModal("Required","Please Enter Training");
        return false;
    }

    if($("#eligibility").val() == "" || $("#eligibility").val() == null){
        messageDialogModal("Required","Please Enter Civil Service Eligibility");
        return false;
    }
    return true;
}


//for delete
$("#btnDelete").click(function(){
    window.btnClicked = "DELETE";
    $("#lblreqnum").hide();
    var select = $("#dropdownrequest");
    select.empty();
    $("#divRequestNumber").show();
    $("#loadingmodal").modal("show");
    $("#position").prop("disabled",true);
    $("#department").prop("disabled",true);

    clearField();
    $("#groupdesc").text("");
    $("#positiondesc").text("");
    $("#skillset").empty();
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/getrequests",
        type: "POST",
        dataType: "json",
        success: function(data){
            $("#loadingmodal").modal("hide");
            if(data.Code == "00"){
                window.arrRequest = data.details;
                select.append("<option selected disabled>- Select Request Number -</option>");
                for(var keys in data.details){
                    select.append("<option value='"+data.details[keys].requestnumber+"' rowid='"+data.details[keys].id+"' dept-name='"+data.details[keys].department+"' position-id='"+data.details[keys].positionid+"'>"+data.details[keys].requestnumber+"</option>");
                }
                messageDialogModal("Server Message","Select Request Number to Delete");
                $("#btnAdd").prop("disabled",true);
                $("#btnSave").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnDelete").prop("disabled",false);
            } else {
                select.append("<option selected disabled>- No Request(s) Available -</option>");
            }

            loadDepartments();
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append("<option selected disabled>- No Request(s) Available -</option>");
            console.log(e);
        }
    });
});

    $("#btnProceedDelete").click(function(){
        $("#loadingmodal").modal("show");
        $("#modalDeleteRequest").modal("hide");
        $.ajax({
            url: "<?php echo base_url();?>personnelrequestmanagement/deleterequest",
            type: "POST",
            dataType:"json",
            data: {
                "ROWID":$("#deleterowid").val()
            },
            success:function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    window.btnClicked = "";
                    clearField();
                    $("#groupdesc").text("");
                    $("#positiondesc").text("");
                    $("#skillset").empty();
                    $("#divRequestNumber").hide();
                    $("#lblreqnum").show();
                    getRequestNumber();
                    messageDialogModal("Server Message",result.Message);
                    $("#btnAdd").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",false);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });


function cancelDelete(){
    clearField();
    $("#groupdesc").text("");
    $("#positiondesc").text("");
    $("#skillset").empty();
    $("#dropdownrequest").prop("selectedIndex",0);
}


    //FOR QUALIFIED EMPLOYEES ANALYTICS:
$(".analyticsField").on('keyup keypress blur change',function(){
   if(areFieldsComplete()){
        $("#btnQualified").prop("disabled",false);
   } else {
       $("#btnQualified").prop("disabled",true);
   }
});

function areFieldsComplete(){
    var ret = true;
    $(".analyticsField").each(function(){
       if($(this).val() == "" || $(this).val() == null || $(this).val() == "- Select Position -" || $(this).val() == "- Select Department -" || $(this).val() == "- Select Option -"){
           ret = false;
       }
    });

    return ret;
}

$("#btnQualified").click(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/savetemporary",
        type: "POST",
        dataType:"json",
        data: {
            "REQUESTNUMBER":$("#requestnumber").text(),
            "POSITIONID":$("#position option:selected").attr("rowid"),
            "POSITIONCODE":$("#position option:selected").attr("positioncode-code"),
            "DEPARTMENTID":$("#department option:selected").attr("deptid"),
            "DEPARTMENT":$("#department option:selected").val(),
            "EXPERIENCE":$("#experience").val(),
            "TRAINING":$("#training").val(),
            "ELIGIBILITY":$("#eligibility option:selected").val()
        },
        success:function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                console.log(result);
                generateCharts(result.educational,result.position,result.department);
            } else if(result.Code == "07"){
                $("#divAnalytics").hide();
                messageDialogModal("Server Message","NO EMPLOYEE IS QUALIFIED FOR THE POSITION REQUEST BEING CREATED");
            } else {
                $("#divAnalytics").hide();
                messageDialogModal("Server Message","NO EMPLOYEE IS QUALIFIED FOR THE POSITION REQUEST BEING CREATED");
            }
        },
        error: function(e){
            console.log(e);
        }
    });

    function generateCharts(educ,pos,dept){

        var educdata =[], posdata=[],deptdata=[];

        for(var keys in educ){
            var temp = [];
            temp.push(educ[keys].highesteduc);
            temp.push(parseInt(educ[keys].count));
            educdata.push(temp);
        }
        for(var keys in pos){
            var temp = [];
            temp.push(pos[keys].currentposition);
            temp.push(parseInt(pos[keys].count));
            posdata.push(temp);
        }
        for(var keys in dept){
            var temp = [];
            temp.push(dept[keys].currentdepartment);
            temp.push(parseInt(dept[keys].count));
            deptdata.push(temp);
        }

        window.educdata = educdata;
        window.posdata = posdata;
        window.deptdata = deptdata;
        console.log("calling create chart fxn..");
        setTimeout(createCharts(),3000);
    }


    function createCharts(){
        console.log("start creating charts..");
        var educdata = window.educdata;
        var posdata = window.posdata;
        var deptdata = window.deptdata;

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Educational Attainment');
            data.addColumn('number', 'No. of Qualified');
            data.addRows(educdata);

            var barchart_options_educ = {
                chartArea: {
                    width: '65%',
                    right: 50
                },
                colors: ['#2196F3'],
                hAxis: {
                    title: '',
                    minValue: 0,
                    format: ' '
                },
                legend: 'none',
                backgroundColor: { fill:'transparent' },
                bar: {groupWidth: '95%'}
            };
            var barchart_educ = new google.visualization.BarChart(document.getElementById('bar_educational'));
            barchart_educ.draw(data, barchart_options_educ);


            var datapos = new google.visualization.DataTable();
            datapos.addColumn('string', 'Position');
            datapos.addColumn('number', 'No. of Qualified');
            datapos.addRows(posdata);

            var barchart_options_pos = {
                chartArea: {
                    right: 50
                },
                colors: ['#00C853'],
                hAxis: {
                    title: '',
                    minValue: 0,
                    format: ' '
                },
                backgroundColor: { fill:'transparent' },
                legend: 'none',
                bar: {groupWidth: '95%'}};
            var barchart_pos = new google.visualization.ColumnChart(document.getElementById('bar_position'));
            barchart_pos.draw(datapos, barchart_options_pos);


            var datadept = new google.visualization.DataTable();
            datadept.addColumn('string', 'Department');
            datadept.addColumn('number', 'No. of Qualified');
            datadept.addRows(deptdata);

            var piechart_options = {
                backgroundColor: { fill:'transparent' },
                is3D: true
            };
            var piechart = new google.visualization.PieChart(document.getElementById('bar_department'));
            piechart.draw(datadept, piechart_options);
        }

        $("#divAnalytics").show();
    }
});
</script>