<?php

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $compiled = ePHP::instance()->compile(dirname(__DIR__) . '/app/' . Url::path());
    if (is_null($compiled)) {
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return out('Whoops');
    }
    out($compiled);
} catch (Throwable $error) {
    echo $error->getMessage();
}
