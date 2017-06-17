<?php

function getTrue(){
    return true;
}

function getFalse(){
    return false;
}

function apiReturn($data , $status = '' , $error = ''){
    $s = $status == ''  ? getTrue() : getFalse();
    return json_encode(['status' => $s ,'data' => $data , 'error' => $error] , JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
}

function checkApiHaveImage($request){
    $array = [];
    foreach($request as $key => $r){
        if(in_array($key , getFileFieldsName())){
            $array[$key] = convertToImage($r);
        }else{
            $array[$key] = $r;
        }
    }
    return $array;
}