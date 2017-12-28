<?php

// native types
const TYPE_BOOLEAN = 'boolean';
const TYPE_INTEGER = 'integer';
const TYPE_FLOAT = 'float';
const TYPE_STRING = 'string';
const TYPE_ARRAY = 'array';
const TYPE_OBJECT = 'object';
const TYPE_RESOURCE = 'resource';
const TYPE_NULL = 'null';
const TYPE_UNKNOWN_TYPE = 'unknown type';

// custom types
const TYPE_DATE = 'date';

// context operators
const __AND__ = ' AND ';
const __OR__ = ' OR ';
const __COMMA__ = ', ';
const __NULL__ = '__NULL__';

// used to compose path do generator
define('TEMPLATE_DIR', 'kernel/resources/templates');
