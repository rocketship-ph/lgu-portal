<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
    th.hide_me, td.hide_me {display: none;}
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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>PMS Menu</h4>
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
                <div class="panel" align="center" id="panel_approvemfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/managemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/manage_mfopap.png" height="40px">
                        <br>
                        Manage MFO/PAP
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createmfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/mfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_mfopap.png" height="40px">
                        <br>
                        Create MFO/PAP
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
            <legend>Create MFO/PAP</legend>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label">STRATEGIC OBJECTIVE: <span class="req">*</span></label>
                        <select class="form-control clearField" id="so" required="">
                        </select>
                        <p style="font-weight: bold" id="lblso"></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">CATEGORY: <span class="req">*</span></label>
                        <select class="form-control clearField" id="category" required="">
                            <option selected disabled>- Select Category -</option>
                            <option value="STRATEGIC PRIORITIES">Strategic Priorities</option>
                            <option value="CORE FUNCTION">Core Functions</option>
                            <option value="SUPPORT FUNCTION">Support Functions</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">MFO/PAP: <span class="req">*</span></label>
                        <textarea id="mfopap" rows="3" style="resize: none" class="form-control clearField" placeholder="Major Final Output / Projects/Activities/Plans.."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">SUCCESS INDICATORS: <span class="req">*</span></label>
                        <textarea id="successindicator" rows="3" style="resize: none" class="form-control clearField" placeholder="Success Indicators (Target + Measures).."></textarea>
                    </div>
                    <div class="form-group" align="right">
                        <button class="btn btn-danger" id="btnAddMfo">Add to Table&nbsp;<i class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="table-responsive" id="tblstrategicobjectivescontainer" style="/*display: none;">
                        <table id="tblmfopap" class="display responsive compact" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th class="hide_me">SOID</th>
                                <th>STRATEGIC OBJECTIVE</th>
                                <th>CATEGORY</th>
                                <th>MFO/PAP</th>
                                <th>SUCCESS INDICATORS</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" align="right">
                    <br>
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url();?>strategicfunctions/mfopap">CANCEL</a>
                        <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalsuccess" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b>Server Message</b>
            </div>
            <div class="modal-body" >
                <label id="successmsg"></label>
                <br>
                <a href="<?php echo base_url();?>strategicfunctions/managemfopap"><b>Click here to manage created MFO/PAP(s)</b></a>
            </div>
            <div class="modal-footer" align="center">
<!--                <a href="--><?php //echo base_url();?><!--strategicfunctions/mfopap" class="btn btn-danger">OK</a>-->
                <a class="btn btn-danger" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms_strategic").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();


        $("#panel_createmfopap").addClass("selected_panel");

        window.isUpdate = false;
        loadData();
        loadSo();
    });

    function loadData(){
        if(window.isUpdate == false){
//            $('#loadingmodal').modal('show');
        }
        $("#tblmfopap").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:",
                "sEmptyTable": "No MFO/PAP(s) Available"
            },
            "aoColumnDefs": [ { "sClass": "hide_me", "aTargets": [ 0 ] } ],
            "columns":[
                {"data":"soid"},
                {"data":"strategicobjective"},
                {"data":"category"},
                {"data":"mfopap"},
                {"data":"successindicator"}
                ]
        });
    }

    function loadSo(){
        $.ajax({
            url: "<?php echo base_url();?>crudmfopapmanagement/strategicobjectives",
            type: "GET",
            dataType: "json",
            success: function(result){
                var dept = $("#so");
                dept.empty();
                dept.append('<option selected disabled>- Select Strategic Objective -</option>');
                if(result.Code == "00"){
                    for(var keys in result.details){
                        dept.append('<option so="'+result.details[keys].soid+'" value="'+result.details[keys].strategicobjective+'" so-desc="'+result.details[keys].description+'" >'+result.details[keys].strategicobjective+'</option>');
                    }
                } else {
                    dept.append('<option selected disabled>- No Strategic Objective(s) Available -</option>');
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#btnAddMfo").click(function(){
        if($("#so option:selected").val() == '- Select Strategic Objective -' || $("#so option:selected").val() == '- No Strategic Objective(s) Available -'){
            messageDialogModal("Required","Please Select Strategic Objective");
        } else if ($("#category option:selected").val() == '- Select Category -'){
            messageDialogModal("Required","Please Select Category");
        } else if ($("#mfopap").val() == "" || $("#mfopap").val() == null) {
            messageDialogModal("Required","Please enter MFO/PAP");
        } else if ($("#successindicator").val() == "" || $("#successindicator").val() == null) {
            messageDialogModal("Required","Please enter Success Indicator");
        } else {
            var data = [];
            var d = new Date().getTime();
            data.push({
               "soid":$("#so option:selected").attr("so"),
               "strategicobjective":$("#so option:selected").val(),
               "category":$("#category option:selected").val(),
               "mfopap":$("#mfopap").val(),
               "successindicator":$("#successindicator").val()
            });

            var tbl = $("#tblmfopap").dataTable();
            tbl.fnAddData(data);
            clearField();
        }
    });


    $("#so").change(function(){
       $("#lblso").text($(this).val());
    });



    $("#btnSubmit").click(function(){
        var table = $('#tblmfopap').dataTable();
        var data = table.fnGetData();
        if(data.length<=0) {
            messageDialogModal("Server Message","No MFO/PAP Data to be submitted");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>crudmfopapmanagement/submitmfo",
                type: "POST",
                dataType: "json",
                data: {
                    "MFOPAP":data
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        $("#successmsg").text(data.Message);
                        $("#modalsuccess").modal("show");
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                    clearField();

                    $("#tblmfopap").dataTable().fnClearTable();
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
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