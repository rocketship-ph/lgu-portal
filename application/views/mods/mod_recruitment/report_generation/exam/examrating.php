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


    th.dt-center, td.dt-center { text-align: center; }
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
                    <a href="<?php echo base_url();?>reports/examrating" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Examination Rating Report
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
            <legend>Examination Rating Report (Highest to Lowest)</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label class="control-label">Request Number</label>
                            <select class="form-control clearField" id="requestnumber">
                                <option selected disabled>- Select Request Number -</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group" align="left" style="padding-top: 5px;" >
                            <br>
                            <button class="btn btn-success" id="btnGenerate">Generate Report</button>
                            <button class="btn btn-default" id="btnClear">Clear</button>
                        </div>
                        <div class="col-md-6" id="divPositionDesc" style="display: none">
                            <p>
                                <b id="lblposition"></b>,&nbsp;<span id="lblgroupposition"></span><br>
                                <span id="lblgroupdesc" style="font-style: italic"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th class="dt-center" align="center" style="text-align: center">RANK</th>
                                <th>APPLICANT CODE</th>
                                <th>APPLICANT NAME</th>
                                <th>TOTAL SCORE</th>
                                <th>GRADE</th>
                                <th>70%</th>
                            </tr>
                            </thead>
                            <tbody id="tblbody">
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
        loadRequestnumbers();
    });

    function loadRequestnumbers(){
        var select = $("#requestnumber");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/examcompetencyrequestnumbers",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option groupdesc="'+atob(result.details[keys].groupdesc)+'" position="'+result.details[keys].position+'" groupposition="'+result.details[keys].groupposition+'"  value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
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
        console.log("bish");
       var position = $("#requestnumber option:selected").attr("position");
        var group = $("#requestnumber option:selected").attr("groupposition");
        var desc = $("#requestnumber option:selected").attr("groupdesc");
        $("#divPositionDesc").show();
        $("#lblposition").text(position);
        $("#lblgroupposition").text(group);
        $("#lblgroupdesc").text(desc);
    });


    $("#btnGenerate").click(function(){
        var reqnum = $("#requestnumber option:selected").val();
        if(reqnum == "- Select Request Number -" || reqnum == null){
            messageDialogModal("Required","Please Select Request Number");
        } else {
            loadReport(reqnum);
        }

    });

    function loadReport(reqnum) {
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy": true,
            "responsive": true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "ajax": {
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/examrating",
                "type": "POST",
                "dataType": "json",
                "data": {
                    "REQUESTNUMBER":reqnum
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
                    }
                }
            },
            "columns": [
                {"data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "applicantcode"},
                {"data": "applicantname"},
                {"data": "totalscore"},
                {"data": "grade"},
                {"data": "seventy"}
            ],
            "sDom": 'Blrftip',
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
                            .text('Examination Ranking')
                            .css('font-size', '15pt');
                        $(win.document.body)
                            .prepend('<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table>');
                    }
                }
            ]
        });
    }

    $("#btnPrint").click(function(){
        $("#tblcont1").print({
            noPrintSelector : "#btnPrint"
        });
    });
    $("#btnClear").click(function(){
        clearField();
        $("#tblcont1").hide();
        $("#divPositionDesc").hide();
    });
</script>