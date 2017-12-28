<?php

/**
 * Class Proxy
 */
abstract class Proxy
{
    /**
     * @var array
     */
    protected static $map = [];

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($name, $arguments)
    {
        if (!isset(static::$map[$name])) {
            throw new Exception("Function `{$name}` not found");
        }
        $function = static::$map[$name]['name'];
        $parameters = static::parameters($name, $arguments);
        return call_user_func_array($function, $parameters);
    }

    /**
     * @param $name
     * @param $arguments
     * @return array
     * @throws Exception
     */
    private static function parameters($name, $arguments)
    {
        if (!isset(static::$map[$name]['arguments'])) {
            return $arguments;
        }
        $parameters = [];
        foreach (static::$map[$name]['arguments'] as $index) {
            if (!isset($arguments[$index])) {
                throw new Exception("Invalid arguments to `{$name}`");
            }
            $parameters[] = $arguments[$index];
        }
        return $parameters;
    }
}
