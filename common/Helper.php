<?php 
class Helper{ // start class

   var $last_error = "";            // last error message set by this class
   var $last_time = 0;              // last function execution time (debug info)
   var $decimals = 2; 
   var $finalSearch_reult = array();
	static function resizeImage($originalImage,$toWidth,$toHeight,$path,$arr)
	{
		//ini_set("memory_limit", "50M");
		//print_r($arr['type']);
		$imgType = $arr['type'][0];   
		// Get the original geometry and calculate scales
		list($width, $height) = getimagesize($originalImage);
		if($width < $toWidth){
			$toWidth = $width;
		}
		if($height < $toHeight){
			$toHeight = $height;
		}
		if($toWidth != 0){
			$xscale=$width/$toWidth;}
			if($toHeight != 0){
				$yscale=$height/$toHeight;}
				// Recalculate new size with default ratio
				if ($yscale>$xscale){
					$new_width = round($width * (1/$yscale));
					$new_height = round($height * (1/$yscale));
				}
				else
				{
					$new_width = round($width * (1/$xscale));
					$new_height = round($height * (1/$xscale));
				}

				// Resize the original image
				$imageResized = imagecreatetruecolor($new_width, $new_height);
				if ($imgType=="image/gif"){
					$imageTmp = imagecreatefromgif($originalImage);
					imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagegif($imageResized, $path);
					
				}
				
				else if($imgType =="image/png")
				{
					$imageTmp = imagecreatefrompng($originalImage);
					imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagegif( $imageResized,$path);
				}
				else if($imgType =="image/bmp")
				{
					$imageTmp = self::imagecreatefrombmp($originalImage);
					imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagegif( $imageResized,$path);
				}
				elseif($imgType =="image/x-png")
				{
					$imageTmp = imagecreatefrompng($originalImage);
					imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagepng($imageResized,$path);
				}
				else {
					//$imageTmp  = imagecreatefromjpeg(TEMP_PATH.$originalImage);
					$imageTmp  = imagecreatefromjpeg($originalImage);
					imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagejpeg($imageResized,$path);
				}

				return $imageResized;

	}
	
	
	 function imagecreatefrombmp($p_sFile)
    {
        //    Load the image into a string
        $file    =    fopen($p_sFile,"rb");
        $read    =    fread($file,10);
        while(!feof($file)&&($read<>""))
            $read    .=    fread($file,1024);
       
        $temp    =    unpack("H*",$read);
        $hex    =    $temp[1];
        $header    =    substr($hex,0,108);
       
        //    Process the header
        //    Structure: http://www.fastgraph.com/help/bmp_header_format.html
        if (substr($header,0,4)=="424d")
        {
            //    Cut it in parts of 2 bytes
            $header_parts    =    str_split($header,2);
           
            //    Get the width        4 bytes
            $width            =    hexdec($header_parts[19].$header_parts[18]);
           
            //    Get the height        4 bytes
            $height            =    hexdec($header_parts[23].$header_parts[22]);
           
            //    Unset the header params
            unset($header_parts);
        }
       
        //    Define starting X and Y
        $x                =    0;
        $y                =    1;
       
        //    Create newimage
        $image            =    imagecreatetruecolor($width,$height);
       
        //    Grab the body from the image
        $body            =    substr($hex,108);

        //    Calculate if padding at the end-line is needed
        //    Divided by two to keep overview.
        //    1 byte = 2 HEX-chars
        $body_size        =    (strlen($body)/2);
        $header_size    =    ($width*$height);

        //    Use end-line padding? Only when needed
        $usePadding        =    ($body_size>($header_size*3)+4);
       
        //    Using a for-loop with index-calculation instaid of str_split to avoid large memory consumption
        //    Calculate the next DWORD-position in the body
        for ($i=0;$i<$body_size;$i+=3)
        {
            //    Calculate line-ending and padding
            if ($x>=$width)
            {
                //    If padding needed, ignore image-padding
                //    Shift i to the ending of the current 32-bit-block
                if ($usePadding)
                    $i    +=    $width%4;
               
                //    Reset horizontal position
                $x    =    0;
               
                //    Raise the height-position (bottom-up)
                $y++;
               
                //    Reached the image-height? Break the for-loop
                if ($y>$height)
                    break;
            }
           
            //    Calculation of the RGB-pixel (defined as BGR in image-data)
            //    Define $i_pos as absolute position in the body
            $i_pos    =    $i*2;
            $r        =    hexdec($body[$i_pos+4].$body[$i_pos+5]);
            $g        =    hexdec($body[$i_pos+2].$body[$i_pos+3]);
            $b        =    hexdec($body[$i_pos].$body[$i_pos+1]);
           
            //    Calculate and draw the pixel
            $color    =    imagecolorallocate($image,$r,$g,$b);
            imagesetpixel($image,$x,$height-$y,$color);
           
            //    Raise the horizontal position
            $x++;
        }
       
        //    Unset the body / free the memory
        unset($body);
       
        //    Return image-object
        return $image;
    } 


