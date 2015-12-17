<?php
	require_once __DIR__."/../models/model.Project.php";
	require_once __DIR__."/../utils/Dbase.php";
	require_once __DIR__."/../logger.php";
	
	class ProjectController {
		
		public function markAsInactive( $params ) {
			
			$db = new Dbase();
			$project_name = $params['identifier']['project_name'];
			$q = "UPDATE projects SET is_active = '0' WHERE name = '$project_name'";
			
			logger("INACTIVE Query is : ".print_r($q, true) );
			$db->executeQuery($q);
		}
		
		public function markAsComplete( $params ) {
			
			$db = new Dbase();
			$project_name = $params['identifier']['project_name'];
			$q = "UPDATE projects SET completed = '1' WHERE name = '$project_name'";
				
			logger("COMPLETED Query is : ".print_r($q, true) );
			$db->executeQuery($q);
			
		}
	}
?>