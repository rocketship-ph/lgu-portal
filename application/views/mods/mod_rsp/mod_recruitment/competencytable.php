<fieldset>
    <legend>Competency Table</legend>
    <div class="col-md-12" align="right">
        <button style="float: right" class="btn btn-success" onclick="$('#modalNewCompetencyTitle').modal('show');">+ Add New</button>

    </div>
    <div class="col-md-12">
        <br>
        <h5 id="tablemessage" style="display:none"></h5>
        <div class="table-responsive" id="tblcompetencycontainer">
            <table id="tblcompetency" class="display responsive compact" cellspacing="0" width="100%" >
                <thead>
                <tr>
                    <th>DATE CREATED</th>
                    <th>COMPETENCY TITLE</th>
                    <th>DESCRIPTION</th>
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
                <h5 class="modal-title">Competency Table - Add New</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Competency Title:<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" id="newcompetencyTitle" class="form-control clearField" placeholder="ex. Organizational Competencies" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description:<span style="color:red;font-weight: bold">*</span></label>
                            <textarea rows="3" style="resize: none" id="newcompetencyDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSubmitNewCompetency">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearField()" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>

<div id="modalEditCompetencyTitle" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Competency Table - Edit Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idcompetencyrowid">
                        <div class="form-group">
                            <label class="control-label">Competency Title:<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" id="editcompetencyTitle" class="form-control clearField" placeholder="ex. Organizational Competencies" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description:<span style="color:red;font-weight: bold">*</span></label>
                            <textarea rows="3" style="resize: none" id="editcompetencyDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSubmitEditCompetency">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>

<div id="modalDeleteCompetencyTitle" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Competency Table - Delete Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idcompetencyrowiddelete">
                        <p>Are you sure you want to delete this competency title?<br><span style="font-weight: bold" id="deletecompetencytitle"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSubmitDeleteCompetency">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
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
    $("#tblcompetency").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:"
        },
        "order": [[ 0, "desc" ]],
        "ajax":{
            "url":"<?php echo base_url();?>recruitments/competencies",
            "data" : {},
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
                    $("#tablemessage").html("<h3>No Competency Title Found</h3>");
                    $("#tablemessage").show();
                }
            }
        },
        "columns":[
            {"data":function(data){
                return moment(data.datecreated).format("MMM DD, YYYY hh:mm:ss A");
            }},
            {"data":"title"},
            {"data":function(data){
                return atob(data.description);
            }},
            {"data":function(data){
                return "<a class='btn btn-success btn-sm' title='Edit User' href='javascript:actionEdit("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-pencil'></i></a> | <a class='btn btn-primary btn-sm' title='Delete User' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
            }
            }]
    });
}


function actionEdit(data){
    $("#idcompetencyrowid").val(data.id);
    $("#editcompetencyTitle").val(data.title);
    $("#editcompetencyDescription").val(atob(data.description));
    $("#modalEditCompetencyTitle").modal("show");
}

function actionDelete(data){
    $("#idcompetencyrowiddelete").val(data.id);
    $("#deletecompetencytitle").text(data.title);
    $("#modalDeleteCompetencyTitle").modal("show");
}

$("#btnSubmitNewCompetency").click(function(){
    if($("#newcompetencyTitle").val() == "" || $("#newcompetencyTitle").val() == null){
        messageDialogModal("Required Field","Please enter a Competency Title");
    } else if ($("#newcompetencyDescription").val() == "" || $("#newcompetencyDescription").val() == null){
        messageDialogModal("Required Field","Please enter a Competency Title Description");
    }else {
        $("#modalNewCompetencyTitle").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>recruitments/newcompetency",
            type: "POST",
            dataType: "json",
            data: {
                "TITLE":$("#newcompetencyTitle").val(),
                "DESCRIPTION":$("#newcompetencyDescription").val()
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

$("#btnSubmitDeleteCompetency").click(function(){
    $("#modalDeleteCompetencyTitle").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>recruitments/deletecompetency",
        type: "POST",
        dataType: "json",
        data: {
            "ROWID":$("#idcompetencyrowiddelete").val()
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