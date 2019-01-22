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
                    <img src="<?php echo base_url();?>assets/img/icons/examination.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Examination Menu</h4>
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
                <div class="panel" align="center" id="panel_evaluatorselection">
                    <a  href="<?php echo base_url();?>examination/evaluatorselection" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/evaluator_selection.png" height="40px">
                        <br>
                        Evaluator Selection
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_createexam">
                    <a  href="<?php echo base_url();?>examination/createexam" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/create_exam.png" height="40px">
                        <br>
                        Create Examination
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_assessmentcheck">
                    <a href="<?php echo base_url();?>examination/assessmentcheck" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/assessment_check.png" height="40px">
                        <br>
                        Assessment Check
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel" align="center" id="panel_examresults">
                    <a  href="<?php echo base_url();?>examination/examresults" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/exam_result.png" height="40px">
                        <br>
                        Examination Results
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
                    <legend>Create Examination - Components</legend>
                    <div class="form-group">
                        <label for="requestNumber" class="col-lg-2 control-label">Request Number</label>
                        <div class="col-lg-4">
                            <select class="form-control clearField" id="requestNumber">
                                <option selected disabled>- Select Request Number -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="well" style="display: none" id="divRequestDetails">
                                <div class="form-group">
                                    <label for="groupposition" class="col-lg-4 control-label">Position</label>
                                    <div class="col-lg-8">
                                        <b class="control-label" id="lblposition"></b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="groupposition" class="col-lg-4 control-label">Group Position</label>
                                    <div class="col-lg-8">
                                        <b class="control-label" id="lblgroupposition"></b>
                                    </div>
                                    <label id="grouppositiondescription" class="col-lg-12 control-label"></label>
                                </div>
                            </div>
                            <div id="tableView" style="display: none">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="70%" style="text-align:center;">
                                            <b>Competencies</b>
                                        </th>
                                        <th style="text-align:center;" width="30%">
                                            Weight Allocation
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="divGroupPositionData">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td style='text-align:right'><b>TOTAL</b></td>
                                        <td style='text-align: center'><span id="tbltotal">0</span>%</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <b id="competencyTitle"></b><br><br>
                            <div class="col-lg-12" id="divQuestions">

                            </div>
                            <!--                            <div class="col-md-12">-->
                            <!--                                <hr>-->
                            <!--                            </div>-->
                            <div class="col-lg-12" align="right" id="divActionBtns" style="display: none">
                                <hr>
                                <button class="btn btn-default" id="btnAdd">ADD</button>
                                <button class="btn btn-danger" id="btnEdit">EDIT</button>
                                <button class="btn btn-primary" id="btnDelete">DELETE</button>
                                <button class="btn btn-success" id="btnSave">SAVE</button>
                            </div>
                        </div>
                    </div>


                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Confirmation</h4>
                <hr>
                <span>Are you sure you want to remove this exam from this request number <b id="delReqNum"></b> ?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-primary" id="btnProceedDelete" value="DELETE">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
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

    $("#panel_createexam").addClass("selected_panel");
    $("#divRequestDetails").hide();
    $("#divActionBtns").hide();

    $("#btnAdd").prop("disabled",false);
    $("#btnEdit").prop("disabled",true);
    $("#btnSave").prop("disabled",true);
    $("#btnDelete").prop("disabled",true);

    window.weightTotal = 0;
    window.arrtypes = [];
    $("#tableView").hide();


    loadRequests();

});

function loadRequests(){
    $("#loadingmodal").modal("show");
    var select = $("#requestNumber");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>examinationmanagement/displayrequests",
        type: "GET",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                select.append('<option selected disabled>- Select Request Number -</option>');
                for(var keys in result.details){
                    select.append('<option value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                }
            } else {
                select.append('<option selected disabled>- No Request(s) Available -</option>');
                messageDialogModal("No Request Available","Either the user is not tagged as evaluator or there are no available position requests at the moment");
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append('<option selected disabled>- No Request(s) Available -</option>');
            console.log(e);
        }
    });
}

