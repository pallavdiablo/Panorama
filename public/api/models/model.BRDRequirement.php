<?php

	require_once "model.BaseModel.php";

	// fetch data from BRDRequirements table
	class BRDRequirement extends BaseModel {
		public $id, $name;
		public $BRD_ref_number, $BRD_date;
		public $approved, $approved_by, $approval_date;
		public $stakeholders, $stakeholder_BU, $expected_impact_BU, $stakeholder_approved, $stk_app_date;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM BRDRequirements WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );
			
			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ){
					$this->id = $row['id'];
					$this->BRD_ref_number = $row['BRD_ref_number'];
					$this->BRD_date = $row['BRD_date'];
					$this->approved = $row['approved'];
					$this->approved_by = $row['approved_by'];
					$this->approval_date = $row['approval_date'];
					$this->stakeholders = $row['stakeholders'];
					$this->stakeholder_BU = $row['stakeholder_BU'];
					$this->expected_impact_BU = $row['expected_impact_BU'];
					$this->stakeholder_approved = $row['stakeholder_approved'];
					$this->stk_app_date = $row['stk_app_date'];
					$this->responsible = $row['responsible'];
					$this->accountable = $row['accountable'];
					$this->consulted = $row['consulted'];
					$this->informed = $row['informed'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("BRDRequirement update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE BRDRequirements SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>