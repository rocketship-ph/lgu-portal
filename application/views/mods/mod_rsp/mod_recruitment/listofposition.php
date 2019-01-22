<legend>List of Position</legend>
<h5 id="tablemessage" style="display:none"></h5>
<div class="table-responsive" id="tblpositioncontainer">
    <table id="tblposition" class="display responsive compact" cellspacing="0" width="100%" >
        <thead>
        <tr>
            <th>DATE CREATED</th>
            <th>POSITION</th>
            <th>TYPE</th>
            <th>DESCRIPTION</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!--VIEW MODAL-->
<div id="modalViewPosition" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Position Details</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table width="100%">
                            <tr>
                                <td align="left" style="font-weight: bold;">Position Name</td>
                                <td width="10px" align="center">&nbsp;</td>
                                <td align="left"><span id="viewPositionName"></span></td>
                            </tr>
                            <tr>
                                <td align="left" style="font-weight: bold;">Position Code</td>
                                <td width="10px" align="center">&nbsp;</td>
                                <td align="left"><span id="viewPositionCode"></span></td>
                            </tr>
                            <tr>
                                <td align="left" style="font-weight: bold;">Position Type</td>
                                <td width="10px" align="center">&nbsp;</td>
                                <td align="left"><span id="viewPositionType"></span></td>
                            </tr>
                            <tr>
                                <td align="left" style="font-weight: bold;">Position Description</td>
                                <td width="10px" align="center">&nbsp;</td>
                                <td align="left">
                                    <span id="viewPositionLevel"></span><br>
                                    <span id="viewPositionDescription"></span>
                                </td>
                            </tr>
<!--                            <tr>-->
<!--                                <td colspan="3">-->
<!--                                    <hr>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td colspan="3">-->
<!--                                    <label class="control-label" style="font-weight: bold;">Qualification:</label>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr style="padding: 5px">-->
<!--                                <td align="left" style="font-weight: normal;">Education</td>-->
<!--                                <td width="10px" align="center">&nbsp;</td>-->
<!--                                <td align="left" style="border-bottom: 1px solid #c9c9c9">-->
<!--                                    <span id="viewEducLevel" style="font-style: italic;font-weight: normal"></span><br>-->
<!--                                    <span id="viewEducDesc"></span>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr style="padding: 5px">-->
<!--                                <td align="left" style="font-weight: normal;">Seminar and Training</td>-->
<!--                                <td width="10px" align="center">&nbsp;</td>-->
<!--                                <td align="left" style="border-bottom: 1px solid #c9c9c9">-->
<!--                                    <span id="viewSeminarLevel" style="font-style: italic;font-weight: normal"></span><br>-->
<!--                                    <span id="viewSeminarDesc"></span>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr style="padding: 5px">-->
<!--                                <td align="left" style="font-weight: normal;">PRIME HRD Criteria</td>-->
<!--                                <td width="10px" align="center">&nbsp;</td>-->
<!--                                <td align="left">-->
<!--                                    <span id="viewPrimeLevel" style="font-style: italic;font-weight: normal"></span><br>-->
<!--                                    <span id="viewPrimeDesc"></span>-->
<!--                                </td>-->
<!--                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
            </div>
        </div>

    </div>
</div>
<!--END OF VIEW MODAL-->

<!--DELETE MODAL-->
<div id="modalDeletePosition" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Delete Position</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="deletepositionrowid">
                        <p>Are you sure you want to delete this position?<br><span style="font-weight: bold" id="deletepositionname"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnDeletePosition">YES</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">NO</button>
            </div>
        </div>

    </div>
</div>
<!--END OF DELETE MODAL-->

<!--MODAL UPDATE-->
<div id="modalEditPosition" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Position Details</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-horizontal">
                            <input type="hidden" id="rowidEdit">
                            <input type="hidden" id="positionCodeEdit">
                            <fieldset>
                                <div class="form-group">
                                    <label for="positionNameEdit" class="col-lg-2 control-label">Position Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="positionNameEdit" placeholder="Position Name" type="text" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-lg-2 control-label">Type</label>
                                    <div class="col-lg-10">
                                        <div class="btn-group btn-group-justified postype">
                                            <a id="postypeCasual" onclick="setPositionType('Casual');" class="btn btn-outline-success type">Casual</a>
                                            <a id="postypePlantilla" onclick="setPositionType('Plantilla');" class="btn btn-outline-success type">Plantilla</a>
                                            <a id="postypeCoterminous" onclick="setPositionType('Coterminous');" class="btn btn-outline-success type">Coterminous</a>
                                            <a id="postypeJobOrder" onclick="setPositionType('Job Order');" class="btn btn-outline-success type">Job Order</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="positionDescription" class="col-lg-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control clearField" id="positionDescEdit" rows="3" style="resize: none" placeholder="Enter position description.."></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSubmitEditPosition" class="btn btn-success">SUBMIT</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">CANCEL</button>
            </div>
        </div>

    </div>
</div>
<!--END OF MODAL UPDATE-->



