<?php

declare(strict_types=1);

namespace App\Classes\Loggers;

use App\Classes\AbstractLogger;
use App\Classes\Factory\LogToEmailFactory;
use App\Interfaces\LoggerTypeInterface;

class LogToMail extends AbstractLogger
{

    function createLogger(): LoggerTypeInterface
    {
        return new LogToEmailFactory();
    }
}
