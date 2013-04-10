<?php
include('../../include/config.inc.php');

$pgName='register_users';
include(INC_PATH.'header.php');
include(INC_PATH.'left_panel.php');
require_once(LIB_PATH."register_user/register_UserInit.php");
?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>register_users.js"></script>
<div id="content">
		<div id="content_top"></div>
        <div id="content_main">
     	
        
        <table>
        		<tr>
                	<td width="100%">
          			<label style="color:black;font-size:20px;font-weight:bold;">Registration Form</label></td>
                </tr>
                <?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='register'){?>
                <tr>
                	<td width="100%">
          			<label style="color:black;font-size:12px;font-weight:bold;color:red;">You Have Register Successfully...</label></td>
                </tr>
                 <?php }else{?>
                 <tr>
                	<td width="100%">
          			<label style="color:black;font-size:20px;font-weight:bold;"></label></td>
                </tr>
                 <?php }?>
        </table>
        <form name="register_User_Form" id="register_User_Form" action="">
        <table>
        		<tr>
                	<th>Firstname</th>
                    <td><input type="text" name="user_firstname" /><span id="errfirstname" style="color:red;"></span></td>
                </tr>
                <tr>
                	<th>Lastname</th>
                    <td><input type="text" name="user_lastname" /><span id="errlastname" style="color:red;"></span></td>
                </tr>
                <tr>
                	<th>Email</th>
                    <td><input type="text" name="user_email" /><span id="erremail" style="color:red;"></span></td>
                </tr>
                <tr>
                	<th>Username</th>
                    <td><input type="text" name="user_username" /><span id="errusername" style="color:red;"></span></td>
                </tr>
                <tr>
                	<th>Password</th>
                    <td><input type="password" name="user_password" /><span id="errpassword" style="color:red;"></span></td>
                </tr>
                
                  <tr>
                	<th>Confirm Password</th>
                    <td><input type="password" name="user_confirm_password" /><span id="errconfirmpassword" style="color:red;"></span></td>
                </tr>
                
                
                
                
                
                <tr>
                	<th>Phone No.</th>
                    <td><input type="text" name="user_phoneno" /><span id="errphoneno" style="color:red;"></span></td>
                </tr>
                	<input type="hidden" name="action" value="register_user_info" />
                <tr>
                	<td></td>
                    <td><input type="submit" name="subbutton" value="Register"  onclick="return register_Users_Validate();"/></td>
                </tr>
        </table>
        </form>
        
        
        
        
        
        </div>
        <div id="content_bottom"></div>

<?php include(INC_PATH.'footer.php'); ?>
