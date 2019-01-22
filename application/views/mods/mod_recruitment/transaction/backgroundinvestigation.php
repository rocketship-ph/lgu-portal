<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
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
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Transaction Menu</h4>
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
                <div class="panel" align="center" id="panel_requestpersonnel">
                    <a href="<?php echo base_url();?>transaction/requestpersonnel" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="40px">
                        <br>
                        Request Personnel
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_examination">
                    <a  href="<?php echo base_url();?>transaction/examinationmenu" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="40px">
                        <br>
                        Examination
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_backgroundinvestigation">
                    <a  href="<?php echo base_url();?>transaction/backgroundinvestigation" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/background_investigation.png" height="40px">
                        <br>
                        Background Investigation
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_boarding">
                    <a  href="<?php echo base_url();?>transaction/boarding" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/boarding.png" height="40px">
                        <br>
                        Boarding
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
            <div class="form-horizontal">
                <fieldset>
                    <legend>Create Question - Background Investigation</legend>
                    <div class="form-group">
                        <label for="requestNumber" class="col-lg-2 control-label">Request Number</label>
                        <div class="col-lg-4">
                            <select class="form-control clearField" id="requestNumber">
                                <option> </option>
                                <option>2017-001</option>
                            </select>
                        </div>
                        <label id="position" class="col-lg-6 control-label">Position Description</label>
                    </div>
                    <div class="form-group">
                        <label for="groupposition" class="col-lg-2 control-label">Group Position</label>
                        <div class="col-lg-10">
                            <select class="form-control clearField" id="groupposition">
                                <option selected disabled description="">Please select Group Position</option>
                                <option value="1" description="Head Executive Assistant, Directors II, III, and IV, Assistant
Commissioners and Executive Director IV">Executive and Managerial Positions</option>
                                <option value="2" description="Librarian V, Engineer V, Chief Personnel Specialist, Chief Administrative Officer,
Chief Accountant, Attorney VI, Executive Assistant VI and other comparable positions">Supervisory Positions (Group 1)</option>
                                <option value="3" description="Supervising personnel specialist, supervising administrative officer, information
technology officer II, Engineer IV, Accountant IV, Attorney V, and other comparable
positions">Supervisory Positions (Group 2)</option>
                                <option value="4" description="Attorney IV, Attorney III, Accountants, Administrative
Officers, Personnel Specialists, Personnel Relations Officer, Planning Officers, Information
Officers, Records Officer, Budget Officers, Information Technology Officers, and other
Comparable positions">Technical or Non-Supervisory Positions</option>
                                <option value="5" description="Includes the position of Administrative Assistants and Administrative
Aides except those whose functions requires special skills">Administrative Support</option>
                                <option value="6" description="Administrative Aide, and Administrative Assistant positions
with working titles as Driver, Carpenter, Painter, Aircon Technician, Gardener, Electrician and
other comparable positions">Skills, Trades and Crafts Position</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <label id="competencyLevelDescription"></label>
                        <div style=" display: none;" id="divQuestion">
                            <div class="col-lg-6">
                                <label id="">Question</label>
                                <textarea rows="6" style="resize: none; " id="question" class="form-control clearField" placeholder="" required="" disabled >This is a sample question</textarea>
                            </div>
                            <div class="col-lg-6">
                                <label id="">Answer</label>
                                <textarea rows="6" style="resize: none; " id="answer" class="form-control clearField" placeholder="" required=""   disabled  >This is my answer</textarea>
                                <br>
                                <div style="" class="well" style="padding: 1px; font-size: 10px;">
                                    <b>
                                        <p style="font-size: 10px;">5 - Shows Strength - demonstrate 95% - 100% of the behavioral indicators</p>
                                        <p style="font-size: 10px;">4 - Very Proficient - demonstrate 85% - 94% of the behavioral indicators</p>
                                        <p style="font-size: 10px;">3 - Proficient - demonstrate 75% - 84% of the behavioral indicators</p>
                                        <p style="font-size: 10px;">2 - Minimal Development Needed - demonstrate 50% - 74% of the behavioral indicators</p>
                                        <p style="font-size: 10px;">1 - Much Development Needed - demonstrate less than 50% of the behavioral indicators</p>
                                    </b>
                                    <ul class="pagination pagination-lg">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
$(document).ready(function(){
    $("#nav_recruitment_transaction").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_backgroundinvestigation").addClass("selected_panel");

});

$("#groupposition").change(function(){
    $("#divQuestion").show();
});
</script>