<?php
include('../../include/config.inc.php');

include(INC_PATH.'header.php');
include(INC_PATH.'sidebar_left.php');
include(LIB_PATH.'addStudent/add_StudentInit.php');

if(isset($result))
{
$str=explode(',',$result[0]['course']);

foreach($str as $val)
{
	if($val=='Webdesign')
	{
		$st1='checked=checked';
	}
	if($val=='Business')
	{
		$st2='checked=checked';
	}
	if($val=='Simple')
	{
		$st3='checked=checked';
	}
	if($val=='Clean')
	{
		$st4='checked=checked';
	}
}
}

?>

  <script>
 
  
  
  $(document).ready(function() {
	     var validator = $('#new_student').validate({
		 debug:true,
		    rules: {
			 name: {
				 required:true,
			 },
			  roll: {
				 required:true,
				 // digits: true,
			 },
			  'course[]': {
				 required:true,
			 },
			  joine_date: {
				 required:true,
				 
			 },
			  image: {
				 required:true,
			 },
			 
			  address: {
				 required:true,
			 },
				 },
				 
		errorPlacement: function(error, element) {
			var n=$('#name').val();
	      var r=$('#roll').val();
		
		
     if (element.attr("name") == "name")
	 {		
      	 error.insertAfter("#error_name"); 
		 if(!n)
		 {
			$('.NFCheck').css('margin-top','25px');
		 }
		else
		{
		 $('.NFCheck').css('margin-top','0px');
		}
	 }
   
	    if (element.attr("name") == "roll")
		{
			
			error.insertAfter("#error_roll");
			if(!r)
			{
				$('.NFCheck').css('margin-top','25px');
			}
			
       		
		}
		
	   
	    if (element.attr("name") == "course[]")
       error.insertAfter("#error_course");
    
	  if (element.attr("name") == "joine_date")
       error.insertAfter("#error_date");
	   
	    if (element.attr("name") == "image")
       error.insertAfter("#error_image");
   
	   
	    if (element.attr("name") == "address")
       error.insertAfter("#error_address");	 
	   
	    if(!n && !r)
	   {
		  $('.NFCheck').css('margin-top','50px');
	   }
	 /* if(n || r)
	 {
		  $('.NFCheck').css('margin-top','25px');
	 }*/
	 
   },
   
		messages: {
			    name: 
				{
					required:"Please enter Name",
					
				},
				 roll: 
				{
					required:"Please enter Roll No.",
					
				},
				 'course[]': 
				{
					required:"Please select course",
					
				},
				 joine_date: 
				{
					required:"Please enter Date",
					
				},
				 image: 
				{
					required:"Please enter Image",
					
				},
				address: 
				{
					required:"Please enter address ",
					
				},
		},
		submitHandler: function(form) {
		 form.submit();
		},
		success: function(label) {
			label.html("&nbsp;").addClass("checked");
		}
		 });
		return true;
  });
 
 function rollNo(val)
 {
	
	 if(isNaN(val))
	 {
		 $('.NFCheck').css('margin-top','25px');
		$('#error_roll').css('color','#F00').html('Please enter only digits.');
	 }
	 else
	 {
		 if(val)
		{
			$.ajax({
			url:'rollNo.php?rool_no=ROLL_NO&roll='+val,
			context: document.body,
			success: function(str){
			$('.NFCheck').css('margin-top','25px');
			$('#error_roll').html(str);
				}
		
			});
	     }
	 }
	
	
 }
  </script>


 <div class="right_content">            
        
    <h2>Add New Student.</h2> 
         <div class="form">
         <form action="" method="post" class="niceform" name="new_student" id="new_student" enctype="multipart/form-data">
         
                <fieldset>
          
                    <dl>
                        <dt><label for="name">Student Name:</label></dt>
                        <dd><input type="text" name="name" id="name" size="54" value="<?php if(isset($result)) echo $result[0]['name'] ;?>" minlength="2" /></dd>
                    </dl>
                   <span id="error_name"></span>
                    <dl>
                        <dt><label for="roll">Roll No.:</label></dt>
                        <dd><input type="text" name="roll" id="roll" size="54" value="<?php if(isset($result)) echo $result[0]['roll_no'] ;?>" onkeyup="rollNo(this.value)" /></dd>
                    </dl>
                     <span id="error_roll"></span>
                    
                   
                    <dl>
                        <dt><label for="course">Select Course:</label></dt>
                        
                        <dd>
                            <input type="checkbox" name="course[]" <?php if(isset($st1)) echo $st1;?> id="" value="Webdesign" /><label class="check_label">Web design</label>
                            <input type="checkbox" name="course[]" <?php if(isset($st2)) echo $st2;?> id="" value="Business" /><label class="check_label">Business</label>
                            <input type="checkbox" name="course[]" <?php if(isset($st3)) echo $st3;?> id="" value="Simple" /><label class="check_label">Simple</label>
                            <input type="checkbox" name="course[]" <?php if(isset($st4)) echo $st4;?> id="" value="Clean" /><label class="check_label">Clean</label>
                        </dd>
                    </dl>
                     <span id="error_course"></span>
                     <dl>
                        <dt><label for="date">Date of joine:</label></dt>
                        <dd><input type="text" name="joine_date" id="f_date1" size="54" value="<?php if(isset($result)) echo $result[0]['date_of_joine'] ;?>" />
                        </dd>
                    </dl>
                    <span id="error_date"></span>
                    
                   
                    <?php if(isset($result))
					{?>
                    
                     <dl>
                        <dt><label for="image">Upload a File:</label></dt>
                      
                        <dd><input type="file" name="image1" id="upload" /></dd>
                    </dl>
                     <dl>
                        <dt><label for="image">&nbsp;</label></dt>
                        <input type="hidden" name="image_name" value="<?php echo $result[0]['image'];?>" />
                        <dd><img src="<?php echo HTTP_PATH.'student_photo/'.$result[0]['image'];?>" width="100px" height="80px"></dd>
                    </dl
                    ><?php }
					else
					{ ?>
                     <dl>
                        <dt><label for="image">Upload a File:</label></dt>
                      
                        <dd><input type="file" name="image" id="upload" /></dd>
                    </dl>
                     <span id="error_image"></span>
                    <?php }	?>
                    <dl>
                        <dt><label for="address">Address:</label></dt>
                        <dd><textarea name="address" id="address" rows="5" cols="36"> <?php if(isset($result)) echo $result[0]['address'] ;?>  </textarea></dd>
                    </dl>
                      <span id="error_address"></span>
                     <input type="hidden" name="addStudent" value="ADD_STUDENT">
                    <?php if(isset($result))
					{
						echo  '<input type="hidden" name="updateStudent" value="UPDATE_STUDENT">';
						echo '  <dl class="submit"> <input type="submit"  id="submit1" value="Update" /></dl>';
					}
					else
					{
						?>
                    
                    <input type="hidden" name="newStudent" value="NEW_STUDENT">
                     <dl class="submit">
                    <input type="submit"  id="submit1" value="Submit" />
                     </dl>
                     <?php }?>
                     
                    
                </fieldset>
                
         </form>
         </div>  
         
            </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
          <?php
	include(INC_PATH.'footer.php');
	?>
    
    
 <!--   /******************************* Calendar Open***************************/-->
	<script type="text/javascript">


  Calendar.setup({
        inputField : "f_date1",
        trigger    : "f_date1",
        onSelect   : function() { this.hide(); },
        showTime   : "%I:%M %p",
        dateFormat : "%Y-%m-%d ",
		min:new Date(),
		               
		
      });

</script>
 <!--/******************************* Calendar End***************************/-->