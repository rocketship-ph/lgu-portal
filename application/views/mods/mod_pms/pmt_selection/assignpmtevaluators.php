<style>
	.panel{
		height: 90px;
		padding: 8px;
		width: 135px;
		border: 1px solid #d8d8d8;
	}
</style>
<div class="well">
	<table>
		<tr>
			<td rowspan="2">
				<div style="height: 70px;width:70px;background-color: #00C853;text-align: center;border-radius: 5px;">
					<br>
					<img src="<?php echo base_url();?>assets/img/icons/request_personnel.png" height="50px">
				</div>
			</td>
			<td rowspan="2" width="15px">
				&nbsp;
			</td>
			<td colspan="4">
				<h4>Welcome! <span style="font-weight: 700;margin-top: 5px;"><?php echo $this->session->userdata('firstname');?></span> to <br>PMT Selection Menu</h4>
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
				<div class="panel" align="center" id="panel_pmtlead">
					<a href="<?php echo base_url();?>pmtselection/pmtlead" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
						<img src="<?php echo base_url();?>assets/img/icons/pmt_lead.png" height="40px">
						<br>
						Assign PMT Lead
					</a>
				</div>
			</td>
			<td align="center" width="20px">
				&nbsp;&nbsp;
			</td>
			<td>
				<div class="panel" align="center" id="panel_pmtevaluators">
					<a href="<?php echo base_url();?>pmtselection/pmtevaluators" style="height: 60px;width:60px;text-align: center;border-radius: 5px;">
						<img src="<?php echo base_url();?>assets/img/icons/pmt_evaluator.png" height="40px">
						<br>
						Assign PMT Evaluators
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
		<div class="col-lg-12">
			<div class="form-horizontal">
			   <fieldset>
					<legend>Assign PMT Evaluators</legend>
					<div class="col-md-12" align="right">
						<button style="float: right" class="btn btn-success" onclick="$('#modalPMTEvaluators').modal('show');">+ Add New</button>

					</div>
					<div class="col-md-12">
						<br>
						<h5 id="tablemessage" style="display:none"></h5>
						<div class="table-responsive" id="tblevaluatorcontainer">
							<table id="tblevaluator" class="display responsive compact" cellspacing="0" width="100%" >
								<thead>
								<tr>
									<th>NAME</th>
									<th>POSITION</th>
									<th>DEPARTMENT</th>
									<th>USERLEVEL</th>
									<th>ACTION</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div>
<div id="modalPMTEvaluators" class="modal fade" role="dialog" data-backdrop="static">
	<div  class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<legend>New PMT Evaluator</legend>
                <div id="noPMTLead" class="form-group">
                    <p>There is no assigned PMT Lead yet. Please click on the 'Assign PMT Lead' link to proceed with selecting PMT evaluators</p>
                </div>
				<div id="divEvaluators" style="display: none">
					<div class="form-group">
						<label class="control-label">PMT Evaluator:<span style="color:red;font-weight: bold">*</span></label>
						<select class="form-control clearField" id="dropdownPL">
									<option selected disabled>- Select PMT Evaluator -</option>
								</select>
					</div>
					<div class="form-group">
						<label>Position</label><br>
						<label style="font-size: 18px" id="position">--</label><br>
						<label>Department</label><br>
						<label style="font-size: 18px" id="department">--</label><br>
						<label>User level</label><br>
						<label style="font-size: 18px" id="userlevel">--</label><br>
					</div>
				</div>
				<br>
				<div style="text-align: right">

					<button type="button" class="btn btn-success" id="btnAdd">ADD</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modalDeletePMTEvaluator" class="modal fade" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<legend>Delete PMT Evaluator</legend>
				<div class="form-group">
					<input type="hidden" id="deleterowid">
					<p>Are you sure you want to delete this PMT evaluator?<br><span style="font-weight: bold" id="pmtevaluator"></span></p>
				</div>
				<br>
				<div class="form-group" align="right">
					<button type="button" class="btn btn-primary" id="btnDeleteEvaluator">YES</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
				</div>
			</div>

		</div>

	</div>
