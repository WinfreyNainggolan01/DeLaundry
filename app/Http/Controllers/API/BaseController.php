<?php

namespace App\Http\Controllers\API; 
use Illuminate\Http\JsonResponse; 
use App\Http\Controllers\Controller as Controller; 

class BaseController extends Controller 
{ 
    public function sendResponse($result, $message): JsonResponse 
    { 
        $response = [ 
            'success' => true, 
            'data'    => $result, 
            'message' => $message, 
        ]; 

        return response()->json($response, 200); 
    } 

    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse 
    { 
        $response = [ 
            'success' => false, 
            'message' => $error, 
        ]; 

        if(!empty($errorMessages)){ 
            $response['data'] = $errorMessages; 
        } 

        return response()->json($response, $code); 
    } 
} 