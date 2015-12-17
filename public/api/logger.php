<?php

	function logger( $logitem ) {
		exec("sudo chmod -R 777 log");
		//exec("rm -R files/*");

		$datehour = explode(":", date(DATE_ATOM))[0];

		// $parent_dir = "log";
		$parent_dir = __DIR__."/../../private/log";
		
		$file_name = "activity.".$datehour.".log";
		$log_file = $parent_dir."/".$file_name;
		
		$fl = fopen($log_file, "a");
		fwrite($fl, date(DATE_ATOM)." :\t".print_r($logitem, true) );
		fwrite($fl, "\n");
		fclose( $fl );
		exec("sudo chmod -R 755 log");
	}
	
?>