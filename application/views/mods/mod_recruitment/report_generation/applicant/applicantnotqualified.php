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
                    <a href="<?php echo base_url();?>reports/applicantqualified" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Non-Qualified Applicants Report
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>main/reports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
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
            <legend>Non-Qualified Applicants Report</legend>
            <div class="row">
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>DATE APPLIED</th>
                                <th>REQUEST NUMBER</th>
                                <th>APPLICANT NAME</th>
                                <th>POSITION APPLIED</th>
                                <th>DEPARTMENT</th>
                                <th>QUALIFIED</th>
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
<div class="modal fade" id="lettermodal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Letter for Non-Qualified Applicant</legend>
                <div class="row">
                    <div id="divletterbody" class="col-md-12" style="height: 430px !important;overflow-y: auto;">
                        <p id="letterbody"></p>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info" id="btnPrint">PRINT</button>
                            <button type="button" class="btn btn-success" id="btnEmail">SEND AS E-MAIL</button>

                        </div>
                    </div>
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
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/qualifiedapplicants",
                "type": "POST",
                "dataType": "json",
                "data": {
                    "ISQUALIFIED":"NO"
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
                    return moment(data.dateapplied).format('MMM DD YYYY hh:mm:ss a');
                }
                },
                {"data": "requestnumber"},
                {"data": function(data){
                    return "<a href='javascript:actionView("+JSON.stringify(data)+");' >"+data.applicantname+"</a>";
                }},
                {"data": "positionname"},
                {"data": "department"},
                {"data": function(){
                    return 'NO';
                }}
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
                            .text('List of Qualified Applicants')
                            .css('font-size', '15pt');
                        $(win.document.body)
                            .prepend( '<table align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>');
                        $(win.document.body)
                            .append($("#divGraph").html());
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "ListOfQualifiedApplicants" + moment().format("YYYY-MM-DD")
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
            item.push(value + " ("+items[i]['department'].replace("DEPARTMENT","").replace("OFFICE","")+")");
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
    chartObj['chartTitle'] = 'List of Non-Qualified Applicants';
    chartObj['data'] = composeData(data,'positionname');
    chartObj['color'] = ['#0D913E'];
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Non-Qualified Applicant');
        data.addColumn('number', 'Total Number of Non-Qualified Applicants');

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

    function actionView(data){
        console.log(data.username);
        $("#loadingmodal").modal("show");
        $.ajax({
           url: "<?php echo base_url();?>applicantlettermanagement/getletter",
            type: "POST",
            dataType: "json",
            data: {
                "TYPE": "nonqualified",
                "USERNAME": data.username
            },
            success: function(result){
                if(result.Code == "00"){
                    writeLetter(result.details);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    function writeLetter(data){
        console.log(data);
        var letter = data[0].letter;
        var obj = new Object();
        var today = moment().format("MMM DD, YYYY");
        for(var keys in data){
            obj['<mail_date>'] = moment().format("MMMM DD, YYYY");
            obj['<receiver_name>'] = data[keys].applicantname;
            obj['<receiver_address_specific>'] = data[keys].specificaddress;
            obj['<receiver_city>'] = data[keys].state;
            obj['<salutation>'] = data[keys].salutation;
            obj['<position_name>'] = data[keys].position;
            obj['<lgu_name>'] = data[keys].lgu;
            obj['<department>'] = data[keys].department;
            obj['<education>'] = data[keys].education;
            obj['<experience>'] = data[keys].experience;
            obj['<training>'] = data[keys].training;
            obj['<eligibility>'] = data[keys].eligibility;
            obj['<reply_date>'] =  moment(today,"MMM DD, YYYY").add(7, 'days').format("MMMM DD, YYYY");
            try{
                var req = JSON.parse(data[keys].analyticsresult);
                obj['<failed_requirements>'] = req.requirements;
                obj['<proof>'] = req.proofs;
            } catch (e){
                obj['<failed_requirements>'] = "";
                obj['<proof>'] = "";
            }

            if(data[keys].email == null || data[keys].email == ""){
                $("#btnEmail").prop("disabled",true);
            } else {
                $("#btnEmail").prop("disabled",false);
                $("#btnEmail").attr("email",data[keys].email);
                $("#btnEmail").attr("position",data[keys].position);

            }


        }
        obj['<sender_name>'] = "<?php echo $this->session->userdata('name');?>";
        obj['<sender_position>'] = "Manager";
        obj['<sender_department>'] = "Human Resource Department";

        letter = letter.replace(/<mail_date>|<receiver_name>|<receiver_address_specific>|<receiver_city>|<salutation>|<position_name>|<lgu_name>|<department>|<education>|<experience>|<training>|<eligibility>|<reply_date>|<failed_requirements>|<proof>|<sender_name>|<sender_position>|<sender_department>/gi, function(matched){
            return obj[matched];
        });
        $("#letterbody").empty();
        $("#letterbody").append(letter);
        $("#lettermodal").modal("show");
        $("#loadingmodal").modal("hide");

    }

    $("#btnPrint").click(function () {
        $("#letterbody").print();
    });

    $("#btnEmail").click(function(){
        $("#loadingmodal").modal("show");
        $.ajax({
           url: "<?php echo base_url();?>applicantlettermanagement/sendemail",
            type: "POST",
            dataType: "json",
            data: {
                "EMAIL":$(this).attr("email"),
                "POSITION":$(this).attr("position"),
                "MESSAGE":$("#letterbody").html()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });
</script>

