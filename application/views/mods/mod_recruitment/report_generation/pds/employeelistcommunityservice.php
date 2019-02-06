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
                    <a href="<?php echo base_url();?>reports/employeelistcommunityservice" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Employee List - Community Service Done
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
            <legend>Employee List Based on Community Service Done</legend>
            <div class="row">
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <div class="col-md-12">
                            <br>
                            <div class="row">
                                <div class="col-md-6" align="left" style="padding-left: 0">
                                    <p><b>Employee List Based on Community Service Done</b><br>
                                        <span id="lbldate"></span>
                                    </p>
                                </div>
                                <div class="col-md-6 form-group divPrint" align="right" style="padding-right: 0">
                                    <button class="btn btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;Print</button>
                                </div>
                            </div>
                        </div>
                        <table id="tblreport1" class="table table-bordered" cellspacing="0" width="100%" >
                            <thead align="center" style="text-align: center">
                            <tr>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="3" width="195">EMPLOYEE NAME</th>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="3">POSITION</th>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="3">DEPARTMENT</th>
                                <th style="text-align: center" align="center" colspan="6" >COMMUNITY SERVICE</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="2" width="150">Organization</th>
                                <th style="text-align: center;vertical-align: middle" align="center" colspan="2">Inclusive Date of Attendance</th>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="2">Number of Hours</th>
                                <th style="text-align: center;vertical-align: middle" align="center" rowspan="2">Position or Nature of Work</th>
                            </tr>
                            <tr>
                                <th style="text-align: center" align="center">From</th>
                                <th style="text-align: center" align="center">To</th>
                            </tr>
                            </thead>
                            <tbody id="tblcommunityservice">
                            </tbody>
                        </table>
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
        loadReport();
    });

    //load data
    function loadReport() {
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url(); ?>reportgenerationmanagement/employeelistcommunityservice",
            type: "POST",
            dataType: "json",
            success: function(result){
                $('#loadingmodal').modal('hide');
                console.log(result);
                if (result.Code == "00") {
                    $('#loadingmodal').modal('hide');
                    $('#tblcont1').show();
                    $('.divPrint').show();
                    $("#tblmsg1").hide();
                    $("#lbldate").text(moment().format("MMM DD YYYY hh:mm:ss A"));

                    var tbody = $("#tblcommunityservice");
                    tbody.empty();

                    for(var keys in result.details){
                        var tr = '';
                        var tds = '';
                        var json = JSON.parse(result.details[keys].voluntarywork);
                        var span = json.length;
                        var isFirst = true;
                        for(var i=0;i<span;i++) {
                            if (!(json[i].organization == "" || json[i].organization == "na" || json[i].organization == "n/a" || json[i].organization == "N/A" || json[i].organization == "NA" || json[i].organization == "none" || json[i].organization == "NONE" || json[i].organization == "None")) {
                                var pds1 = '';
                                var pds2 = '';
                                if (isFirst) {
                                    var name = result.details[keys].firstname + " " + result.details[keys].middlename + " " + result.details[keys].lastname;
                                    pds1 += '<td style="vertical-align:middle;" rowspan="' + span + '">' + name + '</td>' +
                                    '<td style="vertical-align:middle;" rowspan="' + span + '">' + result.details[keys].currentposition + '</td>' +
                                    '<td style="vertical-align:middle;" rowspan="' + span + '">' + result.details[keys].department + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].organization + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].fromdate + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].todate + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].hours + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].position + '</td>';

                                    tr += '<tr>' + pds1 + '</tr>';
                                } else {
                                    pds2 += '<td align="center" style="text-align: center">' + json[i].organization + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].fromdate + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].todate + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].hours + '</td>' +
                                    '<td align="center" style="text-align: center">' + json[i].position + '</td>';

                                    tr += '<tr>' + pds2 + '</tr>';
                                }
                                isFirst = false;

                            }
                        }
                            tbody.append(tr);

                    }
                } else {
                    $('#loadingmodal').modal('hide');
                    $("#tblcont1").hide();
                    $('.divPrint').hide();
                    $("#tblmsg1").text("No Data Found");
                    $("#tblmsg1").show();
                }
            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    }

    $("#btnPrint").click(function(){
        $("#tblcont1").prepend( '<table id="divLogo" align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>');
        $("#tblcont1").print({
            noPrintSelector: ".divPrint"
        });
        $("#divLogo").css('display','none');


    });
</script>