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
                        Employment Status Analytics
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
    <div class="col-md-12">
        <legend>Employment Status Analytics</legend>
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
    $("#nav_analytics_reports").removeClass().addClass("active");

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
function countAgeRange(data){
    
    for(var i=0;i<data.length;i++) {
        var value = data[i]['employmentstatus'].toUpperCase();
        if(value!=""&&value!=null&&value!="null"){
            if(value=="PERMANENT"){
                if(data[i]['gender']=="MALE"){
                    age21to35M.push(value);
                    m++;
                } else {
                    age21to35F.push(value);
                    f++;
                }
            } else if (value=="ELECTED"){
                  if(data[i]['gender']=="MALE"){
                    age36to45M.push(value);
                    m++;
                } else {
                    age36to45F.push(value);
                    f++;
                }
            }else if (value=="CO-TERMINOUS"){
                  if(data[i]['gender']=="MALE"){
                    age46to55M.push(value);
                    m++;
                } else {
                    age46to55F.push(value);
                    f++;
                }
            }else if (value=="CASUAL"){
                  if(data[i]['gender']=="MALE"){
                    age56to65M.push(value);
                    m++;
                } else {
                    age56to65F.push(value);
                    f++;
                }
            }else{
                  if(data[i]['gender']=="MALE"){
                    age66to70M.push(value);
                    m++;
                } else {
                    age66to70F.push(value);
                    f++;
                }
            }
        }
    }
    $("#tblcont1").append('<table class="tblanalytics" style="width: 100%;" border="2" cellpadding="10" > <tbody> <tr> <td><b>Status</b></td> <td width="15%"><b>Male</b></td> <td width="15%"><b>Female</b></td> <td width="15%"><b>Total</b></td> </tr> <tr> <td>Permanent</td> <td>'+age21to35M.length+'</td> <td>'+age21to35F.length+'</td> <td><b>'+sum(age21to35M.length,age21to35F.length)+'</b></td> </tr> <tr> <td>Elected</td> <td>'+ age36to45M.length +'</td> <td>'+age36to45F.length+'</td> <td><b>'+sum(age36to45M.length,age36to45F.length)+'</b></td> </tr> <tr> <td>Co-terminous</td> <td>'+age46to55M.length+'</td> <td>'+age46to55F.length+'</td> <td><b>'+sum(age46to55M.length,age46to55M.length)+'</b></td> </tr> <tr> <td>Casual</td> <td>'+age56to65M.length+'</td> <td>'+age56to65F.length+'</td> <td><b>'+sum(age56to65M.length,age56to65F.length)+'</b></td> </tr> <tr> <td>Job Order</td> <td>'+age66to70M.length+'</td> <td>'+age66to70F.length+'</td> <td><b>'+sum(age66to70M.length,age66to70F.length)+'</b></td> </tr> <tr> <td><b>Grand Total</b></td> <td><b>'+m+'</b></td> <td><b>'+f+'</b></td> <td><b>'+sum(m,f)+'</b></td> </tr> </tbody> </table>');
}

function sum(m,f){
    return parseInt(m)+parseInt(f);
}


function composeData() {
    var data=[];
    var items1=[];
    items1.push("Permanent");
    items1.push(age21to35M.length);
    items1.push(age21to35F.length);
    data.push(items1);
    var items2=[];
    items2.push("Elected");
    items2.push(age36to45M.length);
    items2.push(age36to45F.length);
    data.push(items2);
    var items3=[];
    items3.push("Co-terminous");
    items3.push(age46to55M.length);
    items3.push(age46to55F.length);
    data.push(items3);
    var items4=[];
    items4.push("Casual");
    items4.push(age56to65M.length);
    items4.push(age56to65F.length);
    data.push(items4);
    var items5=[];
    items5.push("Job Order");
    items5.push(age66to70M.length);
    items5.push(age66to70F.length);
    data.push(items5);
    console.log(JSON.stringify(data));
    return data;
}

function generateChart(data){
    var chartObj = new Object();
    chartObj['chartName'] = 'engDiv';
    chartObj['chartTitle'] = 'Employment Status';
    chartObj['data'] = composeData();
    google.charts.setOnLoadCallback(function() {
        drawChart();
    });
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Employment Status Analytics');
        data.addColumn('number', 'Total Number of Male Employees');
        data.addColumn('number', 'Total Number of Female Employees');

        data.addRows(chartObj.data);
        var options = {
            title: chartObj.chartTitle,
            chartArea: {
                width: '70%'
            },
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
 
</script>
<style type="text/css">
    table.tblanalytics td{
        padding: 5px;
        color: black;
    }
</style>