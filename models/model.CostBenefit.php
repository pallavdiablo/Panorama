<?php

	// fetch from CostBenefit table
	class CostBenefit {
		public $id, $name;
		public $checked_by, $cost_assigned_to_BU;
		public $pass_on_by;
		public $cost_approval, $approved_by;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>