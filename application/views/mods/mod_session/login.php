<h3><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Announcements</h3>
<div class="divAnnCont">
</div>
<div class="modal fade" id="modalSealOftransparency" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg" style="width:90%!important;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Seal of Transparency</legend>
                <div class="row">
                    <div class="col-md-12" style="height: 430px !important;overflow-y: auto">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3 form-group">
                            <label>Select quarter</label>
                            <select class="form-control clearField" id="month">
                                <option value="1,2,3" nameform="'January','February','March'">First quarter</option>
                                <option value="4,5,6" nameform="'April','May','June'">Second quarter</option>
                                <option value="7,8,9" nameform="'July','August','September'">Third quarter</option>
                                <option value="10,11,12" nameform="'October','November','December'">Fourth quarter</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Select year</label>
                            <select class="form-control clearField" id="year">
                            </select>
                        </div>
                       <div class="col-xs-12">
                           <legend>Number of recruitment done
                           </legend>
                           <div id="divGraph4"></div>
                       </div>
                        <div class="col-xs-12">
                            <legend>Number of qualified and non-qualified applicants and/or personnel per position
                            </legend>
                            <div id="divGraph3"></div>
                        </div>
                        <div class="col-xs-12">
                            <div id="divGraph2"></div>
                        </div>
                        <div class="col-xs-12">
                            <div id="divGraph"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="requestModal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request for New Personnel</legend>
                <div class="row">
                    <div class="col-md-12" style="height: 430px !important;overflow-y: auto">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="control-label">Request Number: <b id="lblreqnum"></b></h5>
                                <h5 class="control-label">Requestor: <b id="lblrequestor"></b><b>, Department Head</b></h5>
                                <h5 class="control-label">Position: <b id="lblposition"></b></h5>
                                <h5 class="control-label">Department: <b id="lbldepartment"></b></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="well" align="center" id="approveStamp">
                                    <div id="divApprovedWellHr">
                                        <h5 class="control-label" style="margin-top:0; !important;margin-bottom: 0 !important;"><span style="font-size: 11px;">Recommending Approved by</span><br>
                                            <b id="lblapprovedbyhr"></b>
                                            <br><span style="font-size: 11px;">HR Manager</span>
                                        </h5>
                                        <h5 style="margin-top: 0 !important;" class="control-label"><span style="font-size: 11px;" id="lbldatehr"></span><br><b ></b></h5>
                                    </div>
                                    <div id="divApprovedWellMayor">
                                        <h5 style="margin-bottom:0 !important;" class="control-label"><span style="font-size: 11px;">Approved by</span><br><b id="lblapprovedbymayor"></b>
                                            <br><span style="font-size: 11px;">Municipal Head</span></h5>
                                        <h5 class="control-label" style="margin-bottom:0; !important;margin-top: 0 !important;"><span style="font-size: 11px;" id="lblmayordate"></span><br><b ></b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0">
                        <h5><b>Basic Qualification</b></h5>
                        <div class="well">
                            <h5>Minimum Education : <b id="lbleducation"></b> Level</h5>
                            <h5>Experience : at least <b id="lblexperience"></b> year(s)</h5>
                            <h5>Training : at least <b id="lbltraining"></b> hour(s)</h5>
                            <h5>Civil Service Eligibility : <b id="lbleligibility"></b></h5>
                        </div>
                        <h5><b>Skills</b></h5>
                        <div class="well">
                            <div id="skillset">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div id="applyBtns" align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info btn-lg" id="btnApply">APPLY NOW</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="moreJobsModal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend><i class="fa fa-bullhorn"></i>&nbsp;Announcements</legend>
                <div class="row">
                    <div class="col-md-12" id="jobsCont" style="height: 430px !important;overflow-y: auto">

                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalTemporaryAccess" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request Sent</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <p>Your temporary login credentials: <br><br>Username <b id="useridtemp"></b> <br> temporary password is <b>12345</b>
                        </p>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload();">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalApply" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request for Access</legend>
                <div id="panelLogin">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">First Name<span style="color:red;font-weight: bold">*</span></label>
                                <input type="text" id="firstname" class="form-control clearField" style="text-transform: uppercase" placeholder="Firstname.." required="">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Middle Name<span style="color:red;font-weight: bold">*</span></label>
                                    <input type="text" id="middlename" class="form-control clearField" style="text-transform: uppercase" placeholder="Middlename.." required="">

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Last Name<span style="color:red;font-weight: bold">*</span></label>
                                    <input type="text" id="lastname" class="form-control clearField" style="text-transform: uppercase" placeholder="Lastname.." required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Contact Number<span style="color:red;font-weight: bold">*</span></label>
                                    <input type="text" id="contactnumber" class="form-control clearField" placeholder="Enter Contact number" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Email Address<span style="color:red;font-weight: bold">*</span></label>
                                    <input type="text" id="email" class="form-control clearField" placeholder="Enter Email Address" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Province<span style="color:red;font-weight: bold">*</span></label>
                                    <select class="form-control clearField" id="province">
                                        <option selected disabled>- Select Province -</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">City/Municipality<span style="color:red;font-weight: bold">*</span></label>
                                    <select class="form-control clearField" id="citymun">
                                        <option selected disabled>- Select City/Municipality -</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Barangay<span style="color:red;font-weight: bold">*</span></label>
                                    <select class="form-control clearField" id="brgy">
                                        <option selected disabled>- Select Barangay -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Specific Address<span style="color:red;font-weight: bold">*</span></label>
                                <input type="text" id="address" class="form-control clearField" placeholder="Lot #/Block #/Street Name/Subdivision" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" align="center">
                                <table>
                                    <tr>
                                        <td>
                                            <label class="control-label">Applicant's Image (max 1MB) <span style="color:red;font-weight: bold">*</span></label>
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>
                                            <img id="imgPrev" src="<?php echo base_url();?>uploads/img_placeholder.jpg" style="height:160px; width:160px;border:2px solid #555555;border-radius: 3px">
                                            <br>
                                            <br>
                                            <input type="file" name="file" style="display:none" id="profileimage" accept=".jpg,.png,.jpeg,.gif" onchange="loadFile(event,'profileimage')"/>
                                            <button class="btn btn-default" id="btnFile" onclick="document.getElementById('profileimage').click();" >Upload Photo</button>
                                            <br><span class="help-block" id="imgName" style="visibility: hidden">image name</span>
                                            <script>
                                                var loadFile = function(event,profileimage) {
                                                    $("#imgName").text("");
                                                    var ext = event.target.files[0].name.split('.');
                                                    ext = ext[ext.length-1].toLowerCase();
                                                    var arrayExtensions = ['jpg' , 'jpeg', 'png','gif','PNG'];
                                                    if (arrayExtensions.lastIndexOf(ext) == -1) {
                                                        messageDialogModal("Unsupported Format","Please upload supported image types only (JPG|PNG|GIF)");
                                                        $("#"+profileimage).val("");
                                                    } else {
                                                        var size = document.getElementById(profileimage).files[0].size/1024;
                                                        if(size > 1000){
                                                            messageDialogModal("File Upload Limit","The file size exceeds the limit allowed and cannot be saved. Try uploading another or resize the current image.");
                                                        } else {
                                                            var output = document.getElementById('imgPrev');
                                                            var imgname = event.target.files[0].name;
                                                            if(imgname.length > 18){
                                                                var name = imgname.substring(0, 18);
                                                                $("#imgName").text(name+"...");
                                                                $("#imgName").css("visibility","visible");
                                                            } else {
                                                                $("#imgName").text(imgname);
                                                                $("#imgName").css("visibility","visible");
                                                            }
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                            window.isprofilepic = true;
                                                        }
                                                    }

                                                };
                                            </script>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label">Applicant's Resume (max 3 MB) <span style="color:red;font-weight: bold">*</span></label>
                                        <input type="file" name="resume_file" style="display:none" id="resumefile" accept=".pdf,.doc,.docx" onchange="loadResumeFile(event,'resumefile')"/>
                                        <button class="btn btn-default" id="btnResumeFile" onclick="document.getElementById('resumefile').click();" >Upload Resume</button>
                                        <br><span class="help-block" id="resumefileName" style="visibility: hidden">file name</span>
                                    </div>
                                </div>
                                <script>
                                    var loadResumeFile = function(event,resumefile) {
                                        $("#resumefileName").text("");
                                        var ext = event.target.files[0].name.split('.');
                                        ext = ext[ext.length-1].toLowerCase();
                                        var arrayExtensions = ['doc' , 'docx', 'pdf'];
                                        if (arrayExtensions.lastIndexOf(ext) == -1) {
                                            messageDialogModal("Unsupported Format","Please upload Word Document (.doc|.docx) or PDF (.pdf) File only.");
                                            $("#"+resumefile).val("");
                                        } else {
                                            var size = document.getElementById(resumefile).files[0].size/1000;
                                            if(size > 3000){
                                                messageDialogModal("File Upload Limit","The document size exceeds the limit allowed and cannot be saved. Try uploading another or resize the current document.");
                                            } else {
                                                var filename = event.target.files[0].name;
                                                $("#resumefileName").text(filename);
                                                $("#resumefileName").css("visibility","visible");
                                            }
                                            window.isresume = true;
                                        }
                                    };
                                </script>

                            </div>
                        </div>
                    </div>
                    <div style="text-align: right" class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                       <div class="col-md-6" align="left">
                           <h4>Ensure the details are correct</h4>
                       </div>
                       <div class="col-md-6" align="right">
                           <button type="button" class="btn btn-success" id="btnProceedApplication">SUBMIT</button>
                           <button type="button" class="btn btn-default" onclick="$('#requestModal').modal('show');$('#modalApply').modal('hide');clearField();">CANCEL</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br>
