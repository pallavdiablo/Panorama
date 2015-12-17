<?php

	require_once "model.BaseModel.php";

	// fetch from CapabilitiesEnhancement table
	class CapabilitiesEnhancement extends BaseModel {
		public $id, $name;
		public $capability_enhancement;
		public $capability_enhancement_impact_areas;
		public $capability_enhancement_measurement;

		public function __construct( $id = -1)		// set $this->id = $id; populate all member vars from DB
		{
			parent::__construct();
			$q = "SELECT * FROM CapabilitiesEnhancement WHERE id = $id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );
			
			if ( $res && $res->num_rows > 0 )
				if ( $row = $res->fetch_assoc() ) {
					$this->id = $row['id'];
					$this->capability_enhancement = $row['capability_enhancement'];
					$this->capability_enhancement_impact_areas = $row['capability_enhancement_impact_areas'];
					$this->capability_enhancement_measurement = $row['capability_enhancement_measurement'];
				}

			$res->free();
		}

		public function update( $fields ) {
			//logger( print_r( $fields, true ) );
			logger("CapabilitiesEnhancement update function called.\nFields : ".print_r( $fields, true ) );
			
			$db = new Dbase();
			$updateString = $db->createUpdateString( $fields['result'] );
			$q = "UPDATE CapabilitiesEnhancement SET ".$updateString." WHERE id = $this->id";
			logger("Update query : ".print_r($q, true) );
			$success = $db->executeQuery($q);
			
			return $success;
			// return status code, message instead of the above statement
		}
	}
?>