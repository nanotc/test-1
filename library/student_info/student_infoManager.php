<?php
class student_inforManager
{	
	function student_info($arr,$limitUp,$limitDown)
	{	
		if(isset($_REQUEST['sortBy']) && $_REQUEST['sortBy']!=''){
			$sortBy = $_REQUEST['sortBy'];
		} else {
			$sortBy = "name";
		}
	
		if(isset($arr['ordBy']) && $arr['ordBy']!=''){
			$ordBy = $arr['ordBy'];
		} else {
			$ordBy = "ASC";
		}		
		
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		
		 $sql='SELECT * FROM student_info ORDER BY '.$sortBy.' '.$ordBy.' LIMIT '.$limitUp.', '.$limitDown;  
		
		//$sql="select * from student_info";
		$result= $dbConnect->executeQuery($sql);
		return $result;
		if($result == '1')
		{
			echo "<script>document.location.href='".HTTP_PATH."front/register/register_users.php?msg=register'</script>";
		}
		
	}
	
	function getUserCount()
	{
	   require_once(COMM_PATH."DatabaseManager.php");	
	   $db= new DatabaseManager();	
	   $query='SELECT count(*) as cnt FROM student_info';   
	   $result=$db->executeQuery($query);
	   
	    return $result[0]['cnt'];
	} 
	
	
	function studentEdit($id)
	{
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql="select * from student_info where student_id='".$id."'";
		$result= $dbConnect->executeQuery($sql);
	
		return $result;
	}
	
	function studentDelete($id)
	{
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		
		$sql="select * from student_info where student_id='".$id."'";
		$result= $dbConnect->executeQuery($sql);
		
		if(file_exists(USER_IMG_PATH.$result[0]['image']))
		{
			unlink(USER_IMG_PATH.$result[0]['image']);
		}
		$sql="DELETE FROM student_info WHERE  student_id='".$id."'";
		$result= $dbConnect->executeUpdate($sql);
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php'</script>";
		//$this->student_info();
	}
	function deleteAll($id)
	{
		
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		
		$sql="select * from student_info where student_id IN(".$id.")";
		$result= $dbConnect->executeQuery($sql);
		foreach($result as $key=>$val)
		{
			if(file_exists(USER_IMG_PATH.$result[$key]['image']))
			{
				unlink(USER_IMG_PATH.$result[$key]['image']);
			}
		}
		
		
		$sql="DELETE FROM student_info WHERE  student_id IN(".$id.")";
		$result= $dbConnect->executeUpdate($sql);
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php'</script>";
		//$this->student_info();
	}
}
?>