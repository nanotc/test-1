<?php
include('../../include/config.inc.php');


include(INC_PATH.'header.php');
include(INC_PATH.'sidebar_left.php');
include(LIB_PATH.'login_user/login_userInit.php');

?>
   <div class="right_content">            
        
  
     <h2>Change Password</h2>
        <div class="pagination">
        <form action="" method="post" class="niceform">
         <?php
		 if(isset($_REQUEST['old_pwd']))
		 {
			 if($_REQUEST['old_pwd']=='OLD_PWD')
			 {
				 echo '<font color="#FF0000" size="+1">Old Password Not Match</font>';
			 }
		 }
		 
		  if(isset($_REQUEST['new_pwd']))
		 {
			 if($_REQUEST['new_pwd']=='NEW_PWD')
			 {
				 echo '<font color="#FF0000" size="+1" >New Password Not Match</font>';
			 }
		 }
		 
		  if(isset($_REQUEST['change']))
		 {
			 if($_REQUEST['change']=='CHANGE')
			 {
				 echo '<font color="#FF0000" size="+1" >password successfully changed</font>';
			 }
		 }
		 ?>
                <fieldset>
                   
                    <dl>
                        <dt><label for="password">New Password:</label></dt>
                        <dd><input type="password" name="new_password" id="" size="54" /></dd>
                    </dl>
                     <dl>
                        <dt><label for="password">Confirm Password:</label></dt>
                        <dd><input type="password" name="con_password" id="" size="54" /></dd>
                    </dl>
                     <dl>
                        <dt><label for="email">Old Password:</label></dt>
                        <dd><input type="password" name="old_password" id="" size="54" /></dd>
                    </dl>
                    
                    <input type="hidden" name="changepwd" value="CHANGEPWD" />
                    <input type="hidden" name="id" value="<?php echo $_SESSION['userid'];?>" />
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Submit" />
                     </dl>
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