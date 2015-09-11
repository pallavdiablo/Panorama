<?php
	class TechDevNeed {
		public $id, $name;
		public $tech_requirement;
		public $dev_time_estimate, $dev_start_date, $dev_end_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>