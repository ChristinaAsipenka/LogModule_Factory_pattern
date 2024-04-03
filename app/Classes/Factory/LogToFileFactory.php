<?php

declare(strict_types=1);

namespace App\Classes\Factory;

use App\Interfaces\LoggerTypeInterface;

class LogToFileFactory implements LoggerTypeInterface
{
    protected string $loggerType = 'File';

    public function getLoggerType(): string
    {
        return $this->loggerType;
    }

    public function sendMessage(string $message): void
    {
        echo $message.' Log via File</br>';
    }
}
