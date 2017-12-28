<?php

/**
 * Class Regex
 *
 * @method static string split($pattern, string $subject, int $limit = -1, int $flags = 0)
 */
abstract class Regex extends Proxy
{
    /**
     * @var array
     */
    public static $map = [
        'split' => [
            'name' => 'preg_split', // $pattern, $subject, $limit = -1, $flags = 0
        ],
    ];
}
