<?php
	class ContentNeed {
		public $id, $name;
		public $content_creation_enquired, $content_created_by;
		public $content_approved, $content_approval_by;
		public $responsible, $accountable, $consulted, $informed;

		public function __construct( $id = -1);		// set $this->id = $id; populate all member vars from DB
	}
?>