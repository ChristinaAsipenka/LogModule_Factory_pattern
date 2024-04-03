<?php

declare(strict_types=1);

namespace App\Classes\Loggers;

use App\Classes\AbstractLogger;
use App\Classes\Factory\LogToFileFactory;
use App\Interfaces\LoggerTypeInterface;

class LogToFile extends AbstractLogger
{

    function createLogger(): LoggerTypeInterface
    {
        return new LogToFileFactory();
    }
}
