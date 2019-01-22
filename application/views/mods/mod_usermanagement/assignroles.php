<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Roles Configuration</h3>
                    <h4><i class="fa fa-angle-right"></i>&nbsp;Assign Roles</h4>
                </div>
                <div class="panel-body">
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
                                    <option value="EVALUATOR" name="EVAL">Evaluator</option>
                                    <option value="ITADMIN" name="ITADMIN">IT Administrator</option>
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
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url();?>homepage">CANCEL</a>
                        <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
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
                <a href="<?php echo base_url();?>assignroles" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
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
                    for(var keys in data.details){
                        var name = data.details[keys].firstname + " " + data.details[keys].lastname;
                        $("#username").append('<option value="'+data.details[keys].username+'">'+data.details[keys].username+' ['+name+']</option>');
                    }
                } else {
                    $("#username").append('<option selected disabled>- No User(s) Available -</option>');
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
        loadConfiguration($(this).val());
    });


    function loadConfiguration(username){
        $('#loadingmodal').modal('show');
        var table = $("#tblmodules").dataTable();
        $.ajax({
            url : "<?php  echo base_url(); ?>assignroles/getconfig",
            type : "POST",
            data : {
                "USERNAME" : username
            },
            dataType : "json",
            async: false,
            success : function(res){
                $('#loadingmodal').modal('hide');
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
                    "MODULES":modules
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        $("#successmsg").text(data.Message + " to "+$("#username option:selected").text());
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