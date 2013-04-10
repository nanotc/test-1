<?php
/**
 * The SystemDatabaseManager class provides the mechanism for interacting with the system database
 *
 * The class is written using the Singleton pattern.
 * Here is how a reference to an instance of the class is obtained:
 * <code>
 * $systemDatabaseManager = SystemDatabaseManager::getInstance();
 * </code>
 *
 * @package Database
 * @author Yogita Thakur
 * made $userName, $host and $password as private members
 * replaced constant for database with a private member
 */

define ( 'MYSQL_TYPES_NUMERIC', 'int real');
define ( 'MYSQL_TYPES_DATE', 'datetime timestamp year date time');
define ( 'MYSQL_TYPES_STRING', 'string blob ' );

class DatabaseManager {
	
	private static $instance;
	// for offline 

	/*private static $host = 'localhost';



	private static $userName = 'root';
	private static $password = '';



	private static $dbName = 'vacation_rental';*/
	
	
	
	private static $host = 'localhost';



	private static $userName = 'root';
	private static $password = '';



	private static $dbName = 'adminpanel';
	
	public $conn = '';
	//public $mysqli_conn = '';
	
	var $last_error; // holds the last error. Usually mysql_error()
	var $last_query; // holds the last query executed.
	var $auto_slashes; // the class will add/strip slashes when it can 
	var $row_count = 0;
	
	 function __construct()
	 {
		  $this->conn = $this->connectToServer( DatabaseManager::$host,DatabaseManager::$userName, DatabaseManager::$password);
		  $this->selectDatabase(DatabaseManager::$dbName,$this->conn);
		  $this->auto_slashes = true;
	 }
	
	public static function getInstance() {
		if (! isset (self::$instance )) {
			$c = __CLASS__;
			self::$instance = new $c ( );
		}
		return self::$instance;
	}
	
	/**
	 * executes a SELECT query in the database
	 *
	 * @access public
	 * @param $query The SQL SELECT query to execute
	 * @param $comment An optional comment explaining the query
	 *
	 * @return the result set on success, or false on error
	 */
	public function executeQuery($query) {
		$result = mysql_query ( $query );
		if ($result === false) {
			echo mysql_error();
			echo $query;
			$this->closeConnection ( $this->conn );
			exit ();
		}
		// extract data from results, returning an associative array
		$rows = Array ();
		while ( $row = mysql_fetch_assoc ( $result ) ) {
			$rows [] = $row;
		}
		return $rows;
	}
	
