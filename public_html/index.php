<?php

require dirname(__DIR__) . '/vendor/autoload.php';

out('Você está acessando o host <b>', Url::host(), '</b>');

out('<hr>');

out('Você pode usar o path <b>', Url::path(), '</b> para direcionar os recursos e proteger sua aplicação');
