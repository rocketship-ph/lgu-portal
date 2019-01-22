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
            <legend style="margin-bottom: 5px">Office Performance Commitment and Review (OPCR)</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10" align="left">
                        <h4><b>Evaluate OPCR </b></h4>
                        <p style="font-size: 11px">Evaluate the OPCR submitted by the department head to the municipal head/admin. Note that OPCRs can only be approved and evaluated once. OPRCs that are already evaluated will not be displayed on this page. <b><a href="<?php echo base_url();?>pmsreports/opcrreport">Click here to view evaluated OPCRs</a></b></p>
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
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 12px;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <button class="btn btn-success btn-block saveBtnClass" id="btnEvaluate">SUBMIT EVALUATION</button>
                        <button class="btn btn-default btn-block saveBtnClass" id="btnPreview">PREVIEW OPCR</button>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="table-responsive" id="tblevaluateopcrcontainer">
                            <table id="tblevaluateopcr" class="display responsive compact" cellspacing="0" width="100%" >
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

<script type="application/javascript">
$(document).ready(function(){
    $("#nav_pms_evaluate").removeClass().addClass("active");

    $("#ul_pmsmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_opcr").addClass("selected_panel");

    window.isUpdate = false;
    $("#btnEvaluate").prop("disabled",true);
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
        loadOpcrData($("#period option:selected").val(),$("#department option:selected").val());
    }
});


