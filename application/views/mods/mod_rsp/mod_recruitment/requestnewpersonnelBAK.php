<div class="container">
 <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>homepage">Home</a>
                </li>
                <li class="active">Personnel Requests Management</li>
            </ol>
    <div class="row">
      <div class="col-md-3">
      <div class="list-group">
        <a id="list0" onclick="javascript:loadForm(0);" class="list-group-item  list-group-item-action active">
          New Personnel
        </a>
        <a id="list1" onclick="javascript:loadForm(1);"  class="list-group-item list-group-item-action">Personnel Requests
        </a>
      </div>
      </div>
      <div class="col-md-9">
          <div  class="panel panel-body"  id="divRequestNewPersonnel">
            <div class="form-horizontal">
              <fieldset>
                <legend>Request for New Personnel</legend>
                <div class="form-group">
                  <label for="requestorsName" class="col-lg-2 control-label">Requestor's Name</label>
                  <div class="col-lg-10">
                   <input class="form-control" id="requestorsName" placeholder="Requestor's Name" type="text" value="<?php echo $this->session->userdata('name');?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="department" class="col-lg-2 control-label">Department</label>
                  <div class="col-lg-10">
                   <input class="form-control" id="department" placeholder="Department" type="text" value="<?php echo $this->session->userdata('department');?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <label for="positionRquested" class="col-lg-2 control-label">Position Requested</label>
                    <div class="col-lg-10">
                      <select class="form-control clearField" id="position" required="">
                          <option selected disabled>- Select Position -</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="reasonForRequesting" class="col-lg-2 control-label">Reason for Requesting</label>
                  <div class="col-lg-10">
                    <textarea class="form-control clearField" id="reasonForRequesting" rows="2" style="resize: none"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12" style="text-align: right">
                    <button id="btnSubmitRequest" class="btn btn-success">Send Request</button>
                    <button type="button" onclick="clearField();" class="btn btn-default">Cancel</button>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="panel panel-body" id="divViewPersonnelRequests" style="display:none">
              <h5 id="tablemessage" style="display:none"></h5>
              <div class="table-responsive" id="tblrequestscontainer">
                  <table id="tblrequests" class="display responsive compact" cellspacing="0" width="100%" >
                      <thead>
                      <tr>
                          <th>DATE CREATED</th>
                          <th>REQUEST #</th>
                          <th>POSITION</th>
                          <th>REQUESTOR</th>
                          <th>STATUS</th>
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

<!--SUCCESS MODAL-->
<div id="modalSuccess" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Server Message</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>Request for New Personnel has been created. See the details below for your reference:</p>
                        <hr style="border: 1px dashed #8f8f8f">
                        <table>
                            <tr>
                                <td>REQUEST DATE</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewRequestDate"></span></td>
                            </tr>
                            <tr>
                                <td>REQUEST NUMBER</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewRequestNumber"></span></td>
                            </tr>
                            <tr>
                                <td>POSITION REQUESTED</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewPositionName"></span></td>
                            </tr>
                            <tr>
                                <td>REQUESTOR</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewRequestor"></span></td>
                            </tr>
                            <tr>
                                <td>DEPARTMENT</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewDepartment"></span></td>
                            </tr>
                            <tr>
                                <td>REASON FOR REQUESTING</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="viewReason"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearField();">OK</button>
            </div>
        </div>

    </div>
</div>
<!--END OF SUCCESS MODAL-->

<!--DELETE MODAL-->
<div id="modalDeleteRequest" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Request</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="deleterequestrowid">
                        <p>Are you sure you want to delete this request?</p>
                        <hr style="border: 1px dashed #6d6d6d">
                        <table>
                            <tr>
                                <td>REQUEST NUMBER</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="deleteRequestNumber"></span></td>
                            </tr>
                            <tr>
                                <td>POSITION REQUESTED</td>
                                <td align="center" width="10px">:</td>
                                <td><span id="deletePositionName"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDeleteRequest">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>
<!--END OF DELETE MODAL-->

