<?php

	require_once "model.BaseModel.php";

	// fetch from TrainingNCommunicationPlan table
	class TrainingNCommunicationPlan extends BaseModel {
		public $id, $name;
		public $communicated_to_user, $internal_BU_communicated, $communication_sent_date;
		public $training_required, $training_provided, $training_start_date, $training_end_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM TrainingNCommunicationPlan WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );
			
			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->communicated_to_user = $row['communicated_to_user'];
					$this->internal_BU_communicated = $row['internal_BU_communicated'];
					$this->communication_sent_date = $row['communication_sent_date'];
					$this->training_required = $row['training_required'];
					$this->training_provided = $row['training_provided'];
					$this->training_start_date = $row['training_start_date'];
					$this->training_end_date = $row['training_end_date'];
					$this->responsible = $row['responsible'];
					$this->accountable = $row['accountable'];
					$this->consulted = $row['consulted'];
					$this->informed = $row['informed'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("TrainingNCommunicationPlan update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE TrainingNCommunicationPlan SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>