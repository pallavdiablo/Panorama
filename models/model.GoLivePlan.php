<?php
	class GoLivePlan {
		public $id, $name;
		public $launch_date;
		public $post_launch_support_needed, $post_launch_support_provided_by;
		public $program_status;
		public $post_launch_risk_assessment_done, $post_launch_risk_assessment_done_by;
		public $remarks;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>