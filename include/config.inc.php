<?php
define("_CFG_DEBUG",1);																// 1= debug mode 0= production mode			 
if(_CFG_DEBUG)						// application in debug mode
	error_reporting(E_ALL);			// show all notification
else
	error_reporting(E_ERROR);		// show only error


define("SITE_NAME",'student');
define("WEBSITE_DESC_STR",'student');
define("MAIL_DEFAULT_DOMAIN",'');
//define("ADMIN_MAIL",'admin@sportu.com');


define("ADMIN_PAYPAL_EMAIL_ID",'preet_1346232315_biz@nanowebtech.com');
define("PAYPAL_URL",'https://www.sandbox.paypal.com/cgi-bin/webscr');



define("ADMIN_EMAIL",'sandeep.singh1990@ymail.com');
define("ROOT_FOLDER", 'student');
define("HTTP_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/student/');
define("HTTP_PATHS", 'https://'.$_SERVER['HTTP_HOST'].'/student/' );
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'].'/student/');

define("USER_IMG_HTTP_PATH", HTTP_PATH."user_photos/");
define("USER_IMG_PATH", ROOT_PATH."student_photo/");
define("GIFT_IMG_PATH", ROOT_PATH."gift_images/");
define("GIFT_IMG_HTTP_PATH", HTTP_PATH."gift_images/");

define("PROPERTY_IMG_PATH", HTTP_PATH."property_images/");
define("PROPERTY_IMAGE_PATH", ROOT_PATH."property_images/");
define("VEHICLE_IMG_PATH", HTTP_PATH."vehicle_photos/");
define("VEHICLE_IMAGE_PATH", ROOT_PATH."vehicle_photos/");


define("USER_IMAGE_DIM_X", "800");
define("USER_IMAGE_DIM_Y", "600");
$GLOBALS["USER_IMAGE_ALLOWED_EXT"] = array('jpg', 'jpeg', 'png', 'gif','wbmp','xbm','xpm');
define("SITE_PATHS",'http://'.$_SERVER['HTTP_HOST'].'/student/');
define("SITE_PATH",'http://'.$_SERVER['HTTP_HOST'].'/student/');

define("COMM_PATH",ROOT_PATH.'common/');
define("LIB_PATH",ROOT_PATH.'library/');

//landing page after login
define("LANDING_PAGE",SITE_PATH."index.php");

//front end constants

define("FRONT_PATH_INCLUDE", ROOT_PATH."front/");
define("FRONT_PATH", HTTP_PATH."front/");
define("INC_PATH", ROOT_PATH."include/");
define("COMM_HTTP_PATH", HTTP_PATH."common/");
define("IMG_PATH", HTTP_PATH ."images/");
define("CSS_PATH", HTTP_PATH ."css/");
define("JS_PATH", HTTP_PATH ."js/");
define("CALENDAR_PATH", HTTP_PATH ."calendar/");
define("JS_PHP_PATH", ROOT_PATH ."js/");
//end

// uploads paths 


define("UPLOAD_BANNER_HTTP_PATH", HTTP_PATH."ads_img/");
define("UPLOAD_BANNER_ROOT_PATH", ROOT_PATH."ads_img/"); 



define("WIDER_THUMB_WIDTH",500);
define("WIDER_THUMB_HEIGHT",500);

define("TOP_BANNER_WIDTH",130);
define("TOP_BANNER_HEIGHT",300);

define("LEFT_BANNER_WIDTH",180);
define("LEFT_BANNER_HEIGHT",300);

define("RIGHT_BANNER_WIDTH",180);
define("RIGHT_BANNER_HEIGHT",300);

define("UPLOAD_PATH", ROOT_PATH."documentsettings/");
define("UPLOAD_IMG_PATH", HTTP_PATH."documentsettings/");

// user image

//end

//XML
 define("FEED_CONFIG", ROOT_PATH."front/store/feedConfig.xml"); 
//end

define("THUMB_WIDTH",230); //minimum width of thumb
define("THUMB_HEIGHT",300); //minimum height of thumb

define("GIFT_THUMB_WIDTH",150); //minimum width of thumb
define("GIFT_THUMB_HEIGHT",250); //minimum height of thumb

define("MEDIUM_WIDTH",510); //minimum width of Medium
define("MEDIUM_HEIGHT",510);


/* == Paging == */
define("MG_RECORDS_PER_PAGE",5);
define("MG_MAX_NUMBER_PAGE_LIMIT", 4);

/* == Paging == */

//admin constants
define("ADMIN_HTTP_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/Demo_Project/admin/');
define("ADMIN_ROOT_PATH", $_SERVER['DOCUMENT_ROOT'].'/Demo_Project/admin/');

define("ADMIN_FRONT_PATH", ADMIN_HTTP_PATH."modules/");

define("ADMIN_IMG_PATH", ADMIN_HTTP_PATH."images/");
define("ADMIN_LIB_PATH", ADMIN_ROOT_PATH."library/");
define("ADMIN_INC_PATH", ADMIN_ROOT_PATH."include/");
define("ADMIN_MODULES_PATH_ROOT", ADMIN_ROOT_PATH."modules/");
define("ADMIN_MODULES_PATH_HTTP", ADMIN_HTTP_PATH."modules/");

define("ADMIN_MENU_PATH", ADMIN_ROOT_PATH."menu/");
define("ADMIN_MENU_PATH_HTTP", ADMIN_HTTP_PATH."menu/");
define("ADMIN_JS_PATH_ROOT", ADMIN_ROOT_PATH ."js/");
define("ADMIN_JS_PATH", ADMIN_HTTP_PATH ."js/");
define("ADMIN_CSS_PATH", ADMIN_HTTP_PATH ."css/");

define("ADMIN_BGIMG_HTTP_PATH", ADMIN_HTTP_PATH."gbImages/");
define("ADMIN_BGIMG_ROOT_PATH", ADMIN_ROOT_PATH."gbImages/");
define("ADMIN_COMM_PATH", ADMIN_ROOT_PATH."common/"); 
/*************************9-3-2012(neha)*****************************/

//ends

//dashboard contants
define("DASH_HTTP_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/Demo_Project/dashboard/');
define("DASH_ROOT_PATH", $_SERVER['DOCUMENT_ROOT'].'/Demo_Project/dashboard/');

define("DASH_FRONT_PATH", DASH_HTTP_PATH."front/");
define("DASH_FRONT_PATH_ROOT", DASH_ROOT_PATH."front/");

define("DASH_IMG_PATH", DASH_HTTP_PATH."images/");

define("DASH_LIB_PATH", DASH_ROOT_PATH."library/");
define("DASH_INC_PATH", DASH_ROOT_PATH."include/");
define("DASH_MODULES_PATH_ROOT", DASH_ROOT_PATH."modules/");
define("DASH_MODULES_PATH_HTTP", DASH_HTTP_PATH."modules/");

define("DASH_MENU_PATH", DASH_ROOT_PATH."menu/");
define("DASH_MENU_PATH_HTTP", DASH_HTTP_PATH."menu/");
define("DASH_JS_PATH_ROOT", DASH_ROOT_PATH ."js/");
define("DASH_JS_PATH", DASH_HTTP_PATH ."js/");
define("DASH_CSS_PATH", DASH_HTTP_PATH ."css/");

define("DASH_BGIMG_HTTP_PATH", DASH_HTTP_PATH."gbImages/");
define("DASH_BGIMG_ROOT_PATH", DASH_ROOT_PATH."gbImages/");
define("DASH_COMM_PATH", DASH_ROOT_PATH."common/"); 

/*== defintion ==*/
ini_set("upload_max_filesize", "20M"); 
ini_set("max_execution_time", "120"); 
ini_set("memory_limit", "32M"); 
ini_set("short_open_tag", "1");

//session start
require_once(COMM_PATH."SessionManager.php");
$sessionManager = SessionManager::getInstance();
//end

/*== whether front login required or not  ==*/
if(isset($login_required) && $login_required == 'Yes') {
	if((!isset($_SESSION['userid']) || $_SESSION['userid']=='') && (!isset($_SESSION['admin_userid']) || $_SESSION['admin_userid']=='')) {
		$errorMessage = "Please login to access this section.";
		$_SESSION['errorMessage'] = $errorMessage;
		header("Location: ". HTTP_PATH."");
		exit();
	}
}

/*== whether admin login required or not  ==*/
if(isset($adminlogin_required) && $adminlogin_required == 'Yes') {
	if(!isset($_SESSION['admin_userid']) || $_SESSION['admin_userid']=='') {
		$errorMessage = "Please login to access this section.";
		$_SESSION['errorMessage'] = $errorMessage;
		header("Location: ".ADMIN_HTTP_PATH."index.php");
		exit();
	}
}
//end//

	
define("REMEMBER_ME_FOR_DAYS", 30);

//chat requirements
define("CHAT_HTTP_BIND", "http://nanotech7/http-bind/");
define("CHAT_SERVER_DOMAIN", "nanotech7");
define("CHAT_RESOURCE_NAME", "ichat");
define("CHAT_MAIN_PATH_HTTP", HTTP_PATH."chat/");
 //setting languges...

function  __autoload($className) {
	if (file_exists(LIB_PATH . $className . '.php')) {
		require_once(LIB_PATH. $className . '.php');
	}else if (file_exists(COMM_PATH . $className . '.php')) {
		require_once(COMM_PATH. $className . '.php');
	} else {
		//try pear way
		$classfile = str_replace("_", "/", $className) . ".php";
		//try to include
		@include_once($classfile);
	}
}

// if ends 
if(!isset($_SESSION))
{
	header("Location: ". SITE_PATH."/index.php");
	exit();
}


 require(COMM_PATH.'Helper.php');
 $helper=new Helper();

?>