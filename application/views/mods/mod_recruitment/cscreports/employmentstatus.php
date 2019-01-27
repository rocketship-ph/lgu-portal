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
                <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>CSC Required Reports Menu</h4>
                <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
            </td>
            <td align="center" width="20px">

            </td>
            <td style="border: 1px solid #d1d1d1" >
            <td align="center" width="20px" >

            </td>
            <td>
                <div class="panel panel-menu" align="center" id="panel_requestpersonnelreports">
                    <a href="<?php echo base_url();?>cscreports/employmentstatus" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/generic_report.png" height="40px">
                        <br>
                        Employment Status
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
            <legend>Employment Status </legend>
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

        var datax = [];
        var item = [];
        var ctrm =0;
        var ctrf =0;
        for(var i=0;i<data.length;i++) {
            var value = data[i]['employmentstatus'].toUpperCase();
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
        $("#tbldata").append('<tr> <td><b>Employment Status</b></td> <td width="15%"><b>Male</b></td> <td width="15%"><b>Female</b></td> <td width="15%"><b>Total</b></td> </tr>');
        var obj = [];
        var cur = null;
        var sg = [];
        var val = [];
        for(var i=0; i<datax.length;i++){
            var item = {}
            var d = datax[i][0].replace("- SELECT EMPLOYMENT TYPE -", "N/A");
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
        //generateChart(cdata);
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
        chartObj['chartTitle'] = 'Employment Status';
        chartObj['data'] = cdata;
        google.charts.setOnLoadCallback(function() {
            drawChart();
        });
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Employment Status ');
            data.addColumn('number', 'Total Number of Male Employees');
            data.addColumn('number', 'Total Number of Female Employees');

            data.addRows(chartObj.data);
            var options = {
                title: chartObj.chartTitle,
                chartArea: {
                    width: 500,
                    right: 10,
                    left:200
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