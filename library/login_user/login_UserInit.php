<?php 
	  include_once(LIB_PATH."login_user/login_UserManager.php");
?>
<?php
if(isset($_REQUEST['index']) && $_REQUEST['index'] == 'INDEX')
{
	$Obj=new Login_UserManager();
	$authUserInfo=$Obj->checkLoginUser($_REQUEST);
	if(count($authUserInfo>0))
	{	
		$_SESSION['userid']=$authUserInfo[0]['id'];
		$_SESSION['firstname']=$authUserInfo[0]['name'];
		$_SESSION['email']=$authUserInfo[0]['email'];
		$_SESSION['username']=$authUserInfo[0]['user_name'];
		$_SESSION['phoneno']=$authUserInfo[0]['phone'];

		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php'</script>";
	}

}
if(isset($_REQUEST['changepwd']) && $_REQUEST['changepwd'] == 'CHANGEPWD')
{
	if($_REQUEST['new_password']===$_REQUEST['con_password'])
	{
		$Obj=new Login_UserManager();
		$change=$Obj->changePwd($_REQUEST['old_password'],$_REQUEST['new_password'],$_REQUEST['id']);
	}
	else
	{
		echo "<script>document.location.href='".HTTP_PATH."front/profile/change_pwd.php?new_pwd=NEW_PWD'</script>";
	}
	
}
?>