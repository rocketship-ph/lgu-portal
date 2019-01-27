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
                    <a href="<?php echo base_url();?>reports/backgroundinvestigationresult" style="min-height: 90px;width:60px;height:auto;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Background Investigation Result Report
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
            <legend>Background Investigation Result Report</legend>
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
                                <th>REQUEST NUMBER</th>
                                <th>CONDUCTORS</th>
                                <th>TOTAL RATING</th>
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
<div class="modal fade" id="modalnotifyrequirements" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Applicant Requirement Notification</legend>
                <div class="row">
                    <div class="col-md-12" id="letterbody">
                        <input type="hidden" id="requirementsval">
                        <h4 style="margin: 2px;"><b id="lblapplicantname"></b></h4>
                        <h5 style="margin: 2px;" id="lblapplicantcode"></h5>
                        <h5 style="margin: 2px;"id="lblreqnum"></h5>
                        <h5 style="margin-top: 2px;" id="lblreqposition"></h5>
                        <b>REQUIREMENTS:</b><br>
                        <ul id="reqlist"></ul>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <p style="font-size: 11px;font-style: italic">Notification will be displayed on the applicant's homescreen upon login as well as sent via email (if the applicant provided a valid email address)</p>
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-success" id="btnNotify">NOTIFY APPLICANT</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="messagedialogmodalreq" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header">
                <span>Server Message</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <p>No requirements found for this request number. <a href='<?php echo base_url();?>transaction/requirementchecklist'>Click here to add requirements</a></p>
            </div>
            <div class="modal-footer">
                <input type="button" id="btnmessagedialogmodal" class="btn btn-success" data-dismiss="modal" value="Ok">
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
        url: "<?php echo base_url();?>reportgenerationmanagement/biassessmentrequestnumbers",
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
    $("#loadingmodal").modal("show");
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
            "url": "<?php echo base_url(); ?>reportgenerationmanagement/backgroundinvestigationresult",
            "type": "POST",
            "dataType": "json",
            "data": {
                "REQUESTNUMBER":reqnum
            },
            dataSrc: function (json) {
                if (json.Code == "00") {
                    window.first = true;
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
            {"data": function(data){
                var name = "";
                //JAN 11 2019: Disabled Rank #1 on clickable
                //if(window.first){
                    name = "<a applicantcode='"+data.applicantcode+"' href='javascript:actionBIPassed("+JSON.stringify(data)+");'>"+data.applicantname+"</a>";
                //} else {
                   // name = data.applicantname;
                //}
                window.first = false;
                return name;
            }},
            {"data": "requestnumber"},
            {"data": "conductors"},
            {"data": "totalrating"}
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
                        .text('Background Investigation Result')
                        .css('font-size', '15pt');

                    $(win.document.body)
                        .prepend( '<table align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>');
                }
            }
        ]
    });
}

function actionBIPassed(data){
    console.log(data);
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>requirementchecklistmanagement/requirementchecklist",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":data.requestnumber
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                console.log(result);
                $("#lblapplicantname").text(data.applicantname);
                $("#lblapplicantcode").text(data.applicantcode);
                $("#lblreqnum").text(data.requestnumber);
                $("#lblreqposition").text(data.name);

                var req_arr = [];
                var list = $("#reqlist");
                list.empty();
                for(var keys in result.details){
                    list.append('<li>'+result.details[keys].requirement+'</li>');
                    req_arr.push(result.details[keys].requirement);
                }
                $("#requirementsval").val(JSON.stringify(req_arr));
                $("#modalnotifyrequirements").modal("show");
            } else {
                $("#messagedialogmodalreq").modal("show");
            }

        },
        error: function(e){
            console.log(e);
        }
    });

}

$("#btnNotify").click(function(){
    $("#modalnotifyrequirements").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>notificationmanagement/insertnotif",
        type:"POST",
        dataType:"json",
        data: {
            "REQUESTNUMBER":$("#lblreqnum").text(),
            "NOTIFTYPE":"APPLICATION REQUIREMENT",
            "APPLICANTCODE":$("#lblapplicantcode").text(),
            "POSITION":$("#lblreqposition").text(),
            "APPLICANT":$("#lblapplicantname").text(),
            "REQUIREMENTS":$("#requirementsval").val(),
            "LETTER":$("#letterbody").html()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Notification Sent",result.Message);
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

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