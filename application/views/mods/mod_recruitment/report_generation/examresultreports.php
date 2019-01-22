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
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;List of Examinees</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Request Number:</label>
                                            <select class="form-control" id="request1">
                                                <option selected disabled>- Select Request Number -</option>
                                                <option value="POS1">2018-001</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <label class="control-label" id="label1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg1" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont1" style="display: none">
                                                <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>TIMESTAMP</th>
                                                        <th>APPLICANT CODE</th>
                                                        <th>NAME</th>
                                                        <th>ADDRESS</th>
                                                        <th>POSITION APPLIED</th>
                                                        <th>REQUEST NUMBER</th>
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
                                <a id="btnReport2" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Examination Result Ranking</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Request Number:</label>
                                            <select class="form-control" id="request2">
                                                <option selected disabled>- Select Request Number -</option>
                                                <option value="POS1">2018-001</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <label class="control-label" id="label1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h5 id="tblmsg2" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont2" style="display: none">
                                                <table id="tblreport2" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>RANK</th>
                                                        <th>APPLICANT CODE</th>
                                                        <th>NAME</th>
                                                        <th>TIMESTAMP</th>
                                                        <th>POSITION APPLIED</th>
                                                        <th>GRADE</th>
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
                                <a id="btnReport3" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Examinees' Ranking Per Competency</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Competency:</label>
                                            <select class="form-control" id="competency1">
                                                <option selected disabled>- Select Competency -</option>
                                                <option value="POS1">Exemplifying Integrity</option>
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
                                                        <th>RANK</th>
                                                        <th>APPLICANT CODE</th>
                                                        <th>NAME</th>
                                                        <th>EXAM DATE</th>
                                                        <th>POSITION APPLIED</th>
                                                        <th>GRADE</th>
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
                                <a id="btnReport4" class="btn btn-secondary font-weight-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    <i class="fa fa-angle-right"></i>&nbsp;&nbsp;Summary of Rating Per Evaluator</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Evaluator:</label>
                                            <select class="form-control" id="evaluator">
                                                <option selected disabled>- Select Evaluator -</option>
                                                <option value="POS1">Evaluator 1</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Request Number:</label>
                                            <select class="form-control" id="request3">
                                                <option selected disabled>- Select Request Number -</option>
                                                <option value="POS1">2018-001</option>
                                            </select>
                                        </div>
                                        <div class="form-group" align="left" style="padding-top:5px;">
                                            <br>
                                            <button class="btn btn-success" id="btnReport4Generate">Generate Report</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div id="divApplicantDetails">
                                                <br>
                                                <label style="font-size:13pt;" class="control-label">Applicant Code: <span style="font-weight: 700 !important;" id="lblapplicantcode"></span></label><br>
                                                <label style="font-size:13pt;" class="control-label">Applicant Name: <span style="font-weight: 700 !important;" id="lblapplicantname"></span></label>
                                            </div>
                                            <h5 id="tblmsg4" style="display:none"></h5>
                                            <div class="table-responsive" id="tblcont4" style="display: none">
                                                <table id="tblreport4" class="display compact responsive" cellspacing="0" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <th>COMPETENCIES</th>
                                                        <th>REQUIRED PROFECIENCY LEVEL</th>
                                                        <th>APPLICANT'S RATING</th>
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

        $("#panel_examresultreports").addClass("selected_panel");

    });

    $("#btnReport1").click(function(){
        $("#request1").prop('selectedIndex',0);
        $("#tblcont1").hide();
    });
    $("#request1").change(function(){
        loadData1($(this).val());
    });

    $("#btnReport2").click(function(){
        $("#request2").prop('selectedIndex',0);
        $("#tblcont2").hide();
    });
    $("#request2").change(function(){
        loadData2($(this).val());
    });

    $("#btnReport3").click(function(){
        $("#competency1").prop('selectedIndex',0);
        $("#tblcont3").hide();
    });
    $("#competency1").change(function(){
        loadData3($(this).val());
    });

    $("#btnReport4").click(function(){
        $("#request3").prop('selectedIndex',0);
        $("#evaluator").prop('selectedIndex',0);
        $("#tblcont4").hide();
        $("#divApplicantDetails").hide();
    });

    $("#btnReport4Generate").click(function(){
        if($("#evaluator option:selected").val() == "- Select Evaluator -"){
            messageDialogModal("Required","Please Select Evaluator");
        } else if($("#request3 option:selected").val() == "- Select Request Number -"){
            messageDialogModal("Required","Please Select Request Number");
        } else {
            loadData4($("#evaluator option:selected").val(),$("#request3 option:selected").val());
        }
    });


    function loadData1(request){
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>examresultreports/report1",
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
                {"data":"APPLICANTCODE"},
                {"data":"NAME"},
                {"data":"ADDRESS"},
                {"data":"POSITION"},
                {"data":"REQUESTNUMBER"}
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
                            .text( 'List of Examinees' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListExaminees"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ListExaminees"+moment().format("YYYY-MM-DD"),
                    message: 'List of Examinees',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData2(request){
        $("#loadingmodal").modal("show");
        $("#tblreport2").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "asc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>examresultreports/report2",
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
                {"data":"RANK"},
                {"data":"APPLICANTCODE"},
                {"data":"NAME"},
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"POSITIONAPPLIED"},
                {"data":"GRADE"}
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
                            .text( 'Examination Ranking' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ExaminationRanking"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ExaminationRanking"+moment().format("YYYY-MM-DD"),
                    message: 'Examination Ranking',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData3(competency){
        $("#loadingmodal").modal("show");
        $("#tblreport3").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[ 0, "asc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>examresultreports/report3",
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
                {"data":"RANK"},
                {"data":"APPLICANTCODE"},
                {"data":"NAME"},
                {"data":function(data){
                    return moment(data.TIMESTAMP).format('MMM DD YYYY hh:mm:ss a');
                }},
                {"data":"POSITIONAPPLIED"},
                {"data":"GRADE"}
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
                            .text( 'Examination Ranking Per Competency' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ExaminationRankingPerCompetency"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "ExaminationRankingPerCompetency"+moment().format("YYYY-MM-DD"),
                    message: 'Examination Ranking Per Competency',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }

    function loadData4(evaluator,request){
        $("#loadingmodal").modal("show");
        $("#tblreport4").dataTable({
            "destroy":true,
            "responsive" : true,
            "oLanguage": {
                "sSearch": "Search:"
            },
//            "order": [[ 0, "asc" ]],
            "ajax":{
                "url":"<?php echo base_url(); ?>examresultreports/report4",
                "type": "POST",
                "dataType": "json",
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#loadingmodal').modal('hide');
                        $('#tblcont4').show();
                        $("#tblmsg4").hide();
                        for(var keys in json.details){
                            $("#lblapplicantcode").text(json.details[keys].APPLICANTCODE);
                            $("#lblapplicantname").text(json.details[keys].NAME);
                        }
                        $("#divApplicantDetails").show();
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
                {"data":"COMPETENCY"},
                {"data":"PROFICIENCYLEVEL"},
                {"data":"RATING"}
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
                            .text( 'Summary of Rating Per Evaluator' )
                            .css( 'font-size', '15pt' );
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "SummaryOfRating"+moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "SummaryOfRating"+moment().format("YYYY-MM-DD"),
                    message: 'Summary of Rating Per Evaluator',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
</script>