<?php


namespace App\Http;


class JSONHelper
{
    public static function response($data,$status=200,$wrap=true)
    {
        if ($wrap){
            $data = ['data'=>$data];
        }
        return response()->json($data,$status);
    }
}