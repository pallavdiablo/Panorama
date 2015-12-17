<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="/img/Panorama_512.ico">	<!-- browser tab icon -->
		<title>Panorama</title>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/npm.js"></script>
        <script type="text/javascript" src="js/status.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/status.css">
	</head>

	<body background="img/bg_editindex.jpg">

			<div style="margin: 2%"><a href="/ui"><button class="btn"><i class="glyphicon glyphicon-home"></i> HOME</button></a></div>
        	<h1 id="project-name"></h1>


        	<div>
        		<nav class="navbar navbar-default">
		        	<ul class="nav nav-tabs">
		        		<li name="brd-requirement" class="active"><a>BRD Requirements</a></li>
		        		<li name="tech-dev-need"><a>Tech Dev Need</a></li>
		        		<li name="content-need"><a>Content Need</a></li>
		        		<li name="training-n-communication-plan"><a>Training & Communication Plan</a></li>
		        		<li name="capabilities-enhancement"><a>Capabilities Enhancement</a></li>
		        		<li name="cost-benefit"><a>Cost Benefit</a></li>
		        		<li name="risk-mitigation-plan"><a>Risk Mitigation Plan</a></li>
		        		<li name="go-live-plan"><a>Go Live Plan</a></li>
		        		<li name="closure"><a>Closure</a></li>
		        	</ul>
	        	</nav>
	        </div>

	    <!-- BRD Requirement table -->
        <div class="module-tabs" id="brd-requirement" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-brd-requirements">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="BRD Ref Number">BRD Ref Number</th>
			        <th title="BRD Date">BRD Date</th>
			        <th title="Approved">Approved</th>
			        <th title="Approved by">Approved by</th>
			        <th title="Approval date">Approval date</th>
			        <th title="Stakeholders">Stakeholders</th>
			        <th title="Stakeholder Biz Units">Stakeholder BU</th>
			        <th title="Expected Impact Biz Units">Expected Impact BU</th>
			        <th title="Stakeholders Approved">Stkhld App..</th>
			        <th title="Stk App Date">Stk App Date</th>
			        <th title="Responsible">Resp..</th>
			        <th title="Accountable">Acc..</th>
			        <th title="Consulted">Consulted</th>
			        <th title="Informed">Infd..</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning brd_line-item-name">PHOENIX</td>
			        <td class="brd_brd-ref-number">420</td>
			        <td class="brd_brd-date">12-June-2015</td>
			        <td class="brd_approved">Y</td>
			        <td class="brd_approved-by">Random Guy</td>
			        <td class="brd_approval-date">13-June</td>
			        <td class="brd_stakeholders">BC, MC</td>
			        <td class="brd_stakeholder-BU">MD, BD</td>
			        <td class="brd_expected-impact-BU">SD</td>
			        <td class="brd_stakeholders-approved">Y</td>
			        <td class="brd_stk-app-date">21-Jun</td>
			        <td class="brd_responsible">NaMo</td>
			        <td class="brd_accountable">MaMo</td>
			        <td class="brd_consulted">KaMo</td>
			        <td class="brd_informed">Komodo</td>
			      </tr> -->
			    </tbody>
	        </table>

        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#brd-requirement-edit-modal">EDIT</button> -->
	    </div>

	    <!-- Tech Dev Need table -->
        <div class="module-tabs hidden" id="tech-dev-need" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-tech-dev-need">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Tech Requirement">Tech Req..</th>
			        <th title="Development Time Estimate">Dev Time Est..</th>
			        <th title="Development Start Date">Dev Start Date</th>
			        <th title="Development End Date">Dev End Date</th>
			        <th title="Responsible">Resp..</th>
			        <th title="Accountable">Acc..</th>
			        <th title="Consulted">Consulted</th>
			        <th title="Informed">Infd..</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning tdn_line-item-name">PHOENIX</td>
			        <td class="tdn_tech-requirement">Y</td>
			        <td class="tdn_dev-time-estimate">2 months</td>
			        <td class="tdn_dev-start-date">13-June</td>
			        <td class="tdn_dev-end-date">21-Jun</td>
			        <td class="tdn_responsible">NaMo</td>
			        <td class="tdn_accountable">MaMo</td>
			        <td class="tdn_consulted">KaMo</td>
			        <td class="tdn_informed">Komodo</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#tech-dev-need-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Content Need table -->
        <div class="module-tabs hidden" id="content-need" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-content-need">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Content Creation Required">Content Creation Req..</th>
			        <th title="Content Created By">Content Created By</th>
			        <th title="Content Approval By">Content Approval By</th>
			        <th title="Content Approved">Content Approved</th>
			        <th title="Responsible">Resp..</th>
			        <th title="Accountable">Acc..</th>
			        <th title="Consulted">Consulted</th>
			        <th title="Informed">Infd..</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning cn_line-item-name">PHOENIX</td>
			        <td class="cn_content-creation-required">Y</td>
			        <td class="cn_content-created-by">Koi To hai</td>
			        <td class="cn_content-approval-by">Ye bhi koi hai</td>
			        <td class="cn_content-approved">Y</td>
			        <td class="cn_responsible">NaMo</td>
			        <td class="cn_accountable">MaMo</td>
			        <td class="cn_consulted">KaMo</td>
			        <td class="cn_informed">Komodo</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#content-need-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Training & Communication Plan table-->
        <div class="module-tabs hidden" id="training-n-communication-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-training-n-communication-plan">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Communicated to End User">Communicated to User</th>
			        <th title="Internal Business Users communicated">Internal BU comm..</th>
			        <th title="Communication Sent Date">Communication Sent Date</th>
			        <th title="Training Required">Training Required</th>
			        <th title="Training Provided">Training Provided</th>
			        <th title="Training Initiation Date">Training Start Date</th>
			        <th title="Training Completion Date">Training End Date</th>
			        <th title="Responsible">Resp..</th>
			        <th title="Accountable">Accntbl..</th>
			        <th title="Consulted">Consulted</th>
			        <th title="Informed">Infd..</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning tncp_line-item-name">PHOENIX</td>
			        <td class="tncp_comm-to-user">Y</td>
			        <td class="tncp_internal-BU-comm">Koi To hai</td>
			        <td class="tncp_comm-sent-date">20-June</td>
			        <td class="tncp_training-required">Y</td>
			        <td class="tncp_training-provided">Y</td>
			        <td class="tncp_training-start-date">20-June</td>
			        <td class="tncp_training-end-date">20-June</td>
			        <td class="tncp_responsible">NaMo</td>
			        <td class="tncp_accountable">MaMo</td>
			        <td class="tncp_consulted">KaMo</td>
			        <td class="tncp_informed">Komodo</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#training-n-communication-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Capabilities Enhancement table -->
        <div class="module-tabs hidden" id="capabilities-enhancement" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-capabilities-enhancement">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Capability Enhancement">Capability Enhancement</th>
			        <th title="Capability Enhancement Impact Areas">Capability Enhancement Impact Areas</th>
			        <th title="Capability Enhancement Measurement">Capability Enhancement Measurement</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning ce_line-item-name">PHOENIX</td>
			        <td class="ce_capability-enhancement">Y</td>
			        <td class="ce_capability-enhancement-impact-areas">Koi To hai</td>
			        <td class="ce_capability-enhancement-measurement">Ye bhi koi hai</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%"  data-toggle="modal" data-target="#capabilities-enhancement-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Cost Benefit table -->
        <div class="module-tabs hidden" id="cost-benefit" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-cost-benefit">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Checked By">Checked By</th>
			        <th title="Cost Assigned to Biz Units">Cost Assigned to BU</th>
			        <th title="Pass On By">Pass On By</th>
			        <th title="Cost Approval">Cost Approval</th>
			        <th title="Approved By">Approved By</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning cb_line-item-name">PHOENIX</td>
			        <td class="cb_checked-by">Mr Incredible</td>
			        <td class="cb_cost-assigned-to-BU">Y</td>
			        <td class="cb_pass-on-by">Flash</td>
			        <td class="cb_cost-approval">Y</td>
			        <td class="cb_approved-by">Mrs Incredible</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#cost-benefit-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Risk Mitigation Plan table-->
        <div class="module-tabs hidden" id="risk-mitigation-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-risk-mitigation-plan">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Pre Launch Check List">Pre Launch Check List</th>
			        <th title="UAT Required">UAT reqd</th>
			        <th title="UAT Conducted By">UAT Conducted By</th>
			        <th title="UAT Date">UAT Date</th>
			        <th title="Vetted by Stakeholders">Vetted by Stakeholders</th>
			        <th title="Feedback Taken From">Feedback Taken From</th>
			        <th title="Feedback">Feedback</th>
			        <th title="Feedback Incorporated">Feedback Incorporated</th>
			        <th title="Feedback Incorporation Date">Feedback Incorporation Date</th>
			        <th title="Final UAT">Final UAT </th>
			        <th title="UAT Conducted By">UAT Conducted By</th>
			        <th title="Final Sign Off">Final Sign Off</th>
			        <th title="GTM Sign Off">GTM Sign Off</th>
			        <th title="SVP Sign Off">SVP Sign Off</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning rmp_line-item-name">PHOENIX</td>
			        <td class="rmp_prelaunch-checklist">Lambi Si checklist</td>
			        <td class="rmp_UAT-reqd">Y</td>
			        <td class="rmp_UAT-conducted-by">Koi To hai</td>
			        <td class="rmp_UAT-date">20-June</td>
			        <td class="rmp_vetted-by-stakeholders">Y</td>
			        <td class="rmp_feedback-taken-from">Chutiye Log</td>
			        <td class="rmp_feedback">Bhasad</td>
			        <td class="rmp_feedback-incorporated">Y</td>
			        <td class="rmp_feedback-incorporation-date">20-June</td>
			        <td class="rmp_final-UAT">Kuch Bhi</td>
			        <td class="rmp_final-UAT-conducted-by">NaMo</td>
			        <td class="rmp_final-sign-off">Y</td>
			        <td class="rmp_GTM-sign-off">Y</td>
			        <td class="rmp_SVP-sign-off">Y</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#risk-mitigation-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Go Live Plan table -->
        <div class="module-tabs hidden" id="go-live-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-go-live-plan">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Launch Date">Launch Date</th>
			        <th title="Post Launch Support Needed">Post Launch Support Needed</th>
			        <th title="Post Launch Support Provided By">Post Launch Support Provided By</th>
			        <th title="Program Status">Program Status</th>
			        <th title="Post Launch Risk Assessment Done">Post Launch Risk Assessment Done</th>
			        <th title="Post Launch Risk Assessment Done By">Post Launch Risk Assessment Done By</th>
			        <th title="Remarks">Remarks</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning glp_line-item-name">PHOENIX</td>
			        <td class="glp_launch-date">12-July-2023</td>
			        <td class="glp_post-launch-support-needed">Y</td>
			        <td class="glp_post-launch-support-provided-by">Koi To hai</td>
			        <td class="glp_program-status">Fucked Up</td>
			        <td class="glp_post-launch-risk-assessment-done">Y</td>
			        <td class="glp_post-launch-risk-assessment-done-by">NaMo</td>
			        <td class="glp_remarks">Doldrums</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#go-live-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Closure table -->
        <div class="module-tabs hidden" id="closure" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id="tbl-closure">
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Program Closure Date">Program Closure Date</th>
			        <th title="Program Closure Comment">Program Closure Comment</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning c_line-item-name">PHOENIX</td>
			        <td class="c_prog-cls-date">12-July-2023</td>
			        <td class="c_prog-cls-comment">Doldrums</td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#closure-edit-modal">EDIT</button> -->
	    </div>

	    <!-- END OF TABLE DIVS -->

	    <!-- Modal Divs Start -->

	    <!-- BRD Requirement Edit Modal -->
	    <div class="modal fade" id="brd-requirement-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">

	    				<table class='table table-bordered'></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>


	    <!-- Tech Dev Need Edit Modal -->
	    <div class="modal fade" id="tech-dev-need-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>


	    <!-- Content Need Edit Modal -->
	    <div class="modal fade" id="content-need-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>


	    <!-- Training & Communication Plan Edit Modal -->
	    <div class="modal fade" id="training-n-communication-plan-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    <!-- Capabilities Enhancement Edit Modal -->
	    <div class="modal fade" id="capabilities-enhancement-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    <!-- Cost Benefit Edit Modal -->
	    <div class="modal fade" id="cost-benefit-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    <!-- Risk Mitigation Plan Edit Modal -->
	    <div class="modal fade" id="risk-mitigation-plan-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    <!-- Go Live Plan Edit Modal -->
	    <div class="modal fade" id="go-live-plan-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    <!-- Closure Edit Modal -->
	    <div class="modal fade" id="closure-edit-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<table class="table table-bordered"></table>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	</body>
</html>

<?php

?>
