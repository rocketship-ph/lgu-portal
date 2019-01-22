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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Background Investigation Menu</h4>
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
                    <a style="text-align: center" href="<?php echo base_url();?>backgroundinvestigation/createbi">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_create.png" height="100px">
                        <br><br>
                        Create Background Investigation Question
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>backgroundinvestigation/conductbi">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_conduct.png" height="100px">
                        <br><br>
                        Conduct Background Investigation
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>backgroundinvestigation/evaluatebi">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation_evaluate.png" height="100px">
                        <br><br>
                        Evaluate Background Investigation
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_transaction").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>