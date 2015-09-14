<?php

	// fetch from RiskMitigationPlan table
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
?>