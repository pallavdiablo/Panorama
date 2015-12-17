<?php

	require_once "model.BaseModel.php";

	// fetch from ContentNeed table
	class ContentNeed extends BaseModel {
		public $id, $name;
		public $content_creation_required, $content_created_by;
		public $content_approval_by, $content_approved;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM ContentNeed WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );
			
			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->content_creation_required = $row['content_creation_required'];
					$this->content_created_by = $row['content_created_by'];
					$this->content_approval_by = $row['content_approval_by'];
					$this->content_approved = $row['content_approved'];
					$this->responsible = $row['responsible'];
					$this->accountable = $row['accountable'];
					$this->consulted = $row['consulted'];
					$this->informed = $row['informed'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("ContentNeed update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE ContentNeed SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>