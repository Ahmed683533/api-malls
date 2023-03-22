<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
   public function apiResponse($data= null,$message = null,$status = null){

    // دي الفنكشن اللي بتعرضلي الداتا والرسالة والحالة
       $array = [
           'data'=>$data,
           'message'=>$message,
           'status'=>$status,
       ];

       return response($array,$status);

   }
}
