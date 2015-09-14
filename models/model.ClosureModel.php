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

			$res = $this->fetchQueryResult( $q );

			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->program_closure_date = $row['program_closure_date'];
					$this->program_closure_comment = $row['program_closure_comment'];
				}

			$res->free();
		}
	}
?>