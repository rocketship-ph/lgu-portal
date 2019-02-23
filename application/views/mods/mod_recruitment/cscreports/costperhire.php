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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>CSC Required Reports Menu</h4>
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
                    <a href="<?php echo base_url();?>cscreports/costperhire" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Turnaround time and cost per hire
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>main/cscreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        CSC Required Reports Menu
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
        <div class="col-md-12" id="container">
            <legend>Turnaround time and cost per hire</legend>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Select year</label>
                    <select class="form-control clearField" id="year">
                    </select>

                </div>
                <div class="col-md-8">
                    <button id="exportPDF" class="btn btn-success btn-xs pull-right" style="display: none;">Export as PDF</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <center><h4 id="printTitle" style="display: none"><b>TURNAROUND TIME AND COST PER HIRE</b></h4></center>
                        <center><h5><b><span id="printSubtitle" style="display: none"></span></b></h5></center>
                        <table id="tblreport1" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>OFFICE</th>
                                <th>POSITION</th>
                                <th>DATE PUBLISHED</th>
                                <th>DATE FILLED<br>(upon assumption to duty)</th>
                                <th>OVERALL TIME-TO-FILL (TAT)</th>
                                <th>OVERALL COST PER HIRE<br>(advertising, referral, bonus if any)</th>
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
<script type="text/javascript" src="<?php echo $GLOBALS['googlecharts'];?>"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
        window.switch=0;
        $("#panel_requestpersonnelreports").addClass("selected_panel");
        google.charts.load('current', {packages: ['corechart', 'bar']});
        var d = new Date(),
            n = d.getMonth(),
            y = d.getFullYear();
        var year = parseInt(y);
        $('#month option:eq('+n+')').prop('selected', true);
        while(2017<=year){
            $("#year").append("<option value ='"+year+"'>"+year+"</option>");
            year--;
            y=year;
        }
        loadReport($("#year").val());

    });
    $("#year").change(function () {
        loadReport($("#year").val());
    });
    function loadReport(year) {
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy": true,
            "responsive": true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[0, "desc"]],
            "ajax": {
                "url": "<?php echo base_url(); ?>analyticsmanagement/costperhire",
                "type": "POST",
                "dataType": "json",
                "data":{
                    "YEAR" : year
                },
                dataSrc: function (json) {
                    if (json.Code == "00") {
                        $('#loadingmodal').modal('hide');
                        $('#tblcont1').show();
                        $("#tblmsg1").hide();
                        return json.details;
                    } else {
                        $('#loadingmodal').modal('hide');
                        $("#tblcont1").hide();
                        $("#tblmsg1").text("No Data Found");
                        $("#tblmsg1").show();
                        return "";
                    }
                }
            },
            "columns": [
                {"data": "office"},
                {"data": "position"},
                {
                    "data": function (data) {
                        return moment(data.datepublished).format('DD-MMM-YY');
                    }
                },
                {
                    "data": function (data) {
                        return moment(data.datefilled).format('DD-MMM-YY');
                    }
                },
                {"data": function(data){
                    return countDays(data.differenceindays);
                }},
                {"data": function (data) {
                    return "<input id='"+data.requestnumber+"' class='form-control'><span style='display: none;'>"+$("#"+data.requestnumber).val()+"</span>";
                }}
            ],
            "sDom": 'Blfrtip',
            "buttons": [
                {
                    extend: 'print',
                    autoPrint: true,
                    message: "<center><b><h5>Calendar Year " + $("#year").val() + "</h5></b><center><br>",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                        $(win.document.body).find('h1')
                            .text('TURNAROUND TIME AND COST PER HIRE')
                            .css('font-size', '15pt')
                            .css('text-align', 'center');
                        $(win.document.body)
                            .prepend( '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table>');
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "TURNAROUND TIME AND COST PER HIRE" + moment().format("YYYY-MM-DD")
                }
            ]
        });
    }
    function countDays(number) {
        var val;
        var years=0;
        var months=0;
        var days=0;
        months=number/30;
        if(months>12){
            years=months/12;
            months=(years-Math.floor(years))*12;
        }
        days=(months-Math.floor(months))*30;
        if(years<1){
            if(months<1){
                if(days>1)
                    val=parseInt(days) +  " days";
                else
                    val=parseInt(days) +  " day";
            } else {
                if(months>=2){
                    if(days>1)
                        val=parseInt(months) + " months and " + parseInt(days) +  " days";
                    else
                    if(parseInt(days)>1)
                        val=parseInt(months) + " months and " + parseInt(days) +  " day";
                    else
                        console.log(parseInt(months) + " months");
                }
                else{
                    if(parseInt(days)>1)
                        val=parseInt(months) + " month and " + parseInt(days) +  " days";
                    else{
                        if(parseInt(days)>1)
                            val=parseInt(months) + " month and " + parseInt(days) +  " day";
                        else
                            val=parseInt(months) + " month";
                    }
                }

            }
        } else {
            if(months<1){
                if(days>1)
                    val=parseInt(years) +  " year(s) " + parseInt(days) +  " days";
                else
                    val=parseInt(years) +  " year(s) " + parseInt(days) +  " day";
            } else {
                if(months>=2){
                    if(days>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months and " + parseInt(days) +  " days";
                    else
                    if(parseInt(days)>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months and " + parseInt(days) +  " day";
                    else
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months";
                }
                else{
                    if(parseInt(days)>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " month and " + parseInt(days) +  " days";
                    else{
                        if(parseInt(days)>1)
                            val=parseInt(years) +  " year(s) " + parseInt(months) + " month and " + parseInt(days) +  " day";
                        else
                            val=parseInt(years) +  " year(s) " + parseInt(months) + " month";
                    }
                }

            }
        }
        return val;

    }
</script>
<style type="text/css">

</style>