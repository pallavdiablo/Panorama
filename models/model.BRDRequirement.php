<?php

	// fetch data from BRDRequirements table
	class BRDRequirement {
		public $id, $name;
		public $BRD_ref_number, $BRD_date;
		public $approved, $approved_by, $approval_date;
		public $stakeholders, $stakeholder_BU, $expected_impact_BU, $stakeholder_approved, $stk_app_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>