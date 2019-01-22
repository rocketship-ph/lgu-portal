<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>User Management</h3>
                    <h4><i class="fa fa-angle-right"></i>&nbsp;Create User Account</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <br>
                        <div class="col-md-6" style="height: 64.5px;">
                            <div class="form-group">
                                <label class="control-label">USER LEVEL: <span class="req">*</span></label>
                                <select class="form-control clearField" id="userlevel" required="">
                                    <option selected disabled>- Select User Level -</option>
                                    <option value="MUNICIPALHEAD" name="MHEAD">Municipal Head</option>
                                    <option value="DEPARTMENTHEAD" name="DHEAD">Department Head</option>
                                    <option value="HRMANAGER" name="HRMGR">HR Manager</option>
                                    <option value="HRDSTAFF" name="HRDS">HRD Staff</option>
                                    <option value="ITADMIN" name="ITADMIN">IT Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="height: 64.5px;display: none" id="divDepartment">
                            <div class="form-group">
                                <label class="control-label">DEPARTMENT: <span class="req">*</span></label>
                                <select class="form-control clearField" id="department" required="">
                                    <option selected disabled>- Select Department -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">ID NUMBER: <span class="req">*</span></label>
                                <input class="form-control clearField" id="idnumber" placeholder="Employee ID Number" required="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">FIRST NAME: <span class="req">*</span></label>
                                <input class="form-control clearField" id="firstname" placeholder="First Name" required="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">MIDDLE NAME: <span class="req">*</span></label>
                                <input class="form-control clearField" id="middlename" placeholder="Middle Name" required="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">LAST NAME: <span class="req">*</span></label>
                                <input class="form-control clearField" id="lastname" placeholder="Last Name" required="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6" style="height: 64.5px;">
                            <div class="form-group">
                                <label class="control-label">GENDER: <span class="req">*</span></label>
                                <select class="form-control clearField" id="gender" required="">
                                    <option selected disabled>- Select Gender -</option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">BIRTHDAY: <span class="req">*</span></label>
                                <input class="form-control clearField" id="birthday" placeholder="MM-DD-YYYY" required="" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">CONTACT NUMBER: <span class="req">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon">+63</span>
                                    <input class="form-control clearField" maxlength="10" oninput="maxLengthCheck(this)" id="msisdn" placeholder="xxxxxxxxxx" required="" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">ADDRESS: <span class="req">*</span></label>
                                <input class="form-control clearField" id="address" placeholder="Unit No., Lot No., Brgy., Municipality/City, Province, Country" required="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" align="right">
                        <div class="form-group" align="center">
                            <table>
                                <tr>
                                    <td>
                                        <label class="control-label">User Image (max 2MB):</label>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>
                                        <img id="imgPrev" src="<?php echo base_url();?>uploads/img_placeholder.jpg" style="height:150px; width:150px;border:2px solid #555555;border-radius: 3px">
                                        <br>
                                        <br>
                                        <input type="file" name="file" style="display:none" id="profileimage" accept="image/*" onchange="loadFile(event,'profileimage')"/>
                                        <button class="btn btn-default" id="btnFile" onclick="document.getElementById('profileimage').click();" >Upload Photo</button>
                                        <br><span class="help-block" id="imgName"></span>
                                        <script>
                                            var loadFile = function(event,profileimage) {
                                                $("#imgName").text("");
                                                var size = document.getElementById(profileimage).files[0].size/1024;
                                                if(size > 2000){
                                                    messageDialogModal("File Upload Limit","The file size exceeds the limit allowed and cannot be saved. Try uploading another or resize the current image.");
                                                } else {
                                                    var output = document.getElementById('imgPrev');
                                                    var imgname = event.target.files[0].name;
                                                    if(imgname.length > 18){
                                                        var name = imgname.substring(0, 18);
                                                        $("#imgName").text(name+"...");
                                                    } else {
                                                        $("#imgName").text(imgname);
                                                    }
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                }
                                            };
                                        </script>
                                    </td>
                                </tr>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12" align="right">
                            <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                            <a class="btn btn-default" href="<?php echo base_url();?>homepage">CANCEL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modalview" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                User Account Created
            </div>
            <div class="modal-body" style="min-height: 250px;height:auto;overflow: auto">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            The user account has been successfully created and recorded to the system. See the details below for your reference:
                        </p>
                        <hr style="border-style: dashed">
                        <div class="row">
                                <div class="col-md-8" align="left">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td width="150px">Name</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewName"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">User Level</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewUserlevel"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Employee ID Number</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewId"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Gender</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewGender"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Contact Number</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewMsisdn"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Birthday</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewBirthday"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Address</td>
                                            <td width="10px"> : </td>
                                            <td><span id="viewAddress"></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4" align="left">
                                    <img src="" style="width: 150px;height: 150px;border-radius: 4px;border:solid 2px #6d6d6d" id="viewImage">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="center">
                <input type="button" class="btn btn-primary" id="btnDismissModal"  value="OK">
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    #fixedContainer {
        position: fixed;
    }
