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
        <div class="col-lg-12">
            <div class="form-horizontal">
                <fieldset>
                    <legend>Position Profile</legend>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="positionTitle" class="col-lg-2 control-label">Position Title</label>
                                <div class="col-lg-10">
                                    <input type="text" style="text-transform: uppercase" class="form-control clearField" id="positiontitle" placeholder="Enter Position Title..">
                                    <select class="form-control clearField" id="positiondropdown" style="display: none"></select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Position Description</label>
                                <div class="col-lg-10">
                                    <textarea rows="3" style="resize: none" id="positiondescription" class="form-control clearField" placeholder="Enter Description Here.." required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group Position</label>
                                <div class="col-lg-10">
                                    <select class="form-control clearField" id="groupposition"></select>
                                    <p id="groupdesc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="form-group col-md-6">
                                <label class="control-label">Basic Position Details</label>
                                <div class="well" style="min-height: 280px !important;height: auto">
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Salary Grade</label>
                                        <select class="form-control clearField" id="salarygrade"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Salary Equivalent</label>
                                        <input type="text" class="form-control clearField " id="salaryequivalent" placeholder="Equivalent" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Experience</label>
                                        <div class="input-group">
                                            <input class="form-control clearField analyticsField" id="experience" type="number" placeholder="Work Experience..">
                                            <span class="input-group-addon">Year(s) of Experience</span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Training</label>
                                        <div class="input-group">
                                            <input class="form-control clearField analyticsField" id="training" type="number" placeholder="Training..">
                                            <span class="input-group-addon">Hour(s) of Training</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Civil Service Eligibility&nbsp;<a href="http://www.officialgazette.gov.ph/services/civil-service-eligibility/eligibilities-granted-under-special-laws-and-csc-issuances/" target="_blank"><i class="fa fa-lg fa-question-circle" aria-hidden="true"></i></a></label>
                                        <select class="form-control clearField analyticsField" id="eligibility">
                                            <option selected disabled>- Select Option -</option>
                                            <option value="Bar or Board Eligibility [RA No. 1080]">Bar or Board Eligibility [RA No. 1080]</option>
                                            <option value="Barangay Health Worker (BHW) Eligibility [RA No. 7883]">Barangay Health Worker (BHW) Eligibility [RA No. 7883]</option>
                                            <option value="Barangay Nutrition Scholar (BNS) Eligibility [PD No. 1569]">Barangay Nutrition Scholar (BNS) Eligibility [PD No. 1569]</option>
                                            <option value="Barangay Official Eligibility (BOE) [RA No. 7160]">Barangay Official Eligibility (BOE) [RA No. 7160]</option>
                                            <option value="Electronic Data Processing Specialist (EDPS) Eligibility [CSC Resolution No. 90-083]">Electronic Data Processing Specialist (EDPS) Eligibility [CSC Resolution No. 90-083]</option>
                                            <option value="Foreign School Honor Graduate Eligibility (FSHGE) [CSC Resolution No. 1302714]">Foreign School Honor Graduate Eligibility (FSHGE) [CSC Resolution No. 1302714]</option>
                                            <option value="Honor Graduate Eligibility (HGE) [PD No. 907]">Honor Graduate Eligibility (HGE) [PD No. 907]</option>
                                            <option value="Sanggunian Member Eligibility (SME) [RA No. 10156]">Sanggunian Member Eligibility (SME) [RA No. 10156]</option>
                                            <option value="Scientific and Technological Specialist (STS) Eligibility [PD No. 997]">Scientific and Technological Specialist (STS) Eligibility [PD No. 997]</option>
                                            <option value="Skill Eligibility [CSC MC No. 11]">Skill Eligibility [CSC MC No. 11]</option>
                                            <option value="Veteran Preference Rating (VPR) Eligibility">Veteran Preference Rating (VPR) Eligibility</option>
                                            <option value="NO">NOT REQUIRED</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="positionTitle" class="control-label">Minimum Educational Background</label>
                                        <select class="form-control clearField" id="mineducation">
                                            <option selected disabled>- Select Option -</option>
                                            <option value="ELEMENTARY">Elementary Graduate</option>
                                            <option value="HIGHSCHOOL">Highschool Graduate</option>
                                            <option value="VOCATIONAL">Vocational Graduate</option>
                                            <option value="COLLEGE">College Graduate</option>
                                            <option value="GRADUATE">Graduate School</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Competency Based Qualification</label>
                                <div class="well" style="min-height: 280px !important;height: auto">
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">Competency Index Profile</label>-->
<!--                                        <select class="form-control clearField" id="dropdowncbi">-->
<!--                                            <option selected disabled>- Select Competency Index Profile -</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
                                    <div class="form-group" id="divCbi">
