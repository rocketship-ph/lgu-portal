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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>File Maintenance Menu</h4>
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
                <div class="panel" align="center" id="panel_competencyindex">
                    <a href="<?php echo base_url();?>filemanager/competencyindex" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Competency Index<br> Profile
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_personaldatasheet">
                    <a  href="<?php echo base_url();?>filemanager/personaldatasheet" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Personal Data Sheet
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_positionprofile">
                    <a  href="<?php echo base_url();?>filemanager/positionprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/position_profile.png" height="40px">
                        <br>
                        Position Profile
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_departmentprofile">
                    <a  href="<?php echo base_url();?>filemanager/departmentprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/department_profile.png" height="40px">
                        <br>
                        Department Profile
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-horizontal">
                        <fieldset>
                            <legend>Competency Index Profile</legend>
                            <div class="form-group">
                                <label for="competencyTitle" class="col-lg-2 control-label">Competency Based Index</label>
                                <div class="col-lg-10">
                                    <select class="form-control clearField" id="competencyTitle">
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label"></label>
                                <label class="col-lg-10 control-label" id="competencyDescription" style="display: none"></label>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Competency Level</label>
                                <div class="col-lg-10">
                                    <div class="form-group levelGroup">
                                        <button level="basic" class="btn btn-outline-info competencyLevel">Basic</button>
                                        <button level="intermediate" class="btn btn-outline-info competencyLevel">Intermediate</button>
                                        <button level="advanced" class="btn btn-outline-info competencyLevel">Advanced</button>
                                        <button level="superior" class="btn btn-outline-info competencyLevel">Superior</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Description:</label>
                                <div class="col-lg-10">
                                    <div class="form-group descGroup">
                                        <button class="btn btn-outline-success" desc-type="CORE">Core Description</button>
                                        <button class="btn btn-outline-success" desc-type="BEHAVIORAL">Behavioral Indicators</button>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-10 divInputDesc">
                                            <textarea rows="6" style="resize: none" id="cbiDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                                        </div>
                                        <div class="col-lg-10 divEditDesc" style="display: none">
                                            <textarea rows="6" style="resize: none" id="cbiDescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                                        </div>
                                        <div class="col-lg-2" style="visibility: hidden" id="actionButtons">
                                            <button class="btn btn-default btn-block" id="btnAdd">ADD</button>
                                            <button class="btn btn-danger btn-block" id="btnEdit">EDIT</button>
                                            <button class="btn btn-primary btn-block" id="btnDelete">DELETE</button>
                                            <button class="btn btn-success btn-block" id="btnSave">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newCBIModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Competency Based Index Profile</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <label class="control-label">Competency Type:<span style="color:red;font-weight: bold">*</span></label>
                        <select id="newcompetencyTypeCbi" class="form-control clearField" required="">
                            <option selected disabled>- Select Competency Type -</option>
                            <option value="CORE">Core</option>
                            <option value="LEADERSHIP">Leadership</option>
                            <option value="ORGANIZATIONAL">Organizational</option>
                            <option value="TECHNICAL">Technical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Competency Title:<span style="color:red;font-weight: bold">*</span></label>
                        <input type="text" id="newcompetencyTitleCbi" class="form-control clearField" placeholder="ex. Organizational Competencies" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description:<span style="color:red;font-weight: bold">*</span></label>
                        <textarea rows="4" style="resize: none" id="newcompetencyDescriptionCbi" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                    </div>

                    <div style="text-align: right">
                        <button type="button" class="btn btn-success" id="btnSubmitNewCompetencyCbi">ADD</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:$('#competencyTitle').val('- Select Competency Title -');">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalDelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                    <input type="hidden" id="deleteCompetencyId">
                    <input type="hidden" id="deleteLevel">
                    <input type="hidden" id="deleteType">
                    <div class="form-group">
                       <p>Continue to delete this Competency Index?</p>
                    </div>

                    <div style="text-align: right">
                        <button type="button" class="btn btn-primary" id="btnProceedDelete">DELETE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelDelete();">CANCEL</button>
                    </div>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_filemanager").removeClass().addClass("active");

        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();

        $("#panel_competencyindex").addClass("selected_panel");
        window.isUpdateCompetencies = false;
        loadCompetencies();
        window.compLevel = "";
        window.descType = "";
        defaultButtonState();
    });


    $(".descGroup button").click(function(){
        $(".descGroup button").prop("disabled",true);
        $(this).prop("disabled",false);
        window.descType = $(this).attr("desc-type");
        console.log(window.descType);
        $(this).addClass("active");
        $("#actionButtons").css("visibility","visible");
    });

    $(".levelGroup button").click(function(){
        $(".levelGroup button").prop("disabled",true);
        $(this).prop("disabled",false);
        window.compLevel = $(this).attr("level");
        $(this).addClass("active");
    });

    $("#competencyTitle").change(function(){
        $("#actionButtons").css("visibility","hidden");
        window.compLevel = "";
        window.descType = "";
        $("#cbiDescription").prop("disabled",false);
        $(".levelGroup button").prop("disabled",false);
        $(".levelGroup button").removeClass("active");

        $(".descGroup button").prop("disabled",false);
        $(".descGroup button").removeClass("active");
        if ($("#competencyTitle option:selected").val()=="new"){
            $("#newCBIModal").modal('show');
            $("#competencyDescription").hide();
        }else {
            var desc = $("#competencyTitle option:selected").attr("competency-description");
            $("#competencyDescription").text(atob(desc));
            $("#competencyDescription").show();
        }

        $(".divInputDesc").show();
        $(".divEditDesc").hide();
        $(".divEditDesc").empty();

        defaultButtonState();
    });

    function loadCompetencies(){
        if(window.isUpdateCompetencies == false){
            $("#loadingmodal").modal("show");
        }
        $("#competencyTitle").prop('disabled', 'disabled');
        var select = $("#competencyTitle");
        select.empty();
        select.append("<option selected disabled>- Select Competency Title -</option>");
        select.append("<option value='new'>ADD NEW CBI</option>");
        $.ajax({
            url: "<?php echo base_url();?>competencyindexmanagement/competencies",
            type: "POST",
            dataType: "json",
            data: {},
            success: function(data){
                $("#loadingmodal").modal("hide");
                $("#competencyTitle").prop('disabled', false);
                if(data.Code == "00"){
                    for(var keys in data.details){
                        select.append("<option cbid='"+data.details[keys].id+"' competency-description='"+data.details[keys].description+"' value='"+data.details[keys].title+"'>"+data.details[keys].title+"</option>");
                    }
                } else {
                    select.append("<option selected disabled>- No Competency Title Available -</option>");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                $("#competencyTitle").prop('disabled', false);
                select.append("<option selected disabled>- No Competency Title Available -</option>");
                console.log(e);
            }
        });
    }


    $(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
        $('body').css('padding-right','0');
    });

    $("#btnAdd").click(function(){
       if(!validateCompetencyIndex()){
           return;
       } else {
           $("#loadingmodal").modal("show");
           $.ajax({
               url: "<?php echo base_url();?>competencyindexmanagement/newcompetencyindex",
               type: "POST",
               dataType:"json",
               data: {
                   "COMPETENCYTITLE": $("#competencyTitle option:selected").val(),
                   "COMPETENCYID":$("#competencyTitle option:selected").attr("cbid"),
                   "LEVEL":window.compLevel,
                   "TYPE":window.descType,
                   "DESCRIPTION":$("#cbiDescription").val()
               },
               success: function(result){
                   $("#loadingmodal").modal("hide");
                   if(result.Code == "00"){
                       messageDialogModal("Server Message",result.Message);
                       clearField();
                       window.compLevel = "";
                       window.descType = "";
                       $(".levelGroup button").prop("disabled",false);
                       $(".levelGroup button").removeClass("active");

                       $(".descGroup button").prop("disabled",false);
                       $(".descGroup button").removeClass("active");
                       window.isUpdateCompetencies = true;
                       $("#competencyDescription").text("");
                       $("#competencyDescription").hide();
                       $("#actionButtons").css("visibility","hidden");
                       loadCompetencies();
                   } else if (result.Code == "02") {
                       messageDialogModal("Server Message",result.Message);
                       window.compLevel = "";
                       window.descType = "";
                       $(".levelGroup button").prop("disabled",false);
                       $(".levelGroup button").removeClass("active");

                       $(".descGroup button").prop("disabled",false);
                       $(".descGroup button").removeClass("active");
                       $("#cbiDescription").val("");
                   }
               },
               error: function(e){
                   console.log(e);
                   $("#loadingmodal").modal("hide");
               }
           });
       }
    });

    $("#btnEdit").click(function(){
       $("#loadingmodal").modal("show");
        var div = $(".divEditDesc");
        div.empty();
        $.ajax({
            url: "<?php echo base_url();?>competencyindexmanagement/editdetails",
            type: "POST",
            dataType: "json",
            data: {
                "COMPETENCYID": $("#competencyTitle option:selected").attr("cbid"),
                "LEVEL":window.compLevel,
                "TYPE":window.descType
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    $(".divInputDesc").hide();
                    for(var keys in result.details){
                        var el = '<textarea rows="3" rowid="'+result.details[keys].id+'" style="resize: none" class="form-control clearField editFields" placeholder="Enter Description.." required="" >'+atob(result.details[keys].description)+'</textarea>';
                        div.append(el);
                    }
                    div.show();
                    $("#btnAdd").prop("disabled",true);
                    $("#btnSave").prop("disabled",false);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",true);
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    });

    $("#btnDelete").click(function(){
       $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>competencyindexmanagement/editdetails",
            type: "POST",
            dataType: "json",
            data: {
                "COMPETENCYID": $("#competencyTitle option:selected").attr("cbid"),
                "LEVEL":window.compLevel,
                "TYPE":window.descType
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    for(var keys in result.details){
                        $("#btnSave").attr("rowid",result.details[keys].id);
                        $("#cbiDescription").val(atob(result.details[keys].description));
                        $("#deleteCompetencyId").val(result.details[keys].competencyid);
                        $("#deleteLevel").val(result.details[keys].level);
                        $("#deleteType").val(result.details[keys].type);
                    }
                    $("#cbiDescription").prop("disabled",true);
                    $("#modalDelete").modal("show");

                    defaultButtonState();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    });

    function defaultButtonState(){
        $("#btnAdd").prop("disabled",false);
        $("#btnSave").prop("disabled",true);
        $("#btnEdit").prop("disabled",false);
        $("#btnDelete").prop("disabled",false);
    }

    $("#btnProceedDelete").click(function(){
        $("#modalDelete").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>competencyindexmanagement/deletecompetencyindex",
            type: "POST",
            dataType: "json",
            data: {
                "COMPETENCYID": $("#deleteCompetencyId").val(),
                "LEVEL":$("#deleteLevel").val(),
                "TYPE":$("#deleteType").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    clearField();
                    window.compLevel = "";
                    window.descType = "";
                    $(".levelGroup button").prop("disabled",false);
                    $(".levelGroup button").removeClass("active");

                    $(".descGroup button").prop("disabled",false);
                    $(".descGroup button").removeClass("active");
                    window.isUpdateCompetencies = true;
                    $("#competencyDescription").text("");
                    $("#competencyDescription").hide();
                    $("#actionButtons").css("visibility","hidden");
                    loadCompetencies();
                    defaultButtonState();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
                $("#loadingmodal").modal("hide");
            }
        });
    });

    function cancelDelete(){
        $("#cbiDescription").prop("disabled",false);
        $("#cbiDescription").val("");
        $(".levelGroup button").prop("disabled",false);
        $(".levelGroup button").removeClass("active");

        $(".descGroup button").prop("disabled",false);
        $(".descGroup button").removeClass("active");
        clearField();

        defaultButtonState();
    }

    $("#btnSave").click(function(){
        if(!validateEditFields()){
            messageDialogModal("Required","Please fill required fields");
        } else {
            var desc = [];
            var editField = $(".editFields");
            $(editField).each(function() {
                desc.push({
                    rowid:$(this).attr("rowid"),
                    desc:$(this).val()
                });
            });

            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>competencyindexmanagement/savechanges",
                type: "POST",
                dataType: "json",
                data: {
                    "COMPETENCYID": $("#competencyTitle option:selected").attr("cbid"),
                    "TITLE":$("#competencyTitle option:selected").val(),
                    "FIELDS":desc
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        clearField();
                        window.compLevel = "";
                        window.descType = "";
                        $(".levelGroup button").prop("disabled",false);
                        $(".levelGroup button").removeClass("active");

                        $(".descGroup button").prop("disabled",false);
                        $(".descGroup button").removeClass("active");
                        window.isUpdateCompetencies = true;
                        $("#competencyDescription").text("");
                        $("#competencyDescription").hide();
                        $("#actionButtons").css("visibility","hidden");
                        loadCompetencies();
                        $(".divInputDesc").show();
                        $(".divEditDesc").hide();
                        $(".divEditDesc").empty();

                        defaultButtonState();
                    } else {
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");
                }
            });
        }
    });

    function validateEditFields(){
        var editField = $(".editFields");
        var r = true;
        $(editField).each(function() {
            if ($(this).val() == '' || $(this).val() == null) {
                r = false;
            }
        });
        return r;
    }


    function validateCompetencyIndex(){
        if($("#competencyTitle option:selected").val() == "- Select Competency Title -"){
            messageDialogModal("Required Field","Please Select Competency Title");
            return false;
        }
        if(window.compLevel == ""){
            messageDialogModal("Required Field","Please Select Competency Level");
            return false;
        }
        if(window.descType == ""){
            messageDialogModal("Required Field","Please Select Description Type");
            return false;
        }

        if($("#cbiDescription").val() == "" || $("#cbiDescription").val() == null){
            messageDialogModal("Required Field","Please Enter Description");
            return false;
        }
        return true;
    }


    function hasValue(level){
        var r = true;
        $(level).each(function() {
            if ($(this).val() == '' || $(this).val() == null) {
                r = false;
            }
        });

        return r;
    }


    $("#btnSubmitNewCompetencyCbi").click(function(){
       if($("#newcompetencyTitleCbi").val() == "" || $("#newcompetencyTitleCbi").val() == null){
           messageDialogModal("Required","Please Provide Competency Title");
       } else if($("#newcompetencyDescriptionCbi").val() == "" || $("#newcompetencyDescriptionCbi").val() == null){
           messageDialogModal("Required","Please Provide Description");
       } else if($("#newcompetencyTypeCbi option:selected").val() == "- Select Competency Type"){
           messageDialogModal("Required","Please Select Competency Type");
       } else {
           $("#newCBIModal").modal("hide");
           $("#loadingmodal").modal("show");
           $.ajax({
              url: "<?php echo base_url();?>competencyindexmanagement/newcompetency",
               type:"POST",
               dataType: "json",
               data: {
                   "TITLE": $("#newcompetencyTitleCbi").val(),
                   "DESCRIPTION" : $("#newcompetencyDescriptionCbi").val(),
                   "TYPE" : $("#newcompetencyTypeCbi option:selected").val()
               },
               success: function(result){
                   if(result.Code == "00"){
                       messageDialogModal("Server Message",result.Message);
                       window.isUpdateCompetencies = true;
                       loadCompetencies();
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