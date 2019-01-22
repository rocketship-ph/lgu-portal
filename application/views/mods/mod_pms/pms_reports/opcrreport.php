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
        width: 55px !important;
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
                <div class="panel" align="center" id="panel_opcr">
                    <a href="<?php echo base_url();?>pmsreports/opcrreport" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/opcr.png" height="40px">
                        <br>
                        OPCR Report
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
            <legend style="margin-bottom: 5px">Office Performance Commitment and Review (OPCR)</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" align="left">
                        <h4><b>OPCR Report</b></h4>
                        <p style="font-size: 11px">View the final rating of Office Performance Commitment and Report. Click <b><a>Print/Preview OPCR</a></b> to view and print the OPCR in its standard format</p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Evaluation Period:<span style="color:red;font-weight: bold">*</span></label>
                                <select class="form-control clearField" id="period"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <br>
                        <button class="btn btn-default saveBtnClass btnPreviewOpcr" id="btnPreview">PRINT/PREVIEW OPCR</button>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="table-responsive" id="tblopcrreportcontainer">
                            <table id="tblopcrreport" class="display responsive compact" cellspacing="0" width="100%" >
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
<div class="modal fade" id="modalexist" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header" >
                <span>IPCR Found</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p id="existmessage"></p>
            </div>
            <div class="modal-footer">
                <input type="button" id="continueSubmit" class="btn btn-success" value="PROCEED">
                <input type="button" class="btn btn-default" data-dismiss="modal"  onclick="$('#messagedialogmodal').modal('hide');" value="NO">
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalpreview" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-lg modal-lg">
        <div class="modal-content modal-content-lg">
            <div class="modal-body modal-body-lg" id="previewPrint">
                <center><b>OFFICE PERFORMANCE COMMITMENT AND REVIEW(OPCR)</b></center>
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
                <br>
                <b>AVERAGE RATING</b>
                <table width="100%" id="tblaverating" border="1" style="text-align: center !important;">
                    <thead>
                        <tr align="center" style="text-align: center !important;">
                            <th align="center">CATEGORY</th>
                            <th align="center">MFO</th>
                            <th align="center">RATING</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyaverage">

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Total  Overall Rating</b>
                        </td>
                        <td colspan="2"><b id="lblaverating"></b></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Adjectival Rating</b>
                        </td>
                        <td colspan="2"><b id="lbladjrating"></b></td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <br>
                <table width="100%" border="1" style="text-align: center !important;">
                    <thead>
                    <tr align="left" style="text-align: left !important;">
                        <th align="left" colspan="4">Assessed by:</th>
                        <th align="left" colspan="2">Final Rating by: </th>
                    </tr>
                    </thead>
                    <tbody id="tbodypmt">
                        <tr>
                            <td style="vertical-align: bottom">
                                <br><br><span id="lblcochair"></span>
                                <br>
                                <small style="font-size: ">PMT Lead</small>
                            </td>
                            <td style="vertical-align: bottom">
                                <br>
                                <br>
                                <small>Date</small>
                            </td>
                            <td style="vertical-align: bottom;horiz-align: middle !important;" align="center">
                                <br>
                                <br>
                                <div id="divpmt" style="text-align: center" align="center"></div>
                                <small>Performance Management Team</small>
                            </td>
                            <td style="vertical-align: bottom">
                                <br>
                                <br>
                                <small>Date</small>
                            </td>
                            <td style="vertical-align: bottom">
                                <br><br><span id="lblchair"></span><br><small id="lblchairposition"></small>
                            </td>
                            <td style="vertical-align: bottom">
                                <br>
                                <br>
                                <small>Date</small>
                            </td>
                        </tr>
                    </tbody>
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


    $("#panel_opcr").addClass("selected_panel");

    window.isUpdate = false;
    $("#btnPreview").prop("disabled",true);
    window.ipcrids = [];
    loadPeriod();
    loadData();
});


