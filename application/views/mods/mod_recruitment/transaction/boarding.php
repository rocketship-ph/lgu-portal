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
                    <a  href="<?php echo base_url();?>transaction/backgroundinvestigationmenu" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
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
        <div class="col-md-12">
            <div class="form-horizontal">
                <fieldset>
                    <legend>Boarding</legend>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="positionTitle" class="col-lg-2 control-label">Applicant Code</label>
                            <div class="col-lg-10">
                                <select class="form-control clearField" id="applicantCode">
                                    <option selected disabled>- No Applicant Code(s) Available -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="positionTitle" class="col-lg-2 control-label">Permanent ID</label>
                            <div class="col-lg-10">
                               <input type="text" class="form-control clearField" id="permanentid" placeholder="Enter Permanent ID Number..">
                            </div>
                        </div>
                        <div class="form-group col-md-12" align="right">
                            <div class="col-md-12">
                                <br>
                                <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                                <button class="btn btn-default" id="btnCancel">CANCEL</button>
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

        $("#panel_boarding").addClass("selected_panel");
        window.isUpdate = false;
        loadApplicants();
    });

    function loadApplicants(){
        if(window.isUpdate == false){
            $("#loadingmodal").modal("hide");
        }
        var select = $("#applicantCode");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>boardingmanagement/displayapplicantcode",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var keys in result.details){
                        var name = result.details[keys].firstname+ " " + result.details[keys].lastname;
                        select.append('<option applicantname="'+name+'" value="'+result.details[keys].applicantcode+'">'+result.details[keys].applicantcode+' ['+name+']</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                console.log(e);
            }
        });
    }

    $("#btnSubmit").click(function(){
       if($("#applicantCode option:selected").val() == "- Select Applicant Code -" || $("#applicantCode option:selected").val() == "" || $("#applicantCode option:selected").val() == null){
           messageDialogModal("Required","Please select applicant code");
       }  else if($("#permanentid").val() == "" || $("#permanentid").val() == null){
           messageDialogModal("Required","Please enter Permanent ID");
       }  else {
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>boardingmanagement/boardapplicant",
               type: "POST",
               dataType: "json",
               data: {
                    "APPLICANTCODE":$("#applicantCode option:selected").val(),
                   "PERMANENTID": $("#permanentid").val()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   console.log(result);
                   if(result.Code == "00"){
                       messageDialogModal("Server Message",result.Message);
                       window.isUpdate = true;
                       loadApplicants();
                       clearField();
                   } else {
                       messageDialogModal("Server Message",result.Message);
                   }
               },
               error: function(e){
                   $("#loadingmodal").modal("hide");
                   console.log(e);
               }
           });
       }
    });
</script>