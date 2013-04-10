<?php
class Add_StudentManager
{	
	function insert($name,$roll,$course,$date,$image,$address)
	{		
		
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql="insert into student_info values('0','".$name."','".$roll."','".$course."','".$date."','".$image."','".$address."')";
		$result= $dbConnect->executeUpdate($sql);
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php'</script>";
		
		
	}
	function update($name,$roll,$course,$date,$image,$address,$id)
	{		
		
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		 $sql="update student_info set name='".$name."',roll_no='".$roll."',course='".$course."',date_of_joine='".$date."',address='".$address."',image='".$image."' where student_id='".$id."'";
		$result= $dbConnect->executeUpdate($sql);
		
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php'</script>";
		
		
	}
	function studentEdit($id)
	{
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql="select * from student_info where student_id='".$id."'";
		$result= $dbConnect->executeQuery($sql);
	
		return $result;
	}
}
?>