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
        <td rowspan="2" width="15px" >
         
        </td>
        <td colspan="4">
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>Analytics Menu</h4>
            <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
        </td>
        <td align="center" width="20px">
          
        </td>
        <td style="border: 1px solid #d1d1d1" >
            <td align="center" width="20px" >
          
            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>analytics/yearsinserviceanalytics" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Department Analytics
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
        <legend>Complement by Department Analytics</legend>
                   <button id="exportPDF" class="btn btn-success btn-xs pull-right">Export as PDF</button><br><br>
        <div class="row">
            <div class="col-md-12">
                <h5 id="tblmsg1" style="display:none"></h5>
                <div class="table-responsive" id="tblcont1" style="display: none">
                    <table class="tblanalytics" style="width: 100%;" border="2" cellpadding="10" id="tbl2" >
                        <tbody id="tbldata2">
                        </tbody>
                    </table>
                    <br>
                    <table class="tblanalytics2" style="width: 100%;" border="2" cellpadding="10" id="tbl" >
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
var dt = null;
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
                    dt = data.details;
                    countAgeRange2(data.details);
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
var   counts = {}
var res = null;
function countAgeRange2(data){
    var datax = [];
    var item = [];
    var ctrm =0;
    var ctrf =0;
    for(var i=0;i<data.length;i++) {
        var value = data[i]['department'].toUpperCase();
        var val =[];
        if(value!=""&&value!=null&&value!="null"){
            if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MCA*"+value);
                    ctrm++;
                } else {
                    item.push("*FCA*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MPE*"+value);
                    ctrm++;
                } else {
                    item.push("*FPE*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MEL*"+value);
                    ctrm++;
                } else {
                    item.push("*FEL*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MCT*"+value);
                    ctrm++;
                } else {
                    item.push("*FCT*"+value);
                    ctrf++;
                }
            } else {
                if(data[i]['gender']=="MALE"){
                    item.push("*MJO*"+value);
                    ctrm++;
                } else {
                    item.push("*FJO*"+value);
                    ctrf++;
                }
            }

        } else {
            if(data[i]['employmentstatus'].toUpperCase()=="CASUAL"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MCA*"+value);
                    ctrm++;
                } else {
                    item.push("*FCA*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="PERMANENT"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MPE*"+value);
                    ctrm++;
                } else {
                    item.push("*FPE*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="ELECTED"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MEL*"+value);
                    ctrm++;
                } else {
                    item.push("*FEL*"+value);
                    ctrf++;
                }
            } else if(data[i]['employmentstatus'].toUpperCase()=="CO-TERMINOUS"){
                if(data[i]['gender']=="MALE"){
                    item.push("*MCT*"+value);
                    ctrm++;
                } else {
                    item.push("*FCT*"+value);
                    ctrf++;
                }
            } else {
                if(data[i]['gender']=="MALE"){
                    item.push("*MJO*"+value);
                    ctrm++;
                } else {
                    item.push("*FJO*"+value);
                    ctrf++;
                }
            }
        }
    }

    item.sort();

    jQuery.each(item, function(key,value) {
        if (!counts.hasOwnProperty(value)) {
            counts[value] = 1;
        } else {
            counts[value]++;
        }
    });
    console.log(JSON.stringify(counts));

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
    $("#tbldata2").append('<tr>\n' +
        '                             <td rowspan="2" width="10%"><b>Age Range</b></td>\n' +
        '                             <td colspan="2"><b>Permanent</b></td>\n' +
        '                             <td rowspan="2"><b>TOTAL</b></td>\n' +
        '                             <td colspan="2"><b>Elected</b></td>\n' +
        '                             <td rowspan="2"><b>TOTAL</b></td>\n' +
        '                             <td colspan="2"><b>Co-terminous</b></td>\n' +
        '                             <td rowspan="2"><b>TOTAL</b></td>\n' +
        '                             <td colspan="2"><b>Casual</b></td>\n' +
        '                             <td rowspan="2"><b>TOTAL</b></td>\n' +
        '                             <td colspan="2"><b>Job Order</b></td>\n' +
        '                             <td rowspan="2"><b>TOTAL</b></td>\n' +
        '                             <td colspan="2"><b>SUB-TOTAL</b></td>\n' +
        '                             <td rowspan="2"><b>GRAND TOTAL</b></td>\n' +
        '                          </tr>\n' +
        '                          <tr>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                             <td width="5%">M</td>\n' +
        '                             <td width="5%">F</td>\n' +
        '                          </tr>');
    var obj = [];
    var cur = null;
    var sg = [];
    var val = [];
    for(var i=0; i<datax.length;i++){
        var item = {}
        var d = datax[i][0];
        var dx = d.substring(5);
        item["sg"] = dx;
        item["d"] = d.substring(0, 5);
        if(datax[i][0].substring(0, 2)=="*M"){
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
        result.rows.push({'sg':i,'total':newObj[i],'m':m,'f':f,'d':item.d});


        if(i==""){
            $("#tbldata2").append(' <tr>\\n\' +\n' +
                '                \'                             <td>N/A</td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MPE*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FPE*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MPE*"+i)),parseInt(countData("*FPE*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MEL*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FEL*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MEL*"+i)),parseInt(countData("*FEL*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MCT*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FCT*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MCT*"+i)),parseInt(countData("*FCT*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MCA*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FCA*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MCA*"+i)),parseInt(countData("*FCA*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MJO*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FJO*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MJO*"+i)),parseInt(countData("*FJO*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>X'+m+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>X'+f+'</span></td>\\n\' +\n' +
                '                \'                             <td><span><b>'+newObj[i]+'</b></span></td>\\n\' +\n' +
                '                \'                          </tr>');
        } else {
            $("#tbldata2").append(' <tr>\\n\' +\n' +
                '                \'                             <td>'+i+'</td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MPE*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FPE*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MPE*"+i)),parseInt(countData("*FPE*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MEL*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FEL*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MEL*"+i)),parseInt(countData("*FEL*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MCT*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FCT*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MCT*"+i)),parseInt(countData("*FCT*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MCA*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FCA*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MCA*"+i)),parseInt(countData("*FCA*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*MJO*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span >'+countData("*FJO*"+i)+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+sum(parseInt(countData("*MJO*"+i)),parseInt(countData("*FJO*"+i)))+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+m+'</span></td>\\n\' +\n' +
                '                \'                             <td><span>'+f+'</span></td>\\n\' +\n' +
                '                \'                             <td><span><b>'+newObj[i]+'</b></span></td>\\n\' +\n' +
                '                \'                          </tr>');
        }


    }
    result.rows.sort();
    console.log(JSON.stringify(result.rows));
    res = result.rows;
//    sortTable('tbl2');
    var $tBodies = $('tbody').sort(function(a, b){
        var aVal = +($(a).find('tr:first td').eq(1).text().trim() || 0);
        var bVal = +($(b).find('tr:first td').eq(1).text().trim() || 0);
        return aVal - bVal;
    });

    $('tbl2').append($tBodies);
    $("#tbldata2").append('<tr>\\n\' +\n' +
        '                \'                             <td><b>Grand Total</b></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*MPE*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*FPE*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*MPE*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*MEL*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*FEL*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*MEL*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*MCT*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*FCT*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span >'+sumTotal("*MCT*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*MCA*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*FCA*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*MCA*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*MJO*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*FJO*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+sumTotal("*MJO*")+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+ctrm+'</span></td>\\n\' +\n' +
        '                \'                             <td><span>'+ctrf+'</span></td>\\n\' +\n' +
        '                \'                             <td><span><b>'+sum(ctrm,ctrf)+'</b></span></td>\\n\' +\n' +
        '                \'                          </tr>');

    generateChart(cdata);
}

function sumTotal(name){
    var count = 0;
    for (var i = 0; i< res.length; i++) {
        if(res[i].d===name){
            if(name.charAt(1)==='M'){
                count+=res[i].m;
            }else {
                count+=res[i].f;
            }
        }
    }
    return count;
}

function countData(name){
    if(!counts.hasOwnProperty(name)){
        return 0;
    }
    return counts[name];
}

function sortByKeyAsc(array, key) {
    return array.sort(function (a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}
function countAgeRange(data){
    var datax = [];
    var item = [];
    var ctrm =0;
    var ctrf =0;
    for(var i=0;i<data.length;i++) {
        var value = data[i]['department'].toUpperCase();
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
    $("#tbldata").append('<tr> <td><b>Department</b></td> <td width="15%"><b>Male</b></td> <td width="15%"><b>Female</b></td> <td width="15%"><b>Total</b></td> </tr>');
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
    console.log(JSON.stringify(result.rows));

    $("#tbldata").append('<tr> <td><b>Grand Total</b></td> <td><b>'+ctrm+'</b></td> <td><b>'+ctrf+'</b></td> <td><b>'+sum(ctrm,ctrf)+'</b></td> </tr>');
    generateChart(cdata);
}
function sortTable(table) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById(table);
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];
            //check if the two rows should switch place:
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
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
    chartObj['chartTitle'] = 'Department';
    chartObj['data'] = cdata;
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Complement by Department Analytics');
        data.addColumn('number', 'Total Number of Male Employees');
        data.addColumn('number', 'Total Number of Female Employees');

        data.addRows(chartObj.data);
        data.sort({column: 0, asc: true});
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
    $('#exportPDF').click(function () {
    window.print();
});
</script>
<style type="text/css">
    table.tblanalytics2 td{
        padding: 5px;
        color: black;
    }
    table.tblanalytics td{
        padding: 5px;
        color: black;
        text-align: center;
    }
    @media print {
        body * {
            display:: none;
            visibility: hidden;
            top: 0;
        }

        #container, #container * {
            visibility: visible;
        }

        #container {
            position: absolute;
            left: 0;
            top: 0;
            margin-top: -650px;
        }

        #exportPDF {
            visibility: hidden;
        }
    }
</style>