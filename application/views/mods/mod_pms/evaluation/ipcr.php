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
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #00C853;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>PMS Evaluation Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td style="border: 1px solid #d1d1d1">
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <?php if ($this->session->userdata('pmt') == "PMT_HEAD"):?>
                <td>
                    <div class="panel" align="center" id="panel_opcr">
                        <a href="<?php echo base_url();?>pmsevaluation/opcr" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                            <img src="<?php echo base_url();?>assets/img/icons/opcr.png" height="40px">
                            <br>
                            Evaluate OPCR
                        </a>
                    </div>
                </td>
                <td align="center" width="20px">
                    &nbsp;&nbsp;
                </td>
            <?php endif;?>
            <?php if ($this->session->userdata('pmt') == "PMT_EVALUATOR"):?>
            <td>
                <div class="panel" align="center" id="panel_ipcr">
                    <a href="<?php echo base_url();?>pmsevaluation/ipcr" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/ipcr.png" height="40px">
                        <br>
                        Evaluate IPCR
                    </a>
                </div>
            </td>
            <?php endif;?>
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
                    <div class="col-md-10" align="left">
                        <h4><b>Evaluate IPCR </b></h4>
                        <p style="font-size: 11px">Evaluate the IPCR submitted by the employee to their department heads. Only the IPCRs approved by the department head will be displayed for evaluation. IPCRs that are already evaluated will be not displayed on this page. <b><a href="<?php echo base_url();?>pmsreports/evaluatedipcr">Click here to view evaluated IPCRs</a></b></p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Evaluation Period:<span style="color:red;font-weight: bold">*</span></label>
                                <select class="form-control clearField" id="period"></select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Department:<span style="color:red;font-weight: bold">*</span></label>
                                <select class="form-control clearField" id="department">
                                    <option selected disabled>- Select Evaluation Period First -</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Employee:<span style="color:red;font-weight: bold">*</span></label>
                                <select class="form-control clearField" id="employee">
                                    <option selected disabled>- Select Department First -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 12px;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnEvaluate">SUBMIT EVALUATION</button>
                        <button class="btn btn-default btn-block saveBtnClass" id="btnPreview">PREVIEW IPCR</button>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="table-responsive" id="tblevaluateipcrcontainer">
                            <table id="tblevaluateipcr" class="display responsive compact" cellspacing="0" width="100%" >
                                <thead>
                                <tr align="center">
                                    <th rowspan="2">STRATEGIC OBJECTIVE</th>
                                    <th rowspan="2">CATEGORY</th>
                                    <th rowspan="2">MFO/PAP</th>
                                    <th rowspan="2">SUCCESS INDICATORS (Target+Measures)</th>
                                    <th rowspan="2">ALLOTTED BUDGET</th>
<!--                                    <th rowspan="2">DIVISION ACCOUNTABLE</th>-->
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