<!--UPDATE MODAL-->
<div id="modalUpdateRequest" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Request Details</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <input type="hidden" id="requestrowidedit">
                        <div class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="requestNumberEdit" class="col-lg-2 control-label">Request Number</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="requestNumberEdit" type="text" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="requestorsNameEdit" class="col-lg-2 control-label">Requestor's Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="requestorsNameEdit" placeholder="Requestor's Name" type="text" value="<?php echo $this->session->userdata('name');?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="departmentEdit" class="col-lg-2 control-label">Department</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="departmentEdit" placeholder="Department" type="text" value="<?php echo $this->session->userdata('department');?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="positionEdit" class="col-lg-2 control-label">Position Requested</label>
                                    <div class="col-lg-10">
                                        <select class="form-control clearField" id="positionEdit" required="">
                                            <option selected disabled>- Select Position -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reasonForRequestingEdit" class="col-lg-2 control-label">Reason for Requesting</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control clearField" id="reasonForRequestingEdit" rows="2" style="resize: none"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSubmitEdit" class="btn btn-success">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>
    </div>
</div>
<!--END OF UPDATE MODAL-->
<style type="text/css">
  
</style>
<script type="application/javascript">
    $(document).ready(function(){
        window.isUpdate = false;
        loadPositions();
    });

    function loadForm(formno) {
        switch(formno){
            case 0:
                $("#divRequestNewPersonnel").show();
                $("#divViewPersonnelRequests").hide();
                $("#list0").removeClass("active").addClass("active");
                $("#list1").removeClass("active").addClass("");
                break;
            case 1:
                window.isUpdate =false;
                loadRequests();
                $("#divRequestNewPersonnel").hide();
                $("#divViewPersonnelRequests").show();
                $("#list0").removeClass("active").addClass("");
                $("#list1").removeClass("active").addClass("active");
                break;
            default:
                $("#divRequestNewPersonnel").show();
                $("#divViewPersonnelRequests").hide();
                $("#list0").removeClass("active").addClass("active");
                $("#list1").removeClass("active").addClass("");
        }
    }

    function loadPositions(){
        $("#loadingmodal").modal("show");
        var select = $("#position");
        var selectEdit = $("#positionEdit");
        select.empty();
        selectEdit.empty();
        $.ajax({
            url: "<?php echo base_url();?>recruitments/listofpositions",
            type: "POST",
            dataType: "json",
            data: {},
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    select.append("<option selected disabled>- Select Position -</option>");
                    selectEdit.append("<option selected disabled>- Select Position -</option>");
                    for(var keys in data.details){
                        select.append("<option value='"+data.details[keys].positioncode+"' positionname='"+data.details[keys].positionname+"'>"+data.details[keys].positionname+"["+data.details[keys].positioncode+"]</option>");
                        selectEdit.append("<option value='"+data.details[keys].positioncode+"' positionname='"+data.details[keys].positionname+"'>"+data.details[keys].positionname+"["+data.details[keys].positioncode+"]</option>");
                    }
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- No Position Available -</option>");
                selectEdit.append("<option selected disabled>- No Position Available -</option>");
                console.log(e);
            }
        });
    }

    $("#btnSubmitRequest").click(function(){
       if(!validate()){
           return;
       }  else {
           var dt = new Date();
           var requestnumber = dt.getTime();
            $("#loadingmodal").modal("show");
           $.ajax({
                url: "<?php echo base_url();?>recruitments/createpersonnelrequest",
               type: "POST",
               dataType: "json",
               data: {
                   "REQUESTOR":$("#requestorsName").val(),
                   "DEPARTMENT":$("#department").val(),
                   "POSITIONNAME":$("#position option:selected").attr("positionname"),
                   "POSITIONCODE":$("#position option:selected").val(),
                   "REASON":btoa($("#reasonForRequesting").val()),
                   "REQUESTNUMBER":requestnumber
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        $("#viewRequestNumber").text(requestnumber);
                        $("#viewRequestDate").text(moment(requestnumber).format("MMM DD YYYY hh:mm:ss A"));
                        $("#viewPositionName").text($("#position option:selected").attr("positionname"));
                        $("#viewRequestor").text($("#requestorsName").val());
                        $("#viewDepartment").text($("#department").val());
                        $("#viewReason").text($("#reasonForRequesting").val());

                        $("#modalSuccess").modal("show");
                    } else {
                        messageDialogModal("Server Message",result.Message);
                    }
               },
               error: function(e){
                   console.log(e);
                   $("#loadingmodal").modal("hide");
               }
           });
       }
    });

    function loadRequests(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblrequests").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url();?>recruitments/listofpersonnelrequest",
                "data" : {},
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    console.log(json);
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblrequestscontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblrequestscontainer").hide();
                        $("#tablemessage").html("<h3>No Position(s) Found</h3>");
                        $("#tablemessage").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.datecreated).format("MM/DD/YYYY hh:mm:ss A");
                }},
                {"data":"requestnumber"},
                {"data":"positionname"},
                {"data":"requestorname"},
                {"data":function(data){
                    var stat = "";
                    if(data.levelofapproval == "0"){
                        stat = "PENDING";
                    } else if(data.levelofapproval == "1"){
                        stat = "RECOMMENDING APPROVAL";
                    } else if(data.levelofapproval == "2"){
                        stat = "APPROVED";
                    } else {
                        stat = "";
                    }

                    return stat;
                }},
                {"data":function(data){
                    return "<a class='btn btn-default btn-sm' title='Edit User' href='javascript:actionView("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-eye'></i></a> | <a class='btn btn-success btn-sm' title='Edit User' href='javascript:actionEdit("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-pencil'></i></a> | <a class='btn btn-primary btn-sm' title='Delete User' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
                }
                }],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: 'List of Requests for Personnel \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Personnel Requests' )
                            .css( 'font-size', '15pt' );
                    },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "PersonnelRequest"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "PersonnelRequest"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    message: 'List of Requests for Personnel \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                }
            ]
        });
    }

    function actionView(data){
        console.log(data);
    }

    function actionEdit(data){
        $("#positionEdit").val(data.positioncode);
        $("#requestrowidedit").val(data.id);
        $("#requestNumberEdit").val(data.requestnumber);
        $("#reasonForRequestingEdit").val(atob(data.reason));

        $("#modalUpdateRequest").modal("show");
    }

    function actionDelete(data){
        $("#deleterequestrowid").val(data.id);
        $("#deleteRequestNumber").text(data.requestnumber);
        $("#deletePositionName").text(data.positionname);

        $("#modalDeleteRequest").modal("show");
    }

    $("#btnDeleteRequest").click(function(){
        $("#modalDeleteRequest").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>recruitments/deletepersonnelrequest",
            type: "POST",
            dataType: "json",
            data: {
                "ROWID":$("#deleterequestrowid").val(),
                "REQUESTNUMBER":$("#deleteRequestNumber").text()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    window.isUpdate = true;
                    loadRequests();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });

    $("#btnSubmitEdit").click(function(){
        if(!validateEdit()){
            return;
        } else {
            $("#modalUpdateRequest").modal("hide");
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>recruitments/editpersonnelrequest",
                type: "POST",
                dataType: "json",
                data: {
                    "POSITIONNAME":$("#positionEdit option:selected").attr("positionname"),
                    "POSITIONCODE":$("#positionEdit option:selected").val(),
                    "REASON":btoa($("#reasonForRequestingEdit").val()),
                    "DEPARTMENT":btoa($("#departmentEdit").val()),
                    "REQUESTOR":$("#requestorsNameEdit").val(),
                    "REQUESTNUMBER":$("#requestNumberEdit").val(),
                    "ROWID":$("#requestrowidedit").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);

                        window.isUpdate = true;
                        loadRequests();
                    } else {
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");
                }
            });
        }
    });

    function validate(){
        if($("#position option:selected").val() == "- Select Position -"){
            messageDialogModal("Required Field","Please select position");
            return false;
        }

        if($("#reasonForRequesting").val() == "" || $("#reasonForRequesting").val() == null){
            messageDialogModal("Required Field","Please indicate reason for requesting");
            return false;
        }
        return true;
    }

    function validateEdit(){
        if($("#positionEdit option:selected").val() == "- Select Position -"){
            messageDialogModal("Required Field","Please select Position");
            return false;
        }

        if($("#reasonForRequestingEdit").val() == "" || $("#reasonForRequesting").val() == null){
            messageDialogModal("Required Field","Please indicate reason for requesting");
            return false;
        }
        return true;
    }
</script>

