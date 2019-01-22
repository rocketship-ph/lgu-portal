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
                <div class="panel" align="center" id="panel_boarding">
                    <a  href="<?php echo base_url();?>transaction/requirementchecklist" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                        <br>
                        Requirements Checklist
                    </a>
                </div>
            </td>

            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_backgroundinvestigation">
                    <a  href="<?php echo base_url();?>main/transaction" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/transaction.png" height="40px">
                        <br>
                        Transaction Menu
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
                    <legend>Requirements Checklist</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills">
                                <li class="active" id="liapplicant"><a data-toggle="pill" href="#applicantchecklist">Applicant Checklist</a></li>
                                <li id="lirequirements"><a data-toggle="pill" href="#managechecklist">Manage Requirements</a></li>
                            </ul>

                            <div class="tab-content">
                                <hr>
                                <div id="applicantchecklist" class="tab-pane fade in active">
                                   <div class="col-md-12">
                                       <h4>Applicant Checklist</h4>
                                       <div class="row">
                                           <div class="col-md-5">
                                               <div class="form-group">
                                                   <label for="applicantReqnum" class="control-label">Request Number</label>
                                                   <select class="form-control clearField" id="applicantReqnum">
                                                       <option selected disabled>- Select Request Number -</option>
                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <label for="applicantCode" class="control-label">Applicant Code</label>
                                                   <select class="form-control clearField" id="applicantCode">
                                                       <option selected disabled>- Select Applicant Code -</option>
                                                   </select>
                                               </div>
                                           </div>
                                           <div class="col-md-7">
                                               <h5 id="tablemessage" style="display:none"></h5>
                                               <div class="table-responsive" id="tblapplicantchecklistcont" style="display: none;">
                                                   <table id="tblapplicantchecklist" class="display responsive compact" cellspacing="0" width="100%" >
                                                       <thead>
                                                       <tr>
                                                           <th>REQUIREMENT</th>
                                                           <th align="center">SUBMITTED</th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                    <div class="form-group col-md-12" align="right">
                                        <div class="col-md-12">
                                            <br>
                                            <button class="btn btn-success" id="btnSubmitApplicant">UPDATE</button>
