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