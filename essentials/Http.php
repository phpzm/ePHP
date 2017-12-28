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

    /**
     * @param string $index
     * @return mixed
     */
    public static function file($index)
    {
        $files = static::files();
        if (isset($files[$index])) {
            return $files[$index];
        }
        return null;
    }

    /**
     * @return array
     * @SuppressWarnings("SuperGlobals")
     */
    public static function files()
    {
        return $_FILES;
    }

    /**
     * @param string $index
     * @return mixed
     * @SuppressWarnings("SuperGlobals")
     */
    public static function all($index = null)
    {
        if (is_null($index)) {
            return $_REQUEST;
        }
        return filter(INPUT_REQUEST, $index);
    }
}