<!--                                        <p class="cbidesc">-->
<!---->
<!--                                        </p>-->
                                        <div id="divgrouptbl">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label class="control-label">Skills</label>
                                    <div class="well">
                                        <ul id="skillset">

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
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

<div class="modal fade" id="modalQualification" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Competency Based Qualification</legend>
                <input type="hidden" class="clearField" id="comptypeval">
                <label class="control-label" style="font-weight: bold" id="competencytitle"></label>
                <p class="cbidesc">

                </p>
                <div>
                    <div class="form-group">
                        <button class="btn btn-outline-success indicatorType" comptype="CORE"  style="min-width: 100px" id="btnCore">Core</button>
                        <button class="btn btn-outline-success indicatorType" comptype="BEHAVIORAL" style="min-width: 100px" id="btnBehavioral">Behavioral</button>
                    </div>
                    <div class="form-group">
                        <label class="control-label" id="comptypelabel"></label>
                        <ul class="nav nav-pills btnPills">
                            <li><button class="btn btn-outline-info btnIndicators" data-toggle="tab" level="basic">Basic</button></li>
                            <li><button class="btn btn-outline-info btnIndicators" data-toggle="tab" level="intermediate">Intermediate</button></li>
                            <li><button class="btn btn-outline-info btnIndicators" data-toggle="tab" level="advanced">Advanced</button></li>
                            <li><button class="btn btn-outline-info btnIndicators" data-toggle="tab" level="superior">Superior</button></li>
                        </ul>
                    </div>
                    <div class="form-group" id="divCompetencyCont" style="display: none;">
                        <br>
                        <table id="tblcompetencies" class="display responsive compact" cellspacing="0" width="100%" >
                            <thead>
                            <tr>
                                <th>COMPETENCY ITEM</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modalDeletePosition" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Confirmation</legend>
                <input type="hidden" id="deleterowid">
                <div class="form-group">
                    <p>Continue to delete this Position?<br><span style="font-weight: bold" id="deletepositiontitle"></span></p>
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

    $("#panel_positionprofile").addClass("selected_panel");

    window.arrPosition = [];
    window.buttonClicked = "";
    window.coreComp = [];
    window.ispreloaded = false;
    loadSalaryGrade();

    $("#btnAdd").prop("disabled",false);
    $("#btnEdit").prop("disabled",false);
    $("#btnDelete").prop("disabled",false);
    $("#btnSave").prop("disabled",true);
    $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
});

function loadSalaryGrade(){
    $("#loadingmodal").modal("show");
    var select = $("#salarygrade");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/getsalarygrade",
        type: "POST",
        dataType: "json",
        success: function(data){
            if(data.Code == "00"){
                select.append("<option selected disabled>- Select Salary Grade -</option>");
                for(var keys in data.details){
                    select.append("<option rowid='"+data.details[keys].id+"' value='"+data.details[keys].salarygrade+"' equivalent='"+data.details[keys].equivalent+"'>"+data.details[keys].salarygrade+"</option>");
                }
                loadGroupPosition();
            } else {
                select.append("<option selected disabled>- No Salary Grade Available -</option>");
            }
        },
        error: function(e){

            select.append("<option selected disabled>- No Salary Grade Available -</option>");
            console.log(e);
        }
    });
}