</style>
<script type="application/javascript">
    $(document).ready(function(){
        $("#birthday").val(moment().format('MM-DD-YYYY'));
        $('#birthday').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy"
        });
        loadDepartments();
    });

    function loadDepartments(){
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>createuser/departments",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                var dept = $("#department");
                dept.empty();
                dept.append('<option selected disabled>- Select Department -</option>');
                if(result.Code == "00"){
                    for(var keys in result.details){
                        dept.append('<option value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>');
                    }
                } else {
                    dept.append('<option selected disabled>- No Department Available -</option>');
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    }

    $("#userlevel").change(function(){
       if($(this).val() == "DEPARTMENTHEAD"){
           $("#divDepartment").show();
       } else {
           $("#divDepartment").hide();
       }
    });

    $("#btnSubmit").click(function(){
        if(!validate()){
            return;
        } else {
            $("#loadingmodal").modal("show");
            var formdata = new FormData();
            var department = "";

            if($("#divDepartment").is(":visible")){
                department = $("#department option:selected").val();
            } else {
                department = "";
            }
            var file = $('input[name=file]')[0].files[0];
            if(file == undefined){
                formdata.append("FILES","");
            } else {
                formdata.append("FILES",file);
            }
            formdata.append("IDNUMBER",$("#idnumber").val());
            formdata.append("FIRSTNAME",$("#firstname").val());
            formdata.append("MIDDLENAME",$("#middlename").val());
            formdata.append("LASTNAME",$("#lastname").val());
            formdata.append("BIRTHDAY",moment($("#birthday").val()).format('YYYY-MM-DD'));
            formdata.append("ADDRESS",$("#address").val());
            formdata.append("MSISDN",$("#msisdn").val());
            formdata.append("DEPARTMENT",department);
            formdata.append("GENDER",$("#gender option:selected").val());
            formdata.append("USERLEVEL",$("#userlevel option:selected").val());
            $.ajax({
                url: "<?php echo base_url()?>createuser/register",
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                data: formdata,
                success: function(data){
                    $("#loadingmodal").modal("hide");
                    if(data.Code == "00"){
                        $("#viewName").text($("#firstname").val()+" "+$("#middlename").val()+ " " +$("#lastname").val());
                        $("#viewId").text($("#idnumber").val());
                        $("#viewBirthday").text($("#birthday").val());
                        $("#viewAddress").text($("#address").val());
                        $("#viewMsisdn").text($("#msisdn").val());
                        $("#viewGender").text($("#gender option:selected").val());
                        $("#viewUserlevel").text($("#userlevel option:selected").text());

                        $("#viewImage").attr("src",$("#imgPrev").attr("src"));
                        $("#modalview").modal("show");
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");
                }
            });
        }
    });

    $("#btnDismissModal").click(function(){
        clearField();
        $("#profileimage").val("");
        $("#imgName").text("");
        $("#imgPrev").attr("src","<?php echo base_url();?>uploads/img_placeholder.jpg");
        $("#birthday").val(moment().format('MM-DD-YYYY'));
        $("#modalview").modal("hide");
    });

    function validate(){
        if($("#userlevel").val()=="" || $("#userlevel").val()==null || $("#userlevel").val()=="- Select User Level -"){
            messageDialogModal("Server Message","Please select user level");
            return false;
        }

        if($("#divDepartment").is(":visible")){
            if($("#department option:selected").val()=="- Select Department -"){
                messageDialogModal("Server Message","Please Select Department");
                return false;
            }
        }

        if($("#idnumber").val()=="" || $("#idnumber").val()==null){
            messageDialogModal("Server Message","ID Number is empty");
            return false;
        }

        if($("#firstname").val()=="" || $("#firstname").val()==null){
            messageDialogModal("Server Message","First Name is empty");
            return false;
        }

        if($("#middlename").val()=="" || $("#middlename").val()==null){
            messageDialogModal("Server Message","Middle Name is empty");
            return false;
        }

        if($("#lastname").val()=="" || $("#lastname").val()==null){
            messageDialogModal("Server Message","Last Name is empty");
            return false;
        }

        if($("#gender").val()=="" || $("#gender").val()==null || $("#gender").val()=="- Please Select Gender -"){
            messageDialogModal("Server Message","Please select gender");
            return false;
        }

        if($("#birthday").val()=="" || $("#birthday").val()==null || $("#birthday").val() == moment().format('MM-DD-YYYY')){
            messageDialogModal("Server Message","Please choose birthday");
            return false;
        }


        if($("#msisdn").val()=="" || $("#msisdn").val()==null){
            messageDialogModal("Server Message","Contact Number is empty");
            return false;
        }

        if($("#address").val()=="" || $("#address").val()==null){
            messageDialogModal("Server Message","Address is empty");
            return false;
        }

        return true;
    }

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
</script>
<style>input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}</style>