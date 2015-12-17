<?php

if ( isset($_GET['action']) ){
	$action = $_GET['action'];
	
	switch ( strtolower($action) ) {
		case "commit" :
			commit2db();
			break;
	
		case "abort":
			abort();
			break;
	
		default:
			echo json_encode( array("status"=>true, 'message'=> "No action taken") );
			break;
	}
}
else {
	$action = false;
	echo json_encode( array("status"=>false, "message"=>"Wrong query parameters") );
}
//sleep(3);
//execute python script
/* exec("sudo chmod -R 755 files");	// ensuring that the file is readable for the user
$temp = exec("python csv2db.py", $output, $return_var);
exec("sudo chmod -R 777 files");
exec("rm -R files/*");
exec("sudo chmod -R 755 files");

if ( count($output) > 1 )
	echo json_encode( array("status"=>true, 'code'=>2, 'message'=>'Files committed to db') );
else if ( count($output) == 1 )
	echo json_encode( array("status" => true, 'code'=>1, 'message'=>'No files committed to DB. Check file name') );
else
	echo json_encode( array("status" => false, 'code'=>0, 'message'=>'Something went wrong') ); */
	



function commit2db() {
	exec("sudo chmod -R 755 files");	// ensuring that the files directory is readable for the program
	//exec("sudo chmod -R 777 files");
	$temp = exec("python csv2db.py", $output, $return_var);
	
	cleanup();

	if ( count($output) > 1 )
		echo json_encode( array("status"=>true, 'code'=>2, 'message'=>'Files committed to db') );
	else if ( count($output) == 1 )
		echo json_encode( array("status" => true, 'code'=>1, 'message'=>'No files committed to DB. File name might not be as per guidelines') );
	else
		echo json_encode( array("status" => false, 'code'=>0, 'message'=>'Something went wrong', 'output'=>$output, 'return'=>$return_var) );
}

function abort() {
	cleanup();

	echo json_encode( array("status"=>true, 'message'=>'Aborted') );
}

// cleans up files after their usage. Prevents collection of junk data
function cleanup() {
	exec("sudo chmod -R 777 files");
	exec("rm -R files/*");
	exec("sudo chmod -R 755 files");
	//exec("sudo chmod -R 777 files");
}
//echo json_encode( array("text"=>$temp, "output"=>$output, "return_var"=>$return_var, "count"=>count($output)) );
/*
 // for deleting the uploaded temp files after the database is updated
 exec("sudo chmod -R 777 files");
 // exec("mysql -uroot -pabcde temp < files/comsqcdb.sql");
 exec("rm -R files/*");
 */
?>