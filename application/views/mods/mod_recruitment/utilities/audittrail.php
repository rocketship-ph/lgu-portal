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
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_utilities").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_audittrail").addClass("selected_panel");

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