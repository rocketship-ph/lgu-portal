<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
    .addEmployees{
        font-size: 11px !important;
        text-align: center;
        line-height: 1.0;
        display: inline-block;
    }

    .divEmployees{
        padding-top: 10px !important;
    }

    .dropdownWidth{
        width: 35px !important;
    }

    .modal-dialog-lg {
        position: fixed;
        margin: 0;
        width: 100%;
        height: 100%;
        padding: 0;
        color: black;
    }
    .modal-content-lg {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        border-radius: 0;
        box-shadow: none;
    }
    .modal-body-lg {
        position: absolute;
        top: 0;
        bottom: 35px;
        width: 100%;
        font-weight: 300;
        overflow: auto;
    }

    .modal-footer-lg {
        position: absolute;
        right: 0;
        bottom: 5px;
        left: 0;
        height: 35px;
        padding: 5px;
    }

    td, th{
          text-align: center;
          padding: 5px;
          color: black;
      }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #00C853;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Performance Management Report</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border: 1px solid #d1d1d1;padding: 0 !important;">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_ipcr">
                    <a href="<?php echo base_url();?>pmsreports/ipcrreport" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/ipcr.png" height="40px">
                        <br>
                       IPCR Report
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_pmsreports">
                    <a href="<?php echo base_url();?>main/pmsreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                      PMS Reports Menu
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-lg-12">
            <legend style="margin-bottom: 5px">Individual Performance Commitment and Review (IPCR)</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" align="left">
                        <h4><b>IPCR Report</b></h4>
                        <p style="font-size: 11px">View the final rating of Individual Performance Commitment and Report. Click <b><a>Print/Preview IPCR</a></b> to view and print the IPCR in its standard format</p>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" id="li_personalipcr" href="#personalipcr">View Personal IPCR</a></li>
                            <li><a data-toggle="pill" id="li_employeeipcr" href="#employeeipcr">View Employee IPCR</a></li>
                        </ul>
                        <div class="tab-content">

                            <div id="personalipcr" class="tab-pane fade in active">
                                <hr>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Period:<span style="color:red;font-weight: bold">*</span></label>
                                        <select class="form-control clearField" id="personalperiod"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" align="left">
                                        <hr>
                                        <button class="btn btn-default btnPreviewIpcr" id="btnPreviewPersonal">PRINT/PREVIEW IPCR</button>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="table-responsive" id="tblpersonalipcrcontainer">
                                            <table id="tblpersonalipcr" class="display responsive compact" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr align="center">
                                                    <th rowspan="2">STRATEGIC OBJECTIVE</th>
                                                    <th rowspan="2">CATEGORY</th>
                                                    <th rowspan="2">MFO/PAP</th>
                                                    <th rowspan="2">SUCCESS INDICATORS (Target+Measures)</th>
                                                    <th rowspan="2">ALLOTTED BUDGET</th>
                                                    <th rowspan="2">DIVISION ACCOUNTABLE</th>
                                                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                                                    <th colspan="4" align="center">RATING</th>
                                                    <th rowspan="2" align="center">REMARKS</th>
                                                </tr>
                                                <tr align="center">
                                                    <th class="dropdownWidth">Q</th>
                                                    <th class="dropdownWidth">E</th>
                                                    <th class="dropdownWidth">T</th>
                                                    <th class="dropdownWidth">A</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="employeeipcr" class="tab-pane fade">
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Period:<span style="color:red;font-weight: bold">*</span></label>
                                        <select class="form-control clearField" id="period"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Employee:<span style="color:red;font-weight: bold">*</span></label>
                                        <select class="form-control clearField" id="employee">
                                            <option selected disabled>- Select Department First -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" align="left">
                                        <hr>
                                        <button class="btn btn-default saveBtnClass btnPreviewIpcr" id="btnPreviewEmployee">PRINT/PREVIEW IPCR</button>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="table-responsive" id="tblemployeeipcrcontainer">
                                            <table id="tblemployeeipcr" class="display responsive compact" cellspacing="0" width="100%" >
                                                <thead>
                                                <tr align="center">
                                                    <th rowspan="2">STRATEGIC OBJECTIVE</th>
                                                    <th rowspan="2">CATEGORY</th>
                                                    <th rowspan="2">MFO/PAP</th>
                                                    <th rowspan="2">SUCCESS INDICATORS (Target+Measures)</th>
                                                    <th rowspan="2">ALLOTTED BUDGET</th>
                                                    <th rowspan="2">DIVISION ACCOUNTABLE</th>
                                                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                                                    <th colspan="4" align="center">RATING</th>
                                                    <th rowspan="2" align="center">REMARKS</th>
                                                </tr>
                                                <tr align="center">
                                                    <th class="dropdownWidth">Q</th>
                                                    <th class="dropdownWidth">E</th>
                                                    <th class="dropdownWidth">T</th>
                                                    <th class="dropdownWidth">A</th>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalpreview" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-lg modal-lg">
        <div class="modal-content modal-content-lg">
            <div class="modal-body modal-body-lg" id="previewPrint">
                <center><b>INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW(IPCR)</b></center>
                <p>I, <u><b><span id="lblname">NAME</span></b></u>, <span id="lblposition">POSITION</span> of the <span id="lbldepartment">DEPARTMENT</span> department to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period <u><b><span id="lblperiod">PERIOD</span></b></u>.</p>
                <br>
                <div class="row" style="float:right;margin-bottom: 15px;padding-left: 15px;">
                    <div align="center">
                        <u>__________<b><span id="lblsignaturename"></span></b>__________</u><br>
                        <span id="lblsignatureposition"></span>
                    </div>
                    <div align="center">
                        Date: <u>___<b><span id="lblsignaturedate"></span></b>___</u><br>
                    </div>
                </div><br>
                <table border="2" width="100%">
                    <tr>
                        <td style="text-align:left">Approved by*</td>
                        <td style="text-align:left">Date</td>
                    </tr>
                    <tr style="text-align: center;">
                        <td><br><br><b><span id="lblapprovedby">Name</span></b><br><span id="lblapprovedbyposition">Position</span></td>
                        <td></td>
                    </tr>
                </table><br>
                <table border="2" width="100%">
                    <tr >
                        <td width="80%"></td>
                        <td style="text-align:left">
                            <p>&nbsp;5 - Outstanding</p>
                            <p>&nbsp;4 - Very Satisfactory</p>
                            <p>&nbsp;3 - Satisfactory</p>
                            <p>&nbsp;2 - Unsatisfactory</p>
                            <p>&nbsp;1 - Poor</p>
                        </td>
                    </tr>
                </table>
                <br>
                <table width="100%" id="tblsodata" border="1" style="text-align: center !important;">

                </table>
            </div>
            <div class="modal-footer modal-footer-lg" align="center" style="text-align: center !important;">
                <button class="btn btn-success" id="btnPrintPreview"><i class="fa fa-print"></i>&nbsp;PRINT</button>
                <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
