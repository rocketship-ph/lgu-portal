<style>
    .panel-menu{
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
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Utilities Menu</h4>
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
            <div class="panel panel-menu" align="center" id="panel_manageuser">
                <a href="<?php echo base_url();?>manageusers" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/manage_user.png" height="40px">
                    <br>
                    Manage User Account
                </a>
            </div>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td>
            <div class="panel panel-menu" align="center" id="panel_audittrail">
                <a  href="<?php echo base_url();?>utilities/displayaudittrail" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/audit_trail.png" height="40px">
                    <br>
                    Audit Trail
                </a>
            </div>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td>
            <div class="panel panel-menu" align="center" id="panel_databasebackup">
                <a  href="<?php echo base_url();?>utilities/displaybackup" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/database_backup.png" height="40px">
                    <br>
                    Database Backup
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
        <legend>Manage User Account</legend>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">USER LEVEL: <span class="req">*</span></label>
                    <select class="form-control clearField" id="userlevel" required="">
                        <option selected disabled>- Select User Level -</option>
                        <option value="ALL" name="ALL">ALL</option>
                        <option value="MUNICIPALHEAD" name="MHEAD">Municipal Head</option>
                        <option value="DEPARTMENTHEAD" name="DHEAD">Department Head</option>
                        <option value="HRMANAGER" name="HRMGR">HR Manager</option>
                        <option value="HRDSTAFF" name="HRDS">HRD Staff</option>
                        <option value="STAFF" name="STAFF">Staff</option>
                        <option value="ITADMIN" name="ITADMIN">IT Administrator</option>
                    </select>
                </div>
                <br>
                <h5 id="tablemessage" style="display:none"></h5>
                <div class="table-responsive" id="tbluserscontainer" style="display: none;">
                    <table id="tblusers" class="display responsive compact" cellspacing="0" width="100%" >
                        <thead>
                        <tr>
                            <th>DATE CREATED</th>
                            <th>ID NUMBER</th>
                            <th>NAME</th>
                            <th>USER LEVEL</th>
                            <th>DEPARTMENT</th>
                            <th>GENDER</th>
                            <th>AGE</th>
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
<!--UPDATE MODAL-->
<div class="modal fade " id="modalupdate" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <b>Update User Details</b>
            </div>
            <div class="modal-body" style="height: 420px !important;overflow-y: auto;overflow-x: hidden">
                <div class="row">
                    <div class="col-md-8" align="left">
                        <input type="hidden" id="editimagename">
                        <input type="hidden" id="editimagepath">
                        <div class="form-group col-md-6">
                            <label class="control-label">User Level:<span style="color: red;font-weight: bold">*</span></label>
                            <input class="form-control clearField" type="text" id="edituserlevel" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" id="lbluserid">User ID</label>:<span style="color: red;font-weight: bold">*</span>
                            <input class="form-control clearField" type="text" id="userid" placeholder="User ID" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">First Name:<span style="color: red;font-weight: bold">*</span></label>
                            <input class="form-control clearField" type="text" id="firstname" placeholder="ex. Juan" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Middle Name:<span style="color: red;font-weight: bold">*</span></label>
                            <input class="form-control clearField" type="text" id="middlename" placeholder="ex. Santos" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Last Name:<span style="color: red;font-weight: bold">*</span></label>
                            <input class="form-control clearField" type="text" id="lastname" placeholder="ex. Dela Cruz" required="">
                        </div>
                        <div class="form-group col-md-6" style="height: 54.5px;display: none" id="divDepartment">
                            <label class="control-label">Department:<span style="color: red;font-weight: bold">*</span></label>
                            <select class="form-control clearField" id="department" required="">
                                <option selected disabled>- Select Department -</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="height: 54.5px">
                            <label class="control-label">Gender:<span style="color: red;font-weight: bold">*</span></label>
                            <select class="form-control clearField" id="gender" required="">
                                <option selected disabled>- Please Select Gender -</option>
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Contact Number:<span style="color: red;font-weight: bold">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">+63</span>
                                <input class="form-control clearField" type="text" id="msisdn" maxlength="10" placeholder="ex. 9191234567" required="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Birthday:<span style="color: red;font-weight: bold">*</span></label>
                            <input class="form-control clearField" id="birthday" placeholder="MM-DD-YYYY" required="" type="text" readonly>
                        </div>
                    </div>
                    <div class="col-md-4" align="right">
                        <div class="form-group" align="center">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <label class="control-label">User Image (max 2MB):</label>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>
                                        <img id="imgPrev" src="<?php echo base_url();?>assets/img/user.png" style="height:150px; width:150px;border:2px solid #555555;border-radius: 3px">
                                        <br>
                                        <br>
                                        <input value="Browse" type="file"  name="file" id="profileimage" accept="image/*" onchange="loadFile(event,'profileimage')" style="display: none" />
                                        <button class="btn btn-default" id="btnFile" onclick="document.getElementById('profileimage').click();" >Upload Photo</button>
                                        <br><span id="imgName" class="help-block"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group" align="left">
                            <br>
                            <button class="btn btn-danger" id="resetpassword">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="center">
                <input type="button" id="btnedit" class="btn btn-success"  value="SUBMIT">
                <input type="button" class="btn btn-cancel" data-dismiss="modal"  value="CANCEL">
            </div>
        </div>
    </div>
</div>
<!--END OF UPDATE MODAL-->

<!--DELETE MODAL-->
<div class="modal fade " id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b>Delete User Account</b>
            </div>
            <div class="modal-body" >
                <div class='row'>
                    <input type="hidden" id="deleteusername">
                    <input type="hidden" id="deletefilename">
                    <div class="col-md-12">
                        <label style="font-weight: normal">Are you sure you want to delete user: <br><span id="deletename" style="font-weight:bold;"></span> ?</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="center">
                <input type="button" id="btndelete" class="btn btn-danger"  value="YES">
                <input type="button" class="btn btn-cancel" data-dismiss="modal"  value="NO">
            </div>
        </div>
    </div>
</div>
<!--END OF DELETE MODAL-->
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_utilities").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_manageuser").addClass("selected_panel");

        window.isUpdate = false;
        window.profileChanged = false;
        $("#divDepartment").hide();
        $('#birthday').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy",
            endDate: new Date()
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


    var loadFile = function(event,profileimage) {
        if(document.getElementById(profileimage).files[0] == undefined || $("#profileimage").val() == "" || $("#profileimage").val() == null){

        } else {
            var size = document.getElementById(profileimage).files[0].size/1024;
            $("#imgName").text("");
            if(size > 2000){
                messageDialogModal("File Upload Limit","The file size exceeds the limit allowed and cannot be saved. Try uploading another or resize the current image.");
            } else {
                window.profileChanged = true;
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
        }

    };

    $("#userlevel").change(function(){
//        if($(this).val() == "DEPARTMENTHEAD"){
//            $("#divDepartment").show();
//        } else {
//            $("#divDepartment").hide();
//        }
        loadData($(this).val());
    });

    function loadData(userlevel){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblusers").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search Users:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url();?>manageusers/users",
                "data" : {
                    "USERLEVEL":userlevel
                },
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    console.log(json);
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tbluserscontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tbluserscontainer").hide();
                        $("#tablemessage").html("<h3>No User Account(s) Found</h3>");
                        $("#tablemessage").show();
                    }
                }
            },
            "columns":[
                {"data":"datecreated"},
                {"data":"username"},
                {"data":function(data){
                    return data.firstname + " " + data.middlename + " " +data.lastname;
                }},
                {"data":function(data){
                    return $("#userlevel option[value='"+data.userlevel+"']").text() ? $("#userlevel option[value='"+data.userlevel+"']").text() : data.userlevel;
                }},
                {"data":function(data){
                    return (data.department == null || data.department == "") ? "--" : data.department;
                }},
                {"data":"gender"},
                {"data":function(data){
                    var age = moment().diff(moment(data.birthday),'years');
                    return (isNaN(age) || age == 0 || age == "0") ? "-" : age;
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
                    return "<a class='btn btn-success btn-sm' title='Edit User' href='javascript:actionEdit("+especialJSONStringify(data)+");' trid="+especialJSONStringify(data)+"><i class='fa fa-pencil'></i></a> | <a class='btn btn-primary btn-sm' title='Delete User' href='javascript:actionDelete("+especialJSONStringify(data)+");' trid="+especialJSONStringify(data)+"><i class='fa fa-trash'></i></a>";
                }
                }],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: 'List of Users \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Registered Users' )
                            .css( 'font-size', '15pt' );
                    },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "UsersList"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "UsersList"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    message: 'List of Registered System Users \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                }
            ]
        });
    }

    function actionEdit(data){
        console.log(data.filename);
        $("#imgName").text("");
        $("#imgPrev").attr("src","");
        if(data.userlevel != "TEMPORARY"){
            $("#divDepartment").show();
            $("#department").val(data.department);

        } else {
            $("#divDepartment").hide();
        }

        $("#edituserlevel").val(data.userlevel);
        $("#userid").val(data.username);
        $("#firstname").val(data.firstname);
        $("#middlename").val(data.middlename);
        $("#lastname").val(data.lastname);
        $("#gender").val(data.gender);
        var str = data.contactnumber;
        str.indexOf( '6' ) == 0 && str.indexOf( '3' ) == 1? str = str.replace( '63', '' ) : str;
        $("#msisdn").val(str);
        $("#birthday").val(moment(data.birthday).format('MM-DD-YYYY'));
        $("#editimagename").val(data.filename);
        $("#editimagepath").val(data.filepath);

        if(data.filename == "" || data.filename == null){
            $("#imgPrev").attr("src","<?php echo base_url();?>uploads/profile_pictures/NOIMAGE.png");
        } else {
            $("#imgPrev").attr("src","<?php echo base_url();?>"+data.filepath+data.filename);
        }

        $("#resetpassword").attr("user-id",data.username);
        $("#resetpassword").attr("userlevel",data.userlevel);
        $("#resetpassword").attr("firstname",data.firstname);
        $("#resetpassword").attr("middlename",data.middlename);
        $("#resetpassword").attr("lastname",data.lastname);

        $("#modalupdate").modal("show");
    }

    function actionDelete(data){
        $("#deletename").text(data.firstname+" "+data.middlename + " "+data.lastname);
        $("#deleteusername").val(data.username);
        $("#deletefilename").val(data.filename);

        $("#modaldelete").modal("show");
    }

    $("#btnedit").click(function(){
        if(!validate()){
            return;
        } else {
            $("#modalupdate").modal("hide");
            $("#loadingmodal").modal("show");

            var formdata = new FormData();
            var file = $('input[name=file]')[0].files[0];
            $("#loadingmodal").modal("show");
            if(file == undefined){
                formdata.append("FILES","");
            } else {
                formdata.append("FILES",file);
            }
            var department = "";

            if($("#divDepartment").is(":visible")){
                department = $("#department option:selected").val();
            } else {
                department = "";
            }
            var yearlevel = $("#edityearlevel option:selected").val();
            formdata.append("FIRSTNAME",htmlEncode($("#firstname").val()));
            formdata.append("MIDDLENAME",htmlEncode($("#middlename").val()));
            formdata.append("LASTNAME",htmlEncode($("#lastname").val()));
            formdata.append("GENDER",$("#gender option:selected").val());
            formdata.append("MSISDN",htmlEncode($("#msisdn").val()));
            formdata.append("BIRTHDAY",moment($("#birthday").val()).format('YYYY-MM-DD'));
            formdata.append("USERNAME",$("#userid").val());
            formdata.append("DEPARTMENT",department);
            formdata.append("ISCHANGED",(window.profileChanged == true) ? "YES" : "NO");
            formdata.append("IMAGENAME",$("#editimagename").val());
            formdata.append("IMAGEPATH",$("#editimagepath").val());
            formdata.append("OLDIMAGENAME",$("#editimagename").val());
            $.ajax({
                url: "<?php echo base_url()?>manageusers/update",
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                data:formdata,
                success: function(data){
                    $("#loadingmodal").modal("hide");
                    window.isUpdate = true;
                    messageDialogModal("Server Message",data.Message);
                    loadData($("#userlevel option:selected").val());
                },
                error: function(e){
                    $("#loadingmodal").modal("hide");
                    console.log(e);
                }
            });
        }
    });

    $("#btndelete").click(function(){
        $("#modaldelete").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url : "<?php  echo base_url(); ?>manageusers/delete",
            type : "POST",
            data : {
                "USERNAME": $("#deleteusername").val(),
                "FILENAME" :$("#deletefilename").val()
            },
            dataType: 'json',
            success : function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                    window.isUpdate = true;
                    loadData($("#userlevel option:selected").val());
                } else {
                    messageDialogModal("Server Message",data.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });

    $("#resetpassword").click(function(){
        $("#resetpassword").attr("disabled",true);
        $("#resetpassword").text("Resetting Password..");
        $.ajax({
            url : "<?php  echo base_url(); ?>manageusers/resetpassword",
            type : "POST",
            data : {
                "USERNAME": $(this).attr("user-id"),
                "FIRSTNAME": $(this).attr("firstname"),
                "MIDDLENAME": $(this).attr("middlename"),
                "LASTNAME": $(this).attr("lastname")
            },
            dataType: 'json',
            success : function(data){
                $("#resetpassword").attr("disabled",false);
                $("#resetpassword").text("Reset Password");
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                } else {
                    messageDialogModal("Server Message",data.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#resetpassword").attr("disabled",false);
                $("#resetpassword").text("Reset Password");
            }
        });
    });

    function validate(){
        if($("#userlevel").val() == "" || $("#userlevel").val() == null){
            messageDialogModal("Required Field","Please select User Level");
            return false;
        }
        if($("#firstname").val() == "" || $("#firstname").val() == null){
            messageDialogModal("Required Field","Please provide First Name");
            return false;
        }
        if($("#middlename").val() == "" || $("#middlename").val() == null){
            messageDialogModal("Required Field","Please provide Middle Name");
            return false;
        }
        if($("#lastname").val() == "" || $("#lastname").val() == null){
            messageDialogModal("Required Field","Please provide Last Name");
            return false;
        }
        if($("#msisdn").val() == "" || $("#msisdn").val() == null){
            messageDialogModal("Required Field","Please provide Contact Number");
            return false;
        }

        if($("#birthday").val() == "" || $("#birthday").val() == null || $("#birthday").val() == moment().format('MM-DD-YYYY')){
            messageDialogModal("Required Field","Please provide Birthday");
            return false;
        }

        if($("#divDepartment").is(":visible")){
            if($("#department option:selected").val()=="- Select Department -"){
                messageDialogModal("Server Message","Please Select Department");
                return false;
            }
        }

        return true;
    }

    function htmlEncode(val){
        return val.replace(/&/g, "&amp;").
            replace(/</g, "&lt;").
            replace(/>/g, "&gt;").
            replace(/"/g, "&quot;").
            replace(/'/g, "&#039;");
    }


</script>
<style>
    .modules{
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3); /* IE */
        -moz-transform: scale(1.3); /* FF */
        -webkit-transform: scale(1.3); /* Safari and Chrome */
        -o-transform: scale(1.3); /* Opera */
        padding: 10px;
    }

    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}
</style>