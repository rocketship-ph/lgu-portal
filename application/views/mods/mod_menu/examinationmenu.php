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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Examination Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <?php if (!($this->session->userdata('userlevel') == "TEMPORARY")):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>examination/evaluatorselection">
                            <img src="<?php echo base_url();?>assets/img/icons/evaluator_selection.png" height="100px">
                            <br><br>
                            Evaluator Selection
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>examination/createexam">
                            <img src="<?php echo base_url();?>assets/img/icons/create_exam.png" height="100px">
                            <br><br>
                            Create Examination
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>examination/assessmentcheck">
                            <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="100px">
                            <br><br>
                            Assessment Check
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(in_array($GLOBALS['NAV_TAKEEXAM'],$this->session->userdata('modules'))):?>
            <div class="form-group col-md-3">
                <div class="panel">
                    <div class="panel-body" align="center">
                        <a style="text-align: center" href="<?php echo base_url();?>examination/takeexam">
                            <img src="<?php echo base_url();?>assets/img/icons/takeexam.svg" height="100px">
                            <br><br>
                            Take Examination
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(in_array($GLOBALS['NAV_EXAMRESULT'],$this->session->userdata('modules'))):?>
        <div class="form-group col-md-3">
            <div class="panel">
                <div class="panel-body" align="center">
                    <a style="text-align: center" href="<?php echo base_url();?>examination/examresults">
                        <img src="<?php echo base_url();?>assets/img/icons/exam_result.png" height="100px">
                        <br><br>
                        Examination Results
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