	function redirectPath($pathToRedirect){
		header("Location: $pathToRedirect");
	}


	public static function generateRefCode($num) {

		$charsAlpha = "abcdefghijklmnopqrstuvwxyz";
		srand((double)microtime()*1000000);
		$i = 0;
		$passAlpha = '' ;

		while ($i < $num/4) {
			$num = rand() % 33;
			$tmp = substr($charsAlpha, $num, 1);
			$passAlpha = $passAlpha . $tmp;
			$i++;
		}

		$charsNum = "0123456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$passNum = '' ;

		while ($i < $num) {
			$num = rand() % 33;
			$tmp = substr($charsNum, $num, 1);
			$passNum = $passNum . $tmp;
			$i++;
		}
		$strReturn = $passAlpha."-".$passNum;
		return $strReturn;

	}  // create random string  ends

	/*
	 function getYears
	 @param $startingYear First option value to be displayed in select box
	 @param $totalOptions Total number of records to be shown
	 @param $order='ASC' order in which years should be displayed ASC or DESC
	 @param $selected any selected value
	 @return string representation of option value pair
	 */

	public static function getYears($startingYear="", $totalOptions="", $order='ASC', $selected=''){
		if($order == 'ASC'){
			$slot = 1;
		}else {
			$slot = -1;
		}
		$str = "";
		for($i=0; $i <= $totalOptions; $i++){
			$str .= "<option value='" . $startingYear . "'";
			if($selected == $startingYear){
				$str .= " selected='selected' ";
			}
			$str .=">" .$startingYear . "</option>";
			$startingYear += $slot;
		}
		return $str;

	}




	/*
	 function getMonths
	 @param $selected option value to be selected
	 @returns list of options values for select box for month drop down
	 */




	public static function getMonths($selected=''){
		$montharray = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$str = "";
		for($i=1; $i<=12; $i++){
			$str .= "<option value='".$i."' ";
			if($selected == $i){
				$str .=" selected ";
			}
			$str .=">". $montharray[$i-1] ."</option> ";
		}
		return $str;
	}


	/*
	 function getDays
	 @param $selected option value to be selected
	 @returns list of options values for select box for days drop down
	 */


	public static function getDays($selected=''){
		$str = "";
		$num = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')) ;  
		for($i=1; $i<=$num; $i++){
			if($i>9){
				$cur=$i;
			}else{
				$cur='0'.$i;
			}
			
			$str .= "<option value='".$cur."' ";
			if($selected == $cur){
				$str .=" selected='selected' ";
			}
			$str .=">". $cur ."</option> ";
		}
		return $str;
	}

	public static function getStateNameFromId($sid){
		$resSettings ='';
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = DatabaseManager::getInstance();
		$stQuery = "SELECT name FROM province where countryId= '".$sid."' ";
		$resSettings = $dbConnect->executeQuery($stQuery);
		if(count($resSettings)>0)
			return $resSettings[0]['name'];
		else 
			return '';
	}

	public static function getCityNameFromId($cId){
		$resSettings ='';
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = DatabaseManager::getInstance();
		$stQuery = "SELECT city FROM valley_cities where id= '".$cId."' ";
		$resSettings = $dbConnect->executeQuery($stQuery);
		if(count($resSettings)>0)
			return $resSettings[0]['city'];
		else 
			return '';
	}
	
	public static function getProvinceNameFromId($pId){
		$resSettings ='';
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = DatabaseManager::getInstance();
		$stQuery = "SELECT name FROM province where provinceId= '".$pId."' ";
		$resSettings = $dbConnect->executeQuery($stQuery);
		if(count($resSettings)>0)
			return $resSettings[0]['name'];
		else 
			return '';
	}
	 
	/* date functions */
	public function dateFormat($date){
		$getDate = date('m-d-Y',strtotime($date));
		return $getDate;
	}

