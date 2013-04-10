<?php
/**
 * Defines the interface for the SessionManager class
 *
 */
class SessionManager 
{

	private static $instance = null;
	
	private function __construct() {
		@session_start();
	}
	

	public static function getInstance()
	 {
		if (SessionManager::$instance === null) {
			SessionManager::$instance = new SessionManager();
		}
		return SessionManager::$instance;
		
	}

	/**
	 * 
	 * Create/Update a session variable
	 *
	 * @param $sessionName: Name of the session variable
	 * @param $sessionValue: value for the session variable
	 *
	 */
	public function setSessionVariable($sessionName, $sessionValue) {
		$_SESSION[$sessionName] = $sessionValue; 
	}

	/**
	 * 
	 * Returns the value of session variable given in $sessionName
	 *
	 * @param $sessionName: Name of the session variable
	 *
	 */
	public function getSessionVariable($sessionName) {
		if (isset($_SESSION[$sessionName])) {
			return $_SESSION[$sessionName];
		}
		else {
			return "";
		}
	}

	/**
	 * 
	 * Returns the true if session variable exists with any value other than blank else return false
	 *
	 * @param $sessionName: Name of the session variable
	 *
	 */
	public function isSessionAlive($sessionName) { 
		if (isset($_SESSION[$sessionName]) && $_SESSION[$sessionName] != "") {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * 
	 * Unset a session variable and returns true
	 *
	 * @param $sessionName: Name of the session variable
	 *
	 */
 public function unsetSessionVariable($sessionName) {
		if (isset($_SESSION[$sessionName]) && $_SESSION[$sessionName] != "") {
			unset($_SESSION[$sessionName]);
			return true;
		}
	} 
	/**
	 * 
	 * Destroy session and returns true
	 *
	 * @param : NA
	 *
	 */
	public function destroySession() { 
	session_destroy();
	return false;
		session_destroy();
		return true;
	}

	/**
	 * 
	 * Get session Id
	 *
	 * @param : NA
	 *
	 */
	public function getSessionId() {
		return session_id();
	}
	
	public function printSession(){
		print"<pre>";
		print_r($_SESSION);
	}
	
} // class ends 
 
?>