function loadGroupPosition(){
    var select = $("#groupposition");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/getgroupposition",
        type: "POST",
        dataType: "json",
        success: function(data){
            if(data.Code == "00"){
                select.append("<option selected disabled>- Select Group Position -</option>");
                for(var keys in data.details){
                    select.append("<option group-code='"+data.details[keys].groupcode+"' rowid='"+data.details[keys].id+"' value='"+data.details[keys].groupname+"' group-desc='"+atob(data.details[keys].groupdescription)+"'>"+data.details[keys].groupname+"</option>");
                }
                loadCompetencies();
            } else {
                select.append("<option selected disabled>- No Group Position Available -</option>");
            }
        },
        error: function(e){
            select.append("<option selected disabled>- No Group Position Available -</option>");
            console.log(e);
        }
    });
}

$("#groupposition").change(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/grouptable",
        type: "POST",
        dataType: "json",
        data: {
            "GROUPCODE":$("#groupposition option:selected").attr("group-code")
        },
        success: function(data){
            console.log(data);
            $("#loadingmodal").modal("hide");
            var div = $("#divgrouptbl");
            div.empty();
            if(data.Code == "00"){
                var json = JSON.parse(data.details[0].criteria);
                console.log(json);
                var arrcompetencies = [];
                for(var keys in json){
                    var temjson = json[keys].titles;
                    for(var i=0;i<temjson.length;i++){
                        arrcompetencies.push(temjson[i]);
                    }
                }
                console.log(arrcompetencies);
                if(arrcompetencies.length <= 0){
                    div.append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>No Competency Table created for the selected Group Position yet</b>.<br>Please coordinate with the System Administrator</p>');
                } else {
                    var chkbox = "fa fa-square-o";
                    div.append('<p>Click each competency title to start adding the corresponding skill required for the position:</p>')
                    for(var x=0;x<arrcompetencies.length;x++){
                        div.append('<i id="id'+arrcompetencies[x].replace(/\s/g, "")+'" class="'+chkbox+'" aria-hidden="true"></i>&nbsp;<a class="competencylink" comp-name="'+arrcompetencies[x]+'">'+arrcompetencies[x]+'</a><br>');
                    }
                }

                if(window.ispreloaded){
                    checkItem();
                }
            } else {
                div.append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>No Competency Table created for the selected Group Position yet</b>.<br>Please coordinate with the System Administrator</p>');
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");

            console.log(e);
        }
    });
    $("#groupdesc").text($("#groupposition option:selected").attr("group-desc"));
});