$("#requestNumber").change(function(){
    $("#tableView").hide();

    var reqnum = $(this).val();
    $("#competencyTitle").hide();
    window.weightTotal = 0;
    window.grptable = [];
    window.arrtypes = [];
    var tbody = $("#divGroupPositionData");
    tbody.empty();
    $("#tbltotal").text(window.weightTotal);

    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>examinationmanagement/displaygrouptable",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":reqnum
        },
        success: function(result){
            console.log("REQNUM CHANGE DATA");
            console.log(result);
            $("#loadingmodal").modal("hide");
            var hasGroupdata = true;
            var crit = "";
            var cbi = "";
            if(result.Code == "00"){
                if(result.type == "grp"){
                    for(var keys in result.details){
                        $("#lblposition").text(result.details[keys].positionname);
                        $("#lblgroupposition").text(result.details[keys].groupposition);
                        $("#grouppositiondescription").text(atob(result.details[keys].groupdesc));

                        if(result.details[keys].criteria == null){
                            hasGroupdata = false;
                            crit = [];
                        } else {
                            hasGroupdata = true;
                            crit = result.details[keys].criteria;
                            cbi = result.details[keys].cbiskills;
                        }
                    }
                    $("#divRequestDetails").show();

                    if(hasGroupdata){
                        window.grptable = JSON.parse(crit);

                        createQuestionFields(cbi,crit);
                        var criteria = JSON.parse(crit);

                        for(var x=0;x<criteria.length;x++){
                            var titles = "";
                            var arrtitles = criteria[x].titles;
                            for(var i=0;i<arrtitles.length;i++){x
                                var pointers = 'div'+arrtitles[i].replace(/\s+/g, "");
                                titles += "<a class='criteriaTitle' target-div='"+pointers+"' criteria-type='"+criteria[x].type+"' criteria='"+arrtitles[i]+"'>"+arrtitles[i]+"</a><br>";
                            }

                            var string = "";
                            var type = "";
                            var align = "center";
                            if(criteria[x].type == "TECHNICAL"){
                                type = "Technical (as identified in Job Description)";
                                align="left";
                            } else {
                                type = criteria[x].type;
                            }
                            string +="<tr class='tr"+criteria[x].type+"'>" +
                            "<td style='text-align: "+align+"'><b>"+type+"</b>" +
                            "</td>" +
                            "<td style='text-align: center' rowspan='2' >"+criteria[x].weightalloc+"%</td></tr>" +
                            "<tr class='tr"+criteria[x].type+"'><td>"+titles+"</td></tr>";

                            window.weightTotal += parseInt(criteria[x].weightalloc);
                            tbody.append(string);
                            (window.arrtypes).push(criteria[x].type);
                        }
                        $("#tbltotal").text(window.weightTotal);

                    } else {
                        messageDialogModal("No Group Table Data","The selected position request does not have the prerequisite group table data encoded to the system to create an examination. Please encode a group table data before creating an examination for this request number");
                    }
                } else if(result.type == "exam"){
                    for(var keys in result.details){
                        $("#lblposition").text(result.details[keys].positionname);
                        $("#lblgroupposition").text(result.details[keys].groupposition);
                        $("#grouppositiondescription").text(atob(result.details[keys].groupdesc));

                        if(result.details[keys].criteria == null){
                            hasGroupdata = false;
                            crit = [];
                        } else {
                            hasGroupdata = true;
                            crit = result.details[keys].criteria;
                            cbi = atob(result.details[keys].exam);
                        }
                    }
                    $("#divRequestDetails").show();

                    if(hasGroupdata){
                        window.grptable = JSON.parse(crit);

                        plotQuestionFields(cbi,crit);
                        var criteria = JSON.parse(crit);

                        for(var x=0;x<criteria.length;x++){
                            var titles = "";
                            var arrtitles = criteria[x].titles;
                            for(var i=0;i<arrtitles.length;i++){x
                                var pointers = 'div'+arrtitles[i].replace(/\s+/g, "");
                                titles += "<a class='criteriaTitle' target-div='"+pointers+"' criteria-type='"+criteria[x].type+"' criteria='"+arrtitles[i]+"'>"+arrtitles[i]+"</a><br>";
                            }

                            var string = "";
                            var type = "";
                            var align = "center";
                            if(criteria[x].type == "TECHNICAL"){
                                type = "Technical (as identified in Job Description)";
                                align="left";
                            } else {
                                type = criteria[x].type;
                            }
                            string +="<tr class='tr"+criteria[x].type+"'>" +
                            "<td style='text-align: "+align+"'><b>"+type+"</b>" +
                            "</td>" +
                            "<td style='text-align: center' rowspan='2' >"+criteria[x].weightalloc+"%</td></tr>" +
                            "<tr class='tr"+criteria[x].type+"'><td>"+titles+"</td></tr>";

                            window.weightTotal += parseInt(criteria[x].weightalloc);
                            tbody.append(string);
                            (window.arrtypes).push(criteria[x].type);
                        }
                        $("#tbltotal").text(window.weightTotal);

                    }

                } else {
                    messageDialogModal("No Group Table Data","The selected position request does not have the prerequisite group table data encoded to the system to create an examination. Please encode a group table data before creating an examination for this request number");
                }
                $("#tableView").show();
            } else {
                messageDialogModal("No Group Table Data","The selected position request does not have the prerequisite group table data encoded to the system to create an examination. Please encode a group table data before creating an examination for this request number");
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

function createQuestionFields(cbi,title){
    title = JSON.parse(title);
    console.log("titles");
    console.log(title);
    var arrQ = [];
    var t1=[];
    for(var keys=0;keys<title.length;keys++){
        for(var i=0;i<(title[keys].titles).length;i++){
            t1.push({
                title: title[keys].titles[i],
                weight: title[keys].weightalloc,
                type: title[keys].type
            });
        }
    }

    cbi = JSON.parse(atob(cbi));

    for(var keys in cbi){
        if(cbi[keys].type == "CORE"){
            for(var i=0;i<t1.length;i++){
                if(t1[i].title == cbi[keys].title){
                    arrQ.push({
                        title: cbi[keys].title,
                        level: cbi[keys].level,
                        type: cbi[keys].type,
                        desc: cbi[keys].desc,
                        weight: t1[i].weight,
                        criteriatype: t1[i].type
                    });
                }
            }
        }
    }

    window.arrQguide = arrQ;
    var divQuestion = $("#divQuestions");
    divQuestion.empty();

    for(var keys=0;keys<arrQ.length;keys++){
        var questions = "";

        var pointers = 'div'+(arrQ[keys].title).replace(/\s+/g, "");

        var bDis="disabled",iDis="disabled",aDis="disabled",sDis="disabled",desc="";
        var bAct="",iAct="",aAct="",sAct="";
        var bTex="display:none",iTex="display:none",aTex="display:none",sTex="display:none";
        if(arrQ[keys].level == "basic"){
            bDis = "";
            bAct = "active";
            desc = arrQ[keys].desc;
            bTex = "";
        } else if(arrQ[keys].level == "intermediate"){
            iDis = "";
            iAct = "active";
            desc = arrQ[keys].desc;
            iTex = "";
        } else if(arrQ[keys].level == "advanced"){
            aDis = "";
            aAct = "active";
            desc = arrQ[keys].desc;
            aTex = "";
        } else if(arrQ[keys].level == "superior"){
            sDis = "";
            sAct = "active";
            desc = arrQ[keys].desc;
            sTex = "";
        } else {
            desc = "";
        }

        questions = '<div class="divCriteriaQuestions" id="'+pointers+'" style="display: none"><div class="btn-group competencyLevel">' +
        '<button '+bDis+' level="basic" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+bAct+'">Basic</button>' +
        '<button '+iDis+' level="intermediate" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+iAct+'">Intermediate</button>' +
        '<button '+aDis+' level="advanced" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+aAct+'">Advanced</button>' +
        '<button '+sDis+' level="superior" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+sAct+'">Superior</button>' +
        '<br></div>' +
        '<label style="margin-top:10px;" id="'+pointers+'cbidesc">'+desc+'</label>' +
        '<div style="text-align: right;" class="divQuestion">' +
        '<textarea level="basic" rows="6" style="resize: none;'+bTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField" placeholder="Enter Question Here.." required="" ></textarea>' +
        '<textarea level="intermediate" rows="6" style="resize: none;'+iTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField" placeholder="Enter Question Here.." required="" ></textarea>' +
        '<textarea level="advanced" rows="6" style="resize: none;'+aTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField" placeholder="Enter Question Here.." required="" ></textarea>' +
        '<textarea level="superior" rows="6" style="resize: none;'+sTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField" placeholder="Enter Question Here.." required="" ></textarea>' +
        '</div>';
        divQuestion.append(questions);
    }

    $("#btnAdd").prop("disabled",false);
    $("#btnEdit").prop("disabled",true);
    $("#btnSave").prop("disabled",true);
    $("#btnDelete").prop("disabled",true);
}

function plotQuestionFields(cbi,title){
    cbi = JSON.parse(cbi);
    title = JSON.parse(title);

    var arrQ = [];
    for(var keys in cbi){
        arrQ.push({
            title: cbi[keys].title,
            level: cbi[keys].level,
            type: cbi[keys].competencytype,
            desc: cbi[keys].criteriadesc,
            weight: cbi[keys].weight,
            criteriatype: cbi[keys].criteriatype,
            q: cbi[keys].q
        });
    }

    window.arrQguide = arrQ;
    var divQuestion = $("#divQuestions");
    divQuestion.empty();

    for(var keys=0;keys<arrQ.length;keys++){
        var questions = "";

        var pointers = 'div'+(arrQ[keys].title).replace(/\s+/g, "");

        var bDis="disabled",iDis="disabled",aDis="disabled",sDis="disabled",desc="";
        var bAct="",iAct="",aAct="",sAct="";
        var bq="",iq="",aq="",sq="";
        var bTex="display:none",iTex="display:none",aTex="display:none",sTex="display:none";
        if(arrQ[keys].level == "basic"){
            bDis = "";
            bAct = "active";
            desc = arrQ[keys].desc;
            bTex = "";
            bq = arrQ[keys].q;
        } else if(arrQ[keys].level == "intermediate"){
            iDis = "";
            iAct = "active";
            desc = arrQ[keys].desc;
            iTex = "";
            iq = arrQ[keys].q;
        } else if(arrQ[keys].level == "advanced"){
            aDis = "";
            aAct = "active";
            desc = arrQ[keys].desc;
            aTex = "";
            aq = arrQ[keys].q;
        } else if(arrQ[keys].level == "superior"){
            sDis = "";
            sAct = "active";
            desc = arrQ[keys].desc;
            sTex = "";
            sq = arrQ[keys].q;
        } else {
            desc = "";
        }

        questions = '<div class="divCriteriaQuestions" id="'+pointers+'" style="display: none"><div class="btn-group competencyLevel">' +
        '<button '+bDis+' level="basic" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+bAct+'">Basic</button>' +
        '<button '+iDis+' level="intermediate" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+iAct+'">Intermediate</button>' +
        '<button '+aDis+' level="advanced" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+aAct+'">Advanced</button>' +
        '<button '+sDis+' level="superior" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+sAct+'">Superior</button>' +
        '<br></div>' +
        '<label style="margin-top:10px;" id="'+pointers+'cbidesc">'+desc+'</label>' +
        '<div style="text-align: right;" class="divQuestion">' +
        '<textarea level="basic" rows="6" style="resize: none;'+bTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField disabledQuestionField" placeholder="Enter Question Here.." required="" disabled>'+bq+'</textarea>' +
        '<textarea level="intermediate" rows="6" style="resize: none;'+iTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField disabledQuestionField" placeholder="Enter Question Here.." required="" disabled>'+iq+'</textarea>' +
        '<textarea level="advanced" rows="6" style="resize: none;'+aTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField disabledQuestionField" placeholder="Enter Question Here.." required="" disabled>'+aq+'</textarea>' +
        '<textarea level="superior" rows="6" style="resize: none;'+sTex+'" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField questionField disabledQuestionField" placeholder="Enter Question Here.." required="" disabled>'+sq+'</textarea>' +
        '</div>';
        divQuestion.append(questions);
    }
    $("#btnAdd").prop("disabled",true);
    $("#btnEdit").prop("disabled",false);
    $("#btnSave").prop("disabled",true);
    $("#btnDelete").prop("disabled",false);
}

$(document).on('click','.criteriaTitle',function(){
    var type = $(this).attr("criteria-type");
    var criteria = $(this).attr("criteria");
    $(".divCriteriaQuestions").hide();
    var id = "div"+criteria.replace(/\s+/g, "");
    $("#"+id).show();

    $("#competencyTitle").text(criteria);

    $("#competencyTitle").show();
    $("#divActionBtns").show();
});

function getCompetencyDesc(level,title){
    console.log(level);
    console.log(title);
}

$("#btnAdd").click(function(){
    submitData("create");
});

$("#btnEdit").click(function(){
    $("#loadingmodal").modal("show");
    console.log($("#requestNumber option:selected").val());
    $.ajax({
        url: "<?php echo base_url();?>examinationmanagement/inquireedit",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $(".disabledQuestionField").each(function(){
                    $(this).prop("disabled",false);
                }) ;
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnSave").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");

            console.log(e);
        }
    });
});


$("#btnSave").click(function(){
    submitData("edit");
});

function submitData(type){
    var isValid = true;
    var arrQuestions = [];
    $(".questionField").each(function(){
        for(var x=0;x<(window.arrQguide).length;x++){
            if($(this).attr("criteria") == window.arrQguide[x].title && $(this).attr("level") == window.arrQguide[x].level){
                if($(this).val() == "" || $(this).val() == null){
                    isValid = false;
                } else {
                    isValid = true;
                }
            }
        }
    });

    if(isValid){
        $(".questionField").each(function(){
            for(var x=0;x<(window.arrQguide).length;x++){
                if($(this).attr("criteria") == window.arrQguide[x].title && $(this).attr("level") == window.arrQguide[x].level){
                    arrQuestions.push({
                        title: $(this).attr("criteria"),
                        level: $(this).attr("level"),
                        competencytype: "CORE",
                        criteriatype: $(this).attr("criteria-type"),
                        criteriadesc: $(this).attr("criteria-desc"),
                        weight: $(this).attr("weight-alloc"),
                        q: $(this).val()
                    });
                }
            }
        });

        $("#loadingmodal").modal("show");
        var url = "";
        if(type == "create"){
            url = "<?php echo base_url();?>examinationmanagement/newexam";
        } else {
            url = "<?php echo base_url();?>examinationmanagement/updateexam";
        }
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "EXAM":arrQuestions,
                "GROUPTBL":window.grptable,
                "GROUPPOSITION":$("#lblgroupposition").text()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    if(type == "create"){
                        messageDialogModal("Server Message","Successfully Created Examination");
                    } else {
                        messageDialogModal("Server Message","Successfully Updated Examination");
                    }

                    window.grptable = [];
                    window.weightTotal = 0;
                    $("#tbltotal").text(window.weightTotal);

                    clearField();
                    $("#divRequestDetails").hide();
                    $("#divActionBtns").hide();

                    $("#divGroupPositionData").empty();
                    $("#divQuestions").empty();
                    $("#lblposition").text("");
                    $("#lblgroupposition").text("");
                    $("#grouppositiondescription").text("");
                    $("#competencyTitle").text("");
                } else if(result.Code == "99"){
                    messageDialogModal("Server  Message",result.Message);
                }else {
                    if(type == "create"){
                        messageDialogModal("Server Message","Failed Creating Examination");
                    } else {
                        messageDialogModal("Server Message","Failed Updating Examination");
                    }
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    } else {
        messageDialogModal("Required","Please provide question for all the required fields");
    }
}

$("#btnDelete").click(function(){
    $("#loadingmodal").modal("show");
    console.log($("#requestNumber option:selected").val());
    $.ajax({
        url: "<?php echo base_url();?>examinationmanagement/inquiredelete",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $("#delReqNum").text($("#requestNumber option:selected").val());
                $("#modaldelete").modal("show");
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");

            console.log(e);
        }
    });
});

$("#btnProceedDelete").click(function(){
    $("#modaldelete").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>examinationmanagement/deleteexam",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#requestNumber option:selected").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                window.grptable = [];
                window.weightTotal = 0;
                $("#tbltotal").text(window.weightTotal);

                clearField();
                $("#divRequestDetails").hide();
                $("#divActionBtns").hide();

                $("#divGroupPositionData").empty();
                $("#divQuestions").empty();
                $("#lblposition").text("");
                $("#lblgroupposition").text("");
                $("#grouppositiondescription").text("");
                $("#competencyTitle").text("");

                messageDialogModal("Server Message",result.Message);
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");

            console.log(e);
        }
    });
});


</script>