<?php

/**
 * Class Url
 */
abstract class Url
{
    /**
     * @var string
     */
    const REF = 'index.php/';

    /**
     * @return string
     */
    public static function host()
    {
        $self = static::self();
        $uri = static::uri();
        $start = '';
        if ($self !== $uri) {
            $start = static::start($self);
        }
        return server('HTTP_HOST') . $start;
    }

    /**
     * @return string
     */
    public static function path()
    {
        $self = static::self();
        $uri = static::uri();
        if ($self !== $uri) {
            $start = static::start($self);
            $search = '/' . preg_quote($start, '/') . '/';
            $uri = preg_replace($search, '', $uri, 1);
        }
        return $uri;
    }

    /**
     * @return mixed
     */
    private static function self()
    {
        return str_replace(static::REF, '', server('PHP_SELF'));
    }

    /**
     * @return string
     */
    private static function uri()
    {
        return server('REQUEST_URI') ? explode('?', server('REQUEST_URI'))[0] : '';
    }

    /**
     * @param $self
     * @return string
     */
    private static function start($self)
    {
        $pieces = explode('/', $self);
        array_pop($pieces);
        return implode('/', $pieces);
    }
}
