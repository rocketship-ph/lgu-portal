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
            <legend>Database Backup</legend>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success" id="btnCreateBackup">CREATE DATABASE BACKUP</button>
                </div>
                <div class="col-md-12">
                    <h5 id="tablemessage" style="display:none"></h5>
                    <div class="table-responsive" id="tblbackupscontainer">
                        <table id="tblbackups" class="display responsive compact" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>DATE CREATED</th>
                                <th>BACKUP NAME</th>
                                <th>CREATED BY</th>
                                <th>ACTION</th>
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
<div id="modalDeleteBackup" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Delete Database Backup</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idbackuprowdelete">
                        <input type="hidden" id="backupfilenamedelete">
                        <p>Are you sure you want to delete this database backup?<br><span style="font-weight: bold" id="deletebackupname"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDeleteBackup">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_utilities").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_databasebackup").addClass("selected_panel");

        window.isUpdate = false;
        loadBackups();
    });

    $("#btnCreateBackup").click(function(){
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>utilities/databasebackup",
            type:"POST",
            dataType:"json",
            data: {},
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    window.isUpdate = true;
                    loadBackups();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("show");
                console.log(e);
            }
        });
    });
    function loadBackups(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblbackups").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No Backup(s) Found"
            },
            "order": [[ 0, "desc" ]],
            "sDom": 'frt',
            "ajax":{
                "url":"<?php echo base_url();?>utilities/getbackups",
                "data" : {},
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblbackupscontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        console.log("no data");
                        $('#loadingmodal').modal('hide');
                        $("#tablemessage").html("<h3>No Record(s) Found</h3>");
                        $("#tablemessage").show();
                        $("#tblbackupscontainer").hide();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.datecreated).format("MM/DD/YYYY hh:mm:ss A");
                }},
                {"data":"backupname"},
                {"data":"createdby"},
                {
                    "data": function (data) {
                        return "<a class='btn btn-success btn-sm' title='Download Backup' href='<?php echo base_url() ?>utilities/download/"+data.filename+"'><i class='fa fa-download'></i></a> | <a class='btn btn-primary btn-sm' title='Delete Backup' href='javascript:actionDelete(" + JSON.stringify(data) + ");' trid=" + JSON.stringify(data) + "><i class='fa fa-trash'></i></a>";
                    }
                }]
        });
    }

    function actionDelete(data){
        console.log(data);
        $("#idbackuprowdelete").val(data.id);
        $("#backupfilenamedelete").val(data.filename);
        $("#deletebackupname").text(data.backupname);

        $("#modalDeleteBackup").modal("show");
    }

    $("#btnDeleteBackup").click(function(){
        $("#modalDeleteBackup").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>utilities/deletebackup",
            type: "POST",
            dataType: "json",
            data: {
                "ID":$("#idbackuprowdelete").val(),
                "FILENAME":$("#backupfilenamedelete").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message", result.Message);
                    window.isUpdate = true;
                    loadBackups();
                } else {
                    messageDialogModal("Server Message", result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });
</script>