<!--<a href="--><?php //echo base_url(); ?><!--announcements" class="btn btn-outline-success btn-block">View more</a>-->
<div id="loginModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #6d6d6d"><i class="fa fa-user"></i>&nbsp;&nbsp;User Login</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" id="username" placeholder="Enter username" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input class="form-control" id="password" placeholder="Password" type="password">
                    </div>
                </div>
                <span style="color:red;" id="loginerror">&nbsp</span>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" align="left" style="visibility: hidden" id="loginDiv">
                        <img src="<?php echo base_url();?>assets/img/spinner.svg" style="height:35px;">
                        Logging in..
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success" id="loginSubmit">Login</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalCaptcha" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <b><?php echo _("CAPTCHA Validation") ?></b>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label"><?php echo _("Enter the CAPTCHA to get your login credentials") ?></label>
                        <div class="col-md-12">
                            <br>
                            <a id="reloadButton"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;<?php echo _("Refresh CAPTCHA") ?></a>
                            <div class="form-group" align="center">
                                <div style="border: dotted 2px #b4b4b4" id="CaptchaImageCode" class="CaptchaTxtField" >
                                    <canvas id="CapCode" class="capcode"></canvas>
                                </div>
                                <br>
                                <label class="control-label"><?php echo _("Please enter the CAPTCHA shown to be able to try again:") ?></label>
                                <div class="form-group">
                                    <input type="text" id="UserCaptchaCode" class="form-control" placeholder='<?php echo _("CAPTCHA is case sensitive") ?>' data-format="required">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" align="center" style="text-align: center">
                <span style="display: none" id="SuccessMessage" class="success" align="center"><?php echo _("Valid Captcha") ?>&nbsp;<i style="color:#3bb83a" class="fa fa-check-circle" aria-hidden="true"></i></span>
                <span id="WrongCaptchaError" class="error" style="color: #ce242a"></span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $GLOBALS['googlecharts'];?>"></script>
