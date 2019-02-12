<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    input[type="radio"]{
        transform: scale(1.2);
    }

    .label-option{
        font-weight: bold;
        font-size: 12pt;
        margin-bottom: 0px !important;
    }

    .criteria-title{
        font-weight: bold !important;
        text-decoration: underline;
    }

    input[type="checkbox"]{
        transform: scale(1.2);
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
            <div class="panel" align="center" id="panel_transactionmenu">
                <a href="<?php echo base_url();?>main/transaction" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/transaction.png" height="40px">
                    <br>
                    Transaction Menu
                </a>
            </div>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td>
            <div class="panel" align="center" id="panel_boarding">
                <a  href="<?php echo base_url();?>transaction/ete" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/ete.png" height="40px">
                    <br>
                    ETE
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
                <legend>Evaluation of Education, Training, and Experience (ETE)</legend>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="positionTitle" class="control-label">Applicant Code</label>
                        <select class="form-control clearField" id="applicantCode">
                            <option selected disabled>- No Applicant Code(s) Available -</option>
                        </select>
                    </div>
                    <div id="divPrint" style="display: nonex">
                        <hr>
                        <div class="col-md-12" align="center">
                            <h4>EVALUATION OF EDUCATION, TRAINING, AND EXPERIENCE (ETE)<br>
                                For the position of: <b id="lblpositionname"></b></h4>
                        </div>
                        <div class="col-md-12" align="left">
                            <table>
                                <tr><td><label class="control-label" style="margin-bottom: 0">NAME</td><td align="center" width="50px">:</td><td><b id="lblappname"></b></td></tr>
                                <tr><td><label class="control-label" style="margin-bottom: 0">CURRENT POSITION</td><td align="center" width="50px">:</td><td><b id="lblcurrentposition"></b></td></tr>
                                <tr><td><label class="control-label" style="margin-bottom: 0">OFFICE</td><td align="center" width="50px">:</td><td><b id="lbldepartment"></b></td></tr>
                                <tr><td><label class="control-label" style="margin-bottom: 0">DATE</td><td align="center" width="50px">:</td><td><b id="lbldate"></b></td></tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <table cellspacing="5" cellpadding="3px" style="width: 100%">
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="label-option">In meeting Education Requirements</label>
                                    </td>
                                    <td></td>
                                    <td align="right"><label class="label-option">65%&emsp;<input type="radio" value="65" class="radio_default" name="meetingeducation" checked></label></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center"><h4 class="criteria-title">EDUCATION (15%)</h4></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">Bachelor's Degree</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">&nbsp;5%&emsp;<input type="radio" name="radio_education" class="radio_education" value="5"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="left"><label class="label-option">Masteral Units</label></td>
                                </tr>
                                <tr>
                                    <td>&emsp;<label class="label-option">18 units</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">11%&emsp;<input type="radio" name="radio_education" class="radio_education" value="11"></label></td>
                                </tr>
                                <tr>
                                    <td>&emsp;<label class="label-option">36 units</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">12%&emsp;<input type="radio" name="radio_education" class="radio_education" value="12"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">Masteral Degree</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">15%&emsp;<input type="radio" name="radio_education" class="radio_education" value="15"></label></td>
                                </tr>
<!--                                training-->
                                <tr>
                                    <td colspan="3" align="center"><h4 class="criteria-title">TRAINING (8%)</h4></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">40 hours</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">8%&emsp;<input type="radio" name="radio_training" class="radio_training" value="8"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">32 hours</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">7%&emsp;<input type="radio" name="radio_training" class="radio_training" value="7"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">24 hours</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">6%&emsp;<input type="radio" name="radio_training" class="radio_training" value="6"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">16 hours</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">5%&emsp;<input type="radio" name="radio_training" class="radio_training" value="5"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">8 hours</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">4%&emsp;<input type="radio" name="radio_training" class="radio_training" value="4"></label></td>
                                </tr>
<!--                                experience-->
                                <tr>
                                    <td colspan="3" align="center"><h4 class="criteria-title">EXPERIENCE (12%)</h4></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">5 Years</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">12%&emsp;<input type="radio" name="radio_experience" class="radio_experience" value="12"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">4 Years</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">11%&emsp;<input type="radio" name="radio_experience" class="radio_experience" value="11"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">3 Years</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">10%&emsp;<input type="radio" name="radio_experience" class="radio_experience" value="10"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">2 Years</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">&nbsp;&nbsp;9%&emsp;<input type="radio" name="radio_experience" class="radio_experience" value="9"></label></td>
                                </tr>
                                <tr>
                                    <td><label class="label-option">1 Year</label></td>
                                    <td></td>
                                    <td align="right"><label class="label-option">&nbsp;&nbsp;8%&emsp;<input type="radio" name="radio_experience" class="radio_experience" value="8"></label></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><br/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td align="center">
                                        <table style="width:100%;">
                                            <tr>
                                                <td>Education</td>
                                                <td align="center" width="10px">:</td>
                                                <td align="center"><b id="summary_education">0</b>&nbsp;<b>%</b></td>
                                            </tr>
                                            <tr>
                                                <td>Training</td>
                                                <td align="center" width="10px">:</td>
                                                <td align="center"><b id="summary_training">0</b>&nbsp;<b>%</b></td>
                                            </tr>
                                            <tr>
                                                <td>Experience</td>
                                                <td align="center" width="10px">:</td>
                                                <td align="center"><b id="summary_experience">0</b>&nbsp;<b>%</b></td>
                                            </tr>
                                            <tr>
                                                <td><b style="font-size: 13pt">Total Rating</b></td>
                                                <td align="center" width="10px">:</td>
                                                <td align="center"><b style="font-size: 14pt" id="total_rating">80</b>&nbsp;<b>%</b></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>REMARKS:</b><br>
                                        <label class="label-option"><input type="checkbox" value="meeting" name="meeting">&emsp;Meeting the Qualification Standards</label><br>
                                        <label class="label-option"><input type="checkbox" value="not meeting" name="not meeting">&emsp;Not Meeting the Qualification Standards</label><br></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="left">
                                        <br><br>EVALUATOR: <br><br><b><?php echo $this->session->userdata('name');?></b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="right" id="divBtns" style="display: none">
                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-info" id="btnPrint"><i class="fa fa-print"></i>&nbsp;PRINT</button>
                            <button class="btn btn-success" id="btnSubmit">SUBMIT EVALUATION</button>
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


<script type="application/javascript">
    $(document).ready(function(){
        window.editable = false;
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
            $("#loadingmodal").modal("show");
        var select = $("#applicantCode");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>etemanagement/displayapplicantcode",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var keys in result.details){
                        var name = result.details[keys].firstname+ " " + result.details[keys].lastname;
                        select.append('<option currentposition="'+result.details[keys].currentposition+'" department="'+result.details[keys].department+'" position="'+result.details[keys].position+'" applicantname="'+name+'" value="'+result.details[keys].applicantcode+'">'+result.details[keys].applicantcode+' ['+name+']</option>');
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
        clearAll();
        $("#lblappname").text($("#applicantCode option:selected").attr("applicantname"));
        $("#lblcurrentposition").text($("#applicantCode option:selected").attr("currentposition"));
        $("#lblpositionname").text($("#applicantCode option:selected").attr("position"));
        $("#lbldepartment").text($("#applicantCode option:selected").attr("department"));
        $("#lbldate").text(moment().format("MMM DD, YYYY"));
        $("#total_rating").text("65");
        $("#divPrint").show();
        $("#divBtns").show();
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>etemanagement/displaydetails",
            type: "POST",
            dataType: "json",
            data: {
                "APPLICANTCODE":$("#applicantCode option:selected").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    for(var keys in result.details){
                        $("#btnSubmit").attr("rowid",result.details[keys].id);
                        window.editable = true;
                        var json = JSON.parse(atob(result.details[keys].etedetails));
                        $(".radio_education").each(function(){
                            if($(this).val() == json.education){
                                $(this).prop("checked",true);
                            }
                        });

                        $(".radio_training").each(function(){
                            if($(this).val() == json.training){
                                $(this).prop("checked",true);
                            }
                        });

                        $(".radio_experience").each(function(){
                            if($(this).val() == json.experience){
                                $(this).prop("checked",true);
                            }
                        });

                        if(json.remarks == 'meeting'){
                            $("input[type='checkbox'][name='meeting']").prop("checked",true);
                            $("input[type='checkbox'][name='not meeting']").prop("checked",false);
                        } else {
                            $("input[type='checkbox'][name='meeting']").prop("checked",false);
                            $("input[type='checkbox'][name='not meeting']").prop("checked",true);
                        }

                        $("#total_rating").text(json.total);
                        $("#summary_education").text(json.education);
                        $("#summary_training").text(json.training);
                        $("#summary_experience").text(json.experience);
                    }
                }

                if(result.Editable == 'NO'){
                    $("#btnSubmit").prop("disabled",true);

                    $("input[type='checkbox'][name='meeting']").prop("disabled",true);
                    $("input[type='checkbox'][name='not meeting']").prop("disabled",true);

                    $(".radio_education").each(function(){
                        $(this).prop("disabled",true);
                    });

                    $(".radio_training").each(function(){
                        $(this).prop("disabled",true);
                    });

                    $(".radio_experience").each(function(){
                        $(this).prop("disabled",true);
                    });

                    window.editable = false;
                } else {
                    $("#btnSubmit").prop("disabled",false);

                    $("input[type='checkbox'][name='meeting']").prop("disabled",false);
                    $("input[type='checkbox'][name='not meeting']").prop("disabled",false);

                    $(".radio_education").each(function(){
                        $(this).prop("disabled",false);
                    });

                    $(".radio_training").each(function(){
                        $(this).prop("disabled",false);
                    });

                    $(".radio_experience").each(function(){
                        $(this).prop("disabled",false);
                    });
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });

    });

    $("#btnSubmit").click(function(){
        if(window.editable == true){
            updateData();
        } else {
            $("#loadingmodal").modal("show");

            var obj = [];
            $(".chck").each(function(){
                if($(this).is(":checked")){
                    obj.push($(this).val());
                }
            });

            var json = new Object();
            json['total'] = $("#total_rating").text();
            json['education'] = $("#summary_education").text();
            json['training'] = $("#summary_training").text();
            json['experience'] = $("#summary_experience").text();
            json['default'] = '65';
            json['remarks'] =  $("input[type='checkbox'][name='meeting']").is(":checked") ? "meeting" : "not meeting";

            $.ajax({
                url: "<?php echo base_url();?>etemanagement/submit",
                type: "POST",
                dataType: "json",
                data: {
                    "APPLICANTCODE":$("#applicantCode option:selected").val(),
                    "ETEDETAILS": btoa(JSON.stringify(json)),
                    "TOTAL": $("#total_rating").text()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    console.log(result);
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        clearField();
                        clearAll();
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

    function updateData(){
        $("#loadingmodal").modal("show");

        var obj = [];
        $(".chck").each(function(){
            if($(this).is(":checked")){
                obj.push($(this).val());
            }
        });

        var json = new Object();
        json['total'] = $("#total_rating").text();
        json['education'] = $("#summary_education").text();
        json['training'] = $("#summary_training").text();
        json['experience'] = $("#summary_experience").text();
        json['default'] = '65';
        json['remarks'] =  $("input[type='checkbox'][name='meeting']").is(":checked") ? "meeting" : "not meeting";

        $.ajax({
            url: "<?php echo base_url();?>etemanagement/update",
            type: "POST",
            dataType: "json",
            data: {
                "APPLICANTCODE":$("#applicantCode option:selected").val(),
                "ETEDETAILS": btoa(JSON.stringify(json)),
                "TOTAL": $("#total_rating").text(),
                "ROWID": $("#btnSubmit").attr("rowid")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    clearAll();
                    window.editable = false;
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

    $(".radio_education").on("change click",function(){
       if($(this).is(":checked")){
           $("#summary_education").text($(this).val());
           computeTotal();
       }
    });

    $(".radio_training").on("change click",function(){
        if($(this).is(":checked")){
            $("#summary_training").text($(this).val());
            computeTotal();
        }
    });

    $(".radio_experience").on("change click",function(){
        if($(this).is(":checked")){
            $("#summary_experience").text($(this).val());
            computeTotal();
        }
    });

    $("input[type='checkbox'][name='meeting']").on("change click",function(){
        if($(this).is(":checked")){
            $("input[type='checkbox'][name='not meeting']").prop("checked",false);
        }
    });

    $("input[type='checkbox'][name='not meeting']").on("change click",function(){
        if($(this).is(":checked")){
            $("input[type='checkbox'][name='meeting']").prop("checked",false);
        }
    });

    function computeTotal(){
        var e1 = parseInt(($("#summary_education").text() == "" || $("#summary_education").text() == null) ? 0 : $("#summary_education").text());
        var t = parseInt(($("#summary_training").text() == "" || $("#summary_training").text() == null) ? 0 : $("#summary_training").text());
        var e2 = parseInt(($("#summary_experience").text() == "" || $("#summary_experience").text() == null) ? 0 : $("#summary_experience").text());

        $("#total_rating").text((e1+t+e2+65));

    }

function clearAll(){
    $("#summary_education").text("0");
    $("#summary_training").text("0");
    $("#summary_experience").text("0");
    $("#total_rating").text("65");
    $("#lblappname").text("");
    $("#lblcurrentposition").text("");
    $("#lbldepartment").text("");
    $("#lbldate").text("");
    $("#lblpositionname").text("");
    $("#divPrint").hide();
    $("input[type='checkbox'][name='meeting']").prop("checked",false);
    $("input[type='checkbox'][name='not meeting']").prop("checked",false);

    $(".radio_education").each(function(){
        $(this).prop("checked",false);
    });

    $(".radio_training").each(function(){
        $(this).prop("checked",false);
    });

    $(".radio_experience").each(function(){
        $(this).prop("checked",false);
    });
}
</script>