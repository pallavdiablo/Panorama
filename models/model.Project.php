<?php
	require_once "model.LineItem.php"

	class Project {
		public $id, $name;					// FETCH from projects table
		public $lineItems = array();		// array of lineItems in the project
		public $lineItemIDs = array();		// array of lineItem ids

		public function __construct( $name = "_dummy1_", $id = "-1" );
		public function getLineItems();		// initialize the $lineItems (array of lineItem objects) by invoking 
		public function getLineItemIds();	// FETCH from projects_lineitems_mapping
	}

?>