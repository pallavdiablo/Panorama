<?php

	class Dbase {
		private $host, $user, $passwd, $db;

		public function __construct( $db = "test_panorama" ){
			$this->host = "localhost";
			$this->user = "root";
			$this->passwd = "abcde";
			$this->db = $db;
			// $this->db = "test";
		}

		public function executeQuery( $query ){
			$conn = new mysqli( $this->host, $this->user, $this->passwd, $this->db );
			$res = $conn->query( $query );

			return $res;
		}
		
		public function array2String( $arr ) {
			
		}
		
		public function createUpdateString( $arr ) {
			$str = "";
			$i = 0;
			foreach ( $arr as $k => $v ) {
				if ( $i > 0 )
					$str .= ", ";
				$str = $str.$k. "= '".$v."'";
				$i += 1;
			}
			
			return $str;
		}
	}
?>