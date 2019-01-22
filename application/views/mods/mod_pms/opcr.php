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
            <legend style="margin-bottom: 5px">Office Performance Commitment and Review (OPCR)</legend>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12" align="left">
                            <h4><b>Submit OPCR </b></h4>
                            <p style="font-size: 11px">Carefully check the data of the OPCR before submitting them to the municipal head. Note that the ratings can be changed by the PMT evaluators if needed.</p>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class="control-label">Evaluation Period:<span style="color:red;font-weight: bold">*</span></label>
                                    <select class="form-control clearField" id="soPeriod"></select>
                                </div>
                                <div class="form-group col-md-2" style="padding-top: 5px">
                                    <br>
                                    <button class="btn btn-success btn-block saveBtnClass" id="btnSubmitOpcr">SUBMIT OPCR</button>
                                    <!--                            <a class="btn btn-block btn-default" id="btnpreview"><i class="fa fa-print"></i>&nbsp;PREVIEW</a>-->
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="col-md-12">
                            <div class="table-responsive" id="tblopcrcontainer">
                                <table id="tblopcr" class="display responsive compact" cellspacing="0" width="100%" >
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
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalexist" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header" >
                <span>OPCR Found</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p id="existmessage"></p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url();?>pms/reports" class="btn btn-success">VIEW REPORTS</a>
                <input type="button" class="btn btn-default" data-dismiss="modal"  onclick="$('#messagedialogmodal').modal('hide');" value="CLOSE">
            </div>
        </div>
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function(){
        var sodata;
        $("#nav_pms_opcr").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_opcr").addClass("selected_panel");

        window.isUpdate = false;
        loadPeriod();
        loadData();
    });

    function loadPeriod(){
        $.ajax({
            url: "<?php echo base_url();?>strategicobjectivemanagement/evaluationperiod",
            type: "POST",
            dataType: "json",
            success: function(result){
                var select = $("#soPeriod");
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

    $("#soPeriod").change(function(){
        loadOpcrData($(this).val())
    });

    function loadData(){
        $("#tblopcr").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No OPCR Data Available"
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
                    return atob(data.accomplishment);
                }},
                {"data":"Q"},
                {"data":"E"},
                {"data":"T"},
                {"data":"A"}
            ]
        });
    }

    function loadOpcrData(period){
        $('#loadingmodal').modal('show');
        var table  = $("#tblopcr").dataTable();
        table.fnClearTable();
        $.ajax({
            url:"<?php  echo base_url(); ?>opcrmanagement/display",
            data: {
                "PERIOD":period
            },
            type:"POST",
            dataType: "json",
            success: function(result){
                sodata = result;
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

    $("#btnSubmitOpcr").click(function(){
        var table = $('#tblopcr').dataTable();
        var data = table.fnGetData();

        if($("#soPeriod option:selected").val() == "- Select Period -") {
            messageDialogModal("Server Message","Please Select Evaluation Period for the OPCR to be submitted");
        } else if(data.length<=0) {
            messageDialogModal("Server Message","No OPCR Data to be submitted");
        } else {
            $('#loadingmodal').modal('show');

            var arr = [];
            for(var keys in data){
                var obj = new Object();

                obj['Q'] = data[keys].A;
                obj['E'] = data[keys].E;
                obj['T'] = data[keys].T;
                obj['A'] = data[keys].A;

                arr.push({
                    accomplishment: data[keys].accomplishment,
                    allottedbudget: data[keys].allottedbudget,
                    category: data[keys].category,
                    currentposition: data[keys].currentposition,
                    department: data[keys].department,
                    employmenttype: data[keys].employmenttype,
                    ipcrid: data[keys].ipcrid,
                    mfodepartment: data[keys].mfodepartment,
                    mfopap: data[keys].mfopap,
                    mfopapid: data[keys].mfopapid,
                    name: data[keys].name,
                    period: data[keys].period,
                    periodfrom: data[keys].periodfrom,
                    periodto: data[keys].periodto,
                    soid: data[keys].soid,
                    strategicobjective: data[keys].strategicobjective,
                    successindicator: data[keys].successindicator,
                    userlevel: data[keys].userlevel,
                    username: data[keys].username,
                    rating: btoa(JSON.stringify(obj))
                });
            }
            $.ajax({
                url: "<?php echo base_url();?>opcrmanagement/submit",
                type: "POST",
                dataType: "json",
                data: {
                    "OPCR":arr,
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
                        $("#tblopcr").dataTable().fnClearTable();
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
        var table = $('#tblopcr').dataTable();
        var data = table.fnGetData();
        $("#modalexist").modal("hide");
        $('#loadingmodal').modal('show');
        var arr = [];
        for(var keys in data){
            var obj = new Object();

            obj['Q'] = data[keys].A;
            obj['E'] = data[keys].E;
            obj['T'] = data[keys].T;
            obj['A'] = data[keys].A;

            arr.push({
                accomplishment: data[keys].accomplishment,
                allottedbudget: data[keys].allottedbudget,
                category: data[keys].category,
                currentposition: data[keys].currentposition,
                department: data[keys].department,
                employmenttype: data[keys].employmenttype,
                ipcrid: data[keys].ipcrid,
                mfodepartment: data[keys].mfodepartment,
                mfopap: data[keys].mfopap,
                mfopapid: data[keys].mfopapid,
                name: data[keys].name,
                period: data[keys].period,
                periodfrom: data[keys].periodfrom,
                periodto: data[keys].periodto,
                soid: data[keys].soid,
                strategicobjective: data[keys].strategicobjective,
                successindicator: data[keys].successindicator,
                userlevel: data[keys].userlevel,
                username: data[keys].username,
                rating: btoa(JSON.stringify(obj))
            });
        }
        $.ajax({
            url: "<?php echo base_url();?>opcrmanagement/submit",
            type: "POST",
            dataType: "json",
            data: {
                "OPCR":arr,
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
                    $("#tblopcr").dataTable().fnClearTable();
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



    function loadTableData(){
        $("#tblsodata").empty();
        $("#tblsodata").append('<tr> <th rowspan="2">MFO/PAP</th> <th rowspan="2">SUCCESS INDICATOR(TARGET + MEASURES)</th> <th rowspan="2">Allotted Budget</th> <th rowspan="2">Division Accountable</th> <th rowspan="2">Actual Accomplishments</th> <th colspan="4">Rating</th> <th rowspan="2"  width="20%">Remarks</th> </tr> <tr> <td width="2%">Q</td> <td width="2%">E</td> <td width="2%">T</td> <td width="2%">A</td> </tr>');
        var so="", category="";
        var data = sodata.details;
        // var x = JSON.parse('{ "Code": "00", "Message": "Successfully Fetched Data", "details": [{ "id": "1", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "ACCOUNTING", "mfopap": "RW1wbG95ZWVzJyBTdGF0ZW1lbnQgb2YgQXNzZXRzIExpYWJpbGl0aWVzIGFuZCBOZXR3b3J0aCBmb3Jt", "category": "CORE FUNCTION", "successindicator": "U3VibWl0IDEwMCUgb2YgZXZhbHVhdGVkIFNBTE4gRm9ybXMgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIHdpdGggMTAwJSBhY2N1cmFjeSBieSB0aGUgZW5kIG9mIHRoZSBzZW1lc3Rlcg==", "allottedbudget": "0.00", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "12", "actualaccomplishment": "MjAwIEtBIEJpcnRoZGF5IENhcmRzIGlzc3VlZCB3aXRoaW4gdGhlIHNlbWVzdGVy", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "2", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "HUMAN RESOURCE", "mfopap": "VGVzdA==", "category": "STRATEGIC PRIORITIES", "successindicator": "VGVzdA==", "allottedbudget": "", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "16", "actualaccomplishment": "U0FMTiBGb3JtcyBldmFsdWF0ZWQgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIEp1bmUgMjAsIDIwMTg=", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "2", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "HUMAN RESOURCE", "mfopap": "VGVzdA==", "category": "STRATEGIC PRIORITIES", "successindicator": "VGVzdA==", "allottedbudget": "", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "16", "actualaccomplishment": "U0FMTiBGb3JtcyBldmFsdWF0ZWQgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIEp1bmUgMjAsIDIwMTg=", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }, { "id": "1", "strategicobjective": "UPHOLDING DYNAMIC AND ACCOUNTABLE GOVERNANCE", "department": "ACCOUNTING", "mfopap": "RW1wbG95ZWVzJyBTdGF0ZW1lbnQgb2YgQXNzZXRzIExpYWJpbGl0aWVzIGFuZCBOZXR3b3J0aCBmb3Jt", "category": "CORE FUNCTION", "successindicator": "U3VibWl0IDEwMCUgb2YgZXZhbHVhdGVkIFNBTE4gRm9ybXMgdG8gdGhlIE9mZmljZSBvZiB0aGUgT21idWRzbWFuIHdpdGggMTAwJSBhY2N1cmFjeSBieSB0aGUgZW5kIG9mIHRoZSBzZW1lc3Rlcg==", "allottedbudget": "0.00", "employee_username": "ANGELA1234567890", "employee_department": "ACCOUNTING", "datecreated": "2018-09-02 17:22:59", "datemodified": "2018-09-02 21:33:05", "username": "ANGELA1234567890", "soid": "1", "mfopapid": "12", "actualaccomplishment": "MjAwIEtBIEJpcnRoZGF5IENhcmRzIGlzc3VlZCB3aXRoaW4gdGhlIHNlbWVzdGVy", "rating": "eyJRIjoiNCIsIkUiOiI1IiwiVCI6IjQiLCJBIjoiNC4zMyJ9" }] }');
        // var data = x.details;
        for (var keys in data){
            if(so!=data[keys].strategicobjective){
                $("#tblsodata").append('<tr><td colspan="10" style="text-align:left; background-color: grey"><b>'+data[keys].strategicobjective+'</b></td></tr>');
                so = data[keys].strategicobjective;
                if(category!=data[keys].category){
                    $("#tblsodata").append('<tr><td colspan="10" style="text-align:left;"><b>'+data[keys].category+'</b></td></tr>');
                    $("#tblsodata").append('<tr> <td>'+atob(data[keys].mfopap)+'</td> <td>'+atob(data[keys].successindicator)+'</td> <td>'+formatCurrency(data[keys].allottedbudget)+'</td> <td>'+data[keys].department+'</td> <td>'+atob(data[keys].actualaccomplishment)+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> <td></td> </tr>');
                    category = data[keys].category;
                } else {
                    $("#tblsodata").append('<tr> <td>'+atob(data[keys].mfopap)+'</td> <td>'+atob(data[keys].successindicator)+'</td> <td>'+formatCurrency(data[keys].allottedbudget)+'</td> <td>'+data[keys].department+'</td> <td>'+atob(data[keys].actualaccomplishment)+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> <td></td> </tr>');
                }
            } else {
                so = data[keys].strategicobjective;
                if(category!=data[keys].category){
                    $("#tblsodata").append('<tr><td colspan="10" style="text-align:left;"><b>'+data[keys].category+'</b></td></tr>');
                    $("#tblsodata").append('<tr> <td>'+atob(data[keys].mfopap)+'</td> <td>'+atob(data[keys].successindicator)+'</td> <td>'+formatCurrency(data[keys].allottedbudget)+'</td> <td>'+data[keys].department+'</td> <td>'+atob(data[keys].actualaccomplishment)+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> <td></td> </tr>');
                    category = data[keys].category;
                } else {
                    $("#tblsodata").append('<tr> <td>'+atob(data[keys].mfopap)+'</td> <td>'+atob(data[keys].successindicator)+'</td> <td>'+formatCurrency(data[keys].allottedbudget)+'</td> <td>'+data[keys].department+'</td> <td>'+atob(data[keys].actualaccomplishment)+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"q")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"e")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"t")+'</td> <td>'+loadRatings2(JSON.parse(atob(data[keys].rating)),data,"a")+'</td> <td></td> </tr>');
                }
            }
        }
    }
    $("#btnpreview").on('click', function(){
        $("#modalpreview").modal('show');
        loadTableData();
    });
    $("#btnsaveclose").on('click', function(){
        $("#modalpreview").modal('hide');

    });
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