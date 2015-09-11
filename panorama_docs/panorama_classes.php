<?php
	// Model containing project name and the associated line items
	class Project {
		public $id, $name;					// FETCH from projects table
		public $lineItems = array();		// array of lineItems in the project
		public $lineItemIDs = array();		// array of lineItem ids

		public function __construct( $name = "_dummy1_", $id = "-1" );
		public function getLineItems();		// initialize the $lineItems (array of lineItem objects) by invoking 
		public function getLineItemIds();	// FETCH from projects_lineitems_mapping
	}

	// Model containing the modules for each lineItem
	class LineItem {
		public $id, $name;
		public $BRDRequirement;
		public $TechDevNeed;
		public $ContentNeed;
		public $TrainingNCommunicationPlan;
		public $CapabilitiesEnhancement;
		public $CostBenefit;
		public $RiskMitigationPlan;
		public $GoLivePlan;
		public $Closure;

		public function __construct( $id = -1 );		// 1. get the name by id ; 2. Invoke getMemberVariables
		public function getMemberVariables();		// invokes other member functions for populating module objects
		public function getBRDRequirements();
	}


	// Modules/tabs with their columns

	class BRDRequirement {
		public $id, $name;
		public $BRD_ref_number, $BRD_date;
		public $approved, $approved_by, $approval_date;
		public $stakeholders, $stakeholder_BU, $expected_impact_BU, $stakeholder_approved, $stk_app_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class TechDevNeed {
		public $id, $name;
		public $tech_requirement;
		public $dev_time_estimate, $dev_start_date, $dev_end_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class ContentNeed {
		public $id, $name;
		public $content_creation_enquired, $content_created_by;
		public $content_approved, $content_approval_by;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class TrainingNCommunicationPlan {
		public $id, $name;
		public $communicated_to_user, $internal_BU_communicated, $communication_sent_date;
		public $training_required, $training_provided, $training_start_date, $training_end_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class CapabilitiesEnhancement {
		public $id, $name;
		public $capability_enhancement;
		public $capability_enhancement_impact_area;
		public $capability_enhancement_measurement;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class CostBenefit {
		public $id, $name;
		public $checked_by, $cost_assigned_to_BU;
		public $pass_on_by;
		public $cost_approval, $approved_by;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class RiskMitigationPlan {
		public $id, $name;
		public $prelaunch_checklist;		// contains the link to the attachment
		public $UAT_required, $UAT_conducted_by, $UAT_date;
		public $vetted_by_stakeholders;
		public $feedback_taken_from, $feedback, $feedback_incorporated, $feedback_incorporation_date;
		public $final_UAT, $final_UAT_conducted_by;
		public $final_sign_off, $GTM_sign_off, $SVP_sign_off;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class GoLivePlan {
		public $id, $name;
		public $launch_date;
		public $post_launch_support_needed, $post_launch_support_provided_by;
		public $program_status;
		public $post_launch_risk_assessment_done, $post_launch_risk_assessment_done_by;
		public $remarks;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}

	class Closure {
		public $id, $name;
		public $program_closure_date, $program_closure_comment;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>