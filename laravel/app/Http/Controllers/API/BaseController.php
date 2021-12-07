<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected function _success($data = [])
    {
        $success_data = array_merge(['status' => 0], $data);
        return response()->json($success_data);
    }

    protected function _error($code)
    {
        $msg="";
        // エラーメッセージを定義する
        switch($code){
            case 1:
                $msg = "エラーメッセージ";
                break;
            default:
                $msg = "登録エラー";
                break;
        }

        return response()->json([
            'status' => -1,
            'code' => $code,
            'message' => $msg
        ]);
    }
}
