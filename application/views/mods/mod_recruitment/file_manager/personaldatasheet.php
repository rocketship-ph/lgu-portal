<style>
    .panel{
        height: 90px;
        padding: 8px;
        width: 135px;
        border: 1px solid #d8d8d8;
    }
</style>
<style type="text/css">
    .nav.nav-tabs > li > a {
        padding: 2px 5px !important;
        margin-right: 0 !important;
        color: black;
        text-align:left !important;
        font-size: 12px;
    }
    legend{
        font-size: 15px;
    }
</style>
<div class="well">
<table>
    <tr>
        <td rowspan="2">
            <div style="height: 70px;width:70px;background-color: #42A5F5;text-align: center;border-radius: 5px;">
                <br>
                <img src="<?php echo base_url();?>assets/img/icons/recruitment.png" height="50px">
            </div>
        </td>
        <td rowspan="2" width="15px">
            &nbsp;
        </td>
        <td colspan="4">
            <h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>File Maintenance Menu</h4>
            <h4 style="font-size: 12pt">Click the Link Under Menu to make a selection</h4>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td style="border: 1px solid #d1d1d1">
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <?php if(!($this->session->userdata('userlevel') == "TEMPORARY")): ?>
            <td>
                <div class="panel" align="center" id="panel_competencyindex">
                    <a href="<?php echo base_url();?>filemanager/competencyindex" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/competency_index.png" height="40px">
                        <br>
                        Competency Index<br> Profile
                    </a>
                </div>
            </td>
        <?php endif; ?>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <td>
            <div class="panel" align="center" id="panel_personaldatasheet">
                <a  href="<?php echo base_url();?>filemanager/personaldatasheet" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                    <img src="<?php echo base_url();?>assets/img/icons/data_sheet.png" height="40px">
                    <br>
                    Personal Data Sheet
                </a>
            </div>
        </td>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <?php if(!($this->session->userdata('userlevel') == "TEMPORARY")): ?>
            <td>
                <div class="panel" align="center" id="panel_positionprofile">
                    <a  href="<?php echo base_url();?>filemanager/positionprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/position_profile.png" height="40px">
                        <br>
                        Position Profile
                    </a>
                </div>
            </td>
        <?php endif; ?>
        <td align="center" width="20px">
            &nbsp;&nbsp;
        </td>
        <?php if(!($this->session->userdata('userlevel') == "TEMPORARY")): ?>
            <td>
                <div class="panel" align="center" id="panel_departmentprofile">
                    <a  href="<?php echo base_url();?>filemanager/departmentprofile" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
                        <img src="<?php echo base_url();?>assets/img/icons/department_profile.png" height="40px">
                        <br>
                        Department Profile
                    </a>
                </div>
            </td>
        <?php endif;?>
        </td>
    </tr>
</table>
<div class="row">
<div class="col-md-12">
    <hr>
</div>
<div class="col-lg-10">
<div class="form-horizontal pdsform">
<fieldset>
<legend style="font-size: 20px">Personal Data Sheet</legend>
<ul class="nav nav-tabs">
    <li class="active"><a href="#personalinformation" data-toggle="tab">Personal Information</a></li>
    <li><a href="#familybackground" data-toggle="tab">Family Background</a></li>
    <li><a href="#educationalbackground" data-toggle="tab">Educational Background</a></li>
    <li><a href="#civilserviceeligibility" data-toggle="tab">Civil Service Eligibility</a></li>
    <li><a href="#workexperience" data-toggle="tab">Work Experience</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> Other <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#voluntaryworkinvolvement" data-toggle="tab">Voluntary Work Involvement</a></li>
            <li><a href="#trainingprograms" data-toggle="tab">Training Programs</a></li>
            <li><a href="#otherinformation1" data-toggle="tab">Other Information</a></li>
            <li><a href="#otherinformation2" data-toggle="tab">Other Information 2</a></li>
        </ul>
    </li>

