<?php

declare(strict_types=1);

namespace App\Classes;

use App\Interfaces\LoggerTypeInterface;

abstract class AbstractLogger
{
    public function sendMessage(string $message): void
    {
        $logger = $this->createLogger();
        $logger->sendMessage($message);
    }

    abstract function createLogger(): LoggerTypeInterface;
}
