<?php
include('../../include/config.inc.php');

include(INC_PATH.'header.php');
include(INC_PATH.'sidebar_left.php');
include(LIB_PATH.'student_info/student_infoInit.php');

?>
     
<script type="text/javascript">

function checkedAll (source) {
	
	checkboxes = document.getElementsByName('foo');
	//alert(checkboxes.length);
  for each(var checkbox in checkboxes)
    checkbox.checked = source.checked;
}
function deleteAll()
{
	j=0;
	var check=new Array();
	checkboxes = document.getElementsByName('foo');
	for(i=0;i<checkboxes.length;i++)
	{
		if(checkboxes.item(i).checked)
		{
			check[j]=checkboxes.item(i).value;
			j++;
		}
	
	}
	if(check[0])
	{
		window.location = "profile.php?action_delete=DELETE_ALL&id="+check;
		
	}
	else
	{
		alert('Please Select CheckBox')
	}
}
</script>


</script>                    
                    
  
    
    <div class="right_content">            
        
    <h2>Student Information</h2> 
                    
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"><input type="checkbox" name="" onclick="checkedAll(this)" /></th>
            <th scope="col" class="rounded">Name</th>
            <th scope="col" class="rounded">Roll No.</th>
            <th scope="col" class="rounded">course</th>
            <th scope="col" class="rounded">Date of Joine</th>
             <th scope="col" class="rounded">address</th>
              <th scope="col" class="rounded">image</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
  
    <tbody>
    <?php 
	//print_r($_SESSION);
	foreach($result as $key=>$val)
	{
		
    	echo '<tr>';
        	echo '<td><input type="checkbox" name="foo" value="'.$result[$key]['student_id'].'"  /></td>';
            echo '<td>'.$result[$key]['name'].'</td>';
            echo '<td>'.$result[$key]['roll_no'].'</td>';
            echo '<td>'.$result[$key]['course'].'</td>';
            echo '<td>'.$result[$key]['date_of_joine'].'</td>';
			echo '<td>'.$result[$key]['address'].'</td>';
            echo '<td><img src="'.HTTP_PATH.'student_photo/'.$result[$key]['image'].'" width="60px" height="40px"></td>';

           echo'<td><a href="'.FRONT_PATH.'addStudent/addStudent.php?edit=EDIT&id='.$result[$key]['student_id'].'"><img src="'. IMG_PATH.'user_edit.png" alt="" title="" border="0" /></a></td>';
           echo '<td><a href="#"  class="ask" value="'.$result[$key]['student_id'].'"><img src="'. IMG_PATH.'trash.png" alt="" title="" border="0" /></a></td>';
        echo '</tr>';
	}
	?>
        
    
        
    </tbody>
</table>

	 <a href="<?php echo FRONT_PATH;?>addStudent/addStudent.php" class="bt_green"><span class="bt_green_lft"></span><strong>Add New Student</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong onclick="deleteAll()">Delete items</strong><span class="bt_red_r"></span></a> 
     
     
        <div class="pagination">
        <span class="disabled"><?php echo $paging->print_link(); ?></span>
        </div> 
     
    
     
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <?php
	include(INC_PATH.'footer.php');
	?>