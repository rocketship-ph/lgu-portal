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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to File Maintenance Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <?php if(in_array($GLOBALS['NAV_COMPETENCYINDEX'],$this->session->userdata('modules'))):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>filemanager/competencyindex">
                            <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="100px">
                            <br><br>
                            Competency Index Profile
                        </a>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <?php if(in_array($GLOBALS['NAV_PDS'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>filemanager/personaldatasheet">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="100px">
                        <br><br>
                        Personal Data Sheet
                    </a>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php if(in_array($GLOBALS['NAV_POSITION'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>filemanager/positionprofile">
                        <img src="<?php echo base_url();?>assets/img/icons/position_profile.png" height="100px">
                        <br><br>
                        Position Profile
                    </a>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php if(in_array($GLOBALS['NAV_DEPARTMENT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>filemanager/departmentprofile">
                        <img src="<?php echo base_url();?>assets/img/icons/department_profile.png" height="100px">
                        <br><br>
                        Department Profile
                    </a>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_filemanager").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>