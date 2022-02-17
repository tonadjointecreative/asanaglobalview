<?php
// ************************************ //
// Enter your Personal Acces Token 		//
// below and rename file to config.php 	//
// ************************************ //
$api_key = "1/1201273163549854:f39bcd3181686f4d881630d3930a1d01";



// Safety feature so people cannot access this page and steal your API key
if(!defined('SAFEASANA')){
	echo 'what are you doing here?';
	exit(1);
}


// For some strange reason the Asana API Workspace ID is not the same
// as the URL to a workspace, so to make URLs to workspaces work, 
// you must configure them here.

function idToURL($input){
	$output = "";
	// Repeat if you have multiple workspaces...
	// Ehmm, probably you do. Why else are you using this code?
	// Example of 2 workspaces
	if($input == "163731604691667") // workspace ID from API

		// Workspace URL number.
		// You can view this if you go to 'my tasks' in a
		// workspace and copy the numbered part of the url.
		$output = "1201462105871316"; 

	if($input == "1194435664836328") // workspace ID
		$output = "1201359788941650"; // workspace URL number

	return $output;
}

?>