	public function dateLongFormat($date){
		$getDate = date('m-d-y H:i',strtotime($date));
		return $getDate;
	}


	
	function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
		/*
		 $interval can be:
		 yyyy - Number of full years
		 q - Number of full quarters
		 m - Number of full months
		 y - Difference between day numbers
		 (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
		 d - Number of full days
		 w - Number of full weekdays
		 ww - Number of full weeks
		 h - Number of full hours
		 n - Number of full minutes
		 s - Number of full seconds (default)
		 */
		if (!$using_timestamps) {
			$datefrom = strtotime($datefrom, 0);
			$dateto = strtotime($dateto, 0);
		}
		$difference = $dateto - $datefrom; // Difference in seconds

		switch($interval) {

			case 'yyyy': // Number of full years

				$years_difference = floor($difference / 31536000);
				if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
					$years_difference--;
				}
				if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
					$years_difference++;
				}
				//$years_difference++;
				$datediff = $years_difference;
				break;

			case "q": // Number of full quarters

				$quarters_difference = floor($difference / 8035200);
				while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
					$months_difference++;
				}
				$quarters_difference--;
				$datediff = $quarters_difference;
				break;

			case "m": // Number of full months

				$months_difference = floor($difference / 2678400);
				while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
					$months_difference++;
				}
				$months_difference--;
				$datediff = $months_difference;
				break;

			case 'y': // Difference between day numbers

				$datediff = date("z", $dateto) - date("z", $datefrom);
				break;

			case "d": // Number of full days

				$datediff = floor($difference / 86400);
				break;

			case "w": // Number of full weekdays

				$days_difference = floor($difference / 86400);
				$weeks_difference = floor($days_difference / 7); // Complete weeks
				$first_day = date("w", $datefrom);
				$days_remainder = floor($days_difference % 7);
				$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
				if ($odd_days > 7) { // Sunday
					$days_remainder--;
				}
				if ($odd_days > 6) { // Saturday
					$days_remainder--;
				}
				$datediff = ($weeks_difference * 5) + $days_remainder;
				break;

			case "ww": // Number of full weeks

				$datediff = floor($difference / 604800);
				break;

			case "h": // Number of full hours

				$datediff = floor($difference / 3600);
				break;

			case "n": // Number of full minutes

				$datediff = floor($difference / 60);
				break;

			default: // Number of full seconds (default)

				$datediff = $difference;
				break;
		}

		return $datediff;

	}
	/* date functions */


	function getUploadFileExtension($filename)
	{
		$pos = strrpos($filename,".");
		$ext = substr($filename,$pos+1);
		return $ext;
	}
	
    function random_string()
    {
		  $character_set_array = array( );
		  $character_set_array[ ] = array( 'count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz' );
		  $character_set_array[ ] = array( 'count' => 1, 'characters' => '0123456789' );
		  $temp_array = array( );
		  foreach ( $character_set_array as $character_set )
		  {
			for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
			{
			 $temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
			}
		  }
		  shuffle( $temp_array );
		  return implode( '', $temp_array );
      
	 }
	
function GetAge($Birthdate)

{

        // Explode the date into meaningful variables

        list($BirthDay,$BirthMonth,$BirthYear) = explode("-", $Birthdate);

        // Find the differences

        $YearDiff = date("Y") - $BirthYear;

        $MonthDiff = date("m") - $BirthMonth;

        $DayDiff = date("d") - $BirthDay;

        // If the birthday has not occured this year

        if ($DayDiff < 0 || $MonthDiff < 0)

          $YearDiff--;

        return $YearDiff;

}



