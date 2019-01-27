<style>
    .panel-menu{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }

    .font-weight-bold{
        font-weight: 700 !important;
        color: #444444 !important;
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
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Analytics Menu</h4>
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
                <a href="<?php echo base_url();?>analytics/yearsinserviceanalytics" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                    <br>
                    Years in Public Service Analytics
                </a>
            </div>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td>
            <div class="panel panel-menu" align="center" id="panel_applicantreports">
                <a  href="<?php echo base_url();?>main/analytics" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/report_generation.png" height="40px">
                    <br>
                    Analytics Menu
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
    <div class="col-md-12" id="container">
        <legend>Years in Public Service Analytics</legend>
         <button id="exportPDF" class="btn btn-success btn-xs pull-right">Export as PDF</button><br><br>
        <div class="row">
            <div class="col-md-12">
                <h5 id="tblmsg1" style="display:none"></h5>
                <div class="table-responsive" id="tblcont1" style="display: none">
                   <!--  <table id="tblreport1" class="display compact responsive" cellspacing="0" width="100%" >
                        <thead>
                        <tr>
                            <th>DATECREATED</th>
                            <th>POSITIONCODE</th>
                            <th>POSITION NAME</th>
                            <th>DESCRIPTION</th>
                            <th>GROUP POSITION</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table> -->
                    <table class="tblanalytics2" style="width: 100%;" border="2">
                       <tbody>
                          <tr>
                             <td rowspan="2" width="10%"><b>Years in Public Service</b></td>
                             <td colspan="2"><b>Permanent</b></td>
                             <td rowspan="2"><b>TOTAL</b></td>
                             <td colspan="2"><b>Elected</b></td>
                             <td rowspan="2"><b>TOTAL</b></td>
                             <td colspan="2"><b>Co-terminous</b></td>
                             <td rowspan="2"><b>TOTAL</b></td>
                             <td colspan="2"><b>Casual</b></td>
                             <td rowspan="2"><b>TOTAL</b></td>
                             <td colspan="2"><b>Job Order</b></td>
                             <td rowspan="2"><b>TOTAL</b></td>
                             <td colspan="2"><b>SUB-TOTAL</b></td>
                             <td rowspan="2"><b>GRAND TOTAL</b></td>
                          </tr>
                          <tr>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                             <td width="5%">M</td>
                             <td width="5%">F</td>
                          </tr>
                          <tr>
                             <td>1-10 years</td>
                             <td><span id="below21PM"></span></td>
                             <td><span id="below21PF"></span></td>
                             <td><span id="below21PTotal"></span></td>
                             <td><span id="below21EM"></span></td>
                             <td><span id="below21EF"></span></td>
                             <td><span id="below21ETotal"></span></td>
                             <td><span id="below21CTM"></span></td>
                             <td><span id="below21CTF"></span></td>
                             <td><span id="below21CTTotal"></span></td>
                             <td><span id="below21CM"></span></td>
                             <td><span id="below21CF"></span></td>
                             <td><span id="below21CTotal"></span></td>
                             <td><span id="below21JM"></span></td>
                             <td><span id="below21JF"></span></td>
                             <td><span id="below21JTotal"></span></td>
                             <td><span id="below21STM"></span></td>
                             <td><span id="below21STF"></span></td>
                             <td><span id="below21GTotal"></span></td>
                          </tr>
                          <tr>
                             <td>11-20 years</td>
                             <td><span id="y21to35PM"></span></td>
                             <td><span id="y21to35PF"></span></td>
                             <td><span id="y21to35PTotal"></span></td>
                             <td><span id="y21to35EM"></span></td>
                             <td><span id="y21to35EF"></span></td>
                             <td><span id="y21to35ETotal"></span></td>
                             <td><span id="y21to35CTM"></span></td>
                             <td><span id="y21to35CTF"></span></td>
                             <td><span id="y21to35CTTotal"></span></td>
                             <td><span id="y21to35CM"></span></td>
                             <td><span id="y21to35CF"></span></td>
                             <td><span id="y21to35CTotal"></span></td>
                             <td><span id="y21to35JM"></span></td>
                             <td><span id="y21to35JF"></span></td>
                             <td><span id="y21to35JTotal"></span></td>
                             <td><span id="y21to35STM"></span></td>
                             <td><span id="y21to35STF"></span></td>
                             <td><span id="y21to35GTotal"></span></td>
                          </tr>
                          <tr>
                             <td>21-30 years</td>
                             <td><span id="y36to45PM"></span></td>
                             <td><span id="y36to45PF"></span></td>
                             <td><span id="y36to45PTotal"></span></td>
                             <td><span id="y36to45EM"></span></td>
                             <td><span id="y36to45EF"></span></td>
                             <td><span id="y36to45ETotal"></span></td>
                             <td><span id="y36to45CTM"></span></td>
                             <td><span id="y36to45CTF"></span></td>
                             <td><span id="y36to45CTTotal"></span></td>
                             <td><span id="y36to45CM"></span></td>
                             <td><span id="y36to45CF"></span></td>
                             <td><span id="y36to45CTotal"></span></td>
                             <td><span id="y36to45JM"></span></td>
                             <td><span id="y36to45JF"></span></td>
                             <td><span id="y36to45JTotal"></span></td>
                             <td><span id="y36to45STM"></span></td>
                             <td><span id="y36to45STF"></span></td>
                             <td><span id="y36to45GTotal"></span></td>
                          </tr>
                          <tr>
                             <td>31-40 years</td>
                             <td><span id="y46to55PM"></span></td>
                             <td><span id="y46to55PF"></span></td>
                             <td><span id="y46to55PTotal"></span></td>
                             <td><span id="y46to55EM"></span></td>
                             <td><span id="y46to55EF"></span></td>
                             <td><span id="y46to55ETotal"></span></td>
                             <td><span id="y46to55CTM"></span></td>
                             <td><span id="y46to55CTF"></span></td>
                             <td><span id="y46to55CTTotal"></span></td>
                             <td><span id="y46to55CM"></span></td>
                             <td><span id="y46to55CF"></span></td>
                             <td><span id="y46to55CTotal"></span></td>
                             <td><span id="y46to55JM"></span></td>
                             <td><span id="y46to55JF"></span></td>
                             <td><span id="y46to55JTotal"></span></td>
                             <td><span id="y46to55STM"></span></td>
                             <td><span id="y46to55STF"></span></td>
                             <td><span id="y46to55GTotal"></span></td>
                          </tr>
                          <tr>
                             <td>41 years and above</td>
                             <td><span id="y56to65PM"></span></td>
                             <td><span id="y56to65PF"></span></td>
                             <td><span id="y56to65PTotal"></span></td>
                             <td><span id="y56to65EM"></span></td>
                             <td><span id="y56to65EF"></span></td>
                             <td><span id="y56to65ETotal"></span></td>
                             <td><span id="y56to65CTM"></span></td>
                             <td><span id="y56to65CTF"></span></td>
                             <td><span id="y56to65CTTotal"></span></td>
                             <td><span id="y56to65CM"></span></td>
                             <td><span id="y56to65CF"></span></td>
                             <td><span id="y56to65CTotal"></span></td>
                             <td><span id="y56to65JM"></span></td>
                             <td><span id="y56to65JF"></span></td>
                             <td><span id="y56to65JTotal"></span></td>
                             <td><span id="y56to65STM"></span></td>
                             <td><span id="y56to65STF"></span></td>
                             <td><span id="y56to65GTotal"></span></td>
                          </tr>
                          <tr>
                             <td><b>Grand Total</b></td>
                             <td><span id="GTPM"></span></td>
                             <td><span id="GTPF"></span></td>
                             <td><span id="GTPTotal"></span></td>
                             <td><span id="GTEM"></span></td>
                             <td><span id="GTEF"></span></td>
                             <td><span id="GTETotal"></span></td>
                             <td><span id="GTCTM"></span></td>
                             <td><span id="GTCTF"></span></td>
                             <td><span id="GTCTTotal"></span></td>
                             <td><span id="GTCM"></span></td>
                             <td><span id="GTCF"></span></td>
                             <td><span id="GTCTotal"></span></td>
                             <td><span id="GTJM"></span></td>
                             <td><span id="GTJF"></span></td>
                             <td><span id="GTJTotal"></span></td>
                             <td><span id="GTSTM"></span></td>
                             <td><span id="GTSTF"></span></td>
                             <td><span id="GTGTotal"></span></td>
                          </tr>
                       </tbody>
                    </table>
                    <br>
                </div>
                <br>
                 <table cellspacing="0" width="100%">
                    <tr>
                        <td>
                            <div id="divGraph"></div>
                        </td>
                    </tr>
                 </table>
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
    google.charts.load('current', {packages: ['corechart', 'bar']});
    loadReport();

});
var x = null;
function loadReport() {
    $("#loadingmodal").modal("show");
     $.ajax({
            url: "<?php echo base_url();?>analyticsmanagement/getrawdata",
            type: "POST",
            dataType: "json",
            data: {},
            success: function(data){
                $("#loadingmodal").modal("hide");
                if(data.Code == "00"){
                    countAgeRange(data.details);
                    generateChart(data.details);
                    console.log(data.details);
                    $('#tblcont1').show();
                    $("#tblmsg1").hide();
                } else {
                    $("#tblcont1").hide();
                    $("#tblmsg1").text("No Data Found");
                    $("#tblmsg1").show();
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
                 $('#tblcont1').show();
                    $("#tblmsg1").hide();
                console.log(e);
            }
        }); 
}
var age21to35M = [];var age21to35MP = [];var age21to35ME = [];var age21to35MCT = [];var age21to35MC = [];var age21to35MJ = [];
var age36to45M = [];var age36to45MP = [];var age36to45ME = [];var age36to45MCT = [];var age36to45MC = [];var age36to45MJ = [];
var age46to55M = [];var age46to55MP = [];var age46to55ME = [];var age46to55MCT = [];var age46to55MC = [];var age46to55MJ = [];
var age56to65M = [];var age56to65MP = [];var age56to65ME = [];var age56to65MCT = [];var age56to65MC = [];var age56to65MJ = [];
var age66to70M = [];var age66to70MP = [];var age66to70ME = [];var age66to70MCT = [];var age66to70MC = [];var age66to70MJ = [];
var age21to35F = [];var age21to35FP = [];var age21to35FE = [];var age21to35FCT = [];var age21to35FC = [];var age21to35FJ = [];
var age36to45F = [];var age36to45FP = [];var age36to45FE = [];var age36to45FCT = [];var age36to45FC = [];var age36to45FJ = [];
var age46to55F = [];var age46to55FP = [];var age46to55FE = [];var age46to55FCT = [];var age46to55FC = [];var age46to55FJ = [];
var age56to65F = [];var age56to65FP = [];var age56to65FE = [];var age56to65FCT = [];var age56to65FC = [];var age56to65FJ = [];
var age66to70F = [];var age66to70FP = [];var age66to70FE = [];var age66to70FCT = [];var age66to70FC = [];var age66to70FJ = [];
    var m =0;
    var f =0;
function countAgeRange(data){
    
    for(var i=0;i<data.length;i++) {
        var value = data[i]['yearsofservice'];
        if(value!=""&&value!=null&&value!="null"){
            if(value>=0 && value<=10){
                 if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MC.push(value);
                    } else {
                        age21to35FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MP.push(value);
                    } else {
                        age21to35FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age21to35ME.push(value);
                    } else {
                        age21to35FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MCT.push(value);
                    } else {
                        age21to35FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age21to35MJ.push(value);
                    } else {
                        age21to35FJ.push(value);
                    }
                }
                if(data[i]['gender']=="MALE"){
                    age21to35M.push(value);
                    m++;
                } else {
                    age21to35F.push(value);
                    f++;
                }
            } else if (value>=11 && value<=20){
                if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age36to45MC.push(value);
                    } else {
                        age36to45FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age36to45MP.push(value);
                    } else {
                        age36to45FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age36to45ME.push(value);
                    } else {
                        age36to45FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age36to45MCT.push(value);
                    } else {
                        age36to45FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age36to45MJ.push(value);
                    } else {
                        age36to45FJ.push(value);
                    }
                }
                  if(data[i]['gender']=="MALE"){
                    age36to45M.push(value);
                    m++;
                } else {
                    age36to45F.push(value);
                    f++;
                }
            }else if (value>=21 && value<=30){
                if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age46to55MC.push(value);
                    } else {
                        age46to55FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age46to55MP.push(value);
                    } else {
                        age46to55FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age46to55ME.push(value);
                    } else {
                        age46to55FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age46to55MCT.push(value);
                    } else {
                        age46to55FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age46to55MJ.push(value);
                    } else {
                        age46to55FJ.push(value);
                    }
                }
                  if(data[i]['gender']=="MALE"){
                    age46to55M.push(value);
                    m++;
                } else {
                    age46to55F.push(value);
                    f++;
                }
            }else if (value>=31 && value<=40){
                 if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age56to65MC.push(value);
                    } else {
                        age56to65FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age56to65MP.push(value);
                    } else {
                        age56to65FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age56to65ME.push(value);
                    } else {
                        age56to65FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age56to65MCT.push(value);
                    } else {
                        age56to65FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age56to65MJ.push(value);
                    } else {
                        age56to65FJ.push(value);
                    }
                }
                  if(data[i]['gender']=="MALE"){
                    age56to65M.push(value);
                    m++;
                } else {
                    age56to65F.push(value);
                    f++;
                }
            }else if (value>=41){
                if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age66to70MC.push(value);
                    } else {
                        age66to70FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age66to70MP.push(value);
                    } else {
                        age66to70FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age66to70ME.push(value);
                    } else {
                        age66to70FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age66to70MCT.push(value);
                    } else {
                        age66to70FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age66to70MJ.push(value);
                    } else {
                        age66to70FJ.push(value);
                    }
                }
                  if(data[i]['gender']=="MALE"){
                    age66to70M.push(value);
                    m++;
                } else {
                    age66to70F.push(value);
                    f++;
                }
            }
        } else {
              if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MC.push(value);
                    } else {
                        age21to35FC.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MP.push(value);
                    } else {
                        age21to35FP.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                    if(data[i]['gender']=="MALE"){
                        age21to35ME.push(value);
                    } else {
                        age21to35FE.push(value);
                    }
                } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                    if(data[i]['gender']=="MALE"){
                        age21to35MCT.push(value);
                    } else {
                        age21to35FCT.push(value);
                    }
                } else {
                    if(data[i]['gender']=="MALE"){
                        age21to35MJ.push(value);
                    } else {
                        age21to35FJ.push(value);
                    }
                }
                if(data[i]['gender']=="MALE"){
                    age21to35M.push(value);
                    m++;
                } else {
                    age21to35F.push(value);
                    f++;
                }
        }
    }
    $("#tblcont1").append('<table class="tblanalytics"  style="width: 100%;" border="2" cellpadding="10" > <tbody> <tr> <td><b>Years in Public Service</b></td> <td width="15%"><b>Male</b></td> <td width="15%"><b>Female</b></td> <td width="15%"><b>Total</b></td> </tr> <tr> <td>1-10 years</td> <td>'+age21to35M.length+'</td> <td>'+age21to35F.length+'</td> <td><b>'+sum(age21to35M.length,age21to35F.length)+'</b></td> </tr> <tr> <td>11-20 years</td> <td>'+ age36to45M.length +'</td> <td>'+age36to45F.length+'</td> <td><b>'+sum(age36to45M.length,age36to45F.length)+'</b></td> </tr> <tr> <td>21-30 years</td> <td>'+age46to55M.length+'</td> <td>'+age46to55F.length+'</td> <td><b>'+sum(age46to55M.length,age46to55F.length)+'</b></td> </tr> <tr> <td>31-40 years</td> <td>'+age56to65M.length+'</td> <td>'+age56to65F.length+'</td> <td><b>'+sum(age56to65M.length,age56to65F.length)+'</b></td> </tr> <tr> <td>41 years and above</td> <td>'+age66to70M.length+'</td> <td>'+age66to70M.length+'</td> <td><b>'+sum(age66to70M.length,age66to70F.length)+'</b></td> </tr> <tr> <td><b>Grand Total</b></td> <td><b>'+m+'</b></td> <td><b>'+f+'</b></td> <td><b>'+sum(m,f)+'</b></td> </tr> </tbody> </table>');

 $("#below21STM").text(age21to35M.length);
    $("#below21STF").text(age21to35F.length);
    $("#below21GTotal").append("<b>"+sum(age21to35M.length,age21to35F.length)+"</b>");

    $("#below21CM").text(age21to35MC.length);
    $("#below21CF").text(age21to35FC.length);
    $("#below21CTotal").append("<b>"+sum(age21to35MC.length,age21to35FC.length)+"</b>");

    $("#below21JM").text(age21to35MJ.length);
    $("#below21JF").text(age21to35FJ.length);
    $("#below21JTotal").append("<b>"+sum(age21to35MJ.length,age21to35FJ.length)+"</b>");

    $("#below21PM").text(age21to35MP.length);
    $("#below21PF").text(age21to35FP.length);
    $("#below21PTotal").append("<b>"+sum(age21to35MP.length,age21to35FP.length)+"</b>");

    $("#below21EM").text(age21to35ME.length);
    $("#below21EF").text(age21to35FE.length);
    $("#below21ETotal").append("<b>"+sum(age21to35ME.length,age21to35FE.length)+"</b>");

    $("#below21CTM").text(age21to35MCT.length);
    $("#below21CTF").text(age21to35FCT.length);
    $("#below21CTTotal").append("<b>"+sum(age21to35MCT.length,age21to35FCT.length)+"</b>");
    //21 to 35
    $("#y21to35STM").text(age36to45M.length);
    $("#y21to35STF").text(age36to45F.length);
    $("#y21to35GTotal").append("<b>"+sum(age36to45M.length,age36to45F.length)+"</b>");

    $("#y21to35CM").text(age36to45MC.length);
    $("#y21to35CF").text(age36to45FC.length);
    $("#y21to35CTotal").append("<b>"+sum(age36to45MC.length,age36to45FC.length)+"</b>");

    $("#y21to35JM").text(age36to45MJ.length);
    $("#y21to35JF").text(age36to45FJ.length);
    $("#y21to35JTotal").append("<b>"+sum(age36to45MJ.length,age36to45FJ.length)+"</b>");

    $("#y21to35PM").text(age36to45MP.length);
    $("#y21to35PF").text(age36to45FP.length);
    $("#y21to35PTotal").append("<b>"+sum(age36to45MP.length,age36to45FP.length)+"</b>");

    $("#y21to35EM").text(age36to45ME.length);
    $("#y21to35EF").text(age36to45FE.length);
    $("#y21to35ETotal").append("<b>"+sum(age36to45ME.length,age36to45FE.length)+"</b>");

    $("#y21to35CTM").text(age36to45MCT.length);
    $("#y21to35CTF").text(age36to45FCT.length);
    $("#y21to35CTTotal").append("<b>"+sum(age36to45MCT.length,age36to45FCT.length)+"</b>");

    //36 to 45
    $("#y36to45STM").text(age46to55M.length);
    $("#y36to45STF").text(age46to55F.length);
    $("#y36to45GTotal").append("<b>"+sum(age46to55M.length,age46to55F.length)+"</b>");

    $("#y36to45CM").text(age46to55MC.length);
    $("#y36to45CF").text(age46to55FC.length);
    $("#y36to45CTotal").append("<b>"+sum(age46to55MC.length,age46to55FC.length)+"</b>");

    $("#y36to45JM").text(age46to55MJ.length);
    $("#y36to45JF").text(age46to55FJ.length);
    $("#y36to45JTotal").append("<b>"+sum(age46to55MJ.length,age46to55FJ.length)+"</b>");

    $("#y36to45PM").text(age46to55MP.length);
    $("#y36to45PF").text(age46to55FP.length);
    $("#y36to45PTotal").append("<b>"+sum(age46to55MP.length,age46to55FP.length)+"</b>");

    $("#y36to45EM").text(age46to55ME.length);
    $("#y36to45EF").text(age46to55FE.length);
    $("#y36to45ETotal").append("<b>"+sum(age46to55ME.length,age46to55FE.length)+"</b>");

    $("#y36to45CTM").text(age46to55MCT.length);
    $("#y36to45CTF").text(age46to55FCT.length);
    $("#y36to45CTTotal").append("<b>"+sum(age46to55MCT.length,age46to55FCT.length)+"</b>");

    //46 to 55
    $("#y46to55STM").text(age56to65M.length);
    $("#y46to55STF").text(age56to65M.length);
    $("#y46to55GTotal").append("<b>"+sum(age56to65M.length,age56to65F.length)+"</b>");

    $("#y46to55CM").text(age56to65MC.length);
    $("#y46to55CF").text(age56to65FC.length);
    $("#y46to55CTotal").append("<b>"+sum(age56to65MC.length,age56to65FC.length)+"</b>");

    $("#y46to55JM").text(age56to65MJ.length);
    $("#y46to55JF").text(age56to65FJ.length);
    $("#y46to55JTotal").append("<b>"+sum(age56to65MJ.length,age56to65FJ.length)+"</b>");

    $("#y46to55PM").text(age56to65MP.length);
    $("#y46to55PF").text(age56to65FP.length);
    $("#y46to55PTotal").append("<b>"+sum(age56to65MP.length,age56to65FP.length)+"</b>");

    $("#y46to55EM").text(age56to65ME.length);
    $("#y46to55EF").text(age56to65FE.length);
    $("#y46to55ETotal").append("<b>"+sum(age56to65ME.length,age56to65FE.length)+"</b>");

    $("#y46to55CTM").text(age56to65MCT.length);
    $("#y46to55CTF").text(age56to65FCT.length);
    $("#y46to55CTTotal").append("<b>"+sum(age56to65MCT.length,age56to65FCT.length)+"</b>");

    //56 to 65
    
    $("#y56to65STM").text(age66to70M.length);
    $("#y56to65STF").text(age66to70F.length);
    $("#y56to65GTotal").append("<b>"+sum(age66to70M.length,age66to70F.length)+"</b>");

    $("#y56to65CM").text(age66to70MC.length);
    $("#y56to65CF").text(age66to70FC.length);
    $("#y56to65CTotal").append("<b>"+sum(age66to70MC.length,age66to70FC.length)+"</b>");

    $("#y56to65JM").text(age66to70MJ.length);
    $("#y56to65JF").text(age66to70FJ.length);
    $("#y56to65JTotal").append("<b>"+sum(age66to70MJ.length,age66to70FJ.length)+"</b>");

    $("#y56to65PM").text(age66to70MP.length);
    $("#y56to65PF").text(age66to70FP.length);
    $("#y56to65PTotal").append("<b>"+sum(age66to70MP.length,age66to70FP.length)+"</b>");

    $("#y56to65EM").text(age66to70ME.length);
    $("#y56to65EF").text(age66to70FE.length);
    $("#y56to65ETotal").append("<b>"+sum(age66to70ME.length,age66to70FE.length)+"</b>");

    $("#y56to65CTM").text(age66to70MCT.length);
    $("#y56to65CTF").text(age66to70FCT.length);
    $("#y56to65CTTotal").append("<b>"+sum(age66to70MCT.length,age66to70FCT.length)+"</b>");

    //66 above

    $("#y66aboveSTM").text(age66to70M.length);
    $("#y66aboveSTF").text(age66to70F.length);
    $("#y66aboveGTotal").append("<b>"+sum(age66to70M.length,age66to70F.length)+"</b>");

    $("#y66aboveCM").text(age66to70MC.length);
    $("#y66aboveCF").text(age66to70FC.length);
    $("#y66aboveCTotal").append("<b>"+sum(age66to70MC.length,age66to70FC.length)+"</b>");

    $("#y66aboveJM").text(age66to70MJ.length);
    $("#y66aboveJF").text(age66to70FJ.length);
    $("#y66aboveJTotal").append("<b>"+sum(age66to70MJ.length,age66to70FJ.length)+"</b>");

    $("#y66abovePM").text(age66to70MP.length);
    $("#y66abovePF").text(age66to70FP.length);
    $("#y66abovePTotal").append("<b>"+sum(age66to70MP.length,age66to70FP.length)+"</b>");

    $("#y66aboveEM").text(age66to70ME.length);
    $("#y66aboveEF").text(age66to70FE.length);
    $("#y66aboveETotal").append("<b>"+sum(age66to70ME.length,age66to70FE.length)+"</b>");

    $("#y66aboveCTM").text(age66to70MCT.length);
    $("#y66aboveCTF").text(age66to70FCT.length);
    $("#y66aboveCTTotal").append("<b>"+sum(age66to70MCT.length,age66to70FCT.length)+"</b>");


    $("#GTSTM").append("<b>"+m+"</b>");
    $("#GTSTF").append("<b>"+f+"</b>");
    $("#GTGTotal").append("<b>"+sum(m,f)+"</b>");

    $("#GTCM").text(age21to35MC.length+age36to45MC.length+age46to55MC.length+age56to65MC.length+age66to70MC.length);
    $("#GTCF").text(age21to35FC.length+age36to45FC.length+age46to55FC.length+age56to65FC.length+age66to70FC.length);
    $("#GTCTotal").append("<b>"+sum($("#GTCM").text(),$("#GTCF").text())+"</b>");

    $("#GTJM").text(age21to35MJ.length+age36to45MJ.length+age46to55MJ.length+age56to65MJ.length+age66to70MJ.length);
    $("#GTJF").text(age21to35FJ.length+age36to45FJ.length+age46to55FJ.length+age56to65FJ.length+age66to70FJ.length);
    $("#GTJTotal").append("<b>"+sum($("#GTJM").text(),$("#GTJF").text())+"</b>");

    $("#GTPM").text(age21to35MP.length+age36to45MP.length+age46to55MP.length+age56to65MP.length+age66to70MP.length);
    $("#GTPF").text(age21to35FP.length+age36to45FP.length+age46to55FP.length+age56to65FP.length+age66to70FP.length);
    $("#GTPTotal").append("<b>"+sum($("#GTPM").text(),$("#GTPF").text())+"</b>");

    $("#GTEM").text(age21to35ME.length+age36to45ME.length+age46to55ME.length+age56to65ME.length+age66to70ME.length);
    $("#GTEF").text(age21to35FE.length+age36to45FE.length+age46to55FE.length+age56to65FE.length+age66to70FE.length);
    $("#GTETotal").append("<b>"+sum($("#GTEM").text(),$("#GTEF").text())+"</b>");

    $("#GTCTM").text(age21to35MCT.length+age36to45MCT.length+age46to55MCT.length+age56to65MCT.length+age66to70MCT.length);
    $("#GTCTF").text(age21to35FCT.length+age36to45FCT.length+age46to55FCT.length+age56to65FCT.length+age66to70FCT.length);
    $("#GTCTTotal").append("<b>"+sum($("#GTCTM").text(),$("#GTCTF").text())+"</b>");
}

