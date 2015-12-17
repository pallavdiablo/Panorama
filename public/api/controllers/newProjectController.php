<?php
	require_once __DIR__."/../models/model.Project.php";
	require_once __DIR__."/../utils/Dbase.php";
	require_once __DIR__."/../logger.php";
	
	define("CSV_DIR", __DIR__."/../../FileUploader/files");
	define("BASE_DIR", __DIR__."/../../..");
	
	//$dir_path = __DIR__."/../../FileUploader/files";
	
	function addNewProject( $params ) {
		logger("Add New Project params : ".print_r( $params, true ) );
		
		switch ( strtolower($params['data']['save']) ) {
			case 'true':
			case '1':
				commit2DB();
				break;
				
			default:
				cleanup();
				break;
		}
	}
	
	function commit2DB() {
		logger("CSV containing directory : ".print_r(CSV_DIR, true) );
		
		//exec("sudo chown -R $USER:$USER ".BASE_DIR."/public");
		logger("BASE DIR : ".print_r(BASE_DIR, true) );
		
		//exec("sudo chown -R root:www-data ".BASE_DIR."/public");
		exec("sudo chmod -R 755 ".BASE_DIR."/public/FileUploader");
		exec("sudo chmod -R 755 ".CSV_DIR);	// ensuring that the files directory is readable for the program
		//exec("sudo chmod -R 777 ".CSV_DIR);
		
		$res = exec("python ".BASE_DIR."/public/FileUploader/main.py", $output, $return_var);
		// $res = exec("python ".BASE_DIR."/public/FileUploader/main.py > /home/pallav/err_log.txt", $output, $return_var);
		logger("****************\nPython execution reports : \n");
		logger("RETURNED : ".print_r($res, true) );
		logger("OUTPUT : ".print_r($output, true) );
		logger("RETURN_VAR : ".print_r($return_var, true) );
		
		logger("Initiating directory clean-up!!");
		cleanup();
		logger("CleanUp should be done!!");
	}
	
	function cleanup() {
		exec("sudo chmod -R 777 ".CSV_DIR);
		exec("rm -R ".CSV_DIR."/*");
		exec("sudo chmod -R 755 ".CSV_DIR);
	}
?>