function file_extensionsum($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

	
	function getUserPic($uid,$wid = '130', $height = '60',$class='profile_pic', $thumb="_thumb."){
	require_once(COMM_PATH."DatabaseManager.php");
	$dbConnect = new DatabaseManager();
	
	$user_detail = $this->getUserDetail($uid);
	 $sql="SELECT * FROM user_photos WHERE userid='".$uid."' and profile_pic='1'";
	$result= $dbConnect->executeQuery($sql);



	if(count($result)>0){

    $ext=$this->file_extensionsum($result[0]['photo_name']);
	$userPic=$result[0]['photo_id'].$thumb.$ext;

	if(file_exists(USER_IMG_PATH.$userPic)){
	
	
	$src = "<img src=".USER_IMG_HTTP_PATH.$userPic." width=".$wid." height=".$height." class=profile_pic>";
	} else{
	$src="<img src=".IMG_PATH."profile_pic.jpg width=".$wid." height=".$height." class=profile_pic>";
	}
	} else{
		
	$src="<img src=".IMG_PATH."profile_pic.jpg width=".$wid." height=".$height." class=profile_pic>";
	} 
	//echo $src;
	return $src;
	}

	function makeRosterEntry($user1Row,$user2Row){
	$db= DatabaseManager::getInstance();
	
	$userName1 = $user1Row["id"];
	$userName1Jid = $userName1."@".CHAT_SERVER_DOMAIN;
	$nick1 = $user1Row["first_name"] . " ". $user1Row["last_name"];	
	
	$userName2 = $user2Row["id"];
	$userName2Jid = $userName2."@".CHAT_SERVER_DOMAIN;
	$nick2 = $user2Row["first_name"] . " ". $user2Row["last_name"];
	
	//chaeck if userName1 record exists in ofRoster table
	$con1 = "username = '$userName1' and jid = '$userName2Jid'";
	$isExistsRs = $db->getList("ofRoster",$con1);

	if($isExistsRs === false){
		$GLOBALS ["logger"]->LogError ( __FILE__ . " " . __LINE__ . " Error:::" . $db->last_error . " Query is" . $db->last_query );
		return;
	}
	$isExistsRow = $db->get_row($isExistsRs);
	if(empty($isExistsRow)){
		$nextId = $db->getNextId("ofRoster","rosterID");
		if($nextId === false){
			$GLOBALS ["logger"]->LogError ( __FILE__ . " " . __LINE__ . " Error:::" . $db->last_error . " Query is" . $db->last_query );
			return;
		}
		
		$data = array();
		$data["rosterID"] = $nextId;
		$data["username"] = $userName1;
		$data["jid"] = $userName2Jid;
		$data["sub"] = 3;
		$data["ask"] = -1;
		$data["recv"] = -1;
		$data["nick"] = $nick2;
		$insert =  $db->insert_array("ofRoster",$data);
		if($insert === false){
			$GLOBALS ["logger"]->LogError ( __FILE__ . " " . __LINE__ . " Error:::" . $db->last_error . " Query is" . $db->last_query );
			return;
		}
		
		
	}else if($isExistsRow["sub"] != 3 || $isExistsRow["ask"] != -1 || $isExistsRow["recv"] != -1){
		$data = array();
		$data["sub"] = 3;
		$data["ask"] = -1;
		$data["recv"] = -1;
		$con = "rosterID = ".$isExistsRow["rosterID"];
		$update =  $db->update_array("ofRoster",$data,$con);
		if($update === false){
			$GLOBALS ["logger"]->LogError ( __FILE__ . " " . __LINE__ . " Error:::" . $db->last_error . " Query is" . $db->last_query );
			return;
		}
	}
}

// Added By Anjali
	

	function loginMe($arr)
	{
		require_once(COMM_PATH."DatabaseManager.php");
		$dbConnect = new DatabaseManager();
		$sql='select * from users where username="'.$arr['uname'].'" and password="'.$arr['pword'].'"';
		$result = $dbConnect->executequery($sql);
		return $result;
	}
	

function getUserDetail($user_id) 
	 {
	 	  require_once(COMM_PATH."DatabaseManager.php");
		  $dbConnect = new DatabaseManager();
		  $sql="SELECT * FROM users WHERE user_id='".$user_id."'";
		  $resList = $dbConnect->executeQuery($sql);	
		  return $resList; 
	 }



	/* Function to get top navigation property specific
	* @param $itemID int unique id of property
	* @param $selected string name of the link selected
	*/
	
	
	
	function explodeX($delimiters,$string)
	{
		$return_array = array($string); // The array to return
	   
	
		$d_count = 0;
		while (isset($delimiters[$d_count])) // Loop to loop through all delimiters
		{
			$new_return_array = array();
			foreach($return_array as $el_to_split) // Explode all returned elements by the next delimiter
			{
				$put_in_new_return_array = explode($delimiters[$d_count],$el_to_split);
				foreach($put_in_new_return_array as $substr) // Put all the exploded elements in array to return
				{
				   $new_return_array[] = $substr;
				}
			}
			$return_array = $new_return_array; // Replace the previous return array by the next version
			$d_count++;
		}
		return $return_array; // Return the exploded elements
	}
	
	function getPaging($currentpage = 1, $totalpages = 1, $link = "", $appendStr = "",$arr){
		
		$prev_page=$currentpage-1;
		$next_page=$currentpage+1;
		
		if( $prev_page > 0){
		$back_one="<span class=\"spanBox\"><a href='".$link."?newPage=".$prev_page."'>&lt;&nbsp;Previous</a></span>";
		}
		else{
		$back_one="";}
		
		if($currentpage < $totalpages){
		$next_one="<span class=\"spanBox\"><a href='".$link."?newPage=".$next_page."'>Next&nbsp;&gt;</a></span>";
		}
		else{
		$next_one="";}
		
		$page=isset($_GET['page']) ? $_GET['page']:0;
		$start=10*$page+1;
		if(isset($_GET['start']) && $_GET['start']!=''){
		$start=$_GET['start'];
		}
		$end=$start+10;
		$prv=$start-10;
		if($end>$totalpages){
		 $end=10-($end-$totalpages);
		 $prv=$totalpages-$end;
		 $end=$start+$end;
		}
		$prvpage=$page-1;
		$nxtpage=$page+1;
		if( $prev_page >= 10)
		$back_text="<span class=\"spanBox\"><a href='".$link."?newPage=".$prv."&page=".$prvpage."'>&lt;&lt;&nbsp;Previous</a></span>";
		else
		$back_text="";
		
		if($totalpages>10 && $end<=$totalpages)
		$next_text="<span class=\"spanBox\"><a href='".$link."?newPage=".$end."&page=".$nxtpage."'>Next&nbsp;&gt;&gt;</a></span>";
		else
		$next_text="";
		
		echo $back_text."&nbsp;&nbsp;";
		echo $back_one."&nbsp;&nbsp;";
		for ($x = $start ; $x <= $end ; $x++){
				if ($x == $currentpage)
	 			print "<span class=\"spanBoxCurrent\">".$x."</span>";
				else
	 			print "<span class=\"spanBox\"><a href='".$link."?newPage=".$x."&start=".$start."&end=".$end."'>".$x."</a></span>";
		}
		echo $next_one."&nbsp;&nbsp;";
		echo $next_text;	
	}
	
	 public function getSEOName($string){
	//$seoName = str_replace(" ","-",addslashes(str_replace(",","",str_replace("&","and",str_replace("/","-",trim($nameToConvert))))));
	//$seoName = ucwords(str_replace("Ã","",str_replace(",","",str_replace("'","",str_replace(".","",str_replace(")","",str_replace("(","",str_replace(" ","-",addslashes(str_replace(",","",str_replace("&","and",str_replace("/","-",trim($nameToConvert)))))))))))));

	//return $seoName; 
	// Replace other special chars
	$specialCharacters = array(
	'#' => '',
	'$' => '',
	'%' => '',
	'&' => '',
	'@' => '',
	'.' => '',
	'?' => '',
	'+' => '',
	'=' => '',
	'?' => '',
	'\\' => '',	
	'/' => '',
	'|' => '',	
	' ' => ''	
	);

	while (list($character, $replacement) = each($specialCharacters)) {
		$string = str_replace($character, '-' . $replacement . '-', $string);
	}
	$string = strtr($string,
	"??????? ??????????????????????????????????????????????",
	"AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn"
	);
	// Remove all remaining other unknown characters
	$string = preg_replace('/[^a-zA-Z0-9\-]/', '', $string);
	$string = preg_replace('/^[\-]+/', '', $string);
	$string = preg_replace('/[\-]+$/', '', $string);
	$string = preg_replace('/[\-]{2,}/', '-', $string);
	return $string;	
}


/*******************************************************************************************/
function getBedOptions($selected='',$arr)
{
	$optionsArray = array("king"=>"king","queen"=>"queen","twin"=>"twin","child bed"=>"child bed","double bed"=>"double bed","bunk bed"=>"bunk bed");
?>
	
<?php

$i=0;$desc=3;
 foreach($optionsArray as $key=>$value){
   
 echo "<div class='email_address_cont_s' style='margin-top:20px;' >
      
      <div class='clr'></div>
     <input name='check_".$key."_bed' type='checkbox' value='' style='float:left;'>
     <h3>".ucfirst($value)."</h3>
        <select name='number_".$key."_bed' id='' style='float:right'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
echo "<div class='clr'></div>
           <h3>Detail on this feature optional</h3>
           <div class='clr'></div> 
    <div class='uniue_email_s'>";
	    
          
	echo "<textarea name='desc_".$key."_bed'  class='txtarea' id='desc_".$key."_bed' style='margin-right:10px;'  placeholder='Comments'>";
		if(isset($arr[$desc])){echo $arr[$desc];}
         echo" </textarea>		   
     
    </div>
    
    <div class='clr'></div>
         
      </div>";
$desc=$desc+2;
}
}

/************************************************************/
} // end class
?>
