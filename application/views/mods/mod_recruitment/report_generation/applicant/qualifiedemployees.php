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
                    <a href="<?php echo base_url();?>reports/qualifiedemployees" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Qualified Employees Report
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
            <legend>Qualified Employees Report</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="control-label">Request Number</label>
                            <select class="form-control clearField" id="requestnumber">
                                <option selected disabled>- Select Position Request Number -</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="tblcont1" style="display: none">
                        <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>REQUEST NUMBER</th>
                                <th>REQUESTED POSITION</th>
                                <th>EMPLOYEE ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>CURRENT POSITION</th>
                                <th>DEPARTMENT</th>
                                <th>QUALIFIED</th>
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
<div class="modal fade" id="lettermodal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Letter for Qualified Employee</legend>
                <div class="row">
                    <div id="divletterbody" class="col-md-12" style="height: 430px !important;overflow-y: auto;">
                        <p id="letterbody"></p>
                    </div>
                    <div id="print-me"></div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--                            <button type="button" class="btn btn-info" id="btnPrint">PRINT</button>-->
                            <button type="button" class="btn btn-success" id="btnEmail">SEND INVITATION</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="letterdetailsmodal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Letter Details for Qualified Employee</legend>
                <div class="row" style="height: 430px !important;overflow-y: auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label class="control-label">Examination Date<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control datepicker clearField" placeholder="Pick Date" id="examdate" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Examination Time<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control timepick clearField" placeholder="Pick Time" id="examtime" readonly>
                        </div>
                        <div class="col-md-12">
                            <br>
                        </div>
                        <legend style="font-size: 14px !important;">Examination Venue</legend>
                        <div class="form-group col-md-12">
                            <label class="control-label">Venue Name<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control clearField" placeholder="Venue Name" id="venuename">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Building/Floor/Room<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control clearField" placeholder="Building/Floor/Room" id="bldg">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Specific Address<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control clearField" placeholder="Street Name/Lot #/etc." id="specificaddress">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Province<span style="color:red;font-weight: bold">*</span></label>
                            <select class="form-control clearField" id="province">
                                <option selected disabled>- Select Province -</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">City/Municipality<span style="color:red;font-weight: bold">*</span></label>
                            <select class="form-control clearField" id="citymun">
                                <option selected disabled>- Select City/Municipality -</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Barangay<span style="color:red;font-weight: bold">*</span></label>
                            <select class="form-control clearField" id="brgy">
                                <option selected disabled>- Select Barangay -</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <br>
                        </div>
                        <legend style="font-size: 14px !important;">Interview Time</legend>
                        <div class="form-group col-md-6">
                            <label class="control-label">From<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control timepick clearField" placeholder="Pick Time" id="timefrom" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">To<span style="color:red;font-weight: bold">*</span></label>
                            <input type="text" class="form-control timepick clearField" placeholder="Pick Time" id="timeto" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="btnContinue">Compose Letter</button>
                        </div>
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
    loadProvince();
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
                select.append('<option value="ALL">ALL</option>');
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
    loadReport($("#requestnumber option:selected").val());
});

