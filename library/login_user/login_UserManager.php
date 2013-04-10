<?php
class Login_UserManager
{
	function checkLoginUser($_REQUEST)
	{
		$loginUsername=$_REQUEST['username'];
		$loginPassword=$_REQUEST['password'];
		
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		
		$sql="select * from admin where user_name='".$loginUsername."' and password=md5('".$loginPassword."')";
		$result= $dbConnect->executeQuery($sql);
		
		if($result != NULL)
		{
			$_SESSION['loginUserInfo']=$result;
			return $_SESSION['loginUserInfo'];
			
		}else
		{
			echo "<script>document.location.href='".HTTP_PATH."index.php?invalid=INVALID'</script>";
		}
		
	}
	function changePwd($old,$new,$id)
	{
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql="select * from admin where id='".$id."'";
		$result= $dbConnect->executeQuery($sql);
				
		if($result[0]['password']==md5($old))
		{
			$sql="update admin set password =md5('".$new."') where id='".$id."'";
			$result= $dbConnect->executeUpdate($sql);
			echo "<script>document.location.href='".HTTP_PATH."front/profile/change_pwd.php?change=CHANGE'</script>";
			
		}
		else
		{
			echo "<script>document.location.href='".HTTP_PATH."front/profile/change_pwd.php?old_pwd=OLD_PWD'</script>";
			
		}
		
	}
	
}
?>