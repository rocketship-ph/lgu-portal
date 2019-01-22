<style>
    .panel-menu{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    .font-weight-bold{
        font-weight: 700 !important;
        color: #444444 !important;
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Report Generation Menu</h4>
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
                <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>personnelrequestreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_personnel.png" height="40px">
                        <br>
                        Request Personnel Report
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>jobapplicantreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_applicant.png" height="40px">
                        <br>
                        Job Applicant Reports
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_examresultreports">
                    <a  href="<?php echo base_url();?>examresultreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_examination.png" height="40px">
                        <br>
                        Examination Result Report
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
            <legend>Select and Generate Reports</legend>
            <div class="row">
                <div class="col-md-12" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport1" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Number of Requests for New Personnel</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 id="tblmsg1" style="display:none"></h5>
                                        <div class="table-responsive" id="tblcont1" style="display: none">
                                            <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th>TIMESTAMP</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>POSITION</th>
                                                    <th>STATUS</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport2" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Number of Approved Personnel Request</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 id="tblmsg2" style="display:none"></h5>
                                        <div class="table-responsive" id="tblcont2" style="display: none">
                                            <table id="tblreport2" class="display compact responsive" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th>TIMESTAMP</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>POSITION</th>
                                                    <th>STATUS</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport3" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Number of Rejected Personnel Request</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 id="tblmsg3" style="display:none"></h5>
                                        <div class="table-responsive" id="tblcont3" style="display: none">
                                            <table id="tblreport3" class="display compact responsive" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th>TIMESTAMP</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>POSITION</th>
                                                    <th>STATUS</th>
                                                    <th>REMARKS</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport4" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of New Personnel Requestors</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 id="tblmsg4" style="display:none"></h5>
                                        <div class="table-responsive" id="tblcont4" style="display: none">
                                            <table id="tblreport4" class="display compact responsive" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th>TIMESTAMP</th>
                                                    <th>REQUESTOR NAME</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>POSITION</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>STATUS</th>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_requestpersonnelreports").addClass("selected_panel");

    });

    $("#btnReport1").click(function(){
        loadData1();
    });

    $("#btnReport2").click(function(){
        loadData2();
    });

    $("#btnReport3").click(function(){
        loadData3();
    });

    $("#btnReport4").click(function(){
        loadData4();
    });




    //load data
    function loadData1(){
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>personnelrequestreports/report1",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont1').show();
                        $("#tblmsg1").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont1").hide();
                        $("#tblmsg1").text("No Data Found");
                        $("#tblmsg1").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"DEPARTMENT"},
                {"data":"POSITION"},
                {"data":"STATUS"}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "Date: "+moment().format("MMM DD YYYY hh:mm:ss A"),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Number of Request for New Personnel' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "RequestForNewPersonnel"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "RequestForNewPersonnel"+moment().format("YYYY-MM-DD"),
                    message: 'Number of Requests for New Personnel',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData2(){
        $("#loadingmodal").modal("show");
        $("#tblreport2").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>personnelrequestreports/report2",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont2').show();
                        $("#tblmsg2").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont2").hide();
                        $("#tblmsg2").text("No Data Found");
                        $("#tblmsg2").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"DEPARTMENT"},
                {"data":"POSITION"},
                {"data":"STATUS"}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "Date: "+moment().format("MMM DD YYYY hh:mm:ss A"),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Number of Approved Personnel Request' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ApprovedPersonnelRequest"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ApprovedPersonnelRequest"+moment().format("YYYY-MM-DD"),
                    message: 'Number of Approved Personnel Request',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData3(){
        $("#loadingmodal").modal("show");
        $("#tblreport3").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>personnelrequestreports/report3",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont3').show();
                        $("#tblmsg3").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont3").hide();
                        $("#tblmsg3").text("No Data Found");
                        $("#tblmsg3").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"DEPARTMENT"},
                {"data":"POSITION"},
                {"data":"STATUS"},
                {"data":"REMARKS"}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "Date: "+moment().format("MMM DD YYYY hh:mm:ss A"),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'Number of Rejected Personnel Request' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "RejectedPersonnelRequest"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "RejectedPersonnelRequest"+moment().format("YYYY-MM-DD"),
                    message: 'Number of Rejected Personnel Request',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData4(){
        $("#loadingmodal").modal("show");
        $("#tblreport4").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>personnelrequestreports/report4",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont4').show();
                        $("#tblmsg4").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont4").hide();
                        $("#tblmsg4").text("No Data Found");
                        $("#tblmsg4").show();
                    }
                }
            },
            "columns":[
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"NAME"},
                {"data":"DEPARTMENT"},
                {"data":"POSITION"},
                {"data":"DESCRIPTION"},
                {"data":"STATUS"}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "Date: "+moment().format("MMM DD YYYY hh:mm:ss A"),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                        $(win.document.body).find( 'h1' )
                            .text( 'List of Requestors for New Personnel' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "NewPersonnelRequestor"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "NewPersonnelRequestor"+moment().format("YYYY-MM-DD"),
                    message: 'List of Requestors for New Personnel',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
</script>