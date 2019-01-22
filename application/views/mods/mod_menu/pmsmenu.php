<div class="well">
    <table>
        <tr>
            <td rowspan="2">
                <div style="height: 180px;width:180px;background-color: #00C853;text-align: center;border-radius: 5px;">
                    <br>
                    <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="150px">
                </div>
            </td>
            <td width="15px">
                &nbsp;
            </td>
            <td>
                <h3>Welcome <span style="font-weight: 700"><?php echo $this->session->userdata('firstname');?></span> to Performance Management System</h3>
                <h3 style="font-size: 15pt">Click the Link Under Menu to make a selection</h3>
            </td>
        </tr>
    </table>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_pms").removeClass().addClass("active");

        $("#ul_mainmenu").hide();
        $("#ul_pmsmenu").show();
    });
</script>