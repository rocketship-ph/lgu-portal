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
                                <a id="btnReport1" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Qualified Applicants for the Position Approved</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position1">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg1" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont1" style="display: none">
                                                <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>DATE APPLIED</th>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>HIGHEST DEGREE</th>
                                                        <th>POSITION APPLIED</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport2" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Number of Applicants Applied for the New Position</a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h5 id="tblmsg2" style="display:none"></h5>
                                    <div class="table-responsive" id="tblcont2" style="display: none">
                                        <table id="tblreport2" class="display compact responsive" cellspacing="0" width="100%" >
                                            <thead>
                                            <tr>
                                                <th>TOTAL # OF APPLICANTS</th>
                                                <th>APPLICANT INSIDE MUNICIPAL OFFICE</th>
                                                <th>APPLICANTS OUTSIDE MUNICIPAL OFFICE</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport3" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Non Qualified Applicants for the Position Approved</a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position3">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg3" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont3" style="display: none">
                                                <table id="tblreport3" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>DATE APPLIED</th>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>HIGHEST DEGREE</th>
                                                        <th>POSITION APPLIED</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport4" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Non Local Applicants for the Position Approved</a>
                            </h4>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position4">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg4" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont4" style="display: none">
                                                <table id="tblreport4" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>DATE APPLIED</th>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>HIGHEST DEGREE</th>
                                                        <th>POSITION APPLIED</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport5" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Qualified Employees for the Position Approved</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position5">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg5" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont5" style="display: none">
                                                <table id="tblreport5" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>CURRENT POSITION</th>
                                                        <th>AVAILABLE POSITION</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport6" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Employees Applied for the New Position</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position6">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg6" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont6" style="display: none">
                                                <table id="tblreport6" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>CURRENT POSITION</th>
                                                        <th>POSITION APPLIED</th>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a id="btnReport7" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Employees Who Received Notification</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position:</label>
                                            <select class="form-control" id="position7">
                                                <option selected disabled>- Select Position -</option>
                                                <option value="POS1">Administrative Aide III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg7" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont7" style="display: none">
                                                <table id="tblreport7" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>CURRENT POSITION</th>
                                                        <th>REASON FOR NOT APPLYING</th>
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
</div>

<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_applicantreports").addClass("selected_panel");

    });

    $("#btnReport1").click(function(){
        $("#position1").prop('selectedIndex',0);
        $("#tblcont1").hide();
    });
    $("#position1").change(function(){
       loadData1($(this).val());
    });

    $("#btnReport2").click(function(){
        loadData2();
    });

    $("#btnReport3").click(function(){
        $("#position3").prop('selectedIndex',0);
        $("#tblcont3").hide();
    });
    $("#position3").change(function(){
        loadData3($(this).val());
    });

    $("#btnReport4").click(function(){
        $("#position4").prop('selectedIndex',0);
        $("#tblcont4").hide();
    });
    $("#position4").change(function(){
        loadData4($(this).val());
    });

    $("#btnReport5").click(function(){
        $("#position5").prop('selectedIndex',0);
        $("#tblcont5").hide();
    });
    $("#position5").change(function(){
        loadData5($(this).val());
    });

    $("#btnReport6").click(function(){
        $("#position6").prop('selectedIndex',0);
        $("#tblcont6").hide();
    });
    $("#position6").change(function(){
        loadData6($(this).val());
    });

    $("#btnReport7").click(function(){
        $("#position7").prop('selectedIndex',0);
        $("#tblcont7").hide();
    });
    $("#position7").change(function(){
        loadData7($(this).val());
    });

    function loadData1(position){
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report1",
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
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"HIGHESTDEGREE"},
                {"data":"POSITIONAPPLIED"}
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
                            .text( 'List of Qualified Applicants for the Position Approved' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfQualifiedApplicants"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfQualifiedApplicants"+moment().format("YYYY-MM-DD"),
                    message: 'List of Qualified Applicants for the Position Approved',
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
                "url":"<?php echo base_url(); ?>jobapplicantreports/report2",
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
                {"data":"TOTALAPPLICANTS"},
                {"data":"MUNICIPALAPPLICANT"},
                {"data":"OUTSIDEAPPLICANT"}
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
                            .text( 'Total Number of Applicants' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "TotalNumberOfApplicants"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "TotalNumberOfApplicants"+moment().format("YYYY-MM-DD"),
                    message: 'Total Number of Applicants',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData3(position){
        $("#loadingmodal").modal("show");
        $("#tblreport3").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report3",
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
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"HIGHESTDEGREE"},
                {"data":"POSITIONAPPLIED"}
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
                            .text( 'List of Non Qualified Applicants for the Position Approved' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfNonQualifiedApplicants"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfNonQualifiedApplicants"+moment().format("YYYY-MM-DD"),
                    message: 'List of Non Qualified Applicants for the Position Approved',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData4(position){
        $("#loadingmodal").modal("show");
        $("#tblreport4").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report4",
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
                {"data":"ADDRESS"},
                {"data":"HIGHESTDEGREE"},
                {"data":"POSITIONAPPLIED"}
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
                            .text( 'List of Non Local Applicants for the Position Approved' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfNonLocalApplicants"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfNonLocalApplicants"+moment().format("YYYY-MM-DD"),
                    message: 'List of Non Local Applicants for the Position Approved',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData5(position){
        $("#loadingmodal").modal("show");
        $("#tblreport5").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report5",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont5').show();
                        $("#tblmsg5").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont5").hide();
                        $("#tblmsg5").text("No Data Found");
                        $("#tblmsg5").show();
                    }
                }
            },
            "columns":[
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"CURRENTPOSITION"},
                {"data":"AVAILABLEPOSITION"}
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
                            .text( 'List of Qualified Employees for the Position Approved' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfQualifiedEmployees"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfQualifiedEmployees"+moment().format("YYYY-MM-DD"),
                    message: 'List of Qualified Employees for the Position Approved',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData6(position){
        $("#loadingmodal").modal("show");
        $("#tblreport6").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report6",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont6').show();
                        $("#tblmsg6").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont6").hide();
                        $("#tblmsg6").text("No Data Found");
                        $("#tblmsg6").show();
                    }
                }
            },
            "columns":[
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"CURRENTPOSITION"},
                {"data":"POSITIONAPPLIED"}
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
                            .text( 'List of Employees Who Applied for the Position Approved' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfEmployeesApplied"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfEmployeesApplied"+moment().format("YYYY-MM-DD"),
                    message: 'List of Employees Who Applied for the Position Approved',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData7(position){
        $("#loadingmodal").modal("show");
        $("#tblreport7").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>jobapplicantreports/report7",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont7').show();
                        $("#tblmsg7").hide();
                        return json.details;
                    }else{
                        $('#loadingmodal').modal('hide');
                        $("#tblcont7").hide();
                        $("#tblmsg7").text("No Data Found");
                        $("#tblmsg7").show();
                    }
                }
            },
            "columns":[
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"CURRENTPOSITION"},
                {"data":"REASON"}
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
                            .text( 'List of Employees Who Received Notification' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfNotifiedEmployees"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListOfNotifiedEmployees"+moment().format("YYYY-MM-DD"),
                    message: 'List of Employees Who Received Notification',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
</script>