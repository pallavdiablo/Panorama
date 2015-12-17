<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="/img/Panorama_512.ico">	<!-- browser tab icon -->
		<title>Panorama</title>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/npm.js"></script>
        <script type="text/javascript" src="js/editstatus.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/status.css">
	</head>

	<body background="img/bg_editindex.jpg">

			<div style="margin: 2%">
				<a href="/ui/editindex.php"><button class="btn" style="float: left"><i class="glyphicon glyphicon-home"></i> HOME</button></a>
				<div class="btn-group" style="float: right">
					<button class="btn btn-primary" id="btn-complete"><i class="glyphicon glyphicon-ok"></i> COMPLETE </button>
					<button class="btn btn-danger" id="btn-disable" data-toggle="modal" data-target="#project-disable-confirmation-modal">
						<i class="glyphicon glyphicon-remove"></i> DISABLE 
					</button>
				</div>
			</div>
        	<br><div><h1 id="project-name"></h1></div>


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

	        <table class='table table-bordered table-condensed' id='tbl-brd-requirements'>
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
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>420</td>
			        <td>12-June-2015</td>
			        <td>Y</td>
			        <td>Random Guy</td>
			        <td>13-June</td>
			        <td>BC, MC</td>
			        <td>MD, BD</td>
			        <td>SD</td>
			        <td>Y</td>
			        <td>21-Jun</td>
			        <td>NaMo</td>
			        <td>MaMo</td>
			        <td>KaMo</td>
			        <td>Komodo</td>
			        <td>
			        	<a data-toggle="modal" data-target="#brd-requirement-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#brd-requirement-edit-modal">EDIT</button> -->
	    </div>

	    <!-- Tech Dev Need table -->
        <div class="module-tabs hidden" id="tech-dev-need" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-tech-dev-need'>
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
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Y</td>
			        <td>2 months</td>
			        <td>13-June</td>
			        <td>21-Jun</td>
			        <td>NaMo</td>
			        <td>MaMo</td>
			        <td>KaMo</td>
			        <td>Komodo</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#tech-dev-need-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#tech-dev-need-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Content Need table -->
        <div class="module-tabs hidden" id="content-need" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-content-need'>
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
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Y</td>
			        <td>Koi To hai</td>
			        <td>Ye bhi koi hai</td>
			        <td>Y</td>
			        <td>NaMo</td>
			        <td>MaMo</td>
			        <td>KaMo</td>
			        <td>Komodo</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#content-need-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#content-need-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Training & Communication Plan table -->
        <div class="module-tabs hidden" id="training-n-communication-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-training-n-communication-plan'>
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
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Y</td>
			        <td>Koi To hai</td>
			        <td>20-June</td>
			        <td>Y</td>
			        <td>Y</td>
			        <td>20-June</td>
			        <td>20-June</td>
			        <td>NaMo</td>
			        <td>MaMo</td>
			        <td>KaMo</td>
			        <td>Komodo</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#training-n-communication-plan-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#training-n-communication-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Capabilities Enhancement table -->
        <div class="module-tabs hidden" id="capabilities-enhancement" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-capabilities-enhancement'>
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Capability Enhancement">Capability Enhancement</th>
			        <th title="Capability Enhancement Impact Areas">Capability Enhancement Impact Areas</th>
			        <th title="Capability Enhancement Measurement">Capability Enhancement Measurement</th>
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Y</td>
			        <td>Koi To hai</td>
			        <td>Ye bhi koi hai</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#capabilities-enhancement-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%"  data-toggle="modal" data-target="#capabilities-enhancement-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Cost Benefit table -->
        <div class="module-tabs hidden" id="cost-benefit" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-cost-benefit'>
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Checked By">Checked By</th>
			        <th title="Cost Assigned to Biz Units">Cost Assigned to BU</th>
			        <th title="Pass On By">Pass On By</th>
			        <th title="Cost Approval">Cost Approval</th>
			        <th title="Approved By">Approved By</th>
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Mr Incredible</td>
			        <td>Y</td>
			        <td>Flash</td>
			        <td>Y</td>
			        <td>Mrs Incredible</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#cost-benefit-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#cost-benefit-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Risk Mitigation Plan table-->
        <div class="module-tabs hidden" id="risk-mitigation-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-risk-mitigation-plan'>
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
			        <th title="UAT Conducted By">Final UAT Conducted By</th>
			        <th title="Final Sign Off">Final Sign Off</th>
			        <th title="GTM Sign Off">GTM Sign Off</th>
			        <th title="SVP Sign Off">SVP Sign Off</th>
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>Lambi Si checklist</td>
			        <td>Y</td>
			        <td>Koi To hai</td>
			        <td>20-June</td>
			        <td>Y</td>
			        <td>Chutiye Log</td>
			        <td>Bhasad</td>
			        <td>Y</td>
			        <td>20-June</td>
			        <td>Kuch Bhi</td>
			        <td>NaMo</td>
			        <td>Y</td>
			        <td>Y</td>
			        <td>Y</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#risk-mitigation-plan-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#risk-mitigation-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Go Live Plan table -->
        <div class="module-tabs hidden" id="go-live-plan" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-go-live-plan'>
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
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>12-July-2023</td>
			        <td>Y</td>
			        <td>Koi To hai</td>
			        <td>Fucked Up</td>
			        <td>Y</td>
			        <td>NaMo</td>
			        <td>Doldrums</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#go-live-plan-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
			      </tr> -->
			    </tbody>
	        </table>

	        <!-- <button class="btn btn-primary" style="margin-left: 48%" data-toggle="modal" data-target="#go-live-plan-edit-modal">EDIT</button> -->
	    </div>


	    <!-- Closure table -->
        <div class="module-tabs hidden" id="closure" style="margin: 0px">

	        <table class='table table-bordered table-condensed' id='tbl-closure'>
	            <thead>
			      <tr class="info">
			        <th title="Line Items">Line Items</th>
			        <th title="Program Closure Date">Program Closure Date</th>
			        <th title="Program Closure Comment">Program Closure Comment</th>
			        <th title="Edit">Edit</th>
			      </tr>
			    </thead>
			    <tbody>
			      <!-- <tr>
			        <td class="warning">PHOENIX</td>
			        <td>12-July-2023</td>
			        <td>Doldrums</td>
			        <td>
			        	<a href="" data-toggle="modal" data-target="#closure-edit-modal"><i class="glyphicon glyphicon-pencil"></i></a>
			        </td>
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
	    				<span class="lineitem-name" style="display: none">Whoaaa!!</span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="brd-requirement-edit-form">
		    				<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>BRD Ref Number</td>
		    							<td><input type="text" name="brd-ref-number"> </td>
		    						</tr>
		    						<tr>
		    							<td>BRD Date</td>
		    							<td><input type="text" name="brd-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Approved</td>
		    							<td><input type="text" name="approved"> </td>
		    						</tr>
		    						<tr>
		    							<td>Approved by</td>
		    							<td><input type="text" name="approved-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Approval Date</td>
		    							<td><input type="text" name="approval-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Stakeholders</td>
		    							<td><input type="text" name="stakeholders"> </td>
		    						</tr>
		    						<tr>
		    							<td>Stakeholder BU</td>
		    							<td><input type="text" name="stakeholder-bu"> </td>
		    						</tr>
		    						<tr>
		    							<td>Expected Impact BU</td>
		    							<td><input type="text" name="expected-impact-bu"> </td>
		    						</tr>
		    						<tr>
		    							<td>Stakeholders Approved</td>
		    							<td><input type="text" name="stakeholders-approved"> </td>
		    						</tr>
		    						<tr>
		    							<td>Stk App Date</td>
		    							<td><input type="text" name="stk-app-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Responsible</td>
		    							<td><input type="text" name="responsible"> </td>
		    						</tr>
		    						<tr>
		    							<td>Accountable</td>
		    							<td><input type="text" name="accountable"> </td>
		    						</tr>
		    						<tr>
		    							<td>Consulted</td>
		    							<td><input type="text" name="consulted"> </td>
		    						</tr>
		    						<tr>
		    							<td>Informed</td>
		    							<td><input type="text" name="informed"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
		    			</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="tech-dev-need-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Tech Requirement</td>
		    							<td><input type="text" name="tech-requirement"> </td>
		    						</tr>
		    						<tr>
		    							<td>Development Time Estimate</td>
		    							<td><input type="text" name="dev-time-estimate"> </td>
		    						</tr>
		    						<tr>
		    							<td>Development Start Date</td>
		    							<td><input type="text" name="development-start-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Development End Date</td>
		    							<td><input type="text" name="development-end-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Responsible</td>
		    							<td><input type="text" name="responsible"> </td>
		    						</tr>
		    						<tr>
		    							<td>Accountable</td>
		    							<td><input type="text" name="accountable"> </td>
		    						</tr>
		    						<tr>
		    							<td>Consulted</td>
		    							<td><input type="text" name="consulted"> </td>
		    						</tr>
		    						<tr>
		    							<td>Informed</td>
		    							<td><input type="text" name="informed"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>
					
	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="content-need-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Content Creation Required</td>
		    							<td><input type="text" name="content-creation-required"> </td>
		    						</tr>
		    						<tr>
		    							<td>Content Created By</td>
		    							<td><input type="text" name="content-created-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Content Approval By</td>
		    							<td><input type="text" name="content-approval-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Content Approved</td>
		    							<td><input type="text" name="content-approved"> </td>
		    						</tr>
		    						<tr>
		    							<td>Responsible</td>
		    							<td><input type="text" name="responsible"> </td>
		    						</tr>
		    						<tr>
		    							<td>Accountable</td>
		    							<td><input type="text" name="accountable"> </td>
		    						</tr>
		    						<tr>
		    							<td>Consulted</td>
		    							<td><input type="text" name="consulted"> </td>
		    						</tr>
		    						<tr>
		    							<td>Informed</td>
		    							<td><input type="text" name="informed"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="training-n-communication-plan-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Communicated to User</td>
		    							<td><input type="text" name="communicated-to-user"> </td>
		    						</tr>
		    						<tr>
		    							<td>Internal Business Units Communicated</td>
		    							<td><input type="text" name="internal-BU-communicated"> </td>
		    						</tr>
		    						<tr>
		    							<td>Communication Sent Date</td>
		    							<td><input type="text" name="communication-sent-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Training Required</td>
		    							<td><input type="text" name="training-required"> </td>
		    						</tr>
		    							<td>Training Provided</td>
		    							<td><input type="text" name="training-provided"> </td>
		    						</tr>
		    						<tr>
		    							<td>Training Start Date</td>
		    							<td><input type="text" name="training-start-date"> </td>
		    						</tr>
		    							<td>Training End Date</td>
		    							<td><input type="text" name="training-end-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Responsible</td>
		    							<td><input type="text" name="responsible"> </td>
		    						</tr>
		    						<tr>
		    							<td>Accountable</td>
		    							<td><input type="text" name="accountable"> </td>
		    						</tr>
		    						<tr>
		    							<td>Consulted</td>
		    							<td><input type="text" name="consulted"> </td>
		    						</tr>
		    						<tr>
		    							<td>Informed</td>
		    							<td><input type="text" name="informed"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="capabilities-enhancement-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Capability Enhancement</td>
		    							<td><input type="text" name="capability-enhancement"> </td>
		    						</tr>
		    						<tr>
		    							<td>Capability Enhancement Impact Areas</td>
		    							<td><input type="text" name="capability-enhancement-impact-areas"> </td>
		    						</tr>
		    						<tr>
		    							<td>Capability Enhancement Measurement</td>
		    							<td><input type="text" name="capability-enhancement-measurement"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="cost-benefit-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Checked By</td>
		    							<td><input type="text" name="checked-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Cost Assigned to Business Units</td>
		    							<td><input type="text" name="cost-assigned-to-business-units"> </td>
		    						</tr>
		    						<tr>
		    							<td>Pass On By</td>
		    							<td><input type="text" name="pass-on-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Cost Approval</td>
		    							<td><input type="text" name="cost-approval"> </td>
		    						</tr>
		    						<tr>
		    							<td>Approved By</td>
		    							<td><input type="text" name="approved-by"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="risk-mitigation-plan-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Pre-Launch Check List</td>
		    							<td><input type="text" name="prelaunch-checklist"> </td>
		    						</tr>
		    						<tr>
		    							<td>UAT Required</td>
		    							<td><input type="text" name="UAT-required"> </td>
		    						</tr>
		    						<tr>
		    							<td>UAT Conducted By</td>
		    							<td><input type="text" name="UAT-conducted-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>UAT Date</td>
		    							<td><input type="text" name="UAT-date"> </td>
		    						</tr>
		    							<td>Vetted By Stakeholders</td>
		    							<td><input type="text" name="vetted-by-stakeholders"> </td>
		    						</tr>
		    						<tr>
		    							<td>Feedback Taken From</td>
		    							<td><input type="text" name="feedback-taken-from"> </td>
		    						</tr>
		    							<td>Feedback</td>
		    							<td><input type="text" name="feedback"> </td>
		    						</tr>
		    						<tr>
		    							<td>Feedback Incorporated</td>
		    							<td><input type="text" name="feedback-incorporated"> </td>
		    						</tr>
		    						<tr>
		    							<td>Feedback Incorporation Date</td>
		    							<td><input type="text" name="feedback-incorporation-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Final UAT</td>
		    							<td><input type="text" name="final-UAT"> </td>
		    						</tr>
		    						<tr>
		    							<td>Final UAT Conducted By</td>
		    							<td><input type="text" name="final-UAT-conducted-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Final Sign Off</td>
		    							<td><input type="text" name="final-sign-off"> </td>
		    						</tr>
		    						<tr>
		    							<td>GTM Sign Off</td>
		    							<td><input type="text" name="GTM-sign-off"> </td>
		    						</tr>
		    						<tr>
		    							<td>SVP Sign Off</td>
		    							<td><input type="text" name="SVP-sign-off"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<form id="go-live-plan-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Launch Date</td>
		    							<td><input type="text" name="launch-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Post Launch Support Needed</td>
		    							<td><input type="text" name="post-launch-support-needed"> </td>
		    						</tr>
		    						<tr>
		    							<td>Post Launch Support Provided By</td>
		    							<td><input type="text" name="post-launch-support-provided-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Program Status</td>
		    							<td><input type="text" name="program-status"> </td>
		    						</tr>
		    						<tr>
		    							<td>Post Launch Risk Assessment Done</td>
		    							<td><input type="text" name="post-launch-risk-assessment-done"> </td>
		    						</tr>
		    						<tr>
		    							<td>Post Launch Risk Assessment Done By</td>
		    							<td><input type="text" name="post-launch-risk-assessment-done-by"> </td>
		    						</tr>
		    						<tr>
		    							<td>Remarks</td>
		    							<td><input type="text" name="remarks"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
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
	    				<span class="lineitem-name" style="display: none"></span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>
	    			
    				<!-- <ol class="breadcrumb">
    					<li>closure-edit-modal</li>
    					<li class="active">lineitem</li>
    				</ol> -->

	    			<div class="modal-body">
	    				<form id="closure-form">
	    					<table class='table table-bordered table-compressed'>
		    					<thead>
		    						<tr class="info">
			    						<th>Field</th>
			    						<th>Value</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td>Program Closure Date</td>
		    							<td><input type="text" name="program-closure-date"> </td>
		    						</tr>
		    						<tr>
		    							<td>Program Closure Comment</td>
		    							<td><input type="text" name="program-closure-comment"> </td>
		    						</tr>
		    					</tbody>
		    				</table>
	    				</form>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
	    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>


	    <!-- Project Disable Confirmation Prompt Modal -->
	    <div class="modal fade" id="project-disable-confirmation-modal" role="dialog">
	    	<div class="modal-dialog modal-lg">
	    		
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<span class="lineitem-name">DISABLE PROJECT</span>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>

	    			<div class="modal-body">
	    				<div align="center">
	    					<h3>Are you sure you want to disable the project?</h3>
	    					Once disabled, the project is not visible in projects' list.
	    				</div>
	    			</div>

	    			<div class="modal-footer">
	    				<button type="button" class="btn btn-success" id="btn-disable-confirm" data-dismiss="modal">DISABLE</button>
	    				<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
	    			</div>
	    		</div>

	    	</div>
	    </div>

	    
	</body>
</html>

<?php

?>