	/**
	 * executes a SELECT query in the database
	 *
	 * @access public
	 * @param $query The SQL SELECT query to execute
	 * @param $comment An optional comment explaining the query
	 *
	 * @return the result set on success, or false on error
	 */
	public function executeUpdate($query) {
		
		$result = mysql_query ( $query );
		if ($result === false) {
			$this->closeConnection ( $this->conn );
			exit ();
		}
		if (mysql_affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * returns last inserted id
	 *
	 * @param NA
	 * @param NA
	 *
	 * @return last insert id on success, or false on error
	 */
	public function lastInsertId() {
		return mysql_insert_id ();
	}
	
	
	
	function connectToServer($DBHost, $DBUsername, $DBPassword) {
		$connection = mysql_connect ( $DBHost, $DBUsername, $DBPassword );
		//$this->mysqli_conn = mysqli_connect ( $DBHost, $DBUsername, $DBPassword, DatabaseManager::$dbName );
		
		if ($connection === false) {// || mysqli_connect_errno ()
			echo "Unable to connect to the database on $DBHost with username $DBUsername";
			// through to maintenance page
			exit ();
		}
		return $connection;
	}
	
	function selectDatabase($database, $connection) {
		$success = mysql_select_db ( $database, $connection );
		if ($success === false) {
			echo "Failed to select database '$database'";
			return false;
		}
		
		return true;
	}
	
	function closeConnection($connection) {
		$result = mysql_close ( $connection );
		if ($result === false)
		{
			exit ();
		}
	}
	
	function select($sql)
	{
		// Performs an SQL query and returns the result pointer or false
		// if there is an error.
		$this->last_query = $sql;
		$r = mysql_query ( $sql );
		if (! $r) {
			$this->last_error = mysql_error ();
			return false;
		}
		$this->row_count = mysql_num_rows ( $r );
		return $r;
	}
	
	function get_row($result, $type = 'MYSQL_BOTH')
	{ 
		
		// Returns a row of data from the query result.  You would use this
		// function in place of something like while($row=mysql_fetch_array($r)). 
		// Instead you would have while($row = $db->get_row($r)) The
		// main reason you would want to use this instead is to utilize the
		// auto_slashes feature.
		

		if (! $result) {
			$this->last_error = "Invalid resource identifier passed to get_row() function.";
			return false;
		}
		
		if ($type == 'MYSQL_ASSOC')
			$row = mysql_fetch_array ( $result, MYSQL_ASSOC );
		if ($type == 'MYSQL_NUM')
			$row = mysql_fetch_array ( $result, MYSQL_NUM );
		if ($type == 'MYSQL_BOTH')
			$row = mysql_fetch_array ( $result, MYSQL_BOTH );
		
		if (! $row)
			return false;
		if ($this->auto_slashes) {
			// strip all slashes out of row...
			foreach ( $row as $key => $value ) {
				$row [$key] = stripslashes ( $value );
			}
		}
		return $row;
	}
	
	function getAllRows($result, $type = 'MYSQL_BOTH') {
		$returnMe = Array ();
		while ( $row = $this->get_row ( $result, $type ) ) {
			$returnMe [] = $row;
		}
		return $returnMe;
	}
	
	function update_sql($sql) {
		
		// Updates data in the database via SQL query.
		// Returns the number or row affected or true if no rows needed the update.
		// Returns false if there is an error.
		

		$this->last_query = $sql;
		
		$r = mysql_query ( $sql );
		if (! $r) {
			$this->last_error = mysql_error ();
			return false;
		}
		
		$rows = mysql_affected_rows ();
		if ($rows == 0)
			return true; // no rows were updated
		else
			return $rows;
	
	}
	
	function insert_sql($sql) {
		
		// Inserts data in the database via SQL query.
		// Returns the id of the insert or true if there is not auto_increment
		// column in the table.  Returns false if there is an error.  
		

		$this->last_query = $sql;
		
		$r = mysql_query ( $sql );
		if (! $r) {
			$this->last_error = mysql_error ();
			return false;
		}
		
		$id = mysql_insert_id ();
		if ($id == 0)
			return true;
		else
			return $id;
	}
	
	function insert_array($table, $data) {
		
		// Inserts a row into the database from key->value pairs in an array. The
		// array passed in $data must have keys for the table's columns. You can
		// not use any MySQL functions with string and date types with this 
		// function.  You must use insert_sql for that purpose.
		// Returns the id of the insert or true if there is not auto_increment
		// column in the table.  Returns false if there is an error.
		

		if (empty ( $data )) {
			$this->last_error = "You must pass an array to the insert_array() function.";
			return false;
		}
		
		$cols = '(';
		$values = '(';
		
		foreach ( $data as $key => $value ) { // iterate values to input
			

			$cols .= "$key,";
			
			$col_type = $this->get_column_type ( $table, $key ); // get column type
			if (! $col_type)
				return false; // error!
			

			// determine if we need to encase the value in single quotes
			if (is_null ( $value )) {
				$values .= "NULL,";
			} elseif (substr_count ( MYSQL_TYPES_NUMERIC, "$col_type" )) {
				$values .= "$value,";
			} elseif (substr_count ( MYSQL_TYPES_DATE, "$col_type " )) {
				$value = $this->sql_date_format ( $value, $col_type ); // format date
				$values .= "'$value',";
			} elseif (substr_count ( MYSQL_TYPES_STRING, "$col_type " )) {
				if ($this->auto_slashes)
					$value = addslashes ( $value );
				$values .= "'$value',";
			}
		}
		$cols = rtrim ( $cols, ',' ) . ')';
		$values = rtrim ( $values, ',' ) . ')';
		
		// insert values
		$sql = "INSERT INTO $table $cols VALUES $values";
		return $this->insert_sql ( $sql );
	
	}
	
	function update_array($table, $data, $condition) {
		
		// Updates a row into the database from key->value pairs in an array. The
		// array passed in $data must have keys for the table's columns. You can
		// not use any MySQL functions with string and date types with this 
		// function.  You must use insert_sql for that purpose.
		// $condition is basically a WHERE claus (without the WHERE). For example,
		// "column=value AND column2='another value'" would be a condition.
		// Returns the number or row affected or true if no rows needed the update.
		// Returns false if there is an error.
		

		if (empty ( $data )) {
			$this->last_error = "You must pass an array to the update_array() function.";
			return false;
		}
		
		$sql = "UPDATE $table SET";
		foreach ( $data as $key => $value ) { // iterate values to input
			

			$sql .= " $key=";
			
			$col_type = $this->get_column_type ( $table, $key ); // get column type
			if (! $col_type)
				return false; // error!
			

			// determine if we need to encase the value in single quotes
			if (is_null ( $value )) {
				$sql .= "NULL,";
			} elseif (substr_count ( MYSQL_TYPES_NUMERIC, "$col_type " )) {
				$sql .= "$value,";
			} elseif (substr_count ( MYSQL_TYPES_DATE, "$col_type " )) {
				$value = $this->sql_date_format ( $value, $col_type ); // format date
				$sql .= "'$value',";
			} elseif (substr_count ( MYSQL_TYPES_STRING, "$col_type " )) {
				if ($this->auto_slashes)
					$value = addslashes ( $value );
				$sql .= "'$value',";
			}
		
		}
		$sql = rtrim ( $sql, ',' ); // strip off last "extra" comma
		if (! empty ( $condition ))
			$sql .= " WHERE $condition";
			
		// insert values
		return $this->update_sql ( $sql );
	}
	
	function sql_date_format($value) {
		
		// Returns the date in a format for input into the database.  You can pass
		// this function a timestamp value such as time() or a string value
		// such as '04/14/2003 5:13 AM'. 
		

		if (gettype ( $value ) == 'string')
			$value = strtotime ( $value );
		return date ( 'Y-m-d H:i:s', $value );
	
	}
	
	function get_column_type($table, $column) {
		
		// Gets information about a particular column using the mysql_fetch_field
		// function.  Returns an array with the field info or false if there is
		// an error.
		

		$r = mysql_query ( "SELECT $column FROM $table" );
		if (! $r) {
			$this->last_error = mysql_error ();
			return false;
		}
		$ret = mysql_field_type ( $r, 0 );
		if (! $ret) {
			$this->last_error = "Unable to get column information on $table.$column.";
			
			mysql_free_result ( $r );
			return false;
		}
		mysql_free_result ( $r );
		return $ret;

	}
	
	function getList($tableName, $where=1){
		return $this->select("select  * from $tableName where $where");
	}
	
	/**
	 * returns next id 
	 */
	function getNextId($tableName, $idField){
		$rs = $this->select("select  max($idField) as currentMax from $tableName");
		if($rs === false){
			$this->last_error = "Could not determine max value for $idField in $tableName";
			return false;
		}
		$row = $this->get_row($rs);
		$currentMax = $row["currentMax"];
		if($currentMax == null){
			return 1;
		}
		mysql_free_result ( $rs );
		return ++$currentMax;
	}

}

?>