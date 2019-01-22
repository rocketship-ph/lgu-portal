<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>homepage">Home</a>
        </li>
        <li class="active">Backup/Utilities</li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php if(in_array($GLOBALS['NAV_AUDITTRAIL'],$this->session->userdata('modules'))): ?>
                    <a id="list0" onclick="javascript:loadForm(0);" class="list-group-item  list-group-item-action active">
                        Audit Trail
                    </a>
                <?php endif; ?>
                <?php if(in_array($GLOBALS['NAV_BACKUP'],$this->session->userdata('modules'))): ?>
                    <a id="list1" onclick="javascript:loadForm(1);"  class="list-group-item list-group-item-action">
                        Database Backup
                    </a>
                <?php endif; ?>


            </div>
        </div>
        <div class="col-md-9">
            <div  class="panel panel-body"  id="divAuditTrail">

            </div>
            <div class="panel panel-body" id="divDatabaseBackup" style="display:none">

            </div>
        </div>
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function(){
        <?php if(in_array($GLOBALS['NAV_BACKUP'],$this->session->userdata('modules'))):?>
            loadForm(1);
        <?php endif; ?>
        <?php if(in_array($GLOBALS['NAV_AUDITTRAIL'],$this->session->userdata('modules'))):?>
            loadForm(0);
        <?php endif; ?>
//        $("#divAuditTrail").load("<?php //echo base_url();?>//utilities/displayaudittrail");
    });
function loadForm(formno) {
    switch(formno){
        case 0:
            $("#divAuditTrail").load("<?php echo base_url();?>utilities/displayaudittrail");
            $("#divAuditTrail").show();
            $("#divDatabaseBackup").hide();
            $("#list0").removeClass("active").addClass("active");
            $("#list1").removeClass("active").addClass("");
            break;
        case 1:
            $("#divDatabaseBackup").load("<?php echo base_url();?>utilities/displaybackup");
            $("#divDatabaseBackup").show();
            $("#divAuditTrail").hide();
            $("#list1").removeClass("active").addClass("active");
            $("#list0").removeClass("active").addClass("");
            break;
        default:
            $("#divAuditTrail").load("<?php echo base_url();?>utilities/displayaudittrail");
            $("#divAuditTrail").show();
            $("#divDatabaseBackup").hide();
            $("#list0").removeClass("active").addClass("active");
            $("#list1").removeClass("active").addClass("");
    }
}
</script>

