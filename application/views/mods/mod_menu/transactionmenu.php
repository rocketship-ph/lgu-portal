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
                    <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
                </div>
            </td>
            <td width="15px">
                &nbsp;
            </td>
            <td>
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Transaction Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <?php if(in_array($GLOBALS['NAV_PERSONNELREQUEST'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>transaction/requestpersonnel">
                        <img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="100px">
                        <br><br>
                        Request New Personnel
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(array_intersect($GLOBALS['NAVEXAM_MGT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>transaction/examinationmenu">
                        <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="100px">
                        <br><br>
                        Examination
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(array_intersect($GLOBALS['NAVBI_MGT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>transaction/backgroundinvestigationmenu">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation.png" height="100px">
                        <br><br>
                        Background Investigation
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(in_array($GLOBALS['NAV_BOARDING'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>transaction/boarding">
                        <img src="<?php echo base_url();?>assets/img/icons/boarding.png" height="100px">
                        <br><br>
                        Boarding
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($this->session->userdata('userlevel') == 'HRMANAGER'):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>transaction/requirementchecklist">
                            <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="100px">
                            <br><br>
                            Requirements Checklist
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_transaction").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>