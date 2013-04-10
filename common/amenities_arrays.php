<?php
class amenities_array   
{
	
	function amenities($get_aminities=array(),$onlyArr=false)
	{
		
		$amenities_arry=array("air-conditioning"=>"Air Conditioning","Washing-Machine"=>"Washing Machine","Clothes-Dryer"=>"Clothes Dryer","Linens-provided"=>"Linens provided","Garag"=>"Garag","Covered-Parking"=>"Covered Parking","parking-off-street"=>"parking off street","parking-for-RV/boat/trailer"=>"parking for RV/boat/trailer","gas-fireplace"=>"gas fireplace","wood-fireplace"=>"wood fireplace","woodstove"=>"woodstove","elevator"=>"elevator","hot-tub"=>"hot tub","shared-hot-tub"=>"shared hot tub","private-pool"=>"private pool","communal-pool"=>"communal pool","sauna"=>"sauna","fireplace"=>"fireplace");
		if($onlyArr){ return $amenities_arry;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
	
 foreach($amenities_arry as $key=>$value){

 
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='aminity_".$key."_check' name='aminitycheck_".$key."' onclick=enablebeds('aminity_".$key."_quantity','aminity_".$key."_desc',this.checked); >
					
					
					
					<label for='' class='labelclass' >$key</label>
					  <select name='aminitydrop_".$key."' id='aminity_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='aminity_".$key."_desc' name='aminitydesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}

/********************************************************************************************************/
function beds($get_aminities=array(),$onlyArr=false)
	{
			$beds_array=array("king"=>"king","queen"=>"queen","double"=>"double","twin/single"=>"twin/single","bunk-bed"=>"bunk bed",
		"child-bed"=>"child bed","sleep-sofa/futon"=>"sleep sofa/futon","murphy-bed"=>"murphy bed","baby-crib"=>"baby crib");
		if($onlyArr){ return $beds_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
		
		if(count($get_aminities)>0)
	$arrdesc=explode(',',$get_aminities);		
 foreach($beds_array as $key=>$value){ 
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='bed_".$key."_check' onclick=enablebeds('bed_".$key."_quantity','bed_".$key."_desc',this.checked); name='bedcheck_".$key."'><label for='' class='labelclass'>$key</label>
					  <select name='beddrop_".$key."' id='bed_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='bed_".$key."_desc' name='beddesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}
/********************************************************************************************************/
function entertainment($get_aminities=array(),$onlyArr=false)
	{
		$entertainment_array=array("satellite-or-cable"=>"satellite or cable","TV"=>"TV","video-library"=>"video library",
		"videogame-console"=>"videogame console","videogames"=>"videogames","music-library"=>"music library","jetted-tub"=>"jetted tub","DVD"=>"DVD","VCR"=>"VCR",
		"CD"=>"CD","stereo-system"=>"stereo system","football"=>"football","air-hockey"=>"air hockey","pool-table"=>"pool table","ping-pong-table"=>"ping pong table");
			
			if($onlyArr){ return $entertainment_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
		//$arrdesc=explode(',',$get_aminities);
		//print_r($arrdesc);	
		/*for($i=0;$i<count($arrdesc);$i++)
		{
		 echo $a=$arrdesc[$i];
		}*/
		
 foreach($entertainment_array as $key=>$value){
 
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='entertainment_".$key."_check' name='entertainmentcheck_".$key."' onclick=enablebeds('entertainment_".$key."_quantity','entertainment_".$key."_desc',this.checked); ><label for='' class='labelclass'>$key</label>
					  <select name='entertainmentdrop_".$key."' id='entertainment_".$key."_quantity' style='float:right' disabled='disabled'>";
					 
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='entertainment_".$key."_desc' name='entertainmentdesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}
/********************************************************************************************************/
function kitchen($get_aminities=array(),$onlyArr=false)
	{
		$kitchen_array=array("full-kitchen"=>"full kitchen","shared-kitchen"=>"shared kitchen","cooking-utensils"=>"cooking utensils","refrigerator"=>"refrigerator","dish-washer"=>"dish washer","microwave"=>"microwave","catering-available"=>"catering available","ice-maker"=>"ice maker");
		
		if($onlyArr){ return $kitchen_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
	//	$arrdesc=explode(',',$get_aminities);	
		
 foreach($kitchen_array as $key=>$value){
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='kitchen_".$key."_check' name='kitchencheck_".$key."' onclick=enablebeds('kitchen_".$key."_quantity','kitchen_".$key."_desc',this.checked); ><label for='' class='labelclass'>$key</label>
					  <select name='kitchendrop_".$key."' id='kitchen_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='kitchen_".$key."_desc' name='kitchendesc_".$key."' disabled='disabled'></textarea>
					</div>";
					
					
 
 }
}

//$sef=$this->kitchen(true);
//$dgh=$this->kitchen(false);
/********************************************************************************************************/
function outdoor_feature($get_aminities=array(),$onlyArr=false)
	{
		$outdoorfeatures_array=array("gas/electric-BBQ-grill"=>"gas/electric BBQ grill","outdoor-grill-charcoal"=>"outdoor grill charcoal",
		"deck/patio"=>"deck/patio","balcony"=>"balcony","lanai"=>"lanai","gazebo"=>"gazebo");
		//$arrdesc=explode(',',$get_aminities);	
		if($onlyArr){ return $outdoorfeatures_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
		
 foreach($outdoorfeatures_array as $key=>$value){
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='outdoorfeature_".$key."_check' name='outdoorfeaturecheck_".$key."' onclick=enablebeds('outdoorfeature_".$key."_quantity','outdoorfeature_".$key."_desc',this.checked);><label for='' class='labelclass'>$key</label>
					  <select name='outdoorfeaturedrop_".$key."' id='outdoorfeature_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='outdoorfeature_".$key."_desc' name='outdoorfeaturedesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}
/********************************************************************************************************/
function communications($get_aminities=array(),$onlyArr=false)
	{
		$communications_array=array("telephone"=>"telephone","free-long-distance"=>"free long distance","cell-phone"=>"cell phone",
		"computer-available"=>"computer available","dialup-access"=>"dialup access","broadband-access"=>"broadband access",
		"wireless-broadband"=>"wireless broadband");
		//$arrdesc=explode(',',$get_aminities);	
		if($onlyArr){ return $communications_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
 foreach($communications_array as $key=>$value){
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='communications_".$key."_check' name='communicationscheck_".$key."' onclick=enablebeds('communications_".$key."_quantity','communications_".$key."_desc',this.checked);><label for='' class='labelclass'>$key</label>
					  <select name='communicationsdrop_".$key."' id='communications_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='communications_".$key."_desc' name='communicationsdesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}

/********************************************************************************************************/
function suitability($get_aminities=array(),$onlyArr=false)
	{
		$suitability_array=array("pets-considered"=>"pets considered","pets-not-allowed"=>"pets not allowed","handicapped-accessible(may-have-limitations)"=>"handicapped accessible(may have limitations)","wheelchair-accessible"=>"wheelchair accessible","senior-adults-only-community"=>"senior adults only community","children-welcome"=>"children welcome","children-not-allowed"=>"children not allowed","minimum-age-limits-for-renters"=>"minimum age limits for renters","smoking-allowed"=>"smoking allowed","non-smoking-only"=>"non smoking only","alternative-lifestyle"=>"alternative lifestyle");
		if($onlyArr){ return $suitability_array;}
	
//$arrdesc=explode(',',$get_aminities);	
//print_r($arrdesc);
 $j=0;
		//$arrdesc=explode(',',$get_aminities);	
 foreach($suitability_array as $key=>$value){
 echo "<div class='checkBoxFieldsAdvanced'>
						
					<input type='checkbox' value='".$key."' id='suitability_".$key."_check' name='suitabilitycheck_".$key."' onclick=enablebeds('suitability_".$key."_quantity','suitability_".$key."_desc',this.checked);><label for='' class='labelclass'>$key</label>
					  <select name='suitabilitydrop_".$key."' id='suitability_".$key."_quantity' style='float:right' disabled='disabled'>";
		for($i=1;$i<=10;$i++){
echo "<option value=".$i.">".$i."</option>";
}
echo "</select> ";
						echo "<div class=''>Details on this feature - optional</div>
						<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='suitability_".$key."_desc' name='suitabilitydesc_".$key."' disabled='disabled'>";
									
						echo "</textarea>
					</div>";
 $j++;
 }
}

////////////////////////update//////////////////////////////////////////////////

function amenitiesupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>";print_r($arr2);
		
		$amenities_arry=array("air-conditioning"=>"air-conditioning","Washing-Machine"=>"Washing Machine","Clothes-Dryer"=>"Clothes Dryer","Linens-provided"=>"Linens provided","Garag"=>"Garag","Covered-Parking"=>"Covered Parking","parking-off-street"=>"parking off street","parking-for-RV/boat/trailer"=>"parking for RV/boat/trailer","gas-fireplace"=>"gas fireplace","wood-fireplace"=>"wood fireplace","woodstove"=>"woodstove","elevator"=>"elevator","hot-tub"=>"hot tub","shared-hot-tub"=>"shared hot tub","private-pool"=>"private pool","communal-pool"=>"communal pool","sauna"=>"sauna","fireplace"=>"fireplace");
		
        if($onlyArr){ return $amenities_arry;}
				
    $j=0;
 foreach($amenities_arry as $key=>$value){
	 
   if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }

   
 echo "<div class='checkBoxFieldsAdvanced'>
<input type='checkbox' value='".$key."' id='aminity_".$key."_check' name='aminitycheck_".$key."' onclick=enablebeds('aminity_".$key."_quantity','aminity_".$key."_desc',this.checked); $chk  >
<label for='' class='labelclass' >$key</label>";

       if($arr[$j]!=''){					
		  echo "<select name='aminitydrop_".$key."' id='aminity_".$key."_quantity' style='float:right' >";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='aminitydrop_".$key."' id='aminity_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
			
			
	echo "<div class=''>Details on this feature - optional</div>";
	       if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='aminity_".$key."_desc' name='aminitydesc_".$key."' >". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='aminity_".$key."_desc' name='aminitydesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }
		  
 $j++;
 }
}
/********************************************************************************************************/
function bedsupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr2);
		
	$beds_array=array("king"=>"king","queen"=>"queen","double"=>"double","twin/single"=>"twin/single","bunk-bed"=>"bunk bed","child-bed"=>"child bed","sleep-sofa/futon"=>"sleep sofa/futon","murphy-bed"=>"murphy bed","baby-crib"=>"baby crib");
		if($onlyArr){ return $beds_array;}

 $j=0;
 foreach($beds_array as $key=>$value){ 
     if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }
      
 echo "<div class='checkBoxFieldsAdvanced'>
		<input type='checkbox' value='".$key."' id='bed_".$key."_check' onclick=enablebeds('bed_".$key."_quantity','bed_".$key."_desc',this.checked); name='bedcheck_".$key."' $chk >
		<label for='' class='labelclass'>$key</label>";
		
		if($arr[$j]!=''){					
		  echo "<select name='beddrop_".$key."' id='bed_".$key."_quantity' style='float:right' >";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='beddrop_".$key."' id='bed_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
			
			
	echo "<div class=''>Details on this feature - optional</div>";
 	      if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='bed_".$key."_desc' name='beddesc_".$key."'>". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='bed_".$key."_desc' name='beddesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }

 $j++;
 }
}
/********************************************************************************************************/
function entertainmentupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr2);
		
   $entertainment_array=array("satellite-or-cable"=>"satellite or cable","TV"=>"TV","video-library"=>"video library",
		"videogame-console"=>"videogame console","videogames"=>"videogames","music-library"=>"music library","jetted-tub"=>"jetted tub","DVD"=>"DVD","VCR"=>"VCR","CD"=>"CD","stereo-system"=>"stereo system","football"=>"football","air-hockey"=>"air hockey","pool-table"=>"pool table","ping-pong-table"=>"ping pong table");
			
		if($onlyArr){ return $entertainment_array;}

 $j=0;
 foreach($entertainment_array as $key=>$value){
	   if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }
	 
   echo "<div class='checkBoxFieldsAdvanced'>
		 <input type='checkbox' value='".$key."' id='entertainment_".$key."_check' name='entertainmentcheck_".$key."' onclick=enablebeds('entertainment_".$key."_quantity','entertainment_".$key."_desc',this.checked); $chk >
		 <label for='' class='labelclass'>$key</label>";
		 
		 
		 if($arr[$j]!=''){					
		  echo "<select name='entertainmentdrop_".$key."' id='entertainment_".$key."_quantity' style='float:right' >";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='entertainmentdrop_".$key."' id='entertainment_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
			
		 
	echo "<div class=''>Details on this feature - optional</div>";
	   
	     if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='entertainment_".$key."_desc' name='entertainmentdesc_".$key."'>". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='entertainment_".$key."_desc' name='entertainmentdesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }

 $j++;
 }
}
/********************************************************************************************************/
function kitchenupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr);
		
  $kitchen_array=array("full-kitchen"=>"full kitchen","shared-kitchen"=>"shared kitchen","cooking-utensils"=>"cooking utensils","refrigerator"=>"refrigerator","dish-washer"=>"dish washer","microwave"=>"microwave","catering-available"=>"catering available","ice-maker"=>"ice maker");
	   if($onlyArr){ return $kitchen_array;}

 $j=0;
 foreach($kitchen_array as $key=>$value){
	    if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }
	 
 echo "<div class='checkBoxFieldsAdvanced'>
	   <input type='checkbox' value='".$key."' id='kitchen_".$key."_check' name='kitchencheck_".$key."' onclick=enablebeds('kitchen_".$key."_quantity','kitchen_".$key."_desc',this.checked); >
	   <label for='' class='labelclass'>$key</label>";
	   
	   if($arr[$j]!=''){					
		  echo "<select name='kitchendrop_".$key."' id='kitchen_".$key."_quantity' style='float:right'>";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='kitchendrop_".$key."' id='kitchen_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }

	echo "<div class=''>Details on this feature - optional</div>";
	
	       if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='kitchen_".$key."_desc' name='kitchendesc_".$key."' >". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='kitchen_".$key."_desc' name='kitchendesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }
				  
$j++;
 
 }
}

/********************************************************************************************************/
function outdoor_featureupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr);
		
  $outdoorfeatures_array=array("gas/electric-BBQ-grill"=>"gas/electric BBQ grill","outdoor-grill-charcoal"=>"outdoor grill charcoal","deck/patio"=>"deck/patio","balcony"=>"balcony","lanai"=>"lanai","gazebo"=>"gazebo");
		if($onlyArr){ return $outdoorfeatures_array;}
	
 $j=0;
 foreach($outdoorfeatures_array as $key=>$value){
		  if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }

  echo "<div class='checkBoxFieldsAdvanced'>
		<input type='checkbox' value='".$key."' id='outdoorfeature_".$key."_check' name='outdoorfeaturecheck_".$key."' onclick=enablebeds('outdoorfeature_".$key."_quantity','outdoorfeature_".$key."_desc',this.checked); $chk >
		<label for='' class='labelclass'>$key</label>";
		
		
		if($arr[$j]!=''){					
		  echo "<select name='outdoorfeaturedrop_".$key."' id='outdoorfeature_".$key."_quantity' style='float:right'>";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='outdoorfeaturedrop_".$key."' id='outdoorfeature_".$key."_quantity' style='float:right' disabled='disabled' >";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
			
		
   echo "<div class=''>Details on this feature - optional</div>";
                
				 if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='outdoorfeature_".$key."_desc' name='outdoorfeaturedesc_".$key."'>". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='outdoorfeature_".$key."_desc' name='outdoorfeaturedesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }
   
   $j++;
 }
}
/********************************************************************************************************/
function communicationsupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr);
		
  $communications_array=array("telephone"=>"telephone","free-long-distance"=>"free long distance","cell-phone"=>"cell phone","computer-available"=>"computer available","dialup-access"=>"dialup access","broadband-access"=>"broadband access","wireless-broadband"=>"wireless broadband");
		if($onlyArr){ return $communications_array;}
	
 $j=0;
 foreach($communications_array as $key=>$value){
	   if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }
	     
 echo "<div class='checkBoxFieldsAdvanced'>
			<input type='checkbox' value='".$key."' id='communications_".$key."_check' name='communicationscheck_".$key."' onclick=enablebeds('communications_".$key."_quantity','communications_".$key."_desc',this.checked); $chk >
			<label for='' class='labelclass'>$key</label>";
			
			
			if($arr[$j]!=''){					
		  echo "<select name='communicationsdrop_".$key."' id='communications_".$key."_quantity' style='float:right'>";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='communicationsdrop_".$key."' id='communications_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
			
  echo "<div class=''>Details on this feature - optional</div>";
  
                     if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='communications_".$key."_desc' name='communicationsdesc_".$key."'>". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='communications_".$key."_desc' name='communicationsdesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }
						
 $j++;
 }
}

/********************************************************************************************************/
function suitabilityupd($get_aminities,$get_description,$get_quan,$onlyArr=false)
	{
		$arr=explode(',',$get_aminities);
		$arr1=explode(',',$get_description);
		$arr2=explode(',',$get_quan);
		//echo "<pre>"; print_r($arr);
	$suitability_array=array("pets-considered"=>"pets considered","pets-not-allowed"=>"pets not allowed","handicapped-accessible(may-have-limitations)"=>"handicapped accessible(may have limitations)","wheelchair-accessible"=>"wheelchair accessible","senior-adults-only-community"=>"senior adults only community","children-welcome"=>"children welcome","children-not-allowed"=>"children not allowed","minimum-age-limits-for-renters"=>"minimum age limits for renters","smoking-allowed"=>"smoking allowed","non-smoking-only"=>"non smoking only","alternative-lifestyle"=>"alternative lifestyle");
		if($onlyArr){ return $suitability_array;}
	

 $j=0;
 foreach($suitability_array as $key=>$value){
	    if($arr[$j]==$key && $arr[$j]!='') { $chk="checked"; } else { $chk=''; }
	 
 echo "<div class='checkBoxFieldsAdvanced'>
		   <input type='checkbox' value='".$key."' id='suitability_".$key."_check' name='suitabilitycheck_".$key."' onclick=enablebeds('suitability_".$key."_quantity','suitability_".$key."_desc',this.checked); $chk >
		   <label for='' class='labelclass'>$key</label>";
		   
		   if($arr[$j]!=''){					
		  echo "<select name='suitabilitydrop_".$key."' id='suitability_".$key."_quantity' style='float:right'>";
		  for($i=1;$i<=10;$i++){ if($arr2[$j]==$i){ echo "<option value=".$i." selected >".$i."</option>"; }
		                         else { echo "<option value=".$i."  >".$i."</option>"; } } echo "</select> "; 
		    } 
       else { 
	       echo "<select name='suitabilitydrop_".$key."' id='suitability_".$key."_quantity' style='float:right' disabled='disabled'>";
		   for($i=1;$i<=10;$i++){ echo "<option value=".$i."  >".$i."</option>";} echo "</select> ";
            }
		   
	 echo "<div class=''>Details on this feature - optional</div>";
	 
	       if($arr[$j]!=''){
	                 echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='suitability_".$key."_desc' name='suitabilitydesc_".$key."' >". $arr1[$j]." </textarea></div>";
		   } else {
			         echo "<textarea style='width: 318px; height: 66px;' columns='20' rows='2' id='suitability_".$key."_desc' name='suitabilitydesc_".$key."' disabled='disabled'>  </textarea></div>";
			      }
						
 $j++;
 }
}

}


?>
