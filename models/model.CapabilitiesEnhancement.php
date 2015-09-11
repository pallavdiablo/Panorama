<?php
	class CapabilitiesEnhancement {
		public $id, $name;
		public $capability_enhancement;
		public $capability_enhancement_impact_area;
		public $capability_enhancement_measurement;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>