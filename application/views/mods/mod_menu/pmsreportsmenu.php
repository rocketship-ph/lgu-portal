<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms_reports").removeClass().addClass("active");

        $("#ul_pmsmenu").show();
        $("#ul_mainmenu").hide();
    });
</script>
<style>
    .panel{
        border: 2px solid #dddddd;
    }

    .panel-body{
        min-height: 185px;
        height: auto;
    }
</style>
<div class="well">
<table>
    <tr>
        <td rowspan="2">
            <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                <br>
                <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="50px">
            </div>
        </td>
        <td width="15px">
            &nbsp;
        </td>
        <td>
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to Performance Management Reports Menu</h4>
            <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
        </td>
    </tr>
</table>
<div class="row">
<div class="col-md-12">
    <hr>
</div>
<?php //if(in_array($GLOBALS['NAV_POSITIONLISTREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>pmsreports/ipcrreport">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Individual Performance Commitment and Review Report
                </a>
            </div>
        </div>
    </div>
<?php //endif;?>
<?php //if(in_array($GLOBALS['NAV_CORECOMPETENCYREPORT'],$this->session->userdata('modules'))):?>
    <div class="form-group col-md-3">
        <div class="panel">
            <div class="panel-body" align="center">
                <a style="text-align: center" href="<?php echo base_url();?>pmsreports/opcrreport">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="100px">
                    <br><br>
                    Office Performance Commitment and Review Report
                </a>
            </div>
        </div>
    </div>
<?php //endif;?>
<?php //if(in_array($GLOBALS['NAV_BEHAVIORALCOMPETENCYREPORT'],$this->session->userdata('modules'))):?>
<!--    <div class="form-group col-md-3">-->
<!--        <div class="panel">-->
<!--            <div class="panel-body" align="center">-->
<!--                <a style="text-align: center" href="--><?php //echo base_url();?><!--pmsreports/averageratingreport">-->
<!--                    <img src="--><?php //echo base_url();?><!--assets/img/icons/generic_report.png" height="100px">-->
<!--                    <br><br>-->
<!--                    Employee Average Rating Report-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //endif;?>
<?php //if(in_array($GLOBALS['NAV_COMPETENCYPERPOSITIONREPORT'],$this->session->userdata('modules'))):?>
<!--    <div class="form-group col-md-3">-->
<!--        <div class="panel">-->
<!--            <div class="panel-body" align="center">-->
<!--                <a style="text-align: center" href="--><?php //echo base_url();?><!--pmsreports/soreport">-->
<!--                    <img src="--><?php //echo base_url();?><!--assets/img/icons/generic_report.png" height="100px">-->
<!--                    <br><br>-->
<!--                    List of Strategic Objectives-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //endif;?>
<?php //if(in_array($GLOBALS['NAV_COMPETENCYPERPOSITIONREPORT'],$this->session->userdata('modules'))):?>
<!--<div class="form-group col-md-3">-->
<!--    <div class="panel">-->
<!--        <div class="panel-body" align="center">-->
<!--            <a style="text-align: center" href="--><?php //echo base_url();?><!--pmsreports/mfopapreport">-->
<!--                <img src="--><?php //echo base_url();?><!--assets/img/icons/generic_report.png" height="100px">-->
<!--                <br><br>-->
<!--                List of Major Final Outputs-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php //endif;?>

</div>
</div>