var sodata;
$(document).ready(function(){
    $("#nav_pms_reports").removeClass().addClass("active");

    $("#ul_pmsmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_ipcr").addClass("selected_panel");

    window.isUpdate = false;
    $("#btnPreviewPersonal").prop("disabled",true);
    loadPeriod();
    loadDataPersonal();

});

$("#li_employeeipcr").click(function(){
    loadDataEmployee();
    clearTables();
});

$("#li_personalipcr").click(function(){
    loadDataPersonal();
    clearTables();
});

function clearTables(){
    var table  = $("#tblemployeeipcr").dataTable();
    var table1  = $("#tblpersonalipcr").dataTable();
    table.fnClearTable();
    table1.fnClearTable();
    $("#btnPreviewEmployee").prop("disabled",true);
    $("#btnPreviewPersonal").prop("disabled",true);
    clearField();
}


function loadPeriod(){
    $.ajax({
        url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
        type: "POST",
        dataType: "json",
        success: function(result){
            var select = $("#personalperiod");
            var select2 = $("#period");
            select.empty();
            select2.empty();
            if(result.Code =="00"){
                select.append("<option selected disabled>- Select Period -</option>");
                select2.append("<option selected disabled>- Select Period -</option>");

                var freq = result.details[0].frequency;
                var slices = 12/parseInt(freq);
                var start = 0;
                var end = slices;

                for(var x=0;x<freq;x++){
                    select.append("<option " +
                    "value='"+moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                    moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+ "' " +
                    "period-from='"+moment().startOf('year').add(start, 'months').format("MM-YYYY")+ "' " +
                    "period-to='"+moment().startOf('year').add((end-1), 'months').format("MM-YYYY")+"'>"+
                    moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                    moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+
                    "</option>");

                    select2.append("<option " +
                    "value='"+moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                    moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+ "' " +
                    "period-from='"+moment().startOf('year').add(start, 'months').format("MM-YYYY")+ "' " +
                    "period-to='"+moment().startOf('year').add((end-1), 'months').format("MM-YYYY")+"'>"+
                    moment().startOf('year').add(start, 'months').format("MMMM YYYY")+" - "+
                    moment().startOf('year').add((end-1), 'months').format("MMMM YYYY")+
                    "</option>");

                    start += end;
                    end += slices;
                }
            } else {
                select.append("<option selected disabled>- No Period Available -</option>");
                select2.append("<option selected disabled>- No Period Available -</option>");
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}

$("#personalperiod").change(function(){
    loadPersonalIpcrData($(this).val(),"<?php echo $this->session->userdata('department');?>","<?php echo $this->session->userdata('username');?>");
});


function loadDataPersonal(){
    $("#tblpersonalipcr").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No IPCR Data Available"
        },
        "columnDefs": [
            { "width": "40px", "targets": 7 },
            { "width": "40px", "targets": 8 },
            { "width": "40px", "targets": 9 },
            { "width": "40px", "targets": 10 }
        ],
        "columns":[
            {"data":"strategicobjective"},
            {"data":"category"},
            {"data":function(data){
                return atob(data.mfopap);
            }},
            {"data":function(data){
                return atob(data.successindicator);
            }},
            {"data":function(data){
                var budget = '';
                if(data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") {
                    budget = '--';
                } else {
                    budget = "Php "+formatCurrency(data.allottedbudget);
                }
                return budget;
            }},
            {"data":function(data){
                return data.name+"<br>"+data.currentposition+"<br>("+data.employmenttype+")";
            }},
            {"data":function(data){
                return atob(data.accomplishment);
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.Q;
                return "<span class='ratingQ' rating-type='Q' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.E;
                return "<span class='ratingE' rating-type='E' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.T;
                return "<span class='ratingT' rating-type='T' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                return "<span class='ratingAve' rating-type='A' ipcr-id='"+data.ipcrid+"'>"+j.A+"</span>";
            }},
            {"data":function(data){
//                return "<p class='form-control txtRemarks' ipcr-id='"+data.ipcrid+"'>"+(data.remarks == "" || data.remarks == null) ? "-" : data.remarks+"</p>";
                return "<p class='txtRemarks' ipcr-id='"+data.ipcrid+"'></p>";
            }}
        ]
    });
}


function loadPersonalIpcrData(period,department,username){
    $('#loadingmodal').modal('show');
    $("#btnPreviewPersonal").prop("disabled",true);
    var table  = $("#tblpersonalipcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsreports/ipcrdata",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department,
            "EMPLOYEE":username
        },
        type:"POST",
        dataType: "json",
        success: function(result){
            sodata=result;
            $('#loadingmodal').modal('hide');
            if(result.Code=="00"){
                $("#btnPreviewPersonal").prop("disabled",false);
                console.log(result.details);
                table.fnAddData(result.details);
            }else{
                $("#btnPreviewPersonal").prop("disabled",true);
                table.fnClearTable();
            }
        },
        error: function(e){
            $('#loadingmodal').modal('hide');
            $("#btnPreviewPersonal").prop("disabled",true);
            console.log(e);
        }
    });
}





