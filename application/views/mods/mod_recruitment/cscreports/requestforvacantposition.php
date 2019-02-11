<style>
    .panel-menu{
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
                    <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="50px">
                </div>
            </td>
            <td rowspan="2" width="15px">
                &nbsp;
            </td>
            <td colspan="4">
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>CSC Required Reports Menu</h4>
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
                <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>cscreports/requestforvacantposition" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Request for Vacant Position
                    </a>
                </div>
            </td>
            <td align="center" width="20px">
                &nbsp;&nbsp;
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_applicantreports">
                    <a  href="<?php echo base_url();?>main/cscreports" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                        <br>
                        CSC Required Reports Menu
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
        <div class="col-md-12" >
            <legend>Request for Vacant Position</legend>
            <div class="row">
                <div class="col-md-6 form-group">
                </div>
                <div class="col-md-6">
                    <button id="exportPDF" class="btn btn-success btn-xs pull-right" style="display: none">Export as PDF</button>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="containerPrint">
                        <div id="container">
                            <h5><b>To: CIVIL SERVICE COMMISSION (CSC)</b></h5>
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;This is to request the publication of the following vacant positions of the Local Government Unit of Carmona, Cavite in the CSC website.</h5>
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3 pull-right" style="text-align: center">
                                <br><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: black"><?php echo $this->session->userdata('firstname');?><?php echo $this->session->userdata('lastname');?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br><i><?php echo $this->session->userdata('position');?></i><br>
                                <span id="lblDate"></span>
                                <br><br>
                            </div>
                            <div>
                                <table class="tblanalytics" id="tbldata" style="width: 100%;" border="2" cellpadding="10" >

                                </table>
                            </div>
                            <div id="divSignatory">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $GLOBALS['googlecharts'];?>"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $("#nav_recruitment_reports").removeClass().addClass("active");
        $("#ul_recruitmentmenu").show();
        $("#ul_mainmenu").hide();
        window.switch=0;
        $("#panel_requestpersonnelreports").addClass("selected_panel");
        loadReport();
        $("#lblDate").text("Date: "+moment().format("DD-MMM-YYYY"));
    });
    var resx = null;
    function loadReport() {
        var select = $("#reqnum");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>analyticsmanagement/getrequestforvacantposition",
            type: "GET",
            dataType: "json",
            success: function(result){
                console.log(result);
                if(result.Code === "00"){
                    $("#exportPDF").show();
                    $("#tbldata").append('<tr>' +
                        '    <th rowspan="2"><b>No.</b></th>' +
                        '    <th rowspan="2"><b>Position<br>Title</b></th>' +
                        '    <th rowspan="2"><b>Plantilla Item No.</b></th>' +
                        '    <th rowspan="2"><b>Salary/<br>Job/<br>Pay<br>Grade</b></th>' +
                        '    <th rowspan="2"><b>Annual Salary</b></th>' +
                    '    <th colspan="5" width="55%"><b>QUALIFICATION STANDARDS</b></th>' +
                        '    <th rowspan="2"><b>Place of Assignment</b></th>' +
                    '  </tr>' +
                    '  <tr>' +
                    '    <td><b>Education</b></td>' +
                    '    <td><b>Work Experience</b></td>' +
                    '    <td><b>Training</b></td>' +
                        '    <td><b>Eligibility</b></td>' +
                        '    <td><b>Competency<br>(if applicable)</b></td>' +
                    '  </tr>');
                    resx = result.details;
                    for (var key in result.details) {
                        var res = result.details[key];
                        var i = parseInt(key)+parseInt(1);
                        $("#tbldata").append('<tr>' +
                            '<td>'+i+'</td>'+
                            '<td>'+res.position+'</td>'+
                            '<td><span id="labelItemNox'+i+'" style="display:none"></span><textarea id="labelItemNo'+i+'" class="form-control"></textarea></td>'+
                            '<td>'+res.salarygrade+'</td>'+
                            '<td>'+res.annualsalary+'</td>'+
                            '<td><span id="labelEducationx'+i+'" style="display:none"></span><textarea id="labelEducation'+i+'" class="form-control">'+res.education+'</textarea></td>'+
                            '<td><span id="labelExperiencex'+i+'" style="display:none"></span><textarea id="labelExperience'+i+'" class="form-control">'+res.experience+'</textarea></td>'+
                            '<td><span id="labelTrainingx'+i+'" style="display:none"></span><textarea id="labelTraining'+i+'" class="form-control">'+res.training+'</textarea></td>'+
                            '<td><span id="labelEligibilityx'+i+'" style="display:none"></span><textarea id="labelEligibility'+i+'" class="form-control">'+res.eligibility+'</textarea></td>'+
                            '<td>'+getcbiskills(res.competency)+'</td>'+
                            '<td>'+res.placeofassignment+'</td>'+
                            '</tr>');
                    }
                    $("#tbldata").append('<tr><td colspan="11" style="text-align: center">xxxxxxxxx nothing follows xxxxxxxxx</td></tr>');
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    function getcbiskills(resx){
        var d = JSON.parse(atob(resx));
        var groupBy = function(xs, key) {
            return xs.reduce(function(rv, x) {
                (rv[x[key]] = rv[x[key]] || []).push(x);
                return rv;
            }, {});
        };
        var groupedByType=groupBy(d, 'type');
        var str = "";
        for(var h=0; h < Object.keys(groupedByType).length;h++){
            var type = groupedByType[Object.keys(groupedByType)[h]];
            str += "<b>"+Object.keys(groupedByType)[h]+"COMPETENCIES"+"</b><br>";
            for(var i = 0; i < type.length; i++){
                if((i+1)===type.length){
                    str+=type[i].title+"<br>";
                } else {
                    str+=type[i].title+", ";
                }
            }
        }
        return str;
    }
    function generatecbi(groupedByType,h,str){

        console.log(str);
    }

    function validate(){
        for(var key in resx){
            var i = parseInt(key)+parseInt(1);
            if($("#"+"labelItemNo"+i).val()===""){
                $("#"+"labelItemNo"+i).addClass('error');
                return false;
            } else if($("#"+"labelEducation"+i).val()===""){
                $("#"+"labelEducation"+i).addClass('error');
                return false;
            }else if($("#"+"labelExperience"+i).val()===""){
                $("#"+"labelExperience"+i).addClass('error');
                return false;
            }else if($("#"+"labelTraining"+i).val()===""){
                $("#"+"labelTraining"+i).addClass('error');
                return false;
            }else if($("#"+"labelEligibility"+i).val()===""){
                $("#"+"labelEligibility"+i).addClass('error');
                return false;
            }
        }
        return true;
    }
    $('#exportPDF').click(function(){
        if(validate()){
            for(var key in resx){
                var i = parseInt(key)+parseInt(1);
                $("#"+"labelItemNo"+i).removeClass('error');
                $("#"+"labelEducation"+i).removeClass('error');
                $("#"+"labelExperience"+i).removeClass('error');
                $("#"+"labelTraining"+i).removeClass('error');
                $("#"+"labelEligibility"+i).removeClass('error');
                $("#"+"labelItemNo"+i).hide();
                $("#"+"labelEducation"+i).hide();
                $("#"+"labelExperience"+i).hide();
                $("#"+"labelTraining"+i).hide();
                $("#"+"labelEligibility"+i).hide();

                $("#"+"labelItemNox"+i).text( $("#"+"labelItemNo"+i).val());
                $("#"+"labelEducationx"+i).text($("#"+"labelEducation"+i).val());
                $("#"+"labelExperiencex"+i).text($("#"+"labelExperience"+i).val());
                $("#"+"labelTrainingx"+i).text( $("#"+"labelTraining"+i).val());
                $("#"+"labelEligibilityx"+i).text( $("#"+"labelEligibility"+i).val());

                $("#"+"labelItemNox"+i).show();
                $("#"+"labelEducationx"+i).show();
                $("#"+"labelExperiencex"+i).show();
                $("#"+"labelTrainingx"+i).show();
                $("#"+"labelEligibilityx"+i).show();
            }
            $("#containerPrint").print({
                prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table><br>'
            });
            for(var key in resx){
                var i = parseInt(key)+parseInt(1);
                $("#"+"labelItemNo"+i).show();
                $("#"+"labelEducation"+i).show();
                $("#"+"labelExperience"+i).show();
                $("#"+"labelTraining"+i).show();
                $("#"+"labelEligibility"+i).show();


                $("#"+"labelItemNox"+i).hide();
                $("#"+"labelEducationx"+i).hide();
                $("#"+"labelExperiencex"+i).hide();
                $("#"+"labelTrainingx"+i).hide();
                $("#"+"labelEligibilityx"+i).hide();
            }
        }


    });
</script>

<style type="text/css">
    table.tblanalytics td{
        padding: 10px;
        color: black;
    }
    @media print {
        /*body * {*/
        /*display:: none;*/
        /*visibility: hidden;*/
        /*top: 0;*/
        /*}*/

        /*#container, #container * {*/
        /*visibility: visible;*/
        /*}*/

        /*#container {*/
        /*position: absolute;*/
        /*left: 0;*/
        /*top: 0;*/
        /*margin-top: -650px;*/
        /*}*/
        #containerPrint {
            -webkit-print-color-adjust: exact;
            height: 100%!important;
        }
        #exportPDF {
            visibility: hidden;
        }
        table.tblanalytics th {
            background-color: #949494 !important;
            border-color: black;
            color: black;
            text-align: center;
        }
        table.tblanalytics tr {
            border-color: black;
            color: black;
        }
        table.tblanalytics td {
            border-color: black;
            color: black;
        }

        table.tblanalytics table.data td, th{
            -webkit-print-color-adjust: exact;
            padding: 2px;
        }
        #labelEducation {
            outline: none;
            height: 30px;
        }
        #labelEligibility {
            outline: none;
            height: 30px;
        }
        .type {
            outline: none;
            border-color: transparent;
        }
        .hide {
            outline: none;
            border-color: transparent;
        }
        textarea {
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
        }
        button {
            display: none !important;
        }

    }
    table.tblanalytics th {
        background-color: #949494 !important;
        border-color: black;
        color: black;
        text-align: center;
    }
    table.tblanalytics tr {
        border-color: black;
        color: black;
    }
    table.tblanalytics td {
        border-color: black;
        color: black;
    }

    table.data td, th{
        padding: 2px;
    }

    .error{
        border-color: red;
    }

    .type {
        outline: none;
    }
    .hide {
        outline: none;
        border-color: transparent;
    }
    textarea {
        resize: none;
        outline: none;
        border-color: transparent;
    }
</style>