<!--                                            <button class="btn btn-success" id="btnCompleteChecklist" style="display: none">COMPLETE REQUIREMENTS</button>-->
                                            <button class="btn btn-default" id="btnCancelApplicant">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="managechecklist" class="tab-pane fade">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6" align="left">
                                                <h4>Manage Requirements</h4>
                                            </div>
                                            <div class="col-md-6" align="right">
                                                <button style="float: right" class="btn btn-outline-info" id="btnNew">+ New Set of Requirements</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="applicantReqnum" class="control-label">Request Number</label>
                                                    <select class="form-control clearField" id="requirementReqnum">
                                                        <option selected disabled>- Select Request Number -</option>
                                                    </select>
                                                    <p><b id="reqlblposition"></b>,&nbsp;<span id="reqlblgroupposition"></span><br><span style="font-style: italic" id="reqlblgroupdesc"></span></p>
                                                </div>

                                            </div>
                                            <div class="col-md-7">
                                                <br>
                                                <div class="well" id="divReqCont" style="display: none">
                                                    <button class="btn btn-outline-danger btn-sm" id="btnEditReq">Edit Requirements</button>
                                                    <button class="btn btn-outline-primary btn-sm" id="btnDeletetReq">Delete Requirements</button>
                                                    <br>
                                                    <div style="padding-top: 10px;" id="divRequirements"></div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-12" align="right" id="btnUpdates" style="display: none">
                                        <div class="col-md-12">
                                            <br>
                                            <button class="btn btn-success" id="btnSubmitRequirement">UPDATE</button>
                                            <button class="btn btn-default" id="btnCancelRequirement">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addnewmodal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>New Set of Requirement</legend>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="newsetReqnum" class="control-label">Request Number</label>
                            <select class="form-control clearField" id="newsetReqnum">
                                <option selected disabled>- Select Request Number -</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7" style="padding-top: 5px;">
                        <br>
                        <p><b id="lblposition"></b>,&nbsp;<span id="lblgroupposition"></span><br></p>
                    </div>
                    <div class="col-md-12">
                        <span style="font-style: italic;" id="lblgroupdesc"></span>
                        <hr>
                        <p style="font-size: 12px;font-style: italic"><b>Note: </b>Each requirement must be entered per field. <b>Avoid</b> combining requirements into one input field only.</p>
                        <div class="form-group">
                            <button id="btnReqAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Field</button>&nbsp;&nbsp;<button id="btnReqRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
                        </div>
                        <div id="divFields" style="max-height: 240px !important;overflow: auto">
                            <div class="form-group divreq0">
                                <input type="text" class="form-control clearField newrequirements1" placeholder="Enter Requirement">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-success" id="btnSubmitNewRequirements">SUBMIT</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade " id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b>Delete Requirements</b>
            </div>
            <div class="modal-body" >
                <div class='row'>
                    <div class="col-md-12">
                        <label style="font-weight: normal">Are you sure you want to delete requirements for this request number: <br><span id="deletereqnum" style="font-weight:bold;"></span> ?</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="center">
                <input type="button" id="btnproceeddelete" class="btn btn-danger"  value="YES">
                <input type="button" class="btn btn-cancel" data-dismiss="modal"  value="NO">
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
        window.isUpdateRequirements = false;
        loadRequestNumberApplicants();
    });

    $("#liapplicant").click(function(){
        loadRequestNumberApplicants();
    });

    $("#lirequirements").click(function(){
        clearField();
        $("#divRequirements").empty();
        $("#divReqCont").hide();
        $("#reqlblposition").text("");
        $("#reqlblgroupposition").text("");
        $("#reqlblgroupdesc").text("");
        $("#btnUpdates").hide();
        loadRequirementRequestnumbers();
    });

    function loadRequirementRequestnumbers(){
        if(window.isUpdateRequirements == false){
            $("#loadingmodal").modal("show");
        }
        var select = $("#requirementReqnum");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>requirementchecklistmanagement/displaychecklistreqnum",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option data-position="'+result.details[keys].name+'" data-group="'+result.details[keys].groupposition+'" data-desc="'+result.details[keys].groupdesc+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                console.log(e);
            }
        });
    }

    $("#requirementReqnum").change(function(){
        $("#loadingmodal").modal("show");
        var reqnum = $("#requirementReqnum option:selected").val();

        $("#reqlblposition").text($("#requirementReqnum option:selected").attr("data-position"));
        $("#reqlblgroupposition").text($("#requirementReqnum option:selected").attr("data-group"));
        $("#reqlblgroupdesc").text(atob($("#requirementReqnum option:selected").attr("data-desc")));
        var div = $("#divRequirements");
        div.empty();
        $.ajax({
            url: "<?php echo base_url();?>requirementchecklistmanagement/requirementchecklist",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":reqnum
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){

                    for(var keys in result.details){
                        var dt = result.details[keys];
                        var f = '<div class="form-group"><input type="text" class="form-control reqItems clearField" data-id="'+dt.reqid+'" disabled value="'+dt.requirement+'" data-reqnum="'+dt.requestnumber+'"></div>';
                        div.append(f);
                    }
                    $("#divReqCont").show();
                    $("#btnUpdates").show();
                } else {
                    console.log(result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });

    function loadRequestNumberApplicants(){
        $("#loadingmodal").modal("show");
        var select = $("#applicantReqnum");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>requirementchecklistmanagement/displaychecklistreqnum",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
			console.log(result);
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option data-position="'+result.details[keys].name+'" data-group="'+result.details[keys].groupposition+'" data-desc="'+result.details[keys].groupdesc+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                console.log(e);
            }
        });
    }

    $("#applicantReqnum").change(function(){
       var reqnum = $("#applicantReqnum option:selected").val();
        $("#loadingmodal").modal("show");
        $("#tblapplicantchecklist").dataTable({
            "destroy":true,
            "responsive" : true,
            "sDOM": 'frt',
            "oLanguage": {
                "sSearch": "Search:",
                "sEmpty":"No Requirement(s) Found"
            },
            "ajax":{
                "url":"<?php  echo base_url(); ?>requirementchecklistmanagement/requirementchecklist",
                "data" : {
                    "REQUESTNUMBER":reqnum
                },
                "type" : "POST",
                "dataType" : "json",
                "async": false,
                dataSrc: function(json){
                    if(json.Code=="00"){
                        $('#tblapplicantchecklistcont').show();
                        $("#tablemessage").hide();
                        loadApplicantCodes(reqnum);
                        return json.details;
                    }else{
                        $("#tblapplicantchecklistcont").hide();
                        $("#tablemessage").hide();
                        return 0;
                    }
                }
            },
            "columns":[
                {"data":"requirement"},
                {"data":function(data){
                    return "<input type='checkbox' style='width: auto;text-align: center' class='requirements' id='"+data.reqid+"'>";
                }
                }]
        });
    });

    $("#btnNew").click(function(){
        $("#loadingmodal").modal("show");

        var select = $("#newsetReqnum");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>requirementchecklistmanagement/displayrequestnumbers",
            type: "POST",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option position="'+result.details[keys].position+'" groupposition="'+result.details[keys].groupposition+'" groupdesc="'+result.details[keys].groupdesc+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                }
                $("#addnewmodal").modal("show");
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Request Number(s) Available -</option>');
                console.log(e);
            }
        });

    });

    $("#newsetReqnum").change(function(){
       var position =  $("#newsetReqnum option:selected").attr("position");
       var groupposition =  $("#newsetReqnum option:selected").attr("groupposition");
       var groupdesc =  $("#newsetReqnum option:selected").attr("groupdesc");

        $("#lblposition").text(position);
        $("#lblgroupposition").text(groupposition);
        $("#lblgroupdesc").text(atob(groupdesc));
    });

    $("#btnReqAdd").click(function(){
        var div = $("#divFields");
        var l = $("[class*='divreq']").length;
        var req = '<div class="removablediv form-group divreq'+l+'">' +
            '<input type="text" class="form-control clearField newrequirements'+(l+1)+'" placeholder="Enter Requirement">' +
            '</div>';
        div.append(req);
    });

    $("#btnReqRemove").click(function(){
        var l = $("[class*='divreq']").length;
        if(l > 1){
            $(".divreq"+(l-1)).remove();
        }
    });

    $("#btnSubmitNewRequirements").click(function(){
        if($("#newsetReqnum option:selected").val() == "- Select Request Number -" || $("#newsetReqnum option:selected").val() == "- No Request Number(s) Available -" || $("#newsetReqnum option:selected").val() == null){
            messageDialogModal("Required","Please Select Request Number");
        } else {
            var requirements = [];
            var req = $("[class*='divreq']").length;
            for(var i=0;i<req;i++){
                var el = "divreq"+i;
                $("div."+el+" > input").each(function(){
                    if(!($(this).val() == "" || $(this).val() == null)){
                        requirements.push($(this).val());
                    }
                });
            }

            $("#addnewmodal").modal("hide");
            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>requirementchecklistmanagement/addnewrequirements",
                type: "POST",
                dataType: "json",
                data: {
                    "REQUESTNUMBER": $("#newsetReqnum option:selected").val(),
                    "REQUIREMENTS":requirements
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        $("#newsetReqnum").prop("SelectedIndex",0);
                        $("#lblposition").text("");
                        $("#lblgroupposition").text("");
                        $("#lblgroupdesc").text("");
                        $(".removablediv").each(function(){
                           $(this).remove();
                        });
                        $(".newrequirements1").each(function(){
                           $(this).val("");
                        });
                        window.isUpdateRequirements = true;
                        loadRequirementRequestnumbers();
                    } else {
                        messageDialogModal("Server Message",result.Message);
                        $("#addnewmodal").modal("show");
                    }
                },
                error: function(e){
                    $("#loadingmodal").modal("hide");
                    console.log(e);
                }
            });
            console.log(requirements);
        }

    });

    function loadApplicantCodes(reqnum){
        var select = $("#applicantCode");
        select.empty();

        $.ajax({
            url: "<?php echo base_url();?>requirementchecklistmanagement/displayapplicantcode",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": reqnum
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Applicant Code -</option>');
                    for(var keys in result.details){
                        select.append('<option applicantname="'+result.details[keys].applicantname+'" value="'+result.details[keys].applicantcode+'">'+result.details[keys].applicantcode+' ['+result.details[keys].applicantname+']</option>');
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
        var appcode =  $("#applicantCode option:selected").val();
        var reqnum =  $("#applicantReqnum option:selected").val();
        loadSubmittedRequirements(appcode,reqnum);
    });

    function loadSubmittedRequirements(appcode,reqnum){
        $(".requirements").each(function(){
            $(this).prop("checked",false);
        });
        $('#loadingmodal').modal('show');
        var isChecklistComplete = 0;
        var table = $("#tblapplicantchecklist").dataTable();
        $.ajax({
            url : "<?php  echo base_url(); ?>requirementchecklistmanagement/getapplicantsubmittedreqs",
            type : "POST",
            data : {
                "REQUESTNUMBER": reqnum,
                "APPLICANTCODE": appcode
            },
            dataType : "json",
            async: false,
            success : function(res){
                $('#loadingmodal').modal('hide');
                for(var keys in res.details){
                    $(".requirements", table.fnGetNodes()).each(function(){
                        var id = $(this).attr("id");
                        var s = res.details[keys].requirementid;
                        if(id==s){
                            $(this).prop("checked",true);
                        }
                    });
                }


                $(".requirements").each(function(){
                    if($(this).is(":checked")){
                        isChecklistComplete += 0;
                    } else {
                        isChecklistComplete += 1;
                    }
                });

                if(isChecklistComplete == 0){
                   $("#btnSubmitApplicant").prop("disabled",true);
                } else {
                    $("#btnSubmitApplicant").prop("disabled",false);

                }

            },
            error: function(e){
                $('#loadingmodal').modal('hide');
                console.log(e);
            }
        });
    }


    $("#btnSubmit").click(function(){
        if($("#applicantReqnum option:selected").val() == "- Select Request Number -" || $("#applicantReqnum option:selected").val() == "- No Request Number(s) Available -" || $("#applicantReqnum option:selected").val() == null){
            messageDialogModal("Required","Please Select Request Number");
        }  else  if($("#applicantCode option:selected").val() == "- Select Applicant Code -" || $("#applicantCode option:selected").val() == "- No Applicant Code(s) Available -" || $("#applicantCode option:selected").val() == null){
            messageDialogModal("Required","Please Select Applicant Code");
        } else {
            $("#loadingmodal").modal("show");
            var requirements = [];
            var table = $('#tblapplicantchecklist').dataTable();
            var a = table.fnGetNodes();
            $("input.requirements:checked",a).each(function(){
                var id = $(this).attr("id");
                requirements.push(id);
            });
            $.ajax({
                url: "<?php echo base_url();?>requirementchecklistmanagement/updatesubmitted",
                type: "POST",
                dataType: "json",
                data: {
                    "APPLICANTCODE":$("#applicantCode option:selected").val(),
                    "PERMANENTID": $("#permanentid").val(),
                    "REQUIREMENTS": requirements
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    console.log(result);
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);
                        window.isUpdate = true;
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

    $("#btnSubmitRequirement").click(function(){
        var isempty = false;
       $(".reqItems").each(function(){
           if($(this).val() == "" || $(this).val() == null){
               isempty = true;
           }
       });

        if(isempty){
            messageDialogModal("Required","Some Fields are Empty");
        } else {
            var arrReqs = [];
            $(".reqItems").each(function(){
                arrReqs.push({
                    rowid:$(this).attr("data-id"),
                    req: $(this).val()
                });
            });

            console.log(arrReqs);
            $("#loadingmodal").modal("show");
            $.ajax({
               url: "<?php echo base_url();?>requirementchecklistmanagement/updaterequirements",
                type: "POST",
                dataType:"json",
                data: {
                    "REQS":arrReqs,
                    "REQUESTNUMBER": $("#requirementReqnum option:selected").val()
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        clearField();
                        $("#divRequirements").empty();
                        $("#divReqCont").hide();
                        $("#reqlblposition").text("");
                        $("#reqlblgroupposition").text("");
                        $("#reqlblgroupdesc").text("");
                        $("#btnUpdates").hide();
                        messageDialogModal("Server Message",result.Message);
                        window.isUpdateRequirements = true;
                        loadRequirementRequestnumbers();
                    } else {
                        messageDialogModal("Server Message",result.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
    });


    $("#btnSubmitApplicant").click(function(){
        var reqs = [];
        var isChecklistComplete = 0;
        var table = $('#tblapplicantchecklist').dataTable();
        var a = table.fnGetNodes();
        $("input.requirements:checked",a).each(function(){
            var id = $(this).attr("id");
            reqs.push(id);
        });
        if($("#applicantReqnum option:selected").val() == '- Select Request Number -'){
            messageDialogModal("Server Message","No Request Number Selected");
        } else if ($("#applicantCode option:selected").val() == '- Select Applicant Code -'){
            messageDialogModal("Server Message","No Applicant Selected");
        } else if(reqs.length<=0) {
            messageDialogModal("Server Message","No Requirement Checked");
        } else {
            $('#loadingmodal').modal('show');
            $.ajax({
                url: "<?php echo base_url();?>requirementchecklistmanagement/updatechecklist",
                type: "POST",
                dataType: "json",
                data: {
                    "REQUESTNUMBER":$("#applicantReqnum option:selected").val(),
                    "APPLICANTCODE":$("#applicantCode option:selected").val(),
                    "REQUIREMENTS":reqs
                },
                success: function(data){
                    $('#loadingmodal').modal('hide');
                    console.log(data);
                    if(data.Code == "00"){
                        messageDialogModal("Server Message",data.Message);
                        $(".requirements").each(function(){
                            if($(this).is(":checked")){
                                isChecklistComplete += 0;
                            } else {
                                isChecklistComplete += 1;
                            }
                        });

                        if(isChecklistComplete == 0){
                            $("#btnSubmitApplicant").prop("disabled",true);
                            completeRequirements($("#applicantCode option:selected").val());
                        } else {
                            $("#btnSubmitApplicant").prop("disabled",false);
                        }
                    } else {
                        messageDialogModal("Server Message",data.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $('#loadingmodal').modal('hide');
                }
            });
        }
    });

$("#btnEditReq").click(function(){
   $(".reqItems").attr("disabled",false);
});

$("#btnDeletetReq").click(function(){
    $("#deletereqnum").text($("#requirementReqnum option:selected").val());
    $("#modaldelete").modal("show");
});

$("#btnproceeddelete").click(function(){
    $("#modaldelete").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>requirementchecklistmanagement/deleterequirements",
        type: "POST",
        dataType:"json",
        data: {
            "REQUESTNUMBER": $("#requirementReqnum option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                clearField();
                $("#divRequirements").empty();
                $("#divReqCont").hide();
                $("#reqlblposition").text("");
                $("#reqlblgroupposition").text("");
                $("#reqlblgroupdesc").text("");
                $("#btnUpdates").hide();
                messageDialogModal("Server Message",result.Message);
                window.isUpdateRequirements = true;
                loadRequirementRequestnumbers();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$("#btnCancelRequirement").click(function(){
    clearField();
    $("#divRequirements").empty();
    $("#divReqCont").hide();
    $("#reqlblposition").text("");
    $("#reqlblgroupposition").text("");
    $("#reqlblgroupdesc").text("");
    $("#btnUpdates").hide();
});

function completeRequirements(appcode){
    $.ajax({
        url: "<?php echo base_url();?>requirementchecklistmanagement/completerequirements",
        type: "POST",
        dataType:"json",
        data: {
            "APPLICANTCODE": appcode
        },
        success: function(result){
            if(result.Code == "00"){
                console.log("complete requirements: "+appcode);
            } else {
                console.log("failed complete requirements: "+result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}
</script>