</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade active in" id="personalinformation">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Personal Information</legend>
            <p>
                <b>Note: </b>Type "NA" if field is Not Applicable<br>
            </p>
            <div class="form-group col-lg-12">
                <label for="surname" class="control-label">Surname</label>
                <input type="text" class="form-control clearField" id="surname" placeholder="">
            </div>
            <div class="form-group col-lg-12">
                <label for="firstname" class="control-label">First Name</label>
                <input type="text" class="form-control clearField" id="firstname" placeholder="">
            </div>
            <div class="form-group col-lg-9">
                <label for="middlename" class="control-label">Middle Name</label>
                <input type="text" class="form-control clearField" id="middlename" placeholder="">
            </div>
            <div class="form-group col-lg-3">
                <label for="nameextension" class="control-label">Name Extension</label>
                <input type="text" class="form-control clearField" id="nameextension" placeholder="ex. Jr., Sr.">
            </div>
            <div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="dob" class="control-label">Date of Birth (mm/dd/yyy)</label>
                        <input type="text" class="form-control clearField datepick" id="dob" placeholder="mm/dd/yyyy" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pob" class="control-label">Place of Birth</label>
                        <input type="text" class="form-control clearField" id="pob" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label">Sex</label>
                        <div class="radio">
                            <label>
                                <input class="clearField" type="radio" name="sexRadios" id="male" value="MALE">
                                Male
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="clearField" type="radio" name="sexRadios" id="female" value="FEMALE">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="civilstatus" class="control-label">Civil Status</label>
                        <div class="radio">
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="single" value="SINGLE">
                                Single
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="widowed" value="WIDOWED">
                                Widowed
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="married" value="MARRIED">
                                Married
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="separated" value="SEPARATED">
                                Separated
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="annulled" value="ANNULLED">
                                Annulled
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="clearField" type="radio" name="csRadios" id="others" value="OTHERS">
                                Others
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="citizenship" class="control-label">Citizenship</label>
                        <input type="text" class="form-control clearField" id="citizenship" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="height" class="control-label">Height</label>
                        <input type="text" class="form-control clearField" id="height" placeholder="in meters">
                    </div>
                    <div class="form-group">
                        <label for="weight" class="control-label">Weight</label>
                        <input type="text" class="form-control clearField" id="weight" placeholder="in kilograms">
                    </div>
                    <div class="form-group">
                        <label for="bloodtype" class="control-label">Blood Type</label>
                        <input type="text" class="form-control clearField" id="bloodtype" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="gsisno" class="control-label">GSIS ID No</label>
                        <input type="text" class="form-control clearField" id="gsisno" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="pagibigno" class="control-label">PAGIBIG ID No</label>
                        <input type="text" class="form-control clearField" id="pagibigno" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="philhealthno" class="control-label">PHILHEALTH ID No</label>
                        <input type="text" class="form-control clearField" id="philhealthno" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sssno" class="control-label">SSS ID No</label>
                        <input type="text" class="form-control clearField" id="sssno" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="tin" class="control-label">TIN</label>
                        <input type="text" class="form-control clearField" id="tin" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="agencyno" class="control-label">Agency Employee No.</label>
                        <input type="text" class="form-control clearField" id="agencyno" placeholder="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="well">
                        <div class="form-group">
                            <label for="residentialaddress" class="control-label">Residential Address</label>
                            <textarea class="form-control clearField" style="resize: none" rows="2" id="residentialaddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <input class="form-control placeholderinputs" id="resprovince0" readonly>
                            <select class="form-control clearField addressinput" id="resprovince">
                                <option selected disabled>- Select Province -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">City/Municipality</label>
                            <input class="form-control placeholderinputs" id="rescitymun0" readonly>
                            <select class="form-control clearField addressinput" id="rescitymun">
                                <option selected disabled>- Select City/Municipality -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Barangay</label>
                            <input class="form-control placeholderinputs" id="resbrgy0" readonly>
                            <select class="form-control clearField addressinput" id="resbrgy">
                                <option selected disabled>- Select Barangay -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rzipcode" class="control-label">Zip Code</label>
                            <input type="text" class="form-control clearField" id="rzipcode" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="rtelephonenumber" class="control-label">Telephone Number</label>
                            <input type="text" class="form-control clearField" id="rtelephonenumber" placeholder="">
                        </div>
                    </div>
                    <div class="well">
                        <div class="form-group">
                            <label for="permanentaddress" class="control-label">Permanent Address</label>
                            <textarea class="form-control clearField" style="resize: none" rows="2" id="permanentaddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <input class="form-control placeholderinputs" id="perprovince0" readonly>
                            <select class="form-control clearField addressinput" id="perprovince">
                                <option selected disabled>- Select Province -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">City/Municipality</label>
                            <input class="form-control placeholderinputs" id="percitymun0" readonly>
                            <select class="form-control clearField addressinput" id="percitymun">
                                <option selected disabled>- Select City/Municipality -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Barangay</label>
                            <input class="form-control placeholderinputs" id="perbrgy0" readonly>
                            <select class="form-control clearField addressinput" id="perbrgy">
                                <option selected disabled>- Select Barangay -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pzipcode" class="control-label">Zip Code</label>
                            <input type="text" class="form-control clearField" id="pzipcode" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="ptelephonenumber" class="control-label">Telephone Number</label>
                            <input type="text" class="form-control clearField" id="ptelephonenumber" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email (if any)</label>
                        <input type="text" class="form-control clearField" id="email" placeholder="email@host.com">
                    </div>
                    <div class="form-group">
                        <label for="cellphoneno" class="control-label">Cellphone No. (if any)</label>
                        <input type="text" class="form-control clearField" id="cellphoneno" placeholder="">
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="familybackground">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Family Background</legend>
            <div>
                <p>
                    <b>Note: </b>Type "NA" if field is Not Applicable<br>
                </p>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="spousesurname" class="control-label">Spouse's Surname</label>
                        <input type="text" class="form-control clearField" id="spousesurname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spousefirstname" class="control-label">Spouse's First Name</label>
                        <input type="text" class="form-control clearField" id="spousefirstname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spousemiddlename" class="control-label">Spouse's Middle Name</label>
                        <input type="text" class="form-control clearField" id="spousemiddlename" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spouseoccupation" class="control-label">Occupation</label>
                        <input type="text" class="form-control clearField" id="spouseoccupation" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spouseemployerbusinessname" class="control-label">Employer/Business Name</label>
                        <input type="text" class="form-control clearField" id="spouseemployerbusinessname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spousebusinessaddress" class="control-label">Business Address</label>
                        <input type="text" class="form-control clearField" id="spousebusinessaddress" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="spousetelephoneno" class="control-label">Telephone No.</label>
                        <input type="text" class="form-control clearField" id="spousetelephoneno" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="fathersurname" class="control-label">Father's Surname</label>
                        <input type="text" class="form-control clearField" id="fathersurname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="fatherfirstname" class="control-label">Father's First Name</label>
                        <input type="text" class="form-control clearField" id="fatherfirstname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="fathermiddlename" class="control-label">Father's Middle Name</label>
                        <input type="text" class="form-control clearField" id="fathermiddlename" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="mothersurname" class="control-label">Mother's Maiden Surname</label>
                        <input type="text" class="form-control clearField" id="mothersurname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="motherfirstname" class="control-label">Mother's Maiden First Name</label>
                        <input type="text" class="form-control clearField" id="motherfirstname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="mothermiddlename" class="control-label">Mother's Maiden Middle Name</label>
                        <input type="text" class="form-control clearField" id="mothermiddlename" placeholder="">
                    </div>
                </div>
                <div class="well col-lg-6">
                    <button id="btnChildAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnChildRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>

                    <div class="row">
                        <br>
                        <div class="col-lg-7">
                            <label class="control-label">Name of Child</label>
                        </div>
                        <div class="col-lg-5">
                            <label class="control-label">Date of Birth</label></div>
                    </div>
                    <div class="row" id="tbodychildren">
                        <div class="children0">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control clearField child childname1" dt="childname" placeholder="">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control clearField child datepick childbday1" dt="bday" placeholder="mm/dd/yyyy" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="educationalbackground">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Educational Background</legend>
            <p>
                <b>Note: </b>Type "NA" if field is Not Applicable<br>
            </p>
            <div class="col-lg-12">
                <legend style="font-size: 12px">Elementary</legend>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="eschool" class="control-label">School</label>
                        <textarea class="form-control clearField" id="eschool" placeholder="" rows="4" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edegree" class="control-label">Degree Course</label>
                        <input type="text" class="form-control clearField" id="edegree" placeholder="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="eyeargraduated" class="control-label">Year Graduated(if graduated)</label>
                        <input type="text" class="form-control clearField" id="eyeargraduated" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eyeargraduated" class="control-label">Inclusive Dates of Attendance</label>
                        <div class="form-group col-lg-6">
                            <label for="efrom" class="control-label">From</label>
                            <input type="text" class="form-control clearField datefrom" id="efrom" placeholder="" readonly>
                        </div>t
                        <div class="form-group col-lg-6">
                            <label for="eto" class="control-label">To</label>
                            <input type="text" class="form-control clearField dateto" id="eto" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="escholarshiporacademichonorsreceived" class="control-label">Scholarship/Academic Honors Received</label>
                        <input type="text" class="form-control clearField" id="escholarshiporacademichonorsreceived" placeholder="">
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <legend style="font-size: 12px">High School</legend>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="hschool" class="control-label">School</label>
                        <textarea class="form-control clearField" id="hschool" placeholder="" rows="4" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hdegree" class="control-label">Degree Course</label>
                        <input type="text" class="form-control clearField" id="hdegree" placeholder="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="hyeargraduated" class="control-label">Year Graduated(if graduated)</label>
                        <input type="text" class="form-control clearField" id="hyeargraduated" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eyeargraduated" class="control-label">Inclusive Dates of Attendance</label>
                        <div class="form-group col-lg-6">
                            <label for="hfrom" class="control-label">From</label>
                            <input type="text" class="form-control clearField datefrom" readonly id="hfrom" placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="hto" class="control-label">To</label>
                            <input type="text" class="form-control clearField dateto" readonly id="hto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hscholarshiporacademichonorsreceived" class="control-label">Scholarship/Academic Honors Received</label>
                        <input type="text" class="form-control clearField" id="hscholarshiporacademichonorsreceived" placeholder="">
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <legend style="font-size: 12px">Vocational/Trade Courses</legend>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="vschool" class="control-label">School</label>
                        <textarea class="form-control clearField" id="vschool" placeholder="" rows="4" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="vdegree" class="control-label">Degree Course</label>
                        <input type="text" class="form-control clearField" id="vdegree" placeholder="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="vyeargraduated" class="control-label">Year Graduated(if graduated)</label>
                        <input type="text" class="form-control clearField" id="vyeargraduated" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="yyeargraduated" class="control-label">Inclusive Dates of Attendance</label>
                        <div class="form-group col-lg-6">
                            <label for="vfrom" class="control-label">From</label>
                            <input type="text" class="form-control clearField datefrom" id="vfrom" readonly placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="vto" class="control-label">To</label>
                            <input type="text" class="form-control clearField dateto" readonly id="vto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vscholarshiporacademichonorsreceived" class="control-label">Scholarship/Academic Honors Received</label>
                        <input type="text" class="form-control clearField" id="vscholarshiporacademichonorsreceived" placeholder="">
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <legend style="font-size: 12px">College</legend>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="cschool" class="control-label">School</label>
                        <textarea class="form-control clearField" id="cschool" placeholder="" rows="4" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cdegree" class="control-label">Degree Course</label>
                        <input type="text" class="form-control clearField" id="cdegree" placeholder="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="cyeargraduated" class="control-label">Year Graduated(if graduated)</label>
                        <input type="text" class="form-control clearField" id="cyeargraduated" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eyeargraduated" class="control-label">Inclusive Dates of Attendance</label>
                        <div class="form-group col-lg-6">
                            <label for="cfrom" class="control-label">From</label>
                            <input type="text" class="form-control clearField datefrom" readonly id="cfrom" placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="cto" class="control-label">To</label>
                            <input type="text" class="form-control clearField dateto" readonly id="cto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cscholarshiporacademichonorsreceived" class="control-label">Scholarship/Academic Honors Received</label>
                        <input type="text" class="form-control clearField" id="cscholarshiporacademichonorsreceived" placeholder="">
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <legend style="font-size: 12px">Graduate School</legend>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="gschool" class="control-label">School</label>
                        <textarea class="form-control clearField" id="gschool" placeholder="" rows="4" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gdegree" class="control-label">Degree Course</label>
                        <input type="text" class="form-control clearField" id="gdegree" placeholder="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="gyeargraduated" class="control-label">Year Graduated(if graduated)</label>
                        <input type="text" class="form-control clearField" id="gyeargraduated" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="eyeargraduated" class="control-label">Inclusive Dates of Attendance</label>
                        <div class="form-group col-lg-6">
                            <label for="gfrom" class="control-label">From</label>
                            <input type="text" class="form-control clearField datefrom" readonly id="gfrom" placeholder="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="gto" class="control-label">To</label>
                            <input type="text" class="form-control clearField dateto" readonly id="gto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gscholarshiporacademichonorsreceived" class="control-label">Scholarship/Academic Honors Received</label>
                        <input type="text" class="form-control clearField" id="gscholarshiporacademichonorsreceived" placeholder="">
                    </div>

                </div>
            </div>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="civilserviceeligibility">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Civil Service Eligibility</legend>
            <p>
                <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnCseAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnCseRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
            </p>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <td rowspan="2">Career Service/RA 1080 (Board/Bar) Under Special Laws/CES/CSEE&nbsp;<a href="http://www.officialgazette.gov.ph/services/civil-service-eligibility/eligibilities-granted-under-special-laws-and-csc-issuances/" target="_blank"><i class="fa fa-lg fa-question-circle" aria-hidden="true"></i></a></td>
                    <td rowspan="2">Rating</td>
                    <td rowspan="2">Date of Examination/ Conferment</td>
                    <td rowspan="2">Place of Examination/ Conferment</td>
                    <td colspan="2">Licence (if applicable)</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>Date of Release</td>
                </tr>
                </thead>
                <tbody id="tbodycse">
                <tr class="cseligibility0">
                    <td><input type="text" class="form-control clearField cseCareerService1" dt="careerservice"></td>
                    <td><input type="text" class="form-control clearField cseRating1" dt="rating"></td>
                    <td><input type="text" class="form-control clearField cseExamDate1 datepick" dt="examdate" readonly placeholder="Date.."></td>
                    <td><input type="text" class="form-control clearField cseExamPlace1" dt="examplace"></td>
                    <td><input type="text" class="form-control clearField cseLicenseNo1" dt="licenseno"></td>
                    <td><input type="text" class="form-control clearField cseLicenseDate1 datepick" dt="licensedate" readonly placeholder="Date.."></td>
                </tr>

                </tbody>
            </table>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="workexperience">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Work Experience</legend>
            <p style="font-weight: bold;font-style: italic">Include Private Employment</p>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="employmenttype" class="control-label">Current Employment Type <i>(if applicable)</i></label>
                    <select class="form-control clearField" id="employmenttype">
                        <option selected disabled>- Select Employment Type -</option>
                        <option value="CASUAL">Casual</option>
                        <option value="PLANTILLA">Plantilla</option>
                        <option value="JOBORDER">Job Order</option>
                        <option value="COTERMINOUS">Co-Terminous</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="employmenttype" class="control-label">Date Entered the LGU <i>(if applicable)</i></label>
                    <input type="text" class="form-control clearField datepick" id="dateenteredlgu" placeholder="Pick a Date.." readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="currentposition" class="control-label">Current Position <i>(if applicable)</i></label>
                    <select class="form-control clearField" id="currentposition">
                        <option selected disabled>- Select Current Position -</option>
                    </select>
                </div>
                <div class="col-md-12" align="left">
                    <p>
                        <br>
                        <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnWorkAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnWorkRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
                    </p>
                </div>
            </div>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <td colspan="2">Inclusive Dates
                        (mm/dd/yyyy</td>
                    <td rowspan="2">Position Title</td>
                    <td rowspan="2">Department/Agency/ Office/Company</td>
                    <td rowspan="2">Monthly Salary</td>
                    <td rowspan="2">Salary Grade/ Step Increment</td>
                    <td rowspan="2">Status of Appointment</td>
                    <td rowspan="2">Gov't Service
                        (Yes/No)</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>To</td>
                </tr>
                </thead>
                <tbody id="tbodywork">
                <tr class="workex0">
                    <td><input type="text" class="form-control clearField datefrom weDatefrom1" dt="fromdate" id="autodatefrom" readonly></td>
                    <td><input type="text" class="form-control clearField dateto weDateto1" dt="todate" readonly></td>
                    <td><input type="text" class="form-control clearField wePosition1" dt="position" id="autocurrpos"></td>
                    <td><input type="text" class="form-control clearField weCompany1" dt="company" id="autocomp"></td>
                    <td><input type="text" class="form-control clearField weSalary1" dt="salary" id="autosalary"></td>
                    <td><input type="text" class="form-control clearField weSalaryGrade1" dt="salarygrade" id="autosalarygrade"></td>
                    <td><input type="text" class="form-control clearField weAppointment1" dt="appointmentstatus" id="autostatus"></td>
                    <td><select class="form-control clearField weGovtService1" dt="govtservice" id="autogovtservice"><option value="YES">YES</option><option value="NO">NO</option></select></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="voluntaryworkinvolvement">
    <div class="form-horizontal">
        <fieldset>
            <legend>Voluntary Work Involvement</legend>
            <table class="table table-borderless">
                <p>
                    <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnVolWorkAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnVolWorkRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
                </p>
                <thead>
                <tr>
                    <td rowspan="2">Name &amp; Address of Organization</td>
                    <td colspan="2">Inclusive dates
                        (mm/dd/yyyy)</td>
                    <td rowspan="2">Number of hours</td>
                    <td rowspan="2">Position or nature of work</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>To</td>
                </tr>
                </thead>
                <tbody id="tbodyvolwork">
                <tr class="volwork0">
                    <td><input type="text" class="form-control clearField vwiOrganization1" dt="organization"></td>
                    <td><input type="text" class="form-control clearField vwiDatefrom1 datefrom" dt="fromdate" readonly></td>
                    <td><input type="text" class="form-control clearField vwiDateto1 dateto" dt="todate" readonly></td>
                    <td><input type="text" class="form-control clearField vwiHours1" dt="hours"></td>
                    <td><input type="text" class="form-control clearField vwiPosition1" dt="position"></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="trainingprograms">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Training Programs</legend>
            <table class="table table-borderless">
                <p>
                    <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnTrainingsAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnTrainingsRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
                </p>
                <thead>
                <tr>
                    <td rowspan="2">Title of Seminar/Conference/Workshop/Short Courses</td>
                    <td colspan="2">Inclusive dates of Attendance
                        (mm/dd/yyyy)</td>
                    <td rowspan="2">Number of hours</td>
                    <td rowspan="2">Conducted or Sponsored by</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>To</td>
                </tr>
                </thead>
                <tbody id="tbodytraining">
                <tr class="trainingprogs0">
                    <td><input type="text" class="form-control clearField tpSeminar1" dt="title"></td>
                    <td><input type="text" class="form-control clearField tpDatefrom1 datefrom" dt="fromdate" readonly></td>
                    <td><input type="text" class="form-control clearField tpDateto1 dateto" dt="todate" readonly></td>
                    <td><input type="text" class="form-control clearField thHours1" dt="hours"></td>
                    <td><input type="text" class="form-control clearField tpConducted1" dt="conductedby"></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="otherinformation1">
    <div class="form-horizontal">
        <fieldset>
            <legend></legend>
            <legend>Other Information</legend>
            <table class="table table-borderless">
                <p>
                    <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnOther1Add" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnOther1Remove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
                </p>
                <thead>
                <tr>
                    <td>Special Skills/Hobbies</td>
                    <td>Non-academic distinctions/Recognition</td>
                    <td>Membership in Association/Organization</td>
                </tr>
                </thead>
                <tbody id="tbodyother1">

                <tr class="otherinfoone0">
                    <td><input type="text" class="form-control clearField oi1Skills1" dt="specialskills"></td>
                    <td><input type="text" class="form-control clearField oi1Recognition1" dt="recognitions"></td>
                    <td><input type="text" class="form-control clearField oi1Organization1" dt="membership"></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
<div class="tab-pane fade" id="otherinformation2">
<div class="form-horizontal">
<fieldset>
<legend></legend>
<legend>Other Information 2</legend>
<div class="form-group">
    <label class="control-label">Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</label><br>
    <label class="control-label">a. Within the third degree?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a36" id="a36yes" value="yes" class="c1 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a36" id="a36no" value="no" class="c1 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a36yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp1" id="a36yesexplanation" placeholder="">
        </div>
    </div>
    <label class="control-label">b.  within the fourth degree (for Local Government Unit - Career Employees)?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="b36" id="b36yes" value="yes" class="c2 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="b36" id="b36no" value="no" class="c2 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="b36yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp2" id="b36yesexplanation" placeholder="">
        </div>
    </div> <hr>
    <label class="control-label">Have you ever been found guilty of any administrative offense?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a37" id="a37yes" value="yes" class="c3 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a37" id="a37no" value="no" class="c3 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a37yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp3" id="a37yesexplanation" placeholder="">
        </div>
    </div>
    <label class="control-label">Have you been criminally charged before any court?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="b37" id="b37yes" value="yes" class="c4 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="b37" id="b37no" value="no" class="c4 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="b37yesexplanation" class="control-label">if YES, give details in this format: <b>Date Filed (mm/dd/yyyy);Status of Case(s)</b></label>
            <input type="text" class="form-control clearField exp4" id="b37yesexplanation" placeholder="ex. 01/01/2010;DISMISSED">
        </div>
    </div><hr>
    <label class="control-label">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a38" id="a38yes" value="yes" class="c5 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a38" id="a38no" value="no" class="c5 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a38yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp5" id="a38yesexplanation" placeholder="">
        </div>
    </div><hr>
    <label class="control-label">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a39" id="a39yes" value="yes" class="c6 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a39" id="a39no" value="no" class="c6 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a39yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp6" id="a39yesexplanation" placeholder="">
        </div>
    </div><hr>
    <label class="control-label">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a40" id="a40yes" value="yes" class="c7 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a40" id="a40no" value="no" class="c7 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a40yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp7" id="a40yesexplanation" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</label>
        <div class="radio">
            <label>
                <input type="radio" name="b40" id="b40yes" value="yes" class="c11 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="b40" id="b40no" value="no" class="c11 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="b40yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp11" id="b40yesexplanation" placeholder="">
        </div>
    </div><hr>
    <div class="form-group">
        <label class="control-label">Have you acquired the status of an immigrant or permanent resident of another country?</label>
        <div class="radio">
            <label>
                <input type="radio" name="a42" id="a42yes" value="yes" class="c12 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a42" id="a42no" value="no" class="c12 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a42yesexplanation" class="control-label">if YES, give details (country)</label>
            <input type="text" class="form-control clearField exp12" id="a42yesexplanation" placeholder="">
        </div>
    </div><hr>
    <label class="control-label">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</label><br><label class="control-label">a. Are you a member of any indigenous group?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="a41" id="a41yes" value="yes" class="c8 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="a41" id="a41no" value="no" class="c8 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="a41yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp8" id="a41yesexplanation" placeholder="">
        </div>
    </div><label class="control-label">b. Are you a person with disability?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="b41" id="b41yes" value="yes" class="c9 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="b41" id="b41no" value="no" class="c9 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="b41yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp9" id="b41yesexplanation" placeholder="">
        </div>
    </div><label class="control-label">c. Are you a solo parent?</label>
    <div class="form-group">
        <div class="radio">
            <label>
                <input type="radio" name="c41" id="c41yes" value="yes" class="c10 clearField">
                Yes
            </label>
            <label>
                <input type="radio" name="c41" id="c41no" value="no" class="c10 clearField">
                No
            </label>
        </div>
        <div class="form-group">
            <label for="c41yesexplanation" class="control-label">if YES, give details</label>
            <input type="text" class="form-control clearField exp10" id="c41yesexplanation" placeholder="">
        </div>
    </div>
</div>
<div class="form-group">
    <legend style="font-size: 12px">References</legend>
    <table class="table table-borderless">
        <p>
            <b>Note: </b>Type "NA" if field is Not Applicable &nbsp;&nbsp;&nbsp;<button id="btnRefAdd" class="btn btn-sm btn-outline-success addremovebuttons">+Add Fields</button>&nbsp;&nbsp;<button id="btnRefRemove" class="btn btn-sm btn-outline-primary addremovebuttons">- Remove Field</button>
        </p>
        <thead>
        <tr>
            <td>Name</td>
            <td>Address</td>
            <td>Tel No.</td>
        </tr>
        </thead>
        <tbody id="tbodyref">
        <tr class="characterref0">
            <td><input type="text" class="form-control clearField oi2RefName1" dt="name"></td>
            <td><input type="text" class="form-control clearField oi2RefAddress1" dt="address"></td>
            <td><input type="text" class="form-control clearField oi2RefTelno1" dt="telno"></td>
        </tr>
        </tbody>
    </table>
</div>
</fieldset>
</div>
</div>
</div>
</fieldset>
</div>
<br>
<br>
<br>
</div>
<div class="col-lg-2">
    <br>
    <br>
    <button class="btn btn-default btn-block" id="btnAdd">ADD</button>
    <button class="btn btn-danger btn-block" id="btnEdit">EDIT</button>
    <button class="btn btn-primary btn-block" id="btnDelete">DELETE</button>
    <button class="btn btn-success btn-block" id="btnSave">SAVE</button>
    <button class="btn btn-info btn-block" id="btnPrint"><i class="fa fa-save"></i>&nbsp;EXPORT PDF</button>
</div>
</div>
</div>
<br>
<br>
<div class="modal fade bs-example-modal-sm" id="modalupdate" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header" >
                <span>Server Message</span>
            </div>
            <div class="modal-body">
                <span>Personal Data Sheet Successfully Updated</span>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success" data-dismiss="modal"  onclick="location.reload();" value="Ok">
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modaldelete" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-body">
                <h4 style="margin-top: 5px;">Confirmation</h4>
                <hr>
                <span>Are you sure you want to delete your personal data sheet?</span>
                <hr>
                <div align="right">
                    <input type="button" class="btn btn-primary" id="btnProceedDelete" value="DELETE">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal"  value="CANCEL">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="modaldeletesuccess" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header" >
                <span>Server Message</span>
            </div>
            <div class="modal-body">
                <span>Personal Data Sheet Deleted</span>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success" data-dismiss="modal"  onclick="location.reload();" value="Ok">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalQualificationMessage" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Server Message</legend>
                <div class="form-group">
                    <p id="qmsg"></p>
                </div>

                <div style="text-align: right">
                    <button type="button" class="btn btn-primary" id="btnMsg">OK</button>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalQualificationMessage" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div  class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <legend>Server Message</legend>
                <div class="form-group">
                    <p id="qmsg"></p>
                </div>

                <div style="text-align: right">
                    <button type="button" class="btn btn-primary" id="btnMsg">OK</button>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
$(document).ready(function(){
    toDataURL('<?php echo base_url()?>assets/pds/1.jpg', function(dataUrl) {window.p1=dataUrl;});
    toDataURL('<?php echo base_url()?>assets/pds/2.jpg', function(dataUrl) {window.p2=dataUrl;});
    toDataURL('<?php echo base_url()?>assets/pds/3.jpg', function(dataUrl) {window.p3=dataUrl;});
    toDataURL('<?php echo base_url()?>assets/pds/4.jpg', function(dataUrl) {window.p4=dataUrl;;});
    window.sex = "";
    window.civilstatus = "";
    window.isUpdate = false;

    $("#nav_recruitment_filemanager").removeClass().addClass("active");

    $("#ul_recruitmentmenu").show();
    $("#ul_mainmenu").hide();

    $("#panel_personaldatasheet").addClass("selected_panel");

    $('.datepick').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "mm/dd/yyyy"
    });

    $(".datefrom").datepicker({
        todayBtn:  1,
        autoclose: true,
        todayHighlight: true,
        format: "mm/dd/yyyy"
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('.dateto').datepicker('setStartDate', minDate);
    });

    $(".dateto").datepicker({
        autoclose: true,
        format: "mm/dd/yyyy"
    }).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date.valueOf());
        $('.datefrom').datepicker('setEndDate', maxDate);
    });

    $('#eyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#hyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#vyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#gyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#cyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });
    loadCurrentPositions();
    $("#btnPrint").prop("disabled",true);

});

