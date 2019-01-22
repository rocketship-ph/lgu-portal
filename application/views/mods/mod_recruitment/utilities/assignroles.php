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
                <div class="panel" align="center" id="panel_rolesconfiguration">
                    <a href="<?php echo base_url();?>utilities/assignroles" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/roles_configuration.png" height="40px">
                        <br>
                        Roles Configuration
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_audittrail">
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
                <div class="panel" align="center" id="panel_databasebackup">
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
            <legend>Assign Roles</legend>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">USER LEVEL: <span class="req">*</span></label>
                        <select class="form-control clearField" id="userlevel" required="">
                            <option selected disabled>- Select User Level -</option>
                            <option value="MUNICIPALHEAD" name="MHEAD">Municipal Head</option>
                            <option value="DEPARTMENTHEAD" name="DHEAD">Department Head</option>
                            <option value="HRMANAGER" name="HRMGR">HR Manager</option>
                            <option value="HRDSTAFF" name="HRDS">HRD Staff</option>
                            <option value="STAFF" name="STAFF">STAFF</option>
                            <option value="ITADMIN" name="ITADMIN">IT Administrator</option>
                            <option value="TEMPORARY" name="TEMPORARY">Applicants</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">USER ACCOUNT: <span class="req">*</span></label>
                        <select class="form-control clearField" id="username" required="">
                            <option selected disabled>- Select User -</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 id="tablemessage" style="display:none"></h5>
                    <div class="table-responsive" id="tblmodulescontainer" style="display: none;">
                        <table id="tblmodules" class="display responsive compact" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>MODULE</th>
                                <th align="center">ASSIGN</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" align="right">
                    <br>
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url();?>homepage">CANCEL</a>
                        <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                    </div>
                    <br>
                    <br>
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
                <a href="<?php echo base_url();?>assignroles" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_utilities").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_rolesconfiguration").addClass("selected_panel");

        window.isUpdate = false;
        loadData();
    });

    function loadData(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblmodules").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:"
            },
            "ajax":{
                "url":"<?php  echo base_url(); ?>assignroles/modules",
                "data" : {},
                "type" : "POST",
                "dataType" : "json",
                "async": false,
                dataSrc: function(json){
                    $('#loadingmodal').modal('hide');
                    if(json.Code=="00"){
                        $('#tblmodulescontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $("#tblmodulescontainer").hide();
                        $("#tablemessage").html("<h3>No Module(s) Found</h3>");
                        $("#tablemessage").show();
                        return "";
                    }
                }
            },
            "columns":[
                {"data":"modulename"},
                {"data":function(data){
                    return "<input type='checkbox' style='width: auto;text-align: center' class='modules' id='"+data.moduleid+"'>";
                }
                }]
        });
    }

    $("#userlevel").change(function(){
        uncheckAll();
        $("#loadingmodal").modal("show");
        $("#username").empty();
        $.ajax({
            url: "<?php echo base_url();?>assignroles/users",
            type: "POST",
            dataType: "json",
            data: {
                "USERLEVEL":$(this).val()
            },
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    $("#username").append('<option selected disabled>- Select User -</option>');
                    $("#username").append('<option value="ALL">ALL</option>');
                    for(var keys in data.details){
                        var name = data.details[keys].firstname + " " + data.details[keys].lastname;
                        $("#username").append('<option value="'+data.details[keys].username+'">'+data.details[keys].username+' ['+name+']</option>');
                    }
                } else {
//                    $("#username").append('<option selected disabled>- No User(s) Available -</option>');
                    $("#username").append('<option selected disabled>- Select User -</option>');
                    $("#username").append('<option value="ALL">ALL</option>');
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
                $("#username").append('<option selected disabled>- No User(s) Available -</option>');
            }
        });
    });

    function uncheckAll(){
        var mod = $('#tblmodules').dataTable();
        $("input[class='modules']", mod.fnGetNodes()).each(function(){
            $(this).prop("checked",false);
        });
    }

    $("#username").change(function(){
        uncheckAll();
        loadConfiguration($(this).val());
    });


    function loadConfiguration(username){
        $('#loadingmodal').modal('show');
        var table = $("#tblmodules").dataTable();
        $.ajax({
            url : "<?php  echo base_url(); ?>assignroles/getconfig",
            type : "POST",
            data : {
                "USERNAME" : username,
                "USERLEVEL":$("#userlevel option:selected").val()
            },
            dataType : "json",
            async: false,
            success : function(res){
                $('#loadingmodal').modal('hide');
                console.log("config");
                console.log(res.details);
                for(var keys in res.details){
                    $(".modules", table.fnGetNodes()).each(function(){
                        var id = $(this).attr("id");
                        var s = res.details[keys].moduleid;
                        if(id==s){
                            $(this).prop("checked",true);
                        }
                    });
                }
            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    }

    $("#btnSubmit").click(function(){
        var modules = [];
        var table = $('#tblmodules').dataTable();
        var a = table.fnGetNodes();
        $("input.modules:checked",a).each(function(){
            var id = $(this).attr("id");
            modules.push(id);
        });
        if($("#userlevel option:selected").val() == '- Select User Level -'){
            messageDialogModal("Server Message","No User Level Selected");
        } else if ($("#username option:selected").val() == '- Select User -'){
            messageDialogModal("Server Message","No User Selected");
        } else if(modules.length<=0) {
            messageDialogModal("Server Message","No Module Selected");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>assignroles/assign",
                type: "POST",
                dataType: "json",
                data: {
                    "USERNAME":$("#username option:selected").val(),
                    "USERLEVEL":$("#userlevel option:selected").val(),
                    "MODULES":modules
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        $("#successmsg").text(data.Message + " to "+$("#userlevel option:selected").text() + " - "+$("#username option:selected").text());
                        $("#modalsuccess").modal("show");
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                    window.isUpdate = true;
                    loadData();
                    clearField();
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
    });
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
</style>