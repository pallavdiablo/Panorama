<?php
	require_once "model.LineItem.php";
	require_once "model.BaseModel.php";

	class Project extends BaseModel{
		public $id, $name, $completed, $remarks;	// FETCH from projects table
		public $lineItems;							// array of lineItems in the project
		public $lineItemIDs;						// array of lineItem ids

		/*
		* Project Overall status is stored in a member lineItems object having the field 'name' = '_PROJECT_'
		*/
		public function __construct( $name = "_dummy1_", $id = "-1" ) 
		{
			parent::__construct();
			$this->lineItems = array();
			$this->lineItemIDs = array();

			$project_details_query = "SELECT * FROM projects WHERE name = '$name' ";

			$db = new Dbase();
			$res_project = $db->executeQuery( $project_details_query );

			// If 2 or more projects have same name, then identify the project by intersection of name and id
			if ( $res_project->num_rows > 1 ){
				$project_details_query = $project_details_query." AND id = $id";
				$res_project_refined_by_id = $db->executeQuery( $project_details_query );
			}

			// If project had to be filtered by name and id
			if ( $res_project_refined_by_id && $res_project_refined_by_id->num_rows == 1 ){
				while ( $row = $res_project_refined_by_id->fetch_assoc() ) {
					if ( $row['is_active'] != 0 ) {
						$this->id = $row['id'];
						$this->name = $row['name'];
						$this->completed = $row['completed'];
						$this->remarks = $row['remarks'];
						break;
					}
				}
			}
			// else if  project had to be filtered by name only
			else if ( $res_project && $res_project->num_rows > 0 )
				while ( $row_project = $res_project->fetch_assoc() )
				{
					if ( $row_project['is_active'] != 0 ){
						$this->id = $row_project['id'];
						$this->name = $row_project['name'];
						$this->completed = $row_project['completed'];
						$this->remarks = $row_project['remarks'];
						break;
					}
				}

			// UNCOMMENT THE IF-CLAUSE ONCE TESTING IS DONE
			if ( $this->id && $this->id > 0 ){
				$this->getLineItemIds();
				$this->initializeLineItems();
			}
			
		}

		public function getLineItemIds()	// FETCH from projects_lineitems_mapping
		{
			$q = "SELECT * FROM projects_lineitems_mapping WHERE project_id = $this->id";

			$db = new Dbase();
			$res = $db->executeQuery( $q );

			$lineItemIDsArray = array();
			if ( $res && $res->num_rows > 0 )
				while ( $row = $res->fetch_assoc() ){
					$lineItemIDsArray[] = $row['lineitem_id'];
				}

			$res->free();
			$this->lineItemIDs = $lineItemIDsArray;
		}

		public function initializeLineItems()		// initialize the $lineItems (array of lineItem objects) by invoking 
		{
			foreach ( $this->lineItemIDs as $id ) {
				$tmp = new LineItem($id);
				$this->lineItems[] = $tmp;
			}
		}
		
		/*
		protected function array2string( $arr )
		{
			if ( count($arr) < 1 )
				return "()";
			else {
				$str = "( $arr[0]";
				for ( $i = 1; $i < count($arr); $i += 1 ) {
					$str = $str.", $arr[$i]";
				}
				$str = $str." )";
			}

			return $str;
		}
		*/
		
	}

?>