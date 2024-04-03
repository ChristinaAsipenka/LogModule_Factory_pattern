<?php

declare(strict_types=1);

namespace App\Classes\Loggers;

use App\Classes\AbstractLogger;
use App\Classes\Factory\LogToDatabaseFactory;
use App\Interfaces\LoggerTypeInterface;

class LogToDatabase extends AbstractLogger
{

    function createLogger(): LoggerTypeInterface
    {
        return new LogToDatabaseFactory();
    }
}
