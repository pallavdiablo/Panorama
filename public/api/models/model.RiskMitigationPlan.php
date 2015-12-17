<?php

	require_once "model.BaseModel.php";

	// fetch from RiskMitigationPlan table
	class RiskMitigationPlan extends BaseModel {
		public $id, $name;
		public $prelaunch_checklist;		// contains the link to the attachment
		public $UAT_required, $UAT_conducted_by, $UAT_date;
		public $vetted_by_stakeholders;
		public $feedback_taken_from, $feedback, $feedback_incorporated, $feedback_incorporation_date;
		public $final_UAT, $final_UAT_conducted_by;
		public $final_sign_off, $GTM_sign_off, $SVP_sign_off;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM RiskMitigationPlan WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );
			
			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->prelaunch_checklist = $row['prelaunch_checklist'];
					$this->UAT_required = $row['UAT_required'];
					$this->UAT_conducted_by = $row['UAT_conducted_by'];
					$this->UAT_date = $row['UAT_date'];
					$this->vetted_by_stakeholders = $row['vetted_by_stakeholders'];
					$this->feedback_taken_from = $row['feedback_taken_from'];
					$this->feedback = $row['feedback'];
					$this->feedback_incorporated = $row['feedback_incorporated'];
					$this->feedback_incorporation_date = $row['feedback_incorporation_date'];
					$this->final_UAT = $row['final_UAT'];
					$this->final_UAT_conducted_by = $row['final_UAT_conducted_by'];
					$this->final_sign_off = $row['final_sign_off'];
					$this->GTM_sign_off = $row['GTM_sign_off'];
					$this->SVP_sign_off = $row['SVP_sign_off'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("RiskMitigationPlan update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE RiskMitigationPlan SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>