function getSelected(a,b){
    if(a == b){
        return "selected";
    } else if (a == "0"){
        return "selected";
    }
    return "";
}





//==============================//
//  FOR EMPLOYE IPCR REPORT    //
//============================//

function loadEmployees(period,department){
    $("#loadingmodal").modal("show");
    var select = $("#employee");
    select.empty();
    var table  = $("#tblevaluateipcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url: "<?php echo base_url();?>pmsreports/displayipcremployees",
        type: "POST",
        dataType: "json",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department
        },
        success: function(result){
            $("#loadingmodal").modal("hide");

            if(result.Code == "00"){
                select.append("<option selected disabled>- Select Employee -</option>");
                for(var keys in result.details){
                    select.append("<option value='"+result.details[keys].username+"'>"+result.details[keys].name+"</option>")
                }
            } else {
                select.append("<option selected disabled>- No Employee Available -</option>");

            }
        },
        error: function(e){
            select.append("<option selected disabled>- No Employee Available -</option>");
        }
    });
}

$("#period").change(function(){
    var table  = $("#tblemployeeipcr").dataTable();
    table.fnClearTable();
    loadEmployees($(this).val(),"<?php echo $this->session->userdata('department');?>");
    $("#btnPreviewEmployee").prop("disabled",true);
});



