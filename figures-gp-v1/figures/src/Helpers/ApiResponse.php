<?php

namespace jfernancordova\Figures\Helpers;
/**
 * Class ApiResponse
 */
class ApiResponse
{

    const SUCCESS     = 'Operation Completed';
    const BAD_REQUEST = 'There was an error during the operation';
    const ERROR       = 'Bad Operation';

    /**
     * @param $code
     * @param $message
     * @param $response
     * @return string
     */
    public static function Response($code, $message, $response)
    {
        return json_encode([
            'code'     => $code,
            'message'  => $message,
            'response' => $response
        ]);
    }

}