function loadPeriod(){
    $.ajax({
        url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
        type: "POST",
        dataType: "json",
        success: function(result){
            var select = $("#period");
            select.empty();
            if(result.Code =="00"){
                select.append("<option selected disabled>- Select Period -</option>");

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

                    start += end;
                    end += slices;
                }
                $("#addSOModal").modal("show");
            } else {
                select.append("<option selected disabled>- No Period Available -</option>");
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}


$("#period").change(function(){
    loadOpcrData($("#period option:selected").val(),"<?php echo $this->session->userdata('department');?>");
});


function loadData(){
    $("#tblopcrreport").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No OPCR Data Available"
        },
        "columnDefs": [
            { "width": "80px", "targets": 7 },
            { "width": "80px", "targets": 8 },
            { "width": "80px", "targets": 9 },
            { "width": "80px", "targets": 10 }
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
                var emp = JSON.parse('['+data.employees+']');
                var divisionaccountable = '';
                for(var keys in emp){
                    divisionaccountable+='<p style="font-size:11px !important;">' +
                    '<span>'+emp[keys].name+'</span><br>' +
                    '<span>'+emp[keys].currentposition+'</span><br>' +
                    '<span>('+emp[keys].employmenttype+')</span><br>' +
                    '<span>-</span>' +
                    '</p>';
                }
                return divisionaccountable;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var accomplishment = '';
                for(var keys in emp){
                    accomplishment+='<p style="font-size:11px !important;">' +
                    '<span>'+atob(emp[keys].accomplishment)+'</span><br>' +
                    '<span>-</span>' +
                    '</p>';
                }
                return accomplishment;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var rate = 0;
                var avg = 0;
                var ids = [];
                for(var keys in emp){
                    var rating = JSON.parse(atob(emp[keys].rating));
                    rate += parseFloat(rating.Q);
                    ids.push(emp[keys].ipcrid);
                }
                avg = rate / emp.length;
                var input = "<span rating-type='Q' data-ids='"+ids.toString()+"'>"+parseFloat(avg).toFixed(2)+"</span>";
                return input;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var rate = 0;
                var avg = 0;
                var ids = [];
                for(var keys in emp){
                    var rating = JSON.parse(atob(emp[keys].rating));
                    rate += parseFloat(rating.E);
                    ids.push(emp[keys].ipcrid);
                }
                avg = rate / emp.length;
                var input = "<span rating-type='E' data-ids='"+ids.toString()+"'>"+parseFloat(avg).toFixed(2)+"</span>";
                return input;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var rate = 0;
                var avg = 0;
                var ids = [];
                for(var keys in emp){
                    var rating = JSON.parse(atob(emp[keys].rating));
                    rate += parseFloat(rating.T);
                    ids.push(emp[keys].ipcrid);
                }
                avg = rate / emp.length;
                var input = "<span rating-type='T' data-ids='"+ids.toString()+"'>"+parseFloat(avg).toFixed(2)+"</span>";
                return input;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var rate = 0;
                var avg = 0;
                var ids = [];
                for(var keys in emp){
                    var rating = JSON.parse(atob(emp[keys].rating));
                    rate += parseFloat(rating.A);
                    ids.push(emp[keys].ipcrid);
                }
                avg = rate / emp.length;
                var input = "<span rating-type='A' data-ids='"+ids.toString()+"'>"+parseFloat(avg).toFixed(2)+"</span>";
                return input;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var ids = [];
                for(var keys in emp){
                    ids.push(emp[keys].ipcrid);
                }
                return "<p class='txtRemarks' data-ids='"+ids.toString()+"'></p>";
            }}
        ]
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


function loadOpcrData(period,department){
    $('#loadingmodal').modal('show');
    var table  = $("#tblopcrreport").dataTable();
    table.fnClearTable();
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsreports/opcrdata",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department
        },
        type:"POST",
        dataType: "json",
        success: function(result){
            sodata = result;
            $('#loadingmodal').modal('hide');
            if(result.Code=="00"){
                $("#btnEvaluate").prop("disabled",false);
                $("#btnPreview").prop("disabled",false);
                console.log(result.details);
                table.fnAddData(result.details);
            }else{
                table.fnClearTable();
            }
        },
        error: function(e){
            $('#loadingmodal').modal('hide');
            console.log(e);
        }
    });
}





