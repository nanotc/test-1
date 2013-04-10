<?php 
	  include_once(LIB_PATH."student_info/student_infoManager.php");
	  require_once(COMM_PATH."Paging.php");
	 $paging = new Paging();
	
	$defNum = 5; // records per page
	$page = 1;
	if(isset($_REQUEST['page']) && $_REQUEST['page']!=''){
		$page = $_REQUEST['page'];
	} else {
		$page = 1;
	}
	$limitDown = MG_RECORDS_PER_PAGE;
	$limitUp = ($page-1)*$limitDown;
	
	
?>
<?php

if(isset($_SESSION['userid']))
{
	
	
	$student_info_Obj=new student_inforManager();
	
	$result=$student_info_Obj->student_info($_REQUEST,$limitUp,$limitDown);
	
	$pageCount=$student_info_Obj->getUserCount();
		$paging->setpagingparameters($pageCount);
		
	//$paging->setpagingparameters(count($result));

	
	
	//$Register_User_Obj->insert_RegisterUser_info($_REQUEST);
	
}
if(isset($_REQUEST['action']) && $_REQUEST['action']==='DELETE')
{
	$delete=new student_inforManager();
	
	$delete->studentDelete($_REQUEST['id']);
}


if(isset($_REQUEST['action_delete']) && $_REQUEST['action_delete']==='DELETE_ALL')
{
	
	$deleteAll=new student_inforManager();
	
	$deleteAll->deleteAll($_REQUEST['id']);
}

?>