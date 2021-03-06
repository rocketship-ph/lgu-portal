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
                    <a href="<?php echo base_url();?>reports/backgroundinvestigator" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Background Investigation Investigator Report
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
            <legend>List of Background Investigation Investigator</legend>
            <div class="row">
                <div class="col-md-12">

                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>DATE CONDUCTED</th>
                                <th>INVESTIGATOR</th>
                                <th>USER LEVEL</th>
                                <th>DEPARTMENT</th>
                                <th>REQUEST NUMBER</th>
                                <th>POSITION</th>
                                <th>APPLICANT CODE</th>
                                <th>QUESTION</th>
                                <th>ANSWER</th>
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
            "order": [[0, "desc"]],
            "ajax": {
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/biinvestigator",
                "type": "POST",
                "dataType": "json",
                "data": {

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
                {"data": function (data) {
                    return moment(data.timestamp).format('MMM DD, YYYY hh:mm:ss A');}
                },
                {"data": "investigator"},
                {"data": "userlevel"},
                {"data": "department"},
                {"data": "requestnumber"},
                {"data": "position"},
                {"data": "applicantcode"},
                {"data": function(data){
                    return atob(data.question);
                }},
                {"data": function(data){
                    return atob(data.answer);
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
                            .text('List of Background Investigators')
                            .css('font-size', '15pt');
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "BackgroundInvestigators" + moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "BackgroundInvestigators" + moment().format("YYYY-MM-DD"),
                    message: 'List of Background Investigators',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
</script>