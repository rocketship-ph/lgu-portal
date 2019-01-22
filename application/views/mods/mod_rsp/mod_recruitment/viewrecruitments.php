<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>homepage">Home</a>
        </li>
        <li class="active">Recruitment</li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php if(in_array($GLOBALS['NAV_CREATEPOSITION'],$this->session->userdata('modules'))): ?>
                <a id="list0" onclick="javascript:loadForm(0);" class="list-group-item  list-group-item-action active">
                    New Position
                </a>
                <?php endif; ?>

                <?php if(in_array($GLOBALS['NAV_VIEWPOSITION'],$this->session->userdata('modules'))): ?>
                    <a id="list1" onclick="javascript:loadForm(1);"  class="list-group-item list-group-item-action">List of Positions
                    </a>
                <?php endif; ?>

                <?php if(in_array($GLOBALS['NAV_CREATECOMPETENCYINDEX'],$this->session->userdata('modules'))): ?>
                    <a id="list2" onclick="javascript:loadForm(2)"  class="list-group-item list-group-item-action">New Competency Index
                    </a>
                <?php endif; ?>

                <?php if(in_array($GLOBALS['NAV_VIEWCOMPETENCYINDEX'],$this->session->userdata('modules'))): ?>
                    <a id="list3" onclick="javascript:loadForm(3)" class="list-group-item list-group-item-action">List of Competency Index
                    </a>
                <?php endif; ?>

                <?php if(in_array($GLOBALS['NAV_COMPETENCYTABLE'],$this->session->userdata('modules'))): ?>
                    <a id="list4" onclick="javascript:loadForm(4)" class="list-group-item list-group-item-action">Competency Table
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-9">
            <div  class="panel panel-body"  id="divCreateNewPosition">

            </div>
            <div class="panel panel-body" id="divViewRecruitments" style="display:none">

            </div>
            <div class="panel panel-body" id="divNewRspModuleDescription" style="display:none">

            </div>
            <div  class="panel panel-body"  id="divCompetencyTable" style="display: none">

            </div>

            <div  class="panel panel-body"  id="divCompetencyIndices" style="display: none">

            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#divCreateNewPosition").load("<?php echo base_url();?>recruitments/viewcreateposition");

        window.displaypath = "<?php echo @$_GET['q'];?>";
        if(window.displaypath == "competencyindex"){
            loadForm(3);
        }
    });
    function loadForm(formno) {
        window.history.replaceState("object or string", "Title", window.location.href.split("?")[0]);
        switch(formno){
            case 0:
                $("#divCreateNewPosition").load("<?php echo base_url();?>recruitments/viewcreateposition");
                $("#divCreateNewPosition").show();
                $("#divViewRecruitments").hide();
                $("#divCompetencyIndices").hide();
                $("#divCompetencyTable").hide();
                $("#divNewRspModuleDescription").hide();
                $("#list0").removeClass("active").addClass("active");
                $("#list1").removeClass("active").addClass("");
                $("#list2").removeClass("active").addClass("");
                $("#list3").removeClass("active").addClass("");
                $("#list4").removeClass("active").addClass("");
                break;
            case 1:
                $("#divViewRecruitments").load("<?php echo base_url();?>recruitments/viewlistofposition");
                $("#divCreateNewPosition").hide();
                $("#divViewRecruitments").show();
                $("#divCompetencyTable").hide();
                $("#divNewRspModuleDescription").hide();
                $("#divCompetencyIndices").hide();
                $("#list0").removeClass("active").addClass("");
                $("#list1").removeClass("active").addClass("active");
                $("#list2").removeClass("active").addClass("");
                $("#list3").removeClass("active").addClass("");
                $("#list4").removeClass("active").addClass("");
                break;
            case 2:
                $("#divNewRspModuleDescription").load("<?php echo base_url();?>recruitments/viewcreatecompetencyindex");
                $("#divCreateNewPosition").hide();
                $("#divViewRecruitments").hide();
                $("#divCompetencyTable").hide();
                $("#divNewRspModuleDescription").show();
                $("#divCompetencyIndices").hide();
                $("#list0").removeClass("active").addClass("");
                $("#list1").removeClass("active").addClass("");
                $("#list2").removeClass("active").addClass("active");
                $("#list3").removeClass("active").addClass("");
                $("#list4").removeClass("active").addClass("");
                break;
            case 3:
                $("#divCompetencyIndices").load("<?php echo base_url();?>recruitments/viewcompetencyindex");
                $("#divCreateNewPosition").hide();
                $("#divViewRecruitments").hide();
                $("#divCompetencyTable").hide();
                $("#divNewRspModuleDescription").hide();
                $("#divCompetencyIndices").show();
                $("#list0").removeClass("active").addClass("");
                $("#list1").removeClass("active").addClass("");
                $("#list2").removeClass("active").addClass("");
                $("#list3").removeClass("active").addClass("active");
                $("#list4").removeClass("active").addClass("");
                break;
            case 4:
                $("#divCompetencyTable").load("<?php echo base_url();?>recruitments/viewcompetencytable");
                $("#divCreateNewPosition").hide();
                $("#divViewRecruitments").hide();
                $("#divNewRspModuleDescription").hide();
                $("#divCompetencyIndices").hide();
                $("#divCompetencyTable").show();
                $("#list0").removeClass("active").addClass("");
                $("#list1").removeClass("active").addClass("");
                $("#list4").removeClass("active").addClass("active");
                $("#list2").removeClass("active").addClass("");
                $("#list3").removeClass("active").addClass("");
                break;
            default:
                $("#divCreateNewPosition").load("<?php echo base_url();?>recruitments/viewcreateposition");
                $("#divCreateNewPosition").show();
                $("#divViewRecruitments").hide();
                $("#divCompetencyIndices").hide();
                $("#divCompetencyTable").hide();
                $("#divNewRspModuleDescription").hide();
                $("#list0").removeClass("active").addClass("active");
                $("#list1").removeClass("active").addClass("");
                $("#list2").removeClass("active").addClass("");
                $("#list3").removeClass("active").addClass("");
                $("#list4").removeClass("active").addClass("");
        }
    }
</script>