function sum(m,f){
    return parseInt(m)+parseInt(f);
}


function composeData() {
    var data=[];
    var items1=[];
    items1.push("1-10 years");
    items1.push(age21to35M.length);
    items1.push(age21to35F.length);
    data.push(items1);
    var items2=[];
    items2.push("11-20 years");
    items2.push(age36to45M.length);
    items2.push(age36to45F.length);
    data.push(items2);
    var items3=[];
    items3.push("21-30 years");
    items3.push(age46to55M.length);
    items3.push(age46to55F.length);
    data.push(items3);
    var items4=[];
    items4.push("31-40 years");
    items4.push(age56to65M.length);
    items4.push(age56to65F.length);
    data.push(items4);
    var items5=[];
    items5.push("41 years and above");
    items5.push(age66to70M.length);
    items5.push(age66to70F.length);
    data.push(items5);
    console.log(JSON.stringify(data));
    return data;
}

function generateChart(data){
    var chartObj = new Object();
    chartObj['chartName'] = 'engDiv';
    chartObj['chartTitle'] = 'Years in Public Service';
    chartObj['data'] = composeData();
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Years in Public Service Analytics');
        data.addColumn('number', 'Total Number of Male Employees');
        data.addColumn('number', 'Total Number of Female Employees');

        data.addRows(chartObj.data);
        var options = {
            title: chartObj.chartTitle,
          chartArea: {
                width: 500,
                right: 10,
                left:150
            },
            legend: { position: 'bottom', alignment: 'start' },
            colors: ['#1976d2','#e53935'],
            hAxis: {
                title: '',
                minValue: 0,
                format: ' '
            },
            bar: {groupWidth: 20}
        };
        var chart = new google.visualization.BarChart(document.getElementById('divGraph'));   
        var height = data.getNumberOfRows() * 41 + 30;
        $("#divGraph").height(height);
        chart.draw(data, options);
    }
}
$('#exportPDF').click(function(){
    $("#container").print({
        prepend: '<table align="center"><tr><td><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="10px"></td><td><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td witdh="100px"></td></tr></table><br><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+moment().format("MMM DD YYYY hh:mm:ss A")+'</span>'
    });
});
</script>
<style type="text/css">
   table.tblanalytics td{
        padding: 5px;
        color: black;
    }
   table.tblanalytics2 td{
        padding: 5px;
        color: black;
        text-align: center;
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

       #exportPDF {
           visibility: hidden;
       }
   }
</style>