<style type="text/css">
    #fixedContainer {
        position: fixed;
    }
    th.google-visualization-table-th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 50px;
    }

    th.google-visualization-table-th:hover {
        white-space: nowrap;
        overflow: visible;
    }
</style>
<script type="application/javascript">
    function countDays(number) {
        var val;
        var years=0;
        var months=0;
        var days=0;
        months=number/30;
        if(months>12){
            years=months/12;
            months=(years-Math.floor(years))*12;
        }
        days=(months-Math.floor(months))*30;
        if(years<1){
            if(months<1){
                if(days>1)
                    val=parseInt(days) +  " days";
                else
                    val=parseInt(days) +  " day";
            } else {
                if(months>=2){
                    if(days>1)
                        val=parseInt(months) + " months and " + parseInt(days) +  " days";
                    else
                    if(parseInt(days)>1)
                        val=parseInt(months) + " months and " + parseInt(days) +  " day";
                    else
                        console.log(parseInt(months) + " months");
                }
                else{
                    if(parseInt(days)>1)
                        val=parseInt(months) + " month and " + parseInt(days) +  " days";
                    else{
                        if(parseInt(days)>1)
                            val=parseInt(months) + " month and " + parseInt(days) +  " day";
                        else
                            val=parseInt(months) + " month";
                    }
                }

            }
        } else {
            if(months<1){
                if(days>1)
                    val=parseInt(years) +  " year(s) " + parseInt(days) +  " days";
                else
                    val=parseInt(years) +  " year(s) " + parseInt(days) +  " day";
            } else {
                if(months>=2){
                    if(days>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months and " + parseInt(days) +  " days";
                    else
                    if(parseInt(days)>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months and " + parseInt(days) +  " day";
                    else
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " months";
                }
                else{
                    if(parseInt(days)>1)
                        val=parseInt(years) +  " year(s) " + parseInt(months) + " month and " + parseInt(days) +  " days";
                    else{
                        if(parseInt(days)>1)
                            val=parseInt(years) +  " year(s) " + parseInt(months) + " month and " + parseInt(days) +  " day";
                        else
                            val=parseInt(years) +  " year(s) " + parseInt(months) + " month";
                    }
                }

            }
        }
        return val;

    }

    $(document).ready(function(){
        console.log("<?php echo CI_VERSION;?>");
       loadAnnouncement();
        window.reqnum = "";
        loadProvince();
           google.charts.load('current', {packages: ['corechart', 'bar']});
    });
    $(document).on('click','#btnSealOfTransparency',function(){  
        loadReport();
        $("#modalSealOftransparency").modal("show");
      });
      function loadReport(){
         $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/employeelist",
            type: "POST",
            dataType: "json",
            data: {},
            success: function(data){
                if(data.Code == "00"){
                    generateChart(data.details);
                } 
            },
            error: function(e){
                console.log(e);
            }
         });
          $.ajax({
              url: "<?php echo base_url();?>reportgenerationmanagement/qualificationyears",
              type: "POST",
              dataType: "json",
              data: {},
              success: function(data){
                  if(data.Code == "00"){
                      $("#year").empty();
                      for(var key in data.details){
                          $("#year").append("<option value ='"+data.details[key].years+"'>"+data.details[key].years+"</option>");
                      }
                      var d = new Date(),
                          n = d.getMonth(),
                          y = d.getFullYear();
                      var fq = ["1","2","3"];
                      var sq=["4","5","6"];
                      var tq=["7","8","9"];
                      var frq=["10","11","12"];
                      if(jQuery.inArray(n,fq)!==-1){
                          console.log("1 ");
                          $('#month option[value="1,2,3"]').prop('selected', true);
                      }
                      if(jQuery.inArray(n,sq)!==-1){
                          console.log("2");
                          $('#month option[value="4,5,6"]').prop('selected', true);
                      }
                      if(jQuery.inArray(n,tq)!==-1){
                          console.log("3");
                          $('#month option[value="7,8,9"]').prop('selected', true);
                      }
                      if(jQuery.inArray(n,frq)!==-1){
                          console.log("4");
                          $('#month option[value="10,11,12"]').prop('selected', true);
                      }

                      loadQualification($("#month").val(),$("#year").val());
                      loadApproved();
                  }
              },
              error: function(e){
                  console.log(e);
              }
          });
      }
    $("#month").change(function () {
        loadQualification($("#month").val(),$("#year").val());
        loadApproved();
    });
    $("#year").change(function () {
        loadQualification($("#month").val(),$("#year").val());
        loadApproved();
    });
      function loadQualification(month,year) {
          $("#divGraph3").empty();
          $.ajax({
              url: "<?php echo base_url();?>reportgenerationmanagement/qualification",
              type: "POST",
              dataType: "json",
              data: {
                  "MONTH":month,
                  "YEAR":year
              },
              success: function(data){
                  if(data.Code == "00"){
                      generateChart1(data.details);
                  } else {
                      $("#divGraph3").height(50);
                      $("#divGraph3").append("<center><h3>No available data found on the given date.</h3></center>");
                  }
              },
              error: function(e){
                  console.log(e);
              }
          });
      }

    function loadRecruitmentData(approved,rejected) {
          var data = [["January",0,0],["February",0,0],["March",0,0],["April",0,0],
              ["May",0,0],["June",0,0],["July",0,0],["August",0,0],["September",0,0],
              ["October",0,0],["November",0,0],["December",0,0]];
          if(approved!="" || rejected!=""){
              for(var key in approved){
                  if(approved[key].month === "January"){
                      data[0][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "February"){
                      data[1][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "March"){
                      data[2][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "April"){
                      data[3][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "May"){
                      data[4][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "June"){
                      data[5][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "July"){
                      data[6][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "August"){
                      data[7][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "September"){
                      data[8][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "October"){
                      data[9][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "November"){
                      data[10][1]=parseInt(approved[key].approvedcount);
                  }
                  if(approved[key].month === "December"){
                      data[11][1]=parseInt(approved[key].approvedcount);
                  }
              }
              for(var key in rejected){
                  if(rejected[key].month === "January"){
                      data[0][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "February"){
                      data[1][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "March"){
                      data[2][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "April"){
                      data[3][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "May"){
                      data[4][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "June"){
                      data[5][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "July"){
                      data[6][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "August"){
                      data[7][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "September"){
                      data[8][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "October"){
                      data[9][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "November"){
                      data[10][2]=parseInt(rejected[key].rejectedcount);
                  }
                  if(rejected[key].month === "December"){
                      data[11][2]=parseInt(rejected[key].rejectedcount);
                  }
              }
              generateChart2(data);
          } else {

              $("#divGraph4").height(50);
              $("#divGraph4").append("<center><h3>No available data found on the given date.</h3></center>");
          }
    }

    function loadApproved() {
        var rejected="";
        var approved="";
        $("#divGraph4").empty();
        $.ajax({
            url: "<?php echo base_url();?>reportgenerationmanagement/approved",
            type: "POST",
            dataType: "json",
            data: {
                "MONTH":$("#month :selected").attr('nameform'),
                "YEAR":$("#year :selected").val()
            },
            success: function(data){
                if(data.Code == "00"){
                    console.log(data);
                    approved = data.details;
                }
                $.ajax({
                    url: "<?php echo base_url();?>reportgenerationmanagement/rejected",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "MONTH":$("#month :selected").attr('nameform'),
                        "YEAR":$("#year :selected").val()
                    },
                    success: function(data){
                        if(data.Code == "00"){
                            console.log(data);
                            rejected = data.details;
                        }
                        loadRecruitmentData(approved,rejected);
                    },
                    error: function(e){
                        console.log(e);
                    }
                });
            },
            error: function(e){
                console.log(e);
            }
        });
    }

      function composeData(items, prop) {
        var item = [];
        var number = {}
        var data = [];
        for(var i=0;i<items.length;i++) {
            var value = items[i][prop];
            if(value!=""||value!=null||value!="null"){
                item.push(value);
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
                    data.push(temp);
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
            data.push(temp);
        }
        return data;
    }

    function composeData1(data) {
        var chartData = [];
        for(var key in data){
            var chartItem = [];
            chartItem.push(data[key].position);
            chartItem.push(parseInt(data[key].qualifiedapplicants));
            chartItem.push(parseInt(data[key].nonqualifiedapplicants));
            chartItem.push(parseInt(data[key].qualifiedpersonnel));
            chartItem.push(parseInt(data[key].nonqualifiedpersonnel));
            chartData.push(chartItem);
        }
        return chartData;
    }

    function generateChart2(data) {
        var chartObj = new Object();
        chartObj['chartName'] = 'engDiv';
        chartObj['chartTitle'] = 'Number of recruitment done';
        chartObj['data'] = data;
        google.charts.setOnLoadCallback(function () {
            drawChart();
        });

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Approved');
            data.addColumn('number', 'Rejected');

            data.addRows(chartObj.data);
            var options = {
                title: "",
                chartArea: {
                    width: '100%',
                    left: 250
                },
                legend: { position: 'top', alignment: 'center' },
                colors: ['#1976d2','#e53935'],
                hAxis: {
                    title: '',
                    minValue: 0,
                    format: ' '
                },
                bar: {groupWidth: 100}
            };
            var chart = new google.visualization.BarChart(document.getElementById('divGraph4'));
            var height = data.getNumberOfRows() * 41 + 30;
            $("#divGraph4").height(height);
            chart.draw(data, options);
        }
    }

    function generateChart1(data) {
        var chartObj = new Object();
        chartObj['chartName'] = 'engDiv';
        chartObj['chartTitle'] = 'Number of qualified and non-qualified applicants and/or personnel per position';
        chartObj['data'] = composeData1(data);
        google.charts.setOnLoadCallback(function () {
            drawChart();
        });

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Position');
            data.addColumn('number', 'Qualified Applicant');
            data.addColumn('number', 'Non-Qualified Applicant');
            data.addColumn('number', 'Qualified Personnel');
            data.addColumn('number', 'Non-Qualified Personnel');

            data.addRows(chartObj.data);
            var options = {
                title: "",
                chartArea: {
                    width: '100%',
                    left: 250
                },
                legend: { position: 'top', alignment: 'center' },
                colors: ['#1976d2','#e53935'],
                hAxis: {
                    title: '',
                    minValue: 0,
                    format: ' '
                },
                bar: {groupWidth: 100}
            };
            var chart = new google.visualization.BarChart(document.getElementById('divGraph3'));
            var height = data.getNumberOfRows() * 41 + 30;
            $("#divGraph3").height(height);
            chart.draw(data, options);
        }
    }

    function generateChart(data){
        var chartObj = new Object();
        chartObj['chartName'] = 'engDiv';
        chartObj['chartTitle'] = 'Number of employees per department';
        chartObj['data'] = composeData(data,'department');
        google.charts.setOnLoadCallback(function() {
            drawChart();
            drawChart2();
        });
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Department');
            data.addColumn('number', 'Total Number of Employee');

            data.addRows(chartObj.data);
            var options = {
            };
            var chart = new google.visualization.PieChart(document.getElementById('divGraph'));
            var height = data.getNumberOfRows() * 41 + 30;
            $("#divGraph").height(height);
            chart.draw(data, options);
        }
        function drawChart2() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Department');
            data.addColumn('number', 'Total Number of Employee');

             data.addRows(chartObj.data);
            var options = {
                title: chartObj.chartTitle,
                chartArea: {
                    width: '65%',
                    right: 15
                },
                hAxis: {
                    title: '',
                    minValue: 0,
                    format: ' '
                },
                legend: 'none',
                bar: {groupWidth: '95%'}
            };
            var chart = new google.visualization.BarChart(document.getElementById('divGraph2'));
            var height = data.getNumberOfRows() * 41 + 30;
            $("#divGraph2").height(height);
            chart.draw(data, options);
        }
    }
    function loadProvince(){
        $.ajax({
            url: '<?php echo base_url();?>homepage/getprovince',
            type: 'post',
            data:{
            },
            dataType : 'json',
            success:function(result){
                $('#province').empty();
                $('#province').append(
                    '<option selected disabled>- Select Province -</option>');
                var data = result.RECORDS;
                data.sort(function(a, b){
                    var nameA=a.provDesc; nameB=b.provDesc;
                    if (nameA < nameB) //sort string ascending
                        return -1
                    if (nameA > nameB)
                        return 1
                    return 0 //default return value (no sorting)
                });

                for(var keys=0;keys<data.length;keys++)
                {
                    $('#province').append(
                        '<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    }

    $("#province").change(function(){
        $.ajax({
            url: '<?php echo base_url();?>homepage/getcity',
            type: 'post',
            data:{
            },
            dataType : 'json',
            success:function(result){
                $('#citymun').empty();
                $('#citymun').append(
                    '<option selected disabled>- Select City/Municipality -</option>');
                var code = $("#province option:selected").attr("provcode");
                for(var keys in result.RECORDS)
                {
                    if ((result.RECORDS).hasOwnProperty(keys))
                    {
                        if(code==result.RECORDS[keys].provCode){

                            $('#citymun').append(
                                '<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                        }
                    }
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $("#citymun").change(function(){
        var code = $("#citymun option:selected").attr("citycode");
        $.ajax({
            url: '<?php echo base_url();?>homepage/getbrgy',
            type: 'post',
            data:{
            },
            dataType : 'json',
            success:function(result){
                $('#brgy').empty();
                $('#brgy').append(
                    '<option selected disabled>- Select Barangay -</option>');

                for(var keys in result.RECORDS)
                {
                    if ((result.RECORDS).hasOwnProperty(keys))
                    {
                        if(code==result.RECORDS[keys].citymunCode){

                            $('#brgy').append(
                                '<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                        }
                    }
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    function loadAnnouncement(){
        $("#loadingmodal").modal("show");
        $.ajax({
           url: "<?php echo base_url();?>homepage/announcements",
            type: "GET",
            dataType: "json",
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    var cont = $(".divAnnCont");
                    var l = result.details.length;
                    var limit = 0;
                    if(l > 2){
                        limit = 2;
                        $("#divMoreJobs").show();
                    } else {
                        limit = l;
                        $("#divMoreJobs").hide();

                    }
                    for(var i=0;i<limit;i++){
                        var card = '<div class="card">' +
                            '<div class="card-body">' +
                            '<h4 class="card-title">'+ result.details[i].name +'</h4>' +
                            '<h6 class="card-subtitle text-muted">Request Code: '+result.details[i].requestnumber+'</h6> ' +
                            '</div><div class="card-body">' +
                            '<a class="btn-link" req-number="'+result.details[i].requestnumber+'" href="javascript:viewJobPosting(\''+result.details[i].requestnumber+'\');">VIEW DETAILS</a>' +
                            '</div><div class="card-footer text-muted">'+moment(result.details[i].datepublished).startOf('hour').fromNow();  +'</div></div>';
                        cont.append(card);
                    }
                } else {

                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }
    $("#btnLogout").click(function(){

    });
    $("#btnApply").click(function(){
      $("#requestModal").modal("hide");
        $("#modalApply").modal("show");
    });

    function viewJobPosting(reqnum){
        var skillset = $("#skillset");
        skillset.empty();
        $("#loadingmodal").modal("show");
        window.reqnum = reqnum;
        $.ajax({
            url:"<?php echo base_url();?>homepage/displayapprovedrequestdetails",
            type: "POST",
            data: {
                "REQUESTNUMBER": reqnum
            },
            dataType: "json",
            success:function(result){
                $("#loadingmodal").modal("hide");
                console.log(result);
                if(result.Code == "00"){
                    displayRequestDetails(result);
                    for(var keys in result.details){
                        var skills = JSON.parse(atob(result.details[keys].cbiskills));
                        for(var i=0;i<skills.length;i++){
                            skillset.append("<li>"+skills[i].desc+"</li>");
                        }
                    }
                    $("#requestModal").modal("show");
                } else {
                    messageDialogModal("Server Message","No Details Available");
                }
            },
            error: function(e){
                $("#loadingmodal").modal("hide");
            }
        });
    }

    function displayRequestDetails(result){
        for(var keys in result.details){
            $("#lblreqnum").text(result.details[keys].requestnumber);
            $("#lblrequestor").text(result.details[keys].requestorname);
            $("#lblposition").text(result.details[keys].positionname);
            $("#lbldepartment").text(result.details[keys].department);
            $("#lbleducation").text(result.details[keys].mineducbackground);
            $("#lblexperience").text(result.details[keys].experience);
            $("#lbltraining").text(result.details[keys].training);
            $("#lbleligibility").text(result.details[keys].eligibility);

            $("#lblapprovedbyhr").text(result.details[keys].hrapprovedby);
            $("#lblapprovedbymayor").text(result.details[keys].mapprovedby);
            $("#lbldatehr").text(moment(result.details[keys].hrapproved).format("MMM DD YYYY hh:mm:ss A"));
            $("#lblmayordate").text(moment(result.details[keys].mdateapproved).format("MMM DD YYYY hh:mm:ss A"));
        }
    }
    function getImages(){
        $.ajax({
            url : "<?php  echo base_url(); ?>homepage/getimages",
            type : "POST",
            data : {
            },
            dataType: 'json',
            success : function(data){
                $("#loadingmodal").hide();
                $("#carousel").empty();
                var string="";
                for (var key in data.src){
                    if (data.src.hasOwnProperty(key)){
                        var active="";
                        if (key==0){
                            active="active";
                        }
                        string+='<div class="item '+active+'"><img src="<?php echo base_url()?>'+data.src[key]+'" /></div>';
                    }
                }
                $("#carousel").append(string);
            },
            error: function(e){
                console.log(e);
            }
        });
    }
    $("#loginSubmit").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        $("#loginerror").text("");
        $("#loginDiv").css("visibility","visible");
        $.ajax({
            url: "<?php echo base_url()?>homepage/login",
            type: "POST",
            dataType: "json",
            data: {
                "USERNAME": username,
                "PASSWORD": password
            },
            success: function(data){
                if(!(data.Code == "00")){
                    $("#loginDiv").css("visibility","hidden");
                    $("#loginerror").text(data.Message);
                } else {
                    window.location = "<?php echo base_url();?>main";
                }
            },
            error: function(e){
                console.log("failed");
                console.log(e);
            }
        });
    });

   $("#btnProceedApplication").click(function(){
      if(!validate()){
          return;
      } else {
          CreateCaptcha();
          $('#WrongCaptchaError').fadeOut(100);
          $('#SuccessMessage').css('display','none');
        $("#modalCaptcha").modal("show");
      }
   });

    function submitApplicationRequest(){
        console.log("valid captcha");
        $("#loadingmodal").modal("show");
        var formdata = new FormData();
        var file = $('input[name=file]')[0].files[0];
        var resumefile = $('input[name=resume_file]')[0].files[0];
        formdata.append("FILES",file);
        formdata.append("RESUMEFILES",resumefile);
        formdata.append("REQUESTNUMBER",window.reqnum);
        formdata.append("FIRSTNAME",applyXSSprotection($("#firstname").val()));
        formdata.append("MIDDLENAME",applyXSSprotection($("#middlename").val()));
        formdata.append("LASTNAME",applyXSSprotection($("#lastname").val()));
        formdata.append("MSISDN",applyXSSprotection($("#contactnumber").val()));
        formdata.append("EMAIL",applyXSSprotection($("#email").val()));
        formdata.append("PROVINCE",$("#province option:selected").val());
        formdata.append("CITY",$("#citymun option:selected").val());
        formdata.append("BARANGAY",$("#brgy option:selected").val());
        formdata.append("SPECIFICADDRESS",applyXSSprotection($("#address").val()));
        $.ajax({
            url: "<?php echo base_url();?>homepage/requestaccess",
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    $("#modalApply").modal("hide");
                    var input = $("#useridtemp");
                    input.text(result.tempaccess);
                    $("#modalTemporaryAccess").modal("show");
                    clearField();
                } else {
                    messageDialogModal("Server Message",result.Message);
                }
            },
            error: function(e){
                console.log(e);
            }
        });

    }

    function validate(){
        if($("#firstname").val() == "" || $("#firstname").val() == null){
            console.log("false");
            messageDialogModal("Required","Please provide firstname");
            return false;
        }
        if($("#middlename").val() == "" || $("#middlename").val() == null){
            messageDialogModal("Required","Please provide middlename");
            return false;
        }
        if($("#lastname").val() == "" || $("#lastname").val() == null){
            messageDialogModal("Required","Please provide lastname");
            return false;
        }

        if($("#contactnumber").val() == "" || $("#contactnumber").val() == null){
            messageDialogModal("Required","Please provide contact number");
            return false;
        }

        if($("#email").val() == "" || $("#email").val() == null){
            messageDialogModal("Required","Please provide email");
            return false;
        }

        if($("#province option:selected").val() == "- Select Province -" || $("#province option:selected").val() == null){
            messageDialogModal("Required","Please Select Province");
            return false;
        }

        if($("#citymun option:selected").val() == "- Select City/Municipality -" || $("#citymun option:selected").val() == null){
            messageDialogModal("Required","Please Select City/Municipality");
            return false;
        }

        if($("#brgy option:selected").val() == "- Select Barangay -" || $("#brgy option:selected").val() == null){
            messageDialogModal("Required","Please Select Barangay");
            return false;
        }

        if($("#address").val() == "" || $("#address").val() == null){
            messageDialogModal("Required","Please provide specific address");
            return false;
        }



        if(!window.isprofilepic){
            messageDialogModal("Required","Please upload your photo");
            return false;
        }

        if(!window.isresume){
            messageDialogModal("Required","Please upload your resume");
            return false;
        }
        return true;
    }

    function applyXSSprotection(data){
        return data.replace(/&/g, "&amp;").
            replace(/</g, "&lt;").
            replace(/>/g, "&gt;").
            replace(/"/g, "&quot;").
            replace(/'/g, "&#039;");
    }

    $(document).on('click','#btnMoreJobs',function(){
        $("#loadingmodal").modal("show");
        var cont = $("#jobsCont");
        cont.empty();
        $.ajax({
            url: "<?php echo base_url();?>homepage/announcements",
            type: "GET",
            dataType: "json",
            success: function(result){
                console.log(result);
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    for(var i=0;i<result.details.length;i++){
                        var card = '<div class="card" style="margin-bottom: 10px;">' +
                            '<div class="card-body">' +
                            '<h4 class="card-title">'+ result.details[i].name +'</h4>' +
                            '<h6 class="card-subtitle text-muted">Request Code: '+result.details[i].requestnumber+'</h6> ' +
                            '</div><div class="card-body">' +
                            '<a class="btn-link" req-number="'+result.details[i].requestnumber+'" href="javascript:viewJobDetails(\''+result.details[i].requestnumber+'\');">VIEW DETAILS</a>' +
                            '</div><div class="card-footer text-muted">'+moment(result.details[i].datepublished).startOf('hour').fromNow();  +'</div></div>';
                        cont.append(card);
                    }
                    $("#moreJobsModal").modal("show");
                } else {

                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });

    function viewJobDetails(reqnum){
        $("#moreJobsModal").modal("hide");
        viewJobPosting(reqnum);
    }



//FOR CAPTCHA

    $("#reloadButton").click(function(e){
        CreateCaptcha();
    });
    var cd;
    $(function(){
        CreateCaptcha();
    });
    function CreateCaptcha() {
        var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        var i;
        for (i = 0; i < 6; i++) {
            var a = alpha[Math.floor(Math.random() * alpha.length)];
            var b = alpha[Math.floor(Math.random() * alpha.length)];
            var c = alpha[Math.floor(Math.random() * alpha.length)];
            var d = alpha[Math.floor(Math.random() * alpha.length)];
            var e = alpha[Math.floor(Math.random() * alpha.length)];
            var f = alpha[Math.floor(Math.random() * alpha.length)];
        }
        cd = ' '+ a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
        $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="200%" height="60px" style="margin:0 auto; text-align: center; padding-bottom:10px;"></canvas>');
        var c = document.getElementById("CapCode"),
            ctx=c.getContext("2d"),
            x = c.width / 2;
        img = new Image();
        img.src = "<?php echo base_url();?>assets/img/capcha1.jpg";
        img.onload = function () {
            var pattern = ctx.createPattern(img, "repeat-x");
            ctx.fillStyle = pattern;
            ctx.fillRect(0, 0, c.width, c.height);
            ctx.font = "22pt Adobe Naskh Medium italic";
            ctx.fillStyle = '#000';
            ctx.textAlign = 'center';
            ctx.setTransform (1, -0.10, -1, 1, 1, 25);
            ctx.fillText(cd,x,30);
        };
    }
    function ValidateCaptcha() {
        var string1 = removeSpaces(cd);
        var string2 = removeSpaces($('#UserCaptchaCode').val());
        if (string1 == string2) {
            return true;
        }
        else {
            return false;
        }
    }
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
    function CheckCaptcha() {
        var result = ValidateCaptcha();
        if( $("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
            $('#WrongCaptchaError').text('Please enter code given below in a picture.').show();
        } else {
            if(result == false) {
                $('#WrongCaptchaError').text('<?php echo _("Invalid CAPTCHA! Please try again.") ?>').show();
                CreateCaptcha();
                $('#UserCaptchaCode').focus().select();
            }
            else {
                $("#UserCaptchaCode").val("");
                $('#WrongCaptchaError').fadeOut(100);
                $('#SuccessMessage').fadeIn(500).css('display','block');
                $("#modalCaptcha").modal("hide");
                submitApplicationRequest();
            }
        }
    }

    function textLength(value){
        var maxLength = 5;
        if(value.length > maxLength) return false;
        return true;
    }
    document.getElementById('UserCaptchaCode').onkeyup = function(){
        if(!textLength(this.value))
        {
            CheckCaptcha();
        }
        else oldValue = this.value;
    }
</script>