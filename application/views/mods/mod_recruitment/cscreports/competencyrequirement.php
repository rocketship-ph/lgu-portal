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
                    <a href="<?php echo base_url();?>cscreports/competencyrequirement" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Competency Requirement
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
            <legend>Competency Requirement Per Position </legend>
            <div class="row">
                <div class="col-md-6 form-group">
                    <select class="form-control clearField" id="reqnum">
                        <option selected disabled>- Select Request Number -</option>
                    </select>

                </div>
                <div class="col-md-6">
                    <button id="exportPDF" class="btn btn-success btn-xs pull-right" style="display: none">Export as PDF</button>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="containerPrint">
                        <center><h4 id="printTitle" style="display: none"><b>COMPETENCY REQUIREMENT PER POSITION</b></h4></center>
                        <div id="container">
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
    });
    var res = null;
    function loadReport() {
        var select = $("#reqnum");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>analyticsmanagement/getcompetencyrequirement",
            type: "GET",
            dataType: "json",
            success: function(result){
                if(result.Code === "00"){
                    res = result;
                    select.append('<option selected disabled>- Select Request Number -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].requestnumber+'">'+result.details[keys].requestnumber+'</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Request Number Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }
    var globalJsonCbi = null;
    $("#reqnum").change(function () {
        $("#tbldata").empty();
        $("#loadingmodal").modal("show");
        var data = $("#reqnum").val();
        var cbi = [];
        for(var key in res.details){
            if(res.details[key].requestnumber===data){
                console.log(res.details[key]);
                $("#tbldata").append('  <tr>' +
                    '    <th rowspan="2" width="25%"><b>Position / Office</b></th>' +
                    '    <th rowspan="2" width="10%"><b>Salary Grade / Annual Salary</b></th>' +
                    '    <th rowspan="2" width="10%"><b>Item No.</b></th>' +
                    '    <th colspan="4" width="55%"><b>QUALIFICATION STANDARDS</b></th>' +
                    '  </tr>' +
                    '  <tr>' +
                    '    <td><b>Education</b></td>' +
                    '    <td><b>Work Experience</b></td>' +
                    '    <td><b>Training</b></td>' +
                    '    <td><b>Eligibility</b></td>' +
                    '  </tr>' +
                    '  <tr>' +
                    '    <td valign="top"><b>'+res.details[key].position+'</b><br><br><b>'+res.details[key].office+'</b></td>' +
                    '    <td valign="top">'+res.details[key].salarygrade+' / P'+res.details[key].salaryequivalent+'</td>' +
                    '    <td><textarea rows="9"  id="labelItemNo" class="form-control"></textarea></td>' +
                    '    <td><textarea rows="9" id="labelEducation" class="form-control">'+res.details[key].education+'</textarea></td>' +
                    '    <td><textarea rows="9"  id="labelExperience" class="form-control">'+res.details[key].experience+'</textarea></td>' +
                    '    <td><textarea rows="9" id="labelTraining" class="form-control">'+res.details[key].training+'</textarea></td>' +
                    '    <td><textarea rows="9"  id="labelEligibility" class="form-control">'+res.details[key].eligibility+'</textarea></td>' +
                    '  </tr>' +
                    '  <tr>' +
                    '    <td colspan="2"><b>Brief description of the General Function</b></td>' +
                    '    <td colspan="5"><i>'+atob(res.details[key].description)+'</i></td>' +
                    '  </tr>' +
                    '  <tr>' +
                    '    <td colspan="7"><center><b>REQUIRED COMPETENCIES</b></center></td>' +
                    '  </tr>');
                var jsonCbi = JSON.parse(atob(res.details[key].cbiskills));
                globalJsonCbi = jsonCbi;
                for (var i = 0; i<jsonCbi.length;i++){
                    cbi.push(jsonCbi[i].title);
                }
                console.log(JSON.stringify(jsonCbi));
                break;
            }
        }
        $.ajax({
            url: "<?php echo base_url();?>analyticsmanagement/getcbiskills",
            type: "POST",
            dataType: "json",
            data: {
                "DATA": JSON.stringify(cbi).replace("[","").replace("]","")
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code === "00"){
                    $("#exportPDF").show();
                    var groupBy = function(xs, key) {
                        return xs.reduce(function(rv, x) {
                            (rv[x[key]] = rv[x[key]] || []).push(x);
                            return rv;
                        }, {});
                    };
                    var groupedByType=groupBy(result.details, 'type');
                    for(var h=0; h < Object.keys(groupedByType).length;h++){
                        generatecbi(groupedByType,h);
                    }

                }
            },
            error: function(e){
                $("#exportPDF").hide();
                $("#loadingmodal").modal("hide");
                console.log(e);
            }
        });
    });
    function generatecbi(groupedByType,h){
        var type = groupedByType[Object.keys(groupedByType)[h]];
        $("#tbldata").append('<tr style="background-color: #D9D9D9 !important;"><td colspan="7"><b>'+Object.keys(groupedByType)[h]+' COMPETENCIES</b></td>' +
            '  </tr>');
        for(var i = 0; i < type.length; i++){
            $("#tbldata").append('<tr>' +
                '    <td colspan="2"><b>'+type[i].title+'</b><br><br><i>'+getLevel(type[i].title)+'</i></td>' +
                '    <td colspan="5">'+atob(type[i].description)+'</td>' +
                '  </tr>');
        }
    }

    function getLevel(title) {
        console.log(title);
        for (var i = 0; i<globalJsonCbi.length;i++){
            console.log(title + " : " + globalJsonCbi[i].title + " > " + globalJsonCbi[i].level);
            if(title===globalJsonCbi[i].title){
                return "Level: "+globalJsonCbi[i].level.toUpperCase();
            }
        }
    }
    $('#exportPDF').click(function(){
        if($("#labelItemNo").val()===""){
            $("#labelItemNo").addClass('error');
        }else if($("#labelEligibility").val()===""){
            $("#labelEligibility").addClass('error');
        }else if($("#labelEducation").val()===""){
            $("#labelEducation").addClass('error');
        }else if($("#labelExperience").val()===""){
            $("#labelExperience").addClass('error');
        }else if($("#labelTraining").val()===""){
            $("#labelTraining").addClass('error');
        } else {
            $("#labelItemNo").removeClass('error');
            $("#labelEligibility").removeClass('error');
            $("#labelEducation").removeClass('error');
            $("#labelExperience").removeClass('error');
            $("#labelTraining").removeClass('error');
            $("#printTitle").show();
            $("#containerPrint").print({
                prepend: '<table align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table>'
            });
            $("#printTitle").hide();
            $("#printTitle").show();
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