function loadData(){
    $("#tblevaluateopcr").dataTable({
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
                var input = "<select style='width:50px !important;font-size: 13px !important;padding:5px 0 !important;' class='form-control opcrQ' rating-type='Q' data-ids='"+ids.toString()+"'>" +
                    "<option value='"+parseFloat(avg).toFixed(2)+"' selected>"+parseFloat(avg).toFixed(2)+"</option>" +
                    "<option value='5'>5</option>" +
                    "<option value='4'>4</option>" +
                    "<option value='3'>3</option>" +
                    "<option value='2'>2</option>" +
                    "<option value='1'>1</option>" +
                    "</select>";
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
                var input = "<select style='width:50px !important;font-size: 13px !important;padding:5px 0 !important;' class='form-control opcrE' rating-type='E' data-ids='"+ids.toString()+"'>" +
                    "<option value='"+parseFloat(avg).toFixed(2)+"' selected>"+parseFloat(avg).toFixed(2)+"</option>" +
                    "<option value='5'>5</option>" +
                    "<option value='4'>4</option>" +
                    "<option value='3'>3</option>" +
                    "<option value='2'>2</option>" +
                    "<option value='1'>1</option>" +
                    "</select>";
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
                var input = "<select style='width:50px !important;font-size: 13px !important;padding:5px 0 !important;' class='form-control opcrT' rating-type='T' data-ids='"+ids.toString()+"'>" +
                    "<option value='"+parseFloat(avg).toFixed(2)+"' selected>"+parseFloat(avg).toFixed(2)+"</option>" +
                    "<option value='5'>5</option>" +
                    "<option value='4'>4</option>" +
                    "<option value='3'>3</option>" +
                    "<option value='2'>2</option>" +
                    "<option value='1'>1</option>" +
                    "</select>";
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
                var input = '<input style="width:45px !important" type="text" class="form-control opcrA" rating-type="A" data-ids="'+ids.toString()+'" value="'+parseFloat(avg).toFixed(2)+'" readonly>';
                return input;
            }},
            {"data":function(data){
                var emp = JSON.parse('['+data.employees+']');
                var ids = [];
                for(var keys in emp){
                    ids.push(emp[keys].ipcrid);
                }
                return "<textarea class='form-control txtRemarks' data-ids='"+ids.toString()+"'></textarea>";
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

$(document).on('change','.opcrQ',function(){
    var ave = parseFloat($(this).val()) + parseFloat($(".opcrE[data-ids='"+$(this).attr('data-ids')+"']").val()) +parseFloat($(".opcrT[data-ids='"+$(this).attr('data-ids')+"']").val());
    $(".opcrA[data-ids='"+$(this).attr('data-ids')+"']").val((ave/3).toFixed(2));
});

$(document).on('change','.opcrE',function(){
    var ave = parseFloat($(this).val()) + parseFloat($(".opcrQ[data-ids='"+$(this).attr('data-ids')+"']").val()) +parseFloat($(".opcrT[data-ids='"+$(this).attr('data-ids')+"']").val());
    $(".opcrA[data-ids='"+$(this).attr('data-ids')+"']").val((ave/3).toFixed(2));
});

$(document).on('change','.opcrT',function(){
    var ave = parseFloat($(this).val()) + parseFloat($(".opcrQ[data-ids='"+$(this).attr('data-ids')+"']").val()) +parseFloat($(".opcrE[data-ids='"+$(this).attr('data-ids')+"']").val());
    $(".opcrA[data-ids='"+$(this).attr('data-ids')+"']").val((ave/3).toFixed(2));
});

function loadOpcrData(period,department){
    $('#loadingmodal').modal('show');
    var table  = $("#tblevaluateopcr").dataTable();
    table.fnClearTable();
    $.ajax({
        url:"<?php  echo base_url(); ?>pmsevaluation/opcrdata",
        data: {
            "PERIOD":period,
            "DEPARTMENT":department
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
        var table = $('#tblevaluateopcr').dataTable();
        var data = table.fnGetData();
        var arr = [];
        var opcrid= '';

        for(var keys in data){
            op
            var emp = JSON.parse('['+data[keys].employees+']');
            for(var k in emp){
                var obj = new Object();
                var remarks = "";
                $(".opcrQ").each(function(){
                    var ids = JSON.parse('['+$(this).attr("data-ids")+']');
                    if(jQuery.inArray(emp[k].ipcrid, ids) !== -1){
                        obj["Q"] = $(this).val();
                    }
                });

                $(".opcrE").each(function(){
                    var ids = JSON.parse('['+$(this).attr("data-ids")+']');
                    if(jQuery.inArray(emp[k].ipcrid, ids) !== -1){
                        obj["E"] = $(this).val();
                    }
                });

                $(".opcrT").each(function(){
                    var ids = JSON.parse('['+$(this).attr("data-ids")+']');
                    if(jQuery.inArray(emp[k].ipcrid, ids) !== -1){
                        obj["T"] = $(this).val();
                    }
                });

                $(".opcrA").each(function(){
                    var ids = JSON.parse('['+$(this).attr("data-ids")+']');
                    if(jQuery.inArray(emp[k].ipcrid, ids) !== -1){
                        obj["A"] = $(this).val();
                    }
                });

                $(".txtRemarks").each(function(){
                    var ids = JSON.parse('['+$(this).attr("data-ids")+']');
                    if(jQuery.inArray(emp[k].ipcrid, ids) !== -1){
                        remarks = $(this).val();
                    }
                });


                arr.push({
                    opcrid: data[keys].opcrid,
                    department: data[keys].department,
                    ipcrid: emp[k].ipcrid,
                    rating: btoa(JSON.stringify(obj)),
                    type: 'OPCR',
                    username: emp[k].username,
                    period: data[keys].period,
                    mfopapid: data[keys].mfopapid,
                    soid: data[keys].soid,
                    remarks: remarks
                });
            }
        }

        console.log(arr);

        $('#loadingmodal').modal('show');
        $.ajax({
            url: "<?php echo base_url();?>pmsevaluation/submitopcr",
            type: "POST",
            dataType: "json",
            data: {
                "OPCR":arr,
                "PERIOD":$("#period option:selected").val(),
                "DEPARTMENT": $("#department option:selected").val()
            },
            success: function(data){
                $('#loadingmodal').modal('hide');
                console.log(data);
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                    clearField();
                    $("#tblevaluateopcr").dataTable().fnClearTable();
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
    if($("#period option:selected").val() == "- Select Period -" || $("#period option:selected").val() == "- No Period Available -"){
        messageDialogModal("Required","Please select period");
        return false;
    }
    if($("#department option:selected").val() == "- Select Department -" || $("#period option:selected").val() == "- No Department Available -"){
        messageDialogModal("Required","Please select department");
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