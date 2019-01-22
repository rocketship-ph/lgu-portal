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
                <div class="panel" align="center" id="panel_strategicobjectives">
                    <a href="<?php echo base_url();?>strategicfunctions/strategicobjective" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assignso">
                    <a  href="<?php echo base_url();?>strategicfunctions/assignobjectives" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Assign Strategic Objectives
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createmfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/mfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_mfo.png" height="40px">
                        <br>
                        Create MFO/PAP
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_managemfopap">
                    <a  href="<?php echo base_url();?>strategicfunctions/managemfopap" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="40px">
                        <br>
                        Manage MFO/PAP
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
                    <div class="row">
                        <div class="col-md-10" align="left">
                            <h4><b>Formulate IPCR </b></h4>
                            <p style="font-size: 11px">Carefully check the data of your IPCR before submitting them to your respective department head for approval</p>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-success btn-block saveBtnClass" id="btnSubmitAssignment">SUBMIT IPCR</button>
                            <a class="btn btn-block btn-default" href="<?php echo base_url();?>strategicfunctions/approvemfopap">CANCEL</a>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="table-responsive" id="tblipcrcontainer">
                                <table id="tblipcr" class="table table-condensed table-bordered table-hover">
                                    <thead>
                                    <tr align="center">
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
                                    <tbody id="tbody">

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

<script type="application/javascript">
$(document).ready(function(){
    $("#nav_pms_ipcr").removeClass().addClass("active");

    $("#ul_pmsmenu").show();
    $("#ul_mainmenu").hide();


    $("#panel_managemfopap").addClass("selected_panel");

    window.isUpdate = false;
    loadData();
});


function loadData(){
    $('#loadingmodal').modal('show');
    $.ajax({
        url:"<?php  echo base_url(); ?>ipcrmanagement/display",
        type : "POST",
        dataType : "json",
        success: function(result){
            var tbody = $("#tbody");
            tbody.empty();
            $('#loadingmodal').modal('hide');
            console.log(result);
            if(result.Code=="00"){
                var categs = ['STRATEGIC PRIORITIES','CORE FUNCTION','SUPPORT FUNCTION'];
                var s = [];
                for(var keys in result.details){
                    s.push(result.details[keys].strategicobjective);
                }
                var sos = [...new Set(s)];
                console.log(sos);
                for(var i=0;i<sos.length;i++){

                }
            }else{

            }
        },
        error: function(e){
            console.log(e);
        }
    });
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