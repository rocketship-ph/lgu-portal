<style>
    .panel{
        border: 2px solid #dddddd;
    }
</style>
<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/management.png" height="50px">
                </div>
            </td>
            <td width="15px">
                &nbsp;
            </td>
            <td>
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Management Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
<!--        --><?php //if(in_array($GLOBALS['NAV_COMPETENCYINDEX'],$this->session->userdata('modules'))):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/strategicobjective">
                            <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="100px">
                            <br><br>
                            Strategic Objectives
                        </a>
                    </div>
                </div>
            </div>
<!--        --><?php //endif;?>
<!--        --><?php //if(in_array($GLOBALS['NAV_PDS'],$this->session->userdata('modules'))):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/assignobjectives">
                            <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="100px">
                            <br><br>
                            Assign Strategic Objectives
                        </a>
                    </div>
                </div>
            </div>
<!--        --><?php //endif;?>

        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/mfopap">
                        <img src="<?php echo base_url();?>assets/img/icons/create_mfopap.png" height="100px">
                        <br><br>
                        Create MFO/PAP
                    </a>
                </div>
            </div>
        </div>

        <!--        --><?php //if(in_array($GLOBALS['NAV_PDS'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/approvemfopap">
                        <img src="<?php echo base_url();?>assets/img/icons/approve_mfopap.png" height="100px">
                        <br><br>
                        Approve MFO/PAP
                    </a>
                </div>
            </div>
        </div>
        <!--        --><?php //endif;?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/managemfopap">
                        <img src="<?php echo base_url();?>assets/img/icons/manage_mfopap.png" height="100px">
                        <br><br>
                        Manage MFO/PAP
                    </a>
                </div>
            </div>
        </div>

        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>strategicfunctions/assignedmfopap">
                        <img src="<?php echo base_url();?>assets/img/icons/approve.png" height="100px">
                        <br><br>
                        Assigned MFO/PAP
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms_strategic").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>