<?php
include('../../include/config.inc.php');

$pgName='login_users';
include(INC_PATH.'header.php');
include(INC_PATH.'left_panel.php');
require_once(LIB_PATH."login_user/login_UserInit.php");
?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>login_user.js"></script>
<div id="content">
		<div id="content_top"></div>
        <div id="content_main">
     	
        
        <table>
        		<tr>
                	<td width="100%">
          			<label style="color:black;font-size:20px;font-weight:bold;">Login here..</label></td>
                </tr>
                 <?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='loginSuccess'){?>
                <tr>
                	<td width="100%">
          			<label style="color:black;font-size:12px;font-weight:bold;color:red;">You have Successfully Login</label></td>
                </tr>
                <?php } else if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='loginErr'){?>
                <tr>
                	<td width="100%">
          			<label style="color:black;font-size:12px;font-weight:bold;color:red;">Check Username and Password</label></td>
                </tr>
                 <?php }else{?>
                 <tr>
                	<td width="100%">
          			<label style="color:black;font-size:20px;font-weight:bold;"></label></td>
                </tr>
                 <?php }?>
                
                
                
                
                
        </table>
        <form name="login_User_Form" id="login_User_Form" action="" method="post">
         <table>
        		<tr>
                	<th>Username</th>
                    <td><input type="text" name="login_username" /><span id="errloginUsername" style="color:red;"></span></td>
                </tr>
                
                <tr>
                	<th>Password</th>
                    <td><input type="password" name="login_password"  /><span id="errloginPassword" style="color:red;"></span></td>
                </tr>
                	<input type="hidden" name="action" value="login_user_info"  />
                <tr>
                	<td></td>
                    <td><input type="submit" name="loginbtn" value="Login" onclick="return login_form_validate();"  /></td>
                </tr>
        </table>
        </form>
        
        </div>
        <div id="content_bottom"></div>

<?php include(INC_PATH.'footer.php'); ?>