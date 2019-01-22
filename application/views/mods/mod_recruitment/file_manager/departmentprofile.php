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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>File Maintenance Menu</h4>
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
                <div class="panel" align="center" id="panel_competencyindex">
                    <a href="<?php echo base_url();?>filemanager/competencyindex" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Competency Index<br> Profile
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_personaldatasheet">
                    <a  href="<?php echo base_url();?>filemanager/personaldatasheet" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Personal Data Sheet
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_positionprofile">
                    <a  href="<?php echo base_url();?>filemanager/positionprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/position_profile.png" height="40px">
                        <br>
                        Position Profile
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_departmentprofile">
                    <a  href="<?php echo base_url();?>filemanager/departmentprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/department_profile.png" height="40px">
                        <br>
                        Department Profile
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
                    <legend>Department Profile</legend>
                    <div class="form-group col-lg-10">
                        <label for="departmentTitle" class="col-lg-2 control-label">Department</label>
                        <div class="col-lg-10">
                            <select class="form-control clearField" id="dropdownDepartment">
                                <option selected disabled>- Select Department -</option>
                            </select>
                            <input style="display: none" type="text" id="editDepartment" class="form-control clearField" placeholder="Enter Department Name" required="">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <label class="col-lg-2 control-label">Description:</label>
                        <div class="col-lg-10">
                            <textarea disabled rows="6" style="resize: none" id="editDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <button class="btn btn-default btn-block addBtnClass" id="btnAdd" data-toggle="modal" data-target="#addDepartmentModal">ADD</button>
                        <button class="btn btn-danger btn-block editBtnClass" id="btnEdit">EDIT</button>
                        <button class="btn btn-primary btn-block deleteBtnClass" id="btnDelete">DELETE</button>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnSave">SAVE</button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addDepartmentModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Add New Department</legend>
                <div>
                    <div class="form-group">
                        <label class="control-label">Department:<span style="color:red;font-weight: bold">*</span></label>
                        <input type="text" id="inputDepartment" class="form-control clearField" placeholder="Enter Department Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description:<span style="color:red;font-weight: bold">*</span></label>
                        <textarea rows="3" style="resize: none" id="departmentDescription" class="form-control clearField" placeholder="Enter Department Description" required=""></textarea>
                    </div>
                    <div style="text-align: right">
                        <br>
                        <button type="button" class="btn btn-success" id="btnSubmitNewDepartment">ADD</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteDepartmentModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                <div>
                    <div class="form-group">
                        <label class="control-label">Are you sure you want to delete this department?</label>
                    </div>
                    <div style="text-align: right">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnDeleteDepartment">DELETE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_filemanager").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_departmentprofile").addClass("selected_panel");
        $(".saveBtnClass").prop("disabled",true);
        window.isUpdate = false;
        loadDepartments();
    });

    $("#btnEdit").click(function(){
        if($("#dropdownDepartment option:selected").val() == "- Select Department -"){
            messageDialogModal("Required","Select Department to Edit");
        } else {
            $("#dropdownDepartment").hide();
            $("#editDepartment").show();
            $("#editDescription").prop("disabled",false);
            $(".saveBtnClass").prop("disabled",false);
            $(".deleteBtnClass").prop("disabled",true);
        }
    });

    $("#btnDelete").click(function(){
        if($("#dropdownDepartment option:selected").val() == "- Select Department -"){
            messageDialogModal("Required","Select Department to Delete");
        } else {
            $("#deleteDepartmentModal").modal("show");
        }
    });

    $("#btnDeleteDepartment").click(function(){
        $("#deleteDepartmentModal").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>departmentmanagement/deletedepartment",
            type:"POST",
            dataType:"json",
            data: {
                "ROWID":$("#dropdownDepartment option:selected").attr("deptid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    window.isUpdate = true;
                    loadDepartments();
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
        if($("#editDepartment").val() == "" || $("#editDepartment").val() == null){
            messageDialogModal("Required","Please Enter Department Name");
        } else if($("#editDescription").val() == "" || $("#editDescription").val() == null){
            messageDialogModal("Required","Please Enter Department Description");
        } else {
            $("#loadingmodal").modal("show");
            $.ajax({
               url: "<?php echo base_url();?>departmentmanagement/updatedepartment",
                type:"POST",
                dataType:"json",
                data: {
                    "ROWID":$("#dropdownDepartment option:selected").attr("deptid"),
                    "DEPARTMENT": $("#editDepartment").val(),
                    "DESCRIPTION": $("#editDescription").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        clearField();
                        $("#editDepartment").hide();
                        $("#dropdownDepartment").show();
                        window.isUpdate = true;
                        loadDepartments();
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

    $("#btnSubmitNewDepartment").click(function(){
       if(!validate()){
           return;
       } else {
           $("#addDepartmentModal").modal("hide");
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>departmentmanagement/newdepartment",
               type:"POST",
               dataType:"json",
               data: {
                   "DEPARTMENT": $("#inputDepartment").val(),
                   "DESCRIPTION": $("#departmentDescription").val()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       clearField();
                       $("#editDepartment").hide();
                       $("#dropdownDepartment").show();
                       window.isUpdate = true;
                       loadDepartments();
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
        if($("#inputDepartment").val() == "" || $("#inputDepartment").val() == null){
            messageDialogModal("Required","Please Enter Department Name");
            return false;
        }
        if($("#departmentDescription").val() == "" || $("#departmentDescription").val() == null){
            messageDialogModal("Required","Please Enter Department Description");
            return false;
        }
        return true;
    }

    function loadDepartments(){
        var select = $("#dropdownDepartment");
        select.empty();
        select.append("<option selected disabled>- Select Department -</option>");
        if(window.isUpdate == false){
            $("#loadingmodal").modal("show");
        }
        $.ajax({
            url: "<?php echo base_url();?>departmentmanagement/displaydepartments",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");

                if(result.Code == "00"){
                    for(var keys in result.details){
                        var option = '<option deptid="'+result.details[keys].id+'" desc="'+result.details[keys].description+'" value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>';
                        select.append(option);
                    }
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#dropdownDepartment").change(function(){
      $("#editDescription").val($("#dropdownDepartment option:selected").attr("desc"));
      $("#editDepartment").val($(this).val());
        console.log($(this).val());
    });
</script>