function loadCurrentPositions(){
    var select  = $("#currentposition");
    select.empty();
    $.ajax({
        url: "<?php echo base_url();?>positionmanagement/getpositions",
        type: "POST",
        dataType: "json",
        success: function(data){
            if(data.Code == "00"){
                $("#loadingmodal").modal("hide");
                select.append("<option selected disabled>- Select Current Position -</option>");
                for(var keys in data.details){
                    select.append("<option salary-equivalent='"+data.details[keys].salaryequivalent+"' salary-grade='"+data.details[keys].salarygrade+"' value='"+data.details[keys].name+"'>"+data.details[keys].name+"</option>");
                }
                loadPdsData();
            } else {
                select.append("<option selected disabled>- No Position Available -</option>");
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            select.append("<option selected disabled>- No Position Available -</option>");
            console.log(e);
        }
    });
}


$("#currentposition").change(function(){
    $("#autocurrpos").val($("#currentposition option:selected").val());
    $("#autocomp").val("<?php echo strtoupper($this->session->userdata('department'));?>");
    $("#autosalary").val($("#currentposition option:selected").attr("salary-equivalent"));
    $("#autosalarygrade").val($("#currentposition option:selected").attr("salary-grade"));
    $("#autostatus").val("ACTIVE");
    $("#autogovtservice").val("YES");
});

$("#dateenteredlgu").change(function(){
   $("#autodatefrom").val($(this).val());
});

function loadExistingProvincess(){
    $("#loadingmodal").modal("show");
    $.ajax({
        url: '<?php echo base_url();?>homepage/getprovince',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#perprovince').empty();
            $('#resprovince').empty();
            $('#perprovince').append('<option selected disabled>- Select Province -</option>');
            $('#resprovince').append('<option selected disabled>- Select Province -</option>');
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
                $('#perprovince').append('<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
                $('#resprovince').append('<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
            }
            var res = window.pdsdata;
            for(var keys in res.details){
                $("#resprovince").val(res.details[keys].residentialprovince);
                $("#perprovince").val(res.details[keys].permanentprovince);
            }
            loadExistingCities();
        },
        error:function(e){
            console.log(e);
        }
    });
}

function loadExistingCities(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getcity',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#percitymun').empty();
            $('#rescitymun').empty();
            $('#percitymun').append('<option selected disabled>- Select City/Municipality -</option>');
            $('#rescitymun').append('<option selected disabled>- Select City/Municipality -</option>');
            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    $('#percitymun').append('<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                    $('#rescitymun').append('<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                }
            }
            var res = window.pdsdata;
            for(var keys in res.details){
                $("#rescitymun").val(res.details[keys].residentialcity);
                $("#percitymun").val(res.details[keys].permanentcity);
            }
            loadExistingBrgys();
        },
        error:function(e){
            console.log(e);
        }
    });
}

