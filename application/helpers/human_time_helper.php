<?php defined("BASEPATH") or die("No direct script is needed to be called");

function current_selected_time($sent_time){
	$days = floor($sent_time/(60*60*24)) ; 
	$sent_time -= $days * 60 * 60 * 24 ;
	
	$hours = floor($sent_time/(60*60)) ; 
	$sent_time -= $hours * 60 * 60 ;
	
	$minutes = floor($sent_time/(60)) ; 
	$sent_time -= $minutes * 60   ;
	
	$seconds = floor($sent_time) ; 
	
	return "The current Delay Time Before Payment is Set to {$days} Days, {$hours} Hours, {$minutes} Minutes   !!! " ;
}