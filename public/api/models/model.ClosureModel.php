<?php

	require_once "model.BaseModel.php";

	// fetch from Closure table. Named as ClosureModel as opposed to Closure( which already exists causing )
	class ClosureModel extends BaseModel {
		public $id, $name;
		public $program_closure_date, $program_closure_comment;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM Closure WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );

			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->program_closure_date = $row['program_closure_date'];
					$this->program_closure_comment = $row['program_closure_comment'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("ClosureModel update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE Closure SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>