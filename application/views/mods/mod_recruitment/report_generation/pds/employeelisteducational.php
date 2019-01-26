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
                    <a href="<?php echo base_url();?>reports/employeelisteducational" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Employee List - Educational Background Report
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
        <div class="col-md-12" >
            <legend>Employee List Based on Educational Background</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="control-label">Highest Education Level</label>
                            <select class="form-control clearField" id="education">
                                <option selected disabled>- Select Education Level -</option>
                                <option value="ALL">ALL</option>
                                <option value="ELEMENTARY">Elementary Level</option>
                                <option value="HIGHSCHOOL">High School Level</option>
                                <option value="VOCATIONAL">Vocational Level</option>
                                <option value="COLLEGE">College Level</option>
                                <option value="GRADUATE">Graduate School</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group divPrint" align="right" style="padding-top: 5px;display: none">
                            <br>
                            <button class="btn btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;Print</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="divPrint">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                            <div class="col-md-12">
                                <br>
                               <div class="row">
                                   <div class="col-md-6" align="left" style="padding-left: 0">
                                       <p><b>Employee List Based on Educational Level - <span id="lbleducation"></span></b><br>
                                           <span id="lbldate"></span>
                                       </p>
                                   </div>
                               </div>
                            </div>
                        <table id="tblreport1" class="cell-border display compact responsive tbl row-border" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>EMPLOYEE NAME</th>
                                <th>POSITION</th>
                                <th>DEPARTMENT</th>
                                <th>ELEMENTARY</th>
                                <th>HIGH SCHOOL</th>
                                <th>VOCATIONAL</th>
                                <th>COLLEGE</th>
                                <th>GRADUATE SCHOOL</th>
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
          google.charts.load('current', {packages: ['corechart', 'bar']});
        $("#panel_requestpersonnelreports").addClass("selected_panel");
    });


    $("#education").change(function(){
        var education = $("#education option:selected").val();
        loadReport(education);
    });

    //load data
    function loadReport(data) {
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy": true,
            "responsive": true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[0, "asc"]],
            "ajax": {
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/employeelisteducational",
                "type": "POST",
                "dataType": "json",
                "data": {
                    "EDUCATION":data
                },
                dataSrc: function (json) {
                    console.log(json);
                    if (json.Code == "00") {
                        $('#loadingmodal').modal('hide');
                        $('#tblcont1').show();
                        $('.divPrint').show();
                        $("#tblmsg1").hide();
                        $("#lbleducation").text(data);
                        $("#lbldate").text(moment().format("MMM DD YYYY hh:mm:ss A"));
                          generateChart(json.details);
                        return json.details;
                    } else {
                        $('#loadingmodal').modal('hide');
                        $("#tblcont1").hide();
                        $('.divPrint').hide();
                        $("#tblmsg1").text("No Data Found");
                        $("#tblmsg1").show();
                    }
                }
            },
            "columns": [
                {"data": function(data){
                    return data.lastname+", "+data.firstname+" "+data.middlename;
                }},
                {"data": "currentposition"},
                {"data": "department"},
                {"data": function(data){
                    var json = JSON.parse(data.elementary);
                    var p = "";
                    if(json.school == "" || json.school == null || json.school == undefined){
                        p = "-";
                    } else {
                        p = '<p>' +
                        '<b>School: </b>'+json.school+'&nbsp;<br>' +
                        '<b>Year Graduated: </b>'+json.yeargraduated+'&nbsp;<br>' +
                        '<b>From: </b>'+json.from+'&nbsp;<br>' +
                        '<b>To: </b>'+json.to+'&nbsp;<br>' +
                        '<b>Awards: </b>'+json.awards+'&nbsp;<br>' +
                        '</p>';
                    }
                     return p;
                }},
                {"data": function(data){
                    var json = JSON.parse(data.highschool);
                    var p = "";
                    if(json.school == "" || json.school == null || json.school == undefined){
                        p = "-";
                    } else {
                        p = '<p>' +
                        '<b>School: </b>'+json.school+'&nbsp;<br>' +
                        '<b>Year Graduated: </b>'+json.yeargraduated+'&nbsp;<br>' +
                        '<b>From: </b>'+json.from+'&nbsp;<br>' +
                        '<b>To: </b>'+json.to+'&nbsp;<br>' +
                        '<b>Awards: </b>'+json.awards+'&nbsp;<br>' +
                        '</p>';
                    }
                    return p;
                }},
                {"data": function(data){
                    var json = JSON.parse(data.vocational);
                    var p = "";
                    if(json.school == "" || json.school == null || json.school == undefined){
                        p = "-";
                    } else {
                        p = '<p>' +
                        '<b>School: </b>'+json.school+'&nbsp;<br>' +
                        '<b>Degree: </b>'+json.degree+'&nbsp;<br>' +
                        '<b>Year Graduated: </b>'+json.yeargraduated+'&nbsp;<br>' +
                        '<b>From: </b>'+json.from+'<br>' +
                        '<b>To: </b>'+json.to+'&nbsp;<br>' +
                        '<b>Awards: </b>'+json.awards+'&nbsp;<br>' +
                        '</p>';
                    }
                    return p;
                }},
                {"data": function(data){
                    var json = JSON.parse(data.college);
                    var p = "";
                    if(json.school == "" || json.school == null || json.school == undefined){
                        p = "-";
                    } else {
                        p = '<p>' +
                        '<b>School: </b>'+json.school+'&nbsp;<br>' +
                        '<b>Degree: </b>'+json.degree+'&nbsp;<br>' +
                        '<b>Year Graduated: </b>'+json.yeargraduated+'&nbsp;<br>' +
                        '<b>From: </b>'+json.from+'&nbsp;<br>' +
                        '<b>To: </b>'+json.to+'&nbsp;<br>' +
                        '<b>Awards: </b>'+json.awards+'&nbsp;<br>' +
                        '</p>';
                    }
                    return p;
                }},
                {"data": function(data){
                    var json = JSON.parse(data.graduate);
                    var p = "";
                    if(json.school == "" || json.school == null || json.school == undefined){
                        p = "-";
                    } else {
                        p = '<p>' +
                        '<b>School: </b>'+json.school+'&nbsp;<br>' +
                        '<b>Degree: </b>'+json.degree+'&nbsp;<br>' +
                        '<b>Year Graduated: </b>'+json.yeargraduated+'&nbsp;<br>' +
                        '<b>From: </b>'+json.from+'&nbsp;<br>' +
                        '<b>To: </b>'+json.to+'&nbsp;<br>' +
                        '<b>Awards: </b>'+json.awards+'&nbsp;<br>' +
                        '</p>';
                    }
                    return p;
                }}
            ],
            "sDom": 't'
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
    chartObj['chartTitle'] = 'Employee List';
    chartObj['data'] = composeData(data,'department');
    chartObj['color'] = ['#0D913E'];
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Department');
        data.addColumn('number', 'Total Number of Employee');

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
        var chart = new google.visualization.BarChart(document.getElementById('divGraph'));   var height = data.getNumberOfRows() * 41 + 30;
        $("#divGraph").height(height);
        chart.draw(data, options);
    }
}
    $("#btnPrint").click(function(){

        $("#divPrint").prepend( '<table id="divLogo" align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>');
        $("#divPrint").print();
        $("#divLogo").css('display','none');
    });
</script>
<style type="text/css">
    @media print {
    }

</style>