$("#employee").change(function(){
    $("#btnPreviewEmployee").prop("disabled",true);
    if($("#period option:selected").val() == "- Select Period -" || $("#period option:selected").val() == "- No Period Available -"){
        messageDialogModal("Required","Please Select Period");
    }else {
        loadEmployeeIpcrData($("#period option:selected").val(),"<?php echo $this->session->userdata('department');?>",$(this).val());
    }
});

function loadDataEmployee(){
    $("#tblemployeeipcr").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No IPCR Data Available"
        },
        "columnDefs": [
            { "width": "40px", "targets": 7 },
            { "width": "40px", "targets": 8 },
            { "width": "40px", "targets": 9 },
            { "width": "40px", "targets": 10 }
        ],
        "columns":[
            {"data":"strategicobjective"},
            {"data":"category"},
            {"data":function(data){
                return atob(data.mfopap);
            }},
            {"data":function(data){
                return atob(data.successindicator);
            }},
            {"data":function(data){
                var budget = '';
                if(data.allottedbudget == undefined || data.allottedbudget == null || data.allottedbudget == "") {
                    budget = '--';
                } else {
                    budget = "Php "+formatCurrency(data.allottedbudget);
                }
                return budget;
            }},
            {"data":function(data){
                return data.name+"<br>"+data.currentposition+"<br>("+data.employmenttype+")";
            }},
            {"data":function(data){
                return atob(data.accomplishment);
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.Q;
                return "<span class='ratingQ' rating-type='Q' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.E;
                return "<span class='ratingE' rating-type='E' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.T;
                return "<span class='ratingT' rating-type='T' ipcr-id='"+data.ipcrid+"'>"+rating+"</span>";
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                return "<span class='ratingAve' rating-type='A' ipcr-id='"+data.ipcrid+"'>"+j.A+"</span>";
            }},
            {"data":function(data){
                return "<p class='txtRemarks' ipcr-id='"+data.ipcrid+"'>"+data.remarks+"</p>";
            }}
        ]
    });
}


