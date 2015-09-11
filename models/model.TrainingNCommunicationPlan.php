<?php
	class TrainingNCommunicationPlan {
		public $id, $name;
		public $communicated_to_user, $internal_BU_communicated, $communication_sent_date;
		public $training_required, $training_provided, $training_start_date, $training_end_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>