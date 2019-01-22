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
                    <legend>Assessment Check</legend>
                    <div class="row">
                        <div class="col-lg-6">
                           <div class="row">
                               <div class="form-group">
                                   <label for="requestNumber" class="col-lg-4 control-label">Request Number</label>
                                   <div class="col-lg-8">
                                       <select class="form-control clearField" id="requestNumber">
                                           <option selected disabled>- Select Request Number -</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="requestNumber" class="col-lg-4 control-label">Applicant Code</label>
                                   <div class="col-lg-8">
                                       <select class="form-control clearField" id="applicantCode">
                                           <option selected disabled>- No Applicant Code(s) Available -</option>
                                       </select>
                                   </div>
                               </div>
                           </div>
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
                            <div class="col-md-12" style="margin-bottom: 20px;" align="left">
                                <b id="competencyTitle"></b>
                            </div>
                            <div class="col-lg-12" id="divQuestions">

                            </div>
                            <hr>
                            <div class="col-md-12" id="actionBtns" style="display: none" align="right">
                                <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                                <button class="btn btn-default" id="btnCancel" onclick="location.reload();">CANCEL</button>
                            </div>
                        </div>
                    </div>


                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modalconfirmsubmit" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Confirm Submission</h4>
                <hr>
                <span>Please ensure that the ratings you provided on each answer are your final ratings. Further changes will not be possible once the ratings are submitted. Proceed?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-danger" id="btnProceedSubmit" value="PROCEED">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalsummary" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Successful Assessment Summary</h4>
                <hr>
                <p>
                    <span>Applicant Code: </span><b id="lblapplicantcode"></b><br>
                    <span>Applicant Name: </span><b id="lblapplicantname"></b><br>
                    Below is the summary of the ratings you gave to the applicant:
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive" id="tblsummarycont">
                            <table id="tblsummary" class="display compact responsive" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th>COMPETENCIES</th>
                                    <th>REQUIRED PROFICIENCY LEVEL</th>
                                    <th>APPLICANT'S RATING</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-secondary" onclick="dismissSuccessModal();"  value="Close">
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

        $("#panel_assessmentcheck").addClass("selected_panel");
        window.ratings = [];
        window.isUpdate = false;
        loadRequests();
    });

    function loadRequests(){
        if(window.isUpdate == false){
            $("#loadingmodal").modal("show");
        }
        var select = $("#requestNumber");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>examassessmentmanagement/displayrequests",
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
                    if(window.isUpdate == false){
                        messageDialogModal("No Request Available","Either the user is not tagged as evaluator or there are no available position requests to assess at the moment");
                    }
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
        window.ratings = [];
        $("#loadingmodal").modal("show");
        $("#actionBtns").hide();
        $("#competencyTitle").text("");
        var select = $("#applicantCode");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>examassessmentmanagement/displayapplicantcode",
            type: "POST",
            dataType: "json",
            data: {
              "REQUESTNUMBER":$(this).val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){

                    for(var keys in result.details){
                        $("#lblposition").text(result.details[keys].positionname);
                        $("#lblgroupposition").text(result.details[keys].groupposition);
                        $("#grouppositiondescription").text(atob(result.details[keys].groupdesc));
                    }
                    if(result.applicant){
                        select.append('<option selected disabled>- Select Applicant Code -</option>');
                        for(var keys in result.applicant){
                            var name = result.applicant[keys].firstname+ " " + result.applicant[keys].lastname;
                            select.append('<option applicantname="'+name+'" value="'+result.applicant[keys].applicantcode+'">'+result.applicant[keys].applicantcode+'</option>');
                        }
                    } else {
                        select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                        messageDialogModal("No Request Available","There are no applicants who took an examination at the moment");
                    }
                    $("#divRequestDetails").show();
                } else {
                    select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                    messageDialogModal("No Request Available","There are no applicants who took an examination at the moment");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                console.log(e);
            }
        });
    });

    $("#applicantCode").change(function(){
        var applicantcode = $(this).val();
        $("#actionBtns").hide();
        $("#competencyTitle").text("");

        $("#loadingmodal").modal("show");
        window.weightTotal = 0;
        window.grptable = [];
        window.arrtypes = [];
        window.ratings = [];
        var tbody = $("#divGroupPositionData");
        tbody.empty();
        $("#tbltotal").text(window.weightTotal);

        $.ajax({
           url:"<?php echo base_url();?>examassessmentmanagement/displayanswer",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": $("#requestNumber option:selected").val(),
                "APPLICANTCODE":applicantcode
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    var hasGroupdata = true;
                    var crit = "";
                    var cbi = "";
                    for(var keys in result.details){
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
                        $("#tableView").show();
                    }
                } else {
                    messageDialogModal("Server Message",result.Message);
                    $("#tableView").hide();

                }
            },
            error: function(e){
             console.log(e);
            }
        });
    });

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
                q: cbi[keys].q,
                a: cbi[keys].a
            });
        }

        window.arrQguide = arrQ;
        var divQuestion = $("#divQuestions");
        divQuestion.empty();
        var well = '<div class="well" style="font-size: 10px;margin-top: 20px;"><b>' +
            '<p style="font-size: 10px;">5 - Shows Strength - demonstrate 95% - 100% of the behavioral indicators</p>' +
            '<p style="font-size: 10px;">4 - Very Proficient - demonstrate 85% - 94% of the behavioral indicators</p>' +
            '<p style="font-size: 10px;">3 - Proficient - demonstrate 75% - 84% of the behavioral indicators</p>' +
            '<p style="font-size: 10px;">2 - Minimal Development Needed - demonstrate 50% - 74% of the behavioral indicators</p>' +
            '<p style="font-size: 10px;">1 - Much Development Needed - demonstrate less than 50% of the behavioral indicators</p>' +
            '</b>';

        for(var keys=0;keys<arrQ.length;keys++){
            var questions = "";
            var rate = "";
            var pointers = 'div'+(arrQ[keys].title).replace(/\s+/g, "");
            var pointli = ''+(arrQ[keys].title).replace(/\s+/g, "");
            var bDis="disabled",iDis="disabled",aDis="disabled",sDis="disabled",desc="";
            var bAct="",iAct="",aAct="",sAct="";
            if(arrQ[keys].level == "basic"){
                bDis = "";
                bAct = "active";
            } else if(arrQ[keys].level == "intermediate"){
                iDis = "";
                iAct = "active";
            } else if(arrQ[keys].level == "advanced"){
                aDis = "";
                aAct = "active";
            } else if(arrQ[keys].level == "superior"){
                sDis = "";
                sAct = "active";
            } else {
                desc = "";
            }

            questions = '<div class="divCriteriaQuestions" id="'+pointers+'" style="display: none"><div class="btn-group competencyLevel">' +
            '<button '+bDis+' level="basic" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+bAct+'">Basic</button>' +
            '<button '+iDis+' level="intermediate" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+iAct+'">Intermediate</button>' +
            '<button '+aDis+' level="advanced" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+aAct+'">Advanced</button>' +
            '<button '+sDis+' level="superior" criteria-type="'+arrQ[keys].type+'" criteria-desc="'+arrQ[keys].desc+'" criteria="'+arrQ[keys].title+'" class="btn btn-outline-success level '+sAct+'">Superior</button>' +
            '<br></div>' +
            '<br><p style="margin-top:10px;"><b>QUESTION:</b> '+arrQ[keys].q+'</p>' +
            '<div style="text-align: right;" class="divQuestion">' +
            '<textarea level="'+arrQ[keys].level+'" q="'+arrQ[keys].q+'" rows="6" style="resize: none;" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField answerField" required="" disabled>'+arrQ[keys].a+'</textarea>' +
            '</div>';

            rate = '<ul class="pagination pagination-lg">' +
            '<li class="'+pointli+' '+pointli+'1" score="1"><a class="examRate" targetli="'+pointli+'" criteria="'+arrQ[keys].title+'" score="1">1</a></li>' +
            '<li class="'+pointli+' '+pointli+'2" score="2"><a class="examRate" targetli="'+pointli+'" criteria="'+arrQ[keys].title+'" score="2">2</a></li>' +
            '<li class="'+pointli+' '+pointli+'3" score="3"><a class="examRate" targetli="'+pointli+'" criteria="'+arrQ[keys].title+'" score="3">3</a></li>' +
            '<li class="'+pointli+' '+pointli+'4" score="4"><a class="examRate" targetli="'+pointli+'" criteria="'+arrQ[keys].title+'" score="4">4</a></li>' +
            '<li class="'+pointli+' '+pointli+'5" score="5"><a class="examRate" targetli="'+pointli+'" criteria="'+arrQ[keys].title+'" score="5">5</a></li>' +
            '</ul>' +
            '</div>';

            divQuestion.append(questions + well + rate);
        }
    }

    $(document).on('click','.criteriaTitle',function(){
        var type = $(this).attr("criteria-type");
        var criteria = $(this).attr("criteria");
        $(".divCriteriaQuestions").hide();
        var id = "div"+criteria.replace(/\s+/g, "");
        $("#"+id).show();

        $("#competencyTitle").text(criteria);

        $("#competencyTitle").show();
        $("#actionBtns").show();
    });

    $(document).on('click','.examRate',function(){
        var criteria = $(this).attr("criteria");
        var score = $(this).attr("score");
        var li = $(this).attr("targetli");

        window.ratings = (window.ratings).filter(arr => arr.criteria != criteria);

        $("."+li).each(function(){
            $(this).removeClass("active");
        });
        $("."+li+score).addClass("active");

        (window.ratings).push({
           criteria: criteria,
            score: score
        });
    });

    $("#btnSubmit").click(function(){
        var l=0;
        $(".answerField").each(function(){
            l++
        });
        console.log(l);
        console.log((window.ratings).length);
        if((window.ratings).length != l){
            messageDialogModal("Required","Please provide a rating for each answer");
        } else {
            $("#modalconfirmsubmit").modal("show");
        }
    });

    $("#btnProceedSubmit").click(function(){
        var arrRatings = [];
        var r = window.ratings;
        for(var y=0;y<r.length;y++){
            for(var x=0;x<(window.arrQguide).length;x++){
                if(r[y].criteria == window.arrQguide[x].title){
                    arrRatings.push({
                        title: window.arrQguide[x].title,
                        level: window.arrQguide[x].level,
                        competencytype: window.arrQguide[x].type,
                        criteriatype: window.arrQguide[x].criteriatype,
                        criteriadesc: window.arrQguide[x].desc,
                        weight: window.arrQguide[x].weight,
                        q: window.arrQguide[x].q,
                        a: window.arrQguide[x].a,
                        rating: r[y].score
                    });
                }
            }
        }

        console.log(arrRatings);

        $("#modalconfirmsubmit").modal("hide");
        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>examassessmentmanagement/assessment",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "APPLICANTCODE":$("#applicantCode option:selected").val(),
                "ASSESSMENT":arrRatings,
                "GROUPTBL":window.grptable,
                "GROUPPOSITION":$("#lblgroupposition").text()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    generateSummaryTbl(arrRatings);
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

    function generateSummaryTbl(ratings){
        $("#lblapplicantcode").text($("#applicantCode option:selected").val());
        $("#lblapplicantname").text($("#applicantCode option:selected").attr("applicantname"));


        $('#tblsummary').DataTable({
            destroy:true,
            responsive : true,
            data: ratings,
            columns: [
                { data: function(data){
                    return data.title;
                }},
                { data: function(data){
                    return (data.level).toUpperCase();
                }},
                { data: function(data){
                    return data.rating;
                }}
            ]
        });
        $("#modalsummary").modal("show");
    }

    function dismissSuccessModal(){
        $("#modalsummary").modal("hide");

        window.grptable = [];
        window.weightTotal = 0;
        $("#tbltotal").text(window.weightTotal);

        clearField();
        $("#divRequestDetails").hide();
        $("#actionBtns").hide();
        $("#tableView").hide();

        $("#divGroupPositionData").empty();
        $("#divQuestions").empty();
        $("#lblposition").text("");
        $("#lblgroupposition").text("");
        $("#grouppositiondescription").text("");
        $("#competencyTitle").text("");
        $("#applicantCode").empty();
        $("#applicantCode").append('<option selected disabled>- No Applicant Code(s) Available -</option>');
        window.isUpdate = true;
        loadRequests();
    }
</script>