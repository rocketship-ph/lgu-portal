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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Utilities Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>utilities/assignroles">
                        <img src="<?php echo base_url();?>assets/img/icons/roles_configuration.png" height="100px">
                        <br><br>
                        Roles Configuration
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>createuser">
                        <img src="<?php echo base_url();?>assets/img/icons/create_user.png" height="100px">
                        <br><br>
                        Create User Account
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>manageusers">
                        <img src="<?php echo base_url();?>assets/img/icons/manage_user.png" height="100px">
                        <br><br>
                        Manage User Accounts
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>utilities/displayaudittrail">
                        <img src="<?php echo base_url();?>assets/img/icons/audit_trail.png" height="100px">
                        <br><br>
                        Audit Trail
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>utilities/displaybackup">
                        <img src="<?php echo base_url();?>assets/img/icons/database_backup.png" height="100px">
                        <br><br>
                        Database Backup
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_utilities").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>