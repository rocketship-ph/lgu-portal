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
                    <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Performance Management Menu</h4>
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
                <div class="panel" align="center" id="panel_opcr">
                    <a href="<?php echo base_url();?>main/opcr" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/opcr.png" height="40px">
                        <br>
                        OPCR
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_ipcr">
                    <a href="<?php echo base_url();?>main/ipcr" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/ipcr.png" height="40px">
                        <br>
                        IPCR
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
        <div class="col-lg-12">
            <legend style="margin-bottom: 5px">Individual Performance Commitment and Review (IPCR)</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" id="li_submitipcr" href="#submitIpcr">Submit IPCR</a></li>
                        <li><a data-toggle="pill" id="li_approveipcr" href="#approveIpcr">Approve IPCR</a></li>
                    </ul>
                    <div class="tab-content">
                        <hr>
                        <div id="submitIpcr" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12" align="left">
                                    <h4><b>Submit IPCR </b></h4>
                                    <p style="font-size: 11px">Carefully check the data of your IPCR before submitting them to your respective department head</p>
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <label class="control-label">Evaluation Period:<span style="color:red;font-weight: bold">*</span></label>
                                            <select class="form-control clearField" id="soPeriod"></select>
                                        </div>
                                        <div class="form-group col-md-2" style="padding: 5px;">
                                            <br>
                                            <button class="btn btn-success btn-block saveBtnClass" id="btnSubmitIpcr">SUBMIT IPCR</button>
                                            <!--                                    <a class="btn btn-block btn-default" id="btnPreview"><i class="fa fa-print"></i>&nbsp;PREVIEW</a>-->
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="col-md-12">
                                    <div class="table-responsive" id="tblipcrcontainer">
                                        <table id="tblipcr" class="display responsive compact" cellspacing="0" width="100%" >
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
                                            </tr>
                                            <tr align="center">
                                                <th>Q</th>
                                                <th>E</th>
                                                <th>T</th>
                                                <th>A</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="approveIpcr" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-10" align="left">
                                    <h4><b>Approve IPCR </b></h4>
                                    <p style="font-size: 11px">Approve or Reject IPCR submitted by the personnel in the department. Only those approved IPCR will appear on the OPCR to be submitted to the municipal head.</p>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Evaluation Period:<span style="color:red;font-weight: bold">*</span></label>
                                            <select class="form-control clearField" id="approvesoPeriod"></select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Personnel:<span style="color:red;font-weight: bold">*</span></label>
                                            <select class="form-control clearField" id="approvePersonnel"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-success btn-block saveBtnClass" id="btnApproveIpcr">APPROVE IPCR</button>
                                    <button class="btn btn-primary btn-block saveBtnClass" id="btnRejectIpcr">REJECT IPCR</button>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="table-responsive" id="tblapproveipcrcontainer">
                                        <table id="tblapproveipcr" class="display responsive compact" cellspacing="0" width="100%" >
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
        $("#nav_pms_ipcr").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_ipcr").addClass("selected_panel");

        window.isUpdate = false;
        loadPeriod();
        <?php if($this->session->userdata('userlevel') != 'DEPARTMENTHEAD'):?>
        $("#li_submitipcr").click();
        <?php endif;?>
        <?php if($this->session->userdata('userlevel') == 'DEPARTMENTHEAD'):?>
        $("#li_approveipcr").click();
        <?php endif;?>
    });

    $("#li_submitipcr").click(function(){
        loadData();
    });

    $("#li_approveipcr").click(function(){
        loadPendingData();
    });

    function loadPeriod(){
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
            type: "POST",
            dataType: "json",
            success: function(result){
                var select = $("#soPeriod");
                var select2 = $("#approvesoPeriod");
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
                    $("#addSOModal").modal("show");
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

    $("#soPeriod").change(function(){
        loadIpcrData($(this).val())
    });

    $("#approvesoPeriod").change(function(){
       var select = $("#approvePersonnel");
        select.empty();
        var table  = $("#tblapproveipcr").dataTable();
        table.fnClearTable();
        $("#loadingmodal").modal("show");
        $.ajax({
           url: "<?php echo base_url();?>ipcrmanagement/displaypersonnel",
            type: "POST",
            dataType: "json",
            data: {
                "PERIOD":$(this).val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");

                if(result.Code == "00"){
                    select.append("<option selected disabled>- Select Personnel -</option>");
                    for(var keys in result.details){
                        select.append("<option value='"+result.details[keys].username+"'>"+result.details[keys].name+"</option>")
                    }
                } else {
                    select.append("<option selected disabled>- No Personnel Available -</option>");

                }
            },
            error: function(e){
                select.append("<option selected disabled>- No Personnel Available -</option>");
            }
        });
    });

    $("#approvePersonnel").change(function(){
        $('#loadingmodal').modal('show');
        var table  = $("#tblapproveipcr").dataTable();
        table.fnClearTable();
        $.ajax({
            url:"<?php  echo base_url(); ?>ipcrmanagement/pendingipcr",
            data: {
                "PERIOD":$("#approvesoPeriod option:selected").val(),
                "EMPLOYEE":$("#approvePersonnel option:selected").val()
            },
            type:"POST",
            dataType: "json",
            success: function(result){
                $('#loadingmodal').modal('hide');
                if(result.Code=="00"){
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
    });

    function loadData(){
        $("#tblipcr").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No IPCR Data Available"
            },

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
                    return atob(data.actualaccomplishment);
                }},
                {"data":function(data){
                   var j = JSON.parse(atob(data.rating));
                    return j.Q;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    return j.E;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    return j.T;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    return j.A;
                }}
            ]
        });
    }

    function loadPendingData(){
        $("#tblapproveipcr").dataTable({
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
                    var sel1='',sel2='',sel3='',sel4='',sel5='';
                    if(rating == '5'){sel5 = 'selected';}
                    if(rating == '4'){sel4 = 'selected';}
                    if(rating == '3'){sel3 = 'selected';}
                    if(rating == '2'){sel2 = 'selected';}
                    if(rating == '1'){sel1 = 'selected';}
                    var select = "<select class='form-control ratingQ' rating-type='Q' ipcr-id='"+data.ipcrid+"'>" +
                        "<option value='5' "+sel5+">5</option>" +
                        "<option value='4' "+sel4+">4</option>" +
                        "<option value='3' "+sel3+">3</option>" +
                        "<option value='2' "+sel2+">2</option>" +
                        "<option value='1' "+sel1+">1</option>" +
                        "</select>";
                    return select;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    var rating = j.E;
                    var sel1='',sel2='',sel3='',sel4='',sel5='';
                    if(rating == '5'){sel5 = 'selected';}
                    if(rating == '4'){sel4 = 'selected';}
                    if(rating == '3'){sel3 = 'selected';}
                    if(rating == '2'){sel2 = 'selected';}
                    if(rating == '1'){sel1 = 'selected';}
                    var select = "<select class='form-control ratingE' rating-type='E' ipcr-id='"+data.ipcrid+"'>" +
                        "<option value='5' "+sel5+">5</option>" +
                        "<option value='4' "+sel4+">4</option>" +
                        "<option value='3' "+sel3+">3</option>" +
                        "<option value='2' "+sel2+">2</option>" +
                        "<option value='1' "+sel1+">1</option>" +
                        "</select>";
                    return select;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    var rating = j.T;
                    var sel1='',sel2='',sel3='',sel4='',sel5='';
                    if(rating == '5'){sel5 = 'selected';}
                    if(rating == '4'){sel4 = 'selected';}
                    if(rating == '3'){sel3 = 'selected';}
                    if(rating == '2'){sel2 = 'selected';}
                    if(rating == '1'){sel1 = 'selected';}
                    var select = "<select class='form-control ratingT' rating-type='T' ipcr-id='"+data.ipcrid+"'>" +
                        "<option value='5' "+sel5+">5</option>" +
                        "<option value='4' "+sel4+">4</option>" +
                        "<option value='3' "+sel3+">3</option>" +
                        "<option value='2' "+sel2+">2</option>" +
                        "<option value='1' "+sel1+">1</option>" +
                        "</select>";
                    return select;
                }},
                {"data":function(data){
                    var j = JSON.parse(atob(data.rating));
                    return "<span class='ratingAve' rating-type='A' ipcr-id='"+data.ipcrid+"'>"+j.A+"</span>";
                }}
            ]
        });
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

    function loadIpcrData(period){
        $('#loadingmodal').modal('show');
        var table  = $("#tblipcr").dataTable();
        table.fnClearTable();
        $.ajax({
            url:"<?php  echo base_url(); ?>ipcrmanagement/display",
            data: {
                "PERIOD":period
            },
            type:"POST",
            dataType: "json",
            success: function(result){
                $('#loadingmodal').modal('hide');
                if(result.Code=="00"){
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

    $("#btnSubmitIpcr").click(function(){
        var table = $('#tblipcr').dataTable();
        var data = table.fnGetData();
        if($("#soPeriod option:selected").val() == "- Select Period -") {
            messageDialogModal("Server Message","Please Select Evaluation Period for the IPCR to be submitted");
        } else if(data.length<=0) {
            messageDialogModal("Server Message","No IPCR Data to be submitted");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>ipcrmanagement/submit",
                type: "POST",
                dataType: "json",
                data: {
                    "IPCR":data,
                    "PERIOD":$("#soPeriod option:selected").val(),
                    "PERIODFROM": $("#soPeriod option:selected").attr("period-from"),
                    "PERIODTO": $("#soPeriod option:selected").attr("period-to")
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        messageDialogModal("Server Message",data.Message);
                        clearField();
                        $("#tblipcr").dataTable().fnClearTable();
                    } else if(data.Code == "15") {
                        $("#existmessage").text(data.Message);
                        $("#modalexist").modal("show");
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

    $("#continueSubmit").click(function(){
        var table = $('#tblipcr').dataTable();
        var data = table.fnGetData();
        $("#modalexist").modal("hide");
        $('#loadingmodal').modal('show');
        $.ajax({
            url: "<?php echo base_url();?>ipcrmanagement/submit",
            type: "POST",
            dataType: "json",
            data: {
                "IPCR":data,
                "PERIOD":$("#soPeriod option:selected").val(),
                "PERIODFROM": $("#soPeriod option:selected").attr("period-from"),
                "PERIODTO": $("#soPeriod option:selected").attr("period-to"),
                "PROCEED" :"YES"
            },
            success: function(data){
                $('#loadingmodal').modal('hide');
                console.log(data);
                if(data.Code == "00"){
                    messageDialogModal("Server Message",data.Message);
                    clearField();
                    $("#tblipcr").dataTable().fnClearTable();
                } else {
                    messageDialogModal("Server Message",data.Message);
                }

            },
            error: function(e){
                console.log(e);
                $('#loadingmodal').modal('hide');
            }
        });
    });

    $("#btnApproveIpcr").click(function(){
        var table = $('#tblapproveipcr').dataTable();
        var data = table.fnGetData();
        var arr = [];
        for(var keys in data){
            var obj = new Object();
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

            arr.push({
                    accomplishment: data[keys].accomplishment,
                allottedbudget: data[keys].allottedbudget,
                category: data[keys].category,
                currentposition: data[keys].currentposition,
                department: data[keys].department,
                employeedepartment: data[keys].employeedepartment,
                employmenttype: data[keys].employmenttype,
                ipcrid: data[keys].ipcrid,
                mfopap: data[keys].mfopap,
                mfopapid: data[keys].mfopapid,
                name: data[keys].name,
                period: data[keys].period,
                periodfrom: data[keys].periodfrom,
                periodto: data[keys].periodto,
                rating: btoa(JSON.stringify(obj)),
                soid: data[keys].soid,
                status: data[keys].status,
                strategicobjective: data[keys].strategicobjective,
                successindicator: data[keys].successindicator,
                userlevel: data[keys].userlevel,
                username: data[keys].username
            });
        }

        if($("#approvesoPeriod option:selected").val() == "- Select Period -") {
            messageDialogModal("Server Message","Please Select Evaluation Period");
        } else if($("#approvePersonnel option:selected").val() == "- Select Personnel -") {
            messageDialogModal("Server Message","Please Select Personnel");
        } else if(data.length<=0) {
            messageDialogModal("Server Message","No IPCR Data to be approved");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>ipcrmanagement/approve",
                type: "POST",
                dataType: "json",
                data: {
                    "IPCR":arr,
                    "PERIOD":$("#approvesoPeriod option:selected").val(),
                    "PERIODFROM": $("#approvesoPeriod option:selected").attr("period-from"),
                    "PERIODTO": $("#approvesoPeriod option:selected").attr("period-to"),
                    "USERNAME": $("#approvePersonnel option:selected").val()
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        messageDialogModal("Server Message",data.Message);
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                    clearField();

                    $("#tblapproveipcr").dataTable().fnClearTable();
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
    });

    $("#btnRejectIpcr").click(function(){
        if($("#approvesoPeriod option:selected").val() == "- Select Period -") {
            messageDialogModal("Server Message","Please Select Evaluation Period");
        } else if($("#approvePersonnel option:selected").val() == "- Select Personnel -") {
            messageDialogModal("Server Message","Please Select Personnel");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>ipcrmanagement/reject",
                type: "POST",
                dataType: "json",
                data: {
                    "PERIOD":$("#approvesoPeriod option:selected").val(),
                    "PERIODFROM": $("#approvesoPeriod option:selected").attr("period-from"),
                    "PERIODTO": $("#approvesoPeriod option:selected").attr("period-to"),
                    "USERNAME": $("#approvePersonnel option:selected").val()
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        messageDialogModal("Server Message",data.Message);
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                    clearField();

                    $("#tblapproveipcr").dataTable().fnClearTable();
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
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
<style>
    .s_o{
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3); /* IE */
        -moz-transform: scale(1.3); /* FF */
        -webkit-transform: scale(1.3); /* Safari and Chrome */
        -o-transform: scale(1.3); /* Opera */
        padding: 10px;
    }
</style>