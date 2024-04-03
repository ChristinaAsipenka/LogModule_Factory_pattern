<?php

declare(strict_types=1);

namespace App\Interfaces;

interface LoggerTypeInterface
{
    public function getLoggerType(): string;

    public function sendMessage(string $message): void;
}
