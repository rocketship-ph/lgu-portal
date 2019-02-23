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
                    <a href="<?php echo base_url();?>cscreports/applicantprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Creation of Relevant Position
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
            <legend>Creation of Relevant Position</legend>
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
                        <center><h4 id="printTitle" style="display: none"><b>ANNUAL RECRUITMENT PLAN</b></h4></center>
                        <center><h5><b><span id="printSubtitle" style="display: none"></span></b></h5></center>
                        <table id="tbl" class="tblanalytics" style="width: 100%;" border="2" cellpadding="10" >
                            <tbody id="tbldata">
                            </tbody>
                        </table>
                        <div id="divSignatures" class="col-xs-12" style="display: none">

                        </div>
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

                <div id="divSignatory" style="display: none">
                    <div class="col-md-12 form-group">
                        <label>Select signatories</label>
                        <div id="divSignatories">

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
    var x = null;
    var signatories = 0;
    var mayor;
    function loadReport(year) {
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>analyticsmanagement/getcreationofrelevantposition",
            type: "POST",
            dataType: "json",
            data: {
                "YEAR":year
            },
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){

                    console.log(JSON.stringify(data));
                    $('#divSignatory').show();
                    $('#tblcont1').show();
                    $("#tblmsg1").hide();

                    $('#tbldata').empty();
                    $('#tbldata').append('<tr>' +
                        '    <th width="40%"><b>POSITION TITLE</b></th>' +
                        '    <th width="10%"><b>SALARY GRADE</b></th>' +
                        '    <th width="10%"><b>MONTHLY RATE</b></th>' +
                        '    <th width="20%"><b>PLACE OF ASSIGNMENT</b></th>' +
                        '    <th width="20%"><b>REQUESTING OFFICER</b></th>' +
                        '  </tr>');
                    var requestingofficer = data.details[0].requestingofficer;
                    var positiontitle = "";
                    var salarygrade = "";
                    var monthlyrate = "";
                    var department = "";
                    for (var key in data.details){
                        if (requestingofficer === data.details[key].requestingofficer) {
                            positiontitle += data.details[key].positiontitle + "<br>";
                            salarygrade += data.details[key].salarygrade + "<br>";
                            monthlyrate += data.details[key].monthlyrate + "<br>";
                            department += data.details[key].department + "<br>";
                        } else {
                            requestingofficer = data.details[key].requestingofficer;
                            positiontitle += data.details[key].positiontitle + "<br>";
                            salarygrade += data.details[key].salarygrade + "<br>";
                            monthlyrate += data.details[key].monthlyrate + "<br>";
                            department += data.details[key].department + "<br>";
                        }

                    }
                    $("#exportPDF").show();
                    $('#tbldata').append('<tr>' +
                        '    <td width="40%" valign="top">'+positiontitle+'</td>' +
                        '    <td width="10%" valign="top">'+salarygrade+'</td>' +
                        '    <td width="10%" valign="top">'+monthlyrate+'</td>' +
                        '    <td width="20%" valign="top">'+department+'</td>' +
                        '    <td width="20%" valign="top">'+data.details[key].requestingofficer+'</td>' +
                        '  </tr>');
                    $("#divSignatories").empty();
                    var sign = JSON.parse(data.details[0].signatories);
                    for (var keys in sign){
                        var dept = sign[keys].position;
                        if(dept===""){
                            dept = "N/A";
                        }
                        $("#divSignatories").append('<label><input type="checkbox" id="signatory'+keys+'" value="'+sign[keys].name+'" position="'+dept+'">  <b>'+sign[keys].name+'</b> [' +dept +']</label><br>');
                        signatories++;
                    }
                    var head = JSON.parse(data.details[0].approvedby);
                    for(var key2 in head){
                        mayor = "<b>"+head[key2].fullname + "</b><br>" + head[key2].position;
                    }
                } else {
                    $('#divSignatory').hide();
                    $("#exportPDF").hide();
                    $("#tblcont1").hide();
                    $("#tblmsg1").text("No Data Found");
                    $("#tblmsg1").show();
                }
            },
            error: function(e){
                $('#divSignatory').hide();
                $("#loadingmodal").modal("hide");
                $('#tblcont1').show();
                $("#tblmsg1").hide();
                console.log(e);
            }
        });
    }


    function sum(m,f){
        return parseInt(m)+parseInt(f);
    }


    $('#exportPDF').click(function(){
        $("#printTitle").show();
        $("#printSubtitle").show();
        $("#printSubtitle").text("for CY of " + $("#year").val());
        $("#printSubtitle").append("<br><br><h4><b>CREATION OF RELEVANT POSITION</b></h4>");
        $("#divSignatures").empty();
        $("#divSignatures").append("<div class='col-xs-12'><br><br><br><b>Noted by</b></div>");
        var count = 0;
        for (var i=0; i<signatories;i++){
            if($("#signatory"+i).is(':checked')){
                $("#divSignatures").append('<div class="col-xs-4" style="text-align: left"><br><br><br><br><b>'+$("#signatory"+i).val()+'</b><br>'+$("#signatory"+i).attr("position")+'</div>');
                count++;
            }
        }
        if(count>0){
            $("#divSignatures").append('<div class="col-xs-4"></div>');
            $("#divSignatures").append('<div class="col-xs-4"></div>');
            $("#divSignatures").append('<div class="col-xs-12"><br><br><br><br><br><b>Approved by</b><br><br><br><br>'+mayor+'</div>');
            $("#divSignatures").show();
            $("#tblcont1").print({
                prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table><br><br><span>&nbsp;&nbsp;&nbsp;'
            });
            $("#divSignatures").empty();
            $("#divSignatures").show();
            $("#printTitle").hide();
            $("#printSubtitle").hide();
        } else {
            $("#divSignatures").empty();
            $("#printTitle").hide();
            $("#printSubtitle").hide();
            messageDialogModal("Warning","Please select at least one signatory");
        }

    });
</script>
<style type="text/css">
    table.tblanalytics td{
        padding: 2px;
        color: black;
    }
    @media print {
        /*body * {*/
        /*display:: none;*/
        /*visibility: hidden;*/
        /*top: 0;*/
        /*}*/

        /*#container, #container * {*/
        /*visibility: visible;*/
        /*}*/

        /*#container {*/
        /*position: absolute;*/
        /*left: 0;*/
        /*top: 0;*/
        /*margin-top: -650px;*/
        /*}*/
        #containerPrint {
            -webkit-print-color-adjust: exact;
        }
        #exportPDF {
            visibility: hidden;
        }
        th {
            background-color: #949494 !important;
            border-color: black;
            color: black;
            text-align: center;
        }
        tr {
            border-color: black;
            color: black;
        }
        td {
            border-color: black;
            color: black;
        }

        table.data td, th{
            -webkit-print-color-adjust: exact;
            padding: 2px;
        }

    }
    th {
        background-color: #949494 !important;
        border-color: black;
        color: black;
        text-align: center;
    }
    tr {
        border-color: black;
        color: black;
    }
    td {
        border-color: black;
        color: black;
    }

    table.data td, th{
        padding: 2px;
    }
</style>