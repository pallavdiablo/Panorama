$(document).ready( function() {
	console.log("ENOUGH!!");

	var projectNameSubstring = window.location.search.substring(1);
	console.log( "Project Name url substring : "+projectNameSubstring);
	substr = projectNameSubstring.split('=');
	console.log("Substrings splitted!!");
	console.log("substring[0] : " + substr[0] );
	k = substr[0];
	console.log("substring[1] : " + substr[1] );
	v = substr[1];

	var wrapper = {
		init: function() {
			$.ajax({
				type: "GET",
				// url: "/api/webservice.php",
				url: "/api/webservice.php?fetch=project&"+projectNameSubstring,
				data: { /*fetch: "project", project: substr[1]*/ },
				success: function( resp ) {
					// console.log(resp);
					jsonObj = JSON.parse( resp );
					console.log(jsonObj.response);
					wrapper.set_project_name(jsonObj.response.name);
					// console.log(jsonObj.response.lineItems);
					wrapper.populate_tables(jsonObj.response.lineItems);
				}
			});
		}, 

		set_project_name: function( proj_name ) {
			console.log("PROJECT NAME : "+proj_name);
			$("#project-name").text(proj_name);
		},

		populate_tables : function( data ) {
			$.each( data, function (k,v) {
				wrapper.populate_tbl_BRDRequirement( v.BRDRequirementObject, v.name );
				wrapper.populate_tbl_TechDevNeed( v.TechDevNeedObject, v.name );
				wrapper.populate_tbl_ContentNeed( v.ContentNeedObject, v.name );
				wrapper.populate_tbl_TrainingNCommunicationPlan( v.TrainingNCommunicationPlanObject, v.name );
				wrapper.populate_tbl_CapabilitiesEnhancement( v.CapabilitiesEnhancementObject, v.name );
				wrapper.populate_tbl_CostBenefit( v.CostBenefitObject, v.name );
				wrapper.populate_tbl_RiskMitigationPlan( v.RiskMitigationPlanObject, v.name );
				wrapper.populate_tbl_GoLivePlan( v.GoLivePlanObject, v.name );
				wrapper.populate_tbl_Closure( v.ClosureModelObject, v.name );

				// comment this line out after testing is done
				//return false;	// breaks the each loop
			});
		},

		populate_tbl_BRDRequirement: function(data, lineitem) {
			// console.log("BRD Requirement fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning brd_line-item-name'>" + lineitem + "</td>" );
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

			// everithing goes before this line
			tblContents += "</tr>";
			$('#tbl-brd-requirements tbody').append( tblContents );
		},

		populate_tbl_TechDevNeed: function(data, lineitem) {
			// console.log("Tech Dev Need fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning tdn_line-item-name'>" + lineitem + "</td>");
			tblContents += ("<td class='tdn_tech-requirement'>" + data.tech_requirement + "</td>");
			tblContents += ("<td class='tdn_dev-time-estimate'>" + data.dev_time_estimate + "</td>");
			tblContents += ("<td class='tdn_dev-start-date'>" + data.dev_start_date + "</td>");
			tblContents += ("<td class='tdn_dev-end-date'>" + data.dev_end_date + "</td>");
			tblContents += ("<td class='tdn_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='tdn_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='tdn_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='tdn_informed'>" + data.informed + "</td>");

			tblContents += "</tr>";
			$('#tbl-tech-dev-need tbody').append( tblContents );
		},

		populate_tbl_ContentNeed: function(data, lineitem) {
			// console.log("Content Need fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning cn_line-item-name'>" + lineitem + "</td>");
			tblContents += ("<td class='cn_content-creation-required'>" + data.content_creation_required + "</td>");
			tblContents += ("<td class='cn_content-created-by'>" + data.content_created_by + "</td>");
			tblContents += ("<td class='cn_content-approval-by'>" + data.content_approval_by + "</td>");
			tblContents += ("<td class='cn_content-approved'>" + data.content_approved + "</td>");
			tblContents += ("<td class='cn_responsible'>" + data.responsible + "</td>");
			tblContents += ("<td class='cn_accountable'>" + data.accountable + "</td>");
			tblContents += ("<td class='cn_consulted'>" + data.consulted + "</td>");
			tblContents += ("<td class='cn_informed'>" + data.informed + "</td>");

			tblContents += "</tr>";
			$("#tbl-content-need tbody").append( tblContents );
		},

		populate_tbl_TrainingNCommunicationPlan: function(data, lineitem) {
			// console.log("Training & Communication Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning tncp_line-item-name'>" + lineitem + "</td>");
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

			tblContents += "</tr>";
			$("#tbl-training-n-communication-plan tbody").append( tblContents );
		},

		populate_tbl_CapabilitiesEnhancement: function(data, lineitem) {
			// console.log("Capabilities Enhancement fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning ce_line-item-name'>" + lineitem + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement'>" + data.capability_enhancement + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement-impact-areas'>" + data.capability_enhancement_impact_areas + "</td>" );
			tblContents += ("<td class='ce_capability-enhancement-measurement'>" + data.capability_enhancement_measurement + "</td>" );

			tblContents += "</tr>";
			$("#tbl-capabilities-enhancement tbody").append( tblContents );
		},

		populate_tbl_CostBenefit: function(data, lineitem) {
			// console.log("Cost Benefit fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";
			// console.log("Mike testing : " + data.cost_assigned_to_BU);

			tblContents += ("<td class='warning cb_line-item-name'>" + lineitem + "</td>");
			tblContents += ("<td class='cb_checked-by'>" + data.checked_by + "</td>");
			tblContents += ("<td class='cb_cost-assigned-to-BU'>" + data.cost_assigned_to_BU + "</td>");
			tblContents += ("<td class='cb_pass-on-by'>" + data.pass_on_by + "</td>");
			tblContents += ("<td class='cb_cost-approval'>" + data.cost_approval + "</td>");
			tblContents += ("<td class='cb_approved-by'>" + data.approved_by + "</td>");

			tblContents += "</tr>";
			$("#tbl-cost-benefit tbody").append( tblContents );
		},

		populate_tbl_RiskMitigationPlan: function(data, lineitem) {
			// console.log("Risk Mitigation Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning rmp_line-item-name'>" + lineitem + "</td>");
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
			tblContents += ("<td class='rmp_prelaunch-checklist'>" + data.final_sign_off + "</td>");
			tblContents += ("<td class='rmp_prelaunch-checklist'>" + data.GTM_sign_off + "</td>");
			tblContents += ("<td class='rmp_prelaunch-checklist'>" + data.SVP_sign_off + "</td>");

			tblContents += "</tr>";
			$("#tbl-risk-mitigation-plan tbody").append( tblContents );
		},

		populate_tbl_GoLivePlan: function(data, lineitem) {
			// console.log("Go Live Plan fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning glp_line-item-name'>" + lineitem + "</td>" );
			tblContents += ("<td class='glp_launch-date'>" + data.launch_date + "</td>" );
			tblContents += ("<td class='glp_post-launch-support-needed'>" + data.post_launch_support_needed+ "</td>");
			tblContents += ("<td class='glp_post-launch-support-provided-by'>" + data.post_launch_support_provided_by + "</td>");
			tblContents += ("<td class='glp_program-status'>" + data.program_status + "</td>");
			tblContents += ("<td class='glp_post-launch-risk-assessment-done'>" + data.post_launch_risk_assessment_done + "</td>");
			tblContents += ("<td class='glp_post-launch-risk-assessment-done-by'>" + data.post_launch_risk_assessment_done_by + "</td>");
			tblContents += ("<td class='glp_remarks'>" + data.remarks + "</td>");

			tblContents += "</tr>";
			$("#tbl-go-live-plan tbody").append( tblContents );
		},

		populate_tbl_Closure: function(data, lineitem) {
			// console.log("Closure fields : "+JSON.stringify(data) );
			var tblContents = "<tr>";

			tblContents += ("<td class='warning c_line-item-name'>" + lineitem + "</td>");
			tblContents += ("<td class='c_prog-cls-date'>" + data.program_closure_date + "</td>");
			tblContents += ("<td class='c_prog-cls-comment'>" + data.program_closure_comment + "</td>");

			tblContents += "</tr>";
			$("#tbl-closure tbody").append( tblContents );
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

	wrapper.init();
});