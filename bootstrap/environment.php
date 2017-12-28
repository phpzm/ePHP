<?php

// show all errors
error_reporting(E_ALL);

// system settings
ini_set('display_errors', env('ERRORS_DISPLAY', 'On'));
ini_set('log_errors', env('ERRORS_LOG', 'On'));
ini_set('track_errors', env('ERRORS_TRACK', 'Off'));
ini_set('html_errors', env('ERRORS_HTML', 'Off'));
