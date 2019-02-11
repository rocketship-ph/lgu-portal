<style>
    .panel-menu{
        min-height: 90px;
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
                    <a href="<?php echo base_url();?>reports/examratingsummary" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Examination Rating Summary Report
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>main/reports" style="height: 90px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        Report Generation Menu
                    </a>
                </div>
            </td>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <legend>Examination Rating Summary Report</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label class="control-label">Request Number</label>
                            <select class="form-control clearField" id="requestnumber">
                                <option selected disabled>- Select Request Number -</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Evaluator</label>
                            <select class="form-control clearField" id="evaluator">
                                <option selected disabled>- Select Evaluator -</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Applicant Code</label>
                            <select class="form-control clearField" id="applicantcode">
                                <option selected disabled>- Select Applicant Code -</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group" align="left" style="padding-top: 5px;" >
                            <br>
                            <button class="btn btn-success" id="btnGenerate">Generate Report</button>
                            <button class="btn btn-default" id="btnClear">Clear</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div id="tblcont1" style="display: none">
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <button class="btn btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;Print</button>
                            </div>
                            <div class="col-md-12">
                                <table style="width: 100%">
                                    <tr>
                                        <td align="left">
                                            <h4 style="font-weight: bold;margin-bottom: 0" id="applicantname"></h4>
                                            <h4 style="margin-top: 0;" id="appcode"></h4>
                                        </td>
                                        <td align="right">
                                            <h5 style="margin-top: 0;margin-bottom: 0" id="lblreqnum"></h5>
                                            <h5 style="font-weight: normal;margin-top: 0" id="lbleval"></h5>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <table id="tblreport1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>COMPETENCIES</th>
                                <th>REQUIRED PROFICIENCY LEVEL</th>
                                <th>APPLICANT'S RATING</th>
                            </tr>
                            </thead>
                            <tbody id="tblbody">
                            </tbody>
                        </table>
                    </div>
                    <br>
                 <table cellspacing="0" width="100%">
                    <tr>
                        <td>
                            <div id="divGraph"></div>
                        </td>
                    </tr>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $GLOBALS['googlecharts'];?>"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
        google.charts.load('current', {packages: ['corechart', 'bar']});
        $("#panel_requestpersonnelreports").addClass("selected_panel");
        loadRequestnumbers();
    });

    function loadRequestnumbers(){
        var select = $("#requestnumber");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/examrequestnumbers",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Request Number Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
                select.append('<option selected disabled>- No Request Number Available -</option>');
            }
        });
    }

    $("#requestnumber").change(function(){
        var reqnum = $("#requestnumber option:selected").val();
        var select = $("#evaluator");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/examevaluators",
            type: "POST",
            data: {
                "REQUESTNUMBER":reqnum
            },
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Evaluator -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].username+'">'+result.details[keys].evaluator+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Evaluator Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
                select.append('<option selected disabled>- No Evaluator Available -</option>');
            }
        });
    });

    $("#evaluator").change(function(){
        var eval = $("#evaluator option:selected").val();
        var reqnum = $("#requestnumber option:selected").val();
        var select = $("#applicantcode");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/examapplicantcodes",
            type: "POST",
            data: {
                "REQUESTNUMBER":reqnum,
                "EVALUATOR":eval
            },
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var keys in result.details){
                        if(result.details[keys].applicantcode!=""){
                           select.append('<option value="'+result.details[keys].applicantcode+'">'+result.details[keys].applicantcode+'</option>'); 
                        }
                        
                    }
                } else {
                    select.append('<option selected disabled>- No Applicant Code Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
                select.append('<option selected disabled>- No Applicant Code Available -</option>');
            }
        });
    });

    $("#btnGenerate").click(function(){
        $("#loadingmodal").modal("show");
        var eval = $("#evaluator option:selected").val();
        var reqnum = $("#requestnumber option:selected").val();
        var appcode = $("#applicantcode option:selected").val();
        $.ajax({
            url: "<?php echo base_url(); ?>reportgenerationmanagement/examratingsummaryreport",
            type: "POST",
            data: {
                "REQUESTNUMBER":reqnum,
                "EVALUATOR":eval,
                "APPLICANTCODE":appcode
            },
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    $('#tblcont1').show();
                    $("#tblmsg1").hide();
                    var tbody = $("#tblbody");
                    tbody.empty();
                    var tr = '';
                    $("#lblreqnum").text(reqnum);
                    $("#lbleval").text("Evaluator: "+$("#evaluator option:selected").text());
                    for(var keys in result.details){
                        $("#appcode").text(result.details[keys].applicantcode);
                        $("#applicantname").text(result.details[keys].applicantname);
                        tr += '<tr><td>'+result.details[keys].competency+'</td><td>'+(result.details[keys].level).toUpperCase()+'</td><td>'+result.details[keys].score+'</td></tr>';
                    }
                    tbody.append(tr);
                    generateChart(result.details);
                } else {
                    $('#loadingmodal').modal('hide');
                    $("#tblcont1").hide();
                    $("#tblmsg1").text("No Data Found");
                    $("#tblmsg1").show();
                }
            },
            error: function(e){
                console.log(e);
                select.append('<option selected disabled>- No Applicant Code Available -</option>');
            }
        });
    });
    function composeData(items) {
    var item = [];
    var number = [];
    var data = [];
    for(var i=0;i<items.length;i++) {
        var value = items[i]['competency'];
        if(value!=""||value!=null||value!="null"){
            item.push(value);
            number.push(items[i]['score']);
            var temp = [];
            temp.push(value);
            temp.push(parseInt(items[i]['score']));
            data.push(temp);
        }
    }
    console.log(JSON.stringify(data));
    return data;
}

function generateChart(data){
    $("#divGraph").show();
    var chartObj = new Object();
    chartObj['chartName'] = 'engDiv';
    chartObj['chartTitle'] = 'Examination Rating Summary';
    chartObj['data'] = composeData(data);
    chartObj['color'] = ['#0D913E'];
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Competency');
        data.addColumn('number', 'Rating');

        data.addRows(chartObj.data);
        var options = {
            title: chartObj.chartTitle,
            chartArea: {
                width: '65%',
                right: 15,
                height: '500px'
            },
            colors: ['#0D913E'],
            hAxis: {
                title: '',
                minValue: 0,
                format: ' '
            },
            legend: 'none',
            bar: {groupWidth: '50%'}
        };
        var chart = new google.visualization.BarChart(document.getElementById('divGraph'));   
        var height = data.getNumberOfRows() * 41 + 30;
        $("#divGraph").height(height);
        chart.draw(data, options);
    }
}
    $("#btnPrint").click(function(){
        $("#tblcont1").prepend( '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table>');
        $("#btnPrint").css('display','none');
        $("#tblcont1")
            .append($("#divGraph").html());
        $("#tblcont1").print({
            noPrintSelector: ".divPrint"
        });
        $("#divLogo").css('display','none');
        $("#btnPrint").show();
        $("#divGraph").hide();


    });
    $("#btnClear").click(function(){
       clearField();
        $("#tblcont1").hide();
    });
</script>