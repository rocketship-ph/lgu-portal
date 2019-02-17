<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    table > thead > tr > td {
        padding: 3px;
    }
    table > tbody > tr > td {
        padding: 3px;
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
        <td style="border-left: 1px solid #d1d1d1">
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
                <legend>Applicant Boarding</legend>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="positionTitle" class="control-label">Applicant Code</label>
                        <select class="form-control clearField" id="applicantCode">
                            <option selected disabled>- No Applicant Code(s) Available -</option>
                        </select>
                    </div>
                    <div id="divPrint" style="display: none">
                        <div class="col-md-12" align="center">
                            <h3>ORIENTATION FOR NEWLY-HIRED EMPLOYEES</h3>
                        </div>
                        <div class="col-md-12">
                            <table border="2" cellspacing="5" cellpadding="3px" style="font-size: 12px !important;width: 100%">
                                <thead>
                                <tr>
                                    <td>NAME OF EMPLOYEE: <b id="lblappname"></b>&nbsp;&nbsp;(<span id="lblposition"></span>)
                                    </td>
                                    <td style="vertical-align: middle">DATE OF ORIENTATION: <b class="lbldate"></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">PLACE OF ASSIGNMENT: <b id="lbldepartment"></b></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <b>ORIENTATION TOPICS:</b><br><br>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="chck" value="who_are_we" name="check_who_are_we"><b>WHO ARE WE AND WHAT GUIDES US?</b></label>
                                            <ul>
                                                <li>Introduction of Lingkod Bayan</li>
                                                <li>Panunumpa ng Katapatan sa Watawat ng Pilipinas</li>
                                                <li>Panunumpa ng Lingkod Bayan</li>
                                                <li>Our Vision</li>
                                                <li>Our Mission</li>
                                                <li>Our Core Values</li>
                                                <li>Our Priority Thrust</li>
                                            </ul>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="chck" value="employee_welfare" name="check_employee_welfare"><b>EMPLOYEE WELFARE</b></label>
                                            <ul>
                                                <li>Leave Benefits</li>
                                                <li>Special Leave Benefits</li>
                                                <li>Social Insurance Benefits</li>
                                                <li>Clothing Allowance</li>
                                                <li>Year-End Bonus and Cash Gift</li>
                                                <li>Productivity Incentive Bonus (PIR)</li>
                                                <li>Local Government-Initiated Benefits</li>
                                            </ul>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="chck" value="reasonable_office_rules" name="check_reasonable_office_rules"><b>REASONABLE OFFICE RULES AND REGULATIONS</b></label>
                                            <ul>
                                                <li>Uniform</li>
                                                <li>Attendance and Punctuality</li>
                                                <li>Flag Raising Ceremonies and LGU-Initiated Activities</li>
                                                <li>Grooming</li>
                                                <li>No Smoking Policy</li>
                                                <li>Drug-Free Workplace</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="chck" value="conditions_of_employment" name="check_conditions_of_employment"><b>CONDITIONS OF EMPLOYMENT</b></label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="chck" value="completion_of_paperworks" name="check_completion_of_paperworks"><b>COMPLETION OF EMPLOYMENT-RELATED PAPER WORKS</b></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label">NOTE: </label>
                                            <textarea style="resize: none" rows="7" class="form-control" id="notes"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>JOB DESCRIPTION: </b>&nbsp;<input type="text" class="form-control" id="jobdescription"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">FOCAL PERSON/BUDDY:&nbsp;
                                    <a class="excludePrint" onclick="$('#modalFocal').modal('show');">+ Add Focal Person/Buddy..</a>
                                        <br>&emsp;<b id="lblfocalperson"></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORIENTATION CONDUCTED BY:<b><br>&emsp;<?php echo $this->session->userdata('name');?></b>
                                    </td>
                                    <td>SIGNATURE:
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>
                                            &emsp;I HEARBY CERTIFY THAT THE ABOVE-MENTIONED TOPICS WERE DISCUSSED IN DETAIL AND THAT I FULLY UNDERSTOOD THE CONDITIONS AND PROVISIONS ATTACHED TO IT.
                                        </p>
                                        <br>
                                        <div align="right" style="padding-right: 50px">
                                            <b style="text-decoration: overline">&emsp;&emsp;SIGNATURE OF EMPLOYEE&emsp;&emsp;</b>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NOTED BY:
                                        <br> <br>
                                    </td>
                                    <td>
                                        DATE:<br>&emsp;<b class="lbldate"></b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="right" id="divBtns" style="display: none">
                        <div class="col-md-12">
                            <br>
<!--                            <button class="btn btn-info" id="btnPrint"><i class="fa fa-print"></i>&nbsp;PRINT</button>-->
                            <button class="btn btn-success" id="btnSubmit">ON BOARD</button>
                            <button class="btn btn-default" id="btnCancel">CANCEL</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
</div>
<div class="modal fade bs-example-modal-sm" id="modalFocal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Focal Person/Buddy</h4>
                <div class="form-group">
                    <select class="form-control" id="focalperson" style="font-weight: bold">
                        <option selected disabled></option>
                    </select>
                </div>
                <div align="right">
                    <input type="button" class="btn btn-success" id="btnProceedFocal" value="SUBMIT">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modalSuccess" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Applicant Onboard</h4>
                <p>Applicant on boarding successful. Please print the Orientation Form for Newly-Hired Employees by clicking the 'PRINT' button below.</p>
                <div align="right">
                    <a class="btn btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;PRINT</a>
                    <input type="button" class="btn btn-secondary" id="closePrint" value="CLOSE">
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

        $("#panel_boarding").addClass("selected_panel");
        window.isUpdate = false;
        $(".lbldate").text(moment().format("MMMM DD, YYYY"));
        loadApplicants();
        $("#divPrint").hide();
        $("#divBtns").hide();
    });

    $("#btnProceedFocal").click(function(){
       if($("#focalperson option:selected").val() == "- Select Focal Person/Buddy -") {
           messageDialogModal("Required","Please Select Focal Person/Buddy");
       } else {
           $("#lblfocalperson").text($("#focalperson option:selected").text());
           $("#modalFocal").modal("hide");
       }
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
                        select.append('<option department="'+result.details[keys].department+'" position="'+result.details[keys].position+'" applicantname="'+name+'" value="'+result.details[keys].applicantcode+'">'+result.details[keys].applicantcode+' ['+name+']</option>');
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

    $("#applicantCode").change(function(){
        $("#lblappname").text($("#applicantCode option:selected").attr("applicantname"));
        $("#lblposition").text($("#applicantCode option:selected").attr("position"));
        $("#lbldepartment").text($("#applicantCode option:selected").attr("department"));
        $("#divPrint").show();
        $("#divBtns").show();
        loadFocalPersons();
    });

    function loadFocalPersons(){
        var select = $("#focalperson");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>boardingmanagement/displayfocalperson",
            type: "POST",
            dataType: "json",
            data: {
                "DEPARTMENT":$("#applicantCode option:selected").attr("department")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Focal Person/Buddy -</option>');
                    for(var keys in result.details){
                        var name = result.details[keys].firstname+ " " + result.details[keys].lastname;
                        select.append('<option department="'+result.details[keys].department+'" position="'+result.details[keys].position+'" value="'+result.details[keys].username+'">'+name+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>No Focal Person/Buddy Available</option>');
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>No Focal Person/Buddy Available</option>');
                console.log(e);
            }
        });
    }

    $("#btnSubmit").click(function(){
        if($("#applicantCode option:selected").val() == "- Select Applicant Code -" || $("#applicantCode option:selected").val() == "" || $("#applicantCode option:selected").val() == null){
            messageDialogModal("Required","Please select applicant code");
        }  else if($("#jobdescription").val() == "" || $("#jobdescription").val() == null){
            messageDialogModal("Required","Please enter Job Description");
        }  else if(!checkItems()){
            messageDialogModal("Required","Please check at least one item from the orientation topics");
        }  else {
            $("#loadingmodal").modal("show");

            var obj = [];
            $(".chck").each(function(){
                if($(this).is(":checked")){
                    obj.push($(this).val());
                }
            });

            var json = new Object();
            json['jobdescription'] = $("#jobdescription").val();
            json['notes'] = $("#notes").val();
            json['focalbuddy'] = $("#lblfocalperson").text();
            json['orientationdate'] = $("#lbldate").text();
            json['checklist'] = obj;

            $.ajax({
                url: "<?php echo base_url();?>boardingmanagement/boardapplicant",
                type: "POST",
                dataType: "json",
                data: {
                    "APPLICANTCODE":$("#applicantCode option:selected").val(),
                    "ORIENTATIONDETAILS": btoa(JSON.stringify(json))
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    console.log(result);
                    if(result.Code == "00"){
                       $("#modalSuccess").modal("show");
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

   $("#closePrint").click(function(){
      location.reload();
   });
    function checkItems(){
        var chck = false;
        $(".chck").each(function(){
           if($(this).is(":checked")){
               chck = true;
           }
        });
        return chck;
    }

    $("#btnPrint").click(function(){
        $("#divPrint").print({
            noPrintSelector: ".excludePrint",
            prepend: '<table align="center"><tr><td><img style="height: 80px;width: 80px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h5 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h5></p></td><td width="100px"></td></tr></table>'
        });
    });
</script>