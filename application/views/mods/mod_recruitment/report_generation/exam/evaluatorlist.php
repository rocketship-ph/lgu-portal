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
                    <a href="<?php echo base_url();?>reports/evaluatorlist" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        List of Evaluators Report
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
            <legend>List of Evaluators</legend>
            <div class="row">
                <div class="col-md-12">

                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>EVALUATOR NAME</th>
                                <th>USERLEVEL</th>
                                <th>NUMBER OF REQUESTS ASSIGNED</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                      <br>
                 <table cellspacing="0" width="100%">
                    <tr>
                        <td>
                            <div id="divGraph" ></div>
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
        loadReport();
    });

    //load data
    function loadReport() {
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy": true,
            "responsive": true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[0, "asc"]],
            "ajax": {
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/evaluatorlist",
                "type": "POST",
                "dataType": "json",
                "data": {

                },
                dataSrc: function (json) {
                    if (json.Code == "00") {
                        $('#loadingmodal').modal('hide');
                        $('#tblcont1').show();
                        $("#tblmsg1").hide();
                        generateChart(json.details);
                        return json.details;
                    } else {
                        $('#loadingmodal').modal('hide');
                        $("#tblcont1").hide();
                        $("#tblmsg1").text("No Data Found");
                        $("#tblmsg1").show();
                    }
                }
            },
            "columns": [
                {"data": "evaluatorname"},
                {"data": "userlevel"},
                {"data": "assigncount"}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "Date: " + moment().format("MMM DD YYYY hh:mm:ss A"),
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                        $(win.document.body).find('h1')
                            .text('List of Evaluators')
                            .css('font-size', '15pt');

                        $(win.document.body)
                            .prepend('<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table>');
                        $(win.document.body)
                            .append($("#divGraph").html());
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "EvaluatorsList" + moment().format("YYYY-MM-DD")
                }
            ]
        });
    }
     function composeData(items) {
    var item = [];
    var number = [];
    var data = [];
    for(var i=0;i<items.length;i++) {
        var value = items[i]['evaluatorname'];
        if(value!=""||value!=null||value!="null"){
            item.push(value);
            number.push(items[i]['assigncount']);
            var temp = [];
            temp.push(value);
            temp.push(parseInt(items[i]['assigncount']));
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
    chartObj['chartTitle'] = 'Evaluator List';
    chartObj['data'] = composeData(data);
    chartObj['color'] = ['#0D913E'];
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Evaluator');
        data.addColumn('number', 'No. of Requests Assigned');

        data.addRows(chartObj.data);
        var options = {
            title: chartObj.chartTitle,
            chartArea: {
                width: '65%',
                right: 15
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
</script>