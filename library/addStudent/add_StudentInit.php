<?php 
	  include_once(LIB_PATH."addStudent/add_StudentManager.php");
?>
<?php


$student_info_Obj=new Add_StudentManager();

if(isset($_REQUEST['addStudent']) && $_REQUEST['addStudent']==='ADD_STUDENT' && isset($_REQUEST['newStudent']) && $_REQUEST['newStudent']==='NEW_STUDENT' )
{
	
	if($_FILES['image']['error']>0)
	{
		echo $_FILES['image']['error'];
	}
	else
	{
		
		$course='';
		foreach($_REQUEST['course'] as $val)
		{
			$course=$val.','.$course;
		}
		
		$file_name=end(explode('.',$_FILES['image']['name']));
		
		$image_name=$_REQUEST['roll'].'.'.$file_name;
		
		move_uploaded_file($_FILES["image"]["tmp_name"],USER_IMG_PATH.$image_name);
		
		
	if(isset($_REQUEST['newStudent']) && $_REQUEST['newStudent']==='NEW_STUDENT')
	{
	$result=$student_info_Obj->insert($_REQUEST['name'],$_REQUEST['roll'],$course,$_REQUEST['joine_date'],$image_name,$_REQUEST['address']);
	}
	
	}
	if(isset($result))
	{
		
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php</script>";
	}
	//$Register_User_Obj->insert_RegisterUser_info($_REQUEST);
	
}


if(isset($_REQUEST['addStudent']) && $_REQUEST['addStudent']==='ADD_STUDENT' && isset($_REQUEST['updateStudent']) && $_REQUEST['updateStudent']==='UPDATE_STUDENT' )
{
	
	$course='';
		foreach($_REQUEST['course'] as $val)
		{
			$course=$val.','.$course;
		}
		
		if($_FILES['image1']['error']>0)
		{
			 $_FILES['image1']['error'];
			
			$image_name=$_REQUEST['image_name'];
		}
		else
		{
			$file_name=end(explode('.',$_FILES['image1']['name']));
		
			$image_name=$_REQUEST['roll'].'.'.$file_name;
		
			move_uploaded_file($_FILES["image1"]["tmp_name"],USER_IMG_PATH.$image_name);
		
		}
		
	$result=$student_info_Obj->update($_REQUEST['name'],$_REQUEST['roll'],$course,$_REQUEST['joine_date'],$image_name,$_REQUEST['address'],$_REQUEST['id']);
	
}



if(isset($_REQUEST['edit']) && isset($_REQUEST['id']))
{
	if($_REQUEST['edit']==='EDIT')
	{
		$student_edit_Obj=new Add_StudentManager();
		$result=$student_edit_Obj->studentEdit($_REQUEST['id']);
		
	}
	else
	{
		echo "<script>document.location.href='".HTTP_PATH."front/profile/profile.php</script>";
	}
}


?>