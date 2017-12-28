<?php

use Utils\Instance;

/**
 * Class ePHP
 */
class ePHP
{
    /**
     * @trait
     */
    use Instance;

    /**
     * @param string $file
     * @param array $params
     * @return mixed
     */
    public function compile($file, $params = [])
    {
        $root = env('APP_DIR');
        $filename = realpath($file);
        if ($root) {
            $filename = realpath(path($root, $file));
        }
        if (!file_exists($filename) || is_dir($filename)) {
            return null;
        }
        ob_start();
        if (is_array($params)) {
            extract($params);
        }
        /** @noinspection PhpIncludeInspection */
        include $filename;
        $content = ob_get_contents();
        if ($content) {
            ob_end_clean();
        }
        return $content;
    }
}