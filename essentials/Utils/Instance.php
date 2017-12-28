<?php

namespace Utils;

/**
 * Trait Instance
 * @package Utils
 */
trait Instance
{
    /**
     * @return static
     */
    public static function instance()
    {
        return new static();
    }
}