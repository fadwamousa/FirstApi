<?php 


function apiResponse($status,$message,$data=null){

	$responses = [ 
		'status'  => $status,
        'message' => $message,
        'data'    => $data];

    return response()->json($responses);    

} 