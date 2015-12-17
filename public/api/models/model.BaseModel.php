<?php
	require_once __DIR__."/../utils/Dbase.php";
	require_once __DIR__."/../logger.php";

	class BaseModel {
		//protected $host, $user, $passwd, $db;

		public function __construct() {
			/* $this->host = "localhost";
			$this->user = "root";
			$this->passwd = "abcde";
			$this->db = "test_panorama"; */
			// $this->db = "test";
		}

		/* public function executeQuery( $query ) {
			$conn = new mysqli( $this->host, $this->user, $this->passwd, $this->db );
			$res = $conn->query( $query );

			return $res;
		} */
	}
?>