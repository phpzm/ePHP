<?php

if (!function_exists('filter')) {
    /**
     * @param int $source
     * @param string $index
     * @return mixed
     */
    function filter(int $source, string $index)
    {
        return filter_input($source, $index);
    }
}

if (!function_exists('server')) {
    /**
     * @param string $index
     * @return mixed
     */
    function server(string $index)
    {
        return filter(INPUT_SERVER, $index);
    }
}

if (!function_exists('env')) {
    /**
     * @param string $property
     * @param mixed $default (null)
     * @return string
     */
    function env($property, $default = null)
    {
        $filename = path(dirname(__DIR__), '.env');
        if (!file_exists($filename) || !is_file($filename)) {
            return $default;
        }
        $properties = parse_ini_file($filename);
        if (!is_array($properties)) {
            return $default;
        }
        return get($properties, $property);
    }
}

if (!function_exists('path')) {
    /**
     * @param array $arguments
     * @return string
     */
    function path(...$arguments)
    {
        return implode('/', $arguments);
    }
}

if (!function_exists('out')) {
    /**
     * @param mixed $values
     */
    function out(...$values)
    {
        print implode(' ', array_map(function ($value) {
            return parse($value);
        }, $values));
    }
}

if (!function_exists('parse')) {
    /**
     * @param mixed $value
     * @return string
     */
    function parse($value): string
    {
        switch (gettype($value)) {
            case TYPE_BOOLEAN:
                return $value ? 'true' : 'false';
                break;
            case TYPE_INTEGER:
            case TYPE_FLOAT:
            case TYPE_STRING:
                return trim($value);
                break;
            case TYPE_ARRAY:
            case TYPE_OBJECT:
            case TYPE_RESOURCE:
                return json_encode($value);
            // case TYPE_NULL:
            // case TYPE_UNKNOWN_TYPE:
            default:
                return '';
        }
    }
}

if (!function_exists('coalesce')) {
    /**
     * @param array ...$arguments
     * @return mixed
     * @throws ErrorException
     */
    function coalesce(...$arguments)
    {
        foreach ($arguments as $argument) {
            if (!is_null($argument)) {
                return $argument;
            }
        }
        throw new ErrorException("Can't resolve coalesce options");
    }
}

if (!function_exists('get')) {
    /**
     * @param mixed $value
     * @param string|int $property (null)
     * @param mixed $default (null)
     * @return mixed
     */
    function get($value, $property = null, $default = null)
    {
        if (is_null($property)) {
            return $default;
        }
        if (!$value) {
            return $default;
        }
        if (is_array($value)) {
            if (isset($value[$property])) {
                return $value[$property];
            }
            return search($value, $property, $default);
        }
        /** @noinspection PhpVariableVariableInspection */
        if ($value && is_object($value) && isset($value->$property)) {
            /** @noinspection PhpVariableVariableInspection */
            return $value->$property;
        }
        return $default;
    }
}

/**
 * @SuppressWarnings("ExitExpression")
 */
if (!function_exists('stop')) {
    /**
     * @param array ...$arguments
     */
    function stop(...$arguments)
    {
        ob_start();
        if (count($arguments) === 1) {
            $arguments = $arguments[0];
        }
        echo json_encode($arguments);
        $contents = ob_get_contents();
        ob_end_clean();
        out($contents);
        die;
    }
}

if (!function_exists('guid')) {
    /**
     * @param bool $brackets
     * @return string
     */
    function guid($brackets = false)
    {
        mt_srand((double)microtime() * 10000);

        $char = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = substr($char, 0, 8) . $hyphen . substr($char, 8, 4) . $hyphen . substr($char, 12, 4) . $hyphen .
            substr($char, 16, 4) . $hyphen . substr($char, 20, 12);
        if ($brackets) {
            $uuid = chr(123) . $uuid . chr(125);
        }

        return $uuid;
    }
}

if (!function_exists('error_message')) {
    /**
     * @param Throwable $error
     * @return array
     */
    function error_message(Throwable $error): string
    {
        $pieces = [];
        $line = function ($message, $file, $line) {
            $file = str_replace(dirname(__DIR__, 4), '', $file);
            return $message . ' on ' . $file . ' in ' . $line;
        };

        $pieces[] = $line($error->getMessage(), $error->getFile(), $error->getLine());

        if (method_exists($error, 'getDetails')) {
            $pieces[] = '~';
            $pieces[] = json_encode($error->getDetails(), JSON_PRETTY_PRINT);
        }
        if (is_array($error->getTrace())) {
            $pieces[] = '~';
            foreach ($error->getTrace() as $item) {
                $class = get($item, 'class');
                $function = get($item, 'function');
                $pieces[] = $line("`{$class}::{$function}`", get($item, 'file'), get($item, 'line'));
            }
        }
        return implode(PHP_EOL, $pieces);
    }
}

if (!function_exists('search')) {
    /**
     * @param array $context
     * @param array|string $path
     * @param mixed $default (null)
     * @return mixed|null
     */
    function search(array $context, $path, $default = null)
    {
        if (!is_array($path)) {
            $path = explode('.', $path);
        }
        foreach ($path as $piece) {
            if (!is_array($context) || !array_key_exists($piece, $context)) {
                return $default;
            }
            $context = $context[$piece];
        }
        return $context;
    }
}

if (!function_exists('read')) {
    /**
     * @param string $prompt
     * @param string $options
     * @return string
     */
    function read(string $prompt = '$ ', string $options = ''): string
    {
        if ($options) {
            $prompt = "{$prompt} {$options}\$ ";
        }
        $reader = function () use ($prompt) {
            return readline("{$prompt}");
        };
        if (PHP_OS === 'WINNT') {
            $reader = function () use ($prompt) {
                echo $prompt;
                return stream_get_line(STDIN, 1024, PHP_EOL);
            };
        }
        $line = $reader();
        readline_add_history($line);

        return trim($line);
    }
}

if (!function_exists('type')) {
    /**
     * @param mixed $value
     * @param string $type
     * @return bool
     */
    function type($value, string $type)
    {
        return gettype($value) === $type;
    }
}