</div>
<script type="application/javascript">
	$(document).ready(function(){
		$("#nav_pms_pmtselection").removeClass().addClass("active");

		$("#ul_pmsmenu").show();
		$("#ul_mainmenu").hide();


		$("#panel_pmtevaluators").addClass("selected_panel");
		window.isUpdate = false;
		loadUsers();
		loadEvaluators();
	});

	function loadEvaluators(){
		  if(window.isUpdate == false){
			$('#loadingmodal').modal('show');
		}
		$("#tblevaluator").dataTable({
			"destroy":true,
			"responsive" : true,
			"sDOM": 'frt',
			"oLanguage": {
				"sSearch": "Search:"
			},
			"order": [[ 0, "asc" ]],
			"ajax":{
				"url":"<?php echo base_url();?>pmtselectionmanagement/displayEvaluators",
				"type" : "POST",
				"dataType" : "json",
				dataSrc: function(json){
					console.log(json);
					if(json.Code=="00"){
						$('#loadingmodal').modal('hide');
						$('#tblevaluatorcontainer').show();
						$("#tablemessage").hide();
						return json.details;
					}else{
						$('#loadingmodal').modal('hide');
						$("#tblevaluatorcontainer").hide();
						$("#tablemessage").html("<h3>No PMT Evaluator(s) Found</h3>");
						$("#tablemessage").show();
					}
				}
			},
			"columns":[
				{"data":"evaluatorname"},
				{"data":function(data){
					return  isNullorEmpty(data.position);
				}},
				{"data":function(data){
					return  isNullorEmpty(data.department);
				}},
				{"data":"userlevel"},
				{"data":function(data){
					return "<a class='btn btn-primary btn-sm' title='Delete Salary Grade' href='javascript:actionDelete("+JSON.stringify(data)+");' trid="+JSON.stringify(data)+"><i class='fa fa-trash'></i></a>";
				}}
			]
		});
	}
	function actionDelete(data){
		$("#deleterowid").val(data.id);
		$("#pmtevaluator").text(data.evaluatorname);
		$("#modalDeletePMTEvaluator").modal("show");
	}
	$("#btnDeleteEvaluator").click(function(){
		$("#modalDeletePMTEvaluator").modal("hide");
		$("#loadingmodal").modal("show");
		$.ajax({
			url: "<?php echo base_url();?>pmtselectionmanagement/deletePmtEvaluator",
			type:"POST",
			dataType:"json",
			data: {
				"ROWID":$("#deleterowid").val()
			},
			success: function(result){
				$("#loadingmodal").modal("hide");
				if(result.Code == "00"){
					clearField();
					window.isUpdate = true;
					loadUsers();
					loadEvaluators();
					messageDialogModal("Server Message",result.Message);
				} else {
					messageDialogModal("Server Message",result.Message);
				}
			},
			error: function(e){
				console.log(e);
			}
		});
	 });

	var hasPMTLead = false;
	 function loadUsers(){
		var select = $("#dropdownPL");
		select.empty();
		select.append("<option selected disabled>- Select PMT Evaluator -</option>");
		if(window.isUpdate == false){
			$("#loadingmodal").modal("show");
		}
		$.ajax({
			url: "<?php echo base_url();?>pmtselectionmanagement/displayUsers",
			type: "POST",
			dataType: "json",
			success: function(result){
				$("#loadingmodal").modal("hide");
				console.log(result);
				if(result.Code == "00"){
					for(var keys in result.details){
						var role = isNullorEmpty(result.details[keys].role);
						var rolestatus = isNullorEmpty(result.details[keys].rolestatus);
						var option = "";
						if (role!='PMT_HEAD'){
							option = '<option userid="'+result.details[keys].id+'" userlevel="'+result.details[keys].userlevel+'" value="'+result.details[keys].username+'" position="'+result.details[keys].currentposition+'" department="'+result.details[keys].department+'">'+result.details[keys].name+'</option>';
						} else {
							hasPMTLead=true;
						}
						
						select.append(option);
					}
                    if(hasPMTLead){
                        $("#divEvaluators").show();
                        $("#noPMTLead").hide();
                        $("#btnAdd").show();
                    } else {
                        $("#btnAdd").hide();
                    }
				}
			},
			error: function(e){
				console.log(e);
			}
		});
	}
	 $('#dropdownPL').on('change', function(){
		var position = $("#dropdownPL option:selected").attr("position");
		var userlevel = $("#dropdownPL option:selected").attr("userlevel");
		var department = $("#dropdownPL option:selected").attr("department");
		$('#position').text(isNullorEmpty(position));
		$('#department').text(isNullorEmpty(department));
		$('#userlevel').text(isNullorEmpty(userlevel));
	});

	$("#btnAdd").click(function(){
	   if(!validate()){
		   return;
	   } else {
			$('#modalPMTEvaluators').modal('hide');
		   $("#loadingmodal").modal("show");
		   $.ajax({
			   url: "<?php echo base_url();?>pmtselectionmanagement/newpmtevaluator",
			   type:"POST",
			   dataType:"json",
			   data: {
				   "EVALUATORNAME": $("#dropdownPL option:selected").text(),
				   "USERNAME": $("#dropdownPL").val(),
				   "USERLEVEL": $('#userlevel').text(),
				   "POSITION": $('#position').text(),
				   "DEPARTMENT": $("#department").text()
			   },
			   success: function(result){
				   $("#loadingmodal").modal("hide");
				   if(result.Code == "00"){
					   clearField();
					   $("#editPL").hide();
					   $("#dropdownPL").show();
					   window.isUpdate = true;
					   loadUsers();
					   loadEvaluators();
					   messageDialogModal("Server Message",result.Message);
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

  function validate(){
		if($("#dropdownPL").val() == "" || $("#dropdownPL").val() == null){
			messageDialogModal("Required","Please Select PMT Lead Name");
			return false;
		}
		return true;
	}


	function isNullorEmpty(string){
		if (string == null || string == undefined || string == "" || string == "null")
			return "--";
		return string;
	}
</script>
<style>
	.s_o{
		/* Double-sized Checkboxes */
		-ms-transform: scale(1.3); /* IE */
		-moz-transform: scale(1.3); /* FF */
		-webkit-transform: scale(1.3); /* Safari and Chrome */
		-o-transform: scale(1.3); /* Opera */
		padding: 10px;
	}
</style>