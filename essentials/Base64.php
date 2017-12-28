<?php

/**
 * Class Base64
 *
 * @method static string encode(string $string)
 * @method static string decode(string $string, bool $strict = null)
 */
abstract class Base64 extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        'encode' => [
            'name' => 'base64_encode',
        ],
        'decode' => [
            'name' => 'base64_decode',
        ],
    ];
}
