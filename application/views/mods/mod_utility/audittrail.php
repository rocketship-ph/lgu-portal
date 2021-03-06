<div class="col-md-12">
    <fieldset>
        <legend>Monitoring</legend>
        <div class="form-group col-md-4">
            <label for="datefrom" class="control-label">Date From</label>
            <input class="form-control datepick" id="datefrom" type="text" onchange="changeStartDate()" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="department" class="control-label">Date To</label>
            <input class="form-control datepick" id="dateto" type="text" readonly>
        </div>
        <div class="form-group col-md-4" align="center">
            <br>
            <div style="padding-top:5px;">
                <button id="btnSubmit" class="btn btn-success">View Audit Trail</button>
                <button type="button" onclick="reset();" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </fieldset>
</div>
<div class="col-md-12" style="display: none" id="divResult">
    <br>
    <h5 id="tablemessage" style="display:none"></h5>
    <div class="table-responsive" id="tblaudittrailcontainer">
        <table id="tblaudittrail" class="display responsive compact" cellspacing="0" width="100%" >
            <thead>
            <tr>
                <th>TIMESTAMP</th>
                <th>MODULE</th>
                <th>ACTIVITY</th>
                <th>USER</th>
                <th>IP ADDRESS</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $(".datepick").val(moment().format("MM-DD-YYYY"));
        $('#datefrom').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy",
            endDate: moment().format("MM-DD-YYYY")
        });
        $('#dateto').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-dd-yyyy",
            startDate: $('#datefrom').val()
        });
    });

    function changeStartDate(){
        $('#dateto').datepicker('setStartDate', $('#datefrom').val());
    }

    $("#btnSubmit").click(function(){
        $("#divResult").show();
        loadRequests();
    });

    function reset(){
        $("#divResult").hide();
        $(".datepick").val(moment().format("MM-DD-YYYY"));
    }

    function loadRequests(){
        $('#loadingmodal').modal('show');
        $("#tblaudittrail").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url();?>utilities/audittrail",
                "data" : {
                    "DATEFROM":moment($("#datefrom").val()).format("YYYY-MM-DD"),
                    "DATETO":moment($("#dateto").val()).format("YYYY-MM-DD")
                },
                "type" : "POST",
                "dataType" : "json",
                dataSrc: function(json){
                    console.log(json);
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblaudittrailcontainer').show();
                        $("#tablemessage").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblaudittrailcontainer").hide();
                        $("#tablemessage").html("<h3>No Record(s) Found</h3>");
                        $("#tablemessage").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.timestamp).format("MM/DD/YYYY hh:mm:ss A");
                }},
                {"data":"modulename"},
                {"data":"action"},
                {"data":"user"},
                {"data":"ipaddress"}],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: 'List of transactions made through the system \nDate: '+$("#datefrom").val()+"_"+$("#dateto").val() +"\nGenerated by: <?php echo $this->session->userdata('name');?>",
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Audit Trail' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "AuditTrail"+$("#datefrom").val()+"_"+$("#dateto").val()
                },
                {
                    extend: 'pdfHtml5',
                    title: "AuditTrail"+$("#datefrom").val()+"_"+$("#dateto").val(),
                    message: 'List of transactions made through the system \nDate: '+$("#datefrom").val()+"_"+$("#dateto").val() +"\nGenerated by: <?php echo $this->session->userdata('name');?>",
                    orientation: 'landscape'
                }
            ]
        });
    }
</script>