<script type="application/javascript">
    $(document).ready(function(){
        window.isUpdate = false;
        window.PositionType = "";
        window.PositionDescription = "";
        loadData();
    });

    function setPositionType(type){
        window.PositionType = type;
        console.log(type);
    }

    function loadData(){
        if(window.isUpdate == false){
            $('#loadingmodal').modal('show');
        }
        $("#tblposition").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                { "width": "10%", "targets": 4 }
            ],
            "ajax":{
                "url":"<?php echo base_url();?>recruitments/listofpositions",
                "data" : {},
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    console.log(json);
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblpositioncontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblpositioncontainer").hide();
                        $("#tablemessage").html("<h3>No Position(s) Found</h3>");
                        $("#tablemessage").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.datecreated).format("MMM DD, YYYY hh:mm:ss A");
                }},
                {"data":function(data){
                    return data.positionname+" ["+data.positioncode+"]";
                }},
                {"data":"positiontype"},
                {"data":function(data){
                    return atob(data.positiondesc);
                }},
                {"data":function(data){
                    return "<a class='btn btn-default btn-sm' title='Edit User' href='javascript:actionView("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-eye'></i></a> <a class='btn btn-success btn-sm' title='Edit User' href='javascript:actionEdit("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-pencil'></i></a> <a class='btn btn-primary btn-sm' title='Delete User' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
                }
                }],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: 'List of Positions \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Positions' )
                            .css( 'font-size', '15pt' );
                    },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "PositionsList"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "PositionsList"+moment().format('MMM DD YYYY hh:mm:ss A'),
                    message: 'List of Positions \nDate: '+moment().format('MMM DD YYYY hh:mm:ss A'),
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                }
            ]
        });
    }

    function actionEdit(data){
        $("#rowidEdit").val(data.id);
        $("#positionNameEdit").val(data.positionname);
        $("#positionCodeEdit").val(data.positioncode);
        $("#positionDescEdit").text(atob(data.positiondesc));

        if(data.positiontype == "PLANTILLA"){
            $('.btn-group.postype a#postypePlantilla').addClass('active').siblings().removeClass('active');
        } else if(data.positiontype == "CASUAL"){
            $('.btn-group.postype a#postypeCasual').addClass('active').siblings().removeClass('active');
        } else if(data.positiontype == "COTERMINOUS"){
            $('.btn-group.postype a#postypeCoterminous').addClass('active').siblings().removeClass('active');
        } else {
            $('.btn-group.postype a#postypeJobOrder').addClass('active').siblings().removeClass('active');
        }

        window.PositionType = data.positiontype;
        window.PositionDescription = atob(data.positiondesc);

        $("#modalEditPosition").modal("show");
    }

    function actionDelete(data){
        console.log(data);

        $("#deletepositionrowid").val(data.id);
        $("#deletepositionname").text(data.positionname+ " ["+data.positioncode+"]");
        window.deletepositioncode = data.positioncode;
        $("#modalDeletePosition").modal("show");
    }

    function actionView(data){
        var description = atob(data.positiondesc);

        $("#viewPositionName").text(data.positionname);
        $("#viewPositionCode").text(data.positioncode);
        $("#viewPositionLevel").text(data.positionlevel);
        $("#viewPositionType").text(data.positiontype);
        $("#viewPositionDescription").text(description);

        $("#modalViewPosition").modal("show");
    }

    $("#btnSubmitEditPosition").click(function(){
       if(!validate()){
           return;
       } else {
           $("#modalEditPosition").modal("hide");
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>recruitments/editposition",
               type: "POST",
               dataType: "json",
               data: {
                   "ROWID":$("#rowidEdit").val(),
                   "POSITIONTYPE":window.PositionType,
                   "DESCRIPTION":$("#positionDescEdit").val()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       messageDialogModal("Server Message",result.Message);
                       window.isUpdate = true;
                       loadData();
                   } else {
                       messageDialogModal("Server Message",result.Message);
                   }
               },
               error: function(e){
                   $("#loadingmodal").modal("hide");
                   console.log(e);
               }
           });
       }
    });

    $("#btnDeletePosition").click(function(){
        $("#modalDeletePosition").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>recruitments/deleteposition",
            type: "POST",
            dataType: "json",
            data: {
                "ROWID":$("#deletepositionrowid").val(),
                "POSITIONCODE":window.deletepositioncode
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    window.isUpdate = true;
                    loadData();
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

    $('.btn-group.postype a').click(function(e) {
        e.preventDefault();
        $(this).addClass('active').siblings().removeClass('active');
    });
    $('.btn-group.description a').click(function(e) {
        e.preventDefault();
        $(this).addClass('active').siblings().removeClass('active');
    });

    function validate(){
        if(window.PositionType == "" || window.PositionType == null){
            messageDialogModal("Required Field","Please Select Position Type");
            return false;
        }

        if($("#positionDescEdit").val() == "" || $("#positionDescEdit").val() == null){
            messageDialogModal("Required Field","Please enter Position Description");
            return false;
        }
        return true;
    }
</script>