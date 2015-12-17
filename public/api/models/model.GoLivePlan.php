<?php

	require_once "model.BaseModel.php";

	// fetch from GoLivePlan table
	class GoLivePlan extends BaseModel {
		public $id, $name;
		public $launch_date;
		public $post_launch_support_needed, $post_launch_support_provided_by;
		public $program_status;
		public $post_launch_risk_assessment_done, $post_launch_risk_assessment_done_by;
		public $remarks;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM GoLivePlan WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );

			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->launch_date = $row['launch_date'];
					$this->post_launch_support_needed = $row['post_launch_support_needed'];
					$this->post_launch_support_provided_by = $row['post_launch_support_provided_by'];
					$this->program_status = $row['program_status'];
					$this->post_launch_risk_assessment_done = $row['post_launch_risk_assessment_done'];
					$this->post_launch_risk_assessment_done_by = $row['post_launch_risk_assessment_done_by'];
					$this->remarks = $row['remarks'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("GoLivePlan update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE GoLivePlan SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>