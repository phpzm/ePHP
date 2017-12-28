<?php

if (!function_exists('error_handler')) {
    /**
     * @param $code
     * @param $message
     * @param $file
     * @param $line
     * @throws ErrorException
     */
    function error_handler($code, $message, $file, $line)
    {
        throw new ErrorException($message, $code, 1, $file, $line);
    }

    set_error_handler("error_handler");
}
