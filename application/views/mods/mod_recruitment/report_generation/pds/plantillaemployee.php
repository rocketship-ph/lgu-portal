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
                    <a href="<?php echo base_url();?>reports/plantillaemployee" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Employee List Report
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
            <legend>List of Plantilla Employees</legend>
            <div class="row">
                <div class="col-md-12">

                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>EMPLOYEE NAME</th>
                                <th>POSITION</th>
                                <th>TYPE</th>
                                <th>DEPARTMENT</th>
                                <th>COMPLETE ADDRESS</th>
                                <th>CONTACT #</th>
                                <th>EMAIL</th>
                                <th>BIRTHDAY</th>
                                <th>GENDER</th>
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

        $("#panel_requestpersonnelreports").addClass("selected_panel");
            google.charts.load('current', {packages: ['corechart', 'bar']});
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
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/employeelisttype",
                "type": "POST",
                "dataType": "json",
                "data": {
                    "TYPE":"PLANTILLA"
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
                {"data": function (data) {
                    return data.firstname + " " + data.middlename + " " + data.lastname}
                },
                {"data": "currentposition"},
                {"data": "currentemploymenttype"},
                {"data": "department"},
                {"data": function(data){
                    return data.residentialaddress + ", Brgy. "+data.residentialbrgy + ", "+data.residentialcity+", "+data.residentialprovince;
                }},
                {"data": "contactnumber"},
                {"data": "email"},
                {"data": function(data){
                    return moment(data.dateofbirth,'MM/DD/YYYY').format("MMM DD YYYY");
                }},
                {"data": "sex"}
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
                            .text('Employee List - PLANTILLA')
                            .css('font-size', '15pt');
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "PlantillaEmployeeList" + moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "PlantillaEmployeeList" + moment().format("YYYY-MM-DD"),
                    message: 'Employee List - PLANTILLA',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
       function composeData(items, prop) {
    var item = [];
    var number = {}
    var data = [];
    for(var i=0;i<items.length;i++) {
        var value = items[i][prop];
        if(value!=""||value!=null||value!="null"){
            item.push(value);
        }
    }
    item.sort();
   var current = null;
    var cnt = 0;
    for (var i = 0; i < item.length; i++) {
        if (item[i] != current) {
            if (cnt > 0) {
                var temp = [];
                temp.push(current);
                temp.push(cnt);
                data.push(temp);
            }
            current = item[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }
    if (cnt > 0) {
        var temp = [];
        temp.push(current);
        temp.push(cnt);
        data.push(temp);
    }
    console.log(JSON.stringify(data));
    return data;
}

function generateChart(data){
    var chartObj = new Object();
    chartObj['chartName'] = 'engDiv';
    chartObj['chartTitle'] = 'Plantilla Employee List';
    chartObj['data'] = composeData(data,'department');
    chartObj['color'] = ['#0D913E'];
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Department');
        data.addColumn('number', 'Total Number of Plantilla Employee');

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
            bar: {groupWidth: '95%'}
        };
        var chart = new google.visualization.BarChart(document.getElementById('divGraph'));   
        var height = data.getNumberOfRows() * 41 + 30;
        $("#divGraph").height(height);
        chart.draw(data, options);
    }
}
</script>