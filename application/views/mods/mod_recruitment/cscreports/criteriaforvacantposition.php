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
                    <a href="<?php echo base_url();?>cscreports/criteriaforvacantposition" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Criteria for the Vacant Position
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
            <legend>Selection Criteria for the Vacant Position </legend>
            <div class="row">
                <div class="col-md-6 form-group">
                    <select class="form-control clearField" id="position">
                        <option selected disabled>- Select Vacant Position -</option>
                    </select>

                </div>
                <div class="col-md-6">
                    <button id="exportPDF" class="btn btn-success btn-xs pull-right" style="display: none">Export as PDF</button>
                </div>
                <div class="col-md-12">
                    <h5 id="tblmsg1" style="display:none"></h5>
                    <div class="table-responsive" id="containerPrint">
                        <center><h4 id="printTitle" style="display: none"><b>Selection Criteria for the Vacant Position</b></h4></center>
                        <div id="container">

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
    function loadReport() {
        var select = $("#position");
        select.empty();
        $.ajax({
            url: "<?php echo base_url();?>homepage/announcements",
            type: "GET",
            dataType: "json",
            success: function(result){
                if(result.Code === "00"){
                    console.log(result);
                    select.append('<option selected disabled>- Select Vacant Position -</option>');
                    for(var keys in result.details){
                        select.append('<option value="'+result.details[keys].requestnumber+'">'+((result.details[keys].name == "" || result.details[keys].name == null) ? 'POSITION NAME' : result.details[keys].name )+' ['+result.details[keys].requestnumber+']</option>');
                    }
                } else {
                    select.append('<option selected disabled>- No Vacant Position Available -</option>');
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }

    $("#position").change(function () {
        viewJobPosting($("#position").val());
    });


    function viewJobPosting(reqnum){
        $("#loadingmodal").modal("show");
        $.ajax({
            url:"<?php echo base_url();?>homepage/displayapprovedrequestdetails",
            type: "POST",
            data: {
                "REQUESTNUMBER": reqnum
            },
            dataType: "json",
            success:function(result){
                $("#loadingmodal").modal("hide");
                console.log(JSON.stringify(result));
                if(result.Code == "00"){
                    generateTable(result);
                } else {
                    messageDialogModal("Server Message","No Details Available");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
            }
        });
    }

    function generateTable(result) {
        $("#exportPDF").show();
        $("#container").empty();
        $("#containerPrint").show();
        var date = new Date(result.details[0].mdateapproved);
        $("#container").append('<b style="color:black">Date Published (CSC Field Office): </b><span style="color:black">' + date.toDateString()+'</span>');
        $("#container").append('<table class="data" width="100%" border="2" style="color: black"><tr><th rowspan="2" width="23%"><b>Position Title</b></th><th rowspan="2" width="7%">SG</th><th rowspan="2" width="15%"><b>Office</b></th><th colspan="4" style="border-color: black"><b>Qualification Standards</b></th></tr><tr><td width="15%"><b>Education</b></td><td width="15%"><b>Experience</b></td><td width="15%"><b>Training</b></td><td width="15%"><b>Eligibility</b></td></tr><tr><td valign="center">'+result.details[0].positionname+'</td><td>'+result.details[0].salarygrade+'</td><td>'+result.details[0].department+'</td><td>'+check(result.details[0].mineducbackground)+'</td><td> at least  '+result.details[0].experience+' years</td><td> at least '+result.details[0].training+' hours</td><td>'+check(result.details[0].eligibility)+'</td></tr><tr><td colspan="7" style="text-align: center"><b>UPDATED POSITION DESCRIPTION FORM</b></td></tr><tr><td colspan="7" id="skillset"></td></tr></table>');
        var skillset = $("#skillset");
        skillset.empty();
        skillset.append('<ol type="a" id="skills">');
        for(var keys in result.details){
            var skills = JSON.parse(atob(result.details[keys].cbiskills));
            for(var i=0;i<skills.length;i++){
                $("#skills").append("<li>"+skills[i].desc+"</li>");
            }
        }
        skillset.append("</ol>");
        $("#container").append('<br><span style="color: black">Prepared by:</span><br><br>' + '<b style="color: black">'+'<?php echo $this->session->userdata('firstname');?> '+'<?php echo $this->session->userdata('lastname');?>'+'</b><br><i>'+'<?php echo $this->session->userdata('position');?>'+'</i>');
    }
    function check(data){
        var str = data;
        if (data.toUpperCase().indexOf("GRADUATE") >= 0)
            str = '<span id="labelEducation" style="display:none"></span><textarea class="form-control textarea">'+data+'</textarea>';
        else if (data.toUpperCase().indexOf("COLLEGE") >= 0)
            str = '<span id="labelEducation" style="display:none"></span><textarea class="form-control textarea">'+data+'</textarea>';
        else if (data.toUpperCase().indexOf("YES") >= 0)
            str = '<span id="labelEligibility" style="display:none"></span><textarea class="form-control textarea1">'+data+'</textarea>';
        else if (data.toUpperCase().indexOf("NO") >= 0)
            str = 'None required';

        return str;
    }

    $('#exportPDF').click(function(){
        if($(".textarea").val()===""){
            $(".textarea").addClass('error');
        }else if($(".textarea1").val()===""){
            $(".textarea1").addClass('error');
        } else {
            $("#printTitle").show();
            $(".textarea").removeClass('form-control');
            $(".textarea").removeClass('error');
            $(".textarea1").removeClass('form-control');
            $(".textarea1").removeClass('error');
            $(".textarea").hide();
            $(".textarea1").hide();
            $("#labelEducation").show();
            $("#labelEligibility").show();
            $("#labelEducation").text( $(".textarea").val());
            $("#labelEligibility").text( $(".textarea1").val());

            $("#containerPrint").print({
                prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table><br>'
            });
            $("#printTitle").hide();
            $(".textarea").addClass('form-control');
            $(".textarea1").addClass('form-control');
            $(".textarea").show();
            $(".textarea1").show();
            $("#labelEducation").hide();
            $("#labelEligibility").hide();
        }

    });
</script>
<style type="text/css">
    table.tblanalytics td{
        padding: 5px;
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
        }
        #exportPDF {
            visibility: hidden;
        }
        th {
            background-color: #949494 !important;
            border-color: black;
            color: black;
            text-align: center;
        }
        tr {
            border-color: black;
            color: black;
        }
        td {
            border-color: black;
            color: black;
        }

        table.data td, th{
            -webkit-print-color-adjust: exact;
            padding: 2px;
        }
        textarea {
            outline: none;
        }
    }
    th {
        background-color: #949494 !important;
        border-color: black;
        color: black;
        text-align: center;
    }
    tr {
        border-color: black;
        color: black;
    }
    td {
        border-color: black;
        color: black;
    }

    table.data td, th{
        padding: 2px;
    }
    textarea {
        resize: none;
        outline: none;
        border-color: transparent;
    }

</style>