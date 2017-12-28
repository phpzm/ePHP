<?php

/**
 * Class Encode
 *
 * @method static string ascii(string $string)
 * @method static string soundex(string $string)
 */
abstract class Encode extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        'ascii' => [
            'name' => 'ord',
        ],
        'soundex' => [
            'name' => 'soundex',
        ],
    ];
}
