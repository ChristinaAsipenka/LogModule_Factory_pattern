<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LoggerInterface;
use App\Interfaces\LoggerTypeInterface;

class LoggerService implements LoggerInterface
{
    private LoggerTypeInterface $loggerType;


    public function send(string $message): void
    {
        $this->loggerType->sendMessage($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $loggers = \config('custom.loggers');

        $elem = array_filter($loggers, function ($element) use ($loggerType) {
            return stripos($element, $loggerType) !== false;
        });

        if(count($elem) === 0) {
            $logger = \config('custom.log_default');
        } else {
            $logger = reset($elem);
        }

        $this->setType($logger);
        $this->send($message);
    }

    public function getType(): string
    {
        return $this->loggerType->getLoggerType();
    }

    public function setType(string $type): void
    {
        $className = 'App\\Classes\\Loggers\\' . ucwords($type);

        throw_if(
            !class_exists($className),
            \Exception::class,
            "Class $className does not exist"
        );

        $this->loggerType = (new $className)->createLogger();
    }
}
