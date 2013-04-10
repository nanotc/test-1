<?php

include('../../include/config.inc.php');
if(isset($_REQUEST['logout']) && $_REQUEST['logout']==='LOGOUT')
{
	echo '<pre>';
	print_r($_SESSION);
	unset($_SESSION['userid']);
	unset($_SESSION['firstname']);
	unset($_SESSION['email']);
	unset($_SESSION['username']);
	unset($_SESSION['loginUserInfo']);
	session_destroy();
	print_r($_SESSION);
}
?>
