<?php

/**
 * Class File
 *
 * @method static int write(string $filename, mixed $data, int $flags = 0, resource $context = null)
 * @method static string read(string $filename, bool $use_include_path = false, resource $context = null, int $offset = 0, int $maxlen = null)
 * @method static bool exists(string $filename)
 */
abstract class File extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        /** @link http://php.net/manual/en/function.file-put-contents.php */
        'write' => [
            'name' => 'file_put_contens',
        ],
        /** @link http://php.net/manual/en/function.file-get-contents.php */
        'read' => [
            'name' => 'file_get_contens',
        ],
        /** @link http://php.net/manual/en/function.file-exists.php */
        'exists' => [
            'name' => 'file_exists',
        ],
    ];
}
