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
                    <a href="<?php echo base_url();?>cscreports/individualapplicantprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Individual Applicant's Profile
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
        <legend> Individual Applicant's Profile</legend>
        <div class="row">
            <div class="col-md-12">
                <h5 id="tblmsg1" style="display:none"></h5>
                <div class="table-responsive" id="tblcont1" style="display: none">
                <center><h4 id="printTitle" style="display: none"><b>PROFILE OF APPLICANTS</b></h4></center>
                <center><h5><b><span id="printSubtitle" style="display: none"></span></b></h5></center>
                 <table id="tblreport"  class="display compact responsive cell-border" cellspacing="0" width="100%">
                     <thead>
                     <tr>
                         <th>REQUEST NUMBER</th>
                         <th>APPLICANT NAME</th>
                         <th>DEPARTMENT</th>
                         <th>DATE APPLIED</th>
                     </tr>
                     </thead>
                     <tbody id="tblbody">
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
<div class="modal fade " id="modalprofile" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" style=" height: auto;min-height: 100%;">
            <div class="modal-header">
                <b>Applicant Profile</b>
            </div>
            <div class="modal-body" style="overflow-y: auto;overflow-x: hidden; " id="divPrint">
                <div style="text-align: center;">
                    <h5><b>INDIVIDUAL APPLICANT'S PROFILE</b></h5>
                    <h5><b><span id="labelPositionRequested"></span></b></h5>
                </div>
                <table width="100%">
                    <tr>
                        <td>
                            <h5><b>QUALIFICATION STANDARDS:</b></h5>
                            <h5><b>Education: </b><input class="type" style="width:75%" type="text" id="labelEducation" width="100%"></h5>
                            <h5><b>Experience: </b><span id="labelExperience"></span></h5>
                        </td>
                        <td>
                            <br>
                            <h5><b>Training: </b><span id="labelTraining"></span></h5>
                            <h5><b>Eligibility: </b><input class="type" style="width:75%" type="text" id="labelEligibility" width="100%"></h5>
                        </td>
                    </tr>
                </table>
                <div>
                    <table class="tblanalytics" id="tbldata" style="width: 100%;" border="2" cellpadding="10" >

                    </table>
                </div>
                <div id="divSignatory">

                </div>
            </div>
            <div class="modal-footer" align="center">
                <button class="btn btn-success" id="exportPDF">PRINT</button>
                <input type="button" class="btn btn-cancel" data-dismiss="modal"  value="CLOSE">
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

    loadReport();

});
var x = null;
function loadReport() {
    $("#loadingmodal").modal("show");
    $("#divSignatory").empty();
    $("#tblreport").dataTable({
        "destroy": true,
        "responsive": true,
        "oLanguage": {
            "sSearch": "Search:"
        },
        "ajax": {
            "url": "<?php echo base_url(); ?>analyticsmanagement/getprofiles",
            "type": "POST",
            "dataType": "json",
            "data": {},
            dataSrc: function (json) {
                console.log(JSON.stringify(json));
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
            {"data": function (data) {
                return "<a href='javascript:showIndividualProfile("+JSON.stringify(data)+");'>"+data.lastname + ", " + data.firstname + " " + data.middlename.charAt(0) + ".</a>";
            }},
            {"data": "department"},
            {"data": "dateapplied"}
        ]
    });
//     $.ajax({
//            url: "<?php //echo base_url();?>//analyticsmanagement/getprofiles",
//            type: "POST",
//            dataType: "json",
//            data: {
//            },
//            success: function(data){
//                $("#loadingmodal").modal("hide");
//                if(data.Code == "00"){
//                    console.log(data);
//                    $('#tblcont1').show();
//                    $("#tblmsg1").hide();
//                    $("#divSignatory").append('<br><span style="color: black">Prepared by:</span><br><br>' + '<b style="color: black">'+'<?php //echo $this->session->userdata('firstname');?>// '+'<?php //echo $this->session->userdata('lastname');?>//'+'</b><br><i>'+'<?php //echo $this->session->userdata('position');?>//'+'</i>');
//                    $("#exportPDF").show();
//                } else {
//                    $("#exportPDF").hide();
//                    $("#tblcont1").hide();
//                    $("#tblmsg1").text("No Data Found");
//                    $("#tblmsg1").show();
//                }
//            },
//            error: function(e){
//                $("#loadingmodal").modal("hide");
//                 $('#tblcont1').show();
//                    $("#tblmsg1").hide();
//                console.log(e);
//            }
//        });
}

function showIndividualProfile(data){
    $("#modalprofile").modal('show');
    $("#labelPositionRequested").text("CANDIDATE FOR " + data.positionrequested);
    $("#labelEducation").val(data.requirededucation);
    $("#labelExperience").text(data.requiredexperience);
    $("#labelTraining").text(data.requiredtraining);
    $("#labelEligibility").val(data.requiredeligibility);
    $("#tbldata").empty();
    $("#tbldata").append(' <tr>' +
        '                         <th width="25%">NAME, AGE, STATUS, EDUCATION, AND ELIGIBILITY</th>' +
        '                         <th width="25%">WORK EXPERIENCE</th>' +
        '                         <th width="25%">TRAINING/PROGRAMS ATTENDED</th>' +
        '                         <th width="25%">OTHER INFORAMTION</th>' +
        '                     </tr>');
    $("#tbldata").append(' <tr>' +
        '                         <td valign="top"><br><b>'+data.lastname + ', ' + data.firstname + ' ' + data.middlename+'</b><br>' +
        '                         '+data.gender+'  /  '+ data.civilstatus +'  /  '+ data.age +' yrs old <br><br>' +
        '                         <b>Address: </b> '+ data.address +'<br><br>' +
        '                         <b>Education: </b><br>'+displayAll(data,"EDUCATION")+
        '                         <b>Eligibility: </b><br>'+displayAll(data,"ELIGIBILITY")+'</td>' +
        '                         <td valign="top"><br>'+displayAll(data,"WORKEXPERIENCE")+'</td>' +
        '                         <td valign="top"><br>'+displayAll(data,"TRAINING")+'</td>' +
        '                         <td valign="top"><br>'+displayAll(data,"OTHER")+'</td>' +
        '                     </tr>');
    $("#divSignatory").append('<br><span style="color: black">Prepared by:</span><br><br>' + '<b style="color: black">'+'<?php echo $this->session->userdata('firstname');?> '+'<?php echo $this->session->userdata('lastname');?>'+'</b><br><i>'+'<?php echo $this->session->userdata('position');?>'+'</i>');
}

function displayAll(data,type){
    var str ="";
    switch (type){
        case "EDUCATION":
            try {
                var college = JSON.parse(data.college);
                var vocational = JSON.parse(data.vocational);
                var graduate = JSON.parse(data.graduate);
                if (vocational.school !== "") {
                    str += isEmpty(vocational.degree) + "<br>" + isEmpty(vocational.school) + "<br><br>";
                }
                if (college.school !== "") {
                    str += isEmpty(college.degree) + "<br>" + isEmpty(college.school) + "<br><br>";
                }
                if (graduate.school !== "") {
                    str += isEmpty(graduate.degree) + "<br>" + isEmpty(graduate.school) + "<br><br>";
                }
            }catch(e){
                console.log(e);
                str = "NO AVAILABLE INFORMATION";
            }
            break;
        case "ELIGIBILITY":
            try {
                var eligibility = JSON.parse(data.civilservice);
                for(var key in eligibility){
                    str+= isEmpty(eligibility[key].careerservice) +"<br>License No. " + isEmpty(eligibility[key].licenseno) + "<br><br>";
                }
            } catch(e){
                console.log(e);
                str = "NO AVAILABLE INFORMATION";
            }

            break;
        case "WORKEXPERIENCE":
            try {
                var work = JSON.parse(data.workexperience);
                for (var key in work) {
                    str += "<b>" + isEmpty(work[key].position) + "</b><br>" + isEmpty(work[key].company) + "<br>" + isEmpty(work[key].fromdate) + "-" + isEmpty(work[key].todate) + "<br><br>";
                }
            } catch(e){
                console.log(e);
                str = "NO AVAILABLE INFORMATION";
            }
            break;
        case "TRAINING":
            var training = JSON.parse(data.training);
            try {
                for(var key in training){
                    str += "<b>"+isEmpty(training[key].title)+"</b><br>"+isEmpty(training[key].hours) + " hrs<br>" + isEmpty(training[key].fromdate) + "-" + isEmpty(training[key].todate) + "<br><br>";
                }
            } catch(e){
                str = "NO AVAILABLE INFORMATION";
            }
            break;
        case "OTHER":
//            var other = JSON.parse(data.skillshobbiesaffiliation);
            str = "NO AVAILABLE INFORMATION";
//            try {
//                for(var key in other){
//                    str += "<b>"+isEmpty(other[key].title)+"</b><br>"+isEmpty(other[key].hours) + " hrs<br>" + isEmpty(other[key].fromdate) + "-" + isEmpty(other[key].todate) + "<br><br>";
//                }
//            } catch(e){
//                str = "NO AVAILABLE INFORMATION";
//            }
            break;
    }
    return str;
}

function isEmpty(data) {
    if(data===null||data===""||typeof(data)==="undefined")
        return "N/A";
    return data;
}

function displayEligibility(data){
    var str = "";
    try{
        var arr = JSON.parse(data);
        for(var i=0; i<arr.length;i++){
            if(arr.length-1 !== i){
                str+=arr[i]+",";
            } else {
                str+=arr[i];
            }
        }
    } catch(e) {
        str = "N/A";
    }
   return str;
}
$('#exportPDF').click(function(){
    if($("#labelEducation").val()==""){
        $("#labelEducation").addClass('error');
    }else if($("#labelEligibility").val()==""){
        $("#labelEligibility").addClass('error');
    } else {
        $("#labelEducation").removeClass('error');
        $("#labelEligibility").removeClass('error');
        $("#divPrint").print({
            prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table>'
        });
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
        table.tblanalytics th {
            background-color: #949494 !important;
            border-color: black;
            color: black;
            text-align: center;
        }
        table.tblanalytics tr {
            border-color: black;
            color: black;
        }
        table.tblanalytics td {
            border-color: black;
            color: black;
        }

        table.tblanalytics table.data td, th{
            -webkit-print-color-adjust: exact;
            padding: 2px;
        }
        #labelEducation {
            outline: none;
            height: 30px;
        }
        #labelEligibility {
            outline: none;
            height: 30px;
        }
        .type {
            outline: none;
            border-color: transparent;
        }
        .hide {
            outline: none;
            border-color: transparent;
        }

    }
    table.tblanalytics th {
        background-color: #949494 !important;
        border-color: black;
        color: black;
        text-align: center;
    }
    table.tblanalytics tr {
        border-color: black;
        color: black;
    }
    table.tblanalytics td {
        border-color: black;
        color: black;
    }

    table.data td, th{
        padding: 2px;
    }

    .error{
        border-color: red;
    }

    .type {
        outline: none;
    }
    .hide {
        outline: none;
        border-color: transparent;
    }
    textarea {
        resize: none;
        outline: none;
        border-color: transparent;
    }
</style>