<script type="application/javascript">
$(document).ready(function(){
    $("#nav_pms_evaluate").removeClass().addClass("active");

    $("#ul_pmsmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_ipcr").addClass("selected_panel");

    window.isUpdate = false;
    $("#btnEvaluate").prop("disabled",true);
    $("#btnPreview").prop("disabled",true);
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

function loadDepartments(){
    var select = $("#department");
    select.empty();
    select.append("<option selected disabled>- Select Department -</option>");
    $.ajax({
        url: "<?php echo base_url();?>departmentmanagement/displaydepartments",
        type: "POST",
        dataType: "json",
        success: function(result){
            if(result.Code == "00"){
                for(var keys in result.details){
                    var option = '<option deptid="'+result.details[keys].id+'" desc="'+result.details[keys].description+'" value="'+result.details[keys].department+'">'+result.details[keys].department+'</option>';
                    select.append(option);
                }
            } else {
                select.append("<option selected disabled>- No Department Available -</option>");
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}

$("#period").change(function(){
    loadDepartments();
});

$("#department").change(function(){
    $("#btnEvaluate").prop("disabled",true);
    $("#btnPreview").prop("disabled",true);
    if($("#period option:selected").val() == "- Select Period -" || $("#period option:selected").val() == "- No Period Available -"){
        messageDialogModal("Required","Please Select Period First");
    } else {
        loadEmployees($("#period option:selected").val(),$(this).val());
    }
});

function loadEmployees(period,department){
    $("#loadingmodal").modal("show");
    var select = $("#employee");
    select.empty();
    var table  = $("#tblevaluateipcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url: "<?php echo base_url();?>ipcrmanagement/displaypersonnelevaluation",
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

$("#employee").change(function(){
    $("#btnEvaluate").prop("disabled",true);
    $("#btnPreview").prop("disabled",true);
   if($("#period option:selected").val() == "- Select Period -" || $("#period option:selected").val() == "- No Period Available -"){
       messageDialogModal("Required","Please Select Period");
   } else if ($("#department option:selected").val() == "- Select Department -" || $("#department option:selected").val() == "- No Department Available -"){
       messageDialogModal("Required","Please Select Department");
   } else {
       loadIpcrData($("#period option:selected").val(),$("#department option:selected").val(),$(this).val());
   }
});


function loadData(){
    $("#tblevaluateipcr").dataTable({
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
//            {"data":function(data){
//                return data.name+"<br>"+data.currentposition+"<br>("+data.employmenttype+")";
//            }},
            {"data":function(data){
                return atob(data.accomplishment);
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.Q;
                var select = "<select class='form-control ratingQ' rating-type='Q' ipcr-id='"+data.ipcrid+"'>" +
                    "<option value='0' "+getSelected('-',rating)+">-</option>" +
                    "<option value='5' "+getSelected('5',rating)+">5</option>" +
                    "<option value='4' "+getSelected('4',rating)+">4</option>" +
                    "<option value='3' "+getSelected('3',rating)+">3</option>" +
                    "<option value='2' "+getSelected('2',rating)+">2</option>" +
                    "<option value='1' "+getSelected('1',rating)+">1</option>" +
                    "</select>";
                return select;
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.E;
                var select = "<select class='form-control ratingE' rating-type='E' ipcr-id='"+data.ipcrid+"'>" +
                    "<option value='0' "+getSelected('-',rating)+">-</option>" +
                    "<option value='5' "+getSelected('5',rating)+">5</option>" +
                    "<option value='4' "+getSelected('4',rating)+">4</option>" +
                    "<option value='3' "+getSelected('3',rating)+">3</option>" +
                    "<option value='2' "+getSelected('2',rating)+">2</option>" +
                    "<option value='1' "+getSelected('1',rating)+">1</option>" +
                    "</select>";
                return select;
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                var rating = j.T;
                var select = "<select class='form-control ratingT' rating-type='T' ipcr-id='"+data.ipcrid+"'>" +
                    "<option value='0' "+getSelected('-',rating)+">-</option>" +
                    "<option value='5' "+getSelected('5',rating)+">5</option>" +
                    "<option value='4' "+getSelected('4',rating)+">4</option>" +
                    "<option value='3' "+getSelected('3',rating)+">3</option>" +
                    "<option value='2' "+getSelected('2',rating)+">2</option>" +
                    "<option value='1' "+getSelected('1',rating)+">1</option>" +
                    "</select>";
                return select;
            }},
            {"data":function(data){
                var j = JSON.parse(atob(data.rating));
                return "<span class='ratingAve' rating-type='A' ipcr-id='"+data.ipcrid+"'>"+j.A+"</span>";
            }},
            {"data":function(data){
                return "<textarea class='form-control txtRemarks' ipcr-id='"+data.ipcrid+"'></textarea>";
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

$(document).on('change','.ratingQ',function(){
    var ave = parseInt($(this).val()) + parseInt($(".ratingE[ipcr-id='"+$(this).attr('ipcr-id')+"']").val()) +parseInt($(".ratingT[ipcr-id='"+$(this).attr('ipcr-id')+"']").val());
    $(".ratingAve[ipcr-id='"+$(this).attr('ipcr-id')+"']").text((ave/3).toFixed(2));
});

$(document).on('change','.ratingE',function(){
    var ave = parseInt($(this).val()) + parseInt($(".ratingQ[ipcr-id='"+$(this).attr('ipcr-id')+"']").val()) +parseInt($(".ratingT[ipcr-id='"+$(this).attr('ipcr-id')+"']").val());
    $(".ratingAve[ipcr-id='"+$(this).attr('ipcr-id')+"']").text((ave/3).toFixed(2));
});

$(document).on('change','.ratingT',function(){
    var ave = parseInt($(this).val()) + parseInt($(".ratingE[ipcr-id='"+$(this).attr('ipcr-id')+"']").val()) +parseInt($(".ratingQ[ipcr-id='"+$(this).attr('ipcr-id')+"']").val());
    $(".ratingAve[ipcr-id='"+$(this).attr('ipcr-id')+"']").text((ave/3).toFixed(2));
});

function loadIpcrData(period,department,username){
    $('#loadingmodal').modal('show');
    var table  = $("#tblevaluateipcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsevaluation/ipcrdata",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department,
            "USERNAME":username
        },
        type:"POST",
        dataType: "json",
        success: function(result){
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

$("#btnEvaluate").click(function(){
    if(!validate()){
        return;
    } else {
        var table = $('#tblevaluateipcr').dataTable();
        var data = table.fnGetData();
        var arr = [];
        for(var keys in data){
            var obj = new Object();
            var remarks = "";
            $(".ratingQ").each(function(){
                if($(this).attr("ipcr-id") == data[keys].ipcrid){
                    obj["Q"] = $(this).val();
                }
            });
            $(".ratingE").each(function(){
                if($(this).attr("ipcr-id") == data[keys].ipcrid){
                    obj["E"] = $(this).val();
                }
            });
            $(".ratingT").each(function(){
                if($(this).attr("ipcr-id") == data[keys].ipcrid){
                    obj["T"] = $(this).val();
                }
            });
            $(".ratingAve").each(function(){
                if($(this).attr("ipcr-id") == data[keys].ipcrid){
                    obj["A"] = $(this).text();
                }
            });

            $(".txtRemarks").each(function(){
                if($(this).attr("ipcr-id") == data[keys].ipcrid){
                    remarks = $(this).val();
                }
            });

            arr.push({
                iopcrid: data[keys].ipcrid,
                rating: btoa(JSON.stringify(obj)),
                type: 'IPCR',
                username: data[keys].username,
                period: data[keys].period,
                mfopapid: data[keys].mfopapid,
                soid: data[keys].soid,
                periodto: data[keys].periodto,
                remarks: remarks
            });
        }

        $('#loadingmodal').modal('show');
        $.ajax({
            url: "<?php echo base_url();?>pmsevaluation/submitipcr",
            type: "POST",
            dataType: "json",
            data: {
                "IPCR":arr,
                "PERIOD":$("#period option:selected").val(),
                "DEPARTMENT": $("#department option:selected").val(),
                "EMPLOYEE": $("#employee option:selected").val()
            },
            success: function(data){
                $('#loadingmodal').modal('hide');
                console.log(data);
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                    clearField();
                    $("#tblevaluateipcr").dataTable().fnClearTable();
                } else {
                    messageDialogModal("Server Message",data.Message);
                }
            },
            error: function(e){
                console.log(e);
                $('#loadingmodal').modal('hide');
            }
        });
    }
});

function validate(){
    var q;
    var e;
    var t;

    $(".ratingQ").each(function(){
        if($(this).val() == "0"){
            q = true;
        }
    });
    $(".ratingE").each(function(){
        if($(this).val() == "0"){
            e = true;
        }
    });
    $(".ratingT").each(function(){
        if($(this).val() == "0"){
            t = true;
        }
    });

    if($("#period option:selected").val() == "- Select Period -" || $("#period option:selected").val() == "- No Period Available -"){
        messageDialogModal("Required","Please select period");
        return false;
    }
    if($("#department option:selected").val() == "- Select Department -" || $("#period option:selected").val() == "- No Department Available -"){
        messageDialogModal("Required","Please select department");
        return false;
    }
    if($("#employee option:selected").val() == "- Select Employee -" || $("#period option:selected").val() == "- No Employee Available -"){
        messageDialogModal("Required","Please select employee");
        return false;
    }
    if(q){
        messageDialogModal("Required","Please provide a appropriate rating for quality");
        return false;
    }
    if(e){
        messageDialogModal("Required","Please provide a appropriate rating for efficiency");
        return false;
    }
    if(t){
        messageDialogModal("Required","Please provide a appropriate rating for timeliness");
        return false;
    }
    return true;
}


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