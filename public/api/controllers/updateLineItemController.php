<?php
	require_once __DIR__."/../models/model.Project.php";
	require_once __DIR__."/../utils/Dbase.php";
	require_once __DIR__."/../logger.php";

	// Responsible for creating UpdateLineItemController object
	function updateLineItem( $params ) {
		// logger( "Inside my first Indigenous controller : ".print_r($params, true) );
		$proj = new UpdateLineItemControllerObject( $params['identifier']['project_name'] );
		$status = $proj->process($params['identifier'], $params['data']);
		
		return $status;		// or return a status array
		// return "EMPTY SET";
	}

	class UpdateLineItemControllerObject {
		private $project;
		
		public function __construct( $projName ) {
			$this->project = new Project( $projName );
			//logger("Project created inside controller contructor : ".print_r($this->project, true) );
		}

		// master function 
		public function process($identifiers, $data) {
			$field_values = array();
			//$field_values = $this->process_data( $data );
			for( $i=0; $i < count($this->project->lineItems); $i += 1 ) {
				if ( $this->project->lineItems[$i]->name == $identifiers['lineitem_name'] ) 
				{
					switch ( $identifiers['module_name'] )
					{
						case 'BRDRequirement':
							$field_values = $this->process_BRDRequirement_form_data($data);
							$success = $this->project->lineItems[$i]->BRDRequirementObject->update($field_values);
							break;
						
						// Extend similar cases as above
						case 'TechDevNeed':
							$field_values = $this->process_TechDevNeed_form_data($data);
							$success = $this->project->lineItems[$i]->TechDevNeedObject->update($field_values);
							break;
						
						case 'ContentNeed':
							$field_values = $this->process_ContentNeed_form_data($data);
							$success = $this->project->lineItems[$i]->ContentNeedObject->update($field_values);
							break;
						
						case 'TrainingNCommunicationPlan':
							$field_values = $this->process_TrainingNCommunicationPlan_form_data($data);
							$success = $this->project->lineItems[$i]->TrainingNCommunicationPlanObject->update($field_values);
							break;
						
						case 'CapabilitiesEnhancement':
							$field_values = $this->process_CapabilitiesEnhancement_form_data($data);
							$success = $this->project->lineItems[$i]->CapabilitiesEnhancementObject->update($field_values);
							break;
						
						case 'CostBenefit':
							$field_values = $this->process_CostBenefit_form_data($data);
							$success = $this->project->lineItems[$i]->CostBenefitObject->update($field_values);
							break;
						
						case 'RiskMitigationPlan':
							$field_values = $this->process_RiskMitigationPlan_form_data($data);
							$success = $this->project->lineItems[$i]->RiskMitigationPlanObject->update($field_values);
							break;
						
						case 'GoLivePlan':
							$field_values = $this->process_GoLivePlan_form_data($data);
							$success = $this->project->lineItems[$i]->GoLivePlanObject->update($field_values);
							break;
						
						case 'ClosureModel':
							$field_values = $this->process_ClosureModel_form_data($data);
							$success = $this->project->lineItems[$i]->ClosureModelObject->update($field_values);
							break;
						
						default:
							//$success = array ();
							break;
					}
				}
			}
			
			// return status code and message instead of the following statement
			return $success;
		}
		
		
		// Converts the serialized array into corresponing recognizable array
		public function process_data( $data ) {
			
		}
		
		// return arrays of attributes and attribute values, 
		// assoc array of (attribute_name => attribute_value mapping) 
		private function process_BRDRequirement_form_data( $data ) {
			// logger("Inside process BRDRequirement data : ".print_r( $data, true) );
			
			$nameMap = array(
								"brd-ref-number" => "BRD_ref_number",
								"brd-date" => "BRD_date",
								"approved" => "approved",
								"approved-by" => "approved_by",
								"approval-date" => "approval_date",
								"stakeholders" => "stakeholders",
								"stakeholder-bu" => "stakeholder_BU",
								"expected-impact-bu" => "expected_impact_BU",
								"stakeholders-approved" => "stakeholder_approved",
								"stk-app-date" => "stk_app_date",
								"responsible" => "responsible",
								"accountable" => "accountable",
								"consulted" => "consulted",
								"informed" => "informed"
						);
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array( "result" => $result,
							 "columns_array" => $columnsArr,
							 "values_array" => $valuesArr
						);
			
			// logger("process_BRDRequirement_data : ".print_r($return, true) );
			return $return;
		}
		
		private function process_TechDevNeed_form_data( $data ) {
			// logger("Inside process TechDevNeed !!");
			
			$nameMap = array(
								"tech-requirement" => "tech_requirement",
								"dev-time-estimate" => "dev_time_estimate",
								"development-start-date" => "dev_start_date",
								"development-end-date" => "dev_end_date",
								"responsible" => "responsible",
								"accountable" => "accountable",
								"consulted" => "consulted",
								"informed" => "informed"
						);
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
			
			// logger("process_TechDevNeed_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_ContentNeed_form_data( $data ) {
			
			$nameMap = array(
								"content-creation-required" => "content_creation_required",
								"content-created-by" => "content_created_by",
								"content-approval-by" => "content_approval_by",
								"content-approved" => "content_approved",
								"responsible" => "responsible",
								"accountable" => "accountable",
								"consulted" => "consulted",
								"informed" => "informed"
						);

			$result = array();
			$columnsArr = array();
			$valuesArr = array();
				
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
				
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
				
			// logger("process_ContentNeed_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_TrainingNCommunicationPlan_form_data( $data ) {
			
			$nameMap = array(
								"communicated-to-user" => "communicated_to_user",
								"internal-BU-communicated" => "internal_BU_communicated",
								"communication-sent-date" => "communication_sent_date",
								"training-required" => "training_required",
								"training-provided" => "training_provided",
								"training-start-date" => "training_start_date",
								"training-end-date" => "training_end_date",
								"responsible" => "responsible",
								"accountable" => "accountable",
								"consulted" => "consulted",
								"informed" => "informed"
						);

			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
			
			// logger("process_TrainingNCommunicationPlan_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_CapabilitiesEnhancement_form_data( $data ) {
			
			$nameMap = array(
								"capability-enhancement" => "capability_enhancement",
								"capability-enhancement-impact-areas" => "capability_enhancement_impact_areas",
								"capability-enhancement-measurement" => "capability_enhancement_measurement"
						);

			$result = array();
			$columnsArr = array();
			$valuesArr = array();
				
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
				
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
				
			// logger("process_CapabilitiesEnhancement_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_CostBenefit_form_data( $data ) {
			
			$nameMap = array(
								"checked-by" => "checked_by",
								"cost-assigned-to-business-units" => "cost_assigned_to_BU",
								"pass-on-by" => "pass_on_by",
								"cost-approval" => "cost_approval",
								"approved-by" => "approved_by"
			);
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
			
			// logger("process_CostBenefit_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_RiskMitigationPlan_form_data( $data ) {
			
			$nameMap = array(
								"prelaunch-checklist" => "prelaunch_checklist",
								"UAT-required" => "UAT_required",
								"UAT-conducted-by" => "UAT_conducted_by",
								"UAT-date" => "UAT_date",
								"vetted-by-stakeholders" => "vetted_by_stakeholders",
								"feedback-taken-from" => "feedback_taken_from",
								"feedback" => "feedback",
								"feedback-incorporated" => "feedback_incorporated",
								"feedback-incorporation-date" => "feedback_incorporation_date",
								"final-UAT" => "final_UAT",
								"final-UAT-conducted-by" => "final_UAT_conducted_by",
								"final-sign-off" => "final_sign_off",
								"GTM-sign-off" => "GTM_sign_off",
								"SVP-sign-off" => "SVP_sign_off"
						);
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
			
			// logger("process_RiskMitigationPlan_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_GoLivePlan_form_data( $data ) {
			
			$nameMap = array(
								"launch-date" => "launch_date",
								"post-launch-support-needed" => "post_launch_support_needed",
								"post-launch-support-provided-by" => "post_launch_support_provided_by",
								"program-status" => "program_status",
								"post-launch-risk-assessment-done" => "post_launch_risk_assessment_done",
								"post-launch-risk-assessment-done-by" => "post_launch_risk_assessment_done_by",
								"remarks" => "remarks"
						);
			
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array("result" => $result,
							"columns_array" => $columnsArr,
							"values_array" => $valuesArr
						);
			
			// logger("process_GoLivePlan_data return value : ".print_r($return, true) );
			return $return;
		}
		
		private function process_ClosureModel_form_data( $data ) {
			// logger("Inside process Closure data : ".print_r($data, true) );
			
			$nameMap = array(
								"program-closure-date" => "program_closure_date",
								"program-closure-comment" => "program_closure_comment"
						);
			
			$result = array();
			$columnsArr = array();
			$valuesArr = array();
			
			foreach ( $data as $row ) {
				$t_key = $row['name'];
				$key = $nameMap[$t_key];
				$result[$key] = $row['value'];
				$columnsArr[] = $key;
				$valuesArr[] = $row['value'];
			}
			
			$return = array( "result" => $result,
							 "columns_array" => $columnsArr,
							 "values_array" => $valuesArr
						);
			
			// logger("process_Closure_data, Return array : ".print_r($return, true) );
			return $return;
		}
	}
?>