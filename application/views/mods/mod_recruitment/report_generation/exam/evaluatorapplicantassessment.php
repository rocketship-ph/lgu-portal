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
                    <a href="<?php echo base_url();?>reports/evaluatorapplicantassessment" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        List of Evaluators Assessment to Applicant
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
            <legend>List of Evaluators Assessment to Applicant</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="control-label">Position Request Number</label>
                            <select class="form-control clearField" id="requestnumber">
                                <option selected disabled>- Select Position Request Number -</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="control-label">Evaluator</label>
                            <select class="form-control clearField" id="evaluator">
                                <option selected disabled>- Select Evaluator -</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group" style="padding-top: 5px;">
                            <br>
                            <button class="btn btn-success" id="btnGenerate">Generate Report</button>
                            <button class="btn btn-default" id="btnClear">Clear</button>
                            <button class="btn btn-success" id="btnPrint" style="float: right;display: none"><i class="fa fa-print"></i>&nbsp;Print</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table style="width: 100%">
                            <tr>
                                <td align="left">
                                    <h4 style="font-size: 15px;margin-bottom: 0;">List of Evaluators Exam Encoded Report</h4>
                                    <h4 style="font-size: 15px;margin-top: 5px;">Date Exam Created: <span style="font-weight: bold" id="lblexamdate"></span></h4>
                                </td>
                                <td align="right">
                                    <h4 style="font-size: 15px;margin-bottom: 0;">Request Number: <span style="font-weight: bold" id="lblreqnum"></span></h4>
                                    <h4 style="font-size: 15px;margin-top: 5px;">Evaluator: <span style="font-weight: bold" id="lblevaluator"></span></h4>
                                </td>
                            </tr>
                        </table>
                        <table id="tblreport1" class="display compact responsive cell-border" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>COMPETENCY TITLE</th>
                                <th>COMPETENCY TYPE</th>
                                <th>LEVEL</th>
                                <th>QUESTION</th>
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

<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_requestpersonnelreports").addClass("selected_panel");
        loadRequestNumbers();
    });

    function loadRequestNumbers(){
        var select = $("#requestnumber");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/evaluatorrequestnumbers",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Position Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+' ['+((result.details[keys].position == "" || result.details[keys].position == null) ? 'POSITION NAME' : result.details[keys].position )+']</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Position Request Number Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
                select.append('<option selected disabled>- No Position Request Number Available -</option>');
            }
        });
    }

    $("#requestnumber").change(function(){
        $("#btnPrint").hide();
        var reqnum = $("#requestnumber option:selected").val();
        var select = $("#evaluator");
        select.empty();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/evaluatorsexamencoded",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":reqnum
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Evaluator -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].username+'">'+result.details[keys].evaluatorname+'</option>');
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

    $("#btnGenerate").click(function(){
        $("#btnPrint").hide();
        if($("#requestnumber option:selected").val() == "- Select Position Request Number -" || $("#requestnumber option:selected").val() == null){
            messageDialogModal("Required","Please Select Request Number");
        } else if($("#evaluator option:selected").val() == "- Select Evaluator -" || $("#evaluator option:selected").val() == "- No Evaluator Available -" || $("#evaluator option:selected").val() == null){
            messageDialogModal("Required","Please Select Evaluator");
        } else {
            $("#loadingmodal").modal("show");
            $("#tblreport1").dataTable({
                "destroy": true,
                "responsive": true,
                "oLanguage": {
                    "sSearch": "Search:"
                },
                "order": [[1, "asc"]],
                "ajax": {
                    "url": "<?php echo base_url(); ?>reportgenerationmanagement/evaluatorlistexamencoded",
                    "type": "POST",
                    "dataType": "json",
                    "data": {
                        "REQUESTNUMBER":$("#requestnumber option:selected").val(),
                        "EVALUATOR":$("#evaluator option:selected").val()
                    },
                    dataSrc: function (json) {
                        if (json.Code == "00") {
                            $('#loadingmodal').modal('hide');
                            $('#tblcont1').show();
                            $("#tblmsg1").hide();
                            var arr = '';
                            $("#lblreqnum").text($("#requestnumber option:selected").val()+"");
                            $("#lblevaluator").text($("#evaluator option:selected").text()+"");
                            $("#btnPrint").show();

                            for(var keys in json.details){
                                $("#lblexamdate").text(moment(json.details[keys].datecreated).format("MMM DD YYYY hh:mm:ss A"));
                                arr = atob(json.details[keys].exam);
                            }
                            return JSON.parse(arr);
                        } else {
                            $("#btnPrint").hide();

                            $('#loadingmodal').modal('hide');
                            $("#tblcont1").hide();
                            $("#tblmsg1").text("No Data Found");
                            $("#tblmsg1").show();
                        }
                    }
                },
                "columns": [
                    {"data": "title"},
                    {"data": "criteriatype"},
                    {"data": function (data) {
                        return data.level.toUpperCase();
                    }},
                    {"data": "q"}
                ],
                "sDom": 't'
            });
        }
    });
    $("#btnPrint").click(function(){
        $("#tblcont1").prepend( '<table id="divLogo" align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>');
        $("#tblcont1").print({
            noPrintSelector: ".divPrint"
        });
        $("#divLogo").css('display','none');


    });

    $("#btnClear").click(function(){
        clearField();
        $("#tblcont1").hide();
        $("#btnPrint").hide();
    })

</script>