$(".btnPreviewOpcr").on('click', function(){
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsreports/opcrdataaverage",
        data: {
            "OPCRID":sodata.details[0].opcrid
        },
        type:"POST",
        dataType: "json",
        success: function(result){
            if(result.Code=="00"){
                console.log(result.details);
                var tbave = $("#tbodyaverage");
                tbave.empty();
                var rating = 0;
               for(var keys in result.details){
                   rating += parseFloat(result.details[keys].rating);
                   tbave.append('' +
                   '<tr>' +
                   '<td>'+result.details[keys].category+'</td>' +
                   '<td>'+result.details[keys].mfo+'</td>' +
                   '<td>'+result.details[keys].rating+'</td>' +
                   '</tr>');
               }

                $("#lblaverating").text(rating.toFixed(4));
                var adj = '';
                if(parseFloat(rating) == 5.0){
                    adj = 'Outstanding';
                } else if(parseFloat(rating) >= 4 && parseFloat(rating) < 5){
                    adj = 'Very Satisfactory';
                } else if(parseFloat(rating) >= 3 && parseFloat(rating) < 4){
                    adj = 'Satisfactory';
                } else if(parseFloat(rating) >= 2 && parseFloat(rating) < 3){
                    adj = 'Unsatisfactory';
                } else {
                    adj = 'Poor';
                }
                $("#lbladjrating").text(adj);

            }
        },
        error: function(e){
            console.log(e);
        }
    });
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsreports/opcrpmt",
        type:"GET",
        dataType: "json",
        success: function(result){
            if(result.Code=="00"){
                var pmt = '';
                var chairpos = '';
                console.log(result.details);
                var div = '';
                var divpmt = $("#divpmt");
                divpmt.empty();

               for(var keys in result.details){
                   if(result.details[keys].role == 'PMT_HEAD'){
                       pmt = result.details[keys].evaluatorname;
                       chairpos = result.details[keys].position + ", "+result.details[keys].department;
                   }
                   if(result.details[keys].role == 'PMT_EVALUATOR'){
                       div += '<td style="padding: 5px !important;border: none !important;">&nbsp;&nbsp;'+result.details[keys].evaluatorname+'&nbsp;&nbsp;</td>';
                   }
               }
                divpmt.append('<table style="width: 100% !important;"><tr style="width: inherit">'+div+'</tr></table>');
                $("#lblcochair").text(pmt);
                $("#lblchair").text(pmt);
                $("#lblchairposition").text(chairpos);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
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
        var divisionaccountable = '';
        var accomplishment = '';
        var rating = '';
        var emp = JSON.parse('['+data[keys].employees+']');
        for(var k in emp){
            divisionaccountable+='<p style="font-size:11px !important;">' +
            '<span>'+emp[k].name+'</span><br>' +
            '<span>'+emp[k].currentposition+'</span><br>' +
            '<span>('+emp[k].employmenttype+')</span><br>' +
            '<span>-</span>' +
            '</p>';

            accomplishment+='<p style="font-size:11px !important;">' +
            '<span>'+atob(emp[k].accomplishment)+'</span><br>' +
            '<span>-</span>' +
            '</p>';

            rating = emp[k].rating;
        }


        if(so!=data[keys].strategicobjective){
            $("#tblsodata").append('<tr><td colspan="10" style="text-align:left; background-color: grey"><b>'+data[keys].strategicobjective+'</b></td></tr>');
            so = data[keys].strategicobjective;


            if(category!=data[keys].category){
                $("#tblsodata").append('<tr><td colspan="10" style="text-align:left;"><b>'+data[keys].category+'</b></td></tr>');
                $("#tblsodata").append('<tr>' +
                '<td>'+atob(data[keys].mfopap)+'</td>' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+divisionaccountable+'</td> ' +
                '<td>'+accomplishment+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
                category = data[keys].category;
            } else {
                $("#tblsodata").append('<tr>' +
                '<td>'+atob(data[keys].mfopap)+'</td> ' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+divisionaccountable+'</td> ' +
                '<td>'+accomplishment+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"a")+'</td> ' +
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
                '<td>'+divisionaccountable+'</td> ' +
                '<td>'+accomplishment+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"a")+'</td> ' +
                '<td></td> </tr>');
                category = data[keys].category;
            } else {
                $("#tblsodata").append('<tr> ' +
                '<td>'+atob(data[keys].mfopap)+'</td>' +
                '<td>'+atob(data[keys].successindicator)+'</td> ' +
                '<td>'+formatCurrency(data[keys].allottedbudget)+'</td> ' +
                '<td>'+divisionaccountable+'</td> ' +
                '<td>'+accomplishment+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"q")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"e")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"t")+'</td> ' +
                '<td>'+loadRatings2(JSON.parse(atob(rating)),data,"a")+'</td> ' +
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