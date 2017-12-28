<?php

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $path = Url::path();
    if ($path === '/') {
        $path = '/index.php';
    }
    $app = Text::substring($path, 1);

    $compiled = ePHP::instance()->compile(dirname(__DIR__) . '/app/' . $app);
    if (is_null($compiled)) {
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return out('Whoops');
    }
    out($compiled);
} catch (Throwable $error) {
    echo $error->getMessage();
}
