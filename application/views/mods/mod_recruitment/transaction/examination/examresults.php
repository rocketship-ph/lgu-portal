<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    .yellow{
        background: #ffff00;
    }
    .green{
        background: #66ff33;
    }
    table , td, th {
        text-align: center;
        color: #000;
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
            <?php if(($this->session->userdata('userlevel') == "TEMPORARY")):?>
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
            <?php endif;?>
            <?php if(!($this->session->userdata('userlevel') == "TEMPORARY")):?>
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
            <?php endif; ?>

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
                    <legend>Examination Results</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="requestNumber" class="col-lg-4 control-label">Request Number</label>
                                <div class="col-lg-8">
                                    <select class="form-control clearField" id="requestNumber">
                                        <option selected disabled>- Select Request Number </option>
                                    </select>
                                </div>
                                <label style="display: none;padding-top:5px;" id="position" class="col-lg-6 control-label">Administrative Aide 1</label>
                            </div>
                            <div class="form-group">
                                <label for="applicantCode" class="col-lg-4 control-label">Applicant Code</label>
                                <div class="col-lg-8">
                                    <select class="form-control clearField" id="applicantCode">
                                        <option disabled selected>- Select Applicant Code -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="display: none" id="divRequestDetails">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="divExamResults" align="left" style="display: none" id="divPrintBtn">
                                <button class="btn btn-success" id="btnPrintTable"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>
                            </div>
                            <br>
                            <div class="divExamResults" id="divTable">
                                <table id="tblresults" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="3" style="vertical-align: middle">APPLICANT CODE</th>
                                        <th rowspan="3" style="vertical-align: middle">APPLICANT NAME</th>
                                        <th id="thcompetencies">COMPETENCIES</th>
                                        <th rowspan="3" style="vertical-align: middle">TOTAL</th>
                                        <th rowspan="3" style="vertical-align: middle">GRADE</th>
                                        <th rowspan="3" style="vertical-align: middle">70%</th>
                                    </tr>
                                    <tr id="trcomptypes"></tr>
                                    <tr id="trcomptitles"></tr>
                                    </thead>
                                    <tbody id="tbodyresults">

                                    </tbody>
                                </table>
                            </div>
                            <div id="divTable">

                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalexamresults" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Applicant Examination Result</legend>
                <div class="row" style="height: 430px !important;overflow-y: scroll;"  id="applicantresultprint">
                    <div class="col-md-12">
                        <table style="width: auto">
                            <tr>
                                <td rowspan="2">
                                    <img id="imgApplicant" src="<?php echo base_url();?>uploads/profile_pictures/NOIMAGE.jpg" style="border-radius: 70px;height: 70px;width: 70px;border:2px solid #d3d3d3">
                                </td>
                            </tr>
                            <tr align="left">
                                <td width="20px">
                                    <br>
                                </td>
                                <td align="left">
                                    <h4 id="lblapplicantcode" style="margin: 0px !important;text-align: left">Applicant Code</h4>
                                    <h4 id="lblapplicantname" style="margin: 0px !important;text-align: left">Applicant Name</h4>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12" id="divtables">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="btnPrint">Print</button>
                        </div>
                    </div>
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

        $("#panel_examresults").addClass("selected_panel");
        loadRequestNumbers();
        $(".divExamResults").hide();
    });

    function loadRequestNumbers(){
        $("#loadingmodal").modal("show");
        var select = $("#requestNumber");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>examresultsmanagement/displayrequests",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option grptbl="'+result.details[keys].grouptable+'" value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
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
        $("#divPrintBtn").hide();
        $(".divExamResults").hide();
        $("#loadingmodal").modal("show");
        var select = $("#applicantCode");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>examresultsmanagement/displayapplicantcode",
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
                        select.append('<option value="ALL">All Applicants</option>');
                        window.applicantcodes = [];
                        for(var keys in result.applicant){
                            if(result.applicant[keys].applicantcode!=""){
                                window.applicantcodes.push(result.applicant[keys].applicantcode);
                                var name = result.applicant[keys].firstname+ " " + result.applicant[keys].lastname;
                                select.append('<option applicantname="'+name+'" value="'+result.applicant[keys].applicantcode+'">'+result.applicant[keys].applicantcode+'</option>');
                            }
                            
                        }
                    } else {
                        select.append('<option selected disabled>- No Applicant Code(s) Available -</option>');
                    }
                    $("#divRequestDetails").show();
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
    });

    $("#applicantCode").change(function(){
        $("#divPrintBtn").hide();

        $("#loadingmodal").modal("show");
        var applicantcode = $(this).val();
        window.results = [];
        $.ajax({
            url: "<?php echo base_url();?>examresultsmanagement/displayexamresults",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER":$("#requestNumber option:selected").val(),
                "APPLICANTCODE":applicantcode
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    plotData(result.details,result.group);
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

    function plotData(result,grp){
        var thcompetencies = 0;
        var tbody = $("#tbodyresults");
        var trcomptypes = $("#trcomptypes");
        var trcomptitles = $("#trcomptitles");
        var appcodes = [];
        var arrtitles = [];
        tbody.empty();
        trcomptypes.empty();
        trcomptitles.empty();
        var group = JSON.parse(grp[0].grouptbl);
        var th1 = '';
        var tr1 = '';
        for(var keys in group){
            if(!(group[keys].type == "TECHNICALXX")){
                thcompetencies+=group[keys].titles.length;
                th1+='<th colspan="'+group[keys].titles.length+'">'+group[keys].type+'</th>';
                var t = group[keys].titles;
                for(var x=0;x< t.length;x++){
                    tr1+='<td>'+t[x].split(' ').map(function(item){return item[0]}).join('')+'</td>';
                    arrtitles.push(t[x]);
                }
            }
        }
        $("#thcompetencies").attr("colspan",thcompetencies);
        trcomptypes.append(th1);
        trcomptitles.append(tr1);

        for(var keys in result){
            appcodes.push(result[keys].applicantcode);
        }
        var applicantcodes = [ ...new Set(appcodes)];
        for(var keys in result){
            var td = "";
            for(var i=0;i<applicantcodes.length;i++){
                if(result[keys].applicantcode == applicantcodes[i]){
                    td+="<td>"+result[keys].applicantcode+"</td>" +
                    "<td><a applicantcode='"+result[keys].applicantcode+"' href='javascript:actionViewDetails("+JSON.stringify(result[keys])+");'>"+result[keys].applicantname+"</a></td>";
                    var json = JSON.parse('['+result[keys].competencyscores+']');
                    var sortedtitles = mapOrder(json,arrtitles,'title');
                    for(var k in sortedtitles){
                        td+="<td>"+sortedtitles[k].score+"</td>";
                    }
                    td+="<td>"+result[keys].totalscore+"</td>" +
                    "<td>"+result[keys].grade+"</td>" +
                    "<td>"+result[keys].seventy+"</td>";
                    tbody.append('<tr>'+td+'</tr>');
                }
            }
        }
        $(".divExamResults").show();

    }

    function mapOrder (array, order, key) {
        array.sort( function (a, b) {
            var A = a[key], B = b[key];
            if (order.indexOf(A) > order.indexOf(B)) {
                return 1;
            } else {
                return -1;
            }
        });
        return array;
    }
function actionViewDetails(data){
    $("#loadingmodal").modal("show");
    $("#lblapplicantcode").text(data.applicantcode);
    $("#lblapplicantname").text(data.applicantname);

    $.ajax({
        url: "<?php echo base_url();?>examresultsmanagement/displayresultapplicant",
        type: "POST",
        dataType: "json",
        data: {
            "APPLICANTCODE":data.applicantcode
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                var div = $("#divtables");
                var comptypes = generateCompTypes(result.details);
                comptypes.sort();
                div.empty();
                for(var i=0;i<comptypes.length;i++){
                    var tbl = '';
                    var ctr = 0;
                    var thead = '';
                    var tbody = '';
                    var tr = '';
                    for(var keys in result.details){

                        if(result.details[keys].type == comptypes[i]){
                            var td = '';
                            td += '<td style="text-align: left">'+result.details[keys].competency+'</td>';
                            var ev = result.details[keys].scores;
                            var evals = ev.split(',');
                            ctr = evals.length;
                            for(var y=0;y<5;y++){
                                td += '<td><span class="evalscore">'+evals[y]+'</span></td>';
                            }
                            td+= '<td>'+result.details[keys].total+'</td>';
                            tr += '<tr>'+td+'</tr>';
                        }
                        tbody = '<tbody>' +
                        tr +
                        '</tbody>';
                    }
                    var headtr = '';
                    for(var n=0;n<5;n++){
                        headtr+='<td>E'+(n+1)+'</td>';
                    }
                    thead = '<thead>' +
                    '<tr>' +
                    '<td colspan="7">'+comptypes[i]+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Competencies</td>' +
                    headtr +
                    '<td>Total</td>' +
                    '</tr>' +
                    '</thead>';

                    tbl = '<table class="table table-bordered">' +
                    thead +
                    tbody +
                    '</table>';

                    div.append(tbl);
                }
                $(".evalscore").each(function(){
                   if($(this).text() == "undefined"){
                       $(this).text("-");
                   }
                });
                $("#modalexamresults").modal("show");
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

    $("#btnPrintTable").click(function(){
       $("#divTable").print();
    });

    $("#btnPrint").click(function(){
        $("#applicantresultprint").css("overflow","visible");
        $("#applicantresultprint").print();
        $("#applicantresultprint").css("overflow","scroll");

    });

function generateCompTypes(data){
    var comptypes = [];
    for(var i=0;i<data.length;i++){
        comptypes.push(data[i].type);
    }
    comptypes = [ ...new Set(comptypes)];
    return comptypes;
}
</script>