//load data
function loadReport(reqnum) {
    console.log(reqnum);
    $("#loadingmodal").modal("show");
    $("#tblreport1").dataTable({
        "destroy": true,
        "responsive": true,
        "oLanguage": {
            "sSearch": "Search:"
        },
        "order": [[0, "asc"]],
        "ajax": {
            "url": "<?php echo base_url(); ?>reportgenerationmanagement/qualifiedemployees",
            "type": "POST",
            "dataType": "json",
            "data": {
                "ISQUALIFIED":"YES",
                "REQNUM":reqnum
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
            {"data": "requestnumber"},
            {"data": "positionrequested"},
            {"data": "employeeid"},
            {"data": function(data){
                function especialJSONStringify (data) {
                    return JSON.stringify(data).
                        replace(/&/g, "&amp;").
                        replace(/</g, "&lt;").
                        replace(/>/g, "&gt;").
                        replace(/"/g, "&quot;").
                        replace(/'/g, "&#039;");
                }
                return "<a href='javascript:actionView("+especialJSONStringify(data)+");' >"+data.employeename+"</a>";
            }},
            {"data": "currentposition"},
            {"data": "currentdepartment"},
            {"data": "isqualified"}
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
                        .text('List of Qualified Employees')
                        .css('font-size', '15pt');
                }
            },
            {
                extend: 'excelHtml5',
                title: "ListOfQualifiedEmployees" + moment().format("YYYY-MM-DD")
            },
            {
                extend: 'pdfHtml5',
                title: "ListOfQualifiedEmployees" + moment().format("YYYY-MM-DD"),
                message: 'List of Qualified Employees',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    });
}

function actionView(data){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>employeelettermanagement/inserttempdata",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": data.requestnumber,
            "USERNAME": data.employeeid
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                window.applicantcode =result.appcode.applicantcode;
                $("#letterdetailsmodal").modal("show");
                $("#btnContinue").attr("applicanttype","qualified");
                $("#btnContinue").attr("applicantusername",data.employeeid);
                $("#btnEmail").attr("employeeid",data.employeeid);
                $("#btnEmail").attr("reqnum",data.requestnumber);
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });

}

$("#btnContinue").click(function(){
    if(!validateExamDetails()){
        return;
    } else {
        $("#letterdetailsmodal").modal("hide");

        var obj = new Object();
        obj['<exam_date>'] = moment($("#examdate").val()).format('MMMM DD YYYY');
        obj['<exam_time>'] = $("#examtime").val();
        obj['<exam_venue_name>'] = $("#venuename").val();
        obj['<exam_building>'] = $("#bldg").val();
        obj['<exam_address_specific>'] = $("#specificaddress").val() + ", Brgy. " + $("#brgy option:selected").val();
        obj['<exam_address_city>'] = $("#citymun option:selected").val() +", " +$("#province option:selected").val();
        obj['<interview_from>'] = $("#timefrom").val();
        obj['<interview_to>'] = $("#timeto").val();
        obj['<sender_name>'] = "<?php echo $this->session->userdata('name');?>";
        obj['<sender_position>'] = "Manager";
        obj['<sender_department>'] = "Human Resource Department";
        window.letterdetails = obj;

        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>employeelettermanagement/getletter",
            type: "POST",
            dataType: "json",
            data: {
                "TYPE": $(this).attr("applicanttype"),
                "USERNAME": $(this).attr("applicantusername")
            },
            success: function(result){
                if(result.Code == "00"){
                    writeLetter(result.details);
                    clearField();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }
});

function writeLetter(data){
    console.log(data);
    var letter = data[0].letter;
    var obj = window.letterdetails;
    console.log(obj);
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

    letter = letter.replace(/<mail_date>|<receiver_name>|<receiver_address_specific>|<receiver_city>|<salutation>|<position_name>|<lgu_name>|<department>|<education>|<experience>|<training>|<eligibility>|<reply_date>|<failed_requirements>|<proof>|<sender_name>|<sender_position>|<sender_department>|<exam_address_city>|<exam_address_specific>|<exam_building>|<exam_date>|<exam_time>|<exam_venue_name>|<interview_from>|<interview_to>/gi, function(matched){
        return obj[matched];
    });
    $("#letterbody").empty();
    $("#letterbody").append(letter);
    $("#lettermodal").modal("show");
    $("#loadingmodal").modal("hide");
}

function loadProvince(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getprovince',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#province').empty();
            $('#province').append(
                '<option selected disabled>- Select Province -</option>');
            var data = result.RECORDS;
            data.sort(function(a, b){
                var nameA=a.provDesc; nameB=b.provDesc;
                if (nameA < nameB) //sort string ascending
                    return -1
                if (nameA > nameB)
                    return 1
                return 0 //default return value (no sorting)
            });

            for(var keys=0;keys<data.length;keys++)
            {
                $('#province').append(
                    '<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

$("#province").change(function(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getcity',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#citymun').empty();
            $('#citymun').append(
                '<option selected disabled>- Select City/Municipality -</option>');
            var code = $("#province option:selected").attr("provcode");
            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].provCode){

                        $('#citymun').append(
                            '<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});

$("#citymun").change(function(){
    var code = $("#citymun option:selected").attr("citycode");
    $.ajax({
        url: '<?php echo base_url();?>homepage/getbrgy',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#brgy').empty();
            $('#brgy').append(
                '<option selected disabled>- Select Barangay -</option>');

            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].citymunCode){

                        $('#brgy').append(
                            '<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});

$("#btnPrint").click(function () {
    $("#letterbody").print();
});

$("#btnEmail").click(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>employeelettermanagement/sendemail",
        type: "POST",
        dataType: "json",
        data: {
            "APPLICANTCODE":window.applicantcode,
            "REQUESTNUMBER":$(this).attr("reqnum"),
            "USERNAME":$(this).attr("employeeid"),
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

function validateExamDetails(){
    if($("#examdate").val() == "" || $("#examdate").val() == null){
        messageDialogModal("Detail Required","Please Pick Examination Date");
        return false;
    }
    if($("#examtime").val() == "" || $("#examtime").val() == null){
        messageDialogModal("Detail Required","Please Pick Examination Time");
        return false;
    }
    if($("#venuename").val() == "" || $("#venuename").val() == null){
        messageDialogModal("Detail Required","Please Provide Examination Venue Name");
        return false;
    }
    if($("#bldg").val() == "" || $("#bldg").val() == null){
        messageDialogModal("Detail Required","Please Provide Examination Building/Floor/Room");
        return false;
    }
    if($("#specificaddress").val() == "" || $("#specificaddress").val() == null){
        messageDialogModal("Detail Required","Please Provide Street Name/Lot #/etc.");
        return false;
    }
    if($("#province option:selected").val() == "- Select Province -" || $("#province option:selected").val() == null){
        messageDialogModal("Detail Required","Please Select Province");
        return false;
    }
    if($("#citymun option:selected").val() == "- Select City/Municipality -" || $("#citymun option:selected").val() == null){
        messageDialogModal("Detail Required","Please Select City/Municipality");
        return false;
    }
    if($("#brgy option:selected").val() == "- Select Barangay -" || $("#brgy option:selected").val() == null){
        messageDialogModal("Detail Required","Please Select Barangay");
        return false;
    }
    if($("#timefrom").val() == "" || $("#timefrom").val() == null){
        messageDialogModal("Detail Required","Please Select Interview Time From");
        return false;
    }
    if($("#timeto").val() == "" || $("#timeto").val() == null){
        messageDialogModal("Detail Required","Please Select Interview Time To");
        return false;
    }
    return true;
}
</script>