<?php
return [
    'log_email' => env('LOG_MAIL'),
    'log_default' => env('LOG_DEFAULT'),
    'loggers' => json_decode(env('LOGGERS'), true),
];
