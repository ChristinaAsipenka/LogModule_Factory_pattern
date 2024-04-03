<?php

declare(strict_types=1);

namespace App\Classes\Factory;

use App\Interfaces\LoggerTypeInterface;

class LogToDatabaseFactory implements LoggerTypeInterface
{
    protected string $loggerType = 'Database';

    public function getLoggerType(): string
    {
        return $this->loggerType;
    }

    public function sendMessage(string $message): void
    {
        echo $message.' Log via Database <br/>';
    }
}
