<?php

/**
 * class Http
 */
abstract class Http
{
    /**
     * @param string $index
     * @return mixed
     */
    public static function post($index)
    {
        return filter(INPUT_POST, $index);
    }
    
    /**
     * @param string $index
     * @return mixed
     */
    public static function get($index)
    {
        return filter(INPUT_GET, $index);
    }
}

