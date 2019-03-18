<style>
    .well{
        padding:10px !important;
    }

    .publishPersonnelRequest{
        color: blue;
    }

    .publishPersonnelRequest > a:hover{
        color: #000097;
    }
</style>

<div class="col-md-12">
    <h3 id="lblnotif"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notification(s)</h3>
    <div class="well" style="overflow: auto;height: 380px;">
        <p style="text-align: left;font-size: 16pt;" id="welcomePane">
            Welcome! <span style="font-weight: 700"><?php echo $this->session->userdata('name')?></span><br><br>
        </p>
        <div class="collapseNotif" id="divRequests" style="<?php if($this->session->userdata('userlevel') =='TEMPORARY'):?>display: none<?php endif;?>">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#requestsCollapse"><b style="font-size: 15pt;color:#757575">Personnel Request Notifications&nbsp;&nbsp;(<span id="requestsCount">0</span>)</b></a>
                        </h4>
                    </div>
                    <div id="requestsCollapse" class="panel-collapse collapse">
                        <ul style="text-align: left;font-size: 14pt;" id="ulRequests">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapseNotif" id="divAssignments" style="<?php if($this->session->userdata('userlevel') =='TEMPORARY'):?>display: none<?php endif;?>">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#assignmentsCollapse"><b style="font-size: 15pt;color:#757575">Assignment Notifications&nbsp;&nbsp;(<span id="assignmentsCount">0</span>)</b></a>
                        </h4>
                    </div>
                    <div id="assignmentsCollapse" class="panel-collapse collapse">
                        <ul style="text-align: left;font-size: 14pt;" id="ulAssignments">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapseNotif" id="divAssessments" style="<?php if($this->session->userdata('userlevel') =='TEMPORARY'):?>display: none<?php endif;?>">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#assessmentsCollapse"><b style="font-size: 15pt;color:#757575">Assessment Notifications&nbsp;&nbsp;(<span id="assessmentsCount">0</span>)</b></a>
                        </h4>
                    </div>
                    <div id="assessmentsCollapse" class="panel-collapse collapse">
                        <ul style="text-align: left;font-size: 14pt;" id="ulAssessments">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapseNotif" id="divApplicants">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#applicantsCollapse"><b style="font-size: 15pt;color:#757575">Applicant Notifications&nbsp;&nbsp;(<span id="applicantsCount">0</span>)</b></a>
                        </h4>
                    </div>
                    <div id="applicantsCollapse" class="panel-collapse collapse">
                        <ul style="text-align: left;font-size: 14pt;" id="ulApplicants">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <p style="text-align: left;font-size: 16pt;" id="invitationPane">
        </p>
        <p style="text-align: left;font-size: 16pt;" id="approvedPane">
        </p>
        <p style="text-align: left;font-size: 16pt;" id="publishingPane">
        </p>
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
                                        <h5 class="control-label" style="margin-top:0; !important;"><span style="font-size: 11px;">Recommending Approved by</span><br>
                                            <b id="lblapprovedbyhr"></b>
                                            <br><span style="font-size: 11px;">HR Manager</span>
                                        </h5>
                                        <h5 class="control-label"><span style="font-size: 11px;">Date</span><br><b id="lbldatehr"></b></h5>
                                    </div>
                                    <div id="divApprovedWellMayor" style="display: none">
                                        <h5 class="control-label"><span style="font-size: 11px;">Approved by</span><br><b id="lblapprovedbymayor"></b>
                                            <br><span style="font-size: 11px;">Municipal Head</span></h5>
                                        <h5 class="control-label" style="margin-bottom:0; !important;"><span style="font-size: 11px;">Date</span><br><b id="lblmayordate"></b></h5>
                                    </div>
                                </div>
                                <div class="well" align="center" id="rejectStamp" style="display: none">
                                    <h5 class="control-label" style="color: red;font-weight: bold">Request Rejected</h5>
                                    <h5 class="control-label"><span style="font-size: 11px;">Rejected by</span><br><b id="lblrejectedby"></b></h5>
                                    <p id="lblrejectremarks"></p>
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
                        <div id="dismissBtn" style="display: none;text-align: right">
                            <button id="btnDismiss" type="button" class="btn btn-default" data-dismiss="modal">DISMISS</button>
                        </div>
                        <div id="closeBtns" style="display: none;text-align: right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                        </div>
                        <div id="publishingBtns" style="display: none">
                            <a id="btnWww"><img src="<?php echo base_url()?>assets/img/icons/www.png" height="50px"></a>
                        </div>
                        <div id="applyBtns" style="display: none">
                            <button type="button" class="btn btn-info btn-lg" id="btnApply">APPLY NOW</button>
                        </div>
                        <div style="text-align: right" id="actionBtns">
                            <button type="button" class="btn btn-success" id="btnApproveReq">APPROVE</button>
                            <button type="button" class="btn btn-primary" id="btnShowRejectModal">REJECT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalApproved" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request Sent</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <p>Your request has been sent to Mayor's Office<br>Your Request Code is: <b class="approveReqNum"></b>
                            <br>
                            Notification will be sent once it is APPROVED
                        </p>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalApprovedMayor" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request Approved</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <p>Request successfully Approved<br>The Request Code is: <b class="approveReqNum"></b>
                            <br>
                            Notification has been sent to HR Manager for POSITION PUBLISHING
                        </p>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalPublishing" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Request Sent</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <p>Your request for publishing vacant position for Request Code: <b id="publishReqnum"></b> has been submitted to the IT Manager
                        </p>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalRejectRequest" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Reject Request</legend>
                <div id="panelLogin">
                    <input type="hidden" class="clearField" id="rejectRequestNumber">
                    <div class="form-group">
                        <h4>Kindly input the reason for non-approval of request</h4>
                        <textarea class="form-control clearField" id="rejectRemarks" placeholder="Enter reason.." rows="3" style="resize: none"></textarea>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-primary" id="btnRejectRequest">REJECT</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalPublishRequest" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Publish Vacant Position</legend>
                <div id="panelLogin">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter url.." rows="3" style="resize: none" id="urlpublish"></textarea>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-success"  data-dismiss="modal" id="btnPublishPosition">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalnotifyrequirements" role="dialog" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Applicant Requirement</legend>
                <div class="row">
                    <div class="col-md-12" id="letterbody">
                        <h4 style="margin: 2px;"><b><?php echo $this->session->userdata('name');?></b></h4>
                        <h5 style="margin: 2px;" id="lblapplicantcode"><?php echo $this->session->userdata('applicantcode');?></h5>
                        <h5 style="margin-top: 2px;margin-bottom: 15px;" id="lblreqnum"><?php echo $this->session->userdata('requestnumber');?></h5>
                        <b>REQUIREMENTS:</b><br>
                        <ul id="reqlist"></ul>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <p style="font-size: 11px;font-style: italic">You shall also receive the list of requirements via email (if you've provided a valid email address)</p>
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="lettermodal" role="dialog" data-backdrop="static">
    <div  class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Invitation Letter for Qualified Employee</legend>
                <div class="row">
                    <div id="divletterbody" class="col-md-12" style="height: 430px !important;overflow-y: auto;">
                        <p id="invitationletterbody"></p>
                    </div>
                    <div id="print-me"></div>
                    <div class="col-md-12">
                        <hr>
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info" id="btnDeclineInv">DECLINE</button>
                            <button type="button" class="btn btn-success" id="btnAcceptInv">ACCEPT INVITATION</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<style type="text/css">
    #fixedContainer {
        position: fixed;
    }
