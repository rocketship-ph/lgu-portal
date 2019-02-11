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
                    <a href="<?php echo base_url();?>cscreports/fieldofexpertise" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Field of Expertise
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
    <div class="col-md-12" id="container">
        <legend>Field of Expertise </legend>
           <button id="exportPDF" class="btn btn-success btn-xs pull-right">Export as PDF</button><br><br>
        <div class="row">
            <div class="col-md-12">
                <h5 id="tblmsg1" style="display:none"></h5>
                <div class="table-responsive" id="tblcont1" style="display: none">
                 <table class="tblanalytics" style="width: 100%;" border="2" cellpadding="10" > 
                    <tbody id="tbldata"> 
                    </tbody> 
                 </table>
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
//                    generateChart(data.details);
//                    console.log(data.details);
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
    var age21to35M = [];
    var age36to45M = [];
    var age46to55M = [];
    var age56to65M = [];
    var age66to70M = [];
    var age21to35F = [];
    var age36to45F = [];
    var age46to55F = [];
    var age56to65F = [];
    var age66to70F = [];
    var m =0;
    var f =0;
    var positions = {}

    var cdata =[];
function countAgeRange(data){
    // data = JSON.parse('[{ "username": "HRD1234567890", "firstname": "JUANA", "middlename": "SANTOS", "lastname": "DELA CRUZ", "nameextension": "", "dateofbirth": "05/31/2018", "placeofbirth": "CAVITE", "age": "0", "gender": "MALE", "currentposition": "HR MANAGER", "employmentstatus": "CASUAL", "datecurrentposition": "04/12/2012", "yearsincurrentposition": "6", "dateenteredlgu": "02/07/2017", "yearsofservice": "1", "department": "HUMAN RESOURCE", "salarygrade": "1", "fieldofexpertise": "General Adm. Services", "positionlevel": "", "civilservice": "", "highesteduc": "MASTERS IN BUSINESS MANAGEMENT" }, { "username": "ITMGR001", "firstname": "ANTONIO", "middlename": "A", "lastname": "LUNA", "nameextension": "", "dateofbirth": "06/09/2018", "placeofbirth": "CARMONA CAVITE", "age": "0", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "", "salarygrade": "2", "fieldofexpertise": "General Adm. Services", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "DEPTHEAD001", "firstname": "GABRIELA", "middlename": "MAY", "lastname": "SILANG", "nameextension": "", "dateofbirth": "07/12/1984", "placeofbirth": "CARMONA CAVITE", "age": "34", "gender": "FEMALE", "currentposition": "DEPARTMENT HEAD", "employmentstatus": "- Select Employment Type -", "datecurrentposition": "07/01/2017", "yearsincurrentposition": "1", "dateenteredlgu": "", "yearsofservice": null, "department": "HUMAN RESOURCE", "salarygrade": "3", "fieldofexpertise": "General Adm. Services", "positionlevel": "", "civilservice": "", "highesteduc": "BS OFFICE MANAGEMENT" }, { "username": "1234", "firstname": "ANGELO", "middlename": "NIEVA", "lastname": "BERROYA", "nameextension": "", "dateofbirth": "08/11/1998", "placeofbirth": "MIAMI FLORIDA", "age": "20", "gender": "MALE", "currentposition": "CEU", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "2", "fieldofexpertise": "Financial Services", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "0748", "firstname": "MICHAEL", "middlename": "A", "lastname": "IMPERIAL", "nameextension": "", "dateofbirth": "10/08/2003", "placeofbirth": "QUEZON CITY", "age": "15", "gender": "MALE", "currentposition": "CEO", "employmentstatus": "JOBORDER", "datecurrentposition": "08/20/2018", "yearsincurrentposition": "0", "dateenteredlgu": "08/29/2018", "yearsofservice": "0", "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "5", "fieldofexpertise": "Financial Services", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "1185", "firstname": "JULITO", "middlename": "SINGKO", "lastname": "RASONABE", "nameextension": "JR.", "dateofbirth": "04/09/1998", "placeofbirth": "MUNTINLUPA CITY", "age": "20", "gender": "MALE", "currentposition": "SUPERVISOR", "employmentstatus": "CASUAL", "datecurrentposition": "08/24/2018", "yearsincurrentposition": "0", "dateenteredlgu": "08/14/2018", "yearsofservice": "0", "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "7", "fieldofexpertise": "Financial Services", "positionlevel": "", "civilservice": "", "highesteduc": "BS IN WELDING MACHINERY" }, { "username": "0335", "firstname": "TIMOTHY", "middlename": "ORTIZ", "lastname": "ERCIA", "nameextension": "", "dateofbirth": "11/17/1998", "placeofbirth": "SAN PEDRO", "age": "20", "gender": "MALE", "currentposition": "CONSULTANT", "employmentstatus": "JOBORDER", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ACCOUNTING", "salarygrade": "7", "fieldofexpertise": "Planning Services", "positionlevel": "", "civilservice": "[]", "highesteduc": "PH.D" }, { "username": "1927", "firstname": "ERIC JOHN", "middlename": "SEGUI", "lastname": "ESCOBIDO", "nameextension": "NA", "dateofbirth": "05/16/1994", "placeofbirth": "QUEZON CITY", "age": "24", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ACCOUNTING", "salarygrade": "7", "fieldofexpertise": "Executive Service", "positionlevel": "", "civilservice": "[]", "highesteduc": "BSCS" }, { "username": "1993", "firstname": "MARK JENTRY", "middlename": "PEñAFUERTE", "lastname": "GALANG", "nameextension": "", "dateofbirth": "01/25/1998", "placeofbirth": "PERPETUAL LAS PIñAS", "age": "20", "gender": "MALE", "currentposition": "PRESIDENT OF THE UNITED STATES OF AMERICA", "employmentstatus": "COTERMINOUS", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "08/05/2018", "yearsofservice": "0", "department": "MAINTENANCE", "salarygrade": "7", "fieldofexpertise": "Executive Service", "positionlevel": "", "civilservice": "[]", "highesteduc": "PH.D" }, { "username": "1200", "firstname": "RAMIEL", "middlename": "MARCELLANA", "lastname": "MANALO", "nameextension": "", "dateofbirth": "02/07/1999", "placeofbirth": "BIñAN, LAGUNA", "age": "19", "gender": "MALE", "currentposition": "ASEC", "employmentstatus": "CASUAL", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ACCOUNTING", "salarygrade": "5", "fieldofexpertise": "Legislative Service", "positionlevel": "", "civilservice": "[]", "highesteduc": "BA FILM" }, { "username": "2153", "firstname": "MARK EDSEN", "middlename": "MADROGABA", "lastname": "MAULION", "nameextension": "", "dateofbirth": "05/13/2018", "placeofbirth": "LUCENA", "age": "0", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "11", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "NONE" }, { "username": "0323", "firstname": "MARK DANIEL", "middlename": "I.", "lastname": "MILAR", "nameextension": "", "dateofbirth": "09/24/1995", "placeofbirth": "BALIBAGO STA.ROSA LAGUNA", "age": "23", "gender": "MALE", "currentposition": "N/A", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "11", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "GRADUATE" }, { "username": "1155", "firstname": "ROBIN CHRISTIAN", "middlename": "MAGCALE", "lastname": "OLIVAREZ", "nameextension": "", "dateofbirth": "08/15/2018", "placeofbirth": "PLATERO", "age": "0", "gender": "MALE", "currentposition": "EMPLOYEE", "employmentstatus": "PLANTILLA", "datecurrentposition": "08/15/2018", "yearsincurrentposition": "0", "dateenteredlgu": "08/28/2018", "yearsofservice": "0", "department": "ACCOUNTING", "salarygrade": "12", "fieldofexpertise": "", "positionlevel": "", "civilservice": "[]", "highesteduc": "" }, { "username": "0931", "firstname": "ROEL", "middlename": "CABUNGCAL", "lastname": "PANTOJA", "nameextension": "NA", "dateofbirth": "08/10/2018", "placeofbirth": "OSPITAL", "age": "0", "gender": "MALE", "currentposition": "NA", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "08/06/2018", "yearsofservice": "0", "department": "MAINTENANCE", "salarygrade": "3", "fieldofexpertise": "", "positionlevel": "", "civilservice": "[]", "highesteduc": "BSCS" }, { "username": "0919", "firstname": "JOHN ROGER", "middlename": "VILLANUEVA", "lastname": "SANTOS", "nameextension": "", "dateofbirth": "01/30/1995", "placeofbirth": "MANILA", "age": "23", "gender": "MALE", "currentposition": "NA", "employmentstatus": "CASUAL", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "16", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "BSCS" }, { "username": "0302", "firstname": "VICTOR", "middlename": "CARDO", "lastname": "MAGTANGGOL", "nameextension": "", "dateofbirth": "01/02/1992", "placeofbirth": "ASGARD, NINE REALMS", "age": "27", "gender": "MALE", "currentposition": "NA", "employmentstatus": "CASUAL", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "05/17/2017", "yearsofservice": "1", "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "14", "fieldofexpertise": "", "positionlevel": "", "civilservice": "[]", "highesteduc": "EARTH AND PLANETARY SCIENCES, PH. D." }, { "username": "2178", "firstname": "P.C.", "middlename": "E.", "lastname": "TAYO", "nameextension": "NA", "dateofbirth": "06/12/1997", "placeofbirth": "PASIG CITY, PHILIPPINES", "age": "21", "gender": "MALE", "currentposition": "NA", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "16", "fieldofexpertise": "", "positionlevel": "", "civilservice": "[]", "highesteduc": "" }, { "username": "0246", "firstname": "ARNOLD", "middlename": "PURIFICACION", "lastname": "TUAZON", "nameextension": "JR.", "dateofbirth": "09/15/1997", "placeofbirth": "BIñAN, LAGUNA", "age": "21", "gender": "MALE", "currentposition": "STOCK HOLDER", "employmentstatus": "COTERMINOUS", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "14", "fieldofexpertise": "", "positionlevel": "", "civilservice": null, "highesteduc": "PHD" }, { "username": "0897", "firstname": "MARK JESSIE", "middlename": "KARAMIHAN", "lastname": "VILLANUEVA", "nameextension": "", "dateofbirth": "06/21/1997", "placeofbirth": "BIñAN", "age": "21", "gender": "MALE", "currentposition": "STAFF", "employmentstatus": "CASUAL", "datecurrentposition": "08/06/2018", "yearsincurrentposition": "0", "dateenteredlgu": "08/06/2018", "yearsofservice": "0", "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "17", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "BACHELOR OF SCIENCE IN COMPUTER SCIENCE" }, { "username": "0381", "firstname": "JOHN", "middlename": "PHILIPS", "lastname": "KIRKLAND", "nameextension": "", "dateofbirth": "08/11/1998", "placeofbirth": "PARANAQUE CITY", "age": "20", "gender": "MALE", "currentposition": "HAM,AMA,", "employmentstatus": "PLANTILLA", "datecurrentposition": "08/22/2018", "yearsincurrentposition": "0", "dateenteredlgu": "08/17/2018", "yearsofservice": "0", "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "17", "fieldofexpertise": "", "positionlevel": "", "civilservice": "[]", "highesteduc": "IPOT" }, { "username": "GSO-004", "firstname": "ANTHONY ", "middlename": "A", "lastname": "BATHAN", "nameextension": "N", "dateofbirth": "03/20/1992", "placeofbirth": "CARMONA, CAVITE", "age": "26", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "GENERAL SERVICE OFFICE (GSO)", "salarygrade": "10", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "GSO-005", "firstname": "CAVEN FRANCIS", "middlename": "SALVADOR", "lastname": "BENUSA", "nameextension": "", "dateofbirth": "02/10/1988", "placeofbirth": "CARMONA", "age": "30", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "GENERAL SERVICE OFFICE (GSO)", "salarygrade": "16", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "ADMIN-011", "firstname": "JOHN ANGELO", "middlename": "T", "lastname": "ESCUETA", "nameextension": "NA", "dateofbirth": "11/29/1979", "placeofbirth": "CARMONA", "age": "39", "gender": "MALE", "currentposition": "", "employmentstatus": "- Select Employment Type -", "datecurrentposition": null, "yearsincurrentposition": null, "dateenteredlgu": "", "yearsofservice": null, "department": "ADMINISTRATIVE DEPARTMENT", "salarygrade": "15", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "" }, { "username": "AO-001", "firstname": "JEFFERSON", "middlename": "G", "lastname": "DUMAPLIN", "nameextension": "", "dateofbirth": "08/31/1989", "placeofbirth": "CARMONA, CAVITE", "age": "29", "gender": "MALE", "currentposition": "WATCHMAN", "employmentstatus": "- Select Employment Type -", "datecurrentposition": "02/10/2010", "yearsincurrentposition": "8", "dateenteredlgu": "", "yearsofservice": null, "department": "ASSESSOR\'S OFFICE (AO)", "salarygrade": "14", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "BS BUSINESS ADMINISTRATION" }, { "username": "CPM-002", "firstname": "JED RAMILO", "middlename": "G", "lastname": "DRIZ", "nameextension": "", "dateofbirth": "02/19/1987", "placeofbirth": "CARMONA, CAVITE", "age": "31", "gender": "MALE", "currentposition": "WATCHMAN", "employmentstatus": "- Select Employment Type -", "datecurrentposition": "02/09/2010", "yearsincurrentposition": "8", "dateenteredlgu": "", "yearsofservice": null, "department": "CARMONA PUBLIC MARKET", "salarygrade": "10", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "BS INFORMATION TECHNOLOGY MANAGEMENT" }, { "username": "CSU-007", "firstname": "FROILAN", "middlename": "A", "lastname": "CRUZ", "nameextension": "", "dateofbirth": "11/11/1993", "placeofbirth": "MANDALUYONG CITY", "age": "25", "gender": "MALE", "currentposition": "WATCHMAN", "employmentstatus": "- Select Employment Type -", "datecurrentposition": "09/01/2009", "yearsincurrentposition": "9", "dateenteredlgu": "", "yearsofservice": null, "department": "CIVIL SECURITY UNIT (CSU)", "salarygrade": "10", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "MS PSYCHOLOGY" }, { "username": "CSU-008", "firstname": "HELEN GRACE", "middlename": "S", "lastname": "DELA CRUZ", "nameextension": "", "dateofbirth": "02/21/1968", "placeofbirth": "CARMONA, CAVITE", "age": "50", "gender": "FEMALE", "currentposition": "HEAD NURSE", "employmentstatus": "PLANTILLA", "datecurrentposition": "12/10/1990", "yearsincurrentposition": "28", "dateenteredlgu": "09/01/1995", "yearsofservice": "23", "department": "CIVIL SECURITY UNIT (CSU)", "salarygrade": "11", "fieldofexpertise": "", "positionlevel": "", "civilservice": "", "highesteduc": "MS NURSING CARE HEALTH" }]');
    var datax = [];
    var item = [];
    var ctrm =0;
    var ctrf =0;
    for(var i=0;i<data.length;i++) {
        var value = data[i]['fieldofexpertise'].toUpperCase();
        var val =[];
        if(value!=""&&value!=null&&value!="null"){
            if(data[i]['gender']=="MALE"){
                 item.push("*M*"+value);
                  ctrm++;
            } else {
                 item.push("*F*"+value);
                 ctrf++;
            }
           
        } else {
            if(data[i]['gender']=="MALE"){
                 item.push("*M*"+value);
                  ctrm++;
            } else {
                 item.push("*F*"+value);
                 ctrf++;
            }
        }
    }

    item.sort();
    var current = null;
    var cnt = 0;
    for (var i = 0; i < item.length; i++) {
        if (item[i] != current) {
            if (cnt > 0) {
                var temp = [];
                temp.push(current);
                temp.push(cnt);
                datax.push(temp);
            }
            current = item[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }
    if (cnt > 0) {
        var temp = [];
        temp.push(current);
        temp.push(cnt);
        datax.push(temp);
    }
    $("#tbldata").append('<tr> <td><b>Field of Expertise/Specialization</b></td> <td width="15%"><b>Male</b></td> <td width="15%"><b>Female</b></td> <td width="15%"><b>Total</b></td> </tr>');
     var obj = [];
    var cur = null;
    var sg = [];
    var val = [];
    for(var i=0; i<datax.length;i++){
        var item = {}
        var d = datax[i][0];
        var dx = d.replace("*M*","").replace("*F*","");
        item["sg"] = dx;
        if(datax[i][0].substring(0, 3)=="*M*"){
                item["m"] = true;
                item["value"] = parseInt(datax[i][1]);
               
            } else {
                item["f"] = true;
                item["value"] = parseInt(datax[i][1]);
                
            }
        
        obj.push(item);
      
    }
    sortByKeyAsc(obj, "sg");
    var newObj = {};
    for(i in obj){
            var item = obj[i];
        if(newObj[item.sg] === undefined){
            newObj[item.sg] = 0;
        }
        newObj[item.sg] += item.value;
    }
    var result = {};
    result.rows = [];


    for(i in newObj){
          var m =0, f=0;
            for(x in obj){
            var item = obj[x];
          if(i==item.sg && item.m){
             m = item.value;
          } else if(i==item.sg && item.f){
             f = item.value;
          }
        }
          result.rows.push({'sg':i,'total':newObj[i],'m':m,'f':f});
        if(i==""){
            $("#tbldata").append('<tr> <td>N/A</td> <td>'+m+'</td> <td>'+f+'</td> <td><b>'+newObj[i]+'</b></td> </tr>');
        } else {
             $("#tbldata").append('<tr> <td>'+i+'</td> <td>'+m+'</td> <td>'+f+'</td> <td><b>'+newObj[i]+'</b></td> </tr>');
        }
        
        var cobj=[];
         if(i==""){
             cobj.push("N/A");
         } else {
            cobj.push(i);
         }
        cobj.push(m);
        cobj.push(f);
        cdata.push(cobj);
    }

        $("#tbldata").append('<tr> <td><b>Grand Total</b></td> <td><b>'+ctrm+'</b></td> <td><b>'+ctrf+'</b></td> <td><b>'+sum(ctrm,ctrf)+'</b></td> </tr>');
//    generateChart(cdata);
}
function sortByKeyAsc(array, key) {
    return array.sort(function (a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}
function hasName(prop, value, data) {
    return data.some(function(obj) {
        return prop in obj && obj[prop] === value;
    });
}

function getIndex(data, val){
    var index = data.findIndex(function(item, i){
      return item.name === val
    });
}

function sum(m,f){
    return parseInt(m)+parseInt(f);
}

function generateChart(data){
    var chartObj = new Object();
    chartObj['chartName'] = 'engDiv';
    chartObj['chartTitle'] = 'Field of Expertise';
    chartObj['data'] = cdata;
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Field of Expertise ');
        data.addColumn('number', 'Total Number of Male Employees');
        data.addColumn('number', 'Total Number of Female Employees');

        data.addRows(chartObj.data);
        var options = {
            title: chartObj.chartTitle,
            chartArea: {
                width: 500,
                right: 10,
                left:400
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
        prepend: '<table align="center"><tr><td width="20%" valign="top"><img style="height: 100px;width: 100px" src="data:image/png;base64,<?php echo $this->session->userdata('logo'); ?>" ></td><td width="60%"><p align="center">Republic of the Philippines<br>Province of Cavite<br><b>MUNICIPALITY OF CARMONA</b><br><h4 align="center">HUMAN RESOURCE MANAGEMENT OFFICE</h4></p></td><td width="20%"></td></tr></table><br><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+moment().format("MMM DD YYYY hh:mm:ss A")+'</span>'
    });
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

        #exportPDF {
            visibility: hidden;
        }
    }
</style>