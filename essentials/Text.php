<?php

/**
 * Class Text
 *
 * @method static int length(string $string)
 * @method static string replace(string $string, string $search, string $replace)
 * @method static mixed first(string $string, string $search)
 * @method static mixed last(string $string, string $search)
 * @method static string upper(string $string)
 * @method static string lower(string $string)
 * @method static string capitalize(string $string)
 * @method static string unCapitalize(string $string)
 * @method static array split(string $delimiter, string $string, int $limit = null)
 * @method static string join(string $glue, array $pieces)
 * @method static string levenshtein(string $a, string $b)
 * @method static string substring(string $string , int $start, int $length = null)
 * @method static string trim(string $string , string $characters = null)
 * @method static string wrap(string $string , int $width = 75, string $break = "\n", bool $cut = false)
 * @method static int compare(string $a, string $b)
 * @method static array divide(string $string, int $length = 1)
 * @method static string shuffle(string $string)
 * @method static string repeat(string $string, int $multiplier)
 */
abstract class Text extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        'length' => [
            'name' => 'strlen',
        ],
        'replace' => [
            'name' => 'str_replace',
            'arguments' => [1, 2, 0],
        ],
        'first' => [
            'name' => 'strpos',
        ],
        'last' => [
            'name' => 'strrchr',
        ],
        'upper' => [
            'name' => 'strtoupper',
        ],
        'lower' => [
            'name' => 'strtolower',
        ],
        'capitalize' => [
            'name' => 'ucwords',
        ],
        'unCapitalize' => [
            'name' => 'lcfirst',
        ],
        'split' => [
            'name' => 'explode',
        ],
        'join' => [
            'name' => 'implode',
        ],
        'levenshtein' => [
            'name' => 'levenshtein',
        ],
        'substring' => [
            'name' => 'substr',
        ],
        'trim' => [
            'name' => 'trim',
        ],
        'wrap' => [
            'name' => 'wordwrap',
        ],
        'compare' => [
            'name' => 'strcmp',
        ],
        'divide' => [
            'name' => 'str_split',
        ],
        'shuffle' => [
            'name' => 'str_shuffle',
        ],
        'repeat' => [
            'name' => 'str_repeat',
        ],
    ];
}