</style>
<script type="application/javascript">
$(document).ready(function(){
    window.isUpdate = false;
    window.arrNotif = [];
    var q = "<?php echo @$_GET['q'];?>";
    if(q == "" || q == null){
        loadNotifications();
    } else {
        var t = JSON.parse(atob(q));
        var cont = $("#welcomePane");
        if(t.qualified == "YES"){
            var txt = '<h2 align="center">Thank you for your interest in applying for the job' +
                '<br><b>' + t.position+'</b><br>' +
                'Your data/information has been sent to respective Evaluator(s)<br>' +
                'We will notify you for the progress of your application.</h2>';
            cont.append(txt);
        } else {
            var txt = '<h2 align="center">Thank you for your interest in applying for the job' +
                '<br><b>' + t.position+'</b><br>' +
                'We are sorry to inform you that you did not meet the minimum qualification mandated in your application.<br>' +
                'We will keep your data/information in our database, should there be an opening for a new position your are qualified with we can easily reach you.<br>' +
                'Thank you!</h2>';
            cont.append(txt);
        }
    }
});

function loadNotifications(){
    if(window.isUpdate == false){
        $("#loadingmodal").modal("show");
    }
    var cont = $("#welcomePane");
    var approvedCont = $("#approvedPane");
    var publishingCont = $("#publishingPane");
    cont.empty();
    approvedCont.empty();
    publishingCont.empty();


    //new containrs
    var ulRequests = $("#ulRequests");
    var ulAssessments = $("#ulAssessments");
    var ulAssignments = $("#ulAssignments");
    var ulApplicants = $("#ulApplicants");

    ulRequests.empty();
    ulAssessments.empty();
    ulAssignments.empty();
    ulApplicants.empty();
    $.ajax({
        url:"<?php echo base_url();?>notificationmanagement/display",
        type: "GET",
        dataType: "json",
        success:function(result){
            $("#loadingmodal").modal("hide");
            console.log("test");
            console.log(result);
            var notif = '';
            var approved = '';
            var publishing = '';
            var assessment = '';
            var assignment = '';
            var applicants = '';
            if(result.Code == "00" && result.details.length > 0){
                notif = '';
                var marker = '';
                $("#lblnotif").show();
                for(var keys in result.details){
                    var msg = '';
                    if(result.details[keys].levelofapproval == '0'){
                        notif +='<li><a category="REQUEST" class="personnelRequestHr" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">New Request - Personnel for Approval. Code '+result.details[keys].requestnumber+'</a></li>';
                        msg = '';
                        marker = '';
                    } else if(result.details[keys].levelofapproval == '1'){
                        notif +='<li><a category="REQUEST" class="personnelRequestHr" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">New Request - Personnel for Approval. Code '+result.details[keys].requestnumber+'</a></li>';
                        msg = '';
                        marker = '';
                    } else if(result.details[keys].levelofapproval == '2'){
                        approved +='<li><a category="REQUEST" class="approvedPersonnelRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Request for Personnel Approved. Code '+result.details[keys].requestnumber+'&nbsp;<i class="fa fa-check"></i></a></li>';
                        publishing +='<li><a style="color:blue;" class="publishPersonnelRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Code '+result.details[keys].requestnumber+' Ready for Publishing&nbsp;<i class="fa fa-globe"></i></a></li>';
                    } else if(result.details[keys].levelofapproval == '3'){
                        publishing +='<li><a category="REQUEST" style="color:blue;" class="approvePublishRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Code '+result.details[keys].requestnumber+'&nbsp;Ready for Publishing <i class="fa fa-globe"></i></a>&nbsp;<a class="btn btn-sm btn-outline-primary clearNotif" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    } else if(result.details[keys].levelofapproval == '4'){
                        approved +='<li><a category="REQUEST" class="approvedPersonnelRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Your New Request - Personnel: Code '+result.details[keys].requestnumber+'&nbsp;has been approved and published. Click the link to see the job posting<i class="fa fa-check"></i></a>&nbsp;<a class="btn btn-sm btn-outline-primary clearNotif" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    } else if(result.details[keys].levelofapproval == '92'){
                        approved +='<li><a category="REQUEST" style="color:red" class="rejectedPersonnelRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Request for Personnel Rejected. Code '+result.details[keys].requestnumber+'&nbsp;<i class="fa fa-times"></i></a></li>';
                    } else if(result.details[keys].levelofapproval == '91' && result.details[keys].createdby == "<?php echo $this->session->userdata('username');?>"){
                        approved +='<li><a category="REQUEST" style="color:red" class="rejectedPersonnelRequest" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'">Request for Personnel Rejected. Code '+result.details[keys].requestnumber+'&nbsp;<i class="fa fa-times"></i></a></li>';
                    } else if(result.details[keys].levelofapproval == '100' && result.details[keys].category == 'EVALUATOR ASSIGNMENT'){
                        assignment +='<li><a category="ASSIGNMENT" request-number="'+result.details[keys].requestnumber+'">'+result.details[keys].message+'&nbsp;</a><a class="btn btn-sm btn-outline-primary assessedExamination" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    } else if(result.details[keys].levelofapproval == '100' && (result.details[keys].category == 'EVALUATOR ASSESSMENT' || result.details[keys].category == 'TAKE EXAM')){
                        assessment +='<li><a category="ASSESSMENT" request-number="'+result.details[keys].requestnumber+'">'+result.details[keys].message+'&nbsp;</a><a class="btn btn-sm btn-outline-primary assessedExamination" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    } else if(result.details[keys].category == 'JOB INVITATION' || result.details[keys].category == 'APPLICATION REQUIREMENT'){
                        applicants +='<li><a category="APPLICANT" class="requirementNotification" request-number="'+result.details[keys].requestnumber+'">'+result.details[keys].message+'&nbsp;</a><a class="btn btn-sm btn-outline-primary assessedExamination" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    } else {

                    }
                }
                $(".collapseNotif").show();
            } else {
                $("#lblnotif").hide();
                $(".collapseNotif").hide();

                var defaultNotif ='Welcome <b><?php echo $this->session->userdata("firstname");?>!</b><br>Please note that every activity is monitored closely. For any problem in the system, contact System Administrator for details. ' +
                'Click the links under MENU to select operation. It is recommended to logout by clicking the logout button ' +
                'everytime you leave your PC. <br><br> If you do not agree with the conditions or you are not <span style="font-weight: 700"><?php echo $this->session->userdata('username')?></span>, <a href="<?php echo base_url();?>homepage/logout">Logout</a> now.';

                cont.append(defaultNotif);
            }

            ulRequests.append(notif);
            ulRequests.append(approved);
            ulRequests.append(publishing);
            ulAssessments.append(assessment);
            ulAssignments.append(assignment);
            ulApplicants.append(applicants);



            loadJobInvitations();
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
}

function loadJobInvitations(){
    var cont = $("#ulApplicants");
    var welcome = $("#welcomePane");
    cont.empty();
    var ulApplicants = $("#ulApplicants");

    $.ajax({
        url:"<?php echo base_url();?>notificationmanagement/displayinvitations",
        type: "GET",
        dataType: "json",
        success:function(result){
            var inv = '';
            if(result.Code == "00" && result.details.length > 0){
                welcome.empty();
                inv = '';
                $("#lblnotif").show();
                for(var keys in result.details){
                    var msg = '';
                    if(result.details[keys].levelofapproval == '300'){
                        inv +='<li><a category="APPLICANT" class="jobInvitationMsg" notif-id="'+result.details[keys].notifid+'" request-number="'+result.details[keys].requestnumber+'" notif-details="'+result.details[keys].notifdetails+'">'+result.details[keys].message+'</a>&nbsp;<a class="btn btn-sm btn-outline-primary assessedExamination" notifid="'+result.details[keys].notifid+'">Clear</a></li>';
                    }
                }
                $(".collapseNotif").show();
            } else {
                //$("#lblnotif").hide();

                /*inv ='Welcome <b><?php echo $this->session->userdata("firstname");?>!</b><br>Please note that every activity is monitored closely. For any problem in the system, contact System Administrator for details. ' +
                 'Click the links under MENU to select operation. It is recommended to logout by clicking the logout button ' +
                 'everytime you leave your PC. <br><br> If you do not agree with the conditions or you are not <span style="font-weight: 700"><?php echo $this->session->userdata('username')?></span>, <a href="<?php echo base_url();?>homepage/logout">Logout</a> now.';*/
            }
            ulApplicants.append(inv);

            countNotifs();
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
}

function countNotifs(){
    var reqctr=0;
    var assignctr=0;
    var assessctr=0;
    var appctr=0;

    $('[category="REQUEST"]').each(function(){
       reqctr+=1;
    });

    $('[category="ASSIGNMENT"]').each(function(){
        assignctr+=1;
    });

    $('[category="ASSESSMENT"]').each(function(){
        assessctr+=1;
    });

    $('[category="APPLICANT"]').each(function(){
        appctr+=1;
    });

    $("#requestsCount").text(reqctr);
    $("#assignmentsCount").text(assignctr);
    $("#assessmentsCount").text(assessctr);
    $("#applicantsCount").text(appctr);


}

$("#btnWww").click(function(){
    $("#requestModal").modal("hide");
    $("#modalPublishing").modal("show");
});

$(document).on('click','.requestPublished', function(){
    $("#actionBtns").hide();
    $("#applyBtns").show();
    $("#publishingBtns").hide();
    $("#requestModal").modal("show");
});

$(document).on('click','.approvePublishRequest', function(){
    var reqnum = $(this).attr("request-number");
    $("#urlpublish").val("<?php echo base_url();?>jobs/"+reqnum);
    $("#urlpublish").attr("request-number",reqnum);
    $("#btnDismiss").attr("notifid",$(this).attr("notif-id"));
    $("#modalPublishRequest").modal("show");
});

$("#btnPublishPosition").click(function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url:"<?php echo base_url();?>personnelrequestmanagement/publishposition",
        type: "POST",
        data: {
            "URL": $("#urlpublish").val(),
            "REQUESTNUMBER": $("#urlpublish").attr("request-number")
        },
        dataType: "json",
        success:function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                messageDialogModal("Vacant Position Published","URL Link will now be posted to HR Manager, Requesting Department, and Mayor\'s dashboard");

                window.isUpdate = true;
                loadNotifications();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
        }
    });
});

$(document).on('click','.publishPersonnelRequest', function(){
    var reqnum = $(this).attr("request-number");
    $("#loadingmodal").modal("show");
    $("#btnDismiss").attr("notifid",$(this).attr("notif-id"));
    $.ajax({
        url:"<?php echo base_url();?>personnelrequestmanagement/requestpublish",
        type: "POST",
        data: {
            "REQUESTNUMBER": reqnum
        },
        dataType: "json",
        success:function(result){
            $("#loadingmodal").modal("hide");
            console.log(result);
            if(result.Code == "00"){
                $("#publishReqnum").text(reqnum);
                $("#modalPublishing").modal("show");
                window.isUpdate = true;
                loadNotifications();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
        }
    });
});
$(document).on('click','.qualifiedEmployee', function(){
    $("#actionBtns").hide();
    $("#applyBtns").show();
    $("#publishingBtns").hide();
    $("#requestModal").modal("show");
});

$(document).on('click','.personnelRequestHr', function(){
    $("#actionBtns").show();
    $("#publishingBtns").hide();
    $("#dismissBtn").hide();
    $("#applyBtns").hide();
    var reqnum = $(this).attr("request-number");

    $("#btnDismiss").attr("notifid",$(this).attr("notif-id"));


    var skillset = $("#skillset");
    skillset.empty();

    $("#loadingmodal").modal("show");
    $.ajax({
        url:"<?php echo base_url();?>notificationmanagement/displayrequestdetails",
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
                    window.requestor = result.details[keys].createdby;
                    if(result.details[keys].levelofapproval == "0"){
                        $("#divApprovedWellHr").hide();
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                    } else if(result.details[keys].levelofapproval == "1" || result.details[keys].levelofapproval == "2" || result.details[keys].levelofapproval == "3"){
                        $("#lblapprovedbyhr").text(result.details[keys].hrapprovedby);
                        $("#lbldatehr").text(moment(result.details[keys].hrapproved).format("MMM DD YYYY hh:mm:ss A"));

                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                    } else{
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").hide();
                    }

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
});

$(document).on('click','.jobInvitationMsg', function(){
    $("#letterbody").empty();
    var letter = $(this).attr("notif-details");
    $("#btnAcceptInv").attr("notif-id",$(this).attr("notif-id"));
    $("#btnAcceptInv").attr("appcode",$(this).attr("request-number"));
    $("#invitationletterbody").append(letter);
    $("#lettermodal").modal("show");
});

$(document).on('click','.approvedPersonnelRequest', function(){
    $("#actionBtns").hide();
    $("#publishingBtns").hide();
    $("#closeBtns").show();
    $("#dismissBtn").hide();
    $("#applyBtns").hide();
    var reqnum = $(this).attr("request-number");

    $("#btnDismiss").attr("notifid",$(this).attr("notif-id"));

    var skillset = $("#skillset");
    skillset.empty();

    $("#loadingmodal").modal("show");
    $.ajax({
        url:"<?php echo base_url();?>notificationmanagement/displayApprovedRequestDetails",
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
                    if(result.details[keys].levelofapproval == "0"){
                        $("#divApprovedWellHr").hide();
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                    } else if(result.details[keys].levelofapproval == "1"){
                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                    } else if(result.details[keys].levelofapproval == "2" || result.details[keys].levelofapproval == "3" ){
                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                        $("#divApprovedWellMayor").show();
                        $("#actionBtns").hide();

                    } else if(result.details[keys].levelofapproval == "4"){
                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                        $("#divApprovedWellMayor").show();
                        $("#actionBtns").hide();

                    } else{
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").hide();
                    }

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
});

$(document).on('click','.rejectedPersonnelRequest', function(){
    $("#actionBtns").hide();
    $("#publishingBtns").hide();
    $("#dismissBtn").show();
    $("#applyBtns").hide();
    var reqnum = $(this).attr("request-number");

    $("#btnDismiss").attr("notifid",$(this).attr("notif-id"));

    var skillset = $("#skillset");
    skillset.empty();

    $("#loadingmodal").modal("show");
    $.ajax({
        url:"<?php echo base_url();?>notificationmanagement/displayrequestdetails",
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
                    if(result.details[keys].levelofapproval == "0"){
                        $("#divApprovedWellHr").hide();
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                    } else if(result.details[keys].levelofapproval == "1"){
                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                    } else if(result.details[keys].levelofapproval == "2" || result.details[keys].levelofapproval == "3" ){
                        $("#approveStamp").show();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").show();
                        $("#divApprovedWellMayor").show();
                        $("#actionBtns").hide();

                    }  else if(result.details[keys].levelofapproval == "91" || result.details[keys].levelofapproval == "92" ){
                        $("#approveStamp").hide();
                        $("#rejectStamp").show();
                        $("#divApprovedWellHr").hide();
                        $("#divApprovedWellMayor").hide();
                        $("#actionBtns").hide();
                        $("#lblrejectedby").text(result.details[keys].rejectedby);
                        $("#lblrejectremarks").text(result.details[keys].remarks);

                    } else{
                        $("#approveStamp").hide();
                        $("#rejectStamp").hide();
                        $("#divApprovedWellHr").hide();
                    }

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
});

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

$("#btnApply").click(function(){
    if(window.userlevel == "DEPARTMENTHEAD"){
        $("#requestModal").modal("hide");
        messageDialogModal("Server Message","YOU CANNOT APPLY TO THE NEW POSITION YOU REQUESTED");
    } else if(window.userlevel == "HRDSTAFF"){
        $("#requestModal").modal("hide");
        messageDialogModal("Server Message","Thank you for applying to the position, your data/information has been sent to respective evaluator.");

    }
});

$(document).on('click','.forPublishing', function(){
    if(window.userlevel == "HRMANAGER"){
        $("#approvedStamp").show();
        $("#divApprovedWell").show();
        $("#actionBtns").hide();
        $("#applyBtns").hide();
        $("#publishingBtns").show();
    } else {
        $("#approvedStamp").hide();
    }
    $("#requestModal").modal("show");
});

function loadRequests(){
    $.ajax({
        url : "<?php  echo base_url(); ?>recruitments/getannouncements",
        type : "POST",
        data : {
        },
        dataType: 'json',
        success : function(data){
            console.log(data);
            $("#divAnnouncements").empty();
            var string="";
            for (var key in data.details){
                if (data.details.hasOwnProperty(key)){
                    string+='<div class="card"> <div class="card-body"> <h4 class="card-title">'+ data.details[key].positionname +'</h4> <h6 class="card-subtitle text-muted">Department: '+data.details[key].department+'</h6> </div> <div class="card-body"> <p class="card-text">'+atob(data.details[key].reason)+'</p> <a href="<?php echo base_url(); ?>announcements/view?id='+btoa(data.details[key].requestnumber)+'" class="btn-link">SEE MORE</a> </div> <div class="card-footer text-muted">'+moment(data.details[key].datecreated).format("ddd, MMM DD, YYYY")+'</div> </div> <br>';
                    if (key==2){
                        break;
                    }
                }
            }
            $("#divAnnouncements").append(string);

        },
        error: function(e){
            console.log(e);
        }
    });
}

$("#btnApproveReq").click(function(){
    $("#requestModal").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/approverequest",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $("#lblreqnum").text(),
            "REQUESTOR":window.requestor
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $(".approveReqNum").text(result.RequestNumber);
                <?php if($this->session->userdata('userlevel') == "HRMANAGER"):?>
                $("#modalApproved").modal("show");
                <?php endif;?>
                <?php if($this->session->userdata('userlevel') == "MUNICIPALHEAD"):?>
                $("#modalApprovedMayor").modal("show");
                <?php endif;?>
                window.isUpdate = true;
                loadNotifications();
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$("#btnShowRejectModal").click(function(){
    $("#requestModal").modal("hide");
    $("#modalRejectRequest").modal("show");
    $("#rejectRequestNumber").val($("#lblreqnum").text());
});

$("#btnRejectRequest").click(function(){
    if($("#rejectRemarks").val() == "" || $("#rejectRemarks").val() == null){
        messageDialogModal("Required","Please provide reason for non-approval");
    } else {
        $("#loadingmodal").modal("show");
        $("#modalRejectRequest").modal("hide");
        $.ajax({
            url: "<?php echo base_url();?>personnelrequestmanagement/rejectrequest",
            type: "POST",
            dataType: "json",
            data: {
                "REQUESTNUMBER": $("#rejectRequestNumber").val(),
                "REMARKS": $("#rejectRemarks").val()
            },
            success: function(result){
                $("#loadingmodal").modal("hide");
                if(result.Code == "00"){
                    messageDialogModal("Server Message",result.Message);
                    window.isUpdate = true;
                    loadNotifications();
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
});

$("#announcementApplyNow").click(function(){

});

$("#btnDismiss").click(function(){
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/dismissnotif",
        type: "POST",
        dataType: "json",
        data: {
            "NOTIFID": $(this).attr("notifid")
        },
        success: function(result){
            if(result.Code == "00"){
                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$(document).on('click','.assessedExamination', function(){
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/dismissnotif",
        type: "POST",
        dataType: "json",
        data: {
            "NOTIFID": $(this).attr("notifid")
        },
        success: function(result){
            if(result.Code == "00"){
                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$(document).on('click','.clearNotif', function(){
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/dismissnotif",
        type: "POST",
        dataType: "json",
        data: {
            "NOTIFID": $(this).attr("notifid")
        },
        success: function(result){
            if(result.Code == "00"){
                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});


$(document).on('click','.requirementNotification', function(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>requirementchecklistmanagement/requirementchecklist",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER":$(this).attr("request-number")
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                var list = $("#reqlist");
                list.empty();
                for(var keys in result.details){
                    list.append('<li>'+result.details[keys].requirement+'</li>');
                }
                $("#modalnotifyrequirements").modal("show");
            } else {
                console.log(result.Message);
            }

        },
        error: function(e){
            console.log(e);
        }
    });
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/dismissnotif",
        type: "POST",
        dataType: "json",
        data: {
            "REQUESTNUMBER": $(this).attr("request-number")
        },
        success: function(result){
            if(result.Code == "00"){
                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

$("#btnAcceptInv").click(function(){
    $("#lettermodal").modal("hide");
    $("#loadingmodal").modal("show");
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/acceptinvitation",
        type: "POST",
        dataType: "json",
        data: {
            "NOTIFID": $(this).attr("notif-id"),
            "APPCODE": $(this).attr("appcode")
        },
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                messageDialogModal("Server Message",result.Message);

                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});

$("#btnDeclineInv").click(function(){
    $.ajax({
        url: "<?php echo base_url();?>personnelrequestmanagement/dismissnotif",
        type: "POST",
        dataType: "json",
        data: {
            "NOTIFID": $(this).attr("notifid")
        },
        success: function(result){
            if(result.Code == "00"){
                window.isUpdate = true;
                loadNotifications();
            } else {
                console.log("Server Message: " +result.Message);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
});

</script>