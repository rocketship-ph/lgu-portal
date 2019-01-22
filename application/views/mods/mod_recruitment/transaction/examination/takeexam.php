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
                <div class="panel" align="center" id="panel_takeexam">
                    <a  href="<?php echo base_url();?>examination/takeexam" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/takeexam.svg" height="40px">
                        <br>
                        Take Examination
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
                    <legend>Examination</legend>
                    <div class="col-lg-6">
                        <div style="display: none" id="divRequestDetails">
                            <input type="hidden" id="lblgroupposition">
                            <div class="form-group">
                                <label for="groupposition" class="col-lg-4 control-label">Request Number</label>
                                <div class="col-lg-8">
                                    <b class="control-label"><?php echo $this->session->userdata('requestnumber')?></b>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="groupposition" class="col-lg-4 control-label">Position</label>
                                <div class="col-lg-8">
                                    <b class="control-label" id="lblposition"></b>
                                </div>
                            </div>
                        </div>
                        <hr>
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
                            <button class="btn btn-success" id="btnSubmit">SUBMIT</button>
                            <button class="btn btn-default" id="btnCancel" onclick="location.reload();">CANCEL</button>
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
                <span>Please ensure that the answers you provided on each question are your final answers. Proceeding will submit your answers to the designated evaluator for assessment. Proceed?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-danger" id="btnProceedSubmit" value="PROCEED">
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

        $("#panel_takeexam").addClass("selected_panel");
        window.isUpdate = false;
//        loadEvaluators();
        loadExamination();
    });

    function loadExamination(){
        $("#competencyTitle").hide();
        window.weightTotal = 0;
        window.grptable = [];
        window.arrtypes = [];
        var tbody = $("#divGroupPositionData");
        tbody.empty();
        $("#tbltotal").text(window.weightTotal);

        $("#loadingmodal").modal("show");
        $.ajax({
            url: "<?php echo base_url();?>takeexammanagement/displayexam",
            type: "POST",
            dataType: "json",
            success: function(result){
                console.log("exam displayed");
                console.log(result);
                $("#loadingmodal").modal("hide");
                var hasGroupdata = true;
                var crit = "";
                var cbi = "";
                if(result.Code == "00"){
                    for(var keys in result.details){
                        $("#lblposition").text(result.details[keys].positionname);
                        $("#lblgroupposition").val(result.details[keys].groupposition);

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
                        $("#tableView").show();
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
                } else if(result.Code == "01"){
                    messageDialogModal("Server Message",result.Message);
                } else {
                    messageDialogModal("Server Message","No Examination Data Found");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
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
            questions = '<div class="divCriteriaQuestions" id="'+pointers+'" style="display: none">' +
            '<b>QUESTION:</b><br>' +
            '<label style="margin-top:10px;" id="'+pointers+'cbidesc">'+arrQ[keys].q+'</label>' +
            '<div style="text-align: right;" class="divQuestion">' +
            '<textarea q="'+arrQ[keys].q+'" level="'+arrQ[keys].level+'" rows="6" style="resize: none;" weight-alloc="'+arrQ[keys].weight+'" criteria-type="'+arrQ[keys].criteriatype+'" criteria="'+arrQ[keys].title+'" criteria-desc="'+arrQ[keys].desc+'" class="form-control clearField answerField" placeholder="Enter Answer Here.." required=""></textarea>' +
            '</div>';
            divQuestion.append(questions);
        }
        $("#btnSubmit").prop("disabled",false);
        $("#btnEdit").prop("disabled",true);
        $("#btnSave").prop("disabled",true);
        $("#btnDelete").prop("disabled",true);
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


    $("#btnSubmit").click(function(){
        $("#modalconfirmsubmit").modal("show");
    });

    $("#btnProceedSubmit").click(function(){
        $("#modalconfirmsubmit").modal("hide");
        var isValid = true;
        var arrAnswers = [];
        $(".answerField").each(function(){
            if($(this).val() == "" || $(this).val() == null){
                isValid = false;
            } else {
                isValid = true;
            }
        });

        if(isValid){
            $(".answerField").each(function(){
                for(var x=0;x<(window.arrQguide).length;x++){
                    if($(this).attr("criteria") == window.arrQguide[x].title && $(this).attr("level") == window.arrQguide[x].level){
                        arrAnswers.push({
                            title: $(this).attr("criteria"),
                            level: $(this).attr("level"),
                            competencytype: "CORE",
                            criteriatype: $(this).attr("criteria-type"),
                            criteriadesc: $(this).attr("criteria-desc"),
                            weight: $(this).attr("weight-alloc"),
                            q: $(this).attr("q"),
                            a: $(this).val()
                        });
                    }
                }
            });

            console.log(window.grptable);
            console.log($("#lblgroupposition").val());

            $("#loadingmodal").modal("show");
            $.ajax({
                url: "<?php echo base_url();?>takeexammanagement/insertanswer",
                type: "POST",
                dataType: "json",
                data: {
                    "GROUPTBL":window.grptable,
                    "GROUPPOSITION":$("#lblgroupposition").val(),
                    "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                    "EXAM":arrAnswers
                },
                success: function(result){
                    $("#loadingmodal").modal("hide");
                    if(result.Code == "00"){
                        messageDialogModal("Server Message",result.Message);

                        window.grptable = [];
                        window.weightTotal = 0;
                        $("#tbltotal").text(window.weightTotal);

                        clearField();
                        $("#tableView").hide();
                        $("#divRequestDetails").hide();
                        $("#divActionBtns").hide();

                        $("#divGroupPositionData").empty();
                        $("#divQuestions").empty();
                        $("#lblposition").text("");
                        $("#lblgroupposition").text("");
                        $("#grouppositiondescription").text("");
                        $("#competencyTitle").text("");
                        window.isUpdate = true;
                        loadEvaluators();
                    } else{
                        messageDialogModal("Server  Message",result.Message);
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");

                }
            });
        } else {
            messageDialogModal("Required","Please provide answer for all the questions");
        }
    });
</script>