$(document).on('click','.competencylink',function(){
    $("#competencytitle").text($(this).attr("comp-name"));
    $("#loadingmodal").modal("show");
    if(isCoreCompetency($(this).attr("comp-name"))){
        $("#btnCore").prop("disabled",true);
    } else {
        $("#btnCore").prop("disabled",false);
    }
    $.ajax({
        url: "<?php echo base_url();?>competencyindexmanagement/competencydetails",
        type: "POST",
        dataType: "json",
        data: {
            "COMPETENCY":$(this).attr("comp-name")
        },
        success: function(data){
            $("#loadingmodal").modal("hide");
            if(data.Code == "00"){
                for(var keys in data.details){
                    $(".cbidesc").text(atob(data.details[keys].description));
                    $("#competencytitle").attr("cbid",data.details[keys].id);
                }
                $(".btnPills li").removeClass("active");
                $("#divCompetencyCont").hide();
                $(".btnIndicators").each(function(){
                    $(this).prop("disabled",true);
                });
                $("#modalQualification").modal("show");
            } else {
                messageDialogModal("Server Message",data.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

function isCoreCompetency(title){
    var ret = false;
    $(".skillsetitem").each(function(){
       if($(this).attr("competency-title") == title && $(this).attr("competency-type") == "CORE"){
           ret = true;
       }
    });

    return ret;
}

function loadCompetencies(){
    var select = $("#dropdowncbi");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>competencyindexmanagement/competencies",
        type: "POST",
        dataType: "json",
        data: {},
        success: function(data){
            $("#loadingmodal").modal("hide");
            if(data.Code == "00"){
                select.append("<option selected disabled>- Select Competency Index -</option>");
                for(var keys in data.details){
                    select.append("<option cbid='"+data.details[keys].id+"' competency-description='"+atob(data.details[keys].description)+"' value='"+data.details[keys].title+"'>"+data.details[keys].title+"</option>");
                }
            } else {
                select.append("<option selected disabled>- No Competency Index Available -</option>");
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append("<option selected disabled>- No Competency Index Available -</option>");
            console.log(e);
        }
    });
}
$(".btnIndicators").click(function(){
    var level = $(this).attr("level");
    var type = $("#comptypeval").val();
    var compid = $("#competencytitle").attr("cbid");
    console.log(level);
    console.log(type);
    console.log(compid);
    loadCompetencyItems(level,type,compid);
});

function loadCompetencyItems(level,type,compid){
    $("#loadingmodal").modal("show");
    $("#tblcompetencies").dataTable({
        "destroy":true,
        "responsive" : true,
        "sDOM": 'frt',
        "oLanguage": {
            "sSearch": "Search:",
            "sEmptyTable": "No Competency Item(s) Available"
        },
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "width": "5%", "targets": 1 }
        ],
        "scrollY": "180px",
        "scrollCollapse": true,
        "paging": false,
        "ajax":{
            "url":"<?php echo base_url();?>positionmanagement/getcompetencyitems",
            "data" : {
                "LEVEL":level,
                "TYPE":type,
                "COMPID":compid
            },
            "type" : "POST",
            "dataType" : "json",
            dataSrc: function(json){
                $("#loadingmodal").modal("hide");
                $('#divCompetencyCont').show();
                if(json.Code=="00"){
                    return json.details;
                }else{
                    return 0;
                }
            },
            error: function(e){
                console.log(e);
            }
        },
        "columns":[
            {"data":function(data){
                return atob(data.description);
            }},
            {"data":function(data){
                return "<a class='btn btn-success btn-sm' href='javascript:actionAddItem("+JSON.stringify(data)+");'>ADD</a>";
            }
            }]
    });
}

function actionAddItem(data){
    console.log(data);
    (window.coreComp).push({
        title: data.competencytitle,
        level: data.level,
        id:data.id,
        type: data.type
    });
    var ul = $("#skillset");
    var li = '<li class="skillItem" id="'+data.id+'"><span competency-type="'+data.type+'" competency-level="'+data.level+'" competency-title="'+data.competencytitle+'" skillsetid="'+data.id+'" class="skillsetitem">'+atob(data.description)+'</span>&nbsp;<a class="removeItem" competency-title="'+data.competencytitle+'" id="'+data.id+'" data-toggle="tooltip" title="Remove Item"><i style="color:red" class="fa fa-times-circle"></i> Remove</a></li>';

    for(var i=0;i<(window.coreComp).length;i++){
        if(data.competencytitle == window.coreComp[i].title){
            $(".btnIndicators").each(function(){
                if($(this).attr("level") == window.coreComp[i].level){
                    $(this).prop("disabled",false);
                } else {
                    $(this).prop("disabled",true);
                }
            });
        }
    }
    if(validateSkillSet(data.id)){
        ul.append(li);
        if(data.type == "CORE"){
            $("#modalQualification").modal("hide");
        }
        checkItem();
    } else {
        messageDialogModal("Duplicate Item","Competency Index Item Already Exists in the Skills Qualification");
    }


}

function validateSkillSet(id){
    var ul = $(".skillItem");
    var r = true;
    $(ul).each(function() {
        if ($(this).attr("id") == id) {
            r = false;
        }
    });
    return r;
}

function checkItem(){
    var comp = window.coreComp;
    console.log("comp");
    console.log(comp);
    var arrchecklist = [];
    $(".competencylink").each(function(){
        var checklistid = $(this).attr("comp-name");
        $("#id"+checklistid.replace(/\s/g, "")).removeClass().addClass("fa fa-square-o");
        for(var keys in comp){
            if($(this).attr("comp-name") == comp[keys].title && comp[keys].type == "CORE"){
                var checklistid = $(this).attr("comp-name");
                console.log("ses");
                $("#id"+checklistid.replace(/\s/g, "")).removeClass().addClass("fa fa-check-square-o");
                arrchecklist.push($(this).attr("comp-name"));
            }
        }
    });
    var uniq = [ ...new Set(arrchecklist)];
    console.log("uniq");
    console.log(uniq);
    window.arrchecklist = uniq;
}

$(document).on("click",".removeItem",function() {
    var id = $(this).attr("id");
    var title = $(this).attr("competency-title");
    var ul = $(".skillItem");
    var r = false;
    $(ul).each(function() {
        if ($(this).attr("id") == id) {
            $(this).remove();
            r = true;
        }
    });
    window.coreComp = (window.coreComp).filter(arr => arr.id != $(this).attr("id"));
    checkItem();
});

$("#salarygrade").change(function(){
    $("#salaryequivalent").val($("#salarygrade option:selected").attr("equivalent"));
});


$(".indicatorType").click(function(){
    var type = $(this).attr("comptype");
    var title = $("#competencytitle").text();
    $(".btnIndicators").each(function(){
        $(this).prop("disabled",false);
    });
    if(type == "CORE"){
        $("#comptypelabel").text("CORE INDICATOR");
        $("#comptypeval").val("CORE");
        for(var i=0;i<(window.coreComp).length;i++){
            if(title == window.coreComp[i].title){
                $(".btnIndicators").each(function(){
                   if($(this).attr("level") == window.coreComp[i].level){
                       $(this).prop("disabled",false);
                   } else {
                       $(this).prop("disabled",true);
                   }
                });
            }
        }
    } else {
        $("#comptypelabel").text("BEHAVIORAL INDICATOR");
        $("#comptypeval").val("BEHAVIORAL");
    }
    $(".btnPills li").removeClass("active");
    $("#divCompetencyCont").hide();
    $("#modalQualification").modal("show");
});


$("#btnAdd").click(function(){
    if(!validate()){
        return;
    } else {
        $("#loadingmodal").modal("show");
        var skillArr = [];
        var ul = $(".skillsetitem");
        $(ul).each(function() {
            skillArr.push({
                skillid: $(this).attr("skillsetid"),
                title: $(this).attr("competency-title"),
                level: $(this).attr("competency-level"),
                type: $(this).attr("competency-type"),
                desc: $(this).text()
            });
        });

        var positioncode = "";
        var posname = $("#positiontitle").val();
        var sp = posname.split(' ');
        for(var i=0;i<sp.length;i++){
            var c = sp[i].slice(0,4);
            positioncode+=c;
        }
        $.ajax({
            url: "<?php echo base_url();?>positionmanagement/addposition",
            type: "POST",
            dataType: "json",
            data: {
                "SKILLS":skillArr,
                "POSITIONTITLE": $("#positiontitle").val(),
                "DESCRIPTION": $("#positiondescription").val(),
                "GROUPPOSITION": $("#groupposition option:selected").val(),
                "GROUPCODE": $("#groupposition option:selected").attr("group-code"),
                "GROUPDESCRIPTION": $("#groupposition option:selected").attr("group-desc"),
                "SALARYGRADE": $("#salarygrade option:selected").val(),
                "SALARYEQUIVALENT": $("#salaryequivalent").val(),
                "EDUCATION": $("#mineducation option:selected").val(),
                "POSITIONCODE":positioncode,
                "EXPERIENCE":$("#experience").val(),
                "TRAINING":$("#training").val(),
                "ELIGIBILITY":$("#eligibility").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    $("#skillset").empty();
                    $("#groupdesc").text("");
                    $("#cbidesc").text("");
                    messageDialogModal("Server Message",result.Message);
                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
                    $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
                    window.coreComp = [];
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

function validate(){
    if($("#positiontitle").val() == "" || $("#positiontitle").val() == null){
        messageDialogModal("Required","Please Enter Position Title");
        return false;
    }
    if($("#positiondescription").val() == "" || $("#positiondescription").val() == null){
        messageDialogModal("Required","Please Enter Position Description");
        return false;
    }
    if($("#groupposition option:selected").val() == "- Select Group Position -" || $("#groupposition option:selected").val() == null){
        messageDialogModal("Required","Please Select Group Position");
        return false;
    }
    if($("#salarygrade option:selected").val() == "- Select Salary Grade -" || $("#salarygrade option:selected").val() == null){
        messageDialogModal("Required","Please Select Salary Grade");
        return false;
    }

    if($("#experience").val() == "" || $("#experience").val() == null){
        messageDialogModal("Required","Please Enter Work Experience");
        return false;
    }

    if($("#training").val() == "" || $("#training").val() == null){
        messageDialogModal("Required","Please Enter Training");
        return false;
    }

    if($("#eligibility").val() == "" || $("#eligibility").val() == null){
        messageDialogModal("Required","Please Enter Civil Service Eligibility");
        return false;
    }

    if($("#mineducation").val() == "" || $("#mineducation").val() == null){
        messageDialogModal("Required","Please Enter Minimum Educational Background");
        return false;
    }

    if(!validateskills()){
        messageDialogModal("Required","Please Add Required Skills");
        return false;
    }

    if(!validateChecklist()){
        messageDialogModal("Required","Please Add Required Skills from the Competency Table of the chosen Position Group");
        return false;
    }
    return true;
}

function validateEdit(){

    if($("#positiondescription").val() == "" || $("#positiondescription").val() == null){
        messageDialogModal("Required","Please Enter Position Description");
        return false;
    }
    if($("#groupposition option:selected").val() == "- Select Group Position -" || $("#groupposition option:selected").val() == null){
        messageDialogModal("Required","Please Select Group Position");
        return false;
    }
    if($("#salarygrade option:selected").val() == "- Select Salary Grade -" || $("#salarygrade option:selected").val() == null){
        messageDialogModal("Required","Please Select Salary Grade");
        return false;
    }
    if($("#experience").val() == "" || $("#experience").val() == null){
        messageDialogModal("Required","Please Enter Work Experience");
        return false;
    }

    if($("#training").val() == "" || $("#training").val() == null){
        messageDialogModal("Required","Please Enter Training");
        return false;
    }

    if($("#eligibility").val() == "" || $("#eligibility").val() == null){
        messageDialogModal("Required","Please Enter Civil Service Eligibility");
        return false;
    }
    if($("#mineducation").val() == "" || $("#mineducation").val() == null){
        messageDialogModal("Required","Please Enter Minimum Educational Background");
        return false;
    }

    if(!validateskills()){
        messageDialogModal("Required","Please Add Required Skills");
        return false;
    }
    return true;
}

function validateskills(){
    var r = true;
    if($('ul#skillset li').length <= 0){
        r = false
    }

    return r;
}


//for edit position

$("#btnEdit").click(function(){
    clearField();
    $("#skillset").empty();
    $("#groupdesc").text("");
    $("#cbidesc").text("");
    $("#positiondropdown").hide();
    $("#positiondropdown").empty();
    $("#positiontitle").show();
    $("#loadingmodal").modal("show");
    $("#divgrouptbl").empty();
    $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
    var select = $("#positiondropdown");
    select.empty();
    select.show();
    $("#positiontitle").hide();
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/getpositions",
        type: "POST",
        dataType: "json",
        success: function(data){
            if(data.Code == "00"){
                window.arrPosition = data.details;
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- Select Position Title -</option>");
                for(var keys in data.details){
                    select.append("<option positioncode-code='"+data.details[keys].positioncode+"' rowid='"+data.details[keys].id+"' value='"+data.details[keys].name+"'>"+data.details[keys].name+"</option>");
                }
                messageDialogModal("Server Message","Select Position Title to Edit");
                window.buttonClicked = "EDIT";
                $("#btnAdd").prop("disabled",false);
                $("#btnEdit").prop("disabled",true);
                $("#btnDelete").prop("disabled",false);
                $("#btnSave").prop("disabled",false);
            } else {
                select.hide();
                $("#positiontitle").show();
                messageDialogModal("Server Message","No Position Title Available to Edit");

            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.hide();
            $("#positiontitle").show();
            console.log(e);
        }
    });
});

$("#positiondropdown").change(function(){
    window.coreComp = [];
    window.ispreloaded = true;
    if(window.buttonClicked == "EDIT"){
        displayData();
    } else if(window.buttonClicked == "DELETE") {
        displayData();
        $("#deletepositiontitle").text($("#positiondropdown option:selected").val());
        $("#deleterowid").val($("#positiondropdown option:selected").attr("rowid"));
        $("#modalDeletePosition").modal("show");
    } else {

    }
});

function displayData(){
    var rowid =  $("#positiondropdown option:selected").attr("rowid");
    var arr = window.arrPosition;
    var ul = $("#skillset");
    ul.empty();
    for(var keys in arr){
        if(arr[keys].id == rowid){
            $('#groupposition').val(arr[keys].groupposition).change();
            $("#positiondescription").val(atob(arr[keys].description));
            $("#groupdesc").text(atob(arr[keys].groupdesc));
            $("#salarygrade").val(arr[keys].salarygrade);
            $("#salaryequivalent").val(arr[keys].salaryequivalent);
            $("#mineducation").val(arr[keys].mineducbackground);
            $("#experience").val(arr[keys].experience);
            $("#training").val(arr[keys].training);
            $("#eligibility").val(arr[keys].eligibility);

            var skills = JSON.parse(atob(arr[keys].cbiskills));
            for(var i=0;i<skills.length;i++){

                var li = '<li class="skillItem" id="'+skills[i].skillid+'"><span competency-type="'+skills[i].type+'" competency-title="'+skills[i].title+'" competency-level="'+skills[i].level+'" skillsetid="'+skills[i].skillid+'" class="skillsetitem">'+skills[i].desc+'</span>&nbsp;<a class="removeItem" id="'+skills[i].skillid+'" data-toggle="tooltip" title="Remove Item"><i style="color:red" class="fa fa-times-circle"></i> Remove</a></li>';
                ul.append(li);

                (window.coreComp).push({
                    title: skills[i].title,
                    level: skills[i].level,
                    id:skills[i].skillid,
                    type: skills[i].type
                });
            }
        }
    }
}

function changeGroupPosition(grp){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/grouptable",
        type: "POST",
        dataType: "json",
        data: {
            "GROUPCODE":$("#groupposition option:selected").attr("group-code")
        },
        success: function(data){
            console.log(data);
            $("#loadingmodal").modal("hide");
            var div = $("#divgrouptbl");
            div.empty();
            if(data.Code == "00"){
                var json = JSON.parse(data.details[0].criteria);
                console.log(json);
                var arrcompetencies = [];
                for(var keys in json){
                    var temjson = json[keys].titles;
                    for(var i=0;i<temjson.length;i++){
                        arrcompetencies.push(temjson[i]);
                    }
                }
                console.log(arrcompetencies);
                if(arrcompetencies.length <= 0){
                    div.append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>No Competency Table created for the selected Group Position yet</b>.<br>Please coordinate with the System Administrator</p>');
                } else {
                    div.append('<p>Click each competency title to start adding the corresponding skill required for the position:</p>');
                    for(var x=0;x<arrcompetencies.length;x++){
                        div.append('<i id="id'+arrcompetencies[x].replace(/\s/g, "")+'" class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;<a class="competencylink" comp-name="'+arrcompetencies[x]+'">'+arrcompetencies[x]+'</a><br>');
                    }

                }
            } else {
                div.append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>No Competency Table created for the selected Group Position yet</b>.<br>Please coordinate with the System Administrator</p>');
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");

            console.log(e);
        }
    });
}


$("#btnSave").click(function(){
    if(!validateEdit()){
        return;
    } else {
        $("#loadingmodal").modal("show");
        var skillArr = [];
        var ul = $(".skillsetitem");
        $(ul).each(function() {
            skillArr.push({
                skillid: $(this).attr("skillsetid"),
                title: $(this).attr("competency-title"),
                level: $(this).attr("competency-level"),
                type: $(this).attr("competency-type"),
                desc: $(this).text()
            });
        });

        var positioncode = "";
        var posname = $("#positiontitle").val();
        var sp = posname.split(' ');
        for(var i=0;i<sp.length;i++){
            var c = sp[i].slice(0,4);
            positioncode+=c;
        }
        $.ajax({
            url: "<?php echo base_url();?>positionmanagement/updateposition",
            type: "POST",
            dataType: "json",
            data: {
                "SKILLS":skillArr,
                "ROWID": $("#positiondropdown option:selected").attr("rowid"),
                "POSITIONCODE": $("#positiondropdown option:selected").attr("positioncode-code"),
                "DESCRIPTION": $("#positiondescription").val(),
                "GROUPPOSITION": $("#groupposition option:selected").val(),
                "GROUPCODE": $("#groupposition option:selected").attr("group-code"),
                "GROUPDESCRIPTION": $("#groupposition option:selected").attr("group-desc"),
                "SALARYGRADE": $("#salarygrade option:selected").val(),
                "SALARYEQUIVALENT": $("#salaryequivalent").val(),
                "EDUCATION": $("#mineducation").val(),
                "EXPERIENCE":$("#experience").val(),
                "TRAINING":$("#training").val(),
                "ELIGIBILITY":$("#eligibility").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    clearField();
                    $("#skillset").empty();
                    $("#groupdesc").text("");
                    $("#cbidesc").text("");
                    $("#positiondropdown").hide();
                    $("#positiondropdown").empty();
                    $("#positiontitle").show();
                    messageDialogModal("Server Message",result.Message);
                    $("#divgrouptbl").empty();
                    $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
                    window.buttonClicked = "";
                    window.arrPosition = [];
                    window.coreComp = [];
                    $("#btnAdd").prop("disabled",false);
                    $("#btnEdit").prop("disabled",false);
                    $("#btnDelete").prop("disabled",false);
                    $("#btnSave").prop("disabled",true);
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

$("#btnDelete").click(function(){
    clearField();
    $("#skillset").empty();
    $("#groupdesc").text("");
    $("#cbidesc").text("");
    $("#positiondropdown").hide();
    $("#positiondropdown").empty();
    $("#positiontitle").show();
    $("#loadingmodal").modal("show");
    var select = $("#positiondropdown");
    select.empty();
    select.show();
    $("#positiontitle").hide();
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/getpositions",
        type: "POST",
        dataType: "json",
        success: function(data){
            if(data.Code == "00"){
                window.arrPosition = data.details;
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- Select Position Title -</option>");
                for(var keys in data.details){
                    select.append("<option positioncode-code='"+data.details[keys].positioncode+"' rowid='"+data.details[keys].id+"' value='"+data.details[keys].name+"'>"+data.details[keys].name+"</option>");
                }
                messageDialogModal("Server Message","Select Position Title to Delete");
                $("#divgrouptbl").empty();
                $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
                window.buttonClicked = "DELETE";
                $("#btnAdd").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnDelete").prop("disabled",false);
                $("#btnSave").prop("disabled",true);
            } else {
                select.hide();
                $("#positiontitle").show();
                messageDialogModal("Server Message","No Position Title Available to Delete");

            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.hide();
            $("#positiontitle").show();
            console.log(e);
        }
    });
});

$("#btnProceedDelete").click(function(){
    $("#loadingmodal").modal("show");
    $("#modalDeletePosition").modal("hide");
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/deleteposition",
        type: "POST",
        dataType: "json",
        data: {
            "ROWID":$("#deleterowid").val()
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                clearField();
                $("#skillset").empty();
                $("#groupdesc").text("");
                $("#cbidesc").text("");
                $("#positiondropdown").hide();
                $("#positiondropdown").empty();
                $("#positiontitle").show();
                $("#divgrouptbl").empty();
                $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
                messageDialogModal("Server Message",result.Message);
                window.buttonClicked = "";
                window.arrPosition = [];
                window.coreComp = [];
                $("#btnAdd").prop("disabled",false);
                $("#btnEdit").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);
                $("#btnSave").prop("disabled",true);
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

function cancelDelete(){
    window.ispreloaded = false;
    $('#positiondropdown').prop('selectedIndex',0);
    clearField();
    $("#skillset").empty();
    $("#groupdesc").text("");
    $("#cbidesc").text("");
    $("#divgrouptbl").empty();
    $("#divgrouptbl").append('<br><br><br><br><p align="center"><i class="fa fa-table fa-2x" aria-hidden="true"></i><br><b>Select Group Position to display list of required Competencies</b></p>');
    window.buttonClicked = "DELETE";
    $("#btnAdd").prop("disabled",false);
    $("#btnEdit").prop("disabled",false);
    $("#btnDelete").prop("disabled",false);
    $("#btnSave").prop("disabled",true);
}

function validateChecklist(){
    var checkarray = window.arrchecklist;
    var cnt = 0;
    $(".competencylink").each(function(){
        cnt++;
    });
    if(checkarray.length != cnt){
        return false;
    } else {
        return true;
    }
}

</script>