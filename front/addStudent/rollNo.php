<?php
include('../../include/config.inc.php');
if(isset($_REQUEST['rool_no']) && isset($_REQUEST['roll']) && $_REQUEST['rool_no']==='ROLL_NO')
{
	//print_r($_REQUEST);
	
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql="select * from student_info where roll_no='".$_REQUEST['roll']."'";
		$result= $dbConnect->executeQuery($sql);
		if($result) 
		{
			echo '<font color="#FF0000">Roll No Already exists</font>';
		}
		else
		{
			echo '<font color="#339900">Valid Roll No.</font>';
		}
		//print_r($result);
}
?>