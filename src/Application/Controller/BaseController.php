<?php
namespace  Application\Controller;
use JsonException;

/**
 * 基类
 */
abstract class BaseController
{
    /**
     * @throws JsonException
     */
    public function json($data = '', $msg = '', $code = 200){
        $res = [
            'msg' => $msg,
            'data' => $data,
            'code' => $code
        ];

        return json_encode($res, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    }
}