<fieldset>
    <legend>Logo Change Requests</legend>
    <div class="col-md-12" align="right">
        <button id="btnModalNewRequest" style="float: right" class="btn btn-success" onclick="$('#modalNewCompetencyTitle').modal('show');">+ Create New Request</button>

    </div>
    <div class="col-md-12">
        <br>
        <h5 id="tablemessage" style="display:none"></h5>
        <div class="table-responsive" id="tblcompetencycontainer">
            <table id="tblrequests" class="display responsive compact" cellspacing="0" width="100%" >
                <thead>
                <tr>
                    <th>DATE REQUESTED</th>
                    <th>REQUESTOR NAME</th>
                    <th>REQUESTOR USERLEVEL</th>
                    <th>REASON</th>
                    <th>REMARKS</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>
<div id="modalNewCompetencyTitle" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Create New Request</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Reason for Requesting:<span style="color:red;font-weight: bold">*</span></label>
                            <textarea id="reason" class="form-control clearField" placeholder="Enter Reason for Request.." required="" style="resize: none;" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSubmitRequest">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearField()" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>


<div id="modalCancelRequest" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Cancel Request</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="requestid">
                        <p>Are you sure you want to cancel this request?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnCancelRequest">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        window.isUpdate = false;
        var cmd = "<?php echo @$_GET['q'];?>";
        console.log(cmd);
        if(cmd == "" || cmd == null){
            loadData();
        } else {
            window.location = "<?php echo base_url();?>homepage/logout";
        }

    });


    function loadData(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblrequests").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url();?>logorequests/displayrequest",
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    console.log(json);
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcompetencycontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcompetencycontainer").hide();
                        $("#tablemessage").html("<h3>No Requests Found</h3>");
                        $("#tablemessage").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.timestamp).format("MMM DD, YYYY hh:mm:ss A");
                }},
                {"data":"requestorname"},
                {"data":"requestoruserlevel"},
                {"data":"reason"},
                {"data":function(data){
                    return (data.remarks == "" || data.remarks == null) ? "-" : data.remarks;
                }},
                {"data":"status"},
                {"data":function(data){
                    var btn = '';
                    if(data.status == "PENDING"){
                        $("#btnModalNewRequest").prop("disabled",false);
                        btn = "<a class='btn btn-primary btn-sm' title='Cancel Request' href='javascript:actionCancelRequest("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+">CANCEL</a>";
                    } else if(data.status == "APPROVED"){
                        $("#btnModalNewRequest").prop("disabled",true);
                        btn = "<a class='btn btn-success btn-sm' title='Change Logo' href='javascript:actionChangeLogo("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+">CHANGE</a>";
                    } else {
                        $("#btnModalNewRequest").prop("disabled",false);
                        btn = '-';
                    }
                    return btn;
                }
                }]
        });
    }


    function actionChangeLogo(data){
        var dt = new Object();
        dt['rqid'] = data.rqid;
        dt['return'] = "<?php echo base_url();?>logorequests";
        dt['changedby'] = "<?php echo $this->session->userdata('name');?>";
        dt['userlevel'] = "<?php echo $this->session->userdata('userlevel');?>";

        window.location = "<?php echo $GLOBALS['superadmin'];?>?q="+btoa(JSON.stringify(dt));
    }

    function actionCancelRequest(data){
        $("#requestid").val(data.id);
        $("#modalCancelRequest").modal("show");
    }

    $("#btnSubmitRequest").click(function(){
        if($("#reason").val() == "" || $("#reason").val() == null){
            messageDialogModal("Required Field","Please enter Reason for Request");
        } else {
            $("#modalNewCompetencyTitle").modal("hide");
            $("#loadingmodal").modal("show");
            var dt = new Date();
            var n = dt.getTime();
            $.ajax({
                url: "<?php echo base_url();?>logorequests/newrequest",
                type: "POST",
                dataType: "json",
                data: {
                    "REASON":$("#reason").val(),
                    "RQID":n
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message", result.Message);
                        clearField();
                        window.isUpdate = true;
                        loadData();
                    } else {
                        messageDialogModal("Server Message", result.Message);
                    }
                },
                error: function(e){
                    $("#loadingmodal").modal("hide");
                    console.log(e);
                }
            });
        }
    });

    $("#btnSubmitEditCompetency").click(function(){
        if($("#editcompetencyTitle").val() == "" || $("#editcompetencyTitle").val() == null){
            messageDialogModal("Required Field","Please enter a Competency Title");
        } else if($("#editcompetencyDescription").val() == "" || $("#editcompetencyDescription").val() == null){
            messageDialogModal("Required Field","Please enter a Competency Title Description");
        } else {
            $("#modalEditCompetencyTitle").modal("hide");
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>recruitments/editcompetency",
                type: "POST",
                dataType: "json",
                data: {
                    "TITLE":$("#editcompetencyTitle").val(),
                    "DESCRIPTION":$("#editcompetencyDescription").val(),
                    "ROWID":$("#idcompetencyrowid").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message", result.Message);
                        clearField();
                        window.isUpdate = true;
                        loadData();
                    } else {
                        messageDialogModal("Server Message", result.Message);
                    }
                },
                error: function(e){
                    $("#loadingmodal").modal("hide");
                    console.log(e);
                }
            });
        }
    });

    $("#btnCancelRequest").click(function(){
        $("#modalCancelRequest").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>logorequests/cancel",
            type: "POST",
            dataType: "json",
            data: {
                "ID":$("#requestid").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message", result.Message);
                    clearField();
                    window.isUpdate = true;
                    loadData();
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


    $(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
        $('body').css('padding-right','0');
    });

</script>