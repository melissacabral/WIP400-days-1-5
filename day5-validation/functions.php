<?php
//Output any array as an unordered list
function mmc_array_list($array){
	//if the array exists, display it
	if(is_array($array)){
		echo '<ul>';
		//output one list item per thing in the array
		foreach( $array as $item ){
			echo '<li>' . $item . '</li>';
		}
		echo '</ul>';
	}
}

//Display one inline error message (use this next to a field)
function mmc_inline_error($array, $item){
	//check to make sure the item exists in the array
	if( isset( $array[$item] ) ){
		echo '<div class="inline-error">' . $array[$item] . '</div>';
	}
}

//no close PHP