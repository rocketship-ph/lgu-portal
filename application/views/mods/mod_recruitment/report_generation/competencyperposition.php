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
                    <a href="<?php echo base_url();?>reports/competencyperposition" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Competency Per Position
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
            <legend>Competency Per Position Report</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <label for="requestNumber" class="col-lg-2 control-label">Position</label>
                            <div class="col-lg-4">
                                <select class="form-control clearField" id="position">
                                    <option selected disabled>- Select Position -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>POSITION</th>
                                <th>COMPETENCY</th>
                                <th>COMPETENCY TYPE</th>
                                <th>LEVEL</th>
                                <th>DESCRIPTION TYPE</th>
                                <th>DESCRIPTION</th>
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
        loadPosition();
    });

    function loadPosition(){
        $("#loadingmodal").modal("show");
        var select = $("#position");
        select.empty();
        $.ajax({
           url: "<?php echo base_url();?>reportgenerationmanagement/getpositions",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Position -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].positioncode+'">'+result.details[keys].name+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Position Available -</option>');

                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Position Available -</option>');


            }
        });
    }

    $("#position").change(function(){
       var pos = $(this).val();
        loadReport(pos);
    });

    //load data
    function loadReport(poscode) {
        $("#loadingmodal").modal("show");
        $("#tblreport1").dataTable({
            "destroy": true,
            "responsive": true,
            "oLanguage": {
                "sSearch": "Search:"
            },
            "order": [[0, "asc"]],
            "ajax": {
                "url": "<?php echo base_url(); ?>reportgenerationmanagement/competencyperposition",
                "type": "POST",
                "dataType": "json",
                "data": {
                    "POSITIONCODE":poscode
                },
                dataSrc: function (json) {
                    console.log(json);
                    if (json.Code == "00") {

                        $('#loadingmodal').modal('hide');
                        $('#tblcont1').show();
                        $("#tblmsg1").hide();
                        var res = JSON.parse(atob(json.details[0].cbiskills));
                        window.titles = json.competencies;
                        return res;
                    } else {
                        $('#loadingmodal').modal('hide');
                        $("#tblcont1").hide();
                        $("#tblmsg1").text("No Data Found");
                        $("#tblmsg1").show();
                    }
                },
                error: function(e){
                  console.log(e);
                }
            },
            "columns": [
                {"data": function(){
                    return $("#position option:selected").text();
                }},
                {"data": "title"},
                {"data": function(data){
                    var type = "";
                    for(var k=0;k<(window.titles).length;k++){
                        if(window.titles[k].title == data.title){
                            type = window.titles[k].type;
                        }
                    }
                    return type;
                }},
                {"data": function(data){
                    return (data.level).toUpperCase();
                }},
                {"data": "type"},
                {"data": function(data){
                    return data.desc;
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
                            .text('Behavioral Competency Based Index Report')
                            .css('font-size', '15pt');
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "BehavioralCompetencyBasedIndexReport" + moment().format("YYYY-MM-DD")
                },
                {
                    extend: 'pdfHtml5',
                    title: "BehavioralCompetencyBasedIndexReport" + moment().format("YYYY-MM-DD"),
                    message: 'Behavioral Competency Based Index Report',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
        });
    }
</script>