function loadEmployeeIpcrData(period,department,username){
    $('#loadingmodal').modal('show');
    var table  = $("#tblemployeeipcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsreports/ipcrdata",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department,
            "EMPLOYEE":username
        },
        type:"POST",
        dataType: "json",
        success: function(result){
            sodata = result;
            $('#loadingmodal').modal('hide');
            if(result.Code=="00"){
                $("#btnPreviewEmployee").prop("disabled",false);
                console.log(result.details);
                table.fnAddData(result.details);
            }else{
                $("#btnPreviewEmployee").prop("disabled",true);
                table.fnClearTable();
            }
        },
        error: function(e){
            $("#btnPreviewEmployee").prop("disabled",true);

            $('#loadingmodal').modal('hide');
            console.log(e);
        }
    });
}



$(".btnPreviewIpcr").on('click', function(){
    if($("#soPeriod option:selected").val() == "- Select Period -") {
        messageDialogModal("Server Message","Please Select Evaluation Period");
    } else {
        if(sodata.details!=undefined){
            console.log(sodata.details);
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            $("#lblperiod").text(sodata.details[0].period);
            $("#lblapprovedby").text(sodata.details[0].approvename);
            $("#lblapprovedbyposition").text(sodata.details[0].approveuserlevel + " - " + sodata.details[0].approvedepartment + ' Department');
            $("#lblname").text("<?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname');?>");
            $("#lblposition").text("<?php echo $this->session->userdata('userlevel');?>");
            $("#lbldepartment").text("<?php echo $this->session->userdata('department');?>");
            $("#lblsignaturename").text("<?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname');?>");
            $("#lblsignatureposition").text("<?php echo $this->session->userdata('userlevel');?>");
            $("#lblsignaturedate").text(today);
            $("#modalpreview").modal('show');
            loadTableData();
        } else {
            messageDialogModal("Server Message","No OPCR Data Available");
        }

    }

});
function loadTableData(){
    $("#tblsodata").empty();
    $("#tblsodata").append('<tr>' +
    '<th rowspan="2" align="center">MFO/PAP</th>' +
    '<th rowspan="2" align="center">SUCCESS INDICATOR(TARGET + MEASURES)</th>' +
    '<th rowspan="2" align="center">Allotted Budget</th>' +
    '<th rowspan="2" align="center">Division Accountable</th>' +
    '<th rowspan="2" align="center">Actual Accomplishments</th>' +
    '<th colspan="4" align="center">Rating</th>' +
    '<th rowspan="2" align="center" width="20%">Remarks</th>' +
    '</tr>' +
    '<tr>' +
    '<th width="2%" align="center">Q</th>' +
    '<th width="2%" align="center">E</th>' +
    '<th width="2%" align="center">T</th>' +
    '<th width="2%" align="center">A</th>' +
    '</tr>');
    var so="", category="";
    var data = sodata.details;
    console.log(data);
    // var x = JSON.parse('{ "Code": "00", "Message": "Successfully Fetched Data", "details": [{ "id": "1", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "ACCOUNTING", "mfopap": "RW1wbG95ZWVzJyBTdGF0ZW1lbnQgb2YgQXNzZXRzIExpYWJpbGl0aWVzIGFuZCBOZXR3b3J0aCBmb3Jt", "category": "CORE FUNCTION", "successindicator": "U3VibWl0IDEwMCUgb2YgZXZhbHVhdGVkIFNBTE4gRm9ybXMgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIHdpdGggMTAwJSBhY2N1cmFjeSBieSB0aGUgZW5kIG9mIHRoZSBzZW1lc3Rlcg==", "allottedbudget": "0.00", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "12", "accomplishment": "MjAwIEtBIEJpcnRoZGF5IENhcmRzIGlzc3VlZCB3aXRoaW4gdGhlIHNlbWVzdGVy", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "2", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "HUMAN RESOURCE", "mfopap": "VGVzdA==", "category": "STRATEGIC PRIORITIES", "successindicator": "VGVzdA==", "allottedbudget": "", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "16", "accomplishment": "U0FMTiBGb3JtcyBldmFsdWF0ZWQgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIEp1bmUgMjAsIDIwMTg=", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "2", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "HUMAN RESOURCE", "mfopap": "VGVzdA==", "category": "STRATEGIC PRIORITIES", "successindicator": "VGVzdA==", "allottedbudget": "", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "16", "accomplishment": "U0FMTiBGb3JtcyBldmFsdWF0ZWQgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIEp1bmUgMjAsIDIwMTg=", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "1", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "ACCOUNTING", "mfopap": "RW1wbG95ZWVzJyBTdGF0ZW1lbnQgb2YgQXNzZXRzIExpYWJpbGl0aWVzIGFuZCBOZXR3b3J0aCBmb3Jt", "category": "CORE FUNCTION", "successindicator": "U3VibWl0IDEwMCUgb2YgZXZhbHVhdGVkIFNBTE4gRm9ybXMgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIHdpdGggMTAwJSBhY2N1cmFjeSBieSB0aGUgZW5kIG9mIHRoZSBzZW1lc3Rlcg==", "allottedbudget": "0.00", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "12", "accomplishment": "MjAwIEtBIEJpcnRoZGF5IENhcmRzIGlzc3VlZCB3aXRoaW4gdGhlIHNlbWVzdGVy", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }] }');
    // var data = x.details;
    for (var keys in data){
        if(so!=data[keys].strategicobjective){
            $("#tblsodata").append('<tr><td colspan="10" style="text-align:left; background-color: grey"><b>'+data[keys].strategicobjective+'</b></td></tr>');
            so = data[keys].strategicobjective;
            if(category!=data[keys].category){
                $("#tblsodata").append('<tr><td colspan="10" style="text-align:left;"><b>'+data[keys].category+'</b></td></tr>');
                $("#tblsodata").append('<tr>' +
                '<td>'+atob(data[keys].mfopap)+'</td>' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+data[keys].name+'<br>'+data[keys].currentposition+'<br>('+data[keys].employmenttype+')</td> ' +
                '<td>'+atob(data[keys].accomplishment)+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
                category = data[keys].category;
            } else {
                $("#tblsodata").append('<tr>' +
                '<td>'+atob(data[keys].mfopap)+'</td> ' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+data[keys].name+'<br>'+data[keys].currentposition+'<br>('+data[keys].employmenttype+')</td> ' +
                '<td>'+atob(data[keys].accomplishment)+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
            }
        } else {
            so = data[keys].strategicobjective;
            if(category!=data[keys].category){
                $("#tblsodata").append('<tr><td colspan="10" style="text-align:left;"><b>'+data[keys].category+'</b></td></tr>');
                $("#tblsodata").append('<tr> ' +
                '<td>'+atob(data[keys].mfopap)+'</td> ' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+data[keys].name+'<br>'+data[keys].currentposition+'<br>('+data[keys].employmenttype+')</td> ' +
                '<td>'+atob(data[keys].accomplishment)+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
                category = data[keys].category;
            } else {
                $("#tblsodata").append('<tr> ' +
                '<td>'+atob(data[keys].mfopap)+'</td>' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+data[keys].name+'<br>'+data[keys].currentposition+'<br>('+data[keys].employmenttype+')</td> ' +
                '<td>'+atob(data[keys].accomplishment)+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
            }
        }
    }
}
function loadRatings2(obj,data,letter){
    var select = "";
    var o;
    switch(letter){
        case "q":
            o = obj.Q;
            break;
        case "e":
            o = obj.E;
            break;
        case "t":
            o = obj.T;
            break;
        case "a":
            o = obj.A;
            break;

    }
    return o;
}
$("#btnPrintPreview").on('click', function(){
  $("#previewPrint").printThis();
});

function formatCurrency(amt){
    var a = formatter.format(amt);
    return a.replace("PHP","");
}

var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP',
    minimumFractionDigits: 2
});
</script>