function loadExistingBrgys(){
    var rescity = $("#rescitymun option:selected").attr("citycode");
    var percity = $("#percitymun option:selected").attr("citycode");

    $.ajax({
        url: '<?php echo base_url();?>homepage/getbrgy',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#perbrgy').empty();
            $('#resbrgy').empty();
            $('#perbrgy').append('<option selected disabled>- Select Barangay -</option>');
            $('#resbrgy').append('<option selected disabled>- Select Barangay -</option>');

            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(rescity==result.RECORDS[keys].citymunCode){
                        $('#resbrgy').append('<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                    }
                    if(percity==result.RECORDS[keys].citymunCode){
                        $('#perbrgy').append('<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                    }

                }
            }
            var res = window.pdsdata;
            for(var keys in res.details){
                $("#resbrgy").val(res.details[keys].residentialbrgy);
                $("#perbrgy").val(res.details[keys].permanentbrgy);
            }
            plotExistingAddress();
        },
        error:function(e){
            console.log(e);
        }
    });
}

function plotExistingAddress(){
    $("#loadingmodal").modal("hide");
    messageDialogModal("Notice","Click \'Save\' once you finished updating your data.");
    $(".addremovebuttons").each(function(){
        $(this).prop("disabled",false);
    });
    $(".clearField").each(function(){
        $(this).prop("disabled",false);
    });

    $("#btnAdd").prop("disabled",true);
    $("#btnSave").prop("disabled",false);
    $("#btnEdit").prop("disabled",true);
    $("#btnDelete").prop("disabled",false);

    $(".placeholderinputs").hide();
    $(".addressinput").show();
}

function loadProvinces(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getprovince',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#perprovince').empty();
            $('#resprovince').empty();
            $('#perprovince').append('<option selected disabled>- Select Province -</option>');
            $('#resprovince').append('<option selected disabled>- Select Province -</option>');
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
                $('#perprovince').append('<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
                $('#resprovince').append('<option value="'+data[keys].provDesc+'" provcode="'+data[keys].provCode+'">'+data[keys].provDesc+'</option>' );
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

$("#perprovince").change(function(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getcity',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#percitymun').empty();
            $('#percitymun').append('<option selected disabled>- Select City/Municipality -</option>');
            var code = $("#perprovince option:selected").attr("provcode");
            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].provCode){

                        $('#percitymun').append('<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});

$("#resprovince").change(function(){
    $.ajax({
        url: '<?php echo base_url();?>homepage/getcity',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#rescitymun').empty();
            $('#rescitymun').append('<option selected disabled>- Select City/Municipality -</option>');
            var code = $("#resprovince option:selected").attr("provcode");
            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].provCode){

                        $('#rescitymun').append('<option value="'+result.RECORDS[keys].citymunDesc+'" citycode="'+result.RECORDS[keys].citymunCode+'">'+result.RECORDS[keys].citymunDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});


$("#percitymun").change(function(){
    var code = $("#percitymun option:selected").attr("citycode");
    $.ajax({
        url: '<?php echo base_url();?>homepage/getbrgy',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#perbrgy').empty();
            $('#perbrgy').append('<option selected disabled>- Select Barangay -</option>');

            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].citymunCode){

                        $('#perbrgy').append('<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});

$("#rescitymun").change(function(){
    var code = $("#rescitymun option:selected").attr("citycode");
    $.ajax({
        url: '<?php echo base_url();?>homepage/getbrgy',
        type: 'post',
        data:{
        },
        dataType : 'json',
        success:function(result){
            $('#resbrgy').empty();
            $('#resbrgy').append('<option selected disabled>- Select Barangay -</option>');

            for(var keys in result.RECORDS)
            {
                if ((result.RECORDS).hasOwnProperty(keys))
                {
                    if(code==result.RECORDS[keys].citymunCode){

                        $('#resbrgy').append('<option value="'+result.RECORDS[keys].brgyDesc+'" code="'+result.RECORDS[keys].brgyCode+'">'+result.RECORDS[keys].brgyDesc+'</option>' );
                    }
                }
            }
        },
        error:function(e){
            console.log(e);
        }
    });
});

function applyDatepicker(){
    $('.datepick').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "mm/dd/yyyy"
    });

    $(".datefrom").datepicker({
        todayBtn:  1,
        autoclose: true,
        todayHighlight: true,
        format: "mm/dd/yyyy"
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('.dateto').datepicker('setStartDate', minDate);
    });

    $(".dateto").datepicker({
        autoclose: true,
        format: "mm/dd/yyyy"
    }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('.datefrom').datepicker('setEndDate', maxDate);
        });

    $('#eyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#hyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#vyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#gyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });

    $('#cyeargraduated').datepicker({
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        format:"yyyy"
    });
}

function loadPdsData(){
    if(window.isUpdate == false){
        $("#loadingmodal").modal("show");
    }
    $.ajax({
       url: "<?php echo base_url();?>pdsmanagement/getpdsdata",
        type: "GET",
        dataType:"json",
        success: function(result){
            $("#loadingmodal").modal("hide");

            if(result.Code == "00"){
                window.pdsdata = result;
                $("#btnAdd").prop("disabled",true);
                $("#btnSave").prop("disabled",true);
                $("#btnEdit").prop("disabled",false);
                $("#btnDelete").prop("disabled",false);

                $("#myTabContent").find(".clearField").attr("disabled","disabled");
                $(".addremovebuttons").each(function(){
                    $(this).prop("disabled",true);

                });
                $(".clearField").each(function(){
                   $(this).prop("disabled",true);
                });
                for(var keys in result.details){
                    $("#currentposition").val(result.details[keys].currentposition);
                    $("#dateenteredlgu").val(result.details[keys].dateenteredlgu);
                    $("#employmenttype").val(result.details[keys].currentemploymenttype);
                    $("#surname").val(result.details[keys].lastname);
                    $("#firstname").val(result.details[keys].firstname);
                    $("#middlename").val(result.details[keys].middlename);
                    $("#nameextension").val(result.details[keys].nameextension);
                    $("#dob").val(result.details[keys].dateofbirth);
                    $("#pob").val(result.details[keys].placeofbirth);
                    window.sex = result.details[keys].sex;
                    window.civilstatus = result.details[keys].civilstatus;
                    $("input[name=sexRadios][value=" + result.details[keys].sex + "]").prop('checked', true);
                    $("input[name=csRadios][value=" + result.details[keys].civilstatus + "]").prop('checked', true);
                    $("#citizenship").val(result.details[keys].citizenship);
                    $("#height").val(result.details[keys].height);
                    $("#weight").val(result.details[keys].weight);
                    $("#bloodtype").val(result.details[keys].bloodtype);
                    $("#gsisno").val(result.details[keys].gsisidno);
                    $("#pagibigno").val(result.details[keys].pagibigidno);
                    $("#philhealthno").val(result.details[keys].philhealthidno);
                    $("#sssno").val(result.details[keys].sssidno);
                    $("#tin").val(result.details[keys].tin);
                    $("#residentialaddress").val(result.details[keys].residentialaddress);
                    $("#rzipcode").val(result.details[keys].residentialzipcode);
                    $("#rtelephonenumber").val(result.details[keys].residentialtelno);
                    $("#permanentaddress").val(result.details[keys].permanentaddress);
                    $("#pzipcode").val(result.details[keys].permanentzipcode);
                    $("#ptelephonenumber").val(result.details[keys].permanenttelno);
                    $("#email").val(result.details[keys].email);
                    $("#cellphoneno").val(result.details[keys].cellphoneno);
                    $("#agencyno").val(result.details[keys].agencyemployeeno);
                    $("#spousesurname").val(result.details[keys].spouselastname);
                    $("#spousefirstname").val(result.details[keys].spousefirstname);
                    $("#spousemiddlename").val(result.details[keys].spousemiddlename);
                    $("#spouseoccupation").val(result.details[keys].occupation);
                    $("#spouseemployerbusinessname").val(result.details[keys].employer);
                    $("#spousebusinessaddress").val(result.details[keys].businessaddress);
                    $("#spousetelephoneno").val(result.details[keys].telno);
                    $("#fathersurname").val(result.details[keys].fatherlastname);
                    $("#fatherfirstname").val(result.details[keys].fatherfirstname);
                    $("#fathermiddlename").val(result.details[keys].fathermiddlename);
                    $("#mothersurname").val(result.details[keys].motherlastname);
                    $("#motherfirstname").val(result.details[keys].motherfirstname);
                    $("#mothermiddlename").val(result.details[keys].mothermiddlename);

                    //address
                    $("#resprovince0").val(result.details[keys].residentialprovince);
                    $("#rescitymun0").val(result.details[keys].residentialcity);
                    $("#resbrgy0").val(result.details[keys].residentialbrgy);
                    $("#perprovince0").val(result.details[keys].permanentprovince);
                    $("#percitymun0").val(result.details[keys].permanentcity);
                    $("#perbrgy0").val(result.details[keys].permanentbrgy);

                    var elem = JSON.parse(result.details[keys].elementary);
                    $("#eschool").val(elem.school);
                    $("#edegree").val(elem.degree);
                    $("#eyeargraduated").val(elem.yeargraduated);
                    $("#efrom").val(elem.from);
                    $("#eto").val(elem.to);
                    $("#escholarshiporacademichonorsreceived").val(elem.awards);

                    var high = JSON.parse(result.details[keys].highschool);
                    $("#hschool").val(high.school);
                    $("#hdegree").val(high.degree);
                    $("#hyeargraduated").val(high.yeargraduated);
                    $("#hfrom").val(high.from);
                    $("#hto").val(high.to);
                    $("#hscholarshiporacademichonorsreceived").val(high.awards);

                    var vocational = JSON.parse(result.details[keys].vocational);
                    $("#vschool").val(vocational.school);
                    $("#vdegree").val(vocational.degree);
                    $("#vyeargraduated").val(vocational.yeargraduated);
                    $("#vfrom").val(vocational.from);
                    $("#vto").val(vocational.to);
                    $("#vscholarshiporacademichonorsreceived").val(vocational.awards);

                    var college = JSON.parse(result.details[keys].college);
                    $("#cschool").val(college.school);
                    $("#cdegree").val(college.degree);
                    $("#cyeargraduated").val(college.yeargraduated);
                    $("#cfrom").val(college.from);
                    $("#cto").val(college.to);
                    $("#cscholarshiporacademichonorsreceived").val(college.awards);

                    var graduate = JSON.parse(result.details[keys].graduate);
                    $("#gschool").val(graduate.school);
                    $("#gdegree").val(graduate.degree);
                    $("#gyeargraduated").val(graduate.yeargraduated);
                    $("#gfrom").val(graduate.from);
                    $("#gto").val(graduate.to);
                    $("#gscholarshiporacademichonorsreceived").val(graduate.awards);


                    if(!(result.details[keys].civilservice == "" || result.details[keys].civilservice == null)){
                        var cse = JSON.parse(result.details[keys].civilservice);
                        window.printcse = cse;
                        var cl = $("[class*='cseligibility']").length;
                        for(var c in cse){
                            var ctr = 1;
                            if($("#tbodycse").find("tr.cseligibility"+c).length > 0){
                                $(".cseCareerService"+ctr).val(cse[c].careerservice);
                                $(".cseRating"+ctr).val(cse[c].rating);
                                $(".cseExamDate"+ctr).val((cse[c].examdate == "" || cse[c].examdate == null || cse[c].examdate == undefined) ? "" : cse[c].examdate);
                                $(".cseExamPlace"+ctr).val(cse[c].examplace);
                                $(".cseLicenseNo"+ctr).val(cse[c].licenseno);
                                $(".cseLicenseDate"+ctr).val((cse[c].licensedate == null || cse[c].licensedate == "" || cse[c].licensedate == undefined) ? "" : cse[c].licensedate);
                            } else {
                                var exdate = (cse[c].examdate == "" || cse[c].examdate == null || cse[c].examdate == undefined) ? "" : cse[c].examdate;
                                var licensedate = (cse[c].licensedate == "" || cse[c].licensedate == null || cse[c].examdate == undefined) ? "" : cse[c].examdate;
                                var tbodycse = $("#tbodycse");
                                var tr = '<tr class="cseligibility'+c+'">' +
                                    '<td><input disabled type="text" class="form-control clearField cseCareerService'+(ctr+1)+'" dt="careerservice" value="'+cse[c].careerservice+'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField cseRating'+(ctr+1)+'" dt="rating" value="'+cse[c].rating+'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField cseExamDate'+(ctr+1)+' datepick" dt="examdate" readonly placeholder="Date.." value="'+exdate+'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField cseExamPlace'+(ctr+1)+'" dt="examplace" value="'+cse[c].examplace+'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField cseLicenseNo'+(ctr+1)+'" dt="licenseno" value="'+cse[c].licenseno+'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField cseLicenseDate'+(ctr+1)+' datepick" dt="licensedate" readonly placeholder="Date.." value="'+licensedate+'"></td>' +
                                    '</tr>';
                                tbodycse.append(tr);
                            }
                            ctr++;
                        }
                    }

                    if(!(result.details[keys].workexperience == "" || result.details[keys].workexperience == null)){
                        var workexp = JSON.parse(result.details[keys].workexperience);
                        window.printworkexp = workexp;
                        var cl = $("[class*='workex']").length;
                        for(var ex in workexp){
                            var ctr = 1;
                            if($("#tbodywork").find("tr.workex"+ex).length > 0){
                                $(".weDatefrom"+ctr).val((workexp[ex].fromdate == "" || workexp[ex].fromdate == null || workexp[ex].fromdate == undefined) ? "" : workexp[ex].fromdate);
                                $(".weDateto"+ctr).val((workexp[ex].todate == "" || workexp[ex].todate == null || workexp[ex].todate == undefined) ? "" : workexp[ex].todate);
                                $(".wePosition"+ctr).val(workexp[ex].position);
                                $(".weCompany"+ctr).val(workexp[ex].company);
                                $(".weSalary"+ctr).val(workexp[ex].salary);
                                $(".weSalaryGrade"+ctr).val(workexp[ex].salarygrade);
                                $(".weAppointment"+ctr).val(workexp[ex].appointmentstatus);
                                $(".weGovtService"+ctr).val(workexp[ex].govtservice);
                            } else {
                                var fromdate = (workexp[ex].fromdate == "" || workexp[ex].fromdate == null || workexp[ex].fromdate == undefined) ? "" : workexp[ex].fromdate;
                                var todate = (workexp[ex].todate == "" || workexp[ex].todate == null || workexp[ex].todate == undefined) ? "" : workexp[ex].todate;
                                var tbody = $("#tbodywork");
                                var y = (workexp[ex].govtservice == "YES") ? "selected" : "";
                                var n = (workexp[ex].govtservice == "NO") ? "selected" : "";
                                var tr = '<tr class="workex'+ex+'">' +
                                    '<td><input disabled type="text" class="form-control clearField datefrom weDatefrom'+(ctr+1)+'" dt="fromdate" value="'+workexp[ex].fromdate+'" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField dateto weDateto'+(ctr+1)+'" dt="todate" value="'+workexp[ex].todate+'" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField wePosition'+(ctr+1)+'" value="'+workexp[ex].position+'" dt="position"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField weCompany'+(ctr+1)+'" value="'+workexp[ex].company+'" dt="company"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField weSalary'+(ctr+1)+'" value="'+workexp[ex].salary+'" dt="salary"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField weSalaryGrade'+(ctr+1)+'" value="'+workexp[ex].salarygrade+'" dt="salarygrade"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField weAppointment'+(ctr+1)+'" value="'+workexp[ex].appointmentstatus+'" dt="appointmentstatus"></td>' +
                                    '<td><select disabled class="form-control clearField weGovtService'+(ctr+1)+'" dt="govtservice"><option value="YES" '+y+'>YES</option><option value="NO" '+n+'>NO</option></select></td>' +
                                    '</tr>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }


                    if(!(result.details[keys].voluntarywork == "" || result.details[keys].voluntarywork == null)){
                        var volwork = JSON.parse(result.details[keys].voluntarywork);
                        window.printvolwork = volwork;
                        var vw = $("[class*='volwork']").length;
                        for(var vw in volwork) {
                            var ctr = 1;
                            if ($("#tbodyvolwork").find("tr.volwork" + vw).length > 0) {
                                $(".vwiDatefrom" + ctr).val((volwork[vw].fromdate == "" || volwork[vw].fromdate == null || volwork[vw].fromdate == undefined) ? "" : volwork[vw].fromdate);
                                $(".vwiDateto" + ctr).val((volwork[vw].todate == "" || volwork[vw].todate == null || volwork[vw].todate == undefined) ? "" : volwork[vw].todate);
                                $(".vwiPosition" + ctr).val(volwork[vw].position);
                                $(".vwiHours" + ctr).val(volwork[vw].hours);
                                $(".vwiOrganization" + ctr).val(volwork[vw].organization);
                            } else {
                                var fromdate = (volwork[vw].fromdate == "" || volwork[vw].fromdate == null || volwork[vw].fromdate == undefined) ? "" : volwork[vw].fromdate;
                                var todate = (volwork[vw].todate == "" || volwork[vw].todate == null || volwork[vw].todate == undefined) ? "" : volwork[vw].todate;
                                var tbody = $("#tbodyvolwork");
                                var tr = '<tr class="volwork' + vw + '">' +
                                    '<td><input disabled type="text" class="form-control clearField vwiOrganization' + (ctr + 1) + '" dt="organization" value="'+volwork[vw].organization +'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField vwiDatefrom' + (ctr + 1) + ' datefrom" dt="fromdate" value="'+ fromdate +'" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField vwiDateto' + (ctr + 1) + ' dateto" dt="todate" value="'+ todate +'" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField vwiHours' + (ctr + 1) + '" dt="hours" value="'+ volwork[vw].hours +'"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField vwiPosition' + (ctr + 1) + '" dt="position" value="'+ volwork[vw].position +'"></td>' +
                                    '</tr>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }


                    if(!(result.details[keys].training == "" || result.details[keys].training == null)){
                        var training = JSON.parse(result.details[keys].training);
                        window.printtraining = training;
                        var tp = $("[class*='trainingprogs']").length;
                        for(var tp in training) {
                            var ctr = 1;
                            if ($("#tbodytraining").find("tr.trainingprogs" + tp).length > 0) {
                                $(".tpDatefrom" + ctr).val((training[tp].fromdate == "" || training[tp].fromdate == null || training[tp].fromdate == undefined) ? "" : training[tp].fromdate);
                                $(".tpDateto" + ctr).val((training[tp].todate == "" || training[tp].todate == null || training[tp].todate == undefined) ? "" : training[tp].todate);
                                $(".tpSeminar" + ctr).val(training[tp].title);
                                $(".thHours" + ctr).val(training[tp].hours);
                                $(".tpConducted" + ctr).val(training[tp].conductedby);
                            } else {
                                var fromdate = (training[tp].fromdate == "" || training[tp].fromdate == null || training[tp].fromdate == undefined) ? "" : training[tp].fromdate;
                                var todate = (training[tp].todate == "" || training[tp].todate == null || training[tp].todate == undefined) ? "" : training[tp].todate;
                                var tbody = $("#tbodytraining");
                                var tr = '<tr class="trainingprogs'+tp+'">' +
                                    '<td><input disabled type="text" class="form-control clearField tpSeminar'+(ctr+1)+'" dt="title" value="' + training[tp].title + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField tpDatefrom'+(ctr+1)+' datefrom" dt="fromdate" value="' + fromdate + '" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField tpDateto'+(ctr+1)+' dateto" dt="todate" value="' + todate + '" readonly></td>' +
                                    '<td><input disabled type="text" class="form-control clearField thHours'+(ctr+1)+'" dt="hours" value="' + training[tp].hours + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField tpConducted'+(ctr+1)+'" dt="conductedby" value="' + training[tp].conductedby + '"></td>' +
                                    '</tr>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }

                    if(!(result.details[keys].others1 == "" || result.details[keys].others1 == null)){
                        var other1 = JSON.parse(result.details[keys].others1);
                        window.printother1 = other1;
                        var ot = $("[class*='otherinfoone']").length;
                        for(var ot in other1) {
                            var ctr = 1;
                            if ($("#tbodyother1").find("tr.otherinfoone" + ot).length > 0) {
                                $(".oi1Organization" + ctr).val(other1[ot].membership);
                                $(".oi1Skills" + ctr).val(other1[ot].specialskills);
                                $(".oi1Recognition" + ctr).val(other1[ot].recognitions);
                            } else {
                                var tbody = $("#tbodyother1");
                                var tr = '<tr class="otherinfoone'+ot+'">' +
                                    '<td><input disabled type="text" class="form-control clearField oi1Skills'+(ctr+1)+'" dt="specialskills" value="' + other1[ot].specialskills + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField oi1Recognition'+(ctr+1)+'" dt="recognitions" value="' + other1[ot].recognitions + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField oi1Organization'+(ctr+1)+'" dt="membership" value="' + other1[ot].membership + '"></td>' +
                                    '</tr>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }

                    if(!(result.details[keys].characterref == "" || result.details[keys].characterref == null)){
                        var references = JSON.parse(result.details[keys].characterref);
                        window.printreferences = references;
                        var rf = $("[class*='characterref']").length;
                        for(var rf in references) {
                            var ctr = 1;
                            if ($("#tbodyref").find("tr.characterref" + rf).length > 0) {
                                $(".oi2RefName" + ctr).val(references[rf].name);
                                $(".oi2RefAddress" + ctr).val(references[rf].address);
                                $(".oi2RefTelno" + ctr).val(references[rf].telno);
                            } else {
                                var tbody = $("#tbodyref");
                                var tr = '<tr class="characterref'+rf+'">' +
                                    '<td><input disabled type="text" class="form-control clearField oi2RefName'+(ctr+1)+'" dt="name" value="' + references[rf].name + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField oi2RefAddress'+(ctr+1)+'" dt="address" value="' + references[rf].address + '"></td>' +
                                    '<td><input disabled type="text" class="form-control clearField oi2RefTelno'+(ctr+1)+'" dt="telno" value="' + references[rf].telno + '"></td>' +
                                    '</tr>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }

                    if(!(result.details[keys].childrendetails == "" || result.details[keys].childrendetails == null)){
                        var children = JSON.parse(result.details[keys].childrendetails);
                        var ch = $("[class*='children']").length;
                        for(var ch in children) {
                            console.log(children[ch]);
                            var ctr = 1;
                            if ($("#tbodychildren").find("div.children" + ch).length > 0) {
                                $(".childname" + ctr).val(children[ch].name);
                                $(".childbday" + ctr).val(children[ch].birthday);
                            } else {
                                var tbody = $("#tbodychildren");
                                var tr = '<div class="children'+ch+'"><div class="form-group col-md-7">' +
                                    '<input disabled type="text" class="form-control clearField child childname'+(ctr+1)+'" dt="childname" value="'+children[ch].name+'" placeholder=""></div><div class="form-group col-md-5">' +
                                    '<input disabled type="text" class="form-control clearField child datepick childbday'+(ctr+1)+'" dt="bday" value="'+children[ch].birthday+'" placeholder="mm/dd/yyyy" readonly>' +
                                    '</div></div>';
                                tbody.append(tr);
                            }
                            ctr++;
                        }
                    }





                    var qas = JSON.parse(result.details[keys].qas);
                    window.printqas = qas;
                    window.q1 = qas[0].answer;
                    window.q2 = qas[1].answer;
                    window.q3 = qas[2].answer;
                    window.q4 = qas[3].answer;
                    window.q5 = qas[4].answer;
                    window.q6 = qas[5].answer;
                    window.q7 = qas[6].answer;
                    window.q8 = qas[7].answer;
                    window.q9 = qas[8].answer;
                    window.q10 = qas[9].answer;
                    window.q11 = qas[10].answer;
                    window.q12 = qas[11].answer;
                    for(var q in qas){
                        var i = parseInt(q)+1;
                        if(!(qas[q].answer == "" || qas[q].answer == null)){
                            $(".c"+i+"[value=" + qas[q].answer + "]").prop('checked', true);
                            $(".exp"+i).val(qas[q].explanation);
                        }

                    }
                }

                applyDatepicker();
                $(".placeholderinputs").show();
                $(".addressinput").hide();

                $("#btnPrint").prop("disabled",false);
            } else {
                $(".placeholderinputs").hide();
                $(".addressinput").show();
                $("#btnAdd").prop("disabled",false);
                $("#btnSave").prop("disabled",true);
                $("#btnEdit").prop("disabled",true);
                $("#btnDelete").prop("disabled",true);
                loadProvinces();
                $("#btnPrint").prop("disabled",true);
            }
        },
        error: function(e){
            console.log(e);
        }
    });
};

$('input[name="sexRadios"]').click(function(){
    window.sex = $(this).val();
});

$('input[name="csRadios"]').click(function(){
    window.civilstatus = $(this).val();
});

$('input[name="a36"]').click(function(){
    window.q1 = $(this).val();
});
$('input[name="b36"]').click(function(){
    window.q2 = $(this).val();
    console.log(window.q2);
});
$('input[name="a37"]').click(function(){
    window.q3 = $(this).val();
    console.log(window.q3);
});
$('input[name="b37"]').click(function(){
    window.q4 = $(this).val();
    console.log(window.q4);
});
$('input[name="a38"]').click(function(){
    window.q5 = $(this).val();
    console.log(window.q5);
});

$('input[name="a39"]').click(function(){
    window.q6 = $(this).val();
    console.log(window.q6);
});

$('input[name="a40"]').click(function(){
    window.q7 = $(this).val();
    console.log(window.q7);
});

$('input[name="a41"]').click(function(){
    window.q8 = $(this).val();
    console.log(window.q8);
});

$('input[name="b41"]').click(function(){
    window.q9 = $(this).val();
    console.log(window.q9);
});

$('input[name="c41"]').click(function(){
    window.q10 = $(this).val();
    console.log(window.q10);
});

$('input[name="b40"]').click(function(){
    window.q11 = $(this).val();
    console.log(window.q11);
});

$('input[name="a42"]').click(function(){
    window.q12 = $(this).val();
    console.log(window.q12);
});

$("#btnCseAdd").click(function(){
    var tbody = $("#tbodycse");
    var l = $("[class*='cseligibility']").length;
    var tr = '<tr class="cseligibility'+l+'">' +
        '<td><input type="text" class="form-control clearField cseCareerService'+(l+1)+'" dt="careerservice"></td>' +
        '<td><input type="text" class="form-control clearField cseRating'+(l+1)+'" dt="rating"></td>' +
        '<td><input type="text" class="form-control clearField cseExamDate'+(l+1)+' datepick" dt="examdate" readonly placeholder="Date.."></td>' +
        '<td><input type="text" class="form-control clearField cseExamPlace'+(l+1)+'" dt="examplace"></td>' +
        '<td><input type="text" class="form-control clearField cseLicenseNo'+(l+1)+'" dt="licenseno"></td>' +
        '<td><input type="text" class="form-control clearField cseLicenseDate'+(l+1)+' datepick" dt="licensedate" readonly placeholder="Date.."></td>' +
        '</tr>';
    tbody.append(tr);

    applyDatepicker();
});

$("#btnCseRemove").click(function(){
    var l = $("[class*='cseligibility']").length;
    if(l > 1){
        $(".cseligibility"+(l-1)).remove();
    }
});

$("#btnWorkAdd").click(function(){
    var tbody = $("#tbodywork");
    var l = $("[class*='workex']").length;
    var tr = '<tr class="workex'+l+'">' +
        '<td><input type="text" class="form-control clearField datefrom weDatefrom'+(l+1)+'" dt="fromdate" readonly></td>' +
        '<td><input type="text" class="form-control clearField dateto weDateto'+(l+1)+'" dt="todate" readonly></td>' +
        '<td><input type="text" class="form-control clearField wePosition'+(l+1)+'" dt="position"></td>' +
        '<td><input type="text" class="form-control clearField weCompany'+(l+1)+'" dt="company"></td>' +
        '<td><input type="text" class="form-control clearField weSalary'+(l+1)+'" dt="salary"></td>' +
        '<td><input type="text" class="form-control clearField weSalaryGrade'+(l+1)+'" dt="salarygrade"></td>' +
        '<td><input type="text" class="form-control clearField weAppointment'+(l+1)+'" dt="appointmentstatus"></td>' +
        '<td><select class="form-control clearField weGovtService'+(l+1)+'" dt="govtservice"><option value="YES">YES</option><option value="NO">NO</option></select></td>' +
        '</tr>';
    tbody.append(tr);

    applyDatepicker();
});

$("#btnWorkRemove").click(function(){
    var l = $("[class*='workex']").length;
    if(l > 1){
        $(".workex"+(l-1)).remove();
    }
});

$("#btnVolWorkAdd").click(function(){
    var tbody = $("#tbodyvolwork");
    var l = $("[class*='volwork']").length;
    var tr = '<tr class="volwork'+l+'">' +
        '<td><input type="text" class="form-control clearField vwiOrganization'+(l+1)+'" dt="organization"></td>' +
        '<td><input type="text" class="form-control clearField vwiDatefrom'+(l+1)+' datefrom" dt="fromdate" readonly></td>' +
        '<td><input type="text" class="form-control clearField vwiDateto'+(l+1)+' dateto" dt="todate" readonly></td>' +
        '<td><input type="text" class="form-control clearField vwiHours'+(l+1)+'" dt="hours"></td>' +
        '<td><input type="text" class="form-control clearField vwiPosition'+(l+1)+'" dt="position"></td>' +
        '</tr>';
    tbody.append(tr);

    applyDatepicker();
});

$("#btnVolWorkRemove").click(function(){
    var l = $("[class*='volwork']").length;
    if(l > 1){
        $(".volwork"+(l-1)).remove();
    }
});

$("#btnTrainingsAdd").click(function(){
    var tbody = $("#tbodytraining");
    var l = $("[class*='trainingprogs']").length;
    var tr = '<tr class="trainingprogs'+l+'">' +
        '<td><input type="text" class="form-control clearField tpSeminar'+(l+1)+'" dt="title"></td>' +
        '<td><input type="text" class="form-control clearField tpDatefrom'+(l+1)+' datefrom" dt="fromdate" readonly></td>' +
        '<td><input type="text" class="form-control clearField tpDateto'+(l+1)+' dateto" dt="todate" readonly></td>' +
        '<td><input type="number" class="form-control clearField thHours'+(l+1)+'" dt="hours"></td>' +
        '<td><input type="text" class="form-control clearField tpConducted'+(l+1)+'" dt="conductedby"></td>' +
        '</tr>';
    tbody.append(tr);

    applyDatepicker();
});

$("#btnTrainingsRemove").click(function(){
    var l = $("[class*='trainingprogs']").length;
    if(l > 1){
        $(".trainingprogs"+(l-1)).remove();
    }
});

$("#btnOther1Add").click(function(){
    var tbody = $("#tbodyother1");
    var l = $("[class*='otherinfoone']").length;
    var tr = '<tr class="otherinfoone'+l+'">' +
        '<td><input type="text" class="form-control clearField oi1Skills'+(l+1)+'" dt="specialskills"></td>' +
        '<td><input type="text" class="form-control clearField oi1Recognition'+(l+1)+'" dt="recognitions"></td>' +
        '<td><input type="text" class="form-control clearField oi1Organization'+(l+1)+'" dt="membership"></td>' +
        '</tr>';
    tbody.append(tr);

});

$("#btnOther1Remove").click(function(){
    var l = $("[class*='otherinfoone']").length;
    if(l > 1){
        $(".otherinfoone"+(l-1)).remove();
    }
});

$("#btnRefAdd").click(function(){
    var tbody = $("#tbodyref");
    var l = $("[class*='characterref']").length;
    var tr = '<tr class="characterref'+l+'">' +
        '<td><input type="text" class="form-control clearField oi2RefName'+(l+1)+'" dt="name"></td>' +
        '<td><input type="text" class="form-control clearField oi2RefAddress'+(l+1)+'" dt="address"></td>' +
        '<td><input type="text" class="form-control clearField oi2RefTelno'+(l+1)+'" dt="telno"></td>' +
        '</tr>';
    tbody.append(tr);
});

$("#btnRefRemove").click(function(){
    var l = $("[class*='characterref']").length;
    if(l > 1){
        $(".characterref"+(l-1)).remove();
    }
});

$("#btnChildAdd").click(function(){
    var tbody = $("#tbodychildren");
    var l = $("[class*='children']").length;
    var tr = '<div class="children'+l+'">' +
        '<div class="form-group col-md-7">' +
        '<input type="text" class="form-control clearField child childname'+(l+1)+'" dt="childname" placeholder=""></div>' +
        '<div class="form-group col-md-5">' +
        '<input type="text" class="form-control clearField child datepick childbday'+(l+1)+'" dt="bday" placeholder="mm/dd/yyyy" readonly>' +
        '</div></div>';
    tbody.append(tr);

    applyDatepicker();
});

$("#btnChildRemove").click(function(){
    var l = $("[class*='children']").length;
    if(l > 1){
        $(".children"+(l-1)).remove();
    }
});

$("#btnAdd").click(function(){
    window.origin = "add";
    submitData();
});

$("#btnSave").click(function(){
    window.origin = "save";
    submitData();
});

$("#btnEdit").click(function(){
    loadExistingProvincess();
});

$("#btnDelete").click(function(){
   $("#modaldelete").modal("show");
});

$("#btnProceedDelete").click(function(){
   $("#loadingmodal").modal("show");
    $("#modaldelete").modal("hide");
    $.ajax({
       url: "<?php echo base_url();?>pdsmanagement/deletepds",
        type: "POST",
        dataType: "json",
        success: function(result){
            $("#loadingmodal").modal("hide");
            if(result.Code == "00"){
                $("#modaldeletesuccess").modal("show");
            } else {
                messageDialogModal("Server Message",result.Message);
            }
        },
        error: function(e){
            $("#loadingmodal").modal("hide");
            console.log(e);
        }
    });
});


function submitData(){
    var ret = true;

    if(!validatePersonalInfo()){
        return;
    } else {
        //for children details
        var childname = [];
        var childbday = [];
        var children = [];
        $("[dt='childname']").each(function(){
            if(!($(this).val() == "" || $(this).val() == null)){
                childname.push($(this).val());
            }
        });
        $("[dt='bday']").each(function(){
            if(!($(this).val() == "" || $(this).val() == null)){
                childbday.push($(this).val());
            }
        });
        for(var i=0;i<childname.length;i++){
            children.push({
                name: childname[i],
                birthday: childbday[i]
            });
        }

        //for education background
        var elementary = new Object();
        var highschool = new Object();
        var vocational = new Object();
        var college = new Object();
        var graduate = new Object();

        elementary['school'] = $("#eschool").val();
        elementary['degree'] = $("#edegree").val();
        elementary['yeargraduated'] = $("#eyeargraduated").val();
        elementary['from'] = $("#efrom").val();
        elementary['to'] = $("#eto").val();
        elementary['awards'] = $("#escholarshiporacademichonorsreceived").val();

        highschool['school'] = $("#hschool").val();
        highschool['degree'] = $("#hdegree").val();
        highschool['yeargraduated'] = $("#hyeargraduated").val();
        highschool['from'] = $("#hfrom").val();
        highschool['to'] = $("#hto").val();
        highschool['awards'] = $("#hscholarshiporacademichonorsreceived").val();

        vocational['school'] = $("#vschool").val();
        vocational['degree'] = $("#vdegree").val();
        vocational['yeargraduated'] = $("#vyeargraduated").val();
        vocational['from'] = $("#vfrom").val();
        vocational['to'] = $("#vto").val();
        vocational['awards'] = $("#vscholarshiporacademichonorsreceived").val();

        college['school'] = $("#cschool").val();
        college['degree'] = $("#cdegree").val();
        college['yeargraduated'] = $("#cyeargraduated").val();
        college['from'] = $("#cfrom").val();
        college['to'] = $("#cto").val();
        college['awards'] = $("#cscholarshiporacademichonorsreceived").val();

        graduate['school'] = $("#gschool").val();
        graduate['degree'] = $("#gdegree").val();
        graduate['yeargraduated'] = $("#gyeargraduated").val();
        graduate['from'] = $("#gfrom").val();
        graduate['to'] = $("#gto").val();
        graduate['awards'] = $("#gscholarshiporacademichonorsreceived").val();


        var arrcse = [];
        var l1 = $("[class*='cseligibility']").length;
        for(var i=0;i<l1;i++){
            var temp = new Object();
            var el = "cseligibility"+i;
            $("tr."+el+" > td > input").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            arrcse.push(temp);
        }

        var arrwork = [];
        var l2 = $("[class*='workex']").length;
        for(var i=0;i<l2;i++){
            console.log("this val");
            var temp = new Object();
            var el = "workex"+i;
            $("tr."+el+" > td > input, tr."+el+" > td > select").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            arrwork.push(temp);
        }

        var arrworklatest = [];
        for(var keys in arrwork){
            var from = moment(arrwork[keys].fromdate);
            var to = moment(arrwork[keys].todate);
            var years = to.diff(from, 'years',true);

            arrworklatest.push({
                years: years.toFixed("2"),
                fromdate: arrwork[keys].fromdate,
                todate: arrwork[keys].todate,
                position: arrwork[keys].position,
                company: arrwork[keys].company,
                salary: arrwork[keys].salary,
                salarygrade: arrwork[keys].salarygrade,
                appointmentstatus: arrwork[keys].appointmentstatus,
                govtservice: arrwork[keys].govtservice
            });
        }

        console.log(JSON.stringify(arrwork));


        var volwork = [];
        var l3 = $("[class*='volwork']").length;
        for(var i=0;i<l3;i++){
            var temp = new Object();
            var el = "volwork"+i;
            $("tr."+el+" > td > input").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            volwork.push(temp);
        }


        var trainingprog = [];
        var l4 = $("[class*='trainingprogs']").length;
        for(var i=0;i<l4;i++){
            var temp = new Object();
            var el = "trainingprogs"+i;
            $("tr."+el+" > td > input").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            trainingprog.push(temp);
        }


        var otherinfo1 = [];
        var l5 = $("[class*='otherinfoone']").length;
        for(var i=0;i<l5;i++){
            var temp = new Object();
            var el = "otherinfoone"+i;
            $("tr."+el+" > td > input").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            otherinfo1.push(temp);
        }

        var characterref = [];
        var l6 = $("[class*='characterref']").length;
        for(var i=0;i<l6;i++){
            var temp = new Object();
            var el = "characterref"+i;
            $("tr."+el+" > td > input").each(function(){
                if(!($(this).val() == "" || $(this).val() == null)){
                    temp[$(this).attr("dt")] = $(this).val();
                }
            });
            characterref.push(temp);
        }

        if(!validateChoices()){
            return;
        } else {
            var qas = [];
            for(var i=0;i<12;i++){
                var ans =  $("input:radio.c"+(i+1)+":checked").val();
                qas.push({
                    answer: (ans == "" || ans == null || ans == undefined) ? "" : ans,
                    explanation : ($(".exp"+(i+1)).val() == "" || $(".exp"+(i+1)).val() == null) ? "" : $(".exp"+(i+1)).val()
                });
            }
            $("#loadingmodal").modal("show");
            $.ajax({
                url : "<?php echo base_url();?>pdsmanagement/insert",
                type: "POST",
                dataType: "json",
                data: {
                    "SURNAME": $("#surname").val(),
                    "FIRSTNAME": $("#firstname").val(),
                    "MIDDLENAME": $("#middlename").val(),
                    "NAMEEXTENSION": ($("#nameextension").val() == "" || $("#nameextension").val() == null) ? "" : $("#nameextension").val(),
                    "DOB": $("#dob").val(),
                    "PLACEOFBIRTH": $("#pob").val(),
                    "SEX": window.sex,
                    "CIVILSTATUS": window.civilstatus,
                    "CITIZENSHIP":$("#citizenship").val(),
                    "HEIGHT":$("#height").val(),
                    "WEIGHT":$("#weight").val(),
                    "BLOODTYPE":$("#bloodtype").val(),
                    "GSISNO":$("#gsisno").val(),
                    "PAGIBIGNO":$("#pagibigno").val(),
                    "PHILHEALTHNO":$("#philhealthno").val(),
                    "SSSNO":$("#sssno").val(),
                    "TIN":$("#tin").val(),
                    "RESIDENTIALADDRESS":$("#residentialaddress").val(),
                    "RESIDENTIALZIP":$("#rzipcode").val(),
                    "RESIDENTIALTELNO":$("#rtelephonenumber").val(),
                    "RESIDENTIALPROVINCE":$("#resprovince option:selected").val(),
                    "RESIDENTIALCITY":$("#rescitymun option:selected").val(),
                    "RESIDENTIALBRGY":$("#resbrgy option:selected").val(),
                    "PERMANENTADDRESS":$("#permanentaddress").val(),
                    "PERMANENTZIP":$("#pzipcode").val(),
                    "PERMANENTTELNO":$("#ptelephonenumber").val(),
                    "PERMANENTPROVINCE":$("#perprovince option:selected").val(),
                    "PERMANENTCITY":$("#percitymun option:selected").val(),
                    "PERMANENTBRGY":$("#perbrgy option:selected").val(),
                    "EMPLOYMENTTYPE":$("#employmenttype option:selected").val(),
                    "EMAIL":$("#email").val(),
                    "CELLPHONENO":$("#cellphoneno").val(),
                    "AGENCYNO":$("#agencyno").val(),
                    "SPOUSELNAME":$("#spousesurname").val(),
                    "SPOUSEFNAME":$("#spousefirstname").val(),
                    "SPOUSEMNAME":$("#spousemiddlename").val(),
                    "SPOUSEOCCUPATION":$("#spouseoccupation").val(),
                    "SPOUSEEMPLOYER":$("#spouseemployerbusinessname").val(),
                    "SPOUSEBUSINESSADDRESS":$("#spousebusinessaddress").val(),
                    "SPOUSETELNO":$("#spousetelephoneno").val(),
                    "FATHERLNAME":$("#fathersurname").val(),
                    "FATHERFNAME":$("#fatherfirstname").val(),
                    "FATHERMNAME":$("#fathermiddlename").val(),
                    "MOTHERLNAME":$("#mothersurname").val(),
                    "MOTHERFNAME":$("#motherfirstname").val(),
                    "MOTHERMNAME":$("#mothermiddlename").val(),
                    "CURRENTPOSITION":$("#currentposition option:selected").val()  == "- Select Current Position -" ? $("#autocurrpos").val() : $("#currentposition option:selected").val(),
                    "DATEENTEREDLGU":$("#dateenteredlgu").val(),
                    "SALARYGRADE":($("#currentposition option:selected").val() =="- Select Current Position -" ? $("#autosalarygrade").val() : $("#currentposition option:selected").attr("salary-grade")),
                    "CHILDREN":children,
                    "ELEMENTARY":elementary,
                    "HIGHSCHOOL":highschool,
                    "VOCATIONAL":vocational,
                    "COLLEGE":college,
                    "GRADUATE":graduate,
                    "CIVILSERVICE":arrcse,
                    "WORKEXPERIENCE":arrworklatest,
                    "VOLUNTARYWORK":volwork,
                    "TRAININGPROGRAMS":trainingprog,
                    "OTHER1":otherinfo1,
                    "QAS":qas,
                    "CHARACTERREF":characterref
                },
                success: function(result) {
                    $("#loadingmodal").modal("hide");
                    console.log("pds response:");
                    console.log(result);
                    if(result.Code == "100"){
                        if(result.Qualified == "YES"){
                            $("#qmsg").text("Congratulations! You are qualified for the position " +result.Position + ". We will be sending you a personal letter within 7 working days.");
                        } else {
                            $("#qmsg").text("We are sorry to inform you that you did not meet the minimum qualification mandated in your application. We will keep your data/information in our database, should there be an opening for a new position your are qualified with we can easily reach you. Thank you!");
                        }
                        if(window.origin == "add"){
                            if(result.Qualified == "YES" || result.Qualified == "NO"){
                                $("#modalQualificationMessage").modal("show");
                                $("#btnMsg").attr("position",result.Position);
                                $("#btnMsg").attr("qualified",result.Qualified);
                                $("#btnMsg").attr("requestnumber",result.RequestNumber);
                            }
                        } else {
                            if(result.Qualified == "YES" || result.Qualified == "NO"){
                                $("#modalQualificationMessage").modal("show");
                                $("#btnMsg").attr("position",result.Position);
                                $("#btnMsg").attr("qualified",result.Qualified);
                                $("#btnMsg").attr("requestnumber",result.RequestNumber);
                            }
                        }
                        window.isUpdate = true;
                        loadPdsData();
                        $(".clearField").each(function(){
                            $(this).prop("disabled",true);
                        });
                        $(".addremovebuttons").each(function(){
                            $(this).prop("disabled",true);
                        });
                    }else if(result.Code == "00"){
                        if(window.origin == "add"){
                            messageDialogModal("Server Message","Successfully Recorded Personal Data Sheet");
			    $("#btnmessagedialogmodal").click(function(){
				location.reload();
			    });
                        } else {
                            messageDialogModal("Server Message","Successfully Updated Personal Data Sheet");
			    $("#btnmessagedialogmodal").click(function(){
				location.reload();
			    });
                        }
                        window.isUpdate = true;
                        loadPdsData();
                        $(".clearField").each(function(){
                            $(this).prop("disabled",true);
                        });
                        $(".addremovebuttons").each(function(){
                            $(this).prop("disabled",true);
                        });
                    } else {
                        if(window.origin == "add"){
                            messageDialogModal("Server Message","Personal Data Sheet Record Failed");
                        } else {
                            messageDialogModal("Server Message","Personal Data Sheet Update Failed");

                        }
                    }
                },
                error: function(e){
                    console.log(e);
                    $("#loadingmodal").modal("hide");
                    ret = false;
                }
            });
        }
    }

    return ret;
}

function validatePersonalInfo(){
    if($("#surname").val() == "" || $("#surname").val() == null){
        messageDialogModal("Required Personal Info Field","Please provide Surname");
        return false;
    }
    if($("#firstname").val() == "" || $("#firstname").val() == null){
        messageDialogModal("Required Personal Info Field","Please provide First Name");
        return false;
    }
    if($("#middlename").val() == "" || $("#middlename").val() == null){
        messageDialogModal("Required Personal Info Field","Please provide Middle Name");
        return false;
    }

    if($("#dob").val() == "" || $("#dob").val() == null){
        messageDialogModal("Required Personal Info Field","Please provide Date of Birth");
        return false;
    }

    if($("#pob").val() == "" || $("#pob").val() == null){
        messageDialogModal("Required Personal Info Field","Please provide Place of Birth");
        return false;
    }

    if(!($("input:radio[name='sexRadios']").is(":checked"))){
        messageDialogModal("Required Personal Info Field","Please Select Gender/Sex");
        return false;
    }
    if(!($("input:radio[name='csRadios']").is(":checked"))){
        messageDialogModal("Required Personal Info Field","Please Select Civil Status");
        return false;
    }


    if($("#citizenship").val() == "" || $("#citizenship").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Citizenship");
        return false;
    }

    if($("#height").val() == "" || $("#height").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Height");
        return false;
    }
    if($("#weight").val() == "" || $("#weight").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Weight");
        return false;
    }

    if($("#bloodtype").val() == "" || $("#bloodtype").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Blood Type");
        return false;
    }
    if($("#residentialaddress").val() == "" || $("#residentialaddress").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Residential Address");
        return false;
    }
    if($("#resprovince option:selected").val() == "- Select Province -" || $("#resprovince option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Residential Province");
        return false;
    }
    if($("#rescitymun option:selected").val() == "- Select City/Municipality -" || $("#rescitymun option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Residential City/Municipality");
        return false;
    }
    if($("#resbrgy option:selected").val() == "- Select Barangay -" || $("#resbrgy option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Residential Barangay");
        return false;
    }
    if($("#rzipcode").val() == "" || $("#rzipcode").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Residential Zip Code");
        return false;
    }

    if($("#permanentaddress").val() == "" || $("#permanentaddress").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Permanent Address");
        return false;
    }
    if($("#perprovince option:selected").val() == "- Select Province -" || $("#perprovince option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Permanent Province");
        return false;
    }
    if($("#percitymun option:selected").val() == "- Select City/Municipality -" || $("#percitymun option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Permanent City/Municipality");
        return false;
    }
    if($("#perbrgy option:selected").val() == "- Select Barangay -" || $("#perbrgy option:selected").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Permanent Barangay");
        return false;
    }
    if($("#pzipcode").val() == "" || $("#pzipcode").val() == null){
        messageDialogModal("Required Personal Info Field","Please Provide Permanent Zip Code");
        return false;
    }
    return true;
}

function validateChoices(){
    if(window.q1 == "yes"){
        if($("#a36yesexplanation").val() == "" || $("#a36yesexplanation").val() == null){
            console.log("no explaination q1");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q2 == "yes"){
        if($("#b36yesexplanation").val() == "" || $("#b36yesexplanation").val() == null){
            console.log("no explaination q2");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q3 == "yes"){
        if($("#a37yesexplanation").val() == "" || $("#a37yesexplanation").val() == null){
            console.log("no explaination q3");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q4 == "yes"){
        if($("#b37yesexplanation").val() == "" || $("#b37yesexplanation").val() == null){
            console.log("no explaination q4");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        } else {
            var ans = $("#b37yesexplanation").val();
            var parts = ans.split(";");
            if(parts.length<2){
                console.log("not 2 parts");
                messageDialogModal("Required Field","Please provide answer in the indicated answer format");
                return false;
            }
        }
    }

    if(window.q5 == "yes"){
        if($("#a38yesexplanation").val() == "" || $("#a38yesexplanation").val() == null){
            console.log("no explaination q5");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }

    if(window.q6 == "yes"){
        if($("#a39yesexplanation").val() == "" || $("#a39yesexplanation").val() == null){
            console.log("no explaination q6");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }

    if(window.q7 == "yes"){
        if($("#a40yesexplanation").val() == "" || $("#a40yesexplanation").val() == null){
            console.log("no explaination q7");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q8 == "yes"){
        if($("#a41yesexplanation").val() == "" || $("#a41yesexplanation").val() == null){
            console.log("no explaination q8");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q9 == "yes"){
        if($("#b41yesexplanation").val() == "" || $("#b41yesexplanation").val() == null){
            console.log("no explaination q9");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    if(window.q10 == "yes"){
        if($("#c41yesexplanation").val() == "" || $("#c41yesexplanation").val() == null){
            console.log("no explaination q10");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }

    if(window.q11 == "yes"){
        if($("#b40yesexplanation").val() == "" || $("#b40yesexplanation").val() == null){
            console.log("no explaination q11");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }

    if(window.q12 == "yes"){
        if($("#a42yesexplanation").val() == "" || $("#a42yesexplanation").val() == null){
            console.log("no explaination q12");
            messageDialogModal("Required Field","Please provide details for answering the questions you answered with 'YES'.");
            return false;
        }
    }
    return true;
}

$("#btnMsg").click(function(){
    var dt = new Object();
    dt['position'] = $(this).attr("position");
    dt['requestnumber'] =  $(this).attr("requestnumber");
    dt['qualified'] =  $(this).attr("qualified");
    $("#modalQualificationMessage").modal("hide");

    window.location = "<?php echo base_url();?>main?q="+btoa(JSON.stringify(dt));
});


$("#btnPrint").click(function(){
    var pdf = new jsPDF("p", "mm", "a4");

    var width = pdf.internal.pageSize.width;
    var height = pdf.internal.pageSize.height;

    //PAGE 1
    pdf.addImage(p1, 'JPEG', 0, 0, width, height);
    pdf.setFontSize(7);
    //PERSONAL INFORMATION
    pdf.text(44,41,$("#surname").val());
    pdf.text(44,46.5,$("#firstname").val());
    pdf.text(160,46.5,$("#nameextension").val());
    pdf.text(44,52.5,$("#middlename").val());
    pdf.text(44,59.5,$("#dob").val());
    pdf.text(44,67.5,$("#pob").val());
    //gender
    if($(":radio[name='sexRadios'][value='MALE']").is(":checked")){
        pdf.text(44,73.5,"X");
    } else {
        pdf.text(72.5,73.5,"X");
    }
    //civil status
    if($(":radio[name='csRadios'][value='SINGLE']").is(":checked")){
        pdf.text(44,79.5,"X");
    } else if($(":radio[name='csRadios'][value='MARRIED']").is(":checked")){
        pdf.text(72.5,79.5,"X");
    } else if($(":radio[name='csRadios'][value='WIDOWED']").is(":checked")){
        pdf.text(44,82.5,"X");
    } else if($(":radio[name='csRadios'][value='SEPARATED']").is(":checked")){
        pdf.text(72.5,82.5,"X");
    } else if($(":radio[name='csRadios'][value='ANNULLED']").is(":checked")){
        pdf.text(44,86.5,"X");
        pdf.text(57,86.5,"Annulled");
    } else {
        pdf.text(44,87.5,"X");
    }
    pdf.text(44,93,$("#height").val());
    pdf.text(44,99,$("#weight").val());
    pdf.text(44,105,$("#bloodtype").val());
    pdf.text(44,111.5,$("#gsisno").val());
    pdf.text(44,118,$("#pagibigno").val());
    pdf.text(44,124.5,$("#philhealthno").val());
    pdf.text(44,131,$("#sssno").val());
    pdf.text(44,137,$("#tin").val());
    pdf.text(44,143.5,$("#agencyno").val());

    if(($("#citizenship").val()).toUpperCase() == "FILIPINO" || ($("#citizenship").val()).toUpperCase() == "PILIPINO"){
        pdf.text(137,59,"X");
    } else {
        pdf.text(137,74,$("#citizenship").val());
    }
    pdf.text(120,79,$("#residentialaddress").val());
    pdf.text(173,86,$("#resbrgy0").val());
    pdf.text(120,92,$("#rescitymun0").val());
    pdf.text(171,92,$("#resprovince0").val());
    pdf.text(120,100,$("#rzipcode").val());
    pdf.text(120,104,$("#permanentaddress").val());
    pdf.text(173,110,$("#perbrgy0").val());
    pdf.text(120,117,$("#percitymun0").val());
    pdf.text(171,117,$("#perprovince0").val());
    pdf.text(120,124.5,$("#pzipcode").val());
    pdf.text(120,131,$("#ptelephonenumber").val());
    pdf.text(120,137.5,$("#cellphoneno").val());
    pdf.text(120,143.5,$("#email").val());
    //FAMILY BACKGROUND
    pdf.text(44,154,$("#spousesurname").val());
    pdf.text(44,159.5,$("#spousefirstname").val());
    pdf.text(44,165,$("#spousemiddlename").val());
    //no name ext on gui
//    pdf.text(44,158.5,$("#").val());
    pdf.text(44,170,$("#spouseoccupation").val());
    pdf.text(44,175.5,$("#spouseemployerbusinessname").val());
    pdf.text(44,181.5,$("#spousebusinessaddress").val());
    pdf.text(44,186.5,$("#spousetelephoneno").val());
    pdf.text(44,192,$("#fathersurname").val());
    pdf.text(44,197.5,$("#fatherfirstname").val());
    pdf.text(44,202.5,$("#fathermiddlename").val());
    pdf.text(44,213.5,$("#mothersurname").val());
    pdf.text(44,219,$("#motherfirstname").val());
    pdf.text(44,224.5,$("#mothermiddlename").val());

    var ypos = 159.5;
    var ctr = 0;
    $(".child[dt='childname']").each(function(){
        ctr+=1;
        pdf.text(120,ypos,$(this).val());
        pdf.text(178,ypos,$(".childbday"+ctr).val());
        ypos+=5;
    });

    var spliteschool = pdf.splitTextToSize($("#eschool").val(), 42);
    pdf.text(44,247,spliteschool);
    var splitedegree = pdf.splitTextToSize($("#edegree").val(), 42);
    pdf.text(90,247,splitedegree);
    pdf.setFontSize(6);
    pdf.text(133.5,248,$("#efrom").val());
    pdf.text(146,248,$("#eto").val());
    pdf.setFontSize(7);
    pdf.text(179,248,$("#eyeargraduated").val());
    pdf.setFontSize(5);
    var escholarshiporacademichonorsreceived = ($("#escholarshiporacademichonorsreceived").val()).split(" ");
    var epos = 245;
    for(var i=0;i<escholarshiporacademichonorsreceived.length;i++){
        pdf.text(189.5,epos,escholarshiporacademichonorsreceived[i]);
        epos+=2.5;
    }

    pdf.setFontSize(7);
    var splithschool = pdf.splitTextToSize($("#hschool").val(), 42);
    pdf.text(44,254,splithschool);
    var splithdegree = pdf.splitTextToSize($("#hdegree").val(), 42);
    pdf.text(90,254,splithdegree);
    pdf.setFontSize(6);
    pdf.text(133.5,255,$("#hfrom").val());
    pdf.text(146,255,$("#hto").val());
    pdf.setFontSize(7);
    pdf.text(179,255,$("#hyeargraduated").val());
    pdf.setFontSize(5);
    var hscholarshiporacademichonorsreceived = ($("#hscholarshiporacademichonorsreceived").val()).split(" ");
    var hpos = 253;
    for(var i=0;i<hscholarshiporacademichonorsreceived.length;i++){
        pdf.text(189.5,hpos,hscholarshiporacademichonorsreceived[i]);
        hpos+=2.5;
    }

    pdf.setFontSize(7);
    var splitvchool = pdf.splitTextToSize($("#vschool").val(), 42);
    pdf.text(44,261,splitvchool);
    var splitvdegree = pdf.splitTextToSize($("#vdegree").val(), 42);
    pdf.text(90,261,splitvdegree);
    pdf.setFontSize(6);
    pdf.text(133.5,262,$("#vfrom").val());
    pdf.text(146,262,$("#vto").val());
    pdf.setFontSize(7);
    pdf.text(179,262,$("#vyeargraduated").val());
    pdf.setFontSize(5);
    var vscholarshiporacademichonorsreceived = ($("#vscholarshiporacademichonorsreceived").val()).split(" ");
    var vpos = 260;
    for(var i=0;i<vscholarshiporacademichonorsreceived.length;i++){
        pdf.text(189.5,vpos,vscholarshiporacademichonorsreceived[i]);
        vpos+=2.5;
    }

    pdf.setFontSize(7);
    var splitcschool = pdf.splitTextToSize($("#cschool").val(), 42);
    pdf.text(44,269,splitcschool);
    var splitcdegree = pdf.splitTextToSize($("#cdegree").val(), 42);
    pdf.text(90,269,splitcdegree);
    pdf.setFontSize(6);
    pdf.text(133.5,270,$("#cfrom").val());
    pdf.text(146,270,$("#cto").val());
    pdf.setFontSize(7);
    pdf.text(179,270,$("#cyeargraduated").val());
    pdf.setFontSize(5);
    var cscholarshiporacademichonorsreceived = ($("#cscholarshiporacademichonorsreceived").val()).split(" ");
    var cpos = 267;
    for(var i=0;i<cscholarshiporacademichonorsreceived.length;i++){
        pdf.text(189.5,cpos,cscholarshiporacademichonorsreceived[i]);
        cpos+=2.5;
    }

    pdf.setFontSize(7);
    var splitgschool = pdf.splitTextToSize($("#gschool").val(), 42);
    pdf.text(44,276,splitgschool);
    var splitgdegree = pdf.splitTextToSize($("#gdegree").val(), 42);
    pdf.text(90,276,splitgdegree);
    pdf.setFontSize(6);
    pdf.text(133.5,277,$("#gfrom").val());
    pdf.text(146,277,$("#gto").val());
    pdf.setFontSize(7);
    pdf.text(179,277,$("#gyeargraduated").val());
    pdf.setFontSize(5);
    var gscholarshiporacademichonorsreceived = ($("#gscholarshiporacademichonorsreceived").val()).split(" ");
    var gpos = 275;
    for(var i=0;i<gscholarshiporacademichonorsreceived.length;i++){
        pdf.text(189.5,gpos,gscholarshiporacademichonorsreceived[i]);
        gpos+=2.5;
    }


    //PAGE 2
    pdf.addPage();
    pdf.addImage(p2, 'JPEG', 0, 0, width, height);
    pdf.setFontSize(7);

    if(window.printcse){
        var cse = window.printcse;
        var ypos = 27;
        for(var keys in cse){
            pdf.setFontSize(7);
            pdf.text(10,ypos,cse[keys].careerservice);
            pdf.text(75,ypos,cse[keys].rating);
            pdf.text(91,ypos,cse[keys].examdate);
            pdf.text(114,ypos,cse[keys].examplace);
            pdf.text(173,ypos,cse[keys].licenseno);
            pdf.setFontSize(6);
            pdf.text(191,ypos,cse[keys].licensedate);
            ypos+=8;
        }
    }

    if(window.printworkexp){
        var workexp = window.printworkexp;
        var ypos = 102.5;
        for(var keys in workexp){
            pdf.setFontSize(6);
            pdf.text(8,ypos,workexp[keys].fromdate);
            pdf.text(24,ypos,workexp[keys].todate);
            pdf.setFontSize(7);
            pdf.text(40,ypos,workexp[keys].position);
            pdf.text(90.5,ypos,workexp[keys].company);
            pdf.text(143,ypos,workexp[keys].salary);
            pdf.text(156.5,ypos,workexp[keys].salarygrade);
            pdf.text(174,ypos,workexp[keys].appointmentstatus);
            pdf.text(195,ypos,(workexp[keys].govtservice == "YES" ? "Y" : "N"));
            ypos+=7;

        }
    }


    //PAGE 3
    pdf.addPage();
    pdf.addImage(p3, 'JPEG', 0, 0, width, height);
    pdf.setFontSize(7);

    if(window.printvolwork){
        var volwork = window.printvolwork;
        console.log(volwork);
        var ypos = 26;
        for(var keys in volwork){
            pdf.text(8,ypos,volwork[keys].organization);
            pdf.setFontSize(6);
            pdf.text(93,ypos,volwork[keys].fromdate);
            pdf.text(109,ypos,volwork[keys].todate);
            pdf.setFontSize(7);
            pdf.text(125,ypos,volwork[keys].hours);
            pdf.text(139,ypos,volwork[keys].position);
            ypos+=7;
        }
    }

    if(window.printtraining){
        var training = window.printtraining;
        console.log(training);
        var ypos = 97.5;
        for(var keys in training){
            pdf.text(8,ypos,training[keys].title);
            pdf.setFontSize(6);
            pdf.text(93,ypos,training[keys].fromdate);
            pdf.text(109,ypos,training[keys].todate);
            pdf.setFontSize(7);
            pdf.text(125,ypos,training[keys].hours);
            pdf.text(155,ypos,training[keys].conductedby);
            ypos+=7;
        }
    }

    if(window.printother1){
        var printother1 = window.printother1;
        console.log(printother1);
        var ypos = 242;
        for(var keys in printother1){
            pdf.text(8,ypos,printother1[keys].specialskills);
            pdf.text(58,ypos,printother1[keys].recognitions);
            pdf.text(155,ypos,printother1[keys].membership);
            ypos+=6;
        }
    }

    //PAGE 4
    pdf.addPage();
    pdf.addImage(p4, 'JPEG', 0, 0, width, height);
    pdf.setFontSize(7);
    if(window.printqas){
        var qas = window.printqas;
        console.log(qas);
        if(qas[0].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(135,21.5,"X");
            pdf.setFontSize(6);
            pdf.text(137,35,qas[0].explanation+" "+qas[1].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(156,21.5,"X");
        }

        if(qas[1].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(135,26.5,"X");
            pdf.setFontSize(6);
        } else {
            pdf.setFontSize(7);
            pdf.text(156,26.5,"X");
        }

        if(qas[2].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(135,41.5,"X");
            pdf.setFontSize(6);
            pdf.text(137,49.5,qas[2].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(156.5,41,"X");
        }

        if(qas[3].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(135,57,"X");
            pdf.setFontSize(6);
            var ans = qas[3].explanation;
            var part = ans.split(";");
            if(part.length < 2){
                pdf.text(158,65,qas[3].explanation);
            } else {
                pdf.text(158,65,part[0]);
                pdf.text(158,70,part[1]);
            }

        } else {
            pdf.setFontSize(7);
            pdf.text(157,57,"X");
        }

        if(qas[4].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,76.5,"X");
            pdf.setFontSize(6);
            pdf.text(137,85,qas[4].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(158,76.5,"X");
        }

        if(qas[5].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,92,"X");
            pdf.setFontSize(6);
            pdf.text(137,98.5,qas[5].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(158.5,92,"X");
        }

        if(qas[6].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,105,"X");
            pdf.setFontSize(6);
            pdf.text(159,109,qas[6].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160,105,"X");
        }

        if(qas[10].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,114.5,"X");
            pdf.setFontSize(6);
            pdf.text(159,119,qas[10].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160.5,114.5,"X");
        }

        if(qas[11].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,126,"X");
            pdf.setFontSize(6);
            pdf.text(137,133.5,qas[11].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160.5,126,"X");
        }

        if(qas[7].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,149,"X");
            pdf.setFontSize(6);
            pdf.text(171,152,qas[7].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160.5,149,"X");
        }

        if(qas[8].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,157,"X");
            pdf.setFontSize(6);
            pdf.text(171,160.5,qas[8].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160.5,157,"X");
        }

        if(qas[9].answer == "yes"){
            pdf.setFontSize(7);
            pdf.text(134.5,165,"X");
            pdf.setFontSize(6);
            pdf.text(171,168,qas[9].explanation);
        } else {
            pdf.setFontSize(7);
            pdf.text(160.5,165,"X");
        }
    }

    if(window.printreferences){

        var references = window.printreferences;
        var ypos = 188;
        for(var keys in references){
            pdf.setFontSize(8);
            pdf.text(8,ypos,references[keys].name);
            pdf.setFontSize(7);
            pdf.text(83,ypos,references[keys].address);
            pdf.text(132,ypos,references[keys].telno);
            ypos+=7;
        }
    }

    //SIGNATORY
    pdf.setFontSize(8);
    var fullname = $("#firstname").val() + " " + $("#middlename").val() + " " + $("#surname").val();
    pdf.text(95,243,fullname);

    pdf.save("<?php echo $this->session->userdata('firstname').'_'.$this->session->userdata('lastname')?>_PDS.pdf");
});


//convert image to base64
function toDataURL(url, callback) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.onload = function() {
        var fileReader = new FileReader();
        fileReader.onloadend = function() {
            callback(fileReader.result);
        }
        fileReader.readAsDataURL(httpRequest.response);
    };
    httpRequest.open('GET', url);
    httpRequest.responseType = 'blob';
    httpRequest.send();
}
</script>