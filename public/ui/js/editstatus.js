$(document).ready( function() {
	console.log("ENOUGH!!");

	// global variables section
	lineItemsDump = {};
	gv = {
			BRDRequirementModalHeaderHTML : $("#brd-requirement-edit-modal .modal-header").html(),
			TechDevNeedModalHeaderHTML : $("#tech-dev-need-edit-modal .modal-header").html(),
			ContentNeedModalHeaderHTML : $("#content-need-edit-modal .modal-header").html(),
			TrainingNCommunicationPlanModalHeaderHTML : $("#training-n-communication-plan-edit-modal .modal-header").html(),
			CapabilitiesEnhancementModalHeaderHTML : $("#capabilities-enhancement-edit-modal .modal-header").html(),
			CostBenefitModalHTML : $("#cost-benefit-edit-modal .modal-header").html(),
			RiskMitigationPlanModalHeaderHTML : $("#risk-mitigation-plan-edit-modal .modal-header").html(),
			GoLivePlanModalHeaderHTML : $("#go-live-plan-edit-modal .modal-header").html(),
			ClosureModalHeaderHTML : $("#closure-edit-modal .modal-header").html()
	};
	// global variables section end

	/*$.each( gv, function (k, v) {
		console.log("Key : " + k + "; Value : " + v);
	});*/


	var projectNameSubstring = window.location.search.substring(1);
	console.log( "Project Name url substring : "+projectNameSubstring);
	substr = projectNameSubstring.split('=');
	/*console.log("Substrings splitted!!");
	console.log("substring[0] : " + substr[0] );
	console.log("substring[1] : " + substr[1] );*/
	k = substr[0];
	v = substr[1];

	var wrapper = {
		init: function() {
			$.ajax({
				type: "GET",
				// url: "/api/webservice.php",
				url: "/api/webservice.php?fetch=project&"+projectNameSubstring,
				data: {},
				success: function( resp ) {
					// console.log(resp);
					jsonObj = JSON.parse( resp );
					console.log("RESPONSE : ");
					console.log(jsonObj.response);

					// Redirects page to projects' list page if the response returns null project id 
					// i.e. no project details fetched.
					if (!jsonObj.response.id ){
						window.location = "/ui/editindex.php";
					}

					lineItemsDump = jsonObj.response.lineItems;
					wrapper.set_page_variables( jsonObj.response );
					// console.log(jsonObj.response.lineItems);
					tableHandler.populate_tables( lineItemsDump );
					// modalHandler.populate_modal( lineItemsDump );
				}
			});
		}, 

		set_page_variables: function( containerVar ) {
			console.log("Trying to set page variables!!");
			wrapper.set_project_name( containerVar.name );
			wrapper.toggle_complete_button( containerVar.completed );
		},

		set_project_name: function( proj_name ) {
			console.log("PROJECT NAME : "+proj_name);
			$("#project-name").text(proj_name);
		},

		toggle_complete_button: function( completed ) {
			console.log("COMPLETE button toggling");
			// $("#btn-complete").text();
			if (completed == 1) {
				console.log("DONE");
				$("#btn-complete").addClass("disabled");
			}
			/*else {
				console.log("NOT YET");
				$("#btn-complete").text("COMPLETE");
			}*/
		},

		route_post_request: function(task, LI_identifier, postData ) {
			console.log("Trying to route post requests!!");

			// Some random processing, followed by post_data() invokation
			switch( LI_identifier.form_id ){
				case 'brd-requirement-edit-form':
					LI_identifier['module_name'] = "BRDRequirement";
					break;
				case 'tech-dev-need-form':
					LI_identifier['module_name'] = "TechDevNeed";
					break;
				case 'content-need-form':
					LI_identifier['module_name'] = "ContentNeed";
					break;
				case 'training-n-communication-plan-form':
					LI_identifier['module_name'] = "TrainingNCommunicationPlan";
					break;
				case 'capabilities-enhancement-form':
					LI_identifier['module_name'] = "CapabilitiesEnhancement";
					break;
				case 'cost-benefit-form':
					LI_identifier['module_name'] = "CostBenefit";
					break;
				case 'risk-mitigation-plan-form':
					LI_identifier['module_name'] = "RiskMitigationPlan";
					break;
				case 'go-live-plan-form':
					LI_identifier['module_name'] = "GoLivePlan";
					break;
				case 'closure-form':
					LI_identifier['module_name'] = "ClosureModel";
					break;
				default:
					LI_identifier['module_name'] = "_ERROR_MODULE_NAME_";
					break;
			}

			wrapper.post_data(postData, LI_identifier, task );
		},

		post_data : function(postData, identifier, taskName) {
			console.log("Identifier object : ");
			console.log(identifier);
			console.log("Acknowledging your call. \nTask : " + taskName + ";\npostData : ");
			console.log( postData );
			$.ajax({
				type: "POST",
				url: "/api/webservice.php",
				data : { 'task' : taskName, 'identifier' : identifier, 'data' : postData },
				success: function( resp ) {
					console.log("Received some response : ");
					console.log(resp);
					location.reload();
				},
				dataType : "json"
			});
		}

	}


	var tableHandler = {

		populate_tables : function( data ) {
			$.each( data, function (k,v) {
				tableHandler.populate_tbl_BRDRequirement( v.BRDRequirementObject, v.name );
				tableHandler.populate_tbl_TechDevNeed( v.TechDevNeedObject, v.name );
				tableHandler.populate_tbl_ContentNeed( v.ContentNeedObject, v.name );
				tableHandler.populate_tbl_TrainingNCommunicationPlan( v.TrainingNCommunicationPlanObject, v.name );
				tableHandler.populate_tbl_CapabilitiesEnhancement( v.CapabilitiesEnhancementObject, v.name );
				tableHandler.populate_tbl_CostBenefit( v.CostBenefitObject, v.name );
				tableHandler.populate_tbl_RiskMitigationPlan( v.RiskMitigationPlanObject, v.name );
				tableHandler.populate_tbl_GoLivePlan( v.GoLivePlanObject, v.name );
				tableHandler.populate_tbl_Closure( v.ClosureModelObject, v.name );

				// comment this line out after testing is done
				//return false;	// breaks the each loop
			});
		},

		populate_tbl_BRDRequirement: function(data, lineitem) {
			// console.log("BRD Requirement fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			// appending a table row
			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>" );
			tblContents += ("<td class='brd_brd-ref-number'>" + data.BRD_ref_number + "</td>");
			tblContents += ("<td class='brd_brd-date'>" + data.BRD_date + "</td>");
			tblContents += ("<td class='brd_approved'>" + data.approved + "</td>");
			tblContents += ("<td class='brd_approved-by'>" + data.approved_by + "</td>");
			tblContents += ("<td class='brd_approval-date'>" + data.approval_date + "</td>");
			tblContents += ("<td class='brd_stakeholders'>" + data.stakeholders + "</td>");
			tblContents += ("<td class='brd_stakeholder-BU'>" + data.stakeholder_BU + "</td>");
			tblContents += ("<td class='brd_expected-impact-BU'>" + data.expected_impact_BU + "</td>");
			tblContents += ("<td class='brd_stakeholders-approved'>" + data.stakeholder_approved + "</td>");
			tblContents += ("<td class='brd_stk-app-date'>" + data.stk_app_date + "</td>");
			tblContents += ("<td class='brd_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='brd_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='brd_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='brd_informed'>" + data.informed + "</td>");
			tblContents += ("<td class='brd_edit edit_lineitem'> <a data-toggle='modal' data-target='#brd-requirement-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			// everything goes before this line
			tblContents += "</tr>";
			$('#tbl-brd-requirements tbody').append( tblContents );
		},

		populate_tbl_TechDevNeed: function(data, lineitem) {
			// console.log("Tech Dev Need fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='tdn_tech-requirement'>" + data.tech_requirement + "</td>");
			tblContents += ("<td class='tdn_dev-time-estimate'>" + data.dev_time_estimate + "</td>");
			tblContents += ("<td class='tdn_dev-start-date'>" + data.dev_start_date + "</td>");
			tblContents += ("<td class='tdn_dev-end-date'>" + data.dev_end_date + "</td>");
			tblContents += ("<td class='tdn_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='tdn_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='tdn_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='tdn_informed'>" + data.informed + "</td>");
			tblContents += ("<td class='tdn_edit edit_lineitem'> <a data-toggle='modal' data-target='#tech-dev-need-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$('#tbl-tech-dev-need tbody').append( tblContents );
		},

		populate_tbl_ContentNeed: function(data, lineitem) {
			// console.log("Content Need fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='cn_content-creation-required'>" + data.content_creation_required + "</td>");
			tblContents += ("<td class='cn_content-created-by'>" + data.content_created_by + "</td>");
			tblContents += ("<td class='cn_content-approval-by'>" + data.content_approval_by + "</td>");
			tblContents += ("<td class='cn_content-approved'>" + data.content_approved + "</td>");
			tblContents += ("<td class='cn_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='cn_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='cn_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='cn_informed'>" + data.informed + "</td>");
			tblContents += ("<td class='cn_edit edit_lineitem'> <a data-toggle='modal' data-target='#content-need-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-content-need tbody").append( tblContents );
		},

		populate_tbl_TrainingNCommunicationPlan: function(data, lineitem) {
			// console.log("Training & Communication Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='tncp_comm-to-user'>" + data.communicated_to_user + "</td>");
			tblContents += ("<td class='tncp_internal-BU-comm'>" + data.internal_BU_communicated + "</td>");
			tblContents += ("<td class='tncp_comm-sent-date'>" + data.communication_sent_date + "</td>");
			tblContents += ("<td class='tncp_training-required'>" + data.training_required + "</td>");
			tblContents += ("<td class='tncp_training-provided'>" + data.training_provided + "</td>");
			tblContents += ("<td class='tncp_training-start-date'>" + data.training_start_date + "</td>");
			tblContents += ("<td class='tncp_training-end-date'>" + data.training_end_date + "</td>");
			tblContents += ("<td class='tncp_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='tncp_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='tncp_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='tncp_informed'>" + data.informed + "</td>");
			tblContents += ("<td class='tncp_edit edit_lineitem'> <a data-toggle='modal' data-target='#training-n-communication-plan-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-training-n-communication-plan tbody").append( tblContents );
		},

		populate_tbl_CapabilitiesEnhancement: function(data, lineitem) {
			// console.log("Capabilities Enhancement fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement'>" + data.capability_enhancement + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement-impact-areas'>" + data.capability_enhancement_impact_areas + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement-measurement'>" + data.capability_enhancement_measurement + "</td>" );
			tblContents += ("<td class='ce_edit edit_lineitem'> <a data-toggle='modal' data-target='#capabilities-enhancement-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-capabilities-enhancement tbody").append( tblContents );
		},

		populate_tbl_CostBenefit: function(data, lineitem) {
			// console.log("Cost Benefit fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";
			// console.log("Mike testing : " + data.cost_assigned_to_BU);

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='cb_checked-by'>" + data.checked_by + "</td>");
			tblContents += ("<td class='cb_cost-assigned-to-BU'>" + data.cost_assigned_to_BU + "</td>");
			tblContents += ("<td class='cb_pass-on-by'>" + data.pass_on_by + "</td>");
			tblContents += ("<td class='cb_cost-approval'>" + data.cost_approval + "</td>");
			tblContents += ("<td class='cb_approved-by'>" + data.approved_by + "</td>");
			tblContents += ("<td class='cb_edit edit_lineitem'> <a data-toggle='modal' data-target='#cost-benefit-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-cost-benefit tbody").append( tblContents );
		},

		populate_tbl_RiskMitigationPlan: function(data, lineitem) {
			// console.log("Risk Mitigation Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='rmp_prelaunch-checklist'>" + data.prelaunch_checklist + "</td>");
			tblContents += ("<td class='rmp_UAT-reqd'>" + data.UAT_required + "</td>");
			tblContents += ("<td class='rmp_UAT-conducted-by'>" + data.UAT_conducted_by + "</td>");
			tblContents += ("<td class='rmp_UAT-date'>" + data.UAT_date + "</td>");
			tblContents += ("<td class='rmp_vetted-by-stakeholders'>" + data.vetted_by_stakeholders + "</td>");
			tblContents += ("<td class='rmp_feedback-taken-from'>" + data.feedback_taken_from + "</td>");
			tblContents += ("<td class='rmp_feedback'>" + data.feedback + "</td>");
			tblContents += ("<td class='rmp_feedback-incorporated'>" + data.feedback_incorporated + "</td>");
			tblContents += ("<td class='rmp_feedback-incorporation-date'>" + data.feedback_incorporation_date + "</td>");
			tblContents += ("<td class='rmp_final-UAT'>" + data.final_UAT + "</td>");
			tblContents += ("<td class='rmp_final-UAT-conducted-by'>" + data.final_UAT_conducted_by + "</td>");
			tblContents += ("<td class='rmp_final-sign-off'>" + data.final_sign_off + "</td>");
			tblContents += ("<td class='rmp_GTM-sign-off'>" + data.GTM_sign_off + "</td>");
			tblContents += ("<td class='rmp_SVP-sign-off'>" + data.SVP_sign_off + "</td>");
			tblContents += ("<td class='rmp_edit edit_lineitem'> <a data-toggle='modal' data-target='#risk-mitigation-plan-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-risk-mitigation-plan tbody").append( tblContents );
		},

		populate_tbl_GoLivePlan: function(data, lineitem) {
			// console.log("Go Live Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>" );
			tblContents += ("<td class='glp_launch-date'>" + data.launch_date + "</td>" );
			tblContents += ("<td class='glp_post-launch-support-needed'>" + data.post_launch_support_needed+ "</td>");
			tblContents += ("<td class='glp_post-launch-support-provided-by'>" + data.post_launch_support_provided_by + "</td>");
			tblContents += ("<td class='glp_program-status'>" + data.program_status + "</td>");
			tblContents += ("<td class='glp_post-launch-risk-assessment-done'>" + data.post_launch_risk_assessment_done + "</td>");
			tblContents += ("<td class='glp_post-launch-risk-assessment-done-by'>" + data.post_launch_risk_assessment_done_by + "</td>");
			tblContents += ("<td class='glp_remarks'>" + data.remarks + "</td>");
			tblContents += ("<td class='glp_edit edit_lineitem'> <a data-toggle='modal' data-target='#go-live-plan-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-go-live-plan tbody").append( tblContents );
		},

		populate_tbl_Closure: function(data, lineitem) {
			// console.log("Closure fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning lineitem-name'>" + lineitem + "</td>");
			tblContents += ("<td class='c_prog-cls-date'>" + data.program_closure_date + "</td>");
			tblContents += ("<td class='c_prog-cls-comment'>" + data.program_closure_comment + "</td>");
			tblContents += ("<td class='c_edit edit_lineitem'> <a data-toggle='modal' data-target='#closure-edit-modal'><i class='glyphicon glyphicon-pencil'></i></a> </td>");

			tblContents += "</tr>";
			$("#tbl-closure tbody").append( tblContents );
		}

	}


	var modalHandler = {

		populate_modal: function(moduleName, data) {
			/*console.log("Checking inside modalHandler function : ");
			console.log(moduleName);
			console.log( data );*/

			switch(moduleName) 
			{
				case 'tbl-brd-requirements':
					modalHandler.populate_modal_BRDRequirement( data );
					break;
				case 'tbl-tech-dev-need':
					modalHandler.populate_modal_TechDevNeed( data );
					break;
				case 'tbl-content-need':
					modalHandler.populate_modal_ContentNeed( data );
					break;
				case 'tbl-training-n-communication-plan':
					modalHandler.populate_modal_TrainingNCommunicationPlan( data );
					break;
				case 'tbl-capabilities-enhancement':
					modalHandler.populate_modal_CapabilitiesEnhancement( data );
					break;
				case 'tbl-cost-benefit':
					modalHandler.populate_modal_CostBenefit( data );
					break;
				case 'tbl-risk-mitigation-plan':
					modalHandler.populate_modal_RiskMitigationPlan( data );
					break;
				case 'tbl-go-live-plan':
					modalHandler.populate_modal_GoLivePlan( data );
					break;
				case 'tbl-closure':
					modalHandler.populate_modal_Closure( data );
					break;
				default:
					break;
			}
		},

		populate_modal_BRDRequirement : function(data) {
			console.log("BRDRequirement modal handler");
			console.log( data );

			$.each( data, function(k, v){
				switch(v.className)
				{
					case 'warning lineitem-name':
						// gv.BRDRequirementModalHeaderHTML must be a global variable
						// @@@p_change
						$("#brd-requirement-edit-modal .modal-header").html( gv.BRDRequirementModalHeaderHTML );
						$("#brd-requirement-edit-modal button.close").before(v.text);
						$("#brd-requirement-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'brd_brd-ref-number':
						// console.log( "brd-ref-number : " + v.text );
						$("#brd-requirement-edit-form input[name='brd-ref-number']").val(v.text);
						break;
					case 'brd_brd-date':
						$("#brd-requirement-edit-form input[name='brd-date']").val(v.text);
						break;
					case 'brd_approved':
						$("#brd-requirement-edit-form input[name='approved']").val(v.text);
						break;
					case 'brd_approved-by':
						$("#brd-requirement-edit-form input[name='approved-by']").val(v.text);
						break;
					case 'brd_approval-date':
						$("#brd-requirement-edit-form input[name='approval-date']").val(v.text);
						break;
					case 'brd_stakeholders':
						$("#brd-requirement-edit-form input[name='stakeholders']").val(v.text);
						break;
					case 'brd_stakeholder-BU':
						$("#brd-requirement-edit-form input[name='stakeholder-bu']").val(v.text);
						break;
					case 'brd_expected-impact-BU':
						$("#brd-requirement-edit-form input[name='expected-impact-bu']").val(v.text);
						break;
					case 'brd_stakeholders-approved':
						$("#brd-requirement-edit-form input[name='stakeholders-approved']").val(v.text);
						break;
					case 'brd_stk-app-date':
						$("#brd-requirement-edit-form input[name='stk-app-date']").val(v.text);
						break;
					case 'brd_responsible':
						$("#brd-requirement-edit-form input[name='responsible']").val(v.text);
						break;
					case 'brd_accountable':
						$("#brd-requirement-edit-form input[name='accountable']").val(v.text);
						break;
					case 'brd_consulted':
						$("#brd-requirement-edit-form input[name='consulted']").val(v.text);
						break;
					case 'brd_informed':
						$("#brd-requirement-edit-form input[name='informed']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_TechDevNeed : function(data) {
			console.log("TechDevNeed modal handler");
			console.log( data );

			$.each(data, function(k, v) {
				switch(v.className)
				{
					case 'warning lineitem-name':
						console.log("yawwwwwwwwwwwwwwnnnn");
						// BRDRequirementModalHeaderHtml must be a global variable
						$("#tech-dev-need-edit-modal .modal-header").html( gv.TechDevNeedModalHeaderHTML );
						$("#tech-dev-need-edit-modal button.close").before(v.text);
						console.log(v.text);
						$("#tech-dev-need-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'tdn_tech-requirement':
						// console.log( "brd-ref-number : " + v.text );
						$("#tech-dev-need-form input[name='tech-requirement']").val(v.text);
						break;
					case 'tdn_dev-time-estimate':
						$("#tech-dev-need-form input[name='dev-time-estimate']").val(v.text);
						break;
					case 'tdn_dev-start-date':
						$("#tech-dev-need-form input[name='development-start-date']").val(v.text);
						break;
					case 'tdn_dev-end-date':
						$("#tech-dev-need-form input[name='development-end-date']").val(v.text);
						break;
					case 'tdn_responsible':
						$("#tech-dev-need-form input[name='responsible']").val(v.text);
						break;
					case 'tdn_accountable':
						$("#tech-dev-need-form input[name='accountable']").val(v.text);
						break;
					case 'tdn_consulted':
						$("#tech-dev-need-form input[name='consulted']").val(v.text);
						break;
					case 'tdn_informed':
						$("#tech-dev-need-form input[name='informed']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_ContentNeed : function(data) {
			console.log("ContentNeed modal handler");
			console.log( data );

			$.each(data, function(k, v) {
				switch(v.className) {
					case 'warning lineitem-name':
						$("#content-need-edit-modal .modal-header").html( gv.TechDevNeedModalHeaderHTML );
						$("#content-need-edit-modal button.close").before( v.text );
						$("#content-need-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'cn_content-creation-required':
						$("#content-need-form input[name='content-creation-required']").val(v.text);
						break;
					case 'cn_content-created-by':
						$("#content-need-form input[name='content-created-by']").val(v.text);
						break;
					case 'cn_content-approval-by':
						$("#content-need-form input[name='content-approval-by']").val(v.text);
						break;
					case 'cn_content-approved':
						$("#content-need-form input[name='content-approved']").val(v.text);
						break;
					case 'cn_responsible':
						$("#content-need-form input[name='responsible']").val(v.text);
						break;
					case 'cn_accountable':
						$("#content-need-form input[name='accountable']").val(v.text);
						break;
					case 'cn_consulted':
						$("#content-need-form input[name='consulted']").val(v.text);
						break;
					case 'cn_informed':
						$("#content-need-form input[name='informed']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_TrainingNCommunicationPlan : function(data) {
			console.log("TrainingNCommunicationPlan modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className){
					case 'warning lineitem-name':
						$("#training-n-communication-plan-edit-modal .modal-header").html( gv.TrainingNCommunicationPlanModalHeaderHTML );
						$("#training-n-communication-plan-edit-modal button.close").before( v.text );
						$("#training-n-communication-plan-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'tncp_comm-to-user':
						$("#training-n-communication-plan-form input[name='communicated-to-user']").val(v.text);
						break;
					case 'tncp_internal-BU-comm':
						$("#training-n-communication-plan-form input[name='internal-BU-communicated']").val(v.text);
						break;
					case 'tncp_comm-sent-date':
						$("#training-n-communication-plan-form input[name='communication-sent-date']").val(v.text);
						break;
					case 'tncp_training-required':
						$("#training-n-communication-plan-form input[name='training-required']").val(v.text);
						break;
					case 'tncp_training-provided':
						$("#training-n-communication-plan-form input[name='training-provided']").val(v.text);
						break;
					case 'tncp_training-start-date':
						$("#training-n-communication-plan-form input[name='training-start-date']").val(v.text);
						break;
					case 'tncp_training-end-date':
						$("#training-n-communication-plan-form input[name='training-end-date']").val(v.text);
						break;
					case 'tncp_responsible':
						$("#training-n-communication-plan-form input[name='responsible']").val(v.text);
						break;
					case 'tncp_accountable':
						$("#training-n-communication-plan-form input[name='accountable']").val(v.text);
						break;
					case 'tncp_consulted':
						$("#training-n-communication-plan-form input[name='consulted']").val(v.text);
						break;
					case 'tncp_informed':
						$("#training-n-communication-plan-form input[name='informed']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_CapabilitiesEnhancement : function(data) {
			console.log("CapabilitesEnhancement modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className) {
					case 'warning lineitem-name':
						$("#capabilities-enhancement-edit-modal .modal-header").html( gv.CapabilitiesEnhancementModalHeaderHTML );
						$("#capabilities-enhancement-edit-modal button.close").before(v.text);
						$("#capabilities-enhancement-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'ce_capability-enhancement':
						$("#capabilities-enhancement-form input[name='capability-enhancement']").val(v.text);
						break;
					case 'ce_capability-enhancement-impact-areas':
						$("#capabilities-enhancement-form input[name='capability-enhancement-impact-areas']").val(v.text);
						break;
					case 'ce_capability-enhancement-measurement':
						$("#capabilities-enhancement-form input[name='capability-enhancement-measurement']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_CostBenefit : function(data) {
			console.log("CostBenefit modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className) {
					case 'warning lineitem-name':
						$("#cost-benefit-edit-modal .modal-header").html( gv.CostBenefitModalHTML );
						$("#cost-benefit-edit-modal button.close").before(v.text);
						$("#cost-benefit-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'cb_checked-by':
						$("#cost-benefit-form input[name='checked-by']").val(v.text);
						break;
					case 'cb_cost-assigned-to-BU':
						$("#cost-benefit-form input[name='cost-assigned-to-business-units']").val(v.text);
						break;
					case 'cb_pass-on-by':
						$("#cost-benefit-form input[name='pass-on-by']").val(v.text);
						break;
					case 'cb_cost-approval':
						$("#cost-benefit-form input[name='cost-approval']").val(v.text);
						break;
					case 'cb_approved-by':
						$("#cost-benefit-form input[name='approved-by']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_RiskMitigationPlan : function(data) {
			console.log("RiskMitigationPlan modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className){
					case 'warning lineitem-name':
						$("#risk-mitigation-plan-edit-modal .modal-header").html( gv.RiskMitigationPlanModalHeaderHTML );
						$("#risk-mitigation-plan-edit-modal button.close").before( v.text );
						$("#risk-mitigation-plan-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'rmp_prelaunch-checklist':
						$("#risk-mitigation-plan-form input[name='prelaunch-checklist']").val(v.text);
						break;
					case 'rmp_UAT-reqd':
						$("#risk-mitigation-plan-form input[name='UAT-required']").val(v.text);
						break;
					case 'rmp_UAT-conducted-by':
						$("#risk-mitigation-plan-form input[name='UAT-conducted-by']").val(v.text);
						break;
					case 'rmp_UAT-date':
						$("#risk-mitigation-plan-form input[name='UAT-date']").val(v.text);
						break;
					case 'rmp_vetted-by-stakeholders':
						$("#risk-mitigation-plan-form input[name='vetted-by-stakeholders']").val(v.text);
						break;
					case 'rmp_feedback-taken-from':
						$("#risk-mitigation-plan-form input[name='feedback-taken-from']").val(v.text);
						break;
					case 'rmp_feedback':
						$("#risk-mitigation-plan-form input[name='feedback']").val(v.text);
						break;
					case 'rmp_feedback-incorporated':
						$("#risk-mitigation-plan-form input[name='feedback-incorporated']").val(v.text);
						break;
					case 'rmp_feedback-incorporation-date':
						$("#risk-mitigation-plan-form input[name='feedback-incorporation-date']").val(v.text);
						break;
					case 'rmp_final-UAT':
						$("#risk-mitigation-plan-form input[name='final-UAT']").val(v.text);
						break;
					case 'rmp_final-UAT-conducted-by':
						$("#risk-mitigation-plan-form input[name='UAT-conducted-by']").val(v.text);
						break;
					case 'rmp_final-sign-off':
						$("#risk-mitigation-plan-form input[name='final-sign-off']").val(v.text);
						break;
					case 'rmp_GTM-sign-off':
						$("#risk-mitigation-plan-form input[name='GTM-sign-off']").val(v.text);
						break;
					case 'rmp_SVP-sign-off':
						$("#risk-mitigation-plan-form input[name='SVP-sign-off']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_GoLivePlan: function(data) {
			console.log("GoLivePlan modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className) {
					case 'warning lineitem-name':
						$("#go-live-plan-edit-modal .modal-header").html( gv.GoLivePlanModalHeaderHTML );
						$("#go-live-plan-edit-modal button.close").before(v.text);
						$("#go-live-plan-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'glp_launch-date':
						$("#go-live-plan-form input[name='launch-date']").val(v.text);
						break;
					case 'glp_post-launch-support-needed':
						$("#go-live-plan-form input[name='post-launch-support-needed']").val(v.text);
						break;
					case 'glp_post-launch-support-provided-by':
						$("#go-live-plan-form input[name='post-launch-support-provided-by']").val(v.text);
						break;
					case 'glp_program-status':
						$("#go-live-plan-form input[name='program-status']").val(v.text);
						break;
					case 'glp_post-launch-risk-assessment-done':
						$("#go-live-plan-form input[name='post-launch-risk-assessment-done']").val(v.text);
						break;
					case 'glp_post-launch-risk-assessment-done-by':
						$("#go-live-plan-form input[name='post-launch-risk-assessment-done-by']").val(v.text);
						break;
					case 'glp_remarks':
						$("#go-live-plan-form input[name='remarks']").val(v.text);
						break;
					default:
						break;
				}
			});
		},

		populate_modal_Closure: function(data) {
			console.log("Closure modal handler");
			console.log( data );

			$.each(data, function(k,v) {
				switch(v.className) {
					case 'warning lineitem-name':
						$("#closure-edit-modal .modal-header").html( gv.ClosureModalHeaderHTML );
						$("#closure-edit-modal button.close").before(v.text);
						$("#closure-edit-modal span.lineitem-name").text(v.text);
						break;
					case 'c_prog-cls-date':
						$("#closure-form input[name='program-closure-date']").val(v.text);
						break;
					case 'c_prog-cls-comment':
						$("#closure-form input[name='program-closure-comment']").val(v.text);
						break;
					default:
						break;
				}
			});
		}

	}

	$(document).on("click", "li", function() {
		$('li').removeClass('active');
		$(this).addClass('active');
		var moduleName = $(this).attr('name');
		// console.log(moduleName);

		$('.module-tabs').addClass('hidden');
		$('#'+moduleName).removeClass('hidden');
	});

	$(document).on("click", ".edit_lineitem", function() {

		rowObj = $(this).parent().find('td');
		moduleName = $(this).parent().parent().parent().attr('id');
		
		rowData = [];
		$.each(rowObj, function(k,v) {
			tmp = { className : v.className, text : v.innerHTML /*v.innerText*/ };
									// innerText works in chrome, but not in firefox
			rowData.push( tmp );
		});
		
		console.log("Fetching row data : ");
		console.log(rowData);
		modalHandler.populate_modal( moduleName, rowData );
	});

	$(document).on("click", ".btn-success", function() {
		var container = $(this).parent().parent();
		console.log("Container : ");
		moduleFormId = container.find('form').attr('id');
		
		console.log( "Form ID : " + moduleFormId );

		formData = container.find('form').serializeArray();

		var projectName = $("#project-name").text();
		console.log("###########################");
		console.log("Yooohooooo!! Project name : " + projectName );
		var lineItemName = container.find(".modal-header span.lineitem-name").text();
		console.log("Line Item name : " + lineItemName );
		var LI_identifier = {	
							'project_name' : projectName,
							'form_id' : moduleFormId,
							'lineitem_name' : lineItemName
						};
		console.log("Identifiers : ");
		console.log(LI_identifier);
		console.log("###########################");
		wrapper.route_post_request("UPDATE_MODULE", LI_identifier, formData);
	});

	$(document).on("click", "#btn-complete", function(e) {
		e.preventDefault();
		var projectName = $("#project-name").text();
		wrapper.post_data( {}, { project_name : projectName }, "MARK_COMPLETE" );
		console.log("Project Completion initiated for "+projectName);
	});

	$(document).on("click", "#btn-disable-confirm", function(e) {
		e.preventDefault();
		var projectName = $("#project-name").text();
		wrapper.post_data( {}, { project_name : projectName }, "MARK_DISABLED" );
		console.log("Project Disabling initiated for "+projectName);
	});

	wrapper.init();
});