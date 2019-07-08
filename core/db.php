<?php
	class DB {
	  private const DB_HOST = '18.204.208.239';
		private const DB_USER = 'chefig'; 
		private const DB_PASS = '_Martina6874';

		private $_connection;
		private static $_instance;
		
		/*
      Get an instance of the Database
      @return Instance
		*/
		public static function getInstance() {
			if(!self::$_instance) { // If no instance then make one
				self::$_instance = new self();
      }
			return self::$_instance;
		}
		
		private function __construct(){
			$this->_connection = new mysqli(
				self::DB_HOST, 
				self::DB_USER, 
				self::DB_PASS
      );
      
      if ($this->_connection->connect_error) {
        die("Failed to conenc to to MySQL: " . $this->_connection->connect_error);
      }
		}

		// Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    
		// Get mysqli connection
		public function getConnection() {
			return $this->_connection;
		}
	}
?>