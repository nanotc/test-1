<?php
require_once("../../include/config.inc.php");
require_once(COMM_PATH."DatabaseManager.php");
$dbConnect = new DatabaseManager();
if(isset($_SESSION['userid'])){
session_destroy();
}
echo '<script>document.location.href="'.HTTP_PATH.'"</script>';	
?>