<?php

/**
 * Class Hash
 *
 * @method static string md5(string $string, bool $raw = false)
 * @method static string sha1(string $string, bool $raw = false)
 */
abstract class Hash extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        'md5' => [
            'name' => 'md5',
        ],
        'sha1' => [
            'name' => 'sha1',
        ],
    ];
}